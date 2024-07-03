<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class CompanyUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 11) as $index) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'username' => $faker->userName,
                'phone' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'google_id' => $faker->uuid,
                'role' => 'company',
                'status' => 'active',
                'email_verified_at' => now(),
                'password' => Hash::make('password'), // Replace 'password' with a secure password
                'remember_token' => \Illuminate\Support\Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
