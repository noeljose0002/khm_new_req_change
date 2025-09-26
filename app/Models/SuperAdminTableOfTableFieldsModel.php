<?php 
namespace App\Models;
use CodeIgniter\Model;

class SuperAdminTableOfTableFieldsModel extends Model
{
    protected $table= 'khm_sys_mst_table_of_table_fields';
    protected $primaryKey = 'table_field_id';
    protected $allowedFields=['table_id','enterprise_id','table_field_type','table_field_name','deleted'];
    protected $returnType = 'array';

    public function getAll():array 
    {
        return $this->db
            ->table($this->table . ' AS ttf')
            ->select(['ttf.table_field_id','tt.table_id','tt.table_name','ttf.enterprise_id','ttf.table_field_type','ttf.table_field_name','ttf.deleted'])
            ->join('khm_sys_mst_table_of_tables AS tt',
                'tt.table_id=ttf.table_id',
                'left'
            )
            ->where('ttf.deleted',0)
            ->orderBy('ttf.table_field_id','DESC')
            ->get()
            ->getResultArray();
    }

    public function getTable():array
    {
        return $this->db
            ->table('khm_sys_mst_table_of_tables AS mtt')
            ->select(['mtt.table_id','mtt.table_name','mtt.deleted'])
             ->where('mtt.deleted',0)
            ->orderBy('mtt.table_id','DESC')
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