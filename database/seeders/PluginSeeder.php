<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PluginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('plugins')->insert([

            [
                'name' => 'blog',
                'slug' => 'blog',
                'status' => '1',

            ],

            [
                'name' => 'page',
                'slug' => 'page',
                'status' => '1',
            ],

            [
                'name' => 'employee',
                'slug' => 'employee',
                'status' => '1',
            ]
        ]);
    }
}
