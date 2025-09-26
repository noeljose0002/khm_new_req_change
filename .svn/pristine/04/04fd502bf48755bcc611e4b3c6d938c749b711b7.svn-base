<?php 
namespace App\Models;

use CodeIgniter\Model;

class SuperAdminEntityPrimaryTypeModel extends Model
{
    protected $table='khm_entity_mst_primary_type';
    protected $primaryKey='entity_type_id';
    protected $allowedFields=['entity_type_name','enterprise_id','deleted'];
    protected $returnType= 'array';




    public function getAll():array
    {
        return $this->db
                ->table($this->table . ' AS empt')
                ->select(['empt.entity_type_id','empt.entity_type_name','empt.enterprise_id','empt.deleted'])
                ->where('empt.deleted',0)
                ->orderBy('empt.entity_type_id','DESC')
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