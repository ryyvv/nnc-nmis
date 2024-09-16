<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Model\User;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
 
        DB::table('users')->insert([
            'Firstname' => 'ryy', 
            'Middlename' => 'Nenia',
            'Lastname' => 'Morales',
            'Region' => '13' ,
            'Province' => '13801',
            'city_municipal' => '13801100',
            'agency_office_lgu' => 'Dingras ',
            'Division_unit' => 'Accounting',
            'barangay' => '1380110001',
            'role' => '1',
            'designation' => 'NAO',  
            'status' => '1',
            'userstatus' => '1',
            'useractivestatus' => '1',
            'otherrole' => '1',
            'email' => 'ryy@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('11111111'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
