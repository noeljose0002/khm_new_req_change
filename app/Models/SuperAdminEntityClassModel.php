<?php 
namespace App\Models;
use CodeIgniter\Model;

class SuperAdminEntityClassModel extends Model{


    protected $table = 'khm_entity_mst_class';
    protected $primaryKey = 'entity_class_id';
    protected $allowedFields = ['entity_class_name','entity_class_parent_id','enterprise_id','deleted'	];
    protected $returnType = 'array';

    public function getAll():array
    {
        return $this->db
                 ->table($this->table . ' AS emc ')
                    ->select(['emc.entity_class_id','emc.entity_class_name','emc.entity_class_parent_id','emc.enterprise_id','emc.deleted'])
                    ->where('emc.deleted',0)
                    ->orderBy('emc.entity_class_id','DESC')
                    ->get()
                    ->getResultArray();
    }

    public function getOne(int $id)
    {
        return $this->find($id);

    }
    public function softDelete(int $id)
    {
        return $this->update($id,['deleted'=> 1]);
    }
}
?>