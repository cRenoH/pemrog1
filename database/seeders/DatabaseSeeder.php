<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Order;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Orders;
use App\Models\Reviews;
use App\Models\ProductVariants;
use Illuminate\Database\Seeder;
use Database\Factories\OrdersFactory;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Schema::disableForeignKeyConstraints();
        
         $this->call([
            ProductSeeder::class, // <-- TAMBAHKAN BARIS INI
            ProductImageSeed::class, // <-- TAMBAHKAN BARIS INI
            ProductVariantSeeder::class, // <-- TAMBAHKAN BARIS INI
            Categories::class,
            UserSeeder::class,
             // <-- TAMBAHKAN BARIS INI
            // Anda bisa menambahkan seeder lain di sini jika ada
        ]);

        
        User::factory(250)->create();

        Order::factory(50)->create()->each(function ($order) {
        // Ambil 1 sampai 3 varian produk secara acak untuk dimasukkan ke pesanan ini
        $variants = ProductVariants::inRandomOrder()->limit(rand(1, 3))->get();

        foreach ($variants as $variant) {
            $order->items()->create([
                'variant_id' => $variant->id,
                'quantity' => rand(1, 2),
                'price' => $variant->price, // Ambil harga dari varian
            ]);
        }
    }); 
        Reviews::factory(500)->create();
    
    }
}
