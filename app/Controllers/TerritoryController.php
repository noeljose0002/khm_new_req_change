<?php

namespace App\Controllers;

use App\Models\TerritoryModel;
use CodeIgniter\Controller;
use App\Models\Dashboard_m;

class TerritoryController extends Controller
{
    protected $territoryModel;

    public function __construct()
    {
        $this->territoryModel = new TerritoryModel();
    }

    public function index()
    {
        $db = \Config\Database::connect();
        $Dashboard_model = new Dashboard_m();
        $entity_id = session('user_id');
        $active_role = session('active_role');
        $all_roles = $Dashboard_model->get_all_entity_roles($entity_id);
        $all_systems = $Dashboard_model->get_all_systems($entity_id);
        $data['all_systems'] = $all_systems;
        if(!empty($all_roles)){
            $data['all_roles_assn'] = $all_roles;
            $all_menus = $Dashboard_model->get_all_role_menus($active_role);
            if(!empty($all_menus)){
                $data['all_menus'] = $all_menus;
            }
            else{
                $data['all_menus'] = [];
            }
            $all_permissions = $Dashboard_model->get_all_entity_permissions($active_role,3);
            if(!empty($all_permissions)){
                $data['all_permissions'] = $all_permissions;
            }
            else{
                $data['all_permissions'] = [];
            }
            
        }
        else{
            $data['all_roles_assn'] = [];
            $data['all_menus'] = [];
            $data['all_permissions'] = [];
        }


        $employees = $db->table('khm_entity_mst')
                        ->select('entity_id, entity_name')
                        ->where('deleted', 0)
                        ->where("entity_id IN (SELECT entity_id FROM khm_entity_boolean WHERE boolean_value = 1)")
                        ->get()
                        ->getResultArray();

        $territories = $this->territoryModel->getTerritories();
        $locations   = $this->territoryModel->getLocationsLevel4();
        $parent_menu = $Dashboard_model->get_parent_menus();
        $sub_menu = $Dashboard_model->get_sub_menus();

        $data['employees'] = $employees;
        $data['territories'] = $territories;
        $data['locations'] = $locations;
        $data['parent_menu'] = $parent_menu;
        $data['sub_menu'] = $sub_menu;

        return view('masters/territory_view', $data);
    }

    public function getTerritoryList()
    {
        $territories = $this->territoryModel->getTerritories();
        return $this->response->setJSON(['data' => $territories]);
    }

    public function saveTerritory()
    {
        $post = $this->request->getPost();

        if (empty($post['territory_name'])) {
            return $this->response->setJSON(['status' => false, 'message' => 'Territory name is required']);
        }

        $data = [
            'territory_name' => $post['territory_name'],
            'locations'      => json_encode($post['locations']),
            'deleted'        => 0,
            'enterprise_id'  => $post['enterprise_id'] ?? 1
        ];

        if (!empty($post['territory_id'])) {
            $result = $this->territoryModel->updateTerritory($post['territory_id'], $data);
        } else {
            $result = $this->territoryModel->saveTerritory($data);
        }

        if ($result === true || is_numeric($result)) {
            return $this->response->setJSON(['status' => true, 'message' => 'Saved successfully']);
        }
        return $this->response->setJSON(['status' => false, 'message' => $result]);
    }

    public function deleteTerritory($id)
    {
        $result = $this->territoryModel->deleteTerritory($id);
        if ($result) {
            // Cascade delete employee assignments for this territory.
            $this->territoryModel->deleteAssignmentsForTerritory($id);
            return $this->response->setJSON(['status' => true, 'message' => 'Deleted successfully']);
        }
        return $this->response->setJSON(['status' => false, 'message' => 'Delete failed']);
    }

    public function assignEmployee()
    {
        $post = $this->request->getPost();

        if (empty($post['entity_ids']) || empty($post['territory_id'])) {
            return $this->response->setJSON([
                'status'  => false, 
                'message' => 'Both Territory and Employee(s) must be selected'
            ]);
        }

        $db = \Config\Database::connect();
        $assignmentBuilder = $db->table('khm_entity_mst_emp_teritory_assign');

        $assignmentBuilder->where('territory_id', $post['territory_id']);
        $assignmentBuilder->where('deleted', 0);
        $existingAssignment = $assignmentBuilder->get()->getRow();
        if ($existingAssignment) {
            return $this->response->setJSON([
                'status'  => false, 
                'message' => 'This territory is already assigned. Duplicate territory usage is not allowed.'
            ]);
        }

        $empQuery = $db->table('khm_entity_mst')
                       ->select('entity_id, entity_name')
                       ->where('deleted', 0)
                       ->get()
                       ->getResultArray();
        $empMapping = [];
        foreach ($empQuery as $emp) {
            $empMapping[$emp['entity_id']] = $emp['entity_name'];
        }
        
        $assignmentBuilder->resetQuery();
        $assignmentBuilder->select('entity_id');
        $assignmentBuilder->where('deleted', 0);
        $existingAssignments = $assignmentBuilder->get()->getResultArray();

        $employeeConflicts = [];
        foreach ($post['entity_ids'] as $emp_id) {
            foreach ($existingAssignments as $assignment) {
                $assignedIds = json_decode($assignment['entity_id'], true);
                if (is_array($assignedIds) && in_array($emp_id, $assignedIds)) {
                    $employeeConflicts[$emp_id] = isset($empMapping[$emp_id]) ? $empMapping[$emp_id] : $emp_id;
                    break;
                }
            }
        }
        if (!empty($employeeConflicts)) {
            $conflictNames = implode(', ', $employeeConflicts);
            return $this->response->setJSON([
                'status'  => false, 
                'message' => "Employee(s) {$conflictNames} are already assigned to a territory. Each employee can have only one territory."
            ]);
        }

        $data = [
            'entity_id'     => json_encode($post['entity_ids']),
            'territory_id'  => $post['territory_id'],
            'deleted'       => 0,
            'enterprise_id' => $post['enterprise_id'] ?? 1
        ];

        $result = $this->territoryModel->assignEmployee($data);
        if ($result) {
            return $this->response->setJSON(['status' => true, 'message' => 'Assigned successfully']);
        }
        return $this->response->setJSON([
            'status'  => false, 
            'message' => 'Assignment failed.'
        ]);
    }

