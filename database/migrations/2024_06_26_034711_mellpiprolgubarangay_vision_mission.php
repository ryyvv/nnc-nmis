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
             
               Schema::create('mplgubrgyvisionmissions' , function (Blueprint $table) {
                $table->increments('id');
                $table->integer('rating1a');
                $table->integer('rating1b');
                $table->integer('rating1c');
                $table->string('remarks1a', 255);
                $table->string('remarks1b', 255);
                $table->string('remarks1c', 255);
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

            Schema::create('mplgubrgyvisionmissionstracking', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('status'); 
                $table->integer('barangay_id')->unsigned(); 
                $table->integer('municipal_id')->unsigned();
                $table->integer('user_id')->unsigned();
                $table->integer('mplgubrgyvisionmissions_id')->unsigned(); 
                $table->foreign('mplgubrgyvisionmissions_id')->references('id')->on('mplgubrgyvisionmissions');
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
        Schema::dropIfExists('visionmissions');
    }
};
