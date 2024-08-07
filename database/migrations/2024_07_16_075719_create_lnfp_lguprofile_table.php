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
        Schema::create('lnfp_lguprofile', function (Blueprint $table) {
            $table->id();
            $table->string('lnfp_officer', 255)->nullable();
            $table->date('dateMonitoring')->nullable();
            $table->string('periodCovereda',10)->nullable();
            $table->integer('numOfMuni')->nullable();
            $table->integer('totalPopulation')->nullable();
            $table->integer('noHousehold')->nullable();
            $table->integer('noPuroks')->nullable();
            $table->integer('householdWater')->nullable();
            $table->integer('householdToilets')->nullable();
            $table->integer('dayCareCenter')->nullable();
            $table->integer('elementary')->nullable();
            $table->integer('secondarySchool')->nullable();
            $table->integer('healthStations')->nullable();
            $table->integer('retailOutlets')->nullable();
            $table->integer('bakeries')->nullable();
            $table->integer('markets')->nullable();
            $table->integer('transportTerminals')->nullable();
            $table->integer('breastfeeding')->nullable();
            $table->string('hazards')->nullable();
            $table->string('affectedLGU')->nullable();

            $table->integer('populationA')->nullable(); //6-11mos
            $table->integer('populationB')->nullable(); //12-59mos
            $table->integer('populationC')->nullable(); //0-59mos
            $table->integer('populationD')->nullable(); //Pregnant
            $table->integer('populationE')->nullable(); //Lactating
            $table->integer('populationF')->nullable(); //Lactating
            $table->integer('actualA')->nullable(); //6-11mos
            $table->integer('actualB')->nullable(); //12-59mos
            $table->integer('actualC')->nullable(); //0-59mos
            $table->integer('actualD')->nullable(); //Pregnant
            $table->integer('actualE')->nullable(); //Lactating
            $table->integer('actualF')->nullable(); //Lactating

            // overweight (%) overweight
            $table->integer('psnormalAAA')->nullable(); 
            $table->integer('psunderweightAAA')->nullable(); 
            $table->integer('pssevereUnderweightAAA')->nullable(); 
            $table->integer('psoverweightAAA')->nullable(); 

            $table->integer('psnormalBAA')->nullable(); 
            $table->integer('psunderweightBAA')->nullable(); 
            $table->integer('pssevereUnderweightBAA')->nullable(); 
            $table->integer('psoverweightBAA')->nullable(); 

            $table->integer('psnormalCAA')->nullable(); 
            $table->integer('psunderweightCAA')->nullable(); 
            $table->integer('pssevereUnderweightCAA')->nullable(); 
            $table->integer('psoverweightCAA')->nullable(); 

            // overweight (%) obese
            $table->integer('psnormalABA')->nullable(); 
            $table->integer('pswastedABA')->nullable(); 
            $table->integer('psseverelyWastedABA')->nullable(); 
            $table->integer('psoverweightABA')->nullable(); 
            $table->integer('psobeseABA')->nullable(); 
    
            $table->integer('psnormalBBA')->nullable(); 
            $table->integer('pswastedBBA')->nullable(); 
            $table->integer('psseverelyWastedBBA')->nullable(); 
            $table->integer('psoverweightBBA')->nullable(); 
            $table->integer('psobeseBBA')->nullable(); 
    
            $table->integer('psnormalCCA')->nullable(); 
            $table->integer('pswastedCCA')->nullable(); 
            $table->integer('psseverelyWastedCCA')->nullable(); 
            $table->integer('psoverweightCCA')->nullable(); 
            $table->integer('psobeseCCA')->nullable();

            // overweight (%) tall
            $table->integer('psnormalAAB')->nullable(); 
            $table->integer('psstuntedAAB')->nullable(); 
            $table->integer('pssevereStuntedAAB')->nullable(); 
            $table->integer('pstallAAB')->nullable(); 
    
            $table->integer('psnormalBBB')->nullable(); 
            $table->integer('psstuntedBBB')->nullable(); 
            $table->integer('pssevereStuntedBBB')->nullable(); 
            $table->integer('pstallBBB')->nullable(); 
    
            $table->integer('psnormalCCC')->nullable(); 
            $table->integer('psstuntedCCC')->nullable(); 
            $table->integer('pssevereStuntedCCC')->nullable(); 
            $table->integer('pstallCCC')->nullable();

            // overweight (%) obese School Children
           $table->integer('scnormalABA')->nullable(); 
           $table->integer('scwastedABA')->nullable(); 
           $table->integer('scseverelyWastedABA')->nullable(); 
           $table->integer('scoverweightABA')->nullable(); 
           $table->integer('scobeseABA')->nullable(); 
   
           $table->integer('scnormalBBA')->nullable(); 
           $table->integer('scwastedBBA')->nullable(); 
           $table->integer('scseverelyWastedBBA')->nullable(); 
           $table->integer('scoverweightBBA')->nullable(); 
           $table->integer('scobeseBBA')->nullable(); 
   
           $table->integer('scnormalCCA')->nullable(); 
           $table->integer('scwastedCCA')->nullable(); 
           $table->integer('scseverelyWastedCCA')->nullable(); 
           $table->integer('scoverweightCCA')->nullable(); 
           $table->integer('scobeseCCA')->nullable(); 

           // overweight (%) obese Pregnant Woman
           $table->integer('pwnormalAAA')->nullable(); 
           $table->integer('pwnutritionllyatriskAAA')->nullable();  
           $table->integer('pwoverweightAAA')->nullable(); 
           $table->integer('pwobeseAAA')->nullable(); 
   
           $table->integer('pwnormalBAA')->nullable(); 
           $table->integer('pwnutritionllyatriskBAA')->nullable();  
           $table->integer('pwoverweightBAA')->nullable(); 
           $table->integer('pwobeseBAA')->nullable(); 
   
           $table->integer('pwnormalCAA')->nullable(); 
           $table->integer('pwnutritionllyatriskCAA')->nullable();  
           $table->integer('pwoverweightCAA')->nullable(); 
           $table->integer('pwobeseCAA')->nullable();

           // total brgy nutrition scholar
           $table->integer('newBrgyScholar')->nullable();
           $table->integer('oldBrgyScholar')->nullable();

           //Land Class
           $table->string('landAreaResidential')->nullable();
           $table->string('remarksResidential')->nullable(); 

           $table->string('landAreaCommercial')->nullable();
           $table->string('remarksCommercial')->nullable(); 

           $table->string('landAreaIndustrial')->nullable();
           $table->string('remarksIndustrial')->nullable(); 

           $table->string('landAreaAgricultural')->nullable();
           $table->string('remarksAgricultural')->nullable(); 

           $table->string('landAreaFLMLNP')->nullable();
           $table->string('remarksFLMLNP')->nullable();

           //-----
           $table->integer('status');

           // 
        //    $table->integer('user_id')->unsigned(); 
        //    $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('user_id')->unsigned()->change();
            $table->foreign('user_id')->references('id')->on('users');

           $table->integer('barangay_id')->unsigned();
           $table->foreign('barangay_id')->references('id')->on('barangays'); 

           $table->integer('municipal_id')->unsigned(); 
           $table->foreign('municipal_id')->references('id')->on('municipals');

           $table->integer('province_id')->unsigned(); 
           $table->foreign('province_id')->references('id')->on('provinces');

           $table->integer('region_id')->unsigned(); 
           $table->foreign('region_id')->references('id')->on('regions');
           
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lnfp_lguprofile');
    }
};
