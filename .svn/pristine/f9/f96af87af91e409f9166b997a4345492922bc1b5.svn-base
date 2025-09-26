<?php 
namespace App\Models;

use CodeIgniter\Model;

class DepartureFollowUpModel extends Model{

    protected $table = 'khm_obj_departure_follow_up';
    protected $primaryKey = 'departure_follow_up_id';
    protected $allowedFields = [
    'followup_type_id',
    'enquiry_header_id',
    'call_date',
    'call_time',
    'mode_of_departure',
    'city',
    'flight_train_no',
    'departure_date',
    'comments',
    'deleted',
    'enterprise_id'];




    public function getDepartureFollowUps($followupTypeId, $enquiryHeaderId)
    {
        return $this->where('followup_type_id', $followupTypeId)
            ->where('enquiry_header_id', $enquiryHeaderId)
            ->where('deleted', 0)
            ->findAll();
    }

    public function saveDepartureFollowup($data)
    {
        return $this->save($data);
    }

    public function softDelete($id)
    {
        return $this->update($id, ['deleted' => 1]);
    }
}




?>