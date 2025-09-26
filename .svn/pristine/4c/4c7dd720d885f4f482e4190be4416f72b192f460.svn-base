<?php

namespace App\Controllers;

use App\Models\SuperAdminCostComponentModel;
use App\Models\Dashboard_m;
use CodeIgniter\RESTful\ResourceController;

class SuperAdminCostComponent extends ResourceController
{
    protected $modelName = 'App\Models\SuperAdminCostComponentModel';
    protected $format    = 'json';
    protected $dashboardModel;

    // Display the static cost component view.
    public function __construct()
    {
       
        $this->dashboardModel= new Dashboard_m();
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

        return view('masters/super_admin_cost_component_view', $data);
    }

    // GET: /api/cost-component/list
    public function list()
    {
        log_message('info', 'Controller: getList called.');
        try {
            $data = $this->model->getList();
            return $this->respond($data);
        } catch (\Exception $e) {
            log_message('error', 'Error in getList: ' . $e->getMessage());
            return $this->failServerError('Error fetching cost components list.');
        }
    }

    // GET: /api/cost-component/loadComponentTypes
    public function loadComponentTypes()
    {
        log_message('info', 'Controller: loadComponentTypes called.');
        try {
            $model = new SuperAdminCostComponentModel();
            $data  = $model->loadComponentTypes();
            return $this->respond($data);
        } catch (\Exception $e) {
            log_message('error', 'Error in loadComponentTypes: ' . $e->getMessage());
            return $this->failServerError('Error loading component types.');
        }
    }

    // GET: /api/cost-component/loadTariffSeekTables?search=...
    public function loadTariffSeekTables()
    {
        log_message('info', 'Controller: loadTariffSeekTables called.');
        try {
            $search = $this->request->getGet('search'); // Optional filter
            $model = new SuperAdminCostComponentModel();
            $data  = $model->loadTariffSeekTables($search);
            return $this->respond($data);
        } catch (\Exception $e) {
            log_message('error', 'Error in loadTariffSeekTables: ' . $e->getMessage());
            return $this->failServerError('Error loading tariff seek tables.');
        }
    }

    // GET: /api/cost-component/loadItineraryTariffFields?table=table_id
    public function loadItineraryTariffFields()
    {
        $tableId = $this->request->getGet('table');
        log_message('info', 'Controller: loadItineraryTariffFields called with table id: ' . $tableId);
        try {
            $model = new SuperAdminCostComponentModel();
            $data  = $model->loadItineraryTariffFields($tableId);
            return $this->respond($data);
        } catch (\Exception $e) {
            log_message('error', 'Error in loadItineraryTariffFields: ' . $e->getMessage());
            return $this->failServerError('Error loading itinerary tariff fields.');
        }
    }

    // GET: /api/cost-component/loadQtySeekTables?search=...
    public function loadQtySeekTables()
    {
        log_message('info', 'Controller: loadQtySeekTables called.');
        try {
            $search = $this->request->getGet('search'); // Optional filter term
            $model = new SuperAdminCostComponentModel();
            $data  = $model->loadQtySeekTables($search);
            return $this->respond($data);
        } catch (\Exception $e) {
            log_message('error', 'Error in loadQtySeekTables: ' . $e->getMessage());
            return $this->failServerError('Error loading quantity seek tables.');
        }
    }

    // GET: /api/cost-component/loadQuantityFields?table=table_id
    public function loadQuantityFields()
    {
        $tableId = $this->request->getGet('table');
        log_message('info', 'Controller: loadQuantityFields called with table id: ' . $tableId);
        try {
            $model = new SuperAdminCostComponentModel();
            $data  = $model->loadQuantityFields($tableId);
            return $this->respond($data);
        } catch (\Exception $e) {
            log_message('error', 'Error in loadQuantityFields: ' . $e->getMessage());
            return $this->failServerError('Error loading quantity fields.');
        }
    }

    // GET: /api/cost-component/loadValueSeekTables?search=...
    public function loadValueSeekTables()
    {
        log_message('info', 'Controller: loadValueSeekTables called.');
        try {
            $search = $this->request->getGet('search'); // Optional filter term
            $model = new SuperAdminCostComponentModel();
            $data  = $model->loadValueSeekTables($search);
            return $this->respond($data);
        } catch (\Exception $e) {
            log_message('error', 'Error in loadValueSeekTables: ' . $e->getMessage());
            return $this->failServerError('Error loading value seek tables.');
        }
    }

