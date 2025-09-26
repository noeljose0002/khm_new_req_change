<?php
namespace App\Models;
use CodeIgniter\Model;

class SuperAdminEnquiryStatusModel extends Model
{
    protected $table='khm_obj_mst_enquiry_status';
    protected $primaryKey='status_id';
    protected $allowedFields=['status_name','is_active','enterprise_id'];
    protected $returnType='array';




    public function getAll()
    {
        return $this->db
                ->table($this->table . ' AS es')
                ->select([
                    'es.status_id',
                    'es.status_name',
                    'es.is_active',
                    'es.enterprise_id',
                    
                ])
                ->orderBy('es.status_id','DESC')
                ->get()
                ->getResultArray();

    }

    public function getOne(int $id)
    {
        return $this->find($id);
    }



}



?>