<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\SuperAdminObjectAttributeModel;
use App\Models\Dashboard_m;
use CodeIgniter\HTTP\ResponseInterface;


class SuperAdminObjectAttribute extends Controller
{
    protected $attriModel;
    protected $dashboardModel;



    public function __construct()
    {
        $this->attriModel = new SuperAdminObjectAttributeModel();
        $this->dashboardModel = new Dashboard_m();
    }


    public function index()
    {
        $entityId   = session('user_id');
        $activeRole = session('active_role');

        // Fetch entity roles & systems
        $allRoles  = $this->dashboardModel->get_all_entity_roles($entityId);
        $allSys    = $this->dashboardModel->get_all_systems($entityId);

        // Prepare data for the sidebar/menu
        $data = [
            'all_systems'       => $allSys,
            'all_roles_assn'    => $allRoles ?: [],
            'all_menus'         => $allRoles ? $this->dashboardModel->get_all_role_menus($activeRole) : [],
            'all_permissions'   => $allRoles ? $this->dashboardModel->get_all_entity_permissions($activeRole, 3) : [],
            'parent_menu'       => $this->dashboardModel->get_parent_menus(),
            'sub_menu'          => $this->dashboardModel->get_sub_menus(),
        ];

        return view('masters/super_admin_object_attribute', $data);
    }

    public function list(): ResponseInterface
    {
        $list = $this->attriModel->getAll();
        return $this->response->setJSON(['data' => $list]);
    }

    public function objClass(): ResponseInterface
    {
        $objclass = $this->attriModel->getClass();
        return $this->response->setJSON(['data' => $objclass]);
    }

    public function create(): ResponseInterface
    {
        $rules = [
            'object_class_id' => 'required|integer',
            'object_mst_attribute_name' => 'required|Max_length[100]',
            'enterprise_id' => 'required|integer',
            'object_mst_attribute_data_type' => 'required|Max_length[50]',
        ];

        if (! $this->validate($rules)) {
            return $this->response->setStatusCode(422)
                ->setJSON(['error' => $this->validator->getErrors()]);
        }

        $payload = [
            'object_class_id' => $this->request->getPost('object_class_id'),
            'object_mst_attribute_name' => $this->request->getPost('object_mst_attribute_name'),
            'enterprise_id' => $this->request->getPost('enterprise_id'),
            'object_mst_attribute_data_type' => $this->request->getPost('object_mst_attribute_data_type'),
        ];

        $this->attriModel->insert($payload);
        return $this->response->setJSON(['message' => 'created successfully']);
    }


    public function edit(int $id):ResponseInterface
    {
         $record= $this->attriModel->getOne($id);

         if(! $record){
            return $this->response->setStatusCode(404)
            ->setJSON(['errors'=>'Records not found']);
         }
         return $this->response->setJSON($record);

    }

    public function update(int $id): ResponseInterface
    {
       $rules = [
            'object_class_id' => 'required|integer',
            'object_mst_attribute_name' => 'required|Max_length[100]',
            'enterprise_id' => 'required|integer',
            'object_mst_attribute_data_type' => 'required|Max_length[50]',
        ];

        if (! $this->validate($rules)) {
            return $this->response->setStatusCode(422)
                ->setJSON(['error' => $this->validator->getErrors()]);
        }

         $payload = [
            'object_class_id' => $this->request->getPost('object_class_id'),
            'object_mst_attribute_name' => $this->request->getPost('object_mst_attribute_name'),
            'enterprise_id' => $this->request->getPost('enterprise_id'),
            'object_mst_attribute_data_type' => $this->request->getPost('object_mst_attribute_data_type'),
        ];

        $updated = $this->attriModel->update($id,$payload);
        if($updated===false){
            $this->response->setStatusCode(500)
            ->setJSON(['error'=>'updation failed']);
        }
        return $this->response->setJSON(['message' => 'updated successfully']);
    }

    public function delete(int $id):ResponseInterface
    {
        $deleted = $this->attriModel->softDelete($id);
        if($deleted===false){
            $this->response->setStatusCode(500)
                ->setJSON(['error'=>'delete failed']);
        }
        return $this->response->setJSON(['error'=>'deleted']) ;
    }



}
