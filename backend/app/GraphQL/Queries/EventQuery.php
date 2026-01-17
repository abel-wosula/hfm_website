<?php

namespace App\GraphQL\Queries;

use App\Models\Event;

class EventQuery
{
    public function fetchEvents($_, $args)
    {
        $events = Event::query()
            ->orderBy('created_at', 'DESC')
            ->paginate(10)
            ->get(); // Fetch the events

        return $events;
    }
}
