<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Movies extends Migration
{
    public function up()
    {
        $this->forge->addField('id');
        $this->forge->addField([
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'duration' => [
                'type' => 'INT',
            ],
        ]);

        $this->forge->createTable('movies', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('movies');
    }
}
