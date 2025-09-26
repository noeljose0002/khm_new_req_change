<?php

namespace App\Controllers;

use App\Models\GeogModel;
use App\Models\Dashboard_m;
use CodeIgniter\RESTful\ResourceController;

class GeogLocation extends ResourceController
{
    protected $geogModel;

    protected $db;

    public function __construct()
    {
        // Initialize the database connection
        $this->db = \Config\Database::connect();
        $this->geogModel = new GeogModel();
    }
    // ===== Geography Endpoints =====

    // Main view (Geography listing).
    public function index()
    {
        $levels  = $this->geogModel->getLevels();
        $records = $this->geogModel->getAllGeogRecordsWithLevel();
        //return view('Geog_view', ['levels' => $levels, 'records' => $records]);
    }

    // Get geography levels (AJAX).
    public function getLevels()
    {
        $levels = $this->geogModel->getLevels();
        return $this->respond($levels);
    }

    // Insert a new geography record.
    public function insertGeog()
    {
        // Changed to getJSON(true) to properly receive JSON payload from AJAX call.
        $data = $this->request->getJSON(true);
        // or $data = $this->request->getPost(); depending on how you're submitting

        if (
            empty($data['geog_level_id'])
            || empty($data['enterprise_id'])
            || empty($data['geog_name'])
            || empty($data['geog_parent_id'])
        ) {
            return $this->failValidationErrors('geog_level_id, enterprise_id, geog_name, and geog_parent_id are required');
        }

        // Now $data['geog_parent_id'] should be available 
        // because we used a hidden (not disabled) field in the form.
        $insertId = $this->geogModel->insertGeogRecord($data);
        if ($insertId) {
            return $this->respond(['success' => true, 'message' => 'Record added successfully', 'insertId' => $insertId]);
        }
        return $this->failServerError('Error inserting record');
    }

    // Update an existing geography record.
    public function updateGeog($id = null)
    {
        $data = $this->request->getJSON(true);
        if (!$id) {
            return $this->failValidationErrors('No geog_id provided');
        }
        if (empty($data['enterprise_id']) || empty($data['geog_name'])) {
            return $this->failValidationErrors('enterprise_id and geog_name are required');
        }
        $update = $this->geogModel->updateGeogRecord($id, $data);
        if ($update) {
            return $this->respond(['success' => true, 'message' => 'Record updated successfully']);
        }
        return $this->failServerError('Update failed');
    }

    // Soft delete a geography record.
    public function deleteGeog($id = null)
    {
        if (!$id) {
            return $this->failValidationErrors('No geog_id provided');
        }
        $delete = $this->geogModel->deleteGeogRecord($id);
        if ($delete) {
            return $this->respond(['success' => true, 'message' => 'Record deleted successfully']);
        }
        return $this->failServerError('Deletion failed');
    }

    // Get all geography records.
    public function getGeogs()
    {
        $data = $this->geogModel->getAllGeogRecordsWithLevel();
        return $this->respond($data);
    }

    // Load the Edit Geography view.
    public function editView()
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
       
