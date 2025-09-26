<?php

namespace App\Models;

use CodeIgniter\Model;

class BankAccountModel extends Model
{
    protected $table            = 'khm_obj_mst_bank_accounts';
    protected $primaryKey       = 'bank_accounts_id';
    protected $allowedFields    = [
        'object_id', 
        'bank_name', 
        'account_type', 
        'account_name',
        'account_no',
        'deleted', 
        'enterprise_id'
    ];
    protected $returnType       = 'array';
    protected $useAutoIncrement = true;

    /**
     * Get all active (non-soft-deleted) bank accounts.
     */
    public function getActiveBankAccounts()
    {
        return $this->where('deleted', 0)
                    ->orderBy('bank_accounts_id', 'DESC')
                    ->findAll();
    }

    /**
     * Check for duplicate entries based on (bank_name + account_no).
     * If $ignoreId is given, exclude that record from the check (for updates).
     */
    public function checkDuplicate($bankName, $accountNo, $ignoreId = null)
    {
        $builder = $this->builder();
        $builder->where('bank_name', $bankName)
                ->where('account_no', $accountNo)
                ->where('deleted', 0);

        if (!empty($ignoreId)) {
            $builder->where('bank_accounts_id !=', $ignoreId);
        }
        return $builder->get()->getRowArray(); // returns a single row or null
    }

    /**
     * Insert a new bank account record.
     * Also creates a new object record in khm_obj_mst.
     */
    public function insertBankAccount($bankName, $accountType, $accountName, $accountNo)
    {
        $db = \Config\Database::connect();

        // 1) Insert into khm_obj_mst
        $builderObj = $db->table('khm_obj_mst');
        $dataObj = [
            'object_type_id'   => 5,    // Bank accounts
            'object_class_id'  => 15,   // Bank accounts
            'object_name'      => $bankName, // store bank_name as object_name
            'deleted'       => 0,
            'enterprise_id'    => 1,
        ];
        $builderObj->insert($dataObj);
        $objectId = $db->insertID();

        // 2) Insert into khm_obj_mst_bank_accounts
        $data = [
            'object_id'     => $objectId,
            'bank_name'     => $bankName,
            'account_type'  => $accountType,
            'account_name'  => $accountName,
            'account_no'    => $accountNo,
            'deleted'       => 0,
            'enterprise_id' => 1
        ];
        return $this->insert($data);
    }

    /**
     * Update an existing bank account record.
     * Also updates the object record in khm_obj_mst.
     */
    public function updateBankAccount($bankAccountsId, $bankName, $accountType, $accountName, $accountNo)
    {
        // Update the bank account table
        $this->update($bankAccountsId, [
            'bank_name'    => $bankName,
            'account_type' => $accountType,
            'account_name' => $accountName,
            'account_no'   => $accountNo
        ]);

        // Update the corresponding object record in khm_obj_mst
        $db  = \Config\Database::connect();
        $row = $this->find($bankAccountsId);
        if ($row && isset($row['object_id'])) {
            $objectId   = $row['object_id'];
            $builderObj = $db->table('khm_obj_mst');
            $builderObj->where('object_id', $objectId)
                       ->update(['object_name' => $bankName]);
        }

        return true;
    }

    /**
     * Soft-delete a bank account record.
     * Also soft-deletes the corresponding object record.
     */
    public function softDeleteBankAccount($bankAccountsId)
    {
        // Soft-delete in khm_obj_mst_bank_accounts
        $this->update($bankAccountsId, ['deleted' => 1]);

        // Soft-delete in khm_obj_mst
        $db  = \Config\Database::connect();
        $row = $this->find($bankAccountsId);
        if ($row && isset($row['object_id'])) {
            $objectId   = $row['object_id'];
            $builderObj = $db->table('khm_obj_mst');
            $builderObj->where('object_id', $objectId)
                       ->update(['deleted' => 1]);
        }

        return true;
    }
}
