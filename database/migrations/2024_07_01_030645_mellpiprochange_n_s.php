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
        Schema::create('mplgubrgychangeNS' , function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rating6a');
            $table->integer('rating6b');
            $table->integer('rating6c');
            $table->integer('rating6d');
            $table->integer('rating6e');
            $table->integer('rating6f');
            $table->integer('rating6g'); 
            $table->integer('rating6h'); 

            $table->string('remarks6a', 255);
            $table->string('remarks6b', 255);
            $table->string('remarks6c', 255);
            $table->string('remarks6d', 255);
            $table->string('remarks6e', 255);
            $table->string('remarks6f', 255);
            $table->string('remarks6g', 255);
            $table->string('remarks6h', 255);
 
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

        Schema::create('mplgubrgychangeNStracking', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status'); 
            $table->integer('barangay_id')->unsigned(); 
            $table->integer('municipal_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('mplgubrgychangeNS_id')->unsigned(); 
            $table->foreign('mplgubrgychangeNS_id')->references('id')->on('mplgubrgychangeNS');
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
        Schema::dropIfExists('mplgubrgychangeNS');
        Schema::dropIfExists('mplgubrgychangeNStracking');
    }
};
