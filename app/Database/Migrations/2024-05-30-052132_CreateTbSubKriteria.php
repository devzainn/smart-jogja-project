<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbSubKriteria extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'criteria_id' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
            ],
            'name'    => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'utility_score' => [
                'type'          => 'INT',
            ],
            'created_at'  => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at'  => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tb_sub_criteria');
        $this->forge->addForeignKey('criteria_id', 'tb_criteria', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->forge->dropTable('tb_sub_criteria');
    }
}
