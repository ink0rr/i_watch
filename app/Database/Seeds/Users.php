<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Users extends Seeder
{
    public function run()
    {
        $this->db->table('users')->insertBatch([
            [
                'name' => 'Tomflynn Beltsazar',
                'email' => 'test@gmail.com',
                'password' => '$2y$10$ZALK9FxVY2f7ImByQs4G8ezkbbzJIm6KKA5KE4ACeloH7dESvaEZ.'
            ],
            [
                'name' => 'Ari Candra',
                'email' => 'test2@gmail.com',
                'password' => '$2y$10$ZALK9FxVY2f7ImByQs4G8ezkbbzJIm6KKA5KE4ACeloH7dESvaEZ.'
            ],
            [
                'name' => 'Joko Sulistyo',
                'email' => 'test3@gmail.com',
                'password' => '$2y$10$ZALK9FxVY2f7ImByQs4G8ezkbbzJIm6KKA5KE4ACeloH7dESvaEZ.'
            ]
        ]);
    }
}
