<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FacilityCombinedModel;
use App\Models\Dashboard_m;

class Facility extends BaseController
{
    /**
     * Loads the facility view.
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
        // Static facility types; adjust if you load these dynamically.
        $facilityTypes = [
            ['facility_type_id' => 1, 'facility_type_name' => 'Health & Wellness', 'enterprise_id' => 1],
            ['facility_type_id' => 2, 'facility_type_name' => 'Dining & Beverages', 'enterprise_id' => 1],
            ['facility_type_id' => 3, 'facility_type_name' => 'Recreational Activities', 'enterprise_id' => 1]
        ];
        $data['facilityTypes'] = $facilityTypes;

      return view('masters/facility_view', $data);

    }

    /**
     * Returns facility data in JSON format.
     */
    public function getFacilities()
    {
        $model = new FacilityCombinedModel();
        $data = $model->getFacilityList();
        return $this->response->setJSON(['data' => $data]);
    }

    /**
     * Checks if a facility name already exists.
     */
    public function checkDuplicate()
    {
        $facilityName = $this->request->getPost('facility_name');
        $facilityId   = $this->request->getPost('facility_id');

        $model = new FacilityCombinedModel();
        $exists = $model->checkDuplicateFacility($facilityName, $facilityId);

        return $this->response->setJSON(['exists' => $exists]);
    }

    /**
     * Creates a new facility record.
     */
    public function create()
    {
        helper(['form']);
        $rules = [
            'facility_name'    => 'required|min_length[3]|max_length[100]',
            'facility_type_id' => 'required|integer',
            'enterprise_id'    => 'required|integer'
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $this->validator->getErrors()
            ]);
        }

        $data = [
            'facility_name'    => $this->request->getPost('facility_name'),
            'facility_type_id' => $this->request->getPost('facility_type_id'),
            'enterprise_id'    => $this->request->getPost('enterprise_id')
        ];

        $model = new FacilityCombinedModel();
        $result = $model->insertFacility($data);

        if ($result === false) {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Error occurred while saving the facility.'
            ]);
        }

        return $this->response->setJSON([
            'status'  => 'success',
            'message' => 'Facility successfully added!',
            'data'    => $result
        ]);
    }

    /**
     * Loads a facility record for editing.
     */
    public function edit($id)
    {
        $model = new FacilityCombinedModel();
        $facility = $model->getFacilityById($id);
        if(!$facility) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Facility not found']);
        }
        return $this->response->setJSON(['status' => 'success', 'facility' => $facility]);
    }

    /**
     * Updates a facility record.
     */
    public function update()
    {
        helper(['form']);
        $rules = [
            'facility_id'      => 'required|integer',
            'facility_name'    => 'required|min_length[3]|max_length[100]',
            'facility_type_id' => 'required|integer',
            'enterprise_id'    => 'required|integer'
        ];
        
        if(!$this->validate($rules)){
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $this->validator->getErrors()
            ]);
        }
        
        $id = $this->request->getPost('facility_id');
        $data = [
            'facility_name'    => $this->request->getPost('facility_name'),
            'facility_type_id' => $this->request->getPost('facility_type_id'),
            'enterprise_id'    => $this->request->getPost('enterprise_id')
        ];
        
        $model = new FacilityCombinedModel();
        $updated = $model->updateFacility($id, $data);
        
        if(!$updated){
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Failed to update facility.'
            ]);
        }
        
        return $this->response->setJSON([
            'status'  => 'success',
            'message' => 'Facility updated successfully!'
        ]);
    }

    /**
     * Soft deletes a facility record.
     */
    public function softDelete($id)
    {
        $model = new FacilityCombinedModel();
        $deleted = $model->softDeleteFacility($id);
        if(!$deleted){
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Failed to delete facility.'
            ]);
        }
        return $this->response->setJSON([
            'status'  => 'success',
            'message' => 'Facility deleted successfully!'
        ]);
    }
}
