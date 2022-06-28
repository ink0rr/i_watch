<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Screenings extends Migration
{
    public function up()
    {
        $this->forge->addField('id');
        $this->forge->addField([
            'movie_id' => [
                'type' => 'INT'
            ],
            'studio_id' => [
                'type' => 'INT'
            ],
            'price' => [
                'type' => 'INT'
            ],
            'start_time' => [
                'type' => 'DATETIME'
            ],
        ]);

        $this->forge->addForeignKey('movie_id', 'movies', 'id');
        $this->forge->addForeignKey('studio_id', 'studios', 'id');

        $this->forge->createTable('screenings', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('screenings');
    }
}
