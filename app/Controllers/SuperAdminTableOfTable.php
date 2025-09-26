<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\SuperAdminTableOfTableModel;
use App\Models\Dashboard_m;
use CodeIgniter\HTTP\ResponseInterface;

class SuperAdminTableOfTable extends Controller
{

    protected $tableModel;
    protected $dashboardModel;


    public function __construct()
    {
        $this->tableModel = new SuperAdminTableOfTableModel();
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

        return view('masters/super_admin_table_of_tables', $data);
    }

    public function list(): ResponseInterface
    {
        $result =  $this->tableModel->getAll();
        return $this->response->setJSON(['data' => $result]);
    }

    public function create(): ResponseInterface
    {
        $rules = [
            'table_name'    => 'required|max_length[100]|is_unique[khm_sys_mst_table_of_tables.table_name]',
            'enterprise_id' => 'required|integer',
        ];

        $messages = [
            'table_name' => [
                'is_unique' => 'That table name already exists. Please choose another.'
            ],
        ];

        if (! $this->validate($rules, $messages)) {
            return $this->response
                ->setStatusCode(422)
                ->setJSON(['errors' => $this->validator->getErrors()]);
        }

        $payload = [
            'table_id'      => $this->request->getPost('table_id'),
            'table_name'    => $this->request->getPost('table_name'),
            'enterprise_id' => $this->request->getPost('enterprise_id'),
        ];

        $this->tableModel->insert($payload);

        return $this->response
            ->setJSON(['message' => 'Created successfully']);
    }


    public function edit(int $id)
    {

        $record = $this->tableModel->getOne($id);
        if (! $record) {
            return $this->response->setStatusCode(404)
                ->setJSON(['error' => 'Record not found']);
        }
        return $this->response->setJSON($record);
    }


    public function update(int $id): ResponseInterface
    {

        $uniqueRule = "is_unique[khm_sys_mst_table_of_tables.table_name,table_id,{$id}]";

        $rules = [
            'table_name'    => "required|max_length[100]|{$uniqueRule}",
            'enterprise_id' => 'required|integer',
        ];

        $messages = [
            'table_name' => [
                'is_unique' => 'That table name already exists. Please choose another.'
            ],
        ];
        if (! $this->validate($rules, $messages)) {
            return $this->response->setStatusCode(422)
                ->setJSON(['errors' => $this->validator->getErrors()]);
        }

        $payload = [
            'table_id' => $this->request->getPost('table_id'),
            'table_name' => $this->request->getPost('table_name'),
            'enterprise_id' => $this->request->getPost('enterprise_id'),
        ];

        $updated = $this->tableModel->update($id, $payload);
        if (! $updated) {
            return $this->response->setStatusCode(500)
                ->setJSON(['errors' => 'updation failed']);
        }

        return $this->response->setJSON(['message' => 'updated successfully']);
    }

    public function delete(int $id)
    {
        try {
            $success = $this->tableModel->softDelete($id);
        } catch (\Throwable $e) {
            return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
        }

        return $this->response->setJSON([
            'status' => $success ? 'success' : 'error',
            'message' => $success ? 'Deleted successfully' : 'Delete failed'
        ]);
    }
}
