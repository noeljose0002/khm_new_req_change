<?php

namespace App\Models;

use CodeIgniter\Model;

class SuperAdminTransactionProcessTypeModel extends Model
{

    protected $table = 'khm_sys_mst_process_transaction_type';
    protected $primaryKey = 'prs_type_id';
    protected $allowedFields = ['prs_name', 'deleted', 'enterprise_id'];
    protected $returnType = 'array';
    



    public function getAll(): array
    {
        return $this->db
            ->table($this->table . ' AS tt')
            ->select(['tt.prs_type_id', 'tt.prs_name', 'tt.deleted', 'tt.enterprise_id '])
            ->where('tt.deleted', 0)
            ->orderBy('tt.prs_type_id', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function getone(int $id)
    {
        return $this->find($id);
    }
      public function softDelete($id)
    {
        return $this->update($id, ['deleted' => 1]);
    }
}
