<?php
namespace App\Models;
use CodeIgniter\Model;

class SuperAdminCostComponentTypeModel extends Model
{
    protected $table='khm_obj_mst_cost_component_type';
    protected $primaryKey='cost_component_type_id ';
    protected $allowedFields=['cost_component_type_name','enterprise_id','deleted'];
    protected $returnType='array';





    public function getAll():array
    {
        return $this->db
            ->table($this->table . ' AS cct')
            ->select(['cct.cost_component_type_id','cct.cost_component_type_name','cct.enterprise_id','cct.deleted'])
            ->where('cct.deleted',0)
            ->orderBy('cct.cost_component_type_id','DESC')
            ->get()
            ->getResultArray();
    }


    public function getOne(int $id):array{
        return $this->find($id);
    }
    

    public function softDelete(int $id){
        return $this->update($id,['deleted=>1']);
    }
}
?>