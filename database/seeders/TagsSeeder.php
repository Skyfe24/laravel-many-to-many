<?php

namespace Database\Seeders;

use App\Models\Tag;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Generator $faker): void
    {
        $tags = ['Css', 'Js', 'PHP', 'html'];
        foreach ($tags as $tag) {
            Tag::create([
                'color' => $faker->hexColor(),
                'label' => $tag
            ]);
        }
    }
}
