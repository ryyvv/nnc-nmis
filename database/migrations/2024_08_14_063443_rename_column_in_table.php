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
        Schema::table('lnfp_form8', function (Blueprint $table) {
            //
            $table->renameColumn('dateMonitor', 'dateMonitoring');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lnfp_form8', function (Blueprint $table) {
            //
        });
    }
};