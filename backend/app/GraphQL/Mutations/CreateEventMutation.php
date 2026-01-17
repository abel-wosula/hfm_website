<?php

namespace App\GraphQL\Mutations;

use App\Models\Event;

class CreateEventMutation
{
    public function createEvent($_, $args)
    {
        $event = new Event();
        $event->id = $args['id'];
        $event->title = $args['title'];
        $event->description = $args['description'];
        $event->location = $args['location'];
        $event->save();


        return [
            'message' => 'Event created successfully!',
            'event' => $event,
        ];
    }
}
