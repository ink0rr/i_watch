<?php

namespace App\Validation;

use App\Models;

class UserRules
{
    public function validateUser(string $str, string $fields, array $data): bool
    {
        $users = model(Models\Users::class);

        $user = $users->where('email', $data['email'])
            ->first();

        if (!$user)
            return false;

        return password_verify($data['password'], $user['password']);
    }
}