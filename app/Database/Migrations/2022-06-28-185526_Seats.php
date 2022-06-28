<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Seats extends Migration
{
    public function up()
    {
        $this->forge->addField('id');
        $this->forge->addField([
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '3'
            ]
        ]);

        $this->forge->createTable('seats', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('seats');
    }
}
