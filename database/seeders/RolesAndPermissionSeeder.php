<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Spatie Package added
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();


        // create permissions user account
        Permission::create(['name' => 'create user_account']);
        Permission::create(['name' => 'edit user_account']);
        Permission::create(['name' => 'delete user_account']);
        Permission::create(['name' => 'update user_account']);
        Permission::create(['name' => 'view user_account']);
      


        // create permissions lgu Dashboard
        Permission::create(['name' => 'create lguPerformance']);
        Permission::create(['name' => 'edit lguPerformance']);
        Permission::create(['name' => 'delete lguPerformance']);
        Permission::create(['name' => 'update lguPerformance']);
        Permission::create(['name' => 'view lguPerformance']);


        // LGU Performance--------------------------------------------------------------
        // create permissions performance Mellpi_pro_LGU
        Permission::create(['name' => 'create Mellpi_pro_LGU']);
        Permission::create(['name' => 'edit Mellpi_pro_LGU']);
        Permission::create(['name' => 'delete Mellpi_pro_LGU']);
        Permission::create(['name' => 'update Mellpi_pro_LGU']);
        Permission::create(['name' => 'view Mellpi_pro_LGU']);

        // create permissions performance Mellpi_pro_LNFP
        Permission::create(['name' => 'create Mellpi_pro_LNFP']);
        Permission::create(['name' => 'edit Mellpi_pro_LNFP']);
        Permission::create(['name' => 'delete Mellpi_pro_LNFP']);
        Permission::create(['name' => 'update Mellpi_pro_LNFP']);
        Permission::create(['name' => 'view Mellpi_pro_LNFP']);

        // create permissions performance Mellpi_pro_LNC
        Permission::create(['name' => 'create Mellpi_pro_LNC']);
        Permission::create(['name' => 'edit Mellpi_pro_LNC']);
        Permission::create(['name' => 'delete Mellpi_pro_LNC']);
        Permission::create(['name' => 'update Mellpi_pro_LNC']);
        Permission::create(['name' => 'view Mellpi_pro_LNC']);


        //Resources--------------------------------------------------------------
        // create permissions  NAO
        Permission::create(['name' => 'create NAO']);
        Permission::create(['name' => 'edit NAO']);
        Permission::create(['name' => 'delete NAO']);
        Permission::create(['name' => 'update NAO']);
        Permission::create(['name' => 'view NAO']);

        // create permissions  NPC
        Permission::create(['name' => 'create NPC']);
        Permission::create(['name' => 'edit NPC']);
        Permission::create(['name' => 'delete NPC']);
        Permission::create(['name' => 'update NPC']);
        Permission::create(['name' => 'view NPC']);

        // create permissions  BNS
        Permission::create(['name' => 'create BNS']);
        Permission::create(['name' => 'edit BNS']);
        Permission::create(['name' => 'delete BNS']);
        Permission::create(['name' => 'update BNS']);
        Permission::create(['name' => 'view BNS']);


        //Nutrition--------------------------------------------------------------
        // create permissions  Workingfiles
        Permission::create(['name' => 'create Workingfiles']);
        Permission::create(['name' => 'edit Workingfiles']);
        Permission::create(['name' => 'delete Workingfiles']);
        Permission::create(['name' => 'update Workingfiles']);
        Permission::create(['name' => 'view Workingfiles']);

        // create permissions  advocacies
        Permission::create(['name' => 'create advocacies']);
        Permission::create(['name' => 'edit advocacies']);
        Permission::create(['name' => 'delete advocacies']);
        Permission::create(['name' => 'update NPadvocaciesC']);
        Permission::create(['name' => 'view advocacies']);


 


        // create roles and assign created permissions
        $role = Role::create([
            'name' => 'Central Admin',
            'codename' => 'is_admin'
        ]);
        $role->givePermissionTo(Permission::all());

        $role = Role::create([
            'name' => 'Public Users',
            'codename' => 'is_publicusers'
        ]);
        $role->givePermissionTo(Permission::all());
 
        $role = Role::create([
            'name' => 'User Under Review',
            'codename' => 'is_UserUnderReview'
        ]);
    }
}
