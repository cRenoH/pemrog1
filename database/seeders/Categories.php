<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Categories extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->truncate(); // Kosongkan tabel sebelum seeding
        
        $categories = [
            [
                'id' => 1,
                'name' => 'T-Shirt',
                'slug' => 't-shirt',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Hoodie',
                'slug' => 'hoodie',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Crewneck',
                'slug' => 'crewneck',
                'created_at' => now(),
                'updated_at'=> now(),
            ]
             // Tambahkan kategori lain sesuai kebutuhan
        ];

        DB::table('categories')->insert($categories);
    }
}
