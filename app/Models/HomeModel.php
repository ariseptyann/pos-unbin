<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeModel extends Model
{
    public function getProductToday()
    {
        $query = $this->db->table('transaction_details')->select('SUM(transaction_details.qty) as qty, products.name')->join('products', 'products.product_id = transaction_details.product_id')->where('transaction_details.created_at', date('Y-m-d'))->groupBy('products.product_id')->get();

        return $query;
    }
}
