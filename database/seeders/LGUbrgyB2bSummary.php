<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LGUbrgyB2bSummary extends Seeder
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
            ]
        ]);
    }
}
