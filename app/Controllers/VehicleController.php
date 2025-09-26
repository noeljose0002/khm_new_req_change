<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\VehicleModel; // Our common model for both vehicle models and seats
use App\Models\Dashboard_m;

class VehicleController extends BaseController
{
    protected $vehicleModel;

    public function __construct()
    {
        // Load the common model
        $this->vehicleModel = new VehicleModel();
    }

    // ----------------------------------------------------------------
    // Display the main view with both vehicle models and seats
    // ----------------------------------------------------------------
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
        $data['models'] = $this->vehicleModel->getVehicleModels();
        $data['seats']  = $this->vehicleModel->getVehicleSeats();
        return view('masters/vehicle_view', $data);
    }

    // ----------------------------------------------------------------
    // Vehicle Model CRUD Operations using common model
    // ----------------------------------------------------------------

    // Insert new vehicle model record
    public function storeModel()
    {
        $postData = $this->request->getPost();
        // Save the vehicle model record (insert)
        $id = $this->vehicleModel->saveVehicleModel($postData);
        return $this->response->setJSON(['id' => $id]);
    }

    // Retrieve a specific vehicle model record for editing
    public function editModel($id)
    {
        $model = $this->vehicleModel->getVehicleModel($id);
        return $this->response->setJSON($model);
    }

    // Update an existing vehicle model record
    public function updateModel()
    {
        $postData = $this->request->getPost();
        // For update, postData should contain 'vehicle_model_id'
        $id = $this->vehicleModel->saveVehicleModel($postData);
        return $this->response->setJSON(['id' => $id]);
    }

    // Soft delete a vehicle model record by setting the 'deleted' flag to 1
    public function deleteModel($id)
    {
        $this->vehicleModel->deleteVehicleModel($id);
        return $this->response->setJSON(['success' => true]);
    }

    // ----------------------------------------------------------------
    // Vehicle Seat CRUD Operations using common model
    // ----------------------------------------------------------------

    // Insert new vehicle seat record
    public function storeSeat()
    {
        $postData = $this->request->getPost();
        $id = $this->vehicleModel->saveVehicleSeat($postData);
        return $this->response->setJSON(['id' => $id]);
    }

    // Retrieve a specific vehicle seat record for editing
    public function editSeat($id)
    {
        $seat = $this->vehicleModel->getVehicleSeat($id);
        return $this->response->setJSON($seat);
    }

    // Update an existing vehicle seat record
    public function updateSeat()
    {
        $postData = $this->request->getPost();
        // For update, postData should contain 'vehicle_seat_id'
        $id = $this->vehicleModel->saveVehicleSeat($postData);
        return $this->response->setJSON(['id' => $id]);
    }

    // Soft delete a vehicle seat record by setting the 'deleted' flag to 1
    public function deleteSeat($id)
    {
        $this->vehicleModel->deleteVehicleSeat($id);
        return $this->response->setJSON(['success' => true]);
    }
}
