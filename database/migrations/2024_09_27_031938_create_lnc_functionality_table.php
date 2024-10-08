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
            
            $table->integer('cd')->default(0);
            $table->integer('pp1a')->default(0);
            $table->integer('pp1b')->default(0);
            $table->integer('pp2a')->default(0);
            $table->integer('pp2b')->default(0);
            $table->integer('pp3a')->default(0);
            $table->integer('pp3b')->default(0);
            $table->integer('pp4a')->default(0);
            $table->integer('nsd')->default(0);
            $table->integer('me1')->default(0);
            $table->integer('me2')->default(0);
            $table->integer('me3')->default(0);
            $table->integer('total')->default(0);            
            $table->string('functionality')->nullable();

            $table->string('reg_code')->nullable();
            $table->string('prov_code')->nullable();
            $table->string('citymun_code')->nullable();

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