<?php namespace App\Models;

use CodeIgniter\Model;

class SuperAdminRoleModel extends Model
{
    protected $table         = 'khm_sys_usg_mst_roles';
    protected $primaryKey    = 'role_id';
    protected $allowedFields = ['role_name','parent_id','hierarchy_id','enterprise_id','deleted'];
    protected $useTimestamps = false;
    

    // 3) Disable auto-validation on update (we’ll trigger it manually)
    protected $skipValidation     = false;
    protected $protectFields      = true;
    // protected $useSoftDeletes = true;

    /** 
     * Get all roles for DataTables / AJAX listing 
     * (now using get()->getResultArray() instead of findAll())
     */
    public function getAllRoles(): array
    {
        return $this->db
                    ->table($this->table . ' AS r')
                    ->select([
                        'r.role_id',
                        'r.deleted',
                        'r.role_name',
                        'r.parent_id',
                        'r.hierarchy_id',
                        'r.enterprise_id',
                    ])
                    ->where('r.deleted',0)
                    ->orderBy('r.role_id', 'DESC')

                    ->get()                     // execute
                    ->getResultArray();         // fetch as array of arrays
    }

    /**
     * Get single role by ID
     * (unchanged, still using find())
     */
    public function getRole(int $id)
    {
        return $this->find($id);
    }

      public function softDelete($id)
    {
        return $this->update($id, ['deleted' => 1]);
    }

}
