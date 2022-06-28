<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Screenings extends Seeder
{
    public function run()
    {
        $this->db->table('screenings')->insertBatch([
            [
                'movie_id' => 1,
                'studio_id' => 1,
                'price' => 60000,
                'start_time' => '2022-06-28 10:00:00'
            ],
            [
                'movie_id' => 2,
                'studio_id' => 1,
                'price' => 60000,
                'start_time' => '2022-06-28 13:00:00'
            ]
        ]);
    }
}
