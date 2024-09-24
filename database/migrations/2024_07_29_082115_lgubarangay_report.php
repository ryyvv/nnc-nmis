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
            $table->unsignedBigInteger('lguprofilebarangayStatus_id')->nullable();
           

            //VisionMission
            $table->unsignedBigInteger('mplgubrgyvisionmissions_id')->nullable();
            $table->unsignedBigInteger('mplgubrgyvisionmissionsStatus_id')->nullable();

            //Nutrition Policies
            $table->unsignedBigInteger('mellpiprobarangaynationalpolicies_id')->nullable();
            $table->unsignedBigInteger('mellpiprobarangaynationalpoliciesStatus_id')->nullable();

            //Governance
            $table->unsignedBigInteger('mplgubrgygovernance_id')->nullable();
            $table->unsignedBigInteger('mplgubrgygovernanceStatus_id')->nullable();
            
            //LNC Management
            $table->unsignedBigInteger('mplgubrgylncmanagement_id')->nullable();
            $table->unsignedBigInteger('mplgubrgylncmanagementStatus_id')->nullable();

            //Nutrition Service
            $table->unsignedBigInteger('mplgubrgynutritionservice_id')->nullable();
            $table->unsignedBigInteger('mplgubrgynutritionserviceStatus_id')->nullable();
            
            //b1bSummary
            $table->unsignedBigInteger('mplgubrgyb1bSummary_id')->nullable();
            $table->unsignedBigInteger('mplgubrgyb1bSummaryStatus_id')->nullable();

            //Change in Nutrition Service
            $table->unsignedBigInteger('mplgubrgychangeNS_id')->nullable();
            $table->unsignedBigInteger('mplgubrgychangeNSStatus_id')->nullable();

            //b2bSummary
            $table->unsignedBigInteger('mplgubrgyb2bSummary_id')->nullable();
            $table->unsignedBigInteger('mplgubrgyb2bSummaryStatus_id')->nullable();

            //Discussion Question
            $table->unsignedBigInteger('mplgubrgydiscussionquestion_id')->nullable();
            $table->unsignedBigInteger('mplgubrgydiscussionquestionStatus_id')->nullable();
            
            //b4 Summary
            $table->unsignedBigInteger('mplgubrgyb4Summary_id')->nullable();
            $table->unsignedBigInteger('mplgubrgyb4SummaryStatus_id')->nullable();            
            //b4 Summary
            $table->unsignedBigInteger('mplgubrgybudgetAIP_id')->nullable();
            $table->unsignedBigInteger('mplgubrgybudgetAIPStatus_id')->nullable();
            
            $table->integer('count');

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
