<?php

namespace App\Models;

use CodeIgniter\Model;

class ReportModel extends Model
{
    public function getData($start_date, $finish_date)
    {
        $query = $this->db->table('transaction_headers')->select('transaction_headers.no_transaction, users.name as username, products.name as prodname, transaction_headers.discount, transaction_headers.total')
                ->join('transaction_details', 'transaction_details.transaction_header_id = transaction_headers.transaction_header_id')
                ->join('users', 'transaction_headers.user_id = users.user_id', 'left')
                ->join('products', 'transaction_details.product_id = products.product_id', 'left')
                ->where('transaction_headers.created_at BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($finish_date)).'"')->get();

        return $query;
    }
}
