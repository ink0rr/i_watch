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
            'genre' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'age_rating' => [
                'type' => 'VARCHAR',
                'constraint' => '10'
            ],
            'director' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'writer' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'stars' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
        ]);

        $this->forge->createTable('movies', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('movies');
    }
}
