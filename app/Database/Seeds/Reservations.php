<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Reservations extends Seeder
{
    public function run()
    {
        $this->db->table('reservations')->insertBatch([
            [
                'screening_id' => 1,
                'seat_id' => 1,
                'paid' => true
            ],
            [
                'screening_id' => 1,
                'seat_id' => 2,
                'paid' => true
            ],
            [
                'screening_id' => 2,
                'seat_id' => 1,
                'paid' => true
            ],
            [
                'screening_id' => 2,
                'seat_id' => 23,
                'paid' => true
            ],
            [
                'screening_id' => 2,
                'seat_id' => 24,
                'paid' => true
            ],
            [
                'screening_id' => 2,
                'seat_id' => 25,
                'paid' => true
            ]
        ]);
    }
}
