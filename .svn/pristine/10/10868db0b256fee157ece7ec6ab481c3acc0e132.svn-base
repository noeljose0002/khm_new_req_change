<?php

namespace App\Controllers;

use App\Models\TaxRateModel;
use CodeIgniter\Controller;
use App\Models\Dashboard_m;

class TaxRate extends Controller
{
    protected $taxRateModel;

    public function __construct()
    {
        helper(['form', 'url']);
        $this->taxRateModel = new TaxRateModel();
    }

    /**
     * Display the main view.
     */
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

        return view('masters/tax_rate_view',$data);
    }

    /**
     * Fetch all tax rate records as JSON (for DataTables).
     */
    public function fetchAll()
    {
        $data = $this->taxRateModel->getAllTaxRates();
        return $this->response->setJSON($data);
    }

    /**
     * Create a new tax rate record.
     */
    public function store()
    {
        $data = [
            'tax_rate'                    => $this->request->getPost('tax_rate'),
            'applicable_hotel_range_from' => $this->request->getPost('applicable_hotel_range_from'),
            'applicable_hotel_range_to'   => $this->request->getPost('applicable_hotel_range_to'),
            'enterprise_id'               => $this->request->getPost('enterprise_id'),
            'object_parent_id'            => $this->request->getPost('object_parent_id'),
            'object_location_id'          => $this->request->getPost('object_location_id'),
            'object_email'                => $this->request->getPost('object_email'),
            'object_address'              => $this->request->getPost('object_address'),
            'object_ph_no'                => $this->request->getPost('object_ph_no')
        ];

        $result = $this->taxRateModel->createTaxRate($data);
        return $this->response->setJSON($result);
    }

    /**
     * Update an existing tax rate record.
     *
     * @param int $tax_rate_id
     */
    public function update($tax_rate_id)
    {
        $data = [
            'tax_rate'                    => $this->request->getPost('tax_rate'),
            'applicable_hotel_range_from' => $this->request->getPost('applicable_hotel_range_from'),
            'applicable_hotel_range_to'   => $this->request->getPost('applicable_hotel_range_to'),
            'enterprise_id'               => $this->request->getPost('enterprise_id')
        ];

        $result = $this->taxRateModel->updateTaxRate($tax_rate_id, $data);
        return $this->response->setJSON($result);
    }

    /**
     * Soft delete a tax rate record.
     *
     * @param int $tax_rate_id
     */
    public function delete($tax_rate_id)
    {
        $result = $this->taxRateModel->deleteTaxRate($tax_rate_id);
        return $this->response->setJSON($result);
    }
}
