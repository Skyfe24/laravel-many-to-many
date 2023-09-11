<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Helpers
use Faker\Generator as Faker;

class TechnologiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 5; $i++) {
            Technology::create([
                'name' => $faker->unique()->word(),
                'company' => $faker->company(),
            ]);
        }
    }
}
