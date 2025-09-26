<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Dashboard_m;
use App\Models\SuperAdminObjectClassModel;
use CodeIgniter\HTTP\ResponseInterface;



class SuperAdminObjectClass extends Controller
{
    protected $classModel;
    protected $dashboardModel;

    public function __construct()
    {
        $this->classModel = new SuperAdminObjectClassModel();
        $this->dashboardModel = new Dashboard_m;
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

        return view('masters/super_admin_object_class', $data);
    }

    public function list(): ResponseInterface
    {
        $objClass = $this->classModel->getAll();
        return $this->response->setJSON(['data' => $objClass]);
    }

    public function create(): ResponseInterface
    {
        $rules = [
            'object_class_name ' => 'required|max_length[100]',
            'object_class_parent_id' => 'required|integer',
            'enterprise_id' => 'required|integer',
        ];

        if (! $this->validate($rules)) {
            return $this->response->setStatusCode(422)
                ->setJSON(['error' => $this->validator->getErrors()]);
        }
        $payload = [
            'object_class_name' => $this->request->getPost('object_class_name'),
            'object_class_parent_id' => $this->request->getPost('object_class_parent_id'),
            'enterprise_id' => $this->request->getPost('enterprise_id'),
        ];
        $this->classModel->insert($payload);
        return $this->response->setJSON(['message' => 'created successfully']);
    }


    public function edit(int $id): ResponseInterface
    {
        $record = $this->classModel->getOne($id);
        if (! $record) {
            return $this->response->setStatusCode(404)
                ->setJSON(['error' => 'Record not found']);
        }
        return $this->response->setJSON($record);
    }


    public function update(int $id): ResponseInterface
    {
        $rules = [
            'object_class_name ' => 'required|max_length[100]',
            'object_class_parent_id' => 'required|integer',
            'enterprise_id' => 'required|integer',
        ];

        if (! $this->validate($rules)) {
            return $this->response->setStatusCode(422)
                ->setJSON(['error' => $this->validator->getErrors()]);
        }
        $payload = [
            'object_class_name' => $this->request->getPost('object_class_name'),
            'object_class_parent_id' => $this->request->getPost('object_class_parent_id'),
            'enterprise_id' => $this->request->getPost('enterprise_id'),
        ];
        $updated = $this->classModel->update($id, $payload);
        if ($updated === false) {
            return $this->response->setStatusCode(500)
                ->setJSON(['error' => 'updation failed']);
        }
        return $this->response->setJSON(['message' => 'updated successfully']);
    }
    public function delete(int $id): ResponseInterface
    {
        $deleted = $this->classModel->softDelete($id);
        if ($deleted === false) {
            return $this->response->setStatusCode(500)
                ->setJSON(['eror' => 'delete failed']);
        }
        return $this->response->setJSON(['message' => 'Deleted successfully']);
    }
}
