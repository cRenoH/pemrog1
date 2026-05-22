<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Order::class;
    public function definition(): array
    {
        $subtotal = $this->faker->numberBetween(50000, 1000000);
        $shippingCost = 15000;
        $discountAmount = $this->faker->randomElement([0, 10000, 25000]);

        return [
            // Mengambil ID user secara acak. Asumsikan ada user dengan ID 1-10.
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),

            // Membuat nomor pesanan unik
            'order_number' => 'ORD-' . strtoupper(Str::random(10)),

            // Data finansial
            'subtotal' => $subtotal,
            'shipping_cost' => $shippingCost,
            'discount_amount' => $discountAmount,
            'total_amount' => ($subtotal + $shippingCost) - $discountAmount,

            // Alamat pengiriman menggunakan data palsu dari Faker
            'shipping_address' => $this->faker->address(),

            // Memilih metode pembayaran secara acak
            'payment_method' => $this->faker->randomElement(['BCA Virtual Account', 'GoPay', 'DANA', 'Credit Card']),
            
            // Memilih status pesanan secara acak
            'status' => $this->faker->randomElement(['waiting_payment', 'processing', 'shipped', 'completed', 'cancelled']),
            
            // Tanggal jatuh tempo pembayaran (bisa null)
            'payment_due_at' => $this->faker->optional()->dateTimeBetween('+1 hours', '+24 hours'),

            // Token pembayaran (bisa null)
            'payment_token' => $this->faker->optional()->md5(),
        ];
    }
}
