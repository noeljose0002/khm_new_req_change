<?php

namespace App\Controllers;

use App\Models\Dashboard_m;
use CodeIgniter\HTTP\ResponseInterface;

class Dashboard extends BaseController
{

    //noel//
     public function get_by_state()
    {
        $state_id = $this->request->getGet('state_id');
        if (empty($state_id)) {
            return $this->response->setJSON([]);
        }

        $db = \Config\Database::connect();
        $builder = $db->table('khm_loc_mst_geography');

        
        $rows = $builder
            ->select('geog_id, geog_name')
            ->where('geog_parent_id', $state_id)
            ->orderBy('geog_name', 'ASC')
            ->get()
            ->getResultArray();

        return $this->response->setJSON($rows);
    }

   

    public function editroom_nj()
    {
        $id = $this->request->getPost('id');
        if (empty($id)) {
            return $this->response
                ->setStatusCode(400)
                ->setJSON(['error' => 'Missing room ID']);
        }

        $roomModel = new \App\Models\Dashboard_m();
        $room = $roomModel->get_one_room($id);
        if (! $room) {
            return $this->response
                ->setStatusCode(404)
                ->setJSON(['error' => 'Room not found']);
        }

        return $this->response
            ->setStatusCode(200)
            ->setJSON([
                'room_id' => $room['room_id'],
                'object_id' => $room['object_id'],
                'room_category_id' => $room['room_category_id'], // ✅ NOW this exists
                'hotel_room_category_id' => $room['hotel_room_category_id'],
                'room_type_id' => $room['room_type_id'],
                'occupancy_id' => $room['occupancy_id'],
                'enterprise_id' => $room['enterprise_id'],
            ]);
    }
    public function get_unique_locations()
    {
        $object_class_id = $this->request->getPost('object_class_id');

        $db = \Config\Database::connect();
        $builder = $db->table('khm_obj_mst a');

        $builder->distinct(); // ✅ Use distinct() here
        $builder->select('m.geog_name');
        $builder->join('khm_loc_mst_geography m', 'm.geog_id = a.object_location_id', 'left');
        $builder->where('a.object_class_id', $object_class_id);
        $builder->orderBy('m.geog_name');

        $query = $builder->get();
        $locations = $query->getResultArray();

        echo json_encode($locations);
    }


    public function updateRoomfunction()
    {
        if (! session()->get('user_id')) {
            return redirect()->to('Login');
        }

        $Dashboard_model = new Dashboard_m();

        $room_id           = $this->request->getPost('room_id');
        $room_category_id  = $this->request->getPost('room_category_id');
        $room_type_id      = $this->request->getPost('room_type_id');
        $occupancy_id      = $this->request->getPost('occupancy_id');
        $object_id         = $this->request->getPost('object_id');

        // (Re-fetch details if needed for your view)
        $data['room_cat_det']  = $Dashboard_model->get_room_category_details($room_category_id);
        $data['room_type_det'] = $Dashboard_model->get_room_type_details($room_type_id);
        $data['room_occu_det'] = $Dashboard_model->get_room_occupancy_details($occupancy_id);

        $update_data = [
            'room_category_id' => $room_category_id,
            'room_type_id'     => $room_type_id,
            'occupancy_id'     => $occupancy_id,
        ];

        $updated = $Dashboard_model->update_room($room_id, $update_data);

        if ($updated) {
            $data['tariff_exist'] = $Dashboard_model->get_room_basic_tariff_exist($object_id);
            $data['tariff_data']  = $Dashboard_model->get_room_basic_tariff($object_id);
            echo view('dashboard/all_room_tariff_details', $data);
        } else {
            // handle failure gracefully
            echo 'Error updating record';
        }
    }

    // public function updateRoom()
    // {
    //     $room_id = $this->request->getPost('room_id');
    //      log_message('debug', 'room_id='.$room_id);
    //     $room_category_id = $this->request->getPost('room_category_id');
    //     $room_type_id = $this->request->getPost('room_type_id');
    //     $occupancy_id = $this->request->getPost('occupancy_id');

    //     $data = [
    //         'room_category_id' => $room_category_id,
    //         'room_type_id' => $room_type_id,
    //         'occupancy_id' => $occupancy_id
    //     ];

    //     // ✅ FIX: Use `$roomModel` not `roomModel`
    //     $roomModel = new \App\Models\Dashboard_m();
    //     $builder = $roomModel->db->table('khm_obj_room');
    //     // OR:
    //     // $builder = \Config\Database::connect()->table('khm_obj_room');

    //     if ($room_id) {
    //         // Edit existing
    //         $builder->where('room_id', $room_id);
    //         $result = $builder->update($data);
    //     } else {
    //         // Insert new
    //         $result = $builder->insert($data);
    //     }

    //     return $this->response->setJSON($result ? 1 : 0);
    // }





    //////noel//////
    public function index()
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model = new Dashboard_m();
            $entity_id = session('user_id');
            $active_role = session('active_role');
            $sales_datas = [];
            $sol_datas = [];
            $executive_performance = [];
            $all_roles = $Dashboard_model->get_all_entity_roles($entity_id);
            $all_systems = $Dashboard_model->get_all_systems($entity_id);
            $data['all_systems'] = $all_systems;
            if (!empty($all_roles)) {
                $data['all_roles_assn'] = $all_roles;
                $all_menus = $Dashboard_model->get_all_role_menus($active_role);
                if (!empty($all_menus)) {
                    $data['all_menus'] = $all_menus;
                } else {
                    $data['all_menus'] = [];
                }
                $all_permissions = $Dashboard_model->get_all_entity_permissions($active_role, 3);
                if (!empty($all_permissions)) {
                    $data['all_permissions'] = $all_permissions;
                } else {
                    $data['all_permissions'] = [];
                }
            } else {
                $data['all_roles_assn'] = [];
                $data['all_menus'] = [];
                $data['all_permissions'] = [];
            }
            //$all_trans = $Dashboard_model->get_all_entity_trans($entity_id);
            $parent_menu = $Dashboard_model->get_parent_menus();
            $sub_menu = $Dashboard_model->get_sub_menus();
            $sub_menu = $Dashboard_model->get_sub_menus();

            $leads_current_month = $Dashboard_model->get_leads_by_month();
            if (!empty($leads_current_month)) {
                $lead_count_current = count($leads_current_month);
            } else {
                $lead_count_current = 0;
            }
            $previousMonth = date('m', strtotime('-1 month'));
            $previousMonthName = date('F', strtotime('-1 month'));
            $leads_previous_month = $Dashboard_model->get_leads_by_month($previousMonth);
            if (!empty($leads_previous_month)) {
                $lead_count_previous = count($leads_previous_month);
            } else {
                $lead_count_previous = 0;
            }

            /*$arrivals_current_month = $Dashboard_model->get_arrivals_by_month();
            if(!empty($arrivals_current_month)){
                $arrivals_count_current = count($arrivals_current_month);
            }
            else{*/
            $arrivals_count_current = 0;
            //}
            /*$arrivals_previous_month = $Dashboard_model->get_arrivals_by_month($previousMonth);
            if(!empty($arrivals_previous_month)){
                $arrivals_count_previous = count($arrivals_previous_month);
            }
            else{*/
            $arrivals_count_previous = 0;
            //}

            /*$sales_current_month = $Dashboard_model->get_sales_by_month();
            if(!empty($sales_current_month)){
                $sales_count_current = round($sales_current_month[0]['sales_amount'],2);
            }
            else{*/
            $sales_count_current = 0;
            //}
            /*$sales_previous_month = $Dashboard_model->get_sales_by_month($previousMonth);
            if(!empty($sales_previous_month)){
                $sales_count_previous = round($sales_previous_month[0]['sales_amount'],2);
            }
            else{*/
            $sales_count_previous = 0;
            //}

            $target_current_month = $Dashboard_model->get_target_by_month();
            if (!empty($target_current_month)) {
                $target_count_current = round($target_current_month[0]['targetamount'], 2);
            } else {
                $target_count_current = 0;
            }
            $target_previous_month = $Dashboard_model->get_target_by_month($previousMonth);
            if (!empty($target_previous_month)) {
                $target_count_previous = round($target_previous_month[0]['targetamount'], 2);
            } else {
                $target_count_previous = 0;
            }


            /*$arrivals_today = $Dashboard_model->get_today_arrivals();
            if(!empty($arrivals_today)){
                $arrivals_today_count =  count($arrivals_today);
            }
            else{*/
            $arrivals_today_count = 0;
            //}

            /*$departure_today = $Dashboard_model->get_today_departure();
            if(!empty($departure_today)){
                $departure_today_count =  count($departure_today);
            }
            else{*/
            $departure_today_count = 0;
            //}

            /*$followup_coming = $Dashboard_model->get_followup_coming();
            if(!empty($followup_coming)){
                $followup_coming_count =  count($followup_coming);
            }
            else{*/
            $followup_coming_count = 0;
            //}

            /*$followup_pending = $Dashboard_model->get_followup_pending();
            if(!empty($followup_pending)){
                $followup_pending_count =  count($followup_pending);
            }
            else{*/
            $followup_pending_count = 0;
            //}

            /*$client_in_tour = $Dashboard_model->get_client_in_tour();
            if(!empty($client_in_tour)){
                $client_in_tour_count =  count($client_in_tour);
            }
            else{*/
            $client_in_tour_count = 0;
            //}

            /*$partial_payment = $Dashboard_model->get_partial_payment();
            if(!empty($partial_payment)){
                $partial_payment_count =  count($partial_payment);
            }
            else{*/
            $partial_payment_count = 0;
            //}

            /*$not_receive_payment = $Dashboard_model->get_not_receive_payment();
            if(!empty($not_receive_payment)){
                $not_receive_payment_count =  count($not_receive_payment);
            }
            else{*/
            $not_receive_payment_count = 0;
            //}

            /*$arrivals_tomorrow = $Dashboard_model->get_tomorrow_arrivals();
            if(!empty($arrivals_tomorrow)){
                $arrivals_tomorrow_count =  count($arrivals_tomorrow);
            }
            else{*/
            $arrivals_tomorrow_count = 0;
            // }

            /*$departure_tomorrow = $Dashboard_model->get_tomorrow_departure();
            if(!empty($departure_tomorrow)){
                $departure_tomorrow_count =  count($departure_tomorrow);
            }
            else{*/
            $departure_tomorrow_count = 0;
            //}

            /*$yesterday_enq_confirmation = $Dashboard_model->get_yesterday_enq_confirmation();
            if(!empty($yesterday_enq_confirmation)){
                $yesterday_enq_confirmation_count =  count($yesterday_enq_confirmation);
            }
            else{*/
            $yesterday_enq_confirmation_count = 0;
            //}

            /*$today_enq_confirmation = $Dashboard_model->get_today_enq_confirmation();
            if(!empty($today_enq_confirmation)){
                $today_enq_confirmation_count =  count($today_enq_confirmation);
            }
            else{*/
            $today_enq_confirmation_count = 0;
            // }

            /*$yesterday_enq_amend = $Dashboard_model->get_yesterday_enq_amend();
            if(!empty($yesterday_enq_amend)){
                $yesterday_enq_amend_count =  count($yesterday_enq_amend);
            }
            else{*/
            $yesterday_enq_amend_count = 0;
            //}

            /*$today_enq_amend = $Dashboard_model->get_today_enq_amend();
            if(!empty($today_enq_amend)){
                $today_enq_amend_count =  count($today_enq_amend);
            }
            else{*/
            $today_enq_amend_count = 0;
            //}

            $currentMonth = date('n');
            for ($m = 1; $m <= $currentMonth; $m++) {
                $monthName = date('M', mktime(0, 0, 0, $m, 1));

                /*$monthly_sales = $Dashboard_model->get_sales_by_month($m);
                $monthly_sale = !empty($monthly_sales) ? round($monthly_sales[0]['sales_amount'], 2) : 0;*/
                $monthly_sale = 0;

                /*$monthly_targets = $Dashboard_model->get_target_by_month($m);
                $monthly_target = !empty($monthly_targets) ? round($monthly_targets[0]['targetamount'], 2) : 0;*/
                $monthly_target = 0;

                $sales_datas[] = [
                    "year"   => $monthName,
                    "target" => $monthly_target,
                    "sales"  => $monthly_sale
                ];
            }

            for ($mn = 1; $mn <= $currentMonth; $mn++) {
                $monthNames = date('M', mktime(0, 0, 0, $mn, 1));

                $monthly_leads = $Dashboard_model->get_leads_by_month($mn);
                $monthly_lead = !empty($monthly_leads) ? count($monthly_leads) : 0;

                /*$monthly_arrivals = $Dashboard_model->get_arrivals_by_month($mn);
                $monthly_arrival = !empty($monthly_arrivals) ? count($monthly_arrivals) : 0;*/
                $monthly_arrival = 0;

                /*$m_sales = $Dashboard_model->get_sales_by_month($mn);
                $m_sale = !empty($m_sales) ? count($m_sales) : 0;*/
                $m_sale = 0;

                $lb_datas[] = [
                    "year"   => $monthNames,
                    "leads"   => $monthly_lead,
                    "arrivals" => $monthly_arrival,
                    "sales"  => $m_sale
                ];
            }

            /*$source_of_leads = $Dashboard_model->get_source_of_leads();
            if(!empty($source_of_leads)){
                foreach($source_of_leads as $key => $val){
                    if($val['enquiry_source'] == 1){
                        $enquiry_source_name = "Email";
                    }
                    else if($val['enquiry_source'] == 2){
                        $enquiry_source_name = "Reference";
                    }
                    else if($val['enquiry_source'] == 3){
                        $enquiry_source_name = "Phone";
                    }
                    else{
                        $enquiry_source_name = "Others";
                    }
                    $sol_datas[] = [
                        "category"   => $enquiry_source_name,
                        "value" => $val['source_count']
                    ];
                }
            }*/
            $source_of_leads = [];

            $executive_performance = $Dashboard_model->get_executive_performance();
            $sop_performance = $Dashboard_model->get_sop_performance();
            $top_performance = $Dashboard_model->get_top_performance();

            $team_leads_exe = $Dashboard_model->get_team_lead_and_exe();
            $sop_leads_exe = $Dashboard_model->get_sop_lead_and_exe();
            $top_leads_exe = $Dashboard_model->get_top_lead_and_exe();

            $data['top_leads_exe'] = $top_leads_exe;
            $data['sop_leads_exe'] = $sop_leads_exe;
            $data['team_leads_exe'] = $team_leads_exe;
            $data['top_performance'] = $top_performance;
            $data['sop_performance'] = $sop_performance;
            $data['executive_performance'] = $executive_performance;
            $data['parent_menu'] = $parent_menu;
            $data['sub_menu'] = $sub_menu;
            $data['leads_current_month'] = $leads_current_month;
            $data['lead_count_current'] = $lead_count_current;
            $data['lead_count_previous'] = $lead_count_previous;

            //$data['arrivals_current_month'] = $arrivals_current_month;
            $data['arrivals_current_month'] = 0;
            $data['arrivals_count_current'] = $arrivals_count_current;
            $data['arrivals_count_previous'] = $arrivals_count_previous;

            //$data['sales_current_month'] = $sales_current_month;
            $data['sales_current_month'] = 0;
            $data['sales_count_current'] = $sales_count_current;
            $data['sales_count_previous'] = $sales_count_previous;

            $data['target_current_month'] = $target_current_month;
            $data['target_count_current'] = $target_count_current;
            $data['target_count_previous'] = $target_count_previous;

            $data['arrivals_today_count'] = $arrivals_today_count;
            $data['departure_today_count'] = $departure_today_count;
            $data['followup_coming_count'] = $followup_coming_count;
            $data['followup_pending_count'] = $followup_pending_count;
            $data['client_in_tour_count'] = $client_in_tour_count;
            $data['partial_payment_count'] = $partial_payment_count;
            $data['not_receive_payment_count'] = $not_receive_payment_count;
            $data['arrivals_tomorrow_count'] = $arrivals_tomorrow_count;
            $data['departure_tomorrow_count'] = $departure_tomorrow_count;
            $data['yesterday_enq_confirmation_count'] = $yesterday_enq_confirmation_count;
            $data['today_enq_confirmation_count'] = $today_enq_confirmation_count;
            $data['yesterday_enq_amend_count'] = $yesterday_enq_amend_count;
            $data['today_enq_amend_count'] = $today_enq_amend_count;
            $data['sales_datas'] = $sales_datas;
            $data['sol_datas'] = $sol_datas;
            $data['lb_datas'] = $lb_datas;

