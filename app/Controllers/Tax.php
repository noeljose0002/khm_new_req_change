<?php

namespace App\Controllers;

use App\Models\TaxModel;
use CodeIgniter\Controller;
use App\Models\Dashboard_m;

class Tax extends Controller
{
    protected $taxModel;

    public function __construct()
    {
        helper(['form', 'url']);
        $this->taxModel = new TaxModel();
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

        return view('masters/tax_view',$data);
    }

    /**
     * Fetch all tax records as JSON for DataTables.
     */
    public function fetchAll()
    {
        $data = $this->taxModel->getAllTaxes();
        return $this->response->setJSON($data);
    }

    /**
     * Create a new tax record.
     */
    public function store()
    {
        $data = [
            'tax_name'          => $this->request->getPost('tax_name'),
            'tax'               => $this->request->getPost('tax'),
            'b2b'               => $this->request->getPost('b2b'),
            'b2c'               => $this->request->getPost('b2c'),
            'enterprise_id'     => $this->request->getPost('enterprise_id'),
            // Object table details:
            'object_parent_id'  => $this->request->getPost('object_parent_id'),
            'object_location_id'=> $this->request->getPost('object_location_id'),
            'object_email'      => $this->request->getPost('object_email'),
            'object_address'    => $this->request->getPost('object_address'),
            'object_ph_no'      => $this->request->getPost('object_ph_no'),
        ];

        $result = $this->taxModel->createTax($data);
        return $this->response->setJSON($result);
    }

    /**
     * Update an existing tax record.
     *
     * @param int $tax_id
     */
    public function update($tax_id)
    {
        $data = [
            'tax_name'      => $this->request->getPost('tax_name'),
            'tax'           => $this->request->getPost('tax'),
            'b2b'           => $this->request->getPost('b2b'),
            'b2c'           => $this->request->getPost('b2c'),
            'enterprise_id' => $this->request->getPost('enterprise_id'),
        ];

        $result = $this->taxModel->updateTax($tax_id, $data);
        return $this->response->setJSON($result);
    }

    /**
     * Soft delete a tax record.
     *
     * @param int $tax_id
     */
    public function delete($tax_id)
    {
        $result = $this->taxModel->deleteTax($tax_id);
        return $this->response->setJSON($result);
    }
}
