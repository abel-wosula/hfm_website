<?php

namespace App\GraphQL\Mutations;

use App\Models\Service;

class CreateServiceMutation
{
    public function createService($_, $args)
    {
        //Insert data into services table
        $service = new Service();
        $service->title = $args['title'];
        $service->description = $args['description'];
        $service->thumbnail = $args['thumbnail'];
        $service->save();


        return [
            'message' => 'Service created successfully!',
            'service' => $service,
        ];
    }
}
