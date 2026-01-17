<?php

namespace App\GraphQL\Mutations;

use App\Models\Team;

class CreateTeamMutation
{
    public function createTeam($_, $args)
    {
        $team = new Team();
        $team->thumbnail = $args['thumbnail'];
        $team->first_name = $args['first_name'];
        $team->last_name = $args['last_name'];
        $team->description = $args['description'];
        $team->title = $args['title'];
        $team->save();


        return [
            'message' => 'Team created successfully!',
            'team' => $team,
        ];
    }
}
