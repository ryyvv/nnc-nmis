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
        Schema::create('mplgubrgygovernance' , function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rating3a');
            $table->integer('rating3b');
            $table->integer('rating3c');
            $table->string('remarks3a', 255);
            $table->string('remarks3b', 255);
            $table->string('remarks3c', 255);
            $table->integer('status');
            $table->date('dateCreated');
            $table->date('dateUpdates');
            $table->date('dateMonitoring');
            $table->date('periodCovereda');
            $table->date('periodCoveredb');
            $table->integer('region_id')->unsigned(); 
            $table->integer('province_id')->unsigned(); 
            $table->integer('municipal_id')->unsigned(); 
            $table->integer('barangay_id')->unsigned(); 
            $table->integer('user_id')->unsigned();
            
            $table->foreign('user_id')->references('id')->on('users'); 
            $table->foreign('province_id')->references('id')->on('provinces'); 
            $table->foreign('region_id')->references('id')->on('regions'); 
            $table->foreign('municipal_id')->references('id')->on('municipals');
            $table->foreign('barangay_id')->references('id')->on('barangays'); 
            $table->timestamps();
        });

        Schema::create('mplgubrgygovernancetracking', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status'); 
            $table->integer('barangay_id')->unsigned(); 
            $table->integer('municipal_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('mplgubrgygovernance_id')->unsigned(); 
            $table->foreign('mplgubrgygovernance_id')->references('id')->on('mplgubrgygovernance');
            $table->foreign('municipal_id')->references('id')->on('municipals');
            $table->foreign('barangay_id')->references('id')->on('barangays'); 
            $table->foreign('user_id')->references('id')->on('users'); 
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mplgubrgygovernance');
        Schema::dropIfExists('mplgubrgygovernancetracking');
    }
};
