<?php
namespace App\Models;
use CodeIgniter\Model;

class SuperAdminObjectPrimaryTypeModel extends Model
{
    protected $table ='khm_obj_mst_primary_type';
    protected $primaryKey='object_type_id';
    protected $allowedFields = ['object_type_name','enterprise_id','deleted'];
    protected $returnType = 'array';



    public function getAll():array
    {
        return $this->db
            ->table($this->table . ' AS opt')
            ->select(['opt.object_type_id','opt.object_type_name','opt.enterprise_id','opt.deleted'])
            ->where('opt.deleted',0)
            ->orderBy('opt.object_type_id','DESC')
            ->get()
            ->getResultArray();
    }

    public function getOne(int $id):array
    {
        return $this->find($id);
    }

    public function softDelete(int $id)
    {
        return $this->update($id,['deleted'=>1]);
    }
}
?>