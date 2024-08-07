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
        Schema::create('lnc_management_function', function (Blueprint $table) {
            $table->id();
            $table->integer('rating4a')->nullable();
            $table->integer('rating4b')->nullable();
            $table->integer('rating4c')->nullable();
            $table->integer('rating4d')->nullable();
            $table->integer('rating4e')->nullable();
            $table->integer('rating4f')->nullable();

            $table->string('remarks4a', 255)->nullable();
            $table->string('remarks4b', 255)->nullable();
            $table->string('remarks4c', 255)->nullable();
            $table->string('remarks4d', 255)->nullable();
            $table->string('remarks4e', 255)->nullable();
            $table->string('remarks4f', 255)->nullable();

            $table->integer('rating4g')->nullable();
            $table->string('remarks4g', 255)->nullable();

            $table->integer('region_id')->unsigned(); 
            $table->integer('province_id')->unsigned(); 
            $table->integer('municipal_id')->unsigned();  
            $table->integer('lguprofile_id')->unsigned(); 
            $table->foreign('lguprofile_id')->references('id')->on('lguprofile'); 
            $table->foreign('province_id')->references('id')->on('provinces'); 
            $table->foreign('municipal_id')->references('id')->on('municipals');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lnc_management_function');
    }
};
