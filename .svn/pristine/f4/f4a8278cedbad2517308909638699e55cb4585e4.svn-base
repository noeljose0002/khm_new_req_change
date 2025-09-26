<?php namespace App\Controllers;

use App\Models\TargetObjectModel;
use CodeIgniter\Controller;
use App\Models\Dashboard_m;

class TargetAjaxController extends Controller
{
    protected $db;

    public function __construct(){
        // Connect to the database using CodeIgniter 4's Database Config.
        $this->db = \Config\Database::connect();
    }

    // Display the main view
    public function index()
    {
        $Dashboard_model = new Dashboard_m();
        $entity_id = session('user_id');
        $active_role = session('active_role');
        $all_roles = $Dashboard_model->get_all_entity_roles($entity_id);
        $all_systems = $Dashboard_model->get_all_systems($entity_id);
        $data['all_systems'] = $all_systems;
        if(!empty($all_roles)){
            $data['all_roles_assn'] = $all_roles;
            $all_menus = $Dashboard_model->get_all_role_menus($active_role);
            if(!empty($all_menus)){
                $data['all_menus'] = $all_menus;
            }
            else{
                $data['all_menus'] = [];
            }
            $all_permissions = $Dashboard_model->get_all_entity_permissions($active_role,3);
            if(!empty($all_permissions)){
                $data['all_permissions'] = $all_permissions;
            }
            else{
                $data['all_permissions'] = [];
            }
            
        }
        else{
            $data['all_roles_assn'] = [];
            $data['all_menus'] = [];
            $data['all_permissions'] = [];
        }
        $parent_menu = $Dashboard_model->get_parent_menus();
        $sub_menu = $Dashboard_model->get_sub_menus();
        $data['parent_menu'] = $parent_menu;
        $data['sub_menu'] = $sub_menu;
        return view('masters/target_ajax_view',$data);
    }

    // Return JSON list of all targets with error handling.
    public function listTargets()
    {
        try {
            $model = new TargetObjectModel();
            $data = $model->getAllTargets();
            return $this->response->setJSON($data);
        } catch (\Exception $e) {
            log_message('error', 'Error in listTargets: ' . $e->getMessage());
            return $this->response->setStatusCode(500)
                                  ->setJSON(['status' => false, 'message' => 'Server error.']);
        }
    }

    // Process AJAX request to add new target(s).
    public function store()
    {
        try {
            $model = new TargetObjectModel();
            $jsonData = $this->request->getJSON(true);
            if ($jsonData && isset($jsonData['entries'])) {
                $lastObjectId = null;
                foreach ($jsonData['entries'] as $data) {
                    if (empty($data['target_name'])) {
                        continue;
                    }
                    // Normalize status
                    $data['target_status'] = isset($data['target_status']) && $data['target_status'] ? 1 : 0;
                    
                    // Check for duplicate target (by name)
                    if ($model->duplicateExists($data['target_name'])) {
                        return $this->response->setJSON([
                            'status'  => false,
                            'message' => 'Duplicate target found: ' . $data['target_name']
                        ]);
                    }
                    
                    $lastObjectId = $model->insertTarget($data);
                    if (!$lastObjectId) {
                        return $this->response->setJSON([
                            'status'  => false,
                            'message' => 'Failed to add target. Duplicate entry may exist.'
                        ]);
                    }
                }
                return $this->response->setJSON([
                    'status'    => true,
                    'message'   => 'Targets added successfully!',
                    'object_id' => $lastObjectId
                ]);
            } else {
                // For single entry POST (if not JSON)
                $data = [
                    'target_name'   => $this->request->getPost('target_name'),
                    'from_date'     => $this->request->getPost('from_date'),
                    'to_date'       => $this->request->getPost('to_date'),
                    'amount'        => $this->request->getPost('amount'),
                    'target_status' => $this->request->getPost('target_status') ? 1 : 0,
                ];
                
                if ($model->duplicateExists($data['target_name'])) {
                    return $this->response->setJSON([
                        'status'  => false,
                        'message' => 'Duplicate target found: ' . $data['target_name']
                    ]);
                }
                
                $object_id = $model->insertTarget($data);
                if (!$object_id) {
                    return $this->response->setJSON([
                        'status'  => false,
                        'message' => 'Failed to add target. Duplicate entry may exist.'
                    ]);
                }
                return $this->response->setJSON([
                    'status'    => true,
                    'message'   => 'Target added successfully!',
                    'object_id' => $object_id
                ]);
            }
        } catch (\Exception $e) {
            log_message('error', 'Error in store: ' . $e->getMessage());
            return $this->response->setStatusCode(500)
                                  ->setJSON(['status' => false, 'message' => 'Server error.']);
        }
    }

    // Return data for a single target for editing.
    public function edit($id)
    {
        try {
            $model = new TargetObjectModel();
            $data = $model->getTargetById($id);
            if ($data) {
                return $this->response->setJSON(['status' => true, 'data' => $data]);
            } else {
                return $this->response->setJSON(['status' => false, 'message' => 'Record not found']);
            }
        } catch (\Exception $e) {
            log_message('error', 'Error in edit: ' . $e->getMessage());
            return $this->response->setStatusCode(500)
                                  ->setJSON(['status' => false, 'message' => 'Server error.']);
        }
    }

    // Update an existing target record.
    public function update()
    {
        try {
            $request = service('request');
            $id = $request->getPost('target_id');
            $data = [
                'target_name'   => $request->getPost('target_name'),
                'from_date'     => $request->getPost('from_date'),
                'to_date'       => $request->getPost('to_date'),
                'amount'        => $request->getPost('amount'),
                'target_status' => $request->getPost('target_status') ? 1 : 0,
            ];

            $model = new TargetObjectModel();
            // In the update method, the duplicate check is performed inside the model.
            $result = $model->updateTarget($id, $data);
            if ($result === true) {
                return $this->response->setJSON(['status' => true, 'message' => 'Target updated successfully!']);
            } else {
                return $this->response->setJSON(['status' => false, 'message' => $result]);
            }
        } catch (\Exception $e) {
            log_message('error', 'Error in update: ' . $e->getMessage());
            return $this->response->setStatusCode(500)
                                  ->setJSON(['status' => false, 'message' => 'Server error.']);
        }
    }

    // Soft delete a target.
    public function delete($target_id)
    {
        // Get a builder for the assignment table.
        $assignBuilder = $this->db->table('khm_entity_mst_target_assign');
        $assignBuilder->where('target_id', $target_id);
        $assignBuilder->where('deleted', 0); // Only consider active assignments
        $assigned = $assignBuilder->countAllResults();
    
        if ($assigned > 0) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'This target is assigned to an employee and cannot be deleted.'
            ]);
        }
    
        // Proceed with deletion if no active assignment exists.
        $targetBuilder = $this->db->table('khm_obj_mst_target');
        $targetBuilder->where('target_id', $target_id);
    
        if ($targetBuilder->delete()) {
            return $this->response->setJSON([
                'status' => true,
                'message' => 'Target has been deleted successfully.'
            ]);
        } else {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Error occurred while deleting the target.'
            ]);
        }
    }
}
