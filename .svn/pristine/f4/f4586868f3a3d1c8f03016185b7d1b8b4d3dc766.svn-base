<?php

namespace App\Models;

use CodeIgniter\Model;

class ArrivalReportModel extends Model
{
    protected $table      = 'khm_obj_arrival_follow_up';
    protected $primaryKey = 'arrival_follow_up_id';
    protected $returnType = 'array';


    protected function baseQuery()
    {
        $db = $this->db;

        /* Latest Arrival */
        $latestArrivalSubquery = $db->table('khm_obj_arrival_follow_up')
            ->select('enquiry_header_id, MAX(arrival_follow_up_id) AS latest_arrival_id')
            ->where('deleted', 0)
            ->groupBy('enquiry_header_id');

        /* Latest Call */
        $latestCallSubquery = $db->table('khm_obj_all_call_follow_up')
            ->select('enquiry_header_id, MAX(call_time) AS latest_call_time')
            ->where('followup_type_id', 15)
            ->groupBy('enquiry_header_id');

        return $db->table('khm_obj_arrival_follow_up AS ar')
            ->distinct()
            ->select([
                'ar.arrival_follow_up_id',
                'ar.followup_type_id',         
                'ar.enquiry_header_id',
                'ar.call_date',
                'ar.mode_of_arrival',
                'ar.city',
                'ar.flight_train_no',
                'ar.arrival_date',
                'ar.comments',
                'ar.deleted',
                'ar.enterprise_id',

                'oeh.ref_no',
                'oeh.enq_type_id',

                'eh.object_id',
                'om.object_name',

                'e11.entity_id',
                'e11.entity_name',

                'cf.call_time',

                'tf.driver_name  AS drivername',
                'tf.phone_number AS driverphone',
            ])

            /* latest arrival */
            ->join(
                "({$latestArrivalSubquery->getCompiledSelect()}) AS last_arr",
                'ar.arrival_follow_up_id = last_arr.latest_arrival_id',
                'inner'
            )

            ->join('khm_obj_enquiry_header AS oeh', 'oeh.enquiry_header_id = ar.enquiry_header_id', 'left')
            ->join('khm_obj_enquiry_header AS eh', 'eh.enquiry_header_id = ar.enquiry_header_id', 'left')
            ->join('khm_obj_mst AS om', 'om.object_id = eh.object_id', 'left')

            /* Transport */
            ->join('khm_obj_transport_follow_up AS tf', 'tf.enquiry_header_id = oeh.enquiry_header_id', 'left')

            /* Status */
            ->join('khm_obj_enquiry_edit_request AS eer', 'eer.enquiry_header_id = ar.enquiry_header_id', 'left')
            ->join('khm_obj_enquiry_status AS s', 's.edit_request_id = eer.enquiry_edit_request_id', 'left')
            ->join('khm_entity_mst AS e11', 'e11.entity_id = s.assigned_to', 'left')

            /* Latest Call */
            ->join(
                "({$latestCallSubquery->getCompiledSelect()}) AS last_call",
                'last_call.enquiry_header_id = ar.enquiry_header_id',
                'left'
            )
            ->join(
                'khm_obj_all_call_follow_up AS cf',
                'cf.enquiry_header_id = last_call.enquiry_header_id
                 AND cf.call_time = last_call.latest_call_time
                 AND cf.followup_type_id = 15',
                'left'
            )

            ->where([
                'ar.deleted'        => 0,
                'eer.is_active'     => 1,
                's.current_status_id' => 1,
            ])
            ->orderBy('ar.arrival_follow_up_id', 'DESC');
    }


    public function getByDateRange(string $fromYmd, string $toYmd, $system = null): array
    {
        $activeRole = (int) session('active_role');
        $entityId   = (int) session('user_id');

        $qb = $this->baseQuery()
            ->where('ar.arrival_date >=', $fromYmd)
            ->where('ar.arrival_date <=', $toYmd);

        /* ================= ADMIN ================= */
        if ($activeRole === 1) {
            // No restriction
        }

        /* ================= TEAM LEAD ================= */
        elseif ($activeRole === 4) {

            $teamIds = $this->db->table('khm_sys_usg_mst_entity_role')
                ->select('entity_id')
                ->where('team_lead_id', $entityId)
                ->get()
                ->getResultArray();

            $allowedIds = array_column($teamIds, 'entity_id');
            $allowedIds[] = $entityId; // include TL himself

            $qb->whereIn('e11.entity_id', $allowedIds);
        }

        /* ================= OTHERS ================= */
        else {
            $qb->where('e11.entity_id', $entityId);
        }

        /* ================= SYSTEM FILTER ================= */
        if ($system) {
            $qb->where('oeh.enq_type_id', $system);
        }

        return $qb->get()->getResultArray();
    }
}