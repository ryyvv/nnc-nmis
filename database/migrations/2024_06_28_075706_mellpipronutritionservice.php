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
        Schema::create('mplgubrgynutritionservice' , function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rating5aa')->nullable();
            $table->integer('rating5ab')->nullable();
            $table->integer('rating5ac')->nullable();
            $table->integer('rating5b')->nullable();
            $table->integer('rating5ca')->nullable();
            $table->integer('rating5cb')->nullable();
            $table->integer('rating5cc')->nullable();
            $table->integer('rating5cd')->nullable();
            $table->integer('rating5da')->nullable();
            $table->integer('rating5db')->nullable();
            $table->integer('rating5ea')->nullable();
            $table->integer('rating5eb')->nullable();
            $table->integer('rating5ec')->nullable();
            $table->integer('rating5ed')->nullable();
            $table->integer('rating5ee')->nullable();
            $table->integer('rating5ef')->nullable();
            $table->integer('rating5fa')->nullable();
            $table->integer('rating5fb')->nullable();
            $table->integer('rating5fc')->nullable();
            $table->integer('rating5ga')->nullable();
            $table->integer('rating5ha')->nullable();
            $table->integer('rating5hb')->nullable();
            $table->integer('rating5ia')->nullable();
            $table->integer('rating5ib')->nullable();
            $table->integer('rating5ic')->nullable();
            $table->integer('rating5id')->nullable();
            $table->integer('rating5ie')->nullable();
            $table->integer('rating5if')->nullable();
            $table->integer('rating5ig')->nullable();
            $table->integer('rating5ih')->nullable();

            $table->string('remarks5aa', 255)->nullable();
            $table->string('remarks5ab', 255)->nullable();
            $table->string('remarks5ac', 255)->nullable();
            $table->string('remarks5b', 255)->nullable();
            $table->string('remarks5ca', 255)->nullable();
            $table->string('remarks5cb', 255)->nullable();
            $table->string('remarks5cc', 255)->nullable();
            $table->string('remarks5cd', 255)->nullable();
            $table->string('remarks5da', 255)->nullable();
            $table->string('remarks5db', 255)->nullable();
            $table->string('remarks5ea', 255)->nullable();
            $table->string('remarks5eb', 255)->nullable();
            $table->string('remarks5ec', 255)->nullable();
            $table->string('remarks5ed', 255)->nullable();
            $table->string('remarks5ee', 255)->nullable();
            $table->string('remarks5ef', 255)->nullable();
            $table->string('remarks5fa', 255)->nullable();
            $table->string('remarks5fb', 255)->nullable();
            $table->string('remarks5fc', 255)->nullable();
            $table->string('remarks5ga', 255)->nullable();
            $table->string('remarks5ha', 255)->nullable();
            $table->string('remarks5hb', 255)->nullable();
            $table->string('remarks5ia', 255)->nullable();
            $table->string('remarks5ib', 255)->nullable();
            $table->string('remarks5ic', 255)->nullable();
            $table->string('remarks5id', 255)->nullable();
            $table->string('remarks5ie', 255)->nullable();
            $table->string('remarks5if', 255)->nullable();
            $table->string('remarks5ig', 255)->nullable();
            $table->string('remarks5ih', 255)->nullable();
 
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

        Schema::create('mplgubrgynutritionservicetracking', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status'); 
            $table->string('barangay_id')->unsigned(); 
            $table->string('municipal_id')->unsigned();
            $table->integer('user_id')->unsigned()->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('mplgubrgynutritionservice_id')->unsigned(); 
            $table->foreign('mplgubrgynutritionservice_id')->references('id')->on('mplgubrgynutritionservice')->onDelete('cascade');
          
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mplgubrgynutritionservice');
        Schema::dropIfExists('mplgubrgynutritionservicetracking');
    }
};
