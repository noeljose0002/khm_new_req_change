<?php

namespace App\Models;

use CodeIgniter\Model;

class BestDestinationReportModel extends Model
{
    protected $table = 'khm_obj_enquiry_tour_details';
    protected $primaryKey = 'tour_details_id';
    protected $allowedFields = [
        'enquiry_header_id',
        'enquiry_details_id',
        'tour_location',
        'no_of_days',
        'check_in_date',
        'check_out_date',
        'hot_cat_id',
        'meal_plan_id',
        'hotel_id',
        'room_category_id',
        'room_type',
        'vehicle_details',
        'location_sequence',
        'is_active',
        'is_draft',
        'updated_time',
        'extension_ref_id',
        'is_own_arrangement',
        'enterprise_id',
    ];

    protected function baseQuery()
    {
        return $this->db
            ->table('khm_obj_enquiry_tour_details AS t')
            ->select([
                't.tour_location',
                'i.tour_date',
                'g.geog_name',
                'h.enq_type_id',
                't.tour_details_id',
                't.enquiry_header_id',
                't.tour_location',
                't.is_active',
                't.check_in_date',
                't.check_out_date',
                'g.geog_name',
                'g.geog_id',
                'COUNT(DISTINCT t.enquiry_header_id) AS total_tourenq'
            ])
            ->join(
                'khm_obj_enquiry_header AS h',
                'h.enquiry_header_id = t.enquiry_header_id',
                'left'
            )
            ->join(
                'khm_loc_mst_geography AS g',
                'g.geog_id = t.tour_location',
                'left'
            )
            ->join(
                'khm_obj_enquiry_itinerary_details AS i',
                't.tour_details_id=i.tour_details_id',
                'left'
            )

            // only count active headers & active tour‐details
            ->where('h.is_active', 1)
            ->where('t.is_active', 1)
            ->where('i.is_active', 1)
            // group by location ID and its name (so each location appears once)
            ->groupBy('t.tour_location')
            ->groupBy('g.geog_name')
            ->orderBy('total_tourenq', 'DESC');
    }


    public function getAllLocations(): array
    {
        return $this->db
            ->table('khm_loc_mst_geography AS g2')
            ->select([
                'g2.geog_id AS id',
                'g2.geog_name AS name',
            ])
            ->where('g2.geog_level_id', 4)
            ->orderBy('g2.geog_name', 'ASC')
            ->get()
            ->getResultArray();
    }


    public function getByDateRange(
        string $fromYmd,
        string $toYmd,
        string $destinationId,
        $system
    ): array {
        $activeRole = (int) session('active_role');
        $entityId   = (int) session('user_id');

        $qb = $this->baseQuery()
            ->where('i.tour_date >=', $fromYmd)
            ->where('i.tour_date <=', $toYmd);

        /* DESTINATION FILTER */
        if ($destinationId !== 'all') {
            $qb->where('t.tour_location', $destinationId);
        }

        /* SYSTEM FILTER */
        if ($system) {
            $qb->where('h.enq_type_id', $system);
        }

        /* ================= ROLE-BASED VISIBILITY ================= */

        /* ADMIN */
        if ($activeRole === 1) {
            // Admin sees all destinations
        }

        /* TEAM LEAD */ elseif ($activeRole === 4) {

            $teamRows = $this->db->table('khm_sys_usg_mst_entity_role')
                ->select('entity_id')
                ->where('team_lead_id', $entityId)
                ->get()
                ->getResultArray();

            $allowedIds = array_column($teamRows, 'entity_id');
            $allowedIds[] = $entityId; // include TL himself

            $qb->whereIn('h.employee_entity_id', $allowedIds);
        }

        /* EXECUTIVE / OTHERS */ else {
            $qb->where('h.employee_entity_id', $entityId);
        }

        return $qb->get()->getResultArray();
    }

    /**
     * (Optional) legacy method if you still need it:
     */
    public function getBestDestinationReport(): array
    {
        // simply returns everything (no date filter)
        return $this->baseQuery()
            ->get()
            ->getResultArray();
    }
}
