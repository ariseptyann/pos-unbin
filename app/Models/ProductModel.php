<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = "products";
    protected $primaryKey = "product_id";
    protected $returnType = "object";
    protected $useTimestamps = true;
    protected $allowedFields = ['product_id', 'category_id','sku','name','unit','image','stok','price_buy','price_sell','discount','description'];

    public function getProduct()
    {
        return $this->db->table('products')->get();
    }

    public function getProductById($id)
    {
        return $this->db->table('products')->getWhere(['product_id' => $id]);
    }

    public function saveProduct($data){
        return $this->db->table('products')->insert($data);
    }
 
    public function updateProduct($data, $id)
    {
        return $this->db->table('products')->update($data, array('product_id' => $id));
    }
 
    public function deleteProduct($id)
    {
        return $this->db->table('products')->delete(array('product_id' => $id));
    } 
}
