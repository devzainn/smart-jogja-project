<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbKriteria extends Migration
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
            'indicator_id' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
            ],
            'name'    => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'weight' => [
                'type'          => 'INT',
            ],
            'normalized_weight' => [
                'type'          => 'FLOAT',
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
        $this->forge->createTable('tb_criteria');
        $this->forge->addForeignKey('indicator_id', 'tb_indicator', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->forge->dropTable('tb_criteria');
    }
}
