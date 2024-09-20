<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lnfp_form5a_rr', function (Blueprint $table) {
            $table->id();
            $table->integer('lnfp_lgu_id')->nullable();
            $table->string('lnfp_officer')->nullable();
            $table->date('dateMonitoring')->nullable();
            $table->string('periodCovereda')->nullable();
            $table->string('nameofPnao')->nullable();
            $table->text('address')->nullable();
            $table->string('provDeploy')->nullable();
            $table->integer('numYearPnao')->nullable();
            $table->string('fulltime',255)->nullable();
            $table->string('profAct')->nullable();
            $table->date('bdate')->nullable();
            $table->string('sex')->nullable();
            $table->date('dateDesignation')->nullable();
            $table->string('secondedOffice')->nullable();
            $table->string('devActnum1', 255)->nullable();
            $table->string('devActnum2', 255)->nullable();
            $table->string('devActnum3', 255)->nullable();
            $table->integer('status')->default(0);
            $table->string('header')->nullable();
            $table->integer('user_id')->nullable();
            $table->date('dateappointment')->nullable();
            $table->string('education')->nullable();
            $table->text('assign_task')->nullable();
            $table->text('cont_education')->nullable();
            $table->text('brgy_service')->nullable();
            $table->string('belongTo')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lnfp_form5a_rr');
    }
};
