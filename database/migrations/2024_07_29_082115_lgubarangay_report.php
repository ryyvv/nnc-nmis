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
        Schema::create('lgubarangayreport', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dateMonitoring',255);
            $table->string('periodCovereda',255); 
            
            // lguProfile 
            $table->unsignedBigInteger('lguprofilebarangay_id')->nullable();
           

            //VisionMission
            $table->unsignedBigInteger('mplgubrgyvisionmissions_id')->nullable();
            

            //Nutrition Policies
            $table->unsignedBigInteger('mellpiprobarangaynationalpolicies_id')->nullable();
             

            //Governance
            $table->unsignedBigInteger('mplgubrgygovernance_id')->nullable();
           
            
            //LNC Management
            $table->unsignedBigInteger('mplgubrgylncmanagement_id')->nullable();
             

            //Nutrition Service
            $table->unsignedBigInteger('mplgubrgynutritionservice_id')->nullable();
             

            //Change in Nutrition Service
            $table->unsignedBigInteger('mplgubrgychangeNS_id')->nullable();
             

            //Discussion Question
            $table->unsignedBigInteger('mplgubrgydiscussionquestion_id')->nullable();
           
            
            $table->integer('count');

            //Budget AIP
            // $table->integer('mplgubrgylncmanagement_id')->unsigned(); 
            // $table->foreign('mplgubrgylncmanagement_id')->references('id')->on('mplgubrgylncmanagement');

            $table->integer('municipal_id')->unsigned(); 
            
            $table->integer('barangay_id')->unsigned();  

            $table->integer('user_id')->unsigned(); 
            $table->integer('status'); 
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lgubarangayreport');
    }
};
