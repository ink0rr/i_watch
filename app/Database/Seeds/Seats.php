<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Seats extends Seeder
{
    public function run()
    {
        $table = $this->db->table('seats');
        for ($i = 1; $i <= 8; $i++) {
            for ($j = 1; $j <= 16; $j++) {
                $table->insert([
                    'name' => chr($i + 64) . $j
                ]);
            }
        }
    }
}
