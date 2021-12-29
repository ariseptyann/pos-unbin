<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ReturDetails extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'retur_detail_id'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'retur_header_id'        => [
                'type'           => 'INT',
            ],
            'product_id'        => [
                'type'           => 'INT',
            ],
            'qty'        => [
                'type'           => 'INT',
            ],
            'price_buy'        => [
                'type'           => 'INT',
            ],
            'price_sell'        => [
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
        $this->forge->addKey('retur_detail_id', true);
        $this->forge->createTable('retur_details');
    }

    public function down()
    {
        $this->forge->dropTable('retur_details');
    }
}
