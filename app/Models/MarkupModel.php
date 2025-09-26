<?php

namespace App\Models;

use CodeIgniter\Model;

class MarkupModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'khm_obj_mst_mark_up';
    protected $primaryKey       = 'mark_up_id';
    protected $returnType       = 'array';
    protected $useAutoIncrement = true;
    // List of fields that can be set during insert/update
    protected $allowedFields    = ['system', 'mark_up', 'deleted', 'enterprise_id', 'object_id'];

    /**
     * Get only active (non-soft-deleted) records.
     */
    public function getActiveMarkups()
    {
        return $this->where('deleted', 0)->orderBy('mark_up_id', 'DESC')->findAll();
    }

    /**
     * Insert a new record (and create an object in khm_obj_mst).
     */
    public function insertMarkup($system, $markUp)
    {
        // 1) Insert into khm_obj_mst
        $db      = db_connect();
        $builder = $db->table('khm_obj_mst');
        $builder->insert([
            'object_type_id'   => 5,
            'object_class_id'  => 13,
            'object_name'      => $system,
            'deleted'       => 0,
            'enterprise_id'    => 1,
        ]);
        $objectId = $db->insertID();

        // 2) Insert into khm_obj_mst_mark_up
        return $this->insert([
            'system'        => $system,
            'mark_up'       => $markUp,
            'deleted'       => 0,
            'enterprise_id' => 1,
            'object_id'     => $objectId,
        ]);
    }

    /**
     * Update record (and also update khm_obj_mst.object_name).
     */
    public function updateMarkup($markUpId, $system, $markUp)
    {
        $result = $this->update($markUpId, [
            'system'  => $system,
            'mark_up' => $markUp
        ]);

        if ($result !== false) {
            // Also update the related object name in khm_obj_mst
            $db      = db_connect();
            $builder = $db->table('khm_obj_mst');
            $row = $this->find($markUpId);
            if ($row && isset($row['object_id'])) {
                $objectId = $row['object_id'];
                $builder->where('object_id', $objectId)
                        ->update(['object_name' => $system]);
            }
        }
        return $result;
    }

    /**
     * Soft delete: set deleted=1 on mark_up table, and set deleted=1 on khm_obj_mst.
     */
    public function softDelete($markUpId)
    {
        $result = $this->update($markUpId, ['deleted' => 1]);

        $db      = db_connect();
        $builder = $db->table('khm_obj_mst');
        $row = $this->find($markUpId);
        if ($row && isset($row['object_id'])) {
            $objectId = $row['object_id'];
            $builder->where('object_id', $objectId)
                    ->update(['deleted' => 1]);
        }

        return $result;
    }
}
