<?php 
namespace App\Models;

use CodeIgniter\Model;

class CallFollowUpModel extends Model
{
    protected $table      = 'khm_obj_all_call_follow_up';
    protected $primaryKey = 'call_follow_up_id';
    protected $allowedFields = [
        'followup_type_id',
        'enquiry_header_id',
        'call_status',
        'call_time',
        'comments',
        'deleted',
        'enterprise_id'
    ];

    /**
     * Get call follow-ups for a given followup type and enquiry header id
     */
    public function getFollowups($followupTypeId, $enquiryHeaderId)
    {
        return $this->where('followup_type_id', $followupTypeId)
                    ->where('enquiry_header_id', $enquiryHeaderId)
                    ->where('deleted', 0)
                    ->findAll();
    }

    /**
     * Save (insert/update) a call follow-up record
     */
    public function saveFollowup($data)
    {
        return $this->save($data);
    }

    /**
     * Soft-delete a record by updating its deleted flag
     */
    public function softDelete($id)
    {
        return $this->update($id, ['deleted' => 1]);
    }
}
