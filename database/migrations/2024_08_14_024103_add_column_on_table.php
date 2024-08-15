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
        Schema::table('lnfp_overall_score_form', function (Blueprint $table) {
            //
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->nullable();

           $table->integer('barangay_id')->unsigned()->nullable();
           $table->foreign('barangay_id')->references('id')->on('barangays')->nullable(); 

           $table->integer('municipal_id')->unsigned()->nullable(); 
           $table->foreign('municipal_id')->references('id')->on('municipals')->nullable();

           $table->integer('province_id')->unsigned()->nullable(); 
           $table->foreign('province_id')->references('id')->on('provinces')->nullable();

           $table->integer('region_id')->unsigned()->nullable(); 
           $table->foreign('region_id')->references('id')->on('regions')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lnfp_overall_score_form', function (Blueprint $table) {
            //
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->nullable();

           $table->integer('barangay_id')->unsigned()->nullable();
           $table->foreign('barangay_id')->references('id')->on('barangays')->nullable(); 

           $table->integer('municipal_id')->unsigned()->nullable(); 
           $table->foreign('municipal_id')->references('id')->on('municipals')->nullable();

           $table->integer('province_id')->unsigned()->nullable(); 
           $table->foreign('province_id')->references('id')->on('provinces')->nullable();

           $table->integer('region_id')->unsigned()->nullable(); 
           $table->foreign('region_id')->references('id')->on('regions')->nullable();
        });
    }
};
