<?php 
namespace App\Models;
use CodeIgniter\Model;



class SuperAdminCostComponentModel extends Model
{
    protected $table         = 'khm_obj_cost_component';
    protected $primaryKey    = 'cost_component_id';
    protected $allowedFields = [
        'cost_component_type_id',
        'cost_component_type_name',
        'cost_component_type_tariff_seek_table',
        'cost_component_type_itinerary_tariff_fields',  // JSON column
        'cost_component_type_qty_seek_table',
        'cost_component_type_itinerary_qty_fields',     // JSON column for quantity fields
        'cost_component_type_value_seek_table',           // New JSON column for value tables
        'cost_component_type_value_seek_field',           // New JSON column for value fields
        'cost_element_type_expression',
        'enterprise_id',
        'deleted'
    ];
    protected $returnType='array';


    public function getList():array
    {
        return  $this
        ->where('deleted',0)
        ->findAll();
    }

    public function loadComponentTypes()
    {
        log_message('info', 'Fetching component types.');
        $builder = $this->db->table('khm_obj_mst_cost_component_type');
        $builder->select('cost_component_type_id, cost_component_type_name');
        return $builder->get()->getResultArray();
    }

    // Load all tables from khm_sys_mst_table_of_tables with optional filtering.
    public function loadTariffSeekTables($search = null)
    {
        log_message('info', 'Fetching tariff seek tables.');
        $builder = $this->db->table('khm_sys_mst_table_of_tables');
        $builder->select('table_id, table_name');
        if (!empty($search)) {
            $builder->like('table_name', $search);
        }
        return $builder->get()->getResultArray();
    }

    public function loadQtySeekTables($search = null)
    {
        log_message('info', 'Fetching quantity seek tables.');
        $builder = $this->db->table('khm_sys_mst_table_of_tables');
        $builder->select('table_id, table_name');
        if (!empty($search)) {
            $builder->like('table_name', $search);
        }
        return $builder->get()->getResultArray();
    }

    // New: Load value seek tables (same table source as tariff & qty).
    public function loadValueSeekTables($search = null)
    {
        log_message('info', 'Fetching value seek tables.');
        $builder = $this->db->table('khm_sys_mst_table_of_tables');
        $builder->select('table_id, table_name');
        if (!empty($search)) {
            $builder->like('table_name', $search);
        }
        return $builder->get()->getResultArray();
    }

    // Load all fields for a given table id for itinerary tariff fields.
    public function loadItineraryTariffFields($tableId)
    {
        log_message('info', 'Fetching itinerary tariff fields for table id: ' . $tableId);
        $builder = $this->db->table('khm_sys_mst_table_of_table_fields');
        $builder->select('table_field_name');
        $builder->where('table_id', $tableId);
        $query = $builder->get();
        if (!$query) {
            $error = $this->db->error();
            log_message('error', 'Query error in loadItineraryTariffFields: ' . json_encode($error));
            throw new \Exception('Query error: ' . json_encode($error));
        }
        return $query->getResultArray();
    }

    // Load all fields for a given table id for quantity fields.
    public function loadQuantityFields($tableId)
    {
        log_message('info', 'Fetching quantity fields for table id: ' . $tableId);
        $builder = $this->db->table('khm_sys_mst_table_of_table_fields');
        $builder->select('table_field_name');
        $builder->where('table_id', $tableId);
        $query = $builder->get();
        if (!$query) {
            $error = $this->db->error();
            log_message('error', 'Query error in loadQuantityFields: ' . json_encode($error));
            throw new \Exception('Query error: ' . json_encode($error));
        }
        return $query->getResultArray();
    }

    // New: Load all fields for a given table id for value fields.
    public function loadValueFields($tableId)
    {
        log_message('info', 'Fetching value fields for table id: ' . $tableId);
        $builder = $this->db->table('khm_sys_mst_table_of_table_fields');
        $builder->select('table_field_name');
        $builder->where('table_id', $tableId);
        $query = $builder->get();
        if (!$query) {
            $error = $this->db->error();
            log_message('error', 'Query error in loadValueFields: ' . json_encode($error));
            throw new \Exception('Query error: ' . json_encode($error));
        }
        return $query->getResultArray();
    }

    public function getCostComponent($id)
    {
        log_message('info', 'Fetching cost component with ID: ' . $id);
        return $this->find($id);
    }

   public function saveCostComponent($data)
{
    log_message('info', 'Final payload to saveCostComponent: ' . print_r($data, true));
    
    $result = $this->save($data);
    log_message('info', 'Model save() returned: ' . var_export($result, true));
    return $result;
}
}


