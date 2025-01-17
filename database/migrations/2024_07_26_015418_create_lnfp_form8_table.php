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
        Schema::create('lnfp_form8', function (Blueprint $table) {
            $table->id();
            $table->integer('form5_id')->nullable();
            $table->integer('lnfp_lgu_id')->nullable();
            $table->string('lnfp_officer', 255)->nullable();
            $table->integer('forThePeriod')->nullable();
            $table->text('nameOfPnao')->nullable();
            $table->text('areaOfAssign')->nullable();
            $table->date('dateMonitor')->nullable();

            $table->text('recoPNAO_A')->nullable();
            $table->text('recoPNAO_B')->nullable();
            $table->text('recoPNAO_C')->nullable();
            $table->text('recoPNAO_D')->nullable();
            $table->text('recoPNAO_E')->nullable();
            $table->text('recoPNAO_F')->nullable();
            $table->text('recoPNAO_G')->nullable();
            $table->text('recoPNAO_H')->nullable();

            $table->text('recoLNC_A')->nullable();
            $table->text('recoLNC_B')->nullable();
            $table->text('recoLNC_C')->nullable();
            $table->text('recoLNC_D')->nullable();
            $table->text('recoLNC_E')->nullable();
            $table->text('recoLNC_F')->nullable();
            $table->text('recoLNC_G')->nullable();
            $table->text('recoLNC_H')->nullable();

            $table->text('nameTM1')->nullable();
            $table->text('nameTM2')->nullable();
            $table->text('nameTM3')->nullable();
            $table->text('desigOffice1')->nullable();
            $table->text('desigOffice2')->nullable();
            $table->text('desigOffice3')->nullable();
            $table->string('sigDate1')->nullable();
            $table->string('sigDate2')->nullable();
            $table->string('sigDate3')->nullable();

            $table->text('receivedBy')->nullable();
            $table->date('whatDate')->nullable();
            $table->integer('status')->nullable();

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
        Schema::dropIfExists('lnfp_form8');
    }
};
