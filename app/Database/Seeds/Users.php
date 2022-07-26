<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Users extends Seeder
{
    public function run()
    {
        $this->db->table('users')->insertBatch([
            [
                'name' => 'IOO Watch',
                'email' => 'admin@admin.com',
                'password' => '$2y$10$IiVWRuwu1T2BZSVzzkE31u5kyJqr0jpqvhxH3d27uX519R4XermV2',
                'status' => 1
            ],
            [
                'name' => 'Tomflynn Beltsazar',
                'email' => 'test@gmail.com',
                'password' => '$2y$10$ZALK9FxVY2f7ImByQs4G8ezkbbzJIm6KKA5KE4ACeloH7dESvaEZ.',
                'status' => 0
            ],
            [
                'name' => 'Ari Candra',
                'email' => 'test2@gmail.com',
                'password' => '$2y$10$ZALK9FxVY2f7ImByQs4G8ezkbbzJIm6KKA5KE4ACeloH7dESvaEZ.',
                'status' => 0
            ],
            [
                'name' => 'Joko Sulistyo',
                'email' => 'test3@gmail.com',
                'password' => '$2y$10$ZALK9FxVY2f7ImByQs4G8ezkbbzJIm6KKA5KE4ACeloH7dESvaEZ.',
                'status' => 0
            ]
        ]);
    }
}
