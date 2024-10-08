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
            $table->integer('rating3a')->nullable();
            $table->integer('rating3b')->nullable();
            $table->integer('rating3c')->nullable();
            $table->string('remarks3a', 255)->nullable();
            $table->string('remarks3b', 255)->nullable();
            $table->string('remarks3c', 255)->nullable();
            $table->integer('status'); 
            $table->string('dateMonitoring',255)->nullable();
            $table->string('periodCovereda',255)->nullable();
            $table->string('region_id',20)->unsigned(); 
            $table->string('province_id',20)->unsigned(); 
            $table->string('municipal_id',20)->unsigned(); 
            $table->string('barangay_id',20)->unsigned(); 
            $table->integer('user_id')->unsigned()->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('mplgubrgygovernancetracking', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status'); 
            $table->string('barangay_id', 20)->unsigned(); 
            $table->string('municipal_id', 20)->unsigned();
            $table->integer('user_id')->unsigned()->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('mplgubrgygovernance_id')->unsigned(); 
            $table->foreign('mplgubrgygovernance_id')->references('id')->on('mplgubrgygovernance')->onDelete('cascade');
         
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
