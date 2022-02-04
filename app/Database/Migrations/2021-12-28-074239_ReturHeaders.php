<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ReturHeaders extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'retur_header_id'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'no_retur' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'status'       => [
                'type'       => 'TINYINT',
                'constraint' => '1',
                'default'    => 0
            ],
            'date_retur' => [
                'type' => 'DATE',
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
        $this->forge->addKey('retur_header_id', true);
        $this->forge->createTable('retur_headers');
    }

    public function down()
    {
        $this->forge->dropTable('retur_headers');
    }
}

