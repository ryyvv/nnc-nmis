<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lnfp_lguprofile extends Model
{
    use HasFactory;

    protected $fillable = [
        'dateMonitoring',
        'periodCovereda', 
        'totalPopulation',
        'householdWater',
        'householdToilets',
        'dayCareCenter',
        'elementary',
        'secondarySchool',
        'healthStations',
        'retailOutlets',
        'bakeries',
        'markets',
        'transportTerminals',
        'breastfeeding',
        'hazards',
        'affectedLGU',
        'noHousehold',
        'noPuroks',
        'populationA', //6-11mos
        'populationB', //12-59mos
        'populationC', //0-59mos
        'populationD', //Pregnant
        'populationE', //Lactating
        'populationF', //Lactating

        'actualA', //6-11mos
        'actualB', //12-59mos
        'actualC', //0-59mos
        'actualD', //Pregnant
        'actualE', //Lactating
        'actualF', //Lactating

        // overweight (%) overweight
        'psnormalAAA', 
        'psunderweightAAA',
        'pssevereUnderweightAAA',
        'psoverweightAAA',

        'psnormalBAA', 
        'psunderweightBAA',
        'pssevereUnderweightBAA',
        'psoverweightBAA',

        'psnormalCAA',
        'psunderweightCAA',
        'pssevereUnderweightCAA',
        'psoverweightCAA',

        // overweight (%) obese
        'psnormalABA',
        'pswastedABA',
        'psseverelyWastedABA',
        'psoverweightABA',
        'psobeseABA',

        'psnormalBBA',
        'pswastedBBA',
        'psseverelyWastedBBA',
        'psoverweightBBA',
        'psobeseBBA',

        'psnormalCCA',
        'pswastedCCA',
        'psseverelyWastedCCA',
        'psoverweightCCA',
        'psobeseCCA',

        // overweight (%) tall
        'psnormalAAB',
        'psstuntedAAB',
        'pssevereStuntedAAB',
        'pstallAAB',

        'psnormalBBB',
        'psstuntedBBB',
        'pssevereStuntedBBB',
        'pstallBBB',

        'psnormalCCC',
        'psstuntedCCC',
        'pssevereStuntedCCC',
        'pstallCCC',

        // overweight (%) obese School Children
        'scnormalABA',
        'scwastedABA',
        'scseverelyWastedABA',
        'scoverweightABA',
        'scobeseABA',

        'scnormalBBA',
        'scwastedBBA',
        'scseverelyWastedBBA',
        'scoverweightBBA',
        'scobeseBBA',

        'scnormalCCA',
        'scwastedCCA',
        'scseverelyWastedCCA',
        'scoverweightCCA',
        'scobeseCCA',

        // overweight (%) obese Pregnant Woman
        'pwnormalAAA',
        'pwnutritionllyatriskAAA',
        'pwoverweightAAA',
        'pwobeseAAA',

        'pwnormalBAA',
        'pwnutritionllyatriskBAA',
        'pwoverweightBAA',
        'pwobeseBAA',

        'pwnormalCAA',
        'pwnutritionllyatriskCAA',
        'pwoverweightCAA',
        'pwobeseCAA',

        'newBrgyScholar',
        'oldBrgyScholar',

        'landAreaResidential',
        'remarksResidential',

        'landAreaCommercial',
        'remarksCommercial',

        'landAreaIndustrial',
        'remarksIndustrial',

        'landAreaAgricultural',
        'remarksAgricultural',

        'landAreaFLMLNP',
        'remarksFLMLNP',

        'status',

        'barangay_id',
        'municipal_id',
        'province_id',
        'region_id',
        'user_id'

    ];

    protected $guarded = ['id'];
    protected $table = 'lnfp_lguprofile';
}