        $levels  = $this->geogModel->getLevels();
        $records = $this->geogModel->getAllGeogRecordsWithLevel();
        $data['levels']=$levels;
        $data['records']=$records;
        return view('masters/geog_location_view',$data);
    }

    // Load the Distance Calculator view.
    public function distanceView()
    {
        $levels  = $this->geogModel->getLevels();
        $records = $this->geogModel->getAllGeogRecordsWithLevel();
        return view('distance_view', ['levels' => $levels, 'records' => $records]);
    }

    // Save a calculated distance record.
    public function saveDistance()
    {
        $data = $this->request->getJSON(true);
        if (empty($data['geog_from_id']) || empty($data['geog_to_id']) || empty($data['geog_km_distance'])) {
            return $this->failValidationErrors('geog_from_id, geog_to_id, and geog_km_distance are required');
        }

        $fromRecord = $this->geogModel->getGeogById($data['geog_from_id']);
        $toRecord   = $this->geogModel->getGeogById($data['geog_to_id']);
        if (!$fromRecord || !$toRecord) {
            return $this->failValidationErrors('One or both of the selected locations are not present in the database. Please select valid locations.');
        }
        if (empty($fromRecord['geog_latitude']) || empty($fromRecord['geog_longitude'])) {
            return $this->failValidationErrors('The start location does not have complete location data.');
        }
        if (empty($toRecord['geog_latitude']) || empty($toRecord['geog_longitude'])) {
            return $this->failValidationErrors('The end location does not have complete location data.');
        }
        if (!isset($data['geog_km_distance']) || $data['geog_km_distance'] <= 0) {
            return $this->failValidationErrors('Please calculate a valid distance before saving.');
        }

        // Use the model's method to save the distance record.
        $result = $this->geogModel->saveDistanceRecord($data);
        if ($result === 'duplicate') {
            return $this->failServerError('Duplicate record - distance already exists.');
        } elseif ($result) {
            return $this->respond([
                'success' => true,
                'message' => 'Distance record saved successfully',
                'id'      => $result
            ]);
        }
        return $this->failServerError('Error saving distance record');
    }

    // Update an existing distance record.
    // If no record exists, this method will insert a new one.
    public function updateDistance()
    {
    
        $data = $this->request->getJSON(true);
        if (empty($data['geog_from_id']) || empty($data['geog_to_id']) || empty($data['geog_km_distance'])) {
            return $this->failValidationErrors('geog_from_id, geog_to_id, and geog_km_distance are required');
        }

        $result = $this->geogModel->updateDistanceRecord($data);
        if ($result === true) {
            return $this->respond(['success' => true, 'message' => 'Distance updated successfully']);
        } elseif ($result === 'not_found') {
            // No record exists; so save a new record instead.
            $insert = $this->geogModel->saveDistanceRecord($data);
            if ($insert === 'duplicate') {
                return $this->failServerError('Duplicate record - distance already exists.');
            } elseif ($insert) {
                return $this->respond(['success' => true, 'message' => 'Distance record saved successfully', 'id' => $insert]);
            }
            return $this->failServerError('Error saving distance record');
        } elseif ($result === 'duplicate') {
            return $this->failServerError('Duplicate record - distance already exists.');
        }
        return $this->failServerError('Error updating distance record');
    }

    // New: Get a distance record by from and to IDs.
    public function getDistance()
    {
        $fromId = $this->request->getGet('geog_from_id');
        $toId   = $this->request->getGet('geog_to_id');
        if (!$fromId || !$toId) {
            return $this->failValidationErrors('Both geog_from_id and geog_to_id are required');
        }
        $builder = $this->db->table('khm_loc_mst_geography_distance');
        // Retrieve all records for the combination (both orders)
        $builder->groupStart()
            ->where('geog_from_id', $fromId)
            ->where('geog_to_id', $toId)
            ->groupEnd()
            ->orGroupStart()
            ->where('geog_from_id', $toId)
            ->where('geog_to_id', $fromId)
            ->groupEnd();
        $records = $builder->get()->getResultArray();
        if ($records) {
            // Return the array of matching records.
            return $this->respond(['records' => $records]);
        }
        return $this->respond(['not_found' => true]);
    }

    // ===== Sightseeing Endpoints =====

    // Get sightseeing records for a specific location.
    public function getSightseeingByLocation($location_id = null)
    {
        if (!$location_id) {
            return $this->failValidationErrors('Location ID is required');
        }
        $records = $this->geogModel->getSightseeingByLocation($location_id);
        return $this->respond($records);
    }

    // Update a sightseeing record (handles image upload if provided).
    public function updateSightseeingRecord()
    {
        $data = $this->request->getPost();
        $id   = $data['sightseeing_id'] ?? null;
        if (!$id) {
            return $this->failValidationErrors('Sightseeing ID is required');
        }

        $updateData = [
            'sightseeing_name'     => $data['sightseeing_name'] ?? '',
            'sightseeing_distance' => $data['sightseeing_distance'] ?? 0,
            'tariff'               => $data['tariff'] ?? 0,
            'is_pax'               => isset($data['is_pax']) ? $data['is_pax'] : 0,
        ];

        // Handle image upload.
        $file = $this->request->getFile('sightseeing_image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('./uploads', $newName);
            $updateData['img_path'] = 'uploads/' . $newName;
        }

        $result = $this->geogModel->updateSightseeingRecord($id, $updateData);
        if ($result) {
            return $this->respond(['success' => true, 'message' => 'Record updated successfully']);
        }
        return $this->failServerError('Update failed');
    }

    //default_ss
    public function setDefault($id = null)
    {
        if (!$id) {
            return $this->failValidationErrors('Sightseeing ID is required');
        }

        $record = $this->geogModel->getSightseeingById($id);
        if (!$record) {
            return $this->failNotFound('Sightseeing record not found');
        }

        // Reset previously selected sightseeing
        $affectedRows = $this->geogModel->resetDefaultSightseeing($record['object_id'], $id);

        log_message('debug', "Resetting default sightseeing. Rows affected: " . $affectedRows);

        // Set the new default sightseeing
        $result = $this->geogModel->updateSightseeingRecord($id, ['is_default_ss' => 1]);

        if ($result) {
            return $this->respond(['success' => true, 'message' => 'Default sightseeing updated successfully']);
        }

        return $this->failServerError('Error updating default sightseeing');
    }


    // ===== New: Refresh Node Endpoint =====
    // Returns a partial view for the children of a given node.
    public function refreshNode($id = null)
    {
        if (!$id) {
            return $this->failValidationErrors('No node ID provided');
        }

        // Retrieve the child nodes for the given parent ID.
        $children = $this->geogModel->getChildren($id);
        // Return a partial view containing the refreshed node children.
        return view('partials/refreshNode', ['children' => $children]);
    }

    // ===== New: Sublocations Endpoint =====
    // Returns refreshed HTML for the sublocation datatable.
    public function sublocations($id = null)
    {
        if (!$id) {
            return $this->failValidationErrors('No location ID provided');
        }

        // Retrieve child nodes (sublocations) for the given location.
        $children = $this->geogModel->getChildren($id);

        // Build an HTML table for the sublocations.
        $tableHtml  = '<table id="geog-datatable" class="display" style="width:100%">';
        $tableHtml .= '<thead><tr><th>ID</th><th>Name</th><th>Latitude</th><th>Longitude</th><th>Action</th></tr></thead>';
        $tableHtml .= '<tbody>';
        if (!empty($children)) {
            foreach ($children as $child) {
                $tableHtml .= '<tr>';
                $tableHtml .= '<td>' . $child['geog_id'] . '</td>';
                $tableHtml .= '<td>' . $child['geog_name'] . '</td>';
                $tableHtml .= '<td>' . $child['geog_latitude'] . '</td>';
                $tableHtml .= '<td>' . $child['geog_longitude'] . '</td>';
                $tableHtml .= '<td>';
                $tableHtml .= '<button class="btn btn-primary btn-sm edit-sublocation" data-id="' . $child['geog_id'] . '">Edit</button> ';
                $tableHtml .= '<button class="btn btn-danger btn-sm delete-sublocation" data-id="' . $child['geog_id'] . '">Delete</button>';
                $tableHtml .= '</td>';
                $tableHtml .= '</tr>';
            }
        } else {
            $tableHtml .= '<tr><td colspan="5">No sublocations available.</td></tr>';
        }
        $tableHtml .= '</tbody></table>';

        return $tableHtml;
    }
}
