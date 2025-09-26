<?php

namespace App\Models;

use CodeIgniter\Model;

class TaxModel extends Model
{
    protected $db;
    
    // Table names - update the tax table name here
    protected $objectTable = 'khm_obj_mst';
    protected $taxTable    = 'khm_obj_tax';

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    /**
     * Create a new tax record along with its corresponding object record.
     *
     * @param array $data Associative array containing both object and tax details.
     * @return array ['success' => message] on success or ['error' => error message] on failure.
     */
    public function createTax(array $data)
    {
        $this->db->transStart();

        // Force object_type_id and object_class_id to 11.
        $data['object_type_id']  = 11;
        $data['object_class_id'] = 11;

        // Data for object table (khm_obj_mst)
        $objectData = [
            'object_type_id'     => $data['object_type_id'],
            'object_class_id'    => $data['object_class_id'],
            'object_parent_id'   => $data['object_parent_id'] ?? null,
            'object_location_id' => $data['object_location_id'] ?? null,
            // Use tax_name as object_name (varchar(100))
            'object_name'        => $data['tax_name'],
            'enterprise_id'      => $data['enterprise_id'],
            // Optional fields if provided:
            'object_email'       => $data['object_email'] ?? null,
            'object_address'     => $data['object_address'] ?? null,
            'object_ph_no'       => $data['object_ph_no'] ?? null,
            'deleted'         => 0
        ];

        // Insert into object table
        $this->db->table($this->objectTable)->insert($objectData);
        $object_id = $this->db->insertID();

        // Data for tax table (khm_obj_tax)
        $taxData = [
            'object_id'     => $object_id,
            'tax_name'      => $data['tax_name'],  // tax_name is varchar(100)
            'tax'           => $data['tax'],
            'b2b'           => $data['b2b'],
            'b2c'           => $data['b2c'],
            'deleted'       => 0,
            'enterprise_id' => $data['enterprise_id'],
        ];

        // Insert into tax table
        $this->db->table($this->taxTable)->insert($taxData);

        $this->db->transComplete();

        if ($this->db->transStatus() === false) {
            return ['error' => 'Transaction failed, data not saved.'];
        }

        return ['success' => 'Tax record created successfully.'];
    }

    /**
     * Update a tax record along with its corresponding object record.
     *
     * @param int   $tax_id The tax record ID.
     * @param array $data   Associative array containing updated details.
     * @return array ['success' => message] on success or ['error' => error message] on failure.
     */
    public function updateTax(int $tax_id, array $data)
    {
        // Retrieve the current tax record to get its object_id.
        $taxRecord = $this->db->table($this->taxTable)
                              ->where('tax_id', $tax_id)
                              ->get()
                              ->getRowArray();

        if (!$taxRecord) {
            return ['error' => 'Tax record not found.'];
        }

        $object_id = $taxRecord['object_id'];

        $this->db->transStart();

        // Update tax table
        $taxData = [
            'tax_name'      => $data['tax_name'],
            'tax'           => $data['tax'],
            'b2b'           => $data['b2b'],
            'b2c'           => $data['b2c'],
            'enterprise_id' => $data['enterprise_id'],
        ];
        $this->db->table($this->taxTable)
                 ->where('tax_id', $tax_id)
                 ->update($taxData);

        // Update object table (object_name should match tax_name)
        $objectData = [
            'object_name'   => $data['tax_name'],
            'enterprise_id' => $data['enterprise_id'],
        ];
        $this->db->table($this->objectTable)
                 ->where('object_id', $object_id)
                 ->update($objectData);

        $this->db->transComplete();

        if ($this->db->transStatus() === false) {
            return ['error' => 'Transaction failed, update not completed.'];
        }

        return ['success' => 'Tax record updated successfully.'];
    }

    /**
     * Soft delete a tax record and its corresponding object record.
     * Instead of physically deleting rows, mark them as deleted.
     *
     * @param int $tax_id The tax record ID.
     * @return array ['success' => message] on success or ['error' => error message] on failure.
     */
    public function deleteTax(int $tax_id)
    {
        // Retrieve tax record to determine object_id.
        $taxRecord = $this->db->table($this->taxTable)
                              ->where('tax_id', $tax_id)
                              ->get()
                              ->getRowArray();

        if (!$taxRecord) {
            return ['error' => 'Tax record not found.'];
        }

        $object_id = $taxRecord['object_id'];

        $this->db->transStart();

        // Soft delete in tax table: set the "deleted" flag to 1.
        $this->db->table($this->taxTable)
                 ->where('tax_id', $tax_id)
                 ->update(['deleted' => 1]);

        // Soft delete in object table: update "deleted" with current timestamp.
        $this->db->table($this->objectTable)
                 ->where('object_id', $object_id)
                 ->update(['deleted' => time()]);

        $this->db->transComplete();

        if ($this->db->transStatus() === false) {
            return ['error' => 'Transaction failed, deletion not completed.'];
        }

        return ['success' => 'Tax record deleted successfully.'];
    }

    /**
     * Get all tax records along with related object data.
     * Only fetch records that are not soft deleted.
     *
     * @return array Array of records.
     */
    public function getAllTaxes()
    {
        // Join tax and object tables.
        $builder = $this->db->table($this->taxTable . ' t');
        $builder->select('t.*, o.object_name');
        $builder->join($this->objectTable . ' o', 'o.object_id = t.object_id', 'left');
        // Exclude soft-deleted records in tax table
        $builder->where('t.deleted', 0);
        $query = $builder->get();

        return $query->getResultArray();
    }
}
