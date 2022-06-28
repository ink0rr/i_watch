<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Studios extends Migration
{
    public function up()
    {
        $this->forge->addField('id');
        $this->forge->addField([
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ]
        ]);
        
        $this->forge->createTable('studios', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('studios');
    }
}
