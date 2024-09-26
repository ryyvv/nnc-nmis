<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Seeder\timestamp;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Model\User;

class LncKeyActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lnc_key_activities')->insert([
            [
                'name' => 'Capacity Development',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Program Planning',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Service Delivery',
                'created_at' => now(),
                'updated_at' => now()
            ]


        ]);
    }
}