<?php

namespace App\GraphQL\Mutations;

use App\Models\User;

class DeleteUserMutation
{
    public function deleteUser($_, array $args)
    {
        $input = $args; // @spread will unpack input here

        $user = User::find($input['id']);

        if (!$user) {
            return [
                'message' => 'User not found',
                'user' => null,
            ];
        }

        $user->delete();

        return [
            'message' => 'User deleted successfully',
            'user' => $user, // return the deleted user for consistency
        ];
    }
}
