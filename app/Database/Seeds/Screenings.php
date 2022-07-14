<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Screenings extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 7; $i++) {
            for ($j = 1; $j <= 32; $j++) {
                $rand_day = rand(0, 6);
                $rand_hours = rand(8, 22);
                if ($rand_hours == 8 && $rand_hours == 9) {
                    $rand_hours = 8;
                } elseif ($rand_hours == 10 && $rand_hours == 11) {
                    $rand_hours = 10;
                } elseif ($rand_hours == 12 && $rand_hours == 13) {
                    $rand_hours = 12;
                } elseif ($rand_hours == 14 && $rand_hours == 15) {
                    $rand_hours = 14;
                } elseif ($rand_hours == 16 && $rand_hours == 17) {
                    $rand_hours = 16;
                } elseif ($rand_hours == 18 && $rand_hours == 19) {
                    $rand_hours = 18;
                } elseif ($rand_hours == 20 && $rand_hours == 21) {
                    $rand_hours = 20;
                } elseif ($rand_hours == 22 && $rand_hours == 23) {
                    $rand_hours = 22;
                }

                $rand_minutes = rand(0, 45);
                if ($rand_minutes >= 0 && $rand_minutes <= 15) {
                    $rand_minutes = 0;
                } elseif ($rand_minutes >= 15 && $rand_minutes <= 30) {
                    $rand_minutes = 15;
                } elseif ($rand_minutes >= 30 && $rand_minutes <= 45) {
                    $rand_minutes = 30;
                } elseif ($rand_minutes >= 45) {
                    $rand_minutes = 45;
                }


                $this->db->table('screenings')->insert(
                    [
                        'movie_id' => $i,
                        'studio_id' => rand(1, 3),
                        'price' => 60000,
                        'start_time' => date("Y-m-d H:i:00", strtotime("+{$rand_day} day +{$rand_hours} hour +{$rand_minutes} minutes", strtotime(date('Y-m-d'))))
                    ]
                );
            }
        }
    }
}
