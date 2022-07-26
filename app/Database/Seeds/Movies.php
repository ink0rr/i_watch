<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Movies extends Seeder
{
    public function run()
    {
        $this->db->table('movies')->insertBatch([
            [
                'image' => '1.jpg',
                'title' => 'THOR: LOVE AND THUNDER',
                'description' => 'Masa pensiun Thor terganggu oleh kehadiran pembunuh antar galaksi yang dikenal sebagai Gorr the God Butcher, yang yang bertujuan memusnahkan para dewa. Untuk melawan ancaman tersebut, Thor meminta bantuan King Valkyrie, Korg dan mantan pacarnya Jane Foster, yang mengejutkan Thor ternyata menggunakan palu ajaibnya, Mjolnir, The Mighty Thor . Bersama-sama, mereka memulai petualangan kosmik yang menegangkan untuk mengungkap dendam dari sang pembandai dewa dan menghentikannya sebelum terlambat.',
                'duration' => 120,
                'age_rating' => '13+',
                'genre' => 'Action, Adventure, Comedy',
                'director' => 'Taika Waititi',
                'writer' => 'Taika Waititi',
                'stars' => 'Christian Bale, Natalie Portman, Chris Hemsworth',
            ],
            [
                'image' => '2.jpg',
                'title' => 'MINIONS 2: THE RISE OF GRU',
                'description' => 'Kisah tak terduga tentang mimpi seorang anak berusia dua belas tahun untuk menjadi penjahat super terhebat di dunia.',
                'duration' => 87,
                'age_rating' => 'SU',
                'genre' => 'Animation, Adventure, Comedy',
                'director' => 'Kyle Balda, Brad Ableson, Jonathan Del Val',
                'writer' => 'Matthew Fogel',
                'stars' => 'Steve Carell, Pierre Coffin, Alan Arkin',
            ],
            [
                'image' => '3.jpg',
                'title' => 'JURASSIC WORLD DOMINION',
                'description' => 'Empat tahun setelah kehancuran pulau Nublar, dinosaurus sekarang hidup dan berburu bersama manusia di seluruh dunia. Keseimbangan yang rapuh ini akan menentukan, apakah manusia akan tetap menjadi berada di puncak rantai makanan ketika berbagi wilayah dengan makhluk paling menakutkan dalam sejarah bumi.',
                'duration' => 147,
                'age_rating' => '13+',
                'genre' => 'Action, Adventure, Sci-Fi',
                'director' => 'Colin Trevorrow',
                'writer' => 'Emily Carmichael, Colin Trevorrow, Derek Connolly',
                'stars' => 'Chris Pratt, Bryce Dallas Howard, Laura Dern',
            ],
            [
                'image' => '4.jpg',
                'title' => 'THE WITCH: PART 2. THE OTHER ONE',
                'description' => 'Seorang gadis terbangun di laboratorium rahasia yang sangat besar dan Saat gadis itu melarikan diri dari laboratorium, dia menemukan Kyung Hee, yang mencoba melindungi rumahnya dari geng kriminal. Ketika gadis itu berhadapan dengan organisasi kriminal yang mendekati rumah Kyung Hee, gadis itu mengalahkan mereka dengan kekuatan yang luar biasa, dan sementara itu, mereka mulai mengejarnya di laboratorium rahasia. Siapa gadis misterius ini dan mengapa dia dikejar?',
                'duration' => 138,
                'age_rating' => '17+',
                'genre' => 'Mystery',
                'director' => 'Park Hoon-jung',
                'writer' => 'Park Hoon-jung',
                'stars' => 'Cynthia, Min-soo Jo, Kim Da-Mi',
            ],
            [
                'image' => '5.jpg',
                'title' => 'HATCHING',
                'description' => 'Tinja adalah seorang pesenam berumur 12 tahun yang dengan susah payah berusaha menyenangkan sang ibu yang terobsesi dengan penampilan. Seusai menemukan seekor burung terluka di dalam hutan, ia membawa telurnya ke rumah, mengeraminya di tempat tidur dan merawatnya hingga menetas. Makhluk yang muncul dari dalam telur itu kemudian menjadi sahabat terdekatnya, sekaligus jadi sebuah perwujudan mimpi buruk, yang membawa Tinja ke dalam realitas tak wajar yang tak disadari oleh sang ibu.',
                'duration' => 91,
                'age_rating' => '17+',
                'genre' => 'Horror',
                'director' => 'Hanna Bergholm',
                'writer' => 'Hanna Bergholm, Ilja Rautsi',
                'stars' => 'Siiri Solalinna, Sophia Heikkilä, Jani Volanen',
            ],
            [
                'image' => '6.jpg',
                'title' => 'THE BLACK PHONE',
                'description' => 'Setelah diculik dan dikunci di ruang bawah tanah, seorang anak laki-laki berusia 13 tahun mulai menerima panggilan telepon yang terputus dari korban-korban sebelumnya.',
                'duration' => 103,
                'age_rating' => '17+',
                'genre' => 'Horror, Thriller',
                'director' => 'Scott Derrickson',
                'writer' => 'Joe Hill, Scott Derrickson, C. Robert Cargill',
                'stars' => 'Mason Thames, Madeleine McGraw, Ethan Hawke',
            ],
            [
                'image' => '7.jpg',
                'title' => 'TOP GUN: MAVERICK',
                'description' => "Setelah lebih dari tiga puluh tahun, para awak kembali dengan pesawat tempur baru yang lebih canggih. Dipimpin oleh pilot senior bernama Pete 'Marvick' Mitchell (Tom Cruise).",
                'duration' => 130,
                'age_rating' => 'SU',
                'genre' => 'Action, Drama',
                'director' => 'Joseph Kosinski',
                'writer' => 'Jim Cash, Jack Epps Jr. Peter Craig',
                'stars' => 'Tom Cruise, Jennifer Connelly, Miles Teller',
            ],
        ]);
    }
}
