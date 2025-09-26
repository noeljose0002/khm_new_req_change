<?php

namespace App\Models;

use CodeIgniter\Model;

class BestAgentReportModel extends Model
{
    protected $table = 'khm_obj_enquiry_header';
    protected $primaryKey = 'enquiry_header_id';
    protected $allowedFields = [
        'object_id',
        'guest_entity_id',
        'agent_entity_id',
        'employee_entity_id',
        'enq_added_date',
        'enq_type_id',
        'is_active',
        'ref_no',
        'enterprise_id',
    ];

    protected function baseQuery()
    {
        return $this->db
            ->table('khm_obj_enquiry_header AS h')
            ->select([
                'h.agent_entity_id',
                'kem1.entity_name AS agent_name',
                'COUNT(DISTINCT h.enquiry_header_id) AS total_enquiries',
                'COALESCE(SUM(koede.tpc), 0)                AS total_tpc',
            ])
            ->join(
                'khm_entity_mst AS kem1',
                'kem1.entity_id = h.agent_entity_id',
                'left'
            )
          
            ->join('khm_obj_enquiry_edit_request AS eer',
            'eer.enquiry_header_id=h.enquiry_header_id',
            'left')
              ->join(
                'khm_obj_enquiry_detail_extensions AS koede',
                'koede.enquiry_detail_details_id  = eer.cs_confirmed_id',
                'left'
            )
            ->where('eer.is_active',1)
            // ->where('koede.is_active', 1)
            ->where('h.is_active',     1)
            // only group by agent ID & name now:
            ->groupBy('h.agent_entity_id')
            // you can still order by total_tpc if you like:
            ->orderBy('total_tpc', 'DESC');
    }

    public function getAllAgents(): array
    {
        return $this->db
            ->table('khm_entity_mst AS kem2')
            ->select([
                'kem2.entity_id AS id',
                'kem2.entity_name AS name',
            ])
            ->where('kem2.entity_class_id', 4)
            ->orderBy('kem2.entity_name', 'ASC')
            ->get()
            ->getResultArray();
    }


    public function getByDateRange(string $fromYmd, string $toYmd, string $agentId,$system): array
    {
        $qb = $this->baseQuery()
            ->where('h.enq_added_date >=', $fromYmd)
            ->where('h.enq_added_date <=', $toYmd);

        // Only apply agent filter if user selected a specific agent
        if ($agentId !== 'all') {
            $qb->where('h.agent_entity_id', $agentId);
        }

           if ($system) {
            $qb->where('h.enq_type_id', $system);
         }

        return $qb->get()
            ->getResultArray();
           
    }
    /**
     * (Optional) legacy method if you still need it:
     */
    public function getBestAgentReport(): array
    {
        // simply returns everything (no date filter)
        return $this->baseQuery()
            ->get()
            ->getResultArray();
    }
}
