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
                'password' => password_hash('test1234', PASSWORD_DEFAULT)
            ],
            [
                'name' => 'Ari Candra',
                'email' => 'test2@gmail.com',
                'password' => password_hash('test1234', PASSWORD_DEFAULT)
            ],
            [
                'name' => 'Joko Sulistyo',
                'email' => 'test3@gmail.com',
                'password' => password_hash('test1234', PASSWORD_DEFAULT)
            ]
        ]);
    }
}
