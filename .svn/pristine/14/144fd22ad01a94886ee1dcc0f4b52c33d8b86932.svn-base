<?php namespace App\Models;

use CodeIgniter\Model;

class TargetObjectModel
{
    protected $db;

    public function __construct()
    {
        // Connect to the database
        $this->db = \Config\Database::connect();
    }

    // Check if a target (object) with the same name exists (not deleted)
    // Optionally exclude a specific object_id (useful during update)
    public function duplicateExists($target_name, $exclude_object_id = null)
    {
        $builder = $this->db->table('khm_obj_mst');
        $builder->where('object_name', $target_name);
        $builder->where('deleted', 0);
        if ($exclude_object_id) {
            $builder->where('object_id !=', $exclude_object_id);
        }
        return $builder->countAllResults() > 0;
    }

    // Return all non-deleted targets with their associated object name.
    public function getAllTargets()
    {
        $builder = $this->db->table('khm_obj_mst_target t');
        $builder->select('t.*, o.object_name');
        $builder->join('khm_obj_mst o', 'o.object_id = t.object_id');
        $builder->where('t.deleted', 0);
        $builder->where('o.deleted', 0);
        $query = $builder->get();
        return $query->getResult();
    }

    // Get a single target by its target_id (also filtering non-deleted objects).
    public function getTargetById($id)
    {
        $builder = $this->db->table('khm_obj_mst_target t');
        $builder->select('t.*, o.object_name');
        $builder->join('khm_obj_mst o', 'o.object_id = t.object_id');
        $builder->where('t.target_id', $id);
        $builder->where('t.deleted', 0);
        $builder->where('o.deleted', 0);
        $query = $builder->get();
        return $query->getRow();
    }

    // Insert new target (and associated object) record.
    public function insertTarget($data)
    {
        // Check for duplicate target name before inserting
        if ($this->duplicateExists($data['target_name'])) {
            log_message('error', 'Duplicate target attempted: ' . $data['target_name']);
            return false;
        }

        $this->db->transStart();

        // Prepare data for khm_obj_mst.
        $objectData = [
            'object_name'     => $data['target_name'],
            'object_type_id'  => 11,
            'object_class_id' => 11,
            'enterprise_id'   => 1,
            'deleted'      => 0
        ];
        $this->db->table('khm_obj_mst')->insert($objectData);
        if ($this->db->affectedRows() <= 0) {
            log_message('error', 'Failed to insert objectData: ' . json_encode($this->db->error()));
        }
        $object_id = $this->db->insertID();

        // Prepare data for khm_obj_mst_target.
        $targetData = [
            'object_id'         => $object_id,
            'target_name'       => $data['target_name'],
            'target_from_date'  => $data['from_date'],
            'target_to_date'    => $data['to_date'],
            'amount'            => $data['amount'],
            'target_status'     => $data['target_status'],
            'deleted'           => 0,
            'enterprise_id'     => 1
        ];
        $this->db->table('khm_obj_mst_target')->insert($targetData);
        if ($this->db->affectedRows() <= 0) {
            log_message('error', 'Failed to insert targetData: ' . json_encode($this->db->error()));
        }

        $this->db->transComplete();

        if ($this->db->transStatus() === FALSE) {
            log_message('error', 'Transaction failed in insertTarget');
            return false;
        }

        return $object_id;
    }

    // Update an existing target (and update associated object name).
    public function updateTarget($id, $data)
    {
        $target = $this->getTargetById($id);
        if (!$target) {
            return 'Target not found.';
        }

        // If the target name is changed, check for duplicates.
        if (strtolower($data['target_name']) !== strtolower($target->target_name)) {
            if ($this->duplicateExists($data['target_name'], $target->object_id)) {
                return 'Duplicate target found: ' . $data['target_name'];
            }
        }

        $this->db->transStart();
        // Update khm_obj_mst (only updating the object_name here).
        $objectData = [
            'object_name' => $data['target_name']
        ];
        $this->db->table('khm_obj_mst')
            ->where('object_id', $target->object_id)
            ->update($objectData);
        if ($this->db->affectedRows() < 0) {
            log_message('error', 'Failed to update objectData: ' . json_encode($this->db->error()));
        }

        // Update khm_obj_mst_target.
        $targetData = [
            'target_name'       => $data['target_name'],
            'target_from_date'  => $data['from_date'],
            'target_to_date'    => $data['to_date'],
            'amount'            => $data['amount'],
            'target_status'     => $data['target_status']
        ];
        $this->db->table('khm_obj_mst_target')
            ->where('target_id', $id)
            ->update($targetData);
        if ($this->db->affectedRows() < 0) {
            log_message('error', 'Failed to update targetData: ' . json_encode($this->db->error()));
        }

        $this->db->transComplete();

        if ($this->db->transStatus() === FALSE) {
            log_message('error', 'Transaction failed in updateTarget');
            return 'Transaction failed while updating.';
        }

        return true;
    }

    // Soft delete a target (update flags in both tables).
    public function softDeleteTarget($id)
    {
        $target = $this->getTargetById($id);
        if (!$target) {
            return false;
        }
        $this->db->transStart();
        $this->db->table('khm_obj_mst_target')
            ->where('target_id', $id)
            ->update(['deleted' => 1]);
        $this->db->table('khm_obj_mst')
            ->where('object_id', $target->object_id)
            ->update(['deleted' => 1]);
        $this->db->transComplete();
        if ($this->db->transStatus() === FALSE) {
            log_message('error', 'Transaction failed in softDeleteTarget');
            return false;
        }
        return true;
    }
}
