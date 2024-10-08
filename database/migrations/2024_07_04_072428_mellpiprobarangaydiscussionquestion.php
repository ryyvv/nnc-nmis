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
        Schema::create('mplgubrgydiscussionquestion' , function (Blueprint $table) {
            $table->increments('id');
            $table->string('practice7aa', 255)->nullable();
            $table->string('practice7ab', 255)->nullable();
            $table->string('practice7ac', 255)->nullable();
            $table->string('practice7ad', 255)->nullable(); 

            $table->string('practice7ba', 255)->nullable();
            $table->string('practice7bb', 255)->nullable();
            $table->string('practice7bc', 255)->nullable();
            $table->string('practice7bd', 255)->nullable(); 

            $table->string('practice7ca', 255)->nullable();
            $table->string('practice7cb', 255)->nullable();
            $table->string('practice7cc', 255)->nullable();
            $table->string('practice7cd', 255)->nullable(); 

            $table->string('practice7da', 255)->nullable();
            $table->string('practice7db', 255)->nullable();
            $table->string('practice7dc', 255)->nullable();
            $table->string('practice7dd', 255)->nullable(); 

            $table->string('practice7ea', 255)->nullable();
            $table->string('practice7eb', 255)->nullable();
            $table->string('practice7ec', 255)->nullable();
            $table->string('practice7ed', 255)->nullable(); 

            $table->string('practice7fa', 255)->nullable();
            $table->string('practice7fb', 255)->nullable();
            $table->string('practice7fc', 255)->nullable();
            $table->string('practice7fd', 255)->nullable(); 
 
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

        Schema::create('mplgubrgydiscussionquestiontracking', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status'); 
            $table->string('barangay_id' ,20)->unsigned(); 
            $table->string('municipal_id',20)->unsigned();
            $table->integer('user_id')->unsigned()->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('mplgubrgydiscussionquestion_id')->unsigned(); 
            $table->foreign('mplgubrgydiscussionquestion_id')->references('id')->on('mplgubrgydiscussionquestion');
          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mplgubrgydiscussionquestion');
        Schema::dropIfExists('mplgubrgydiscussionquestiontracking');
    }
};