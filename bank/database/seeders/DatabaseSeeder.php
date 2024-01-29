<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

  

        DB::table('users')->insert([
            'name' => 'adam',
            'email' => 'adam@gmail.com',
            'password' => Hash::make('123'),
        ]);   
        
        DB::table('testuojuosi')->insert([
            'name' => 'adam',
            'email' => 'adam@gmail.com',
            'password' => Hash::make('123'),
        ]);

    }
}
