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
        Schema::create('mplgubrgylncmanagement' , function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rating4a')->nullable();
            $table->integer('rating4b')->nullable();
            $table->integer('rating4c')->nullable();
            $table->integer('rating4c2')->nullable();
            $table->integer('rating4d')->nullable();
            $table->integer('rating4e')->nullable();
            $table->integer('rating4f')->nullable();
            $table->integer('rating4g')->nullable(); 
            $table->string('remarks4a')->nullable();
            $table->string('remarks4b')->nullable();
            $table->string('remarks4c')->nullable();
            $table->string('remarks4c2')->nullable();
            $table->string('remarks4d')->nullable();
            $table->string('remarks4e')->nullable();
            $table->string('remarks4f')->nullable();
            $table->string('remarks4g')->nullable();
            $table->integer('status'); 
            $table->string('dateMonitoring')->nullable();
            $table->string('periodCovereda')->nullable();
            $table->integer('region_id')->unsigned(); 

            $table->integer('province_id')->unsigned(); 
            $table->integer('municipal_id')->unsigned(); 
            $table->integer('barangay_id')->unsigned(); 
            
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users'); 

            $table->timestamps();
        });

        Schema::create('mplgubrgylncmanagementtracking', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status'); 
            $table->integer('barangay_id')->unsigned(); 
            $table->integer('municipal_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('mplgubrgylncmanagement_id')->unsigned(); 

            $table->foreign('mplgubrgylncmanagement_id')->references('id')->on('mplgubrgylncmanagement');
            $table->foreign('user_id')->references('id')->on('users'); 
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mplgubrgylncmanagement');
        Schema::dropIfExists('mplgubrgylncmanagementtracking');
    }
};
