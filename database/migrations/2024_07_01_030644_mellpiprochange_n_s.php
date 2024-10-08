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
            $table->integer('rating6a')->nullable();
            $table->integer('rating6b')->nullable();
            $table->integer('rating6c')->nullable();
            $table->integer('rating6d')->nullable();
            $table->integer('rating6e')->nullable();
            $table->integer('rating6f')->nullable();
            $table->integer('rating6g')->nullable(); 
            $table->integer('rating6h')->nullable(); 

            $table->string('remarks6a', 255)->nullable();
            $table->string('remarks6b', 255)->nullable();
            $table->string('remarks6c', 255)->nullable();
            $table->string('remarks6d', 255)->nullable();
            $table->string('remarks6e', 255)->nullable();
            $table->string('remarks6f', 255)->nullable();
            $table->string('remarks6g', 255)->nullable();
            $table->string('remarks6h', 255)->nullable();
 
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

        Schema::create('mplgubrgychangeNStracking', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status'); 
            $table->string('barangay_id',20)->unsigned(); 
            $table->string('municipal_id',20)->unsigned();
            $table->integer('user_id')->unsigned()->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('mplgubrgychangeNS_id')->unsigned(); 
            $table->foreign('mplgubrgychangeNS_id')->references('id')->on('mplgubrgychangeNS')->onDelete('cascade');
      
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
