<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class AuthMutator
{
    public function loginAdmin($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $credentials = ['email' => $args['email'], 'password' => $args['password']];

        if (!Auth::attempt($credentials)) {
            return [
                'token' => "",
                'user' => null,
                'message' => 'Invalid credentials'
            ];
        }

        $user = Auth::user();
        $token = $user->createToken('adminToken')->plainTextToken;

        return [
            'token' => $token ?: "",
            'user' => $user
        ];
    }
}
