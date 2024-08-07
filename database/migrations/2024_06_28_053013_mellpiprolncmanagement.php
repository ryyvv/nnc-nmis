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
            $table->integer('rating4a');
            $table->integer('rating4b');
            $table->integer('rating4c');
            $table->integer('rating4d');
            $table->integer('rating4e');
            $table->integer('rating4f');
            $table->integer('rating4g'); 
            $table->string('remarks4a', 255);
            $table->string('remarks4b', 255);
            $table->string('remarks4c', 255);
            $table->string('remarks4d', 255);
            $table->string('remarks4e', 255);
            $table->string('remarks4f', 255);
            $table->string('remarks4g', 255);
            $table->integer('status'); 
            $table->string('dateMonitoring',255);
            $table->string('periodCovereda',255); 
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

        Schema::create('mplgubrgylncmanagementtracking', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status'); 
            $table->integer('barangay_id')->unsigned(); 
            $table->integer('municipal_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('mplgubrgylncmanagement_id')->unsigned(); 
            $table->foreign('mplgubrgylncmanagement_id')->references('id')->on('mplgubrgylncmanagement');
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
        Schema::dropIfExists('mplgubrgylncmanagement');
        Schema::dropIfExists('mplgubrgylncmanagementtracking');
    }
};
