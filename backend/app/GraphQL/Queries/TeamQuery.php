<?php

namespace App\GraphQL\Queries;

use App\Models\Team;

class TeamQuery
{
    public function fetchTeams($_, $args)
    {
        $teams = Team::query()
            ->orderBy('title', 'DESC')
            ->paginate(10)
            ->get(); // Fetch the portfolios

        return $teams;
    }
}
