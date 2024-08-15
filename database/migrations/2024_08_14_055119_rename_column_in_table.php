<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('lnfp_form5a_rr', function (Blueprint $table) {
            //
            $table->renameColumn('forThePeriod', 'periodCovereda');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lnfp_form5a_rr', function (Blueprint $table) {
            //
        });
    }
};
