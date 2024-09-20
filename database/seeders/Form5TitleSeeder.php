<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str; 

class Form5TitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
 

        DB::table('form5_title')->insert([
            [ 
                'name' => 'PNAO', 
            ],
            [ 
                'name' => 'CMNAO', 
            ],
            [ 
                'name' => 'DNPC', 
            ],
            [ 
                'name' => 'ROBNC', 
            ],
            [ 
                'name' => 'CMNPC', 
            ],

        ]);


    }
}
