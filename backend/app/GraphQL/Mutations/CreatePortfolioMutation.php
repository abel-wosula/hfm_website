<?php

namespace App\GraphQL\Mutations;

use App\Models\Portfolio;

class CreatePortfolioMutation
{
    public function createPortfolio($_, $args)
    {
        $portfolio = new Portfolio();
        $portfolio->title = $args['title'];
        $portfolio->description = $args['description'];
        $portfolio->thumbnail = $args['thumbnail'];
        $portfolio->yt_link = $args['yt_link'];
        $portfolio->save();


        return [
            'message' => 'Portfolio created successfully!',
            'portfolio' => $portfolio,
        ];
    }
}
