<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = "users";
    protected $primaryKey = "user_id";
    protected $returnType = "object";
    protected $useTimestamps = true;
    protected $allowedFields = ['user_id', 'username','password','name','status'];

    public function getUser()
    {
        return $this->db->table('users')->get();
    }

    public function getUserById($id)
    {
        return $this->db->table('users')->getWhere(['user_id' => $id]);
    }

    public function saveUser($data){
        return $this->db->table('users')->insert($data);
    }
 
    public function updateUser($data, $id)
    {
        return $this->db->table('users')->update($data, array('user_id' => $id));
    }
 
    public function deleteUser($id)
    {
        return $this->db->table('users')->delete(array('user_id' => $id));
    } 
}
