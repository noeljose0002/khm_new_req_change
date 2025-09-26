<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\SuperAdminEnquiryStatusModel;
use App\Models\Dashboard_m;
use CodeIgniter\HTTP\ResponseInterface;

class SuperAdminEnquiryStatus extends Controller
{
    protected $statusModel;
    protected $dashboardModel;


    public function __construct()
    {
        $this->statusModel = new SuperAdminEnquiryStatusModel();
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

        return view('masters/super_admin_status', $data);
    }
    public function list(): ResponseInterface
    {
        $data = $this->statusModel->getAll();
        return $this->response->setJSON(['data' => $data]);
    }

    public function create(): ResponseInterface
    {
        $rules = [
            'status_name' => 'required|max_length[50]',
            'is_active'   =>  'required|integer',
            'enterprise_id' => 'required|integer',
        ];

        if (! $this->validate($rules)) {
            return $this->response->setStatusCode(422)->setJSON(['errors' => $this->validator->getErrors()]);
        }

        $payload = [
            'status_name'    => $this->request->getPost('status_name'),
            'is_active'      => $this->request->getPost('is_active'),
            'enterprise_id'  => $this->request->getPost('enterprise_id'),
        ];

        // Step 3: Insert into database
        $this->statusModel->insert($payload);

        // Step 4: Return success message
        return $this->response->setJSON(['message' => 'Status created successfully']);
    }

     public function edit(int $id): ResponseInterface
    {
        $record = $this->statusModel->getOne($id);
        if (! $record) {
            return $this->response->setStatusCode(404)
                                   ->setJSON(['error' => 'Record not found']);
        }
        return $this->response->setJSON($record);
    }

    public function update(int $id): ResponseInterface
    {
        $rules = [
            'status_name' => 'required|max_length[50]',
            'is_active'   =>  'required|integer',
            'enterprise_id' => 'required|integer',
        ];

        if (! $this->validate($rules)) {
            return $this->response->setStatusCode(422)->setJSON(['errors' => $this->validator->getErrors()]);
        }

        $payload = [
            'status_name'    => $this->request->getPost('status_name'),
            'is_active'      => $this->request->getPost('is_active'),
            'enterprise_id'  => $this->request->getPost('enterprise_id'),
        ];

        // Step 3: Insert into database
         $updated= $this->statusModel->update($id,$payload);
         if($updated===false){
            return $this->response->setStatusCode(500)
                            ->setJSON(['error'=>'updated failed']);
             }

        // Step 4: Return success message
        return $this->response->setJSON(['message' => 'Status created successfully']);
    }

     public function delete(int $id): ResponseInterface
    {
        $deleted = $this->statusModel->delete($id);
        if (! $deleted) {
            return $this->response->setStatusCode(500)
                                   ->setJSON(['error' => 'Delete failed']);
        }
        return $this->response->setJSON(['message' => 'Deleted successfully']);
    }


}
