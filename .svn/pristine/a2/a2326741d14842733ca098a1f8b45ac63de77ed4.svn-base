<?php

namespace App\Controllers;

use App\Models\EnquiryFollowupModel;
use App\Models\CallFollowUpModel;
use App\Models\ArrivalFollowUpModel;
use App\Models\DepartureFollowUpModel;
use App\Models\Dashboard_m;
use CodeIgniter\Controller;

class Enwuiryfollowup extends Controller
{
    protected $enquiryModel;
    protected $callFollowUpModel;
    protected $ArrivalFollowUpModel;
    protected $DepartureFollowUpModel;
    protected $Dashboard_m;
    protected $db;

    public function __construct()
    {
        $this->enquiryModel           = new EnquiryFollowupModel();
        $this->callFollowUpModel      = new CallFollowUpModel();
        $this->ArrivalFollowUpModel   = new ArrivalFollowUpModel();
        $this->DepartureFollowUpModel = new DepartureFollowUpModel();
        $this->Dashboard_m = new Dashboard_m();
        $this->db                     = \Config\Database::connect();
    }

    // Display the list of enquiries
    public function index()
    {
        $Dashboard_model = new Dashboard_m();
        $entity_id = session('user_id');
        $active_role = session('active_role');
        $all_roles = $Dashboard_model->get_all_entity_roles($entity_id);
        $all_systems = $Dashboard_model->get_all_systems($entity_id);
        $data['all_systems'] = $all_systems;
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
        $parent_menu = $Dashboard_model->get_parent_menus();
        $sub_menu = $Dashboard_model->get_sub_menus();
        $data['parent_menu'] = $parent_menu;
        $data['sub_menu'] = $sub_menu;
        $data['enquiries'] = $this->enquiryModel->getEnquiries();
        return view('masters/enquiries_view', $data);
    }

    // AJAX endpoint to get followup types by enterprise_id
    public function getFollowupTypes()
    {
        $enterprise_id = $this->request->getPost('enterprise_id');
        $followupTypes = $this->enquiryModel->getActiveFollowupTypes($enterprise_id);
        return $this->response->setJSON($followupTypes);
    }

    // AJAX endpoint to get call follow-ups
    public function getCallFollowups()
    {
        $followupTypeId = $this->request->getPost('followupTypeId');
        $objectId       = $this->request->getPost('objectId');
        log_message('debug', 'getCallFollowups - Received object_id: ' . $objectId);

        $header = $this->db->table('khm_obj_enquiry_header')
            ->select('enquiry_header_id, enterprise_id')
            ->where('object_id', $objectId)
            ->get()
            ->getRowArray();

        if (!$header) {
            log_message('debug', 'getCallFollowups - Invalid object id: ' . $objectId);
            return $this->response->setJSON(['data' => []]);
        }

        $enquiryHeaderId = $header['enquiry_header_id'];
        $followups       = $this->callFollowUpModel->getFollowups($followupTypeId, $enquiryHeaderId);

        return $this->response->setJSON(['data' => $followups]);
    }

    // AJAX endpoint to insert or update a call follow-up record
    public function saveCallFollowup()
    {
        $followupTypeId = $this->request->getPost('followup_type_id');
        $objectId       = $this->request->getPost('object_id');
        $callStatus     = $this->request->getPost('call_status');
        $callTime       = $this->request->getPost('call_time');
        $comments       = $this->request->getPost('comments');
        $id             = $this->request->getPost('call_follow_up_id');

        log_message('debug', 'saveCallFollowup - POST data: ' . print_r($this->request->getPost(), true));

        $header = $this->db->table('khm_obj_enquiry_header')
            ->select('enquiry_header_id, enterprise_id')
            ->where('object_id', $objectId)
            ->get()
            ->getRowArray();

        if (!$header) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid object id']);
        }

        $enquiryHeaderId = $header['enquiry_header_id'];
        $enterpriseId    = $header['enterprise_id'];

        $data = [
            'followup_type_id'  => $followupTypeId,
            'enquiry_header_id' => $enquiryHeaderId,
            'call_status'       => $callStatus,
            'call_time'         => $callTime,
            'comments'          => $comments,
            'deleted'           => 0,
            'enterprise_id'     => $enterpriseId
        ];

        if ($id) {
            // update existing
            $success = $this->callFollowUpModel->update($id, $data);
        } else {
            // insert new
            $success = $this->callFollowUpModel->insert($data);
        }

        if ($success) {
            return $this->response->setJSON(['status' => 'success']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Could not save record']);
        }
    }

        /**
     * AJAX endpoint to update a call follow-up record (alias to saveCallFollowup).
     */
    public function updateCallFollowup()
    {
        // Simply delegate to saveCallFollowup which handles both insert and update
        return $this->saveCallFollowup();
    }

