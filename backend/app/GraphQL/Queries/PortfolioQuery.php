<?php

namespace App\GraphQL\Queries;

use App\Models\Portfolio;

class PortfolioQuery
{
    public function fetchPortfolios($_, $args)
    {
        $portfolios = Portfolio::query()
            ->orderBy('title', 'DESC')
            ->paginate(10)
            ->get(); // Fetch the portfolios

        return $portfolios;
    }
}
