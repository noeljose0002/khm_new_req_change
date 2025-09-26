<?php
namespace App\Models;
use CodeIgniter\Model;

class SuperAdminEntityBooleanModel extends  Model
{
    protected $table = 'khm_entity_mst_boolean';
    protected $primaryKey = 'boolean_id';
    protected $allowedFields=['boolean_name','enterprise_id','entity_class_id','deleted'];

    protected $returnType='array';
    protected $validationRules = [
        'boolean_name' => 'required|trim|is_unique[khm_entity_mst_boolean.boolean_name,boolean_id,{boolean_id}]',
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
                ->table( $this->table . ' AS emb')
                ->select(['emb.boolean_id','emb.boolean_name','emb.enterprise_id','emb.entity_class_id','emb.deleted'

                ])
                ->where('emb.deleted',0)
                ->orderBy('emb.boolean_id','DESC')
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