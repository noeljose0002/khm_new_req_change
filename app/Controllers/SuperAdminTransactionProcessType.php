<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\SuperAdminTransactionProcessTypeModel;
use App\Models\Dashboard_m;
use CodeIgniter\HTTP\ResponseInterface;



class SuperAdminTransactionProcessType extends Controller{

    protected $typeModel;
    protected $dashboardModel;


    public function __construct()
    {
        $this->typeModel = new SuperAdminTransactionProcessTypeModel();
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

        return view('masters/super_admin_transaction_type', $data);
    }

     public function list(): ResponseInterface
    {
        $data = $this->typeModel->getAll();
        return $this->response->setJSON(['data' => $data]);
    }

    public function create(): ResponseInterface
    {
        $rules = [
            'prs_type_id' => 'required|integer',
            'prs_name'   => 'required|max_length[50]',
            'deleted'  => 'required|integer',
            'enterprise_id'     => 'required|integer',

        ];

        if (! $this->validate($rules)) {
            return $this->response->setStatusCode(422)
                                   ->setJSON(['errors' => $this->validator->getErrors()]);
        }

        $payload = [
            'prs_type_id' => $this->request->getPost('prs_type_id'),
            'prs_name'       => $this->request->getPost('prs_name'),
            'deleted'     => $this->request->getPost('deleted') ?: null,
            'enterprise_id'     => $this->request->getPost('enterprise_id'),
        ];

        $this->typeModel->insert($payload);
        return $this->response->setJSON(['message' => 'Created successfully']);
    }


       public function edit(int $id): ResponseInterface
    {
        $record = $this->typeModel->find($id);
        if (! $record) {
            return $this->response->setStatusCode(404)
                                   ->setJSON(['error' => 'Record not found']);
        }
        return $this->response->setJSON($record);
    }

     public function update(int $id): ResponseInterface
    {
        $rules = [
            'prs_type_id' => 'required|integer',
            'prs_name'   => 'required|max_length[50]',
            'deleted'  => 'required|integer',
            'enterprise_id'     => 'required|integer',

        ];

        if (! $this->validate($rules)) {
            return $this->response->setStatusCode(422)
                                   ->setJSON(['errors' => $this->validator->getErrors()]);
        }

        $payload = [
            'prs_type_id' => $this->request->getPost('prs_type_id'),
            'prs_name'       => $this->request->getPost('prs_name'),
            'deleted'     => $this->request->getPost('deleted') ?: null,
            'enterprise_id'     => $this->request->getPost('enterprise_id'),
        ];

        $updated = $this->typeModel->update($id,$payload);
         if ($updated === false) {
            return $this->response->setStatusCode(500)
                                   ->setJSON(['error' => 'Update failed']);
        }
        return $this->response->setJSON(['message' => 'Updated successfully']);
    }
     public function delete(int $id): ResponseInterface
     
    {
        $deleted = $this->typeModel->delete($id);
        if (! $deleted) {
            return $this->response->setStatusCode(500)
                                   ->setJSON(['error' => 'Delete failed']);
        }
        return $this->response->setJSON(['message' => 'Deleted successfully']);
    }



}

?> 