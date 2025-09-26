<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\SuperAdminTableOfTableFieldsModel;
use App\Models\SuperAdminTableOfTableModel;
use App\Models\Dashboard_m;
use CodeIgniter\HTTP\ResponseInterface;

class SuperAdminTableOfTableFields extends Controller
{
    protected $tableModel;
    protected $tablefieldModel;
    protected $dashboardModel;


    public function __construct()
    {
        $this->tableModel = new SuperAdminTableOfTableModel();
        $this->tablefieldModel = new SuperAdminTableOfTableFieldsModel();
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

        return view('masters/super_admin_table_of_table_fields', $data);
    }

    public function list(): ResponseInterface
    {
        $result =  $this->tablefieldModel->getAll();
        return $this->response->setJSON(['data' => $result]);
    }
    public function list2(): ResponseInterface
    {
        $result =  $this->tablefieldModel->getTable();
        return $this->response->setJSON(['data' => $result]);
    }


    public function create(): ResponseInterface
    {

        $rules = [
            'table_field_type' => 'required|Max_length[100]',
            'table_field_id ' => 'required|integer',
            'table_id'=>'required|integer',
            'enterprise_id'=>'required|integer',
        ];
        if (! $this->validate($rules)) {
            return $this->response->setStatusCode(422)
                ->setJSON(['errors' => $this->validator->getErrors()]);
        }

        $payload = [
            'table_field_id'=> $this->request->getPost('table_field_id'),
            'table_field_name'=> $this->request->getPost('table_field_name'),

            'table_id' => $this->request->getPost('table_id'),
            'table_field_type' => $this->request->getPost('table_field_type'),
            'enterprise_id' => $this->request->getPost('enterprise_id'),
        ];

        $this->tablefieldModel->insert($payload);

        return $this->response->setJSON(['message' => 'created successfully']);
    }

    public function edit(int $id)
    {

        $record = $this->tablefieldModel->getOne($id);
        if (! $record) {
            return $this->response->setStatusCode(404)
                ->setJSON(['error' => 'Record not found']);
        }
        return $this->response->setJSON($record);
    }


    public function update(int $id): ResponseInterface
    {

        $rules = [
            'table_field_type' => 'required|Max_length[100]',
            'table_field_id ' => 'required|integer',
            'table_id'=>'required|integer',
            'enterprise_id'=>'required|integer',
        ];
        if (! $this->validate($rules)) {
            return $this->response->setStatusCode(422)
                ->setJSON(['errors' => $this->validator->getErrors()]);
        }

        $payload = [
            'table_field_id'=> $this->request->getPost('table_field_id'),
            'table_field_name'=> $this->request->getPost('table_field_name'),
            'table_id' => $this->request->getPost('table_id'),
            'table_field_type' => $this->request->getPost('table_field_type'),
            'enterprise_id' => $this->request->getPost('enterprise_id'),
        ];

        $updated = $this->tablefieldModel->update($id, $payload);
        if (! $updated) {
            return $this->response->setStatusCode(500)
                ->setJSON(['errors' => 'updation failed']);
        }

        return $this->response->setJSON(['message' => 'updated successfully']);
    }

    public function delete(int $id)
    {
        try {
            $success = $this->tablefieldModel->softDelete($id);
        } catch (\Throwable $e) {
            return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
        }

        return $this->response->setJSON([
            'status' => $success ? 'success' : 'error',
            'message' => $success ? 'Deleted successfully' : 'Delete failed'
        ]);
    }
}
