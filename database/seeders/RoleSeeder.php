<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str; 

class Roleseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
 

        DB::table('roles')->insert([
            [ 
                'id' => '1',
                'name' => 'Admin', 
                'codename' => 'Admin',  
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ 
                'id' => '2',
                'name' => 'Public User', 
                'codename' => 'publicuser',  
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ 
                'id' => '3',
                'name' => 'User Under Review', 
                'codename' => 'userunderreview',  
                'created_at' => now(),
                'updated_at' => now()
            ],
           
        ]);

     

    }
}
