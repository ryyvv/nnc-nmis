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
        Schema::create('lnfp_overall_score_form', function (Blueprint $table) {
            $table->id();
            $table->integer('lnfp_lgu_id')->nullable();
            $table->integer('form5_id')->nullable();
            $table->integer('form8_id')->nullable();
            $table->integer('formInterview_id')->nullable();
            $table->string('lnfp_officer', 255)->nullable();
            
            $table->text('name')->nullable();
            $table->text('areaOfAssign')->nullable();
            $table->date('date')->nullable();
            $table->integer('pointsP1AS')->nullable();
            $table->integer('pointsP2AS')->nullable();
            $table->double('weightP1AS')->nullable();
            $table->double('weightP2AS')->nullable();
            $table->integer('scoreP1AS')->nullable();
            $table->integer('scoreP2AS')->nullable();
            $table->double('totalScoreAS')->nullable();
            $table->text('nameTM1')->nullable();
            $table->text('nameTM2')->nullable();
            $table->text('nameTM3')->nullable();
            $table->text('desigOffice1')->nullable();
            $table->text('desigOffice2')->nullable();
            $table->text('desigOffice3')->nullable();
            $table->string('sigDate1_filePath')->nullable();
            $table->string('sigDate2_filePath')->nullable();
            $table->string('sigDate3_filePath')->nullable();
            $table->text('receivedBy')->nullable();
            $table->date('whatDate')->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lnfp_overall_score_form');
    }
};
