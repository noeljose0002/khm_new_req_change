<?php 
namespace App\Models;
use CodeIgniter\Model;

class SuperAdminObjectAttributeModel extends Model
{
    protected $table = 'khm_obj_mst_attribute';
    protected $primaryKey = 'object_mst_attribute_id ';
    protected $allowedFields = ['object_class_id','object_mst_attribute_name','enterprise_id','object_mst_attribute_data_type','deleted'];
    protected $returnType ='array';



    public function getAll():array
    {
        return $this->db
            ->table($this->table . ' AS oma')
            ->select(['oma.object_class_id','oma.object_mst_attribute_name','oma.enterprise_id','oma.object_mst_attribute_data_type',
            'oma.deleted','oma.object_mst_attribute_id '])
            ->where('oma.deleted',0)
            ->orderBy('oma.object_mst_attribute_id ','DESC')
            ->get()
            ->getResultArray();
    }
    public function getClass():array
    {
        return $this->db    
                ->table('khm_obj_mst_class AS omc')
                ->select(['omc.object_class_id ','omc.object_class_name'

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