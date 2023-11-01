<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        $password = Hash::make('password');

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'firstname' => $faker->firstName,
                'lastname' => $faker->lastName,
                'email' => $faker->email,
                'password' => $password,
                'dob' => $faker->date,
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'role' => "student",
            ]);
        }
    }
}
