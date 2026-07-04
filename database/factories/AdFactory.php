<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ad>
 */
class AdFactory extends Factory
{
    public function definition(): array
    {
        return [
            'priority' => fake()->numberBetween(1, 10),
            'name' => fake()->company(),
            'type' => fake()->randomElement(['banner', 'photo']),
            'url' => fake()->url(),
            'img' => 'ads/'.fake()->uuid().'.jpg',
            'query' => 'select * from photos limit 1',
        ];
    }
}
