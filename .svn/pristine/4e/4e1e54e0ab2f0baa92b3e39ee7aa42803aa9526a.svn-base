<?php

namespace App\Controllers;

use App\Models\WhatsappTextMessageModel;
use CodeIgniter\Controller;
use App\Models\Dashboard_m;

class WhatsappTextMessageController extends Controller
{
    /**
     * Loads the view (single view for listing and CRUD operations)
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
        return view('masters/whatsapp_text_message_view',$data);
    }
    
    /**
     * Fetch all active WhatsApp text messages for DataTables.
     */
    public function fetch()
    {
        $model = new WhatsappTextMessageModel();
        $data  = $model->getActiveMessages();
        return $this->response->setJSON($data);
    }
    
    /**
     * Save (insert/update) a WhatsApp text message record.
     * Expects POST data:
     * - template_name
     * - template_content
     * - enterprise_id
     * - whatsapp_text_message_id (if updating; empty for insert)
     */
    public function save()
    {
        $id       = $this->request->getPost('whatsapp_text_message_id');
        $name     = $this->request->getPost('template_name');
        $content  = $this->request->getPost('template_content');
        $enterprise = $this->request->getPost('enterprise_id');

        // Simple server-side validation
        if (!$name || !$content || !$enterprise) {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'All fields are required!'
            ]);
        }

        $model = new WhatsappTextMessageModel();
        if (empty($id)) {
            // Insert new record
            $res = $model->insertMessage($name, $content, $enterprise);
            if ($res) {
                return $this->response->setJSON([
                    'status'  => 'success',
                    'message' => 'Template added successfully'
                ]);
            } else {
                return $this->response->setJSON([
                    'status'  => 'error',
                    'message' => 'Failed to add template'
                ]);
            }
        } else {
            // Update existing record
            $res = $model->updateMessage($id, $name, $content, $enterprise);
            if ($res) {
                return $this->response->setJSON([
                    'status'  => 'success',
                    'message' => 'Template updated successfully'
                ]);
            } else {
                return $this->response->setJSON([
                    'status'  => 'error',
                    'message' => 'Failed to update template'
                ]);
            }
        }
    }
    
    /**
     * Soft-delete a WhatsApp text message record.
     */
    public function delete()
    {
        $id = $this->request->getPost('whatsapp_text_message_id');
        $model = new WhatsappTextMessageModel();
        $res = $model->softDeleteMessage($id);
        
        if ($res) {
            return $this->response->setJSON([
                'status'  => 'success',
                'message' => 'Template deleted successfully'
            ]);
        } else {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Failed to delete template'
            ]);
        }
    }
}
