<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        // Get all user and category IDs
        $userIds = User::all()->pluck('id')->toArray();
        $categoryIds = Category::all()->pluck('id')->toArray();

        foreach (range(1, 50) as $index) {
            DB::table('jobs')->insert([
                'name' => $faker->jobTitle,
                'user_id' => $faker->randomElement($userIds),
                'category_id' => $faker->randomElement($categoryIds),
                'address' => $faker->address,
                'salary' => $faker->numberBetween(30000, 100000),
                'end_date' => $faker->dateTimeBetween('now', '+1 year'),
                'vacancy' => $faker->numberBetween(1, 10),
                'description' => $faker->paragraph,
                'responsibility' => $faker->paragraph,
                'qualifications' => $faker->paragraph,
                'benefits' => $faker->sentence,
                'business' => $faker->company,
                'office_time' => $faker->randomElement(['fulltime', 'partime']),
                'office_from' => $faker->randomElement(['remote', 'office']),
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
