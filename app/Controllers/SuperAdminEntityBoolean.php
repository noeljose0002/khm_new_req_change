<?php
namespace App\Controllers;

use App\Models\SuperAdminEntityBooleanModel;
use App\Models\Dashboard_m;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\ResponseInterface;

class SuperAdminEntityBoolean extends Controller
{
    protected $boolModel;
    protected $dashboardModel;

    public function __construct()
    {
        $this->boolModel = new SuperAdminEntityBooleanModel();
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

        return view('masters/super_admin_entity_boolean', $data);
    
    }

    public function list():ResponseInterface
    {
        $entbool= $this->boolModel->getAll();
        return $this->response->setJSON(['data'=>$entbool]);
    }
    public function entClass():ResponseInterface
    {
        $entclass= $this->boolModel->getClass();
        return $this->response->setJSON(['data'=>$entclass]);
    }

    public function create():ResponseInterface
    {
        $rules = [
            'boolean_name'=>'required|max_length[100]',
            'enterprise_id'=>'required|integer',
            'entity_class_id'=>'required|integer',
        ];

        if(! $this->validate($rules)) {
            return $this->response->setStatusCode(422)->setJSON(['errors'=>$this->validator->getErrors()]);
            
            }

        $payload=[
            'boolean_name'=> $this->request->getPost('boolean_name'),
            'enterprise_id'=>$this->request->getPost('enterprise_id'),
            'entity_class_id'=>$this->request->getPost('entity_class_id'),

            
        ];
        $this->boolModel->insert($payload);

        return $this->response->setJSON(['message'=>'boolean created successfully']);
    }

    public function edit(int $id): ResponseInterface
    {
        $record = $this->boolModel->getOne($id);
        if (! $record) {
            return $this->response->setStatusCode(404)
                                   ->setJSON(['error' => 'Record not found']);
        }
        return $this->response->setJSON($record);
    }


      public function update($id):ResponseInterface
    {
        $rules = [
            'boolean_name'=>'required|max_length[100]',
            'enterprise_id'=>'required|integer',
            'entity_class_id'=>'required|integer',
        ];

        if(! $this->validate($rules)) {
            return $this->response->setStatusCode(422)->setJSON(['errors'=>$this->validator->getErrors()]);
            
            }

        $payload=[
            'boolean_name'=> $this->request->getPost('boolean_name'),
            'enterprise_id'=>$this->request->getPost('enterprise_id'),
            'entity_class_id'=>$this->request->getPost('entity_class_id'),

            
        ];
        $updated = $this->boolModel->update($id,$payload);
        if($updated===false){
            return $this->response->setStatusCode(500)
                                    ->setJSON(['error'=>'updation failed']);
        }

        return $this->response->setJSON(['message'=>'boolean updated successfully']);
    }

    public function delete(int $id):ResponseInterface
    {

        $deleted = $this->boolModel->softDelete($id);
        if (! $deleted) {
            return $this->response->setStatusCode(500)
                                    ->setJSON(['error'=>'Delete failed']);
        }
        return $this->response->setJSON(['message'=>'Deleted successfully']);

    }
    


}

?>