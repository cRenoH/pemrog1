<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Kosongkan tabel sebelum diisi
        DB::table('roles')->truncate();

        // Masukkan data peran (role) yang statis
        DB::table('roles')->insert([
            ['name' => 'Registered'],
            ['name' => 'Unregistered'],
            // Anda bisa menambahkan peran lain di sini jika perlu, misalnya 'Admin'
            // ['name' => 'Admin'], 
        ]);
    }
}
