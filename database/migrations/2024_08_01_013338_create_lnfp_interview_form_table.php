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
