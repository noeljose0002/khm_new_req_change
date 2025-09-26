<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\SuperAdminObjectPrimaryTypeModel;
use App\Models\Dashboard_m;

class SuperAdminObjectPrimaryType extends Controller
{
    protected $primeModel;
    protected $dashboardModel;

    public function __construct()
    {
        $this->primeModel =  new SuperAdminObjectPrimaryTypeModel();
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

        return view('masters/super_admin_object_primary_type', $data);
    }

    public function list(): ResponseInterface
    {
        $result = $this->primeModel->getAll();
        return $this->response->setJSON(['data' => $result]);
    }

    public function create(): ResponseInterface
    {

        $rules = [

            'object_type_name' => 'required|Max_length[100]|is_unique[khm_obj_mst_primary_type.object_type_name]',
            'enterprise_id' => 'required|integer',
        ];
        $messages = [
            'object_type_name' => [
                'is_unique' => 'That table name already exists. Please choose another.'
            ],
        ];

        if (! $this->validate($rules, $messages)) {
            return $this->response->setStatusCode(422)
                ->setJSON(['error' => $this->validator->getErrors()]);
        }

        $payload = [
            'object_type_id' => $this->request->getPost('object_type_id'),
            'object_type_name' => $this->request->getPost('object_type_name'),
            'enterprise_id' => $this->request->getPost('enterprise_id'),
        ];

        $this->primeModel->insert($payload);
        return $this->response->setJSON(['message' => 'created successfully']);
    }


    public function edit(int $id): ResponseInterface
    {
        $record = $this->primeModel->getOne($id);

        if (! $record) {
            return $this->response->setStatusCode(404)
                ->setJSON(['errors' => 'Records not found']);
        }
        return $this->response->setJSON($record);
    }

    public function update(int $id): ResponseInterface
    {
        $uniqueRule = "is_unique[khm_obj_mst_primary_type.object_type_name,object_type_id,{$id}]";

        $rules = [
            'object_type_name' => "required|max_length[100]|{$uniqueRule}",
            'enterprise_id' => 'required|integer',
        ];

        $messages = [
            'object_type_name' => [
                'is_unique' => 'That object type name already exists. Please choose another.'
            ],
        ];

        if (!$this->validate($rules, $messages)) {
            return $this->response->setStatusCode(422)
                ->setJSON(['error' => $this->validator->getErrors()]);
        }

        $payload = [
            'object_type_id' => $id, // Or remove this — you already have $id!
            'object_type_name' => $this->request->getPost('object_type_name'),
            'enterprise_id' => $this->request->getPost('enterprise_id'),
        ];

        $updated = $this->primeModel->update($id, $payload);
        if ($updated === false) {
            return $this->response->setStatusCode(500)
                ->setJSON(['error' => 'Update failed']);
        }

        return $this->response->setJSON(['message' => 'Updated successfully']);
    }


    public function delete(int $id): ResponseInterface
    {
        $deleted = $this->primeModel->softDelete($id);

        if ($deleted === false) {
            return $this->response->setStatusCode(500)
                ->setJSON(['status' => 'error', 'message' => 'Delete failed']);
        }

        return $this->response->setJSON(['status' => 'success', 'message' => 'Deleted successfully']);
    }
}
