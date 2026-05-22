<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $possibleColors = ['#000000', '#003b87', '#ffffff', '#ff0000', '#00ff00', '#0000ff', '#ffff00', '#ff00ff', '#00ffff'];

        return [
            'name' => $this->faker->word(),
            'price' => $this->faker->randomFloat(2, 10, 1000), // Random price between 10 and 1000
            'rating' => $this->faker->randomFloat(1, 1, 5), // Random rating between 1 and 5
            'color' => $this->faker->colorName(),
            'image' => $this->faker->imageUrl(640, 480, 'product'),
            'date' => $this->faker->date(),
            'setbg' => $this->faker->colorName(),
            'variant_color' => json_encode(['#000000', '#003b87', '#ffffff']), // Example variant colors
            'description' => $this->faker->sentence(20), // Random description
            'active_color' => $this->faker->colorName(),
            'category' => $this->faker->word(),
            'data_color' => $this->faker->colorName(),
            'SKU' => $this->faker->unique()->bothify('SKU#####'), // Unique SKU
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
