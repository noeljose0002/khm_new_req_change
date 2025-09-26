<?php
namespace App\Models;
use CodeIgniter\Model;

class SuperAdminObjectAttributeClassAssignModel extends Model
{
    protected $table='khm_obj_detail_class_attribute';
    protected $primaryKey = 'object_class_attribute_id';
    protected $allowedFields=['object_class_id','object_mst_attribute_id','enterprise_id','deleted'];
    protected $returnType = 'array';

    public function getAll():array
    {
        return $this->db
                ->table($this->table . ' AS odca')
                ->select([
                    'odca.object_class_attribute_id',
                    'odca.object_class_id',
                    'odca.object_mst_attribute_id',
                    'odca.enterprise_id',
                    'odca.deleted',
                    'omc.object_class_id',
                    'omc.object_class_name',
                    'oma.object_mst_attribute_id',
                    'oma.object_mst_attribute_name',
                    'oma.deleted',
                    'omc.deleted',
                  
                ])
                ->join('khm_obj_mst_class AS omc',
                    'omc.object_class_id=odca.object_class_id',
                    'left'
                )
                ->join('khm_obj_mst_attribute AS oma',
                    'oma.object_mst_attribute_id=odca.object_mst_attribute_id',
                    'left'
                )
                ->where('omc.deleted',0)
                ->where('oma.deleted',0)
                ->where('odca.deleted',0)
                ->get()
                ->getResultArray();
    }

    public function getOne(int $id):array
    {
        return $this->find($id);
    }

    public function getClass():array
    {
        return $this->db
        ->table('khm_obj_mst_class AS komc')
        ->select(['komc.object_class_id','komc.object_class_name','komc.deleted'])
        ->where('komc.deleted',0)
        ->get()
        ->getResultArray();
    }
      public function getAttri():array
    {
        return $this->db
        ->table('khm_obj_mst_attribute AS koma')
        ->select(['koma.object_mst_attribute_id','koma.object_mst_attribute_name','koma.deleted'])
        ->where('koma.deleted',0)
        ->get()
        ->getResultArray();
    }

    public function softDelete(int $id)
    {
        return $this->update($id,['deleted'=>1]);
    }
    
}


?>