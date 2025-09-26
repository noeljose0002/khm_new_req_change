<?php namespace App\Models;

use CodeIgniter\Model;

class VehicleModel extends Model
{
    // Define table names for both functionalities
    protected $vehicleModelTable = 'khm_obj_mst_vehicle_model';
    protected $vehicleSeatTable  = 'khm_obj_mst_vehicle_seat';

    protected $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    /*------------------------------------------------
    | Vehicle Model Methods
    ------------------------------------------------*/

    // Retrieve all vehicle models that are not soft-deleted
    public function getVehicleModels()
    {
        return $this->db->table($this->vehicleModelTable)
                        ->where('deleted', 0)
                        ->get()
                        ->getResult();
    }

    // Retrieve a single vehicle model by its ID
    public function getVehicleModel($id)
    {
        return $this->db->table($this->vehicleModelTable)
                        ->where('deleted', 0)
                        ->where('vehicle_model_id', $id)
                        ->get()
                        ->getRow();
    }

    // Save a vehicle model record (insert or update)
    public function saveVehicleModel($data)
    {
        // Ensure soft delete flag is set
        $data['deleted'] = 0;

        if (isset($data['vehicle_model_id']) && !empty($data['vehicle_model_id'])) {
            // Update the record
            $this->db->table($this->vehicleModelTable)
                     ->where('vehicle_model_id', $data['vehicle_model_id'])
                     ->update($data);
            return $data['vehicle_model_id'];
        } else {
            // Insert new record
            $this->db->table($this->vehicleModelTable)
                     ->insert($data);
            return $this->db->insertID();
        }
    }

    // Soft delete a vehicle model (update deleted flag)
    public function deleteVehicleModel($id)
    {
        return $this->db->table($this->vehicleModelTable)
                        ->where('vehicle_model_id', $id)
                        ->update(['deleted' => 1]);
    }

    /*------------------------------------------------
    | Vehicle Seat Methods
    ------------------------------------------------*/

    // Retrieve all vehicle seats that are not soft-deleted
    public function getVehicleSeats()
    {
        return $this->db->table($this->vehicleSeatTable)
                        ->where('deleted', 0)
                        ->get()
                        ->getResult();
    }

    // Retrieve a single vehicle seat by its ID
    public function getVehicleSeat($id)
    {
        return $this->db->table($this->vehicleSeatTable)
                        ->where('deleted', 0)
                        ->where('vehicle_seat_id', $id)
                        ->get()
                        ->getRow();
    }

    // Save a vehicle seat record (insert or update)
    public function saveVehicleSeat($data)
    {
        // Ensure soft delete flag is set
        $data['deleted'] = 0;

        if (isset($data['vehicle_seat_id']) && !empty($data['vehicle_seat_id'])) {
            // Update the record
            $this->db->table($this->vehicleSeatTable)
                     ->where('vehicle_seat_id', $data['vehicle_seat_id'])
                     ->update($data);
            return $data['vehicle_seat_id'];
        } else {
            // Insert new record
            $this->db->table($this->vehicleSeatTable)
                     ->insert($data);
            return $this->db->insertID();
        }
    }

    // Soft delete a vehicle seat (update deleted flag)
    public function deleteVehicleSeat($id)
    {
        return $this->db->table($this->vehicleSeatTable)
                        ->where('vehicle_seat_id', $id)
                        ->update(['deleted' => 1]);
    }
}
