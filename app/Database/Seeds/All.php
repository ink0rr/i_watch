<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class All extends Seeder
{
    public function run()
    {
        $this->call('Movies');
        $this->call('Studios');
        $this->call('Seats');
        $this->call('Screenings');
        $this->call('Reservations');
    }
}
