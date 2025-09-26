<?php
namespace App\Models;
use CodeIgniter\Model;

class SuperAdminObjectClassModel extends Model
{

    protected $table= 'khm_obj_mst_class';
    protected $primaryKey='object_class_id';
    protected $allowedFields=['object_class_name','object_class_parent_id','enterprise_id','deleted'];
    protected $returnType = 'array';
    
    
    public function getAll():array
    {
        return $this->db    
                ->table($this->table . ' AS omc')
                ->select(['omc.object_class_id','omc.object_class_name','omc.object_class_parent_id',
                'omc.enterprise_id','omc.deleted'])
                ->where('omc.deleted',0)
                ->orderBy('omc.object_class_id','DESC')
                ->get()
                ->getResultArray();
    }

    public function getOne(int $id)
    {
        return $this->find($id);

    }

    public function softDelete(int $id)
    {
        return $this->update($id,['deleted'=>1]);
    }
}
?>