            $data['previousMonthName'] = $previousMonthName;
            return view('dashboard/dashboard', $data);
        } else {
            return redirect()->to('Login');
        }
    }
    public function view_tariff($object_id, $tariff_id = null)
    {
        if (!empty(session()->get('user_id'))) {
            $system_id = $this->request->getGet('system_id')
                ?: session('system_id');
            $Dashboard_model = new Dashboard_m();
            $entity_id = session('user_id');
            $active_role = session('active_role');
            $all_systems = $Dashboard_model->get_all_systems($entity_id);
            $data['all_systems'] = $all_systems;
            $hotel_datas = $Dashboard_model->get_hotel_details_byobj($object_id);
            $wnd_exists = $Dashboard_model->check_weekend_exist($object_id);
            if (!empty($wnd_exists)) {
                $wnd_exist = 1;
            } else {
                $wnd_exist = 0;
            }
            if (!empty($hotel_datas)) {
                $hotel_id = $hotel_datas[0]['hotel_id'];
            } else {
                $hotel_id = null;
            }
            $all_roles = $Dashboard_model->get_all_entity_roles($entity_id);
            if (!empty($all_roles)) {
                $data['all_roles_assn'] = $all_roles;
                $all_menus = $Dashboard_model->get_all_role_menus($active_role);
                if (!empty($all_menus)) {
                    $data['all_menus'] = $all_menus;
                } else {
                    $data['all_menus'] = [];
                }
                $all_permissions = $Dashboard_model->get_all_entity_permissions($active_role, 3);
                if (!empty($all_permissions)) {
                    $data['all_permissions'] = $all_permissions;
                } else {
                    $data['all_permissions'] = [];
                }
            } else {
                $data['all_roles_assn'] = [];
                $data['all_menus'] = [];
                $data['all_permissions'] = [];
            }
            //$all_trans = $Dashboard_model->get_all_entity_trans($entity_id);
            $parent_menu = $Dashboard_model->get_parent_menus();
            $sub_menu = $Dashboard_model->get_sub_menus();
            $sub_menu = $Dashboard_model->get_sub_menus();
            $room_categories = $Dashboard_model->get_room_categories_byHotel($hotel_id, $system_id);
            $room_categories3 = $Dashboard_model->get_room_categories_byHotel_for_system_change($hotel_id, $system_id);
            $room_types = $Dashboard_model->get_all_room_types();
            $occupancy = $Dashboard_model->get_all_occupancy();
            $all_seasons = $Dashboard_model->get_season_byid($object_id);
            $all_weekends = $Dashboard_model->get_weekend_byid($object_id);
            $tariff_data = $Dashboard_model->get_room_basic_tariff($object_id, $hotel_id);
            $data['hotel_det'] = $Dashboard_model->get_hotel_details($hotel_id);
            ///noel///
            $room_categories2 = $Dashboard_model->get_hotel_room_categories();
            ///noel///
            $data['parent_menu'] = $parent_menu;
            $data['sub_menu'] = $sub_menu;
            $data['room_categories'] = $room_categories;
            $data['room_categories2'] = $room_categories2;
            $data['room_categories3'] = $room_categories3;
            $data['occupancy'] = $occupancy;
            $data['room_types'] = $room_types;
            $data['hotel_id'] = $hotel_id;
            $data['object_id'] = $object_id;
            $data['all_seasons'] = $all_seasons;
            $data['all_weekends'] = $all_weekends;
            $data['tariff_ids'] = $tariff_id;
            $data['tariff_data'] = $tariff_data;
            $data['wnd_exist'] = $wnd_exist;
            return view('dashboard/tariff_generation', $data);
        } else {
            return redirect()->to('Login');
        }
    }
    public function view_users($entity_class_id)
    {
        if (!empty(session()->get('user_id'))) {

            $Dashboard_model = new Dashboard_m();
            $entity_id = session('user_id');
            $active_role = session('active_role');
            $all_systems = $Dashboard_model->get_all_systems($entity_id);
            $data['all_systems'] = $all_systems;
            $all_roles = $Dashboard_model->get_all_entity_roles($entity_id);
            if (!empty($all_roles)) {
                $data['all_roles_assn'] = $all_roles;
                $all_menus = $Dashboard_model->get_all_role_menus($active_role);
                if (!empty($all_menus)) {
                    $data['all_menus'] = $all_menus;
                } else {
                    $data['all_menus'] = [];
                }
                $all_permissions = $Dashboard_model->get_all_entity_permissions($active_role, 3);
                if (!empty($all_permissions)) {
                    $data['all_permissions'] = $all_permissions;
                } else {
                    $data['all_permissions'] = [];
                }
            } else {
                $data['all_roles_assn'] = [];
                $data['all_menus'] = [];
                $data['all_permissions'] = [];
            }
            $entity_class_det = $Dashboard_model->get_entity_class_details($entity_class_id);
            if (!empty($entity_class_det)) {
                $data['entity_class_name'] = $entity_class_det[0]['entity_class_name'];
            } else {
                $data['entity_class_name'] = null;
            }
            $parent_menu = $Dashboard_model->get_parent_menus();
            $sub_menu = $Dashboard_model->get_sub_menus();
            $data['parent_menu'] = $parent_menu;
            $data['sub_menu'] = $sub_menu;
            $data['entity_class_id'] = $entity_class_id;
            $data['users_list'] = $Dashboard_model->get_users_list($entity_class_id);

            $all_permissions = [];
            $add_per = 0;
            $edit_per = 0;
            $view_per = 0;
            $del_per = 0;
            $all_permissions = $Dashboard_model->get_all_permissions(4,$active_role);
            if(!empty($all_permissions)){
                foreach($all_permissions as $key => $val){
                    if($val['pro_permission_id'] == 1){
                        $add_per = 1;
                    }
                    if($val['pro_permission_id'] == 2){
                        $edit_per = 1;
                    }
                    if($val['pro_permission_id'] == 3){
                        $view_per = 1;
                    }
                    if($val['pro_permission_id'] == 5){
                        $del_per = 1;
                    }
                }
            }
            $data['add_per'] = $add_per;
            $data['edit_per'] = $edit_per;
            $data['view_per'] = $view_per;
            $data['del_per'] = $del_per;
            
            return view('dashboard/view_users', $data);
        } else {
            return redirect()->to('Login');
        }
    }

    public function view_hotels($object_class_id)
    {
        if (!empty(session()->get('user_id'))) {

            $Dashboard_model = new Dashboard_m();
            $entity_id = session('user_id');
            $active_role = session('active_role');
            $all_systems = $Dashboard_model->get_all_systems($entity_id);
            $data['all_systems'] = $all_systems;
            $all_roles = $Dashboard_model->get_all_entity_roles($entity_id);
            if (!empty($all_roles)) {
                $data['all_roles_assn'] = $all_roles;
                $all_menus = $Dashboard_model->get_all_role_menus($active_role);
                if (!empty($all_menus)) {
                    $data['all_menus'] = $all_menus;
                } else {
                    $data['all_menus'] = [];
                }
                $all_permissions = $Dashboard_model->get_all_entity_permissions($active_role, 3);
                if (!empty($all_permissions)) {
                    $data['all_permissions'] = $all_permissions;
                } else {
                    $data['all_permissions'] = [];
                }
            } else {
                $data['all_roles_assn'] = [];
                $data['all_menus'] = [];
                $data['all_permissions'] = [];
            }
            $object_class_det = $Dashboard_model->get_object_class_details($object_class_id);
            if (!empty($object_class_det)) {
                $data['object_class_name'] = $object_class_det[0]['object_class_name'];
            } else {
                $data['object_class_name'] = null;
            }
            $room_categories = $Dashboard_model->get_hotel_room_categories();
            $hotel_facilities = $Dashboard_model->get_hotel_facilities();
            $data['room_categories'] = $room_categories;
            $data['hotel_facilities'] = $hotel_facilities;
            $parent_menu = $Dashboard_model->get_parent_menus();
            $sub_menu = $Dashboard_model->get_sub_menus();
            $data['parent_menu'] = $parent_menu;
            $data['sub_menu'] = $sub_menu;
            $data['object_class_id'] = $object_class_id;
            $data['hotel_list'] = $Dashboard_model->get_hotel_list($object_class_id);
            return view('dashboard/view_hotels', $data);
        } else {
            return redirect()->to('Login');
        }
    }

    public function view_sight_seeing($object_class_id)
    {
        if (!empty(session()->get('user_id'))) {

            $Dashboard_model = new Dashboard_m();
            $entity_id = session('user_id');
            $active_role = session('active_role');
            $all_systems = $Dashboard_model->get_all_systems($entity_id);
            $data['all_systems'] = $all_systems;
            $all_roles = $Dashboard_model->get_all_entity_roles($entity_id);
            if (!empty($all_roles)) {
                $data['all_roles_assn'] = $all_roles;
                $all_menus = $Dashboard_model->get_all_role_menus($active_role);
                if (!empty($all_menus)) {
                    $data['all_menus'] = $all_menus;
                } else {
                    $data['all_menus'] = [];
                }
                $all_permissions = $Dashboard_model->get_all_entity_permissions($active_role, 3);
                if (!empty($all_permissions)) {
                    $data['all_permissions'] = $all_permissions;
                } else {
                    $data['all_permissions'] = [];
                }
            } else {
                $data['all_roles_assn'] = [];
                $data['all_menus'] = [];
                $data['all_permissions'] = [];
            }
            $object_class_det = $Dashboard_model->get_object_class_details($object_class_id);
            if (!empty($object_class_det)) {
                $data['object_class_name'] = $object_class_det[0]['object_class_name'];
            } else {
                $data['object_class_name'] = null;
            }

            $parent_menu = $Dashboard_model->get_parent_menus();
            $sub_menu = $Dashboard_model->get_sub_menus();
            $data['parent_menu'] = $parent_menu;
            $data['sub_menu'] = $sub_menu;
            $data['object_class_id'] = $object_class_id;
            $data['ss_list'] = $Dashboard_model->get_sight_seeing_list($object_class_id);
            return view('dashboard/view_sight_seeing', $data);
        } else {
            return redirect()->to('Login');
        }
    }


    public function view_vehicles($object_class_id)
    {
        if (!empty(session()->get('user_id'))) {

            $Dashboard_model = new Dashboard_m();
            $entity_id = session('user_id');
            $active_role = session('active_role');
            $all_systems = $Dashboard_model->get_all_systems($entity_id);
            $data['all_systems'] = $all_systems;
            $all_roles = $Dashboard_model->get_all_entity_roles($entity_id);
            if (!empty($all_roles)) {
                $data['all_roles_assn'] = $all_roles;
                $all_menus = $Dashboard_model->get_all_role_menus($active_role);
                if (!empty($all_menus)) {
                    $data['all_menus'] = $all_menus;
                } else {
                    $data['all_menus'] = [];
                }
                $all_permissions = $Dashboard_model->get_all_entity_permissions($active_role, 3);
                if (!empty($all_permissions)) {
                    $data['all_permissions'] = $all_permissions;
                } else {
                    $data['all_permissions'] = [];
                }
            } else {
                $data['all_roles_assn'] = [];
                $data['all_menus'] = [];
                $data['all_permissions'] = [];
            }
            $object_class_det = $Dashboard_model->get_object_class_details($object_class_id);
            if (!empty($object_class_det)) {
                $data['object_class_name'] = $object_class_det[0]['object_class_name'];
            } else {
                $data['object_class_name'] = null;
            }

            $parent_menu = $Dashboard_model->get_parent_menus();
            $sub_menu = $Dashboard_model->get_sub_menus();

            $data['parent_menu'] = $parent_menu;

            $data['sub_menu'] = $sub_menu;
            $data['object_class_id'] = $object_class_id;
            return view('dashboard/view_vehicles', $data);
        } else {
            return redirect()->to('Login');
        }
    }


    public function view_locations()
    {
        if (!empty(session()->get('user_id'))) {

            $Dashboard_model = new Dashboard_m();
            $entity_id = session('user_id');
            $active_role = session('active_role');
            $all_systems = $Dashboard_model->get_all_systems($entity_id);
            $data['all_systems'] = $all_systems;
            $all_roles = $Dashboard_model->get_all_entity_roles($entity_id);
            if (!empty($all_roles)) {
                $data['all_roles_assn'] = $all_roles;
                $all_menus = $Dashboard_model->get_all_role_menus($active_role);
                if (!empty($all_menus)) {
                    $data['all_menus'] = $all_menus;
                } else {
                    $data['all_menus'] = [];
                }

                $all_permissions = $Dashboard_model->get_all_entity_permissions($active_role, 3);
                if (!empty($all_permissions)) {
                    $data['all_permissions'] = $all_permissions;
                } else {
                    $data['all_permissions'] = [];
                }
            } else {
                $data['all_roles_assn'] = [];
                $data['all_menus'] = [];
                $data['all_permissions'] = [];
            }
            $location_det = $Dashboard_model->list_all_locations();
            $data['entity_class_name'] = "Geograpgy Locations";
            $parent_menu = $Dashboard_model->get_parent_menus();
            $sub_menu = $Dashboard_model->get_sub_menus();
            $data['parent_menu'] = $parent_menu;
            $data['sub_menu'] = $sub_menu;
            $data['location_list'] = $location_det;
            return view('dashboard/view_locations', $data);
        } else {
            return redirect()->to('Login');
        }
    }
    public function assign_roles($entity_class_id)
    {
        if (!empty(session()->get('user_id'))) {

            $Dashboard_model = new Dashboard_m();
            $entity_id = session('user_id');
            $active_role = session('active_role');
            $all_systems = $Dashboard_model->get_all_systems($entity_id);
            $data['all_systems'] = $all_systems;
            $all_roles = $Dashboard_model->get_all_entity_roles($entity_id);
            if (!empty($all_roles)) {
                $data['all_roles_assn'] = $all_roles;
                $all_menus = $Dashboard_model->get_all_role_menus($active_role);
                if (!empty($all_menus)) {
                    $data['all_menus'] = $all_menus;
                } else {
                    $data['all_menus'] = [];
                }
                $all_permissions = $Dashboard_model->get_all_entity_permissions($active_role, 3);
                if (!empty($all_permissions)) {
                    $data['all_permissions'] = $all_permissions;
                } else {
                    $data['all_permissions'] = [];
                }
            } else {
                $data['all_roles_assn'] = [];
                $data['all_menus'] = [];
                $data['all_permissions'] = [];
            }
            $data['users_list'] = $Dashboard_model->get_users_list($entity_class_id);
            $data['entity_class_name'] = "Assign Roles";
            $parent_menu = $Dashboard_model->get_parent_menus();
            $sub_menu = $Dashboard_model->get_sub_menus();
            $data['parent_menu'] = $parent_menu;
            $data['sub_menu'] = $sub_menu;

            $all_permissions = [];
            $add_per = 0;
            $edit_per = 0;
            $view_per = 0;
            $del_per = 0;
            $all_permissions = $Dashboard_model->get_all_permissions(4,$active_role);
            if(!empty($all_permissions)){
                foreach($all_permissions as $key => $val){
                    if($val['pro_permission_id'] == 1){
                        $add_per = 1;
                    }
                    if($val['pro_permission_id'] == 2){
                        $edit_per = 1;
                    }
                    if($val['pro_permission_id'] == 3){
                        $view_per = 1;
                    }
                    if($val['pro_permission_id'] == 5){
                        $del_per = 1;
                    }
                }
            }
            $data['add_per'] = $add_per;
            $data['edit_per'] = $edit_per;
            $data['view_per'] = $view_per;
            $data['del_per'] = $del_per;

            return view('dashboard/role_assign', $data);
        } else {
            return redirect()->to('Login');
        }
    }
    public function assign_menus()
    {
        if (!empty(session()->get('user_id'))) {

            $Dashboard_model = new Dashboard_m();
            $entity_id = session('user_id');
            $active_role = session('active_role');
            $all_systems = $Dashboard_model->get_all_systems($entity_id);
            $data['all_systems'] = $all_systems;
            $all_roles = $Dashboard_model->get_all_entity_roles($entity_id);
            if (!empty($all_roles)) {
                $data['all_roles_assn'] = $all_roles;
                $all_menus = $Dashboard_model->get_all_role_menus($active_role);
                if (!empty($all_menus)) {
                    $data['all_menus'] = $all_menus;
                } else {
                    $data['all_menus'] = [];
                }
                $all_permissions = $Dashboard_model->get_all_entity_permissions($active_role, 3);
                if (!empty($all_permissions)) {
                    $data['all_permissions'] = $all_permissions;
                } else {
                    $data['all_permissions'] = [];
                }
            } else {
                $data['all_roles_assn'] = [];
                $data['all_menus'] = [];
                $data['all_permissions'] = [];
            }
            $data['all_roles'] = $Dashboard_model->get_all_roles();
            $data['entity_class_name'] = "Assign Transactions to Roles";
            $parent_menu = $Dashboard_model->get_parent_menus();
            $sub_menu = $Dashboard_model->get_sub_menus();
            $data['parent_menu'] = $parent_menu;
            $data['sub_menu'] = $sub_menu;
            return view('dashboard/menu_assign', $data);
        } else {
            return redirect()->to('Login');
        }
    }
    public function add_entity($entity_class_id, $edit_id = null, $status = null)
    {
        if (!empty(session()->get('user_id'))) {

            $Dashboard_model = new Dashboard_m();
            $entity_id = session('user_id');
            $active_role = session('active_role');
            $all_systems = $Dashboard_model->get_all_systems($entity_id);
            $data['all_systems'] = $all_systems;
            $all_roles = $Dashboard_model->get_all_entity_roles($entity_id);
            if (!empty($all_roles)) {
                $data['all_roles_assn'] = $all_roles;
                $all_menus = $Dashboard_model->get_all_role_menus($active_role);
                if (!empty($all_menus)) {
                    $data['all_menus'] = $all_menus;
                } else {
                    $data['all_menus'] = [];
                }
                $all_permissions = $Dashboard_model->get_all_entity_permissions($active_role, 3);
                if (!empty($all_permissions)) {
                    $data['all_permissions'] = $all_permissions;
                } else {
                    $data['all_permissions'] = [];
                }
            } else {
                $data['all_roles_assn'] = [];
                $data['all_menus'] = [];
                $data['all_permissions'] = [];
            }
            $data['hotel_id'] = '';
            if ($edit_id && $status == null) {
                $current_roles = $Dashboard_model->get_all_entity_roles($edit_id);
                $entity_datas = $Dashboard_model->load_entity_datas($edit_id);
                $ent_name = $entity_datas[0]['entity_name'];
                $ent_loc = $entity_datas[0]['entity_location_id'];
                $ent_parent_id = $entity_datas[0]['entity_parent_id'];
                $ent_mobile = json_decode($entity_datas[0]['entity_mobile'], true);
                $ent_email = json_decode($entity_datas[0]['entity_email'], true);
                $ent_address = json_decode($entity_datas[0]['entity_address']);
                $attribute_datas = $Dashboard_model->load_attribute_datas($edit_id);
                $bool_attribute_datas = $Dashboard_model->load_bool_attribute_datas($edit_id);
                $login_details = $Dashboard_model->load_login_details($edit_id);
                if ($entity_class_id == 6) {
                    $hotel_attr = $Dashboard_model->get_hotel_id_byEntity($edit_id);
                    if (!empty($hotel_attr)) {
                        $data['hotel_id'] = $hotel_attr[0]['entity_attr_value'];
                    }
                }
            } else if ($edit_id && $status == 2) {
                if ($entity_class_id == 5 || $entity_class_id == 8 || $entity_class_id == 10) {
                    $current_roles = $Dashboard_model->get_all_entity_roles($edit_id);
                    //$entity_datas = $Dashboard_model->load_entity_datas($edit_id);
                    $entity_datas = $Dashboard_model->load_child_entity_datas($edit_id);
                    if (empty($entity_datas)) {
                        $entity_datas = $Dashboard_model->load_entity_datas($edit_id);
                        $ent_parent_id = $entity_datas[0]['entity_id'];
                        $ent_name = '';
                        $ent_loc = '';
                        //$ent_parent_id = '';
                        $ent_mobile = [];
                        $ent_email = [];
                        $ent_address = [];
                        $attribute_datas = [];
                        $bool_attribute_datas = [];
                        $login_details = [];
                        $current_roles = [];
                        $edit_id = 0;
                    } else {
                        $edit_id = $entity_datas[0]['entity_id'];
                        $ent_name = $entity_datas[0]['entity_name'];
                        $ent_loc = $entity_datas[0]['entity_location_id'];
                        $ent_parent_id = $entity_datas[0]['entity_parent_id'];
                        $ent_mobile = json_decode($entity_datas[0]['entity_mobile'], true);
                        $ent_email = json_decode($entity_datas[0]['entity_email'], true);
                        $ent_address = json_decode($entity_datas[0]['entity_address']);
                        $attribute_datas = $Dashboard_model->load_attribute_datas($edit_id);
                        $bool_attribute_datas = $Dashboard_model->load_bool_attribute_datas($edit_id);
                        $login_details = $Dashboard_model->load_login_details($edit_id);
                    }
                } else {
                    $ent_name = '';
                    $ent_loc = '';
                    $ent_parent_id = '';
                    $ent_mobile = [];
                    $ent_email = [];
                    $ent_address = [];
                    $attribute_datas = [];
                    $bool_attribute_datas = [];
                    $login_details = [];
                    $current_roles = [];
                }
            } else {
                $ent_name = '';
                $ent_loc = '';
                $ent_parent_id = '';
                $ent_mobile = [];
                $ent_email = [];
                $ent_address = [];
                $attribute_datas = [];
                $bool_attribute_datas = [];
                $login_details = [];
                $current_roles = [];
            }
            $all_locations = $Dashboard_model->get_all_locations();
            $state_locations = $Dashboard_model->indian_states();
            $cp_agents = $Dashboard_model->get_agents_for_contact_person();
            $cp_transporter = $Dashboard_model->get_transporter_for_contact_person();
            $cp_vendor = $Dashboard_model->get_vendor_for_contact_person();
            $hotel_list = $Dashboard_model->get_hotel_list(1);
            $vehicle_list = $Dashboard_model->get_vehicle_list(8);
            $enterprise_id = 1;
            $attributes = $Dashboard_model->get_all_attributes($entity_class_id);
            $boolean_attributes = $Dashboard_model->get_boolean_attributes($entity_class_id);
            $entity_class_det = $Dashboard_model->get_entity_class_details($entity_class_id);

            $entity_type_id = 1;
            if ($entity_class_id == 3) {
                $entity_type_id = 1;
            }
            $parent_menu = $Dashboard_model->get_parent_menus();
            $sub_menu = $Dashboard_model->get_sub_menus();
            $data['parent_menu'] = $parent_menu;
            $data['sub_menu'] = $sub_menu;
            $data['entity_class_id'] = $entity_class_id;
            $data['entity_type_id'] = $entity_type_id;
            if (!empty($entity_class_det)) {
                $data['entity_class_name'] = $entity_class_det[0]['entity_class_name'];
            } else {
                $data['entity_class_name'] = null;
            }
            $data['all_locations'] = $all_locations;
            $data['state_locations'] = $state_locations;
            $data['cp_agents'] = $cp_agents;
            $data['cp_transporter'] = $cp_transporter;
            $data['cp_vendor'] = $cp_vendor;
            $data['hotel_list'] = $hotel_list;
            $data['vehicle_list'] = $vehicle_list;
            $data['enterprise_id'] = $enterprise_id;
            $data['attributes'] = $attributes;
            $data['boolean_attributes'] = $boolean_attributes;
            $data['edit_id'] = $edit_id;
            $data['ent_name'] = $ent_name;

            $data['ent_parent_id'] = $ent_parent_id;
            $data['ent_loc'] = $ent_loc;
            $data['ent_mobile'] = $ent_mobile;
            $data['ent_email'] = $ent_email;
            $data['ent_address'] = $ent_address;
            $data['attribute_datas'] = $attribute_datas;
            $data['bool_attribute_datas'] = $bool_attribute_datas;
            $data['login_details'] = $login_details;
            $data['current_roles'] = $current_roles;
            $data['status'] = $status;

            return view('dashboard/add_entity', $data);
        } else {
            return redirect()->to('Login');
        }
    }
    public function view_entity($entity_class_id, $edit_id = null, $status = null)
    {
        if (!empty(session()->get('user_id'))) {

            $Dashboard_model = new Dashboard_m();
            $entity_id = session('user_id');
            $active_role = session('active_role');
            $all_systems = $Dashboard_model->get_all_systems($entity_id);
            $data['all_systems'] = $all_systems;
            $all_roles = $Dashboard_model->get_all_entity_roles($entity_id);
            if (!empty($all_roles)) {
                $data['all_roles_assn'] = $all_roles;
                $all_menus = $Dashboard_model->get_all_role_menus($active_role);
                if (!empty($all_menus)) {
                    $data['all_menus'] = $all_menus;
                } else {
                    $data['all_menus'] = [];
                }
                $all_permissions = $Dashboard_model->get_all_entity_permissions($active_role, 3);
                if (!empty($all_permissions)) {
                    $data['all_permissions'] = $all_permissions;
                } else {
                    $data['all_permissions'] = [];
                }
            } else {
                $data['all_roles_assn'] = [];
                $data['all_menus'] = [];
                $data['all_permissions'] = [];
            }
            $data['hotel_id'] = '';
            if ($edit_id && $status == null) {
                $current_roles = $Dashboard_model->get_all_entity_roles($edit_id);
                $entity_datas = $Dashboard_model->load_entity_datas($edit_id);
                $ent_name = $entity_datas[0]['entity_name'];
                $ent_loc = $entity_datas[0]['entity_location_id'];
                $ent_parent_id = $entity_datas[0]['entity_parent_id'];
                $ent_mobile = json_decode($entity_datas[0]['entity_mobile'], true);
                $ent_email = json_decode($entity_datas[0]['entity_email'], true);
                $ent_address = json_decode($entity_datas[0]['entity_address']);
                $attribute_datas = $Dashboard_model->load_attribute_datas($edit_id);
                $bool_attribute_datas = $Dashboard_model->load_bool_attribute_datas($edit_id);
                $login_details = $Dashboard_model->load_login_details($edit_id);
                if ($entity_class_id == 6) {
                    $hotel_attr = $Dashboard_model->get_hotel_id_byEntity($edit_id);
                    if (!empty($hotel_attr)) {
                        $data['hotel_id'] = $hotel_attr[0]['entity_attr_value'];
                    }
                }
            } else if ($edit_id && $status == 2) {
                if ($entity_class_id == 5 || $entity_class_id == 8 || $entity_class_id == 10) {
                    $current_roles = $Dashboard_model->get_all_entity_roles($edit_id);
                    //$entity_datas = $Dashboard_model->load_entity_datas($edit_id);
                    $entity_datas = $Dashboard_model->load_child_entity_datas($edit_id);
                    if (empty($entity_datas)) {
                        $entity_datas = $Dashboard_model->load_entity_datas($edit_id);
                        $ent_parent_id = $entity_datas[0]['entity_id'];
                        $ent_name = '';
                        $ent_loc = '';
                        //$ent_parent_id = '';
                        $ent_mobile = [];
                        $ent_email = [];
                        $ent_address = [];
                        $attribute_datas = [];
                        $bool_attribute_datas = [];
                        $login_details = [];
                        $current_roles = [];
                        $edit_id = 0;
                    } else {
                        $edit_id = $entity_datas[0]['entity_id'];
                        $ent_name = $entity_datas[0]['entity_name'];
                        $ent_loc = $entity_datas[0]['entity_location_id'];
                        $ent_parent_id = $entity_datas[0]['entity_parent_id'];
                        $ent_mobile = json_decode($entity_datas[0]['entity_mobile'], true);
                        $ent_email = json_decode($entity_datas[0]['entity_email'], true);
                        $ent_address = json_decode($entity_datas[0]['entity_address']);
                        $attribute_datas = $Dashboard_model->load_attribute_datas($edit_id);
                        $bool_attribute_datas = $Dashboard_model->load_bool_attribute_datas($edit_id);
                        $login_details = $Dashboard_model->load_login_details($edit_id);
                    }
                } else {
                    $ent_name = '';
                    $ent_loc = '';
                    $ent_parent_id = '';
                    $ent_mobile = [];
                    $ent_email = [];
                    $ent_address = [];
                    $attribute_datas = [];
                    $bool_attribute_datas = [];
                    $login_details = [];
                    $current_roles = [];
                }
            } else {
                $ent_name = '';
                $ent_loc = '';
                $ent_parent_id = '';
                $ent_mobile = [];
                $ent_email = [];
                $ent_address = [];
                $attribute_datas = [];
                $bool_attribute_datas = [];
                $login_details = [];
                $current_roles = [];
            }
            $all_locations = $Dashboard_model->get_all_locations();
            $cp_agents = $Dashboard_model->get_agents_for_contact_person();
            $cp_transporter = $Dashboard_model->get_transporter_for_contact_person();
            $cp_vendor = $Dashboard_model->get_vendor_for_contact_person();
            $hotel_list = $Dashboard_model->get_hotel_list(1);
            $vehicle_list = $Dashboard_model->get_vehicle_list(8);
            $enterprise_id = 1;
            $attributes = $Dashboard_model->get_all_attributes($entity_class_id);
            $boolean_attributes = $Dashboard_model->get_boolean_attributes($entity_class_id);
            $entity_class_det = $Dashboard_model->get_entity_class_details($entity_class_id);

            $entity_type_id = 1;
            if ($entity_class_id == 3) {
                $entity_type_id = 1;
            }
            $parent_menu = $Dashboard_model->get_parent_menus();
            $sub_menu = $Dashboard_model->get_sub_menus();
            $data['parent_menu'] = $parent_menu;
            $data['sub_menu'] = $sub_menu;
            $data['entity_class_id'] = $entity_class_id;
            $data['entity_type_id'] = $entity_type_id;
            if (!empty($entity_class_det)) {
                $data['entity_class_name'] = $entity_class_det[0]['entity_class_name'];
            } else {
                $data['entity_class_name'] = null;
            }
            $data['all_locations'] = $all_locations;
            $data['cp_agents'] = $cp_agents;
            $data['cp_transporter'] = $cp_transporter;
            $data['cp_vendor'] = $cp_vendor;
            $data['hotel_list'] = $hotel_list;
            $data['vehicle_list'] = $vehicle_list;
            $data['enterprise_id'] = $enterprise_id;
            $data['attributes'] = $attributes;
            $data['boolean_attributes'] = $boolean_attributes;
            $data['edit_id'] = $edit_id;
            $data['ent_name'] = $ent_name;

            $data['ent_parent_id'] = $ent_parent_id;
            $data['ent_loc'] = $ent_loc;
            $data['ent_mobile'] = $ent_mobile;
            $data['ent_email'] = $ent_email;
            $data['ent_address'] = $ent_address;
            $data['attribute_datas'] = $attribute_datas;
            $data['bool_attribute_datas'] = $bool_attribute_datas;
            $data['login_details'] = $login_details;
            $data['current_roles'] = $current_roles;
            $data['status'] = $status;

            return view('dashboard/view_entity', $data);
        } else {
            return redirect()->to('Login');
        }
    }
    public function add_object($object_class_id, $edit_id = null)
    {
        if (!empty(session()->get('user_id'))) {

            $Dashboard_model = new Dashboard_m();
            $entity_id = session('user_id');
            $active_role = session('active_role');
            $all_systems = $Dashboard_model->get_all_systems($entity_id);
            $data['all_systems'] = $all_systems;
            $all_roles = $Dashboard_model->get_all_entity_roles($entity_id);
            if (!empty($all_roles)) {
                $data['all_roles_assn'] = $all_roles;
                $all_menus = $Dashboard_model->get_all_role_menus($active_role);
                if (!empty($all_menus)) {
                    $data['all_menus'] = $all_menus;
                } else {
                    $data['all_menus'] = [];
                }
                $all_permissions = $Dashboard_model->get_all_entity_permissions($active_role, 3);
                if (!empty($all_permissions)) {
                    $data['all_permissions'] = $all_permissions;
                } else {
                    $data['all_permissions'] = [];
                }
            } else {
                $data['all_roles_assn'] = [];
                $data['all_menus'] = [];
                $data['all_permissions'] = [];
            }
            if ($edit_id) {
                $object_datas = $Dashboard_model->load_object_datas($edit_id);
                if($object_class_id == 1){
                    $object_hotel_datas = $Dashboard_model->load_object_hotel_datas($edit_id);
                    if(!empty($object_hotel_datas)){
                        $hotel_rr = $object_hotel_datas[0]['hotel_rr'];
                    }
                    else{
                        $hotel_rr = 0;
                    }
                }
                else{
                    $hotel_rr = 0;
                }
                $ent_name = $object_datas[0]['object_name'];
                $ent_loc = $object_datas[0]['object_location_id'];
                $ent_mobile = json_decode($object_datas[0]['object_ph_no'], true);
                $ent_email = json_decode($object_datas[0]['object_email'], true);
                $ent_address = json_decode($object_datas[0]['object_address'], true);
                $attribute_datas = $Dashboard_model->load_obj_attribute_datas($edit_id);
                $bool_attribute_datas = $Dashboard_model->load_obj_bool_attribute_datas($edit_id);
            } else {
                $ent_name = '';
                $ent_loc = '';
                $ent_mobile = [];
                $ent_email = [];
                $ent_address = [];
                $attribute_datas = [];
                $bool_attribute_datas = [];
                $hotel_rr = 0;
            }
            $all_locations = $Dashboard_model->get_all_locations();
            $all_locations2 = $Dashboard_model->get_state_locations();
            $hotel_categories = $Dashboard_model->get_hotel_categories();
            $hotel_agencies = $Dashboard_model->get_hotel_agencies();
            $enterprise_id = 1;
            $attributes = $Dashboard_model->get_all_obj_attributes($object_class_id);
            $boolean_attributes = $Dashboard_model->get_obj_boolean_attributes($object_class_id);
            $object_class_det = $Dashboard_model->get_object_class_details($object_class_id);

            $object_type_id = 1;

            $parent_menu = $Dashboard_model->get_parent_menus();
            $sub_menu = $Dashboard_model->get_sub_menus();
            $data['parent_menu'] = $parent_menu;
            $data['sub_menu'] = $sub_menu;
            $data['object_class_id'] = $object_class_id;
            $data['object_type_id'] = $object_type_id;
            if (!empty($object_class_det)) {
                $data['object_class_name'] = $object_class_det[0]['object_class_name'];
            } else {
                $data['object_class_name'] = null;
            }
            $data['all_locations'] = $all_locations;
            $data['all_locations2'] = $all_locations2;
            $data['enterprise_id'] = $enterprise_id;
            $data['attributes'] = $attributes;
            $data['boolean_attributes'] = $boolean_attributes;
            $data['edit_id'] = $edit_id;
            $data['ent_name'] = $ent_name;

            $data['ent_loc'] = $ent_loc;
            $data['ent_mobile'] = $ent_mobile;
            $data['ent_email'] = $ent_email;
            $data['ent_address'] = $ent_address;
            $data['attribute_datas'] = $attribute_datas;
            $data['bool_attribute_datas'] = $bool_attribute_datas;
            $data['hotel_categories'] = $hotel_categories;
            $data['hotel_agencies'] = $hotel_agencies;
            $data['hotel_rr'] = $hotel_rr;
            return view('dashboard/add_object', $data);
        } else {
            return redirect()->to('Login');
        }
    }

    public function add_object_vehicle($object_class_id, $edit_id = null)
    {
        if (!empty(session()->get('user_id'))) {

            $Dashboard_model = new Dashboard_m();
            $entity_id = session('user_id');
            $active_role = session('active_role');
            $all_systems = $Dashboard_model->get_all_systems($entity_id);
            $data['all_systems'] = $all_systems;
            $all_roles = $Dashboard_model->get_all_entity_roles($entity_id);
            if (!empty($all_roles)) {
                $data['all_roles_assn'] = $all_roles;
                $all_menus = $Dashboard_model->get_all_role_menus($active_role);
                if (!empty($all_menus)) {
                    $data['all_menus'] = $all_menus;
                } else {
                    $data['all_menus'] = [];
                }
                $all_permissions = $Dashboard_model->get_all_entity_permissions($active_role, 3);
                if (!empty($all_permissions)) {
                    $data['all_permissions'] = $all_permissions;
                } else {
                    $data['all_permissions'] = [];
                }
            } else {
                $data['all_roles_assn'] = [];
                $data['all_menus'] = [];
                $data['all_permissions'] = [];
            }
            if ($edit_id) {
                $object_datas = $Dashboard_model->load_object_veh_datas($edit_id);
                $obj_name = $object_datas[0]['object_name'];
                $obj_loc = $object_datas[0]['object_location_id'];
                $obj_mobile = json_decode($object_datas[0]['object_ph_no'], true);
                $obj_email = json_decode($object_datas[0]['object_email'], true);
                $obj_address = json_decode($object_datas[0]['object_address'], true);

                $hub_exist = $object_datas[0]['hub_location_id'];
                $mod_exist = $object_datas[0]['vehicle_model_id'];
                $seat_exist = $object_datas[0]['vehicle_seat_capacity'];

                $tour_travel_daily_rate_exist = $object_datas[0]['tour_travel_daily_rate'];
                $tour_travel_max_km_exist = $object_datas[0]['tour_travel_max_km'];
                $extra_km_rate_exist = $object_datas[0]['extra_km_rate'];

                $local_travel_daily_rate_exist = $object_datas[0]['local_travel_daily_rate'];
                $local_travel_max_km_exist = $object_datas[0]['local_travel_max_km'];
                $registration_no_exist = $object_datas[0]['registration_no'];

                $is_tour_travel_exist = $object_datas[0]['is_tour_travel'];
                $is_local_travel_exist = $object_datas[0]['is_local_travel'];
                $is_active_exist = $object_datas[0]['is_active'];
                $object_transport_name = $object_datas[0]['object_transport_name'];
            } else {
                $object_transport_name = '';
                $tour_travel_daily_rate_exist = '';
                $tour_travel_max_km_exist = '';
                $extra_km_rate_exist = '';

                $local_travel_daily_rate_exist = '';
                $local_travel_max_km_exist = '';
                $registration_no_exist = '';

                $is_tour_travel_exist = 1;
                $is_local_travel_exist = 1;
                $is_active_exist = 1;

                $hub_exist = '';
                $mod_exist = '';
                $seat_exist = '';
                $obj_name = '';
                $obj_loc = '';
                $obj_mobile = [];
                $obj_email = [];
                $obj_address = [];
            }
            $all_locations = $Dashboard_model->get_all_locations();
            $all_transporter = $Dashboard_model->get_all_transporter();
            $hub_locations = $Dashboard_model->get_hub_locations();
            $veh_models = $Dashboard_model->get_veh_models();
            $veh_seats = $Dashboard_model->get_veh_seats();

            $enterprise_id = 1;
            $attributes = $Dashboard_model->get_all_obj_attributes($object_class_id);
            $boolean_attributes = $Dashboard_model->get_obj_boolean_attributes($object_class_id);
            $object_class_det = $Dashboard_model->get_object_class_details($object_class_id);

            $object_type_id = 1;

            $parent_menu = $Dashboard_model->get_parent_menus();
            $sub_menu = $Dashboard_model->get_sub_menus();
            $data['parent_menu'] = $parent_menu;
            $data['sub_menu'] = $sub_menu;
            $data['object_class_id'] = $object_class_id;
            $data['object_type_id'] = $object_type_id;
            if (!empty($object_class_det)) {
                $data['object_class_name'] = $object_class_det[0]['object_class_name'];
            } else {
                $data['object_class_name'] = null;
            }
            $data['all_locations'] = $all_locations;
            $data['all_transporter'] = $all_transporter;
            $data['hub_locations'] = $hub_locations;
            $data['veh_models'] = $veh_models;
            $data['veh_seats'] = $veh_seats;

            $data['enterprise_id'] = $enterprise_id;

            $data['edit_id'] = $edit_id;
            $data['obj_name'] = $obj_name;

            $data['obj_loc'] = $obj_loc;

            $data['hub_exist'] = $hub_exist;
            $data['mod_exist'] = $mod_exist;
            $data['seat_exist'] = $seat_exist;

            $data['tour_travel_daily_rate_exist'] = $tour_travel_daily_rate_exist;
            $data['tour_travel_max_km_exist'] = $tour_travel_max_km_exist;
            $data['extra_km_rate_exist'] = $extra_km_rate_exist;
            $data['local_travel_daily_rate_exist'] = $local_travel_daily_rate_exist;
            $data['local_travel_max_km_exist'] = $local_travel_max_km_exist;
            $data['registration_no_exist'] = $registration_no_exist;
            $data['is_tour_travel_exist'] = $is_tour_travel_exist;
            $data['is_local_travel_exist'] = $is_local_travel_exist;
            $data['is_active_exist'] = $is_active_exist;

            $data['obj_mobile'] = $obj_mobile;
            $data['obj_email'] = $obj_email;
            $data['obj_address'] = $obj_address;
            $data['object_transport_name'] = $object_transport_name;

            return view('dashboard/add_object_vehicle', $data);
        } else {
            return redirect()->to('Login');
        }
    }

    public function add_object_ss($object_class_id, $edit_id = null)
    {
        if (!empty(session()->get('user_id'))) {

            $Dashboard_model = new Dashboard_m();
            $entity_id = session('user_id');
            $active_role = session('active_role');
            $all_systems = $Dashboard_model->get_all_systems($entity_id);
            $data['all_systems'] = $all_systems;
            $all_roles = $Dashboard_model->get_all_entity_roles($entity_id);
            if (!empty($all_roles)) {
                $data['all_roles_assn'] = $all_roles;
                $all_menus = $Dashboard_model->get_all_role_menus($active_role);
                if (!empty($all_menus)) {
                    $data['all_menus'] = $all_menus;
                } else {
                    $data['all_menus'] = [];
                }
                $all_permissions = $Dashboard_model->get_all_entity_permissions($active_role, 3);
                if (!empty($all_permissions)) {
                    $data['all_permissions'] = $all_permissions;
                } else {
                    $data['all_permissions'] = [];
                }
            } else {
                $data['all_roles_assn'] = [];
                $data['all_menus'] = [];
                $data['all_permissions'] = [];
            }
            if ($edit_id) {
                $object_datas = $Dashboard_model->load_object_ss_datas($edit_id);
                $obj_name = $object_datas[0]['object_name'];
                $obj_loc = $object_datas[0]['object_location_id'];
                $obj_mobile = json_decode($object_datas[0]['object_ph_no'], true);
                $obj_email = json_decode($object_datas[0]['object_email'], true);
                $obj_address = json_decode($object_datas[0]['object_address'], true);

                $sightseeing_description_exist = $object_datas[0]['sightseeing_description'];
                $sightseeing_distance_exist = $object_datas[0]['sightseeing_distance'];
                $vendor_id_exist = $object_datas[0]['vendor_id'];
                $is_pax_exist = $object_datas[0]['is_pax'];
            } else {
                $is_pax_exist = '';
                $vendor_id_exist = '';
                $sightseeing_description_exist = '';
                $sightseeing_distance_exist = '';
                $obj_name = '';
                $obj_loc = '';
                $obj_mobile = [];
                $obj_email = [];
                $obj_address = [];
            }
            $all_locations = $Dashboard_model->get_all_locations();
            $all_vendor = $Dashboard_model->get_all_vendor();

            $enterprise_id = 1;

            $object_class_det = $Dashboard_model->get_object_class_details($object_class_id);

            $object_type_id = 1;

            $parent_menu = $Dashboard_model->get_parent_menus();
            $sub_menu = $Dashboard_model->get_sub_menus();
            $data['parent_menu'] = $parent_menu;
            $data['sub_menu'] = $sub_menu;
            $data['object_class_id'] = $object_class_id;
            $data['object_type_id'] = $object_type_id;
            if (!empty($object_class_det)) {
                $data['object_class_name'] = $object_class_det[0]['object_class_name'];
            } else {
                $data['object_class_name'] = null;
            }
            $data['all_locations'] = $all_locations;
            $data['all_vendor'] = $all_vendor;

            $data['enterprise_id'] = $enterprise_id;

            $data['edit_id'] = $edit_id;
            $data['obj_name'] = $obj_name;

            $data['obj_loc'] = $obj_loc;
            $data['is_pax_exist'] = $is_pax_exist;

            $data['sightseeing_description_exist'] = $sightseeing_description_exist;
            $data['sightseeing_distance_exist'] = $sightseeing_distance_exist;

            $data['vendor_id_exist'] = $vendor_id_exist;
            $data['obj_mobile'] = $obj_mobile;
            $data['obj_email'] = $obj_email;
            $data['obj_address'] = $obj_address;

            return view('dashboard/add_object_ss', $data);
        } else {
            return redirect()->to('Login');
        }
    }

    public function saveEntity()
    {
        $flag = 0;
        $b_attribute = $this->request->getPost('dynamicCheckbox');
        if (!empty($b_attribute)) {
            foreach ($b_attribute as $bitems => $bvals) {
                if ($bvals == 3 || $bvals == 4) {
                    $flag = 1;
                }
            }
        }
        $cl_id = $this->request->getPost('entity_class_id');
        if ($cl_id == 3 && $flag == 0) {
            session()->setFlashdata('error', 'Please check atleast one system (B2B/B2C)');
            return redirect()->to('Dashboard/add_entity/3');
        } else {
            if (!empty(session()->get('user_id'))) {

                $Dashboard_model = new Dashboard_m();
                $entity_edit_id = $this->request->getPost('entity_edit_id');
                if ($entity_edit_id > 0) {
                    $bURL = config('App')->baseURL;
                    $class_id = $this->request->getPost('entity_class_id');

                    $baseURL = ($bURL === '') ? $bURL : rtrim($bURL, '/ ') . '/';
                    $addmore = $this->request->getPost('addmore');
                    $entity_mobile = [];
                    $entity_email = [];
                    $entity_address = [];
                    if (!empty($addmore)) {
                        foreach ($addmore as $key => $item) {
                            if (isset($item['entity_mobile'])) {
                                $entity_mobile[] = $item['entity_mobile'];
                            }
                            if (isset($item['entity_email'])) {
                                $entity_email[] = $item['entity_email'];
                            }
                            if (isset($item['entity_address'])) {
                                $entity_address[] = $item['entity_address'];
                            }
                        }
                    }

                    $attribute = $this->request->getPost('attribute');
                    //$b_attribute = $this->request->getPost('dynamicCheckbox');
                    $login_username = $this->request->getPost('login_username');
                    $login_password = $this->request->getPost('login_password');
                    $entity_parent_id = $this->request->getPost('entity_parent_id');
                    $datas = array(
                        'entity_parent_id' => $this->request->getPost('entity_parent_id'),
                        'entity_name' => $this->request->getPost('entity_name'),
                        'entity_location_id' => $this->request->getPost('entity_location'),
                        'entity_class_id' => $this->request->getPost('entity_class_id'),
                        'entity_type_id' => $this->request->getPost('entity_type_id'),
                        'enterprise_id' => $this->request->getPost('enterprise_id'),
                        'entity_mobile' => json_encode($entity_mobile),
                        'entity_email' => json_encode($entity_email),
                        'entity_address' => json_encode($entity_address)
                    );
                    $update_id1 = $Dashboard_model->update_entity($datas, $entity_edit_id);
                    if ($class_id == 4) {
                        $sURL = site_url('Dashboard/add_entity/5/' . $entity_edit_id . '/2');
                    } else if ($class_id == 7) {
                        $sURL = site_url('Dashboard/add_entity/8/' . $entity_edit_id . '/2');
                    } else if ($class_id == 9) {
                        $sURL = site_url('Dashboard/add_entity/10/' . $entity_edit_id . '/2');
                    } else {
                        $sURL = site_url('Dashboard/view_users/' . $class_id);
                    }
                    if (!empty($attribute)) {
                        $attr_delete_id = $Dashboard_model->delete_existing_attributes($entity_edit_id);
                        if ($attr_delete_id) {
                            foreach ($attribute as $items) {
                                foreach ($items as $keys => $vals) {
                                    $attr_datas = array(
                                        'entity_class_attr_id' => $keys,
                                        'entity_id' => $entity_edit_id,
                                        'entity_attr_value' => $vals,
                                        'enterprise_id' => $this->request->getPost('enterprise_id')
                                    );
                                    $attr_insert = $Dashboard_model->insert_attributes($attr_datas);
                                }
                            }
                        }
                    }

                    if (!empty($b_attribute)) {
                        $bool_delete_id = $Dashboard_model->delete_existing_bool_attributes($entity_edit_id);
                        foreach ($b_attribute as $bitems => $bvals) {
                            if ($bvals == 1) {
                                $uexist = $Dashboard_model->check_username_exist($entity_edit_id);
                                if ($uexist > 0) {
                                    if ($login_password == null) {
                                        $login_datas = array(
                                            'user_id' => $login_username
                                        );
                                        $update_id2 = $Dashboard_model->update_login_details($login_datas, $entity_edit_id);
                                    } else {
                                        $login_datas = array(
                                            'user_id' => $login_username,
                                            'password' => md5($login_password),
                                        );
                                        $update_id2 = $Dashboard_model->update_login_details($login_datas, $entity_edit_id);
                                    }
                                } else {
                                    $login_datas = array(
                                        'entity_id' => $entity_edit_id,
                                        'user_id' => $login_username,
                                        'password' => md5($login_password),
                                        'active_status' => 1,
                                        'enterprise_id' => $this->request->getPost('enterprise_id')
                                    );
                                    $login_insert = $Dashboard_model->insert_login_details($login_datas);
                                }
                            }

                            $battr_datas = array(
                                'entity_id' => $entity_edit_id,
                                'boolean_id' => $bvals,
                                'boolean_value' => 1,
                                'enterprise_id' => $this->request->getPost('enterprise_id')
                            );
                            $battr_insert = $Dashboard_model->insert_boolean_attributes($battr_datas);
                        }
                    }
                    if ($update_id1) {
                        return redirect()->to($sURL);
                    } else {
                        return redirect()->to($sURL);
                    }
                } else {
                    $bURL = config('App')->baseURL;
                    $class_id = $this->request->getPost('entity_class_id');
                    //$sURL = site_url('Dashboard/view_users/'.$class_id);
                    $baseURL = ($bURL === '') ? $bURL : rtrim($bURL, '/ ') . '/';
                    $addmore = $this->request->getPost('addmore');
                    $entity_mobile = [];
                    $entity_email = [];
                    $entity_address = [];
                    if (!empty($addmore)) {
                        foreach ($addmore as $key => $item) {
                            if (isset($item['entity_mobile'])) {
                                $entity_mobile[] = $item['entity_mobile'];
                            }
                            if (isset($item['entity_email'])) {
                                $entity_email[] = $item['entity_email'];
                            }
                            if (isset($item['entity_address'])) {
                                $entity_address[] = $item['entity_address'];
                            }
                        }
                    }

                    $attribute = $this->request->getPost('attribute');
                    $b_attribute = $this->request->getPost('dynamicCheckbox');
                    $login_username = $this->request->getPost('login_username');
                    $login_password = $this->request->getPost('login_password');
                    $entity_parent_id = $this->request->getPost('entity_parent_id');
                    $datas = array(
                        'entity_parent_id' => $this->request->getPost('entity_parent_id'),
                        'entity_name' => $this->request->getPost('entity_name'),
                        'entity_location_id' => $this->request->getPost('entity_location'),
                        'entity_class_id' => $this->request->getPost('entity_class_id'),
                        'entity_type_id' => $this->request->getPost('entity_type_id'),
                        'enterprise_id' => $this->request->getPost('enterprise_id'),
                        'entity_mobile' => json_encode($entity_mobile),
                        'entity_email' => json_encode($entity_email),
                        'entity_address' => json_encode($entity_address)
                    );

                    $entity_id = $Dashboard_model->insert_entity($datas);

                    if ($class_id == 4) {
                        $sURL = site_url('Dashboard/add_entity/5/' . $entity_id . '/1');
                    } else if ($class_id == 7) {
                        $sURL = site_url('Dashboard/add_entity/8/' . $entity_id . '/1');
                    } else if ($class_id == 9) {
                        $sURL = site_url('Dashboard/add_entity/10/' . $entity_id . '/1');
                    } else {
                        $sURL = site_url('Dashboard/view_users/' . $class_id);
                    }

                    if (!empty($attribute)) {
                        foreach ($attribute as $items) {
                            foreach ($items as $keys => $vals) {
                                $attr_datas = array(
                                    'entity_class_attr_id' => $keys,
                                    'entity_id' => $entity_id,
                                    'entity_attr_value' => $vals,
                                    'enterprise_id' => $this->request->getPost('enterprise_id')
                                );
                                $attr_insert = $Dashboard_model->insert_attributes($attr_datas);
                            }
                        }
                    }

                    if (!empty($b_attribute)) {

                        foreach ($b_attribute as $bitems => $bvals) {


                            if ($bvals == 1) {
                                $login_datas = array(
                                    'entity_id' => $entity_id,
                                    'user_id' => $login_username,
                                    'password' => md5($login_password),
                                    'active_status' => 1,
                                    'enterprise_id' => $this->request->getPost('enterprise_id')
                                );
                                $login_insert = $Dashboard_model->insert_login_details($login_datas);
                            }
                            $battr_datas = array(
                                'entity_id' => $entity_id,
                                'boolean_id' => $bvals,
                                'boolean_value' => 1,
                                'enterprise_id' => $this->request->getPost('enterprise_id')
                            );
                            $battr_insert = $Dashboard_model->insert_boolean_attributes($battr_datas);
                        }
                    }
                    if ($entity_id) {
                        return redirect()->to($sURL);
                    } else {
                        return redirect()->to($sURL);
                    }
                }
            } else {
                return redirect()->to('Login');
            }
        }
    }

    public function viewsaveEntity()
    {
        if (!empty(session()->get('user_id'))) {

            $Dashboard_model = new Dashboard_m();
            $entity_edit_id = $this->request->getPost('entity_edit_id');
            if ($entity_edit_id > 0) {
                $bURL = config('App')->baseURL;
                $class_id = $this->request->getPost('entity_class_id');

                $baseURL = ($bURL === '') ? $bURL : rtrim($bURL, '/ ') . '/';
                $addmore = $this->request->getPost('addmore');
                $entity_mobile = [];
                $entity_email = [];
                $entity_address = [];
                if (!empty($addmore)) {
                    foreach ($addmore as $key => $item) {
                        if (isset($item['entity_mobile'])) {
                            $entity_mobile[] = $item['entity_mobile'];
                        }
                        if (isset($item['entity_email'])) {
                            $entity_email[] = $item['entity_email'];
                        }
                        if (isset($item['entity_address'])) {
                            $entity_address[] = $item['entity_address'];
                        }
                    }
                }

                $attribute = $this->request->getPost('attribute');
                $b_attribute = $this->request->getPost('dynamicCheckbox');
                $login_username = $this->request->getPost('login_username');
                $login_password = $this->request->getPost('login_password');
                $entity_parent_id = $this->request->getPost('entity_parent_id');
                $datas = array(
                    'entity_parent_id' => $this->request->getPost('entity_parent_id'),
                    'entity_name' => $this->request->getPost('entity_name'),
                    'entity_location_id' => $this->request->getPost('entity_location'),
                    'entity_class_id' => $this->request->getPost('entity_class_id'),
                    'entity_type_id' => $this->request->getPost('entity_type_id'),
                    'enterprise_id' => $this->request->getPost('enterprise_id'),
                    'entity_mobile' => json_encode($entity_mobile),
                    'entity_email' => json_encode($entity_email),
                    'entity_address' => json_encode($entity_address)
                );
                $update_id1 = $Dashboard_model->update_entity($datas, $entity_edit_id);
                if ($class_id == 4) {
                    $sURL = site_url('Dashboard/view_entity/5/' . $entity_edit_id . '/2');
                } else if ($class_id == 7) {
                    $sURL = site_url('Dashboard/view_entity/8/' . $entity_edit_id . '/2');
                } else if ($class_id == 9) {
                    $sURL = site_url('Dashboard/view_entity/10/' . $entity_edit_id . '/2');
                } else {
                    $sURL = site_url('Dashboard/view_users/' . $class_id);
                }
                if (!empty($attribute)) {
                    $attr_delete_id = $Dashboard_model->delete_existing_attributes($entity_edit_id);
                    if ($attr_delete_id) {
                        foreach ($attribute as $items) {
                            foreach ($items as $keys => $vals) {
                                $attr_datas = array(
                                    'entity_class_attr_id' => $keys,
                                    'entity_id' => $entity_edit_id,
                                    'entity_attr_value' => $vals,
                                    'enterprise_id' => $this->request->getPost('enterprise_id')
                                );
                                $attr_insert = $Dashboard_model->insert_attributes($attr_datas);
                            }
                        }
                    }
                }

                if (!empty($b_attribute)) {
                    $bool_delete_id = $Dashboard_model->delete_existing_bool_attributes($entity_edit_id);
                    foreach ($b_attribute as $bitems => $bvals) {
                        if ($bvals == 1) {
                            $uexist = $Dashboard_model->check_username_exist($entity_edit_id);
                            if ($uexist > 0) {
                                if ($login_password == null) {
                                    $login_datas = array(
                                        'user_id' => $login_username
                                    );
                                    $update_id2 = $Dashboard_model->update_login_details($login_datas, $entity_edit_id);
                                } else {
                                    $login_datas = array(
                                        'user_id' => $login_username,
                                        'password' => md5($login_password),
                                    );
                                    $update_id2 = $Dashboard_model->update_login_details($login_datas, $entity_edit_id);
                                }
                            } else {
                                $login_datas = array(
                                    'entity_id' => $entity_edit_id,
                                    'user_id' => $login_username,
                                    'password' => md5($login_password),
                                    'active_status' => 1,
                                    'enterprise_id' => $this->request->getPost('enterprise_id')
                                );
                                $login_insert = $Dashboard_model->insert_login_details($login_datas);
                            }
                        }

                        $battr_datas = array(
                            'entity_id' => $entity_edit_id,
                            'boolean_id' => $bvals,
                            'boolean_value' => 1,
                            'enterprise_id' => $this->request->getPost('enterprise_id')
                        );
                        $battr_insert = $Dashboard_model->insert_boolean_attributes($battr_datas);
                    }
                }
                if ($update_id1) {
                    return redirect()->to($sURL);
                } else {
                    return redirect()->to($sURL);
                }
            } else {
                $bURL = config('App')->baseURL;
                $class_id = $this->request->getPost('entity_class_id');
                //$sURL = site_url('Dashboard/view_users/'.$class_id);
                $baseURL = ($bURL === '') ? $bURL : rtrim($bURL, '/ ') . '/';
                $addmore = $this->request->getPost('addmore');
                $entity_mobile = [];
                $entity_email = [];
                $entity_address = [];
                if (!empty($addmore)) {
                    foreach ($addmore as $key => $item) {
                        if (isset($item['entity_mobile'])) {
                            $entity_mobile[] = $item['entity_mobile'];
                        }
                        if (isset($item['entity_email'])) {
                            $entity_email[] = $item['entity_email'];
                        }
                        if (isset($item['entity_address'])) {
                            $entity_address[] = $item['entity_address'];
                        }
                    }
                }

                $attribute = $this->request->getPost('attribute');
                $b_attribute = $this->request->getPost('dynamicCheckbox');
                $login_username = $this->request->getPost('login_username');
                $login_password = $this->request->getPost('login_password');
                $entity_parent_id = $this->request->getPost('entity_parent_id');
                $datas = array(
                    'entity_parent_id' => $this->request->getPost('entity_parent_id'),
                    'entity_name' => $this->request->getPost('entity_name'),
                    'entity_location_id' => $this->request->getPost('entity_location'),
                    'entity_class_id' => $this->request->getPost('entity_class_id'),
                    'entity_type_id' => $this->request->getPost('entity_type_id'),
                    'enterprise_id' => $this->request->getPost('enterprise_id'),
                    'entity_mobile' => json_encode($entity_mobile),
                    'entity_email' => json_encode($entity_email),
                    'entity_address' => json_encode($entity_address)
                );

                $entity_id = $Dashboard_model->insert_entity($datas);

                if ($class_id == 4) {
                    $sURL = site_url('Dashboard/view_entity/5/' . $entity_id . '/1');
                } else if ($class_id == 7) {
                    $sURL = site_url('Dashboard/view_entity/8/' . $entity_id . '/1');
                } else if ($class_id == 9) {
                    $sURL = site_url('Dashboard/view_entity/10/' . $entity_id . '/1');
                } else {
                    $sURL = site_url('Dashboard/view_users/' . $class_id);
                }

                if (!empty($attribute)) {
                    foreach ($attribute as $items) {
                        foreach ($items as $keys => $vals) {
                            $attr_datas = array(
                                'entity_class_attr_id' => $keys,
                                'entity_id' => $entity_id,
                                'entity_attr_value' => $vals,
                                'enterprise_id' => $this->request->getPost('enterprise_id')
                            );
                            $attr_insert = $Dashboard_model->insert_attributes($attr_datas);
                        }
                    }
                }

                if (!empty($b_attribute)) {

                    foreach ($b_attribute as $bitems => $bvals) {


                        if ($bvals == 1) {
                            $login_datas = array(
                                'entity_id' => $entity_id,
                                'user_id' => $login_username,
                                'password' => md5($login_password),
                                'active_status' => 1,
                                'enterprise_id' => $this->request->getPost('enterprise_id')
                            );
                            $login_insert = $Dashboard_model->insert_login_details($login_datas);
                        }
                        $battr_datas = array(
                            'entity_id' => $entity_id,
                            'boolean_id' => $bvals,
                            'boolean_value' => 1,
                            'enterprise_id' => $this->request->getPost('enterprise_id')
                        );
                        $battr_insert = $Dashboard_model->insert_boolean_attributes($battr_datas);
                    }
                }
                if ($entity_id) {
                    return redirect()->to($sURL);
                } else {
                    return redirect()->to($sURL);
                }
            }
        } else {
            return redirect()->to('Login');
        }
    }

    public function saveObject()
    {
        if (!empty(session()->get('user_id'))) {

            $Dashboard_model = new Dashboard_m();
            $object_edit_id = $this->request->getPost('object_edit_id');
            if ($object_edit_id > 0) {
                $bURL = config('App')->baseURL;
                $class_id = $this->request->getPost('object_class_id');
                $sURL = site_url('Dashboard/view_hotels/' . $class_id);
                $baseURL = ($bURL === '') ? $bURL : rtrim($bURL, '/ ') . '/';
                $addmore = $this->request->getPost('addmore');
                $object_mobile = [];
                $object_email = [];
                $object_address = [];
                if (!empty($addmore)) {
                    foreach ($addmore as $key => $item) {
                        if (isset($item['object_mobile'])) {
                            $object_mobile[] = $item['object_mobile'];
                        }
                        if (isset($item['object_email'])) {
                            $object_email[] = $item['object_email'];
                        }
                        if (isset($item['object_address'])) {
                            $object_address[] = $item['object_address'];
                        }
                    }
                }

                $attribute = $this->request->getPost('attribute');
                $b_attribute = $this->request->getPost('dynamicCheckbox');

                $datas = array(
                    'object_name' => $this->request->getPost('object_name'),
                    'object_location_id' => $this->request->getPost('object_location'),
                    'object_class_id' => $this->request->getPost('object_class_id'),
                    'object_type_id' => $this->request->getPost('object_type_id'),
                    'enterprise_id' => $this->request->getPost('enterprise_id'),
                    'object_ph_no' => json_encode($object_mobile),
                    'object_email' => json_encode($object_email),
                    'object_address' => json_encode($object_address)
                );
                $update_id1 = $Dashboard_model->update_object($datas, $object_edit_id);
                if (!empty($attribute)) {
                    $attr_delete_id = $Dashboard_model->delete_existing_obj_attributes($object_edit_id);
                    if ($attr_delete_id) {
                        foreach ($attribute as $items) {
                            foreach ($items as $keys => $vals) {
                                $attr_datas = array(
                                    'object_id' => $object_edit_id,
                                    'object_class_attribute_id' => $keys,
                                    'object_attribute_value' => $vals,
                                    'enterprise_id' => $this->request->getPost('enterprise_id')
                                );
                                $attr_insert = $Dashboard_model->insert_obj_attributes($attr_datas);
                            }
                        }
                    }
                }
                $bool_delete_id = $Dashboard_model->delete_existing_obj_bool_attributes($object_edit_id);
                if (!empty($b_attribute)) {

                    foreach ($b_attribute as $bitems => $bvals) {


                        $battr_datas = array(
                            'object_id' => $object_edit_id,
                            'boolean_id' => $bvals,
                            'boolean_value' => 1,
                            'enterprise_id' => $this->request->getPost('enterprise_id')
                        );
                        $battr_insert = $Dashboard_model->insert_obj_boolean_attributes($battr_datas);
                    }
                }
                if ($update_id1) {
                    return redirect()->to($sURL);
                } else {
                    return redirect()->to($sURL);
                }
            } else {
                $bURL = config('App')->baseURL;
                $class_id = $this->request->getPost('object_class_id');
                $sURL = site_url('Dashboard/view_hotels/' . $class_id);
                $baseURL = ($bURL === '') ? $bURL : rtrim($bURL, '/ ') . '/';
                $addmore = $this->request->getPost('addmore');
                $object_mobile = [];
                $object_email = [];
                $object_address = [];
                if (!empty($addmore)) {
                    foreach ($addmore as $key => $item) {
                        if (isset($item['object_mobile'])) {
                            $object_mobile[] = $item['object_mobile'];
                        }
                        if (isset($item['object_email'])) {
                            $object_email[] = $item['object_email'];
                        }
                        if (isset($item['object_address'])) {
                            $object_address[] = $item['object_address'];
                        }
                    }
                }

                $attribute = $this->request->getPost('attribute');
                $b_attribute = $this->request->getPost('dynamicCheckbox');

                $datas = array(
                    'object_name' => $this->request->getPost('object_name'),
                    'object_location_id' => $this->request->getPost('object_location'),
                    'object_class_id' => $this->request->getPost('object_class_id'),
                    'object_type_id' => $this->request->getPost('object_type_id'),
                    'enterprise_id' => $this->request->getPost('enterprise_id'),
                    'object_ph_no' => json_encode($object_mobile),
                    'object_email' => json_encode($object_email),
                    'object_address' => json_encode($object_address)
                );

                $object_id = $Dashboard_model->insert_object($datas);
                $hotel_category_id = '';
                if (!empty($attribute)) {
                    foreach ($attribute as $items) {
                        foreach ($items as $keys => $vals) {
                            if ($keys == 1) {
                                $hotel_category_id = $vals;
                            }
                            $attr_datas = array(
                                'object_id' => $object_id,
                                'object_class_attribute_id' => $keys,
                                'object_attribute_value' => $vals,
                                'enterprise_id' => $this->request->getPost('enterprise_id')
                            );
                            $attr_insert = $Dashboard_model->insert_obj_attributes($attr_datas);
                        }
                    }
                }

                if (!empty($b_attribute)) {

                    foreach ($b_attribute as $bitems => $bvals) {

                        $battr_datas = array(
                            'object_id' => $object_id,
                            'boolean_id' => $bvals,
                            'boolean_value' => 1,
                            'enterprise_id' => $this->request->getPost('enterprise_id')
                        );
                        $battr_insert = $Dashboard_model->insert_obj_boolean_attributes($battr_datas);
                    }
                }
                if ($object_id) {
                    if ($class_id == 1) {
                        $hmaster = array(
                            'object_id' => $object_id,
                            'hotel_category_id' => $hotel_category_id,
                            'enterprise_id' => $this->request->getPost('enterprise_id')
                        );
                        $hmaster_insert = $Dashboard_model->insert_hotel_master($hmaster);
                    }
                    return redirect()->to($sURL);
                } else {
                    return redirect()->to($sURL);
                }
            }
        } else {
            return redirect()->to('Login');
        }
    }

    public function saveObjectVeh()
    {
        if (!empty(session()->get('user_id'))) {

            $Dashboard_model = new Dashboard_m();
            $registration_no = $this->request->getPost('registration_no');
            $reg_exist = 0;
            if (!empty($registration_no)) {
                $reg_exist = $Dashboard_model->check_registerno_exist($registration_no);
            }
            if ($reg_exist > 0) {
                session()->setFlashdata('error', 'This Registration Number already exist!');
                return redirect()->to('Dashboard/add_object_vehicle/8');
            } else {
                $object_edit_id = $this->request->getPost('object_edit_id');
                $transport_id = $this->request->getPost('transport_id');
                $hub_location_id = $this->request->getPost('hub_location_id');
                $vehicle_model_id = $this->request->getPost('vehicle_model_id');
                $vehicle_seat_id = $this->request->getPost('vehicle_seat_id');
                $tour_travel_daily_rate = $this->request->getPost('tour_travel_daily_rate');
                $tour_travel_max_km = $this->request->getPost('tour_travel_max_km');
                $extra_km_rate = $this->request->getPost('extra_km_rate');
                $istourtravel = $this->request->getPost('is_tour_travel') ?? 0;
                $islocaltravel = $this->request->getPost('is_local_travel') ?? 0;
                $is_active = $this->request->getPost('is_active') ?? 0;

                $local_travel_daily_rate = $this->request->getPost('local_travel_daily_rate');
                $local_travel_max_km = $this->request->getPost('local_travel_max_km');
                if ($object_edit_id > 0) {
                    $bURL = config('App')->baseURL;
                    $class_id = $this->request->getPost('object_class_id');
                    $sURL = site_url('Dashboard/view_vehicles/' . $class_id);
                    $baseURL = ($bURL === '') ? $bURL : rtrim($bURL, '/ ') . '/';
                    $addmore = $this->request->getPost('addmore');
                    $object_mobile = [];
                    $object_email = [];
                    $object_address = [];
                    if (!empty($addmore)) {
                        foreach ($addmore as $key => $item) {
                            if (isset($item['object_mobile'])) {
                                $object_mobile[] = $item['object_mobile'];
                            }
                            if (isset($item['object_email'])) {
                                $object_email[] = $item['object_email'];
                            }
                            if (isset($item['object_address'])) {
                                $object_address[] = $item['object_address'];
                            }
                        }
                    }


                    $datas = array(
                        'object_name' => $this->request->getPost('object_name'),
                        'object_location_id' => $this->request->getPost('object_location'),
                        'object_class_id' => $this->request->getPost('object_class_id'),
                        'object_type_id' => $this->request->getPost('object_type_id'),
                        'enterprise_id' => $this->request->getPost('enterprise_id'),
                        'object_ph_no' => json_encode($object_mobile),
                        'object_email' => json_encode($object_email),
                        'object_address' => json_encode($object_address)
                    );
                    $update_id1 = $Dashboard_model->update_object_veh($datas, $object_edit_id);

                    if ($update_id1) {
                        $veh_data = array(
                            'is_tour_travel' => $istourtravel,
                            'is_local_travel' => $islocaltravel,
                            'registration_no' => $registration_no,
                            'is_active' => $is_active
                        );
                        $vehicle_id1 = $Dashboard_model->update_vehicle_master($veh_data, $object_edit_id);
                        $veh_type_datas = $Dashboard_model->get_veh_type_datas($object_edit_id);
                        $veh_seat_update = array(
                            'vehicle_seat_capacity' => $vehicle_seat_id
                        );
                        $up_seat_id = $Dashboard_model->update_vehicle_seat($veh_seat_update, $veh_type_datas[0]['vehicle_seat_id']);
                        if ($vehicle_id1) {
                            $veh_type_data = array(
                                'hub_location_id' => $hub_location_id,
                                'vehicle_model_id' => $vehicle_model_id,
                                //'vehicle_seat_id' => $veh_type_datas[0]['vehicle_seat_id'],
                                'tour_travel_daily_rate' => $tour_travel_daily_rate,
                                'tour_travel_max_km' => $tour_travel_max_km,
                                'local_travel_daily_rate' => $local_travel_daily_rate,
                                'local_travel_max_km' => $local_travel_max_km,
                                'extra_km_rate' => $extra_km_rate
                            );
                            $vehicle_type_id1 = $Dashboard_model->update_vehicle_type_master($veh_type_data, $veh_type_datas[0]['vehicle_type_id']);
                            if ($vehicle_type_id1) {
                                if (!empty($transport_id)) {
                                    $transport_datas = $Dashboard_model->get_transport_datas($transport_id);
                                    $trans_data = array(
                                        'object_transport_name' => $transport_datas[0]['entity_name'],
                                        'vehicle_id' => $vehicle_id1
                                    );
                                    $object_transport_update = $Dashboard_model->update_transport_master($trans_data, $object_edit_id);
                                }
                            }

                            return redirect()->to($sURL);
                        }
                    } else {
                        return redirect()->to($sURL);
                    }
                } else {
                    $bURL = config('App')->baseURL;
                    $class_id = $this->request->getPost('object_class_id');
                    $sURL = site_url('Dashboard/view_vehicles/' . $class_id);
                    $baseURL = ($bURL === '') ? $bURL : rtrim($bURL, '/ ') . '/';
                    $addmore = $this->request->getPost('addmore');
                    $object_mobile = [];
                    $object_email = [];
                    $object_address = [];
                    if (!empty($addmore)) {
                        foreach ($addmore as $key => $item) {
                            if (isset($item['object_mobile'])) {
                                $object_mobile[] = $item['object_mobile'];
                            }
                            if (isset($item['object_email'])) {
                                $object_email[] = $item['object_email'];
                            }
                            if (isset($item['object_address'])) {
                                $object_address[] = $item['object_address'];
                            }
                        }
                    }

                    $datas = array(
                        'object_name' => $this->request->getPost('object_name'),
                        'object_location_id' => $this->request->getPost('object_location'),
                        'object_class_id' => $this->request->getPost('object_class_id'),
                        'object_type_id' => $this->request->getPost('object_type_id'),
                        'enterprise_id' => $this->request->getPost('enterprise_id'),
                        'object_ph_no' => json_encode($object_mobile),
                        'object_email' => json_encode($object_email),
                        'object_address' => json_encode($object_address)
                    );

                    $object_id = $Dashboard_model->insert_object($datas);
                    if ($object_id) {
                        $seat_id = $Dashboard_model->insert_vehicle_seat($this->request->getPost('object_name'), $vehicle_seat_id);
                        $veh_type_data = array(
                            'hub_location_id' => $hub_location_id,
                            'vehicle_model_id' => $vehicle_model_id,
                            'vehicle_seat_id' => $seat_id,
                            'tour_travel_daily_rate' => $tour_travel_daily_rate,
                            'tour_travel_max_km' => $tour_travel_max_km,
                            'local_travel_daily_rate' => $local_travel_daily_rate,
                            'local_travel_max_km' => $local_travel_max_km,
                            'extra_km_rate' => $extra_km_rate,
                            'enterprise_id' => $this->request->getPost('enterprise_id')
                        );
                        $vehicle_type_id = $Dashboard_model->insert_vehicle_type_master($veh_type_data);
                        if ($vehicle_type_id) {
                            $veh_data = array(
                                'object_id' => $object_id,
                                'vehicle_type_id' => $vehicle_type_id,
                                'is_tour_travel' => $istourtravel,
                                'is_local_travel' => $islocaltravel,
                                'registration_no' => $registration_no,
                                'is_active' => $is_active,
                                'enterprise_id' => $this->request->getPost('enterprise_id')
                            );
                            $vehicle_id = $Dashboard_model->insert_vehicle_master($veh_data);
                            if ($vehicle_id) {
                                if (!empty($transport_id)) {
                                    $transport_datas = $Dashboard_model->get_transport_datas($transport_id);
                                    $transport_exist = $Dashboard_model->check_transport_master_exist($object_id);
                                    if ($transport_exist > 0) {
                                        $trans_data = array(
                                            'object_transport_name' => $transport_datas[0]['entity_name'],
                                            'vehicle_id' => $vehicle_id
                                        );
                                        $object_transport_update = $Dashboard_model->update_transport_master($trans_data, $object_id);
                                    } else {
                                        $trans_data = array(
                                            'object_id' => $object_id,
                                            'object_transport_name' => $transport_datas[0]['entity_name'],
                                            'vehicle_id' => $vehicle_id,
                                            'enterprise_id' => $this->request->getPost('enterprise_id')
                                        );
                                        $object_transport_insert = $Dashboard_model->insert_transport_master($trans_data);
                                    }
                                }
                                return redirect()->to($sURL);
                            }
                        }
                    } else {
                        return redirect()->to($sURL);
                    }
                }
            }
        } else {
            return redirect()->to('Login');
        }
    }

    public function saveObjectss()
    {
        if (!empty(session()->get('user_id'))) {

            $Dashboard_model = new Dashboard_m();
            $originalName = '';
            $extension = '';
            $uploadFolder = '';
            $object_edit_id = $this->request->getPost('object_edit_id');

            $sightseeing_distance = $this->request->getPost('sightseeing_distance');
            $sightseeing_description = $this->request->getPost('sightseeing_description');
            $is_pax = $this->request->getPost('is_pax') ?? 0;
            $vendor_id = $this->request->getPost('vendor_id');
            $file = $this->request->getFile('fileuplaod');
            $validationRules = [
                'fileuplaod' => 'uploaded[fileuplaod]|max_size[fileuplaod,1024]|ext_in[fileuplaod,png,jpg,gif,pdf,xlsx,docx]',
            ];

            if ($object_edit_id > 0) {
                $bURL = config('App')->baseURL;
                $class_id = $this->request->getPost('object_class_id');
                $sURL = site_url('Dashboard/view_sight_seeing/' . $class_id);
                $baseURL = ($bURL === '') ? $bURL : rtrim($bURL, '/ ') . '/';
                $addmore = $this->request->getPost('addmore');
                $object_mobile = [];
                $object_email = [];
                $object_address = [];
                if (!empty($addmore)) {
                    foreach ($addmore as $key => $item) {
                        if (isset($item['object_mobile'])) {
                            $object_mobile[] = $item['object_mobile'];
                        }
                        if (isset($item['object_email'])) {
                            $object_email[] = $item['object_email'];
                        }
                        if (isset($item['object_address'])) {
                            $object_address[] = $item['object_address'];
                        }
                    }
                }


                $datas = array(
                    'object_name' => $this->request->getPost('object_name'),
                    'object_location_id' => $this->request->getPost('object_location'),
                    'object_class_id' => $this->request->getPost('object_class_id'),
                    'object_type_id' => $this->request->getPost('object_type_id'),
                    'enterprise_id' => $this->request->getPost('enterprise_id'),
                    'object_ph_no' => json_encode($object_mobile),
                    'object_email' => json_encode($object_email),
                    'object_address' => json_encode($object_address)
                );
                $update_id1 = $Dashboard_model->update_object_ss($datas, $object_edit_id);

                if ($update_id1) {
                    $sss_data = array(
                        'sightseeing_description' => $sightseeing_description,
                        'sightseeing_distance' => $sightseeing_distance,
                        'vendor_id' => $vendor_id,
                        'is_pax' => $is_pax
                    );
                    $ss_id1 = $Dashboard_model->update_ss_master($sss_data, $object_edit_id);
                    return redirect()->to($sURL);
                } else {
                    return redirect()->to($sURL);
                }
            } else {
                $bURL = config('App')->baseURL;
                $class_id = $this->request->getPost('object_class_id');
                $sURL = site_url('Dashboard/view_sight_seeing/' . $class_id);
                $baseURL = ($bURL === '') ? $bURL : rtrim($bURL, '/ ') . '/';
                $addmore = $this->request->getPost('addmore');
                $object_mobile = [];
                $object_email = [];
                $object_address = [];
                if (!empty($addmore)) {
                    foreach ($addmore as $key => $item) {
                        if (isset($item['object_mobile'])) {
                            $object_mobile[] = $item['object_mobile'];
                        }
                        if (isset($item['object_email'])) {
                            $object_email[] = $item['object_email'];
                        }
                        if (isset($item['object_address'])) {
                            $object_address[] = $item['object_address'];
                        }
                    }
                }

                $datas = array(
                    'object_name' => $this->request->getPost('object_name'),
                    'object_location_id' => $this->request->getPost('object_location'),
                    'object_class_id' => $this->request->getPost('object_class_id'),
                    'object_type_id' => $this->request->getPost('object_type_id'),
                    'enterprise_id' => $this->request->getPost('enterprise_id'),
                    'object_ph_no' => json_encode($object_mobile),
                    'object_email' => json_encode($object_email),
                    'object_address' => json_encode($object_address)
                );

                $object_id = $Dashboard_model->insert_object($datas);

                if (!empty($file)) {
                    if ($this->validate($validationRules)) {
                        if ($file->isValid() && !$file->hasMoved()) {
                            //$uploadFolder = WRITEPATH .'uploads\\sight\\'.$object_id;
                            $uploadFolder = FCPATH . 'uploads/sight/' . $object_id;
                            if (!is_dir($uploadFolder)) {
                                mkdir($uploadFolder, 0777, true);
                            }
                            //$originalName = $file->getClientName();
                            $extension = $file->getExtension();
                            $originalName = $object_id . '.' . $extension;
                            $file->move($uploadFolder, $originalName);
                        }
                    }
                }

                if ($object_id) {
                    $ss_data = array(
                        'object_id' => $object_id,
                        'sightseeing_name' => $this->request->getPost('object_name'),
                        'sightseeing_description' => $sightseeing_description,
                        'sightseeing_distance' => $sightseeing_distance,
                        'vendor_id' => $vendor_id,
                        'img_name' => $originalName,
                        'img_ext' => $extension,
                        'img_path' => $uploadFolder,
                        'is_pax' => $is_pax,
                        'enterprise_id' => $this->request->getPost('enterprise_id')
                    );
                    $ss_insert = $Dashboard_model->insert_ss_master($ss_data);
                    return redirect()->to($sURL);
                } else {
                    return redirect()->to($sURL);
                }
            }
        } else {
            return redirect()->to('Login');
        }
    }

    public function assign_employee_roles()
    {
        if (!empty(session()->get('user_id'))) {

            $Dashboard_model = new Dashboard_m();
            $entity_id = $this->request->getPost('entity_id');
            $all_systems = $Dashboard_model->get_all_systems($entity_id);
            $data['all_systems'] = $all_systems;
            $entity_name = $this->request->getPost('entity_name');
            $data['all_roles'] = $Dashboard_model->get_all_roles();
            $data['assigned_roles'] = $Dashboard_model->get_assigned_roles($entity_id);
            $data['team_leads'] = $Dashboard_model->get_all_team_leads();
            $data['sop_leads'] = $Dashboard_model->get_all_sop_leads();
            $data['top_leads'] = $Dashboard_model->get_all_top_leads();
            $data['entity_id'] = $entity_id;
            $data['entity_name'] = $entity_name;
            echo view('dashboard/all_role_view', $data);
        } else {
            return redirect()->to('Login');
        }
    }
    public function transaction_permission_assign()
    {
        if (!empty(session()->get('user_id'))) {

            $Dashboard_model = new Dashboard_m();
            $entity_id = $this->request->getPost('role_id');
            $all_systems = $Dashboard_model->get_all_systems($entity_id);
            $data['all_systems'] = $all_systems;
            $entity_name = $this->request->getPost('role_name');
            $data['all_trans'] = $Dashboard_model->get_all_transaction_per();
            //$data['assigned_roles'] = $Dashboard_model->get_assigned_roles($entity_id);
            $data['role_id'] = $entity_id;
            $data['role_name'] = $entity_name;
            $parent_menu = $Dashboard_model->get_parent_menus();
            $sub_menu = $Dashboard_model->get_sub_menus();
            $data['parent_menu'] = $parent_menu;
            $data['sub_menu'] = $sub_menu;
            echo view('dashboard/all_trans_per_view', $data);
        } else {
            return redirect()->to('Login');
        }
    }
    public function assign_permissions()
    {
        if (!empty(session()->get('user_id'))) {

            $Dashboard_model = new Dashboard_m();
            $role_id = $this->request->getPost('role_id');
            $trans_id = $this->request->getPost('trans_id');
            $trans_name = $this->request->getPost('trans_name');
            $role_name = $this->request->getPost('role_name');
            //$data['all_roles'] = $Dashboard_model->get_all_roles();
            //$data['assigned_roles'] = $Dashboard_model->get_assigned_roles($entity_id);
            $data['p_role_id'] = $role_id;
            $data['p_trans_id'] = $trans_id;
            $data['p_trans_name'] = $trans_name;
            $data['p_role_name'] = $role_name;

            $per_exist = $Dashboard_model->get_assigned_per($role_id, $trans_id);
            if (!empty($per_exist)) {
                $data['per_exist'] = $per_exist;
            } else {
                $data['per_exist'] = [];
            }

            echo view('dashboard/all_per_view', $data);
        } else {
            return redirect()->to('Login');
        }
    }
    public function updateRoles()
    {
        if (!empty(session()->get('user_id'))) {

            $Dashboard_model = new Dashboard_m();
            $entity_id = $this->request->getPost('entity_id');
            $selectedRoles = $this->request->getPost('selectedRoles');
            $roleLeadMap = $this->request->getPost('roleLeadMap');

            // Sanity check
            if (!is_array($roleLeadMap)) {
                $roleLeadMap = [];
            }

            if (!empty($entity_id)) {
                $role_exist = $Dashboard_model->check_role_exist($entity_id);

                if ($role_exist) {
                    $delete_id = $Dashboard_model->delete_role_exist($entity_id);
                } else {
                    $delete_id = true; // allow insertion if nothing to delete
                }

                if ($delete_id) {
                    foreach ($roleLeadMap as $key => $val) {
                        $role_datas = [
                            'entity_id' => $entity_id,
                            'role_id' => $key,
                            'team_lead_id' => $val ?? null,
                            'enterprise_id' => 1
                        ];
                        $Dashboard_model->insert_new_role($role_datas);
                    }
                    echo 1;
                } else {
                    echo 0;
                }
            } else {
                echo 0;
            }
        } else {
            return redirect()->to('Login');
        }
    }
    public function updateTransaction()
    {
        if (!empty(session()->get('user_id'))) {

            $Dashboard_model = new Dashboard_m();
            $entity_id = $this->request->getPost('entity_id');
            $all_systems = $Dashboard_model->get_all_systems($entity_id);
            $data['all_systems'] = $all_systems;
            $role_id = $this->request->getPost('role_id');
            $trans_ids = $this->request->getPost('trans_ids');
            $trans_exist = $Dashboard_model->check_trans_exist($entity_id);
            if ($trans_exist) {
                $delete_id = $Dashboard_model->delete_trans_exist($entity_id);
                if ($delete_id) {
                    foreach ($trans_ids as $item) {
                        $trans_datas = [
                            'access_permission_id' => 1,
                            'entity_id' => $entity_id,
                            'role_id' => $role_id,
                            'entity_trans_id' => $item,
                            'enterprise_id' => 1
                        ];
                        $insert_id = $Dashboard_model->insert_new_trans($trans_datas);
                    }
                    echo 1;
                }
            } else {
                foreach ($trans_ids as $item) {
                    $trans_datas = [
                        'access_permission_id' => 1,
                        'entity_id' => $entity_id,
                        'role_id' => $role_id,
                        'entity_trans_id' => $item,
                        'enterprise_id' => 1
                    ];
                    $insert_id = $Dashboard_model->insert_new_trans($trans_datas);
                }
                echo 1;
            }
        } else {
            return redirect()->to('Login');
        }
    }

    public function updatePermissions()
    {
        if (!empty(session()->get('user_id'))) {

            $Dashboard_model = new Dashboard_m();
            $role_id = $this->request->getPost('role_id');
            $trans_id = $this->request->getPost('trans_id');
            $trans_exist = $Dashboard_model->check_trans_exist($role_id, $trans_id);
            if ($trans_exist) {
            } else {
                $trans_datas = [
                    'access_permission_id' => 1,
                    'role_id' => $role_id,
                    'entity_trans_id' => $trans_id,
                    'enterprise_id' => 1
                ];
                $insert_id = $Dashboard_model->insert_new_trans($trans_datas);
            }

            $prs_parent_ids = $Dashboard_model->getProcessParentId($trans_id);
            $prs_parent_id = $prs_parent_ids[0]['prs_parent_id'];
            $parent_trans_exist = $Dashboard_model->check_trans_exist($role_id, $prs_parent_id);
            if ($parent_trans_exist) {
            } else {
                $p_trans_datas = [
                    'access_permission_id' => 1,
                    'role_id' => $role_id,
                    'entity_trans_id' => $prs_parent_id,
                    'enterprise_id' => 1
                ];
                $p_insert_id = $Dashboard_model->insert_new_trans($p_trans_datas);
            }

            $selectedPers = $this->request->getPost('selectedPers');
            $per_exist = $Dashboard_model->check_per_exist($role_id, $trans_id);
            if ($per_exist) {
                $delete_id = $Dashboard_model->delete_per_exist($role_id, $trans_id);
                if ($delete_id) {
                    foreach ($selectedPers as $item) {
                        $per_datas = [
                            'role_id' => $role_id,
                            'pro_permission_id' => $item,
                            'entity_trans_id' => $trans_id,
                            'enterprise_id' => 1
                        ];
                        $insert_id = $Dashboard_model->insert_new_per($per_datas);
                    }
                    echo 1;
                }
            } else {
                foreach ($selectedPers as $item) {
                    $per_datas = [
                        'role_id' => $role_id,
                        'pro_permission_id' => $item,
                        'entity_trans_id' => $trans_id,
                        'enterprise_id' => 1
                    ];
                    $insert_id = $Dashboard_model->insert_new_per($per_datas);
                }
                echo 1;
            }
        } else {
            return redirect()->to('Login');
        }
    }

    public function assign_role_transaction()
    {
        if (!empty(session()->get('user_id'))) {

            $Dashboard_model = new Dashboard_m();
            $entity_id = $this->request->getPost('entity_id');
            $all_systems = $Dashboard_model->get_all_systems($entity_id);
            $data['all_systems'] = $all_systems;
            $entity_name = $this->request->getPost('entity_name');
            $role_id = $this->request->getPost('role_id');
            $role_name = $this->request->getPost('role_name');
            $data['all_trans'] = $Dashboard_model->get_all_transaction();
            $data['assigned_trans'] = $Dashboard_model->get_assigned_trans($entity_id, $role_id);
            $data['entity_id'] = $entity_id;
            $data['entity_name'] = $entity_name;
            $data['role_id'] = $role_id;
            $data['role_name'] = $role_name;
            echo view('dashboard/all_trans_view', $data);
        } else {
            return redirect()->to('Login');
        }
    }
    public function view_transactions($role_id)
    {
        if (!empty(session()->get('user_id'))) {

            $Dashboard_model = new Dashboard_m();
            $entity_id = session('user_id');
            $active_role = session('active_role');
            $all_systems = $Dashboard_model->get_all_systems($entity_id);
            $data['all_systems'] = $all_systems;
            $all_roles = $Dashboard_model->get_all_entity_roles($entity_id);
            if (!empty($all_roles)) {
                $data['all_roles_assn'] = $all_roles;
                $all_menus = $Dashboard_model->get_all_role_menus($active_role);
                if (!empty($all_menus)) {
                    $data['all_menus'] = $all_menus;
                } else {
                    $data['all_menus'] = [];
                }
                $all_permissions = $Dashboard_model->get_all_entity_permissions($active_role, 3);
                if (!empty($all_permissions)) {
                    $data['all_permissions'] = $all_permissions;
                } else {
                    $data['all_permissions'] = [];
                }
            } else {
                $data['all_roles_assn'] = [];
                $data['all_menus'] = [];
                $data['all_permissions'] = [];
            }
            /*$trans_exist = $Dashboard_model->get_assigned_trans($entity_id,$role_id);
            if(!empty($trans_exist)){
                $data['trans_exist'] = $trans_exist;
            }
            else{
                $data['trans_exist'] = [];
            }*/
            $data['trans_exist'] = [];
            $role_det = $Dashboard_model->get_role_by_id($role_id);
            $data['all_trans'] = $Dashboard_model->get_all_transaction();
            $data['entity_det'] = $Dashboard_model->get_entity_by_id($entity_id);
            $data['entity_class_name'] = "Role Transaction";
            $parent_menu = $Dashboard_model->get_parent_menus();
            $sub_menu = $Dashboard_model->get_sub_menus();
            $data['parent_menu'] = $parent_menu;
            $data['sub_menu'] = $sub_menu;
            $data['role_id'] = $role_id;
            $data['role_det'] = $role_det;
            $data['role_name'] = $role_det[0]['role_name'];

            $all_permissions = [];
            $add_per = 0;
            $edit_per = 0;
            $view_per = 0;
            $del_per = 0;
            $all_permissions = $Dashboard_model->get_all_permissions(5,$active_role);
            if(!empty($all_permissions)){
                foreach($all_permissions as $key => $val){
                    if($val['pro_permission_id'] == 1){
                        $add_per = 1;
                    }
                    if($val['pro_permission_id'] == 2){
                        $edit_per = 1;
                    }
                    if($val['pro_permission_id'] == 3){
                        $view_per = 1;
                    }
                    if($val['pro_permission_id'] == 5){
                        $del_per = 1;
                    }
                }
            }
            $data['add_per'] = $add_per;
            $data['edit_per'] = $edit_per;
            $data['view_per'] = $view_per;
            $data['del_per'] = $del_per;

            return view('dashboard/role_trans', $data);
        } else {
            return redirect()->to('Login');
        }
    }

    public function room_category_modal()
    {
        if (!empty(session()->get('user_id'))) {

            $Dashboard_model = new Dashboard_m();
            $data = $Dashboard_model->get_room_category_table($this->request->getPost());
            echo json_encode($data);
        } else {
            return redirect()->to('Login');
        }
    }
    public function week_ends_modal()
    {
        if (!empty(session()->get('user_id'))) {

            $Dashboard_model = new Dashboard_m();
            $data = $Dashboard_model->get_week_end_table($this->request->getPost());
            echo json_encode($data);
        } else {
            return redirect()->to('Login');
        }
    }
    public function facility_modal()
    {
        if (!empty(session()->get('user_id'))) {

            $Dashboard_model = new Dashboard_m();
            $data = $Dashboard_model->facility_modal($this->request->getPost());
            echo json_encode($data);
        } else {
            return redirect()->to('Login');
        }
    }
    public function seasons_modal()
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model = new Dashboard_m();
            $data = $Dashboard_model->get_seasons_table($this->request->getPost());
            echo json_encode($data);
        } else {
            return redirect()->to('Login');
        }
    }
    public function veh_seasons_modal()
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model = new Dashboard_m();
            $data = $Dashboard_model->get_veh_seasons_table($this->request->getPost());
            echo json_encode($data);
        } else {
            return redirect()->to('Login');
        }
    }
    //nj//
    public function veh_seasons_modal_veh()
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model = new Dashboard_m();
            $all_veh_seasons = $Dashboard_model->get_season_veh($this->request->getPost());
            $data['all_veh_seasons'] = $all_veh_seasons;
            echo json_encode($data);
        } else {
            return redirect()->to('Login');
        }
    }
    public function get_veh_season_rates()
    {
        if (!session()->get('user_id')) {
            return redirect()->to('Login');
        }

        $Dashboard_model = new Dashboard_m();
        $season_id = $this->request->getPost('season_id');
        $season_rate_data = $Dashboard_model->get_veh_season_rates_model($season_id);

        if (!empty($season_rate_data)) {
            return $this->response->setJSON([
                'success' => true,
                'data' => $season_rate_data
            ]);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Season rate data not found.'
            ]);
        }
    }

    public function ss_seasons_modal()
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model = new Dashboard_m();
            $data = $Dashboard_model->get_ss_seasons_table($this->request->getPost());
            echo json_encode($data);
        } else {
            return redirect()->to('Login');
        }
    }
    public function addnewRoomCategory()
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model    = new Dashboard_m();
            $hotel_id           = $this->request->getPost('hotel_id');
            $hd_edit            = $this->request->getPost('hd_edit');
            $room_category_id   = $this->request->getPost('room_category_id');
            $b2b_active         = $this->request->getPost('b2b_active');
            $b2c_active         = $this->request->getPost('b2c_active');

            if ($hd_edit > 0) {
                // ── ADDED: check for duplicates excluding this record ──
                if ($Dashboard_model->check_rc_exist_except($hotel_id, $room_category_id, $hd_edit)) {
                    echo 0;
                    return;
                }
                // 

                $rc_datas = [
                    'room_category_id' => $room_category_id,
                    'b2b_active'       => $b2b_active,
                    'b2c_active'       => $b2c_active,
                ];
                $update_id = $Dashboard_model->update_new_rc($rc_datas, $hd_edit);
                echo 2;
            } else {
                $rc_exist = $Dashboard_model->check_rc_exist($hotel_id, $room_category_id);
                if ($rc_exist) {
                    echo 0;
                } else {
                    $max_sort_order = $Dashboard_model->get_max_sort_order_by_hotel($hotel_id);
                    $new_sort_order = $max_sort_order + 1;

                    $rc_datas = [
                        'room_category_id'           => $room_category_id,
                        'hotel_id'                   => $hotel_id,
                        'hotel_room_category_name'   => '',
                        'b2b_active'                 => $b2b_active,
                        'b2c_active'                 => $b2c_active,
                        'enterprise_id'              => 1,
                        'sort_order'                 => $new_sort_order
                    ];
                    $insert_id = $Dashboard_model->insert_new_rc($rc_datas);
                    echo 1;
                }
            }
        } else {
            return redirect()->to('Login');
        }
    }

    public function addnewFacility()
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model = new Dashboard_m();
            $hotel_id = $this->request->getPost('hotel_id');
            $object_id = $this->request->getPost('object_id');
            $hd_edit_fac = $this->request->getPost('hd_edit_fac');
            $tariff = $this->request->getPost('tariff');

            $facility_id = $this->request->getPost('facility_id');
            if ($hd_edit_fac > 0) {
                $rc_datas = [
                    'facility_id' => $facility_id,
                    'tariff' => $tariff
                ];
                $update_id = $Dashboard_model->update_new_fac($rc_datas, $hd_edit_fac);
                echo 2;
            } else {
                $rc_exist = $Dashboard_model->check_fac_exist($hotel_id, $facility_id);
                if ($rc_exist) {
                    echo 0;
                } else {
                    $rc_datas = [
                        'facility_id' => $facility_id,
                        'hotel_id' => $hotel_id,
                        'object_id' => $object_id,
                        'tariff' => $tariff,
                        'enterprise_id' => 1
                    ];
                    $insert_id = $Dashboard_model->insert_new_fac($rc_datas);
                    echo 1;
                }
            }
        } else {
            return redirect()->to('Login');
        }
    }
    public function addnewWeekends()
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model = new Dashboard_m();
            $object_id = $this->request->getPost('object_id');
            $hd_edit_wnd = $this->request->getPost('hd_edit_wnd');
            $start_date = $this->request->getPost('start_date');
            $end_date = $this->request->getPost('end_date');
            $day_range = $this->request->getPost('day_range');
            if ($hd_edit_wnd > 0) {
                $wn_datas = [
                    'day_range' => $day_range,
                    'weekend_start_date' => $start_date,
                    'weekend_end_date' => $end_date
                ];
                $update_id = $Dashboard_model->update_new_weekend($wn_datas, $hd_edit_wnd);
                echo 2;
            } else {
                $wn_exist = $Dashboard_model->check_wn_exist($object_id, $start_date, $end_date, $day_range);
                if ($wn_exist) {
                    echo 0;
                } else {
                    $wn_datas = [
                        'season_type_id' => 1,
                        'object_id' => $object_id,
                        'day_range' => $day_range,
                        'weekend_start_date' => $start_date,
                        'weekend_end_date' => $end_date,
                        'enterprise_id' => 1
                    ];
                    $insert_id = $Dashboard_model->insert_new_weekend($wn_datas);
                    echo 1;
                }
            }
        } else {
            return redirect()->to('Login');
        }
    }

    public function addnewSeasons()
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model = new Dashboard_m();
            $object_id = $this->request->getPost('object_id');
            $hd_edit_ssn = $this->request->getPost('hd_edit_ssn');
            $start_date = $this->request->getPost('start_date');
            $end_date = $this->request->getPost('end_date');
            $season_name = $this->request->getPost('season_name');
            if ($hd_edit_ssn > 0) {
                $wn_datas = [
                    'season_start_date' => $start_date,
                    'season_end_date' => $end_date,
                    'season_name' => $season_name
                ];
                $update_id = $Dashboard_model->update_new_seasons($wn_datas, $hd_edit_ssn);
                echo 2;
            } else {
                $wn_exist = $Dashboard_model->check_seasons_exist($object_id, $start_date, $end_date);
                if ($wn_exist) {
                    echo 0;
                } else {
                    $wn_datas = [
                        'season_type_id' => 1,
                        'object_id' => $object_id,
                        'season_start_date' => $start_date,
                        'season_end_date' => $end_date,
                        'season_name' => $season_name,
                        'enterprise_id' => 1
                    ];
                    $insert_id = $Dashboard_model->insert_new_seasons($wn_datas);
                    echo 1;
                }
            }
        } else {
            return redirect()->to('Login');
        }
    }
    public function addnewvehSeasons()
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model = new Dashboard_m();
            $object_id = $this->request->getPost('object_id');
            $hd_edit_ssn = $this->request->getPost('hd_edit_ssn');
            $start_date = $this->request->getPost('start_date');
            $end_date = $this->request->getPost('end_date');
            $season_name = $this->request->getPost('season_name');
            $rate_per_day = $this->request->getPost('rate_per_day');
            $extra_km_rate = $this->request->getPost('extra_km_rate');
            $km_rate = $this->request->getPost('km_rate');
            if ($hd_edit_ssn > 0) {
                $wn_datas = [
                    'season_start_date' => $start_date,
                    'season_end_date' => $end_date,
                    'season_name' => $season_name
                ];
                $update_id = $Dashboard_model->update_new_seasons($wn_datas, $hd_edit_ssn);
                if ($update_id) {
                    $veh_type_datas = $Dashboard_model->get_veh_type_datas($object_id);
                    $vehicle_type_id = $veh_type_datas[0]['vehicle_type_id'];
                    $sdatas = [
                        'rate_per_day' => $rate_per_day,
                        'extra_km_rate' => $extra_km_rate,
                        'km_rate' => $km_rate
                    ];
                    $update_s = $Dashboard_model->update_new_vehicle_seasons($sdatas, $hd_edit_ssn);
                    echo 2;
                }
            } else {
                $wn_exist = $Dashboard_model->check_vehseasons_exist($object_id, $start_date, $end_date);
                if ($wn_exist) {
                    echo 0;
                } else {
                    $wn_datas = [
                        'season_type_id' => 4,
                        'object_id' => $object_id,
                        'season_start_date' => $start_date,
                        'season_end_date' => $end_date,
                        'season_name' => $season_name,
                        'enterprise_id' => 1
                    ];
                    $season_id = $Dashboard_model->insert_new_seasons($wn_datas);
                    if ($season_id) {
                        $veh_type_datas = $Dashboard_model->get_veh_type_datas($object_id);
                        $vehicle_type_id = $veh_type_datas[0]['vehicle_type_id'];
                        $sdatas = [
                            'special_tariff_id' => $season_id,
                            'vehicle_type_id' => $vehicle_type_id,
                            'rate_per_day' => $rate_per_day,
                            'extra_km_rate' => $extra_km_rate,
                            'km_rate' => $km_rate,
                            'enterprise_id' => 1
                        ];
                        $insert_s = $Dashboard_model->insert_new_vehicle_seasons($sdatas);
                        echo 1;
                    }
                }
            }
        } else {
            return redirect()->to('Login');
        }
    }
    public function addnewssSeasons()
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model = new Dashboard_m();
            $object_id = $this->request->getPost('object_id');
            $hd_edit_ssn = $this->request->getPost('hd_edit_ssn');
            $start_date = $this->request->getPost('start_date');
            $end_date = $this->request->getPost('end_date');
            $season_name = $this->request->getPost('season_name');

            $tariff = $this->request->getPost('tariff');
            if ($hd_edit_ssn > 0) {
                $wn_datas = [
                    'season_start_date' => $start_date,
                    'season_end_date' => $end_date,
                    'season_name' => $season_name
                ];
                $season_id = $Dashboard_model->update_new_seasons($wn_datas, $hd_edit_ssn);
                if ($season_id) {

                    $sdatas = [
                        'tariff' => $tariff
                    ];
                    $update_s = $Dashboard_model->update_new_sightseeing_seasons($sdatas, $hd_edit_ssn);
                    echo 2;
                }
            } else {
                $wn_exist = $Dashboard_model->check_ss_seasons_exist($object_id, $start_date, $end_date);
                if ($wn_exist) {
                    echo 0;
                } else {
                    $wn_datas = [
                        'season_type_id' => 3,
                        'object_id' => $object_id,
                        'season_start_date' => $start_date,
                        'season_end_date' => $end_date,
                        'season_name' => $season_name,
                        'enterprise_id' => 1
                    ];
                    $season_id = $Dashboard_model->insert_new_seasons($wn_datas);
                    if ($season_id) {

                        $sdatas = [
                            'sightseeing_id' => $season_id,
                            'tariff' => $tariff,
                            'enterprise_id' => 1
                        ];
                        $insert_s = $Dashboard_model->insert_new_sightseeing_seasons($sdatas);
                        echo 1;
                    }
                }
            }
        } else {
            return redirect()->to('Login');
        }
    }
    public function addRoomfunction()
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model = new Dashboard_m();
            $room_category_id = $this->request->getPost('room_category_id');
            $room_type_id = $this->request->getPost('room_type_id');
            $occupancy_id = $this->request->getPost('occupancy_id');
            $hotel_id = $this->request->getPost('hotel_id');
            $object_id = $this->request->getPost('object_id');

            $data['room_cat_det'] = $Dashboard_model->get_room_category_details($room_category_id);
            $data['room_type_det'] = $Dashboard_model->get_room_type_details($room_type_id);
            $data['room_occu_det'] = $Dashboard_model->get_room_occupancy_details($occupancy_id);
            $data['hotel_det'] = $Dashboard_model->get_hotel_details($hotel_id);

            $role_exist = $Dashboard_model->check_room_exist($object_id, $room_category_id, $room_type_id);
            if ($role_exist > 0) {
                echo 0;
            } else {
                $insert_data = [
                    'object_id' => $object_id,
                    'room_category_id' => $room_category_id,
                    'room_type_id' => $room_type_id,
                    'occupancy_id' => $occupancy_id,
                    'enterprise_id' => 1
                ];
                $insert_data = $Dashboard_model->insert_room_basic_tariff($insert_data);
                if ($insert_data) {
                    $tariff_exist = $Dashboard_model->get_room_basic_tariff_exist($object_id);
                    $tariff_data = $Dashboard_model->get_room_basic_tariff($object_id);
                    $data['tariff_data'] = $tariff_data;
                    $data['tariff_exist'] = $tariff_exist;
                    echo view('dashboard/all_room_tariff_details', $data);
                }
            }
        } else {
            return redirect()->to('Login');
        }
    }
    public function getRoomfunction()
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model = new Dashboard_m();
            $system_id = $this->request->getPost('system_id');
            $hotel_id = $this->request->getPost('hotel_id');
            $object_id = $this->request->getPost('object_id');
            $tariff_exist = $Dashboard_model->get_room_basic_tariff_exist($object_id);
            $tariff_data = $Dashboard_model->get_room_basic_tariff_for_system_filter($object_id, $system_id);
            $data['tariff_data'] = $tariff_data;
            $data['tariff_exist'] = $tariff_exist;
            echo view('dashboard/all_room_tariff_details', $data);
        } else {
            return redirect()->to('Login');
        }
    }

    public function getRoomfunctionPax()
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model = new Dashboard_m();
            $object_id = $this->request->getPost('object_id');
            $tariff_exist = $Dashboard_model->get_room_basic_tariff_exist_pax($object_id);
            $tariff_data = $Dashboard_model->get_room_basic_tariff_pax($object_id);
            $pax_det = $Dashboard_model->get_pax_details();
            $data['tariff_data'] = $tariff_data;
            $data['tariff_exist'] = $tariff_exist;
            $data['pax_det'] = $pax_det;
            echo view('dashboard/all_room_tariff_details_pax', $data);
        } else {
            return redirect()->to('Login');
        }
    }

    /*public function getRoomfunctionWndPax()
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model = new Dashboard_m();
            $object_id = $this->request->getPost('object_id');
            $tariff_exist = $Dashboard_model->get_room_basic_tariff_exist_wndpax($object_id);
            $tariff_data = $Dashboard_model->get_room_basic_tariff_wndpax($object_id);
            $pax_det = $Dashboard_model->get_pax_details();
            $data['tariff_data'] = $tariff_data;
            $data['tariff_exist'] = $tariff_exist;
            $data['pax_det'] = $pax_det;
            echo view('dashboard/all_room_tariff_details_wndpax',$data);
        }
        else{
            return redirect()->to('Login');
        }
    }*/
    public function getRoomfunctionSsnPax()
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model = new Dashboard_m();
            $object_id = $this->request->getPost('object_id');
            $tariff_exist = $Dashboard_model->get_room_basic_tariff_exist_ssnpax($object_id);
            $tariff_data = $Dashboard_model->get_room_basic_tariff_ssnpax($object_id);
            $pax_det = $Dashboard_model->get_pax_details();
            $data['tariff_data'] = $tariff_data;
            $data['tariff_exist'] = $tariff_exist;
            $data['pax_det'] = $pax_det;
            echo view('dashboard/all_room_tariff_details_ssnpax', $data);
        } else {
            return redirect()->to('Login');
        }
    }
    public function getRoomfunctionWnd()
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model = new Dashboard_m();
            $object_id = $this->request->getPost('object_id');
            //$tariff_exist = $Dashboard_model->get_room_basic_tariff_exist_wnd($object_id);
            $tariff_data = $Dashboard_model->get_room_basic_tariff_wnd($object_id);
            $wnd_det = $Dashboard_model->get_wnd_details();
            $data['tariff_data'] = $tariff_data;
            $data['object_id'] = $object_id;
            //$data['tariff_exist'] = $tariff_exist;
            $data['wnd_det'] = $wnd_det;
            echo view('dashboard/all_room_tariff_details_wnd', $data);
        } else {
            return redirect()->to('Login');
        }
    }
    public function getRoomfunctionSeason()
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model = new Dashboard_m();
            $object_id = $this->request->getPost('object_id');
            $wnd_exist = $this->request->getPost('wnd_exist');
            $system_id = $this->request->getPost('system_id');
            //$tariff_exist = $Dashboard_model->get_room_basic_tariff_exist_season($object_id);
            $tariff_data = $Dashboard_model->get_room_basic_tariff_season_by_sysytem($object_id, $system_id);
            $wnd_det = $Dashboard_model->get_wnd_details();
            $data['tariff_data'] = $tariff_data;
            $data['object_id'] = $object_id;
            $data['wnd_exist'] = $wnd_exist;
            //$data['tariff_exist'] = $tariff_exist;
            $data['wnd_det'] = $wnd_det;
            if ($wnd_exist == 1) {
                echo view('dashboard/all_room_tariff_details_season_weekend', $data);
            } else {
                echo view('dashboard/all_room_tariff_details_season', $data);
            }
        } else {
            return redirect()->to('Login');
        }
    }
    public function getSeasonDatas()
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model = new Dashboard_m();
            $object_id = $this->request->getPost('object_id');
            $season_id = $this->request->getPost('season_id');
            $tariff_exist = $Dashboard_model->get_room_basic_tariff_exist_season($object_id, $season_id);
            echo json_encode($tariff_exist);
        } else {
            return redirect()->to('Login');
        }
    }
    public function fetchRoomCatDetails()
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model = new Dashboard_m();
            $hotel_room_category_id = $this->request->getPost('hotel_room_category_id');
            $room_cat_det = $Dashboard_model->fetchRoomCatDetails($hotel_room_category_id);
            echo json_encode($room_cat_det);
        } else {
            return redirect()->to('Login');
        }
    }
    public function fetchFacilityDetails()
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model = new Dashboard_m();
            $hotel_facility_id = $this->request->getPost('hotel_facility_id');
            $hotel_facility_det = $Dashboard_model->fetchFacilityDetails($hotel_facility_id);
            echo json_encode($hotel_facility_det);
        } else {
            return redirect()->to('Login');
        }
    }
    public function fetchWeekendDetails()
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model = new Dashboard_m();
            $weekend_id = $this->request->getPost('weekend_id');
            $weekend_det = $Dashboard_model->fetchWeekendDetails($weekend_id);
            echo json_encode($weekend_det);
        } else {
            return redirect()->to('Login');
        }
    }
    public function fetchSeasonDetails()
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model = new Dashboard_m();
            $season_id = $this->request->getPost('season_id');
            $season_det = $Dashboard_model->fetchSeasonDetails($season_id);
            echo json_encode($season_det);
        } else {
            return redirect()->to('Login');
        }
    }
    public function fetchvehSeasonDetails()
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model = new Dashboard_m();
            $season_id = $this->request->getPost('season_id');
            $season_det = $Dashboard_model->fetchvehSeasonDetails($season_id);
            echo json_encode($season_det);
        } else {
            return redirect()->to('Login');
        }
    }
    public function fetchssSeasonDetails()
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model = new Dashboard_m();
            $season_id = $this->request->getPost('season_id');
            $season_det = $Dashboard_model->fetchssSeasonDetails($season_id);
            echo json_encode($season_det);
        } else {
            return redirect()->to('Login');
        }
    }
    public function fetchDescriptionandImage()
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model = new Dashboard_m();
            $object_id = $this->request->getPost('object_id');
            $des_det = $Dashboard_model->fetchDescriptionandImage($object_id);
            echo json_encode($des_det);
        } else {
            return redirect()->to('Login');
        }
    }
    public function getWeekendDatas()
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model = new Dashboard_m();
            $object_id = $this->request->getPost('object_id');
            $season_id = $this->request->getPost('season_id');
            $tariff_exist = $Dashboard_model->get_room_basic_tariff_exist_weekend($object_id, $season_id);
            echo json_encode($tariff_exist);
        } else {
            return redirect()->to('Login');
        }
    }
    public function deleteRoomfunction()
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model = new Dashboard_m();
            $room_id = $this->request->getPost('room_id');
            $dep_exist = $Dashboard_model->check_room_tariff_exist($room_id);
            if ($dep_exist > 0) {
                echo 2;
            } else {
                $delete_data = $Dashboard_model->delete_room_basic_tariff($room_id);
                if ($delete_data) {
                    echo 1;
                } else {
                    echo 0;
                }
            }
        } else {
            return redirect()->to('Login');
        }
    }
    public function deleteEntity()
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model = new Dashboard_m();
            $entity_id = $this->request->getPost('entity_id');
            $delete_data = $Dashboard_model->delete_entity_details($entity_id);
            if ($delete_data) {
                echo 1;
            } else {
                echo 0;
            }
        } else {
            return redirect()->to('Login');
        }
    }
    public function saveRoomfunction()
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model = new Dashboard_m();
            $room_id = $this->request->getPost('room_id');
            $ep_tariff = $this->request->getPost('ep_tariff');
            $cp_tariff = $this->request->getPost('cp_tariff');
            $map_tariff = $this->request->getPost('map_tariff');
            $ap_tariff = $this->request->getPost('ap_tariff');
            $hotel_id = $this->request->getPost('hotel_id');
            $object_id = $this->request->getPost('object_id');

            $t_exist = $Dashboard_model->check_room_tariff_exist($room_id);
            if ($t_exist > 0) {
                $ep_data = [
                    'tariff' => $ep_tariff
                ];
                $update_tariff = $Dashboard_model->update_room_basic_tariff($ep_data, $room_id, 1);

                $cp_data = [
                    'tariff' => $cp_tariff
                ];
                $update_tariff = $Dashboard_model->update_room_basic_tariff($cp_data, $room_id, 2);

                $map_data = [
                    'tariff' => $map_tariff
                ];
                $update_tariff = $Dashboard_model->update_room_basic_tariff($map_data, $room_id, 3);

                $ap_data = [
                    'tariff' => $ap_tariff
                ];
                $update_tariff = $Dashboard_model->update_room_basic_tariff($ap_data, $room_id, 4);

                if ($update_tariff) {
                    echo 1;
                } else {
                    echo 0;
                }
            } else {
                $ep_data = [

                    'room_id' => $room_id,
                    'meal_plan_id' => 1,
                    'tariff' => $ep_tariff,
                    'enterprise_id' => 1
                ];
                $save_tariff = $Dashboard_model->save_room_basic_tariff($ep_data);

                $cp_data = [

                    'room_id' => $room_id,
                    'meal_plan_id' => 2,
                    'tariff' => $cp_tariff,
                    'enterprise_id' => 1
                ];
                $save_tariff = $Dashboard_model->save_room_basic_tariff($cp_data);

                $map_data = [

                    'room_id' => $room_id,
                    'meal_plan_id' => 3,
                    'tariff' => $map_tariff,
                    'enterprise_id' => 1
                ];
                $save_tariff = $Dashboard_model->save_room_basic_tariff($map_data);

                $ap_data = [

                    'room_id' => $room_id,
                    'meal_plan_id' => 4,
                    'tariff' => $ap_tariff,
                    'enterprise_id' => 1
                ];
                $save_tariff = $Dashboard_model->save_room_basic_tariff($ap_data);
                if ($save_tariff) {
                    echo 1;
                } else {
                    echo 0;
                }
            }
        } else {
            return redirect()->to('Login');
        }
    }


    /*public function saveRoomfunctionWeekend()
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model = new Dashboard_m();
            $hotel_room_meal_id = $this->request->getPost('hotel_room_meal_id');
            $tariff = $this->request->getPost('tariff');
            $child_tariff = $this->request->getPost('child_tariff');
            $child_wb_tariff = $this->request->getPost('child_wb_tariff');
            $extra_tariff = $this->request->getPost('extra_tariff');
            $object_id = $this->request->getPost('object_id');
            $special_tariff_id = $this->request->getPost('season_id');

            $t_exist = $Dashboard_model->check_season_tariff_exist($special_tariff_id,$hotel_room_meal_id,1);
            if($t_exist > 0){
                $c_data = [
                    'tariff' => $tariff
                ];
                $update_tariff_pax = $Dashboard_model->update_season_basic_tariff($c_data,$special_tariff_id,$hotel_room_meal_id,1);

                if($update_tariff_pax){
                    echo 1;
                }
                else{
                    echo 0;
                }
            }
            else{
                $c_data = [
                    
                    'special_tariff_id' => $special_tariff_id,
                    'hotel_room_meal_id' => $hotel_room_meal_id,
                    'special_tariff_type_id' => 1,
                    'tariff' => $tariff,
                    'enterprise_id' => 1
                ];
                $hotel_special_tariff_id = $Dashboard_model->save_season_basic_tariff($c_data);
                
                if($hotel_special_tariff_id){
                    $c_data = [
                    
                        'pax_id' => 1,
                        'hotel_special_tariff_id' => $hotel_special_tariff_id,
                        'tariff' => $child_tariff,
                        'enterprise_id' => 1
                    ];
                    $save_tariff_pax = $Dashboard_model->save_season_basic_tariff_pax($c_data);
        
                    $cw_data = [
                    
                        'pax_id' => 2,
                        'hotel_special_tariff_id' => $hotel_special_tariff_id,
                        'tariff' => $child_wb_tariff,
                        'enterprise_id' => 1
                    ];
                    $save_tariff_pax = $Dashboard_model->save_season_basic_tariff_pax($cw_data);
        
                    $e_data = [
                        
                        'pax_id' => 3,
                        'hotel_special_tariff_id' => $hotel_special_tariff_id,
                        'tariff' => $extra_tariff,
                        'enterprise_id' => 1
                    ];
                    $save_tariff_pax = $Dashboard_model->save_season_basic_tariff_pax($e_data);

                    if($save_tariff_pax){
                        echo 1;
                    }
                    else{
                        echo 0;
                    }
                }

            }
        }
        else{
            return redirect()->to('Login');
        }
    }*/
    public function saveRoomfunctionWeekend()
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model = new Dashboard_m();
            $hotel_room_meal_id = $this->request->getPost('hotel_room_meal_id');
            $tariff = $this->request->getPost('tariff');
            $child_tariff = $this->request->getPost('child_tariff');
            $child_wb_tariff = $this->request->getPost('child_wb_tariff');
            $extra_tariff = $this->request->getPost('extra_tariff');
            $object_id = $this->request->getPost('object_id');
            $special_tariff_id = $this->request->getPost('season_id');

            $dinner_adult = $this->request->getPost('dinner_adult');
            $lunch_adult = $this->request->getPost('lunch_adult');
            $dinner_child = $this->request->getPost('dinner_child');
            $lunch_child = $this->request->getPost('lunch_child');
            $dinner_child_wb = $this->request->getPost('dinner_child_wb');
            $lunch_child_wb = $this->request->getPost('lunch_child_wb');
            $dinner_extra = $this->request->getPost('dinner_extra');
            $lunch_extra = $this->request->getPost('lunch_extra');

            $t_exist = $Dashboard_model->check_season_tariff_exist($special_tariff_id, $hotel_room_meal_id, 1);
            if ($t_exist > 0) {
                $c_data = [
                    'tariff' => $tariff,
                    'dinner' => $dinner_adult,
                    'lunch' => $lunch_adult
                ];
                $update_tariff_pax = $Dashboard_model->update_season_basic_tariff($c_data, $special_tariff_id, $hotel_room_meal_id, 1);

                if ($update_tariff_pax) {
                    $updated_row = $Dashboard_model->get_updated_record($special_tariff_id, $hotel_room_meal_id, 1);
                    $hotel_special_tariff_id = $updated_row[0]['hotel_special_tariff_id'];

                    $c_data = [
                        'tariff' => $child_tariff,
                        'dinner' => $dinner_child,
                        'lunch' => $lunch_child
                    ];
                    $update_tariff_pax = $Dashboard_model->update_season_basic_tariff_pax($c_data, $hotel_special_tariff_id, 1);

                    $cw_data = [
                        'tariff' => $child_wb_tariff,
                        'dinner' => $dinner_child_wb,
                        'lunch' => $lunch_child_wb,
                    ];
                    $update_tariff_pax = $Dashboard_model->update_season_basic_tariff_pax($cw_data, $hotel_special_tariff_id, 2);

                    $e_data = [
                        'tariff' => $extra_tariff,
                        'dinner' => $dinner_extra,
                        'lunch' => $lunch_extra,
                    ];
                    $update_tariff_pax = $Dashboard_model->update_season_basic_tariff_pax($e_data, $hotel_special_tariff_id, 3);

                    $return_status = 1;
                } else {
                    $return_status = 0;
                }
            } else {
                $c_data = [

                    'special_tariff_id' => $special_tariff_id,
                    'hotel_room_meal_id' => $hotel_room_meal_id,
                    'special_tariff_type_id' => 1,
                    'tariff' => $tariff,
                    'dinner' => $dinner_adult,
                    'lunch' => $lunch_adult,
                    'enterprise_id' => 1
                ];
                $hotel_special_tariff_id = $Dashboard_model->save_season_basic_tariff($c_data);

                if ($hotel_special_tariff_id) {
                    $c_data = [

                        'pax_id' => 1,
                        'hotel_special_tariff_id' => $hotel_special_tariff_id,
                        'tariff' => $child_tariff,
                        'dinner' => $dinner_child,
                        'lunch' => $lunch_child,
                        'enterprise_id' => 1
                    ];
                    $save_tariff_pax = $Dashboard_model->save_season_basic_tariff_pax($c_data);

                    $cw_data = [

                        'pax_id' => 2,
                        'hotel_special_tariff_id' => $hotel_special_tariff_id,
                        'tariff' => $child_wb_tariff,
                        'dinner' => $dinner_child_wb,
                        'lunch' => $lunch_child_wb,
                        'enterprise_id' => 1
                    ];
                    $save_tariff_pax = $Dashboard_model->save_season_basic_tariff_pax($cw_data);

                    $e_data = [

                        'pax_id' => 3,
                        'hotel_special_tariff_id' => $hotel_special_tariff_id,
                        'tariff' => $extra_tariff,
                        'dinner' => $dinner_extra,
                        'lunch' => $lunch_extra,
                        'enterprise_id' => 1
                    ];
                    $save_tariff_pax = $Dashboard_model->save_season_basic_tariff_pax($e_data);

                    if ($save_tariff_pax) {
                        $return_status = 1;
                    } else {
                        $return_status = 0;
                    }
                }
            }
            return $this->response->setJSON(['status' => $return_status]);
        } else {
            return redirect()->to('Login');
        }
    }

    public function saveRoomfunctionSeason()
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model = new Dashboard_m();
            $return_status = 0;
            $hotel_room_meal_id = $this->request->getPost('hotel_room_meal_id');
            $tariff = $this->request->getPost('tariff');
            $child_tariff = $this->request->getPost('child_tariff');
            $child_wb_tariff = $this->request->getPost('child_wb_tariff');
            $extra_tariff = $this->request->getPost('extra_tariff');
            $object_id = $this->request->getPost('object_id');
            $special_tariff_id = $this->request->getPost('season_id');

            $tariff_w = $this->request->getPost('tariff_w');
            $child_tariff_w = $this->request->getPost('child_tariff_w');
            $child_wb_tariff_w = $this->request->getPost('child_wb_tariff_w');
            $extra_tariff_w = $this->request->getPost('extra_tariff_w');
            $weekends_id = $this->request->getPost('weekends_id');

            $dinner_adult = $this->request->getPost('dinner_adult');
            $lunch_adult = $this->request->getPost('lunch_adult');
            $dinner_child = $this->request->getPost('dinner_child');
            $lunch_child = $this->request->getPost('lunch_child');
            $dinner_child_wb = $this->request->getPost('dinner_child_wb');
            $lunch_child_wb = $this->request->getPost('lunch_child_wb');
            $dinner_extra = $this->request->getPost('dinner_extra');
            $lunch_extra = $this->request->getPost('lunch_extra');

            $t_exist = $Dashboard_model->check_season_tariff_exist($special_tariff_id, $hotel_room_meal_id, 2);
            if ($t_exist > 0) {
                $c_data = [
                    'tariff' => $tariff,
                    'dinner' => $dinner_adult,
                    'lunch' => $lunch_adult
                ];
                $update_tariff_pax = $Dashboard_model->update_season_basic_tariff($c_data, $special_tariff_id, $hotel_room_meal_id, 2);

                if ($update_tariff_pax) {
                    $updated_row = $Dashboard_model->get_updated_record($special_tariff_id, $hotel_room_meal_id, 2);
                    $hotel_special_tariff_id = $updated_row[0]['hotel_special_tariff_id'];

                    $c_data = [
                        'tariff' => $child_tariff,
                        'dinner' => $dinner_child,
                        'lunch' => $lunch_child
                    ];
                    $update_tariff_pax = $Dashboard_model->update_season_basic_tariff_pax($c_data, $hotel_special_tariff_id, 1);

                    $cw_data = [
                        'tariff' => $child_wb_tariff,
                        'dinner' => $dinner_child_wb,
                        'lunch' => $lunch_child_wb,
                    ];
                    $update_tariff_pax = $Dashboard_model->update_season_basic_tariff_pax($cw_data, $hotel_special_tariff_id, 2);

                    $e_data = [
                        'tariff' => $extra_tariff,
                        'dinner' => $dinner_extra,
                        'lunch' => $lunch_extra,
                    ];
                    $update_tariff_pax = $Dashboard_model->update_season_basic_tariff_pax($e_data, $hotel_special_tariff_id, 3);
                    $return_status = 1;
                } else {
                    $return_status = 0;
                }
            } else {
                if (!empty($special_tariff_id)) {
                    $c_data = [

                        'special_tariff_id' => $special_tariff_id,
                        'hotel_room_meal_id' => $hotel_room_meal_id,
                        'special_tariff_type_id' => 2,
                        'tariff' => $tariff,
                        'dinner' => $dinner_adult,
                        'lunch' => $lunch_adult,
                        'enterprise_id' => 1
                    ];
                    $hotel_special_tariff_id = $Dashboard_model->save_season_basic_tariff($c_data);

                    if ($hotel_special_tariff_id) {
                        $c_data = [

                            'pax_id' => 1,
                            'hotel_special_tariff_id' => $hotel_special_tariff_id,
                            'tariff' => $child_tariff,
                            'dinner' => $dinner_child,
                            'lunch' => $lunch_child,
                            'enterprise_id' => 1
                        ];
                        $save_tariff_pax = $Dashboard_model->save_season_basic_tariff_pax($c_data);

                        $cw_data = [

                            'pax_id' => 2,
                            'hotel_special_tariff_id' => $hotel_special_tariff_id,
                            'tariff' => $child_wb_tariff,
                            'dinner' => $dinner_child_wb,
                            'lunch' => $lunch_child_wb,
                            'enterprise_id' => 1
                        ];
                        $save_tariff_pax = $Dashboard_model->save_season_basic_tariff_pax($cw_data);

                        $e_data = [

                            'pax_id' => 3,
                            'hotel_special_tariff_id' => $hotel_special_tariff_id,
                            'tariff' => $extra_tariff,
                            'dinner' => $dinner_extra,
                            'lunch' => $lunch_extra,
                            'enterprise_id' => 1
                        ];
                        $save_tariff_pax = $Dashboard_model->save_season_basic_tariff_pax($e_data);

                        if ($save_tariff_pax) {
                            $return_status = 1;
                        } else {
                            $return_status = 0;
                        }
                    }
                }
            }

            /**************************************************************************************************** */

            $t_exist_w = $Dashboard_model->check_season_tariff_exist($weekends_id, $hotel_room_meal_id, 1);
            if ($t_exist_w > 0) {
                $c_data = [
                    'tariff' => $tariff_w,
                    'dinner' => $dinner_adult,
                    'lunch' => $lunch_adult
                ];
                $update_tariff_pax = $Dashboard_model->update_season_basic_tariff($c_data, $weekends_id, $hotel_room_meal_id, 1);

                if ($update_tariff_pax) {
                    $updated_row = $Dashboard_model->get_updated_record($weekends_id, $hotel_room_meal_id, 1);
                    $hotel_special_tariff_id = $updated_row[0]['hotel_special_tariff_id'];

                    $c_data = [
                        'tariff' => $child_tariff_w,
                        'dinner' => $dinner_child,
                        'lunch' => $lunch_child
                    ];
                    $update_tariff_pax = $Dashboard_model->update_season_basic_tariff_pax($c_data, $hotel_special_tariff_id, 1);

                    $cw_data = [
                        'tariff' => $child_wb_tariff_w,
                        'dinner' => $dinner_child_wb,
                        'lunch' => $lunch_child_wb,
                    ];
                    $update_tariff_pax = $Dashboard_model->update_season_basic_tariff_pax($cw_data, $hotel_special_tariff_id, 2);

                    $e_data = [
                        'tariff' => $extra_tariff_w,
                        'dinner' => $dinner_extra,
                        'lunch' => $lunch_extra,
                    ];
                    $update_tariff_pax = $Dashboard_model->update_season_basic_tariff_pax($e_data, $hotel_special_tariff_id, 3);

                    $return_status = 1;
                } else {
                    $return_status = 0;
                }
            } else {
                if (!empty($weekends_id)) {
                    $c_data = [

                        'special_tariff_id' => $weekends_id,
                        'hotel_room_meal_id' => $hotel_room_meal_id,
                        'special_tariff_type_id' => 1,
                        'tariff' => $tariff_w,
                        'dinner' => $dinner_adult,
                        'lunch' => $lunch_adult,
                        'enterprise_id' => 1
                    ];
                    $hotel_special_tariff_id = $Dashboard_model->save_season_basic_tariff($c_data);

                    if ($hotel_special_tariff_id) {
                        $c_data = [

                            'pax_id' => 1,
                            'hotel_special_tariff_id' => $hotel_special_tariff_id,
                            'tariff' => $child_tariff_w,
                            'dinner' => $dinner_child,
                            'lunch' => $lunch_child,
                            'enterprise_id' => 1
                        ];
                        $save_tariff_pax = $Dashboard_model->save_season_basic_tariff_pax($c_data);

                        $cw_data = [

                            'pax_id' => 2,
                            'hotel_special_tariff_id' => $hotel_special_tariff_id,
                            'tariff' => $child_wb_tariff_w,
                            'dinner' => $dinner_child_wb,
                            'lunch' => $lunch_child_wb,
                            'enterprise_id' => 1
                        ];
                        $save_tariff_pax = $Dashboard_model->save_season_basic_tariff_pax($cw_data);

                        $e_data = [

                            'pax_id' => 3,
                            'hotel_special_tariff_id' => $hotel_special_tariff_id,
                            'tariff' => $extra_tariff_w,
                            'dinner' => $dinner_extra,
                            'lunch' => $lunch_extra,
                            'enterprise_id' => 1
                        ];
                        $save_tariff_pax = $Dashboard_model->save_season_basic_tariff_pax($e_data);

                        if ($save_tariff_pax) {
                            $return_status = 1;
                        } else {
                            $return_status = 0;
                        }
                    }
                }
            }
            return $this->response->setJSON(['status' => $return_status]);
        } else {
            return redirect()->to('Login');
        }
    }

    public function saveRoomfunctionPax()
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model = new Dashboard_m();
            $hotel_room_meal_id = $this->request->getPost('hotel_room_meal_id');
            $child_tariff = $this->request->getPost('child_tariff');
            $child_wb_tariff = $this->request->getPost('child_wb_tariff');
            $extra_tariff = $this->request->getPost('extra_tariff');
            $object_id = $this->request->getPost('object_id');

            $t_exist = $Dashboard_model->check_room_tariff_exist_pax($hotel_room_meal_id);
            if ($t_exist > 0) {
                $c_data = [
                    'exclusive_tariff' => $child_tariff
                ];
                $update_tariff_pax = $Dashboard_model->update_room_basic_tariff_pax($c_data, $hotel_room_meal_id, 1);

                $cw_data = [
                    'exclusive_tariff' => $child_wb_tariff
                ];
                $update_tariff_pax = $Dashboard_model->update_room_basic_tariff_pax($cw_data, $hotel_room_meal_id, 2);

                $e_data = [
                    'exclusive_tariff' => $extra_tariff
                ];
                $update_tariff_pax = $Dashboard_model->update_room_basic_tariff_pax($e_data, $hotel_room_meal_id, 3);

                if ($update_tariff_pax) {
                    echo 1;
                } else {
                    echo 0;
                }
            } else {
                $c_data = [

                    'pax_id' => 1,
                    'hotel_room_meal_id' => $hotel_room_meal_id,
                    'exclusive_tariff' => $child_tariff,
                    'enterprise_id' => 1
                ];
                $save_tariff_pax = $Dashboard_model->save_room_basic_tariff_pax($c_data);

                $cw_data = [

                    'pax_id' => 2,
                    'hotel_room_meal_id' => $hotel_room_meal_id,
                    'exclusive_tariff' => $child_wb_tariff,
                    'enterprise_id' => 1
                ];
                $save_tariff_pax = $Dashboard_model->save_room_basic_tariff_pax($cw_data);

                $e_data = [

                    'pax_id' => 3,
                    'hotel_room_meal_id' => $hotel_room_meal_id,
                    'exclusive_tariff' => $extra_tariff,
                    'enterprise_id' => 1
                ];
                $save_tariff_pax = $Dashboard_model->save_room_basic_tariff_pax($e_data);

                if ($save_tariff_pax) {
                    echo 1;
                } else {
                    echo 0;
                }
            }
        } else {
            return redirect()->to('Login');
        }
    }
    public function saveRoomfunctionWndPax()
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model = new Dashboard_m();
            $special_tariff_id = $this->request->getPost('special_tariff_id');
            $child_tariff = $this->request->getPost('child_tariff');
            $child_wb_tariff = $this->request->getPost('child_wb_tariff');
            $extra_tariff = $this->request->getPost('extra_tariff');
            $object_id = $this->request->getPost('object_id');

            $t_exist = $Dashboard_model->check_room_tariff_exist_wndpax($special_tariff_id);
            if ($t_exist > 0) {
                $c_data = [
                    'tariff' => $child_tariff
                ];
                $update_tariff_pax = $Dashboard_model->update_room_basic_tariff_wndpax($c_data, $special_tariff_id, 1);

                $cw_data = [
                    'tariff' => $child_wb_tariff
                ];
                $update_tariff_pax = $Dashboard_model->update_room_basic_tariff_wndpax($cw_data, $special_tariff_id, 2);

                $e_data = [
                    'tariff' => $extra_tariff
                ];
                $update_tariff_pax = $Dashboard_model->update_room_basic_tariff_wndpax($e_data, $special_tariff_id, 3);

                if ($update_tariff_pax) {
                    echo 1;
                } else {
                    echo 0;
                }
            } else {
                $c_data = [

                    'pax_id' => 1,
                    'special_tariff_id' => $special_tariff_id,
                    'tariff' => $child_tariff,
                    'enterprise_id' => 1
                ];
                $save_tariff_pax = $Dashboard_model->save_room_basic_tariff_wndpax($c_data);

                $cw_data = [

                    'pax_id' => 2,
                    'special_tariff_id' => $special_tariff_id,
                    'tariff' => $child_wb_tariff,
                    'enterprise_id' => 1
                ];
                $save_tariff_pax = $Dashboard_model->save_room_basic_tariff_wndpax($cw_data);

                $e_data = [

                    'pax_id' => 3,
                    'special_tariff_id' => $special_tariff_id,
                    'tariff' => $extra_tariff,
                    'enterprise_id' => 1
                ];
                $save_tariff_pax = $Dashboard_model->save_room_basic_tariff_wndpax($e_data);

                if ($save_tariff_pax) {
                    echo 1;
                } else {
                    echo 0;
                }
            }
        } else {
            return redirect()->to('Login');
        }
    }

    public function saveRoomfunctionSsnPax()
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model = new Dashboard_m();
            $special_tariff_id = $this->request->getPost('special_tariff_id');
            $child_tariff = $this->request->getPost('child_tariff');
            $child_wb_tariff = $this->request->getPost('child_wb_tariff');
            $extra_tariff = $this->request->getPost('extra_tariff');
            $object_id = $this->request->getPost('object_id');

            $t_exist = $Dashboard_model->check_room_tariff_exist_ssnpax($special_tariff_id);
            if ($t_exist > 0) {
                $c_data = [
                    'tariff' => $child_tariff
                ];
                $update_tariff_pax = $Dashboard_model->update_room_basic_tariff_wndpax($c_data, $special_tariff_id, 1);

                $cw_data = [
                    'tariff' => $child_wb_tariff
                ];
                $update_tariff_pax = $Dashboard_model->update_room_basic_tariff_wndpax($cw_data, $special_tariff_id, 2);

                $e_data = [
                    'tariff' => $extra_tariff
                ];
                $update_tariff_pax = $Dashboard_model->update_room_basic_tariff_wndpax($e_data, $special_tariff_id, 3);

                if ($update_tariff_pax) {
                    echo 1;
                } else {
                    echo 0;
                }
            } else {
                $c_data = [

                    'pax_id' => 1,
                    'special_tariff_id' => $special_tariff_id,
                    'tariff' => $child_tariff,
                    'enterprise_id' => 1
                ];
                $save_tariff_pax = $Dashboard_model->save_room_basic_tariff_wndpax($c_data);

                $cw_data = [

                    'pax_id' => 2,
                    'special_tariff_id' => $special_tariff_id,
                    'tariff' => $child_wb_tariff,
                    'enterprise_id' => 1
                ];
                $save_tariff_pax = $Dashboard_model->save_room_basic_tariff_wndpax($cw_data);

                $e_data = [

                    'pax_id' => 3,
                    'special_tariff_id' => $special_tariff_id,
                    'tariff' => $extra_tariff,
                    'enterprise_id' => 1
                ];
                $save_tariff_pax = $Dashboard_model->save_room_basic_tariff_wndpax($e_data);

                if ($save_tariff_pax) {
                    echo 1;
                } else {
                    echo 0;
                }
            }
        } else {
            return redirect()->to('Login');
        }
    }

    public function saveRoomfunctionWnd()
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model = new Dashboard_m();
            $hotel_room_meal_id = $this->request->getPost('hotel_room_meal_id');
            $child_tariff = $this->request->getPost('child_tariff');
            $child_wb_tariff = $this->request->getPost('child_wb_tariff');
            $extra_tariff = $this->request->getPost('extra_tariff');
            $object_id = $this->request->getPost('object_id');

            $t_exist = $Dashboard_model->check_room_tariff_exist_wnd($hotel_room_meal_id);
            if ($t_exist > 0) {
                $c_data = [
                    'tariff' => $child_tariff
                ];
                $update_tariff_pax = $Dashboard_model->update_room_basic_tariff_wnd($c_data, $hotel_room_meal_id, 1);

                $cw_data = [
                    'tariff' => $child_wb_tariff
                ];
                $update_tariff_pax = $Dashboard_model->update_room_basic_tariff_wnd($cw_data, $hotel_room_meal_id, 2);

                $e_data = [
                    'tariff' => $extra_tariff
                ];
                $update_tariff_pax = $Dashboard_model->update_room_basic_tariff_wnd($e_data, $hotel_room_meal_id, 3);

                if ($update_tariff_pax) {
                    echo 1;
                } else {
                    echo 0;
                }
            } else {
                $c_data = [

                    'pax_id' => 1,
                    'hotel_room_meal_id' => $hotel_room_meal_id,
                    'exclusive_tariff' => $child_tariff,
                    'enterprise_id' => 1
                ];
                $save_tariff_pax = $Dashboard_model->save_room_basic_tariff_pax($c_data);

                $cw_data = [

                    'pax_id' => 2,
                    'hotel_room_meal_id' => $hotel_room_meal_id,
                    'exclusive_tariff' => $child_wb_tariff,
                    'enterprise_id' => 1
                ];
                $save_tariff_pax = $Dashboard_model->save_room_basic_tariff_pax($cw_data);

                $e_data = [

                    'pax_id' => 3,
                    'hotel_room_meal_id' => $hotel_room_meal_id,
                    'exclusive_tariff' => $extra_tariff,
                    'enterprise_id' => 1
                ];
                $save_tariff_pax = $Dashboard_model->save_room_basic_tariff_pax($e_data);

                if ($save_tariff_pax) {
                    echo 1;
                } else {
                    echo 0;
                }
            }
        } else {
            return redirect()->to('Login');
        }
    }

    public function hotel_list_view()
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model = new Dashboard_m();

            // Get POST data
            $postData = $this->request->getPost();

            // Check if location_filter is set
            $locationFilter = isset($postData['location_filter']) ? $postData['location_filter'] : '';

            // Pass to model
            $data = $Dashboard_model->hotel_list_view($postData, $locationFilter);

            echo json_encode($data);
        } else {
            return redirect()->to('Login');
        }
    }
    public function vehicle_list_view()
    {
        if (!empty(session()->get('user_id'))) {
          $Dashboard_model = new Dashboard_m();

            // Get POST data
            $postData = $this->request->getPost();

            // Check if location_filter is set
            $locationFilter = isset($postData['location_filter']) ? $postData['location_filter'] : '';

            // Pass to model
            $data = $Dashboard_model->vehicle_list_view($postData, $locationFilter);
            echo json_encode($data);
        } else {
            return redirect()->to('Login');
        }
    }
    public function ss_list_view()
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model = new Dashboard_m();
            $postData = $this->request->getPost();
            $postData['location_filter'] = $postData['location_filter'] ?? '';
            $data = $Dashboard_model->ss_list_view($postData);

            echo json_encode($data);
        } else {
            return redirect()->to('Login');
        }
    }
    public function rc_list_view()
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model = new Dashboard_m();
            $data = $Dashboard_model->rc_list_view($this->request->getPost());
            echo json_encode($data);
        } else {
            return redirect()->to('Login');
        }
    }
    public function entity_list_view()
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model = new Dashboard_m();
            $data = $Dashboard_model->entity_list_view($this->request->getPost());
            echo json_encode($data);
        } else {
            return redirect()->to('Login');
        }
    }
    public function system_role_change()
    {
        $Dashboard_model = new Dashboard_m();
        if (!empty(session()->get('user_id'))) {
            $role_id = $this->request->getPost('role_id');
            $role_name = $this->request->getPost('role_name');
            $datas = $Dashboard_model->getparentandhierarchy($role_id);
            if (!empty($datas)) {
                $parent_id = $datas[0]['parent_id'];
                $hierarchy_id = $datas[0]['hierarchy_id'];
            } else {
                $parent_id = null;
                $hierarchy_id = null;
            }
            $session = session();
            $session->set('active_role', $role_id);
            $session->set('active_role_name', $role_name);
            $session->set('parent_id', $parent_id);
            $session->set('hierarchy_id', $hierarchy_id);
            return $this->response->setJSON(session('active_role'));
        } else {
            return redirect()->to('Login');
        }
    }
    public function khm_system_change()
    {
        if (!empty(session()->get('user_id'))) {
            $system_id = $this->request->getPost('system_id');
            $system_name = $this->request->getPost('system_name');
            $session = session();
            $session->set('system_id', $system_id);
            $session->set('system_name', $system_name);
            return $this->response->setJSON(session('system_id'));
        } else {
            return redirect()->to('Login');
        }
    }
    public function room_category_master()
    {
        if (!empty(session()->get('user_id'))) {

            $Dashboard_model = new Dashboard_m();
            $entity_id = session('user_id');
            $active_role = session('active_role');
            $all_systems = $Dashboard_model->get_all_systems($entity_id);
            $data['all_systems'] = $all_systems;
            $all_roles = $Dashboard_model->get_all_entity_roles($entity_id);
            if (!empty($all_roles)) {
                $data['all_roles_assn'] = $all_roles;
                $all_menus = $Dashboard_model->get_all_role_menus($active_role);
                if (!empty($all_menus)) {
                    $data['all_menus'] = $all_menus;
                } else {
                    $data['all_menus'] = [];
                }
                $all_permissions = $Dashboard_model->get_all_entity_permissions($active_role, 3);
                if (!empty($all_permissions)) {
                    $data['all_permissions'] = $all_permissions;
                } else {
                    $data['all_permissions'] = [];
                }
            } else {
                $data['all_roles_assn'] = [];
                $data['all_menus'] = [];
                $data['all_permissions'] = [];
            }

            $data['object_class_name'] = "Room Category";
            $parent_menu = $Dashboard_model->get_parent_menus();
            $sub_menu = $Dashboard_model->get_sub_menus();
            $data['parent_menu'] = $parent_menu;
            $data['sub_menu'] = $sub_menu;

            return view('dashboard/view_room_category', $data);
        } else {
            return redirect()->to('Login');
        }
    }

    public function add_object_rc($edit_id = null)
    {
        if (!empty(session()->get('user_id'))) {

            $Dashboard_model = new Dashboard_m();
            $entity_id = session('user_id');
            $active_role = session('active_role');
            $all_systems = $Dashboard_model->get_all_systems($entity_id);
            $data['all_systems'] = $all_systems;
            $all_roles = $Dashboard_model->get_all_entity_roles($entity_id);
            if (!empty($all_roles)) {
                $data['all_roles_assn'] = $all_roles;
                $all_menus = $Dashboard_model->get_all_role_menus($active_role);
                if (!empty($all_menus)) {
                    $data['all_menus'] = $all_menus;
                } else {
                    $data['all_menus'] = [];
                }
                $all_permissions = $Dashboard_model->get_all_entity_permissions($active_role, 3);
                if (!empty($all_permissions)) {
                    $data['all_permissions'] = $all_permissions;
                } else {
                    $data['all_permissions'] = [];
                }
            } else {
                $data['all_roles_assn'] = [];
                $data['all_menus'] = [];
                $data['all_permissions'] = [];
            }
            if ($edit_id) {
                $object_datas = $Dashboard_model->load_object_rc_datas($edit_id);
                $room_category_name = $object_datas[0]['room_category_name'];
            } else {

                $room_category_name = '';
            }
            $all_rc = $Dashboard_model->get_all_rc();


            $enterprise_id = 1;


            $parent_menu = $Dashboard_model->get_parent_menus();
            $sub_menu = $Dashboard_model->get_sub_menus();
            $data['parent_menu'] = $parent_menu;
            $data['sub_menu'] = $sub_menu;
            $data['room_category_name'] = $room_category_name;


            $data['edit_id'] = $edit_id;
            $data['all_rc'] = $all_rc;


            return view('dashboard/add_object_rc', $data);
        } else {
            return redirect()->to('Login');
        }
    }

    public function saveObjectrc()
    {
        if (!empty(session()->get('user_id'))) {

            $Dashboard_model = new Dashboard_m();

            $object_edit_id = $this->request->getPost('object_edit_id');



            if ($object_edit_id > 0) {
                $bURL = config('App')->baseURL;
                $room_cat_name = $this->request->getPost('room_cat_name');
                $sURL = site_url('Dashboard/room_category_master');
                $baseURL = ($bURL === '') ? $bURL : rtrim($bURL, '/ ') . '/';



                $datas = array(
                    'room_category_name' => $this->request->getPost('room_cat_name'),

                );
                $update_id1 = $Dashboard_model->update_object_rc($datas, $object_edit_id);
                return redirect()->to($sURL);
            } else {
                $bURL = config('App')->baseURL;
                $class_id = $this->request->getPost('object_class_id');
                $sURL = site_url('Dashboard/room_category_master');
                $baseURL = ($bURL === '') ? $bURL : rtrim($bURL, '/ ') . '/';



                $datas = array(
                    'room_category_name' => $this->request->getPost('room_cat_name'),

                );

                $object_id = $Dashboard_model->insert_object_rc($datas);
                return redirect()->to($sURL);
            }
        } else {
            return redirect()->to('Login');
        }
    }
    public function switchRoomCategoryOrder()
    {
        $Dashboard_model = new Dashboard_m();
        $id = $this->request->getPost('hotel_room_category_id');
        $direction = $this->request->getPost('direction');

        $Dashboard_model->switchRoomCategoryOrder($id, $direction);
        return $this->response->setJSON(['status' => 1]);
    }
}
