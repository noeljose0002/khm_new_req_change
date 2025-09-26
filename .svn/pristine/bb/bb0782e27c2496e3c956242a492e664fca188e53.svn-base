<?php 
namespace App\Models;

use CodeIgniter\Model;

class ArrivalFollowUpModel extends Model
{
    protected $table            = 'khm_obj_arrival_follow_up';
    protected $primaryKey       = 'arrival_follow_up_id';
    protected $allowedFields    = [
        'followup_type_id',
        'enquiry_header_id',
        'call_date',
        'call_time',
        'mode_of_arrival',
        'city',
        'flight_train_no',
        'arrival_date',
        'comments',
        'deleted',
        'enterprise_id'
    ];

    public function getArrivalFollowUp($followupTypeId, $enquiryHeaderId)
    {
        return $this->where('followup_type_id', $followupTypeId)
            ->where('enquiry_header_id', $enquiryHeaderId)
            ->where('deleted', 0)
            ->findAll();
    }

    public function saveArrivalFollowup($data)
    {
        return $this->save($data);
    }

    public function softDelete($id)
    {
        return $this->update($id, ['deleted' => 1]);
    }
}
