<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str; 

class UserActivestatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
 

        DB::table('userstatus')->insert([
            [ 
                'id' => '1',
                'status' => 'Active',   
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ 
                'id' => '2', 
                'status' => 'Inactive',  
                'created_at' => now(),
                'updated_at' => now()
            ]
        
        ]);

     

    }
}
