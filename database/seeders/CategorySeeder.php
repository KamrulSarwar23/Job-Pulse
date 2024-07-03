<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Str;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 12) as $index) {
            $name = $faker->word;
            DB::table('categories')->insert([
                'name' => ucfirst($name),
                'slug' => Str::slug($name),
                'icon' => $faker->imageUrl(50, 50, 'business', true, 'Faker'),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
