<?php namespace App\Models;

use CodeIgniter\Model;

class FacilityCombinedModel extends Model
{
    protected $db;
    
    // Table names
    protected $objectTable   = 'khm_obj_mst';
    protected $facilityTable = 'khm_obj_facility';

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }
    
    /**
     * Insert facility and its corresponding object record.
     */
    public function insertFacility(array $data)
    {
        // Prepare object data (with preset values)
        $objectData = [
            'object_type_id'  => 1, // preset value
            'object_class_id' => 4, // preset value
            'object_name'     => $data['facility_name'],
            'enterprise_id'   => $data['enterprise_id']
        ];

        // Start transaction
        $this->db->transStart();

        // Insert into object table
        $this->db->table($this->objectTable)->insert($objectData);
        $objectId = $this->db->insertID();

        // Prepare facility data using the generated object_id
        $facilityData = [
            'object_id'        => $objectId,
            'facility_name'    => $data['facility_name'],
            'facility_type_id' => $data['facility_type_id'],
            'deleted'          => 0,
            'enterprise_id'    => $data['enterprise_id']
        ];

        // Insert into facility table
        $this->db->table($this->facilityTable)->insert($facilityData);

        $this->db->transComplete();

        if ($this->db->transStatus() === FALSE) {
            return false;
        }

        return [
            'object_id'   => $objectId,
            'facility_id' => $this->db->insertID()
        ];
    }

    /**
     * Retrieve a list of facilities with corresponding object data.
     */
    public function getFacilityList()
    {
        return $this->db->table($this->facilityTable)
                        ->select("{$this->facilityTable}.*, {$this->objectTable}.object_name")
                        ->join($this->objectTable, "{$this->facilityTable}.object_id = {$this->objectTable}.object_id")
                        ->where("{$this->facilityTable}.deleted", 0)
                        ->get()
                        ->getResultArray();
    }
    
    /**
     * Retrieve a single facility record by facility_id.
     */
    public function getFacilityById($id)
    {
        return $this->db->table($this->facilityTable)
                        ->select("{$this->facilityTable}.*, {$this->objectTable}.object_name")
                        ->join($this->objectTable, "{$this->facilityTable}.object_id = {$this->objectTable}.object_id")
                        ->where("{$this->facilityTable}.facility_id", $id)
                        ->where("{$this->facilityTable}.deleted", 0)
                        ->get()
                        ->getRowArray();
    }
    
    /**
     * Update facility record (and corresponding object name).
     */
    public function updateFacility($id, array $data)
    {
        // Get existing facility to obtain object_id
        $facility = $this->getFacilityById($id);
        if(!$facility){
            return false;
        }
        
        $objectId = $facility['object_id'];
        
        // Start transaction
        $this->db->transStart();
        
        // Update the object table record (update object_name)
        $this->db->table($this->objectTable)
                 ->where('object_id', $objectId)
                 ->update(['object_name' => $data['facility_name']]);
                 
        // Update the facility table record
        $this->db->table($this->facilityTable)
                 ->where('facility_id', $id)
                 ->update([
                    'facility_name'    => $data['facility_name'],
                    'facility_type_id' => $data['facility_type_id'],
                    'enterprise_id'    => $data['enterprise_id']
                 ]);
                 
        $this->db->transComplete();
        
        if ($this->db->transStatus() === FALSE) {
            return false;
        }
        
        return true;
    }
    
    /**
     * Soft delete a facility record.
     */
    public function softDeleteFacility($id)
    {
        return $this->db->table($this->facilityTable)
                        ->where('facility_id', $id)
                        ->update(['deleted' => 1]);
    }

    /**
     * Checks if a facility with the given name already exists.
     * If $facilityId is provided, it excludes that record (useful for updates).
     */
    public function checkDuplicateFacility($facilityName, $facilityId = null)
    {
        $builder = $this->db->table($this->facilityTable);
        $builder->where('facility_name', $facilityName)
                ->where('deleted', 0);
        if ($facilityId) {
            $builder->where('facility_id !=', $facilityId);
        }
        return $builder->countAllResults() > 0;
    }
}
