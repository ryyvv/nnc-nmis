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
            $table->foreign('lguprofilebarangay_id')->references('id')->on('lguprofilebarangay')->onDelete('cascade')->onDelete('cascade');

            //VisionMission
            $table->unsignedBigInteger('mplgubrgyvisionmissions_id')->nullable();
            $table->foreign('mplgubrgyvisionmissions_id')->references('id')->on('mplgubrgyvisionmissions')->onDelete('cascade');

            //Nutrition Policies
            $table->unsignedBigInteger('mellpiprobarangaynationalpolicies_id')->nullable();
            $table->foreign('mellpiprobarangaynationalpolicies_id')->references('id')->on('mellpiprobarangaynationalpolicies')->onDelete('cascade');

            //Governance
            $table->unsignedBigInteger('mplgubrgygovernance_id')->nullable();
            $table->foreign('mplgubrgygovernance_id')->references('id')->on('mplgubrgygovernance')->onDelete('cascade');
            
            //LNC Management
            $table->unsignedBigInteger('mplgubrgylncmanagement_id')->nullable();
            $table->foreign('mplgubrgylncmanagement_id')->references('id')->on('mplgubrgylncmanagement')->onDelete('cascade');

            //Nutrition Service
            $table->unsignedBigInteger('mplgubrgynutritionservice_id')->nullable();
            $table->foreign('mplgubrgynutritionservice_id')->references('id')->on('mplgubrgynutritionservice')->onDelete('cascade');

            //Change in Nutrition Service
            $table->unsignedBigInteger('mplgubrgychangeNS_id')->nullable();
            $table->foreign('mplgubrgychangeNS_id')->references('id')->on('mplgubrgychangeNS')->onDelete('cascade');

            //Discussion Question
            $table->unsignedBigInteger('mplgubrgydiscussionquestion_id')->nullable();
            $table->foreign('mplgubrgydiscussionquestion_id')->references('id')->on('mplgubrgydiscussionquestion')->onDelete('cascade');
            
            $table->integer('count');

            //Budget AIP
            // $table->integer('mplgubrgylncmanagement_id')->unsigned(); 
            // $table->foreign('mplgubrgylncmanagement_id')->references('id')->on('mplgubrgylncmanagement');

            $table->integer('municipal_id')->unsigned();
            $table->foreign('municipal_id')->references('id')->on('municipals'); 
            
            $table->integer('barangay_id')->unsigned(); 
            $table->foreign('barangay_id')->references('id')->on('barangays'); 

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
