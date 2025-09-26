<?php

namespace App\Models;

use CodeIgniter\Model;

class Enquiry_m extends Model
{
    protected $khm_obj_enquiry_detail_extensions = 'khm_obj_enquiry_detail_extensions';
    protected $khm_obj_itinerary_costing_details = 'khm_obj_itinerary_costing_details';
    protected $khm_obj_enquiry_itinerary_details = 'khm_obj_enquiry_itinerary_details';
    protected $khm_obj_enquiry_header = 'khm_obj_enquiry_header';
    protected $khm_obj_enquiry_details = 'khm_obj_enquiry_details';
    protected $khm_obj_enquiry_tour_details = 'khm_obj_enquiry_tour_details';
    protected $khm_obj_enquiry_quick_quote = 'khm_obj_enquiry_quick_quote';
    protected $khm_obj_enquiry_edit_request = 'khm_obj_enquiry_edit_request';
    protected $khm_obj_enquiry_status = 'khm_obj_enquiry_status';
    protected $khm_hotel_confirmation = 'khm_hotel_confirmation';
    protected $khm_obj_executive_follow_up = 'khm_obj_executive_follow_up';
    protected $khm_obj_arrival_follow_up = 'khm_obj_arrival_follow_up';
    protected $khm_obj_departure_follow_up = 'khm_obj_departure_follow_up';
    protected $khm_obj_all_call_follow_up = 'khm_obj_all_call_follow_up';
    protected $khm_obj_transport_follow_up = 'khm_obj_transport_follow_up';
    protected $khm_obj_enquiry_payment = 'khm_obj_enquiry_payment';
    protected $khm_eighteen_percentage_double = 'khm_eighteen_percentage_double';
    protected $khm_eighteen_percentage_single = 'khm_eighteen_percentage_single';
    protected $khm_mst_bifurcation = 'khm_mst_bifurcation';
    protected $khm_mst_bifurcation_details = 'khm_mst_bifurcation_details';

    public function enquiry_list_data($params)
    {
        $system_id = session('system_id');
        $user_id = session('user_id');
        $parent_id = session('parent_id');
        $hierarchy_id = session('hierarchy_id');
        $draw = $params['draw'];
        $start = $params['start'];
        $rowperpage = $params['length'];
        $columnIndex = $params['order'][0]['column'];
        $columnName = $params['columns'][$columnIndex]['data'];
        $columnSortOrder = $params['order'][0]['dir'];
        $searchValue = $params['search']['value'];
        $object_class_id = $params['object_class_id'];
        $db = \Config\Database::connect();

        $subStatusQuery = $db->table('khm_obj_enquiry_status s')
            ->select('s.enquiry_status_id,s.enquiry_header_id, s.current_status_id, s.updated_time')
            ->join(
                '(SELECT MAX(enquiry_status_id) AS max_status_id,enquiry_header_id
              FROM khm_obj_enquiry_status 
              GROUP BY enquiry_header_id) latest',
                's.enquiry_header_id = latest.enquiry_header_id AND s.enquiry_status_id = latest.max_status_id',
                'inner'
            );
        $latestStatusSql = $subStatusQuery->getCompiledSelect(false);

        $query = $db->table('khm_obj_mst a');
        $query->select('SQL_CALC_FOUND_ROWS  a.*,er.enquiry_edit_request_id,er.cs_confirmed_id,top.entity_name as top_name,sop.entity_name as sop_name,stt.assigned_to as top_id,sts.assigned_to as sop_id,st.assigned_to as exe_id,exe.entity_name as executive,ss.status_name,est.current_status_id,t.no_of_adult,h.enq_type_id,h.ref_no,ex.enquiry_detail_details_id,ex.enquiry_ref_id,ex.tour_plan_ref_id,ex.extension_ref_id,hc.hotel_category_name,dep.geog_name as departure_loc,arr.geog_name as arrival_loc,gs.entity_name as guest_name,ag.entity_name as agent_name,m.geog_name,h.enquiry_header_id,DATE_FORMAT(h.enq_added_date, "%d-%m-%Y") as enq_date,t.no_of_night,DATE_FORMAT(t.date_of_tour_start, "%d-%m-%Y") as start_date,DATE_FORMAT(t.date_of_tour_completion, "%d-%m-%Y") as end_date,h.edit_request', false);
        $query->join('khm_obj_enquiry_header h', 'h.object_id = a.object_id', 'left');
        $query->join('khm_obj_enquiry_edit_request er', 'er.enquiry_header_id = h.enquiry_header_id AND er.is_active = 1', 'left');
        $query->join('khm_entity_mst ag', 'ag.entity_id = h.agent_entity_id', 'left');
        $query->join('khm_entity_mst gs', 'gs.entity_id = h.employee_entity_id', 'left');
        $query->join('khm_obj_enquiry_details t', 't.enquiry_header_id = h.enquiry_header_id', 'left');
        $query->join('khm_loc_mst_geography m', 'm.geog_id = a.object_location_id', 'left');
        $query->join('khm_loc_mst_geography arr', 'arr.geog_id = t.arrival_location', 'left');
        $query->join('khm_loc_mst_geography dep', 'dep.geog_id = t.departure_location', 'left');
        $query->join('khm_obj_mst_hotel_category hc', 'hc.hotel_category_id = t.hotel_category', 'left');
        $query->join('khm_obj_enquiry_detail_extensions ex', 'ex.enquiry_header_id = h.enquiry_header_id AND ex.is_active = 1', 'left');

        $query->join('khm_obj_enquiry_status st', 'st.enquiry_header_id = er.enquiry_header_id AND st.edit_request_id = er.enquiry_edit_request_id AND st.current_status_id = 1', 'left');
        $query->join('khm_entity_mst exe', 'exe.entity_id =st.assigned_to', 'left');
        $query->join('khm_sys_usg_mst_entity_role tl', 'tl.entity_id = st.assigned_to AND tl.role_id = 5', 'left');

        $query->join('khm_obj_enquiry_status sts', 'sts.enquiry_header_id = er.enquiry_header_id AND sts.edit_request_id = er.enquiry_edit_request_id AND sts.current_status_id = 13', 'left');
        $query->join('khm_entity_mst sop', 'sop.entity_id =sts.assigned_to', 'left');
        $query->join('khm_sys_usg_mst_entity_role stl', 'stl.entity_id = sts.assigned_to AND stl.role_id = 8', 'left');

        $query->join('khm_obj_enquiry_status ac', 'ac.enquiry_header_id = er.enquiry_header_id AND ac.edit_request_id = er.enquiry_edit_request_id AND ac.current_status_id = 8 AND ac.assigned_status = 1', 'left');
        $query->join('khm_entity_mst acp', 'acp.entity_id =ac.assigned_to', 'left');
        $query->join('khm_sys_usg_mst_entity_role stlac', 'stlac.entity_id = ac.assigned_to AND stlac.role_id = 8', 'left');

        $query->join('khm_obj_enquiry_status stt', 'stt.enquiry_header_id = er.enquiry_header_id AND stt.edit_request_id = er.enquiry_edit_request_id AND stt.current_status_id = 14', 'left');
        $query->join('khm_entity_mst top', 'top.entity_id =stt.assigned_to', 'left');
        $query->join('khm_sys_usg_mst_entity_role ttl', 'ttl.entity_id = stt.assigned_to AND ttl.role_id = 10', 'left');

        $query->join('khm_obj_enquiry_status att', 'att.enquiry_header_id = er.enquiry_header_id AND att.edit_request_id = er.enquiry_edit_request_id AND att.current_status_id = 17', 'left');
        $query->join('khm_entity_mst acc', 'acc.entity_id =att.assigned_to', 'left');
        $query->join('khm_sys_usg_mst_entity_role atl', 'atl.entity_id = att.assigned_to AND atl.role_id = 11', 'left');

        $query->join('(' . $latestStatusSql . ') est', 'est.enquiry_header_id = h.enquiry_header_id', 'left');
        $query->join('khm_obj_mst_enquiry_status ss', 'ss.status_id = est.current_status_id', 'left');
        $query->where('a.object_class_id', $object_class_id);
        $query->where('h.is_active', 1);
        $query->where('t.is_active', 1);
        $query->where('h.enq_type_id', $system_id);
        if ($parent_id == 4) {
            $query->where('st.assigned_to', $user_id);
        }
        if ($parent_id == 7) {
            $query->groupStart()
                ->where('sts.assigned_to', $user_id)
                ->orWhere('ac.assigned_to', $user_id)
                ->groupEnd();
        }
        if ($parent_id == 9) {
            $query->where('stt.assigned_to', $user_id);
        }
        /*if($parent_id == 11){
            $query->where('att.assigned_to', $user_id);
        }*/

        /*if($parent_id == 1){
            $query->where('tl.team_lead_id', $user_id);
        }
        if($parent_id == 2){
            $query->where('stl.team_lead_id', $user_id);
        }
        if($parent_id == 3){
            $query->where('ttl.team_lead_id', $user_id);
        }*/
        /*if($parent_id == 11){
            $query->where('atl.team_lead_id', $user_id);
        }*/
        $query->orderBy('h.enquiry_header_id', 'DESC');

        if (!empty($searchValue)) {
            $query->groupStart()
                ->like('a.object_name', $searchValue)
                ->orLike('m.geog_name', $searchValue)
                ->orLike('h.ref_no', $searchValue)
                ->groupEnd();
        }
        $query->orderBy($columnName, $columnSortOrder);
        $query->limit($rowperpage, $start);
        $records = $query->get()->getResultArray();

