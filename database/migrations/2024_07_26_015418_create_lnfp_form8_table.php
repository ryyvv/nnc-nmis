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
            $table->integer('lnfp_lgu_id')->nullable();
            $table->string('areaOfAssign')->nullable();
            
            // Recommendations PNAO
            $table->text('recoPNAO_A')->nullable();
            $table->text('recoPNAO_B')->nullable();
            $table->text('recoPNAO_C')->nullable();
            $table->text('recoPNAO_D')->nullable();
            $table->text('recoPNAO_E')->nullable();
            $table->text('recoPNAO_F')->nullable();
            $table->text('recoPNAO_G')->nullable();
            $table->text('recoPNAO_H')->nullable();
            
            // Recommendations LNC
            $table->text('recoLNC_A')->nullable();
            $table->text('recoLNC_B')->nullable();
            $table->text('recoLNC_C')->nullable();
            $table->text('recoLNC_D')->nullable();
            $table->text('recoLNC_E')->nullable();
            $table->text('recoLNC_F')->nullable();
            $table->text('recoLNC_G')->nullable();
            $table->text('recoLNC_H')->nullable();
            
            // Team Members
            $table->string('nameTM1')->nullable();
            $table->string('nameTM2')->nullable();
            $table->string('nameTM3')->nullable();
            $table->string('desigOffice1')->nullable();
            $table->string('desigOffice2')->nullable();
            $table->string('desigOffice3')->nullable();
            $table->string('sigDate1', 255)->nullable();
            $table->string('sigDate2', 255)->nullable();
            $table->string('sigDate3', 255)->nullable();
            
            $table->string('receivedBy')->nullable();
            $table->date('whatDate')->nullable();
            $table->integer('status')->default(0);
            $table->unsignedBigInteger('form7_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('header')->nullable();
            
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
