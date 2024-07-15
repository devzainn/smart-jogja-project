<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbResponse extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'respondent_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'response_date' => [
                'type' => 'DATETIME',
            ],
            'survey_result' => [
                'type' => 'DOUBLE',
                'null' => true,
            ],
            'quality' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
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
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('respondent_id', 'tb_respondent', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tb_response');
    }

    public function down()
    {
        $this->forge->dropTable('tb_response');
    }
}
