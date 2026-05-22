<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB; // <-- Pastikan ini ada

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run()
    {
        // Hapus data lama agar tidak ada duplikat saat seeding ulang
        DB::table('products')->truncate();

        // Data produk yang akan kita masukkan
        $products = [
            [
                'name'=> '[WORKAHOLIC] Boxy Fit Tee',
                'category_id'=> 1, // Pastikan ID kategori ini sesuai dengan yang ada di tabel categories
                'description'=> 'Description for Product 1',
                'slug'=> Str::slug('[WORKAHOLIC] Boxy Fit Tee'), // Menggunakan Str::slug untuk membuat slug yang unik
                'status'=> 'available',
                'meta_title'=> 'Meta Title for Product 1',
                'meta_description'=> 'Meta Description for Product 1',
                'shipping_info'=> 'Shipping info for Product 1',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
            ],
            [
                'name'=> '[WWDWCF] Boxy Fit Tee',
                'category_id'=> 1, // Pastikan ID kategori ini sesuai dengan yang ada di tabel categories
                'description'=> 'Description for Product 2',
                'slug'=> Str::slug('[WWDWCF] Boxy Fit Tee'), // Menggunakan Str::slug untuk membuat slug yang unik
                'status'=> 'available',
                'meta_title'=> 'Meta Title for Product 2',
                'meta_description'=> 'Meta Description for Product 2',
                'shipping_info'=> 'Shipping info for Product 2',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
            ],
            [
                'name'=> '[STD] Boxy Fit Tee',
                'category_id'=> 1, // Pastikan ID kategori ini sesuai dengan yang ada di tabel categories
                'description'=> 'Description for Product 3',
                'slug'=> Str::slug('[STD] Boxy Fit Tee'), // Menggunakan Str::slug untuk membuat slug yang unik
                'status'=> 'available',
                'meta_title'=> 'Meta Title for Product 3',
                'meta_description'=> 'Meta Description for Product 3',
                'shipping_info'=> 'Shipping info for Product 3',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
            ],
            [
                'name'=> '[Minimalism] Boxy Fit Tee',
                'category_id'=> 1, // Pastikan ID kategori ini sesuai dengan yang ada di tabel categories
                'description'=> 'Description for Product 4',
                'slug'=> Str::slug('[Minimalism] Boxy Fit Tee'), // Menggunakan Str::slug untuk membuat slug yang unik
                'status'=> 'available',
                'meta_title'=> 'Meta Title for Product 4',
                'meta_description'=> 'Meta Description for Product 4',
                'shipping_info'=> 'Shipping info for Product 4',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
            ],
            [
                'name'=> '[CREATIVITY] Boxy Fit Tee',
                'category_id'=> 1, // Pastikan ID kategori ini sesuai dengan yang ada di tabel categories
                'description'=> 'Description for Product 5',
                'slug'=> Str::slug('[CREATIVITY] Boxy Fit Tee'), // Menggunakan Str::slug untuk membuat slug yang unik
                'status'=> 'available',
                'meta_title'=> 'Meta Title for Product 5',
                'meta_description'=> 'Meta Description for Product 5',
                'shipping_info'=> 'Shipping info for Product 5',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
            ],
            [
                'name'=> '[CREATIVITY V2] Boxy Fit Tee',
                'category_id'=> 1, // Pastikan ID kategori ini sesuai dengan yang ada di tabel categories
                'description'=> 'Description for Product 6',
                'slug'=> Str::slug('[CREATIVITY V2] Boxy Fit Tee'), // Menggunakan Str::slug untuk membuat slug yang unik
                'status'=> 'available',
                'meta_title'=> 'Meta Title for Product 6',
                'meta_description'=> 'Meta Description for Product 6',
                'shipping_info'=> 'Shipping info for Product 6',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
            ],
            [
                'name'=> '[WORKAHOLIC] Hoodie',
                'category_id'=> 2, // Pastikan ID kategori ini sesuai dengan yang ada di tabel categories
                'description'=> 'Description for Product 7',
                'slug'=> Str::slug('[WORKAHOLIC] Hoodie'), // Menggunakan Str::slug untuk membuat slug yang unik
                'status'=> 'available',
                'meta_title'=> 'Meta Title for Product 7',
                'meta_description'=> 'Meta Description for Product 7',
                'shipping_info'=> 'Shipping info for Product 7',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
            ],
            [
                'name'=> '[MATA] Hoodie',
                'category_id'=> 2, // Pastikan ID kategori ini sesuai dengan yang ada di tabel categories
                'description'=> 'Description for Product 8',
                'slug'=> Str::slug('[MATA] Hoodie'), // Menggunakan Str::slug untuk membuat slug yang unik
                'status'=> 'available',
                'meta_title'=> 'Meta Title for Product 8',
                'meta_description'=> 'Meta Description for Product 8',
                'shipping_info'=> 'Shipping info for Product 8',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
            ],
            [
                'name'=> '[KREATIF] Hoodie',
                'category_id'=> 2, // Pastikan ID kategori ini sesuai dengan yang ada di tabel categories
                'description'=> 'Description for Product 9',
                'slug'=> Str::slug('[KREATIF] Hoodie'), // Menggunakan Str::slug untuk membuat slug yang unik
                'status'=> 'available',
                'meta_title'=> 'Meta Title for Product 9',
                'meta_description'=> 'Meta Description for Product 9',
                'shipping_info'=> 'Shipping info for Product 9',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
            ],
            [
                'name'=> '[DRMTSTD] Hoodie',
                'category_id'=> 2, // Pastikan ID kategori ini sesuai dengan yang ada di tabel categories
                'description'=> 'Description for Product 10',
                'slug'=> Str::slug('[DRMTSTD] Hoodie'), // Menggunakan Str::slug untuk membuat slug yang unik
                'status'=> 'available',
                'meta_title'=> 'Meta Title for Product 10',
                'meta_description'=> 'Meta Description for Product 10',
                'shipping_info'=> 'Shipping info for Product 10',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
            ],
            [
                'name'=> '[DARIMATA] Hoodie',
                'category_id'=> 2, // Pastikan ID kategori ini sesuai dengan yang ada di tabel categories
                'description'=> 'Description for Product 11',
                'slug'=> Str::slug('[DARIMATA] Hoodie'), // Menggunakan Str::slug untuk membuat slug yang unik
                'status'=> 'available',
                'meta_title'=> 'Meta Title for Product 11',
                'meta_description'=> 'Meta Description for Product 11',
                'shipping_info'=> 'Shipping info for Product 11',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
            ],
            [
                'name'=> '[HUMANS] Crewneck',
                'category_id'=> 3, // Pastikan ID kategori ini sesuai dengan yang ada di tabel categories
                'description'=> 'Description for Product 12',
                'slug'=> Str::slug('[HUMANS] Crewneck'), // Menggunakan Str::slug untuk membuat slug yang unik
                'status'=> 'available',
                'meta_title'=> 'Meta Title for Product 12',
                'meta_description'=> 'Meta Description for Product 12',
                'shipping_info'=> 'Shipping info for Product 12',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
            ],
            [
                'name'=> '[HAPPINNES] Crewneck',
                'category_id'=> 3, // Pastikan ID kategori ini sesuai dengan yang ada di tabel categories
                'description'=> 'Description for Product 13',
                'slug'=> Str::slug('[HAPPINNES] Crewneck'), // Menggunakan Str::slug untuk membuat slug yang unik
                'status'=> 'available',
                'meta_title'=> 'Meta Title for Product 13',
                'meta_description'=> 'Meta Description for Product 13',
                'shipping_info'=> 'Shipping info for Product 13',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
            ],
            [
                'name'=> '[DRMTSTD] Crewneck',
                'category_id'=> 3, // Pastikan ID kategori ini sesuai dengan yang ada di tabel categories
                'description'=> 'Description for Product 14',
                'slug'=> Str::slug('[DRMTSTD] Crewneck'), // Menggunakan Str::slug untuk membuat slug yang unik
                'status'=> 'available',
                'meta_title'=> 'Meta Title for Product 14',
                'meta_description'=> 'Meta Description for Product 14',
                'shipping_info'=> 'Shipping info for Product 14',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
            ],
            [
                'name'=> '[CREA-SOL] Crewneck',
                'category_id'=> 3, // Pastikan ID kategori ini sesuai dengan yang ada di tabel categories
                'description'=> 'Description for Product 15',
                'slug'=> Str::slug('[CREA-SOL] Crewneck'), // Menggunakan Str::slug untuk membuat slug yang unik
                'status'=> 'available',
                'meta_title'=> 'Meta Title for Product 15',
                'meta_description'=> 'Meta Description for Product 15',
                'shipping_info'=> 'Shipping info for Product 15',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
            ]
        ];
        // Masukkan data ke dalam tabel 'products'
        DB::table('products')->insert($products);
    }
}
