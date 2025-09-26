<?php

namespace App\Controllers;

use App\Models\BankAccountModel;
use CodeIgniter\Controller;

use App\Models\Dashboard_m;

class BankAccounts extends Controller
{
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
        // Loads the view (contains the table and JavaScript)
        return view('masters/bank_accounts_view',$data);
    }

    public function fetch()
    {
        $model = new BankAccountModel();
        $data  = $model->getActiveBankAccounts();
        return $this->response->setJSON($data);
    }

    public function save()
    {
        // Grab POST data
        $bankAccountsId = $this->request->getPost('bank_accounts_id');
        $bankName       = $this->request->getPost('bank_name');
        $accountType    = $this->request->getPost('account_type');
        $accountName    = $this->request->getPost('account_name');
        $accountNo      = $this->request->getPost('account_no');

        // Basic server-side validation
        if (!$bankName || !$accountType || !$accountName || !$accountNo) {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'All fields are required!'
            ]);
        }

        // Check for duplicates (using bank_name and account_no)
        $model = new BankAccountModel();
        $duplicate = $model->checkDuplicate($bankName, $accountNo, $bankAccountsId);
        if ($duplicate) {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'A record with this Bank Name and Account No already exists!'
            ]);
        }

        // Insert or update
        if (empty($bankAccountsId)) {
            // Insert
            $res = $model->insertBankAccount($bankName, $accountType, $accountName, $accountNo);
            if ($res) {
                return $this->response->setJSON([
                    'status'  => 'success',
                    'message' => 'Bank account added successfully'
                ]);
            } else {
                return $this->response->setJSON([
                    'status'  => 'error',
                    'message' => 'Failed to add bank account'
                ]);
            }
        } else {
            // Update
            $res = $model->updateBankAccount($bankAccountsId, $bankName, $accountType, $accountName, $accountNo);
            if ($res) {
                return $this->response->setJSON([
                    'status'  => 'success',
                    'message' => 'Bank account updated successfully'
                ]);
            } else {
                return $this->response->setJSON([
                    'status'  => 'error',
                    'message' => 'Failed to update bank account'
                ]);
            }
        }
    }

    public function delete()
    {
        $bankAccountsId = $this->request->getPost('bank_accounts_id');
        $model          = new BankAccountModel();
        $res            = $model->softDeleteBankAccount($bankAccountsId);

        if ($res) {
            return $this->response->setJSON([
                'status'  => 'success',
                'message' => 'Bank account soft-deleted successfully'
            ]);
        } else {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Failed to delete bank account'
            ]);
        }
    }
}
