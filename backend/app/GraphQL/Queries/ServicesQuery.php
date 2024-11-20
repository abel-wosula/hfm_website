<?php

namespace App\GraphQL\Queries;

use App\Models\Service;

class ServicesQuery
{
    public function fetchServices($_, $args)
    {
        $services = Service::query()
            ->orderBy('title', 'DESC')
            ->get(); // Fetch the services

        return $services;
    }
}
