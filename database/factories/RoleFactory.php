<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    protected $model = Role::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Secara default, kita bisa membuat nama peran secara acak.
        // Namun, kita akan meng-override ini di dalam Seeder.
        return [
            'name' => $this->faker->word(),
        ];
    }
}
