<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Model>
 */
class ReviewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "user_id"=> $this->faker->numberBetween(1,10), // Asumsikan ada 10 user
            "product_id"=> $this->faker->numberBetween(1, 15), //
            "rating"=> $this->faker->numberBetween(3, 5), // Rating antara 1 sampai 5
            "comment"=> $this->faker->sentence(10), // Komentar acak
            "status"=> 'Approved', // Status review, bisa diubah sesuai kebutuhan
            "created_at"=> now(), // Tanggal dibuat
            "updated_at"=> now(), // Tanggal diperbarui
        ];
    }
}
