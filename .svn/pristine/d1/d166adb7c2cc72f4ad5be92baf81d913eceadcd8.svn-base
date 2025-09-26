<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\SuperAdminEntityPrimaryTypeModel;
use App\Models\Dashboard_m;

class SuperAdminEntityPrimaryType extends Controller
{
    protected $primeModel;
    protected $dashboardModel;

    public function __construct()
    {
        $this->primeModel =  new SuperAdminEntityPrimaryTypeModel();
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

        return view('masters/super_admin_entity_primary_type', $data);
    }

    public function list(): ResponseInterface
    {
        $result = $this->primeModel->getAll();
        return $this->response->setJSON(['data' => $result]);
    }

    public function create(): ResponseInterface
    {
        $rules = [
            'entity_type_id' => 'required|integer',
            'entity_type_name' => 'required|Max_length[100]',
            'enterprise_id' => 'required|integer',
        ];

        if (! $this->validate($rules)) {
            return $this->response->setStatusCode(422)
                ->setJSON(['error' => $this->validator->getErrors()]);
        }

        $payload = [
            'entity_type_id' => $this->request->getPost('entity_type_id'),
            'entity_type_name' => $this->request->getPost('entity_type_name'),
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
        $rules = [
            'entity_type_id' => 'required|integer',
            'entity_type_name' => 'required|Max_length[100]',
            'enterprise_id' => 'required|integer',
        ];

        if (! $this->validate($rules)) {
            return $this->response->setStatusCode(422)
                ->setJSON(['error' => $this->validator->getErrors()]);
        }

        $payload = [
            'entity_type_id' => $this->request->getPost('entity_type_id'),
            'entity_type_name' => $this->request->getPost('entity_type_name'),
            'enterprise_id' => $this->request->getPost('enterprise_id'),
        ];

        $updated = $this->primeModel->update($id,$payload);
        if ($updated === false) {
            $this->response->setStatusCode(500)
                ->setJSON(['error' => 'updation failed']);
        }
        return $this->response->setJSON(['message' => 'updated successfully']);
    }

    public function delete(int $id): ResponseInterface
    {
        $deleted = $this->primeModel->softDelete($id);
        if ($deleted === false) {
            $this->response->setStatusCode(500)
                ->setJSON(['error' => 'delete failed']);
        }
        return $this->response->setJSON(['error' => 'deleted']);
    }
}
