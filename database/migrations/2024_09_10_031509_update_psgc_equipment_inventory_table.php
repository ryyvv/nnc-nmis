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
        Schema::table('psgc_equipment_inventory', function (Blueprint $table) {
            // Changing columns to integer
            $table->integer('defective_hb')->default(0)->change();
            $table->integer('total_hb')->default(0)->change();
            $table->integer('total_ws')->default(0)->change();
            $table->integer('total_muac_child')->default(0)->change();
            $table->integer('total_muac_adults')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('psgc_equipment_inventory', function (Blueprint $table) {
            $table->decimal('defective_hb', 5, 2)->default(0.00)->change();
            $table->decimal('total_hb', 15, 2)->default(0.00)->change();
            $table->decimal('total_ws', 15, 2)->default(0.00)->change();
            $table->decimal('total_muac_child', 15, 2)->default(0.00)->change();
            $table->decimal('total_muac_adults', 15, 2)->default(0.00)->change();
        });
    }
};