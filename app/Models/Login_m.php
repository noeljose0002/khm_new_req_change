<?php
namespace App\Models;
use CodeIgniter\Model;
class Login_m extends Model
{
   protected $table = "khm_sys_usg_entity_users";
    public function check_valid_login($user_id,$password)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_sys_usg_entity_users u');
        $result = $selected_table->select('u.*,m.entity_name')
            ->join('khm_entity_mst m', 'm.entity_id = u.entity_id', 'left')
            ->where('u.user_id', $user_id)
            ->where('u.password', md5($password))
            ->get()->getResultArray();
        return $result;
    }
    
    public function get_email($user_id,$password)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('registration');
        $result = $selected_table->select('*')
            ->where('user_id', $user_id)
            ->where('password', md5($password))
            ->get()->getResultArray();
        return $result;
    }
    public function get_all_entity_roles($entity_id)
    {
        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_sys_usg_mst_entity_role a');
        $result = $selected_table->select('a.*,m.role_name,m.parent_id,m.hierarchy_id')
            ->join('khm_sys_usg_mst_roles m', 'm.role_id = a.role_id', 'left')
            ->where('a.entity_id', $entity_id)
            ->orderBy('a.role_id', 'ASC')
            ->get()->getResultArray();
        return $result;
    }
    public function get_all_systems($entity_id)
    {
        /*$db = \Config\Database::connect();
        $selected_table = $db->table('khm_entity_boolean a');
        $result = $selected_table->select('a.*,m.boolean_name')
            ->join('khm_entity_mst_boolean m', 'm.boolean_id = a.boolean_id', 'left')
            ->where('a.entity_id', $entity_id)
            ->groupStart()
                ->where('a.boolean_id', 3)
                ->orWhere('a.boolean_id', 4)
            ->groupEnd()
            ->get()->getResultArray();
        return $result;*/

        $db = \Config\Database::connect();
        $selected_table = $db->table('khm_entity_mst_boolean a');
        $result = $selected_table->select('a.boolean_id as entity_boolean_id,a.boolean_name')
            ->groupStart()
                ->where('a.boolean_id', 3)
                ->orWhere('a.boolean_id', 4)
            ->groupEnd()
            ->get()->getResultArray();
        return $result;
    }

}