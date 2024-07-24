<?php

namespace App\Http\Controllers\BarangayScholar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\lnfp_lguprofile;
use App\Models\barangaytracking;
use App\Models\lnfp_lguprofiletracking;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;


class MellpiProForLNFP_barangayLGUController extends Controller
{
    //
    //LGU Profile (LNFP)
    public function index()
    {
        //
        $lnfpProfile = lnfp_lguprofile::get();

        return view('BarangayScholar/MellpiProForLNFP/LGUprofile.MellpiProForLNFPIndex', ['lnfpProfile' => $lnfpProfile]);
        // return view('BarangayScholar/MellpiProForLNFP/LGUprofile.MellpiProForLNFPIndex');
    }
    public function mellpiProLNFP_LGUedit(Request $request)
    {

        $lnfpProfile = DB::table('lnfp_lguprofile')->where('id', $request->id)->first();

        return view('BarangayScholar/MellpiProForLNFP/LGUprofile.MellpiProForLNFPEdit', ['lnfpProfile' => $lnfpProfile]);
    }
    public function mellpiProLNFP_LGUcreate()
    {
        //
        return view('BarangayScholar/MellpiProForLNFP/LGUprofile.MellpiProForLNFPCreate');
    }

    public function storeSubmit(Request $request)
    {
        $action = $request->input('action');
        // dd($action);
        if ($action == 'submit') {
            $rules = [
                'dateMonitoring' => 'nullable',
                'periodCovereda' => 'nullable',
                'totalPopulation' => 'nullable',
                'householdWater' => 'nullable',
                'householdToilets' => 'nullable',
                'dayCareCenter' => 'nullable',
                'elementary' => 'nullable',
                'secondarySchool' => 'nullable',
                'healthStations' => 'nullable',
                'retailOutlets' => 'nullable',
                'bakeries' => 'nullable',
                'markets' => 'nullable',
                'transportTerminals' => 'nullable',
                'breastfeeding' => 'nullable',
                'hazards' => 'nullable',
                'affectedLGU' => 'nullable',
                'noHousehold' => 'nullable',
                'noPuroks' => 'nullable',
                'populationA' => 'nullable',
                'populationB' => 'nullable',
                'populationC' => 'nullable',
                'populationD' => 'nullable',
                'populationE' => 'nullable',
                'populationF' => 'nullable',
                'actualA' => 'nullable',
                'actualB' => 'nullable',
                'actualC' => 'nullable',
                'actualD' => 'nullable',
                'actualE' => 'nullable',
                'actualF' => 'nullable',
                'psnormalAAA' => 'nullable',
                'psunderweightAAA' => 'nullable',
                'pssevereUnderweightAAA' => 'nullable',
                'psoverweightAAA' => 'nullable',
                'psnormalBAA' => 'nullable',
                'psunderweightBAA' => 'nullable',
                'pssevereUnderweightBAA' => 'nullable',
                'psoverweightBAA' => 'nullable',
                'psnormalCAA' => 'nullable',
                'psunderweightCAA' => 'nullable',
                'pssevereUnderweightCAA' => 'nullable',
                'psoverweightCAA' => 'nullable',
                'psnormalABA' => 'nullable',
                'pswastedABA' => 'nullable',
                'psseverelyWastedABA' => 'nullable',
                'psoverweightABA' => 'nullable',
                'psobeseABA' => 'nullable',
                'psnormalBBA' => 'nullable',
                'pswastedBBA' => 'nullable',
                'psseverelyWastedBBA' => 'nullable',
                'psoverweightBBA' => 'nullable',
                'psobeseBBA' => 'nullable',
                'psnormalCCA' => 'nullable',
                'pswastedCCA' => 'nullable',
                'psseverelyWastedCCA' => 'nullable',
                'psoverweightCCA' => 'nullable',
                'psobeseCCA' => 'nullable',
                'psnormalAAB' => 'nullable',
                'psstuntedAAB' => 'nullable',
                'pssevereStuntedAAB' => 'nullable',
                'pstallAAB' => 'nullable',
                'psnormalBBB' => 'nullable',
                'psstuntedBBB' => 'nullable',
                'pssevereStuntedBBB' => 'nullable',
                'pstallBBB' => 'nullable',
                'psnormalCCC' => 'nullable',
                'psstuntedCCC' => 'nullable',
                'pssevereStuntedCCC' => 'nullable',
                'pstallCCC' => 'nullable',
                'scnormalABA' => 'nullable',
                'scwastedABA' => 'nullable',
                'scseverelyWastedABA' => 'nullable',
                'scoverweightABA' => 'nullable',
                'scobeseABA' => 'nullable',
                'scnormalBBA' => 'nullable',
                'scwastedBBA' => 'nullable',
                'scseverelyWastedBBA' => 'nullable',
                'scoverweightBBA' => 'nullable',
                'scobeseBBA' => 'nullable',
                'scnormalCCA' => 'nullable',
                'scwastedCCA' => 'nullable',
                'scseverelyWastedCCA' => 'nullable',
                'scoverweightCCA' => 'nullable',
                'scobeseCCA' => 'nullable',
                'pwnormalAAA' => 'nullable',
                'pwnutritionllyatriskAAA' => 'nullable',
                'pwoverweightAAA' => 'nullable',
                'pwobeseAAA' => 'nullable',
                'pwnormalBAA' => 'nullable',
                'pwnutritionllyatriskBAA' => 'nullable',
                'pwoverweightBAA' => 'nullable',
                'pwobeseBAA' => 'nullable',
                'pwnormalCAA' => 'nullable',
                'pwnutritionllyatriskCAA' => 'nullable',
                'pwoverweightCAA' => 'nullable',
                'pwobeseCAA' => 'nullable',
                'newBrgyScholar' => 'nullable',
                'oldBrgyScholar' => 'nullable',
                'landAreaResidential' => 'nullable',
                'remarksResidential' => 'nullable',
                'landAreaCommercial' => 'nullable',
                'remarksCommercial' => 'nullable',
                'landAreaIndustrial' => 'nullable',
                'remarksIndustrial' => 'nullable',
                'landAreaAgricultural' => 'nullable',
                'remarksAgricultural' => 'nullable',
                'landAreaFLMLNP' => 'nullable',
                'remarksFLMLNP' => 'nullable',
                'status' => 'nullable',
                'barangay_id' => 'nullable',
                'municipal_id' => 'nullable',
                'province_id' => 'nullable',
                'region_id' => 'nullable',
                'user_id' => 'nullable',
    
            ];
    
    
            $message = [
                'required' => 'The field is required.',
                // 'integer' => 'The field must be a integer.',
                // 'string' => 'The field must be a string.',
                // 'date' => 'The field must be a valid date.',
                // 'max' => 'The field may not be greater than :max characters.',
            ];
    
            // $validator = Validator::make($request->all(), $rules, $message);
    
            $input = $request->all();
            $input = array_map('trim', $input);
    
            $validator = Validator::make($input, $rules, $message);
    
            if ($validator->fails()) {
                Log::error($validator->errors());
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput()
                    ->with('error', 'Something went wrong! Please try again.');
    
                
            } else {
                $LNFPProfileBarangay = lnfp_lguprofile::create([
                    'dateMonitoring' => $request->dateMonitoring,
                    'periodCovereda' => $request->periodCovereda,
                    'totalPopulation' => $request->totalPopulation,
                    'householdWater' => $request->householdWater,
                    'householdToilets' => $request->householdToilets,
                    'dayCareCenter' => $request->dayCareCenter,
                    'elementary' => $request->elementary,
                    'secondarySchool' => $request->secondarySchool,
                    'healthStations' => $request->healthStations,
                    'retailOutlets' => $request->retailOutlets,
                    'bakeries' => $request->bakeries,
                    'markets' => $request->markets,
                    'transportTerminals' => $request->transportTerminals,
                    'breastfeeding' => $request->breastfeeding,
    
                    'hazards' => $request->hazards,
                    'affectedLGU' => $request->affectedLGU,
                    'noHousehold' => $request->noHousehold,
                    'noPuroks' => $request->noPuroks,
                    'populationA' => $request->populationA,
                    'populationB' => $request->populationB,
                    'populationC' => $request->populationC,
                    'populationD' => $request->populationD,
                    'populationE' => $request->populationE,
                    'populationF' => $request->populationF,
                    'actualA' => $request->actualA,
                    'actualB' => $request->actualB,
                    'actualC' => $request->actualC,
                    'actualD' => $request->actualD,
                    'actualE' => $request->actualE,
                    'actualF' => $request->actualF,
    
                    // overweight (%) overweight
                    'psnormalAAA' => $request->psnormalAAA,
                    'psunderweightAAA' => $request->psunderweightAAA,
                    'pssevereUnderweightAAA' => $request->pssevereUnderweightAAA,
                    'psoverweightAAA' => $request->psoverweightAAA,
    
                    'psnormalBAA' => $request->psnormalBAA,
                    'psunderweightBAA' => $request->psunderweightBAA,
                    'pssevereUnderweightBAA' => $request->pssevereUnderweightBAA,
                    'psoverweightBAA' => $request->psoverweightBAA,
    
                    'psnormalCAA' => $request->psnormalCAA,
                    'psunderweightCAA' => $request->psunderweightCAA,
                    'pssevereUnderweightCAA' => $request->pssevereUnderweightCAA,
                    'psoverweightCAA' => $request->psoverweightCAA,
    
                    // overweight (%) obese
                    'psnormalABA' => $request->psnormalABA,
                    'pswastedABA' => $request->pswastedABA,
                    'psseverelyWastedABA' => $request->psseverelyWastedABA,
                    'psoverweightABA' => $request->psoverweightABA,
                    'psobeseABA' => $request->psobeseABA,
    
                    'psnormalBBA' => $request->psnormalBBA,
                    'pswastedBBA' => $request->pswastedBBA,
                    'psseverelyWastedBBA' => $request->psseverelyWastedBBA,
                    'psoverweightBBA' => $request->psoverweightBBA,
                    'psobeseBBA' => $request->psobeseBBA,
    
                    'psnormalCCA' => $request->psnormalCCA,
                    'pswastedCCA' => $request->pswastedCCA,
                    'psseverelyWastedCCA' => $request->psseverelyWastedCCA,
                    'psoverweightCCA' => $request->psoverweightCCA,
                    'psobeseCCA' => $request->psobeseCCA,
    
                    // overweight (%) tall
                    'psnormalAAB' => $request->psnormalAAB,
                    'psstuntedAAB' => $request->psstuntedAAB,
                    'pssevereStuntedAAB' => $request->pssevereStuntedAAB,
                    'pstallAAB' => $request->pstallAAB,
    
                    'psnormalBBB' => $request->psnormalBBB,
                    'psstuntedBBB' => $request->psstuntedBBB,
                    'pssevereStuntedBBB' => $request->pssevereStuntedBBB,
                    'pstallBBB' => $request->pstallBBB,
    
                    'psnormalCCC' => $request->psnormalCCC,
                    'psstuntedCCC' => $request->psstuntedCCC,
                    'pssevereStuntedCCC' => $request->pssevereStuntedCCC,
                    'pstallCCC' => $request->pstallCCC,
    
                    // overweight (%) obese School Children
                    'scnormalABA' => $request->scnormalABA,
                    'scwastedABA' => $request->scwastedABA,
                    'scseverelyWastedABA' => $request->scseverelyWastedABA,
                    'scoverweightABA' => $request->scoverweightABA,
                    'scobeseABA' => $request->scobeseABA,
    
                    'scnormalBBA' => $request->scnormalBBA,
                    'scwastedBBA' => $request->scwastedABA,
                    'scseverelyWastedBBA' => $request->scseverelyWastedBBA,
                    'scoverweightBBA' => $request->scoverweightBBA,
                    'scobeseBBA' => $request->scobeseBBA,
    
                    'scnormalCCA' => $request->scnormalCCA,
                    'scwastedCCA' => $request->scwastedCCA,
                    'scseverelyWastedCCA' => $request->scseverelyWastedCCA,
                    'scoverweightCCA' => $request->scoverweightCCA,
                    'scobeseCCA' => $request->scobeseCCA,
    
                    // overweight (%) obese Pregnant Woman
                    'pwnormalAAA' => $request->pwnormalAAA,
                    'pwnutritionllyatriskAAA' => $request->pwnutritionllyatriskAAA,
                    'pwoverweightAAA' => $request->pwoverweightAAA,
                    'pwobeseAAA' => $request->pwobeseAAA,
    
                    'pwnormalBAA' => $request->pwnormalBAA,
                    'pwnutritionllyatriskBAA' => $request->pwnutritionllyatriskBAA,
                    'pwoverweightBAA' => $request->pwoverweightBAA,
                    'pwobeseBAA' => $request->pwobeseBAA,
    
                    'pwnormalCAA' => $request->pwnormalCAA,
                    'pwnutritionllyatriskCAA' => $request->pwnutritionllyatriskCAA,
                    'pwoverweightCAA' => $request->pwoverweightCAA,
                    'pwobeseCAA' => $request->pwobeseCAA,
    
                    'newBrgyScholar' => $request->newNutritionScholar,
                    'oldBrgyScholar' => $request->oldNutritionScholar,
    
                    /////
    
                    'landAreaResidential' => $request->landAreaResidential,
                    'remarksResidential' => $request->remarksResidential,
    
                    /////
    
                    'landAreaCommercial' => $request->landAreaCommercial,
                    'remarksCommercial' => $request->remarksCommercial,
    
                    'landAreaIndustrial' => $request->landAreaIndustrial,
                    'remarksIndustrial' => $request->remarksIndustrial,
    
                    'landAreaAgricultural' => $request->landAreaAgricultural,
                    'remarksAgricultural' => $request->remarksAgricultural,
    
                    'landAreaFLMLNP' => $request->landAreaFLMLNP,
                    'remarksFLMLNP' => $request->remarksFLMLNP,
    
    
                    'status' => $request->submitStatus,
    
                    'barangay_id' => $request->barangay_id,
                    'municipal_id' => $request->municipal_id,
                    'province_id' => $request->province_id,
                    'region_id' => $request->region_id,
                    'user_id' => auth()->user()->id,
                    // 'barangay_id' => $request->barangay_id,
                    // 'municipal_id' => $request->municipal_id,
                    // 'province_id' => $request->province_id,
                    // 'region_id' => $request->region_id,
                    // 'user_id' => auth()->user()->id,
                    // 'user_id' => $request->input('userId'),
    
                ]);
                // dd($LNFPProfileBarangay);
    
                if ($LNFPProfileBarangay) {
                    # code...
                    lnfp_lguprofiletracking::create([
                        'lnfp_lguprofile_id' => $LNFPProfileBarangay->id,
                        'status' => $request->submitStatus,
                        'barangay_id' => auth()->user()->barangay,
                        'municipal_id' => auth()->user()->city_municipal,
                        'user_id' => auth()->user()->id,
                    ]);
                }
    
                return redirect()->route('BSLGUprofileLNFPIndex.index')->with('alert', 'Data created Successfully!');
            }
        } elseif ($action == 'draft') {
            $LNFPProfileBarangay = lnfp_lguprofile::create([
                'dateMonitoring' => $request->dateMonitoring,
                'periodCovereda' => $request->periodCovereda,
                'totalPopulation' => $request->totalPopulation,
                'householdWater' => $request->householdWater,
                'householdToilets' => $request->householdToilets,
                'dayCareCenter' => $request->dayCareCenter,
                'elementary' => $request->elementary,
                'secondarySchool' => $request->secondarySchool,
                'healthStations' => $request->healthStations,
                'retailOutlets' => $request->retailOutlets,
                'bakeries' => $request->bakeries,
                'markets' => $request->markets,
                'transportTerminals' => $request->transportTerminals,
                'breastfeeding' => $request->breastfeeding,

                'hazards' => $request->hazards,
                'affectedLGU' => $request->affectedLGU,
                'noHousehold' => $request->noHousehold,
                'noPuroks' => $request->noPuroks,
                'populationA' => $request->populationA,
                'populationB' => $request->populationB,
                'populationC' => $request->populationC,
                'populationD' => $request->populationD,
                'populationE' => $request->populationE,
                'populationF' => $request->populationF,
                'actualA' => $request->actualA,
                'actualB' => $request->actualB,
                'actualC' => $request->actualC,
                'actualD' => $request->actualD,
                'actualE' => $request->actualE,
                'actualF' => $request->actualF,

                // overweight (%) overweight
                'psnormalAAA' => $request->psnormalAAA,
                'psunderweightAAA' => $request->psunderweightAAA,
                'pssevereUnderweightAAA' => $request->pssevereUnderweightAAA,
                'psoverweightAAA' => $request->psoverweightAAA,

                'psnormalBAA' => $request->psnormalBAA,
                'psunderweightBAA' => $request->psunderweightBAA,
                'pssevereUnderweightBAA' => $request->pssevereUnderweightBAA,
                'psoverweightBAA' => $request->psoverweightBAA,

                'psnormalCAA' => $request->psnormalCAA,
                'psunderweightCAA' => $request->psunderweightCAA,
                'pssevereUnderweightCAA' => $request->pssevereUnderweightCAA,
                'psoverweightCAA' => $request->psoverweightCAA,

                // overweight (%) obese
                'psnormalABA' => $request->psnormalABA,
                'pswastedABA' => $request->pswastedABA,
                'psseverelyWastedABA' => $request->psseverelyWastedABA,
                'psoverweightABA' => $request->psoverweightABA,
                'psobeseABA' => $request->psobeseABA,

                'psnormalBBA' => $request->psnormalBBA,
                'pswastedBBA' => $request->pswastedBBA,
                'psseverelyWastedBBA' => $request->psseverelyWastedBBA,
                'psoverweightBBA' => $request->psoverweightBBA,
                'psobeseBBA' => $request->psobeseBBA,

                'psnormalCCA' => $request->psnormalCCA,
                'pswastedCCA' => $request->pswastedCCA,
                'psseverelyWastedCCA' => $request->psseverelyWastedCCA,
                'psoverweightCCA' => $request->psoverweightCCA,
                'psobeseCCA' => $request->psobeseCCA,

                // overweight (%) tall
                'psnormalAAB' => $request->psnormalAAB,
                'psstuntedAAB' => $request->psstuntedAAB,
                'pssevereStuntedAAB' => $request->pssevereStuntedAAB,
                'pstallAAB' => $request->pstallAAB,

                'psnormalBBB' => $request->psnormalBBB,
                'psstuntedBBB' => $request->psstuntedBBB,
                'pssevereStuntedBBB' => $request->pssevereStuntedBBB,
                'pstallBBB' => $request->pstallBBB,

                'psnormalCCC' => $request->psnormalCCC,
                'psstuntedCCC' => $request->psstuntedCCC,
                'pssevereStuntedCCC' => $request->pssevereStuntedCCC,
                'pstallCCC' => $request->pstallCCC,

                // overweight (%) obese School Children
                'scnormalABA' => $request->scnormalABA,
                'scwastedABA' => $request->scwastedABA,
                'scseverelyWastedABA' => $request->scseverelyWastedABA,
                'scoverweightABA' => $request->scoverweightABA,
                'scobeseABA' => $request->scobeseABA,

                'scnormalBBA' => $request->scnormalBBA,
                'scwastedBBA' => $request->scwastedABA,
                'scseverelyWastedBBA' => $request->scseverelyWastedBBA,
                'scoverweightBBA' => $request->scoverweightBBA,
                'scobeseBBA' => $request->scobeseBBA,

                'scnormalCCA' => $request->scnormalCCA,
                'scwastedCCA' => $request->scwastedCCA,
                'scseverelyWastedCCA' => $request->scseverelyWastedCCA,
                'scoverweightCCA' => $request->scoverweightCCA,
                'scobeseCCA' => $request->scobeseCCA,

                // overweight (%) obese Pregnant Woman
                'pwnormalAAA' => $request->pwnormalAAA,
                'pwnutritionllyatriskAAA' => $request->pwnutritionllyatriskAAA,
                'pwoverweightAAA' => $request->pwoverweightAAA,
                'pwobeseAAA' => $request->pwobeseAAA,

                'pwnormalBAA' => $request->pwnormalBAA,
                'pwnutritionllyatriskBAA' => $request->pwnutritionllyatriskBAA,
                'pwoverweightBAA' => $request->pwoverweightBAA,
                'pwobeseBAA' => $request->pwobeseBAA,

                'pwnormalCAA' => $request->pwnormalCAA,
                'pwnutritionllyatriskCAA' => $request->pwnutritionllyatriskCAA,
                'pwoverweightCAA' => $request->pwoverweightCAA,
                'pwobeseCAA' => $request->pwobeseCAA,

                'newBrgyScholar' => $request->newNutritionScholar,
                'oldBrgyScholar' => $request->oldNutritionScholar,

                /////

                'landAreaResidential' => $request->landAreaResidential,
                'remarksResidential' => $request->remarksResidential,

                /////

                'landAreaCommercial' => $request->landAreaCommercial,
                'remarksCommercial' => $request->remarksCommercial,

                'landAreaIndustrial' => $request->landAreaIndustrial,
                'remarksIndustrial' => $request->remarksIndustrial,

                'landAreaAgricultural' => $request->landAreaAgricultural,
                'remarksAgricultural' => $request->remarksAgricultural,

                'landAreaFLMLNP' => $request->landAreaFLMLNP,
                'remarksFLMLNP' => $request->remarksFLMLNP,


                'status' => $request->DraftStatus,

                'barangay_id' => $request->barangay_id,
                'municipal_id' => $request->municipal_id,
                'province_id' => $request->province_id,
                'region_id' => $request->region_id,
                'user_id' => auth()->user()->id,
                // 'barangay_id' => $request->barangay_id,
                // 'municipal_id' => $request->municipal_id,
                // 'province_id' => $request->province_id,
                // 'region_id' => $request->region_id,
                // 'user_id' => auth()->user()->id,
                // 'user_id' => $request->input('userId'),

            ]);
            // dd($LNFPProfileBarangay);

            if ($LNFPProfileBarangay) {
                # code...
                lnfp_lguprofiletracking::create([
                    'lnfp_lguprofile_id' => $LNFPProfileBarangay->id,
                    'status' => $request->submitStatus,
                    'barangay_id' => auth()->user()->barangay,
                    'municipal_id' => auth()->user()->city_municipal,
                    'user_id' => auth()->user()->id,
                ]);
            }

            return redirect()->route('BSLGUprofileLNFPIndex.index')->with('alert', 'Saved as Draft Successfully!');
        }
    }