    // AJAX endpoint to delete a call follow-up record
    public function deleteCallFollowup()
    {
        $id     = $this->request->getPost('id');
        $result = $this->callFollowUpModel->softDelete($id);
        return $this->response->setJSON(['status' => $result ? 'success' : 'error']);
    }

    // AJAX endpoint to retrieve a single call follow-up record
    public function getCallFollowupById()
    {
        $id = $this->request->getPost('id');
        if (!$id) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Missing ID']);
        }

        $followup = $this->callFollowUpModel->find($id);
        if ($followup && $followup['deleted'] == 0) {
            return $this->response->setJSON($followup);
        }

        return $this->response->setJSON(['status' => 'error', 'message' => 'Record not found or deleted']);
    }

    /**
     * AJAX endpoint to retrieve arrival follow-ups.
     * Expects 'followupTypeId' and 'objectId' via POST.
     */
    public function getArrivalFollowups()
    {
        $followupTypeId = $this->request->getPost('followupTypeId');
        $objectId       = $this->request->getPost('objectId');

        // Debug log the received object id
        log_message('debug', 'getArrivalFollowups - Received object_id: ' . $objectId);

        // Retrieve the enquiry header record from khm_obj_enquiry_header
        $header = $this->db->table('khm_obj_enquiry_header')
            ->select('enquiry_header_id, enterprise_id')
            ->where('object_id', $objectId)
            ->get()
            ->getRowArray();

        if (!$header) {
            log_message('debug', 'getArrivalFollowups - Invalid object id: ' . $objectId);
            return $this->response->setJSON(['data' => []]);
        }

        $enquiryHeaderId = $header['enquiry_header_id'];
        $followups = $this->ArrivalFollowUpModel->getArrivalFollowUp($followupTypeId, $enquiryHeaderId);

        return $this->response->setJSON(['data' => $followups]);
    }

    /**
     * AJAX endpoint to save (insert/update) an arrival follow-up record.
     * Expects form data via POST.
     */
    public function saveArrivalFollowup()
    {
        // Retrieve POST data from form
        $followupTypeId = $this->request->getPost('followup_type_id');
        $objectId       = $this->request->getPost('object_id');
        $callDate       = $this->request->getPost('call_date');   // Expected as YYYY-MM-DD
        $callTime       = $this->request->getPost('call_time');   // Expected as HH:ii:ss (or HH:ii)
        $mode           = $this->request->getPost('mode');
        $city           = $this->request->getPost('city');
        $flightTrain    = $this->request->getPost('flight_train');
        $arrivalDate    = $this->request->getPost('arrival');     // Expected as YYYY-MM-DD
        $arrivalTime    = $this->request->getPost('time');        // Expected as HH:ii:ss (or HH:ii)
        $comments       = $this->request->getPost('comments');
    
        // Log POST data for debugging
        log_message('debug', 'saveArrivalFollowup - POST data: ' . print_r($this->request->getPost(), true));
    
        // Retrieve the enquiry header record
        $header = $this->db->table('khm_obj_enquiry_header')
            ->select('enquiry_header_id, enterprise_id')
            ->where('object_id', $objectId)
            ->get()
            ->getRowArray();
    
        if (!$header) {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Invalid object id'
            ]);
        }
    
        $enquiryHeaderId = $header['enquiry_header_id'];
        $enterpriseId    = $header['enterprise_id'];
    
        // Combine call date and time into a datetime string
        $callDatetime = date('Y-m-d H:i:s', strtotime($callDate . ' ' . $callTime));
        // Combine arrival date and time into a datetime string
        $arrivalDatetime = date('Y-m-d H:i:s', strtotime($arrivalDate . ' ' . $arrivalTime));
    
        // Prepare data array matching the model's allowed fields.
        $data = [
            'followup_type_id'   => $followupTypeId,
            'enquiry_header_id'  => $enquiryHeaderId,
            'call_date'          => $callDatetime,
            'mode_of_arrival'    => $mode,
            'city'               => $city,
            'flight_train_no'    => $flightTrain,
            'arrival_date'       => $arrivalDatetime,
            'comments'           => $comments,
            'deleted'            => 0,
            'enterprise_id'      => $enterpriseId
        ];
    
        // If updating an existing record, include its ID.
        $id = $this->request->getPost('arrival_follow_up_id');
        if ($id) {
            $data['arrival_follow_up_id'] = $id;
        }
    
        $result = $this->ArrivalFollowUpModel->saveArrivalFollowup($data);
    
        if ($result) {
            return $this->response->setJSON(['status' => 'success']);
        } else {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Could not save record'
            ]);
        }
    }

    /**
     * AJAX endpoint to retrieve a single arrival follow-up record by its ID.
     */
    public function getArrivalFollowupById()
    {
        $id = $this->request->getPost('id');

        if (!$id) {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Missing ID'
            ]);
        }

        $followup = $this->ArrivalFollowUpModel->find($id);

        if ($followup && $followup['deleted'] == 0) {
            return $this->response->setJSON($followup);
        } else {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Record not found or deleted'
            ]);
        }
    }

    /**
     * AJAX endpoint to soft-delete an arrival follow-up record.
     */
    public function deleteArrivalFollowup()
    {
        $id = $this->request->getPost('id');
        $result = $this->ArrivalFollowUpModel->softDelete($id);

        if ($result) {
            return $this->response->setJSON(['status' => 'success']);
        } else {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Could not delete record'
            ]);
        }
    }



    ///departure controller goes here 

    public function getDepartureFollowups()
    {
        $followupTypeId = $this->request->getPost('followupTypeId');
        $objectId       = $this->request->getPost('objectId');

        // Debug log the received object id
        log_message('debug', 'getDepartureFollowups - Received object_id: ' . $objectId);

        // Retrieve the enquiry header record from khm_obj_enquiry_header
        $header = $this->db->table('khm_obj_enquiry_header')
            ->select('enquiry_header_id, enterprise_id')
            ->where('object_id', $objectId)
            ->get()
            ->getRowArray();

        if (!$header) {
            log_message('debug', 'getDepartureFollowups - Invalid object id: ' . $objectId);
            return $this->response->setJSON(['data' => []]);
        }

        $enquiryHeaderId = $header['enquiry_header_id'];
        $followups = $this->DepartureFollowUpModel->getDepartureFollowups($followupTypeId, $enquiryHeaderId);

        return $this->response->setJSON(['data' => $followups]);
    }





    public function saveDepartureFollowup()
    {
        // Retrieve POST data from form
        $followupTypeId = $this->request->getPost('followup_type_id');
        $objectId       = $this->request->getPost('object_id');
        $callDate       = $this->request->getPost('call_date');   // Expected as YYYY-MM-DD
        $callTime       = $this->request->getPost('call_time');   // Expected as HH:ii:ss (or HH:ii)
        $mode           = $this->request->getPost('mode');
        $city           = $this->request->getPost('city');
        $flightTrain    = $this->request->getPost('flight_train');
        $departureDate    = $this->request->getPost('departure');     // Expected as YYYY-MM-DD
        $departureTime    = $this->request->getPost('time');        // Expected as HH:ii:ss (or HH:ii)
        $comments       = $this->request->getPost('comments');
    
        // Log POST data for debugging
        log_message('debug', 'saveDepartureFollowup - POST data: ' . print_r($this->request->getPost(), true));
    
        // Retrieve the enquiry header record
        $header = $this->db->table('khm_obj_enquiry_header')
            ->select('enquiry_header_id, enterprise_id')
            ->where('object_id', $objectId)
            ->get()
            ->getRowArray();
    
        if (!$header) {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Invalid object id'
            ]);
        }
    
        $enquiryHeaderId = $header['enquiry_header_id'];
        $enterpriseId    = $header['enterprise_id'];
    
        // Combine call date and time into a datetime string
        $callDatetime = date('Y-m-d H:i:s', strtotime($callDate . ' ' . $callTime));
        // Combine arrival date and time into a datetime string
        $departureDatetime = date('Y-m-d H:i:s', strtotime($departureDate . ' ' . $departureTime));
    
        // Prepare data array matching the model's allowed fields.
        $data = [
            'followup_type_id'   => $followupTypeId,
            'enquiry_header_id'  => $enquiryHeaderId,
            'call_date'          => $callDatetime,
            'mode_of_departure'    => $mode,
            'city'               => $city,
            'flight_train_no'    => $flightTrain,
            'departure_date'     => $departureDatetime,
            'comments'           => $comments,
            'deleted'            => 0,
            'enterprise_id'      => $enterpriseId
        ];
    
        // If updating an existing record, include its ID.
        $id = $this->request->getPost('departure_follow_up_id');
        if ($id) {
            $data['departure_follow_up_id'] = $id;
        }
    
        $result = $this->DepartureFollowUpModel->saveDepartureFollowup($data);
    
        if ($result) {
            return $this->response->setJSON(['status' => 'success']);
        } else {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Could not save record'
            ]);
        }
    }



    public function getDepartureFollowupById()
    {
        $id = $this->request->getPost('id');

        if (!$id) {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Missing ID'
            ]);
        }

        $followup = $this->DepartureFollowUpModel->find($id);

        if ($followup && $followup['deleted'] == 0) {
            return $this->response->setJSON($followup);
        } else {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Record not found or deleted'
            ]);
        }
    }

    /**
     * AJAX endpoint to soft-delete an arrival follow-up record.
     */
    public function deleteDepartureFollowup()
    {
        $id = $this->request->getPost('id');
        $result = $this->DepartureFollowUpModel->softDelete($id);

        if ($result) {
            return $this->response->setJSON(['status' => 'success']);
        } else {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Could not delete record'
            ]);
        }
    }


}
