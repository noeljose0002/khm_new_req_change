<?php 
namespace App\Models;
use CodeIgniter\Model;

class SuperAdminEntityAttributeModel extends Model
{
    protected $table = 'khm_entity_mst_attribute';
    protected $primaryKey = 'entity_attribute_id';
    protected $allowedFields = ['entity_class_id','entity_attribute_name','enterprise_id','entity_attribute_data_type','deleted'];
    protected $returnType ='array';



    public function getAll():array
    {
        return $this->db
            ->table($this->table . ' AS ema')
            ->select(['ema.entity_class_id','ema.entity_attribute_name','ema.enterprise_id','ema.entity_attribute_data_type',
            'ema.deleted','ema.entity_attribute_id'])
            ->where('ema.deleted',0)
            ->orderBy('ema.entity_attribute_id','DESC')
            ->get()
            ->getResultArray();
    }
    public function getClass():array
    {
        return $this->db    
                ->table('khm_entity_mst_class AS emc')
                ->select(['emc.entity_class_id ','emc.entity_class_name'

                ])
                ->get()
                ->getResultArray();
    }

     public function getOne(int $id):array
    {
        return $this->find($id);
    }

    public function softDelete(int $id)
    {
        return $this->update($id,['deleted'=> 1]);
    }
}


?>