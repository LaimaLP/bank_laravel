<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;


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

        $faker = Faker::create();
        $personalNumber = $faker->numberBetween(1,5);
        foreach (range(1, 20) as $i) {
$firstDigit = $faker->numberBetween(1, 6);
$yearDigit = str_pad($faker->numberBetween(0, 9), 2, '0', STR_PAD_LEFT);
$monthDigit = str_pad($faker->numberBetween(0, 11), 2, '0', STR_PAD_LEFT);
$dayDigit = str_pad($faker->numberBetween(0, 31), 2, '0', STR_PAD_LEFT);
$lastFourDigit = str_pad($faker->numberBetween(1, 9), 4, '0', STR_PAD_LEFT);

$personalNumber = $firstDigit. $yearDigit. $monthDigit. $dayDigit. $lastFourDigit;


            DB::table('clients')->insert([
                'name' => $faker->firstName,
                'surname' => $faker->lastName,
                'personalNumber' => $personalNumber,
                // 'personalNumber' => $faker->creditCardNumber  ,
            ]);
        }



        DB::table('users')->insert([
            'name' => 'adam',
            'email' => 'adam@gmail.com',
            'password' => Hash::make('123'),
        ]);
    }
}
