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
        // List of tables where foreign keys need to be removed
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
            'lnfp_overall_stracking'
        ];
        
        $otherTables = [
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

        // List of foreign keys to be removed
        $foreignKeys = [
            'region_id',
            'province_id',
            'municipal_id',
            'barangay_id',
            'cities_id'
        ];

        foreach ($tables as $tableName) {
            Schema::table($tableName, function (Blueprint $table) use ($tableName, $foreignKeys) {
                foreach ($foreignKeys as $column) {
                    if ($this->hasColumn($tableName, $column) && $this->hasForeignKey($tableName, $column)) {
                        $table->dropForeign([$column]);
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
        // List of tables where foreign keys need to be re-added
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
            'lnfp_overall_stracking'
        ];

        $otherTables = [
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

        // Foreign key references to be re-added
        $foreignKeys = [
            'region_id' => 'regions',
            'province_id' => 'provinces',
            'municipal_id' => 'municipals',
            'barangay_id' => 'barangays',
            'cities_id' => 'cities'
        ];

        foreach ($tables as $tableName) {
            Schema::table($tableName, function (Blueprint $table) use ($tableName, $foreignKeys) {
                foreach ($foreignKeys as $column => $referencedTable) {
                    if ($this->hasColumn($tableName, $column)) {
                        $table->foreign($column)->references('id')->on($referencedTable);
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
    
    protected function hasForeignKey($tableName, $columnName)
    {
        return DB::table('information_schema.key_column_usage')
            ->where('table_name', $tableName)
            ->where('column_name', $columnName)
            ->where('constraint_name', '!=', 'PRIMARY')
            ->exists();
    }
};