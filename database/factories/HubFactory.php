<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hub>
 *
 * WARNING: This factory only inserts a row into the primary `hubs` table. It
 * does NOT provision the tenant database / DB user. For a fully working hub
 * (tenant DB + tables) use the ProvisionsHubs::createHub() test helper instead.
 * Use this factory for admin-context tests that merely list/paginate hubs.
 */
class HubFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => 'hub'.fake()->unique()->numerify('######'),
            'teacher_id' => User::factory()->teacher(),
            'password' => 'secret'.fake()->numberBetween(1000, 9999),
            'generation' => 1,
            'query_level' => 1,
        ];
    }
}
