<?php

namespace App\Controllers;

use App\Models\WhatsappDocumentModel;
use CodeIgniter\Controller;
use App\Models\Dashboard_m;

class WhatsappDocumentController extends Controller
{
    /**
     * Load the single view (AJAX CRUD UI)
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
        return view('masters/whatsapp_document_view',$data);
    }
    
    /**
     * Fetch active records for DataTables.
     */
    public function fetch()
    {
        $model = new WhatsappDocumentModel();
        $data  = $model->getActiveDocuments();
        return $this->response->setJSON($data);
    }
    
    /**
     * Save (insert/update) a document record.
     * Expects POST data:
     * - template_name
     * - template_path (if file is not uploaded, this value is used)
     * - enterprise_id (hidden, default = 1)
     * - whatsapp_document_id (if updating)
     * 
     * Also handles file upload via field 'template_file'.
     */
    public function save()
    {
        $id           = $this->request->getPost('whatsapp_document_id');
        $templateName = $this->request->getPost('template_name');
        // This value might be preset on the client side but will be overwritten if a file is uploaded.
        $templatePath = $this->request->getPost('template_path');
        $enterprise   = $this->request->getPost('enterprise_id');
        
        // Server-side validation rules
        $rules = [
            'template_name' => 'required|min_length[3]|max_length[100]',
            // template_path is required, but if file upload is available it will be set later.
            'template_path' => 'required',
            'enterprise_id' => 'required|numeric'
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => implode("<br>", $this->validator->getErrors())
            ]);
        }
        
        // Check if a file is uploaded via the field 'template_file'
        $file = $this->request->getFile('template_file');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Optional: You can generate a random name or keep the original name.
            $newName = $file->getRandomName();
            // Move the file to public/uploads folder.
            $file->move(ROOTPATH . 'public/uploads', $newName);
            // Set the templatePath to the full path (relative to the public folder)
            $templatePath = 'uploads/' . $newName;
        }
        
        $model = new WhatsappDocumentModel();
        if (empty($id)) {
            // Insert new record
            $res = $model->insertDocument($templateName, $templatePath, $enterprise);
            if ($res) {
                return $this->response->setJSON([
                    'status'  => 'success',
                    'message' => 'Document template added successfully'
                ]);
            } else {
                return $this->response->setJSON([
                    'status'  => 'error',
                    'message' => 'Failed to add document template'
                ]);
            }
        } else {
            // Update existing record
            $res = $model->updateDocument($id, $templateName, $templatePath, $enterprise);
            if ($res) {
                return $this->response->setJSON([
                    'status'  => 'success',
                    'message' => 'Document template updated successfully'
                ]);
            } else {
                return $this->response->setJSON([
                    'status'  => 'error',
                    'message' => 'Failed to update document template'
                ]);
            }
        }
    }
    
    /**
     * Soft-delete a document record.
     */
    public function delete()
    {
        $id = $this->request->getPost('whatsapp_document_id');
        $model = new WhatsappDocumentModel();
        $res = $model->softDeleteDocument($id);
        
        if ($res) {
            return $this->response->setJSON([
                'status'  => 'success',
                'message' => 'Document template deleted successfully'
            ]);
        } else {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Failed to delete document template'
            ]);
        }
    }
}
