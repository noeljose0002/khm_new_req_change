<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EditRequestReasonModel;
use App\Models\Dashboard_m;

class EditRequestReasonController extends BaseController
{
    /**
     * Display the main view.
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
        return view('masters/edit_request_reason_view',$data);
    }

    /**
     * Fetch active edit request reasons.
     */
    public function fetch()
    {
        $model = new EditRequestReasonModel();
        $data  = $model->getActiveEditRequestReasons();
        return $this->response->setJSON($data);
    }

    /**
     * Save a new record or update an existing one.
     */
    public function save()
    {
        $model  = new EditRequestReasonModel();
        $id     = $this->request->getPost('edit_request_reason_id');
        $reason = $this->request->getPost('edit_request_reason');

        if (!$reason) {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Reason is required.'
            ]);
        }

        if ($id) {
            // Update existing record
            $model->updateEditRequestReason($id, $reason);
            $message = "Record updated successfully.";
        } else {
            // Insert new record
            $model->insertEditRequestReason($reason);
            $message = "Record added successfully.";
        }
        return $this->response->setJSON([
            'status'  => 'success',
            'message' => $message
        ]);
    }

    /**
     * Soft-delete a record.
     */
    public function delete()
    {
        $id = $this->request->getPost('edit_request_reason_id');
        if (!$id) {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'ID not provided.'
            ]);
        }
        $model = new EditRequestReasonModel();
        $model->softDeleteEditRequestReason($id);
        return $this->response->setJSON([
            'status'  => 'success',
            'message' => 'Record deleted successfully.'
        ]);
    }
}
