<?php
namespace App\Models;
use CodeIgniter\Model;

class SuperAdminObjectBooleanModel extends  Model
{
    protected $table = 'khm_obj_mst_boolean';
    protected $primaryKey = 'boolean_id';
    protected $allowedFields=['boolean_name','enterprise_id','object_class_id','deleted'];

    protected $returnType='array';
    protected $validationRules = [
        'boolean_name' => 'required|trim|is_unique[khm_obj_mst_boolean.boolean_name,boolean_id,{boolean_id}]',
    ];
    protected $validationMessages = [
        'role_name' => [
            'required'  => 'Please enter a role name.',
            'is_unique' => 'That role name is already taken.',
        ],
    ];



    public function getAll():array
    {

        return $this->db    
                ->table( $this->table . ' AS omb')
                ->select(['omb.boolean_id','omb.boolean_name','omb.enterprise_id','omb.object_class_id','omb.deleted'

                ])
                ->where('omb.deleted',0)
                ->orderBy('omb.boolean_id','DESC')
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