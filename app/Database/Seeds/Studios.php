<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Studios extends Seeder
{
    public function run()
    {
        $this->db->table('studios')->insertBatch([
            [
                'name' => 'Studio #1',
            ],
            [
                'name' => 'Studio #2',
            ],
            [
                'name' => 'Studio #3',
            ]
        ]);
    }
}
