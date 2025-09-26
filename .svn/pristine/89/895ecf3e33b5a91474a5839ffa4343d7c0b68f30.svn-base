<?php

namespace App\Models;

use CodeIgniter\Model;

class HubLocationModel extends Model
{
    protected $table = 'khm_obj_mst_vehicle_hub_location';
    protected $primaryKey = 'hub_location_id';

    // Allowed fields for insert/update
    protected $allowedFields = [
        'geog_id',
        'hub_location_name',
        'hub_latitude',
        'hub_longitude',
        'enterprise_id',
        'deleted'
    ];

    // You can disable soft deletes if you're managing it manually:
    protected $useSoftDeletes = false;


    public function getAll(): array
    {
        return $this->db
            ->table($this->table . ' AS hl')
            ->select('hl.*, mg.geog_name')
            ->join(
                'khm_loc_mst_geography as mg',
                'mg.geog_id=hl.geog_id',
                'left'
            )
            ->where('hl.deleted', 0)
            ->get()
            ->getResultArray();
    }
}
