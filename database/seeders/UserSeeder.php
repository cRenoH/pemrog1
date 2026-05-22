<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table("users")->truncate();
        DB::table("users")->insert([
            [
                'first_name' => 'Danang Yuda',
                'last_name' => 'Prako(lanjutsendiri)',
                'email' => 'danangketuapshlit@prako.co.id',
                'is_admin' => '1',
                'phone_number' => '08312129212',
                'password' => Hash::make('danangNgocok'),
                'remember_token' => '555512',
                'provider_name' => 'Klaten',
                'provider_id' => '555555',
                'created_at' => now(),
                'updated_at'=> now(),
            ],
            [
                'first_name' => 'Prima',
                'last_name' => 'Imacul',
                'email' => 'PrimapenebasK@prako.co.id',
                'is_admin' => '1',
                'phone_number' => '0832138089',
                'password' => Hash::make('LUVDANANG'),
                'remember_token' => '555523',
                'provider_name' => 'Sragen',
                'provider_id' => '5656565',
                'created_at' => now(),
                'updated_at'=> now(),
            ],
            [
                'first_name' => 'Thufaiq',
                'last_name' => 'Aqbil',
                'email' => 'Akujawa@prako.co.id',
                'is_admin' => '1',
                'phone_number' => '08920291283',
                'password' => Hash::make('DanangLUV'),
                'remember_token' => '5534231',
                'provider_name' => 'Madura',
                'provider_id' => '566657',
                'created_at' => now(),
                'updated_at'=> now(),
            ],
            [
                'first_name' => 'Reno v',
                'last_name' => 'ClayPool',
                'email' => 'Renook@prako.co.id',
                'is_admin' => '1',
                'phone_number' => '08442312309',
                'password' => Hash::make('passwordaja'),
                'remember_token' => '598302',
                'provider_name' => 'Sini',
                'provider_id' => '555555',
                'created_at' => now(),
                'updated_at'=> now(),
            ],
            [
                'first_name' => 'Aldino Damas',
                'last_name' => 'S',
                'email' => 'luvDang@prako.co.id',
                'is_admin' => '1',
                'phone_number' => '08842381239',
                'password' => Hash::make('DANANG55555'),
                'remember_token' => '5589123',
                'provider_name' => 'gamudeng',
                'provider_id' => '555555',
                'created_at' => now(),
                'updated_at'=> now(),
            ]
        ]);

    }
}
