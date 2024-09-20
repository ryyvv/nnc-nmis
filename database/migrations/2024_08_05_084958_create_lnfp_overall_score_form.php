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
            $table->string('lnfp_officer')->nullable();
            $table->string('name')->nullable();
            $table->string('areaOfAssign')->nullable();
            $table->date('date')->nullable();
            $table->decimal('pointsP1AS', 8, 2)->nullable();
            $table->decimal('pointsP2AS', 8, 2)->nullable();
            $table->decimal('weightP1AS', 8, 2)->nullable();
            $table->decimal('weightP2AS', 8, 2)->nullable();
            $table->decimal('scoreP1AS', 8, 2)->nullable();
            $table->decimal('scoreP2AS', 8, 2)->nullable();
            $table->decimal('totalScoreAS', 8, 2)->nullable();
            $table->string('nameTM1')->nullable();
            $table->string('nameTM2')->nullable();
            $table->string('nameTM3')->nullable();
            $table->string('desigOffice1')->nullable();
            $table->string('desigOffice2')->nullable();
            $table->string('desigOffice3')->nullable();
            $table->string('sigDate1_filePath')->nullable();
            $table->string('sigDate2_filePath')->nullable();
            $table->string('sigDate3_filePath')->nullable();
            $table->string('receivedBy')->nullable();
            $table->date('whatDate')->nullable();
            $table->integer('status')->default(1);
            $table->string('header')->nullable();
            $table->unsignedBigInteger('formInterview_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
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
