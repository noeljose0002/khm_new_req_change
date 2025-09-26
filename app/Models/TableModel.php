<?php
namespace App\Models;

use CodeIgniter\Model;

class TableModel extends Model
{
    // Main table for table information
    protected $table         = 'khm_sys_mst_table_of_tables';
    protected $primaryKey    = 'table_id';
    protected $allowedFields = ['table_name', 'enterprise_id'];
    
    // Fields table name
    protected $tableFields   = 'khm_sys_mst_table_of_table_fields';
    
    // Soft delete configuration for the main table
    protected $useSoftDeletes = true;
    protected $deletedField   = 'deleted_at';

    /**
     * Insert a new table record.
     *
     * @param array $data Data for the main table.
     * @return mixed Inserted table ID or false on failure.
     */
    public function insertTable($data)
    {
        try {
            if ($this->insert($data)) {
                $insertId = $this->getInsertID();
                log_message('debug', 'Inserted Table ID: ' . $insertId);
                return $insertId;
            } else {
                log_message('error', 'Insert Table failed: ' . json_encode($this->errors()));
                return false;
            }
        } catch (\Exception $e) {
            log_message('error', 'Insert Table Error: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Insert a new field record.
     *
     * The $data array should include:
     * - table_field_name
     * - table_field_type
     * - attribute_type
     * - table_id (to associate with the table)
     * - enterprise_id (if needed)
     *
     * @param array $data Data for the field.
     * @return bool True on success, false on failure.
     */
    public function insertField($data)
    {
        try {
            log_message('debug', 'Inserting Field: ' . json_encode($data));
            if ($this->db->table($this->tableFields)->insert($data)) {
                log_message('debug', 'Field inserted successfully.');
                return true;
            } else {
                log_message('error', 'Insert Field failed: ' . json_encode($this->db->error()));
                return false;
            }
        } catch (\Exception $e) {
            log_message('error', 'Insert Field Error: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Retrieve a table along with its associated fields.
     *
     * The SELECT query now also includes the attribute_type field and only retrieves fields that are not soft-deleted.
     *
     * @param int $tableId The table ID to fetch.
     * @return mixed Array of records or false on failure.
     */
    public function getTableWithFields($tableId)
    {
        try {
            $query = $this->db->table($this->table)
                ->select('khm_sys_mst_table_of_tables.*, 
                          khm_sys_mst_table_of_table_fields.table_field_id, 
                          khm_sys_mst_table_of_table_fields.table_field_name, 
                          khm_sys_mst_table_of_table_fields.table_field_type, 
                          khm_sys_mst_table_of_table_fields.attribute_type')
                ->join($this->tableFields, 'khm_sys_mst_table_of_table_fields.table_id = khm_sys_mst_table_of_tables.table_id', 'left')
                ->where('khm_sys_mst_table_of_tables.table_id', $tableId)
                ->where("khm_sys_mst_table_of_table_fields.deleted_at", null)
                ->get();
            
            log_message('debug', 'Fetched Table Data: ' . json_encode($query->getResult()));
            return $query->getResult();
        } catch (\Exception $e) {
            log_message('error', 'Database Query Failed: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Soft delete all fields associated with a given table.
     *
     * @param int $tableId The table ID whose fields should be soft-deleted.
     * @return bool True on success, false on failure.
     */
    public function deleteFields($tableId)
    {
        try {
            log_message('debug', 'Soft deleting fields for table ID: ' . $tableId);
            $data = [
                'deleted_at' => date('Y-m-d H:i:s')
            ];
            $this->db->table($this->tableFields)
                ->where('table_id', $tableId)
                ->update($data);
            log_message('debug', 'Fields soft-deleted successfully for table ID: ' . $tableId);
            return true;
        } catch (\Exception $e) {
            log_message('error', 'Soft Delete Fields Error: ' . $e->getMessage());
            return false;
        }
    }
}
