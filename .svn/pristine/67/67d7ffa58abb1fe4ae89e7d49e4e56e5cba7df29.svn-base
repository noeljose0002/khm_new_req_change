<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SuperAdminRoleModel;
use App\Models\Dashboard_m;
use CodeIgniter\HTTP\ResponseInterface;

class SuperAdminRole extends BaseController
{
    /** @var SuperAdminRoleModel */
    protected $roleModel;
    /** @var Dashboard_m */
    protected $dashboardModel;

    public function __construct()
    {
        $this->roleModel      = new SuperAdminRoleModel();
        $this->dashboardModel = new Dashboard_m();
    }

    /**
     * Show the main page (loads your view with form + datatable)
     */
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

        return view('masters/super_admin_roles', $data);
    }

    /**
     * Return JSON list of all roles
     */
    public function list(): \CodeIgniter\HTTP\ResponseInterface
    {
        $roles = $this->roleModel->getAllRoles();
        return $this->response->setJSON(['data' => $roles]);
    }

    /**
     * Create a new role
     */
    public function create(): \CodeIgniter\HTTP\ResponseInterface
    {
        $post = $this->request->getPost([
            'role_name', 'parent_id', 'hierarchy_id', 'enterprise_id'
        ]);

        if ($this->roleModel->insert($post) === false) {
            return $this->response
                        ->setStatusCode(ResponseInterface::HTTP_UNPROCESSABLE_ENTITY)
                        ->setJSON(['errors' => $this->roleModel->errors()]);
        }

        return $this->response->setJSON(['message' => 'Role created']);
    }

    /**
     * Fetch one role by ID (for edit form)
     */
    public function edit(int $id): \CodeIgniter\HTTP\ResponseInterface
    {
        $role = $this->roleModel->getRole($id);
        if (! $role) {
            return $this->response
                        ->setStatusCode(ResponseInterface::HTTP_NOT_FOUND)
                        ->setJSON(['error' => 'Role not found']);
        }

        return $this->response->setJSON($role);
    }

    /**
     * Update an existing role
     */
    public function update(int $id): \CodeIgniter\HTTP\ResponseInterface
    {
        $input = $this->request->getRawInput();
        $data  = [
             'role_id'       => $id,    
            'role_name'     => $input['role_name']     ?? null,
            'parent_id'     => $input['parent_id']     ?? null,
            'hierarchy_id'  => $input['hierarchy_id']  ?? null,
            'enterprise_id' => $input['enterprise_id'] ?? null,
        ];

        if ($this->roleModel->update($id, $data) === false) {
            return $this->response
                        ->setStatusCode(ResponseInterface::HTTP_UNPROCESSABLE_ENTITY)//this equal to 422
                        ->setJSON(['errors' => $this->roleModel->errors()]);
        }

        return $this->response->setJSON(['message' => 'Role updated']);
    }

    /**
     * Delete a role
     */


    public function delete(int $id): \CodeIgniter\HTTP\ResponseInterface
    {
        $this->roleModel->softDelete($id);
        
        return $this->response->setJSON(['message' => 'Role deleted']);
    }
}
 