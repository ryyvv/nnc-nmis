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
 
        Schema::create('lguprofilebarangay', function (Blueprint $table) {
            $table->increments('id'); 
            $table->date('dateMonitoring');
            $table->string('periodCovereda',10); 
            $table->integer('totalPopulation');
            $table->integer('noHousehold');
            $table->integer('noPuroks');
            $table->integer('householdWater');
            $table->integer('householdToilets');
            $table->integer('dayCareCenter');
            $table->integer('elementary');
            $table->integer('secondarySchool');
            $table->integer('healthStations');
            $table->integer('retailOutlets');
            $table->integer('bakeries');
            $table->integer('markets');
            $table->integer('transportTerminals');
            $table->integer('breastfeeding');
            $table->string('terrain');
            $table->string('hazards');
            $table->string('affectedLGU');
           
            $table->integer('populationA'); //6-11mos
            $table->integer('populationB'); //12-59mos
            $table->integer('populationC'); //0-59mos
            $table->integer('populationD'); //Pregnant
            $table->integer('populationE'); //Lactating
            $table->integer('populationF'); //Lactating
            $table->integer('actualA'); //6-11mos
            $table->integer('actualB'); //12-59mos
            $table->integer('actualC'); //0-59mos
            $table->integer('actualD'); //Pregnant
            $table->integer('actualE'); //Lactating
            $table->integer('actualF'); //Lactating

            // overweight (%) overweight
            $table->integer('psnormalAAA'); 
            $table->integer('psunderweightAAA'); 
            $table->integer('pssevereUnderweightAAA'); 
            $table->integer('psoverweightAAA'); 

            $table->integer('psnormalBAA'); 
            $table->integer('psunderweightBAA'); 
            $table->integer('pssevereUnderweightBAA'); 
            $table->integer('psoverweightBAA'); 

            $table->integer('psnormalCAA'); 
            $table->integer('psunderweightCAA'); 
            $table->integer('pssevereUnderweightCAA'); 
            $table->integer('psoverweightCAA'); 

            // overweight (%) obese
            $table->integer('psnormalABA'); 
            $table->integer('pswastedABA'); 
            $table->integer('psseverelyWastedABA'); 
            $table->integer('psoverweightABA'); 
            $table->integer('psobeseABA'); 
    
            $table->integer('psnormalBBA'); 
            $table->integer('pswastedBBA'); 
            $table->integer('psseverelyWastedBBA'); 
            $table->integer('psoverweightBBA'); 
            $table->integer('psobeseBBA'); 
    
            $table->integer('psnormalCCA'); 
            $table->integer('pswastedCCA'); 
            $table->integer('psseverelyWastedCCA'); 
            $table->integer('psoverweightCCA'); 
            $table->integer('psobeseCCA'); 

            // overweight (%) tall
            $table->integer('psnormalAAB'); 
            $table->integer('psstuntedAAB'); 
            $table->integer('pssevereStuntedAAB'); 
            $table->integer('pstallAAB'); 
    
            $table->integer('psnormalBBB'); 
            $table->integer('psstuntedBBB'); 
            $table->integer('pssevereStuntedBBB'); 
            $table->integer('pstallBBB'); 
    
            $table->integer('psnormalCCC'); 
            $table->integer('psstuntedCCC'); 
            $table->integer('pssevereStuntedCCC'); 
            $table->integer('pstallCCC'); 

           // overweight (%) obese School Children
           $table->integer('scnormalABA'); 
           $table->integer('scwastedABA'); 
           $table->integer('scseverelyWastedABA'); 
           $table->integer('scoverweightABA'); 
           $table->integer('scobeseABA'); 
   
           $table->integer('scnormalBBA'); 
           $table->integer('scwastedBBA'); 
           $table->integer('scseverelyWastedBBA'); 
           $table->integer('scoverweightBBA'); 
           $table->integer('scobeseBBA'); 
   
           $table->integer('scnormalCCA'); 
           $table->integer('scwastedCCA'); 
           $table->integer('scseverelyWastedCCA'); 
           $table->integer('scoverweightCCA'); 
           $table->integer('scobeseCCA'); 

        // overweight (%) obese Pregnant Woman
           $table->integer('pwnormalAAA'); 
           $table->integer('pwnutritionllyatriskAAA');  
           $table->integer('pwoverweightAAA'); 
           $table->integer('pwobeseAAA'); 
   
           $table->integer('pwnormalBAA'); 
           $table->integer('pwnutritionllyatriskBAA');  
           $table->integer('pwoverweightBAA'); 
           $table->integer('pwobeseBAA'); 
   
           $table->integer('pwnormalCAA'); 
           $table->integer('pwnutritionllyatriskCAA');  
           $table->integer('pwoverweightCAA'); 
           $table->integer('pwobeseCAA'); 

           $table->string('landAreaResidential');
           $table->string('remarksResidential'); 

           $table->string('landAreaCommercial');
           $table->string('remarksCommercial'); 

           $table->string('landAreaIndustrial');
           $table->string('remarksIndustrial'); 

           $table->string('landAreaAgricultural');
           $table->string('remarksAgricultural'); 

           $table->string('landAreaFLMLNP');
           $table->string('remarksFLMLNP');

           $table->string('Isource');
           $table->string('Iavailreceived');
           $table->date('Idatereceived');
           $table->integer('Ivolumepax');
           $table->string('Iremarks');

           $table->string('IIAsource');
           $table->string('IIAavailreceived');
           $table->date('IIAdatereceived');
           $table->integer('IIAvolumepax');
           $table->string('IIAremarks');

           $table->string('IIBsource');
           $table->string('IIBavailreceived');
           $table->date('IIBdatereceived');
           $table->integer('IIBvolumepax');
           $table->string('IIBremarks');

           $table->string('IIIAsource');
           $table->string('IIIAavailreceived');
           $table->date('IIIAdatereceived');
           $table->integer('IIIAvolumepax');
           $table->string('IIIAremarks');

           $table->string('IIIBsource');
           $table->string('IIIBavailreceived');
           $table->date('IIIBdatereceived');
           $table->integer('IIIBvolumepax');
           $table->string('IIIBremarks');

           $table->string('IIICsource');
           $table->string('IIICavailreceived');
           $table->date('IIICdatereceived');
           $table->integer('IIICvolumepax');
           $table->string('IIICremarks');

           $table->string('IIIDsource');
           $table->string('IIIDavailreceived');
           $table->date('IIIDdatereceived');
           $table->integer('IIIDvolumepax');
           $table->string('IIIDremarks');

           $table->string('IIIEsource');
           $table->string('IIIEavailreceived');
           $table->date('IIIEdatereceived');
           $table->integer('IIIEvolumepax');
           $table->string('IIIEremarks');

           $table->string('IIIFsource');
           $table->string('IIIFavailreceived');
           $table->date('IIIFdatereceived');
           $table->integer('IIIFvolumepax');
           $table->string('IIIFremarks');

           $table->string('IVAsource');
           $table->string('IVAavailreceived');
           $table->date('IVAdatereceived');
           $table->integer('IVAvolumepax');
           $table->string('IVAremarks');

           $table->string('VAsource');
           $table->string('VAavailreceived');
           $table->date('VAdatereceived');
           $table->integer('VAvolumepax');
           $table->string('VAremarks');
           
            $table->integer('status');
            $table->date('dateCreated');
            $table->date('dateUpdates');

            $table->integer('barangay_id')->unsigned(); 
            $table->integer('user_id')->unsigned(); 
            $table->integer('municipal_id')->unsigned(); 
            $table->integer('province_id')->unsigned(); 
            $table->integer('region_id')->unsigned(); 
            $table->foreign('user_id')->references('id')->on('regions'); 
            $table->foreign('region_id')->references('id')->on('regions'); 
            $table->foreign('province_id')->references('id')->on('provinces'); 
            $table->foreign('municipal_id')->references('id')->on('municipals');
            $table->foreign('barangay_id')->references('id')->on('barangays'); 
            $table->timestamps();
        });


        Schema::create('barangaytracking', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status'); 
            $table->integer('barangay_id')->unsigned(); 
            $table->integer('municipal_id')->unsigned();
            $table->integer('user_id')->unsigned();
            
            $table->integer('lguprofilebarangay_id')->unsigned(); 
            $table->foreign('lguprofilebarangay_id')->references('id')->on('lguprofilebarangay');
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
        Schema::dropIfExists('lguprofilebarangay');
        Schema::dropIfExists('barangaytracking');
    }
};
