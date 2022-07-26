<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField('id');
        $this->forge->addField([
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'status' => [
                'type' => 'bool'
            ]
        ]);

        $this->forge->createTable('users', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
