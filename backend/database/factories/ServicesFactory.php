<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Services;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Services>
 */
class ServicesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $services = Services::factory()->create();

        return [
            'thumbnail' => $this->faker->imageUrl(200, 200, 'people', true, 'Faker'),
            'title' => $this->faker->title(),
            'description' => $this->faker->description()

        ];
    }
}
