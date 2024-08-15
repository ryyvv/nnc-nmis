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
        Schema::create('lnfp_interview_form', function (Blueprint $table) {
            $table->id();
            $table->integer('forThePeriod')->nullable();
            $table->integer('form5_id')->nullable();
            $table->integer('lnfp_lgu_id')->nullable();
            $table->string('lnfp_officer', 255)->nullable();
            $table->text('nameOf')->nullable();
            $table->text('areaAssign')->nullable();
            $table->date('dateOfInterview')->nullable();
            $table->text('question1')->nullable();
            $table->text('question2')->nullable();
            $table->text('question3')->nullable();
            $table->text('question4')->nullable();
            $table->integer('q1AScore')->nullable();
            $table->integer('q2AScore')->nullable();
            $table->integer('q3AScore')->nullable();
            $table->integer('q4AScore')->nullable();
            $table->text('q1Remarks')->nullable();
            $table->text('q2Remarks')->nullable();
            $table->text('q3Remarks')->nullable();
            $table->text('q4Remarks')->nullable();
            $table->double('subtotalAScore')->nullable();
            $table->integer('status');
            
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
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lnfp_interview_form');
    }
};
