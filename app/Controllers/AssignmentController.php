<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AssignmentModel;
use App\Models\Dashboard_m;

class AssignmentController extends BaseController
{
    /**
     * Loads the assignment view.
     */
    public function index()
    {
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
        $parent_menu = $Dashboard_model->get_parent_menus();
        $sub_menu = $Dashboard_model->get_sub_menus();
        $data['parent_menu'] = $parent_menu;
        $data['sub_menu'] = $sub_menu;

        $model = new AssignmentModel();
        $employees = $model->getAllEmployees();
        $targets   = $model->getAllTargets();

        $data['employees'] = $employees;
        $data['model'] = $model;
        $data['targets']=$targets;

        return view('masters/assignment_view',$data);
    }

    /**
     * Returns target details for auto-fill.
     */
    public function getTargetDetails()
    {
        $targetId = $this->request->getPost('target_id');
        $model = new AssignmentModel();
        $target = $model->getTargetById($targetId);

        return $this->response->setJSON($target);
    }

    /**
     * Saves the assignment (insert or update).
     */
    public function saveAssignment()
    {
        $assignmentId = $this->request->getPost('assignment_id'); // may be empty for new assignment
        $employeeId   = $this->request->getPost('employee_id');
        $targetId     = $this->request->getPost('target_id');
        $fromDate     = $this->request->getPost('from_date');
        $toDate       = $this->request->getPost('to_date');
        $amount       = $this->request->getPost('amount');

        $model = new AssignmentModel();
        $result = $model->saveAssignment($assignmentId, $employeeId, $targetId, $fromDate, $toDate, $amount);

        return $this->response->setJSON($result);
    }

    /**
     * Fetch assignments for DataTables.
     */
    public function fetchAssignments()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('khm_entity_mst_target_assign a');
        $builder->select('
            a.target_assign_id, 
            a.entity_id, 
            a.target_id, 
            e.entity_name as employee_name, 
            t.target_name as target_name, 
            t.target_from_date, 
            t.target_to_date, 
            a.target_amount as amount
        ');
        $builder->join('khm_entity_mst e', 'a.entity_id = e.entity_id', 'left');
        $builder->join('khm_obj_mst_target t', 'a.target_id = t.target_id', 'left');
        $builder->where('a.deleted', 0);
        $query = $builder->get();
        $assignments = $query->getResultArray();

        return $this->response->setJSON(['data' => $assignments]);
    }

    /**
     * Fetch a single assignment for editing.
     */
    public function editAssignment()
    {
        $assignmentId = $this->request->getPost('assignment_id');
        $db = \Config\Database::connect();
        $builder = $db->table('khm_entity_mst_target_assign a');
        $builder->select('
            a.target_assign_id, 
            a.entity_id, 
            a.target_id, 
            e.entity_name as employee_name, 
            t.target_name as target_name, 
            t.target_from_date, 
            t.target_to_date, 
            a.target_amount as amount
        ');
        $builder->join('khm_entity_mst e', 'a.entity_id = e.entity_id', 'left');
        $builder->join('khm_obj_mst_target t', 'a.target_id = t.target_id', 'left');
        $builder->where('a.target_assign_id', $assignmentId);
        $assignment = $builder->get()->getRowArray();

        return $this->response->setJSON($assignment);
    }

    /**
     * Soft-deletes an assignment.
     */
    public function deleteAssignment()
    {
        $assignmentId = $this->request->getPost('assignment_id');
        if(empty($assignmentId)){
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Assignment ID is required.'
            ]);
        }
        $db = \Config\Database::connect();
        $builder = $db->table('khm_entity_mst_target_assign');
        $builder->where('target_assign_id', $assignmentId);
        $result = $builder->limit(1)->update(['deleted' => 1]);

        if($result){
            return $this->response->setJSON([
                'status'  => 'success',
                'message' => 'Assignment deleted successfully.'
            ]);
        } else {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Failed to delete assignment.'
            ]);
        }
    }
}
