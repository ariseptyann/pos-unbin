<?php

namespace App\Models;

use CodeIgniter\Model;

class StoreModel extends Model
{
    protected $table            = 'stores';
    protected $primaryKey       = 'store_id';
    protected $useTimestamps = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['store_id', 'name', 'logo', 'address', 'about'];

    public function getStore()
    {
        return $this->db->table('stores')->get();
    }

    public function getStoreById($id)
    {
        return $this->db->table('stores')->getWhere(['store_id' => $id]);
    }

    public function saveStore($data){
        return $this->db->table('stores')->insert($data);
    }
 
    public function updateStore($data, $id)
    {
        return $this->db->table('stores')->update($data, array('store_id' => $id));
    }
 
    public function deleteStore($id)
    {
        return $this->db->table('stores')->delete(array('store_id' => $id));
    } 
}
