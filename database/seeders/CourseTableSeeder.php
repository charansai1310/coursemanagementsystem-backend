<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CourseTableSeeder extends Seeder
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
            Course::create([
                'name' => $faker->word,
                'description' => $faker->paragraph,
                'instructorid' => $faker->randomNumber(),
                'programid' => $faker->randomNumber(),
                'start' => $faker->date,
                'end' => $faker->date

            ]);
        }
    }
}
