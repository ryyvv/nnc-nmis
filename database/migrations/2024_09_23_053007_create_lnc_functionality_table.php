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
        Schema::create('lnc_functionality', function (Blueprint $table) {
            $table->id();
            $table->string('psgc_code', 10)->unique();
            $table->string('name');
            $table->string('correspondence_code')->nullable();
            $table->string('geographic_level')->nullable();
            $table->string('city_class');
            $table->string('income_classification');
            
            $table->string('reg_code');
            $table->string('prov_code');
            $table->string('citymun_code');
            
            $table->integer('cd');
            $table->integer('pp1a');
            $table->integer('pp1b');
            $table->integer('pp2a');
            $table->integer('pp2b');
            $table->integer('pp3a');
            $table->integer('pp3b');
            $table->integer('pp4a');
            $table->integer('nsd');
            $table->integer('me1');
            $table->integer('me2');
            $table->integer('me3');
            $table->integer('total');

            $table->string('functionality');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lnc_functionality');
    }
};