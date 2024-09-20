<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str; 

class UserRequestStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
 

        DB::table('userrequeststatus')->insert([
            [ 
                'id' => '1',
                'requeststatus' => 'Approved',   
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ 
                'id' => '2', 
                'requeststatus' => 'Declined',   
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ 
                'id' => '3', 
                'status' => 'Pending',   
                'created_at' => now(),
                'updated_at' => now()
            ]
        
        ]);

     

    }
}