        $queryTot = $this->db->query('SELECT FOUND_ROWS() AS count');
        $totalRecords = $queryTot->getResultArray()[0]['count'];

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecords,
            "aaData" => $records
        );
        return $response;
    }

    public function fetchEnquiryDetails($object_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_mst a');
        $result = $selected_table->select('a.*,t.enquiry_source,hc.hotel_category_name,t.total_no_of_pax,t.meal_plan,t.no_of_adult,t.no_of_child_with_bed,t.no_of_child_without_bed,t.no_of_double_room,t.no_of_single_room,t.no_of_extra_bed,t.gstin,t.vehicle_type_id,vf.hub_location_name,dep.geog_name as departure_loc,arr.geog_name as arrival_loc,gs.entity_name as guest_name,ag.entity_name as agent_name,m.geog_name,h.enquiry_header_id,DATE_FORMAT(h.enq_added_date, "%d-%m-%Y") as enq_date,t.no_of_night,DATE_FORMAT(t.date_of_tour_start, "%d-%m-%Y") as start_date,DATE_FORMAT(t.date_of_tour_completion, "%d-%m-%Y") as end_date')
            ->join('khm_obj_enquiry_header h', 'h.object_id = a.object_id', 'left')
            ->join('khm_entity_mst ag', 'ag.entity_id = h.agent_entity_id', 'left')
            ->join('khm_entity_mst gs', 'gs.entity_id = h.employee_entity_id', 'left')
            ->join('khm_obj_enquiry_details t', 't.enquiry_header_id = h.enquiry_header_id', 'left')
            ->join('khm_loc_mst_geography m', 'm.geog_id = a.object_location_id', 'left')
            ->join('khm_loc_mst_geography arr', 'arr.geog_id = t.arrival_location', 'left')
            ->join('khm_loc_mst_geography dep', 'dep.geog_id = t.departure_location', 'left')
            ->join('khm_obj_mst_vehicle_hub_location vf', 'vf.hub_location_id = t.vehicle_from_location', 'left')
            ->join('khm_obj_mst_hotel_category hc', 'hc.hotel_category_id = t.hotel_category', 'left')
            ->where('a.object_id=', $object_id)
            ->where('h.is_active', 1)
            ->where('t.is_active', 1)
            ->get()->getResultArray();
        return $result;
    }
    public function fetchEnquiryDetailsEdit($object_id, $enquiry_details_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_mst a');
        $result = $selected_table->select('a.*,hc.hotel_category_name,t.total_no_of_pax,t.meal_plan,t.no_of_adult,t.no_of_child_with_bed,t.no_of_child_without_bed,t.no_of_double_room,t.no_of_single_room,t.no_of_extra_bed,t.gstin,t.vehicle_type_id,vf.hub_location_name,dep.geog_name as departure_loc,arr.geog_name as arrival_loc,gs.entity_name as guest_name,ag.entity_name as agent_name,m.geog_name,h.enquiry_header_id,DATE_FORMAT(h.enq_added_date, "%d-%m-%Y") as enq_date,t.no_of_night,DATE_FORMAT(t.date_of_tour_start, "%d-%m-%Y") as start_date,DATE_FORMAT(t.date_of_tour_completion, "%d-%m-%Y") as end_date')
            ->join('khm_obj_enquiry_header h', 'h.object_id = a.object_id', 'left')
            ->join('khm_entity_mst ag', 'ag.entity_id = h.agent_entity_id', 'left')
            ->join('khm_entity_mst gs', 'gs.entity_id = h.employee_entity_id', 'left')
            ->join('khm_obj_enquiry_details t', 't.enquiry_header_id = h.enquiry_header_id', 'left')
            ->join('khm_loc_mst_geography m', 'm.geog_id = a.object_location_id', 'left')
            ->join('khm_loc_mst_geography arr', 'arr.geog_id = t.arrival_location', 'left')
            ->join('khm_loc_mst_geography dep', 'dep.geog_id = t.departure_location', 'left')
            ->join('khm_obj_mst_vehicle_hub_location vf', 'vf.hub_location_id = t.vehicle_from_location', 'left')
            ->join('khm_obj_mst_hotel_category hc', 'hc.hotel_category_id = t.hotel_category', 'left')
            ->where('a.object_id=', $object_id)
            ->where('t.enquiry_details_id', $enquiry_details_id)
            ->get()->getResultArray();
        return $result;
    }
    public function indian_states()
    {
        $db = \Config\Database::connect();
        $query = $db->query('SELECT * FROM khm_loc_mst_geography WHERE geog_level_id = 3 and geog_parent_id = 2 order by geog_name asc');
        $results = $query->getResultArray();
        return $results;
    }
    public function get_all_agents()
    {
        $db = \Config\Database::connect();
        $query = $db->query('SELECT * FROM khm_entity_mst WHERE entity_class_id = 4');
        $results = $query->getResultArray();
        return $results;
    }
    function get_agents($location_id)
    {
        $db = \Config\Database::connect();
        $userid = session('user_id');

        $selected_table = $db->table('khm_entity_attribute a');
        $selected_table->select('a.*,g.entity_name')
            ->join('khm_entity_mst g', 'g.entity_id = a.entity_id', 'left')
            ->where('a.entity_attr_value', $location_id)
            ->orderBy('g.entity_name', 'ASC');
        $result = $selected_table->get()->getResult();
        if (!empty($result)) {
            $output = '<option value="">Select Agent</option>';
            foreach ($result as $row) {
                $output .= '<option value="' . $row->entity_id . '">' . $row->entity_name . '</option>';
            }
        } else {
            $output = '<option value="">Select Agent</option>';
            $output .= '<option value="">Not Found</option>';
        }
        return $output;
    }

    function getTourHotels($hot_cat_id, $tour_location_id, $is_quick_quote)
    {
        $db = \Config\Database::connect();
        $userid = session('user_id');
        if ($hot_cat_id == 1) {
            $selected_table = $db->table('khm_obj_hotel a');
            $selected_table->select('a.*,g.object_name')
                ->join('khm_obj_mst g', 'g.object_id = a.object_id', 'left')
                ->join('khm_obj_hotel_room_category r', 'r.hotel_id = a.hotel_id', 'inner')
                ->where('g.object_location_id', $tour_location_id)
                ->groupBy('a.hotel_id')
                ->orderBy('g.object_name', 'ASC');
            $result = $selected_table->get()->getResult();
        } else {
            $selected_table = $db->table('khm_obj_hotel a');
            $selected_table->select('a.*,g.object_name')
                ->join('khm_obj_mst g', 'g.object_id = a.object_id', 'left')
                ->join('khm_obj_hotel_room_category r', 'r.hotel_id = a.hotel_id', 'inner')
                ->where('a.hotel_category_id', $hot_cat_id)
                ->where('g.object_location_id', $tour_location_id)
                ->groupBy('a.hotel_id')
                ->orderBy('g.object_name', 'ASC');
            $result = $selected_table->get()->getResult();
        }
        if (!empty($result)) {
            $output = '<option value="">Select</option>';
            if ($is_quick_quote == 1) {
                $selected_hotel = $this->select_random_hotel_id($result);
                foreach ($result as $row) {
                    if ($row->hotel_id == $selected_hotel) {
                        $output .= '<option value="' . $row->hotel_id . '" selected>' . $row->object_name . '</option>';
                    } else {
                        $output .= '<option value="' . $row->hotel_id . '">' . $row->object_name . '</option>';
                    }
                }
                $output .= '<option value="0">Own Arrangement</option>';
            } else {
                foreach ($result as $row) {
                    $output .= '<option value="' . $row->hotel_id . '">' . $row->object_name . '</option>';
                }
                $output .= '<option value="0">Own Arrangement</option>';
            }
        } else {
            $output = '<option value="">Select</option>';
            $output .= '<option value="0">Own Arrangement</option>';
        }
        return $output;
    }
    function getTourHotelsDraft($hot_cat_id, $tour_location_id, $is_quick_quote, $hid)
    {
        $db = \Config\Database::connect();
        $userid = session('user_id');
        if ($hot_cat_id == 1) {
            $selected_table = $db->table('khm_obj_hotel a');
            $selected_table->select('a.*,g.object_name')
                ->join('khm_obj_mst g', 'g.object_id = a.object_id', 'left')
                ->join('khm_obj_hotel_room_category r', 'r.hotel_id = a.hotel_id', 'inner')
                ->where('g.object_location_id', $tour_location_id)
                ->groupBy('a.hotel_id')
                ->orderBy('g.object_name', 'ASC');
            $result = $selected_table->get()->getResult();
        } else {
            $selected_table = $db->table('khm_obj_hotel a');
            $selected_table->select('a.*,g.object_name')
                ->join('khm_obj_mst g', 'g.object_id = a.object_id', 'left')
                ->join('khm_obj_hotel_room_category r', 'r.hotel_id = a.hotel_id', 'inner')
                ->where('a.hotel_category_id', $hot_cat_id)
                ->where('g.object_location_id', $tour_location_id)
                ->groupBy('a.hotel_id')
                ->orderBy('g.object_name', 'ASC');
            $result = $selected_table->get()->getResult();
        }
        if (!empty($result)) {
            $output = '<option value="">Select</option>';

            $selected_hotel = $hid;
            foreach ($result as $row) {
                if ($row->hotel_id == $selected_hotel) {
                    $output .= '<option value="' . $row->hotel_id . '" selected>' . $row->object_name . '</option>';
                } else {
                    $output .= '<option value="' . $row->hotel_id . '">' . $row->object_name . '</option>';
                }
                $output .= '<option value="0">Own Arrangement</option>';
            }
        } else {
            $output = '<option value="">Select</option>';
            $output .= '<option value="0">Own Arrangement</option>';
        }
        return $output;
    }
    function select_random_hotel_id($result)
    {
        $total_hotels = count($result);
        if ($total_hotels == 0) {
            return null;
        }
        if (!isset($_SESSION['hotel_index'])) {
            $_SESSION['hotel_index'] = 0;
        }
        $current_index = $_SESSION['hotel_index'];
        if (empty($result[$current_index]->hotel_id)) {
            $_SESSION['hotel_index'] = 0;
            $current_index = $_SESSION['hotel_index'];
            $selected_hotel_id = $result[$current_index]->hotel_id;
        } else {
            $selected_hotel_id = $result[$current_index]->hotel_id;
        }
        $_SESSION['hotel_index'] = ($current_index + 1) % $total_hotels;
        return $selected_hotel_id;
    }
    /*function getTourRoomCategory($hotel_id, $no_of_double_room, $no_of_single_room)
    {
        $db = \Config\Database::connect();
        $userid = session('user_id');
        $output = '';
        if (empty($hotel_id) || $hotel_id == 0) {
            $output = '';
            $output .= '<option value="0">Own Arrangement</option>';
            return $output;
        } else {
            $selected_table = $db->table('khm_obj_hotel_room_category a');
            $selected_table->select('a.*,m.room_category_name')
                ->join('khm_obj_mst_hotel_room_category m', 'm.room_category_id = a.room_category_id', 'left')
                ->where('a.hotel_id', $hotel_id);
            $result = $selected_table->get()->getResult();
            if (!empty($result)) {
                $output = '<option value="">Select</option>';
                foreach ($result as $row) {
                    $output .= '<option value="' . $row->room_category_id . '">' . $row->room_category_name . '</option>';
                }
            } else {
                $output = '<option value="">Select</option>';
                $output .= '<option value="">Not Found</option>';
            }
            return $output;
        }
    }*/
    public function getTourRoomCategory($hotel_id, $no_of_double_room, $no_of_single_room)
    {
        $db = \Config\Database::connect();
        $userid = session('user_id');
        $output = '';
        $hotel_status = 0;

        if (empty($hotel_id) || $hotel_id == 0) {
            $output .= '<option value="0">Own Arrangement</option>';
            return ['output' => $output, 'hotel_status' => 0];
        } else {
            // Get room categories
            $selected_table = $db->table('khm_obj_hotel_room_category a');
            $selected_table->select('a.*,m.room_category_name')
                ->join('khm_obj_mst_hotel_room_category m', 'm.room_category_id = a.room_category_id', 'left')
                ->where('a.hotel_id', $hotel_id);
            $result = $selected_table->get()->getResult();

            if (!empty($result)) {
                $output = '<option value="">Select</option>';
                foreach ($result as $row) {
                    $output .= '<option value="' . $row->room_category_id . '">' . $row->room_category_name . '</option>';
                }
            } else {
                $output = '<option value="">Select</option>';
                $output .= '<option value="">Not Found</option>';
            }

            // 🔍 Get hotel_status
            $hotel_table = $db->table('khm_obj_hotel a');
            $hotel_row = $hotel_table->select('a.*,b.boolean_value')
                ->join('khm_obj_boolean b', 'b.object_id = a.object_id AND b.boolean_id = 4', 'inner')
                ->where('a.hotel_id', $hotel_id)
                ->get()->getResultArray();
            if (!empty($hotel_row)) {
                $hotel_status = $hotel_row[0]['boolean_value'];
            }
            else{
                $hotel_status = 0;
            }

            return ['output' => $output, 'hotel_status' => $hotel_status];
        }
    }

    function getHotelfacilities($hotel_id)
    {
        $db = \Config\Database::connect();
        $userid = session('user_id');
        $output = '';
        $selected_table = $db->table('khm_obj_hotel_facility a');
        $selected_table->select('a.*,f.facility_name')
            ->join('khm_obj_facility f', 'f.facility_id = a.facility_id', 'left')
            ->where('a.hotel_id', $hotel_id);
        $result = $selected_table->get()->getResult();
        if (!empty($result)) {
            $output = '<option value="">Select</option>';
            foreach ($result as $row) {
                $output .= '<option value="' . $row->hotel_facility_id . '">' . $row->facility_name . '</option>';
            }
        } else {
            $output = '<option value="">Select</option>';
            $output .= '<option value="">Not Found</option>';
        }
        return $output;
    }
    function getHotelFacilityName($hotel_facility_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_hotel_facility a');
        $result = $selected_table->select('a.*,m.facility_name')
            ->join('khm_obj_facility m', 'm.facility_id = a.facility_id', 'left')
            ->where('a.hotel_facility_id', $hotel_facility_id)
            ->get()->getResultArray();
        return $result;
    }
    function getHotelFacilitybyhotelid($hotel_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_hotel_facility a');
        $result = $selected_table->select('a.*,m.facility_name')
            ->join('khm_obj_facility m', 'm.facility_id = a.facility_id', 'left')
            ->where('a.hotel_id', $hotel_id)
            ->get()->getResultArray();
        return $result;
    }
    function getExtensionDetailsforItinerary($extension_ref_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_enquiry_detail_extensions');
        $result = $selected_table->select('*')
            ->where('extension_ref_id', $extension_ref_id)
            ->where('is_active', 1)
            ->get()->getResultArray();
        return $result;
    }
    function getExtensionDetailsbyid($enquiry_detail_details_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_enquiry_detail_extensions');
        $result = $selected_table->select('*')
            ->where('enquiry_detail_details_id', $enquiry_detail_details_id)
            ->get()->getResultArray();
        return $result;
    }
    function get_hotel_details_forac($enquiry_header_id, $extension_ref_id)
    {
        /*$db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_enquiry_tour_details a');
        $result = $selected_table->select('a.*,g.geog_name,o.object_name,r.room_category_name,p.meal_plan_name')
            ->join('khm_loc_mst_geography g', 'g.geog_id = a.tour_location', 'left')
            ->join('khm_obj_hotel h', 'h.hotel_id = a.hotel_id', 'left')
            ->join('khm_obj_mst o', 'o.object_id = h.object_id', 'left')
            ->join('khm_obj_mst_hotel_room_category r', 'r.room_category_id = a.room_category_id', 'left')
            ->join('khm_obj_meal_plan p', 'p.meal_plan_id = a.meal_plan_id', 'left')
            ->where('a.enquiry_header_id', $enquiry_header_id)
            ->where('a.enquiry_details_id', $enquiry_details_id)
            ->get()->getResultArray();
        return $result;*/

        $db = \Config\Database::connect();
        $response = [];
        $selected_table = $db->table('khm_obj_enquiry_itinerary_details a');
        $result = $selected_table->select('a.*,g.geog_name,o.object_name,r.room_category_name,t.meal_plan_id,d.total_no_of_pax,d.no_of_adult,d.no_of_child_with_bed,d.no_of_child_without_bed,d.no_of_double_room,d.no_of_single_room,d.no_of_extra_bed,d.date_of_tour_completion,mp.meal_type_name')
            ->join('khm_obj_enquiry_tour_details t', 't.tour_details_id = a.tour_details_id', 'left')
            ->join('khm_obj_enquiry_details d', 'd.enquiry_details_id = a.enquiry_details_id', 'left')
            ->join('khm_obj_mst_meal_type mp', 'mp.meal_type_id = t.meal_plan_id', 'left')
            ->join('khm_loc_mst_geography g', 'g.geog_id = t.tour_location', 'left')
            ->join('khm_obj_hotel h', 'h.hotel_id = a.hotel_id', 'left')
            ->join('khm_obj_mst o', 'o.object_id = h.object_id', 'left')
            ->join('khm_obj_mst_hotel_room_category r', 'r.room_category_id = a.room_category_id', 'left')
            ->where('a.enquiry_header_id', $enquiry_header_id)
            ->where('a.extension_ref_id', $extension_ref_id)
            ->get()->getResultArray();

        foreach ($result as $key => $val) {
            $response[$key] = $val;
            $cost = $this->get_itinerary_save_tariff($val['itinerary_details_id']);
            $response[$key]['cost'] = $cost;
        }
        return $response;
    }
    function get_hotel_details_foracbyid($enquiry_detail_details_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_enquiry_detail_extensions');
        $result = $selected_table->select('*')
            ->where('enquiry_detail_details_id', $enquiry_detail_details_id)
            ->get()->getResultArray();
        return $result;
    }
    function getExtensionDetailsbystatus($enquiry_header_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_enquiry_detail_extensions');
        $result = $selected_table->select('*')
            ->where('enquiry_header_id', $enquiry_header_id)
            ->where('availability_check', 1)
            ->get()->getResultArray();
        return $result;
    }
    function get_more_enquiry_details($enquiry_header_id)
    {
        $db = \Config\Database::connect();
        $er_det = $this->getEditRequestDetails($enquiry_header_id);
        $edit_request_id = $er_det[0]['enquiry_edit_request_id'];
        $selected_table = $db->table('khm_obj_enquiry_status a');
        $result = $selected_table->select('a.*,m.entity_name')
            ->join('khm_entity_mst m', 'm.entity_id = a.assigned_to', 'left')
            ->where('a.enquiry_header_id', $enquiry_header_id)
            ->where('a.edit_request_id', $edit_request_id)
            ->groupStart()
            ->where('a.current_status_id', 1)
            ->orWhere('a.current_status_id', 13)
            ->orWhere('a.current_status_id', 14)
            ->orWhere('a.current_status_id', 8)
            ->groupEnd()
            ->get()->getResultArray();
        return $result;
    }
    function get_status_history($enquiry_header_id)
    {
        $db = \Config\Database::connect();
        $er_det = $this->getEditRequestDetails($enquiry_header_id);
        $edit_request_id = $er_det[0]['enquiry_edit_request_id'];
        $selected_table = $db->table('khm_obj_enquiry_status a');
        $result = $selected_table->select('a.*,m.entity_name,s.status_name')
            ->join('khm_entity_mst m', 'm.entity_id = a.assigned_to', 'left')
            ->join('khm_obj_mst_enquiry_status s', 's.status_id = a.current_status_id', 'left')
            ->where('enquiry_header_id', $enquiry_header_id)
            ->where('edit_request_id', $edit_request_id)
            ->get()->getResultArray();
        return $result;
    }
    function getExtensionDetailsforItinerarynext($extension_ref_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_enquiry_detail_extensions');
        $result = $selected_table->select('*')
            ->where('extension_ref_id', $extension_ref_id)
            //->where('is_active', 1)
            ->get()->getResultArray();
        return $result;
    }
    function getHotelFaciliyTariffNew($facility_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_hotel_facility a');
        $result = $selected_table->select('a.*,m.facility_name')
            ->join('khm_obj_facility m', 'm.facility_id = a.facility_id', 'left')
            ->where('a.hotel_facility_id', $facility_id)
            ->get()->getResultArray();
        return $result;
    }
    function getItineraryDetailsById($itinerary_details_id)
    {
        $db = \Config\Database::connect();
        $response = [];
        $selected_table = $db->table('khm_obj_enquiry_itinerary_details');
        $result = $selected_table->select('*')
            ->where('itinerary_details_id', $itinerary_details_id)
            ->get()->getResultArray();
        foreach ($result as $key => $val) {
            $response[$key] = $val;
            $cost = $this->get_itinerary_save_tariff($val['itinerary_details_id']);
            $response[$key]['cost'] = $cost;
        }
        return $response;
    }
    function getSightName($sightseeing_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_sightseeing a');
        $result = $selected_table->select('a.*,m.object_name')
            ->join('khm_obj_mst m', 'm.object_id = a.object_id', 'left')
            ->where('a.sightseeing_id', $sightseeing_id)
            ->get()->getResultArray();
        return $result;
    }

    function getDefaultSightName($geog_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_loc_mst_geography');
        $result = $selected_table->select('*')
            ->where('geog_id', $geog_id)
            ->get()->getResultArray();
        return $result;
    }
    function get_markup_details($session_name)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_mst_mark_up a');
        $result = $selected_table->select('a.*')
            ->where('a.system', $session_name)
            ->get()->getResultArray();
        return $result;
    }
    function getTourRoomCategoryDraft($hotel_id, $rid, $no_of_double_room, $no_of_single_room)
    {
        $db = \Config\Database::connect();
        $userid = session('user_id');
        $hotel_status = 0;
        if (empty($hotel_id) || $hotel_id == 0) {
            $output = '<option value="">Select</option>';
            $output .= '<option value="0">Own Arrangement</option>';
            return $output;
        } else {
            //$object_ids = $this->getObjectidByhotel($hotel_id);
            //$object_id = $object_ids[0]['object_id'];

            $selected_table = $db->table('khm_obj_hotel_room_category a');
            $selected_table->select('a.*,m.room_category_name')
                ->join('khm_obj_mst_hotel_room_category m', 'm.room_category_id = a.room_category_id', 'left')
                ->where('a.hotel_id', $hotel_id);
            $result = $selected_table->get()->getResult();

            if (!empty($result)) {
                $output = '<option value="">Select</option>';
                foreach ($result as $row) {
                    //$room_cat_name = $row->room_category_name."(".$row->room_type_name.")";
                    if ($row->room_category_id == $rid) {
                        $output .= '<option value="' . $row->room_category_id . '" selected>' . $row->room_category_name . '</option>';
                    } else {
                        $output .= '<option value="' . $row->room_category_id . '">' . $row->room_category_name . '</option>';
                    }
                }
            } else {
                $output = '<option value="">Select</option>';
                $output .= '<option value="">Not Found</option>';
            }

            $hotel_table = $db->table('khm_obj_hotel a');
            $hotel_row = $hotel_table->select('a.*')
                ->join('khm_obj_boolean b', 'b.object_id = a.object_id AND b.boolean_id = 4', 'inner')
                ->where('hotel_id', $hotel_id)
                ->get()->getResultArray();
            if (!empty($hotel_row)) {
                $hotel_status = $hotel_row[0]['boolean_value'];
            }
            else{
                $hotel_status = 0;
            }

            return ['output' => $output, 'hotel_status' => $hotel_status];
            //return $output;
        }
    }
    function getVehicleTypes($location_id)
    {
        $db = \Config\Database::connect();
        $userid = session('user_id');

        $selected_table = $db->table('khm_obj_mst_vehicle_type a');
        $selected_table->select('a.*,m.vehicle_model_name')
            ->join('khm_obj_mst_vehicle_model m', 'm.vehicle_model_id = a.vehicle_model_id', 'left')
            ->where('a.hub_location_id', $location_id)
            ->orderBy('m.vehicle_model_name', 'ASC');
        $result = $selected_table->get()->getResult();
        if (!empty($result)) {
            $output = '<option value="">Select Vehicle Types from here</option>';
            foreach ($result as $row) {
                $output .= '<option value="' . $row->vehicle_type_id . '">' . $row->vehicle_model_name . '</option>';
            }
        } else {
            $output = '<option value="">Select Vehicle Types from here</option>';
            $output .= '<option value="">Not Found</option>';
        }
        return $output;
    }
    function getVehicleName($id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_mst_vehicle_type a');
        $result = $selected_table->select('a.*,m.vehicle_model_name')
            ->join('khm_obj_mst_vehicle_model m', 'm.vehicle_model_id = a.vehicle_model_id', 'left')
            ->where('a.vehicle_type_id', $id)
            ->get()->getResultArray();
        return $result;
    }

    public function getAgentDetails($agent_id)
    {
        $db = \Config\Database::connect();
        $table = $db->table('khm_entity_mst a');
        $result = $table->select('a.*,m.entity_attr_value')
            ->join('khm_entity_attribute m', 'm.entity_id = a.entity_id', 'left')
            ->where('m.entity_class_attr_id', 1970)
            ->where('a.entity_id', $agent_id)
            ->get()->getResultArray();
        return $result;
    }
    public function getAgentDetailsforedit($agent_id)
    {
        $db = \Config\Database::connect();
        $table = $db->table('khm_entity_mst a');
        $result = $table->select('a.*,m.entity_attr_value,r.entity_attribute_name,r.entity_attribute_id')
            ->join('khm_entity_attribute m', 'm.entity_id = a.entity_id', 'left')
            ->join('khm_entity_detail_class_attribute c', 'c.entity_class_attr_id = m.entity_class_attr_id', 'left')
            ->join('khm_entity_mst_attribute r', 'r.entity_attribute_id = c.entity_attribute_id', 'left')
            //->where('m.entity_class_attr_id', 1970)
            ->where('a.entity_id', $agent_id)
            ->get()->getResultArray();
        return $result;
    }
    public function getHotelFacilityTariff($facility_ids)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('khm_obj_hotel_facility a');
        $builder->select('a.hotel_facility_id, a.tariff');

        if (is_array($facility_ids)) {
            $builder->whereIn('a.hotel_facility_id', $facility_ids);
        } else {
            $builder->where('a.hotel_facility_id', $facility_ids); // fallback for single ID
        }

        return $builder->get()->getResultArray();
    }
    public function getSightSeeingTariff($sight_seeing_id)
    {
        $db = \Config\Database::connect();
        $table = $db->table('khm_obj_sightseeing a');
        $result = $table->select('a.*')
            ->where('a.sightseeing_id', $sight_seeing_id)
            ->get()->getResultArray();
        return $result;
    }
    public function get_hotelid_byobject($object_id)
    {
        $db = \Config\Database::connect();
        $table = $db->table('khm_obj_hotel');
        $result = $table->select('*')
            ->where('object_id', $object_id)
            ->get()->getResultArray();
        return $result;
    }
    public function get_hotel_name_byid($hotel_id)
    {
        $db = \Config\Database::connect();
        $table = $db->table('khm_obj_hotel a');
        $result = $table->select('a.*,m.object_name,m.object_address,m.object_ph_no')
            ->join('khm_obj_mst m', 'm.object_id = a.object_id', 'left')
            ->where('a.hotel_id', $hotel_id)
            ->get()->getResultArray();
        return $result;
    }
    public function get_rc_name_byid($room_category_id)
    {
        $db = \Config\Database::connect();
        $table = $db->table('khm_obj_mst_hotel_room_category');
        $result = $table->select('*')
            ->where('room_category_id', $room_category_id)
            ->get()->getResultArray();
        return $result;
    }
    public function get_enquiry_details_data($enquiry_header_id, $enquiry_details_id)
    {
        $db = \Config\Database::connect();
        $table = $db->table('khm_obj_enquiry_details');
        $result = $table->select('*')
            ->where('enquiry_header_id', $enquiry_header_id)
            ->where('enquiry_details_id', $enquiry_details_id)
            ->get()->getResultArray();
        return $result;
    }
    public function get_hotel_facilities($hotel_id)
    {
        $db = \Config\Database::connect();
        $table = $db->table('khm_obj_hotel_facility a');
        $result = $table->select('a.*,f.facility_name')
            ->join('khm_obj_facility f', 'f.facility_id = a.facility_id', 'left')
            ->where('a.hotel_id', $hotel_id)
            ->get()->getResultArray();
        return $result;
    }
    public function get_sight_seeing($location_id)
    {
        $db = \Config\Database::connect();
        $table = $db->table('khm_obj_sightseeing a');
        $result = $table->select('a.*,f.object_name')
            ->join('khm_obj_mst f', 'f.object_id = a.object_id', 'left')
            ->where('f.object_location_id', $location_id)
            ->get()->getResultArray();
        return $result;
    }
    public function check_guest_exist($guest_name, $guest_mobile, $guest_email)
    {
        $db = \Config\Database::connect();
        $entity_class_id = 13;

        $selected_table = $db->table('khm_entity_mst');
        $count_rows = $selected_table
            ->where('entity_class_id', $entity_class_id)
            ->where('entity_name', $guest_name)
            ->where('JSON_UNQUOTE(JSON_EXTRACT(entity_mobile, "$[0]"))', $guest_mobile)
            ->where('JSON_UNQUOTE(JSON_EXTRACT(entity_email, "$[0]"))', $guest_email)
            ->countAllResults();

        return $count_rows > 0 ? $count_rows : 0;
    }
    public function is_exist_confirm_hotel($itinerary_details_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_hotel_confirmation');
        $count_rows = $selected_table
            ->where('itinerary_details_id', $itinerary_details_id)
            ->countAllResults();
        return $count_rows > 0 ? $count_rows : 0;
    }

    public function check_cs_name_exist($enquiry_header_id, $cs_name)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_enquiry_detail_extensions');
        $count_rows = $selected_table
            ->where('enquiry_header_id', $enquiry_header_id)
            ->where('cs_name', $cs_name)
            ->countAllResults();
        return $count_rows > 0 ? $count_rows : 0;
    }
    public function is_vehicle_id_exist($vehicle_id, $enquiry_header_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_transport_follow_up');
        $count_rows = $selected_table
            ->where('vehicle_id', $vehicle_id)
            ->where('enquiry_header_id', $enquiry_header_id)
            ->countAllResults();
        return $count_rows > 0 ? $count_rows : 0;
    }
    public function is_edit_request_exist($enquiry_header_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_enquiry_edit_request');
        $count_rows = $selected_table
            ->where('enquiry_header_id', $enquiry_header_id)
            ->where('edit_request_status', 2)
            ->countAllResults();
        return $count_rows > 0 ? $count_rows : 0;
    }
    public function is_availability_check_exist($enquiry_header_id)
    {
        $db = \Config\Database::connect();
        $er_det = $this->getEditRequestDetails($enquiry_header_id);
        $edit_request_id = $er_det[0]['enquiry_edit_request_id'];
        $table = $db->table('khm_obj_enquiry_status');
        $result = $table->select('*')
            ->where('enquiry_header_id', $enquiry_header_id)
            ->where('current_status_id', 8)
            ->where('edit_request_id', $edit_request_id)
            ->get()->getResultArray();
        return $result;
    }
    public function is_status_check_exist($enquiry_header_id, $status)
    {
        $db = \Config\Database::connect();
        $er_det = $this->getEditRequestDetails($enquiry_header_id);
        $edit_request_id = $er_det[0]['enquiry_edit_request_id'];
        $table = $db->table('khm_obj_enquiry_status');
        $result = $table->select('*')
            ->where('enquiry_header_id', $enquiry_header_id)
            ->where('current_status_id', $status)
            ->where('edit_request_id', $edit_request_id)
            ->get()->getResultArray();
        return $result;
    }
    public function getEditRequestDetailsforAdmin($enquiry_header_id)
    {
        $db = \Config\Database::connect();
        $table = $db->table(' khm_obj_enquiry_edit_request a');
        $result = $table->select('a.*,g.edit_request_reason as edit_request_reason_name')
            ->join('khm_obj_mst_edit_request_reason g', 'g.edit_request_reason_id = a.edit_request_reason', 'left')
            ->where('a.enquiry_header_id', $enquiry_header_id)
            ->where('a.edit_request_status', 2)
            ->get()->getResultArray();
        return $result;
    }
    public function check_ac_exist($enquiry_header_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_enquiry_detail_extensions');
        $count_rows = $selected_table
            ->where('enquiry_header_id', $enquiry_header_id)
            ->where('availability_check', 1)
            ->countAllResults();
        return $count_rows > 0 ? $count_rows : 0;
    }
    public function get_all_itinerary_version_count($enquiry_header_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_enquiry_itinerary_details');
        $count_rows = $selected_table
            ->where('enquiry_header_id', $enquiry_header_id)
            ->groupBy('extension_ref_id')
            ->countAllResults();
        return $count_rows > 0 ? $count_rows : 0;
    }
    public function checkStatusExist($enquiry_header_id, $status_id)
    {
        $db = \Config\Database::connect();
        $er_det = $this->getEditRequestDetails($enquiry_header_id);
        $edit_request_id = $er_det[0]['enquiry_edit_request_id'];
        $selected_table = $db->table('khm_obj_enquiry_status');
        $count_rows = $selected_table
            ->where('enquiry_header_id', $enquiry_header_id)
            ->where('current_status_id', $status_id)
            ->where('edit_request_id', $edit_request_id)
            ->countAllResults();
        return $count_rows > 0 ? $count_rows : 0;
    }
    public function check_tour_location_exist($enquiry_header_id, $enquiry_details_id, $location_sequence)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_enquiry_tour_details');
        $count_rows = $selected_table
            ->where('enquiry_header_id', $enquiry_header_id)
            ->where('enquiry_details_id', $enquiry_details_id)
            ->where('location_sequence', $location_sequence)
            ->where('is_active', 1)
            ->where('is_draft', 1)
            ->countAllResults();
        return $count_rows > 0 ? $count_rows : 0;
    }
    public function check_tour_date_exist($enquiry_header_id, $enquiry_details_id, $tour_details_id, $tour_date)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_enquiry_itinerary_details');
        $count_rows = $selected_table
            ->where('enquiry_header_id', $enquiry_header_id)
            ->where('enquiry_details_id', $enquiry_details_id)
            ->where('tour_details_id', $tour_details_id)
            ->where('tour_date', $tour_date)
            ->where('is_active', 1)
            ->where('extension_ref_id', 0)
            ->countAllResults();
        return $count_rows > 0 ? $count_rows : 0;
    }

    public function get_tour_locations_count($enquiry_header_id, $enquiry_details_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_enquiry_tour_details');
        $count_rows = $selected_table
            ->where('enquiry_header_id', $enquiry_header_id)
            ->where('enquiry_details_id', $enquiry_details_id)
            ->where('is_active', 1)
            ->where('is_draft', 1)
            ->countAllResults();
        return $count_rows > 0 ? $count_rows : 0;
    }
    public function get_guest_details($guest_name, $guest_mobile, $guest_email)
    {
        $db = \Config\Database::connect();
        $entity_class_id = 13;
        $selected_table = $db->table('khm_entity_mst');
        $result = $selected_table->select('*')
            ->where('entity_class_id=', $entity_class_id)
            ->where('entity_name=', $guest_name)
            ->where("JSON_CONTAINS(entity_mobile, '\"{$guest_mobile}\"')", null, false)
            ->where("JSON_CONTAINS(entity_email, '\"{$guest_email}\"')", null, false)
            ->get()->getResultArray();
        return $result;
    }
    public function getstatusDetails($enquiry_header_id, $status_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_enquiry_status');
        $result = $selected_table->select('*')
            ->where('enquiry_header_id', $enquiry_header_id)
            ->where('current_status_id', $status_id)
            ->get()->getResultArray();
        return $result;
    }
    public function getEditRequestDetails($enquiry_header_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_enquiry_edit_request');
        $result = $selected_table->select('*')
            ->where('enquiry_header_id', $enquiry_header_id)
            ->where('is_active', 1)
            ->get()->getResultArray();
        return $result;
    }
    public function get_all_cs_details($enquiry_header_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_enquiry_detail_extensions');
        $result = $selected_table->select('*')
            ->where('enquiry_header_id', $enquiry_header_id)
            ->orderBy('created_date', 'DESC')
            ->get()->getResultArray();
        return $result;
    }
    public function get_tour_details_id($enquiry_header_id, $enquiry_details_id, $location_sequence)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_enquiry_tour_details');
        $result = $selected_table->select('*')
            ->where('enquiry_header_id', $enquiry_header_id)
            ->where('enquiry_details_id', $enquiry_details_id)
            ->where('location_sequence', $location_sequence)
            ->where('is_active', 1)
            ->get()->getResultArray();
        return $result;
    }
    public function get_itinerary_details_id($enquiry_header_id, $enquiry_details_id, $tour_details_id, $tour_date)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_enquiry_itinerary_details');
        $result = $selected_table->select('*')
            ->where('enquiry_header_id', $enquiry_header_id)
            ->where('enquiry_details_id', $enquiry_details_id)
            ->where('tour_details_id', $tour_details_id)
            ->where('tour_date', $tour_date)
            ->where('is_active', 1)
            ->where('extension_ref_id', 0)
            ->get()->getResultArray();
        return $result;
    }
    public function insert_enquiry_header($data)
    {
        $db = \Config\Database::connect();
        $response = $this->db->table($this->khm_obj_enquiry_header)->insert($data);
        $insert_id = $this->db->insertID();
        return $insert_id;
    }
    public function insert_payment_details($data)
    {
        $db = \Config\Database::connect();
        $response = $this->db->table($this->khm_obj_enquiry_payment)->insert($data);
        $insert_id = $this->db->insertID();
        return $insert_id;
    }
    public function insert_confirm_hotel($data)
    {
        $db = \Config\Database::connect();
        $response = $this->db->table($this->khm_hotel_confirmation)->insert($data);
        $insert_id = $this->db->insertID();
        return $insert_id;
    }
    public function insert_executive_followup($data)
    {
        $db = \Config\Database::connect();
        $response = $this->db->table($this->khm_obj_executive_follow_up)->insert($data);
        $insert_id = $this->db->insertID();
        return $insert_id;
    }
    public function insert_transport_followup($data)
    {
        $db = \Config\Database::connect();
        $response = $this->db->table($this->khm_obj_transport_follow_up)->insert($data);
        $insert_id = $this->db->insertID();
        return $insert_id;
    }
    public function insert_arr_det_followup($data)
    {
        $db = \Config\Database::connect();
        $response = $this->db->table($this->khm_obj_arrival_follow_up)->insert($data);
        $insert_id = $this->db->insertID();
        return $insert_id;
    }
    public function insert_dep_det_followup($data)
    {
        $db = \Config\Database::connect();
        $response = $this->db->table($this->khm_obj_departure_follow_up)->insert($data);
        $insert_id = $this->db->insertID();
        return $insert_id;
    }
    public function insert_all_call_followup($data)
    {
        $db = \Config\Database::connect();
        $response = $this->db->table($this->khm_obj_all_call_follow_up)->insert($data);
        $insert_id = $this->db->insertID();
        return $insert_id;
    }
    public function insertEnquirystatus($data)
    {
        $db = \Config\Database::connect();
        $response = $this->db->table($this->khm_obj_enquiry_status)->insert($data);
        $insert_id = $this->db->insertID();
        return $insert_id;
    }
    public function insertEditRequest($data)
    {
        $db = \Config\Database::connect();
        $response = $this->db->table($this->khm_obj_enquiry_edit_request)->insert($data);
        $insert_id = $this->db->insertID();
        return $insert_id;
    }
    public function insert_iti_costing($data)
    {
        $db = \Config\Database::connect();
        $response = $this->db->table($this->khm_obj_enquiry_detail_extensions)->insert($data);
        $insert_id = $this->db->insertID();
        return $insert_id;
    }
    public function insert_master_bifurcation($data)
    {
        $db = \Config\Database::connect();
        $response = $this->db->table($this->khm_mst_bifurcation)->insert($data);
        $insert_id = $this->db->insertID();
        return $insert_id;
    }
    public function insert_master_bifurcation_details($data)
    {
        $db = \Config\Database::connect();
        $response = $this->db->table($this->khm_mst_bifurcation_details)->insert($data);
        $insert_id = $this->db->insertID();
        return $insert_id;
    }
    public function update_tour_details($data, $tour_details_id)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->khm_obj_enquiry_tour_details)->update($data, ['tour_details_id' => $tour_details_id]);
    }

    public function update_approve_action($data, $payment_id)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->khm_obj_enquiry_payment)->update($data, ['payment_id' => $payment_id]);
    }
    public function update_payment_history_det($data, $payment_id)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->khm_obj_enquiry_payment)->update($data, ['payment_id' => $payment_id]);
    }
    public function updateEditRequestAction($data, $enquiry_edit_request_id)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->khm_obj_enquiry_edit_request)->update($data, ['enquiry_edit_request_id' => $enquiry_edit_request_id]);
    }
    public function updateEditRequestHeader($data, $enquiry_header_id)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->khm_obj_enquiry_header)->update($data, ['enquiry_header_id' => $enquiry_header_id]);
    }
    public function update_transport_followup($data, $transport_follow_up_id)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->khm_obj_transport_follow_up)->update($data, ['transport_follow_up_id' => $transport_follow_up_id]);
    }
    public function clearEditRequest_isactive($data, $enquiry_header_id)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->khm_obj_enquiry_edit_request)->update($data, ['enquiry_header_id' => $enquiry_header_id]);
    }
    public function update_cut_off_date($data, $enquiry_header_id)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->khm_obj_enquiry_edit_request)->update($data, ['enquiry_header_id' => $enquiry_header_id, 'is_active' => 1]);
    }
    public function update_confirm_hotel($data, $itinerary_details_id)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->khm_hotel_confirmation)->update($data, ['itinerary_details_id' => $itinerary_details_id]);
    }
    public function confirm_costing_sheet_finalize($data, $enquiry_header_id)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->khm_obj_enquiry_edit_request)->update($data, ['enquiry_header_id' => $enquiry_header_id, 'is_active' => 1]);
    }
    public function save_final_costing_sheet($data, $enquiry_detail_details_id)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->khm_obj_enquiry_detail_extensions)->update($data, ['enquiry_detail_details_id' => $enquiry_detail_details_id]);
    }
    public function update_availability_check($data, $enquiry_detail_details_id)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->khm_obj_enquiry_detail_extensions)->update($data, ['enquiry_detail_details_id' => $enquiry_detail_details_id]);
    }
    
    public function update_transport_itinerary($data,$enquiry_detail_details_id,$ymd)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->khm_obj_enquiry_itinerary_details)->update($data, ['extension_ref_id' => $enquiry_detail_details_id,'tour_date' => $ymd]);
    }
    public function updateAssignedStatus($data, $enquiry_header_id)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->khm_obj_enquiry_status)->update($data, ['enquiry_header_id' => $enquiry_header_id, 'current_status_id' => 8]);
    }
    public function reassignEmployee($data, $enquiry_header_id, $current_status_id)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->khm_obj_enquiry_status)->update($data, ['enquiry_header_id' => $enquiry_header_id, 'current_status_id' => $current_status_id]);
    }
    public function updateAvailabilityCheck($data, $enquiry_header_id)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->khm_obj_enquiry_detail_extensions)->update($data, ['enquiry_header_id' => $enquiry_header_id, 'availability_check' => 1]);
    }
    public function enquiry_details_clear_status($data, $enquiry_header_id)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->khm_obj_enquiry_details)->update($data, ['enquiry_header_id' => $enquiry_header_id]);
    }
    public function tour_plan_clear_status($data, $enquiry_header_id)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->khm_obj_enquiry_tour_details)->update($data, ['enquiry_header_id' => $enquiry_header_id]);
    }
    public function itinerary_clear_status($data, $enquiry_header_id)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->khm_obj_enquiry_itinerary_details)->update($data, ['enquiry_header_id' => $enquiry_header_id]);
    }

    public function enquiry_details_mc_status($data, $enquiry_header_id, $enquiry_ref_id)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->khm_obj_enquiry_details)->update($data, ['enquiry_header_id' => $enquiry_header_id, 'extension_ref_id' => $enquiry_ref_id]);
    }
    public function tour_plan_mc_status($data, $enquiry_header_id, $tour_plan_ref_id)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->khm_obj_enquiry_tour_details)->update($data, ['enquiry_header_id' => $enquiry_header_id, 'extension_ref_id' => $tour_plan_ref_id]);
    }
    public function itinerary_mc_status($data, $enquiry_header_id, $extension_ref_id)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->khm_obj_enquiry_itinerary_details)->update($data, ['enquiry_header_id' => $enquiry_header_id, 'extension_ref_id' => $extension_ref_id]);
    }

    public function linkItinearywithExtension($data, $enquiry_header_id, $enquiry_details_id)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->khm_obj_enquiry_itinerary_details)->update($data, ['enquiry_header_id' => $enquiry_header_id, 'enquiry_details_id' => $enquiry_details_id, 'is_active' => 1, 'is_draft' => 1]);
    }

    public function linkItinearywithTourplan($data, $enquiry_header_id, $enquiry_details_id)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->khm_obj_enquiry_tour_details)->update($data, ['enquiry_header_id' => $enquiry_header_id, 'enquiry_details_id' => $enquiry_details_id, 'is_active' => 1]);
    }
    public function linkItinearywithEnquiry($data, $enquiry_header_id, $enquiry_details_id)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->khm_obj_enquiry_details)->update($data, ['enquiry_header_id' => $enquiry_header_id, 'enquiry_details_id' => $enquiry_details_id, 'is_active' => 1]);
    }
    public function set_extension_ref_id($data, $enquiry_detail_details_id)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->khm_obj_enquiry_detail_extensions)->update($data, ['enquiry_detail_details_id' => $enquiry_detail_details_id]);
    }

    public function update_all_version_count($data, $enquiry_header_id)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->khm_obj_enquiry_detail_extensions)->update($data, ['enquiry_header_id' => $enquiry_header_id]);
    }

    public function set_tourplan_ref_id($data, $enquiry_detail_details_id)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->khm_obj_enquiry_detail_extensions)->update($data, ['enquiry_detail_details_id' => $enquiry_detail_details_id]);
    }
    public function set_enquiry_ref_id($data, $enquiry_detail_details_id)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->khm_obj_enquiry_detail_extensions)->update($data, ['enquiry_detail_details_id' => $enquiry_detail_details_id]);
    }
    public function update_enquiry_isactive($data, $enquiry_header_id)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->khm_obj_enquiry_details)->update($data, ['enquiry_header_id' => $enquiry_header_id]);
    }
    public function update_tourplan_isactive($data, $enquiry_header_id)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->khm_obj_enquiry_tour_details)->update($data, ['enquiry_header_id' => $enquiry_header_id]);
    }
    public function update_itinerary_isactive($data, $enquiry_header_id)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->khm_obj_enquiry_itinerary_details)->update($data, ['enquiry_header_id' => $enquiry_header_id]);
    }

    public function update_extension_isedit($data, $enquiry_header_id)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->khm_obj_enquiry_detail_extensions)->update($data, ['enquiry_header_id' => $enquiry_header_id]);
    }

    public function update_cs_active($data, $enquiry_header_id, $enquiry_details_id)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->khm_obj_enquiry_detail_extensions)->update($data, ['enquiry_header_id' => $enquiry_header_id]);
    }
    public function update_iti_details($data, $enquiry_header_id, $enquiry_details_id, $tour_details_id, $tour_date)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->khm_obj_enquiry_itinerary_details)->update($data, ['enquiry_header_id' => $enquiry_header_id, 'enquiry_details_id' => $enquiry_details_id, 'tour_details_id' => $tour_details_id, 'tour_date' => $tour_date, 'is_active' => 1, 'extension_ref_id' => 0]);
    }
    /*public function update_iti_detailsforedit($data,$enquiry_header_id,$extension_ref_id)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->khm_obj_enquiry_itinerary_details)->update($data, ['enquiry_header_id' => $enquiry_header_id,'extension_ref_id' => $extension_ref_id]);
    }*/
    public function update_iti_cost_details($data, $itinerary_details_id, $cost_component_id, $room_type_id)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->khm_obj_itinerary_costing_details)->update($data, ['itinerary_details_id' => $itinerary_details_id, 'cost_component_id' => $cost_component_id, 'room_type_id' => $room_type_id]);
    }
    public function update_qq_details($data, $tour_details_id, $cost_component_id, $room_type_id)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->khm_obj_enquiry_quick_quote)->update($data, ['tour_details_id' => $tour_details_id, 'cost_component_id' => $cost_component_id, 'room_type_id' => $room_type_id]);
    }
    public function insert_tour_details($data)
    {
        $db = \Config\Database::connect();
        $response = $this->db->table($this->khm_obj_enquiry_tour_details)->insert($data);
        $insert_id = $this->db->insertID();
        return $insert_id;
    }
    public function insert_eighteen_details_double($data)
    {
        $db = \Config\Database::connect();
        $response = $this->db->table($this->khm_eighteen_percentage_double)->insert($data);
        $insert_id = $this->db->insertID();
        return $insert_id;
    }
    public function insert_eighteen_details_single($data)
    {
        $db = \Config\Database::connect();
        $response = $this->db->table($this->khm_eighteen_percentage_single)->insert($data);
        $insert_id = $this->db->insertID();
        return $insert_id;
    }
    public function insert_iti_details($data)
    {
        $db = \Config\Database::connect();
        $response = $this->db->table($this->khm_obj_enquiry_itinerary_details)->insert($data);
        $insert_id = $this->db->insertID();
        return $insert_id;
    }
    public function insert_qq_details($data)
    {
        $db = \Config\Database::connect();
        $response = $this->db->table($this->khm_obj_enquiry_quick_quote)->insert($data);
        $insert_id = $this->db->insertID();
        return $insert_id;
    }
    public function insert_iti_cost_details($data)
    {
        $db = \Config\Database::connect();
        $response = $this->db->table($this->khm_obj_itinerary_costing_details)->insert($data);
        $insert_id = $this->db->insertID();
        return $insert_id;
    }
    public function insert_enquiry_details($data)
    {
        $db = \Config\Database::connect();
        $response = $this->db->table($this->khm_obj_enquiry_details)->insert($data);
        $insert_id = $this->db->insertID();
        return $insert_id;
    }
    public function load_object_enquiry_datas($object_id)
    {
        $db = \Config\Database::connect();
        $entity_class_attr_id = 1976;
        $selected_table = $db->table('khm_obj_mst a');
        $result = $selected_table->select('a.*,ag.entity_id as agentid,att.entity_attr_value as state_id,ag.entity_address as agentaddress,gs.entity_id as guestid,')
            ->join('khm_loc_mst_geography g', 'g.geog_id = a.object_location_id', 'left')
            ->join('khm_obj_enquiry_header h', 'h.object_id = a.object_id', 'left')
            ->join('khm_obj_enquiry_details t', 't.enquiry_header_id = h.enquiry_header_id', 'left')
            ->join('khm_entity_mst ag', 'ag.entity_id = h.agent_entity_id', 'left')
            ->join('khm_entity_mst gs', 'gs.entity_id = h.guest_entity_id', 'left')
            ->join('khm_entity_attribute att', 'att.entity_id = ag.entity_id', 'left')
            ->where('a.object_id', $object_id)
            ->where('h.is_active', 1)
            ->where('t.is_active', 1)
            //->where('att.entity_class_attr_id', $entity_class_attr_id)
            ->get()->getResultArray();
        return $result;
    }
    public function load_object_enquiry_datas_foredit($object_id)
    {
        $db = \Config\Database::connect();
        $entity_class_attr_id = 1976;
        $selected_table = $db->table('khm_obj_mst a');
        $result = $selected_table->select('a.*,ag.entity_id as agentid,ag.entity_address as agentaddress,gs.entity_id as guestid,t.date_of_tour_start,t.no_of_night,t.date_of_tour_completion,t.enquiry_source,t.total_no_of_pax,t.no_of_adult,t.no_of_child_with_bed,t.no_of_child_without_bed,t.no_of_double_room,t.no_of_single_room,t.no_of_extra_bed,t.gstin,t.vehicle_from_location,t.arrival_location,t.departure_location,t.hotel_category,t.meal_plan,t.is_vehicle_required,t.is_sight_seeing_required,t.is_quick_quote,t.vehicle_type_id,t.enq_description,t.source_reference,t.sales_support_assigned_to')
            ->join('khm_loc_mst_geography g', 'g.geog_id = a.object_location_id', 'left')
            ->join('khm_obj_enquiry_header h', 'h.object_id = a.object_id', 'left')
            ->join('khm_obj_enquiry_details t', 't.enquiry_header_id = h.enquiry_header_id', 'left')
            ->join('khm_entity_mst ag', 'ag.entity_id = h.agent_entity_id', 'left')
            ->join('khm_entity_mst gs', 'gs.entity_id = h.guest_entity_id', 'left')
            ->where('a.object_id', $object_id)
            ->where('h.is_active', 1)
            ->where('t.is_active', 1)
            ->get()->getResultArray();
        return $result;
    }
    public function get_object_details($object_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_mst a');
        $result = $selected_table->select('a.*,e.entity_name as agent_name,g.entity_name as guest_name,e.entity_mobile as agent_mobile,h.enq_type_id,h.enquiry_header_id,t.vehicle_from_location,t.arrival_location,t.departure_location,t.date_of_tour_start as date_of_tour_start_temp,t.is_quick_quote,t.is_vehicle_required,t.vehicle_type_id,t.hotel_category,t.no_of_adult,t.no_of_child_with_bed,t.no_of_child_without_bed,t.no_of_double_room,t.no_of_single_room,t.no_of_extra_bed,t.total_no_of_pax,t.meal_plan,t.enquiry_details_id,DATE_FORMAT(h.enq_added_date, "%d-%m-%Y") as enq_date,t.no_of_night,DATE_FORMAT(t.date_of_tour_start, "%d-%m-%Y") as start_date,DATE_FORMAT(t.date_of_tour_completion, "%d-%m-%Y") as end_date')
            ->join('khm_obj_enquiry_header h', 'h.object_id = a.object_id', 'left')
            ->join('khm_entity_mst e', 'e.entity_id = h.agent_entity_id', 'left')
            ->join('khm_entity_mst g', 'g.entity_id = h.guest_entity_id', 'left')
            ->join('khm_obj_enquiry_details t', 't.enquiry_header_id = h.enquiry_header_id', 'left')
            ->where('a.object_id', $object_id)
            ->where('h.is_active', 1)
            ->where('t.is_active', 1)
            ->get()->getResultArray();
        return $result;
    }
    public function get_object_details_byheader($enquiry_header_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_mst a');
        $result = $selected_table->select('a.*,er.cut_off_date,e.entity_name as agent_name,g.entity_name as guest_name,e.entity_mobile as agent_mobile,h.enq_type_id,h.enquiry_header_id,t.vehicle_from_location,t.arrival_location,t.departure_location,t.date_of_tour_start as date_of_tour_start_temp,t.is_quick_quote,t.is_vehicle_required,t.vehicle_type_id,t.hotel_category,t.no_of_adult,t.no_of_child_with_bed,t.no_of_child_without_bed,t.no_of_double_room,t.no_of_single_room,t.no_of_extra_bed,t.total_no_of_pax,t.meal_plan,t.enquiry_details_id,DATE_FORMAT(h.enq_added_date, "%d-%m-%Y") as enq_date,t.no_of_night,DATE_FORMAT(t.date_of_tour_start, "%d-%m-%Y") as start_date,DATE_FORMAT(t.date_of_tour_completion, "%d-%m-%Y") as end_date,h.ref_no')
            ->join('khm_obj_enquiry_header h', 'h.object_id = a.object_id', 'inner')
            ->join('khm_obj_enquiry_edit_request er', 'er.enquiry_header_id = h.enquiry_header_id AND er.is_active = 1', 'left')
            ->join('khm_entity_mst e', 'e.entity_id = h.agent_entity_id', 'left')
            ->join('khm_entity_mst g', 'g.entity_id = h.guest_entity_id', 'left')
            ->join('khm_obj_enquiry_details t', 't.enquiry_header_id = h.enquiry_header_id', 'left')
            ->where('h.enquiry_header_id', $enquiry_header_id)
            ->where('h.is_active', 1)
            ->where('t.is_active', 1)
            ->get()->getResultArray();
        return $result;
    }
    public function get_object_details_forcs($object_id, $enquiry_details_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_mst a');
        $result = $selected_table->select('a.*,h.ref_no,ed.cut_off_date,dep.geog_name as departure_loc,arr.geog_name as arrival_loc,gst.entity_attr_value as agent_gst,stn.geog_name as agent_state,gg.geog_name as guest_location,ga.geog_name as agent_location,e.entity_name as agent_name,e.entity_address as agent_address,g.entity_name as guest_name,g.entity_address as guest_address,e.entity_mobile as agent_mobile,h.enq_type_id,h.enquiry_header_id,t.vehicle_from_location,t.arrival_location,t.departure_location,t.date_of_tour_start as date_of_tour_start_temp,t.is_quick_quote,t.is_vehicle_required,t.vehicle_type_id,t.hotel_category,t.no_of_adult,t.no_of_child_with_bed,t.no_of_child_without_bed,t.no_of_double_room,t.no_of_single_room,t.no_of_extra_bed,t.total_no_of_pax,t.meal_plan,t.enquiry_details_id,DATE_FORMAT(h.enq_added_date, "%d-%m-%Y") as enq_date,t.no_of_night,DATE_FORMAT(t.date_of_tour_start, "%d-%m-%Y") as start_date,DATE_FORMAT(t.date_of_tour_completion, "%d-%m-%Y") as end_date,t.date_of_tour_completion')
            ->join('khm_obj_enquiry_header h', 'h.object_id = a.object_id', 'left')
            ->join('khm_entity_mst e', 'e.entity_id = h.agent_entity_id', 'left')
            ->join('khm_entity_mst g', 'g.entity_id = h.guest_entity_id', 'left')
            ->join('khm_loc_mst_geography ga', 'ga.geog_id = e.entity_location_id', 'left')
            ->join('khm_loc_mst_geography gg', 'gg.geog_id = g.entity_location_id', 'left')
            ->join('khm_entity_attribute st', 'st.entity_id = e.entity_id AND st.entity_class_attr_id = 1978', 'left')
            ->join('khm_entity_attribute gst', 'gst.entity_id = e.entity_id AND gst.entity_class_attr_id = 1975', 'left')
            ->join('khm_loc_mst_geography stn', 'stn.geog_id = st.entity_attr_value', 'left')
            ->join('khm_obj_enquiry_details t', 't.enquiry_header_id = h.enquiry_header_id', 'left')
            ->join('khm_loc_mst_geography arr', 'arr.geog_id = t.arrival_location', 'left')
            ->join('khm_loc_mst_geography dep', 'dep.geog_id = t.departure_location', 'left')
            ->join(' khm_obj_enquiry_edit_request ed', 'ed.enquiry_header_id = h.enquiry_header_id AND ed.is_active=1', 'left')
            ->where('a.object_id', $object_id)
            ->where('t.enquiry_details_id', $enquiry_details_id)
            ->get()->getResultArray();
        return $result;
    }
    public function getselectedtourplandetails($object_id, $enquiry_header_id, $enquiry_details_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_mst a');
        $result = $selected_table->select('a.*,e.entity_name as agent_name,g.entity_name as guest_name,e.entity_mobile as agent_mobile,h.enq_type_id,h.enquiry_header_id,t.vehicle_from_location,t.arrival_location,t.departure_location,t.date_of_tour_start as date_of_tour_start_temp,t.is_quick_quote,t.is_vehicle_required,t.vehicle_type_id,t.hotel_category,t.no_of_adult,t.no_of_child_with_bed,t.no_of_child_without_bed,t.no_of_double_room,t.no_of_single_room,t.no_of_extra_bed,t.total_no_of_pax,t.meal_plan,t.enquiry_details_id,DATE_FORMAT(h.enq_added_date, "%d-%m-%Y") as enq_date,t.no_of_night,DATE_FORMAT(t.date_of_tour_start, "%d-%m-%Y") as start_date,DATE_FORMAT(t.date_of_tour_completion, "%d-%m-%Y") as end_date')
            ->join('khm_obj_enquiry_header h', 'h.object_id = a.object_id', 'left')
            ->join('khm_entity_mst e', 'e.entity_id = h.agent_entity_id', 'left')
            ->join('khm_entity_mst g', 'g.entity_id = h.guest_entity_id', 'left')
            ->join('khm_obj_enquiry_details t', 't.enquiry_header_id = h.enquiry_header_id', 'left')
            ->where('a.object_id', $object_id)
            ->where('h.enquiry_header_id', $enquiry_header_id)
            ->where('t.enquiry_details_id', $enquiry_details_id)
            ->get()->getResultArray();
        return $result;
    }
    public function update_iti_detailsforedit($data, $enquiry_header_id, $extension_ref_id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('khm_obj_enquiry_itinerary_details');
        $builder->where('enquiry_header_id', $enquiry_header_id);
        $builder->where('extension_ref_id !=', 0);
        return $builder->update($data);
    }
    public function get_itinerary_draft_details($enquiry_header_id, $enquiry_details_id, $tour_details_id)
    {
        $db = \Config\Database::connect();
        $response = [];
        $selected_table = $db->table('khm_obj_enquiry_itinerary_details a');
        $result = $selected_table->select('a.*')
            ->where('a.enquiry_header_id', $enquiry_header_id)
            ->where('a.enquiry_details_id', $enquiry_details_id)
            ->where('a.tour_details_id', $tour_details_id)
            ->where('a.is_active', 1)
            //->where('a.is_draft', 0)
            ->get()->getResultArray();
        foreach ($result as $key => $val) {
            $response[$key] = $val;
            $cost = $this->get_itinerary_draft_tariff($val['itinerary_details_id']);
            $response[$key]['cost'] = $cost;
            $room_cat_list = $this->get_room_categories_byHotel($val['hotel_id']);
            $response[$key]['room_cat_list_draft'] = $room_cat_list;
        }
        return $response;
    }
    public function get_itinerary_previous_details($extension_ref_id)
    {
        $db = \Config\Database::connect();
        $response = [];
        $selected_table = $db->table('khm_obj_enquiry_itinerary_details a');
        $result = $selected_table->select('a.*,t.tour_location')
            ->join('khm_obj_enquiry_tour_details t', 't.tour_details_id = a.tour_details_id', 'left')
            ->where('a.extension_ref_id', $extension_ref_id)
            ->get()->getResultArray();
        foreach ($result as $key => $val) {
            $response[$key] = $val;
            $cost = $this->get_itinerary_draft_tariff($val['itinerary_details_id']);
            $response[$key]['cost'] = $cost;
            $room_cat_list = $this->get_room_categories_byHotel($val['hotel_id']);
            $response[$key]['room_cat_list_draft'] = $room_cat_list;
        }
        return $response;
    }
    public function get_itinerary_draft_hotel_list($tour_location)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_mst a');
        $result = $selected_table->select('a.*,m.hotel_id')
            ->join('khm_obj_hotel m', 'm.object_id = a.object_id', 'left')
            ->where('a.object_location_id=', $tour_location)
            ->orderBy('a.object_name', 'ASC')
            ->get()->getResultArray();
        return $result;
    }
    public function get_guest_details_for_followup($enquiry_header_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_enquiry_header a');
        $result = $selected_table->select('a.*,dep.geog_name as end_location,arr.geog_name as start_location,d.date_of_tour_start,d.no_of_night,d.date_of_tour_completion,m.entity_name,m.entity_mobile,m.entity_email,m.entity_address')
            ->join('khm_entity_mst m', 'm.entity_id = a.guest_entity_id', 'left')
            ->join('khm_obj_enquiry_details d', 'd.enquiry_header_id  = a.enquiry_header_id', 'left')
            ->join('khm_loc_mst_geography arr', 'arr.geog_id  = d.arrival_location', 'left')
            ->join('khm_loc_mst_geography dep', 'dep.geog_id  = d.departure_location', 'left')
            ->where('a.enquiry_header_id=', $enquiry_header_id)
            ->where('d.is_active=', 1)
            ->get()->getResultArray();
        return $result;
    }
    public function get_itinerary_draft_tariff($itinerary_details_id)
    {
        $db = \Config\Database::connect();
        $table = $db->table('khm_obj_itinerary_costing_details');
        $result = $table->select('*')
            ->where('itinerary_details_id', $itinerary_details_id)
            ->where('is_active', 1)
            //->where('is_draft', 0)
            ->get()->getResultArray();
        return $result;
    }
    public function get_edit_request_reasons()
    {
        $db = \Config\Database::connect();
        $table = $db->table('khm_obj_mst_edit_request_reason');
        $result = $table->select('*')
            ->get()->getResultArray();
        return $result;
    }

    public function getEnquiryDetailsforpayments($enquiry_header_id, $enquiry_details_id, $edit_request_id)
    {
        $db = \Config\Database::connect();
        $table = $db->table('khm_obj_enquiry_details a');
        $result = $table->select('a.*,sop.assigned_to as sop_id,exe.assigned_to as executive_id,h.guest_entity_id,h.agent_entity_id,h.employee_entity_id,h.ref_no')
            ->join('khm_obj_enquiry_header h', 'h.enquiry_header_id = a.enquiry_header_id', 'left')
            ->join('khm_obj_enquiry_status exe', 'exe.enquiry_header_id = a.enquiry_header_id AND exe.current_status_id = 1 AND exe.edit_request_id = ' . $edit_request_id . '', 'left')
            ->join('khm_obj_enquiry_status sop', 'sop.enquiry_header_id = a.enquiry_header_id AND sop.current_status_id = 13 AND sop.edit_request_id = ' . $edit_request_id . '', 'left')
            ->where('a.enquiry_details_id', $enquiry_details_id)
            ->get()->getResultArray();
        return $result;
    }
    public function get_enquiry_header_details($enquiry_header_id)
    {
        $db = \Config\Database::connect();
        $table = $db->table('khm_obj_enquiry_header');
        $result = $table->select('*')
            ->where('enquiry_header_id', $enquiry_header_id)
            ->get()->getResultArray();
        return $result;
    }
    public function get_current_edit_request_details($enquiry_header_id)
    {
        $db = \Config\Database::connect();
        $table = $db->table('khm_obj_enquiry_edit_request');
        $result = $table->select('*')
            ->where('enquiry_header_id', $enquiry_header_id)
            ->where('is_active', 1)
            ->get()->getResultArray();
        return $result;
    }
    public function getSOPName($entity_id)
    {
        $db = \Config\Database::connect();
        $table = $db->table('khm_entity_mst');
        $result = $table->select('*')
            ->where('entity_id', $entity_id)
            ->get()->getResultArray();
        return $result;
    }
    public function getAlreadyAssignedsop($enquiry_header_id)
    {
        $db = \Config\Database::connect();
        $er_det = $this->getEditRequestDetails($enquiry_header_id);
        $edit_request_id = $er_det[0]['enquiry_edit_request_id'];
        $table = $db->table('khm_obj_enquiry_status');
        $result = $table->select('*')
            ->where('enquiry_header_id', $enquiry_header_id)
            ->where('current_status_id', 8)
            ->where('edit_request_id', $edit_request_id)
            ->get()->getResultArray();
        return $result;
    }
    public function get_enquiry_header_id($object_id)
    {
        $db = \Config\Database::connect();
        $table = $db->table('khm_obj_enquiry_header');
        $result = $table->select('*')
            ->where('object_id', $object_id)
            ->where('is_active', 1)
            ->get()->getResultArray();
        return $result;
    }
    public function get_all_enquiry_details($enq_header_id)
    {
        $db = \Config\Database::connect();
        $table = $db->table('khm_obj_enquiry_details');
        $result = $table->select('enquiry_details_id,extension_ref_id,is_active,created_date')
            ->where('enquiry_header_id', $enq_header_id)
            ->orderBy('created_date', 'DESC')
            ->get()->getResultArray();
        return $result;
    }
    public function get_all_enquiry_header_details($object_id)
    {
        $db = \Config\Database::connect();
        $table = $db->table('khm_obj_enquiry_header');
        $result = $table->select('enquiry_header_id,is_active,enq_added_date')
            ->where('object_id', $object_id)
            ->get()->getResultArray();
        return $result;
    }
    public function get_all_tourplan_byid($enquiry_details_id)
    {
        $db = \Config\Database::connect();
        $table = $db->table('khm_obj_enquiry_tour_details');
        $result = $table->select('extension_ref_id,tour_details_id,enquiry_header_id,enquiry_details_id,is_active,updated_time')
            ->where('enquiry_details_id', $enquiry_details_id)
            ->groupBy('extension_ref_id')
            ->orderBy('updated_time', 'DESC')
            ->get()->getResultArray();
        return $result;
    }
    public function get_all_extensions_byid($extension_ref_id)
    {
        $db = \Config\Database::connect();
        $table = $db->table('khm_obj_enquiry_detail_extensions');
        $result = $table->select('*')
            ->where('extension_ref_id', $extension_ref_id)
            ->orderBy('created_date', 'DESC')
            ->get()->getResultArray();
        return $result;
    }
    public function get_enquiry_extensions_byid($enquiry_detail_details_id)
    {
        $db = \Config\Database::connect();
        $table = $db->table('khm_obj_enquiry_detail_extensions');
        $result = $table->select('*')
            ->where('enquiry_detail_details_id', $enquiry_detail_details_id)
            ->get()->getResultArray();
        return $result;
    }
    public function get_all_itinerary_byid($tour_plan_ref_id)
    {
        $db = \Config\Database::connect();
        $table = $db->table('khm_obj_enquiry_itinerary_details a');
        $result = $table->select('a.itinerary_details_id,a.extension_ref_id,a.tour_plan_ref_id,a.is_active,a.is_draft,MAX(a.updated_time) as updated_time,e.cs_name')
            ->join('khm_obj_enquiry_detail_extensions e', 'e.enquiry_detail_details_id = a.extension_ref_id', 'left')
            ->where('a.tour_plan_ref_id', $tour_plan_ref_id)
            ->groupBy('a.extension_ref_id')
            ->orderBy('a.updated_time', 'DESC')
            ->get()->getResultArray();
        return $result;
    }
    public function getallitineraryids($extension_ref_id)
    {
        $db = \Config\Database::connect();
        $table = $db->table('khm_obj_enquiry_itinerary_details');
        $result = $table->select('itinerary_details_id')
            ->where('extension_ref_id', $extension_ref_id)
            ->get()->getResultArray();
        return $result;
    }
    public function get_extension_ref_id($enquiry_header_id, $enquiry_details_id)
    {
        $db = \Config\Database::connect();
        $table = $db->table('khm_obj_enquiry_itinerary_details');
        $result = $table->select('extension_ref_id')
            ->where('enquiry_header_id', $enquiry_header_id)
            ->where('enquiry_details_id', $enquiry_details_id)
            ->where('is_active', 1)
            ->where('is_draft', 1)
            ->get()->getResultArray();
        return $result;
    }
    public function get_itinerary_save_details($enquiry_header_id, $enquiry_details_id, $tour_details_id)
    {
        $db = \Config\Database::connect();
        $response = [];
        $selected_table = $db->table('khm_obj_enquiry_itinerary_details a');
        $result = $selected_table->select('a.*,g.geog_name,o.object_name,r.room_category_name,m.meal_plan_name')
            ->join('khm_obj_enquiry_tour_details t', 't.tour_details_id = a.tour_details_id', 'left')
            ->join('khm_loc_mst_geography g', 'g.geog_id = t.tour_location', 'left')
            ->join('khm_obj_meal_plan m', 'm.meal_plan_id = t.meal_plan_id', 'left')
            ->join('khm_obj_hotel h', 'h.hotel_id = a.hotel_id', 'left')
            ->join('khm_obj_mst o', 'o.object_id = h.object_id', 'left')
            ->join('khm_obj_mst_hotel_room_category r', 'r.room_category_id = a.room_category_id', 'left')
            ->where('a.enquiry_header_id', $enquiry_header_id)
            ->where('a.enquiry_details_id', $enquiry_details_id)
            ->where('a.tour_details_id', $tour_details_id)
            ->where('a.is_active', 1)
            ->where('a.is_draft', 1)
            ->get()->getResultArray();
        foreach ($result as $key => $val) {
            $response[$key] = $val;
            $cost = $this->get_itinerary_save_tariff($val['itinerary_details_id']);
            $response[$key]['cost'] = $cost;
        }
        return $response;
    }

    public function get_itinerary_save_details_for_cs($id, $extension_ref_id, $enquiry_details_id, $tour_details_id)
    {

        $db = \Config\Database::connect();
        $response = [];
        $selected_table = $db->table('khm_obj_enquiry_itinerary_details a');
        $result = $selected_table->select('a.*,gd.geog_name as departure_location_name,g.geog_name,o.object_name,r.room_category_name,m.meal_plan_name')
            ->join('khm_obj_enquiry_detail_extensions ext', 'ext.enquiry_detail_details_id = a.extension_ref_id', 'left')
            ->join('khm_obj_enquiry_details d', 'd.enquiry_details_id = ext.enquiry_ref_id', 'left')
            ->join('khm_obj_enquiry_tour_details t', 't.tour_details_id = a.tour_details_id', 'left')
            ->join('khm_loc_mst_geography g', 'g.geog_id = t.tour_location', 'left')
            ->join('khm_loc_mst_geography gd', 'gd.geog_id = d.departure_location', 'left')
            ->join('khm_obj_meal_plan m', 'm.meal_plan_id = t.meal_plan_id', 'left')
            ->join('khm_obj_hotel h', 'h.hotel_id = a.hotel_id', 'left')
            ->join('khm_obj_mst o', 'o.object_id = h.object_id', 'left')
            ->join('khm_obj_mst_hotel_room_category r', 'r.room_category_id = a.room_category_id', 'left')
            ->where('a.enquiry_details_id', $enquiry_details_id)
            ->where('a.tour_details_id', $tour_details_id)
            ->where('a.extension_ref_id', $extension_ref_id)
            ->get()->getResultArray();
        foreach ($result as $key => $val) {
            $response[$key] = $val;
            $cost = $this->get_itinerary_save_tariff($val['itinerary_details_id']);
            $response[$key]['cost'] = $cost;
        }
        return $response;
    }
    public function get_all_itinerary_save_details($enquiry_header_id, $enquiry_details_id, $tour_details_id)
    {
        $db = \Config\Database::connect();
        $response = [];
        $selected_table = $db->table('khm_obj_enquiry_itinerary_details a');
        $result = $selected_table->select('a.*,g.geog_name,o.object_name,r.room_category_name,m.meal_plan_name')
            ->join('khm_obj_enquiry_tour_details t', 't.tour_details_id = a.tour_details_id', 'left')
            ->join('khm_loc_mst_geography g', 'g.geog_id = t.tour_location', 'left')
            ->join('khm_obj_meal_plan m', 'm.meal_plan_id = t.meal_plan_id', 'left')
            ->join('khm_obj_hotel h', 'h.hotel_id = a.hotel_id', 'left')
            ->join('khm_obj_mst o', 'o.object_id = h.object_id', 'left')
            ->join('khm_obj_mst_hotel_room_category r', 'r.room_category_id = a.room_category_id', 'left')
            ->where('a.enquiry_header_id', $enquiry_header_id)
            ->where('a.enquiry_details_id', $enquiry_details_id)
            ->where('a.tour_details_id', $tour_details_id)
            ->get()->getResultArray();
        return $result;
    }
    public function get_edit_history($enquiry_header_id, $enquiry_details_id, $tour_details_id, $tour_date)
    {
        $db = \Config\Database::connect();
        $response = [];
        $selected_table = $db->table('khm_obj_enquiry_itinerary_details a');
        $result = $selected_table->select('a.*,g.geog_name,o.object_name,r.room_category_name,m.meal_plan_name')
            ->join('khm_obj_enquiry_tour_details t', 't.tour_details_id = a.tour_details_id', 'left')
            ->join('khm_loc_mst_geography g', 'g.geog_id = t.tour_location', 'left')
            ->join('khm_obj_meal_plan m', 'm.meal_plan_id = t.meal_plan_id', 'left')
            ->join('khm_obj_hotel h', 'h.hotel_id = a.hotel_id', 'left')
            ->join('khm_obj_mst o', 'o.object_id = h.object_id', 'left')
            ->join('khm_obj_mst_hotel_room_category r', 'r.room_category_id = a.room_category_id', 'left')
            ->where('a.enquiry_header_id', $enquiry_header_id)
            ->where('a.enquiry_details_id', $enquiry_details_id)
            ->where('a.tour_details_id', $tour_details_id)
            ->where('a.tour_date', $tour_date)

            ->groupStart()
            ->groupStart()
            ->where('a.is_draft', 1)
            ->where('a.is_active', 1)
            ->groupEnd()
            ->orGroupStart()
            ->where('a.is_draft', 0)
            ->where('a.is_active', 0)
            ->groupEnd()
            ->groupEnd()

            ->orderBy('updated_time', 'DESC')
            ->get()->getResultArray();
        foreach ($result as $key => $val) {
            $response[$key] = $val;
            $cost = $this->get_itinerary_save_tariff($val['itinerary_details_id']);
            $response[$key]['cost'] = $cost;
        }
        return $response;
    }

    public function get_all_edit_history($enquiry_header_id)
    {
        $db = \Config\Database::connect();
        $response = [];
        $selected_table = $db->table('khm_obj_enquiry_itinerary_details a');
        $result = $selected_table->select('a.*,g.geog_name,o.object_name,r.room_category_name,m.meal_plan_name')
            ->join('khm_obj_enquiry_tour_details t', 't.tour_details_id = a.tour_details_id', 'left')
            ->join('khm_loc_mst_geography g', 'g.geog_id = t.tour_location', 'left')
            ->join('khm_obj_meal_plan m', 'm.meal_plan_id = t.meal_plan_id', 'left')
            ->join('khm_obj_hotel h', 'h.hotel_id = a.hotel_id', 'left')
            ->join('khm_obj_mst o', 'o.object_id = h.object_id', 'left')
            ->join('khm_obj_mst_hotel_room_category r', 'r.room_category_id = a.room_category_id', 'left')
            ->where('a.enquiry_header_id', $enquiry_header_id)

            ->groupStart()
            ->groupStart()
            ->where('a.is_draft', 1)
            ->where('a.is_active', 1)
            ->groupEnd()
            ->orGroupStart()
            ->where('a.is_draft', 0)
            ->where('a.is_active', 0)
            ->groupEnd()
            ->groupEnd()

            ->orderBy('updated_time', 'DESC')
            ->get()->getResultArray();
        foreach ($result as $key => $val) {
            $response[$key] = $val;
            $cost = $this->get_itinerary_save_tariff($val['itinerary_details_id']);
            $response[$key]['cost'] = $cost;
        }
        return $response;
    }

    public function get_previous_enquiry_details($enquiry_header_id)
    {
        $db = \Config\Database::connect();
        $response = [];
        $table = $db->table('khm_obj_enquiry_details');
        $result = $table->select('*')
            ->where('enquiry_header_id', $enquiry_header_id)
            ->where('is_active', 0)
            ->orderBy('created_date', 'DESC')
            ->get()->getResultArray();
        foreach ($result as $key => $val) {
            $tdetails = $this->get_tour_details_for_import($enquiry_header_id, $val['enquiry_details_id']);
            if (!empty($tdetails)) {
                $response[0] = $val;
                break;
            }
        }
        return $response;
    }
    public function get_previous_tour_plan($enquiry_header_id, $enquiry_details_id)
    {
        $db = \Config\Database::connect();
        $table = $db->table('khm_obj_enquiry_tour_details');
        $result = $table->select('*')
            ->where('enquiry_header_id', $enquiry_header_id)
            ->where('enquiry_details_id', $enquiry_details_id)
            ->where('is_active', 0)
            ->orderBy('updated_time', 'DESC')
            ->limit(1)
            ->get()->getResultArray();
        return $result;
    }
    public function get_previous_tour_plan_lastupdated($extension_ref_id)
    {
        $db = \Config\Database::connect();
        $table = $db->table('khm_obj_enquiry_tour_details');
        $response = [];
        $result = $table->select('*')
            ->where('extension_ref_id', $extension_ref_id)
            ->get()->getResultArray();

        foreach ($result as $key => $vals) {
            $cost = $this->get_tourcost_byid($vals['tour_details_id']);
            $response[$key] = $vals;
            $response[$key]['cost'] = $cost;
        }
        return $response;
    }
    public function get_tour_details_for_import($enquiry_header_id, $enquiry_details_id)
    {
        $db = \Config\Database::connect();
        $table = $db->table('khm_obj_enquiry_tour_details');
        $result = $table->select('*')
            ->where('enquiry_header_id', $enquiry_header_id)
            ->where('enquiry_details_id', $enquiry_details_id)
            ->get()->getResultArray();
        return $result;
    }
    public function get_current_tour_plan($enquiry_header_id, $enquiry_details_id)
    {
        $db = \Config\Database::connect();
        $table = $db->table('khm_obj_enquiry_tour_details');
        $result = $table->select('*')
            ->where('enquiry_header_id', $enquiry_header_id)
            ->where('enquiry_details_id', $enquiry_details_id)
            ->where('is_active', 1)
            ->get()->getResultArray();
        return $result;
    }
    public function get_itinerary_save_tariff($itinerary_details_id)
    {
        $db = \Config\Database::connect();
        $table = $db->table('khm_obj_itinerary_costing_details');
        $result = $table->select('*')
            ->where('itinerary_details_id', $itinerary_details_id)
            //->where('is_active', 1)
            //->where('is_draft', 1)
            ->get()->getResultArray();
        return $result;
    }
    public function get_tour_locations()
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_loc_mst_geography');
        $result = $selected_table->select('*')
            ->where('geog_level_id', 4)
            ->orderBy('geog_name', 'ASC')
            ->get()->getResultArray();
        return $result;
    }
    public function getseasonname($season_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_season_calendar');
        $result = $selected_table->select('*')
            ->where('season_id', $season_id)
            ->get()->getResultArray();
        return $result;
    }
    public function getEnquiryStatusDet($enquiry_header_id, $current_edit_request_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_enquiry_status');
        $result = $selected_table->select('*')
            ->where('enquiry_header_id', $enquiry_header_id)
            ->where('edit_request_id', $current_edit_request_id)
            ->where('current_status_id', 1)
            ->get()->getResultArray();
        return $result;
    }
    public function getEnquiryStatusDetforer($enquiry_header_id, $current_edit_request_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_enquiry_status');
        $result = $selected_table->select('*')
            ->where('enquiry_header_id', $enquiry_header_id)
            ->where('edit_request_id', $current_edit_request_id)
            ->where('current_status_id', 20)
            ->get()->getResultArray();
        return $result;
    }
    public function get_all_status()
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_mst_enquiry_status');
        $result = $selected_table->select('*')
            ->get()->getResultArray();
        return $result;
    }
    public function get_all_hotels()
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_hotel h');
        $result = $selected_table->select('h.*,o.object_name')
            ->join('khm_obj_mst o', 'o.object_id = h.object_id', 'left')
            ->get()->getResultArray();
        return $result;
    }
    public function get_tour_plan_tariff_bydate($tour_details_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_enquiry_quick_quote');
        $result = $selected_table->select('*')
            ->where('tour_details_id', $tour_details_id)
            ->where('is_active', 1)
            ->get()->getResultArray();
        return $result;
    }
    public function get_all_room_categories()
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_mst_hotel_room_category');
        $result = $selected_table->select('*')
            ->get()->getResultArray();
        return $result;
    }
    public function get_tour_plan_details($enquiry_header_id, $enquiry_details_id)
    {
        $db = \Config\Database::connect();
        $response = [];
        $selected_table = $db->table('khm_obj_enquiry_tour_details a');
        $result = $selected_table->select('a.*,mt.meal_type_name,g.geog_name,o.object_name,r.room_category_name,t.no_of_adult,t.no_of_child_with_bed,t.no_of_child_without_bed,t.no_of_double_room,t.no_of_single_room,t.no_of_extra_bed')
            ->join('khm_obj_enquiry_details t', 't.enquiry_details_id = a.enquiry_details_id', 'left')
            ->join('khm_loc_mst_geography g', 'g.geog_id = a.tour_location', 'left')
            ->join('khm_obj_hotel h', 'h.hotel_id = a.hotel_id', 'left')
            ->join('khm_obj_mst o', 'o.object_id = h.object_id', 'left')
            ->join('khm_obj_mst_meal_type mt', 'mt.meal_type_id = a.meal_plan_id', 'left')
            ->join('khm_obj_mst_hotel_room_category r', 'r.room_category_id = a.room_category_id', 'left')
            ->where('a.enquiry_header_id', $enquiry_header_id)
            ->where('a.enquiry_details_id', $enquiry_details_id)
            ->where('a.is_active', 1)
            ->where('a.is_draft', 0)
            ->get()->getResultArray();
        foreach ($result as $key => $val) {
            $response[$key] = $val;
            $hotel_fac = $this->get_hotel_facilities($val['hotel_id']);
            $ss = $this->get_sight_seeing($val['tour_location']);
            $response[$key]['hotel_fac'] = $hotel_fac;
            $response[$key]['ss'] = $ss;
            $hotel_list = $this->get_itinerary_draft_hotel_list($val['tour_location']);
            $room_cat_list = $this->get_room_categories_byHotel($val['hotel_id']);
            $response[$key]['hotel_list'] = $hotel_list;
            $response[$key]['room_cat_list'] = $room_cat_list;
        }
        return $response;
    }

    public function get_tour_plan_details_foredit($tourplan_ref_id)
    {
        $db = \Config\Database::connect();
        $response = [];
        $selected_table = $db->table('khm_obj_enquiry_tour_details a');
        $result = $selected_table->select('a.*,g.geog_name,o.object_name,r.room_category_name,t.no_of_adult,t.no_of_child_with_bed,t.no_of_child_without_bed,t.no_of_double_room,t.no_of_single_room,t.no_of_extra_bed')
            ->join('khm_obj_enquiry_details t', 't.enquiry_details_id = a.enquiry_details_id', 'left')
            ->join('khm_loc_mst_geography g', 'g.geog_id = a.tour_location', 'left')
            ->join('khm_obj_hotel h', 'h.hotel_id = a.hotel_id', 'left')
            ->join('khm_obj_mst o', 'o.object_id = h.object_id', 'left')
            ->join('khm_obj_mst_hotel_room_category r', 'r.room_category_id = a.room_category_id', 'left')
            ->where('a.extension_ref_id', $tourplan_ref_id)
            ->get()->getResultArray();
        foreach ($result as $key => $val) {
            $response[$key] = $val;
            $hotel_fac = $this->get_hotel_facilities($val['hotel_id']);
            $ss = $this->get_sight_seeing($val['tour_location']);
            $response[$key]['hotel_fac'] = $hotel_fac;
            $response[$key]['ss'] = $ss;
            $hotel_list = $this->get_itinerary_draft_hotel_list($val['tour_location']);
            $room_cat_list = $this->get_room_categories_byHotel($val['hotel_id']);
            $response[$key]['hotel_list'] = $hotel_list;
            $response[$key]['room_cat_list'] = $room_cat_list;
        }
        return $response;
    }

    public function get_iti_cost($id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_enquiry_detail_extensions a');
        $result = $selected_table->select('a.*,er.cs_confirmed_id')
            ->join('khm_obj_enquiry_edit_request er', 'er.enquiry_header_id = a.enquiry_header_id AND er.is_active = 1', 'left')
            ->where('a.enquiry_detail_details_id', $id)
            ->get()->getResultArray();
        return $result;
    }
    public function getuserdetails($id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_entity_mst');
        $result = $selected_table->select('*')
            ->where('entity_id', $id)
            ->get()->getResultArray();
        return $result;
    }
    public function get_bifur_datas($extension_id,$bifur_type)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_mst_bifurcation_details');
        $result = $selected_table->select('*')
            ->where('extension_id', $extension_id)
            ->where('bifur_type', $bifur_type)
            ->get()->getResultArray();
        return $result;
    }
    public function get_user_mail_details($entity_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_entity_mst a');
        $result = $selected_table->select('a.*,mp.entity_attr_value as email_password,md.entity_attr_value as designation')
            ->join('khm_entity_attribute mp', 'mp.entity_id = a.entity_id AND mp.entity_class_attr_id = 1', 'left')
            ->join('khm_entity_attribute md', 'md.entity_id = a.entity_id AND md.entity_class_attr_id = 2', 'left')
            ->where('a.entity_id', $entity_id)
            ->get()->getResultArray();
        return $result;
    }
    public function getHotelConfirmationData($itinerary_details_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_hotel_confirmation');
        $result = $selected_table->select('*')
            ->where('itinerary_details_id', $itinerary_details_id)
            ->get()->getResultArray();
        return $result;
    }
    public function get_email_content($id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_mst_reminders');
        $result = $selected_table->select('*')
            ->where('reminder_id', $id)
            ->get()->getResultArray();
        return $result;
    }
    public function getPaymentHistoryData($payment_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_enquiry_payment');
        $result = $selected_table->select('*')
            ->where('payment_id', $payment_id)
            ->get()->getResultArray();
        return $result;
    }
    public function getTransportFollowupData($transport_follow_up_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_transport_follow_up');
        $result = $selected_table->select('*')
            ->where('transport_follow_up_id', $transport_follow_up_id)
            ->get()->getResultArray();
        return $result;
    }
    public function get_hotel_confirmation_mail($itinerary_details_id)
    {
        /*$db = \Config\Database::connect();
        $selected_table = $db->table('khm_hotel_confirmation a');
        $result = $selected_table->select('a.*,mp.meal_plan_name,d.no_of_adult,d.meal_plan,d.no_of_double_room,d.no_of_single_room,d.no_of_extra_bed,d.no_of_child_with_bed,d.no_of_child_without_bed,t.check_in_date,t.check_out_date,t.no_of_days,o.object_name,r.room_category_name,m.tour_date,o.object_email,g.object_name as guest_name,hd.ref_no')
            ->join('khm_obj_enquiry_itinerary_details m', 'm.itinerary_details_id = a.itinerary_details_id', 'left')
            ->join('khm_obj_enquiry_tour_details t', 't.tour_details_id = m.tour_details_id', 'left')
            ->join('khm_obj_enquiry_header hd', 'hd.enquiry_header_id = m.enquiry_header_id', 'left')
            ->join('khm_obj_enquiry_edit_request er', 'er.enquiry_header_id = hd.enquiry_header_id AND er.is_active = 1', 'left')
            ->join('khm_obj_enquiry_detail_extensions e', 'e.enquiry_detail_details_id = er.cs_confirmed_id', 'left')
            ->join('khm_obj_enquiry_details d', 'd.enquiry_details_id = e.enquiry_ref_id', 'left')
            ->join('khm_obj_meal_plan mp', 'mp.meal_plan_id = d.meal_plan', 'left')
            ->join('khm_obj_mst g', 'g.object_id = hd.object_id', 'left')
            ->join('khm_obj_hotel h', 'h.hotel_id = m.hotel_id', 'left')
            ->join('khm_obj_mst o', 'o.object_id = h.object_id', 'left')
            ->join('khm_obj_mst_hotel_room_category r', 'r.room_category_id = m.room_category_id', 'left')
            ->where('a.itinerary_details_id', $itinerary_details_id)
            ->get()->getResultArray();
        return $result;*/

        $db = \Config\Database::connect();
        $response = [];
        $selected_table = $db->table('khm_obj_enquiry_itinerary_details a');
        $result = $selected_table->select('a.*,mp.meal_plan_name,d.no_of_adult,d.meal_plan,d.no_of_double_room,d.no_of_single_room,d.no_of_extra_bed,d.no_of_child_with_bed,d.no_of_child_without_bed,t.check_in_date,t.check_out_date,t.no_of_days,o.object_name,r.room_category_name,o.object_email,g.object_name as guest_name,hd.ref_no')
            //->join('khm_obj_enquiry_itinerary_details m', 'm.itinerary_details_id = a.itinerary_details_id', 'left')
            ->join('khm_obj_enquiry_tour_details t', 't.tour_details_id = a.tour_details_id', 'left')
            ->join('khm_obj_enquiry_header hd', 'hd.enquiry_header_id = a.enquiry_header_id', 'left')
            ->join('khm_obj_enquiry_edit_request er', 'er.enquiry_header_id = hd.enquiry_header_id AND er.is_active = 1', 'left')
            ->join('khm_obj_enquiry_detail_extensions e', 'e.enquiry_detail_details_id = er.cs_confirmed_id', 'left')
            ->join('khm_obj_enquiry_details d', 'd.enquiry_details_id = e.enquiry_ref_id', 'left')
            ->join('khm_obj_meal_plan mp', 'mp.meal_plan_id = d.meal_plan', 'left')
            ->join('khm_obj_mst g', 'g.object_id = hd.object_id', 'left')
            ->join('khm_obj_hotel h', 'h.hotel_id = a.hotel_id', 'left')
            ->join('khm_obj_mst o', 'o.object_id = h.object_id', 'left')
            ->join('khm_obj_mst_hotel_room_category r', 'r.room_category_id = a.room_category_id', 'left')
            ->where('a.itinerary_details_id', $itinerary_details_id)
            ->get()->getResultArray();
        foreach ($result as $key => $val) {
            $response[$key] = $val;
            $cost = $this->get_itinerary_save_tariff($val['itinerary_details_id']);
            $response[$key]['cost'] = $cost;
        }
        return $response;
    }
    public function getTransportItineraryData($transport_follow_up_id)
    {
        $db = \Config\Database::connect();
        $response = [];

        $subArrQuery = $db->table('khm_obj_arrival_follow_up af')
            ->select('af.enquiry_header_id,af.arrival_date,af.mode_of_arrival,af.flight_train_no')
            ->join(
                '(SELECT MAX(arrival_follow_up_id) AS max_arr_id,enquiry_header_id
              FROM khm_obj_arrival_follow_up 
              GROUP BY enquiry_header_id) latest_arr',
                'af.enquiry_header_id = latest_arr.enquiry_header_id AND af.arrival_follow_up_id = latest_arr.max_arr_id',
                'inner'
            );
        $arrSql = $subArrQuery->getCompiledSelect(false);

        $subDepQuery = $db->table('khm_obj_departure_follow_up df')
            ->select('df.enquiry_header_id,df.departure_date,df.mode_of_departure,df.flight_train_no')
            ->join(
                '(SELECT MAX(departure_follow_up_id) AS max_dep_id,enquiry_header_id
              FROM khm_obj_departure_follow_up 
              GROUP BY enquiry_header_id) latest_dep',
                'df.enquiry_header_id = latest_dep.enquiry_header_id AND df.departure_follow_up_id = latest_dep.max_dep_id',
                'inner'
            );
        $depSql = $subDepQuery->getCompiledSelect(false);

        $selected_table = $db->table('khm_obj_transport_follow_up a');
        $result = $selected_table->select('a.*,arrt.flight_train_no as ftn_arr,dept.flight_train_no as ftn_dep,arrt.mode_of_arrival as moa_arr,dept.mode_of_departure as moa_dep,arrt.arrival_date as f_arrival_date,,dept.departure_date as f_departure_date,,vm.vehicle_model_name,arr.geog_name as arr_location,dep.geog_name as dep_location,d.date_of_tour_start,d.date_of_tour_completion,g.entity_mobile as guest_mobile,h.ref_no,g.entity_name as guest_name,t.itinerary_details_id,t.tour_date,t.tour_details_id,t.hotel_id,t.room_category_id,t.double_room,t.single_room,t.vehicle_details,t.hotel_details,t.transport_description,t.itinerary_title')
            ->join('khm_obj_enquiry_edit_request er', 'er.enquiry_header_id = a.enquiry_header_id AND er.is_active = 1', 'left')
            ->join('khm_obj_enquiry_header h', 'h.enquiry_header_id = a.enquiry_header_id', 'left')
            ->join('khm_entity_mst g', 'g.entity_id = h.guest_entity_id', 'left')
            ->join('khm_obj_enquiry_detail_extensions ex', 'ex.enquiry_detail_details_id = er.cs_confirmed_id', 'left')
            ->join('khm_obj_enquiry_details d', 'd.enquiry_details_id = ex.enquiry_ref_id', 'left')
            ->join('khm_obj_enquiry_itinerary_details t', 't.extension_ref_id = ex.extension_ref_id', 'left')
            ->join('khm_loc_mst_geography dep', 'dep.geog_id = d.departure_location', 'left')
            ->join('khm_loc_mst_geography arr', 'arr.geog_id = d.arrival_location', 'left')
            ->join('khm_obj_mst_vehicle_type vt', 'vt.vehicle_type_id = a.vehicle_model_id', 'left')
            ->join('khm_obj_mst_vehicle_model vm', 'vm.vehicle_model_id = vt.vehicle_model_id', 'left')
            ->join('(' . $arrSql . ') arrt', 'arrt.enquiry_header_id = a.enquiry_header_id', 'left')
            ->join('(' . $depSql . ') dept', 'dept.enquiry_header_id = a.enquiry_header_id', 'left')
            ->where('a.transport_follow_up_id', $transport_follow_up_id)
            ->orderBy('t.itinerary_details_id ', 'ASC')
            ->get()->getResultArray();
        foreach ($result as $key => $val) {
            $response[$key] = $val;
            $cost = $this->get_itinerary_save_tariff($val['itinerary_details_id']);
            $response[$key]['cost'] = $cost;
        }
        return $response;
    }
    public function get_final_costing_sheet($enquiry_detail_details_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_enquiry_detail_extensions');
        $result = $selected_table->select('costing_sheet,itinerary')
            ->where('enquiry_detail_details_id', $enquiry_detail_details_id)
            ->get()->getResultArray();
        return $result;
    }
    public function get_hotels_for_vouchers($extension_ref_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_enquiry_tour_details a');
        $result = $selected_table->select('a.*,hcn.entity_name as confirmed_by_name,m.date_of_tour_completion,m.date_of_tour_start,sop.entity_mobile as sop_mobile,sop.entity_name as sop_executive,ml.meal_plan_name,m.no_of_extra_bed,m.no_of_single_room,m.no_of_double_room,m.no_of_child_with_bed,m.no_of_child_without_bed,m.no_of_adult,hd.ref_no,e.entity_name,g.geog_name,o.object_name,o.object_email,o.object_address,o.object_ph_no,r.room_category_name,hd.ref_no,cn.confirmed_by,cn.reference_id,m.is_vehicle_required')
            ->join('khm_obj_enquiry_details m', 'm.enquiry_details_id = a.enquiry_details_id', 'left')
            ->join('khm_hotel_confirmation cn', 'cn.tour_details_id = a.tour_details_id', 'left')
            ->join('khm_loc_mst_geography g', 'g.geog_id = a.tour_location', 'left')
            ->join('khm_obj_enquiry_header hd', 'hd.enquiry_header_id = a.enquiry_header_id', 'left')
            ->join('khm_obj_hotel h', 'h.hotel_id = a.hotel_id', 'left')
            ->join('khm_obj_mst o', 'o.object_id = h.object_id', 'left')
            ->join('khm_entity_mst e', 'e.entity_id = hd.guest_entity_id', 'left')
            ->join('khm_entity_mst hcn', 'hcn.entity_id = cn.confirmed_by', 'left')
            ->join('khm_obj_mst_hotel_room_category r', 'r.room_category_id = a.room_category_id', 'left')
            ->join('khm_obj_meal_plan ml', 'ml.meal_plan_id = m.meal_plan', 'left')
            ->join('khm_obj_enquiry_edit_request ed', 'ed.enquiry_header_id = a.enquiry_header_id AND ed.is_active=1', 'left')
            ->join('khm_obj_enquiry_status sts', 'sts.enquiry_header_id = a.enquiry_header_id AND AND sts.edit_request_id=ed.enquiry_edit_request_id AND sts.current_status_id=12', 'left')
            ->join('khm_entity_mst sop', 'sop.entity_id = sts.assigned_to', 'left')
            ->where('a.extension_ref_id', $extension_ref_id)
            ->get()->getResultArray();
        return $result;
    }
    public function get_iti_cost_active($enquiry_header_id, $enquiry_details_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_enquiry_detail_extensions');
        $result = $selected_table->select('*')
            ->where('enquiry_header_id', $enquiry_header_id)
            ->where('enquiry_details_id', $enquiry_details_id)
            ->where('is_active', 1)
            ->get()->getResultArray();
        return $result;
    }
    public function get_iti_cost_byid($enquiry_detail_details_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_enquiry_detail_extensions');
        $result = $selected_table->select('*')
            ->where('enquiry_detail_details_id', $enquiry_detail_details_id)
            ->get()->getResultArray();
        return $result;
    }
    public function get_iti_cost_all($enquiry_header_id, $enquiry_details_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_enquiry_detail_extensions');
        $result = $selected_table->select('*')
            ->where('enquiry_header_id', $enquiry_header_id)
            ->where('is_edit', 1)
            //->where('enquiry_details_id', $enquiry_details_id)
            ->get()->getResultArray();
        return $result;
    }
    public function get_room_categories_byHotel($hotel_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_hotel_room_category a');
        $result = $selected_table->select('a.*,m.room_category_name')
            ->join('khm_obj_mst_hotel_room_category m', 'm.room_category_id = a.room_category_id', 'left')
            ->where('hotel_id', $hotel_id)
            ->get()->getResultArray();
        return $result;
    }
    public function get_tour_plan_draft_details($enquiry_header_id, $enquiry_details_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_enquiry_tour_details a');
        $result = $selected_table->select('a.*,g.geog_name,o.object_name,r.room_category_name,t.no_of_adult,t.no_of_child_with_bed,t.no_of_child_without_bed,t.no_of_double_room,t.no_of_single_room,t.no_of_extra_bed')
            ->join('khm_obj_enquiry_details t', 't.enquiry_details_id = a.enquiry_details_id', 'left')
            ->join('khm_loc_mst_geography g', 'g.geog_id = a.tour_location', 'left')
            ->join('khm_obj_hotel h', 'h.hotel_id = a.hotel_id', 'left')
            ->join('khm_obj_mst o', 'o.object_id = h.object_id', 'left')
            ->join('khm_obj_mst_hotel_room_category r', 'r.room_category_id = a.room_category_id', 'left')
            ->where('a.enquiry_header_id', $enquiry_header_id)
            ->where('a.enquiry_details_id', $enquiry_details_id)
            ->where('a.is_active', 1)
            ->where('a.is_draft', 1)
            ->get()->getResultArray();
        return $result;
    }
    public function loadTourLocation($enquiry_header_id, $enquiry_details_id)
    {
        $db = \Config\Database::connect();
        $response = [];
        $selected_table = $db->table('khm_obj_enquiry_tour_details a');
        $result = $selected_table->select('a.*,g.geog_name,o.object_name,r.room_category_name,t.no_of_adult,t.no_of_child_with_bed,t.no_of_child_without_bed,t.no_of_double_room,t.no_of_single_room,t.no_of_extra_bed')
            ->join('khm_obj_enquiry_details t', 't.enquiry_details_id = a.enquiry_details_id', 'left')
            ->join('khm_loc_mst_geography g', 'g.geog_id = a.tour_location', 'left')
            ->join('khm_obj_hotel h', 'h.hotel_id = a.hotel_id', 'left')
            ->join('khm_obj_mst o', 'o.object_id = h.object_id', 'left')
            ->join('khm_obj_mst_hotel_room_category r', 'r.room_category_id = a.room_category_id', 'left')
            ->where('a.enquiry_header_id', $enquiry_header_id)
            ->where('a.enquiry_details_id', $enquiry_details_id)
            ->where('a.is_active', 1)
            ->get()->getResultArray();
        foreach ($result as $key => $vals) {
            $cost = $this->get_tourcost_byid($vals['tour_details_id']);
            $response[$key] = $vals;
            $response[$key]['cost'] = $cost;
        }
        return $response;
    }
    public function loadTourLocationEdit($enquiry_header_id, $enquiry_details_id, $extension_ref_id)
    {
        $db = \Config\Database::connect();
        $response = [];
        $selected_table = $db->table('khm_obj_enquiry_tour_details a');
        $result = $selected_table->select('a.*,hc.hotel_category_name,g.geog_name,o.object_name,r.room_category_name,t.no_of_adult,t.no_of_child_with_bed,t.no_of_child_without_bed,t.no_of_double_room,t.no_of_single_room,t.no_of_extra_bed')
            ->join('khm_obj_enquiry_details t', 't.enquiry_details_id = a.enquiry_details_id', 'left')
            ->join('khm_loc_mst_geography g', 'g.geog_id = a.tour_location', 'left')
            ->join('khm_obj_hotel h', 'h.hotel_id = a.hotel_id', 'left')
            ->join('khm_obj_mst o', 'o.object_id = h.object_id', 'left')
            ->join('khm_obj_mst_hotel_room_category r', 'r.room_category_id = a.room_category_id', 'left')
            ->join('khm_obj_mst_hotel_category hc', 'hc.hotel_category_id = a.hot_cat_id', 'left')
            ->where('a.enquiry_header_id', $enquiry_header_id)
            ->where('a.enquiry_details_id', $enquiry_details_id)
            ->where('a.extension_ref_id', $extension_ref_id)

            ->get()->getResultArray();
        foreach ($result as $key => $vals) {
            $cost = $this->get_tourcost_byid($vals['tour_details_id']);
            $response[$key] = $vals;
            $response[$key]['cost'] = $cost;
        }
        return $response;
    }

    public function get_quick_quote_details($enquiry_header_id, $enquiry_details_id, $tour_details_id)
    {
        $db = \Config\Database::connect();
        $response = [];
        $selected_table = $db->table('khm_obj_enquiry_tour_details a');
        $result = $selected_table->select('a.*,g.geog_name,o.object_name,r.room_category_name,t.no_of_adult,t.no_of_child_with_bed,t.no_of_child_without_bed,t.no_of_double_room,t.no_of_single_room,t.no_of_extra_bed')
            ->join('khm_obj_enquiry_details t', 't.enquiry_details_id = a.enquiry_details_id', 'left')
            ->join('khm_loc_mst_geography g', 'g.geog_id = a.tour_location', 'left')
            ->join('khm_obj_hotel h', 'h.hotel_id = a.hotel_id', 'left')
            ->join('khm_obj_mst o', 'o.object_id = h.object_id', 'left')
            ->join('khm_obj_mst_hotel_room_category r', 'r.room_category_id = a.room_category_id', 'left')
            ->where('a.enquiry_header_id', $enquiry_header_id)
            ->where('a.enquiry_details_id', $enquiry_details_id)
            ->where('a.is_active', 1)
            ->get()->getResultArray();
        foreach ($result as $key => $vals) {
            $cost = $this->get_tourcost_byid($vals['tour_details_id']);
            $response[$key] = $vals;
            $response[$key]['cost'] = $cost;
        }
        return $response;
    }
    public function get_tourcost_byid($tour_details_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_enquiry_quick_quote');
        $result = $selected_table->select('*')
            ->where('tour_details_id', $tour_details_id)
            ->where('is_active', 1)
            ->get()->getResultArray();
        return $result;
    }
    public function getLocationidfromhub($hub_location_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_mst_vehicle_hub_location');
        $result = $selected_table->select('*')
            ->where('hub_location_id', $hub_location_id)
            ->get()->getResultArray();
        return $result;
    }
    public function getDistancebyLocations($geog_from_id, $geog_to_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_loc_mst_geography_distance');
        $result = $selected_table->select('*')
            ->where('geog_from_id', $geog_from_id)
            ->where('geog_to_id', $geog_to_id)
            ->get()->getResultArray();
        if (empty($result)) {
            $result = $selected_table->select('*')
                ->where('geog_from_id', $geog_to_id)
                ->where('geog_to_id', $geog_from_id)
                ->get()->getResultArray();
        }
        return $result;
    }
    public function getLocationName($geog_id, $hotel_category_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_loc_mst_geography g');
        $result = $selected_table->select('g.*,h.object_name,h.object_id')
            ->join('khm_obj_mst h', 'h.object_location_id = g.geog_id', 'left')
            ->join('khm_obj_hotel m', 'm.object_id = h.object_id', 'left')
            ->where('h.object_class_id', 1)
            //->where('m.hotel_category_id', $hotel_category_id)
            ->where('g.geog_id', $geog_id)
            ->get()->getResultArray();
        return $result;
        //echo $db->getLastQuery();
    }
    public function getLocationNamebyid($geog_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_loc_mst_geography');
        $result = $selected_table->select('*')
            ->where('geog_id', $geog_id)
            ->get()->getResultArray();
        return $result;
    }
    public function getTourTariffDetails($cost_component_type, $room_category_id, $room_type_id, $season_id, $object_id, $mealplan)
    {
        $db = \Config\Database::connect();
        $result = [];
        $query_table = $db->table('khm_obj_cost_component');
        $query_result = $query_table->select('*')
            ->where('cost_component_type_id', $cost_component_type)
            ->get()->getResultArray();
        if (!empty($query_result)) {
            $query_template = $query_result[0]['cost_element_type_expression'];
            $query = str_replace(
                ['{room_category_id}', '{room_type_id}', '{season_id}', '{object_id}', '{mealplan}'],
                [$room_category_id, $room_type_id, $season_id, $object_id, $mealplan],
                $query_template
            );
            $result = $db->query($query)->getResultArray();
        }
        return $result;
    }
    public function getTourTariffDetailsBasic($cost_component_type, $room_category_id, $room_type_id, $object_id, $mealplan)
    {
        $db = \Config\Database::connect();
        $result = [];
        $query_table = $db->table('khm_obj_cost_component');
        $query_result = $query_table->select('*')
            ->where('cost_component_type_id', $cost_component_type)
            ->get()->getResultArray();
        if (!empty($query_result)) {
            $query_template = $query_result[0]['cost_element_type_expression'];
            $query = str_replace(
                ['{room_category_id}', '{room_type_id}', '{object_id}', '{mealplan}'],
                [$room_category_id, $room_type_id, $object_id, $mealplan],
                $query_template
            );
            $result = $db->query($query)->getResultArray();
        }
        return $result;
    }
    public function getTourtravelseason($cost_component_type, $season_id, $vehicle_type_id)
    {
        $db = \Config\Database::connect();
        $result = [];
        $query_table = $db->table('khm_obj_cost_component');
        $query_result = $query_table->select('*')
            ->where('cost_component_type_id', $cost_component_type)
            ->get()->getResultArray();
        if (!empty($query_result)) {
            $query_template = $query_result[0]['cost_element_type_expression'];
            $query = str_replace(
                ['{vehicle_type_id}', '{season_id}'],
                [$vehicle_type_id, $season_id],
                $query_template
            );
            $result = $db->query($query)->getResultArray();
        }
        return $result;
    }
    public function getTourtravelbasic($cost_component_type, $vehicle_type_id)
    {
        $db = \Config\Database::connect();
        $result = [];
        $query_table = $db->table('khm_obj_cost_component');
        $query_result = $query_table->select('*')
            ->where('cost_component_type_id', $cost_component_type)
            ->get()->getResultArray();
        if (!empty($query_result)) {
            $query_template = $query_result[0]['cost_element_type_expression'];
            $query = str_replace(
                ['{vehicle_type_id}'],
                [$vehicle_type_id],
                $query_template
            );
            $result = $db->query($query)->getResultArray();
        }
        return $result;
    }
    public function getTourTariffDetailsChild($cost_component_type, $room_category_id, $room_type_id, $season_id, $object_id, $mealplan, $pax_id)
    {
        $db = \Config\Database::connect();
        $result = [];
        $query_table = $db->table('khm_obj_cost_component');
        $query_result = $query_table->select('*')
            ->where('cost_component_type_id', $cost_component_type)
            ->get()->getResultArray();
        if (!empty($query_result)) {
            $query_template = $query_result[0]['cost_element_type_expression'];
            $query = str_replace(
                ['{room_category_id}', '{room_type_id}', '{object_id}', '{meal_plan}', '{pax_id}', '{season_id}'],
                [$room_category_id, $room_type_id, $object_id, $mealplan, $pax_id, $season_id],
                $query_template
            );
            $result = $db->query($query)->getResultArray();
        }
        return $result;
    }
    public function getTourTariffDetailsChildBasic($cost_component_type, $room_category_id, $room_type_id, $object_id, $mealplan, $pax_id)
    {
        $db = \Config\Database::connect();
        $result = [];
        $query_table = $db->table('khm_obj_cost_component');
        $query_result = $query_table->select('*')
            ->where('cost_component_type_id', $cost_component_type)
            ->get()->getResultArray();
        if (!empty($query_result)) {
            $query_template = $query_result[0]['cost_element_type_expression'];
            $query = str_replace(
                ['{room_category_id}', '{room_type_id}', '{object_id}', '{meal_plan}', '{pax_id}'],
                [$room_category_id, $room_type_id, $object_id, $mealplan, $pax_id],
                $query_template
            );
            $result = $db->query($query)->getResultArray();
        }
        return $result;
    }
    public function checkSeasonExist($tour_date, $object_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_season_calendar');
        $result = $selected_table->select('*')
            ->where('season_start_date <=', $tour_date)
            ->where('season_end_date >=', $tour_date)
            ->where('object_id', $object_id)
            ->where('season_type_id', 1)
            ->orderBy('season_id', 'DESC')
            ->get()->getResultArray();
        return $result;
    }
    public function checkVehicleSeasonExist($tour_date, $object_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_season_calendar');
        $result = $selected_table->select('*')
            ->where('season_start_date <=', $tour_date)
            ->where('season_end_date >=', $tour_date)
            ->where('object_id', $object_id)
            ->where('season_type_id', 4)
            ->orderBy('season_id', 'DESC')
            ->get()->getResultArray();
        return $result;
    }
    public function getObjectidByhotel($hotel_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_hotel');
        $result = $selected_table->select('*')
            ->where('hotel_id', $hotel_id)
            ->get()->getResultArray();
        return $result;
    }
    public function getObjectidByvehicle($vehicle_type_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_vehicle');
        $result = $selected_table->select('*')
            ->where('vehicle_type_id', $vehicle_type_id)
            ->get()->getResultArray();
        return $result;
    }

    public function checkWeekendExist($tour_date, $object_id)
    {
        $db = \Config\Database::connect();
        $filtered_result = [];
        $selected_table = $db->table('khm_weekend_calendar');
        $result = $selected_table->select('*')
            ->where('weekend_start_date <=', $tour_date)
            ->where('weekend_end_date >=', $tour_date)
            ->where('object_id', $object_id)
            ->where('season_type_id', 1)
            ->get()
            ->getResultArray();
        $tour_day = date('N', strtotime($tour_date));
        if (!empty($result)) {
            foreach ($result as $row) {
                $day_range = json_decode($row['day_range'], true);
                $day_range = array_map('intval', (array)$day_range);
                if (in_array($tour_day, $day_range)) {
                    $filtered_result[] = $row;
                }
            }
        }
        return $filtered_result;
    }
    public function delete_tour_locations($enquiry_header_id, $enquiry_details_id, $deleted_count)
    {
        $db = \Config\Database::connect();
        $subquery = $db->table('khm_obj_enquiry_tour_details')
            ->select('tour_details_id')
            ->where('enquiry_header_id', $enquiry_header_id)
            ->where('enquiry_details_id', $enquiry_details_id)
            ->orderBy('location_sequence', 'DESC')
            ->limit($deleted_count)
            ->get()->getResultArray();

        if (!empty($subquery)) {
            $ids_to_delete = array_column($subquery, 'tour_details_id');
            $db->table('khm_obj_enquiry_tour_details')
                ->whereIn('tour_details_id', $ids_to_delete)
                ->delete();
            return 1;
        }
    }

    public function cost_list_view($params)
    {
        $draw = $params['draw'];
        $start = $params['start'];
        $rowperpage = $params['length'];
        $columnIndex = $params['order'][0]['column'];
        $columnName = $params['columns'][$columnIndex]['data'];
        $columnSortOrder = $params['order'][0]['dir'];
        $searchValue = $params['search']['value'];
        $enquiry_header_id = $params['enquiry_header_id'];
        $db = \Config\Database::connect();

        $query = $db->table('khm_obj_enquiry_detail_extensions a');
        $query->select('SQL_CALC_FOUND_ROWS  a.*,hd.edit_request,h.cs_confirmed_id,DATE_FORMAT(a.created_date, "%d-%m-%Y %h:%i %p") as fdate', false);
        $query->join('khm_obj_enquiry_edit_request h', 'h.enquiry_header_id = a.enquiry_header_id AND h.is_active = 1', 'left');
        $query->join('khm_obj_enquiry_header hd', 'hd.enquiry_header_id = a.enquiry_header_id', 'left');
        $query->where('a.enquiry_header_id', $enquiry_header_id);
        $query->orderBy('a.enquiry_detail_details_id', 'ASC');

        if (!empty($searchValue)) {
            $query->groupStart()
                ->like('a.enquiry_detail_details_id', $searchValue)
                ->orLike('a.created_date', $searchValue)
                ->groupEnd();
        }
        $query->orderBy($columnName, $columnSortOrder);
        $query->limit($rowperpage, $start);
        $records = $query->get()->getResultArray();

        $queryTot = $this->db->query('SELECT FOUND_ROWS() AS count');
        $totalRecords = $queryTot->getResultArray()[0]['count'];

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecords,
            "aaData" => $records
        );
        return $response;
    }

    public function payment_list_view($params)
    {
        $draw = $params['draw'];
        $start = $params['start'];
        $rowperpage = $params['length'];
        $columnIndex = $params['order'][0]['column'];
        $columnName = $params['columns'][$columnIndex]['data'];
        $columnSortOrder = $params['order'][0]['dir'];
        $searchValue = $params['search']['value'];
        $enquiry_header_id = $params['enquiry_header_id'];
        $cs_confirmed_id = $params['cs_confirmed_id'];

        $db = \Config\Database::connect();

        $query = $db->table('khm_obj_enquiry_payment a');
        $query->select('SQL_CALC_FOUND_ROWS  
            a.*, 
            SUM(CASE WHEN a.approved_status = 1 THEN a.paid_amount ELSE 0 END) as paidamount, 
            DATE_FORMAT(a.check_out, "%d-%m-%Y") as checkout,
            DATE_FORMAT(a.check_in, "%d-%m-%Y") as checkin,
            sop.entity_name as sop_name,
            exe.entity_name as executive_name,
            ag.entity_name as agent_name,
            g.entity_name as guest_name,
            a_by.entity_name as added_by_name,
            DATE_FORMAT(a.payment_date, "%d-%m-%Y") as pdate', false);

        $query->join('khm_entity_mst g', 'g.entity_id = a.guest_id', 'left');
        $query->join('khm_entity_mst ag', 'ag.entity_id = a.agent_id', 'left');
        $query->join('khm_entity_mst exe', 'exe.entity_id = a.executive_id', 'left');
        $query->join('khm_entity_mst sop', 'sop.entity_id = a.sop_executive_id', 'left');
        $query->join('khm_entity_mst a_by', 'a_by.entity_id = a.payment_added_by', 'left');

        $query->where('a.enquiry_header_id', $enquiry_header_id);
        $query->groupBy('a.enquiry_header_id');

        if (!empty($searchValue)) {
            $query->groupStart()
                ->like('a.guest_id', $searchValue)
                ->orLike('a.executive_id', $searchValue)
                ->groupEnd();
        }

        $query->orderBy($columnName, $columnSortOrder);
        $query->limit($rowperpage, $start);

        $records = $query->get()->getResultArray();

        $queryTot = $db->query('SELECT FOUND_ROWS() AS count');
        $totalRecords = $queryTot->getResultArray()[0]['count'];

        // Calculate if all rows are approved
        $approvalCheck = $db->table('khm_obj_enquiry_payment')
            ->select('COUNT(*) as total, SUM(CASE WHEN approved_status = 1 THEN 1 ELSE 0 END) as approved_count')
            ->where('enquiry_header_id', $enquiry_header_id)
            ->get()
            ->getRowArray();

        $allApproved = ($approvalCheck['total'] == $approvalCheck['approved_count']) ? 1 : 0;

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecords,
            "aaData" => $records,
            "all_approved" => $allApproved
        );

        return $response;
    }

    public function payment_history_view($params)
    {
        $draw = $params['draw'];
        $start = $params['start'];
        $rowperpage = $params['length'];
        $columnIndex = $params['order'][0]['column'];
        $columnName = $params['columns'][$columnIndex]['data'];
        $columnSortOrder = $params['order'][0]['dir'];
        $searchValue = $params['search']['value'];
        $enquiry_header_id = $params['enquiry_header_id'];
        $db = \Config\Database::connect();

        $query = $db->table('khm_obj_enquiry_payment a');
        $query->select('SQL_CALC_FOUND_ROWS  a.*,DATE_FORMAT(a.payment_date, "%d-%m-%Y") as pdate', false);

        $query->where('a.enquiry_header_id', $enquiry_header_id);
        $query->orderBy('a.payment_date', 'DESC');

        if (!empty($searchValue)) {
            $query->groupStart()
                ->like('a.payment_date', $searchValue)
                ->orLike('a.ref_no', $searchValue)
                ->groupEnd();
        }
        $query->orderBy($columnName, $columnSortOrder);
        $query->limit($rowperpage, $start);
        $records = $query->get()->getResultArray();

        $queryTot = $this->db->query('SELECT FOUND_ROWS() AS count');
        $totalRecords = $queryTot->getResultArray()[0]['count'];

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecords,
            "aaData" => $records
        );
        return $response;
    }

    public function get_all_enquiry_foredit($object_id)
    {
        $db = \Config\Database::connect();
        $response = [];
        $selected_table = $db->table('khm_obj_enquiry_header h');
        $hresult = $selected_table->select('enquiry_header_id,o.object_name')
            ->join('khm_obj_mst o', 'o.object_id = h.object_id', 'left')
            ->where('h.object_id', $object_id)
            ->get()->getResultArray();
        foreach ($hresult as $hkey => $hvals) {
            $enq_details = $this->get_enquiry_details_for_edit($hvals['enquiry_header_id']);
            $response[$hkey] = $hvals;
            $response[$hkey]['enq_details'] = $enq_details;

            if (!empty($enq_details)) {
                foreach ($enq_details as $dkey => $dvals) {
                    $tour_details = $this->get_tour_details_for_edit($dvals['enquiry_details_id']);
                    $response[$hkey]['enq_details'][$dkey] = $dvals;
                    $response[$hkey]['enq_details'][$dkey]['tour_details'] = $tour_details;

                    if (!empty($tour_details)) {
                        foreach ($tour_details as $tkey => $tvals) {
                            $iti_details = $this->get_itinerary_for_edit($tvals['tour_details_id']);
                            $response[$hkey]['enq_details'][$dkey]['tour_details'][$tkey] = $tvals;
                            $response[$hkey]['enq_details'][$dkey]['tour_details'][$tkey]['iti_details'] = $iti_details;
                        }
                    }
                }
            }
        }

        return $response;
    }
    public function get_enquiry_details_for_edit($enquiry_header_id)
    {
        $db = \Config\Database::connect();
        $table = $db->table('khm_obj_enquiry_details');
        $result = $table->select('enquiry_header_id,enquiry_details_id,is_active')
            ->where('enquiry_header_id', $enquiry_header_id)
            ->get()->getResultArray();
        return $result;
    }
    
    public function get_last_itinerary_saved($enquiry_header_id)
    {
        $db = \Config\Database::connect();
        $table = $db->table('khm_obj_enquiry_detail_extensions');
        $result = $table->select('*')
            ->where('enquiry_header_id', $enquiry_header_id)
            ->orderBy('enquiry_detail_details_id', 'DESC')
        ->get()
        ->getFirstRow('array');
        return $result;
    }
    public function get_tour_details_for_edit($enquiry_details_id)
    {
        $db = \Config\Database::connect();
        $table = $db->table('khm_obj_enquiry_tour_details');
        $result = $table->select('enquiry_header_id,enquiry_details_id,tour_details_id,is_active')
            ->where('enquiry_details_id', $enquiry_details_id)
            ->groupBy('updated_time')
            ->get()->getResultArray();
        return $result;
    }
    public function get_itinerary_for_edit($tour_details_id)
    {
        $db = \Config\Database::connect();
        $table = $db->table('khm_obj_enquiry_itinerary_details h');
        $result = $table->select('h.enquiry_header_id,h.enquiry_details_id,h.tour_details_id,h.itinerary_details_id,h.is_draft,h.is_active,h.updated_time,o.enquiry_detail_details_id,o.object_id,o.version_count,o.tpc,o.enquiry_header_id,o.enquiry_details_id,o.extension_ref_id')
            ->join('khm_obj_enquiry_detail_extensions o', 'o.enquiry_detail_details_id = h.extension_ref_id', 'left')
            ->where('h.tour_details_id', $tour_details_id)
            ->groupBy('h.updated_time')
            ->get()->getResultArray();
        return $result;
    }
    public function getAdditionalDetails($itinerary_details_id)
    {
        $db = \Config\Database::connect();
        $table = $db->table('khm_hotel_confirmation');
        $result = $table->select('*')
            ->where('itinerary_details_id', $itinerary_details_id)
            ->get()->getResultArray();
        return $result;
    }
    public function get_hotel_confirmation_data($params)
    {
        $db = \Config\Database::connect();
        $enquiry_header_id = $params['enquiry_header_id'];
        $confirm_cs_id     = $params['confirm_cs_id'];
        $ext_det           = $this->getExtensionDetailsbyid($confirm_cs_id);
        $extension_ref_id  = $ext_det[0]['extension_ref_id'];

        // DataTables params
        $draw            = intval($params['draw']);
        $start           = intval($params['start']);
        $rowperpage      = intval($params['length']);
        $columnIndex     = $params['order'][0]['column'];
        $columnName      = $params['columns'][$columnIndex]['data'];
        $columnSortOrder = $params['order'][0]['dir'];
        $searchValue     = $params['search']['value'];

        // 1) build main query
        $qb = $db->table('khm_obj_enquiry_itinerary_details a')
            ->select(
                'SQL_CALC_FOUND_ROWS  
                a.*,
                COUNT(a.tour_details_id) as no_of_night,
                t.check_in_date,
                t.check_out_date,
                t.no_of_days,
                DATE_FORMAT(t.check_in_date, "%d-%m-%Y") as checkin,
                DATE_FORMAT(t.check_out_date, "%d-%m-%Y") as checkout,
                hc.reconfirmed_by,
                hc.reconfirm_date,
                DATE_FORMAT(hc.reconfirm_date, "%d-%m-%Y") as hot_reconfirm_date,
                hc.reconfirm_status,
                hc.comments,
                hc.advance,
                hc.cut_off_date,
                DATE_FORMAT(hc.cut_off_date, "%d-%m-%Y") as hot_cut_off_date,
                hc.rate,
                hc.reference_id,
                hc.confirmed_by,
                hc.confirm_status,
                hc.confirm_date,
                DATE_FORMAT(hc.confirm_date, "%d-%m-%Y") as hotel_confirm_date,
                DATE_FORMAT(a.tour_date, "%d-%m-%Y") as tdate,
                g.geog_name,
                o.object_name,
                r.room_category_name',
                false
            )
            ->join('khm_hotel_confirmation hc',            'hc.itinerary_details_id = a.itinerary_details_id', 'left')
            ->join('khm_obj_enquiry_tour_details t',       't.tour_details_id          = a.tour_details_id',       'left')
            ->join('khm_loc_mst_geography g',              'g.geog_id                  = t.tour_location',         'left')
            ->join('khm_obj_hotel h',                      'h.hotel_id                 = a.hotel_id',              'left')
            ->join('khm_obj_mst o',                        'o.object_id                = h.object_id',             'left')
            ->join('khm_obj_mst_hotel_room_category r',    'r.room_category_id         = a.room_category_id',      'left')
            ->where('a.enquiry_header_id', $enquiry_header_id)
            ->where('a.extension_ref_id', $extension_ref_id)
            ->groupBy('a.tour_details_id');

        if (! empty($searchValue)) {
            $qb->groupStart()
                ->like('g.geog_name',         $searchValue)
                ->orLike('o.object_name',     $searchValue)
                ->orLike('r.room_category_name', $searchValue)
                ->groupEnd();
        }

        if (!empty($columnName) && !empty($columnSortOrder)) {
            $qb->orderBy($columnName, $columnSortOrder);
        } else {
            $qb->orderBy('t.tour_details_id', 'ASC');
        }
        $qb->limit($rowperpage, $start);

        $records = $qb->get()->getResultArray();

        $totalRecords = $db->query('SELECT FOUND_ROWS() AS cnt')
            ->getRowArray()['cnt'];
        $out = [];
        foreach ($records as $p) {
            $parentDate = date('Y-m-d', strtotime($p['tour_date']));
            $details    = json_decode($p['hotel_details'], true);
            $out[] = $p;
            if (is_array($details) && count($details)) {
                foreach ($details as $keyd => $d) {
                    $kcount = $keyd + 1;
                    if (isset($d['tour_date']) && $d['tour_date'] === $parentDate) {
                        $d_itinerary_details_id = $p['itinerary_details_id'] . $kcount;
                        $d_det = $this->getAdditionalDetails($d_itinerary_details_id);
                        if (!empty($d_det)) {
                            $reconfirmed_by = $d_det[0]['reconfirmed_by'];
                            $reconfirm_date = $d_det[0]['reconfirm_date'];

                            if ($reconfirm_date && $reconfirm_date !== '0000-00-00') {
                                $hot_reconfirm_date = date('d-m-Y', strtotime($reconfirm_date));
                            } else {
                                $hot_reconfirm_date = '';
                            }

                            $reconfirm_status = $d_det[0]['reconfirm_status'];
                            $comments = $d_det[0]['comments'];
                            $advance = $d_det[0]['advance'];
                            $cut_off_date = $d_det[0]['cut_off_date'];

                            if ($cut_off_date && $cut_off_date !== '0000-00-00') {
                                $hot_cut_off_date = date('d-m-Y', strtotime($cut_off_date));
                            } else {
                                $hot_cut_off_date = '';
                            }

                            $rate = $d_det[0]['rate'];
                            $reference_id = $d_det[0]['reference_id'];
                            $confirmed_by = $d_det[0]['confirmed_by'];
                            $confirm_status = $d_det[0]['confirm_status'];
                            $confirm_date = $d_det[0]['confirm_date'];
                            $hotel_confirm_date = date('d-m-Y', strtotime($confirm_date));
                        } else {
                            $reconfirmed_by = '';
                            $reconfirm_date = '';
                            $hot_reconfirm_date = '';

                            $reconfirm_status = '';
                            $comments = '';
                            $advance = '';
                            $cut_off_date = '';
                            $hot_cut_off_date = '';

                            $rate = '';
                            $reference_id = '';
                            $confirmed_by = '';
                            $confirm_status = '';
                            $confirm_date = '';
                            $hotel_confirm_date = '';
                        }
                        $row = [
                            'itinerary_details_id' => $d_itinerary_details_id,
                            'tdate'              => date('d-m-Y', strtotime($d['tour_date'])),
                            'room_category_name' => $d['room_category_name'],
                            'object_name'     => $d['hotel_name'],
                            'tour_date'     => $d['tour_date'],
                            'hotel_id'     => $d['hotelid'],
                            'room_category_id' => $d['roomcat'],
                            'tour_details_id' => $p['tour_details_id'],


                            'reconfirmed_by' => $reconfirmed_by,
                            'reconfirm_date' => $reconfirm_date,
                            'hot_reconfirm_date' => $hot_reconfirm_date,
                            'reconfirm_status' => $reconfirm_status,
                            'comments' => $comments,
                            'advance' => $advance,
                            'cut_off_date' => $cut_off_date,
                            'hot_cut_off_date' => $hot_cut_off_date,
                            'rate' => $rate,
                            'reference_id' => $reference_id,
                            'confirmed_by' => $confirmed_by,
                            'confirm_status' => $confirm_status,
                            'confirm_date' => $confirm_date,
                            'hotel_confirm_date' => $hotel_confirm_date,

                            'check_in_date' => $p['check_in_date'],
                            'checkin' => $p['checkin'],
                            'check_out_date' => $p['check_out_date'],
                            'checkout' => $p['checkout']
                        ];
                        $out[] = $row;
                    }
                }
            } else {
            }
        }
        usort($out, function($a, $b) {
            return (int)$a['tour_details_id'] <=> (int)$b['tour_details_id'];
        });
        return [
            'draw'                 => intval($draw),
            'iTotalRecords'        => count($out),
            'iTotalDisplayRecords' => count($out),
            'aaData'               => $out,
        ];
    }
    public function hotelvoucherdata($params)
    {
        $draw = $params['draw'];
        $start = $params['start'];
        $rowperpage = $params['length'];
        $columnIndex = $params['order'][0]['column'];
        $columnName = $params['columns'][$columnIndex]['data'];
        $columnSortOrder = $params['order'][0]['dir'];
        $searchValue = $params['search']['value'];
        $enquiry_header_id = $params['enquiry_header_id'];
        $confirm_cs_id = $params['confirm_cs_id'];
        $db = \Config\Database::connect();

        $query = $db->table('khm_obj_enquiry_edit_request');
        $query->select('SQL_CALC_FOUND_ROWS  *,DATE_FORMAT(updated_time, "%d-%m-%Y %h:%i %p") as created_on', false);
        $query->where('enquiry_header_id', $enquiry_header_id);

        if (!empty($searchValue)) {
            $query->groupStart()
                //->like('a.enquiry_detail_details_id', $searchValue)
                //->orLike('a.created_date', $searchValue)
                ->groupEnd();
        }
        $query->orderBy($columnName, $columnSortOrder);
        $query->limit($rowperpage, $start);
        $records = $query->get()->getResultArray();

        $queryTot = $this->db->query('SELECT FOUND_ROWS() AS count');
        $totalRecords = $queryTot->getResultArray()[0]['count'];

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecords,
            "aaData" => $records
        );
        return $response;
    }
    public function executive_followup_form($params)
    {
        $draw = $params['draw'];
        $start = $params['start'];
        $rowperpage = $params['length'];
        $columnIndex = $params['order'][0]['column'];
        $columnName = $params['columns'][$columnIndex]['data'];
        $columnSortOrder = $params['order'][0]['dir'];
        $searchValue = $params['search']['value'];
        $enquiry_header_id = $params['enquiry_header_id'];
        $confirm_cs_id = $params['confirm_cs_id'];
        $db = \Config\Database::connect();

        $query = $db->table('khm_obj_executive_follow_up');
        $query->select('SQL_CALC_FOUND_ROWS  *,DATE_FORMAT(follow_up_time, "%d-%m-%Y %h:%i %p") as followup_time,DATE_FORMAT(next_follow_up_time, "%d-%m-%Y %h:%i %p") as next_followup_time', false);
        $query->where('enquiry_header_id', $enquiry_header_id);

        if (!empty($searchValue)) {
            $query->groupStart()
                ->like('contacted_person', $searchValue)
                ->orLike('follow_up_time', $searchValue)
                ->orLike('next_follow_up_time', $searchValue)
                ->groupEnd();
        }
        $query->orderBy($columnName, $columnSortOrder);
        $query->limit($rowperpage, $start);
        $records = $query->get()->getResultArray();

        $queryTot = $this->db->query('SELECT FOUND_ROWS() AS count');
        $totalRecords = $queryTot->getResultArray()[0]['count'];

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecords,
            "aaData" => $records
        );
        return $response;
    }
    public function transport_followup_form($params)
    {
        $draw = $params['draw'];
        $start = $params['start'];
        $rowperpage = $params['length'];
        $columnIndex = $params['order'][0]['column'];
        $columnName = $params['columns'][$columnIndex]['data'];
        $columnSortOrder = $params['order'][0]['dir'];
        $searchValue = $params['search']['value'];
        $enquiry_header_id = $params['enquiry_header_id'];
        $confirm_cs_id = $params['confirm_cs_id'];
        $db = \Config\Database::connect();

        $query = $db->table('khm_obj_transport_follow_up a');
        $query->select('SQL_CALC_FOUND_ROWS  a.*,e.entity_name as transporter_name,m.vehicle_model_name,DATE_FORMAT(a.vehicle_time, "%d-%m-%Y %h:%i %p") as vehicletime', false);
        $query->join('khm_obj_mst_vehicle_type t', 't.vehicle_type_id = a.vehicle_model_id', 'left');
        $query->join('khm_obj_mst_vehicle_model m', 'm.vehicle_model_id = t.vehicle_model_id', 'left');
        $query->join('khm_entity_mst e', 'e.entity_id = a.transporter_id', 'left');
        $query->where('a.enquiry_header_id', $enquiry_header_id);

        if (!empty($searchValue)) {
            $query->groupStart()
                ->like('vehicle_no', $searchValue)
                ->orLike('driver_name', $searchValue)
                ->orLike('phone_number', $searchValue)
                ->groupEnd();
        }
        $query->orderBy($columnName, $columnSortOrder);
        $query->limit($rowperpage, $start);
        $records = $query->get()->getResultArray();

        $queryTot = $this->db->query('SELECT FOUND_ROWS() AS count');
        $totalRecords = $queryTot->getResultArray()[0]['count'];

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecords,
            "aaData" => $records
        );
        return $response;
    }
    public function arrival_details_form($params)
    {
        $draw = $params['draw'];
        $start = $params['start'];
        $rowperpage = $params['length'];
        $columnIndex = $params['order'][0]['column'];
        $columnName = $params['columns'][$columnIndex]['data'];
        $columnSortOrder = $params['order'][0]['dir'];
        $searchValue = $params['search']['value'];
        $enquiry_header_id = $params['enquiry_header_id'];
        $confirm_cs_id = $params['confirm_cs_id'];
        $db = \Config\Database::connect();

        $query = $db->table('khm_obj_arrival_follow_up');
        $query->select('SQL_CALC_FOUND_ROWS  *,DATE_FORMAT(call_date, "%d-%m-%Y %h:%i %p") as calldate,DATE_FORMAT(arrival_date, "%d-%m-%Y %h:%i %p") as arrivaldate', false);
        $query->where('enquiry_header_id', $enquiry_header_id);

        if (!empty($searchValue)) {
            $query->groupStart()
                ->like('flight_train_no', $searchValue)
                ->orLike('call_date', $searchValue)
                ->orLike('city', $searchValue)
                ->orLike('arrival_date', $searchValue)
                ->groupEnd();
        }
        $query->orderBy($columnName, $columnSortOrder);
        $query->limit($rowperpage, $start);
        $records = $query->get()->getResultArray();

        $queryTot = $this->db->query('SELECT FOUND_ROWS() AS count');
        $totalRecords = $queryTot->getResultArray()[0]['count'];

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecords,
            "aaData" => $records
        );
        return $response;
    }

    public function departure_details_form($params)
    {
        $draw = $params['draw'];
        $start = $params['start'];
        $rowperpage = $params['length'];
        $columnIndex = $params['order'][0]['column'];
        $columnName = $params['columns'][$columnIndex]['data'];
        $columnSortOrder = $params['order'][0]['dir'];
        $searchValue = $params['search']['value'];
        $enquiry_header_id = $params['enquiry_header_id'];
        $confirm_cs_id = $params['confirm_cs_id'];
        $db = \Config\Database::connect();

        $query = $db->table('khm_obj_departure_follow_up');
        $query->select('SQL_CALC_FOUND_ROWS  *,DATE_FORMAT(call_date, "%d-%m-%Y %h:%i %p") as calldate,DATE_FORMAT(departure_date, "%d-%m-%Y %h:%i %p") as departuredate', false);
        $query->where('enquiry_header_id', $enquiry_header_id);

        if (!empty($searchValue)) {
            $query->groupStart()
                ->like('flight_train_no', $searchValue)
                ->orLike('call_date', $searchValue)
                ->orLike('city', $searchValue)
                ->orLike('departure_date', $searchValue)
                ->groupEnd();
        }
        $query->orderBy($columnName, $columnSortOrder);
        $query->limit($rowperpage, $start);
        $records = $query->get()->getResultArray();

        $queryTot = $this->db->query('SELECT FOUND_ROWS() AS count');
        $totalRecords = $queryTot->getResultArray()[0]['count'];

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecords,
            "aaData" => $records
        );
        return $response;
    }

    public function all_call_followup_form($params)
    {
        $draw = $params['draw'];
        $start = $params['start'];
        $rowperpage = $params['length'];
        $columnIndex = $params['order'][0]['column'];
        $columnName = $params['columns'][$columnIndex]['data'];
        $columnSortOrder = $params['order'][0]['dir'];
        $searchValue = $params['search']['value'];
        $enquiry_header_id = $params['enquiry_header_id'];
        $confirm_cs_id = $params['confirm_cs_id'];
        $followup_type_id = $params['followup_type_id'];
        $db = \Config\Database::connect();

        $query = $db->table('khm_obj_all_call_follow_up');
        $query->select('SQL_CALC_FOUND_ROWS  *,DATE_FORMAT(call_time, "%d-%m-%Y %h:%i %p") as calltime', false);
        $query->where('enquiry_header_id', $enquiry_header_id);
        $query->where('followup_type_id', $followup_type_id);

        if (!empty($searchValue)) {
            $query->groupStart()
                ->like('call_time', $searchValue)
                ->orLike('call_status', $searchValue)
                ->groupEnd();
        }
        $query->orderBy($columnName, $columnSortOrder);
        $query->limit($rowperpage, $start);
        $records = $query->get()->getResultArray();

        $queryTot = $this->db->query('SELECT FOUND_ROWS() AS count');
        $totalRecords = $queryTot->getResultArray()[0]['count'];

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecords,
            "aaData" => $records
        );
        return $response;
    }

    public function proformaguestdata($params)
    {
        $draw = $params['draw'];
        $start = $params['start'];
        $rowperpage = $params['length'];
        $columnIndex = $params['order'][0]['column'];
        $columnName = $params['columns'][$columnIndex]['data'];
        $columnSortOrder = $params['order'][0]['dir'];
        $searchValue = $params['search']['value'];
        $enquiry_header_id = $params['enquiry_header_id'];
        $confirm_cs_id = $params['confirm_cs_id'];
        $db = \Config\Database::connect();

        $query = $db->table('khm_obj_enquiry_edit_request');
        $query->select('SQL_CALC_FOUND_ROWS  *,DATE_FORMAT(updated_time, "%d-%m-%Y %h:%i %p") as created_on', false);
        $query->where('enquiry_header_id', $enquiry_header_id);

        if (!empty($searchValue)) {
            $query->groupStart()
                //->like('a.enquiry_detail_details_id', $searchValue)
                //->orLike('a.created_date', $searchValue)
                ->groupEnd();
        }
        $query->orderBy($columnName, $columnSortOrder);
        $query->limit($rowperpage, $start);
        $records = $query->get()->getResultArray();

        $queryTot = $this->db->query('SELECT FOUND_ROWS() AS count');
        $totalRecords = $queryTot->getResultArray()[0]['count'];

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecords,
            "aaData" => $records
        );
        return $response;
    }

    public function proformaofficedata($params)
    {
        $draw = $params['draw'];
        $start = $params['start'];
        $rowperpage = $params['length'];
        $columnIndex = $params['order'][0]['column'];
        $columnName = $params['columns'][$columnIndex]['data'];
        $columnSortOrder = $params['order'][0]['dir'];
        $searchValue = $params['search']['value'];
        $enquiry_header_id = $params['enquiry_header_id'];
        $confirm_cs_id = $params['confirm_cs_id'];
        $db = \Config\Database::connect();

        $query = $db->table('khm_obj_enquiry_edit_request a');
        $query->select('SQL_CALC_FOUND_ROWS a.*,ext.tpc,ext.margin_value,ext.total_rate,ext.tour_addon,DATE_FORMAT(a.updated_time, "%d-%m-%Y %h:%i %p") as created_on', false);
        $query->join('khm_obj_enquiry_detail_extensions ext', 'ext.enquiry_detail_details_id = a.cs_confirmed_id', 'left');
        $query->where('a.enquiry_header_id', $enquiry_header_id);

        if (!empty($searchValue)) {
            $query->groupStart()
                //->like('a.enquiry_detail_details_id', $searchValue)
                //->orLike('a.created_date', $searchValue)
                ->groupEnd();
        }
        $query->orderBy($columnName, $columnSortOrder);
        $query->limit($rowperpage, $start);
        $records = $query->get()->getResultArray();

        $queryTot = $this->db->query('SELECT FOUND_ROWS() AS count');
        $totalRecords = $queryTot->getResultArray()[0]['count'];

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecords,
            "aaData" => $records
        );
        return $response;
    }


    function get_proforma_guest_data($enquiry_header_id, $extension_ref_id, $confirm_cs_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_enquiry_itinerary_details a');
        $result = $selected_table->select('a.*,ex.ttc,ex.gst_value,ex.total_rate,m.meal_plan_name,t.is_own_arrangement,d.vehicle_type_id,d.date_of_tour_completion,d.date_of_tour_start,ex.tpc,gu.entity_name as guest_name,ag.entity_name as agent_name,gu.entity_address as guest_address,gu.entity_email as guest_email,gu.entity_mobile as guest_mobile,ag.entity_mobile as agent_mobile,ag.entity_email as agent_email,ag.entity_address as agent_address,hd.enq_type_id,d.gstin,d.no_of_night,d.total_no_of_pax,d.no_of_adult,d.no_of_child_with_bed,d.no_of_child_without_bed,d.no_of_double_room,d.no_of_single_room,d.no_of_extra_bed,d.is_vehicle_required,g.geog_name,o.object_name,r.room_category_name,hd.ref_no')
            ->join('khm_obj_enquiry_tour_details t', 't.tour_details_id = a.tour_details_id', 'left')
            ->join('khm_obj_meal_plan m', 'm.meal_plan_id = t.meal_plan_id', 'left')
            ->join('khm_obj_enquiry_details d', 'd.enquiry_details_id = t.enquiry_details_id', 'left')
            ->join('khm_obj_enquiry_header hd', 'hd.enquiry_header_id = a.enquiry_header_id', 'left')
            ->join('khm_obj_enquiry_detail_extensions ex', 'ex.enquiry_header_id = a.enquiry_header_id AND ex.enquiry_detail_details_id = ' . $confirm_cs_id . '', 'left')
            ->join('khm_entity_mst ag', 'ag.entity_id = hd.agent_entity_id', 'left')
            ->join('khm_entity_mst gu', 'gu.entity_id = hd.guest_entity_id', 'left')
            ->join('khm_loc_mst_geography g', 'g.geog_id = t.tour_location', 'left')
            ->join('khm_obj_hotel h', 'h.hotel_id = a.hotel_id', 'left')
            ->join('khm_obj_mst o', 'o.object_id = h.object_id', 'left')
            ->join('khm_obj_mst_hotel_room_category r', 'r.room_category_id = a.room_category_id', 'left')
            ->where('a.enquiry_header_id', $enquiry_header_id)
            ->where('a.extension_ref_id', $extension_ref_id)
            ->get()->getResultArray();
        return $result;
    }

    function get_proforma_office_data($enquiry_header_id, $extension_ref_id, $confirm_cs_id, $enquiry_edit_request_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_obj_enquiry_itinerary_details a');
        $result = $selected_table->select('a.*,ex.margin_value,ex.tour_addon,ex.tac,ex.ttc,ex.tnr,sop.entity_name as sop_name,exe.entity_name as executive_name,d.date_of_tour_completion,d.date_of_tour_start,ex.gst_value,ex.total_rate,m.meal_plan_name,t.is_own_arrangement,d.vehicle_type_id,ex.tpc,gu.entity_name as guest_name,ag.entity_name as agent_name,gu.entity_address as guest_address,gu.entity_email as guest_email,gu.entity_mobile as guest_mobile,ag.entity_mobile as agent_mobile,ag.entity_email as agent_email,ag.entity_address as agent_address,hd.enq_type_id,d.gstin,d.no_of_night,d.total_no_of_pax,d.no_of_adult,d.no_of_child_with_bed,d.no_of_child_without_bed,d.no_of_double_room,d.no_of_single_room,d.no_of_extra_bed,d.is_vehicle_required,g.geog_name,o.object_name,r.room_category_name,hd.ref_no')
            ->join('khm_obj_enquiry_tour_details t', 't.tour_details_id = a.tour_details_id', 'left')
            ->join('khm_obj_meal_plan m', 'm.meal_plan_id = t.meal_plan_id', 'left')
            ->join('khm_obj_enquiry_details d', 'd.enquiry_details_id = t.enquiry_details_id', 'left')
            ->join('khm_obj_enquiry_header hd', 'hd.enquiry_header_id = a.enquiry_header_id', 'left')
            ->join('khm_obj_enquiry_detail_extensions ex', 'ex.enquiry_header_id = a.enquiry_header_id AND ex.enquiry_detail_details_id = ' . $confirm_cs_id . '', 'left')
            ->join('khm_entity_mst ag', 'ag.entity_id = hd.agent_entity_id', 'left')
            ->join('khm_entity_mst gu', 'gu.entity_id = hd.guest_entity_id', 'left')
            ->join('khm_loc_mst_geography g', 'g.geog_id = t.tour_location', 'left')
            ->join('khm_obj_hotel h', 'h.hotel_id = a.hotel_id', 'left')
            ->join('khm_obj_mst o', 'o.object_id = h.object_id', 'left')
            ->join('khm_obj_mst_hotel_room_category r', 'r.room_category_id = a.room_category_id', 'left')
            ->join('khm_obj_enquiry_status st', 'st.enquiry_header_id = a.enquiry_header_id AND st.current_status_id = 1 AND st.edit_request_id = ' . $enquiry_edit_request_id . '', 'left')
            ->join('khm_entity_mst exe', 'exe.entity_id = st.assigned_to', 'left')
            ->join('khm_obj_enquiry_status sts', 'sts.enquiry_header_id = a.enquiry_header_id AND sts.current_status_id = 13 AND sts.edit_request_id = ' . $enquiry_edit_request_id . '', 'left')
            ->join('khm_entity_mst sop', 'sop.entity_id = sts.assigned_to', 'left')
            ->where('a.enquiry_header_id', $enquiry_header_id)
            ->where('a.extension_ref_id', $extension_ref_id)
            ->get()->getResultArray();
        return $result;
    }
    function get_proforma_office_tpdata($enquiry_header_id, $tour_plan_ref_id, $confirm_cs_id)
    {
        $db = \Config\Database::connect();
        $response = [];
        $selected_table = $db->table('khm_obj_enquiry_tour_details a');
        $result = $selected_table->select('a.*,ml.meal_plan_name,m.no_of_extra_bed,m.no_of_single_room,m.no_of_double_room,m.no_of_child_with_bed,m.no_of_child_without_bed,m.no_of_adult,hd.ref_no,e.entity_name,g.geog_name,o.object_name,o.object_email,o.object_address,o.object_ph_no,r.room_category_name')
            ->join('khm_obj_enquiry_details m', 'm.enquiry_details_id = a.enquiry_details_id', 'left')
            ->join('khm_loc_mst_geography g', 'g.geog_id = a.tour_location', 'left')
            ->join('khm_obj_enquiry_header hd', 'hd.enquiry_header_id = a.enquiry_header_id', 'left')
            ->join('khm_obj_hotel h', 'h.hotel_id = a.hotel_id', 'left')
            ->join('khm_obj_mst o', 'o.object_id = h.object_id', 'left')
            ->join('khm_entity_mst e', 'e.entity_id = hd.guest_entity_id', 'left')
            ->join('khm_obj_mst_hotel_room_category r', 'r.room_category_id = a.room_category_id', 'left')
            ->join('khm_obj_meal_plan ml', 'ml.meal_plan_id = m.meal_plan', 'left')
            ->where('a.extension_ref_id', $tour_plan_ref_id)
            ->get()->getResultArray();

        foreach ($result as $key => $vals) {
            $cost = $this->get_tourcost_byid($vals['tour_details_id']);
            $response[$key] = $vals;
            $response[$key]['cost'] = $cost;
        }
        return $response;
    }

    public function get_sales_report_data($params)
    {
        $draw = $params['draw'];
        $start = $params['start'];
        $rowperpage = $params['length'];
        $columnIndex = $params['order'][0]['column'];
        $columnName = $params['columns'][$columnIndex]['data'];
        $columnSortOrder = $params['order'][0]['dir'];
        $searchValue = $params['search']['value'];
        $fromDate = $params['fromDate'];
        $toDate = $params['toDate'];
        $selectOptionAgent = $params['selectOptionAgent'];
        $selectOptionStatus = $params['selectOptionStatus'];
        $selectOptionExecutive = $params['selectOptionExecutive'];
        $selectOptionSource = $params['selectOptionSource'];
        $db = \Config\Database::connect();

        $subStatusQuery = $db->table('khm_obj_enquiry_status s')
            ->select('s.enquiry_status_id,s.enquiry_header_id, s.current_status_id, s.updated_time')
            ->join(
                '(SELECT MAX(enquiry_status_id) AS max_status_id,enquiry_header_id
              FROM khm_obj_enquiry_status 
              GROUP BY enquiry_header_id) latest',
                's.enquiry_header_id = latest.enquiry_header_id AND s.enquiry_status_id = latest.max_status_id',
                'inner'
            );
        $latestStatusSql = $subStatusQuery->getCompiledSelect(false);

        $ReceivedQuery = $db->table('khm_obj_enquiry_payment rc')
            ->select('rc.paid_amount, rc.enquiry_header_id, latest.total_paid')
            ->join(
                '(SELECT MAX(payment_id) AS max_payment_id, SUM(paid_amount) AS total_paid, enquiry_header_id
            FROM khm_obj_enquiry_payment 
            GROUP BY enquiry_header_id) latest',
                'rc.enquiry_header_id = latest.enquiry_header_id AND rc.payment_id = latest.max_payment_id',
                'inner'
            );
        $latestReceived = $ReceivedQuery->getCompiledSelect(false);

        $ApprQuery = $db->table('khm_obj_enquiry_payment ap')
            ->select('ap.paid_amount, ap.enquiry_header_id, latest.total_appr,ap.approved_status')
            ->join(
                '(SELECT MAX(payment_id) AS max_payment_id, SUM(paid_amount) AS total_appr, enquiry_header_id
            FROM khm_obj_enquiry_payment 
            WHERE approved_status = 1
            GROUP BY enquiry_header_id) latest',
                'ap.enquiry_header_id = latest.enquiry_header_id AND ap.payment_id = latest.max_payment_id',
                'inner'
            );
        $latestAppr = $ApprQuery->getCompiledSelect(false);

        $query = $db->table('khm_obj_enquiry_header a');
        $query->select('SQL_CALC_FOUND_ROWS  a.*,d.enquiry_source,DATE_FORMAT(sop.updated_time, "%d-%m-%Y") as confirmed_date,ROUND(ext.total_rate-ext.tnr,2) as tac,ROUND(((ext.total_rate-ext.tnr)/ext.total_rate)*100,2) as tacper,app.total_appr,rec.total_paid,ext.tpc,sp.entity_name as sop_name,DATE_FORMAT(d.date_of_tour_completion, "%d-%m-%Y") as dep_date,DATE_FORMAT(d.date_of_tour_start, "%d-%m-%Y") as arr_date,ss.status_name,ag.entity_name as agent_name,gu.entity_name as guest_name,ex.entity_name as executive_name,h.cs_confirmed_id', false);
        $query->join('khm_obj_enquiry_edit_request h', 'h.enquiry_header_id = a.enquiry_header_id AND h.is_active = 1', 'left');
        $query->join('khm_obj_enquiry_detail_extensions ext', 'ext.enquiry_detail_details_id = h.cs_confirmed_id', 'left');
        $query->join('khm_obj_enquiry_details d', 'd.enquiry_details_id = ext.enquiry_ref_id', 'left');
        $query->join('khm_obj_enquiry_status exe', 'exe.enquiry_header_id = a.enquiry_header_id AND exe.edit_request_id = h.enquiry_edit_request_id AND exe.current_status_id = 1', 'left');
        $query->join('khm_obj_enquiry_status sop', 'sop.enquiry_header_id = a.enquiry_header_id AND sop.edit_request_id = h.enquiry_edit_request_id AND sop.current_status_id = 13', 'left');
        $query->join('khm_entity_mst ex', 'ex.entity_id = exe.assigned_to', 'left');
        $query->join('khm_entity_mst sp', 'sp.entity_id = sop.assigned_to', 'left');
        $query->join('khm_entity_mst gu', 'gu.entity_id = a.guest_entity_id', 'left');
        $query->join('khm_entity_mst ag', 'ag.entity_id = a.agent_entity_id', 'left');
        $query->join('(' . $latestStatusSql . ') est', 'est.enquiry_header_id = a.enquiry_header_id', 'left');
        $query->join('khm_obj_mst_enquiry_status ss', 'ss.status_id = est.current_status_id', 'left');
        $query->join('(' . $latestReceived . ') rec', 'rec.enquiry_header_id = a.enquiry_header_id', 'left');
        $query->join('(' . $latestAppr . ') app', 'app.enquiry_header_id = a.enquiry_header_id', 'left');
        $query->where('h.cs_confirmed_id >', 0, false);
        $query->Where("DATE(sop.updated_time) BETWEEN '$fromDate' AND '$toDate'");
        $query->orderBy('sop.updated_time', 'DESC');

        if (!empty($selectOptionStatus)) {
            $query->where('est.current_status_id', $selectOptionStatus);
        }
        if (!empty($selectOptionExecutive)) {
            $query->where('exe.assigned_to', $selectOptionExecutive);
        }
        if (!empty($selectOptionAgent)) {
            $query->where('a.agent_entity_id', $selectOptionAgent);
        }
        if (!empty($selectOptionSource)) {
            $query->where('d.enquiry_source', $selectOptionSource);
        }

        if (!empty($searchValue)) {
            $query->groupStart()
                ->like('a.enq_added_date', $searchValue)
                ->orLike('a.ref_no', $searchValue)
                ->groupEnd();
        }
        $query->orderBy($columnName, $columnSortOrder);
        $query->limit($rowperpage, $start);
        $records = $query->get()->getResultArray();

        $queryTot = $this->db->query('SELECT FOUND_ROWS() AS count');
        $totalRecords = $queryTot->getResultArray()[0]['count'];

        foreach ($records as &$record) {
            $tpc = floatval($record['tpc'] ?? 0);
            $total_appr = floatval($record['total_appr'] ?? 0);
            $record['balance'] = $tpc - $total_appr;
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecords,
            "aaData" => $records
        );
        return $response;
    }
    public function get_sales_report_new_data($params)
    {
        $draw = $params['draw'];
        $start = $params['start'];
        $rowperpage = $params['length'];
        $columnIndex = $params['order'][0]['column'];
        $columnName = $params['columns'][$columnIndex]['data'];
        $columnSortOrder = $params['order'][0]['dir'];
        $searchValue = $params['search']['value'];
        $fromDate = $params['fromDate'];
        $toDate = $params['toDate'];
        $selectOptionAgent = $params['selectOptionAgent'];
        $selectOptionStatus = $params['selectOptionStatus'];
        $selectOptionExecutive = $params['selectOptionExecutive'];
        $selectOptionSource = $params['selectOptionSource'];
        $db = \Config\Database::connect();

        $subStatusQuery = $db->table('khm_obj_enquiry_status s')
            ->select('s.enquiry_status_id,s.enquiry_header_id, s.current_status_id, s.updated_time')
            ->join(
                '(SELECT MAX(enquiry_status_id) AS max_status_id,enquiry_header_id
              FROM khm_obj_enquiry_status 
              GROUP BY enquiry_header_id) latest',
                's.enquiry_header_id = latest.enquiry_header_id AND s.enquiry_status_id = latest.max_status_id',
                'inner'
            );
        $latestStatusSql = $subStatusQuery->getCompiledSelect(false);

        $ReceivedQuery = $db->table('khm_obj_enquiry_payment rc')
            ->select('rc.paid_amount, rc.enquiry_header_id, latest.total_paid')
            ->join(
                '(SELECT MAX(payment_id) AS max_payment_id, SUM(paid_amount) AS total_paid, enquiry_header_id
            FROM khm_obj_enquiry_payment 
            GROUP BY enquiry_header_id) latest',
                'rc.enquiry_header_id = latest.enquiry_header_id AND rc.payment_id = latest.max_payment_id',
                'inner'
            );
        $latestReceived = $ReceivedQuery->getCompiledSelect(false);

        $ApprQuery = $db->table('khm_obj_enquiry_payment ap')
            ->select('ap.paid_amount, ap.enquiry_header_id, latest.total_appr,ap.approved_status')
            ->join(
                '(SELECT MAX(payment_id) AS max_payment_id, SUM(paid_amount) AS total_appr, enquiry_header_id
            FROM khm_obj_enquiry_payment 
            WHERE approved_status = 1
            GROUP BY enquiry_header_id) latest',
                'ap.enquiry_header_id = latest.enquiry_header_id AND ap.payment_id = latest.max_payment_id',
                'inner'
            );
        $latestAppr = $ApprQuery->getCompiledSelect(false);

        $query = $db->table('khm_obj_enquiry_header a');
        $query->select('SQL_CALC_FOUND_ROWS  a.*,d.enquiry_source,DATE_FORMAT(d.date_of_tour_completion, "%d-%m-%Y") as tour_end_date,ROUND(ext.total_rate-ext.tnr,2) as tac,ROUND(((ext.total_rate-ext.tnr)/ext.total_rate)*100,2) as tacper,app.total_appr,rec.total_paid,ext.tpc,sp.entity_name as sop_name,DATE_FORMAT(d.date_of_tour_completion, "%d-%m-%Y") as dep_date,DATE_FORMAT(d.date_of_tour_start, "%d-%m-%Y") as arr_date,ss.status_name,ag.entity_name as agent_name,gu.entity_name as guest_name,ex.entity_name as executive_name,h.cs_confirmed_id', false);
        $query->join('khm_obj_enquiry_edit_request h', 'h.enquiry_header_id = a.enquiry_header_id AND h.is_active = 1', 'left');
        $query->join('khm_obj_enquiry_detail_extensions ext', 'ext.enquiry_detail_details_id = h.cs_confirmed_id', 'left');
        $query->join('khm_obj_enquiry_details d', 'd.enquiry_details_id = ext.enquiry_ref_id', 'left');
        $query->join('khm_obj_enquiry_status exe', 'exe.enquiry_header_id = a.enquiry_header_id AND exe.edit_request_id = h.enquiry_edit_request_id AND exe.current_status_id = 1', 'left');
        $query->join('khm_obj_enquiry_status sop', 'sop.enquiry_header_id = a.enquiry_header_id AND sop.edit_request_id = h.enquiry_edit_request_id AND sop.current_status_id = 13', 'left');
        $query->join('khm_entity_mst ex', 'ex.entity_id = exe.assigned_to', 'left');
        $query->join('khm_entity_mst sp', 'sp.entity_id = sop.assigned_to', 'left');
        $query->join('khm_entity_mst gu', 'gu.entity_id = a.guest_entity_id', 'left');
        $query->join('khm_entity_mst ag', 'ag.entity_id = a.agent_entity_id', 'left');
        $query->join('(' . $latestStatusSql . ') est', 'est.enquiry_header_id = a.enquiry_header_id', 'left');
        $query->join('khm_obj_mst_enquiry_status ss', 'ss.status_id = est.current_status_id', 'left');
        $query->join('(' . $latestReceived . ') rec', 'rec.enquiry_header_id = a.enquiry_header_id', 'left');
        $query->join('(' . $latestAppr . ') app', 'app.enquiry_header_id = a.enquiry_header_id', 'left');
        $query->where('h.cs_confirmed_id >', 0, false);
        $query->Where("d.date_of_tour_completion BETWEEN '$fromDate' AND '$toDate'");
        $query->orderBy('sop.updated_time', 'DESC');

        if (!empty($selectOptionStatus)) {
            $query->where('est.current_status_id', $selectOptionStatus);
        }
        if (!empty($selectOptionExecutive)) {
            $query->where('exe.assigned_to', $selectOptionExecutive);
        }
        if (!empty($selectOptionAgent)) {
            $query->where('a.agent_entity_id', $selectOptionAgent);
        }
        if (!empty($selectOptionSource)) {
            $query->where('d.enquiry_source', $selectOptionSource);
        }

        if (!empty($searchValue)) {
            $query->groupStart()
                ->like('a.enq_added_date', $searchValue)
                ->orLike('a.ref_no', $searchValue)
                ->groupEnd();
        }
        $query->orderBy($columnName, $columnSortOrder);
        $query->limit($rowperpage, $start);
        $records = $query->get()->getResultArray();

        $queryTot = $this->db->query('SELECT FOUND_ROWS() AS count');
        $totalRecords = $queryTot->getResultArray()[0]['count'];

        foreach ($records as &$record) {
            $tpc = floatval($record['tpc'] ?? 0);
            $total_appr = floatval($record['total_appr'] ?? 0);
            $record['balance'] = $tpc - $total_appr;
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecords,
            "aaData" => $records
        );
        return $response;
    }
    public function get_payment_tracker_data($params)
    {
        $draw = $params['draw'];
        $start = $params['start'];
        $rowperpage = $params['length'];
        $columnIndex = $params['order'][0]['column'];
        $columnName = $params['columns'][$columnIndex]['data'];
        $columnSortOrder = $params['order'][0]['dir'];
        $searchValue = $params['search']['value'];
        $fromDate = $params['fromDate'];
        $toDate = $params['toDate'];
        $selectOptionAgent = $params['selectOptionAgent'];
        $selectOptionStatus = $params['selectOptionStatus'];
        $selectOptionsystem = $params['selectOptionsystem'];
        $selectOptionpayment = $params['selectOptionpayment'];
        $selectOptionExecutive = $params['selectOptionExecutive'];
        $selectOptionSource = $params['selectOptionSource'];
        $db = \Config\Database::connect();

        $subStatusQuery = $db->table('khm_obj_enquiry_status s')
            ->select('s.enquiry_status_id,s.enquiry_header_id, s.current_status_id, s.updated_time')
            ->join(
                '(SELECT MAX(enquiry_status_id) AS max_status_id,enquiry_header_id
              FROM khm_obj_enquiry_status 
              GROUP BY enquiry_header_id) latest',
                's.enquiry_header_id = latest.enquiry_header_id AND s.enquiry_status_id = latest.max_status_id',
                'inner'
            );
        $latestStatusSql = $subStatusQuery->getCompiledSelect(false);

        $ReceivedQuery = $db->table('khm_obj_enquiry_payment rc')
            ->select('rc.paid_amount, rc.enquiry_header_id, latest.total_paid')
            ->join(
                '(SELECT MAX(payment_id) AS max_payment_id, SUM(paid_amount) AS total_paid, enquiry_header_id
            FROM khm_obj_enquiry_payment 
            GROUP BY enquiry_header_id) latest',
                'rc.enquiry_header_id = latest.enquiry_header_id AND rc.payment_id = latest.max_payment_id',
                'inner'
            );
        $latestReceived = $ReceivedQuery->getCompiledSelect(false);

        $ApprQuery = $db->table('khm_obj_enquiry_payment ap')
            ->select('ap.paid_amount, ap.enquiry_header_id, latest.total_appr,ap.approved_status,ap.remarks')
            ->join(
                '(SELECT MAX(payment_id) AS max_payment_id, SUM(paid_amount) AS total_appr, enquiry_header_id
            FROM khm_obj_enquiry_payment 
            WHERE approved_status = 1
            GROUP BY enquiry_header_id) latest',
                'ap.enquiry_header_id = latest.enquiry_header_id AND ap.payment_id = latest.max_payment_id',
                'inner'
            );
        $latestAppr = $ApprQuery->getCompiledSelect(false);

        $query = $db->table('khm_obj_enquiry_header a');
        $query->select('SQL_CALC_FOUND_ROWS  a.*,app.remarks,app.approved_status,d.enquiry_source,DATE_FORMAT(sop.updated_time, "%d-%m-%Y") as confirmed_date,ROUND(ext.total_rate-ext.tnr,2) as tac,ROUND(((ext.total_rate-ext.tnr)/ext.total_rate)*100,2) as tacper,app.total_appr,rec.total_paid,ext.tpc,sp.entity_name as sop_name,DATE_FORMAT(d.date_of_tour_completion, "%d-%m-%Y") as dep_date,DATE_FORMAT(d.date_of_tour_start, "%d-%m-%Y") as arr_date,ss.status_name,ag.entity_name as agent_name,gu.entity_name as guest_name,ex.entity_name as executive_name,h.cs_confirmed_id', false);
        $query->join('khm_obj_enquiry_edit_request h', 'h.enquiry_header_id = a.enquiry_header_id AND h.is_active = 1', 'left');
        $query->join('khm_obj_enquiry_detail_extensions ext', 'ext.enquiry_detail_details_id = h.cs_confirmed_id', 'left');
        $query->join('khm_obj_enquiry_details d', 'd.enquiry_details_id = ext.enquiry_ref_id', 'left');
        $query->join('khm_obj_enquiry_status exe', 'exe.enquiry_header_id = a.enquiry_header_id AND exe.edit_request_id = h.enquiry_edit_request_id AND exe.current_status_id = 1', 'left');
        $query->join('khm_obj_enquiry_status sop', 'sop.enquiry_header_id = a.enquiry_header_id AND sop.edit_request_id = h.enquiry_edit_request_id AND sop.current_status_id = 13', 'left');
        $query->join('khm_entity_mst ex', 'ex.entity_id = exe.assigned_to', 'left');
        $query->join('khm_entity_mst sp', 'sp.entity_id = sop.assigned_to', 'left');
        $query->join('khm_entity_mst gu', 'gu.entity_id = a.guest_entity_id', 'left');
        $query->join('khm_entity_mst ag', 'ag.entity_id = a.agent_entity_id', 'left');
        $query->join('(' . $latestStatusSql . ') est', 'est.enquiry_header_id = a.enquiry_header_id', 'left');
        $query->join('khm_obj_mst_enquiry_status ss', 'ss.status_id = est.current_status_id', 'left');
        $query->join('(' . $latestReceived . ') rec', 'rec.enquiry_header_id = a.enquiry_header_id', 'left');
        $query->join('(' . $latestAppr . ') app', 'app.enquiry_header_id = a.enquiry_header_id', 'left');
        $query->where('h.cs_confirmed_id >', 0, false);
        $query->Where("DATE(sop.updated_time) BETWEEN '$fromDate' AND '$toDate'");
        $query->orderBy('sop.updated_time', 'DESC');

        if (!empty($selectOptionStatus)) {
            $query->where('est.current_status_id', $selectOptionStatus);
        }
        if (!empty($selectOptionExecutive)) {
            $query->where('exe.assigned_to', $selectOptionExecutive);
        }
        if (!empty($selectOptionAgent)) {
            $query->where('a.agent_entity_id', $selectOptionAgent);
        }
        if (!empty($selectOptionSource)) {
            $query->where('d.enquiry_source', $selectOptionSource);
        }
        if (!empty($selectOptionsystem)) {
            $query->where('a.enq_type_id', $selectOptionsystem);
        }
        if (!empty($selectOptionpayment)) {
            if ($selectOptionpayment == 3) {
                $query->groupStart()
                    ->whereNotIn('app.approved_status', [1, 2])
                    ->orWhere('app.approved_status', null)
                    ->groupEnd();
            } else {
                $query->where('app.approved_status', $selectOptionpayment);
            }
        }


        if (!empty($searchValue)) {
            $query->groupStart()
                ->like('a.enq_added_date', $searchValue)
                ->orLike('a.ref_no', $searchValue)
                ->groupEnd();
        }
        $query->orderBy($columnName, $columnSortOrder);
        $query->limit($rowperpage, $start);
        $records = $query->get()->getResultArray();

        $queryTot = $this->db->query('SELECT FOUND_ROWS() AS count');
        $totalRecords = $queryTot->getResultArray()[0]['count'];

        foreach ($records as &$record) {
            $tpc = floatval($record['tpc'] ?? 0);
            $total_appr = floatval($record['total_appr'] ?? 0);
            $record['balance'] = $tpc - $total_appr;
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecords,
            "aaData" => $records
        );
        return $response;
    }
    //nj//
    public function get_advanced_payment_tracker_data($params)
{
    $draw                  = $params['draw'];
    $start                 = $params['start'];
    $rowperpage            = $params['length'];
    $columnIndex           = $params['order'][0]['column'];
    $columnName            = $params['columns'][$columnIndex]['data'];
    $columnSortOrder       = $params['order'][0]['dir'];
    $searchValue           = $params['search']['value'];
    $fromDate              = $params['fromDate'];
    $toDate                = $params['toDate'];
    $selectOptionAgent     = $params['selectOptionAgent'];
    $selectOptionStatus    = $params['selectOptionStatus'];
    $selectOptionsystem    = $params['selectOptionsystem'];
    $selectOptionpayment   = $params['selectOptionpayment'];
    $selectOptionExecutive = $params['selectOptionExecutive'];
    $selectOptionSource    = $params['selectOptionSource'];

    $db = \Config\Database::connect();
    $subStatusQuery = $db->table('khm_obj_enquiry_status s')
        ->select('s.enquiry_status_id, s.enquiry_header_id, s.current_status_id, s.updated_time')
        ->join(
            '(SELECT MAX(enquiry_status_id) AS max_status_id, enquiry_header_id
               FROM khm_obj_enquiry_status
               GROUP BY enquiry_header_id) latest',
            's.enquiry_header_id = latest.enquiry_header_id 
             AND s.enquiry_status_id = latest.max_status_id',
            'inner'
        );
    $latestStatusSql = $subStatusQuery->getCompiledSelect(false);
    $ApprQuery = $db->table('khm_obj_enquiry_payment ap')
        ->select('ap.paid_amount, ap.enquiry_header_id, latest.total_appr, ap.approved_status, ap.remarks')
        ->join(
            '(SELECT SUM(paid_amount) AS total_appr, enquiry_header_id
               FROM khm_obj_enquiry_payment
              WHERE approved_status = 1
              GROUP BY enquiry_header_id) latest',
            'ap.enquiry_header_id = latest.enquiry_header_id',
            'inner'
        );
    $latestAppr = $ApprQuery->getCompiledSelect(false);

    $query = $db->table('khm_obj_enquiry_header a');
    $query->select(
        'SQL_CALC_FOUND_ROWS
         a.*, 
         app.remarks,
         app.approved_status,
         d.enquiry_source,
         DATE_FORMAT(sop.updated_time, "%d-%m-%Y") AS confirmed_date,
         ROUND(ext.total_rate - ext.tnr, 2) AS tac,
         ROUND(((ext.total_rate - ext.tnr) / ext.total_rate) * 100, 2) AS tacper,
         app.total_appr,
         rec.total_paid,
         ext.tpc,
         sp.entity_name AS sop_name,
         DATE_FORMAT(d.date_of_tour_completion, "%d-%m-%Y") AS dep_date,
         DATE_FORMAT(d.date_of_tour_start, "%d-%m-%Y")      AS arr_date,
         ss.status_name,
         ag.entity_name  AS agent_name,
         gu.entity_name  AS guest_name,
         ex.entity_name  AS executive_name,
         h.cs_confirmed_id',
        false
    );

    $query->join('khm_obj_enquiry_edit_request h',  'h.enquiry_header_id = a.enquiry_header_id AND h.is_active = 1', 'left');
    $query->join('khm_obj_enquiry_detail_extensions ext', 'ext.enquiry_detail_details_id = h.cs_confirmed_id', 'left');
    $query->join('khm_obj_enquiry_details d',          'd.enquiry_details_id = ext.enquiry_ref_id', 'left');
    $query->join('khm_obj_enquiry_status exe',         'exe.enquiry_header_id = a.enquiry_header_id AND exe.edit_request_id = h.enquiry_edit_request_id AND exe.current_status_id = 1', 'left');
    $query->join('khm_obj_enquiry_status sop',         'sop.enquiry_header_id = a.enquiry_header_id AND sop.edit_request_id = h.enquiry_edit_request_id AND sop.current_status_id = 13', 'left');
    $query->join('khm_entity_mst ex',                  'ex.entity_id = exe.assigned_to', 'left');
    $query->join('khm_entity_mst sp',                  'sp.entity_id = sop.assigned_to', 'left');
    $query->join('khm_entity_mst gu',                  'gu.entity_id = a.guest_entity_id', 'left');
    $query->join('khm_entity_mst ag',                  'ag.entity_id = a.agent_entity_id', 'left');
    $query->join('(' . $latestStatusSql . ') est',     'est.enquiry_header_id = a.enquiry_header_id', 'left');
    $query->join('khm_obj_mst_enquiry_status ss',      'ss.status_id = est.current_status_id', 'left');
    $receivedSub = "
      (SELECT 
         enquiry_header_id,
         SUM(paid_amount) AS total_paid
       FROM khm_obj_enquiry_payment
       GROUP BY enquiry_header_id
      ) rec
    ";
    $query->join($receivedSub, 'rec.enquiry_header_id = a.enquiry_header_id', 'left');

    $query->join('(' . $latestAppr . ') app', 'app.enquiry_header_id = a.enquiry_header_id', 'left');

    $query->where('h.cs_confirmed_id >', 0, false)
          ->where("DATE(sop.updated_time) BETWEEN '$fromDate' AND '$toDate'");

    if (!empty($selectOptionStatus)) {
        $query->where('est.current_status_id', $selectOptionStatus);
    }
    if (!empty($selectOptionExecutive)) {
        $query->where('exe.assigned_to', $selectOptionExecutive);
    }
    if (!empty($selectOptionAgent)) {
        $query->where('a.agent_entity_id', $selectOptionAgent);
    }
    if (!empty($selectOptionSource)) {
        $query->where('d.enquiry_source', $selectOptionSource);
    }
    if (!empty($selectOptionsystem)) {
        $query->where('a.enq_type_id', $selectOptionsystem);
    }
    if (!empty($selectOptionpayment)) {
        if ($selectOptionpayment == 1) {
            $query->where('(app.total_appr >= ext.tpc)');
        } elseif ($selectOptionpayment == 2) {
            $query->where('(app.total_appr > 0 AND app.total_appr < ext.tpc)');
        } elseif ($selectOptionpayment == 3) {
            $query->groupStart()
                  ->where('app.total_appr', 0)
                  ->orWhere('app.total_appr IS NULL', null, false)
                  ->groupEnd();
        }
    }
    if (!empty($searchValue)) {
        $query->groupStart()
              ->like('a.enq_added_date', $searchValue)
              ->orLike('a.ref_no', $searchValue)
              ->groupEnd();
    }

    $query->groupBy('a.enquiry_header_id');
    $query->orderBy($columnName, $columnSortOrder)
          ->limit($rowperpage, $start);
    $records = $query->get()->getResultArray();
    $totalRecords = $this->db->query('SELECT FOUND_ROWS() AS count')
                             ->getRow()
                             ->count;

    foreach ($records as &$rec) {
        $tpc = floatval($rec['tpc']  ?? 0);
        $appr = floatval($rec['total_appr'] ?? 0);
        $rec['balance'] = $tpc - $appr;
    }

    return [
        "draw"                 => intval($draw),
        "iTotalRecords"        => $totalRecords,
        "iTotalDisplayRecords" => $totalRecords,
        "aaData"               => $records
    ];
}
    public function delete_eighteen_double_function($tour_details_id)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->khm_eighteen_percentage_double)->delete(['tour_details_id' => $tour_details_id]);
    }
    public function delete_eighteen_single_function($tour_details_id)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->khm_eighteen_percentage_single)->delete(['tour_details_id' => $tour_details_id]);
    }

    ////
}
