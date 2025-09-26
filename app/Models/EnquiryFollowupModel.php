<?php

namespace App\Models;

use CodeIgniter\Model;

class EnquiryFollowupModel extends Model
{
    // Define table names if needed
    protected $table      = 'khm_obj_mst';
    protected $primaryKey = 'object_id';

    // Allowed fields for enquiries (if you need them for inserts/updates)
    protected $allowedFields = ['object_name', 'object_class_id', 'enterprise_id', "deleted"];

    /**
     * Get enquiries where object_class_id = 10
     */
    public function getEnquiries()
    {
        return $this->where('object_class_id', 10)
            ->where('deleted !=', 1)
            ->findAll();
    }

    /**
     * Get active followup types for a given enterprise
     */
    public function getActiveFollowupTypes($enterprise_id)
    {
        // Since followup types are stored in a different table, we query it separately.
        $builder = $this->db->table('khm_obj_mst_followup_type');
        $builder->select('*');
        $builder->where('active', 1);
        $builder->where('enterprise_id', $enterprise_id);
        $query = $builder->get();
        return $query->getResultArray();
    }
}
