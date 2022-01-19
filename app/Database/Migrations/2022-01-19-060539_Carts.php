<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Carts extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'cart_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'cashier_id' => [
                'type' => 'INT',
            ],
            'customer_id' => [
                'type' => 'INT',
            ],
            'no_order' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'qty' => [
                'type' => 'INT',
            ],
            'price' => [
                'type' => 'INT',
            ],
            'total' => [
                'type' => 'INT',
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
        $this->forge->addKey('cart_id', true);
        $this->forge->createTable('carts');
    }

    public function down()
    {
        $this->forge->dropTable('carts');
    }
}
