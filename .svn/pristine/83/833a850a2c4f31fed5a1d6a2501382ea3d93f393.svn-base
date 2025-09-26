<?php

namespace App\Controllers;

use App\Models\MarkupModel;
use CodeIgniter\Controller;
use App\Models\Dashboard_m;

class Markups extends Controller
{
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
        // Load the view that contains the HTML and JavaScript
        return view('masters/markups_view',$data);
    }

    public function fetch()
    {
        $model = new MarkupModel();
        $data = $model->getActiveMarkups();
        return $this->response->setJSON($data);
    }

    public function save()
    {
        $markUpId = $this->request->getPost('mark_up_id');
        $system   = $this->request->getPost('system');
        $markUp   = $this->request->getPost('mark_up');

        $model = new MarkupModel();

        if (empty($markUpId)) {
            // Insert new record
            $res = $model->insertMarkup($system, $markUp);
            if ($res) {
                return $this->response->setJSON([
                    'status'  => 'success',
                    'message' => 'Record added successfully'
                ]);
            } else {
                return $this->response->setJSON([
                    'status'  => 'error',
                    'message' => 'Failed to add record'
                ]);
            }
        } else {
            // Update existing record
            $res = $model->updateMarkup($markUpId, $system, $markUp);
            if ($res !== false) {
                return $this->response->setJSON([
                    'status'  => 'success',
                    'message' => 'Record updated successfully'
                ]);
            } else {
                return $this->response->setJSON([
                    'status'  => 'error',
                    'message' => 'Failed to update record'
                ]);
            }
        }
    }

    public function delete()
    {
        $markUpId = $this->request->getPost('mark_up_id');
        $model    = new MarkupModel();
        $res      = $model->softDelete($markUpId);

        if ($res) {
            return $this->response->setJSON([
                'status'  => 'success',
                'message' => 'Record soft-deleted successfully'
            ]);
        } else {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Failed to delete record'
            ]);
        }
    }
}
