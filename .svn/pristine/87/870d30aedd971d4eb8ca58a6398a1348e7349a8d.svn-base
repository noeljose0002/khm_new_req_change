<?php 
namespace App\Models;
use CodeIgniter\Model;

class SuperAdminEntityAttributeClassAssignModel extends Model
{
    protected $table = 'khm_entity_detail_class_attribute';
    protected $primaryKey = 'entity_class_attr_id';
    protected $allowedFields = ['entity_class_id','entity_attribute_id','enterprise_id','deleted'];
    protected $returnType='array';




    public function getAll():array
    {
        return $this->db
            ->table($this->table . ' AS dca')
            ->select([
                'dca.entity_class_attr_id',
                'dca.entity_class_id',
                'dca.entity_attribute_id',
                'dca.enterprise_id',
                'dca.deleted',
                'emc.entity_class_id',
                'emc.entity_class_name',
                'emc.deleted',
                'ema.entity_attribute_id',
                'ema.entity_attribute_name',
                'ema.deleted',

            ])
            ->join('khm_entity_mst_class AS emc',
            'emc.entity_class_id=dca.entity_class_id',
            'left'
            )
            ->join('khm_entity_mst_attribute AS ema',
                'ema.entity_attribute_id=dca.entity_attribute_id',
                'left'
            )
            ->where('ema.deleted',0)
            ->where('emc.deleted',0)
            ->where('dca.deleted',0)
            ->orderBy('dca.entity_class_attr_id','DESC')
            ->get()
            ->getResultArray();
    }

    public function getOne(int $id):array{
        return $this->find($id);
    }

    public function getClass():array
    {
        return $this->db
        ->table('khm_entity_mst_class AS kemc')
        ->select(['kemc.entity_class_id','kemc.entity_class_name','kemc.deleted'])
        ->where('kemc.deleted',0)
        ->get()
        ->getResultArray();
    }
      public function getAttri():array
    {
        return $this->db
        ->table('khm_entity_mst_attribute AS kema')
        ->select(['kema.entity_attribute_id','kema.entity_attribute_name','kema.deleted'])
        ->where('kema.deleted',0)
        ->get()
        ->getResultArray();
    }
    


    public function softDelete(int $id)
    {
        return $this->update($id,['deleted'=>1]);
    }
}


?>