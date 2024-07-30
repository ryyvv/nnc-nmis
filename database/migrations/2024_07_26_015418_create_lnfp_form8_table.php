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
