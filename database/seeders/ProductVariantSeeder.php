<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductVariants;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ProductVariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Menonaktifkan pengecekan foreign key untuk truncate
        // Schema::disableForeignKeyConstraints();
        DB::table('product_variants')->truncate();
        // Schema::enableForeignKeyConstraints();

        /**
         * Konfigurasi dasar untuk setiap produk.
         * Skrip akan secara otomatis membuat semua kombinasi dari 'colors' dan 'sizes'.
         */
        $productsConfig = [
            // product_id => [konfigurasi]
            1 => [
                'sku_base' => 'DRM-WHC', 'price' => 140000, 'sale_price' => 130000, 'stock' => 20,
                'colors' => [['name' => 'Red', 'hex' => '#FF0000']],
                'sizes' => ['S', 'M', 'L', 'XL'],
            ],
            2 => [
                'sku_base' => 'DRM-WWD', 'price' => 160000, 'sale_price' => 150000, 'stock' => 15,
                'colors' => [['name' => 'Blue', 'hex' => '#0000FF']],
                'sizes' => ['S', 'M', 'L', 'XL'],
            ],
            3 => [
                'sku_base' => 'DRM-STD', 'price' => 140000, 'sale_price' => 130000, 'stock' => 20,
                'colors' => [['name' => 'Red', 'hex' => '#FF0000']],
                'sizes' => ['S', 'M', 'L', 'XL'],
            ],
            4 => [
                'sku_base' => 'DRM-CRV', 'price' => 160000, 'sale_price' => 150000, 'stock' => 15,
                'colors' => [['name' => 'Blue', 'hex' => '#0000FF']],
                'sizes' => ['S', 'M', 'L', 'XL'],
            ],
            5 => [
                'sku_base' => 'DRM-CRV2', 'price' => 140000, 'sale_price' => 130000, 'stock' => 20,
                'colors' => [['name' => 'Red', 'hex' => '#FF0000']],
                'sizes' => ['S', 'M', 'L', 'XL'],
            ],
            6 => [
                'sku_base' => 'DRM-SPR', 'price' => 160000, 'sale_price' => 150000, 'stock' => 15,
                'colors' => [['name' => 'Blue', 'hex' => '#0000FF']],
                'sizes' => ['S', 'M', 'L', 'XL'],
            ],
            7 => [
                'sku_base' => 'DRM-MTA-H', 'price' => 160000, 'sale_price' => 150000, 'stock' => 15,
                'colors' => [['name' => 'Blue', 'hex' => '#0000FF']],
                'sizes' => ['L', 'XL'],
            ],
            8 => [
                'sku_base' => 'DRM-MTA-H', 'price' => 160000, 'sale_price' => 150000, 'stock' => 15,
                'colors' => [['name' => 'Blue', 'hex' => '#0000FF']],
                'sizes' => ['L', 'XL'],
            ],
            9 => [
                'sku_base' => 'DRM-WHC-H', 'price' => 160000, 'sale_price' => 150000, 'stock' => 15,
                'colors' => [['name' => 'Blue', 'hex' => '#0000FF']],
                'sizes' => ['L', 'XL'],
            ],
            10 => [
                'sku_base' => 'DRM-WHC-H', 'price' => 160000, 'sale_price' => 150000, 'stock' => 15,
                'colors' => [['name' => 'Blue', 'hex' => '#0000FF']],
                'sizes' => ['L', 'XL'],
            ],
            11 => [
                'sku_base' => 'DRM-STD-H', 'price' => 160000, 'sale_price' => 150000, 'stock' => 30,
                'colors' => [['name' => 'Blue', 'hex' => '#0000FF']],
                'sizes' => ['L', 'XL'],
            ],
            12 => [
                'sku_base' => 'DRM-DRM-C', 'price' => 160000, 'sale_price' => 150000, 'stock' => 25,
                'colors' => [['name' => 'Blue', 'hex' => '#0000FF']],
                'sizes' => ['L', 'XL'],
            ],
            13 => [
                'sku_base' => 'DRM-DRM-C', 'price' => 160000, 'sale_price' => 150000, 'stock' => 15,
                'colors' => [['name' => 'Blue', 'hex' => '#0000FF']],
                'sizes' => ['L', 'XL'],
            ],
            14 => [
                'sku_base' => 'DRM-WHC-C', 'price' => 160000, 'sale_price' => 150000, 'stock' => 15,
                'colors' => [['name' => 'Blue', 'hex' => '#0000FF']],
                'sizes' => ['L', 'XL'],
            ],
            15 => [
                'sku_base' => 'DRM-WHC-C', 'price' => 160000, 'sale_price' => 150000, 'stock' => 15,
                'colors' => [['name' => 'Blue', 'hex' => '#0000FF']],
                'sizes' => ['L', 'XL'],
            ],
        ];

        $skuCounter = 1;

        // Loop untuk setiap produk dalam array konfigurasi
        foreach ($productsConfig as $productId => $config) {
            // Loop untuk setiap warna
            foreach ($config['colors'] as $color) {
                // Loop untuk setiap ukuran
                foreach ($config['sizes'] as $size) {
                    
                    // Membuat record baru di tabel product_variants
                    ProductVariants::create([
                        'product_id' => $productId,
                        'sku' => 'SKU' . str_pad($skuCounter++, 3, '0', STR_PAD_LEFT),
                        'price' => $config['price'],
                        'sale_price' => $config['sale_price'],
                        'stock' => $config['stock'],
                        'size' => $size,
                        'color_name' => $color['name'],
                        'color_hex' => $color['hex'],
                    ]);
                }
            }
        }
    }
}
