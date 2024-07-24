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
            $table->integer('rating5aa');
            $table->integer('rating5ab');
            $table->integer('rating5ac');
            $table->integer('rating5b');
            $table->integer('rating5ca');
            $table->integer('rating5cb');
            $table->integer('rating5cc');
            $table->integer('rating5cd');
            $table->integer('rating5da');
            $table->integer('rating5db');
            $table->integer('rating5ea');
            $table->integer('rating5eb');
            $table->integer('rating5ec');
            $table->integer('rating5ed');
            $table->integer('rating5ee');
            $table->integer('rating5ef');
            $table->integer('rating5fa');
            $table->integer('rating5fb');
            $table->integer('rating5fc');
            $table->integer('rating5ga');
            $table->integer('rating5ha');
            $table->integer('rating5hb');
            $table->integer('rating5ia');
            $table->integer('rating5ib');
            $table->integer('rating5ic');
            $table->integer('rating5id');
            $table->integer('rating5ie');
            $table->integer('rating5if');
            $table->integer('rating5ig');
            $table->integer('rating5ih');

            $table->string('remarks5aa', 255);
            $table->string('remarks5ab', 255);
            $table->string('remarks5ac', 255);
            $table->string('remarks5b', 255);
            $table->string('remarks5ca', 255);
            $table->string('remarks5cb', 255);
            $table->string('remarks5cc', 255);
            $table->string('remarks5cd', 255);
            $table->string('remarks5da', 255);
            $table->string('remarks5db', 255);
            $table->string('remarks5ea', 255);
            $table->string('remarks5eb', 255);
            $table->string('remarks5ec', 255);
            $table->string('remarks5ed', 255);
            $table->string('remarks5ee', 255);
            $table->string('remarks5ef', 255);
            $table->string('remarks5fa', 255);
            $table->string('remarks5fb', 255);
            $table->string('remarks5fc', 255);
            $table->string('remarks5ga', 255);
            $table->string('remarks5ha', 255);
            $table->string('remarks5hb', 255);
            $table->string('remarks5ia', 255);
            $table->string('remarks5ib', 255);
            $table->string('remarks5ic', 255);
            $table->string('remarks5id', 255);
            $table->string('remarks5ie', 255);
            $table->string('remarks5if', 255);
            $table->string('remarks5ig', 255);
            $table->string('remarks5ih', 255);

 
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

        Schema::create('mplgubrgynutritionservicetracking', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status'); 
            $table->integer('barangay_id')->unsigned(); 
            $table->integer('municipal_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('mplgubrgynutritionservice_id')->unsigned(); 
            $table->foreign('mplgubrgynutritionservice_id')->references('id')->on('mplgubrgynutritionservice');
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
        Schema::dropIfExists('mplgubrgynutritionservice');
        Schema::dropIfExists('mplgubrgynutritionservicetracking');
    }
};