    public function updateAssignment()
    {
        $post = $this->request->getPost();

        if (empty($post['emp_teritory_assign_id']) || empty($post['territory_id'])) {
            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Assignment ID and Territory are required'
            ]);
        }
        
        $db = \Config\Database::connect();
        $assignmentBuilder = $db->table('khm_entity_mst_emp_teritory_assign');

        $currentAssignment = $assignmentBuilder
                                ->where('emp_teritory_assign_id', $post['emp_teritory_assign_id'])
                                ->where('deleted', 0)
                                ->get()
                                ->getRow();
        if (!$currentAssignment) {
            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Assignment record not found.'
            ]);
        }
        $oldTerritoryId = $currentAssignment->territory_id;
        $newTerritoryId = $post['territory_id'];

        if ($newTerritoryId != $oldTerritoryId) {
            $assignmentBuilder->resetQuery();
            $assignmentBuilder->where('territory_id', $newTerritoryId);
            $assignmentBuilder->where('deleted', 0);
            $assignmentBuilder->where('emp_teritory_assign_id !=', $post['emp_teritory_assign_id']);
            $existsForNew = $assignmentBuilder->get()->getRow();
            if ($existsForNew) {
                return $this->response->setJSON([
                    'status'  => false, 
                    'message' => 'This territory is already assigned. Duplicate territory usage is not allowed.'
                ]);
            }
        }

        if (!empty($post['entity_ids'])) {
            $assignmentBuilder->resetQuery();
            $assignmentBuilder->select('entity_id, emp_teritory_assign_id');
            $assignmentBuilder->where('deleted', 0);
            $existingAssignments = $assignmentBuilder->get()->getResultArray();

            $empQuery = $db->table('khm_entity_mst')
                           ->select('entity_id, entity_name')
                           ->where('deleted', 0)
                           ->get()
                           ->getResultArray();
            $empMapping = [];
            foreach ($empQuery as $emp) {
                $empMapping[$emp['entity_id']] = $emp['entity_name'];
            }

            $employeeConflicts = [];
            foreach ($post['entity_ids'] as $emp_id) {
                foreach ($existingAssignments as $assignment) {
                    if ($assignment['emp_teritory_assign_id'] == $post['emp_teritory_assign_id']) {
                        continue;
                    }
                    $assignedIds = json_decode($assignment['entity_id'], true);
                    if (is_array($assignedIds) && in_array($emp_id, $assignedIds)) {
                        $employeeConflicts[$emp_id] = isset($empMapping[$emp_id]) ? $empMapping[$emp_id] : $emp_id;
                        break;
                    }
                }
            }
            if (!empty($employeeConflicts)) {
                $conflictNames = implode(', ', $employeeConflicts);
                return $this->response->setJSON([
                    'status'  => false, 
                    'message' => "Employee(s) {$conflictNames} are already assigned to a territory. Each employee can have only one territory."
                ]);
            }
        }

        $data = [
            'territory_id'  => $newTerritoryId,
            'enterprise_id' => $post['enterprise_id'] ?? 1
        ];
        if (!empty($post['entity_ids'])) {
            $data['entity_id'] = json_encode($post['entity_ids']);
        }

        $result = $this->territoryModel->updateEmployeeAssignment($post['emp_teritory_assign_id'], $data);
        if ($result) {
            return $this->response->setJSON(['status' => true, 'message' => 'Assignment updated successfully']);
        }
        return $this->response->setJSON(['status' => false, 'message' => 'Assignment update failed']);
    }

    public function getEmployeeAssignments()
    {
        $assignments = $this->territoryModel->getEmployeeAssignments();
        return $this->response->setJSON(['data' => $assignments]);
    }

    public function deleteEmployeeAssignment($assignment_id)
    {
        $result = $this->territoryModel->deleteEmployeeAssignment($assignment_id);
        if ($result) {
            return $this->response->setJSON(['status' => true, 'message' => 'Assignment deleted successfully']);
        }
        return $this->response->setJSON(['status' => false, 'message' => 'Failed to delete assignment']);
    }
}
