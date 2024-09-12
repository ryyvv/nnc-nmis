<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $tables = [
            'visionmissions',
            'nationalpolicies',
            'governances',
            'nutrition_intervention',
            'location_pivot',
            'lnc_management_function',
            'mplgubrgybudgetaip',
            'nutrition_offices',
            'personnels',
            'mplgubrgybudgetaipTracking',
            'lgubarangayreport',
            'lnfp_lguinterviewtracking',
            'lnfp_overall_stracking',
            'lguprofilebarangay',
            'lnfp_lguprofile',
            'lnfp_lguprofiletracking',
            'barangaytracking',
            'mplgubrgychangeNS',
            'mplgubrgychangeNStracking',
            'mplgubrgydiscussionquestion',
            'mplgubrgydiscussionquestiontracking',
            'mplgubrgygovernance',
            'mplgubrgygovernancetracking',
            'mplgubrgylncmanagement',
            'mplgubrgylncmanagementtracking',
            'mplgubrgyvisionmissions',
            'mplgubrgyvisionmissionstracking',
            'mellpiprobarangaynationalpolicies',
            'mpbrgynationalPoliciestracking',
            'mplgubrgynutritionservice',
            'mplgubrgynutritionservicetracking'
        ];

        $columns = [
            'region_id',
            'province_id',
            'municipal_id',
            'barangay_id',
            'cities_id'
        ];

        foreach ($tables as $tableName) {
            Schema::table($tableName, function (Blueprint $table) use ($tableName, $columns) {
                foreach ($columns as $column) {
                    if ($this->hasColumn($tableName, $column)) {
                        $table->string($column)->change();  // Change the column type to string
                    }
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $tables = [
            'visionmissions',
            'nationalpolicies',
            'governances',
            'nutrition_intervention',
            'location_pivot',
            'lnc_management_function',
            'mplgubrgybudgetaip',
            'nutrition_offices',
            'personnels',
            'mplgubrgybudgetaipTracking',
            'lgubarangayreport',
            'lnfp_lguinterviewtracking',
            'lnfp_overall_stracking',
            'lguprofilebarangay',
            'lnfp_lguprofile',
            'lnfp_lguprofiletracking',
            'barangaytracking',
            'mplgubrgychangeNS',
            'mplgubrgychangeNStracking',
            'mplgubrgydiscussionquestion',
            'mplgubrgydiscussionquestiontracking',
            'mplgubrgygovernance',
            'mplgubrgygovernancetracking',
            'mplgubrgylncmanagement',
            'mplgubrgylncmanagementtracking',
            'mplgubrgyvisionmissions',
            'mplgubrgyvisionmissionstracking',
            'mellpiprobarangaynationalpolicies',
            'mpbrgynationalPoliciestracking',
            'mplgubrgynutritionservice',
            'mplgubrgynutritionservicetracking'
        ];

        $columns = [
            'region_id',
            'province_id',
            'municipal_id',
            'barangay_id',
            'cities_id'
        ];

        foreach ($tables as $tableName) {
            Schema::table($tableName, function (Blueprint $table) use ($tableName, $columns) {
                foreach ($columns as $column) {
                    if ($this->hasColumn($tableName, $column)) {
                        DB::statement("ALTER TABLE {$tableName} ALTER COLUMN {$column} TYPE integer USING ({$column}::integer)");
                    }
                }
            });
        }
    }
    
    protected function hasColumn($tableName, $columnName)
    {
        return DB::table('information_schema.columns')
            ->where('table_name', $tableName)
            ->where('column_name', $columnName)
            ->exists();
    }
};