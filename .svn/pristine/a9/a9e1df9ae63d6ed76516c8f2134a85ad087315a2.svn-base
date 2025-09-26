<?php 
namespace App\Models;

use CodeIgniter\Model;

class Geogdistancecrudmodel extends Model
{
    protected $table = 'khm_loc_mst_geography_distance';
    protected $primaryKey = 'geog_dist_id';
    protected $allowedFields = ['geog_from_id', 'geog_to_id', 'geog_km_distance','deleted'];
    
    // We are NOT using CodeIgniter’s built-in soft delete because our table uses a tinyint field.
    // Instead, we will update the "deleted" field manually.
    
    // Custom method to fetch only active (non-deleted) records
    public function getActive()
    {
        return $this->where('deleted', 0)->findAll();
    }
}
