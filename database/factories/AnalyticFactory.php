<?php

namespace Database\Factories;

use App\Models\Photo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Analytic>
 *
 * Note: `ip`, `device`, browser/platform columns are guarded on the model but
 * factories bypass mass-assignment protection, so they are set here directly.
 */
class AnalyticFactory extends Factory
{
    public function definition(): array
    {
        return [
            'ip' => fake()->ipv4(),
            'device' => 'Desktop',
            'brand_family' => 'Unknown',
            'brand_model' => 'Unknown',
            'browser_family' => 'Chrome',
            'browser_version' => '120.0',
            'platform_family' => 'Linux',
            'platform_version' => '1.0',
            'user_id' => User::factory(),
            'photo_id' => Photo::factory(),
        ];
    }
}
