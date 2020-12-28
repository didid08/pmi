<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role' => '5',
            'email' => 'master@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('master'),
            'remember_token' => Str::random(10),
        ]);
        DB::table('users')->insert([
            'role' => '0',
            'email' => 'guest',
            'email_verified_at' => now(),
            'password' => Hash::make('guest'),
            'remember_token' => Str::random(10),
        ]);
        /*DB::table('users')->insert([
            'role' => '4',
            'email' => 'user.2@outlook.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        DB::table('users')->insert([
            'role' => '3',
            'email' => 'user.3@outlook.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        DB::table('users')->insert([
            'role' => '2',
            'email' => 'user.4@outlook.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        DB::table('users')->insert([
            'role' => '1',
            'email' => 'user.5@outlook.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);*/
    }
}
