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
            $table->string('lnfp_officer')->nullable();
            $table->date('dateMonitoring')->nullable();
            $table->string('periodCovereda')->nullable();
            $table->integer('numOfMuni')->nullable();
            $table->integer('totalPopulation')->nullable();
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
            $table->text('hazards')->nullable();
            $table->string('affectedLGU')->nullable();
            $table->integer('noHousehold')->nullable();
            $table->integer('noPuroks')->nullable();
            $table->integer('populationA')->nullable();
            $table->integer('populationB')->nullable();
            $table->integer('populationC')->nullable();
            $table->integer('populationD')->nullable();
            $table->integer('populationE')->nullable();
            $table->integer('populationF')->nullable();
            $table->integer('actualA')->nullable();
            $table->integer('actualB')->nullable();
            $table->integer('actualC')->nullable();
            $table->integer('actualD')->nullable();
            $table->integer('actualE')->nullable();
            $table->integer('actualF')->nullable();
            
            // overweight (%)
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

            $table->integer('newBrgyScholar')->nullable();
            $table->integer('oldBrgyScholar')->nullable();

            // Land Area
            $table->integer('landAreaResidential')->nullable();
            $table->text('remarksResidential')->nullable();
            $table->integer('landAreaCommercial')->nullable();
            $table->text('remarksCommercial')->nullable();
            $table->integer('landAreaIndustrial')->nullable();
            $table->text('remarksIndustrial')->nullable();
            $table->integer('landAreaAgricultural')->nullable();
            $table->text('remarksAgricultural')->nullable();
            $table->integer('landAreaFLMLNP')->nullable();
            $table->text('remarksFLMLNP')->nullable();

            $table->integer('status')->default(1);
            $table->unsignedBigInteger('barangay_id')->nullable();
            $table->unsignedBigInteger('municipal_id')->nullable();
            $table->unsignedBigInteger('province_id')->nullable();
            $table->unsignedBigInteger('region_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('income_class')->nullable();
            
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
