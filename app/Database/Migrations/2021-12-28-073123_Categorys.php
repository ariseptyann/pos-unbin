<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Categorys extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'category_id'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'parent_id'          => [
                'type'           => 'INT',
<<<<<<< HEAD
                'null' => true,
=======
>>>>>>> 8b3c2762c59404147fb47168334e4fd79857db71
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
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
        $this->forge->addKey('category_id', true);
        $this->forge->createTable('categorys');
    }

    public function down()
    {
        $this->forge->dropTable('categorys');
    }
}
