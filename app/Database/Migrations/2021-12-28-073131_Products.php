<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Products extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'product_id'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'category_id'        => [
                'type'           => 'INT',
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'sku' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'unit' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'stok'        => [
                'type'           => 'INT',
            ],
            'price_buy'        => [
                'type'           => 'INT',
            ],
            'price_sell'        => [
                'type'           => 'INT',
            ],
            'discount'        => [
                'type'           => 'INT',
                'null' => true,
            ],
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
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
        $this->forge->addKey('product_id', true);
        $this->forge->createTable('products');
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}
