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
        Schema::create('psgc_summary', function (Blueprint $table) {
            $table->id();
            $table->string('psgc_code', 10)->unique();
            $table->string('correspondence_code')->nullable();
            $table->string('geographic_location');
            $table->integer('provinces')->default(0);
            $table->integer('cities')->default(0);
            $table->integer('municipalities')->default(0);
            $table->integer('barangays')->default(0);
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
        Schema::dropIfExists('psgc_summary');
    }
};