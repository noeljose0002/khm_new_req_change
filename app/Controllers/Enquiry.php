<?php

namespace App\Controllers;
use App\Models\Dashboard_m;
use App\Models\Enquiry_m;
use DateTime;
use DateTimeZone;
use DateInterval;
use DatePeriod;

class Enquiry extends BaseController
{
    public function enquiry_list_view($object_class_id)
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model = new Dashboard_m();
            $Enquiry_model = new Enquiry_m();
            $parent_id = session('parent_id');
            $hierarchy_id = session('hierarchy_id');
            $hotel_categories = $Dashboard_model->get_hotel_categories();
            $entity_id = session('user_id');
            $active_role = session('active_role');
            $all_systems = $Dashboard_model->get_all_systems($entity_id);
            $data['all_systems'] = $all_systems;
            $all_roles = $Dashboard_model->get_all_entity_roles($entity_id);
            if(!empty($all_roles)){
                $data['all_roles_assn'] = $all_roles;
                $all_menus = $Dashboard_model->get_all_role_menus($active_role);
                if(!empty($all_menus)){
                    $data['all_menus'] = $all_menus;
                }
                else{
                    $data['all_menus'] = [];
                }
                $all_permissions = $Dashboard_model->get_all_entity_permissions($active_role,3);
                if(!empty($all_permissions)){
                    $data['all_permissions'] = $all_permissions;
                }
                else{
                    $data['all_permissions'] = [];
                }
            }
            else{
                $data['all_roles_assn'] = [];
                $data['all_menus'] = [];
                $data['all_permissions'] = [];
            }
            $object_class_det = $Dashboard_model->get_object_class_details($object_class_id);
            if(!empty($object_class_det)){
                $data['object_class_name'] = $object_class_det[0]['object_class_name'];
            }
            else{
                $data['object_class_name'] = null;
            }
            
            $parent_menu = $Dashboard_model->get_parent_menus();
            $sub_menu = $Dashboard_model->get_sub_menus();
            $data['parent_menu'] = $parent_menu;
            $data['sub_menu'] = $sub_menu;
            $data['object_class_id'] = $object_class_id;
            $data['hotel_categories'] = $hotel_categories;
            $data['parent_id'] = $parent_id;
            $data['hierarchy_id'] = $hierarchy_id;

            $all_permissions = [];
            $add_per = 0;
            $edit_per = 0;
            $view_per = 0;
            $del_per = 0;
            $all_permissions = $Dashboard_model->get_all_permissions(24,$active_role);
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

            return view('enquiry/enquiry_list_view',$data);
        }
        else{
            return redirect()->to('Login');
        }    
    }

    public function sales_report()
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model = new Dashboard_m();
            $Enquiry_model = new Enquiry_m();
            $parent_id = session('parent_id');
            $hierarchy_id = session('hierarchy_id');
            $entity_id = session('user_id');
            $active_role = session('active_role');
            $all_systems = $Dashboard_model->get_all_systems($entity_id);
            $data['all_systems'] = $all_systems;
            $all_roles = $Dashboard_model->get_all_entity_roles($entity_id);
            if(!empty($all_roles)){
                $data['all_roles_assn'] = $all_roles;
                $all_menus = $Dashboard_model->get_all_role_menus($active_role);
                if(!empty($all_menus)){
                    $data['all_menus'] = $all_menus;
                }
                else{
                    $data['all_menus'] = [];
                }
                $all_permissions = $Dashboard_model->get_all_entity_permissions($active_role,3);
                if(!empty($all_permissions)){
                    $data['all_permissions'] = $all_permissions;
                }
                else{
                    $data['all_permissions'] = [];
                }
            }
            else{
                $data['all_roles_assn'] = [];
                $data['all_menus'] = [];
                $data['all_permissions'] = [];
            }
            $all_executives = $Dashboard_model->get_all_executives();
            $all_status = $Enquiry_model->get_all_status();
            $all_agents = $Enquiry_model->get_all_agents();
            $parent_menu = $Dashboard_model->get_parent_menus();
            $sub_menu = $Dashboard_model->get_sub_menus();
            $data['parent_menu'] = $parent_menu;
            $data['sub_menu'] = $sub_menu;
            $data['parent_id'] = $parent_id;
            $data['hierarchy_id'] = $hierarchy_id;
            $data['all_executives'] = $all_executives;
            $data['all_status'] = $all_status;
            $data['all_agents'] = $all_agents;
            return view('enquiry/sales_report',$data);
        }
        else{
            return redirect()->to('Login');
        }    
    }
    public function sales_report_new()
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model = new Dashboard_m();
            $Enquiry_model = new Enquiry_m();
            $parent_id = session('parent_id');
            $hierarchy_id = session('hierarchy_id');
            $entity_id = session('user_id');
            $active_role = session('active_role');
            $all_systems = $Dashboard_model->get_all_systems($entity_id);
            $data['all_systems'] = $all_systems;
            $all_roles = $Dashboard_model->get_all_entity_roles($entity_id);
            if(!empty($all_roles)){
                $data['all_roles_assn'] = $all_roles;
                $all_menus = $Dashboard_model->get_all_role_menus($active_role);
                if(!empty($all_menus)){
                    $data['all_menus'] = $all_menus;
                }
                else{
                    $data['all_menus'] = [];
                }
                $all_permissions = $Dashboard_model->get_all_entity_permissions($active_role,3);
                if(!empty($all_permissions)){
                    $data['all_permissions'] = $all_permissions;
                }
                else{
                    $data['all_permissions'] = [];
                }
            }
            else{
                $data['all_roles_assn'] = [];
                $data['all_menus'] = [];
                $data['all_permissions'] = [];
            }
            $all_executives = $Dashboard_model->get_all_executives();
            $all_status = $Enquiry_model->get_all_status();
            $all_agents = $Enquiry_model->get_all_agents();
            $parent_menu = $Dashboard_model->get_parent_menus();
            $sub_menu = $Dashboard_model->get_sub_menus();
            $data['parent_menu'] = $parent_menu;
            $data['sub_menu'] = $sub_menu;
            $data['parent_id'] = $parent_id;
            $data['hierarchy_id'] = $hierarchy_id;
            $data['all_executives'] = $all_executives;
            $data['all_status'] = $all_status;
            $data['all_agents'] = $all_agents;
            return view('enquiry/sales_report_new',$data);
        }
        else{
            return redirect()->to('Login');
        }    
    }
    public function payment_tracker()
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model = new Dashboard_m();
            $Enquiry_model = new Enquiry_m();
            $parent_id = session('parent_id');
            $hierarchy_id = session('hierarchy_id');
            $entity_id = session('user_id');
            $active_role = session('active_role');
            $all_systems = $Dashboard_model->get_all_systems($entity_id);
            $data['all_systems'] = $all_systems;
            $all_roles = $Dashboard_model->get_all_entity_roles($entity_id);
            if(!empty($all_roles)){
                $data['all_roles_assn'] = $all_roles;
                $all_menus = $Dashboard_model->get_all_role_menus($active_role);
                if(!empty($all_menus)){
                    $data['all_menus'] = $all_menus;
                }
                else{
                    $data['all_menus'] = [];
                }
                $all_permissions = $Dashboard_model->get_all_entity_permissions($active_role,3);
                if(!empty($all_permissions)){
                    $data['all_permissions'] = $all_permissions;
                }
                else{
                    $data['all_permissions'] = [];
                }
            }
            else{
                $data['all_roles_assn'] = [];
                $data['all_menus'] = [];
                $data['all_permissions'] = [];
            }
            $all_executives = $Dashboard_model->get_all_executives();
            $all_status = $Enquiry_model->get_all_status();
            $all_agents = $Enquiry_model->get_all_agents();
            $parent_menu = $Dashboard_model->get_parent_menus();
            $sub_menu = $Dashboard_model->get_sub_menus();
            $data['parent_menu'] = $parent_menu;
            $data['sub_menu'] = $sub_menu;
            $data['parent_id'] = $parent_id;
            $data['hierarchy_id'] = $hierarchy_id;
            $data['all_executives'] = $all_executives;
            $data['all_status'] = $all_status;
            $data['all_agents'] = $all_agents;
            return view('enquiry/payment_tracker',$data);
        }
        else{
            return redirect()->to('Login');
        }    
    }

    public function confirm_costing_sheet($enquiry_header_id,$object_id){
        $Dashboard_model = new Dashboard_m();
        $Enquiry_model = new Enquiry_m();
        $object_class_id = 10; 
        $entity_id = session('user_id');
        $active_role = session('active_role');
        $all_systems = $Dashboard_model->get_all_systems($entity_id);
        $data['all_systems'] = $all_systems;
        $all_roles = $Dashboard_model->get_all_entity_roles($entity_id);
        if(!empty($all_roles)){
            $data['all_roles_assn'] = $all_roles;
            $all_menus = $Dashboard_model->get_all_role_menus($active_role);
            if(!empty($all_menus)){
                $data['all_menus'] = $all_menus;
            }
            else{
                $data['all_menus'] = [];
            }
            $all_permissions = $Dashboard_model->get_all_entity_permissions($active_role,3);
            if(!empty($all_permissions)){
                $data['all_permissions'] = $all_permissions;
            }
            else{
                $data['all_permissions'] = [];
            }
        }
        else{
            $data['all_roles_assn'] = [];
            $data['all_menus'] = [];
            $data['all_permissions'] = [];
        }
        $enterprise_id = 1;
        $object_type_id = 5;
        $parent_menu = $Dashboard_model->get_parent_menus();
        $sub_menu = $Dashboard_model->get_sub_menus();
        $data['parent_menu'] = $parent_menu;
        $data['sub_menu'] = $sub_menu;
        $data['object_class_id'] = $object_class_id;
        $data['object_type_id'] = $object_type_id;
        $data['enquiry_header_id'] = $enquiry_header_id;
        $data['object_det'] = $Enquiry_model->get_object_details($object_id);
        //$data['cs_datas'] = $Enquiry_model->get_all_cs_details($enquiry_header_id);
        $data['object_class_name'] = "Enquiry";
        $data['object_id'] = $object_id;

        $all_permissions = [];
            $add_per = 0;
            $edit_per = 0;
            $view_per = 0;
            $del_per = 0;
            $all_permissions = $Dashboard_model->get_all_permissions(24,$active_role);
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
        return view('enquiry/itinerary_details_view',$data);
    }
    public function payments($enquiry_header_id=null,$cs_confirmed_id=null){
        $Dashboard_model = new Dashboard_m();
        $Enquiry_model = new Enquiry_m();
        $parent_id = session('parent_id');
        $object_class_id = 10; 
        $entity_id = session('user_id');
        $active_role = session('active_role');
        $all_systems = $Dashboard_model->get_all_systems($entity_id);
        $data['all_systems'] = $all_systems;
        $all_roles = $Dashboard_model->get_all_entity_roles($entity_id);
        if(!empty($all_roles)){
            $data['all_roles_assn'] = $all_roles;
            $all_menus = $Dashboard_model->get_all_role_menus($active_role);
            if(!empty($all_menus)){
                $data['all_menus'] = $all_menus;
            }
            else{
                $data['all_menus'] = [];
            }
            $all_permissions = $Dashboard_model->get_all_entity_permissions($active_role,3);
            if(!empty($all_permissions)){
                $data['all_permissions'] = $all_permissions;
            }
            else{
                $data['all_permissions'] = [];
            }
        }
        else{
            $data['all_roles_assn'] = [];
            $data['all_menus'] = [];
            $data['all_permissions'] = [];
        }
        $enterprise_id = 1;
        $object_type_id = 5;
        $parent_menu = $Dashboard_model->get_parent_menus();
        $sub_menu = $Dashboard_model->get_sub_menus();
        $data['parent_menu'] = $parent_menu;
        $data['sub_menu'] = $sub_menu;
        $data['object_class_id'] = $object_class_id;
        $data['cs_confirmed_id'] = $cs_confirmed_id;
        $data['enquiry_header_id'] = $enquiry_header_id;
        $data['parent_id'] = $parent_id;
        //$data['object_det'] = $Enquiry_model->get_object_details($object_id);
        //$data['cs_datas'] = $Enquiry_model->get_all_cs_details($enquiry_header_id);
        $data['object_class_name'] = "Enquiry";

        $all_permissions = [];
            $add_per = 0;
            $edit_per = 0;
            $view_per = 0;
            $del_per = 0;
            $all_permissions = $Dashboard_model->get_all_permissions(68,$active_role);
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

        return view('enquiry/payment_view',$data);
    }
    public function proforma_view($enquiry_header_id=null,$cs_confirmed_id=null){
        $Dashboard_model = new Dashboard_m();
        $Enquiry_model = new Enquiry_m();
        $parent_id = session('parent_id');
        $object_class_id = 10; 
        $entity_id = session('user_id');
        $active_role = session('active_role');
        $all_systems = $Dashboard_model->get_all_systems($entity_id);
        $data['all_systems'] = $all_systems;
        $all_roles = $Dashboard_model->get_all_entity_roles($entity_id);
        if(!empty($all_roles)){
            $data['all_roles_assn'] = $all_roles;
            $all_menus = $Dashboard_model->get_all_role_menus($active_role);
            if(!empty($all_menus)){
                $data['all_menus'] = $all_menus;
            }
            else{
                $data['all_menus'] = [];
            }
            $all_permissions = $Dashboard_model->get_all_entity_permissions($active_role,3);
            if(!empty($all_permissions)){
                $data['all_permissions'] = $all_permissions;
            }
            else{
                $data['all_permissions'] = [];
            }
        }
        else{
            $data['all_roles_assn'] = [];
            $data['all_menus'] = [];
            $data['all_permissions'] = [];
        }
        $enterprise_id = 1;
        $object_type_id = 5;
        $parent_menu = $Dashboard_model->get_parent_menus();
        $sub_menu = $Dashboard_model->get_sub_menus();
        $data['parent_menu'] = $parent_menu;
        $data['sub_menu'] = $sub_menu;
        $data['object_class_id'] = $object_class_id;
        $data['cs_confirmed_id'] = $cs_confirmed_id;
        $data['enquiry_header_id'] = $enquiry_header_id;
        $data['parent_id'] = $parent_id;
        //$data['object_det'] = $Enquiry_model->get_object_details($object_id);
        //$data['cs_datas'] = $Enquiry_model->get_all_cs_details($enquiry_header_id);
        $data['object_class_name'] = "Enquiry";
        return view('enquiry/proforma_view',$data);
    }

    public function latest_payments($enquiry_header_id=null,$cs_confirmed_id=null){
        $Dashboard_model = new Dashboard_m();
        $Enquiry_model = new Enquiry_m();
        $parent_id = session('parent_id');
        $object_class_id = 10; 
        $entity_id = session('user_id');
        $active_role = session('active_role');
        $all_systems = $Dashboard_model->get_all_systems($entity_id);
        $data['all_systems'] = $all_systems;
        $all_roles = $Dashboard_model->get_all_entity_roles($entity_id);
        if(!empty($all_roles)){
            $data['all_roles_assn'] = $all_roles;
            $all_menus = $Dashboard_model->get_all_role_menus($active_role);
            if(!empty($all_menus)){
                $data['all_menus'] = $all_menus;
            }
            else{
                $data['all_menus'] = [];
            }
            $all_permissions = $Dashboard_model->get_all_entity_permissions($active_role,3);
            if(!empty($all_permissions)){
                $data['all_permissions'] = $all_permissions;
            }
            else{
                $data['all_permissions'] = [];
            }
        }
        else{
            $data['all_roles_assn'] = [];
            $data['all_menus'] = [];
            $data['all_permissions'] = [];
        }
        $enterprise_id = 1;
        $object_type_id = 5;
        $parent_menu = $Dashboard_model->get_parent_menus();
        $sub_menu = $Dashboard_model->get_sub_menus();
        $data['parent_menu'] = $parent_menu;
        $data['sub_menu'] = $sub_menu;
        $data['object_class_id'] = $object_class_id;
        $data['cs_confirmed_id'] = $cs_confirmed_id;
        $data['enquiry_header_id'] = $enquiry_header_id;
        $data['parent_id'] = $parent_id;
        //$data['object_det'] = $Enquiry_model->get_object_details($object_id);
        //$data['cs_datas'] = $Enquiry_model->get_all_cs_details($enquiry_header_id);
        $data['object_class_name'] = "Enquiry";

            $all_permissions = [];
            $add_per = 0;
            $edit_per = 0;
            $view_per = 0;
            $del_per = 0;
            $all_permissions = $Dashboard_model->get_all_permissions(67,$active_role);
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
        return view('enquiry/latest_payment_view',$data);
    }
    public function followup_form($enquiry_header_id,$confirm_cs_id){ 
        $Dashboard_model = new Dashboard_m();
        $Enquiry_model = new Enquiry_m();
        $extension_ref_id = "";
        $tour_plan_ref_id = "";
        $enquiry_ref_id = "";
        $all_transporter = $Dashboard_model->get_all_transporter();
        $vehicle_details = [];
        $no_of_adult = "";
        $no_of_child_with_bed = "";
        $no_of_child_without_bed = "";
        $object_class_id = 10; 
        $entity_id = session('user_id');
        $active_role = session('active_role');
        $all_systems = $Dashboard_model->get_all_systems($entity_id);
        $data['all_systems'] = $all_systems;
        $all_roles = $Dashboard_model->get_all_entity_roles($entity_id);
        if(!empty($all_roles)){
            $data['all_roles_assn'] = $all_roles;
            $all_menus = $Dashboard_model->get_all_role_menus($active_role);
            if(!empty($all_menus)){
                $data['all_menus'] = $all_menus;
            }
            else{
                $data['all_menus'] = [];
            }
            $all_permissions = $Dashboard_model->get_all_entity_permissions($active_role,3);
            if(!empty($all_permissions)){
                $data['all_permissions'] = $all_permissions;
            }
            else{
                $data['all_permissions'] = [];
            }
        }
        else{
            $data['all_roles_assn'] = [];
            $data['all_menus'] = [];
            $data['all_permissions'] = [];
        }
        $enterprise_id = 1;
        $object_type_id = 5;
        $parent_menu = $Dashboard_model->get_parent_menus();
        $sub_menu = $Dashboard_model->get_sub_menus();
        $data['parent_menu'] = $parent_menu;
        $data['sub_menu'] = $sub_menu;
        $data['object_class_id'] = $object_class_id;
        $data['object_type_id'] = $object_type_id;
        $data['enquiry_header_id'] = $enquiry_header_id;
        $data['confirm_cs_id'] = $confirm_cs_id;
        $object_det = $Enquiry_model->get_object_details_byheader($enquiry_header_id);
        $guest_det = $Enquiry_model->get_guest_details_for_followup($enquiry_header_id);
        $ext_det = $Enquiry_model->getExtensionDetailsbyid($confirm_cs_id);
        $cut_off_date = $object_det[0]['cut_off_date'];
        $data['cut_off_date'] = $cut_off_date;
        $data['object_det'] = $object_det;
        $data['guest_det'] = $guest_det;
        if(!empty($ext_det)){
            $extension_ref_id = $ext_det[0]['extension_ref_id'];
            $tour_plan_ref_id = $ext_det[0]['tour_plan_ref_id'];
            $enquiry_ref_id = $ext_det[0]['enquiry_ref_id'];
        }
        
        $data['extension_ref_id'] = $extension_ref_id;
        $data['tour_plan_ref_id'] = $tour_plan_ref_id;
        $data['enquiry_ref_id'] = $enquiry_ref_id;
        
        $enq_details = $Enquiry_model->get_enquiry_details_data($enquiry_header_id,$enquiry_ref_id);
        if(!empty($enq_details)){
            $no_of_adult = $enq_details[0]['no_of_adult'];
            $no_of_child_with_bed = $enq_details[0]['no_of_child_with_bed'];
            $no_of_child_without_bed = $enq_details[0]['no_of_child_without_bed'];
            if($enq_details[0]['is_vehicle_required'] == 1){
                $vehicle_details = $enq_details[0]['vehicle_type_id'];
            }
        }
        $data['no_of_adult'] = $no_of_adult;
        $data['no_of_child_with_bed'] = $no_of_child_with_bed;
        $data['no_of_child_without_bed'] = $no_of_child_without_bed;
        if(!empty($vehicle_details)){
            $data['vehicle_details'] = json_decode($vehicle_details, true);
        }
        else{
            $data['vehicle_details'] = [];
        }
        $data['all_transporter'] = $all_transporter;
        $data['object_class_name'] = "Enquiry";
        $data['guest_name'] = $object_det[0]['guest_name'];
        $data['agent_name'] = $object_det[0]['agent_name']?$object_det[0]['agent_name']:'';
        $data['ref_no'] = $object_det[0]['ref_no'];
        $data['object_id'] = $object_det[0]['object_id'];
        return view('enquiry/followup_view',$data);
    }
    public function enquiry_list_data()
    {
        if (!empty(session()->get('user_id'))) {
            $Enquiry_model = new Enquiry_m();
            $data = $Enquiry_model->enquiry_list_data($this->request->getPost());
            echo json_encode($data);
        }
        else{
            return redirect()->to('Login');
        }
    }
    public function add_object_enquiry($object_class_id,$edit_id = null)
    {
        if (!empty(session()->get('user_id'))) {
            $Enquiry_model = new Enquiry_m();
            $Dashboard_model = new Dashboard_m();
            $entity_id = session('user_id');
            $active_role = session('active_role');
            $all_systems = $Dashboard_model->get_all_systems($entity_id);
            $data['all_systems'] = $all_systems;
            $all_roles = $Dashboard_model->get_all_entity_roles($entity_id);
            $employees_all = [];
            $employees_all = $Dashboard_model->get_all_employees_for_reassign();
            if(!empty($all_roles)){
                $data['all_roles_assn'] = $all_roles;
                $all_menus = $Dashboard_model->get_all_role_menus($active_role);
                if(!empty($all_menus)){
                    $data['all_menus'] = $all_menus;
                }
                else{
                    $data['all_menus'] = [];
                }
                $all_permissions = $Dashboard_model->get_all_entity_permissions($active_role,3);
                if(!empty($all_permissions)){
                    $data['all_permissions'] = $all_permissions;
                }
                else{
                    $data['all_permissions'] = [];
                }
            }
            else{
                $data['all_roles_assn'] = [];
                $data['all_menus'] = [];
                $data['all_permissions'] = [];
            }
            if($edit_id){
                $object_datas = $Enquiry_model->load_object_enquiry_datas_foredit($edit_id);
                $obj_name = $object_datas[0]['object_name'];
                $obj_loc = $object_datas[0]['object_location_id'];
                if(!empty($object_datas[0]['agentid'])){
                    $agentid = $object_datas[0]['agentid'];
                    $agent_details = $Enquiry_model->getAgentDetailsforedit($agentid);
                    foreach($agent_details as $keys => $vals){
                        if($vals['entity_attribute_id'] == "15"){
                            $agent_state_id = $vals['entity_attr_value'];
                        }
                    }
                }
                else{
                    $agentid = '';
                    $agent_details = [];
                    $agent_state_id = '';
                }
                $guestid = $object_datas[0]['guestid'];
                $date_of_tour_start = $object_datas[0]['date_of_tour_start'];
                $no_of_night = $object_datas[0]['no_of_night'];
                $date_of_tour_completion = $object_datas[0]['date_of_tour_completion'];
                $enquiry_source = $object_datas[0]['enquiry_source'];
                $total_no_of_pax = $object_datas[0]['total_no_of_pax'];
                $no_of_adult = $object_datas[0]['no_of_adult'];
                $no_of_child_with_bed = $object_datas[0]['no_of_child_with_bed'];
                $no_of_child_without_bed = $object_datas[0]['no_of_child_without_bed'];
                $no_of_double_room = $object_datas[0]['no_of_double_room'];
                $no_of_single_room = $object_datas[0]['no_of_single_room'];
                $no_of_extra_bed = $object_datas[0]['no_of_extra_bed'];
                $gstin = $object_datas[0]['gstin'];
                $vehicle_from_location = $object_datas[0]['vehicle_from_location'];
                $arrival_location = $object_datas[0]['arrival_location'];
                $departure_location = $object_datas[0]['departure_location'];
                $hotel_category = $object_datas[0]['hotel_category'];
                $meal_plan = $object_datas[0]['meal_plan'];
                $is_vehicle_required = $object_datas[0]['is_vehicle_required'];
                $is_sight_seeing_required = $object_datas[0]['is_sight_seeing_required'];
                $is_quick_quote = $object_datas[0]['is_quick_quote'];
                $enq_description = $object_datas[0]['enq_description'];
                $source_reference = $object_datas[0]['source_reference'];
                $sales_support_assigned_to = $object_datas[0]['sales_support_assigned_to'];

                $obj_mobiles = json_decode($object_datas[0]['object_ph_no'],true);
                $obj_emails = json_decode($object_datas[0]['object_email'],true);
                $obj_addresss = json_decode($object_datas[0]['object_address'],true);

                $obj_mobile = $obj_mobiles[0];
                $obj_email = $obj_emails[0];
                $obj_address = $obj_addresss[0];

                $agentaddress = json_decode($object_datas[0]['agentaddress'],true);
                $vehicle_type_id = json_decode($object_datas[0]['vehicle_type_id'],true);

                
            }
            else{
          
                $obj_name = '';
                $obj_loc = '';

                $agentid = '';
                $guestid = '';
                $date_of_tour_start = '';
                $no_of_night = '';
                $date_of_tour_completion = '';
                $enquiry_source = '';
                $total_no_of_pax = '';
                $no_of_adult = '';
                $no_of_child_with_bed = '';
                $no_of_child_without_bed = '';
                $no_of_double_room = '';
                $no_of_single_room = '';
                $no_of_extra_bed = '';
                $gstin = '';
                $vehicle_from_location = '';
                $arrival_location = '';
                $departure_location = '';
                $hotel_category = '';
                $meal_plan = '';
                $is_vehicle_required = '';
                $is_sight_seeing_required = '';
                $is_quick_quote = '';
                $enq_description = '';
                
                $obj_mobile = '';
                $obj_email = '';
                $obj_address = '';

                $agentaddress = [];
                $vehicle_type_id = [];
                $agent_details = [];
                $agent_state_id = '';
                $source_reference = '';
                $sales_support_assigned_to = '';
            }
            $all_locations = $Dashboard_model->get_all_locations();
            $arrival_locations = $Dashboard_model->get_arrival_locations();
            $departure_locations = $Dashboard_model->get_departure_locations();
            $hotel_categories = $Dashboard_model->get_hotel_categories();
            $meal_plans = $Dashboard_model->get_meal_plan();
            $hub_loc = $Dashboard_model->get_hub_location();
            $enterprise_id = 1;
            //$attributes = $Dashboard_model->get_all_obj_attributes($object_class_id);
            //$boolean_attributes = $Dashboard_model->get_obj_boolean_attributes($object_class_id);
            $object_class_det = $Dashboard_model->get_object_class_details($object_class_id);
            $object_type_id = 5;
            $parent_menu = $Dashboard_model->get_parent_menus();
            $sub_menu = $Dashboard_model->get_sub_menus();
            $data['parent_menu'] = $parent_menu;
            $data['sub_menu'] = $sub_menu;
            $data['object_class_id'] = $object_class_id;
            $data['object_type_id'] = $object_type_id;
            if(!empty($object_class_det)){
                $data['object_class_name'] = $object_class_det[0]['object_class_name'];
            }
            else{
                $data['object_class_name'] = null;
            }
            $data['states'] = $Enquiry_model->indian_states();
            $data['all_agents'] = $Enquiry_model->get_all_agents();
            $data['all_locations'] = $all_locations;
            $data['arrival_locations'] = $arrival_locations;
            $data['departure_locations'] = $departure_locations;
            $data['hotel_categories'] = $hotel_categories;
            $data['meal_plans'] = $meal_plans;
            $data['hub_loc'] = $hub_loc;
            $data['enterprise_id'] = $enterprise_id;
            $data['edit_id'] = $edit_id;

            $data['obj_name'] = $obj_name;
            $data['obj_loc'] = $obj_loc;
            $data['agentid'] = $agentid;
            $data['guestid'] = $guestid;
            $data['date_of_tour_start'] = $date_of_tour_start;
            $data['no_of_night'] = $no_of_night;
            $data['date_of_tour_completion'] = $date_of_tour_completion;
            $data['enquiry_source'] = $enquiry_source;
            $data['total_no_of_pax'] = $total_no_of_pax;
            $data['no_of_adult'] = $no_of_adult;
            $data['no_of_child_with_bed'] = $no_of_child_with_bed;
            $data['no_of_child_without_bed'] = $no_of_child_without_bed;
            $data['no_of_double_room'] = $no_of_double_room;
            $data['no_of_single_room'] = $no_of_single_room;
            $data['no_of_extra_bed'] = $no_of_extra_bed;
            $data['gstin'] = $gstin;
            $data['vehicle_from_location'] = $vehicle_from_location;
            $data['arrival_location'] = $arrival_location;
            $data['departure_location'] = $departure_location;
            $data['hotel_category'] = $hotel_category;
            $data['meal_plan'] = $meal_plan;
            $data['is_vehicle_required'] = $is_vehicle_required;
            $data['is_sight_seeing_required'] = $is_sight_seeing_required;
            $data['is_quick_quote'] = $is_quick_quote;
            $data['enq_description'] = $enq_description;

            $data['obj_mobile'] = $obj_mobile;
            $data['obj_email'] = $obj_email;
            $data['obj_address'] = $obj_address;
            $data['agentaddress'] = $agentaddress;
            $data['vehicle_type_id'] = $vehicle_type_id;
            $data['agent_details'] = $agent_details; 
            $data['agent_state_id'] = $agent_state_id;
            $data['source_reference'] = $source_reference;
            $data['active_role'] = $active_role;
            $data['employees_all'] = $employees_all;
            $data['sales_support_assigned_to'] = $sales_support_assigned_to;
            return view('enquiry/add_object_enquiry',$data);
        }
        else{
            return redirect()->to('Login');
        }
    }
    function getAgents()
    {
        $Enquiry_model = new Enquiry_m();
        if ($this->request->getPost('location_id')) {
            echo $Enquiry_model->get_agents($this->request->getPost('location_id'));
        }
    }
    function getTourHotels()
    {
        $Enquiry_model = new Enquiry_m();
        $is_quick_quote = $this->request->getPost('is_quick_quote');
        $tour_location_id = $this->request->getPost('tour_location_id');
        if ($this->request->getPost('hotel_cat_id')) {
            echo $Enquiry_model->getTourHotels($this->request->getPost('hotel_cat_id'),$tour_location_id,$is_quick_quote);
        }
    }
    function getTourHotelsDraft()
    {
        $Enquiry_model = new Enquiry_m();
        $is_quick_quote = $this->request->getPost('is_quick_quote');
        $tour_location_id = $this->request->getPost('tour_location_id');
        $hid = $this->request->getPost('hid');
        if ($this->request->getPost('hotel_cat_id')) {
            echo $Enquiry_model->getTourHotelsDraft($this->request->getPost('hotel_cat_id'),$tour_location_id,$is_quick_quote,$hid);
        }
    }
    /*function getTourRoomCategory()
    {
        $Enquiry_model = new Enquiry_m();
      
            echo $Enquiry_model->getTourRoomCategory($this->request->getPost('hotel_id'),$this->request->getPost('no_of_double_room'),$this->request->getPost('no_of_single_room'));
       
    }*/
    public function getTourRoomCategory()
    {
        $Enquiry_model = new Enquiry_m();
        $hotel_id = $this->request->getPost('hotel_id');
        $no_of_double_room = $this->request->getPost('no_of_double_room');
        $no_of_single_room = $this->request->getPost('no_of_single_room');

        $response = $Enquiry_model->getTourRoomCategory($hotel_id, $no_of_double_room, $no_of_single_room);

        echo json_encode($response); // now returning JSON
    }        
    public function getHotelFaciliyTariffNew()
    {
        $Enquiry_model = new Enquiry_m();
        $facility_id = $this->request->getPost('facility_id');
        $response = $Enquiry_model->getHotelFaciliyTariffNew($facility_id);
        echo json_encode($response);
    } 
    function getHotelfacilities()
    {
        $Enquiry_model = new Enquiry_m();
        echo $Enquiry_model->getHotelfacilities($this->request->getPost('hotel_id'));
    }
    public function getHotelFacilityTariff()
    {
        $facility_ids = $this->request->getPost('facility_ids'); // this is now an array
        $Enquiry_model = new Enquiry_m();

        $result = $Enquiry_model->getHotelFacilityTariff($facility_ids);
        return $this->response->setJSON($result);
    }
    function getSightSeeingTariff()
    {
        $Enquiry_model = new Enquiry_m();
        //if ($this->request->getPost('hotel_id')) {
            $result =  $Enquiry_model->getSightSeeingTariff($this->request->getPost('sight_seeing_id'));
            if(!empty($result)){
                echo json_encode($result);
            }
            else{
                echo 0;
            }
        //}
    }
    function getItineraryDetailsById()
    {
        $Enquiry_model = new Enquiry_m();
            $result =  $Enquiry_model->getItineraryDetailsById($this->request->getPost('itinerary_id'));
            if(!empty($result)){
                echo json_encode($result);
            }
            else{
                echo 0;
            }
    }
    function getallitineraryids()
    {
        $Enquiry_model = new Enquiry_m();
            $result =  $Enquiry_model->getallitineraryids($this->request->getPost('final_save_flag'));
            echo json_encode($result);
    }
    function getTourRoomCategoryDraft()
    {
        /*$Enquiry_model = new Enquiry_m();
        if ($this->request->getPost('hotel_id')) {
            echo $Enquiry_model->getTourRoomCategoryDraft($this->request->getPost('hotel_id'),$this->request->getPost('rid'),$this->request->getPost('no_of_double_room'),$this->request->getPost('no_of_single_room'));
        }*/
        $Enquiry_model = new Enquiry_m();
        $hotel_id = $this->request->getPost('hotel_id');
        $no_of_double_room = $this->request->getPost('no_of_double_room');
        $no_of_single_room = $this->request->getPost('no_of_single_room');
        $rid = $this->request->getPost('rid');

        $response = $Enquiry_model->getTourRoomCategoryDraft($hotel_id, $rid, $no_of_double_room, $no_of_single_room);

        echo json_encode($response); // now returning JSON
    }
    function loadTourLocation()
    {
        $Enquiry_model = new Enquiry_m();
        $response =  $Enquiry_model->loadTourLocation($this->request->getPost('enquiry_header_id'),$this->request->getPost('enquiry_details_id'));
        echo json_encode($response);
    }
    function loadTourLocationEdit()
    {
        $Enquiry_model = new Enquiry_m();
        $response =  $Enquiry_model->loadTourLocationEdit($this->request->getPost('enquiry_header_id'),$this->request->getPost('enquiry_details_id'),$this->request->getPost('extension_ref_id'));
        echo json_encode($response);
    }
    function getVehicleTypes()
    {
        $Enquiry_model = new Enquiry_m();
        if ($this->request->getPost('location_id')) {
            echo $Enquiry_model->getVehicleTypes($this->request->getPost('location_id'));
        }
    }
    public function getAgentDetails()
    {
        $Enquiry_model = new Enquiry_m();
        $adetails = $Enquiry_model->getAgentDetails($this->request->getPost('agent_id'));
        echo json_encode($adetails); 
    }
    public function getHotelConfirmationData()
    {
        $Enquiry_model = new Enquiry_m();
        $adetails = $Enquiry_model->getHotelConfirmationData($this->request->getPost('itinerary_details_id'));
        echo json_encode($adetails); 
    }
    public function getPaymentHistoryData()
    {
        $Enquiry_model = new Enquiry_m();
        $adetails = $Enquiry_model->getPaymentHistoryData($this->request->getPost('payment_id'));
        echo json_encode($adetails); 
    }
    public function getTransportFollowupData()
    {
        $Enquiry_model = new Enquiry_m();
        $adetails = $Enquiry_model->getTransportFollowupData($this->request->getPost('transport_follow_up_id'));
        echo json_encode($adetails); 
    }
    public function updateConfirmHotel()
    {
        $Enquiry_model = new Enquiry_m();
        $itinerary_details_id = $this->request->getPost('itinerary_details_id');
        $tour_details_id = $this->request->getPost('tour_details_id');
        $cn_exist = $Enquiry_model->is_exist_confirm_hotel($itinerary_details_id);
        if($cn_exist == 0){
            $cn_data = array(
                'itinerary_details_id' => $itinerary_details_id,
                'tour_details_id' => $tour_details_id,
                'confirm_status' => $this->request->getPost('confirm_status'),
                'confirm_date' => $this->request->getPost('confirm_date'),
                'confirmed_by' => $this->request->getPost('confirmed_by'),
                'reference_id' => $this->request->getPost('reference_id'),
                'rate' => $this->request->getPost('rate'),
                'cut_off_date' => $this->request->getPost('cut_off_date'),
                'advance' => $this->request->getPost('advance'),
                'comments' => $this->request->getPost('comments'),
                'reconfirm_status' => $this->request->getPost('reconfirm_status'),
                'reconfirm_date' => $this->request->getPost('reconfirm_date'),
                'reconfirmed_by' => $this->request->getPost('reconfirmed_by'),
                'rcomments' => $this->request->getPost('rcomments'),
                'enterprise_id' => 1
            );
            $cn_insert = $Enquiry_model->insert_confirm_hotel($cn_data);  
            echo 1;
        }
        else if($cn_exist > 0){
            $cn_data = array(
                'confirm_status' => $this->request->getPost('confirm_status'),
                'confirm_date' => $this->request->getPost('confirm_date'),
                'confirmed_by' => $this->request->getPost('confirmed_by'),
                'reference_id' => $this->request->getPost('reference_id'),
                'rate' => $this->request->getPost('rate'),
                'cut_off_date' => $this->request->getPost('cut_off_date'),
                'advance' => $this->request->getPost('advance'),
                'comments' => $this->request->getPost('comments'),
                'reconfirm_status' => $this->request->getPost('reconfirm_status'),
                'reconfirm_date' => $this->request->getPost('reconfirm_date'),
                'reconfirmed_by' => $this->request->getPost('reconfirmed_by'),
                'rcomments' => $this->request->getPost('rcomments')
            );
            $cn_update = $Enquiry_model->update_confirm_hotel($cn_data,$itinerary_details_id);  
            echo 1;
        }
        else{
            echo 0;
        }
    }
    

    public function updatePaymentHistoryDet()
    {
        $Enquiry_model = new Enquiry_m();
        $payment_id = $this->request->getPost('payment_id');
        
            $cn_data = array(
                'payment_date' => $this->request->getPost('payment_date'),
                'paid_amount' => $this->request->getPost('paid_amount'),
                'payment_type' => $this->request->getPost('payment_type'),
                'payment_bank' => $this->request->getPost('payment_bank'),
                'payment_details' => $this->request->getPost('payment_details'),
                'edit_reason' => $this->request->getPost('edit_reason')
            );
            $cn_update = $Enquiry_model->update_payment_history_det($cn_data,$payment_id);  
            if($cn_update){
                echo 1;
            }
            else{
                echo 0;
            }
            
    }


    public function updateExecutiveFollowup()
    {
        $user_id = session('user_id');
        date_default_timezone_set('Asia/Kolkata');
        $updated_time = date('Y-m-d H:i:s');
        $Enquiry_model = new Enquiry_m();
            $cn_data = array(
                'followup_type_id' => 1,
                'enquiry_header_id' => $this->request->getPost('enquiry_header_id'),
                'contacted_person' => $this->request->getPost('con_person'),
                'follow_up_time' => $this->request->getPost('ftime'),
                'next_follow_up_time' => $this->request->getPost('next_ftime'),
                'follow_up_type' => $this->request->getPost('ftype'),
                'disposition' => $this->request->getPost('disposition'),
                'remarks' => $this->request->getPost('fremarks'),
                'deleted' => 0,
                'enterprise_id' => 1
            );
            $cn_insert = $Enquiry_model->insert_executive_followup($cn_data);  

            $er_det = $Enquiry_model->getEditRequestDetails($this->request->getPost('enquiry_header_id'));
            if($this->request->getPost('disposition') == 4){
                $enquiry_status_data = array(
                        'object_id' => $this->request->getPost('object_id'),
                        'enquiry_header_id' => $this->request->getPost('enquiry_header_id'),
                        'current_status_id' => 5,
                        'updated_time' => $updated_time,
                        'assigned_to' => $user_id,
                        'assigned_status' => 1,
                        'edit_request_id' => $er_det[0]['enquiry_edit_request_id'],
                        'updated_by' => $user_id,
                        'enterprise_id' => 1                            
                    );
                $enquiry_status_insert = $Enquiry_model->insertEnquirystatus($enquiry_status_data);
            }
            if($this->request->getPost('disposition') == 5){
                $enquiry_status_data = array(
                        'object_id' => $this->request->getPost('object_id'),
                        'enquiry_header_id' => $this->request->getPost('enquiry_header_id'),
                        'current_status_id' => 6,
                        'updated_time' => $updated_time,
                        'assigned_to' => $user_id,
                        'assigned_status' => 1,
                        'edit_request_id' => $er_det[0]['enquiry_edit_request_id'],
                        'updated_by' => $user_id,
                        'enterprise_id' => 1                            
                    );
                $enquiry_status_insert = $Enquiry_model->insertEnquirystatus($enquiry_status_data);
            }


            if($cn_insert){

                echo 1;
            }
            else{
                 echo 0;
            }
    }
    
    public function savePaymentDetails()
    {
        $Enquiry_model = new Enquiry_m();
        $user_id = session('user_id');
        $enquiry_header_id = $this->request->getPost('enquiry_header_id');
        $cs_confirmed_id = $this->request->getPost('cs_confirmed_id');
        $payment_amount = $this->request->getPost('payment_amount');
        $payment_date = $this->request->getPost('payment_date');
        $payment_type = $this->request->getPost('payment_type');
        $payment_bank = $this->request->getPost('payment_bank');
        $payment_details = $this->request->getPost('payment_details');
        $er_det = $Enquiry_model->getEditRequestDetails($enquiry_header_id);
        $ext_det = $Enquiry_model->getExtensionDetailsbyid($cs_confirmed_id);    
        $enq_det = $Enquiry_model->getEnquiryDetailsforpayments($enquiry_header_id,$ext_det[0]['enquiry_ref_id'],$er_det[0]['enquiry_edit_request_id']);      
            $cn_data = array(
                'enquiry_header_id' => $enquiry_header_id,
                'ref_no' => $enq_det[0]['ref_no'],
                'guest_id' =>  $enq_det[0]['guest_entity_id'],
                'agent_id' =>  $enq_det[0]['agent_entity_id'],
                'executive_id' =>  $enq_det[0]['executive_id'],
                'sop_executive_id' =>  $enq_det[0]['sop_id'],
                'invoice_no' =>  $enq_det[0]['ref_no'],
                'check_in' =>  $enq_det[0]['date_of_tour_start'],
                'check_out' =>  $enq_det[0]['date_of_tour_completion'],
                'total_amount' =>  $ext_det[0]['tpc'],
                'paid_amount' => $payment_amount,
                'payment_date' => $payment_date,
                'payment_type' => $payment_type,
                'payment_bank' => $payment_bank,
                'payment_details' => $payment_details,
                'payment_added_by' => $user_id,
                'approved_status' => 0,
                'is_active' => 1,
                'enterprise_id' => 1
            );
            $cn_insert = $Enquiry_model->insert_payment_details($cn_data);  
            if($cn_insert){

                echo 1;
            }
            else{
                 echo 0;
            }
    }
    public function updateTransportFollowup()
    {
        $Enquiry_model = new Enquiry_m();
        $vehicle_id = $this->request->getPost('vehicle_id');
        $enquiry_header_id = $this->request->getPost('enquiry_header_id');
        $v_exist = $Enquiry_model->is_vehicle_id_exist($vehicle_id,$enquiry_header_id);     
        $parts = explode("_", $vehicle_id);
        $vehicle_model_id = $parts[0];
        $hd_transport_follow_up_id = $this->request->getPost('hd_transport_follow_up_id');
        $tr_edit_id = $this->request->getPost('tr_edit_id');
        if($tr_edit_id == 1){
                $up_data = array(
                    'vehicle_time' => $this->request->getPost('vehicle_time'),
                    'vehicle_id' => $vehicle_id,
                    'vehicle_model_id' => $vehicle_model_id,
                    'transporter_id' => $this->request->getPost('transporter_id'),
                    'vehicle_rate' => $this->request->getPost('vehicle_rate'),
                    'vehicle_no' => $this->request->getPost('vehicle_no'),
                    'driver_name' => $this->request->getPost('driver_name'),
                    'agreed_amount' => $this->request->getPost('agreed_amount'),
                    'vehicle_mode' => $this->request->getPost('vehicle_mode'),
                    'phone_number' => $this->request->getPost('phone_number'),
                    'confirmed_by' => $this->request->getPost('confirmed_by'),
                    'remarks' => $this->request->getPost('remarks'),
                    'meet_greet' => $this->request->getPost('meet_greet')
                );
            $cn_update = $Enquiry_model->update_transport_followup($up_data,$hd_transport_follow_up_id);  
            if($cn_update){
                echo 1;
            }
            else{
                echo 0 ;
            }
        }
        else{
            
            if($v_exist == 0){
                $cn_data = array(
                    'enquiry_header_id' => $this->request->getPost('enquiry_header_id'),
                    'vehicle_time' => $this->request->getPost('vehicle_time'),
                    'vehicle_id' => $vehicle_id,
                    'vehicle_model_id' => $vehicle_model_id,
                    'transporter_id' => $this->request->getPost('transporter_id'),
                    'vehicle_rate' => $this->request->getPost('vehicle_rate'),
                    'vehicle_no' => $this->request->getPost('vehicle_no'),
                    'driver_name' => $this->request->getPost('driver_name'),
                    'agreed_amount' => $this->request->getPost('agreed_amount'),
                    'vehicle_mode' => $this->request->getPost('vehicle_mode'),
                    'phone_number' => $this->request->getPost('phone_number'),
                    'confirmed_by' => $this->request->getPost('confirmed_by'),
                    'remarks' => $this->request->getPost('remarks'),
                    'meet_greet' => $this->request->getPost('meet_greet'),
                    'is_active' => 1,
                    'enterprise_id' => 1
                );
                $cn_insert = $Enquiry_model->insert_transport_followup($cn_data);  
                echo 1;
            }
            else{
                 echo 0;
            }
        }
    }
    
    public function updateArrDetFollowup()
    {
        $Enquiry_model = new Enquiry_m();
            $cn_data = array(
                'followup_type_id' => 2,
                'enquiry_header_id' => $this->request->getPost('enquiry_header_id'),
                'call_date' => $this->request->getPost('call_date'),
                'mode_of_arrival' => $this->request->getPost('mode_of_arrival'),
                'city' => $this->request->getPost('city'),
                'flight_train_no' => $this->request->getPost('flight_train_no'),
                'arrival_date' => $this->request->getPost('arrival_date'),
                'comments' => $this->request->getPost('comments'),
                'deleted' => 0,
                'enterprise_id' => 1
            );
            $cn_insert = $Enquiry_model->insert_arr_det_followup($cn_data);  
            if($cn_insert){

                echo 1;
            }
            else{
                 echo 0;
            }
    }
    public function updateDepDetFollowup()
    {
        $Enquiry_model = new Enquiry_m();
            $cn_data = array(
                'followup_type_id' => 3,
                'enquiry_header_id' => $this->request->getPost('enquiry_header_id'),
                'call_date' => $this->request->getPost('call_date'),
                'mode_of_departure' => $this->request->getPost('mode_of_departure'),
                'city' => $this->request->getPost('city'),
                'flight_train_no' => $this->request->getPost('flight_train_no'),
                'departure_date' => $this->request->getPost('departure_date'),
                'comments' => $this->request->getPost('comments'),
                'deleted' => 0,
                'enterprise_id' => 1
            );
            $cn_insert = $Enquiry_model->insert_dep_det_followup($cn_data);  
            if($cn_insert){

                echo 1;
            }
            else{
                 echo 0;
            }
    }
    public function updateAllCallFollowup()
    {
        $Enquiry_model = new Enquiry_m();
            $cn_data = array(
                'followup_type_id' => $this->request->getPost('followup_type_id'),
                'enquiry_header_id' => $this->request->getPost('enquiry_header_id'),
                'call_status' => $this->request->getPost('call_status'),
                'call_time' => $this->request->getPost('call_time'),
                'comments' => $this->request->getPost('comments'),
                'deleted' => 0,
                'enterprise_id' => 1
            );
            $cn_insert = $Enquiry_model->insert_all_call_followup($cn_data);  
            if($cn_insert){

                echo 1;
            }
            else{
                 echo 0;
            }
    }
    public function reassignEmployee()
    {
        $Enquiry_model = new Enquiry_m();
        $assigned_to = $this->request->getPost('assigned_to');
        $enquiry_header_id = $this->request->getPost('enquiry_header_id');
        $status_id = $this->request->getPost('status_id');
        $reassigned_data = array(
            'assigned_to' => $assigned_to
        );
        $reassigned = $Enquiry_model->reassignEmployee($reassigned_data,$enquiry_header_id,$status_id);   
        echo json_encode($reassigned); 
    }
    public function updateEmployeeHeader()
    {
        $Enquiry_model = new Enquiry_m();
        $object_id = $this->request->getPost('object_id');
        $new_agent_entity_id = $this->request->getPost('new_agent_entity_id');
        $old_agent_entity_id = $this->request->getPost('old_agent_entity_id');
        $guest_entity_id = $this->request->getPost('guest_entity_id');
        $guest_name = $this->request->getPost('guest_name');
        $guest_mobile = $this->request->getPost('guest_mobile');
        $guest_email = $this->request->getPost('guest_email');
        $guest_address = $this->request->getPost('guest_address');

        $header_data = array(
            'agent_entity_id' => $new_agent_entity_id
        );
        $u_enq_header = $Enquiry_model->updateEmployeeHeader($header_data,$object_id);   
        if($u_enq_header){

            $object_datas = array(
                'object_name' => $guest_name,
                'object_ph_no' => json_encode([$guest_mobile]),
                'object_email' => json_encode([$guest_email]),
                'object_address' => json_encode([$guest_address])
            );
            $u_enq_header_object = $Enquiry_model->updateEmployeeHeaderObject($object_datas,$object_id); 

            $entity_datas = array(
                'entity_name' => $guest_name,
                'entity_mobile' => json_encode($guest_mobile),
                'entity_email' => json_encode($guest_email),
                'entity_address' => json_encode($guest_address)
            );
            $u_enq_header_guest = $Enquiry_model->updateEmployeeHeaderGuest($entity_datas,$guest_entity_id); 
            if($u_enq_header_guest){
                echo 1;
            }
            else{
                echo 0;
            }
        }
        else{
            echo 0;
        }
        
    }
    
    public function submitEditRequest()
    {
        $Enquiry_model = new Enquiry_m();
        $user_id = session('user_id');
        date_default_timezone_set('Asia/Kolkata');
        $updated_time = date('Y-m-d H:i:s');
        $edit_request_reason_id = $this->request->getPost('edit_request_reason_id');
        $enquiry_header_id = $this->request->getPost('enquiry_header_id');
        $erdet = $Enquiry_model->getEditRequestDetails($enquiry_header_id);  
        $current_edit_request_id = $erdet[0]['enquiry_edit_request_id'];
        $status_id = $this->request->getPost('status_id');
        $object_id = $this->request->getPost('object_id');
        $er_exist = $Enquiry_model->is_edit_request_exist($enquiry_header_id);     
        if($er_exist > 0){
            echo 0;
        }
        else{
            $cls_data = array(
                'is_active' => 0
            );
            $clear_ia = $Enquiry_model->clearEditRequest_isactive($cls_data,$enquiry_header_id);
            if($clear_ia){
                $er_data = array(
                    'object_id' => $object_id,
                    'enquiry_header_id' => $enquiry_header_id,
                    'updated_time' => $updated_time,
                    'edit_request_status' => 2,
                    'is_active' => 0,
                    'edit_request_reason' => $edit_request_reason_id,
                    'updated_by' => $user_id,
                    'enterprise_id' => 1
                );
                $er_insert = $Enquiry_model->insertEditRequest($er_data);   
                $cur_stat = $Enquiry_model->getEnquiryStatusDet($enquiry_header_id,$current_edit_request_id);   
                $er_status_data = array(
                    'object_id' => $object_id,
                    'enquiry_header_id' => $enquiry_header_id,
                    'current_status_id' => 20,
                    'updated_time' => $updated_time,
                    'assigned_to' => $cur_stat[0]['assigned_to'],
                    'assigned_status' => 1,
                    'edit_request_id' => $er_insert,
                    'updated_by' => $user_id,
                    'enterprise_id' => 1                            
                );
                $confirm_insert = $Enquiry_model->insertEnquirystatus($er_status_data);   
                
                $erh_data = array(
                    'edit_request' => 1
                );
                $updated_erh = $Enquiry_model->updateEditRequestHeader($erh_data,$enquiry_header_id);
                echo 1; 
            }
        }
    }

    public function approveActionSubmit()
    {
        $Enquiry_model = new Enquiry_m();
        $user_id = session('user_id');
        date_default_timezone_set('Asia/Kolkata');
        $updated_time = date('Y-m-d H:i:s');
        $payment_id = $this->request->getPost('payment_id');
        $selectedValue = $this->request->getPost('selectedValue');
        $remarks = $this->request->getPost('remarks');
            $app_data = array(
                'approved_status' => $selectedValue,
                'remarks' => $remarks
            );
            $app_update = $Enquiry_model->update_approve_action($app_data,$payment_id); 
        if($app_update){
            echo 1;
        }
        else{
            echo 0;
        }
    }

    public function approveActionSubmitProforma()
    {
        $Enquiry_model = new Enquiry_m();
        $user_id = session('user_id');
        date_default_timezone_set('Asia/Kolkata');
        $updated_time = date('Y-m-d H:i:s');
        $enquiry_edit_request_id = $this->request->getPost('enquiry_edit_request_id');
        $selectedValue = $this->request->getPost('selectedValue');
      
            $app_data = array(
                'approved_status' => $selectedValue
            );
            $app_update = $Enquiry_model->update_approve_action_proforma($app_data,$enquiry_edit_request_id); 
        if($app_update){
            echo 1;
        }
        else{
            echo 0;
        }
    }
    public function submitEditRequestAction()
    {
        $Enquiry_model = new Enquiry_m();
        $user_id = session('user_id');
        date_default_timezone_set('Asia/Kolkata');
        $updated_time = date('Y-m-d H:i:s');
        $edit_request_action_id = $this->request->getPost('edit_request_action_id');
        $enquiry_header_id = $this->request->getPost('enquiry_header_id');
        //$erdet = $Enquiry_model->getEditRequestDetails($enquiry_header_id);  
        $current_edit_request_id = $this->request->getPost('enquiry_edit_request_id');
        $object_id = $this->request->getPost('object_id');
        if($edit_request_action_id == 1){
            $current_status_id = 21;
            $cls_data = array(
                'edit_request_status' => 1,
                'is_active' => 1
            );

            $erh_data = array(
                'edit_request' => 2
            );
            $updated_erh = $Enquiry_model->updateEditRequestHeader($erh_data,$enquiry_header_id);
        }
        if($edit_request_action_id == 3){
            $current_status_id = 21;
            $cls_data = array(
                'edit_request_status' => 3
            );
        }
            $updated = $Enquiry_model->updateEditRequestAction($cls_data,$current_edit_request_id);
            if($updated){
                $cur_stat = $Enquiry_model->getEnquiryStatusDetforer($enquiry_header_id,$current_edit_request_id);   

                $er_status_data = array(
                    'object_id' => $object_id,
                    'enquiry_header_id' => $enquiry_header_id,
                    'current_status_id' => $current_status_id,
                    'updated_time' => $updated_time,
                    'assigned_to' => $cur_stat[0]['assigned_to'],
                    'assigned_status' => 1,
                    'edit_request_id' => $current_edit_request_id,
                    'updated_by' => $user_id,
                    'enterprise_id' => 1                            
                );
                $confirm_insert = $Enquiry_model->insertEnquirystatus($er_status_data);  
                
                if($edit_request_action_id == 1){
                    $df_status_data = array(
                        'object_id' => $object_id,
                        'enquiry_header_id' => $enquiry_header_id,
                        'current_status_id' => 1,
                        'updated_time' => $updated_time,
                        'assigned_to' => $cur_stat[0]['assigned_to'],
                        'assigned_status' => 1,
                        'edit_request_id' => $current_edit_request_id,
                        'updated_by' => $user_id,
                        'enterprise_id' => 1                            
                    );
                    $df_confirm_insert = $Enquiry_model->insertEnquirystatus($df_status_data);  
                }
                echo 1; 
            }
        
    }

    public function save_final_costing_sheet()
    {
        $Enquiry_model = new Enquiry_m();
        $enquiry_detail_details_id = $this->request->getPost('enquiry_detail_details_id');
        $cs_content = $this->request->getPost('cs_content');
        $cs_data = array(
            'costing_sheet' => $cs_content
        );
        $cs_update = $Enquiry_model->save_final_costing_sheet($cs_data,$enquiry_detail_details_id);   
        echo json_encode($cs_update); 
    }
    public function save_final_itinerary_sheet()
    {
        $Enquiry_model = new Enquiry_m();
        $user_id = session('user_id');
        date_default_timezone_set('Asia/Kolkata');
        $updated_time = date('Y-m-d H:i:s');
        $ext_det = $Enquiry_model->getExtensionDetailsbyid($this->request->getPost('enquiry_detail_details_id'));
        $er_det = $Enquiry_model->getEditRequestDetails($ext_det[0]['enquiry_header_id']); 
        $enquiry_status_data = array(
            'object_id' => $ext_det[0]['object_id'],
            'enquiry_header_id' => $ext_det[0]['enquiry_header_id'],
            'current_status_id' => 4,
            'updated_time' => $updated_time,
            'assigned_to' => $user_id,
            'assigned_status' => 1,
            'edit_request_id' => $er_det[0]['enquiry_edit_request_id'],
            'updated_by' => $user_id,
            'enterprise_id' => 1                            
        );
        $enquiry_status_insert = $Enquiry_model->insertEnquirystatus($enquiry_status_data);

        $enquiry_detail_details_id = $this->request->getPost('enquiry_detail_details_id');
        $cs_content_new = (string) $this->request->getPost('iti_content');
        $blocks = $this->extractDayBlocks($cs_content_new);
        
        foreach ($blocks as $b) {
            // CHANGE 'itinerary_title' to your real column name
            $data = [
                'transport_description' => $b['description'],
                'itinerary_title'       => $b['title'],   // e.g., "Munnar Sight seeing"
            ];
            $Enquiry_model->update_transport_itinerary($data, $enquiry_detail_details_id, $b['date']);
        }

        $iti_content = $this->request->getPost('iti_content');
        $cs_data = array(
            'itinerary' => $iti_content
        );
        $iti_update = $Enquiry_model->save_final_costing_sheet($cs_data,$enquiry_detail_details_id);   
        echo json_encode($iti_update); 
    }

    public function save_final_proforma_sheet()
    {
        $Enquiry_model = new Enquiry_m();
        $user_id = session('user_id');
        date_default_timezone_set('Asia/Kolkata');
        $updated_time = date('Y-m-d H:i:s');
        $enquiry_edit_request_id = $this->request->getPost('enquiry_edit_request_id');
        $pro_content = $this->request->getPost('pro_content');
        $cs_data = array(
            'proforma_data' => $pro_content
        );
        $pro_update = $Enquiry_model->save_final_proforma_sheet($cs_data,$enquiry_edit_request_id);   
        echo json_encode($pro_update); 
    }

    private function extractDayBlocks(string $html): array
    {
        $out = [];
        if (trim($html) === '') return $out;

        libxml_use_internal_errors(true);
        $dom = new \DOMDocument();
        $dom->loadHTML('<?xml encoding="utf-8" ?>' . $html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();

        $xpath = new \DOMXPath($dom);
        $nodes = $xpath->query('//p[strong and contains(translate(normalize-space(.),"abcdefghijklmnopqrstuvwxyz","ABCDEFGHIJKLMNOPQRSTUVWXYZ"), "DAY ")]');

        $stopMarkers = ['PACKAGE INCLUDES','PACKAGE EXCLUDES','NOTE','PAYMENTS','CANCELLATION POLICY','THANKS','REGARDS','HOUSEBOAT (APPLICABLE','CONTACT'];

        $isStop = function(\DOMNode $node) use ($stopMarkers): bool {
            if (!($node instanceof \DOMElement)) return false;
            $txt = strtoupper(trim($node->textContent ?? ''));
            if ($txt === '') return false;
            if ($node->tagName === 'p' && str_starts_with($txt, 'DAY ')) return true;
            foreach ($stopMarkers as $m) { if (strpos($txt, $m) !== false) return true; }
            return false;
        };

        for ($i = 0; $i < $nodes->length; $i++) {
            /** @var \DOMElement $p */
            $p = $nodes->item($i);
            $heading = trim($p->textContent);

            $dayNo = null; $dateYmd = null; $title = null;

            // Match: Day 4 (11-08-2025) - Munnar Sight seeing
            if (preg_match('/Day\s+(\d+)\s*\((\d{2}-\d{2}-\d{4})\)\s*-\s*(.+)$/i', $heading, $m)) {
                $dayNo   = (int)$m[1];
                $dateYmd = \DateTime::createFromFormat('d-m-Y', $m[2])?->format('Y-m-d');
                $title   = trim($m[3]);
            } else {
                // Fallbacks if needed
                if (preg_match('/Day\s+(\d+)/i', $heading, $m2)) $dayNo = (int)$m2[1];
            }

            if (!$dateYmd) continue; // we need the date to target the row

            // Collect description until next day/stop marker
            $descHtml = '';
            $cursor = $p->nextSibling;
            while ($cursor) {
                if ($cursor instanceof \DOMElement) {
                    if ($isStop($cursor)) break;
                    $descHtml .= $dom->saveHTML($cursor);
                }
                $cursor = $cursor->nextSibling;
            }

            $out[] = [
                'day_no'      => $dayNo,
                'date'        => $dateYmd,
                'title'       => $title,                 // ← THIS is "Munnar Sight seeing"
                'description' => trim($descHtml) ?: '',
            ];
        }

        return $out;
    }

    public function confirmCostingSheet()
    {
        $Enquiry_model = new Enquiry_m();
        $user_id = session('user_id');
        date_default_timezone_set('Asia/Kolkata');
        $updated_time = date('Y-m-d H:i:s');
        $enquiry_detail_details_id = $this->request->getPost('enquiry_detail_details_id');
        $ext_det = $Enquiry_model->getExtensionDetailsbyid($enquiry_detail_details_id);  
        $cs_content = $ext_det[0]['costing_sheet'];
        $enquiry_header_id = $ext_det[0]['enquiry_header_id'];
        $guest_details = $Enquiry_model->get_enquiry_guest_details($enquiry_header_id);
        if(!empty($guest_details)){
            $ref_no = $guest_details[0]['ref_no'];
            $guest_name = $guest_details[0]['guest_name'];
        }
        else{
            $ref_no = "";
            $guest_name = "";
        }
        
        if(empty($ext_det[0]['costing_sheet'])){
            echo 1;
        }
        else if(empty($ext_det[0]['itinerary'])){
            echo 2;
        }
        else{
            $c_data = array(
                'cs_confirmed_id' => $enquiry_detail_details_id
            );
            $c_update = $Enquiry_model->confirm_costing_sheet_finalize($c_data,$enquiry_header_id);  
            if($c_update){
                $top_assigned_to = $this->round_robin_assignment_top($user_id);
                $er_det = $Enquiry_model->getEditRequestDetails($enquiry_header_id);
                $top_status_data = array(
                    'object_id' => $ext_det[0]['object_id'],
                    'enquiry_header_id' => $ext_det[0]['enquiry_header_id'],
                    'current_status_id' => 14,
                    'updated_time' => $updated_time,
                    'assigned_to' => $top_assigned_to,
                    'assigned_status' => 1,
                    'edit_request_id' => $er_det[0]['enquiry_edit_request_id'],
                    'updated_by' => $user_id,
                    'enterprise_id' => 1                            
                );
                $status_top_insert = $Enquiry_model->insertEnquirystatus($top_status_data);

                $ac_exist = $Enquiry_model->is_availability_check_exist($enquiry_header_id);
                if(!empty($ac_exist)){
                    $sop_assigned_to = $ac_exist[0]['assigned_to'];
                }
                else{
                    $sop_assigned_to = $this->round_robin_assignment_sop($user_id);
                }
                $sop_status_data = array(
                    'object_id' => $ext_det[0]['object_id'],
                    'enquiry_header_id' => $ext_det[0]['enquiry_header_id'],
                    'current_status_id' => 13,
                    'updated_time' => $updated_time,
                    'assigned_to' => $sop_assigned_to,
                    'assigned_status' => 1,
                    'edit_request_id' => $er_det[0]['enquiry_edit_request_id'],
                    'updated_by' => $user_id,
                    'enterprise_id' => 1                            
                );
                $status_sop_insert = $Enquiry_model->insertEnquirystatus($sop_status_data);

                $confirm_status_data = array(
                    'object_id' => $ext_det[0]['object_id'],
                    'enquiry_header_id' => $ext_det[0]['enquiry_header_id'],
                    'current_status_id' => 12,
                    'updated_time' => $updated_time,
                    'assigned_to' => $sop_assigned_to,
                    'assigned_status' => 1,
                    'edit_request_id' => $er_det[0]['enquiry_edit_request_id'],
                    'updated_by' => $user_id,
                    'enterprise_id' => 1                            
                );
                $confirm_insert = $Enquiry_model->insertEnquirystatus($confirm_status_data);
                if($status_top_insert && $status_sop_insert && $confirm_insert){

                        $user_details = $Enquiry_model->get_user_mail_details($user_id);
                        $executive_name = $user_details[0]['entity_name'];
                        $from_mails = json_decode($user_details[0]['entity_email'],true);
                        $from_email = is_array($from_mails) && count($from_mails) > 0 ? $from_mails[0] : '';
                        $from_mobiles = json_decode($user_details[0]['entity_mobile'],true);
                        $from_mobile = is_array($from_mobiles) && count($from_mobiles) > 0 ? $from_mobiles[0] : '';
                        $email_password = $user_details[0]['email_password']?$user_details[0]['email_password']:'';

                        $to_sop_user_details = $Enquiry_model->get_user_mail_details($sop_assigned_to);
                        $to_sop_mails = json_decode($to_sop_user_details[0]['entity_email'],true);
                        $to_sop_email = is_array($to_sop_mails) && count($to_sop_mails) > 0 ? $to_sop_mails[0] : '';

                        $user_designation = $user_details[0]['designation']?$user_details[0]['designation']:'';

                        $content = "<p>Package is confirmed. Please check the updated costing sheet and proceed to book the hotel and Vehicle</p><br><p>Reference No : $ref_no </p><p>Executive Name : $executive_name</p> <p>$cs_content</p>";
                        $subject = $guest_name.' | '.$ref_no;
                        
                        if(!empty($to_sop_email) && !empty($from_email) && !empty($email_password)){
                            $this->send_mail_function($from_email,$email_password,$to_sop_email,$from_mobile,$user_designation,$subject,$content);
                        }

                        $to_top_user_details = $Enquiry_model->get_user_mail_details($top_assigned_to);
                        $to_top_mails = json_decode($to_top_user_details[0]['entity_email'],true);
                        $to_top_email = is_array($to_top_mails) && count($to_top_mails) > 0 ? $to_top_mails[0] : '';

                        if(!empty($to_top_email) && !empty($from_email) && !empty($email_password)){
                            $this->send_mail_function($from_email,$email_password,$to_top_email,$from_mobile,$user_designation,$subject,$content);
                        }

                    echo 3;
                }
            }

            $erh_data = array(
                'edit_request' => 0
            );
            $updated_erh = $Enquiry_model->updateEditRequestHeader($erh_data,$enquiry_header_id);
        }
    }
    public function getLocationName()
    {
        $Enquiry_model = new Enquiry_m();
        $loc_det = $Enquiry_model->getLocationName($this->request->getPost('tour_location_id'),$this->request->getPost('hotel_category_exist'));
        echo json_encode($loc_det); 
    }
    public function getEnquiryHeaderDetails()
    {
        $Enquiry_model = new Enquiry_m();
        $enq_det = $Enquiry_model->get_enquiry_header_id($this->request->getPost('object_id'));
        echo json_encode($enq_det); 
    }
    public function get_vehicle_name()
    {
        $Enquiry_model = new Enquiry_m();
        $data = $Enquiry_model->getVehicleName($this->request->getPost('v_id'));
        echo json_encode($data);
    }
    public function check_guest_exist()
    {
        $Enquiry_model = new Enquiry_m();
        $guest_name = $this->request->getPost('guest_name');
        $guest_mobile = $this->request->getPost('guest_mobile');
        $guest_email = $this->request->getPost('guest_email');
        $gexist = $Enquiry_model->check_guest_exist($guest_name,$guest_mobile,$guest_email);
        echo json_encode($gexist);
    }
    public function saveAvailabilityCheck()
    {
        $Enquiry_model = new Enquiry_m();
        $user_id = session('user_id');
        date_default_timezone_set('Asia/Kolkata');
        $updated_time = date('Y-m-d H:i:s');
        $availabilityData = $this->request->getPost('availabilityData');
        $enquiry_header_id = $this->request->getPost('enquiry_header_id');

            $guest_details = $Enquiry_model->get_enquiry_guest_details($enquiry_header_id);
            if(!empty($guest_details)){
                $ref_no = $guest_details[0]['ref_no'];
                $guest_name = $guest_details[0]['guest_name'];
            }
            else{
                $ref_no = "";
                $guest_name = "";
            }

        $overallStatus = $this->request->getPost('overallStatus');
        $ac_data = array(
                    'availability_check' => $overallStatus,
                    'ac_remarks' => $availabilityData
                );
        $ac_update = $Enquiry_model->updateAvailabilityCheck($ac_data,$enquiry_header_id);
        $ac_exist = $Enquiry_model->is_availability_check_exist($enquiry_header_id);
        $er_det = $Enquiry_model->getEditRequestDetails($enquiry_header_id);
        if($overallStatus == 2){
                $ac_ha_data = array(
                    'object_id' => $ac_exist[0]['object_id'],
                    'enquiry_header_id' => $ac_exist[0]['enquiry_header_id'],
                    'current_status_id' => 9,
                    'updated_time' => $updated_time,
                    'assigned_to' => $ac_exist[0]['assigned_to'],
                    'assigned_status' => 1,
                    'edit_request_id' => $er_det[0]['enquiry_edit_request_id'],
                    'updated_by' => $user_id,
                    'enterprise_id' => 1                            
                );
                $ha_insert = $Enquiry_model->insertEnquirystatus($ac_ha_data);
        }
        if($overallStatus == 3){
                $ac_hna_data = array(
                    'object_id' => $ac_exist[0]['object_id'],
                    'enquiry_header_id' => $ac_exist[0]['enquiry_header_id'],
                    'current_status_id' => 10,
                    'updated_time' => $updated_time,
                    'assigned_to' => $ac_exist[0]['assigned_to'],
                    'assigned_status' => 1,
                    'edit_request_id' => $er_det[0]['enquiry_edit_request_id'],
                    'updated_by' => $user_id,
                    'enterprise_id' => 1                            
                );
                $hna_insert = $Enquiry_model->insertEnquirystatus($ac_hna_data);
        }

                        $user_details = $Enquiry_model->get_user_mail_details($user_id);
                        $executive_name = $user_details[0]['entity_name'];
                        $from_mails = json_decode($user_details[0]['entity_email'],true);
                        $from_email = is_array($from_mails) && count($from_mails) > 0 ? $from_mails[0] : '';
                        $from_mobiles = json_decode($user_details[0]['entity_mobile'],true);
                        $from_mobile = is_array($from_mobiles) && count($from_mobiles) > 0 ? $from_mobiles[0] : '';
                        $email_password = $user_details[0]['email_password']?$user_details[0]['email_password']:'';

                        $to_exe_user_details = $Enquiry_model->get_user_mail_details($ac_exist[0]['updated_by']);
                        $to_exe_mails = json_decode($to_exe_user_details[0]['entity_email'],true);
                        $to_exe_email = is_array($to_exe_mails) && count($to_exe_mails) > 0 ? $to_exe_mails[0] : '';

                        $user_designation = $user_details[0]['designation']?$user_details[0]['designation']:'';

                        $content = "<p>$guest_name. Details are Updated in CRM. Please check.</p><br><p>Reference No : $ref_no</p><p>SOP Name : $e_name</p>";
                        $subject = $guest_name.' | '.$ref_no.' | '.'Hotel Availability Check';
                        
                        if(!empty($to_exe_email) && !empty($from_email) && !empty($email_password)){
                            $this->send_mail_function($from_email,$email_password,$to_exe_email,$from_mobile,$user_designation,$subject,$content);
                        }
        echo json_encode($ac_update);
    }
    public function availabilitycheckform()
    {
        $Enquiry_model = new Enquiry_m();
        $hot_det = [];
        $enquiry_header_id = $this->request->getPost('enquiry_header_id');
        $ext_det = $Enquiry_model->getExtensionDetailsbystatus($enquiry_header_id); 
        if(!empty($ext_det)){
            $hot_det = $Enquiry_model->get_hotel_details_forac($enquiry_header_id,$ext_det[0]['extension_ref_id']);
        }
        $data['hot_det'] = $hot_det;
        $data['enquiry_header_id'] = $enquiry_header_id;
        echo view('enquiry/ac_check_form',$data);
    }
    public function getHotelConfirmationforMail()
    {
        $Enquiry_model = new Enquiry_m();
        $hot_det = [];
        $itinerary_details_id = $this->request->getPost('itinerary_details_id');
        $hot_det = $Enquiry_model->get_hotel_confirmation_mail($itinerary_details_id);
        $data['hotels'] = $hot_det;
        $data['itinerary_details_id'] = $itinerary_details_id;
        echo view('enquiry/hotel_confirmation_mail',$data);
    }
    public function getTransportItineraryData()
    {
        $Enquiry_model = new Enquiry_m();
        $hot_det = [];
        $transport_follow_up_id = $this->request->getPost('transport_follow_up_id');
        $trans_det = $Enquiry_model->getTransportItineraryData($transport_follow_up_id);
        $data['cdata'] = $trans_det;
        $data['transport_follow_up_id'] = $transport_follow_up_id;
        echo view('enquiry/transport_itinerary_view',$data);
    }
    public function getHotelVoucherData()
    {
        $Enquiry_model = new Enquiry_m();
        $sdate = date('Y-m-d');
        $hot_det = [];
        $enquiry_header_id = $this->request->getPost('enquiry_header_id');
        $confirm_cs_id = $this->request->getPost('confirm_cs_id');
        $ext_det = $Enquiry_model->getExtensionDetailsbyid($confirm_cs_id); 
        $hot_det = $Enquiry_model->get_hotels_for_vouchers($ext_det[0]['tour_plan_ref_id']);
        $data['cdata'] = $hot_det;
        $data['cdate'] = $sdate;
        $data['enquiry_header_id'] = $enquiry_header_id;
        $data['confirm_cs_id'] = $confirm_cs_id;
        echo view('enquiry/hotel_voucher_view',$data);
    }
    public function getProformaGuestData()
    {
        $Enquiry_model = new Enquiry_m();
        $sdate = date('Y-m-d');
        $hot_det = [];
        $enquiry_header_id = $this->request->getPost('enquiry_header_id');
        $confirm_cs_id = $this->request->getPost('confirm_cs_id');
        $enquiry_edit_request_id = $this->request->getPost('enquiry_edit_request_id');
        $ext_det = $Enquiry_model->getExtensionDetailsbyid($confirm_cs_id); 
        $hot_det = $Enquiry_model->get_proforma_guest_data($enquiry_header_id,$ext_det[0]['extension_ref_id'],$confirm_cs_id);
        $tour_plan = $Enquiry_model->get_proforma_office_tpdata($enquiry_header_id,$ext_det[0]['tour_plan_ref_id'],$confirm_cs_id);
        $data['tour_plan'] = $tour_plan;
        $data['cdata'] = $hot_det;
        $data['cdate'] = $sdate;
        $data['enquiry_header_id'] = $enquiry_header_id;
        $data['confirm_cs_id'] = $confirm_cs_id;
        $data['enquiry_edit_request_id'] = $enquiry_edit_request_id;
        echo view('enquiry/proforma_guest_view',$data);
    }
    public function getProformaOfficeData()
    {
        $Enquiry_model = new Enquiry_m();
        $sdate = date('Y-m-d');
        $hot_det = [];
        $proforma_saved = [];
        $enquiry_header_id = $this->request->getPost('enquiry_header_id');
        $confirm_cs_id = $this->request->getPost('confirm_cs_id');
        $enquiry_edit_request_id = $this->request->getPost('enquiry_edit_request_id');
        $ext_det = $Enquiry_model->getExtensionDetailsbyid($confirm_cs_id); 
        $hot_det = $Enquiry_model->get_proforma_office_data($enquiry_header_id,$ext_det[0]['extension_ref_id'],$confirm_cs_id,$enquiry_edit_request_id);
        $tour_plan = $Enquiry_model->get_proforma_office_tpdata($enquiry_header_id,$ext_det[0]['tour_plan_ref_id'],$confirm_cs_id);
        $proforma_saved = $Enquiry_model->get_proforma_saved_data($enquiry_edit_request_id);
        
        $data['proforma_saved_data'] = $proforma_saved;
        $data['tour_plan'] = $tour_plan;
        $data['cdata'] = $hot_det;
        $data['cdate'] = $sdate;
        $data['enquiry_header_id'] = $enquiry_header_id;
        $data['confirm_cs_id'] = $confirm_cs_id;
        $data['enquiry_edit_request_id'] = $enquiry_edit_request_id;
        echo view('enquiry/proforma_office_view',$data);
    }
    public function hotelconformationform()
    {
        if (!empty(session()->get('user_id'))) {
            $Enquiry_model = new Enquiry_m();
            $data = $Enquiry_model->get_hotel_confirmation_data($this->request->getPost());
            echo json_encode($data);
        }
        else{
            return redirect()->to('Login');
        }
    }
    public function executive_followup_form()
    {
        if (!empty(session()->get('user_id'))) {
            $Enquiry_model = new Enquiry_m();
            $data = $Enquiry_model->executive_followup_form($this->request->getPost());
            echo json_encode($data);
        }
        else{
            return redirect()->to('Login');
        }
    }
    public function transport_followup_form()
    {
        if (!empty(session()->get('user_id'))) {
            $Enquiry_model = new Enquiry_m();
            $data = $Enquiry_model->transport_followup_form($this->request->getPost());
            echo json_encode($data);
        }
        else{
            return redirect()->to('Login');
        }
    }
    public function arrival_details_form()
    {
        if (!empty(session()->get('user_id'))) {
            $Enquiry_model = new Enquiry_m();
            $data = $Enquiry_model->arrival_details_form($this->request->getPost());
            echo json_encode($data);
        }
        else{
            return redirect()->to('Login');
        }
    }
    public function departure_details_form()
    {
        if (!empty(session()->get('user_id'))) {
            $Enquiry_model = new Enquiry_m();
            $data = $Enquiry_model->departure_details_form($this->request->getPost());
            echo json_encode($data);
        }
        else{
            return redirect()->to('Login');
        }
    }
    public function all_call_followup_form()
    {
        if (!empty(session()->get('user_id'))) {
            $Enquiry_model = new Enquiry_m();
            $data = $Enquiry_model->all_call_followup_form($this->request->getPost());
            echo json_encode($data);
        }
        else{
            return redirect()->to('Login');
        }
    }
    public function hotelvoucherform()
    {
        if (!empty(session()->get('user_id'))) {
            $Enquiry_model = new Enquiry_m();
            $data = $Enquiry_model->hotelvoucherdata($this->request->getPost());
            echo json_encode($data);
        }
        else{
            return redirect()->to('Login');
        }
    }
    public function proformaguestform()
    {
        if (!empty(session()->get('user_id'))) {
            $Enquiry_model = new Enquiry_m();
            $data = $Enquiry_model->proformaguestdata($this->request->getPost());
            echo json_encode($data);
        }
        else{
            return redirect()->to('Login');
        }
    }
    public function proformaofficeform()
    {
        if (!empty(session()->get('user_id'))) {
            $Enquiry_model = new Enquiry_m();
            $data = $Enquiry_model->proformaofficedata($this->request->getPost());
            echo json_encode($data);
        }
        else{
            return redirect()->to('Login');
        }
    }
    public function hotel_not_available_details()
    {
        $Enquiry_model = new Enquiry_m();
        $hot_det = [];
        $enquiry_detail_details_id = $this->request->getPost('enquiry_detail_details_id');
        $hot_det = $Enquiry_model->get_hotel_details_foracbyid($enquiry_detail_details_id);
        $data['hot_det'] = $hot_det;
        echo view('enquiry/hotel_not_available_form',$data);
    }
    public function getMoreEnquiryDetails()
    {
        $Enquiry_model = new Enquiry_m();
        $Dashboard_model = new Dashboard_m();
        $user_id = session('user_id');
        $parent_id = session('parent_id');
        $hierarchy_id = session('hierarchy_id');
        $users = [];
        /*if($hierarchy_id == 4){
            $users = $Dashboard_model->get_employees_under_teamlead($user_id);
        }
        else {
            $users = $Dashboard_model->get_employees_under_adminusers();
        }*/
        $users = $Dashboard_model->get_all_employees_for_reassign();
        $enquiry_header_id = $this->request->getPost('enquiry_header_id');
        $header_det = $Enquiry_model->get_enquiry_header_details($enquiry_header_id);
        $edit_det = $Enquiry_model->get_current_edit_request_details($enquiry_header_id);
        if(!empty($edit_det)){
            $is_confirmed = ($edit_det[0]['cs_confirmed_id'] > 0) ? 1: 0;
        }
        else{
            $is_confirmed = 0;
        }
        $data['object_id'] = $header_det[0]['object_id'];
        $data['enquiry_header_id'] = $enquiry_header_id;
        $data['more_enq'] = $Enquiry_model->get_more_enquiry_details($enquiry_header_id);
        $data['status_history'] = $Enquiry_model->get_status_history($enquiry_header_id);
        $data['edit_reasons'] = $Enquiry_model->get_edit_request_reasons();
        $data['user_id'] = $user_id;
        $data['parent_id'] = $parent_id;
        $data['hierarchy_id'] = $hierarchy_id;
        $data['users'] = $users;
        $data['is_confirmed'] = $is_confirmed;
        echo view('enquiry/get_more_enquiry_details_view',$data);
    }
    public function getEditRequestDetailsforAdmin()
    {
        $Enquiry_model = new Enquiry_m();
        $Dashboard_model = new Dashboard_m();
        $enquiry_header_id = $this->request->getPost('enquiry_header_id');
        $header_det = $Enquiry_model->get_enquiry_header_details($enquiry_header_id);
        $data['object_id'] = $header_det[0]['object_id'];
        $er_det = $Enquiry_model->getEditRequestDetailsforAdmin($enquiry_header_id);
        $data['er_det'] = $er_det;
        echo view('enquiry/edit_request_view',$data);
    }
    public function saveEnquiry()
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model = new Dashboard_m();
            $Enquiry_model = new Enquiry_m();

            date_default_timezone_set('Asia/Kolkata');
            $updated_time = date('Y-m-d H:i:s');
            $sdate = date('Y-m-d');

            $start_date_temp = $this->request->getPost('tour_start_date');
            $end_date_temp = $this->request->getPost('tour_end_date');

            $date_of_tour_start = DateTime::createFromFormat('d-m-Y', $start_date_temp)->format('Y-m-d');
            $date_of_tour_completion = DateTime::createFromFormat('d-m-Y', $end_date_temp)->format('Y-m-d');

            $system_id = session('system_id');
            $user_id = session('user_id');
            $role_id = session('active_role');
            $assigned_to = $this->round_robin_assignment($user_id, $role_id);
            $edit_id = $this->request->getPost('edit_id');
 
            if($edit_id > 0){
                $enq_header_ids = $Enquiry_model->get_enquiry_header_id($edit_id);
                $enq_header_id = $enq_header_ids[0]['enquiry_header_id'];
                $up_data = array(
                    'is_active' => 0
                );
                $up_itidata = array(
                    'is_active' => 0,
                    'is_draft' => 0
                );
                $up_extdata = array(
                    'is_edit' => 0
                );
                $enq_update = $Enquiry_model->update_enquiry_isactive($up_data,$enq_header_id);
                $tp_update = $Enquiry_model->update_tourplan_isactive($up_itidata,$enq_header_id);
                $iti_update = $Enquiry_model->update_itinerary_isactive($up_itidata,$enq_header_id);
                $ext_update = $Enquiry_model->update_extension_isedit($up_extdata,$enq_header_id);
            }
            
            $guest_name = $this->request->getPost('guest_name');
            $guest_mobile = $this->request->getPost('guest_mobile');
            $guest_email = $this->request->getPost('guest_email');
            $guest_address = $this->request->getPost('guest_address');
            $guest_exist = $this->request->getPost('hd_guest_exist');
            $no_of_arrivals = $this->request->getPost('no_of_arrivals');

                $bURL = config('App')->baseURL;
                $class_id = $this->request->getPost('object_class_id');
                $sURL = site_url('Enquiry/enquiry_list_view/'.$class_id);
                $baseURL = ($bURL === '') ? $bURL : rtrim($bURL, '/ ') . '/';
                $object_location_id = '';
                $object_datas = array(
                    'object_name' => $guest_name,
                    'object_location_id' => $object_location_id,
                    'object_class_id' => $class_id,
                    'object_type_id' => 5,
                    'enterprise_id' => $this->request->getPost('enterprise_id'),
                    'object_ph_no' => json_encode([$guest_mobile]),
                    'object_email' => json_encode([$guest_email]),
                    'object_address' => json_encode([$guest_address])
                );
                if($edit_id > 0){
                    $object_id = $edit_id;
                }
                else{
                    $object_id = $Dashboard_model->insert_object($object_datas);
                }

                $sys_ids = $system_id-1;
                $ref_no = $sys_ids.$object_id;

                if ($object_id) {

                    if($edit_id > 0){
                        $enquiry_header_id = $enq_header_id;
                    }
                    else{
                        if($guest_exist){
                            $entity_ids = $Enquiry_model->get_guest_details($guest_name,$guest_mobile,$guest_email);
                            $entity_id = $entity_ids[0]['entity_id'];
                        }
                        else{
                            $entity_datas = array(
                                'entity_parent_id' => 1,
                                'entity_name' => $guest_name,
                                'entity_location_id' => $object_location_id,
                                'entity_class_id' => 13,
                                'entity_type_id' => 1,
                                'enterprise_id' => $this->request->getPost('enterprise_id'),
                                'entity_mobile' => json_encode($guest_mobile),
                                'entity_email' => json_encode($guest_email),
                                'entity_address' => json_encode($guest_address)
                            );
                            $entity_id = $Dashboard_model->insert_entity($entity_datas);
                        }
                        
                        $enquiry_header = array(
                            'object_id' => $object_id,
                            'guest_entity_id' => $entity_id,
                            'agent_entity_id' => $this->request->getPost('agent_id'),
                            'employee_entity_id' => $user_id,
                            'enq_added_date' => $sdate,
                            'enq_type_id' => $system_id,
                            'is_active' => 1,
                            'ref_no' => $ref_no,
                            'is_multiple' => $no_of_arrivals,
                            'enterprise_id' => $this->request->getPost('enterprise_id')
                        );
                        $enquiry_header_id = $Enquiry_model->insert_enquiry_header($enquiry_header);
                    }
                    if($enquiry_header_id){
                        $addmore = $this->request->getPost('addmore');
                        if(!empty($addmore)){
                            $vehicle_data = [];
                            foreach ($addmore as $item) {
                                $vehicle_data[] = [
                                    'vehicle_type_id' => $item['v_id'] ?? null,
                                    'vehicle_model_name' => $item['v_name'] ?? null,
                                    'vehicle_count' => $item['v_count'] ?? null
                                ];
                            }
                            $vehicle_json = json_encode($vehicle_data);
                        }
                        else{
                            $vehicle_json = json_encode([]);
                        }

                        $enquiry_details = array(
                            'enquiry_header_id' => $enquiry_header_id,
                            'date_of_tour_start' => $date_of_tour_start,
                            'no_of_night' => $this->request->getPost('no_of_days'),
                            'date_of_tour_completion' =>$date_of_tour_completion,
                            'enquiry_source' => $this->request->getPost('enq_source'),
                            'total_no_of_pax' => $this->request->getPost('total_no_of_pax'),
                            'no_of_adult' => $this->request->getPost('no_of_adult'),
                            'no_of_child_with_bed' => $this->request->getPost('no_of_child_with_bed') ? $this->request->getPost('no_of_child_with_bed') : 0,
                            'no_of_child_without_bed' => $this->request->getPost('no_of_child_without_bed') ? $this->request->getPost('no_of_child_without_bed') : 0,
                            'no_of_double_room' => $this->request->getPost('no_of_double_room'),
                            'no_of_single_room' => $this->request->getPost('no_of_single_room') ? $this->request->getPost('no_of_single_room') : 0,
                            'no_of_extra_bed' => $this->request->getPost('no_of_extra_bed') ? $this->request->getPost('no_of_extra_bed') : 0,
                            'gstin' => $this->request->getPost('gstin'),
                            'vehicle_from_location' => $this->request->getPost('hub_location'),
                            'arrival_location' => $this->request->getPost('arrival_location'),
                            'departure_location' => $this->request->getPost('departure_location'),
                            'hotel_category' => $this->request->getPost('hotel_category'),
                            'meal_plan' => $this->request->getPost('meal_plan'),
                            'is_vehicle_required' => $this->request->getPost('is_vehicle_req'),
                            'is_sight_seeing_required' => $this->request->getPost('is_ss_req'),
                            'is_quick_quote' => $this->request->getPost('is_qq_req'),
                            'vehicle_type_id' => $vehicle_json,
                            'enq_description' => $this->request->getPost('enq_description'),
                            'is_active' => 1,
                            'created_date' => $updated_time,
                            'created_by' => $user_id,
                            'enterprise_id' => $this->request->getPost('enterprise_id'),
                            'source_reference' => $this->request->getPost('source_reference'),
                            'sales_support_assigned_to' => $this->request->getPost('sales_support_assigned_to'),
                            'arrival_number' => 1
                        );
                        $enquiry_details_id = $Enquiry_model->insert_enquiry_details($enquiry_details);
                        if($enquiry_details_id){
                            $ext_enq_data = array(
                                'extension_ref_id' => $enquiry_details_id
                            );
                            $ext_enq_updated = $Enquiry_model->linkItinearywithEnquiry($ext_enq_data,$enquiry_header_id,$enquiry_details_id); 
                        }

                        if($edit_id == 0){
                            $edit_request_data = array(
                                'object_id' => $object_id,
                                'enquiry_header_id' => $enquiry_header_id,
                                'updated_time' => $updated_time,
                                'edit_request_status' => 1,
                                'is_active' => 1,
                                'updated_by' => $user_id,
                                'enterprise_id' => 1                            
                            );
                            $edit_request_id = $Enquiry_model->insertEditRequest($edit_request_data);
                            if($edit_request_id){
                                $status_data = array(
                                    'object_id' => $object_id,
                                    'enquiry_header_id' => $enquiry_header_id,
                                    'current_status_id' => 1,
                                    'updated_time' => $updated_time,
                                    'assigned_to' => $assigned_to,
                                    'assigned_status' => 1,
                                    'edit_request_id' => $edit_request_id,
                                    'updated_by' => $user_id,
                                    'enterprise_id' => 1                            
                                );
                                $status_data_insert = $Enquiry_model->insertEnquirystatus($status_data);
                            }
                            
                        }


                        /*********** Multiple Arrival Start************************ */
                        $additional_arrivals = $this->request->getPost('arrival');
                        
                        if (!empty($additional_arrivals) && $no_of_arrivals > 1) {
                            foreach ($additional_arrivals as $key => $arr) {
                                //if ($key == 1) continue;
                                if($edit_id > 0){
                                    $object_id = $edit_id;
                                }
                                else{
                                    $object_id = $Dashboard_model->insert_object($object_datas);
                                }

                                $enquiry_header = array(
                                    'object_id' => $object_id,
                                    'guest_entity_id' => $entity_id,
                                    'agent_entity_id' => $this->request->getPost('agent_id'),
                                    'employee_entity_id' => $user_id,
                                    'enq_added_date' => $sdate,
                                    'enq_type_id' => $system_id,
                                    'is_active' => 1,
                                    'ref_no' => $ref_no,
                                    'is_multiple' => $no_of_arrivals,
                                    'enterprise_id' => $this->request->getPost('enterprise_id')
                                );
                                $enquiry_header_id = $Enquiry_model->insert_enquiry_header($enquiry_header);
                                $veh_arr = isset($arr['vehicles']) ? json_encode(array_values($arr['vehicles'])) : json_encode([]);

                                $additional = array(
                                    'enquiry_header_id' => $enquiry_header_id,
                                    'date_of_tour_start' => $arr['start_date'] ?? '',
                                    'no_of_night' => $arr['ndays'] ?? '',
                                    'date_of_tour_completion' =>$arr['end_date'] ?? '',
                                    'enquiry_source' => $this->request->getPost('enq_source'),
                                    'total_no_of_pax' => $this->request->getPost('total_no_of_pax'),
                                    'no_of_adult' => $this->request->getPost('no_of_adult'),
                                    'no_of_child_with_bed' => $this->request->getPost('no_of_child_with_bed') ? $this->request->getPost('no_of_child_with_bed') : 0,
                                    'no_of_child_without_bed' => $this->request->getPost('no_of_child_without_bed') ? $this->request->getPost('no_of_child_without_bed') : 0,
                                    'no_of_double_room' => $this->request->getPost('no_of_double_room'),
                                    'no_of_single_room' => $this->request->getPost('no_of_single_room') ? $this->request->getPost('no_of_single_room') : 0,
                                    'no_of_extra_bed' => $this->request->getPost('no_of_extra_bed') ? $this->request->getPost('no_of_extra_bed') : 0,
                                    'gstin' => $this->request->getPost('gstin'),
                                    'vehicle_from_location' => $arr['hub_location'] ?? '',
                                    'arrival_location' => $arr['arrival_place'] ?? '',
                                    'departure_location' => $arr['departure_place'] ?? '',
                                    'hotel_category' => $this->request->getPost('hotel_category'),
                                    'meal_plan' => $this->request->getPost('meal_plan'),
                                    'is_vehicle_required' => $this->request->getPost('is_vehicle_req'),
                                    'is_sight_seeing_required' => $this->request->getPost('is_ss_req'),
                                    'is_quick_quote' => $this->request->getPost('is_qq_req'),
                                    'vehicle_type_id' => $veh_arr,
                                    'enq_description' => $this->request->getPost('enq_description'),
                                    'is_active' => 1,
                                    'created_date' => $updated_time,
                                    'created_by' => $user_id,
                                    'enterprise_id' => $this->request->getPost('enterprise_id'),
                                    'source_reference' => $this->request->getPost('source_reference'),
                                    'sales_support_assigned_to' => $this->request->getPost('sales_support_assigned_to'),
                                    'arrival_number' => $key
                                );
                                $enquiry_details_id = $Enquiry_model->insert_enquiry_details($additional);
                                if($enquiry_details_id){
                                    $ext_enq_data = array(
                                        'extension_ref_id' => $enquiry_details_id
                                    );
                                    $ext_enq_updated = $Enquiry_model->linkItinearywithEnquiry($ext_enq_data,$enquiry_header_id,$enquiry_details_id); 
                                }

                                
                                if($edit_id == 0){
                                    $edit_request_data = array(
                                        'object_id' => $object_id,
                                        'enquiry_header_id' => $enquiry_header_id,
                                        'updated_time' => $updated_time,
                                        'edit_request_status' => 1,
                                        'is_active' => 1,
                                        'updated_by' => $user_id,
                                        'enterprise_id' => 1                            
                                    );
                                    $edit_request_id = $Enquiry_model->insertEditRequest($edit_request_data);
                                    if($edit_request_id){
                                        $status_data = array(
                                            'object_id' => $object_id,
                                            'enquiry_header_id' => $enquiry_header_id,
                                            'current_status_id' => 1,
                                            'updated_time' => $updated_time,
                                            'assigned_to' => $assigned_to,
                                            'assigned_status' => 1,
                                            'edit_request_id' => $edit_request_id,
                                            'updated_by' => $user_id,
                                            'enterprise_id' => 1                            
                                        );
                                        $status_data_insert = $Enquiry_model->insertEnquirystatus($status_data);
                                    }
                                    
                                }

                            }
                        }
                        /**************Multiple Arrival End************************* */

                        $user_details = $Enquiry_model->get_user_mail_details($user_id);
                        $from_mails = json_decode($user_details[0]['entity_email'],true);
                        $from_email = is_array($from_mails) && count($from_mails) > 0 ? $from_mails[0] : '';
                        $from_mobiles = json_decode($user_details[0]['entity_mobile'],true);
                        $from_mobile = is_array($from_mobiles) && count($from_mobiles) > 0 ? $from_mobiles[0] : '';
                        $email_password = $user_details[0]['email_password']?$user_details[0]['email_password']:'';
                        $to_email = $guest_email;
                        $user_designation = $user_details[0]['designation']?$user_details[0]['designation']:'';
                        $email_contents = $Enquiry_model->get_email_content(1);
                        $subject = $email_contents[0]['subject'];
                        $contents = $email_contents[0]['content'];
                        $separatedData = explode('_', $contents);
                        $firstPart = $separatedData[0];
                        $secondPart = $separatedData[1];
                        $thirdpart = $separatedData[2];
                        $fourthpart = $separatedData[3];
                        $fivethpart = $separatedData[4];
                        $sixthpart = $separatedData[5];
                        $seventhpart = $separatedData[6];
                        $content = $firstPart . $ref_no . $thirdpart . $guest_name . $fivethpart .$from_mobile. $seventhpart;
                        
                        if(!empty($to_email) && !empty($from_email) && !empty($email_password)){
                            $this->send_mail_function($from_email,$email_password,$to_email,$from_mobile,$user_designation,$subject,$content);
                        }

                        return redirect()->to($sURL);
                    }
                } else {
                    return redirect()->to($sURL);
                }

                
            }
       
        else{
            return redirect()->to('Login');
        }
    }

    public function round_robin_assignment($user_id,$role_id){
        $Dashboard_model = new Dashboard_m();
        if($role_id == 5){
            $assigned_to = $user_id;
        }
        else if($role_id == 4){
            $users = $Dashboard_model->get_employees_under_tl($user_id);
            if(!empty($users)){
                $user_ids = array_column($users, 'entity_id');
                $last_assigned_ids = $Dashboard_model->get_last_assigned_user($user_id); 
                if(!empty($last_assigned_ids)){
                    $last_assigned_id = $last_assigned_ids[0]['assigned_to'];
                    $last_index = array_search($last_assigned_id, $user_ids);
                    $next_index = ($last_index === false || $last_index + 1 >= count($user_ids)) ? 0 : $last_index + 1;
                    $assigned_to = $user_ids[$next_index];
                }
                else{
                    $assigned_to = $users[0]['entity_id'];
                }
            }
            else{
                $assigned_to = $user_id;
            }
            //$assigned_to = $user_id;
        }
        else{
            /*$users = $Dashboard_model->get_employees_under_admin();
            if(!empty($users)){
                $user_ids = array_column($users, 'entity_id');
                $last_assigned_ids = $Dashboard_model->get_last_assigned_user_admin(); 
                if(!empty($last_assigned_ids)){
                    $last_assigned_id = $last_assigned_ids[0]['assigned_to'];
                    $last_index = array_search($last_assigned_id, $user_ids);
                    $next_index = ($last_index === false || $last_index + 1 >= count($user_ids)) ? 0 : $last_index + 1;
                    $assigned_to = $user_ids[$next_index];
                }
                else{
                    $assigned_to = $users[0]['entity_id'];
                }
            }
            else{
                $assigned_to = $user_id;
            }*/
            $assigned_to = $user_id;
        }
        return $assigned_to;
    }

    public function tour_plan($object_id,$edit_id=null)
    {
        if (!empty(session()->get('user_id'))) {
            $Enquiry_model = new Enquiry_m();
            $Dashboard_model = new Dashboard_m();
            $pre_enq_details = [];
            $pre_tour_plan = [];
            $pre_start_date = '1978-01-01';
            $pre_no_night = 0;
            $object_det = $Enquiry_model->get_object_details($object_id);
            if($edit_id > 0){
                $enquiry_details_id_new = $edit_id;
            }
            else{
                $enquiry_details_id_new = $object_det[0]['enquiry_details_id'];
            }
            $pre_enq_details = $Enquiry_model->get_previous_enquiry_details($object_det[0]['enquiry_header_id']);
            if(!empty($pre_enq_details)){
                $pre_start_date = $pre_enq_details[0]['date_of_tour_start'];
                $pre_no_night = $pre_enq_details[0]['no_of_night'];
                $pre_tour_plan_temp = $Enquiry_model->get_previous_tour_plan($pre_enq_details[0]['enquiry_header_id'],$pre_enq_details[0]['enquiry_details_id']);
                if(!empty($pre_tour_plan_temp)){
                    $extension_ref_id_temp = $pre_tour_plan_temp[0]['extension_ref_id'];
                    if($extension_ref_id_temp){
                        $pre_tour_plan = $Enquiry_model->get_previous_tour_plan_lastupdated($extension_ref_id_temp);
                    }
                }
            }
            $cur_tour_plan = $Enquiry_model->get_current_tour_plan($object_det[0]['enquiry_header_id'],$enquiry_details_id_new);
            $tour_start_date = $object_det[0]['date_of_tour_start_temp'];
            $today = date('Y-m-d');
            if (strtotime($tour_start_date) < strtotime($today)) {
                session()->setFlashdata('error', 'Tour start date must be greater than today!');
                return redirect()->to('Enquiry/enquiry_list_view/10');
            }
            else{
                $tour_plan_det = [];
                $quick_quote_det = [];
                $object_class_id = 10;
                $entity_id = session('user_id');
                $active_role = session('active_role');
                $all_systems = $Dashboard_model->get_all_systems($entity_id);
                $data['all_systems'] = $all_systems;
                $all_roles = $Dashboard_model->get_all_entity_roles($entity_id);
                if(!empty($all_roles)){
                    $data['all_roles_assn'] = $all_roles;
                    $all_menus = $Dashboard_model->get_all_role_menus($active_role);
                    if(!empty($all_menus)){
                        $data['all_menus'] = $all_menus;
                    }
                    else{
                        $data['all_menus'] = [];
                    }
                    $all_permissions = $Dashboard_model->get_all_entity_permissions($active_role,3);
                    if(!empty($all_permissions)){
                        $data['all_permissions'] = $all_permissions;
                    }
                    else{
                        $data['all_permissions'] = [];
                    }
                }
                else{
                    $data['all_roles_assn'] = [];
                    $data['all_menus'] = [];
                    $data['all_permissions'] = [];
                }
            
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
            
                $all_locations = $Enquiry_model->get_tour_locations();
                $arrival_locations = $Dashboard_model->get_arrival_locations();
                $departure_locations = $Dashboard_model->get_departure_locations();
                $hotel_categories = $Dashboard_model->get_hotel_categories();
                $all_hotels = $Enquiry_model->get_all_hotels();
                $all_room_categories = $Enquiry_model->get_all_room_categories();
                $meal_plans = $Dashboard_model->get_meal_plan();
                $hub_loc = $Dashboard_model->get_hub_location();
                $enterprise_id = 1;
                //$attributes = $Dashboard_model->get_all_obj_attributes($object_class_id);
                //$boolean_attributes = $Dashboard_model->get_obj_boolean_attributes($object_class_id);
                
                $object_type_id = 5;
                $parent_menu = $Dashboard_model->get_parent_menus();
                $sub_menu = $Dashboard_model->get_sub_menus();
                $data['parent_menu'] = $parent_menu;
                $data['sub_menu'] = $sub_menu;
                $data['object_class_id'] = $object_class_id;
                $data['object_type_id'] = $object_type_id;
                if(!empty($object_class_det)){
                    $data['object_class_name'] = $object_class_det[0]['object_class_name'];
                }
                else{
                    $data['object_class_name'] = null;
                }
                $data['states'] = $Enquiry_model->indian_states();
                $data['all_agents'] = $Enquiry_model->get_all_agents();
                $tour_plan_det = $Enquiry_model->get_tour_plan_details($object_det[0]['enquiry_header_id'],$enquiry_details_id_new);
                $data['tour_plan_det'] = $tour_plan_det;
                $tour_plan_draft_det = $Enquiry_model->get_tour_plan_draft_details($object_det[0]['enquiry_header_id'],$enquiry_details_id_new);
                $data['tour_plan_draft_det'] = $tour_plan_draft_det;

                if($object_det[0]['is_quick_quote'] && !empty($tour_plan_det)){
                    $quick_quote_det = $Enquiry_model->get_quick_quote_details($object_det[0]['enquiry_header_id'],$enquiry_details_id_new,$tour_plan_det[0]['tour_details_id']);
                   
                }
                $data['quick_quote_det'] = $quick_quote_det;
                $data['all_locations'] = $all_locations;
                $data['arrival_locations'] = $arrival_locations;
                $data['departure_locations'] = $departure_locations;
                $data['hotel_categories'] = $hotel_categories;
                $data['all_hotels'] = $all_hotels;
                $data['all_room_categories'] = $all_room_categories;
                $data['meal_plans'] = $meal_plans;
                $data['hub_loc'] = $hub_loc;
                $data['enterprise_id'] = $enterprise_id;
                $data['object_det'] = $object_det;
                $data['obj_name'] = $obj_name;
                $data['obj_loc'] = $obj_loc;
                $data['object_id'] = $object_id;
                $data['pre_tour_plan'] = $pre_tour_plan;
                $data['cur_tour_plan'] = $cur_tour_plan;
                $data['pre_start_date'] = $pre_start_date;
                $data['pre_no_night'] = $pre_no_night;
                $data['edit_id'] = $edit_id;
                return view('enquiry/tour_plan_view',$data);
            }
        }
        else{
            return redirect()->to('Login');
        }
    }
    public function fetchEnquiryDetails()
    {
        if (!empty(session()->get('user_id'))) {
            $Enquiry_model = new Enquiry_m();
            $object_id = $this->request->getPost('object_id');
            $des_det = $Enquiry_model->fetchEnquiryDetails($object_id);
            echo json_encode($des_det);
        }
        else{
            return redirect()->to('Login');
        }
    }
    public function availabilityCheck()
    {
        if (!empty(session()->get('user_id'))) {
            $Enquiry_model = new Enquiry_m();
            date_default_timezone_set('Asia/Kolkata');
            $updated_time = date('Y-m-d H:i:s');
            $user_id = session('user_id');
            $enquiry_detail_details_id = $this->request->getPost('enquiry_detail_details_id');
            $ext_det = $Enquiry_model->getExtensionDetailsbyid($enquiry_detail_details_id);
            $ac_exist = $Enquiry_model->check_ac_exist($ext_det[0]['enquiry_header_id']);

            $guest_details = $Enquiry_model->get_enquiry_guest_details($ext_det[0]['enquiry_header_id']);
            if(!empty($guest_details)){
                $ref_no = $guest_details[0]['ref_no'];
                $guest_name = $guest_details[0]['guest_name'];
            }
            else{
                $ref_no = "";
                $guest_name = "";
            }

            $clear_status = array(
                'assigned_status' => 0           
            );
            $clear_status_data = $Enquiry_model->updateAssignedStatus($clear_status,$ext_det[0]['enquiry_header_id']);


            if($ac_exist == 0){
                $ac_data = array(
                    'availability_check' => 1
                );
                $ac_update = $Enquiry_model->update_availability_check($ac_data,$enquiry_detail_details_id);   
                if($ac_update){
                    $assigned_sops = $Enquiry_model->getAlreadyAssignedsop($ext_det[0]['enquiry_header_id']);
                    if(!empty($assigned_sops)){
                        $assigned_to = $assigned_sops[0]['assigned_to'];
                    }
                    else{
                        $assigned_to = $this->round_robin_assignment_sop($user_id);
                    }
                    $er_det = $Enquiry_model->getEditRequestDetails($ext_det[0]['enquiry_header_id']);
                    $status_data = array(
                        'object_id' => $ext_det[0]['object_id'],
                        'enquiry_header_id' => $ext_det[0]['enquiry_header_id'],
                        'current_status_id' => 8,
                        'updated_time' => $updated_time,
                        'assigned_to' => $assigned_to,
                        'assigned_status' => 1,
                        'edit_request_id' => $er_det[0]['enquiry_edit_request_id'],
                        'updated_by' => $user_id,
                        'enterprise_id' => 1                            
                    );
                    $status_data_insert = $Enquiry_model->insertEnquirystatus($status_data);
                    $sop_det = $Enquiry_model->getSOPName($assigned_to);

                        $user_details = $Enquiry_model->get_user_mail_details($user_id);
                        $executive_name = $user_details[0]['entity_name'];
                        $from_mails = json_decode($user_details[0]['entity_email'],true);
                        $from_email = is_array($from_mails) && count($from_mails) > 0 ? $from_mails[0] : '';
                        $from_mobiles = json_decode($user_details[0]['entity_mobile'],true);
                        $from_mobile = is_array($from_mobiles) && count($from_mobiles) > 0 ? $from_mobiles[0] : '';
                        $email_password = $user_details[0]['email_password']?$user_details[0]['email_password']:'';

                        $to_sop_user_details = $Enquiry_model->get_user_mail_details($assigned_to);
                        $to_sop_mails = json_decode($to_sop_user_details[0]['entity_email'],true);
                        $to_sop_email = is_array($to_sop_mails) && count($to_sop_mails) > 0 ? $to_sop_mails[0] : '';

                        $user_designation = $user_details[0]['designation']?$user_details[0]['designation']:'';

                        $content = "<p>Please check room availability and update in CRM</p><br><p>Reference No : $ref_no</p><p>Executive Name : $executive_name</p>";
                        $subject = $guest_name.' | '.$ref_no.' | '.'Hotel Availability Check';
                        
                        if(!empty($to_sop_email) && !empty($from_email) && !empty($email_password)){
                            $this->send_mail_function($from_email,$email_password,$to_sop_email,$from_mobile,$user_designation,$subject,$content);
                        }
                    echo json_encode($sop_det);    
                }   
                else{
                    echo 0;
                }   
            }
            else{
                echo 0;
            }
        }
        else{
            return redirect()->to('Login');
        }
    }

    public function round_robin_assignment_sop($user_id){
        $Dashboard_model = new Dashboard_m();
        $users = $Dashboard_model->get_sop_employees_under_admin();
            if(!empty($users)){
                $user_ids = array_column($users, 'entity_id');
                $last_assigned_ids = $Dashboard_model->get_last_assigned_sop_user_admin(); 
                if(!empty($last_assigned_ids)){
                    $last_assigned_id = $last_assigned_ids[0]['assigned_to'];
                    $last_index = array_search($last_assigned_id, $user_ids);
                    $next_index = ($last_index === false || $last_index + 1 >= count($user_ids)) ? 0 : $last_index + 1;
                    $assigned_to = $user_ids[$next_index];
                }
                else{
                    $assigned_to = $users[0]['entity_id'];
                }
            }
            else{
                $users = $Dashboard_model->get_soplead_employees_under_admin();
                if(!empty($users)){
                    $user_ids = array_column($users, 'entity_id');
                    $last_assigned_ids = $Dashboard_model->get_last_assigned_soplead_user_admin(); 
                    if(!empty($last_assigned_ids)){
                        $last_assigned_id = $last_assigned_ids[0]['assigned_to'];
                        $last_index = array_search($last_assigned_id, $user_ids);
                        $next_index = ($last_index === false || $last_index + 1 >= count($user_ids)) ? 0 : $last_index + 1;
                        $assigned_to = $user_ids[$next_index];
                    }
                    else{
                        $assigned_to = $users[0]['entity_id'];
                    }
                }
                else{
                    $assigned_to = $user_id;
                }
            }
        
        return $assigned_to;
    }

    public function round_robin_assignment_top($user_id){
        $Dashboard_model = new Dashboard_m();
        $users = $Dashboard_model->get_top_employees_under_admin();
            if(!empty($users)){
                $user_ids = array_column($users, 'entity_id');
                $last_assigned_ids = $Dashboard_model->get_last_assigned_top_user_admin(); 
                if(!empty($last_assigned_ids)){
                    $last_assigned_id = $last_assigned_ids[0]['assigned_to'];
                    $last_index = array_search($last_assigned_id, $user_ids);
                    $next_index = ($last_index === false || $last_index + 1 >= count($user_ids)) ? 0 : $last_index + 1;
                    $assigned_to = $user_ids[$next_index];
                }
                else{
                    $assigned_to = $users[0]['entity_id'];
                }
            }
            else{
                $users = $Dashboard_model->get_toplead_employees_under_admin();
                if(!empty($users)){
                    $user_ids = array_column($users, 'entity_id');
                    $last_assigned_ids = $Dashboard_model->get_last_assigned_toplead_user_admin(); 
                    if(!empty($last_assigned_ids)){
                        $last_assigned_id = $last_assigned_ids[0]['assigned_to'];
                        $last_index = array_search($last_assigned_id, $user_ids);
                        $next_index = ($last_index === false || $last_index + 1 >= count($user_ids)) ? 0 : $last_index + 1;
                        $assigned_to = $user_ids[$next_index];
                    }
                    else{
                        $assigned_to = $users[0]['entity_id'];
                    }
                }
                else{
                    $assigned_to = $user_id;
                }
            }
        
        return $assigned_to;
    }

    public function getselectedtourplandetails()
    {
        if (!empty(session()->get('user_id'))) {
            $Enquiry_model = new Enquiry_m();
            $object_id = $this->request->getPost('object_id');
            $enquiry_header_id = $this->request->getPost('enquiry_header_id');
            $enquiry_details_id = $this->request->getPost('enquiry_details_id');
          
            $t_det = $Enquiry_model->getselectedtourplandetails($object_id,$enquiry_header_id,$enquiry_details_id);
            echo json_encode($t_det);
        }
        else{
            return redirect()->to('Login');
        }
    }
    public function fetchEnquiryDetailsEdit()
    {
        if (!empty(session()->get('user_id'))) {
            $Enquiry_model = new Enquiry_m();
            $object_id = $this->request->getPost('object_id');
            $enquiry_details_id = $this->request->getPost('enquiry_details_id');
            $des_det = $Enquiry_model->fetchEnquiryDetailsEdit($object_id,$enquiry_details_id);
            echo json_encode($des_det);
        }
        else{
            return redirect()->to('Login');
        }
    }
    public function getTourTariffDetails()
    {
        if (!empty(session()->get('user_id'))) {
            $Enquiry_model = new Enquiry_m();
            $different_season = 0;
            $different_weekends = 0;
            $season_id_copy = 0;
            $season_name1 = '';
            $season_name2 = '';
            $vehicle_models = $this->request->getPost('vehicle_models');
            $hotel_id = $this->request->getPost('hotel_id');
            $room_cat_id = $this->request->getPost('room_cat_id');
            $mealplan = $this->request->getPost('mealplan');
            $checkin = $this->request->getPost('checkin');
            $checkout = $this->request->getPost('checkout');
            $no_of_night = $this->request->getPost('no_of_night');
            $double = $this->request->getPost('double');
            $single = $this->request->getPost('single');

            $id = $this->request->getPost('id');
            $duration = $this->request->getPost('duration');
            $totalNights = $this->request->getPost('totalNights');
            $tour_location_id = $this->request->getPost('tour_location_id');
            $previous_location_id = $this->request->getPost('previous_location_id');
            $vehicle_from_location = $this->request->getPost('vehicle_from_location');
            $vehicle_from_locations = $Enquiry_model->getLocationidfromhub($vehicle_from_location);
            $arrival_location = $this->request->getPost('arrival_location');
            if(!empty($vehicle_from_locations)){
                $vehicle_from_loc_id = $vehicle_from_locations[0]['geog_id'];
            }
            else{
                $vehicle_from_loc_id = $arrival_location;
            }
            $departure_location = $this->request->getPost('departure_location');
            $dist1 = 0;
            $dist2 = 0;
            $dist3 = 0;
            $dist4 = 0;
            $total_distance = 0;
            if($id == 1){
                if($duration == $totalNights){
                    $distance1 = $Enquiry_model->getDistancebyLocations($vehicle_from_loc_id,$arrival_location);
                    $distance2 = $Enquiry_model->getDistancebyLocations($arrival_location,$tour_location_id);
                    $distance3 = $Enquiry_model->getDistancebyLocations($tour_location_id,$departure_location);
                    $distance4 = $Enquiry_model->getDistancebyLocations($departure_location,$vehicle_from_loc_id);
                    if(!empty($distance1)){
                        $dist1 = $distance1[0]['geog_km_distance'];
                    }
                    else{
                        $dist1 = 0;
                    }
                    if(!empty($distance2)){
                        $dist2 = $distance2[0]['geog_km_distance'];
                    }
                    else{
                        $dist2 = 0;
                    }
                    if(!empty($distance3)){
                        $dist3 = $distance3[0]['geog_km_distance'];
                    }
                    else{
                        $dist3 = 0;
                    }
                    if(!empty($distance4)){
                        $dist4 = $distance4[0]['geog_km_distance'];
                    }
                    else{
                        $dist4 = 0;
                    }
                    $total_distance = $dist1 + $dist2 + $dist3 + $dist4;
                    $distance_type = 1;
                }
                else{
                    $distance1 = $Enquiry_model->getDistancebyLocations($vehicle_from_loc_id,$arrival_location);
                    $distance2 = $Enquiry_model->getDistancebyLocations($arrival_location,$tour_location_id);
                    if(!empty($distance1)){
                        $dist1 = $distance1[0]['geog_km_distance'];
                    }
                    else{
                        $dist1 = 0;
                    }
                    if(!empty($distance2)){
                        $dist2 = $distance2[0]['geog_km_distance'];
                    }
                    else{
                        $dist2 = 0;
                    }
                    $total_distance = $dist1 + $dist2;
                    $distance_type = 2;
                }
            }
            else{
                if($duration == $totalNights){
                    $distance1 = $Enquiry_model->getDistancebyLocations($tour_location_id,$departure_location);
                    $distance2 = $Enquiry_model->getDistancebyLocations($departure_location,$vehicle_from_loc_id);
                    if(!empty($distance1)){
                        $dist1 = $distance1[0]['geog_km_distance'];
                    }
                    else{
                        $dist1 = 0;
                    }
                    if(!empty($distance2)){
                        $dist2 = $distance2[0]['geog_km_distance'];
                    }
                    else{
                        $dist2 = 0;
                    }
                    $total_distance = $dist1 + $dist2;
                    $distance_type = 3;
                }
                else{
                    $distance = $Enquiry_model->getDistancebyLocations($previous_location_id,$tour_location_id);
                    if(!empty($distance)){
                        $total_distance = $distance[0]['geog_km_distance'];
                    }
                    else{
                        $total_distance = 0;
                    }
                    $distance_type = 4;
                }
            }

            $tariff_det = [];

            $object_ids = $Enquiry_model->getObjectidByhotel($hotel_id);
            $object_id = $object_ids[0]['object_id'];
            $startDate = new DateTime($checkin);
            $endDate = new DateTime($checkout);
            //$endDate->modify('+1 day');
            $interval = new DateInterval('P1D');
            $period = new DatePeriod($startDate, $interval, $endDate);
            $d_room_tariff = 0;
            $d_child_tariff = 0;
            $d_child_wb_tariff = 0;
            $d_extra_tariff = 0;

            $s_room_tariff = 0;
            $s_child_tariff = 0;
            $s_child_wb_tariff = 0;
            $s_extra_tariff = 0;
            $season_id_t = null;
            $veh_tariffs = [];

            if(!empty($vehicle_models)){
                foreach($vehicle_models as $key => $val) {
                    $veh_object_ids = $Enquiry_model->getObjectidByvehicle($val['vehicle_type_id']);
                    $veh_object_id = $veh_object_ids[0]['object_id'];
                    $rate_per_day = 0;
                    $max_km_day = 0;
                    $extra_km_rate = 0;
                    $km_rate = 0;
                    $veh_tariffs[$key]['vehicle_count'] = $val['vehicle_count'];
                    $veh_tariffs[$key]['vehicle_type_id'] = $val['vehicle_type_id'];
                    $veh_tariffs[$key]['vehicle_model_name'] = $val['vehicle_model_name'];
                    $vehicle_basic_tariffs = $Enquiry_model->getTourtravelbasic(1,$val['vehicle_type_id']);
                    $max_km_day = $vehicle_basic_tariffs[0]['tour_travel_max_km'];
                    $extra_km_rate = $vehicle_basic_tariffs[0]['extra_km_rate'];  
                    foreach ($period as $date) {
                        $v_tour_date = $date->format('Y-m-d');
                        $vehicle_basic_tariffs = $Enquiry_model->getTourtravelbasic(1,$val['vehicle_type_id']);
                        $v_season_tariff = $Enquiry_model->checkVehicleSeasonExist($v_tour_date,$veh_object_id);
                        if(!empty($v_season_tariff)){
                            $vehicle_season_tariffs = $Enquiry_model->getTourtravelseason(2,$v_season_tariff[0]['season_id'],$val['vehicle_type_id']);
                            $rate_per_day = $rate_per_day + $vehicle_season_tariffs[0]['rate_per_day'];
                            $extra_km_rate = $vehicle_season_tariffs[0]['extra_km_rate'];
                            $km_rate = $vehicle_season_tariffs[0]['km_rate'];
                        }
                        else{
                            $vehicle_tariffs = $Enquiry_model->getTourtravelbasic(1,$val['vehicle_type_id']);
                            $rate_per_day = $rate_per_day + $vehicle_tariffs[0]['tour_travel_daily_rate'];
                        }
                    }
                    $veh_tariffs[$key]['rate_per_day'] = $rate_per_day/$no_of_night;
                    $veh_tariffs[$key]['max_km_day'] = $max_km_day;
                    $veh_tariffs[$key]['extra_km_rate'] = $extra_km_rate;
                }
            }
            
            if($double > 0){    
                $room_type = 2;
               
                foreach ($period as $date) { 
                    $tour_date = $date->format('Y-m-d');
                    $weekend_tariff = $Enquiry_model->checkWeekendExist($tour_date,$object_id);
                    $season_tariff = $Enquiry_model->checkSeasonExist($tour_date,$object_id);

                    if(!empty($weekend_tariff)){
                        $season_id_temp = $weekend_tariff[0]['season_id'];
                    }
                    else if(!empty($season_tariff)){
                        $season_id_temp = $season_tariff[0]['season_id'];
                    }
                    else{
                        $season_id_temp = 0;
                    }
                    
                    if(!empty($weekend_tariff)){

                        if($season_id_temp !== $season_id_copy && $season_id_copy > 0){
                            $different_season = 1;
                            $season_names1 = $Enquiry_model->getseasonname($season_id_temp);
                            if(!empty($season_names1)){
                                $season_name1 = $season_names1[0]['season_name'];
                            }
                            $season_names2 = $Enquiry_model->getseasonname($season_id_copy);
                            if(!empty($season_names2)){
                                $season_name2 = $season_names2[0]['season_name'];
                            }
                        }
                        
                        $room_tariffs = $Enquiry_model->getTourTariffDetails(7,$room_cat_id,$room_type,$weekend_tariff[0]['weekend_id'],$object_id,$mealplan);
                        if(!empty($room_tariffs)){
                            $d_room_tariff = $d_room_tariff + $room_tariffs[0]['tariff'];
                        }
                        else{
                            $d_room_tariff = 0;
                        } 

                        $child_tariffs = $Enquiry_model->getTourTariffDetailsChild(13,$room_cat_id,$room_type,$weekend_tariff[0]['weekend_id'],$object_id,$mealplan,1);
                        if(!empty($child_tariffs)){
                            $d_child_tariff = $d_child_tariff + $child_tariffs[0]['tariff'];
                        }
                        else{
                            $d_child_tariff = 0;
                        }

                        $child_wb_tariffs = $Enquiry_model->getTourTariffDetailsChild(16,$room_cat_id,$room_type,$weekend_tariff[0]['weekend_id'],$object_id,$mealplan,2);
                        if(!empty($child_wb_tariffs)){
                            $d_child_wb_tariff = $d_child_wb_tariff + $child_wb_tariffs[0]['tariff'];
                        }
                        else{
                            $d_child_wb_tariff = 0;
                        }

                        $extra_tariffs = $Enquiry_model->getTourTariffDetailsChild(10,$room_cat_id,$room_type,$weekend_tariff[0]['weekend_id'],$object_id,$mealplan,3);
                        if(!empty($extra_tariffs)){
                            $d_extra_tariff = $d_extra_tariff + $extra_tariffs[0]['tariff'];
                        }
                        else{
                            $d_extra_tariff = 0;
                        }
                    }
                    else if(!empty($season_tariff)){

                        
                        if($season_id_temp !== $season_id_copy && $season_id_copy > 0){
                            $different_season = 1;
                            $season_names1 = $Enquiry_model->getseasonname($season_id_temp);
                            if(!empty($season_names1)){
                                $season_name1 = $season_names1[0]['season_name'];
                            }
                            $season_names2 = $Enquiry_model->getseasonname($season_id_copy);
                            if(!empty($season_names2)){
                                $season_name2 = $season_names2[0]['season_name'];
                            }
                        }
                        $room_tariffs = $Enquiry_model->getTourTariffDetails(6,$room_cat_id,$room_type,$season_tariff[0]['season_id'],$object_id,$mealplan);
                        if(!empty($room_tariffs)){
                            $d_room_tariff = $d_room_tariff + $room_tariffs[0]['tariff'];
                        }
                        else{
                            $d_room_tariff = 0;
                        }

                        $child_tariffs = $Enquiry_model->getTourTariffDetailsChild(12,$room_cat_id,$room_type,$season_tariff[0]['season_id'],$object_id,$mealplan,1);
                        if(!empty($child_tariffs)){
                            $d_child_tariff = $d_child_tariff + $child_tariffs[0]['tariff'];
                        }
                        else{
                            $d_child_tariff = 0;
                        }

                        $child_wb_tariffs = $Enquiry_model->getTourTariffDetailsChild(15,$room_cat_id,$room_type,$season_tariff[0]['season_id'],$object_id,$mealplan,2);
                        if(!empty($child_wb_tariffs)){
                            $d_child_wb_tariff = $d_child_wb_tariff + $child_wb_tariffs[0]['tariff'];
                        }
                        else{
                            $d_child_wb_tariff = 0;
                        }

                        $extra_tariffs = $Enquiry_model->getTourTariffDetailsChild(9,$room_cat_id,$room_type,$season_tariff[0]['season_id'],$object_id,$mealplan,3);
                        if(!empty($extra_tariffs)){
                            $d_extra_tariff = $d_extra_tariff + $extra_tariffs[0]['tariff'];
                        }
                        else{
                            $d_extra_tariff = 0;
                        }
                        

                    }
                    else{

                        $room_tariffs = $Enquiry_model->getTourTariffDetailsBasic(5,$room_cat_id,$room_type,$object_id,$mealplan);
                        if(!empty($room_tariffs)){
                            $d_room_tariff = $d_room_tariff + $room_tariffs[0]['tariff'];
                        }
                        else{
                            $d_room_tariff = 0;
                        }

                        $child_tariffs = $Enquiry_model->getTourTariffDetailsChildBasic(11,$room_cat_id,$room_type,$object_id,$mealplan,1);
                        if(!empty($child_tariffs)){
                            $d_child_tariff = $d_child_tariff + $child_tariffs[0]['exclusive_tariff'];
                        }
                        else{
                            $d_child_tariff = 0;
                        }

                        $child_wb_tariffs = $Enquiry_model->getTourTariffDetailsChildBasic(11,$room_cat_id,$room_type,$object_id,$mealplan,2);
                        if(!empty($child_wb_tariffs)){
                            $d_child_wb_tariff = $d_child_wb_tariff + $child_wb_tariffs[0]['exclusive_tariff'];
                        }
                        else{
                            $d_child_wb_tariff = 0;
                        }

                        $extra_tariffs = $Enquiry_model->getTourTariffDetailsChildBasic(11,$room_cat_id,$room_type,$object_id,$mealplan,3);
                        if(!empty($extra_tariffs)){
                            $d_extra_tariff = $d_extra_tariff + $extra_tariffs[0]['exclusive_tariff'];
                        }
                        else{
                            $d_extra_tariff = 0;
                        }
                    }
                    $season_id_copy = $season_id_temp;
                }
            }

            if($single > 0){    
                $room_type = 1;
                
                foreach ($period as $date) {
                    $tour_date = $date->format('Y-m-d');
                    $weekend_tariff = $Enquiry_model->checkWeekendExist($tour_date,$object_id);
                    $season_tariff = $Enquiry_model->checkSeasonExist($tour_date,$object_id);
                   
                    
                    if(!empty($weekend_tariff)){
                     
                        $s_room_tariffs = $Enquiry_model->getTourTariffDetails(7,$room_cat_id,$room_type,$weekend_tariff[0]['weekend_id'],$object_id,$mealplan);
                        if(!empty($s_room_tariffs)){
                            $s_room_tariff = $s_room_tariff + $s_room_tariffs[0]['tariff'];
                        }
                        else{
                            $s_room_tariff = 0;
                        }

                        $s_child_tariffs = $Enquiry_model->getTourTariffDetailsChild(13,$room_cat_id,$room_type,$weekend_tariff[0]['weekend_id'],$object_id,$mealplan,1);
                        if(!empty($s_child_tariffs)){
                            $s_child_tariff = $s_child_tariff + $s_child_tariffs[0]['tariff'];
                        }
                        else{
                            $s_child_tariff = 0;
                        }

                        $s_child_wb_tariffs = $Enquiry_model->getTourTariffDetailsChild(16,$room_cat_id,$room_type,$weekend_tariff[0]['weekend_id'],$object_id,$mealplan,2);
                        if(!empty($s_child_wb_tariffs)){
                            $s_child_wb_tariff = $s_child_wb_tariff + $s_child_wb_tariffs[0]['tariff'];
                        }
                        else{
                            $s_child_wb_tariff = 0;
                        }

                        $s_extra_tariffs = $Enquiry_model->getTourTariffDetailsChild(10,$room_cat_id,$room_type,$weekend_tariff[0]['weekend_id'],$object_id,$mealplan,3);
                        if(!empty($s_extra_tariffs)){
                            $s_extra_tariff = $s_extra_tariff + $s_extra_tariffs[0]['tariff'];
                        }
                        else{
                            $s_extra_tariff = 0;
                        }
                    }
                    else if(!empty($season_tariff)){
                        $s_room_tariffs = $Enquiry_model->getTourTariffDetails(6,$room_cat_id,$room_type,$season_tariff[0]['season_id'],$object_id,$mealplan);
                        if(!empty($s_room_tariffs)){
                            $s_room_tariff = $s_room_tariff + $s_room_tariffs[0]['tariff'];
                        }
                        else{
                            $s_room_tariff = 0;
                        }

                        $s_child_tariffs = $Enquiry_model->getTourTariffDetailsChild(12,$room_cat_id,$room_type,$season_tariff[0]['season_id'],$object_id,$mealplan,1);
                        if(!empty($s_child_tariffs)){
                            $s_child_tariff = $s_child_tariff + $s_child_tariffs[0]['tariff'];
                        }
                        else{
                            $s_child_tariff = 0;
                        }

                        $s_child_wb_tariffs = $Enquiry_model->getTourTariffDetailsChild(15,$room_cat_id,$room_type,$season_tariff[0]['season_id'],$object_id,$mealplan,2);
                        if(!empty($s_child_wb_tariffs)){
                            $s_child_wb_tariff = $s_child_wb_tariff + $s_child_wb_tariffs[0]['tariff'];
                        }
                        else{
                            $s_child_wb_tariff = 0;
                        }

                        $s_extra_tariffs = $Enquiry_model->getTourTariffDetailsChild(9,$room_cat_id,$room_type,$season_tariff[0]['season_id'],$object_id,$mealplan,3);
                        if(!empty($s_extra_tariffs)){
                            $s_extra_tariff = $s_extra_tariff + $s_extra_tariffs[0]['tariff'];
                        }
                        else{
                            $s_extra_tariff = 0;
                        }

                    }
                    else{

                        $room_tariffs = $Enquiry_model->getTourTariffDetailsBasic(5,$room_cat_id,$room_type,$object_id,$mealplan);
                        if(!empty($room_tariffs)){
                            $s_room_tariff = $s_room_tariff + $room_tariffs[0]['tariff'];
                        }
                        else{
                            $s_room_tariff = 0;
                        }

                        $child_tariffs = $Enquiry_model->getTourTariffDetailsChildBasic(11,$room_cat_id,$room_type,$object_id,$mealplan,1);
                        if(!empty($child_tariffs)){
                            $s_child_tariff = $s_child_tariff + $child_tariffs[0]['exclusive_tariff'];
                        }
                        else{
                            $s_child_tariff = 0;
                        }

                        $child_wb_tariffs = $Enquiry_model->getTourTariffDetailsChildBasic(11,$room_cat_id,$room_type,$object_id,$mealplan,2);
                        if(!empty($child_wb_tariffs)){
                            $s_child_wb_tariff = $s_child_wb_tariff + $child_wb_tariffs[0]['exclusive_tariff'];
                        }
                        else{
                            $s_child_wb_tariff = 0;
                        }

                        $extra_tariffs = $Enquiry_model->getTourTariffDetailsChildBasic(11,$room_cat_id,$room_type,$object_id,$mealplan,3);
                        if(!empty($extra_tariffs)){
                            $s_extra_tariff = $s_extra_tariff + $extra_tariffs[0]['exclusive_tariff'];
                        }
                        else{
                            $s_extra_tariff = 0;
                        }
                    }
                }
            }
            $tariff_det['d_room_tariff']=intval($d_room_tariff/$no_of_night);
            $tariff_det['d_child_tariff']=intval($d_child_tariff/$no_of_night);
            $tariff_det['d_child_wb_tariff']=intval($d_child_wb_tariff/$no_of_night);
            $tariff_det['d_extra_tariff']=intval($d_extra_tariff/$no_of_night);

            $tariff_det['s_room_tariff']=intval($s_room_tariff/$no_of_night);
            $tariff_det['s_child_tariff']=intval($s_child_tariff/$no_of_night);
            $tariff_det['s_child_wb_tariff']=intval($s_child_wb_tariff/$no_of_night);
            $tariff_det['s_extra_tariff']=intval($s_extra_tariff/$no_of_night);
            $tariff_det['vehicles']=$veh_tariffs;
            $tariff_det['total_distance']=$total_distance;
            $tariff_det['dist1']=$dist1;
            $tariff_det['dist2']=$dist2;
            $tariff_det['dist3']=$dist3;
            $tariff_det['dist4']=$dist4;
            $tariff_det['distance_type']=$distance_type;
            $tariff_det['different_season']=$different_season;
            $tariff_det['season_name1']=$season_name1;
            $tariff_det['season_name2']=$season_name2;
            echo json_encode($tariff_det);
        }
        else{
            return redirect()->to('Login');
        }
    }

 //////////nj///////////////
public function saveTourPlan()
{
    if (!empty(session()->get('user_id'))) {
        $Dashboard_model = new Dashboard_m();
        $Enquiry_model = new Enquiry_m();

        date_default_timezone_set('Asia/Kolkata');
        $updated_time = date('Y-m-d H:i:s');
        $sdate = date('Y-m-d');
        $system_id = session('system_id');
        $user_id = session('user_id');
        $edit_id = $this->request->getPost('edit_id');
        $enquiry_header_id = $this->request->getPost('enquiry_header_id');
        if ($edit_id > 0) {
            $up_data = array(
                'is_active' => 0,
                'is_draft' => 0
            );
            $up_itidata = array(
                'is_active' => 0,
                'is_draft' => 0
            );
            $up_extdata = array(
                'is_edit' => 0
            );

            $tp_update = $Enquiry_model->update_tourplan_isactive($up_data, $enquiry_header_id);
            $iti_update = $Enquiry_model->update_itinerary_isactive($up_itidata, $enquiry_header_id);
            $ext_update = $Enquiry_model->update_extension_isedit($up_extdata, $enquiry_header_id);
        }

        $object_id = $this->request->getPost('object_id');
        $sURL = site_url('Enquiry/tour_plan/' . $object_id);

        $submit_type = $this->request->getPost('submit_type');
        $enquiry_details_id = $this->request->getPost('enquiry_details_id');
        $no_of_double_room = (int)($this->request->getPost('no_of_double_room') ?? 0);
        $no_of_single_room = (int)($this->request->getPost('no_of_single_room') ?? 0);
        $is_quick_quote = (int)($this->request->getPost('is_quick_quote') ?? 0);

        $addloc = $this->request->getPost('addloc');
        $all_hd_ster_addloc_d = $this->request->getPost('hd_ster_addloc_'); // Captures hd_ster_addloc_[tt] for double
        $all_hd_ster_addloc_s = $this->request->getPost('hd_ster_addloc_s'); // Captures hd_ster_addloc_s[tt] for single

        if (!empty($addloc)) {
            $is_draft = ($submit_type == "draft") ? 1 : 0;
            $edited_count = count($addloc);
            $original_count = $Enquiry_model->get_tour_locations_count($enquiry_header_id, $enquiry_details_id);
            if ($original_count > $edited_count) {
                $deleted_count = $original_count - $edited_count;
                $deleted_id = $Enquiry_model->delete_tour_locations($enquiry_header_id, $enquiry_details_id, $deleted_count);
            }
            foreach ($addloc as $seq => $item) {
                // Process nested nights to compute totals and details
                $double_total = 0;
                $single_total = 0;
                $vehicle_types = []; // For summary computation
                $first_d_adult_rate = 0;
                $first_s_adult_rate = 0;
                $first_d_child_rate = 0;
                $first_s_child_rate = 0;
                $first_d_child_wb_rate = 0;
                $first_s_child_wb_rate = 0;
                $first_d_extra_bed_rate = 0;
                $first_s_extra_bed_rate = 0;
                $has_first_double = false;
                $has_first_single = false;

                if (isset($item['nights']) && is_array($item['nights'])) {
                    foreach ($item['nights'] as $night => $night_data) {
                        // Double totals
                        if (isset($night_data['dd_total_rate'])) {
                            $double_total += (float)$night_data['dd_total_rate'];
                        }
                        // Single totals
                        if (isset($night_data['ss_total_rate'])) {
                            $single_total += (float)$night_data['ss_total_rate'];
                        }

                        // Vehicle summary aggregation
                        if (isset($night_data['veh_model']) && !empty(array_filter($night_data['veh_model'] ?? []))) {
                            $veh_models = $night_data['veh_model'];
                            $veh_type_ids = $night_data['veh_type_id'] ?? [];
                            $veh_counts = $night_data['veh_count'] ?? [];
                            $day_rents = $night_data['day_rent'] ?? [];
                            $travel_distances = $night_data['travel_distance'] ?? [];
                            $extra_kms = $night_data['extra_kilometer'] ?? [];
                            $extra_rates = $night_data['extra_km_rate'] ?? [];
                            $veh_totals = $night_data['veh_total'] ?? [];
                            $max_kms_day = $night_data['max_km_day'] ?? []; // Assuming indexed or shared

                            for ($j = 0; $j < count($veh_models); $j++) {
                                $type_id = (int)($veh_type_ids[$j] ?? 0);
                                if ($type_id == 0) continue;

                                if (!isset($vehicle_types[$type_id])) {
                                    $vehicle_types[$type_id] = [
                                        'vehicle_model' => trim((string)($veh_models[$j] ?? '')),
                                        'veh_type_id' => $type_id,
                                        'vehicle_count' => (int)($veh_counts[$j] ?? 0),
                                        'day_rent' => 0.0,
                                        'travel_distance' => 0.0,
                                        'extra_km_rate' => (float)($extra_rates[$j] ?? 0),
                                        'extra_kilometer' => 0.0,
                                        'veh_total' => 0.0,
                                        'max_km_day' => (float)($max_kms_day[$j] ?? $night_data['max_km_day'] ?? 0),
                                        'veh_header' => '',
                                        'pre_to_cur' => '',
                                        'cur_to_dep' => '',
                                        'dep_to_arr' => '',
                                        'hub_to_arr' => '',
                                        'arr_to_loc' => ''
                                    ];
                                }
                                $vt = &$vehicle_types[$type_id];

                                if ($vt['day_rent'] == 0.0 && (float)($day_rents[$j] ?? 0) > 0) {
                                    $vt['day_rent'] = (float)$day_rents[$j];
                                }

                                $vt['travel_distance'] += (float)($travel_distances[$j] ?? 0);
                                $vt['extra_kilometer'] += (float)($extra_kms[$j] ?? 0);
                                $vt['veh_total'] += (float)($veh_totals[$j] ?? 0);

                                // Append night-specific header fields (concatenate across nights)
                                $new_veh_header = trim($night_data['veh_header'][$j] ?? $night_data['veh_header'] ?? '');
                                if ($new_veh_header && $vt['veh_header']) {
                                    $vt['veh_header'] .= ' + ' . $new_veh_header;
                                } elseif ($new_veh_header) {
                                    $vt['veh_header'] = $new_veh_header;
                                }

                                $header_fields = ['pre_to_cur', 'cur_to_dep', 'dep_to_arr', 'hub_to_arr', 'arr_to_loc'];
                                foreach ($header_fields as $field) {
                                    $new_val = trim($night_data[$field][$j] ?? $night_data[$field] ?? '');
                                    if ($new_val && $vt[$field]) {
                                        $vt[$field] .= ' + ' . $new_val;
                                    } elseif ($new_val) {
                                        $vt[$field] = $new_val;
                                    }
                                }
                            }
                        }

                        // Extract first rates for QQ (from first double/single room of first night)
                        if ($night == 1) {
                            // First double room (index 1)
                            if (isset($night_data['d_adult_rate'][1]) && !$has_first_double) {
                                $first_d_adult_rate = (float)$night_data['d_adult_rate'][1];
                                $first_d_child_rate = (float)($night_data['d_child_rate'][1] ?? 0);
                                $first_d_child_wb_rate = (float)($night_data['d_child_wb_rate'][1] ?? 0);
                                $first_d_extra_bed_rate = (float)($night_data['d_extra_bed_rate'][1] ?? 0);
                                $has_first_double = true;
                            }
                            // First single room (index = no_of_double_room + 1)
                            $first_single_index = $no_of_double_room + 1;
                            if ($no_of_single_room > 0 && isset($night_data['s_adult_rate'][$first_single_index]) && !$has_first_single) {
                                $first_s_adult_rate = (float)$night_data['s_adult_rate'][$first_single_index];
                                $first_s_child_rate = (float)($night_data['s_child_rate'][$first_single_index] ?? 0);
                                $first_s_child_wb_rate = (float)($night_data['s_child_wb_rate'][$first_single_index] ?? 0);
                                $first_s_extra_bed_rate = (float)($night_data['s_extra_bed_rate'][$first_single_index] ?? 0);
                                $has_first_single = true;
                            }
                        }
                    }
                }

                // Compute vehicle summary JSON
                $no_of_nights = (int)($item['no_of_night'] ?? 0);
                $vehicle_summaries = array_values($vehicle_types);

                // Cast all values to strings to match the desired format
                foreach ($vehicle_summaries as &$vs) {
                    foreach ($vs as $k => $v) {
                        $vs[$k] = (string)$v;
                    }
                }

                $json_output = json_encode($vehicle_summaries, JSON_PRETTY_PRINT);

                // Room type as array of object
                $rt_data = [
                    "double" => (string)$no_of_double_room,
                    "single" => (string)$no_of_single_room
                ];
                $rt_json = json_encode([$rt_data], JSON_PRETTY_PRINT);

                $tour_exist = $Enquiry_model->check_tour_location_exist($enquiry_header_id, $enquiry_details_id, $item['location_sequence']);
                if ($tour_exist > 0) {
                    $tour_details_ids = $Enquiry_model->get_tour_details_id($enquiry_header_id, $enquiry_details_id, $item['location_sequence']);
                    $tour_details_id = $tour_details_ids[0]['tour_details_id'];
                    // Delete old expansion and eighteen for update (keeping delete for simplicity, but expansions will be upserted below)
                    $Enquiry_model->delete_tour_expansion($tour_details_id);

                    // Add null/empty check to prevent passing invalid ID
                    if (!empty($tour_details_id)) {
                        $Enquiry_model->delete_eighteen_double($tour_details_id);
                        if ($no_of_single_room > 0) {
                            $Enquiry_model->delete_eighteen_single($tour_details_id);
                        }
                    }
                    // First, update the tour_details record
                    $tour_data_update = array(
                        'tour_location' => $item['tour_location_id'],
                        'no_of_days' => $item['no_of_night'],
                        'check_in_date' => $item['checkin'],
                        'check_out_date' => $item['checkout'],
                        'hot_cat_id' => $item['hotelcat'],
                        'meal_plan_id' => $item['mealplan'],
                        'hotel_id' => $item['hotelid'],
                        'room_category_id' => $item['roomcat_common'] ?? $item['roomcat'] ?? 0,
                        'accom_double_total' => $double_total,
                        'accom_single_total' => $single_total,
                        'is_own_arrangement' => $item['own_arrange'],
                        'tax_status' => $item['tax_status'],
                        'room_type' => $rt_json,
                        'vehicle_details' => $json_output,
                        'location_sequence' => $item['location_sequence'],
                        'is_active' => 1,
                        'is_draft' => $is_draft,
                        'updated_time' => $updated_time
                    );
                    $tour_updated = $Enquiry_model->update_tour_details($tour_data_update, $tour_details_id);

                    // Handle tax: filter and insert only for this location (rid starts with seq)
                    if ($item['tax_status'] == 1) {
                        $seq_str = strval($seq);
                        if (!empty($all_hd_ster_addloc_d) && is_array($all_hd_ster_addloc_d)) {
                            foreach ($all_hd_ster_addloc_d as $tt => $item_d) {
                                if (strpos($tt, $seq_str) === 0) { // tt starts with seq
                                    $ster_ddata = array(
                                        'tour_details_id' => $tour_details_id,
                                        'sequence_id' => $item_d['ster_id'] ?? $tt,
                                        'room_rate' => $item_d['d_adult_rate'] ?? 0,
                                        'no_of_child' => $item_d['n_child_rate'] ?? 0,
                                        'child_rate' => $item_d['d_child_rate'] ?? 0,
                                        'no_of_child_wb' => $item_d['n_child_wb_rate'] ?? 0,
                                        'child_wb_rate' => $item_d['d_child_wb_rate'] ?? 0,
                                        'no_of_extra' => $item_d['n_extra_bed_rate'] ?? 0,
                                        'extra_rate' => $item_d['d_extra_bed_rate'] ?? 0,
                                        'total' => $item_d['d_total_rate'] ?? 0,
                                        'gst' => $item_d['gst_per'] ?? 0,
                                        'grand_total' => $item_d['g_tot'] ?? 0
                                    );
                                    $Enquiry_model->insert_eighteen_details_double($ster_ddata);
                                }
                            }
                        }
                        if ($no_of_single_room > 0 && !empty($all_hd_ster_addloc_s) && is_array($all_hd_ster_addloc_s)) {
                            foreach ($all_hd_ster_addloc_s as $tt => $item_s) {
                                if (strpos($tt, $seq_str) === 0) {
                                    $ster_sdata = array(
                                        'tour_details_id' => $tour_details_id,
                                        'sequence_id' => $item_s['ster_s_id'] ?? $tt,
                                        'room_rate' => $item_s['s_adult_rate'] ?? 0,
                                        'no_of_child' => $item_s['n_s_child_rate'] ?? 0,
                                        'child_rate' => $item_s['s_child_rate'] ?? 0,
                                        'no_of_child_wb' => $item_s['n_s_child_wb_rate'] ?? 0,
                                        'child_wb_rate' => $item_s['s_child_wb_rate'] ?? 0,
                                        'no_of_extra' => $item_s['n_s_extra_bed_rate'] ?? 0,
                                        'extra_rate' => $item_s['s_extra_bed_rate'] ?? 0,
                                        'total' => $item_s['s_total_rate'] ?? 0,
                                        'gst' => $item_s['s_gst_per'] ?? 0,
                                        'grand_total' => $item_s['s_g_tot'] ?? 0
                                    );
                                    $Enquiry_model->insert_eighteen_details_single($ster_sdata);
                                }
                            }
                        }
                    }

                    // Upsert expansion per night per room (update if exists, insert if not) - MODIFIED TO SAVE PER ROOM
                    if (isset($item['nights']) && is_array($item['nights'])) {
                        $checkin_date = new DateTime($item['checkin']);
                        foreach ($item['nights'] as $night => $night_data) {
                            $expansion_date = clone $checkin_date;
                            $expansion_date->add(new DateInterval('P' . ($night - 1) . 'D'));
                            $exp_date_str = $expansion_date->format('Y-m-d');

                            // Vehicle JSON for this night (shared across rooms) - ENSURE NIGHT-SPECIFIC VEHICLE DATA IS USED FOR ALL ROOMS OF THIS NIGHT
                            $night_veh_json = [];
                            if (isset($night_data['veh_model']) && !empty(array_filter($night_data['veh_model'] ?? []))) {
                                foreach ($night_data['veh_model'] as $vindex => $model_name) {
                                    if (isset($night_data['veh_type_id'][$vindex])) {
                                        $night_veh_json[] = [
                                            "vehicle_model" => $model_name,
                                            "veh_type_id" => $night_data['veh_type_id'][$vindex],
                                            "vehicle_count" => $night_data['veh_count'][$vindex] ?? 0,
                                            "day_rent" => $night_data['day_rent'][$vindex] ?? 0,
                                            "max_km_day" => $night_data['max_km_day'][$vindex] ?? 0,
                                            "travel_distance" => $night_data['travel_distance'][$vindex] ?? 0,
                                            "extra_kilometer" => $night_data['extra_kilometer'][$vindex] ?? 0,
                                            "extra_km_rate" => $night_data['extra_km_rate'][$vindex] ?? 0,
                                            "veh_total" => $night_data['veh_total'][$vindex] ?? 0,
                                            'veh_header' => $night_data['veh_header'] ?? '',
                                            'pre_to_cur' => $night_data['pre_to_cur'] ?? '',
                                            'cur_to_dep' => $night_data['cur_to_dep'] ?? '',
                                            'dep_to_arr' => $night_data['dep_to_arr'] ?? '',
                                            'hub_to_arr' => $night_data['hub_to_arr'] ?? '',
                                            'arr_to_loc' => $night_data['arr_to_loc'] ?? ''
                                        ];
                                    }
                                }
                            }
                            $veh_json_str = json_encode($night_veh_json, JSON_PRETTY_PRINT);

                            // Loop over double rooms - USE NIGHT-SPECIFIC VEHICLE FOR ALL DOUBLE ROOMS OF THIS NIGHT
                            for ($d_room = 1; $d_room <= $no_of_double_room; $d_room++) {
                                $exp_room_cat_id = isset($night_data['roomcat'][$d_room]) ? (int)$night_data['roomcat'][$d_room] : 0;
                                $exp_meal_plan_id = isset($night_data['mealplan'][$d_room]) ? (int)$night_data['mealplan'][$d_room] : 0;
                                $exp_d_room_rate = isset($night_data['d_adult_rate'][$d_room]) ? (float)$night_data['d_adult_rate'][$d_room] : 0;
                                $exp_d_child_rate = isset($night_data['d_child_rate'][$d_room]) ? (float)$night_data['d_child_rate'][$d_room] : 0;
                                $exp_d_child_wb_rate = isset($night_data['d_child_wb_rate'][$d_room]) ? (float)$night_data['d_child_wb_rate'][$d_room] : 0;
                                $exp_d_extra_rate = isset($night_data['d_extra_bed_rate'][$d_room]) ? (float)$night_data['d_extra_bed_rate'][$d_room] : 0;
                                $exp_double_total = isset($night_data['d_total_rate'][$d_room]) ? (float)$night_data['d_total_rate'][$d_room] : 0;

                                // Single fields set to 0 for double room expansions
                                $exp_s_room_rate = 0;
                                $exp_s_child_rate = 0;
                                $exp_s_child_wb_rate = 0;
                                $exp_s_extra_rate = 0;
                                $exp_single_total = 0;

                                $expansion_data = [
                                    'tour_details_id' => $tour_details_id,
                                    'tour_expansion_date' => $exp_date_str,
                                    'room_category_id' => $exp_room_cat_id,
                                    'meal_plan_id' => $exp_meal_plan_id,
                                    'room_rate_double' => $exp_d_room_rate,
                                    'child_with_bed_double' => $exp_d_child_rate,
                                    'child_without_bed_double' => $exp_d_child_wb_rate,
                                    'extra_bed_double' => $exp_d_extra_rate,
                                    'double_total_rate' => $exp_double_total,
                                    'room_rate_single' => $exp_s_room_rate,
                                    'child_with_bed_single' => $exp_s_child_rate,
                                    'child_without_bed_single' => $exp_s_child_wb_rate,
                                    'extra_bed_single' => $exp_s_extra_rate,
                                    'single_total_rate' => $exp_single_total,
                                    'vehicle_details_json' => $veh_json_str
                                ];

                                // Upsert logic for expansion (you may need to adjust exists check to include room index if added to schema; for now, delete all and insert)
                                $Enquiry_model->insert_tour_expansion($expansion_data); // Always insert since we deleted all
                            }

                            // Loop over single rooms - USE NIGHT-SPECIFIC VEHICLE FOR ALL SINGLE ROOMS OF THIS NIGHT
                            for ($s_room = 1; $s_room <= $no_of_single_room; $s_room++) {
                                $s_index = $no_of_double_room + $s_room;
                                $exp_room_cat_id = isset($night_data['roomcat'][$s_index]) ? (int)$night_data['roomcat'][$s_index] : 0;
                                $exp_meal_plan_id = isset($night_data['mealplan'][$s_index]) ? (int)$night_data['mealplan'][$s_index] : 0;
                                $exp_s_room_rate = isset($night_data['s_adult_rate'][$s_index]) ? (float)$night_data['s_adult_rate'][$s_index] : 0;
                                $exp_s_child_rate = isset($night_data['s_child_rate'][$s_index]) ? (float)$night_data['s_child_rate'][$s_index] : 0;
                                $exp_s_child_wb_rate = isset($night_data['s_child_wb_rate'][$s_index]) ? (float)$night_data['s_child_wb_rate'][$s_index] : 0;
                                $exp_s_extra_rate = isset($night_data['s_extra_bed_rate'][$s_index]) ? (float)$night_data['s_extra_bed_rate'][$s_index] : 0;
                                $exp_single_total = isset($night_data['s_total_rate'][$s_index]) ? (float)$night_data['s_total_rate'][$s_index] : 0;

                                // Double fields set to 0 for single room expansions
                                $exp_d_room_rate = 0;
                                $exp_d_child_rate = 0;
                                $exp_d_child_wb_rate = 0;
                                $exp_d_extra_rate = 0;
                                $exp_double_total = 0;

                                $expansion_data = [
                                    'tour_details_id' => $tour_details_id,
                                    'tour_expansion_date' => $exp_date_str,
                                    'room_category_id' => $exp_room_cat_id,
                                    'meal_plan_id' => $exp_meal_plan_id,
                                    'room_rate_double' => $exp_d_room_rate,
                                    'child_with_bed_double' => $exp_d_child_rate,
                                    'child_without_bed_double' => $exp_d_child_wb_rate,
                                    'extra_bed_double' => $exp_d_extra_rate,
                                    'double_total_rate' => $exp_double_total,
                                    'room_rate_single' => $exp_s_room_rate,
                                    'child_with_bed_single' => $exp_s_child_rate,
                                    'child_without_bed_single' => $exp_s_child_wb_rate,
                                    'extra_bed_single' => $exp_s_extra_rate,
                                    'single_total_rate' => $exp_single_total,
                                    'vehicle_details_json' => $veh_json_str
                                ];

                                // Always insert since we deleted all
                                $Enquiry_model->insert_tour_expansion($expansion_data);
                            }
                        }
                    }

                    if ($tour_updated && $is_quick_quote == 1) {
                        // Update QQ with first rates
                        $d_room_rate = array(
                            'quick_quote_tariff' => $first_d_adult_rate,
                            'is_draft' => $is_draft
                        );
                        $qq_update = $Enquiry_model->update_qq_details($d_room_rate, $tour_details_id, 6, 2);
                        $s_room_rate = array(
                            'quick_quote_tariff' => $first_s_adult_rate,
                            'is_draft' => $is_draft
                        );
                        $qq_update = $Enquiry_model->update_qq_details($s_room_rate, $tour_details_id, 6, 1);
                        $d_c_rate = array(
                            'quick_quote_tariff' => $first_d_child_rate,
                            'is_draft' => $is_draft
                        );
                        $qq_update = $Enquiry_model->update_qq_details($d_c_rate, $tour_details_id, 12, 2);
                        $s_c_rate = array(
                            'quick_quote_tariff' => $first_s_child_rate,
                            'is_draft' => $is_draft
                        );
                        $qq_update = $Enquiry_model->update_qq_details($s_c_rate, $tour_details_id, 12, 1);
                        $d_cw_rate = array(
                            'quick_quote_tariff' => $first_d_child_wb_rate,
                            'is_draft' => $is_draft
                        );
                        $qq_update = $Enquiry_model->update_qq_details($d_cw_rate, $tour_details_id, 15, 2);
                        $s_cw_rate = array(
                            'quick_quote_tariff' => $first_s_child_wb_rate,
                            'is_draft' => $is_draft
                        );
                        $qq_update = $Enquiry_model->update_qq_details($s_cw_rate, $tour_details_id, 15, 1);

                        $d_e_rate = array(
                            'quick_quote_tariff' => $first_d_extra_bed_rate,
                            'is_draft' => $is_draft
                        );
                        $qq_update = $Enquiry_model->update_qq_details($d_e_rate, $tour_details_id, 9, 2);
                        $s_e_rate = array(
                            'quick_quote_tariff' => $first_s_extra_bed_rate,
                            'is_draft' => $is_draft
                        );
                        $qq_update = $Enquiry_model->update_qq_details($s_e_rate, $tour_details_id, 9, 1);
                    }
                } else {
                    // Insert new location - similar processing as above, but insert tour_details
                    $tour_data = array(
                        'enquiry_header_id' => $enquiry_header_id,
                        'enquiry_details_id' => $enquiry_details_id,
                        'tour_location' => $item['tour_location_id'],
                        'no_of_days' => $item['no_of_night'],
                        'check_in_date' => $item['checkin'],
                        'check_out_date' => $item['checkout'],
                        'hot_cat_id' => $item['hotelcat'],
                        'meal_plan_id' => $item['mealplan'],
                        'hotel_id' => $item['hotelid'],
                        'room_category_id' => $item['roomcat_common'] ?? $item['roomcat'] ?? 0,
                        'accom_double_total' => $double_total,
                        'accom_single_total' => $single_total,
                        'is_own_arrangement' => $item['own_arrange'],
                        'tax_status' => $item['tax_status'],
                        'room_type' => $rt_json,
                        'vehicle_details' => $json_output,
                        'location_sequence' => $item['location_sequence'],
                        'is_active' => 1,
                        'is_draft' => $is_draft,
                        'updated_time' => $updated_time,
                        'enterprise_id' => 1
                    );
                    $tour_details_id = $Enquiry_model->insert_tour_details($tour_data);

                    // Handle tax - insert without deletes
                    if ($item['tax_status'] == 1 && $tour_details_id) {
                        $seq_str = strval($seq);
                        if (!empty($all_hd_ster_addloc_d) && is_array($all_hd_ster_addloc_d)) {
                            foreach ($all_hd_ster_addloc_d as $tt => $item_d) {
                                if (strpos($tt, $seq_str) === 0) {
                                    $ster_ddata = array(
                                        'tour_details_id' => $tour_details_id,
                                        'sequence_id' => $item_d['ster_id'] ?? $tt,
                                        'room_rate' => $item_d['d_adult_rate'] ?? 0,
                                        'no_of_child' => $item_d['n_child_rate'] ?? 0,
                                        'child_rate' => $item_d['d_child_rate'] ?? 0,
                                        'no_of_child_wb' => $item_d['n_child_wb_rate'] ?? 0,
                                        'child_wb_rate' => $item_d['d_child_wb_rate'] ?? 0,
                                        'no_of_extra' => $item_d['n_extra_bed_rate'] ?? 0,
                                        'extra_rate' => $item_d['d_extra_bed_rate'] ?? 0,
                                        'total' => $item_d['d_total_rate'] ?? 0,
                                        'gst' => $item_d['gst_per'] ?? 0,
                                        'grand_total' => $item_d['g_tot'] ?? 0
                                    );
                                    $Enquiry_model->insert_eighteen_details_double($ster_ddata);
                                }
                            }
                        }
                        if ($no_of_single_room > 0 && !empty($all_hd_ster_addloc_s) && is_array($all_hd_ster_addloc_s)) {
                            foreach ($all_hd_ster_addloc_s as $tt => $item_s) {
                                if (strpos($tt, $seq_str) === 0) {
                                    $ster_sdata = array(
                                        'tour_details_id' => $tour_details_id,
                                        'sequence_id' => $item_s['ster_s_id'] ?? $tt,
                                        'room_rate' => $item_s['s_adult_rate'] ?? 0,
                                        'no_of_child' => $item_s['n_s_child_rate'] ?? 0,
                                        'child_rate' => $item_s['s_child_rate'] ?? 0,
                                        'no_of_child_wb' => $item_s['n_s_child_wb_rate'] ?? 0,
                                        'child_wb_rate' => $item_s['s_child_wb_rate'] ?? 0,
                                        'no_of_extra' => $item_s['n_s_extra_bed_rate'] ?? 0,
                                        'extra_rate' => $item_s['s_extra_bed_rate'] ?? 0,
                                        'total' => $item_s['s_total_rate'] ?? 0,
                                        'gst' => $item_s['s_gst_per'] ?? 0,
                                        'grand_total' => $item_s['s_g_tot'] ?? 0
                                    );
                                    $Enquiry_model->insert_eighteen_details_single($ster_sdata);
                                }
                            }
                        }
                    }

                    // Insert/upsert expansion per night per room (for new, always insert) - MODIFIED TO SAVE PER ROOM
                    if ($tour_details_id && isset($item['nights']) && is_array($item['nights'])) {
                        $checkin_date = new DateTime($item['checkin']);
                        foreach ($item['nights'] as $night => $night_data) {
                            $expansion_date = clone $checkin_date;
                            $expansion_date->add(new DateInterval('P' . ($night - 1) . 'D'));
                            $exp_date_str = $expansion_date->format('Y-m-d');

                            // Vehicle JSON for this night (shared across rooms) - ENSURE NIGHT-SPECIFIC VEHICLE DATA IS USED FOR ALL ROOMS OF THIS NIGHT
                            $night_veh_json = [];
                            if (isset($night_data['veh_model']) && !empty(array_filter($night_data['veh_model'] ?? []))) {
                                foreach ($night_data['veh_model'] as $vindex => $model_name) {
                                    if (isset($night_data['veh_type_id'][$vindex])) {
                                        $night_veh_json[] = [
                                            "vehicle_model" => $model_name,
                                            "veh_type_id" => $night_data['veh_type_id'][$vindex],
                                            "vehicle_count" => $night_data['veh_count'][$vindex] ?? 0,
                                            "day_rent" => $night_data['day_rent'][$vindex] ?? 0,
                                            "max_km_day" => $night_data['max_km_day'][$vindex] ?? 0,
                                            "travel_distance" => $night_data['travel_distance'][$vindex] ?? 0,
                                            "extra_kilometer" => $night_data['extra_kilometer'][$vindex] ?? 0,
                                            "extra_km_rate" => $night_data['extra_km_rate'][$vindex] ?? 0,
                                            "veh_total" => $night_data['veh_total'][$vindex] ?? 0,
                                            'veh_header' => $night_data['veh_header'] ?? '',
                                            'pre_to_cur' => $night_data['pre_to_cur'] ?? '',
                                            'cur_to_dep' => $night_data['cur_to_dep'] ?? '',
                                            'dep_to_arr' => $night_data['dep_to_arr'] ?? '',
                                            'hub_to_arr' => $night_data['hub_to_arr'] ?? '',
                                            'arr_to_loc' => $night_data['arr_to_loc'] ?? ''
                                        ];
                                    }
                                }
                            }
                            $veh_json_str = json_encode($night_veh_json, JSON_PRETTY_PRINT);

                            // Loop over double rooms - USE NIGHT-SPECIFIC VEHICLE FOR ALL DOUBLE ROOMS OF THIS NIGHT
                            for ($d_room = 1; $d_room <= $no_of_double_room; $d_room++) {
                                $exp_room_cat_id = isset($night_data['roomcat'][$d_room]) ? (int)$night_data['roomcat'][$d_room] : 0;
                                $exp_meal_plan_id = isset($night_data['mealplan'][$d_room]) ? (int)$night_data['mealplan'][$d_room] : 0;
                                $exp_d_room_rate = isset($night_data['d_adult_rate'][$d_room]) ? (float)$night_data['d_adult_rate'][$d_room] : 0;
                                $exp_d_child_rate = isset($night_data['d_child_rate'][$d_room]) ? (float)$night_data['d_child_rate'][$d_room] : 0;
                                $exp_d_child_wb_rate = isset($night_data['d_child_wb_rate'][$d_room]) ? (float)$night_data['d_child_wb_rate'][$d_room] : 0;
                                $exp_d_extra_rate = isset($night_data['d_extra_bed_rate'][$d_room]) ? (float)$night_data['d_extra_bed_rate'][$d_room] : 0;
                                $exp_double_total = isset($night_data['d_total_rate'][$d_room]) ? (float)$night_data['d_total_rate'][$d_room] : 0;

                                // Single fields set to 0 for double room expansions
                                $exp_s_room_rate = 0;
                                $exp_s_child_rate = 0;
                                $exp_s_child_wb_rate = 0;
                                $exp_s_extra_rate = 0;
                                $exp_single_total = 0;

                                $expansion_data = [
                                    'tour_details_id' => $tour_details_id,
                                    'tour_expansion_date' => $exp_date_str,
                                    'room_category_id' => $exp_room_cat_id,
                                    'meal_plan_id' => $exp_meal_plan_id,
                                    'room_rate_double' => $exp_d_room_rate,
                                    'child_with_bed_double' => $exp_d_child_rate,
                                    'child_without_bed_double' => $exp_d_child_wb_rate,
                                    'extra_bed_double' => $exp_d_extra_rate,
                                    'double_total_rate' => $exp_double_total,
                                    'room_rate_single' => $exp_s_room_rate,
                                    'child_with_bed_single' => $exp_s_child_rate,
                                    'child_without_bed_single' => $exp_s_child_wb_rate,
                                    'extra_bed_single' => $exp_s_extra_rate,
                                    'single_total_rate' => $exp_single_total,
                                    'vehicle_details_json' => $veh_json_str
                                ];

                                // For insert, always insert since new
                                $Enquiry_model->insert_tour_expansion($expansion_data);
                            }

                            // Loop over single rooms - USE NIGHT-SPECIFIC VEHICLE FOR ALL SINGLE ROOMS OF THIS NIGHT
                            for ($s_room = 1; $s_room <= $no_of_single_room; $s_room++) {
                                $s_index = $no_of_double_room + $s_room;
                                $exp_room_cat_id = isset($night_data['roomcat'][$s_index]) ? (int)$night_data['roomcat'][$s_index] : 0;
                                $exp_meal_plan_id = isset($night_data['mealplan'][$s_index]) ? (int)$night_data['mealplan'][$s_index] : 0;
                                $exp_s_room_rate = isset($night_data['s_adult_rate'][$s_index]) ? (float)$night_data['s_adult_rate'][$s_index] : 0;
                                $exp_s_child_rate = isset($night_data['s_child_rate'][$s_index]) ? (float)$night_data['s_child_rate'][$s_index] : 0;
                                $exp_s_child_wb_rate = isset($night_data['s_child_wb_rate'][$s_index]) ? (float)$night_data['s_child_wb_rate'][$s_index] : 0;
                                $exp_s_extra_rate = isset($night_data['s_extra_bed_rate'][$s_index]) ? (float)$night_data['s_extra_bed_rate'][$s_index] : 0;
                                $exp_single_total = isset($night_data['s_total_rate'][$s_index]) ? (float)$night_data['s_total_rate'][$s_index] : 0;

                                // Double fields set to 0 for single room expansions
                                $exp_d_room_rate = 0;
                                $exp_d_child_rate = 0;
                                $exp_d_child_wb_rate = 0;
                                $exp_d_extra_rate = 0;
                                $exp_double_total = 0;

                                $expansion_data = [
                                    'tour_details_id' => $tour_details_id,
                                    'tour_expansion_date' => $exp_date_str,
                                    'room_category_id' => $exp_room_cat_id,
                                    'meal_plan_id' => $exp_meal_plan_id,
                                    'room_rate_double' => $exp_d_room_rate,
                                    'child_with_bed_double' => $exp_d_child_rate,
                                    'child_without_bed_double' => $exp_d_child_wb_rate,
                                    'extra_bed_double' => $exp_d_extra_rate,
                                    'double_total_rate' => $exp_double_total,
                                    'room_rate_single' => $exp_s_room_rate,
                                    'child_with_bed_single' => $exp_s_child_rate,
                                    'child_without_bed_single' => $exp_s_child_wb_rate,
                                    'extra_bed_single' => $exp_s_extra_rate,
                                    'single_total_rate' => $exp_single_total,
                                    'vehicle_details_json' => $veh_json_str
                                ];

                                // For insert, always insert since new
                                $Enquiry_model->insert_tour_expansion($expansion_data);
                            }
                        }
                    }

                    // Insert QQ if quick quote
                    if ($tour_details_id && $is_quick_quote == 1) {
                        $d_room_rate = array(
                            'enquiry_header_id' => $enquiry_header_id,
                            'enquiry_details_id' => $enquiry_details_id,
                            'tour_details_id' => $tour_details_id,
                            'room_type_id' => 2,
                            'cost_component_id' => 6,
                            'quick_quote_tariff' => $first_d_adult_rate,
                            'is_active' => 1,
                            'is_draft' => $is_draft,
                            'enterprise_id' => 1
                        );
                        $qq_insert = $Enquiry_model->insert_qq_details($d_room_rate);
                        $s_room_rate = array(
                            'enquiry_header_id' => $enquiry_header_id,
                            'enquiry_details_id' => $enquiry_details_id,
                            'tour_details_id' => $tour_details_id,
                            'room_type_id' => 1,
                            'cost_component_id' => 6,
                            'quick_quote_tariff' => $first_s_adult_rate,
                            'is_active' => 1,
                            'is_draft' => $is_draft,
                            'enterprise_id' => 1
                        );
                        $qq_insert = $Enquiry_model->insert_qq_details($s_room_rate);

                        $d_c_rate = array(
                            'enquiry_header_id' => $enquiry_header_id,
                            'enquiry_details_id' => $enquiry_details_id,
                            'tour_details_id' => $tour_details_id,
                            'room_type_id' => 2,
                            'cost_component_id' => 12,
                            'quick_quote_tariff' => $first_d_child_rate,
                            'is_active' => 1,
                            'is_draft' => $is_draft,
                            'enterprise_id' => 1
                        );
                        $qq_insert = $Enquiry_model->insert_qq_details($d_c_rate);
                        $s_c_rate = array(
                            'enquiry_header_id' => $enquiry_header_id,
                            'enquiry_details_id' => $enquiry_details_id,
                            'tour_details_id' => $tour_details_id,
                            'room_type_id' => 1,
                            'cost_component_id' => 12,
                            'quick_quote_tariff' => $first_s_child_rate,
                            'is_active' => 1,
                            'is_draft' => $is_draft,
                            'enterprise_id' => 1
                        );
                        $qq_insert = $Enquiry_model->insert_qq_details($s_c_rate);

                        $d_cw_rate = array(
                            'enquiry_header_id' => $enquiry_header_id,
                            'enquiry_details_id' => $enquiry_details_id,
                            'tour_details_id' => $tour_details_id,
                            'room_type_id' => 2,
                            'cost_component_id' => 15,
                            'quick_quote_tariff' => $first_d_child_wb_rate,
                            'is_active' => 1,
                            'is_draft' => $is_draft,
                            'enterprise_id' => 1
                        );
                        $qq_insert = $Enquiry_model->insert_qq_details($d_cw_rate);
                        $s_cw_rate = array(
                            'enquiry_header_id' => $enquiry_header_id,
                            'enquiry_details_id' => $enquiry_details_id,
                            'tour_details_id' => $tour_details_id,
                            'room_type_id' => 1,
                            'cost_component_id' => 15,
                            'quick_quote_tariff' => $first_s_child_wb_rate,
                            'is_active' => 1,
                            'is_draft' => $is_draft,
                            'enterprise_id' => 1
                        );
                        $qq_insert = $Enquiry_model->insert_qq_details($s_cw_rate);

                        $d_e_rate = array(
                            'enquiry_header_id' => $enquiry_header_id,
                            'enquiry_details_id' => $enquiry_details_id,
                            'tour_details_id' => $tour_details_id,
                            'room_type_id' => 2,
                            'cost_component_id' => 9,
                            'quick_quote_tariff' => $first_d_extra_bed_rate,
                            'is_active' => 1,
                            'is_draft' => $is_draft,
                            'enterprise_id' => 1
                        );
                        $qq_insert = $Enquiry_model->insert_qq_details($d_e_rate);
                        $s_e_rate = array(
                            'enquiry_header_id' => $enquiry_header_id,
                            'enquiry_details_id' => $enquiry_details_id,
                            'tour_details_id' => $tour_details_id,
                            'room_type_id' => 1,
                            'cost_component_id' => 9,
                            'quick_quote_tariff' => $first_s_extra_bed_rate,
                            'is_active' => 1,
                            'is_draft' => $is_draft,
                            'enterprise_id' => 1
                        );
                        $qq_insert = $Enquiry_model->insert_qq_details($s_e_rate);
                    }
                }
            }

            if ($submit_type == "final") {
                $tour_plan_det = $Enquiry_model->get_tour_plan_details($enquiry_header_id, $enquiry_details_id);
                $ext_ref_id_tour_plan = $tour_plan_det[0]['tour_details_id'];
                $ext_tp_data = array(
                    'extension_ref_id' => $ext_ref_id_tour_plan
                );
                $ext_tp_updated = $Enquiry_model->linkItinearywithTourplan($ext_tp_data, $enquiry_header_id, $enquiry_details_id);
            }
            return redirect()->to($sURL);
        }
    }
}
   public function saveTourLocation()
{
    if (!empty(session()->get('user_id'))) {
        $Enquiry_model = new Enquiry_m();
        $is_quick_quote = (int)$this->request->getPost('is_quick_quote');
        $enquiry_header_id = (int)$this->request->getPost('enquiry_header_id');
        $enquiry_details_id = (int)$this->request->getPost('enquiry_details_id');
        $addloc = $this->request->getPost('addloc');
        $loc_index = 1; // Assuming single location as per data structure
        $loc = $addloc[$loc_index] ?? [];
        $location_sequence = (int)($loc['location_sequence'] ?? $this->request->getPost('location_sequence'));
        
        $tour_exist = $Enquiry_model->check_tour_location_exist($enquiry_header_id, $enquiry_details_id, $location_sequence);
        $nights = $loc['nights'] ?? [];
        $no_of_nights = count($nights);
        
        // Compute room_type, totals, and rates (assuming consistent across nights)
        $room_type = [
            'double' => (int)$this->request->getPost('no_of_double_room'),
            'single' => (int)$this->request->getPost('no_of_single_room')
        ];
        $accom_double_total = 0;
        $accom_single_total = 0;
        $d_adult_rate = 0;
        $s_adult_rate = 0;
        $d_child_rate = 0;
        $s_child_rate = 0;
        $d_child_wb_rate = 0;
        $s_child_wb_rate = 0;
        $d_extra_bed_rate = 0;
        $s_extra_bed_rate = 0;
        
        foreach ($nights as $night_index => $night) {
            $accom_double_total += (float)($night['dd_total_rate'] ?? 0);
            $accom_single_total += (float)($night['ss_total_rate'] ?? 0);
            
            // Extract rates from first valid room in first night for QQ
            if ($night_index === 1 && empty($d_adult_rate)) {
                $d_adult_rate = (float)($night['d_adult_rate'][1] ?? 0);
                $s_adult_rate = (float)($night['s_adult_rate'][4] ?? 0);
                $d_child_rate = (float)($night['d_child_rate'][1] ?? 0);
                $s_child_rate = (float)($night['s_child_rate'][4] ?? 0);
                $d_child_wb_rate = (float)($night['d_child_wb_rate'][1] ?? 0);
                $s_child_wb_rate = (float)($night['s_child_wb_rate'][4] ?? 0);
                $d_extra_bed_rate = (float)($night['d_extra_bed_rate'][1] ?? 0);
                $s_extra_bed_rate = (float)($night['s_extra_bed_rate'][4] ?? 0);
            }
        }
        
        // Compute vehicle summaries
        $vehicle_types = [];
        foreach ($nights as $night) {
            $veh_models = $night['veh_model'] ?? [];
            $veh_type_ids = $night['veh_type_id'] ?? [];
            $veh_counts = $night['veh_count'] ?? [];
            $day_rents = $night['day_rent'] ?? [];
            $travel_distances = $night['travel_distance'] ?? [];
            $extra_kms = $night['extra_kilometer'] ?? [];
            $extra_rates = $night['extra_km_rate'] ?? [];
            
            for ($j = 0; $j < count($veh_models); $j++) {
                $type_id = (int)$veh_type_ids[$j];
                if (!isset($vehicle_types[$type_id])) {
                    $vehicle_types[$type_id] = [
                        'vehicle_model_name' => trim((string)$veh_models[$j]),
                        'vehicle_type_id' => $type_id,
                        'vehicle_count' => (int)$veh_counts[$j],
                        'total_days' => 0,
                        'daily_rent' => (float)$day_rents[$j],
                        'total_distance' => 0.0,
                        'extra_km_rate' => (float)$extra_rates[$j],
                        'total_extra_km' => 0.0,
                        'grand_total' => 0.0
                    ];
                }
                $vehicle_types[$type_id]['total_days'] += 1;
                $vehicle_types[$type_id]['total_distance'] += (float)$travel_distances[$j];
                $vehicle_types[$type_id]['total_extra_km'] += (float)$extra_kms[$j];
            }
        }
        
        $vehicle_summaries = [];
        $vehicle_summary_total = 0.0;
        foreach ($vehicle_types as $type_id => $summary) {
            $summary['grand_total'] = $summary['daily_rent'] * $summary['total_days'];
            $vehicle_summaries[] = $summary;
            $vehicle_summary_total += $summary['grand_total'];
        }
        
        $vehicle_details = json_encode($vehicle_summaries); // Store as array of summaries
        $room_type_json = json_encode([$room_type]); // As per requested format: [{"double": "3", "single": "3"}]
        
        $common_data = [
            'tour_location' => (int)($loc['tour_location_id'] ?? 0),
            'no_of_days' => $no_of_nights,
            'check_in_date' => $loc['checkin'] ?? '',
            'check_out_date' => $loc['checkout'] ?? '',
            'hot_cat_id' => (int)($loc['hotelcat'] ?? 0),
            'meal_plan_id' => (int)($loc['mealplan'] ?? 0),
            'hotel_id' => (int)($loc['hotelid'] ?? 0),
            'room_category_id' => (int)($loc['roomcat_common'] ?? 0),
            'room_type' => $room_type_json,
            'accom_double_total' => (int)$accom_double_total,
            'accom_single_total' => (int)$accom_single_total,
            'vehicle_details' => $vehicle_details,
            'location_sequence' => $location_sequence,
            'is_own_arrangement' => (int)($loc['own_arrange'] ?? 0),
            'tax_status' => (int)($loc['tax_status'] ?? 0),
            'is_active' => 1,
            'is_draft' => 1,
            'updated_time' => date('Y-m-d H:i:s'),
            'enterprise_id' => 1
        ];
        
        if ($tour_exist > 0) {
            $tour_details_ids = $Enquiry_model->get_tour_details_id($enquiry_header_id, $enquiry_details_id, $location_sequence);
            $tour_details_id = $tour_details_ids[0]['tour_details_id'];
            $common_data['enquiry_header_id'] = $enquiry_header_id;
            $common_data['enquiry_details_id'] = $enquiry_details_id;
            $tour_updated = $Enquiry_model->update_tour_details($common_data, $tour_details_id);
            $result = $tour_updated ? ['status' => 'updated', 'tour_details_id' => $tour_details_id] : ['status' => 'error'];
            
            if ($is_quick_quote == 1 && $tour_updated) {
                $qq_data = [
                    ['room_type_id' => 2, 'cost_component_id' => 6, 'quick_quote_tariff' => $d_adult_rate],
                    ['room_type_id' => 1, 'cost_component_id' => 6, 'quick_quote_tariff' => $s_adult_rate],
                    ['room_type_id' => 2, 'cost_component_id' => 12, 'quick_quote_tariff' => $d_child_rate],
                    ['room_type_id' => 1, 'cost_component_id' => 12, 'quick_quote_tariff' => $s_child_rate],
                    ['room_type_id' => 2, 'cost_component_id' => 15, 'quick_quote_tariff' => $d_child_wb_rate],
                    ['room_type_id' => 1, 'cost_component_id' => 15, 'quick_quote_tariff' => $s_child_wb_rate],
                    ['room_type_id' => 2, 'cost_component_id' => 9, 'quick_quote_tariff' => $d_extra_bed_rate],
                    ['room_type_id' => 1, 'cost_component_id' => 9, 'quick_quote_tariff' => $s_extra_bed_rate]
                ];
                foreach ($qq_data as $qq_item) {
                    $qq_update_data = [
                        'quick_quote_tariff' => $qq_item['quick_quote_tariff']
                    ];
                    $Enquiry_model->update_qq_details($qq_update_data, $tour_details_id, $qq_item['cost_component_id'], $qq_item['room_type_id']);
                }
            }
        } else {
            $tour_data = array_merge($common_data, [
                'enquiry_header_id' => $enquiry_header_id,
                'enquiry_details_id' => $enquiry_details_id,
                'extension_ref_id' => 0 // Assuming default
            ]);
            $tour_details_id = $Enquiry_model->insert_tour_details($tour_data);
            $result = $tour_details_id ? ['status' => 'inserted', 'tour_details_id' => $tour_details_id] : ['status' => 'error'];
            
            if ($is_quick_quote == 1 && $tour_details_id) {
                $qq_base = [
                    'enquiry_header_id' => $enquiry_header_id,
                    'enquiry_details_id' => $enquiry_details_id,
                    'tour_details_id' => $tour_details_id,
                    'is_active' => 1,
                    'is_draft' => 1,
                    'enterprise_id' => 1
                ];
                $qq_data = [
                    array_merge($qq_base, ['room_type_id' => 2, 'cost_component_id' => 6, 'quick_quote_tariff' => $d_adult_rate]),
                    array_merge($qq_base, ['room_type_id' => 1, 'cost_component_id' => 6, 'quick_quote_tariff' => $s_adult_rate]),
                    array_merge($qq_base, ['room_type_id' => 2, 'cost_component_id' => 12, 'quick_quote_tariff' => $d_child_rate]),
                    array_merge($qq_base, ['room_type_id' => 1, 'cost_component_id' => 12, 'quick_quote_tariff' => $s_child_rate]),
                    array_merge($qq_base, ['room_type_id' => 2, 'cost_component_id' => 15, 'quick_quote_tariff' => $d_child_wb_rate]),
                    array_merge($qq_base, ['room_type_id' => 1, 'cost_component_id' => 15, 'quick_quote_tariff' => $s_child_wb_rate]),
                    array_merge($qq_base, ['room_type_id' => 2, 'cost_component_id' => 9, 'quick_quote_tariff' => $d_extra_bed_rate]),
                    array_merge($qq_base, ['room_type_id' => 1, 'cost_component_id' => 9, 'quick_quote_tariff' => $s_extra_bed_rate])
                ];
                foreach ($qq_data as $qq_item) {
                    $Enquiry_model->insert_qq_details($qq_item);
                }
            }
        }
        echo json_encode($result);
    } else {
        return redirect()->to('Login');
    }
}

    public function getVehicleTariffDetails()
    {
        if (!empty(session()->get('user_id'))) {
            $Enquiry_model = new Enquiry_m();
            $vehicle_models = $this->request->getPost('vehicle_models');
            $id = $this->request->getPost('id');
            $checkin = $this->request->getPost('checkin');
            $checkout = $this->request->getPost('checkout');
            $no_of_night = $this->request->getPost('no_of_night');
            $duration = $this->request->getPost('duration');
            $totalNights = $this->request->getPost('totalNights');
            $tour_location_id = $this->request->getPost('tour_location_id');
            $previous_location_id = $this->request->getPost('previous_location_id');
            $vehicle_from_location = $this->request->getPost('vehicle_from_location');
            $vehicle_from_locations = $Enquiry_model->getLocationidfromhub($vehicle_from_location);
            $arrival_location = $this->request->getPost('arrival_location');
            if(!empty($vehicle_from_locations)){
                $vehicle_from_loc_id = $vehicle_from_locations[0]['geog_id'];
            }
            else{
                $vehicle_from_loc_id = $arrival_location;
            }
            $departure_location = $this->request->getPost('departure_location');
            $dist1 = 0;
            $dist2 = 0;
            $dist3 = 0;
            $dist4 = 0;
            $total_distance = 0;
            if($id == 1){
                if($duration == $totalNights){
                    $distance1 = $Enquiry_model->getDistancebyLocations($vehicle_from_loc_id,$arrival_location);
                    $distance2 = $Enquiry_model->getDistancebyLocations($arrival_location,$tour_location_id);
                    $distance3 = $Enquiry_model->getDistancebyLocations($tour_location_id,$departure_location);
                    $distance4 = $Enquiry_model->getDistancebyLocations($departure_location,$vehicle_from_loc_id);
                    if(!empty($distance1)){
                        $dist1 = $distance1[0]['geog_km_distance'];
                    }
                    else{
                        $dist1 = 0;
                    }
                    if(!empty($distance2)){
                        $dist2 = $distance2[0]['geog_km_distance'];
                    }
                    else{
                        $dist2 = 0;
                    }
                    if(!empty($distance3)){
                        $dist3 = $distance3[0]['geog_km_distance'];
                    }
                    else{
                        $dist3 = 0;
                    }
                    if(!empty($distance4)){
                        $dist4 = $distance4[0]['geog_km_distance'];
                    }
                    else{
                        $dist4 = 0;
                    }
                    $total_distance = $dist1 + $dist2 + $dist3 + $dist4;
                    $distance_type = 1;
                }
                else{
                    $distance1 = $Enquiry_model->getDistancebyLocations($vehicle_from_loc_id,$arrival_location);
                    $distance2 = $Enquiry_model->getDistancebyLocations($arrival_location,$tour_location_id);
                    if(!empty($distance1)){
                        $dist1 = $distance1[0]['geog_km_distance'];
                    }
                    else{
                        $dist1 = 0;
                    }
                    if(!empty($distance2)){
                        $dist2 = $distance2[0]['geog_km_distance'];
                    }
                    else{
                        $dist2 = 0;
                    }
                    $total_distance = $dist1 + $dist2;
                    $distance_type = 2;
                }
            }
            else{
                if($duration == $totalNights){
                    $distance3 = $Enquiry_model->getDistancebyLocations($previous_location_id,$tour_location_id);
                    if(!empty($distance3)){
                        $dist3 = $distance3[0]['geog_km_distance'];
                    }
                    else{
                        $dist3 = 0;
                    }
                    $distance1 = $Enquiry_model->getDistancebyLocations($tour_location_id,$departure_location);
                    $distance2 = $Enquiry_model->getDistancebyLocations($departure_location,$vehicle_from_loc_id);
                    if(!empty($distance1)){
                        $dist1 = $distance1[0]['geog_km_distance'];
                    }
                    else{
                        $dist1 = 0;
                    }
                    if(!empty($distance2)){
                        $dist2 = $distance2[0]['geog_km_distance'];
                    }
                    else{
                        $dist2 = 0;
                    }
                    $total_distance = $dist1 + $dist2 + $dist3;
                    $distance_type = 3;
                }
                else{
                    $distance = $Enquiry_model->getDistancebyLocations($previous_location_id,$tour_location_id);
                    if(!empty($distance)){
                        $total_distance = $distance[0]['geog_km_distance'];
                    }
                    else{
                        $total_distance = 0;
                    }
                    $distance_type = 4;
                }
            }
            $tariff_det = [];
          
            $startDate = new DateTime($checkin);
            $endDate = new DateTime($checkout);
            //$endDate->modify('+1 day');
            $interval = new DateInterval('P1D');
            $period = new DatePeriod($startDate, $interval, $endDate);
            $season_id_t = null;
            $veh_tariffs = [];
           
            if(!empty($vehicle_models)){
                foreach($vehicle_models as $key => $val) {
                    $veh_object_ids = $Enquiry_model->getObjectidByvehicle($val['vehicle_type_id']);
                    $veh_object_id = $veh_object_ids[0]['object_id'];
                    $rate_per_day = 0;
                    $max_km_day = 0;
                    $extra_km_rate = 0;
                    $km_rate = 0;
                    $veh_tariffs[$key]['vehicle_count'] = $val['vehicle_count'];
                    $veh_tariffs[$key]['vehicle_type_id'] = $val['vehicle_type_id'];
                    $veh_tariffs[$key]['vehicle_model_name'] = $val['vehicle_model_name'];
                    $vehicle_basic_tariffs = $Enquiry_model->getTourtravelbasic(1,$val['vehicle_type_id']);  
                    $max_km_day = $vehicle_basic_tariffs[0]['tour_travel_max_km'];
                    $extra_km_rate = $vehicle_basic_tariffs[0]['extra_km_rate'];
                  
                    foreach ($period as $date) {
                        $v_tour_date = $date->format('Y-m-d'); 
                        $vehicle_basic_tariffs = $Enquiry_model->getTourtravelbasic(1,$val['vehicle_type_id']);
                        $v_season_tariff = $Enquiry_model->checkVehicleSeasonExist($v_tour_date,$veh_object_id);
                      
                        if(!empty($v_season_tariff)){
                            $vehicle_season_tariffs = $Enquiry_model->getTourtravelseason(2,$v_season_tariff[0]['season_id'],$val['vehicle_type_id']);
                            $rate_per_day = $rate_per_day + $vehicle_season_tariffs[0]['rate_per_day'];
                            $extra_km_rate = $vehicle_season_tariffs[0]['extra_km_rate'];
                            $km_rate = $vehicle_season_tariffs[0]['km_rate'];
                        }
                        else{
                            $vehicle_tariffs = $Enquiry_model->getTourtravelbasic(1,$val['vehicle_type_id']);
                            $rate_per_day = $rate_per_day + $vehicle_tariffs[0]['tour_travel_daily_rate'];
                        }
                    } 
                    $veh_tariffs[$key]['rate_per_day'] = $rate_per_day/$no_of_night;
                    $veh_tariffs[$key]['max_km_day'] = $max_km_day;
                    $veh_tariffs[$key]['extra_km_rate'] = $extra_km_rate;
                }
            }  
            $tariff_det['vehicles']=$veh_tariffs;
            $tariff_det['total_distance']=$total_distance;
            $tariff_det['dist1']=$dist1;
            $tariff_det['dist2']=$dist2;
            $tariff_det['dist3']=$dist3;
            $tariff_det['dist4']=$dist4;
            $tariff_det['distance_type']=$distance_type;
            echo json_encode($tariff_det);
        }
        else{
            return redirect()->to('Login');
        }
    }

    public function itinerary($object_id,$final_save_flag,$edit_id = null,$iti_edit_id = null,$extension_ref_id = null)
    {
        if (!empty(session()->get('user_id'))) {
            $Enquiry_model = new Enquiry_m();
            $Dashboard_model = new Dashboard_m();
            $system_name = session('system_name');
            $markups = $Enquiry_model->get_markup_details($system_name);
            if(!empty( $markups)){
                $mark_up = $markups[0]['mark_up'];
            }
            else{
                $mark_up = 0;
            }
            $dep_ss = [];
            $tariff_details_iti = [];
            $tour_plan_tariff = [];
            $tour_plan_det = [];
            $itinerary_details = [];
            $itinerary_details_draft = [];
            $itinerary_details_save = [];
            $previous_itinerary_details_save = [];
            $edit_history = [];
            $all_edit_history = [];
            $eighteen_datas_double = [];
            $eighteen_datas_single = [];

            if($edit_id > 0){
                $enq_ext_ids = $Enquiry_model->get_enquiry_extensions_byid($edit_id);
                $extension_ref_id_temp = $enq_ext_ids[0]['extension_ref_id'];
            }
            else{
                $extension_ref_id_temp = 0;
            }
            $object_det = $Enquiry_model->get_object_details($object_id);
            $last_itinerary = $Enquiry_model->get_last_itinerary_saved($object_det[0]['enquiry_header_id']);
            if(!empty($last_itinerary)){
                $previous_itinerary_details_save = $Enquiry_model->get_itinerary_previous_details($last_itinerary['extension_ref_id']);
            }
        
            if($edit_id > 0 && $extension_ref_id !== null && (int)$extension_ref_id === 0){
                $enq_ext_ids = $Enquiry_model->get_enquiry_extensions_byid($edit_id);
                if(!empty($enq_ext_ids)){
                    $make_current = $this->make_current_function($object_det[0]['enquiry_header_id'],$enq_ext_ids[0]['enquiry_ref_id'],$enq_ext_ids[0]['tour_plan_ref_id'],$enq_ext_ids[0]['extension_ref_id']);
                    $enquiry_details_id_new = $enq_ext_ids[0]['enquiry_ref_id'];
                    $extension_ref_id_temp = $enq_ext_ids[0]['extension_ref_id'];
                }
                else{
                    $enquiry_details_id_new = $object_det[0]['enquiry_details_id'];
                }
                $iti_cost_datas = $Enquiry_model->get_iti_cost_byid($edit_id);
            }
            else{
                $enquiry_details_id_new = $object_det[0]['enquiry_details_id'];
                $iti_cost_datas = $Enquiry_model->get_iti_cost_active($object_det[0]['enquiry_header_id'],$object_det[0]['enquiry_details_id']);
            }

            $tour_plan_det = $Enquiry_model->get_tour_plan_details($object_det[0]['enquiry_header_id'],$enquiry_details_id_new);
            $iti_cost_datas_all = $Enquiry_model->get_iti_cost_all($object_det[0]['enquiry_header_id'],$enquiry_details_id_new);
            foreach($tour_plan_det as $keys => $vals){
                if($vals['tax_status'] == 1){
                    $tac_eighteen = 0;
                    $tac_eighteen_double = 0;
                    $tac_eighteen_single = 0;

                    $adult_eighteen_double = 0;
                    $child_eighteen_double = 0;
                    $child_wb_eighteen_double = 0;
                    $extra_eighteen_double = 0;

                    $adult_eighteen_single = 0;
                    

                    $eighteen_datas_double = $Enquiry_model->get_eighteen_datas_double($vals['tour_details_id']);
                    $eighteen_datas_single = $Enquiry_model->get_eighteen_datas_single($vals['tour_details_id']);
                    if(!empty($eighteen_datas_double)){
                        foreach($eighteen_datas_double as $geys => $gals){
                            $tac_eighteen = $tac_eighteen + $gals['grand_total'];
                            $tac_eighteen_double = $tac_eighteen_double + $gals['grand_total'];

                            $adult_eighteen_double_tax = ($gals['gst']/100)*$gals['room_rate'];
                            $adult_eighteen_double = $adult_eighteen_double + $gals['room_rate'] + $adult_eighteen_double_tax;

                            $child_eighteen_double_tax = ($gals['gst']/100)*($gals['child_rate']*$gals['no_of_child']);
                            $child_eighteen_double = $child_eighteen_double + ($gals['child_rate']*$gals['no_of_child']) + $child_eighteen_double_tax;

                            $child_wb_eighteen_double_tax = ($gals['gst']/100)*($gals['child_wb_rate']*$gals['no_of_child_wb']);
                            $child_wb_eighteen_double = $child_wb_eighteen_double + ($gals['child_wb_rate']*$gals['no_of_child_wb']) + $child_wb_eighteen_double_tax;

                            $extra_eighteen_double_tax = ($gals['gst']/100)*($gals['extra_rate']*$gals['no_of_extra']);
                            $extra_eighteen_double = $extra_eighteen_double + ($gals['extra_rate']*$gals['no_of_extra']) + $extra_eighteen_double_tax;
                        }
                    }
                    if(!empty($eighteen_datas_single)){
                        foreach($eighteen_datas_single as $sgeys => $sgals){
                            $tac_eighteen = $tac_eighteen + $sgals['grand_total'];
                            $tac_eighteen_single = $tac_eighteen_single + $sgals['grand_total'];

                            $adult_eighteen_child_tax = ($sgals['gst']/100)*$sgals['room_rate'];
                            $adult_eighteen_single = $adult_eighteen_single + $sgals['room_rate'] + $adult_eighteen_child_tax;
                        }
                    }
                }
                else{
                    $tac_eighteen = 0;
                    $tac_eighteen_double = 0;
                    $tac_eighteen_single = 0;

                    $adult_eighteen_double = 0;
                    $child_eighteen_double = 0;
                    $child_wb_eighteen_double = 0;
                    $extra_eighteen_double = 0;
                    $tax_eighteen_double = 0;

                    $adult_eighteen_single = 0;
                }
                $tour_plan_det[$keys]['tac_eighteen'] = $tac_eighteen;
                $tour_plan_det[$keys]['tac_eighteen_double'] = $tac_eighteen_double;
                $tour_plan_det[$keys]['tac_eighteen_single'] = $tac_eighteen_single;

                $tour_plan_det[$keys]['adult_eighteen_double'] = $adult_eighteen_double;
                $tour_plan_det[$keys]['child_eighteen_double'] = $child_eighteen_double;
                $tour_plan_det[$keys]['child_wb_eighteen_double'] = $child_wb_eighteen_double;
                $tour_plan_det[$keys]['extra_eighteen_double'] = $extra_eighteen_double;
                $tour_plan_det[$keys]['adult_eighteen_single'] = $adult_eighteen_single;

                $tid = $vals['tour_details_id'];
                $tour_plan_tariff[$tid] = $Enquiry_model->get_tour_plan_tariff_bydate($vals['tour_details_id']);
                $result1 = $Enquiry_model->get_itinerary_draft_details($object_det[0]['enquiry_header_id'],$enquiry_details_id_new,$vals['tour_details_id']);
                $result2 = $Enquiry_model->get_itinerary_save_details($object_det[0]['enquiry_header_id'],$enquiry_details_id_new,$vals['tour_details_id']);
                if (!empty($result1)) {
                    $itinerary_details_draft = [...$itinerary_details_draft, ...$result1];
                }
                if (!empty($result2)) {
                    $itinerary_details_save = [...$itinerary_details_save, ...$result2];
                }
                $checkindate = $vals['check_in_date'];
                $checkoutdate = $vals['check_out_date'];

                $start1 = new DateTime($checkindate);
                $end1 = new DateTime($checkoutdate);
                for ($date = clone $start1; $date < $end1; $date->modify('+1 day')) {
                    $tour_date = $date->format('Y-m-d');
                    $tariff_details_iti[] = $this->getTourTariffDetailsbyTourDetails($tour_date,$vals['hotel_id'],$vals['room_category_id'],$vals['meal_plan_id'],$object_det[0]['no_of_double_room'],$object_det[0]['no_of_single_room']);
                    /*if($iti_edit_id > 0){
                        $edit_history[$tour_date] = $Enquiry_model->get_edit_history($object_det[0]['enquiry_header_id'],$enquiry_details_id_new,$vals['tour_details_id'],$tour_date);
                        
                    }*/
                }

            }
          
            $all_edit_history = $Enquiry_model->get_all_edit_history($object_det[0]['enquiry_header_id']);
            $data['edit_history'] = $all_edit_history; 

            /*if(!empty($iti_cost_datas_all) && $edit_id == null){
                $object_class_id = 10; 
                $entity_id = session('user_id');
                $active_role = session('active_role');
                $all_systems = $Dashboard_model->get_all_systems($entity_id);
                $data['all_systems'] = $all_systems;
                $all_roles = $Dashboard_model->get_all_entity_roles($entity_id);
                if(!empty($all_roles)){
                    $data['all_roles_assn'] = $all_roles;
                    $all_menus = $Dashboard_model->get_all_role_menus($active_role);
                    if(!empty($all_menus)){
                        $data['all_menus'] = $all_menus;
                    }
                    else{
                        $data['all_menus'] = [];
                    }
                    $all_permissions = $Dashboard_model->get_all_entity_permissions($active_role,3);
                    if(!empty($all_permissions)){
                        $data['all_permissions'] = $all_permissions;
                    }
                    else{
                        $data['all_permissions'] = [];
                    }
                }
                else{
                    $data['all_roles_assn'] = [];
                    $data['all_menus'] = [];
                    $data['all_permissions'] = [];
                }
                $enterprise_id = 1;
                $object_type_id = 5;
                $parent_menu = $Dashboard_model->get_parent_menus();
                $sub_menu = $Dashboard_model->get_sub_menus();
                $data['parent_menu'] = $parent_menu;
                $data['sub_menu'] = $sub_menu;
                $data['object_class_id'] = $object_class_id;
                $data['object_type_id'] = $object_type_id;
                $data['enquiry_header_id'] = $object_det[0]['enquiry_header_id'];
                $data['enquiry_details_id'] = $enquiry_details_id_new;
                $data['object_det'] = $object_det;
                if(!empty($object_class_det)){
                    $data['object_class_name'] = $object_class_det[0]['object_class_name'];
                }
                else{
                    $data['object_class_name'] = null;
                }
                return view('enquiry/itinerary_details_view',$data);
            }
            else{*/
                $tour_start_date = $object_det[0]['date_of_tour_start_temp'];
                $today = date('Y-m-d');
                if (empty($tour_plan_det)) {
                    session()->setFlashdata('error', 'Tour plan is not created!');
                    return redirect()->to('Enquiry/enquiry_list_view/10');
                }
                else{
                    $quick_quote_det = [];
                    $object_class_id = 10;
                    $entity_id = session('user_id');
                    $active_role = session('active_role');
                    $all_systems = $Dashboard_model->get_all_systems($entity_id);
                    $data['all_systems'] = $all_systems;
                    $all_roles = $Dashboard_model->get_all_entity_roles($entity_id);
                    if(!empty($all_roles)){
                        $data['all_roles_assn'] = $all_roles;
                        $all_menus = $Dashboard_model->get_all_role_menus($active_role);
                        if(!empty($all_menus)){
                            $data['all_menus'] = $all_menus;
                        }
                        else{
                            $data['all_menus'] = [];
                        }
                        $all_permissions = $Dashboard_model->get_all_entity_permissions($active_role,3);
                        if(!empty($all_permissions)){
                            $data['all_permissions'] = $all_permissions;
                        }
                        else{
                            $data['all_permissions'] = [];
                        }
                    }
                    else{
                        $data['all_roles_assn'] = [];
                        $data['all_menus'] = [];
                        $data['all_permissions'] = [];
                    }
                
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
                
                    
                    $all_locations = $Enquiry_model->get_tour_locations();
                    $arrival_locations = $Dashboard_model->get_arrival_locations();
                    $departure_locations = $Dashboard_model->get_departure_locations();
                    $hotel_categories = $Dashboard_model->get_hotel_categories();
                    $all_hotels = $Enquiry_model->get_all_hotels();
                    $all_room_categories = $Enquiry_model->get_all_room_categories();
                    $meal_plans = $Dashboard_model->get_meal_plan();
                    $hub_loc = $Dashboard_model->get_hub_location();
                    $enterprise_id = 1;
                    //$attributes = $Dashboard_model->get_all_obj_attributes($object_class_id);
                    //$boolean_attributes = $Dashboard_model->get_obj_boolean_attributes($object_class_id);
                    
                    $object_type_id = 5;
                    $parent_menu = $Dashboard_model->get_parent_menus();
                    $sub_menu = $Dashboard_model->get_sub_menus();
                    $data['parent_menu'] = $parent_menu;
                    $data['sub_menu'] = $sub_menu;
                    $data['object_class_id'] = $object_class_id;
                    $data['object_type_id'] = $object_type_id;
                    if(!empty($object_class_det)){
                        $data['object_class_name'] = $object_class_det[0]['object_class_name'];
                    }
                    else{
                        $data['object_class_name'] = null;
                    }
                    $data['states'] = $Enquiry_model->indian_states();
                    $data['all_agents'] = $Enquiry_model->get_all_agents();
                    
                    $data['tour_plan_det'] = $tour_plan_det;
                    $tour_plan_draft_det = $Enquiry_model->get_tour_plan_draft_details($object_det[0]['enquiry_header_id'],$enquiry_details_id_new);
                    $data['tour_plan_draft_det'] = $tour_plan_draft_det;

                    if($object_det[0]['is_quick_quote'] && !empty($tour_plan_det)){
                        $quick_quote_det = $Enquiry_model->get_quick_quote_details($object_det[0]['enquiry_header_id'],$enquiry_details_id_new,$tour_plan_det[0]['tour_details_id']);
                    
                    }
                    $dep_ss = $Enquiry_model->get_sight_seeing($object_det[0]['departure_location']);
                    $data['dep_ss'] = $dep_ss;
                    $data['quick_quote_det'] = $quick_quote_det;
                    $data['all_locations'] = $all_locations;
                    $data['arrival_locations'] = $arrival_locations;
                    $data['departure_locations'] = $departure_locations;
                    $data['hotel_categories'] = $hotel_categories;
                    $data['all_hotels'] = $all_hotels;
                    $data['all_room_categories'] = $all_room_categories;
                    $data['meal_plans'] = $meal_plans;
                    $data['hub_loc'] = $hub_loc;
                    $data['enterprise_id'] = $enterprise_id;
                    $data['object_det'] = $object_det;
                    $data['obj_name'] = $obj_name;
                    $data['obj_loc'] = $obj_loc;
                    $data['object_id'] = $object_id;
                    $data['tour_plan_tariff'] = $tour_plan_tariff;
                    $data['itinerary_details_draft'] = $itinerary_details_draft;
                    $data['itinerary_details_save'] = $itinerary_details_save;
                    $data['tariff_details_iti'] = $tariff_details_iti;
                    $data['iti_cost_datas'] = $iti_cost_datas;
                    $data['edit_id'] = $edit_id;
                    if(!empty($edit_id)){
                        if((int)$iti_edit_id === 0){
                            $iti_edit_id_temp = 1;
                            $version_count = null;
                        }
                        else{
                            $iti_edit_id_temp = null;
                            $version_count = $iti_edit_id;
                        }
                    }
                    else{
                        $iti_edit_id_temp = null;
                        $version_count = null;
                    }

                    if(!empty($iti_cost_datas_all) && $edit_id == null){
                        $iti_edit_id_temp = 1;
                        $extension_disable = 1;
                    }
                    else{
                        $extension_disable = 0;
                    }
                    $total_extra_klm_cost = 0;
                    $total_permit = 0;
                    $data['total_extra_klm_cost'] = $total_extra_klm_cost;
                    $data['total_permit'] = $total_permit;
                    $data['iti_edit_id'] = $iti_edit_id_temp;
                    $data['version_count'] = $version_count;
                    $data['mark_up'] = $mark_up;
                    $data['final_save_flag'] = $final_save_flag;
                    $data['extension_ref_id'] = $extension_ref_id;
                    $data['extension_disable'] = $extension_disable;
                    $data['extension_ref_id_temp'] = $extension_ref_id_temp;
                    $data['tour_plan_ref_id'] = $tour_plan_det[0]['extension_ref_id'];
                    $data['previous_itinerary_details_save'] = $previous_itinerary_details_save;
                    return view('enquiry/itinerary_view',$data);
                }
            //}
        }
        else{
            return redirect()->to('Login');
        }
    }
    public function make_current_function($enquiry_header_id,$enquiry_ref_id,$tour_plan_ref_id,$extension_ref_id){
        $Enquiry_model = new Enquiry_m();
        date_default_timezone_set('Asia/Kolkata');
        $updated_time = date('Y-m-d H:i:s');
        /****Enquiry Details */
        $ed_clear_data = array(
            'is_active' => 0
        );
        $ed_clear = $Enquiry_model->enquiry_details_clear_status($ed_clear_data,$enquiry_header_id);
        if($ed_clear){
            $ed_mc_data = array(
                'created_date' => $updated_time,
                'is_active' => 1
            );
            $ed_mc = $Enquiry_model->enquiry_details_mc_status($ed_mc_data,$enquiry_header_id,$enquiry_ref_id);
        }

        /****Tour Plan */

        $tp_clear_data = array(
            'is_active' => 0,
            'is_draft' => 0
        );
        $tp_clear = $Enquiry_model->tour_plan_clear_status($tp_clear_data,$enquiry_header_id);
        if($tp_clear){
            $tp_mc_data = array(
                'updated_time' => $updated_time,
                'is_active' => 1,
                'is_draft' => 0
            );
            $tp_mc = $Enquiry_model->tour_plan_mc_status($tp_mc_data,$enquiry_header_id,$tour_plan_ref_id);
        }
       
        /****Itinerary Details */

        $iti_clear_data = array(
            'is_active' => 0,
            'is_draft' => 0
        );
        $iti_clear = $Enquiry_model->itinerary_clear_status($iti_clear_data,$enquiry_header_id);
        if($iti_clear){
            $iti_mc_data = array(
                'updated_time' => $updated_time,
                'is_active' => 1,
                'is_draft' => 1
            );
            $iti_mc = $Enquiry_model->itinerary_mc_status($iti_mc_data,$enquiry_header_id,$extension_ref_id);
            if($iti_mc){
                return $iti_mc;
            }
        }

    }

    public function saveItinerary()
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model = new Dashboard_m();
            $Enquiry_model = new Enquiry_m();
            $spcl_additi = [];
            $final_save_flag = 0;
            date_default_timezone_set('Asia/Kolkata');
            $updated_time = date('Y-m-d H:i:s');
            $sdate = date('Y-m-d');
            $system_id = session('system_id');
            $user_id = session('user_id');
            $is_edit = $this->request->getPost('is_edit');
            $version_count = $this->request->getPost('version_count');
            $edit_id = $this->request->getPost('edit_id');
            $object_id = $this->request->getPost('object_id');
            $tour_plan_ref_id = $this->request->getPost('tour_plan_ref_id');
            $extension_ref_id_temp = $this->request->getPost('extension_ref_id_temp');
            $submit_type = $this->request->getPost('submit_type');
            $enquiry_header_id = $this->request->getPost('enquiry_header_id');
            $enquiry_details_id = $this->request->getPost('enquiry_details_id');
            $no_of_double_room = $this->request->getPost('no_of_double_room');
            $no_of_single_room = $this->request->getPost('no_of_single_room');
            $is_quick_quote = $this->request->getPost('is_quick_quote');
            $hotel_additi = $this->request->getPost('hotel_additi');
            $h_no_of_night = $this->request->getPost('h_no_of_night');
            $total_addon_count = $this->request->getPost('total_addon_count');
            $spcl_additi = $this->request->getPost('spcl_additi');
            if($total_addon_count > 0){
                $addon_additi = $this->request->getPost('addon_additi');
            }
            else{
                $addon_additi = [];
            }

            if(!empty($addon_additi)){
                foreach ($addon_additi as $addkey => $addval) {
                    $json_adddata[] = [
                        "addon_id" => $addval['addon_id'],
                        "addon_sequence" => $addval['addon_sequence'],
                        "addon_idvalue" => $addval['addon_idvalue'],
                        "addon_event" => $addval['addon_event'],
                        "addon_tariff" => $addval['addon_tariff'],
                        "tour_date" => $addval['tour_date']
                    ];
                }
                $json_addons = json_encode($json_adddata, JSON_PRETTY_PRINT);
            }
            else{
                $json_addons = json_encode([]);
            }
            
            if(!empty($spcl_additi)){
                foreach ($spcl_additi as $spkey => $spval) {
                    $json_spdata[] = [
                        "spcl_id" => $spval['spcl_id'],
                        "spcl_sequence" => $spval['spcl_sequence'],
                        "spcl_idvalue" => $spval['spcl_idvalue'],
                        "spcl_event" => $spval['spcl_event'],
                        "spcl_tariff" => $spval['spcl_tariff'],
                        "tour_date" => $spval['tour_date']
                    ];
                }
                $json_specials = json_encode($json_spdata, JSON_PRETTY_PRINT);
            }
            else{
                $json_specials = json_encode([]);
            }
            
            if($is_edit == 1){
                $version_count_all = $Enquiry_model->get_all_itinerary_version_count($enquiry_header_id);
            }
            else{
                $version_count_all = 0;
            }
            if(!empty($hotel_additi)){
                foreach ($hotel_additi as $hkey => $hval) {
                    $hotel_names =  $Enquiry_model->get_hotel_name_byid($hval['hotelid']);
                    if(!empty($hotel_names)){
                        $add_hotel_name = $hotel_names[0]['object_name'];
                    }
                    else{
                        $add_hotel_name = '';
                    }
                    $rc_names =  $Enquiry_model->get_rc_name_byid($hval['roomcat']);
                    if(!empty($rc_names)){
                        $add_rc_name = $rc_names[0]['room_category_name'];
                    }
                    else{
                        $add_rc_name = '';
                    }
                    $json_hdata[] = [
                        "id" => $hval['id'],
                        "sequence" => $hval['sequence'],
                        "idvalue" => $hval['idvalue'],
                        "own_arrange" => $hval['own_arrange'],
                        "tour_date" => $hval['tour_date'],
                        "tour_location_id" => $hval['tour_location_id'],
                        "meal_plan_id" => $hval['meal_plan_id'],
                        "no_of_ch" => $hval['no_of_ch'],
                        "no_of_cw" => $hval['no_of_cw'],
                        "no_of_extra" => $hval['no_of_extra'],
                        "hotelid" => $hval['hotelid'],
                        "hotel_name" => $add_hotel_name,
                        "room_category_name" => $add_rc_name,
                        "roomcat" => $hval['roomcat'],
                        "hotfac" => $hval['hotfac'],
                        "fac_rate" => $hval['fac_rate'],
                        "total" => $hval['acc_total'],
                        "double" => $hval['double'],
                        "d_adult_rate" => $hval['d_adult_rate'],
                        "d_child_rate" => $hval['d_child_rate'],
                        "d_child_wb_rate" => $hval['d_child_wb_rate'],
                        "d_extra_bed_rate" => $hval['d_extra_bed_rate'],
                        "single" => $hval['single'],
                        "s_adult_rate" => $hval['s_adult_rate'],
                        "s_child_rate" => $hval['s_child_rate'],
                        "s_child_wb_rate" => $hval['s_child_wb_rate'],
                        "s_extra_bed_rate" => $hval['s_extra_bed_rate'],
                        "remarks" => $hval['remarks'] ?? ""
                    ];
                }
                $json_hotels = json_encode($json_hdata, JSON_PRETTY_PRINT);
            }
            else{
                $json_hotels = json_encode([]);
            }
          
            $additi = $this->request->getPost('additi'); //print_r($additi);exit;
   
                if(!empty($additi)){

                   $temp_rows       = [];          
                   $vehicle_totals  = []; 

                    if($submit_type == "draft"){
                        
                        if($is_edit == 1){
                            $sURL = site_url('Enquiry/itinerary/'.$object_id.'/'.$final_save_flag.'/'.$edit_id.'/'.$version_count);
                        }
                        else{
                            $sURL = site_url('Enquiry/itinerary/'.$object_id.'/'.$final_save_flag);
                        }

                        foreach ($additi as $key =>$item) {
                           /*if(!empty($item['hotfac'])){
                                $selected_facilities = $item['hotfac']; 
                                $hotel_facility_ids = implode(',', $selected_facilities); 
                           }
                           else{
                                $hotel_facility_ids = "";
                           }*/
                           $hotel_facility_ids = "";
                           $tour_exist = $Enquiry_model->check_tour_date_exist($enquiry_header_id,$enquiry_details_id,$item['tour_details_id'],$item['tour_date']);
                           if($tour_exist > 0){
                                $json_data = [];
                                $rt_data = [];
                                if (!empty(array_filter($item['veh_model'] ?? []))) {
                                    foreach ($item['veh_model'] as $index => $model_raw) {

                                        $veh_type_id      = $item['veh_type_id'][$index];
                                        $model_name       = trim($model_raw);
                                        $max_km_day       = (float) ($item['max_km_day'][$index] ?? 0);
                                        $travel_distance  = (float) ($item['travel_distance'][$index] ?? 0);
                                        $extra_km_rate    = (float) ($item['extra_km_rate'][$index] ?? 0);
                                        $extra_kilometer  = $travel_distance > $max_km_day
                                                        ? $travel_distance - $max_km_day
                                                        : 0;

                                        $extra_cost       = $extra_kilometer * $extra_km_rate;
                                       
                                        if (!isset($vehicle_totals[$veh_type_id])) {
                                            $vehicle_totals[$veh_type_id] = [
                                                'total_max_km_day'      => 0,
                                                'total_travel_distance' => 0,
                                                'total_extra_kilometer' => 0,
                                                'total_extra_cost'      => 0,
                                            ];
                                        }

                                        $vehicle_totals[$veh_type_id]['total_max_km_day']      += $max_km_day;
                                        $vehicle_totals[$veh_type_id]['total_travel_distance'] += $travel_distance;
                                        $vehicle_totals[$veh_type_id]['total_extra_kilometer'] += $extra_kilometer;
                                        $vehicle_totals[$veh_type_id]['total_extra_cost']      += $extra_cost;

                                        $temp_rows[] = [
                                            "vehicle_model" => $model_name,
                                            "veh_type_id" => $item['veh_type_id'][$index],
                                            "tour_date" => $item['v_tour_date'][$index],
                                            "day_rent" => $item['day_rent'][$index],
                                            "max_km_day" => $item['max_km_day'][$index],
                                            "extra_km_rate" => $item['extra_km_rate_hidden'][$index],
                                            "travel_distance" => $item['travel_distance'][$index],
                                            "extra_kilometer" => $item['extra_kilometer'][$index],
                                            "veh_total" => $item['veh_total'][$index],
                                            'veh_header' => $item['veh_header'],
                                            'chk_vehicle' => $item['chk_vehicle_value'][$index],
                                            'chk_vehicle_status' => $item['chk_vehicle_hidden'][$index]
                                        ];
                                    }
                                }
                                foreach ($temp_rows as $row) {
                                    $id = $row['veh_type_id'];
                                    $totals = $vehicle_totals[$id];

                                    $total_max_km_day      = $totals['total_max_km_day'];
                                    $total_travel_distance = round($totals['total_travel_distance'], 2);
                                    $total_extra_kilometer = max(0, $total_travel_distance - $total_max_km_day);
                                    $total_extra_cost      = round($total_extra_kilometer * $row['extra_km_rate'], 2);

                                    $row['total_max_km_day']      = $total_max_km_day;
                                    $row['total_travel_distance'] = $total_travel_distance;
                                    $row['total_extra_kilometer'] = round($total_extra_kilometer, 2);
                                    $row['total_extra_cost']      = $total_extra_cost;

                                    $json_data[] = $row;
                                }
                                $json_output = json_encode($json_data, JSON_PRETTY_PRINT);

                                $rt_data[] = [
                                    "double" => $no_of_double_room,
                                    "single" => $no_of_single_room
                                ];
                                $rt_json = json_encode($rt_data, JSON_PRETTY_PRINT);
                            
                                $iti_data_update = array(
                                    'hotel_id' => $item['hotelid'],
                                    'room_category_id' => $item['roomcat'],
                                    'child_with_bed' => $item['no_of_ch'],
                                    'child_without_bed' => $item['no_of_cw'],
                                    'extra_bed' => $item['no_of_extra'],
                                    'double_room' => $item['double'],
                                    'single_room' => $item['single'],
                                    'vehicle_details' => $json_output,
                                    'hotel_details' => $json_hotels,
                                    'special_event_name' => $item['spcl_event'],
                                    'json_special_event' => $json_specials,
                                    'json_addons' => $json_addons,
                                    'remarks' => $item['remarks'],
                                    'updated_time' => $updated_time,
                                    'edit_version' => 1,
                                    'permit' => $item['permit'],
                                    'transport_remarks' => $item['transport_remarks'],
                                    'tax_status' => $item['tax_status'],
                                    'tac_eighteen_double' => $item['tac_eighteen_double'],
                                    'tac_eighteen_single' => $item['tac_eighteen_single'],
                                    'tac_eighteen_total' => $item['tac_eighteen_total'],

                                    'adult_eighteen_double' => $item['adult_eighteen_double'],
                                    'child_eighteen_double' => $item['child_eighteen_double'],
                                    'child_wb_eighteen_double' => $item['child_wb_eighteen_double'],
                                    'extra_eighteen_double' => $item['extra_eighteen_double'],
                                    'adult_eighteen_single' => $item['adult_eighteen_single'],

                                    'hotel_facility_ids' => $hotel_facility_ids
                                );
                                $iti_updated = $Enquiry_model->update_iti_details($iti_data_update,$enquiry_header_id,$enquiry_details_id,$item['tour_details_id'],$item['tour_date']);
                                $iti_details_ids = $Enquiry_model->get_itinerary_details_id($enquiry_header_id,$enquiry_details_id,$item['tour_details_id'],$item['tour_date']);
                                $itinerary_details_id = $iti_details_ids[0]['itinerary_details_id'];
                                if($iti_updated){
                                    //if($is_quick_quote == 1){
                                        $d_room_rate = array(
                                            'tariff' => $item['d_adult_rate']
                                        );
                                        $iti_update = $Enquiry_model->update_iti_cost_details($d_room_rate,$itinerary_details_id,6,2);   
                                        $s_room_rate = array(
                                            'tariff' => $item['s_adult_rate']
                                        );
                                        $iti_update = $Enquiry_model->update_iti_cost_details($s_room_rate,$itinerary_details_id,6,1);   
                                        $d_c_rate = array(
                                            'tariff' => $item['d_child_rate']
                                        );
                                        $iti_update = $Enquiry_model->update_iti_cost_details($d_c_rate,$itinerary_details_id,12,2);   
                                        $s_c_rate = array(
                                            'tariff' => $item['s_child_rate']
                                        );
                                        $iti_update = $Enquiry_model->update_iti_cost_details($s_c_rate,$itinerary_details_id,12,1);   
                                        $d_cw_rate = array(
                                            'tariff' => $item['d_child_wb_rate']
                                        );
                                        $iti_update = $Enquiry_model->update_iti_cost_details($d_cw_rate,$itinerary_details_id,15,2);   
                                        $s_cw_rate = array(
                                            'tariff' => $item['s_child_wb_rate']
                                        );
                                        $iti_update = $Enquiry_model->update_iti_cost_details($s_cw_rate,$itinerary_details_id,15,1);   

                                        $d_e_rate = array(
                                            'tariff' => $item['d_extra_bed_rate']
                                        );
                                        $iti_update = $Enquiry_model->update_iti_cost_details($d_e_rate,$itinerary_details_id,9,2);   
                                        $s_e_rate = array(  
                                            'tariff' => $item['s_extra_bed_rate']
                                        );
                                        $iti_update = $Enquiry_model->update_iti_cost_details($s_e_rate,$itinerary_details_id,9,1);   

                                        $spcl_tariff = array(  
                                            'tariff' => $item['spcl_tariff']
                                        );
                                        $iti_update = $Enquiry_model->update_iti_cost_details($spcl_tariff,$itinerary_details_id,17,1);  
                                        
                                        $hot_fac_id = array(  
                                            'tariff' => 0
                                        );
                                        $iti_update = $Enquiry_model->update_iti_cost_details($hot_fac_id,$itinerary_details_id,18,1);  
                                        $hot_fac_tariff = array(  
                                            'tariff' => $item['fac_rate']
                                        );
                                        $iti_update = $Enquiry_model->update_iti_cost_details($hot_fac_tariff,$itinerary_details_id,19,1);
                                        
                                        $ss_id = array(  
                                            'tariff' => $item['sight']
                                        );
                                        $iti_update = $Enquiry_model->update_iti_cost_details($ss_id,$itinerary_details_id,21,1);
                                        $ss_distance = array(  
                                            'tariff' => $item['ss_distance']
                                        );
                                        $iti_update = $Enquiry_model->update_iti_cost_details($ss_distance,$itinerary_details_id,22,1);
                                        
                                        $daily_addon = array(  
                                            'tariff' => $item['daily_addon']
                                        );
                                        $iti_update = $Enquiry_model->update_iti_cost_details($daily_addon,$itinerary_details_id,23,1);
                                    //}
                                }
                           }
                           else{
                                $json_data = [];
                                $rt_data = [];
                              
                                if (!empty(array_filter($item['veh_model'] ?? []))) {
                                    foreach ($item['veh_model'] as $index => $model_raw) {

                                        $veh_type_id      = $item['veh_type_id'][$index];
                                        $model_name       = trim($model_raw);
                                        $max_km_day       = (float) ($item['max_km_day'][$index] ?? 0);
                                        $travel_distance  = (float) ($item['travel_distance'][$index] ?? 0);
                                        $extra_km_rate    = (float) ($item['extra_km_rate'][$index] ?? 0);
                                        $extra_kilometer  = $travel_distance > $max_km_day
                                                        ? $travel_distance - $max_km_day
                                                        : 0;

                                        $extra_cost       = $extra_kilometer * $extra_km_rate;
                                       
                                        if (!isset($vehicle_totals[$veh_type_id])) {
                                            $vehicle_totals[$veh_type_id] = [
                                                'total_max_km_day'      => 0,
                                                'total_travel_distance' => 0,
                                                'total_extra_kilometer' => 0,
                                                'total_extra_cost'      => 0,
                                            ];
                                        }

                                        $vehicle_totals[$veh_type_id]['total_max_km_day']      += $max_km_day;
                                        $vehicle_totals[$veh_type_id]['total_travel_distance'] += $travel_distance;
                                        $vehicle_totals[$veh_type_id]['total_extra_kilometer'] += $extra_kilometer;
                                        $vehicle_totals[$veh_type_id]['total_extra_cost']      += $extra_cost;

                                        $temp_rows[] = [
                                            "vehicle_model" => $model_name,
                                            "veh_type_id" => $item['veh_type_id'][$index],
                                            "tour_date" => $item['v_tour_date'][$index],
                                            "day_rent" => $item['day_rent'][$index],
                                            "max_km_day" => $item['max_km_day'][$index],
                                            "extra_km_rate" => $item['extra_km_rate_hidden'][$index],
                                            "travel_distance" => $item['travel_distance'][$index],
                                            "extra_kilometer" => $item['extra_kilometer'][$index],
                                            "veh_total" => $item['veh_total'][$index],
                                            'veh_header' => $item['veh_header'],
                                            'chk_vehicle' => $item['chk_vehicle_value'][$index],
                                            'chk_vehicle_status' => $item['chk_vehicle_hidden'][$index]
                                        ];
                                    }
                                }
                                foreach ($temp_rows as $row) {
                                    $id = $row['veh_type_id'];
                                    $totals = $vehicle_totals[$id];

                                    $total_max_km_day      = $totals['total_max_km_day'];
                                    $total_travel_distance = round($totals['total_travel_distance'], 2);
                                    $total_extra_kilometer = max(0, $total_travel_distance - $total_max_km_day);
                                    $total_extra_cost      = round($total_extra_kilometer * $row['extra_km_rate'], 2);

                                    $row['total_max_km_day']      = $total_max_km_day;
                                    $row['total_travel_distance'] = $total_travel_distance;
                                    $row['total_extra_kilometer'] = round($total_extra_kilometer, 2);
                                    $row['total_extra_cost']      = $total_extra_cost;

                                    $json_data[] = $row;
                                }
                                $json_output = json_encode($json_data, JSON_PRETTY_PRINT);

                                $rt_data[] = [
                                    "double" => $no_of_double_room,
                                    "single" => $no_of_single_room
                                ];
                                $rt_json = json_encode($rt_data, JSON_PRETTY_PRINT);
                                
                                $iti_data_insert = array(
                                    'enquiry_header_id' => $enquiry_header_id,
                                    'enquiry_details_id' => $enquiry_details_id,
                                    'tour_date' => $item['tour_date'],
                                    'tour_details_id' => $item['tour_details_id'],
                                    'hotel_id' => $item['hotelid'],
                                    'room_category_id' => $item['roomcat'],
                                    'child_with_bed' => $item['no_of_ch'],
                                    'child_without_bed' => $item['no_of_cw'],
                                    'extra_bed' => $item['no_of_extra'],
                                    'double_room' => $item['double'],
                                    'single_room' => $item['single'],
                                    'vehicle_details' => $json_output,
                                    'hotel_details' => $json_hotels,
                                    'special_event_name' => $item['spcl_event'],
                                    'json_special_event' => $json_specials,
                                    'json_addons' => $json_addons,
                                    'remarks' => $item['remarks'],
                                    'is_active' => 1,
                                    'is_draft' => 0,
                                    'updated_time' => $updated_time,
                                    'edit_version' => 1,
                                    'tour_plan_ref_id' => $tour_plan_ref_id,
                                    'extension_ref_id' => 0,
                                    'permit' => $item['permit'],
                                    'transport_remarks' => $item['transport_remarks'],
                                    'hotel_facility_ids' => $hotel_facility_ids,
                                    'tax_status' => $item['tax_status'],
                                    'tac_eighteen_double' => $item['tac_eighteen_double'],
                                    'tac_eighteen_single' => $item['tac_eighteen_single'],
                                    'tac_eighteen_total' => $item['tac_eighteen_total'],

                                    'adult_eighteen_double' => $item['adult_eighteen_double'],
                                    'child_eighteen_double' => $item['child_eighteen_double'],
                                    'child_wb_eighteen_double' => $item['child_wb_eighteen_double'],
                                    'extra_eighteen_double' => $item['extra_eighteen_double'],
                                    'adult_eighteen_single' => $item['adult_eighteen_single'],

                                    'enterprise_id' => 1
                                );
                                $itinerary_details_id = $Enquiry_model->insert_iti_details($iti_data_insert);  
                                //if($is_quick_quote == 1){
                                    if($itinerary_details_id){
                                        $d_room_rate = array(
                                            'itinerary_details_id' => $itinerary_details_id,
                                            'cost_component_id' => 6,
                                            'room_type_id' => 2,
                                            'tariff' => $item['d_adult_rate'],
                                            'is_active' => 1,
                                            'is_draft' => 0,
                                            'enterprise_id' => 1
                                        );
                                        $iti_insert = $Enquiry_model->insert_iti_cost_details($d_room_rate);   
                                        $s_room_rate = array(
                                            'itinerary_details_id' => $itinerary_details_id,
                                            'cost_component_id' => 6,
                                            'room_type_id' => 1,
                                            'tariff' => $item['s_adult_rate'],
                                            'is_active' => 1,
                                            'is_draft' => 0,
                                            'enterprise_id' => 1
                                        );
                                        $iti_insert = $Enquiry_model->insert_iti_cost_details($s_room_rate);   

                                        $d_c_rate = array(
                                            'itinerary_details_id' => $itinerary_details_id,
                                            'cost_component_id' => 12,
                                            'room_type_id' => 2,
                                            'tariff' => $item['d_child_rate'],
                                            'is_active' => 1,
                                            'is_draft' => 0,
                                            'enterprise_id' => 1
                                        );
                                        $iti_insert = $Enquiry_model->insert_iti_cost_details($d_c_rate);   
                                        $s_c_rate = array(
                                            'itinerary_details_id' => $itinerary_details_id,
                                            'cost_component_id' => 12,
                                            'room_type_id' => 1,
                                            'tariff' => $item['s_child_rate'],
                                            'is_active' => 1,
                                            'is_draft' => 0,
                                            'enterprise_id' => 1
                                        );
                                        $iti_insert = $Enquiry_model->insert_iti_cost_details($s_c_rate);   

                                        $d_cw_rate = array(
                                            'itinerary_details_id' => $itinerary_details_id,
                                            'cost_component_id' => 15,
                                            'room_type_id' => 2,
                                            'tariff' => $item['d_child_wb_rate'],
                                            'is_active' => 1,
                                            'is_draft' => 0,
                                            'enterprise_id' => 1
                                        );
                                        $iti_insert = $Enquiry_model->insert_iti_cost_details($d_cw_rate);   
                                        $s_cw_rate = array(
                                            'itinerary_details_id' => $itinerary_details_id,
                                            'cost_component_id' => 15,
                                            'room_type_id' => 1,
                                            'tariff' => $item['s_child_wb_rate'],
                                            'is_active' => 1,
                                            'is_draft' => 0,
                                            'enterprise_id' => 1
                                        );
                                        $iti_insert = $Enquiry_model->insert_iti_cost_details($s_cw_rate);   

                                        $d_e_rate = array(
                                            'itinerary_details_id' => $itinerary_details_id,
                                            'cost_component_id' => 9,
                                            'room_type_id' => 2,
                                            'tariff' => $item['d_extra_bed_rate'],
                                            'is_active' => 1,
                                            'is_draft' => 0,
                                            'enterprise_id' => 1
                                        );
                                        $iti_insert = $Enquiry_model->insert_iti_cost_details($d_e_rate);   
                                        $s_e_rate = array(
                                            'itinerary_details_id' => $itinerary_details_id,
                                            'cost_component_id' => 9,
                                            'room_type_id' => 1,
                                            'tariff' => $item['s_extra_bed_rate'],
                                            'is_active' => 1,
                                            'is_draft' => 0,
                                            'enterprise_id' => 1
                                        );
                                        $iti_insert = $Enquiry_model->insert_iti_cost_details($s_e_rate);   



                                        $spcl_tariff = array(
                                            'itinerary_details_id' => $itinerary_details_id,
                                            'cost_component_id' => 17,
                                            'room_type_id' => 1,
                                            'tariff' => $item['spcl_tariff'],
                                            'is_active' => 1,
                                            'is_draft' => 0,
                                            'enterprise_id' => 1
                                        );
                                        $iti_insert = $Enquiry_model->insert_iti_cost_details($spcl_tariff);   
                                        $hotfac = array(
                                            'itinerary_details_id' => $itinerary_details_id,
                                            'cost_component_id' => 18,
                                            'room_type_id' => 1,
                                            'tariff' => 0,
                                            'is_active' => 1,
                                            'is_draft' => 0,
                                            'enterprise_id' => 1
                                        );
                                        $iti_insert = $Enquiry_model->insert_iti_cost_details($hotfac);   
                                        $fac_rate = array(
                                            'itinerary_details_id' => $itinerary_details_id,
                                            'cost_component_id' => 19,
                                            'room_type_id' => 1,
                                            'tariff' => $item['fac_rate'],
                                            'is_active' => 1,
                                            'is_draft' => 0,
                                            'enterprise_id' => 1
                                        );
                                        $iti_insert = $Enquiry_model->insert_iti_cost_details($fac_rate);   
                                        $sight = array(
                                            'itinerary_details_id' => $itinerary_details_id,
                                            'cost_component_id' => 21,
                                            'room_type_id' => 1,
                                            'tariff' => $item['sight'],
                                            'is_active' => 1,
                                            'is_draft' => 0,
                                            'enterprise_id' => 1
                                        );
                                        $iti_insert = $Enquiry_model->insert_iti_cost_details($sight);   
                                        $ss_distance = array(
                                            'itinerary_details_id' => $itinerary_details_id,
                                            'cost_component_id' => 22,
                                            'room_type_id' => 1,
                                            'tariff' => $item['ss_distance'],
                                            'is_active' => 1,
                                            'is_draft' => 0,
                                            'enterprise_id' => 1
                                        );
                                        $iti_insert = $Enquiry_model->insert_iti_cost_details($ss_distance);   
                                        $daily_addon = array(
                                            'itinerary_details_id' => $itinerary_details_id,
                                            'cost_component_id' => 23,
                                            'room_type_id' => 1,
                                            'tariff' => $item['daily_addon'],
                                            'is_active' => 1,
                                            'is_draft' => 0,
                                            'enterprise_id' => 1
                                        );
                                        $iti_insert = $Enquiry_model->insert_iti_cost_details($daily_addon);   
                                    }
                                //}
                           }
                        } 
                    
                    return redirect()->to($sURL);
                }


                if($submit_type == "final"){
                    $final_save_flag = 1;

                    if($is_edit == 1){
                        $sURL = site_url('Enquiry/itinerary/'.$object_id.'/'.$final_save_flag.'/'.$edit_id.'/'.$version_count);
                    }
                    else{
                        $sURL = site_url('Enquiry/itinerary/'.$object_id.'/'.$final_save_flag);
                    }

                    foreach ($additi as $key =>$item) {
                            /*if(!empty($item['hotfac'])){
                                $selected_facilities = $item['hotfac']; 
                                $hotel_facility_ids = implode(',', $selected_facilities); 
                           }
                           else{
                                $hotel_facility_ids = "";
                           }*/
                          $hotel_facility_ids = "";
                        $tour_exist = $Enquiry_model->check_tour_date_exist($enquiry_header_id,$enquiry_details_id,$item['tour_details_id'],$item['tour_date']);
                       if($tour_exist > 0){
                            $json_data = [];
                            $rt_data = [];
                            if (!empty(array_filter($item['veh_model'] ?? []))) {
                                foreach ($item['veh_model'] as $index => $model_raw) {
                                    $veh_type_id      = $item['veh_type_id'][$index];
                                        $model_name       = trim($model_raw);
                                        $max_km_day       = (float) ($item['max_km_day'][$index] ?? 0);
                                        $travel_distance  = (float) ($item['travel_distance'][$index] ?? 0);
                                        $extra_km_rate    = (float) ($item['extra_km_rate'][$index] ?? 0);
                                        $extra_kilometer  = $travel_distance > $max_km_day
                                                        ? $travel_distance - $max_km_day
                                                        : 0;

                                        $extra_cost       = $extra_kilometer * $extra_km_rate;
                                       
                                        if (!isset($vehicle_totals[$veh_type_id])) {
                                            $vehicle_totals[$veh_type_id] = [
                                                'total_max_km_day'      => 0,
                                                'total_travel_distance' => 0,
                                                'total_extra_kilometer' => 0,
                                                'total_extra_cost'      => 0,
                                            ];
                                        }

                                        $vehicle_totals[$veh_type_id]['total_max_km_day']      += $max_km_day;
                                        $vehicle_totals[$veh_type_id]['total_travel_distance'] += $travel_distance;
                                        $vehicle_totals[$veh_type_id]['total_extra_kilometer'] += $extra_kilometer;
                                        $vehicle_totals[$veh_type_id]['total_extra_cost']      += $extra_cost;

                                    $temp_rows[] = [
                                        "vehicle_model" => $model_name,
                                        "veh_type_id" => $item['veh_type_id'][$index],
                                        "tour_date" => $item['v_tour_date'][$index],
                                        "day_rent" => $item['day_rent'][$index],
                                        "max_km_day" => $item['max_km_day'][$index],
                                        "extra_km_rate" => $item['extra_km_rate_hidden'][$index],
                                        "travel_distance" => $item['travel_distance'][$index],
                                        "extra_kilometer" => $item['extra_kilometer'][$index],
                                        "veh_total" => $item['veh_total'][$index],
                                        'veh_header' => $item['veh_header'],
                                        'chk_vehicle' => $item['chk_vehicle_value'][$index],
                                        'chk_vehicle_status' => $item['chk_vehicle_hidden'][$index]
                                    ];
                                }
                            }
                            foreach ($temp_rows as $row) {
                                    $id = $row['veh_type_id'];
                                    $totals = $vehicle_totals[$id];

                                    $total_max_km_day      = $totals['total_max_km_day'];
                                    $total_travel_distance = round($totals['total_travel_distance'], 2);
                                    $total_extra_kilometer = max(0, $total_travel_distance - $total_max_km_day);
                                    $total_extra_cost      = round($total_extra_kilometer * $row['extra_km_rate'], 2);

                                    $row['total_max_km_day']      = $total_max_km_day;
                                    $row['total_travel_distance'] = $total_travel_distance;
                                    $row['total_extra_kilometer'] = round($total_extra_kilometer, 2);
                                    $row['total_extra_cost']      = $total_extra_cost;

                                    $json_data[] = $row;
                                }
                            $json_output = json_encode($json_data, JSON_PRETTY_PRINT);

                            $rt_data[] = [
                                "double" => $no_of_double_room,
                                "single" => $no_of_single_room
                            ];
                            $rt_json = json_encode($rt_data, JSON_PRETTY_PRINT);
                        
                            $iti_data_update = array(
                                'hotel_id' => $item['hotelid'],
                                'room_category_id' => $item['roomcat'],
                                'child_with_bed' => $item['no_of_ch'],
                                'child_without_bed' => $item['no_of_cw'],
                                'extra_bed' => $item['no_of_extra'],
                                'double_room' => $item['double'],
                                'single_room' => $item['single'],
                                'vehicle_details' => $json_output,
                                'hotel_details' => $json_hotels,
                                'special_event_name' => $item['spcl_event'],
                                'json_addons' => $json_addons,
                                'json_special_event' => $json_specials,
                                'remarks' => $item['remarks'],
                                'updated_time' => $updated_time,
                                'edit_version' => 1,
                                'permit' => $item['permit'],
                                'transport_remarks' => $item['transport_remarks'],
                                'hotel_facility_ids' => $hotel_facility_ids,
                                'tax_status' => $item['tax_status'],
                                'tac_eighteen_double' => $item['tac_eighteen_double'],
                                'tac_eighteen_single' => $item['tac_eighteen_single'],
                                'tac_eighteen_total' => $item['tac_eighteen_total'],

                                'adult_eighteen_double' => $item['adult_eighteen_double'],
                                'child_eighteen_double' => $item['child_eighteen_double'],
                                'child_wb_eighteen_double' => $item['child_wb_eighteen_double'],
                                'extra_eighteen_double' => $item['extra_eighteen_double'],
                                'adult_eighteen_single' => $item['adult_eighteen_single'],

                                'is_draft' => 1
                            );
                            
                            $iti_updated = $Enquiry_model->update_iti_details($iti_data_update,$enquiry_header_id,$enquiry_details_id,$item['tour_details_id'],$item['tour_date']);
                            $iti_details_ids = $Enquiry_model->get_itinerary_details_id($enquiry_header_id,$enquiry_details_id,$item['tour_details_id'],$item['tour_date']);
                            $itinerary_details_id = $iti_details_ids[0]['itinerary_details_id'];
                            if($iti_updated){
                                //if($is_quick_quote == 1){
                                    $d_room_rate = array(
                                        'tariff' => $item['d_adult_rate'],
                                        'is_draft' => 1
                                    );
                                    $iti_update = $Enquiry_model->update_iti_cost_details($d_room_rate,$itinerary_details_id,6,2);   
                                    $s_room_rate = array(
                                        'tariff' => $item['s_adult_rate'],
                                        'is_draft' => 1
                                    );
                                    $iti_update = $Enquiry_model->update_iti_cost_details($s_room_rate,$itinerary_details_id,6,1);   
                                    $d_c_rate = array(
                                        'tariff' => $item['d_child_rate'],
                                        'is_draft' => 1
                                    );
                                    $iti_update = $Enquiry_model->update_iti_cost_details($d_c_rate,$itinerary_details_id,12,2);   
                                    $s_c_rate = array(
                                        'tariff' => $item['s_child_rate'],
                                        'is_draft' => 1
                                    );
                                    $iti_update = $Enquiry_model->update_iti_cost_details($s_c_rate,$itinerary_details_id,12,1);   
                                    $d_cw_rate = array(
                                        'tariff' => $item['d_child_wb_rate'],
                                        'is_draft' => 1
                                    );
                                    $iti_update = $Enquiry_model->update_iti_cost_details($d_cw_rate,$itinerary_details_id,15,2);   
                                    $s_cw_rate = array(
                                        'tariff' => $item['s_child_wb_rate'],
                                        'is_draft' => 1
                                    );
                                    $iti_update = $Enquiry_model->update_iti_cost_details($s_cw_rate,$itinerary_details_id,15,1);   

                                    $d_e_rate = array(
                                        'tariff' => $item['d_extra_bed_rate'],
                                        'is_draft' => 1
                                    );
                                    $iti_update = $Enquiry_model->update_iti_cost_details($d_e_rate,$itinerary_details_id,9,2);   
                                    $s_e_rate = array(  
                                        'tariff' => $item['s_extra_bed_rate'],
                                        'is_draft' => 1
                                    );
                                    $iti_update = $Enquiry_model->update_iti_cost_details($s_e_rate,$itinerary_details_id,9,1);   

                                    $spcl_tariff = array(  
                                        'tariff' => $item['spcl_tariff'],
                                        'is_draft' => 1
                                    );
                                    $iti_update = $Enquiry_model->update_iti_cost_details($spcl_tariff,$itinerary_details_id,17,1);  
                                    
                                    $hot_fac_id = array(  
                                        'tariff' => 0,
                                        'is_draft' => 1
                                    );
                                    $iti_update = $Enquiry_model->update_iti_cost_details($hot_fac_id,$itinerary_details_id,18,1);  
                                    $hot_fac_tariff = array(  
                                        'tariff' => $item['fac_rate'],
                                        'is_draft' => 1
                                    );
                                    $iti_update = $Enquiry_model->update_iti_cost_details($hot_fac_tariff,$itinerary_details_id,19,1);
                                    
                                    $ss_id = array(  
                                        'tariff' => $item['sight'],
                                        'is_draft' => 1
                                    );
                                    $iti_update = $Enquiry_model->update_iti_cost_details($ss_id,$itinerary_details_id,21,1);
                                    $ss_distance = array(  
                                        'tariff' => $item['ss_distance'],
                                        'is_draft' => 1
                                    );
                                    $iti_update = $Enquiry_model->update_iti_cost_details($ss_distance,$itinerary_details_id,22,1);
                                    
                                    $daily_addon = array(  
                                        'tariff' => $item['daily_addon'],
                                        'is_draft' => 1
                                    );
                                    $iti_update = $Enquiry_model->update_iti_cost_details($daily_addon,$itinerary_details_id,23,1);
                                //}
                            }
                       }
                       else{
                            
                            $json_data = [];
                            $rt_data = [];
                            if (!empty(array_filter($item['veh_model'] ?? []))) {
                                foreach ($item['veh_model'] as $index => $model_raw) {
                                    $veh_type_id      = $item['veh_type_id'][$index];
                                        $model_name       = trim($model_raw);
                                        $max_km_day       = (float) ($item['max_km_day'][$index] ?? 0);
                                        $travel_distance  = (float) ($item['travel_distance'][$index] ?? 0);
                                        $extra_km_rate    = (float) ($item['extra_km_rate'][$index] ?? 0);
                                        $extra_kilometer  = $travel_distance > $max_km_day
                                                        ? $travel_distance - $max_km_day
                                                        : 0;

                                        $extra_cost       = $extra_kilometer * $extra_km_rate;
                                       
                                        if (!isset($vehicle_totals[$veh_type_id])) {
                                            $vehicle_totals[$veh_type_id] = [
                                                'total_max_km_day'      => 0,
                                                'total_travel_distance' => 0,
                                                'total_extra_kilometer' => 0,
                                                'total_extra_cost'      => 0,
                                            ];
                                        }

                                        $vehicle_totals[$veh_type_id]['total_max_km_day']      += $max_km_day;
                                        $vehicle_totals[$veh_type_id]['total_travel_distance'] += $travel_distance;
                                        $vehicle_totals[$veh_type_id]['total_extra_kilometer'] += $extra_kilometer;
                                        $vehicle_totals[$veh_type_id]['total_extra_cost']      += $extra_cost;

                                    $temp_rows[] = [
                                        "vehicle_model" => $model_name,
                                        "veh_type_id" => $item['veh_type_id'][$index],
                                        "tour_date" => $item['v_tour_date'][$index],
                                        "day_rent" => $item['day_rent'][$index],
                                        "max_km_day" => $item['max_km_day'][$index],
                                        "extra_km_rate" => $item['extra_km_rate_hidden'][$index],
                                        "travel_distance" => $item['travel_distance'][$index],
                                        "extra_kilometer" => $item['extra_kilometer'][$index],
                                        "veh_total" => $item['veh_total'][$index],
                                        'veh_header' => $item['veh_header'],
                                        'chk_vehicle' => $item['chk_vehicle_value'][$index],
                                        'chk_vehicle_status' => $item['chk_vehicle_hidden'][$index]
                                    ];
                                }
                            }
                            foreach ($temp_rows as $row) {
                                    $id = $row['veh_type_id'];
                                    $totals = $vehicle_totals[$id];

                                    $total_max_km_day      = $totals['total_max_km_day'];
                                    $total_travel_distance = round($totals['total_travel_distance'], 2);
                                    $total_extra_kilometer = max(0, $total_travel_distance - $total_max_km_day);
                                    $total_extra_cost      = round($total_extra_kilometer * $row['extra_km_rate'], 2);

                                    $row['total_max_km_day']      = $total_max_km_day;
                                    $row['total_travel_distance'] = $total_travel_distance;
                                    $row['total_extra_kilometer'] = round($total_extra_kilometer, 2);
                                    $row['total_extra_cost']      = $total_extra_cost;

                                    $json_data[] = $row;
                                }
                            $json_output = json_encode($json_data, JSON_PRETTY_PRINT);

                            $rt_data[] = [
                                "double" => $no_of_double_room,
                                "single" => $no_of_single_room
                            ];
                            $rt_json = json_encode($rt_data, JSON_PRETTY_PRINT);
                            
                            $iti_data_insert = array(
                                'enquiry_header_id' => $enquiry_header_id,
                                'enquiry_details_id' => $enquiry_details_id,
                                'tour_date' => $item['tour_date'],
                                'tour_details_id' => $item['tour_details_id'],
                                'hotel_id' => $item['hotelid'],
                                'room_category_id' => $item['roomcat'],
                                'child_with_bed' => $item['no_of_ch'],
                                'child_without_bed' => $item['no_of_cw'],
                                'extra_bed' => $item['no_of_extra'],
                                'double_room' => $item['double'],
                                'single_room' => $item['single'],
                                'vehicle_details' => $json_output,
                                'hotel_details' => $json_hotels,
                                'special_event_name' => $item['spcl_event'],
                                'json_addons' => $json_addons,
                                'json_special_event' => $json_specials,
                                'remarks' => $item['remarks'],
                                'is_active' => 1,
                                'is_draft' => 1,
                                'updated_time' => $updated_time,
                                'edit_version' => 1,
                                'tour_plan_ref_id' => $tour_plan_ref_id,
                                'extension_ref_id' => 0,
                                'permit' => $item['permit'],
                                'transport_remarks' => $item['transport_remarks'],
                                'hotel_facility_ids' => $hotel_facility_ids,
                                'tax_status' => $item['tax_status'],
                                'tac_eighteen_double' => $item['tac_eighteen_double'],
                                'tac_eighteen_single' => $item['tac_eighteen_single'],
                                'tac_eighteen_total' => $item['tac_eighteen_total'],

                                'adult_eighteen_double' => $item['adult_eighteen_double'],
                                'child_eighteen_double' => $item['child_eighteen_double'],
                                'child_wb_eighteen_double' => $item['child_wb_eighteen_double'],
                                'extra_eighteen_double' => $item['extra_eighteen_double'],
                                'adult_eighteen_single' => $item['adult_eighteen_single'],

                                'enterprise_id' => 1
                            );
                            $itinerary_details_id = $Enquiry_model->insert_iti_details($iti_data_insert);   
                            //if($is_quick_quote == 1){
                                if($itinerary_details_id){
                                    $d_room_rate = array(
                                        'itinerary_details_id' => $itinerary_details_id,
                                        'cost_component_id' => 6,
                                        'room_type_id' => 2,
                                        'tariff' => $item['d_adult_rate'],
                                        'is_active' => 1,
                                        'is_draft' => 1,
                                        'enterprise_id' => 1
                                    );
                                    $iti_insert = $Enquiry_model->insert_iti_cost_details($d_room_rate);   
                                    $s_room_rate = array(
                                        'itinerary_details_id' => $itinerary_details_id,
                                        'cost_component_id' => 6,
                                        'room_type_id' => 1,
                                        'tariff' => $item['s_adult_rate'],
                                        'is_active' => 1,
                                        'is_draft' => 1,
                                        'enterprise_id' => 1
                                    );
                                    $iti_insert = $Enquiry_model->insert_iti_cost_details($s_room_rate);   

                                    $d_c_rate = array(
                                        'itinerary_details_id' => $itinerary_details_id,
                                        'cost_component_id' => 12,
                                        'room_type_id' => 2,
                                        'tariff' => $item['d_child_rate'],
                                        'is_active' => 1,
                                        'is_draft' => 1,
                                        'enterprise_id' => 1
                                    );
                                    $iti_insert = $Enquiry_model->insert_iti_cost_details($d_c_rate);   
                                    $s_c_rate = array(
                                        'itinerary_details_id' => $itinerary_details_id,
                                        'cost_component_id' => 12,
                                        'room_type_id' => 1,
                                        'tariff' => $item['s_child_rate'],
                                        'is_active' => 1,
                                        'is_draft' => 1,
                                        'enterprise_id' => 1
                                    );
                                    $iti_insert = $Enquiry_model->insert_iti_cost_details($s_c_rate);   

                                    $d_cw_rate = array(
                                        'itinerary_details_id' => $itinerary_details_id,
                                        'cost_component_id' => 15,
                                        'room_type_id' => 2,
                                        'tariff' => $item['d_child_wb_rate'],
                                        'is_active' => 1,
                                        'is_draft' => 1,
                                        'enterprise_id' => 1
                                    );
                                    $iti_insert = $Enquiry_model->insert_iti_cost_details($d_cw_rate);   
                                    $s_cw_rate = array(
                                        'itinerary_details_id' => $itinerary_details_id,
                                        'cost_component_id' => 15,
                                        'room_type_id' => 1,
                                        'tariff' => $item['s_child_wb_rate'],
                                        'is_active' => 1,
                                        'is_draft' => 1,
                                        'enterprise_id' => 1
                                    );
                                    $iti_insert = $Enquiry_model->insert_iti_cost_details($s_cw_rate);   

                                    $d_e_rate = array(
                                        'itinerary_details_id' => $itinerary_details_id,
                                        'cost_component_id' => 9,
                                        'room_type_id' => 2,
                                        'tariff' => $item['d_extra_bed_rate'],
                                        'is_active' => 1,
                                        'is_draft' => 1,
                                        'enterprise_id' => 1
                                    );
                                    $iti_insert = $Enquiry_model->insert_iti_cost_details($d_e_rate);   
                                    $s_e_rate = array(
                                        'itinerary_details_id' => $itinerary_details_id,
                                        'cost_component_id' => 9,
                                        'room_type_id' => 1,
                                        'tariff' => $item['s_extra_bed_rate'],
                                        'is_active' => 1,
                                        'is_draft' => 1,
                                        'enterprise_id' => 1
                                    );
                                    $iti_insert = $Enquiry_model->insert_iti_cost_details($s_e_rate);   



                                    $spcl_tariff = array(
                                        'itinerary_details_id' => $itinerary_details_id,
                                        'cost_component_id' => 17,
                                        'room_type_id' => 1,
                                        'tariff' => $item['spcl_tariff'],
                                        'is_active' => 1,
                                        'is_draft' => 1,
                                        'enterprise_id' => 1
                                    );
                                    $iti_insert = $Enquiry_model->insert_iti_cost_details($spcl_tariff);   
                                    $hotfac = array(
                                        'itinerary_details_id' => $itinerary_details_id,
                                        'cost_component_id' => 18,
                                        'room_type_id' => 1,
                                        'tariff' => 0,
                                        'is_active' => 1,
                                        'is_draft' => 1,
                                        'enterprise_id' => 1
                                    );
                                    $iti_insert = $Enquiry_model->insert_iti_cost_details($hotfac);   
                                    $fac_rate = array(
                                        'itinerary_details_id' => $itinerary_details_id,
                                        'cost_component_id' => 19,
                                        'room_type_id' => 1,
                                        'tariff' => $item['fac_rate'],
                                        'is_active' => 1,
                                        'is_draft' => 1,
                                        'enterprise_id' => 1
                                    );
                                    $iti_insert = $Enquiry_model->insert_iti_cost_details($fac_rate);   
                                    $sight = array(
                                        'itinerary_details_id' => $itinerary_details_id,
                                        'cost_component_id' => 21,
                                        'room_type_id' => 1,
                                        'tariff' => $item['sight'],
                                        'is_active' => 1,
                                        'is_draft' => 1,
                                        'enterprise_id' => 1
                                    );
                                    $iti_insert = $Enquiry_model->insert_iti_cost_details($sight);   
                                    $ss_distance = array(
                                        'itinerary_details_id' => $itinerary_details_id,
                                        'cost_component_id' => 22,
                                        'room_type_id' => 1,
                                        'tariff' => $item['ss_distance'],
                                        'is_active' => 1,
                                        'is_draft' => 1,
                                        'enterprise_id' => 1
                                    );
                                    $iti_insert = $Enquiry_model->insert_iti_cost_details($ss_distance);   
                                    $daily_addon = array(
                                        'itinerary_details_id' => $itinerary_details_id,
                                        'cost_component_id' => 23,
                                        'room_type_id' => 1,
                                        'tariff' => $item['daily_addon'],
                                        'is_active' => 1,
                                        'is_draft' => 1,
                                        'enterprise_id' => 1
                                    );
                                    $iti_insert = $Enquiry_model->insert_iti_cost_details($daily_addon);   
                                }
                            //}
                       }
                    }
                    //if($is_edit == 1){
                        $iti_data_pre = array(
                            'is_active' => 0,
                            'is_draft' => 0,
                        );
                        $iti_updated_pre = $Enquiry_model->update_iti_detailsforedit($iti_data_pre,$enquiry_header_id,$extension_ref_id_temp);
                    //}

                return redirect()->to($sURL);
            }

            }
       
        }
        else{
            return redirect()->to('Login');
        }
    }

    public function getTourTariffDetailsbydate()
    {
        if (!empty(session()->get('user_id'))) {
            $Enquiry_model = new Enquiry_m();
            
            $hotel_id = $this->request->getPost('hotel_id');
            $room_cat_id = $this->request->getPost('room_cat_id');
            $mealplan = $this->request->getPost('mealplan');
            $tour_date = $this->request->getPost('tour_date');
            $double = $this->request->getPost('double');
            $single = $this->request->getPost('single');
            $id = $this->request->getPost('id');
            $tour_location_id = $this->request->getPost('tour_location_id');
            $tariff_det = [];
            $object_ids = $Enquiry_model->getObjectidByhotel($hotel_id);
            $object_id = $object_ids[0]['object_id'];

            $d_room_tariff = 0;
            $d_child_tariff = 0;
            $d_child_wb_tariff = 0;
            $d_extra_tariff = 0;

            $s_room_tariff = 0;
            $s_child_tariff = 0;
            $s_child_wb_tariff = 0;
            $s_extra_tariff = 0;

            if($double > 0){
                $room_type = 2;
                    $weekend_tariff = $Enquiry_model->checkWeekendExist($tour_date,$object_id);
                    $season_tariff = $Enquiry_model->checkSeasonExist($tour_date,$object_id);
                    if(!empty($weekend_tariff)){ 
                        $room_tariffs = $Enquiry_model->getTourTariffDetails(7,$room_cat_id,$room_type,$weekend_tariff[0]['weekend_id'],$object_id,$mealplan);
                        if(!empty($room_tariffs)){
                            $d_room_tariff = $room_tariffs[0]['tariff'];
                        }
                        else{
                            $d_room_tariff = 0;
                        } 

                        $child_tariffs = $Enquiry_model->getTourTariffDetailsChild(13,$room_cat_id,$room_type,$weekend_tariff[0]['weekend_id'],$object_id,$mealplan,1);
                        if(!empty($child_tariffs)){
                            $d_child_tariff = $child_tariffs[0]['tariff'];
                        }
                        else{
                            $d_child_tariff = 0;
                        }

                        $child_wb_tariffs = $Enquiry_model->getTourTariffDetailsChild(16,$room_cat_id,$room_type,$weekend_tariff[0]['weekend_id'],$object_id,$mealplan,2);
                        if(!empty($child_wb_tariffs)){
                            $d_child_wb_tariff = $child_wb_tariffs[0]['tariff'];
                        }
                        else{
                            $d_child_wb_tariff = 0;
                        }

                        $extra_tariffs = $Enquiry_model->getTourTariffDetailsChild(10,$room_cat_id,$room_type,$weekend_tariff[0]['weekend_id'],$object_id,$mealplan,3);
                        if(!empty($extra_tariffs)){
                            $d_extra_tariff = $extra_tariffs[0]['tariff'];
                        }
                        else{
                            $d_extra_tariff = 0;
                        }
                    }
                    else if(!empty($season_tariff)){  
                        $room_tariffs = $Enquiry_model->getTourTariffDetails(6,$room_cat_id,$room_type,$season_tariff[0]['season_id'],$object_id,$mealplan);
                        if(!empty($room_tariffs)){
                            $d_room_tariff = $room_tariffs[0]['tariff'];
                        }
                        else{
                            $d_room_tariff = 0;
                        }

                        $child_tariffs = $Enquiry_model->getTourTariffDetailsChild(12,$room_cat_id,$room_type,$season_tariff[0]['season_id'],$object_id,$mealplan,1);
                        if(!empty($child_tariffs)){
                            $d_child_tariff = $child_tariffs[0]['tariff'];
                        }
                        else{
                            $d_child_tariff = 0;
                        }

                        $child_wb_tariffs = $Enquiry_model->getTourTariffDetailsChild(15,$room_cat_id,$room_type,$season_tariff[0]['season_id'],$object_id,$mealplan,2);
                        if(!empty($child_wb_tariffs)){
                            $d_child_wb_tariff = $child_wb_tariffs[0]['tariff'];
                        }
                        else{
                            $d_child_wb_tariff = 0;
                        }

                        $extra_tariffs = $Enquiry_model->getTourTariffDetailsChild(9,$room_cat_id,$room_type,$season_tariff[0]['season_id'],$object_id,$mealplan,3);
                        if(!empty($extra_tariffs)){
                            $d_extra_tariff = $extra_tariffs[0]['tariff'];
                        }
                        else{
                            $d_extra_tariff = 0;
                        }
                    }
                    else{
                        $room_tariffs = $Enquiry_model->getTourTariffDetailsBasic(5,$room_cat_id,$room_type,$object_id,$mealplan);
                        if(!empty($room_tariffs)){
                            $d_room_tariff = $d_room_tariff + $room_tariffs[0]['tariff'];
                        }
                        else{
                            $d_room_tariff = 0;
                        }

                        $child_tariffs = $Enquiry_model->getTourTariffDetailsChildBasic(11,$room_cat_id,$room_type,$object_id,$mealplan,1);
                        if(!empty($child_tariffs)){
                            $d_child_tariff = $d_child_tariff + $child_tariffs[0]['exclusive_tariff'];
                        }
                        else{
                            $d_child_tariff = 0;
                        }

                        $child_wb_tariffs = $Enquiry_model->getTourTariffDetailsChildBasic(11,$room_cat_id,$room_type,$object_id,$mealplan,2);
                        if(!empty($child_wb_tariffs)){
                            $d_child_wb_tariff = $d_child_wb_tariff + $child_wb_tariffs[0]['exclusive_tariff'];
                        }
                        else{
                            $d_child_wb_tariff = 0;
                        }

                        $extra_tariffs = $Enquiry_model->getTourTariffDetailsChildBasic(11,$room_cat_id,$room_type,$object_id,$mealplan,3);
                        if(!empty($extra_tariffs)){
                            $d_extra_tariff = $d_extra_tariff + $extra_tariffs[0]['exclusive_tariff'];
                        }
                        else{
                            $d_extra_tariff = 0;
                        }
                    }
            }

            if($single > 0){    
                $room_type = 1;
                    $weekend_tariff = $Enquiry_model->checkWeekendExist($tour_date,$object_id);
                    $season_tariff = $Enquiry_model->checkSeasonExist($tour_date,$object_id);
                    if(!empty($weekend_tariff)){
                        $s_room_tariffs = $Enquiry_model->getTourTariffDetails(7,$room_cat_id,$room_type,$weekend_tariff[0]['weekend_id'],$object_id,$mealplan);
                        if(!empty($s_room_tariffs)){
                            $s_room_tariff = $s_room_tariffs[0]['tariff'];
                        }
                        else{
                            $s_room_tariff = 0;
                        }

                        $s_child_tariffs = $Enquiry_model->getTourTariffDetailsChild(13,$room_cat_id,$room_type,$weekend_tariff[0]['weekend_id'],$object_id,$mealplan,1);
                        if(!empty($s_child_tariffs)){
                            $s_child_tariff = $s_child_tariffs[0]['tariff'];
                        }
                        else{
                            $s_child_tariff = 0;
                        }

                        $s_child_wb_tariffs = $Enquiry_model->getTourTariffDetailsChild(16,$room_cat_id,$room_type,$weekend_tariff[0]['weekend_id'],$object_id,$mealplan,2);
                        if(!empty($s_child_wb_tariffs)){
                            $s_child_wb_tariff = $s_child_wb_tariffs[0]['tariff'];
                        }
                        else{
                            $s_child_wb_tariff = 0;
                        }

                        $s_extra_tariffs = $Enquiry_model->getTourTariffDetailsChild(10,$room_cat_id,$room_type,$weekend_tariff[0]['weekend_id'],$object_id,$mealplan,3);
                        if(!empty($s_extra_tariffs)){
                            $s_extra_tariff = $s_extra_tariffs[0]['tariff'];
                        }
                        else{
                            $s_extra_tariff = 0;
                        }
                    }
                    else if(!empty($season_tariff)){
                        $s_room_tariffs = $Enquiry_model->getTourTariffDetails(6,$room_cat_id,$room_type,$season_tariff[0]['season_id'],$object_id,$mealplan);
                        if(!empty($s_room_tariffs)){
                            $s_room_tariff = $s_room_tariffs[0]['tariff'];
                        }
                        else{
                            $s_room_tariff = 0;
                        }

                        $s_child_tariffs = $Enquiry_model->getTourTariffDetailsChild(12,$room_cat_id,$room_type,$season_tariff[0]['season_id'],$object_id,$mealplan,1);
                        if(!empty($s_child_tariffs)){
                            $s_child_tariff = $s_child_tariffs[0]['tariff'];
                        }
                        else{
                            $s_child_tariff = 0;
                        }

                        $s_child_wb_tariffs = $Enquiry_model->getTourTariffDetailsChild(15,$room_cat_id,$room_type,$season_tariff[0]['season_id'],$object_id,$mealplan,2);
                        if(!empty($s_child_wb_tariffs)){
                            $s_child_wb_tariff = $s_child_wb_tariffs[0]['tariff'];
                        }
                        else{
                            $s_child_wb_tariff = 0;
                        }

                        $s_extra_tariffs = $Enquiry_model->getTourTariffDetailsChild(9,$room_cat_id,$room_type,$season_tariff[0]['season_id'],$object_id,$mealplan,3);
                        if(!empty($s_extra_tariffs)){
                            $s_extra_tariff = $s_extra_tariffs[0]['tariff'];
                        }
                        else{
                            $s_extra_tariff = 0;
                        }

                    }
                    else{

                        $room_tariffs = $Enquiry_model->getTourTariffDetailsBasic(5,$room_cat_id,$room_type,$object_id,$mealplan);
                        if(!empty($room_tariffs)){
                            $s_room_tariff = $s_room_tariff + $room_tariffs[0]['tariff'];
                        }
                        else{
                            $s_room_tariff = 0;
                        }

                        $child_tariffs = $Enquiry_model->getTourTariffDetailsChildBasic(11,$room_cat_id,$room_type,$object_id,$mealplan,1);
                        if(!empty($child_tariffs)){
                            $s_child_tariff = $s_child_tariff + $child_tariffs[0]['exclusive_tariff'];
                        }
                        else{
                            $s_child_tariff = 0;
                        }

                        $child_wb_tariffs = $Enquiry_model->getTourTariffDetailsChildBasic(11,$room_cat_id,$room_type,$object_id,$mealplan,2);
                        if(!empty($child_wb_tariffs)){
                            $s_child_wb_tariff = $s_child_wb_tariff + $child_wb_tariffs[0]['exclusive_tariff'];
                        }
                        else{
                            $s_child_wb_tariff = 0;
                        }

                        $extra_tariffs = $Enquiry_model->getTourTariffDetailsChildBasic(11,$room_cat_id,$room_type,$object_id,$mealplan,3);
                        if(!empty($extra_tariffs)){
                            $s_extra_tariff = $s_extra_tariff + $extra_tariffs[0]['exclusive_tariff'];
                        }
                        else{
                            $s_extra_tariff = 0;
                        }
                    }
                
            }
            $tariff_det['d_room_tariff']=$d_room_tariff;
            $tariff_det['d_child_tariff']=$d_child_tariff;
            $tariff_det['d_child_wb_tariff']=$d_child_wb_tariff;
            $tariff_det['d_extra_tariff']=$d_extra_tariff;

            $tariff_det['s_room_tariff']=$s_room_tariff;
            $tariff_det['s_child_tariff']=$s_child_tariff;
            $tariff_det['s_child_wb_tariff']=$s_child_wb_tariff;
            $tariff_det['s_extra_tariff']=$s_extra_tariff;
            echo json_encode($tariff_det);
        }
        else{
            return redirect()->to('Login');
        }
    }
    function checkCsNameExists()
    {
        $Enquiry_model = new Enquiry_m();
        $cs_name_exist = $Enquiry_model->check_cs_name_exist($enquiry_header_id,$cs_name);
        echo json_encode($cs_name_exist);
    }
    public function generateCostingSheet()
    {
        $Enquiry_model = new Enquiry_m();
        date_default_timezone_set('Asia/Kolkata');
        $sdate = date('Y-m-d H:i:s');
        $enquiry_header_id = $this->request->getPost('enquiry_header_id_t');
        $extension_ref_id = $this->request->getPost('extension_ref_id');
        $enquiry_details_id = $this->request->getPost('enquiry_details_id_t');
        $no_of_night = $this->request->getPost('no_of_night_hidden');
        $cs_name = $this->request->getPost('cs_name');
        $cs_name_exist = $Enquiry_model->check_cs_name_exist($enquiry_header_id,$cs_name);
        /*if($cs_name_exist > 0){
            session()->setFlashdata('error', 'Costing sheet name already exist');
          
        }
        else{*/
            $itinerary_details_save = [];
            $tour_plan_det = $Enquiry_model->get_tour_plan_details($enquiry_header_id,$enquiry_details_id);
            $ext_ref_id_tour_plan = $tour_plan_det[0]['tour_details_id'];
            
            $version_count = $Enquiry_model->get_all_itinerary_version_count($enquiry_header_id);
            $object_id = $this->request->getPost('object_id_t');
            $user_id = session('user_id');
            $er_det = $Enquiry_model->getEditRequestDetails($enquiry_header_id);
            $status_exist = $Enquiry_model->checkStatusExist($enquiry_header_id,7);
            if($status_exist == 0){
                $status_det = $Enquiry_model->getstatusDetails($enquiry_header_id,1);
                $status_data = array(
                    'object_id' => $object_id,
                    'enquiry_header_id' => $enquiry_header_id,
                    'current_status_id' => 7,
                    'updated_time' => $sdate,
                    'assigned_to' => $status_det[0]['assigned_to'],
                    'assigned_status' => 1,
                    'edit_request_id' => $er_det[0]['enquiry_edit_request_id'],
                    'updated_by' => $user_id,
                    'enterprise_id' => 1                            
                );
                $status_data_insert = $Enquiry_model->insertEnquirystatus($status_data);
            }

            $object_det = $Enquiry_model->get_object_details($object_id);
            $data_cs_status = array(
                'is_active' => 0
            );
            $update_status = $Enquiry_model->update_cs_active($data_cs_status,$enquiry_header_id,$enquiry_details_id);

            $margin_value = $this->request->getPost('margin_value');
            $margin_total = $this->request->getPost('margin_total');
            $tour_addon_value = $this->request->getPost('tour_addon_value');
            $total_final = $this->request->getPost('total_final');
            $gst_value = $this->request->getPost('gst_value');
            $gst_final = $this->request->getPost('gst_final');
            $tpc = $this->request->getPost('tpc');

            $tac_hidden = $this->request->getPost('tac_hidden');
            $ttc_hidden = $this->request->getPost('ttc_hidden');
            $spcl_hidden = $this->request->getPost('spcl_hidden');
            $daily_hidden = $this->request->getPost('daily_hidden');
            $tnr_hidden = $this->request->getPost('tnr_hidden');
            $bifurcation_status = $this->request->getPost('bifurcation_status');

            $data_cs = array(
                'object_id' => $object_id,
                'enquiry_header_id' => $enquiry_header_id,
                'enquiry_details_id' => $enquiry_details_id,

                'tac' => $tac_hidden,
                'ttc' => $ttc_hidden,
                'special_total_cost' => $spcl_hidden,
                'daily_total_cost' => $daily_hidden,
                'tnr' => $tnr_hidden,

                'margin_per' => $margin_value,
                'margin_value' => $margin_total,
                'tour_addon' => $tour_addon_value,
                'total_rate' => $total_final,
                'gst_per' => $gst_value,
                'gst_value' => $gst_final,
                'tpc' => $tpc,
                'created_date' => $sdate,
                'is_active' => 1,
                'is_edit' => 1,
                'version_count' => $version_count,
                'cs_name' => $cs_name,
                'is_bifurcation' => $bifurcation_status,
                'enterprise_id' => 1
            );
            $enquiry_detail_details_id = $Enquiry_model->insert_iti_costing($data_cs);   
            if($enquiry_detail_details_id){

                    if($bifurcation_status == 1){
                        $bifur_master_trans = array(
                            'enquiry_header_id' => $enquiry_header_id,
                            'itinerary_id' => $extension_ref_id,
                            'extension_id' => $enquiry_detail_details_id,
                            'no_of_pax' => $this->request->getPost('no_of_pax_b'),
                            'total_cost' => $this->request->getPost('ttc_bifur_hd'),
                            'per_person' => $this->request->getPost('ttc_bifur_hd_pp'),
                            'bifur_type' => 1
                        );
                        $bifur_master_trans_id = $Enquiry_model->insert_master_bifurcation($bifur_master_trans); 

                        $bifur_master_ss = array(
                            'enquiry_header_id' => $enquiry_header_id,
                            'itinerary_id' => $extension_ref_id,
                            'extension_id' => $enquiry_detail_details_id,
                            'no_of_pax' => $this->request->getPost('no_of_pax_bs'),
                            'total_cost' => $this->request->getPost('bifur_ss_hidden'),
                            'per_person' => $this->request->getPost('bifur_ss_hidden_pp'),
                            'bifur_type' => 2
                        );
                        $bifur_master_ss_id = $Enquiry_model->insert_master_bifurcation($bifur_master_ss); 

                        $bifur_master_round = array(
                            'enquiry_header_id' => $enquiry_header_id,
                            'itinerary_id' => $extension_ref_id,
                            'extension_id' => $enquiry_detail_details_id,
                            'no_of_pax' => $this->request->getPost('no_of_pax_br'),
                            'total_cost' => $this->request->getPost('round_off_hidden'),
                            'per_person' => $this->request->getPost('round_off_hidden_pp'),
                            'bifur_type' => 3
                        );
                        $bifur_master_round_id = $Enquiry_model->insert_master_bifurcation($bifur_master_round); 

                        $bifur_details_double = array(
                            'enquiry_header_id' => $enquiry_header_id,
                            'itinerary_id' => $extension_ref_id,
                            'extension_id' => $enquiry_detail_details_id,
                            'no_of_pax' => $this->request->getPost('by_double_pax_hidden'),
                            'cost' => $this->request->getPost('bifur_double_total_hidden'),
                            'per_person' => $this->request->getPost('bifur_double_pp_hidden'),
                            'vehicle' => $this->request->getPost('ttc_bifur_double_hd'),
                            'sight_seeing' => $this->request->getPost('ss_bifur_double_hd_pp'),
                            'total' => $this->request->getPost('total_bifur_double_hd_pp'),
                            'margin' => $this->request->getPost('margin_bifur_double_hd_pp'),
                            'net_total' => $this->request->getPost('net_bifur_double_hd_pp'),
                            'round_off' => $this->request->getPost('round_bifur_double_hd_pp'),
                            'gstin' => $this->request->getPost('gst_bifur_double_hd_pp'),
                            'grand_total' => $this->request->getPost('grand_bifur_double_hd_pp'),
                            'bifur_type' => 1
                        );
                        $bifur_details_double_id = $Enquiry_model->insert_master_bifurcation_details($bifur_details_double); 

                        $bifur_details_single = array(
                            'enquiry_header_id' => $enquiry_header_id,
                            'itinerary_id' => $extension_ref_id,
                            'extension_id' => $enquiry_detail_details_id,
                            'no_of_pax' => $this->request->getPost('by_single_pax_hidden'),
                            'cost' => $this->request->getPost('bifur_single_total_hidden'),
                            'per_person' => $this->request->getPost('bifur_single_pp_hidden'),
                            'vehicle' => $this->request->getPost('ttc_bifur_single_hd'),
                            'sight_seeing' => $this->request->getPost('ss_bifur_single_hd_pp'),
                            'total' => $this->request->getPost('total_bifur_single_hd_pp'),
                            'margin' => $this->request->getPost('margin_bifur_single_hd_pp'),
                            'net_total' => $this->request->getPost('net_bifur_single_hd_pp'),
                            'round_off' => $this->request->getPost('round_bifur_single_hd_pp'),
                            'gstin' => $this->request->getPost('gst_bifur_single_hd_pp'),
                            'grand_total' => $this->request->getPost('grand_bifur_single_hd_pp'),
                            'bifur_type' => 2
                        );
                        $bifur_details_single_id = $Enquiry_model->insert_master_bifurcation_details($bifur_details_single); 

                        $bifur_details_child = array(
                            'enquiry_header_id' => $enquiry_header_id,
                            'itinerary_id' => $extension_ref_id,
                            'extension_id' => $enquiry_detail_details_id,
                            'no_of_pax' => $this->request->getPost('by_child_pax_hidden'),
                            'cost' => $this->request->getPost('bifur_child_total_hidden'),
                            'per_person' => $this->request->getPost('bifur_child_pp_hidden'),
                            'vehicle' => $this->request->getPost('ttc_bifur_child_hd'),
                            'sight_seeing' => $this->request->getPost('ss_bifur_child_hd_pp'),
                            'total' => $this->request->getPost('total_bifur_child_hd_pp'),
                            'margin' => $this->request->getPost('margin_bifur_child_hd_pp'),
                            'net_total' => $this->request->getPost('net_bifur_child_hd_pp'),
                            'round_off' => $this->request->getPost('round_bifur_child_hd_pp'),
                            'gstin' => $this->request->getPost('gst_bifur_child_hd_pp'),
                            'grand_total' => $this->request->getPost('grand_bifur_child_hd_pp'),
                            'bifur_type' => 3
                        );
                        $bifur_details_child_id = $Enquiry_model->insert_master_bifurcation_details($bifur_details_child); 

                        $bifur_details_child_wb = array(
                            'enquiry_header_id' => $enquiry_header_id,
                            'itinerary_id' => $extension_ref_id,
                            'extension_id' => $enquiry_detail_details_id,
                            'no_of_pax' => $this->request->getPost('by_child_wb_pax_hidden'),
                            'cost' => $this->request->getPost('bifur_child_wb_total_hidden'),
                            'per_person' => $this->request->getPost('bifur_child_wb_pp_hidden'),
                            'vehicle' => $this->request->getPost('ttc_bifur_child_wb_hd'),
                            'sight_seeing' => $this->request->getPost('ss_bifur_child_wb_hd_pp'),
                            'total' => $this->request->getPost('total_bifur_child_wb_hd_pp'),
                            'margin' => $this->request->getPost('margin_bifur_child_wb_hd_pp'),
                            'net_total' => $this->request->getPost('net_bifur_child_wb_hd_pp'),
                            'round_off' => $this->request->getPost('round_bifur_child_wb_hd_pp'),
                            'gstin' => $this->request->getPost('gst_bifur_child_wb_hd_pp'),
                            'grand_total' => $this->request->getPost('grand_bifur_child_wb_hd_pp'),
                            'bifur_type' => 4
                        );
                        $bifur_details_child_wb_id = $Enquiry_model->insert_master_bifurcation_details($bifur_details_child_wb); 

                        $bifur_details_extra = array(
                            'enquiry_header_id' => $enquiry_header_id,
                            'itinerary_id' => $extension_ref_id,
                            'extension_id' => $enquiry_detail_details_id,
                            'no_of_pax' => $this->request->getPost('by_extra_pax_hidden'),
                            'cost' => $this->request->getPost('bifur_extra_total_hidden'),
                            'per_person' => $this->request->getPost('bifur_extra_pp_hidden'),
                            'vehicle' => $this->request->getPost('ttc_bifur_extra_hd'),
                            'sight_seeing' => $this->request->getPost('ss_bifur_extra_hd_pp'),
                            'total' => $this->request->getPost('total_bifur_extra_hd_pp'),
                            'margin' => $this->request->getPost('margin_bifur_extra_hd_pp'),
                            'net_total' => $this->request->getPost('net_bifur_extra_hd_pp'),
                            'round_off' => $this->request->getPost('round_bifur_extra_hd_pp'),
                            'gstin' => $this->request->getPost('gst_bifur_extra_hd_pp'),
                            'grand_total' => $this->request->getPost('grand_bifur_extra_hd_pp'),
                            'bifur_type' => 5
                        );
                        $bifur_details_extra_id = $Enquiry_model->insert_master_bifurcation_details($bifur_details_extra);


                    }

                    $vc_data = array(
                        'version_count' => $version_count
                    );
                    $vc_data_update = $Enquiry_model->update_all_version_count($vc_data,$enquiry_header_id);   

                    $ext_iti_data = array(
                        'extension_ref_id' => $enquiry_detail_details_id
                    );
                    $ext_tp_data = array(
                        'extension_ref_id' => $ext_ref_id_tour_plan
                    );
                
                    $ext_tp_refdata = array(
                        'tour_plan_ref_id' => $ext_ref_id_tour_plan
                    );
                    $ext_enq_refdata = array(
                        'enquiry_ref_id' => $enquiry_details_id
                    );
                    if($extension_ref_id > 0){
                        $ext_iti_data_temp = array(
                            'extension_ref_id' => $extension_ref_id
                        );
                        $ext_updated = $Enquiry_model->set_extension_ref_id($ext_iti_data_temp,$enquiry_detail_details_id); 
                        $tp_updated = $Enquiry_model->set_tourplan_ref_id($ext_tp_refdata,$enquiry_detail_details_id); 
                        $enq_updated = $Enquiry_model->set_enquiry_ref_id($ext_enq_refdata,$enquiry_detail_details_id);
                    }
                    else{
                        $ext_updated = $Enquiry_model->set_extension_ref_id($ext_iti_data,$enquiry_detail_details_id); 
                        $tp_updated = $Enquiry_model->set_tourplan_ref_id($ext_tp_refdata,$enquiry_detail_details_id); 
                        $enq_updated = $Enquiry_model->set_enquiry_ref_id($ext_enq_refdata,$enquiry_detail_details_id);
                        $ext_iti_updated = $Enquiry_model->linkItinearywithExtension($ext_iti_data,$enquiry_header_id,$enquiry_details_id);
                        $ext_tp_updated = $Enquiry_model->linkItinearywithTourplan($ext_tp_data,$enquiry_header_id,$enquiry_details_id); 
                    
                    }
                return redirect()->to('Enquiry/enquiry_list_view/10');
            }else{
                return redirect()->to('Login');
            }
        //}
    }
    
    public function viewCostingSheet()
    {
        $Enquiry_model = new Enquiry_m();
        $itinerary_details_save = [];
        $result2 = [];
        $object_det = [];
        $tour_plan_det = [];
        $final_cs_data = [];
        $id = $this->request->getPost('id');
        $extension_ref_id = $this->request->getPost('extension_ref_id');
        $tourplan_ref_id = $this->request->getPost('tourplan_ref_id');
        $enq_ref_id = $this->request->getPost('enq_ref_id');
        $iti_cost_datas = $Enquiry_model->get_iti_cost($id); 
        if($iti_cost_datas[0]['cs_confirmed_id'] > 0){
            $final_cs_datas = $Enquiry_model->get_final_costing_sheet($iti_cost_datas[0]['cs_confirmed_id']);
            $final_cs_data = $final_cs_datas[0]['costing_sheet'];
        }

        $object_det = $Enquiry_model->get_object_details_forcs($iti_cost_datas[0]['object_id'],$enq_ref_id);
       
        $tour_plan_det = $Enquiry_model->get_tour_plan_details_foredit($tourplan_ref_id);

        foreach($tour_plan_det as $keys => $vals){
            $result2 = $Enquiry_model->get_itinerary_save_details_for_cs($id,$extension_ref_id,$enq_ref_id,$vals['tour_details_id']);
            if (!empty($result2)) {
                $itinerary_details_save = [...$itinerary_details_save, ...$result2];
            }
        } 
      
        $response['iti_cost_datas'] = $iti_cost_datas;
        $response['iti_data'] = $itinerary_details_save;
        $response['object_det'] = $object_det;
        $response['tour_plan_det'] = $tour_plan_det; 

        $response['tac_hidden'] = $iti_cost_datas[0]['tac']; 
        $response['ttc_hidden'] = $iti_cost_datas[0]['ttc']; 
        $response['spcl_hidden'] = $iti_cost_datas[0]['special_total_cost']; 
        $response['daily_hidden'] = $iti_cost_datas[0]['daily_total_cost']; 
        $response['tnr_hidden'] = $iti_cost_datas[0]['tnr']; 
        $response['final_cs_data'] = $final_cs_data;
        
        echo view('enquiry/costing_sheet_view', $response);
    }


    public function viewItinerarySheet()
    {
        $Enquiry_model = new Enquiry_m();
        $itinerary_details_save = [];
        $result2 = [];
        $object_det = [];
        $tour_plan_det = [];
        $final_iti_data = [];
        $id = $this->request->getPost('id');
        $extension_ref_id = $this->request->getPost('extension_ref_id');
        $tourplan_ref_id = $this->request->getPost('tourplan_ref_id');
        $enq_ref_id = $this->request->getPost('enq_ref_id');
        $iti_cost_datas = $Enquiry_model->get_iti_cost($id); 
        if($iti_cost_datas[0]['cs_confirmed_id'] > 0){
            $final_iti_datas = $Enquiry_model->get_final_costing_sheet($iti_cost_datas[0]['cs_confirmed_id']);
            $final_iti_data = $final_iti_datas[0]['itinerary'];
        }
       
        $object_det = $Enquiry_model->get_object_details_forcs($iti_cost_datas[0]['object_id'],$enq_ref_id);
        
        $tour_plan_det = $Enquiry_model->get_tour_plan_details_foredit($tourplan_ref_id);
    
        foreach($tour_plan_det as $keys => $vals){
            $result2 = $Enquiry_model->get_itinerary_save_details_for_cs($id,$extension_ref_id,$enq_ref_id,$vals['tour_details_id']);
            if (!empty($result2)) {
                $itinerary_details_save = [...$itinerary_details_save, ...$result2];
            }
        } 
        $response['iti_cost_datas'] = $iti_cost_datas;
        $response['iti_data'] = $itinerary_details_save;
        $response['object_det'] = $object_det;
        $response['tour_plan_det'] = $tour_plan_det; 

        $response['tac_hidden'] = $iti_cost_datas[0]['tac']; 
        $response['ttc_hidden'] = $iti_cost_datas[0]['ttc']; 
        $response['spcl_hidden'] = $iti_cost_datas[0]['special_total_cost']; 
        $response['daily_hidden'] = $iti_cost_datas[0]['daily_total_cost']; 
        $response['tnr_hidden'] = $iti_cost_datas[0]['tnr']; 
        $response['is_bifurcation'] = $iti_cost_datas[0]['is_bifurcation']; 
        $response['final_iti_data'] = $final_iti_data;

        if($iti_cost_datas[0]['is_bifurcation'] == 1){
            $response['bifur_double'] = $Enquiry_model->get_bifur_datas($id,1);
            $response['bifur_single'] = $Enquiry_model->get_bifur_datas($id,2);
            $response['bifur_child'] = $Enquiry_model->get_bifur_datas($id,3);
            $response['bifur_child_wb'] = $Enquiry_model->get_bifur_datas($id,4);
            $response['bifur_extra'] = $Enquiry_model->get_bifur_datas($id,5);
        }
        else{
            $response['bifur_double'] = [];
            $response['bifur_single'] = [];
            $response['bifur_child'] = [];
            $response['bifur_child_wb'] = [];
            $response['bifur_extra'] = [];
        }
        
        echo view('enquiry/itinerary_sheet_view', $response);
    }

    public function viewFinalItinerarySheet()
    {
        $Enquiry_model = new Enquiry_m();
        $itinerary_details_save = [];
        $result2 = [];
        $object_det = [];
        $tour_plan_det = [];
        $final_iti_data = [];
        $id = $this->request->getPost('id');
        $extension_ref_id = $this->request->getPost('extension_ref_id');
        $tourplan_ref_id = $this->request->getPost('tourplan_ref_id');
        $enq_ref_id = $this->request->getPost('enq_ref_id');
        $iti_cost_datas = $Enquiry_model->get_iti_cost($id); 
        if($iti_cost_datas[0]['cs_confirmed_id'] > 0){
            $final_iti_datas = $Enquiry_model->get_final_costing_sheet($iti_cost_datas[0]['cs_confirmed_id']);
            $final_iti_data = $final_iti_datas[0]['itinerary'];
        }
       
        $object_det = $Enquiry_model->get_object_details_forcs($iti_cost_datas[0]['object_id'],$enq_ref_id);
        
        $tour_plan_det = $Enquiry_model->get_tour_plan_details_foredit($tourplan_ref_id);
    
        foreach($tour_plan_det as $keys => $vals){
            $result2 = $Enquiry_model->get_itinerary_save_details_for_cs($id,$extension_ref_id,$enq_ref_id,$vals['tour_details_id']);
            if (!empty($result2)) {
                $itinerary_details_save = [...$itinerary_details_save, ...$result2];
            }
        } 
        $response['iti_cost_datas'] = $iti_cost_datas;
        $response['iti_data'] = $itinerary_details_save;
        $response['object_det'] = $object_det;
        $response['tour_plan_det'] = $tour_plan_det; 

        $response['tac_hidden'] = $iti_cost_datas[0]['tac']; 
        $response['ttc_hidden'] = $iti_cost_datas[0]['ttc']; 
        $response['spcl_hidden'] = $iti_cost_datas[0]['special_total_cost']; 
        $response['daily_hidden'] = $iti_cost_datas[0]['daily_total_cost']; 
        $response['tnr_hidden'] = $iti_cost_datas[0]['tnr']; 
        $response['final_iti_data'] = $final_iti_data;
        
        echo view('enquiry/final_itinerary_sheet_view', $response);
    }
    public function viewMultipleItinerarySheet()
    {
        $Enquiry_model = new Enquiry_m();
        
        $selectedIDs = $this->request->getPost('selectedIDs') ?? [];
        foreach($selectedIDs as $key => $id){
            $itinerary_details_save = [];
            $result2 = [];
            $object_det = [];
            $tour_plan_det = [];
            $ext_det = $Enquiry_model->getExtensionDetailsbyid($id);
            $extension_ref_id = $ext_det[0]['extension_ref_id'];
            $tourplan_ref_id = $ext_det[0]['tour_plan_ref_id'];
            $enq_ref_id = $ext_det[0]['enquiry_ref_id'];
            $iti_cost_datas = $Enquiry_model->get_iti_cost($id); 
            $object_det = $Enquiry_model->get_object_details_forcs($iti_cost_datas[0]['object_id'],$enq_ref_id);
            $tour_plan_det = $Enquiry_model->get_tour_plan_details_foredit($tourplan_ref_id);
            foreach($tour_plan_det as $keys => $vals){
                $result2 = $Enquiry_model->get_itinerary_save_details_for_cs($id,$extension_ref_id,$enq_ref_id,$vals['tour_details_id']);
                if (!empty($result2)) {
                    $itinerary_details_save = [...$itinerary_details_save, ...$result2];
                }
            } 
            $response[$key]['iti_cost_datas'] = $iti_cost_datas;
            $response[$key]['iti_data'] = $itinerary_details_save;
            $response[$key]['object_det'] = $object_det;
            $response[$key]['tour_plan_det'] = $tour_plan_det; 
        }
      
        echo view('enquiry/multiple_itinerary_sheet_view', ['response' => $response]);
    }


    public function getTourTariffDetailsbyTourDetails($tour_date,$hotel_id,$room_cat_id,$mealplan,$double,$single)
    {
        if (!empty(session()->get('user_id'))) {
            $Enquiry_model = new Enquiry_m();
            $tariff_det = [];
            if($hotel_id > 0){
            $object_ids = $Enquiry_model->getObjectidByhotel($hotel_id);
            $object_id = $object_ids[0]['object_id'];

            $d_room_tariff = 0;
            $d_child_tariff = 0;
            $d_child_wb_tariff = 0;
            $d_extra_tariff = 0;

            $s_room_tariff = 0;
            $s_child_tariff = 0;
            $s_child_wb_tariff = 0;
            $s_extra_tariff = 0;

            if($double > 0){    
                $room_type = 2;
                    $weekend_tariff = $Enquiry_model->checkWeekendExist($tour_date,$object_id);
                    $season_tariff = $Enquiry_model->checkSeasonExist($tour_date,$object_id);
                    $d_room_tariff = 0;
                    $d_child_tariff = 0;
                    $d_child_wb_tariff = 0;
                    $d_extra_tariff = 0;
                    if(!empty($weekend_tariff)){ 
                        $room_tariffs = $Enquiry_model->getTourTariffDetails(7,$room_cat_id,$room_type,$weekend_tariff[0]['weekend_id'],$object_id,$mealplan);
                        if(!empty($room_tariffs)){
                            $d_room_tariff = $room_tariffs[0]['tariff'];
                        }
                        else{
                            $d_room_tariff = 0;
                        } 

                        $child_tariffs = $Enquiry_model->getTourTariffDetailsChild(13,$room_cat_id,$room_type,$weekend_tariff[0]['weekend_id'],$object_id,$mealplan,1);
                        if(!empty($child_tariffs)){
                            $d_child_tariff = $child_tariffs[0]['tariff'];
                        }
                        else{
                            $d_child_tariff = 0;
                        }
                      
                        $child_wb_tariffs = $Enquiry_model->getTourTariffDetailsChild(16,$room_cat_id,$room_type,$weekend_tariff[0]['weekend_id'],$object_id,$mealplan,2);
                        if(!empty($child_wb_tariffs)){
                            $d_child_wb_tariff = $child_wb_tariffs[0]['tariff'];
                        }
                        else{
                            $d_child_wb_tariff = 0;
                        }

                        $extra_tariffs = $Enquiry_model->getTourTariffDetailsChild(10,$room_cat_id,$room_type,$weekend_tariff[0]['weekend_id'],$object_id,$mealplan,3);
                        if(!empty($extra_tariffs)){
                            $d_extra_tariff = $extra_tariffs[0]['tariff'];
                        }
                        else{
                            $d_extra_tariff = 0;
                        }
                    }
                    else if(!empty($season_tariff)){ 
                        
                            $room_tariffs = $Enquiry_model->getTourTariffDetails(6,$room_cat_id,$room_type,$season_tariff[0]['season_id'],$object_id,$mealplan);
                            if(!empty($room_tariffs)){
                                $d_room_tariff = $room_tariffs[0]['tariff'];
                            }
                            else{
                                $d_room_tariff = 0;
                            }

                            $child_tariffs = $Enquiry_model->getTourTariffDetailsChild(12,$room_cat_id,$room_type,$season_tariff[0]['season_id'],$object_id,$mealplan,1);
                            if(!empty($child_tariffs)){
                                $d_child_tariff = $child_tariffs[0]['tariff'];
                            }
                            else{
                                $d_child_tariff = 0;
                            }

                            $child_wb_tariffs = $Enquiry_model->getTourTariffDetailsChild(15,$room_cat_id,$room_type,$season_tariff[0]['season_id'],$object_id,$mealplan,2);
                            if(!empty($child_wb_tariffs)){
                                $d_child_wb_tariff = $child_wb_tariffs[0]['tariff'];
                            }
                            else{
                                $d_child_wb_tariff = 0;
                            }

                            $extra_tariffs = $Enquiry_model->getTourTariffDetailsChild(9,$room_cat_id,$room_type,$season_tariff[0]['season_id'],$object_id,$mealplan,3);
                            if(!empty($extra_tariffs)){
                                $d_extra_tariff = $extra_tariffs[0]['tariff'];
                            }
                            else{
                                $d_extra_tariff = 0;
                            }
                    }
                    else{
                        $room_tariffs = $Enquiry_model->getTourTariffDetailsBasic(5,$room_cat_id,$room_type,$object_id,$mealplan);
                        if(!empty($room_tariffs)){
                            $d_room_tariff = $d_room_tariff + $room_tariffs[0]['tariff'];
                        }
                        else{
                            $d_room_tariff = 0;
                        }

                        $child_tariffs = $Enquiry_model->getTourTariffDetailsChildBasic(11,$room_cat_id,$room_type,$object_id,$mealplan,1);
                        if(!empty($child_tariffs)){
                            $d_child_tariff = $d_child_tariff + $child_tariffs[0]['exclusive_tariff'];
                        }
                        else{
                            $d_child_tariff = 0;
                        }

                        $child_wb_tariffs = $Enquiry_model->getTourTariffDetailsChildBasic(11,$room_cat_id,$room_type,$object_id,$mealplan,2);
                        if(!empty($child_wb_tariffs)){
                            $d_child_wb_tariff = $d_child_wb_tariff + $child_wb_tariffs[0]['exclusive_tariff'];
                        }
                        else{
                            $d_child_wb_tariff = 0;
                        }

                        $extra_tariffs = $Enquiry_model->getTourTariffDetailsChildBasic(11,$room_cat_id,$room_type,$object_id,$mealplan,3);
                        if(!empty($extra_tariffs)){
                            $d_extra_tariff = $d_extra_tariff + $extra_tariffs[0]['exclusive_tariff'];
                        }
                        else{
                            $d_extra_tariff = 0;
                        }
                    }
            }

            if($single > 0){    
                $room_type = 1;
                    $weekend_tariff = $Enquiry_model->checkWeekendExist($tour_date,$object_id);
                    $season_tariff = $Enquiry_model->checkSeasonExist($tour_date,$object_id);
                    $s_room_tariff = 0;
                    $s_child_tariff = 0;
                    $s_child_wb_tariff = 0;
                    $s_extra_tariff = 0;
                    if(!empty($weekend_tariff)){
                        $s_room_tariffs = $Enquiry_model->getTourTariffDetails(7,$room_cat_id,$room_type,$weekend_tariff[0]['weekend_id'],$object_id,$mealplan);
                        if(!empty($s_room_tariffs)){
                            $s_room_tariff = $s_room_tariffs[0]['tariff'];
                        }
                        else{
                            $s_room_tariff = 0;
                        }

                        $s_child_tariffs = $Enquiry_model->getTourTariffDetailsChild(13,$room_cat_id,$room_type,$weekend_tariff[0]['weekend_id'],$object_id,$mealplan,1);
                        if(!empty($s_child_tariffs)){
                            $s_child_tariff = $s_child_tariffs[0]['tariff'];
                        }
                        else{
                            $s_child_tariff = 0;
                        }

                        $s_child_wb_tariffs = $Enquiry_model->getTourTariffDetailsChild(16,$room_cat_id,$room_type,$weekend_tariff[0]['weekend_id'],$object_id,$mealplan,2);
                        if(!empty($s_child_wb_tariffs)){
                            $s_child_wb_tariff = $s_child_wb_tariffs[0]['tariff'];
                        }
                        else{
                            $s_child_wb_tariff = 0;
                        }

                        $s_extra_tariffs = $Enquiry_model->getTourTariffDetailsChild(10,$room_cat_id,$room_type,$weekend_tariff[0]['weekend_id'],$object_id,$mealplan,3);
                        if(!empty($s_extra_tariffs)){
                            $s_extra_tariff = $s_extra_tariffs[0]['tariff'];
                        }
                        else{
                            $s_extra_tariff = 0;
                        }
                    }
                    else if(!empty($season_tariff)){
                        $s_room_tariffs = $Enquiry_model->getTourTariffDetails(6,$room_cat_id,$room_type,$season_tariff[0]['season_id'],$object_id,$mealplan);
                        if(!empty($s_room_tariffs)){
                            $s_room_tariff = $s_room_tariffs[0]['tariff'];
                        }
                        else{
                            $s_room_tariff = 0;
                        }

                        $s_child_tariffs = $Enquiry_model->getTourTariffDetailsChild(12,$room_cat_id,$room_type,$season_tariff[0]['season_id'],$object_id,$mealplan,1);
                        if(!empty($s_child_tariffs)){
                            $s_child_tariff = $s_child_tariffs[0]['tariff'];
                        }
                        else{
                            $s_child_tariff = 0;
                        }

                        $s_child_wb_tariffs = $Enquiry_model->getTourTariffDetailsChild(15,$room_cat_id,$room_type,$season_tariff[0]['season_id'],$object_id,$mealplan,2);
                        if(!empty($s_child_wb_tariffs)){
                            $s_child_wb_tariff = $s_child_wb_tariffs[0]['tariff'];
                        }
                        else{
                            $s_child_wb_tariff = 0;
                        }

                        $s_extra_tariffs = $Enquiry_model->getTourTariffDetailsChild(9,$room_cat_id,$room_type,$season_tariff[0]['season_id'],$object_id,$mealplan,3);
                        if(!empty($s_extra_tariffs)){
                            $s_extra_tariff = $s_extra_tariffs[0]['tariff'];
                        }
                        else{
                            $s_extra_tariff = 0;
                        }

                    }
                    else{

                        $room_tariffs = $Enquiry_model->getTourTariffDetailsBasic(5,$room_cat_id,$room_type,$object_id,$mealplan);
                        if(!empty($room_tariffs)){
                            $s_room_tariff = $s_room_tariff + $room_tariffs[0]['tariff'];
                        }
                        else{
                            $s_room_tariff = 0;
                        }

                        $child_tariffs = $Enquiry_model->getTourTariffDetailsChildBasic(11,$room_cat_id,$room_type,$object_id,$mealplan,1);
                        if(!empty($child_tariffs)){
                            $s_child_tariff = $s_child_tariff + $child_tariffs[0]['exclusive_tariff'];
                        }
                        else{
                            $s_child_tariff = 0;
                        }

                        $child_wb_tariffs = $Enquiry_model->getTourTariffDetailsChildBasic(11,$room_cat_id,$room_type,$object_id,$mealplan,2);
                        if(!empty($child_wb_tariffs)){
                            $s_child_wb_tariff = $s_child_wb_tariff + $child_wb_tariffs[0]['exclusive_tariff'];
                        }
                        else{
                            $s_child_wb_tariff = 0;
                        }

                        $extra_tariffs = $Enquiry_model->getTourTariffDetailsChildBasic(11,$room_cat_id,$room_type,$object_id,$mealplan,3);
                        if(!empty($extra_tariffs)){
                            $s_extra_tariff = $s_extra_tariff + $extra_tariffs[0]['exclusive_tariff'];
                        }
                        else{
                            $s_extra_tariff = 0;
                        }
                    }
                
            }
            $tariff_det['tour_date']=$tour_date;
            $tariff_det['d_room_tariff']=$d_room_tariff;
            $tariff_det['d_child_tariff']=$d_child_tariff;
            $tariff_det['d_child_wb_tariff']=$d_child_wb_tariff;
            $tariff_det['d_extra_tariff']=$d_extra_tariff;

            $tariff_det['s_room_tariff']=$s_room_tariff;
            $tariff_det['s_child_tariff']=$s_child_tariff;
            $tariff_det['s_child_wb_tariff']=$s_child_wb_tariff;
            $tariff_det['s_extra_tariff']=$s_extra_tariff;
            }
            else{
                $tariff_det['tour_date']=0;
                $tariff_det['d_room_tariff']=0;
                $tariff_det['d_child_tariff']=0;
                $tariff_det['d_child_wb_tariff']=0;
                $tariff_det['d_extra_tariff']=0;

                $tariff_det['s_room_tariff']=0;
                $tariff_det['s_child_tariff']=0;
                $tariff_det['s_child_wb_tariff']=0;
                $tariff_det['s_extra_tariff']=0;
            }
            return $tariff_det;
        }
        else{
            return redirect()->to('Login');
        }
    }
    public function cost_list_view()
    {
        if (!empty(session()->get('user_id'))) {
            $Enquiry_model = new Enquiry_m();
            $data = $Enquiry_model->cost_list_view($this->request->getPost());
            echo json_encode($data);
        }
        else{
            return redirect()->to('Login');
        }
    }
    public function get_sales_report_data()
    {
        if (!empty(session()->get('user_id'))) {
            $Enquiry_model = new Enquiry_m();
            $data = $Enquiry_model->get_sales_report_data($this->request->getPost());
            echo json_encode($data);
        }
        else{
            return redirect()->to('Login');
        }
    }
    public function get_payment_tracker_data()
    {
        if (!empty(session()->get('user_id'))) {
            $Enquiry_model = new Enquiry_m();
            $data = $Enquiry_model->get_payment_tracker_data($this->request->getPost());
            echo json_encode($data);
        }
        else{
            return redirect()->to('Login');
        }
    }
    //nj//
        public function get_advanced_payment_tracker_data()
    {
        if (!empty(session()->get('user_id'))) {
            $Enquiry_model = new Enquiry_m();
            $data = $Enquiry_model->get_advanced_payment_tracker_data($this->request->getPost());
            echo json_encode($data);
        }
        else{
            return redirect()->to('Login');
        }
    }
    //
    public function get_sales_report_new_data()
    {
        if (!empty(session()->get('user_id'))) {
            $Enquiry_model = new Enquiry_m();
            $data = $Enquiry_model->get_sales_report_new_data($this->request->getPost());
            echo json_encode($data);
        }
        else{
            return redirect()->to('Login');
        }
    }
    public function payment_list_view()
    {
        if (!empty(session()->get('user_id'))) {
            $Enquiry_model = new Enquiry_m();
            $data = $Enquiry_model->payment_list_view($this->request->getPost());
            echo json_encode($data);
        }
        else{
            return redirect()->to('Login');
        }
    }
    public function proforma_list_view()
    {
        if (!empty(session()->get('user_id'))) {
            $Enquiry_model = new Enquiry_m();
            $data = $Enquiry_model->proforma_list_view($this->request->getPost());
            echo json_encode($data);
        }
        else{
            return redirect()->to('Login');
        }
    }
    public function latest_payment_list_view()
    {
        if (!empty(session()->get('user_id'))) {
            $Enquiry_model = new Enquiry_m();
            $data = $Enquiry_model->latest_payment_list_view($this->request->getPost());
            echo json_encode($data);
        }
        else{
            return redirect()->to('Login');
        }
    }
    public function payment_history_view()
    {
        if (!empty(session()->get('user_id'))) {
            $Enquiry_model = new Enquiry_m();
            $data = $Enquiry_model->payment_history_view($this->request->getPost());
            echo json_encode($data);
        }
        else{
            return redirect()->to('Login');
        }
    }
    public function get_all_enquiry_foredit()
    {
        if (!empty(session()->get('user_id'))) {
            $Enquiry_model = new Enquiry_m();
            
            $object_id = $this->request->getPost('object_id');
            $object_class_id = $this->request->getPost('object_class_id');
            $guest_name = $this->request->getPost('guest_name');
            //$enq_det['enq_det'] = $Enquiry_model->get_all_enquiry_foredit($object_id);
            $enq_header_ids = $Enquiry_model->get_enquiry_header_id($object_id);
            $enq_header_id = $enq_header_ids[0]['enquiry_header_id'];
            $enq_det['enquiry_details'] = $Enquiry_model->get_all_enquiry_details($enq_header_id);
            $enq_det['enquiry_header_details'] = $Enquiry_model->get_all_enquiry_header_details($object_id);
            $enq_det['object_id'] = $object_id;
            $enq_det['object_class_id'] = $object_class_id;
            $enq_det['guest_name'] = $guest_name;
           

            echo view('enquiry/enquiry_edit_view', $enq_det);
        }
        else{
            return redirect()->to('Login');
        }
    }

    public function ajax_get_tourplans()
    {
        $enquiry_details_id = $this->request->getPost('enquiry_details_id');
        $object_id = $this->request->getPost('object_id');
        $status_id = $this->request->getPost('sid');
        $Enquiry_model = new Enquiry_m();
        $tour_plans = $Enquiry_model->get_all_tourplan_byid($enquiry_details_id);
        if (!empty($tour_plans)) {
            if($status_id == 1){
                $first = array_shift($tour_plans);
                $active = $first['is_active'] == 1;
                $created_date = date("d-m-Y h:i A", strtotime($first['updated_time']));
                echo '<div class="item-block">';
                echo '<a href="#" class="tour-item" data-sid="1" data-id="'.$first['extension_ref_id'].'" style="color:'.($active ? '#003300' : '#339966').'">';
                echo $active ? 'Current '.$created_date : 'Previous '.$created_date;
                echo '</a>';
                if ($active) {
                    echo '<a href="'.site_url("Enquiry/tour_plan/{$object_id}/{$enquiry_details_id}").'" title="Tour Plan Edit"><i style="color:#003300;" class="fa fa-edit edit-icon"></i></a>';
                    echo '<div class="item-block">';
                        echo '<h6 style="font-weight: bold;font-style: italic;color:#cc0099;">View <a class="tour_view_edit" data-id-ext="'.$first['extension_ref_id'].'" data-id-object="'.$object_id.'" data-id-head="'.$first['enquiry_header_id'].'" data-id-det="'.$first['enquiry_details_id'].'" data-toggle="tooltip" data-original-title="Tour Plan View" href="#"><i class="fa fa-eye" style="color:#006600"></i></a></h6>';
                    echo '</div>';
                }
                echo '</div>';

                // Show More / Show Less Toggle if there are more
                if (count($tour_plans) > 0) {
                    echo '<div id="tour-toggle-wrapper">';
                    echo '<div id="toggle-tour-buttons" style="margin-top:5px;">';
                    echo '<a href="#" id="show-more-tour" style="font-size: 13px; font-weight:bold;">+ Show Previous Tour Plans</a>';
                    echo '<a href="#" id="show-less-tour" style="font-size: 13px; font-weight:bold; display:none;">– Hide Previous Tour Plans</a>';
                    echo '</div>';
                    echo '</div>';

                    echo '<div id="more-tour-plans" style="display:none;">';
                    foreach ($tour_plans as $tour) {
                        $cr_date = date("d-m-Y h:i A", strtotime($tour['updated_time']));
                        echo '<div class="item-block">';
                        echo '<a href="#" class="tour-item" data-sid="0" data-id="'.$tour['extension_ref_id'].'" style="color:#003366">Previous '.$cr_date.'</a>';
                            echo '<div class="item-block">';
                                echo '<h6 style="font-weight: bold;font-style: italic;color:#cc0099;">View <a class="tour_view_edit" data-id-ext="'.$tour['extension_ref_id'].'" data-id-object="'.$object_id.'" data-id-head="'.$tour['enquiry_header_id'].'" data-id-det="'.$tour['enquiry_details_id'].'" data-toggle="tooltip" data-original-title="Tour Plan View" href="#"><i class="fa fa-eye" style="color:#006600"></i></a></h6>';
                            echo '</div>';
                        echo '</div>';
                    }
                    echo '</div>';
                }
            }
            else{
                echo '<div>';
                    foreach ($tour_plans as $tour) {
                        $cr_date = date("d-m-Y h:i A", strtotime($tour['updated_time']));
                        echo '<div class="item-block">';
                        echo '<a href="#" class="tour-item" data-sid="0" data-id="'.$tour['extension_ref_id'].'" style="color:#003366">Previous '.$cr_date.'</a>';
                            echo '<div class="item-block">';
                                echo '<h6 style="font-weight: bold;font-style: italic;color:#cc0099;">View <a class="tour_view_edit" data-id-ext="'.$tour['extension_ref_id'].'" data-id-object="'.$object_id.'" data-id-head="'.$tour['enquiry_header_id'].'" data-id-det="'.$tour['enquiry_details_id'].'" data-toggle="tooltip" data-original-title="Tour Plan View" href="#"><i class="fa fa-eye" style="color:#006600"></i></a></h6>';
                            echo '</div>';
                        echo '</div>';
                    }
                echo '</div>';
            }
        }
        else{
            echo '<div class="item-block">';
                echo '<h6 style="font-size: 13px; font-weight:bold;font-style: italic;color:#ff3399">Tour plan not created yet</h6>';
            echo '</div>';
        }
    }

    public function ajax_get_itineraries()
    {
        $tour_id = $this->request->getPost('tour_id');
        $status_id = $this->request->getPost('sid');
        $object_id = $this->request->getPost('object_id');
        $Enquiry_model = new Enquiry_m();
        $itineraries = $Enquiry_model->get_all_itinerary_byid($tour_id);
        if (!empty($itineraries)) {
            if($status_id == 1){
                $first = array_shift($itineraries);
                $is_active = $first['is_active'] == 1;
                $is_draft = $first['is_draft'] == 1;
                $created_date = $first['cs_name']."-".date("d-m-Y h:i A", strtotime($first['updated_time']));
                $ext = $Enquiry_model->getExtensionDetailsforItinerary($first['extension_ref_id']);
                $ext_all = $Enquiry_model->get_all_extensions_byid($first['extension_ref_id']);
                if(count($ext_all) > 1){
                $cs_status = 2;
                }
                else if(count($ext_all) == 1){
                    $cs_status = 1;
                }
                else{
                    $cs_status = 0;
                }
                echo '<div class="item-block">';
                echo '<a href="#" class="iti-item" data-sid="1" data-id="'.$first['extension_ref_id'].'" style="color:'.($is_active&&$is_draft ? '#003300' : '#339966').'">';
                echo $is_active&&$is_draft ? $created_date : $created_date;
               
                echo '</a>';
                if ($is_active&&$is_draft) {
                    if(!empty($ext)){
                        echo '&nbsp;<a href="'.site_url("Enquiry/itinerary/{$ext[0]['object_id']}/0/{$ext[0]['enquiry_detail_details_id']}/{$ext[0]['version_count']}").'" title="Itinerary Edit"><i style="color:#003300;" class="fa fa-edit edit-icon"></i></a>';
                        echo '&nbsp;&nbsp;<a href="'.site_url("Enquiry/itinerary/{$object_id}/0").'" target="_blank" title="Itinerary View"><i style="color:#003300;" class="fa fa-eye"></i></a>';
                        if($cs_status == 1){
                            echo '<div class="item-block">';
                                echo '<h6 style="font-weight: bold;font-style: italic;color:#cc0099;">Total Cost : '.$ext[0]['tpc'].' <a href="" class="view_cost_sheet_edit" data-did="'.$ext[0]['enquiry_ref_id'].'" data-tid="'.$ext[0]['tour_plan_ref_id'].'" data-eid="'.$ext[0]['extension_ref_id'].'" data-id="'.$ext[0]['enquiry_detail_details_id'].'"><i class="fa fa-eye" style="color:rgb(7, 138, 2); padding-right:10px;" type="button" title="Costing Sheet"></i></a></h6>';
                            echo '</div>';
                        }
                    }
                    else{
                        $ext_temp = $Enquiry_model->getExtensionDetailsforItinerarynext($first['extension_ref_id']);
                        echo '<div class="item-block">';
                            echo '<h6 style="font-size: 13px; font-weight:bold;font-style: italic;color:#ff3399">Current Itinerary Not Completed</h6>';
                            echo '<a style="font-size: 13px; font-weight:bold;font-style: italic;" href="'.site_url("Enquiry/itinerary/{$ext_temp[0]['object_id']}/0/{$ext_temp[0]['enquiry_detail_details_id']}/{$ext_temp[0]['version_count']}").'" title="Itinerary Edit">Go to Itinerary <i class="fa fa-arrow-right"></i></a>';
                        echo '</div>';
                    }
                }
                else{
                    if(!empty($ext)){
                        echo '<h6 style="font-weight: bold;font-style: italic;color:#cc0099;">Total Cost : '.$ext[0]['tpc'].' <a href="" class="view_cost_sheet_edit" data-did="'.$ext[0]['enquiry_ref_id'].'" data-tid="'.$ext[0]['tour_plan_ref_id'].'" data-eid="'.$ext[0]['extension_ref_id'].'" data-id="'.$ext[0]['enquiry_detail_details_id'].'"><i class="fa fa-eye" style="color:rgb(7, 138, 2); padding-right:10px;" type="button" title="Costing Sheet"></i></a></h6>';
                    }
                }
                echo '</div>';

                if (!empty($itineraries)) {
                    echo '<div id="iti-toggle-wrapper">';
                    echo '<div id="toggle-iti-buttons" style="margin-top:5px;">';
                    echo '<a href="#" id="show-more-iti" style="font-size: 13px; font-weight:bold;">+ Show Previous Itineraries</a>';
                    echo '<a href="#" id="show-less-iti" style="font-size: 13px; font-weight:bold; display:none;">– Hide Previous Itineraries</a>';
                    echo '</div>';
                    echo '</div>';

                    echo '<div id="more-itineraries" style="display:none;">';
                    foreach ($itineraries as $iti) {
                        $ext1 = $Enquiry_model->getExtensionDetailsforItinerarynext($iti['extension_ref_id']);
                        $ext_all1 = $Enquiry_model->get_all_extensions_byid($iti['extension_ref_id']);
                        if(count($ext_all1) > 1){
                            $cs_status1 = 2;
                        }
                        else if(count($ext_all1) == 1){
                            $cs_status1 = 1;
                        }
                        else{
                            $cs_status1 = 0;
                        }
                        $cr_date = $iti['cs_name']."-".date("d-m-Y h:i A", strtotime($iti['updated_time']));
                        echo '<div class="item-block">';
                        echo '<a href="#" class="iti-item" data-sid="0" data-id="'.$iti['extension_ref_id'].'" style="color:#003366;">'.$cr_date.'</a>';
                        if(!empty($ext1)){
                            echo '<a href="'.site_url("Enquiry/itinerary/{$ext1[0]['object_id']}/0/{$ext1[0]['enquiry_detail_details_id']}/{$ext1[0]['version_count']}/0").'" title="Itinerary Edit" onclick="return confirm(\'If you edit this itinerary, it will become the current itinerary. Are you sure you want to continue?\')"><i style="color:#003300;" class="fa fa-edit edit-icon"></i></a>';
                            echo '&nbsp;&nbsp;<a href="'.site_url("Enquiry/itinerary/{$object_id}/0").'" target="_blank" title="Itinerary View"><i style="color:#003300;" class="fa fa-eye"></i></a>';
                        }
                        echo '</div>';
                        if($cs_status1 == 1){
                            echo '<div class="item-block">';
                            if(!empty($ext1)){
                                echo '<h6 style="font-weight: bold;font-style: italic;color:#cc0099;">Total Cost : '.$ext1[0]['tpc'].' <a href="" class="view_cost_sheet_edit" data-did="'.$ext1[0]['enquiry_ref_id'].'" data-tid="'.$ext1[0]['tour_plan_ref_id'].'" data-eid="'.$ext1[0]['extension_ref_id'].'" data-id="'.$ext1[0]['enquiry_detail_details_id'].'"><i class="fa fa-eye" style="color:rgb(7, 138, 2); padding-right:10px;" type="button" title="Costing Sheet"></i></a></h6>';
                            }
                            echo '</div>';
                        }
                    }
                    echo '</div>';
                }
            }
            else{
                echo '<div>';
                    foreach ($itineraries as $iti) {
                        $ext1 = $Enquiry_model->getExtensionDetailsforItinerarynext($iti['extension_ref_id']);
                        $ext_all1 = $Enquiry_model->get_all_extensions_byid($iti['extension_ref_id']);
                        if(count($ext_all1) > 1){
                            $cs_status1 = 2;
                        }
                        else if(count($ext_all1) == 1){
                            $cs_status1 = 1;
                        }
                        else{
                            $cs_status1 = 0;
                        }
                        $cr_date = $iti['cs_name']."-".date("d-m-Y h:i A", strtotime($iti['updated_time']));
                        echo '<div class="item-block">';
                        echo '<a href="#" class="iti-item" data-sid="0" data-id="'.$iti['extension_ref_id'].'" style="color:#003366;">Previous '.$cr_date.'</a>';
                        if(!empty($ext1)){
                            echo '<a href="'.site_url("Enquiry/itinerary/{$ext1[0]['object_id']}/0/{$ext1[0]['enquiry_detail_details_id']}/{$ext1[0]['version_count']}/0").'" title="Itinerary Edit" onclick="return confirm(\'If you edit this itinerary, it will become the current itinerary. Are you sure you want to continue?\')"><i style="color:#003300;" class="fa fa-edit edit-icon"></i></a>';
                            echo '&nbsp;&nbsp;<a href="'.site_url("Enquiry/itinerary/{$object_id}/0").'" target="_blank" title="Itinerary View"><i style="color:#003300;" class="fa fa-eye"></i></a>';
                        }
                        echo '</div>';
                        if($cs_status1 == 1){
                            echo '<div class="item-block">';
                            if(!empty($ext1)){
                                echo '<h6 style="font-weight: bold;font-style: italic;color:#cc0099;">Total Cost : '.$ext1[0]['tpc'].' <a href="" class="view_cost_sheet_edit" data-did="'.$ext1[0]['enquiry_ref_id'].'" data-tid="'.$ext1[0]['tour_plan_ref_id'].'" data-eid="'.$ext1[0]['extension_ref_id'].'" data-id="'.$ext1[0]['enquiry_detail_details_id'].'"><i class="fa fa-eye" style="color:rgb(7, 138, 2); padding-right:10px;" type="button" title="Costing Sheet"></i></a></h6>';
                            }
                            echo '</div>';
                        }
                    }
                echo '</div>';
            }
        }
        else{
            echo '<div class="item-block">';
                echo '<h6 style="font-size: 13px; font-weight:bold;font-style: italic;color:#ff3399">Itinerary not created yet</h6>';
            echo '</div>';
        }
    }

    public function ajax_get_extensions()
    {
        $extension_ref_id = $this->request->getPost('iti_id');
        $Enquiry_model = new Enquiry_m();
        $ext = $Enquiry_model->get_all_extensions_byid($extension_ref_id);
        if(count($ext) > 1){
            $cs_status = 2;
          }
          else if(count($ext) == 1){
              $cs_status = 1;
          }
          else{
              $cs_status = 0;
          }
        if($cs_status == 1){
            if($ext[0]['is_active'] == 1){
                echo '<a href="'.site_url("Enquiry/itinerary/{$ext[0]['object_id']}/0/{$ext[0]['enquiry_detail_details_id']}/0/{$ext[0]['extension_ref_id']}").'" title="Extension Edit"><i style="color:#003300;" class="fa fa-edit edit-icon"></i></a>';
            }
        }
        else if ($cs_status == 2) {
            // Output the first (current or latest) tour plan
            $first = array_shift($ext);
            $active = $first['is_active'] == 1;
            $created_date = date("d-m-Y h:i A", strtotime($first['created_date']));
            echo '<div class="item-block">';
            echo '<a href="#" class="ext-item" data-id="'.$first['enquiry_detail_details_id'].'" style="color:'.($active ? '#003300' : '#339966').'">';
            echo $active ? 'Current '.$created_date : 'Previous '.$created_date;
            echo '</a>';
            if ($active) {
                echo '<a href="'.site_url("Enquiry/itinerary/{$first['object_id']}/0/{$first['enquiry_detail_details_id']}/0/{$first['extension_ref_id']}").'" title="Extension Edit"><i style="color:#003300;" class="fa fa-edit edit-icon"></i></a>';
                
            }
            echo '</div>';
            echo '<div class="item-block">';
                echo '<h6 style="font-weight: bold;font-style: italic;color:#cc0099;">Total Cost : '.$first['tpc'].' <a href="" class="view_cost_sheet" data-did="'.$first['enquiry_ref_id'].'" data-tid="'.$first['tour_plan_ref_id'].'" data-eid="'.$first['extension_ref_id'].'" data-id="'.$first['enquiry_detail_details_id'].'"><i class="fa fa-eye" style="color:rgb(7, 138, 2); padding-right:10px;" type="button" title="Costing Sheet"></i></a></h6>';
            echo '</div>';
            // Show More / Show Less Toggle if there are more
            if (count($ext) > 0) {
                echo '<div id="tour-toggle-wrapper">';
                echo '<div id="toggle-tour-buttons" style="margin-top:5px;">';
                echo '<a href="#" id="show-more-tour" style="font-size: 13px; font-weight:bold;">+ Show Previous Extensions</a>';
                echo '<a href="#" id="show-less-tour" style="font-size: 13px; font-weight:bold; display:none;">– Hide Previous Extensions</a>';
                echo '</div>';
                echo '</div>';

                echo '<div id="more-tour-plans" style="display:none;">';
                foreach ($ext as $exts) {
                    $cr_date = date("d-m-Y h:i A", strtotime($exts['created_date']));
                    echo '<div class="item-block">';
                    echo '<a href="#" class="ext-item" data-id="'.$exts['enquiry_detail_details_id'].'" style="color:#003366">Previous '.$cr_date.'</a>';
                    echo '</div>';
                    echo '<div class="item-block">';
                        echo '<h6 style="font-weight: bold;font-style: italic;color:#cc0099;">Total Cost : '.$exts['tpc'].' <a href="" class="view_cost_sheet" data-did="'.$exts['enquiry_ref_id'].'" data-tid="'.$exts['tour_plan_ref_id'].'" data-eid="'.$exts['extension_ref_id'].'" data-id="'.$exts['enquiry_detail_details_id'].'"><i class="fa fa-eye" style="color:rgb(7, 138, 2); padding-right:10px;" type="button" title="Costing Sheet"></i></a></h6>';
                    echo '</div>';
                }
                echo '</div>';
            }
        }
    }

    public function ajax_get_enquiry_details()
    {
        $enquiry_header_id = $this->request->getPost('enquiry_header_id');
        $object_class_id = $this->request->getPost('object_class_id');
        $object_id = $this->request->getPost('object_id');
   
        $Enquiry_model = new Enquiry_m();
        $itinerary_details = $Enquiry_model->get_all_enquiry_details($enquiry_header_id);

        if (!empty($itinerary_details)) {
            // Output the first enquiry detail
            $first = array_shift($itinerary_details);
            $active = $first['is_active'] == 1;
            $created_date = date("d-m-Y h:i A", strtotime($first['created_date']));
            echo '<div class="item-block">';
            echo '<a href="#" class="enquiry-item" data-sid="1" data-id="'.$first['extension_ref_id'].'" style="color:'.($active ? '#003300' : '#339966').'">';
            echo $active ? 'Current '.$created_date : 'Previous '.$created_date;
            echo '</a>';
            if ($active) {
                echo '<a href="'.site_url("Enquiry/add_object_enquiry/{$object_class_id}/{$object_id}").'" title="Enquiry Details Edit"><i style="color:#003300;" class="fa fa-edit edit-icon"></i></a>';
                echo '<div class="item-block">';
                    echo '<h6 style="font-weight: bold;font-style: italic;color:#cc0099;">View <a class="enquiry_view_edit" data-id-object="'.$object_id.'" data-id-det="'.$first['enquiry_details_id'].'" data-toggle="tooltip" data-original-title="Enquiry View" href=""><i class="fa fa-eye" style="color:#006600"></i></a></h6>';
                echo '</div>';
            }
            echo '</div>';

            // Add show more toggle button
            if (count($itinerary_details) > 0) {
                echo '<div id="show-more-wrapper">';
                    echo '<div id="toggle-ed-buttons" style="margin-top:5px;">';
                    echo '<a href="#" id="show-more-ed" style="font-size: 13px; font-weight:bold;display:inline-block;">+ Show Previous Enquiry Details</a>';
                    echo '<a href="#" id="show-less-ed" style="font-size: 13px; font-weight:bold;display:none;">– Hide Previous Enquiry Details</a>';
                    echo '</div>';
                echo '</div>';
                
                // Wrap the rest in a hidden container
                echo '<div id="more-enquiry-details" style="display:none;">';
                foreach ($itinerary_details as $itinerary_detail) {
                    $cr_date = date("d-m-Y h:i A", strtotime($itinerary_detail['created_date']));
                    echo '<div class="item-block">';
                    echo '<a href="#" class="enquiry-item" data-sid="0" data-id="'.$itinerary_detail['extension_ref_id'].'" style="color:#003366">Previous '.$cr_date.'</a>';
                        echo '<div class="item-block">';
                            echo '<h6 style="font-weight: bold;font-style: italic;color:#cc0099;">View <a class="enquiry_view_edit" data-id-object="'.$object_id.'" data-id-det="'.$itinerary_detail['enquiry_details_id'].'" data-toggle="tooltip" data-original-title="Enquiry View" href=""><i class="fa fa-eye" style="color:#006600"></i></a></h6>';
                        echo '</div>';
                    echo '</div>';
                }
                echo '</div>';
            }
        }
        else{
            echo '<div class="item-block">';
                echo '<h6 style="font-size: 13px; font-weight:bold;font-style: italic;color:#ff3399">Enquiry Details not created yet</h6>';
            echo '</div>';
        }
        
    }

    public function updateConfirmHotelFinal()
    {
        $Enquiry_model = new Enquiry_m();
        $user_id = session('user_id');
        date_default_timezone_set('Asia/Kolkata');
        $updated_time = date('Y-m-d H:i:s');
        $enquiry_header_id = $this->request->getPost('enquiry_header_id');
        $er_det = $Enquiry_model->getEditRequestDetails($enquiry_header_id);
        $cut_off_date = $this->request->getPost('cut_off_date');
        $confirm_cs_id = $this->request->getPost('confirm_cs_id');
        $ext_det = $Enquiry_model->getExtensionDetailsbyid($confirm_cs_id);   
            $c_data = array(
                'cut_off_date' => $cut_off_date
            );
            $c_update = $Enquiry_model->update_cut_off_date($c_data,$enquiry_header_id);  
            if($c_update){
                $is_exist = $Enquiry_model->is_status_check_exist($enquiry_header_id,16);
                if(empty($is_exist)){
                    $status_det = $Enquiry_model->getstatusDetails($enquiry_header_id,13);                
                    $status_data = array(
                        'object_id' => $ext_det[0]['object_id'],
                        'enquiry_header_id' => $enquiry_header_id,
                        'current_status_id' => 16,
                        'updated_time' => $updated_time,
                        'assigned_to' => $status_det[0]['assigned_to'],
                        'assigned_status' => 1,
                        'edit_request_id' => $er_det[0]['enquiry_edit_request_id'],
                        'updated_by' => $user_id,
                        'enterprise_id' => 1                            
                    );
                    $status_insert = $Enquiry_model->insertEnquirystatus($status_data);

                    $is_top_confirmed = $Enquiry_model->is_status_check_exist($enquiry_header_id,15);
                    if(!empty($is_top_confirmed)){
                        $booked_status_data = array(
                            'object_id' => $ext_det[0]['object_id'],
                            'enquiry_header_id' => $enquiry_header_id,
                            'current_status_id' => 17,
                            'updated_time' => $updated_time,
                            'assigned_to' => $status_det[0]['assigned_to'],
                            'assigned_status' => 1,
                            'edit_request_id' => $er_det[0]['enquiry_edit_request_id'],
                            'updated_by' => $user_id,
                            'enterprise_id' => 1                            
                        );
                        $booked_status_insert = $Enquiry_model->insertEnquirystatus($booked_status_data);
                    }
                    echo 1;
                }
                else{
                    echo 0;
                }
            }
    }
    public function finalTransportConfirm()
    {
        $Enquiry_model = new Enquiry_m();
        $user_id = session('user_id');
        date_default_timezone_set('Asia/Kolkata');
        $updated_time = date('Y-m-d H:i:s');
        $enquiry_header_id = $this->request->getPost('enquiry_header_id');
        $er_det = $Enquiry_model->getEditRequestDetails($enquiry_header_id);
        $confirm_cs_id = $this->request->getPost('confirm_cs_id');
        $ext_det = $Enquiry_model->getExtensionDetailsbyid($confirm_cs_id);   
            
                $is_exist = $Enquiry_model->is_status_check_exist($enquiry_header_id,15);
                if(empty($is_exist)){
                    $status_det = $Enquiry_model->getstatusDetails($enquiry_header_id,14);                
                    $status_data = array(
                        'object_id' => $ext_det[0]['object_id'],
                        'enquiry_header_id' => $enquiry_header_id,
                        'current_status_id' => 15,
                        'updated_time' => $updated_time,
                        'assigned_to' => $status_det[0]['assigned_to'],
                        'assigned_status' => 1,
                        'edit_request_id' => $er_det[0]['enquiry_edit_request_id'],
                        'updated_by' => $user_id,
                        'enterprise_id' => 1                            
                    );
                    $status_insert = $Enquiry_model->insertEnquirystatus($status_data);

                    $is_sop_confirmed = $Enquiry_model->is_status_check_exist($enquiry_header_id,16);
                    if(!empty($is_sop_confirmed)){
                        $booked_status_data = array(
                            'object_id' => $ext_det[0]['object_id'],
                            'enquiry_header_id' => $enquiry_header_id,
                            'current_status_id' => 17,
                            'updated_time' => $updated_time,
                            'assigned_to' => $status_det[0]['assigned_to'],
                            'assigned_status' => 1,
                            'edit_request_id' => $er_det[0]['enquiry_edit_request_id'],
                            'updated_by' => $user_id,
                            'enterprise_id' => 1                            
                        );
                        $booked_status_insert = $Enquiry_model->insertEnquirystatus($booked_status_data);
                    }
                    echo 1;
                }
                else{
                    echo 0;
                }
    }
    public function get_vehicle_types_by_hub()
    {
        $Enquiry_model = new Enquiry_m();
        $hub_location_id = $this->request->getPost('hub_location_id');
        echo $Enquiry_model->getVehicleTypes($hub_location_id);
    }
    public function send_mail_function($from_email,$email_password,$to_email,$from_mobile,$user_designation,$subject,$content){
        $email = \Config\Services::email();
        $config['protocol'] = 'smtp';
        $config['SMTPHost'] = 'smtp.gmail.com';
        $config['SMTPUser'] = $from_email;
        $config['SMTPPass'] = $email_password;
        $config['SMTPPort'] = 465;
        $config['CRLF'] = "\r\n";
        $config['newline'] = "\r\n";
        $config['charset'] = 'UTF-8';
        $config['mailType'] = 'html';
        $config['mailPath'] = '/usr/sbin/sendmail';
        $config['SMTPTimeout'] = 30;
        $config['SMTPCrypto'] = 'ssl';

        $email->initialize($config);
        $email->setFrom($from_email, 'Touracle');
        $email->setTo($to_email);
        $email->setCC('');
        $email->setBCC('');
        $email->setSubject($subject);
        $email->setMessage($content);
        if ($email->send()) {
            $response = 'Email successfully sent';
        } else {
            var_dump($email->printDebugger(array('headers')));
            $err_msg = $email->printDebugger(['headers']);
            echo ($err_msg);
            $response = 'Email send failed';
        }
    }

    public function reminders()
    {
        if (!empty(session()->get('user_id'))) {
            $Dashboard_model = new Dashboard_m();
            $Enquiry_model = new Enquiry_m();
            $parent_id = session('parent_id');
            $hierarchy_id = session('hierarchy_id');
            $entity_id = session('user_id');
            $active_role = session('active_role');
            $all_systems = $Dashboard_model->get_all_systems($entity_id);
            $data['all_systems'] = $all_systems;
            $all_roles = $Dashboard_model->get_all_entity_roles($entity_id);
            if(!empty($all_roles)){
                $data['all_roles_assn'] = $all_roles;
                $all_menus = $Dashboard_model->get_all_role_menus($active_role);
                if(!empty($all_menus)){
                    $data['all_menus'] = $all_menus;
                }
                else{
                    $data['all_menus'] = [];
                }
                $all_permissions = $Dashboard_model->get_all_entity_permissions($active_role,3);
                if(!empty($all_permissions)){
                    $data['all_permissions'] = $all_permissions;
                }
                else{
                    $data['all_permissions'] = [];
                }
            }
            else{
                $data['all_roles_assn'] = [];
                $data['all_menus'] = [];
                $data['all_permissions'] = [];
            }
            $all_executives = $Dashboard_model->get_all_executives();
            $all_status = $Enquiry_model->get_all_status();
            $all_agents = $Enquiry_model->get_all_agents();
            $parent_menu = $Dashboard_model->get_parent_menus();
            $sub_menu = $Dashboard_model->get_sub_menus();
            $data['parent_menu'] = $parent_menu;
            $data['sub_menu'] = $sub_menu;
            $data['parent_id'] = $parent_id;
            $data['hierarchy_id'] = $hierarchy_id;
            $data['all_executives'] = $all_executives;
            $data['all_status'] = $all_status;
            $data['all_agents'] = $all_agents;
            return view('enquiry/reminders',$data);
        }
        else{
            return redirect()->to('Login');
        }    
    }
    public function reminder_customer_followup()
    {
        if (!empty(session()->get('user_id'))) {
            $Enquiry_model = new Enquiry_m();
            $data = $Enquiry_model->reminder_customer_followup($this->request->getPost());
            echo json_encode($data);
        }
        else{
            return redirect()->to('Login');
        }
    }
    public function reminder_pre_arrival()
    {
        if (!empty(session()->get('user_id'))) {
            $Enquiry_model = new Enquiry_m();
            $data = $Enquiry_model->reminder_pre_arrival($this->request->getPost());
            echo json_encode($data);
        }
        else{
            return redirect()->to('Login');
        }
    }
    public function reminder_departure()
    {
        if (!empty(session()->get('user_id'))) {
            $Enquiry_model = new Enquiry_m();
            $data = $Enquiry_model->reminder_departure($this->request->getPost());
            echo json_encode($data);
        }
        else{
            return redirect()->to('Login');
        }
    }
    public function reminder_arrival()
    {
        if (!empty(session()->get('user_id'))) {
            $Enquiry_model = new Enquiry_m();
            $data = $Enquiry_model->reminder_arrival($this->request->getPost());
            echo json_encode($data);
        }
        else{
            return redirect()->to('Login');
        }
    }
    public function reminder_driver()
    {
        if (!empty(session()->get('user_id'))) {
            $Enquiry_model = new Enquiry_m();
            $data = $Enquiry_model->reminder_driver($this->request->getPost());
            echo json_encode($data);
        }
        else{
            return redirect()->to('Login');
        }
    }
    public function reminder_hotel_reconfirm()
    {
        if (!empty(session()->get('user_id'))) {
            $Enquiry_model = new Enquiry_m();
            $data = $Enquiry_model->reminder_hotel_reconfirm($this->request->getPost());
            echo json_encode($data);
        }
        else{
            return redirect()->to('Login');
        }
    }
    public function send_hotel_confirmation_mail(){
        $Enquiry_model = new Enquiry_m();
        $user_id = session('user_id');
        $enquiry_header_id = $this->request->getPost('enquiry_header_id');
        $content = $this->request->getPost('cs_content');
        $to_mail = $this->request->getPost('to_mail');

            $guest_details = $Enquiry_model->get_enquiry_guest_details($enquiry_header_id);
            if(!empty($guest_details)){
                $ref_no = $guest_details[0]['ref_no'];
                $guest_name = $guest_details[0]['guest_name'];
            }
            else{
                $ref_no = "";
                $guest_name = "";
            }

        $user_details = $Enquiry_model->get_user_mail_details($user_id);
        $executive_name = $user_details[0]['entity_name'];
        $from_mails = json_decode($user_details[0]['entity_email'],true);
        $from_email = is_array($from_mails) && count($from_mails) > 0 ? $from_mails[0] : '';
        $from_mobiles = json_decode($user_details[0]['entity_mobile'],true);
        $from_mobile = is_array($from_mobiles) && count($from_mobiles) > 0 ? $from_mobiles[0] : '';
        $email_password = $user_details[0]['email_password']?$user_details[0]['email_password']:'';

        $user_designation = $user_details[0]['designation']?$user_details[0]['designation']:'';
        $subject = $guest_name.' | '.$ref_no;
                        
        if(!empty($to_mail) && !empty($from_email) && !empty($email_password)){
            $this->send_mail_function($from_email,$email_password,$to_mail,$from_mobile,$user_designation,$subject,$content);
            echo 1;
        }
        else{
            echo 0;
        }
    }
    public function send_transport_confirmation_mail(){
        $Enquiry_model = new Enquiry_m();
        $user_id = session('user_id');
        $enquiry_header_id = $this->request->getPost('enquiry_header_id');
        $content = $this->request->getPost('cs_content');
        $to_mail = $this->request->getPost('to_mail');

            $guest_details = $Enquiry_model->get_enquiry_guest_details($enquiry_header_id);
            if(!empty($guest_details)){
                $ref_no = $guest_details[0]['ref_no'];
                $guest_name = $guest_details[0]['guest_name'];
            }
            else{
                $ref_no = "";
                $guest_name = "";
            }

        $user_details = $Enquiry_model->get_user_mail_details($user_id);
        $executive_name = $user_details[0]['entity_name'];
        $from_mails = json_decode($user_details[0]['entity_email'],true);
        $from_email = is_array($from_mails) && count($from_mails) > 0 ? $from_mails[0] : '';
        $from_mobiles = json_decode($user_details[0]['entity_mobile'],true);
        $from_mobile = is_array($from_mobiles) && count($from_mobiles) > 0 ? $from_mobiles[0] : '';
        $email_password = $user_details[0]['email_password']?$user_details[0]['email_password']:'';

        $user_designation = $user_details[0]['designation']?$user_details[0]['designation']:'';
        $subject = $guest_name.' | '.$ref_no;
                        
        if(!empty($to_mail) && !empty($from_email) && !empty($email_password)){
            $this->send_mail_function($from_email,$email_password,$to_mail,$from_mobile,$user_designation,$subject,$content);
            echo 1;
        }
        else{
            echo 0;
        }
    }
}
