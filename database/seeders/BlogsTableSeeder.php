<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\User;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $userIds = User::where(['role' => ['admin', 'company']])->pluck('id')->toArray(); // Get all user IDs from the User model

        foreach (range(1, 12) as $index) {
            DB::table('blogs')->insert([
                'user_id' => $faker->randomElement($userIds),
                'image' => $faker->imageUrl(),
                'title' => $faker->sentence,
                'description' => $faker->paragraph,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
