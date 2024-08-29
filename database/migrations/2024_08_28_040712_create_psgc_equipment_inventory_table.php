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
        Schema::create('psgc_equipment_inventory', function (Blueprint $table) {
            $table->id();
            $table->integer('total_barangay')->default(0);
            $table->integer('wooden_hb')->default(0);
            $table->integer('non_wooden_hb')->default(0);
            $table->decimal('defective_hb', 5, 2)->default(0.00);
            $table->decimal('total_hb', 15, 2)->default(0.00);
            $table->decimal('availability_hb', 15, 2)->default(0.00);
            $table->integer('steel_rules')->default(0);
            $table->integer('microtoise')->default(0);
            $table->integer('infantometer')->default(0);
            $table->string('remarks_hb')->nullable();
            $table->integer('hanging_type')->default(0);
            $table->integer('defective_ws')->default(0);
            $table->decimal('total_ws', 15, 2)->default(0.00);
            $table->decimal('availability_ws', 15, 2)->default(0.00);
            $table->integer('infat_scale')->default(0);
            $table->integer('beam_balance')->default(0);
            $table->string('remarks_ws')->nullable();
            $table->integer('child')->default(0);
            $table->integer('defective_muac_child')->default(0);
            $table->decimal('total_muac_child', 15, 2)->default(0.00);
            $table->decimal('availability_muac_child', 15, 2)->default(0.00);
            $table->integer('adults')->default(0);
            $table->integer('defective_muac_adults')->default(0);
            $table->decimal('total_muac_adults', 15, 2)->default(0.00);
            $table->decimal('availability_muac_adults', 15, 2)->default(0.00);
            $table->string('remarks_muac')->nullable();
            $table->string('psgc_code', 10)->unique();
            $table->string('name');
            $table->string('correspondence_code')->nullable();
            $table->string('reg_code');
            $table->string('prov_code');
            $table->string('citymun_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('psgc_equipment_inventory');
    }
};