<?php

namespace App\Models;

use CodeIgniter\Model;

class TaxRateModel extends Model
{
    protected $db;
    
    // Table names
    protected $objectTable = 'khm_obj_mst';
    protected $taxRateTable = 'khm_obj_tax_rate';

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    /**
     * Check if a duplicate entry exists.
     *
     * @param array $data Data from the form (tax_rate, applicable_hotel_range_from, applicable_hotel_range_to, enterprise_id)
     * @param int|null $exclude_id If provided, exclude this record from the check (useful for updates)
     * @return bool
     */
    public function duplicateEntryExists(array $data, $exclude_id = null)
    {
        $builder = $this->db->table($this->taxRateTable);
        $builder->where('tax_rate_percent', $data['tax_rate']);
        $builder->where('applicable_hotel_range_from', $data['applicable_hotel_range_from']);
        $builder->where('applicable_hotel_range_to', $data['applicable_hotel_range_to']);
        $builder->where('enterprise_id', $data['enterprise_id']);
        $builder->where('deleted', 0);
        if ($exclude_id !== null) {
            $builder->where('tax_rate_id !=', $exclude_id);
        }
        $query = $builder->get();
        return ($query->getNumRows() > 0);
    }

    /**
     * Create a new tax rate record along with its corresponding object record.
     *
     * @param array $data
     * @return array ['success' => message] or ['error' => error message]
     */
    public function createTaxRate(array $data)
    {
        // Check for duplicate entry first.
        if ($this->duplicateEntryExists($data)) {
            return ['error' => 'Duplicate entry exists.'];
        }
        
        $this->db->transStart();

        // Force object_type_id and object_class_id
        $data['object_type_id']  = 11;
        $data['object_class_id'] = 12;

        // Data for object table (khm_obj_mst)
        $objectData = [
            'object_type_id'     => $data['object_type_id'],
            'object_class_id'    => $data['object_class_id'],
            'object_parent_id'   => $data['object_parent_id'] ?? null,
            'object_location_id' => $data['object_location_id'] ?? null,
            'object_name'        => $data['tax_rate'] . '% Tax Rate',
            'enterprise_id'      => $data['enterprise_id'],
            'object_email'       => $data['object_email'] ?? null,
            'object_address'     => $data['object_address'] ?? null,
            'object_ph_no'       => $data['object_ph_no'] ?? null,
            'deleted'         => 0
        ];

        $this->db->table($this->objectTable)->insert($objectData);
        $object_id = $this->db->insertID();

        // Data for tax rate table (khm_obj_tax_rate)
        $taxRateData = [
            'object_id'                   => $object_id,
            'tax_rate_percent'            => $data['tax_rate'],
            'applicable_hotel_range_from' => $data['applicable_hotel_range_from'],
            'applicable_hotel_range_to'   => $data['applicable_hotel_range_to'],
            'deleted'                     => 0,
            'enterprise_id'               => $data['enterprise_id']
        ];

        $this->db->table($this->taxRateTable)->insert($taxRateData);

        $this->db->transComplete();

        if ($this->db->transStatus() === false) {
            return ['error' => 'Transaction failed, tax rate not saved.'];
        }

        return ['success' => 'Tax rate created successfully.'];
    }

    /**
     * Update an existing tax rate record along with its corresponding object record.
     *
     * @param int $tax_rate_id
     * @param array $data Expected keys: tax_rate, applicable_hotel_range_from, applicable_hotel_range_to, enterprise_id
     * @return array
     */
    public function updateTaxRate(int $tax_rate_id, array $data)
    {
        // Check for duplicate entry, excluding this record
        if ($this->duplicateEntryExists($data, $tax_rate_id)) {
            return ['error' => 'Duplicate entry exists.'];
        }

        // Retrieve the current tax rate record to get its object_id.
        $taxRateRecord = $this->db->table($this->taxRateTable)
                                  ->where('tax_rate_id', $tax_rate_id)
                                  ->get()
                                  ->getRowArray();

        if (!$taxRateRecord) {
            return ['error' => 'Tax rate record not found.'];
        }

        $object_id = $taxRateRecord['object_id'];

        $this->db->transStart();

        // Update tax rate table using the updated column name
        $builder = $this->db->table($this->taxRateTable);
        $builder->set('tax_rate_percent', $data['tax_rate']);
        $builder->set('applicable_hotel_range_from', $data['applicable_hotel_range_from']);
        $builder->set('applicable_hotel_range_to', $data['applicable_hotel_range_to']);
        $builder->set('enterprise_id', $data['enterprise_id']);
        $builder->where('tax_rate_id', $tax_rate_id);
        $builder->update();

        // Update object table for consistency
        $this->db->table($this->objectTable)
                 ->where('object_id', $object_id)
                 ->update([
                     'object_name'   => $data['tax_rate'] . '% Tax Rate',
                     'enterprise_id' => $data['enterprise_id']
                 ]);

        $this->db->transComplete();

        if ($this->db->transStatus() === false) {
            return ['error' => 'Transaction failed, update not completed.'];
        }

        return ['success' => 'Tax rate updated successfully.'];
    }

    /**
     * Soft delete a tax rate record and its corresponding object record.
     *
     * @param int $tax_rate_id
     * @return array
     */
    public function deleteTaxRate(int $tax_rate_id)
    {
        // Retrieve the tax rate record to get its object_id.
        $taxRateRecord = $this->db->table($this->taxRateTable)
                                  ->where('tax_rate_id', $tax_rate_id)
                                  ->get()
                                  ->getRowArray();

        if (!$taxRateRecord) {
            return ['error' => 'Tax rate record not found.'];
        }

        $object_id = $taxRateRecord['object_id'];

        $this->db->transStart();

        $this->db->table($this->taxRateTable)
                 ->where('tax_rate_id', $tax_rate_id)
                 ->update(['deleted' => 1]);

        $this->db->table($this->objectTable)
                 ->where('object_id', $object_id)
                 ->update(['deleted' => time()]);

        $this->db->transComplete();

        if ($this->db->transStatus() === false) {
            return ['error' => 'Transaction failed, deletion not completed.'];
        }

        return ['success' => 'Tax rate deleted successfully.'];
    }

    /**
     * Retrieve all tax rate records (that are not soft deleted) with related object data.
     *
     * @return array
     */
    public function getAllTaxRates()
    {
        $builder = $this->db->table($this->taxRateTable . ' tr');
        $builder->select('tr.*, o.object_name');
        $builder->join($this->objectTable . ' o', 'o.object_id = tr.object_id', 'left');
        $builder->where('tr.deleted', 0);
        $query = $builder->get();
        return $query->getResultArray();
    }
}
