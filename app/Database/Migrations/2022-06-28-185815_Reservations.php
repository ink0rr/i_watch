<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Reservations extends Migration
{
    public function up()
    {
        $this->forge->addField('id');
        $this->forge->addField([
            'screening_id' => [
                'type' => 'INT'
            ],
            'seat_id' => [
                'type' => 'INT'
            ],
            'paid' => [
                'type' => 'BOOLEAN'
            ]
        ]);

        $this->forge->addForeignKey('screening_id', 'screenings', 'id');
        $this->forge->addForeignKey('seat_id', 'seats', 'id');

        $this->forge->createTable('reservations', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('reservations');
    }
}
