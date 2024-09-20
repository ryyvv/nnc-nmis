<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str; 

class otherroleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
 

        DB::table('userroles')->insert([
            [ 
                'id' => '1',
                'userrole' => 'Central Admin',
                'usercode' => 'centraladmin', 
            ],
            [ 
                'id' => '2',
                'userrole' => 'Central Officer',
                'usercode' => 'centralofficer', 
            ],
            [ 
                'id' => '3',
                'userrole' => 'Central Staff',
                'usercode' => 'centralstaff', 
            ],
            [ 
                'id' => '4',
                'userrole' => 'Regional Officer',
                'usercode' => 'Regionalofficer', 
            ],
            [ 
                'id' => '5',
                'userrole' => 'Regional Staff',
                'usercode' => 'Regionalstaff', 
            ],
            [ 
                'id' => '6',
                'userrole' => 'Provincial Officer',
                'usercode' => 'Provincialofficer', 
            ],
            [ 
                'id' => '7',
                'userrole' => 'Provincial Staff',
                'usercode' => 'Provincialstaff', 
            ],
            [ 
                'id' => '8',
                'userrole' => 'City/Municipal Officer',
                'usercode' => 'centralofficer', 
            ],
            [ 
                'id' => '9',
                'userrole' => 'City/Municipal Staff',
                'usercode' => 'City/Municipal', 
            ], 
            [ 
                'id' => '10',
                'userrole' => 'Barangay Scholar',
                'usercode' => 'Barangayscholar', 
            ],
            [ 
                'id' => '11',
                'userrole' => 'Public User',
                'usercode' => 'Publicuser', 
            ],

        ]);


    }
}
