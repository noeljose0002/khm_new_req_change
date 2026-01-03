<?php

namespace App\Models;

use CodeIgniter\Model;

class MonthlyTargetReportModel extends Model
{
    protected $table = 'khm_obj_enquiry_header';
    protected $primaryKey = 'enquiry_header_id';

    /* ==========================================================
       MAIN REPORT QUERY
    ========================================================== */
    public function getByDateRange($fromYmd, $toYmd, $executive_id, $target_id, $system)
{
    if (empty($fromYmd) || empty($toYmd)) {
        return [];
    }

    $activeRole = (int) session('active_role');
    $entityId   = (int) session('user_id');

    /* ================= BUILD JOIN CONDITION FIRST ================= */
    $joinCondition = '
        h.employee_entity_id = e.entity_id
        AND h.is_active = 1
        AND h.enq_added_date >= '.$this->db->escape($fromYmd).'
        AND h.enq_added_date <= '.$this->db->escape($toYmd);

    if (!empty($system)) {
        $joinCondition .= ' AND h.enq_type_id = '.$this->db->escape($system);
    }

    /* ================= BASE QUERY (TARGET DRIVEN) ================= */
    $q = $this->db->table('khm_entity_mst_target_assign ta')
        ->select([
            'e.entity_id',
            'e.entity_name',
            'mt.target_id',
            'mt.target_name',
            'mt.target_from_date',
            'mt.target_to_date',
            'ta.target_amount',
            'COALESCE(SUM(de.tpc),0) AS total_tpc'
        ])
        ->join('khm_entity_mst e', 'e.entity_id = ta.entity_id', 'inner')
        ->join('khm_obj_mst_target mt', 'mt.target_id = ta.target_id', 'inner')
        ->join('khm_obj_enquiry_header h', $joinCondition, 'left')
        ->join(
            'khm_obj_enquiry_detail_extensions de',
            'de.enquiry_header_id = h.enquiry_header_id AND de.is_active = 1',
            'left'
        )
        ->where([
            'ta.deleted'       => 0,
            'mt.deleted'       => 0,
            'mt.target_status' => 1,
            'e.deleted'        => 0
        ])
        ->groupBy(['e.entity_id', 'mt.target_id']);

    /* ================= ROLE RULES ================= */

    /* ADMIN */
    if ($activeRole === 1) {
        if ($executive_id !== 'all') {
            $q->where('e.entity_id', $executive_id);
        }
    }

    /* TEAM LEAD */
    elseif ($activeRole === 4) {

        if ($executive_id === 'all') {

            $teamMemberIds = $this->db->table('khm_sys_usg_mst_entity_role')
                ->select('entity_id')
                ->where('team_lead_id', $entityId)
                ->where('role_id', 5)
                ->get()
                ->getResultArray();

            $allowedIds = array_column($teamMemberIds, 'entity_id');
            $allowedIds[] = $entityId; // include TL himself

            $q->whereIn('e.entity_id', $allowedIds);

        } else {
            $q->where('e.entity_id', $executive_id);
        }
    }

    /* OTHER ROLES */
    else {
        $q->where('e.entity_id', $entityId);
    }

    /* ================= OTHER FILTERS ================= */
    if ($target_id !== 'all') {
        $q->where('mt.target_id', $target_id);
    }

    return $q->get()->getResultArray();
}


    /* ==========================================================
       EXECUTIVE DROPDOWN
    ========================================================== */
    public function getAllEmployees(): array
    {
        $db = $this->db;
        $activeRole = (int) session('active_role');
        $entityId   = (int) session('user_id');

        /* ================= ADMIN ================= */
        if ($activeRole === 1) {
            return $db->table('khm_entity_mst')
                ->select('entity_id AS id, entity_name AS name')
                ->where('entity_class_id', 3)
                ->where('deleted', 0)
                ->orderBy('entity_name', 'ASC')
                ->get()
                ->getResultArray();
        }

        /* ================= TEAM LEAD ================= */
        if ($activeRole === 4) {
            return $this->db->query("
                SELECT e.entity_id AS id, e.entity_name AS name
                FROM khm_entity_mst e
                JOIN khm_sys_usg_mst_entity_role er
                    ON er.entity_id = e.entity_id
                WHERE er.role_id = 5
                  AND er.team_lead_id = ?
                  AND e.deleted = 0

                UNION

                SELECT entity_id AS id, entity_name AS name
                FROM khm_entity_mst
                WHERE entity_id = ?
                  AND deleted = 0

                ORDER BY name
            ", [$entityId, $entityId])->getResultArray();
        }

        /* ================= OTHERS ================= */
        return $db->table('khm_entity_mst')
            ->select('entity_id AS id, entity_name AS name')
            ->where('entity_id', $entityId)
            ->where('deleted', 0)
            ->get()
            ->getResultArray();
    }

    /* ==========================================================
       TARGET DROPDOWN
    ========================================================== */
    public function getAllTargets(): array
    {
        return $this->db
            ->table('khm_obj_mst_target')
            ->select('target_id AS id, target_name AS name')
            ->where('target_status', 1)
            ->where('deleted', 0)
            ->orderBy('target_name', 'ASC')
            ->get()
            ->getResultArray();
    }
}