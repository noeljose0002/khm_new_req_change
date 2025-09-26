<?php

namespace App\Models;

use CodeIgniter\Model;


class CheckinoutReportModel extends Model
{

    protected $table = 'khm_obj_enquiry_header';
    protected $primaryKey = 'enquiry_header_id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'object_id',
        'guest_entity_id',
        'agent_entity_id',
        'employee_entity_id',
        'enq_added_date',
        'enq_type_id',
       
        'enterprise_id,'
    ];

    protected function baseQuery()
    {
        return $this->db
            ->table('khm_obj_enquiry_header AS h')
            ->distinct()
            ->select([
                // header fields
                'h.ref_no',
                'h.enquiry_header_id',
                'h.object_id',
                'h.guest_entity_id',
                'h.agent_entity_id',
                'h.employee_entity_id',
                'h.enq_added_date',
                'h.enq_type_id',
                'h.is_active AS header_active',
                // 'h.enterprise_id AS header_enterprise',

                // object master
                'om.object_name',

                // guest / agent / employee names
                'ge.entity_name AS guest_name',
                'ae.entity_name AS agent_name',
                'ee.entity_name AS employee_name',

                // details fields
                'd.enquiry_details_id',
                'd.date_of_tour_start',
                'd.total_no_of_pax',
                // 'd.enquiry_source',
                // 'd.enq_description',
                'd.is_active AS details_active',

                // tour-details fields
                // 't.tour_details_id',
                // 't.tour_location',
                // 't.no_of_days',
                't.check_in_date',
                't.check_out_date',
                't.is_active AS tour_active',

                // extension fields
                // 'e.enquiry_detail_details_id',
                // 'e.total_rate',
                // 'e.gst_value',
                'e.is_active AS extension_active',
                'e.tpc',

                // derived hotel object name 
               'hkom.object_name AS hotel_name',
                // 'hm.object_name AS hotel_name',

                //agent gstn no and state
                'attriagent.entity_attr_value AS agent_gstn',
                'gg.geog_name As agent_state',
                'em4.entity_name AS transporter_name'

            ])

            //trsansport
             ->join('khm_obj_transport_follow_up AS tf',
                'tf.enquiry_header_id=h.enquiry_header_id',
                'left'
            )
             ->join('khm_entity_mst AS em4',
            'em4.entity_id=tf.transporter_id',
            'left'
            )
            // ->where('tf.is_active',1)
            // join header → details
            ->join(
                'khm_obj_enquiry_details AS d',
                'd.enquiry_header_id = h.enquiry_header_id',
                'left'
            )
            // join header + details → tour details
            ->join(
                'khm_obj_enquiry_tour_details AS t',
                't.enquiry_header_id = h.enquiry_header_id
             AND t.enquiry_details_id = d.enquiry_details_id',
                'left'
            )
            ->join(
                'khm_obj_enquiry_itinerary_details AS koei',
                'koei.tour_details_id = t.tour_details_id',
                'left'
            )
            ->join( 'khm_obj_hotel AS koh',
            'koh.hotel_id = koei.hotel_id',
            'left'
            
            )

            ->join(' khm_obj_mst AS hkom',
                'hkom.object_id=koh.object_id'
            )
            // join header + details → detail extensions
            ->join(
                'khm_obj_enquiry_detail_extensions AS e',
                'e.enquiry_header_id = h.enquiry_header_id
             AND e.enquiry_details_id = d.enquiry_details_id',
                'left'
            )
            // object master for object_name
            ->join(
                'khm_obj_mst AS om',
                'om.object_id = h.object_id',
                'left'
            )
            // guest entity
            ->join(
                'khm_entity_mst AS ge',
                'ge.entity_id = h.guest_entity_id',
                'left'
            )
            // agent entity
            ->join(
                'khm_entity_mst AS ae',
                'ae.entity_id = h.agent_entity_id',
                'left'
            )
            // employee entity
            ->join(
                'khm_entity_mst AS ee',
                'ee.entity_id = h.employee_entity_id',
                'left'
            )
            // join entity attributes to get hotel_id for agent
            ->join(
                'khm_entity_attribute AS attr',
                'attr.entity_id = h.agent_entity_id
             AND attr.entity_class_attr_id = 1978',
                'left'
            )

            ->join(
                'khm_entity_attribute AS attriagent',
                'attriagent.entity_id = h.agent_entity_id
             AND attriagent.entity_class_attr_id = 1970',
                'left'
            )
            // join hotel object master to resolve hotel_id
             ->join(
                'khm_loc_mst_geography AS gg',
                'gg.geog_id=attr.entity_attr_value',
                'left'
            )

            // only active enquiries
            ->where('h.is_active', 1)
            ->where('e.is_active', 1)
            ->where('t.is_active', 1)
            ->where('d.is_active', 1)
            ->where('koei.is_active',1)
            // sort by tour start date
            ->orderBy('d.date_of_tour_start', 'DESC');
    }


public function getByDateRange(string $fromYmd, string $toYmd, int $checkRaw, int $system): array
{
    // 1) Decide which date‐column to use for filtering
    $column = $checkRaw === 1
        ? 't.check_in_date'
        : 't.check_out_date';

    // 2) Start from your baseQuery() builder
    $qb = $this->baseQuery();

    // 3) If $system is nonzero (or otherwise truthy), add that WHERE clause
    if ($system) {
        $qb->where('h.enq_type_id', $system);
    }

    // 4) Add the date‐range filters
    $qb->where("$column >=", $fromYmd)
       ->where("$column <",  $toYmd);

    // 5) Execute and return results as an array
    return $qb
        ->get()
        ->getResultArray();
}



    public function getSourceReport(): array
    {
        // simply returns everything (no date filter)
        return $this->baseQuery()
            ->get()
            ->getResultArray();
    }
}
