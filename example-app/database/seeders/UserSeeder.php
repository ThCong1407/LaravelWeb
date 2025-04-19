<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    const MAX_RECORDS = 50;
    public function run(): void
    {
        //Truncate table
        DB::table('users')->truncate();
        //Insert data
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123456'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        for($i = 2; $i < self::MAX_RECORDS; $i++) {
            DB::table('users')->insert([
                [
                    'name' => 'user' .$i,
                    'email' => "admin{$i}@gmail.com",
                    'email_verified_at' => now(),
                    'password' => Hash::make('123456'),
                    'remember_token' => Str::random(10),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]);
        }
    }
}
