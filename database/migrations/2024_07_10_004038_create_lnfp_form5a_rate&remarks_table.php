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
        Schema::create('lnfp_form5a_rr', function (Blueprint $table) {
            $table->id();
            $table->integer('lnfp_lgu_id')->nullable();
            $table->string('lnfp_officer', 255)->nullable();
            $table->date('dateMonitoring')->nullable();
            $table->integer('periodCovereda')->nullable();
            $table->string('nameofPnao')->nullable();
            $table->string('address')->nullable();
            $table->string('provDeploy')->nullable();
            $table->integer('numYearPnao')->nullable();
            $table->string('fulltime')->nullable();
            $table->string('profAct')->nullable();
            $table->date('bdate')->nullable();
            $table->string('sex')->nullable();
            $table->date('dateDesignation')->nullable();
            $table->string('secondedOffice')->nullable();
            $table->string('devActnum1')->nullable();
            $table->string('devActnum2')->nullable();
            $table->string('devActnum3')->nullable();

            $table->integer('ratingA')->nullable();
            $table->integer('ratingB')->nullable();
            $table->integer('ratingBB')->nullable();
            $table->integer('ratingC')->nullable();
            $table->integer('ratingD')->nullable();
            $table->integer('ratingE')->nullable();
            $table->integer('ratingF')->nullable();
            $table->integer('ratingG')->nullable();
            $table->integer('ratingGG')->nullable();
            $table->integer('ratingH')->nullable();

            $table->text('remarksA')->nullable();
            $table->text('remarksB')->nullable();
            $table->text('remarksBB')->nullable();
            $table->text('remarksC')->nullable();
            $table->text('remarksD')->nullable();
            $table->text('remarksE')->nullable();
            $table->text('remarksF')->nullable();
            $table->text('remarksG')->nullable();
            $table->text('remarksGG')->nullable();
            $table->text('remarksH')->nullable();

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
        Schema::dropIfExists('lnfp_form5a_rr');
    }
};
