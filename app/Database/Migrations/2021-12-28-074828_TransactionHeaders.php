<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TransactionHeaders extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'transaction_header_id'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'null' => true,
            ],
            'no_transaction' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'discount' => [
                'type' => 'INT',
                'null' => true,
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
        $this->forge->addKey('transaction_header_id', true);
        $this->forge->createTable('transaction_headers');
    }

    public function down()
    {
        $this->forge->dropTable('transaction_headers');
    }
}
