<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Movies extends Seeder
{
    public function run()
    {
        $this->db->table('movies')->insertBatch([
            [
                'title' => 'JURASSIC WORLD DOMINION',
                'description' => 'Empat tahun setelah kehancuran pulau Nublar, dinosaurus sekarang hidup dan berburu bersama manusia di seluruh dunia. Keseimbangan yang rapuh ini akan menentukan, apakah manusia akan tetap menjadi berada di puncak rantai makanan ketika berbagi wilayah dengan makhluk paling menakutkan dalam sejarah bumi.',
                'duration' => 147
            ],
            [
                'title' => 'HATCHING',
                'description' => 'Tinja adalah seorang pesenam berumur 12 tahun yang dengan susah payah berusaha menyenangkan sang ibu yang terobsesi dengan penampilan. Seusai menemukan seekor burung terluka di dalam hutan, ia membawa telurnya ke rumah, mengeraminya di tempat tidur dan merawatnya hingga menetas. Makhluk yang muncul dari dalam telur itu kemudian menjadi sahabat terdekatnya, sekaligus jadi sebuah perwujudan mimpi buruk, yang membawa Tinja ke dalam realitas tak wajar yang tak disadari oleh sang ibu.',
                'duration' => 91
            ]
        ]);
    }
}
