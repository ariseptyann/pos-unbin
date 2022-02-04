<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TransactionDetails extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'transaction_detail_id'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'transaction_header_id'        => [
                'type'           => 'INT',
            ],
            'product_id'        => [
                'type'           => 'INT',
            ],
            'qty'        => [
                'type'           => 'INT',
            ],
            'price'        => [
                'type'           => 'INT',
            ],
            'total'        => [
                'type'           => 'INT',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('transaction_detail_id', true);
        $this->forge->createTable('transaction_details');
    }

    public function down()
    {
        $this->forge->dropTable('transaction_details');
    }
}
