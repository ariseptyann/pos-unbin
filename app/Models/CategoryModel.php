<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = "categorys";
    protected $primaryKey = "category_id";
    protected $returnType = "object";
    protected $useTimestamps = true;
    protected $allowedFields = ['category_id', 'parent_id','name'];

    public function getCategory()
    {
        return $this->db->table('categorys')->get();
    }

    public function getCategoryById($id)
    {
        return $this->db->table('categorys')->getWhere(['category_id' => $id]);
    }

    public function saveCategory($data){
        return $this->db->table('categorys')->insert($data);
    }
 
    public function updateCategory($data, $id)
    {
        return $this->db->table('categorys')->update($data, array('category_id' => $id));
    }
 
    public function deleteCategory($id)
    {
        return $this->db->table('categorys')->delete(array('category_id' => $id));
    }
}