    // GET: /api/cost-component/loadValueFields?table=table_id
    public function loadValueFields()
    {
        $tableId = $this->request->getGet('table');
        log_message('info', 'Controller: loadValueFields called with table id: ' . $tableId);
        try {
            $model = new SuperAdminCostComponentModel();
            $data  = $model->loadValueFields($tableId);
            return $this->respond($data);
        } catch (\Exception $e) {
            log_message('error', 'Error in loadValueFields: ' . $e->getMessage());
            return $this->failServerError('Error loading value fields.');
        }
    }

    // GET: /api/cost-component/get?id=#
    public function get()
    {
        $id = $this->request->getGet('id');
        log_message('info', 'Controller: get called for ID: ' . $id);
        try {
            $data = $this->model->getCostComponent($id);
            return $this->respond($data);
        } catch (\Exception $e) {
            log_message('error', 'Error in get: ' . $e->getMessage());
            return $this->failServerError('Error fetching cost component.');
        }
    }

    // POST: /api/cost-component/save
    public function save()
    {
       

        log_message('info', 'Incoming POST keys: ' . implode(', ', array_keys($this->request->getPost())));
        $data = $this->request->getPost();
        $data['enterprise_id'] = 1; // Adjust as needed.

        // Convert multi-select arrays to valid JSON strings.
        if (isset($data['cost_component_type_tariff_seek_table']) && is_array($data['cost_component_type_tariff_seek_table'])) {
            $data['cost_component_type_tariff_seek_table'] = json_encode($data['cost_component_type_tariff_seek_table']);
        }
        if (isset($data['cost_component_type_itinerary_tariff_fields']) && is_array($data['cost_component_type_itinerary_tariff_fields'])) {
            $data['cost_component_type_itinerary_tariff_fields'] = json_encode($data['cost_component_type_itinerary_tariff_fields']);
        }
        if (isset($data['cost_component_type_qty_seek_table']) && is_array($data['cost_component_type_qty_seek_table'])) {
            $data['cost_component_type_qty_seek_table'] = json_encode($data['cost_component_type_qty_seek_table']);
        }
        if (isset($data['cost_component_type_itinerary_qty_fields']) && is_array($data['cost_component_type_itinerary_qty_fields'])) {
            $data['cost_component_type_itinerary_qty_fields'] = json_encode($data['cost_component_type_itinerary_qty_fields']);
        }
        if (isset($data['cost_component_type_value_seek_table']) && is_array($data['cost_component_type_value_seek_table'])) {
            $data['cost_component_type_value_seek_table'] = json_encode($data['cost_component_type_value_seek_table']);
        }
        if (isset($data['cost_component_type_value_seek_field']) && is_array($data['cost_component_type_value_seek_field'])) {
            $data['cost_component_type_value_seek_field'] = json_encode($data['cost_component_type_value_seek_field']);
            log_message('info', 'Encoded value_seek_field: ' . $data['cost_component_type_value_seek_field']);
        }
        
        

        log_message('info', 'Controller: save called with data: ' . json_encode($data));
        try {
            if ($this->model->saveCostComponent($data)) {
                return $this->respond(['status' => 'success']);
            }
            return $this->failServerError('Database error');
        } catch (\Exception $e) {
            log_message('error', 'Error in save: ' . $e->getMessage());
            return $this->failServerError('Error saving cost component.');
        }
    }

    // DELETE: /api/cost-component/delete/(:num) or via POST with id parameter.
    public function delete($id = null)
    {
        // Retrieve ID from URL or POST data.
        $id = $id ?? $this->request->getPost('id');
        log_message('info', 'Controller: delete called for ID: ' . $id);

        try {
            // Fetch the record including soft-deleted ones.
            $record = $this->model->withDeleted()->find($id);
            if (!$record) {
                return $this->failNotFound('Record not found.');
            }

            // Toggle: if record is already soft deleted, restore it.
            if ($record['deleted_at'] !== null) {
                // Restore record by setting deleted_at to NULL.
                $this->model->protect(false)->update($id, ['deleted_at' => null]);
                return $this->respond(['status' => 'success', 'message' => 'Record restored successfully']);
            } else {
                // Soft delete the record.
                $this->model->delete($id);
                return $this->respond(['status' => 'success', 'message' => 'Record soft-deleted successfully']);
            }
        } catch (\Exception $e) {
            log_message('error', 'Error in delete: ' . $e->getMessage());
            return $this->failServerError('Error deleting/restoring cost component.');
        }
    }
}
