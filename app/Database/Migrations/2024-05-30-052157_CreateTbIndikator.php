<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbIndikator extends Migration
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
            'name'    => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
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
        $this->forge->createTable('tb_indicator');
        
        $data = [
            ['name' => 'Aspek Keselamatan'],
            ['name' => 'Aspek Kenyamanan'],
            ['name' => 'Aspek Keterjangkauan'],
            ['name' => 'Aspek Keamanan'],
            ['name' => 'Aspek Kesetaraan'],
            ['name' => 'Aspek Keteraturan'],
        ];
        $this->db->table('tb_indicator')->insertBatch($data);
    }

    public function down()
    {
        $this->forge->dropTable('tb_indicator');
    }
}
