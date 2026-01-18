<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUserMutation
{
    public function createUser($_, array $args)
    {
        // No $args['input'], fields are already spread
        $user = User::create([
            'name' => $args['name'],
            'email' => $args['email'],
            'password' => Hash::make($args['password']),
            'role' => $args['role'],
        ]);

        return [
            'message' => 'User created successfully!',
            'user' => $user,
        ];
    }
}