    public function storeUpdate(Request $request) {
        $action = $request->input('action');
        // dd($action);
        if ($action == 'submit') {
            # code...
            try {
                //code...
                $updateResponse = lnfp_lguprofile::where('id', $request->id)
                ->update([
                    'dateMonitoring' => $request->dateMonitoring,
                    'periodCovereda' => $request->periodCovereda,
                    'totalPopulation' => $request->totalPopulation,
                    'householdWater' => $request->householdWater,
                    'householdToilets' => $request->householdToilets,
                    'dayCareCenter' => $request->dayCareCenter,
                    'elementary' => $request->elementary,
                    'secondarySchool' => $request->secondarySchool,
                    'healthStations' => $request->healthStations,
                    'retailOutlets' => $request->retailOutlets,
                    'bakeries' => $request->bakeries,
                    'markets' => $request->markets,
                    'transportTerminals' => $request->transportTerminals,
                    'breastfeeding' => $request->breastfeeding,

                    'hazards' => $request->hazards,
                    'affectedLGU' => $request->affectedLGU,
                    'noHousehold' => $request->noHousehold,
                    'noPuroks' => $request->noPuroks,
                    'populationA' => $request->populationA,
                    'populationB' => $request->populationB,
                    'populationC' => $request->populationC,
                    'populationD' => $request->populationD,
                    'populationE' => $request->populationE,
                    'populationF' => $request->populationF,
                    'actualA' => $request->actualA,
                    'actualB' => $request->actualB,
                    'actualC' => $request->actualC,
                    'actualD' => $request->actualD,
                    'actualE' => $request->actualE,
                    'actualF' => $request->actualF,

                // overweight (%) overweight
                    'psnormalAAA' => $request->psnormalAAA,
                    'psunderweightAAA' => $request->psunderweightAAA,
                    'pssevereUnderweightAAA' => $request->pssevereUnderweightAAA,
                    'psoverweightAAA' => $request->psoverweightAAA,

                    'psnormalBAA' => $request->psnormalBAA,
                    'psunderweightBAA' => $request->psunderweightBAA,
                    'pssevereUnderweightBAA' => $request->pssevereUnderweightBAA,
                    'psoverweightBAA' => $request->psoverweightBAA,

                    'psnormalCAA' => $request->psnormalCAA,
                    'psunderweightCAA' => $request->psunderweightCAA,
                    'pssevereUnderweightCAA' => $request->pssevereUnderweightCAA,
                    'psoverweightCAA' => $request->psoverweightCAA,

                // overweight (%) obese
                    'psnormalABA' => $request->psnormalABA,
                    'pswastedABA' => $request->pswastedABA,
                    'psseverelyWastedABA' => $request->psseverelyWastedABA,
                    'psoverweightABA' => $request->psoverweightABA,
                    'psobeseABA' => $request->psobeseABA,

                    'psnormalBBA' => $request->psnormalBBA,
                    'pswastedBBA' => $request->pswastedBBA,
                    'psseverelyWastedBBA' => $request->psseverelyWastedBBA,
                    'psoverweightBBA' => $request->psoverweightBBA,
                    'psobeseBBA' => $request->psobeseBBA,

                    'psnormalCCA' => $request->psnormalCCA,
                    'pswastedCCA' => $request->pswastedCCA,
                    'psseverelyWastedCCA' => $request->psseverelyWastedCCA,
                    'psoverweightCCA' => $request->psoverweightCCA,
                    'psobeseCCA' => $request->psobeseCCA,

                // overweight (%) tall
                    'psnormalAAB' => $request->psnormalAAB,
                    'psstuntedAAB' => $request->psstuntedAAB,
                    'pssevereStuntedAAB' => $request->pssevereStuntedAAB,
                    'pstallAAB' => $request->pstallAAB,

                    'psnormalBBB' => $request->psnormalBBB,
                    'psstuntedBBB' => $request->psstuntedBBB,
                    'pssevereStuntedBBB' => $request->pssevereStuntedBBB,
                    'pstallBBB' => $request->pstallBBB,

                    'psnormalCCC' => $request->psnormalCCC,
                    'psstuntedCCC' => $request->psstuntedCCC,
                    'pssevereStuntedCCC' => $request->pssevereStuntedCCC,
                    'pstallCCC' => $request->pstallCCC,

                // overweight (%) obese School Children
                    'scnormalABA' => $request->scnormalABA,
                    'scwastedABA' => $request->scwastedABA,
                    'scseverelyWastedABA' => $request->scseverelyWastedABA,
                    'scoverweightABA' => $request->scoverweightABA,
                    'scobeseABA' => $request->scobeseABA,

                    'scnormalBBA' => $request->scnormalBBA,
                    'scwastedBBA' => $request->scwastedABA,
                    'scseverelyWastedBBA' => $request->scseverelyWastedBBA,
                    'scoverweightBBA' => $request->scoverweightBBA,
                    'scobeseBBA' => $request->scobeseBBA,

                    'scnormalCCA' => $request->scnormalCCA,
                    'scwastedCCA' => $request->scwastedCCA,
                    'scseverelyWastedCCA' => $request->scseverelyWastedCCA,
                    'scoverweightCCA' => $request->scoverweightCCA,
                    'scobeseCCA' => $request->scobeseCCA,

                // overweight (%) obese Pregnant Woman
                    'pwnormalAAA' => $request->pwnormalAAA,
                    'pwnutritionllyatriskAAA' => $request->pwnutritionllyatriskAAA,
                    'pwoverweightAAA' => $request->pwoverweightAAA,
                    'pwobeseAAA' => $request->pwobeseAAA,

                    'pwnormalBAA' => $request->pwnormalBAA,
                    'pwnutritionllyatriskBAA' => $request->pwnutritionllyatriskBAA,
                    'pwoverweightBAA' => $request->pwoverweightBAA,
                    'pwobeseBAA' => $request->pwobeseBAA,

                    'pwnormalCAA' => $request->pwnormalCAA,
                    'pwnutritionllyatriskCAA' => $request->pwnutritionllyatriskCAA,
                    'pwoverweightCAA' => $request->pwoverweightCAA,
                    'pwobeseCAA' => $request->pwobeseCAA,

                    'newBrgyScholar' => $request->newNutritionScholar,
                    'oldBrgyScholar' => $request->oldNutritionScholar,

                /////

                    'landAreaResidential' => $request->landAreaResidential,
                    'remarksResidential' => $request->remarksResidential,

                /////

                    'landAreaCommercial' => $request->landAreaCommercial,
                    'remarksCommercial' => $request->remarksCommercial,

                    'landAreaIndustrial' => $request->landAreaIndustrial,
                    'remarksIndustrial' => $request->remarksIndustrial,

                    'landAreaAgricultural' => $request->landAreaAgricultural,
                    'remarksAgricultural' => $request->remarksAgricultural,

                    'landAreaFLMLNP' => $request->landAreaFLMLNP,
                    'remarksFLMLNP' => $request->remarksFLMLNP,


                    'status' => $request->submitStatus,
                ]);

                return redirect()->route('BSLGUprofileLNFPIndex.index')->with('alert', 'Data Created Successfully!');
            } catch (\Throwable $th) {
                //throw $th;
                return "An error occured: " . $th->getMessage();
            }
        } elseif ($action == 'draft') {
            # code...
            try {
                //code...
                $updateResponse = lnfp_lguprofile::where('id', $request->id)
                ->update([
                    'dateMonitoring' => $request->dateMonitoring,
                    'periodCovereda' => $request->periodCovereda,
                    'totalPopulation' => $request->totalPopulation,
                    'householdWater' => $request->householdWater,
                    'householdToilets' => $request->householdToilets,
                    'dayCareCenter' => $request->dayCareCenter,
                    'elementary' => $request->elementary,
                    'secondarySchool' => $request->secondarySchool,
                    'healthStations' => $request->healthStations,
                    'retailOutlets' => $request->retailOutlets,
                    'bakeries' => $request->bakeries,
                    'markets' => $request->markets,
                    'transportTerminals' => $request->transportTerminals,
                    'breastfeeding' => $request->breastfeeding,

                    'hazards' => $request->hazards,
                    'affectedLGU' => $request->affectedLGU,
                    'noHousehold' => $request->noHousehold,
                    'noPuroks' => $request->noPuroks,
                    'populationA' => $request->populationA,
                    'populationB' => $request->populationB,
                    'populationC' => $request->populationC,
                    'populationD' => $request->populationD,
                    'populationE' => $request->populationE,
                    'populationF' => $request->populationF,
                    'actualA' => $request->actualA,
                    'actualB' => $request->actualB,
                    'actualC' => $request->actualC,
                    'actualD' => $request->actualD,
                    'actualE' => $request->actualE,
                    'actualF' => $request->actualF,

                // overweight (%) overweight
                    'psnormalAAA' => $request->psnormalAAA,
                    'psunderweightAAA' => $request->psunderweightAAA,
                    'pssevereUnderweightAAA' => $request->pssevereUnderweightAAA,
                    'psoverweightAAA' => $request->psoverweightAAA,

                    'psnormalBAA' => $request->psnormalBAA,
                    'psunderweightBAA' => $request->psunderweightBAA,
                    'pssevereUnderweightBAA' => $request->pssevereUnderweightBAA,
                    'psoverweightBAA' => $request->psoverweightBAA,

                    'psnormalCAA' => $request->psnormalCAA,
                    'psunderweightCAA' => $request->psunderweightCAA,
                    'pssevereUnderweightCAA' => $request->pssevereUnderweightCAA,
                    'psoverweightCAA' => $request->psoverweightCAA,

                // overweight (%) obese
                    'psnormalABA' => $request->psnormalABA,
                    'pswastedABA' => $request->pswastedABA,
                    'psseverelyWastedABA' => $request->psseverelyWastedABA,
                    'psoverweightABA' => $request->psoverweightABA,
                    'psobeseABA' => $request->psobeseABA,

                    'psnormalBBA' => $request->psnormalBBA,
                    'pswastedBBA' => $request->pswastedBBA,
                    'psseverelyWastedBBA' => $request->psseverelyWastedBBA,
                    'psoverweightBBA' => $request->psoverweightBBA,
                    'psobeseBBA' => $request->psobeseBBA,

                    'psnormalCCA' => $request->psnormalCCA,
                    'pswastedCCA' => $request->pswastedCCA,
                    'psseverelyWastedCCA' => $request->psseverelyWastedCCA,
                    'psoverweightCCA' => $request->psoverweightCCA,
                    'psobeseCCA' => $request->psobeseCCA,

                // overweight (%) tall
                    'psnormalAAB' => $request->psnormalAAB,
                    'psstuntedAAB' => $request->psstuntedAAB,
                    'pssevereStuntedAAB' => $request->pssevereStuntedAAB,
                    'pstallAAB' => $request->pstallAAB,

                    'psnormalBBB' => $request->psnormalBBB,
                    'psstuntedBBB' => $request->psstuntedBBB,
                    'pssevereStuntedBBB' => $request->pssevereStuntedBBB,
                    'pstallBBB' => $request->pstallBBB,

                    'psnormalCCC' => $request->psnormalCCC,
                    'psstuntedCCC' => $request->psstuntedCCC,
                    'pssevereStuntedCCC' => $request->pssevereStuntedCCC,
                    'pstallCCC' => $request->pstallCCC,

                // overweight (%) obese School Children
                    'scnormalABA' => $request->scnormalABA,
                    'scwastedABA' => $request->scwastedABA,
                    'scseverelyWastedABA' => $request->scseverelyWastedABA,
                    'scoverweightABA' => $request->scoverweightABA,
                    'scobeseABA' => $request->scobeseABA,

                    'scnormalBBA' => $request->scnormalBBA,
                    'scwastedBBA' => $request->scwastedABA,
                    'scseverelyWastedBBA' => $request->scseverelyWastedBBA,
                    'scoverweightBBA' => $request->scoverweightBBA,
                    'scobeseBBA' => $request->scobeseBBA,

                    'scnormalCCA' => $request->scnormalCCA,
                    'scwastedCCA' => $request->scwastedCCA,
                    'scseverelyWastedCCA' => $request->scseverelyWastedCCA,
                    'scoverweightCCA' => $request->scoverweightCCA,
                    'scobeseCCA' => $request->scobeseCCA,

                // overweight (%) obese Pregnant Woman
                    'pwnormalAAA' => $request->pwnormalAAA,
                    'pwnutritionllyatriskAAA' => $request->pwnutritionllyatriskAAA,
                    'pwoverweightAAA' => $request->pwoverweightAAA,
                    'pwobeseAAA' => $request->pwobeseAAA,

                    'pwnormalBAA' => $request->pwnormalBAA,
                    'pwnutritionllyatriskBAA' => $request->pwnutritionllyatriskBAA,
                    'pwoverweightBAA' => $request->pwoverweightBAA,
                    'pwobeseBAA' => $request->pwobeseBAA,

                    'pwnormalCAA' => $request->pwnormalCAA,
                    'pwnutritionllyatriskCAA' => $request->pwnutritionllyatriskCAA,
                    'pwoverweightCAA' => $request->pwoverweightCAA,
                    'pwobeseCAA' => $request->pwobeseCAA,

                    'newBrgyScholar' => $request->newNutritionScholar,
                    'oldBrgyScholar' => $request->oldNutritionScholar,

                /////

                    'landAreaResidential' => $request->landAreaResidential,
                    'remarksResidential' => $request->remarksResidential,

                /////

                    'landAreaCommercial' => $request->landAreaCommercial,
                    'remarksCommercial' => $request->remarksCommercial,

                    'landAreaIndustrial' => $request->landAreaIndustrial,
                    'remarksIndustrial' => $request->remarksIndustrial,

                    'landAreaAgricultural' => $request->landAreaAgricultural,
                    'remarksAgricultural' => $request->remarksAgricultural,

                    'landAreaFLMLNP' => $request->landAreaFLMLNP,
                    'remarksFLMLNP' => $request->remarksFLMLNP,


                    'status' => $request->DraftStatus,
                ]);

                return redirect()->route('BSLGUprofileLNFPIndex.index')->with('alert', 'Saved as Draft Successfully!');
            } catch (\Throwable $th) {
                //throw $th;
                return "An error occured: " . $th->getMessage();
            }
        }
        
    }


    public function deleteLNFP_lguprofile(Request $request, $id)
    {

        DB::table('lnfp_lguprofiletracking')->where('lnfp_lguprofile_id', $request->id)->delete();
        $lnfp_lguprofile = lnfp_lguprofile::find($id);
        $lnfp_lguprofile->delete();


        return redirect()->route('BSLGUprofileLNFPIndex.index')->with('alert', 'Deleted Successfully!');
    }
}
