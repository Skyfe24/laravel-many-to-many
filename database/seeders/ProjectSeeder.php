<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Models
use App\Models\Project;

//Helpers
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 5; $i++) {
            Project::create([
                'name' => $faker->unique()->word(),
                'description' => $faker->paragraph(),
                'link' => $faker->sentence(),
                'image' => $faker->imageUrl(640, 480, 'animals', true),
                'tag_id' => rand(1, 4)
            ]);
        }
    }
}
