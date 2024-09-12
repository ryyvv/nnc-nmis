<?php

namespace App\Http\Controllers\Admin\CityMunicipalStaff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\lnfp_lguprofile;
use App\Models\barangaytracking;
use App\Models\lnfp_form5a_rr;
use App\Models\lnfp_lguprofiletracking;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\LocationController;


class CMSMellpiProForLNFP_barangayLGUController extends Controller
{
    //
    //LGU Profile (LNFP)
    public function index()
    {
        $location = new LocationController;
        $regCode = auth()->user()->Region;
        $provCode = auth()->user()->Province;
        $citymunCode = auth()->user()->city_municipal;
        $provinces = $location->getProvinces(['reg_code' => $regCode]);
        $cities_municipalities = $location->getCitiesAndMunicipalities(['prov_code' => $provCode]);
        $barangays = $location->getBarangays(['citymun_code' => $citymunCode]);

        $barangay = auth()->user()->barangay;

        $lnfpProfile = DB::table('users')
            ->join('lnfp_lguprofile', 'users.id', '=', 'lnfp_lguprofile.user_id')
            ->where('user_id', auth()->user()->id)->orderBy('id', 'DESC')
            ->select('users.Firstname as firstname', 'users.Middlename as middlename', 'users.Lastname as lastname', 'lnfp_lguprofile.*')
            ->get();

        return view('CityMunicipalStaff/MellpiProForLNFP/LGUprofile.MellpiProForLNFPIndex', compact('lnfpProfile', 'provinces', 'cities_municipalities', 'barangays'));
        // return view('CityMunicipalStaff/MellpiProForLNFP/LGUprofile.MellpiProForLNFPIndex');
    }
    public function mellpiProLNFP_LGUedit(Request $request, $id)
    {
        $action = 'edit';
        $location = new LocationController;
        $regCode = auth()->user()->Region;
        $provCode = auth()->user()->Province;
        $citymunCode = auth()->user()->city_municipal;
        $provinces = $location->getProvinces(['reg_code' => $regCode]);
        $cities_municipalities = $location->getCitiesAndMunicipalities(['prov_code' => $provCode]);
        $barangays = $location->getBarangays(['citymun_code' => $citymunCode]);

        $years = range(date("Y"), 1900);

        //dd($request->id);
        // $row = DB::table('lguprofilebarangay')->where('user_id', auth()->user()->id)->first();
        $row = DB::table('lnfp_lguprofile')->where('id', $request->id)->first();
        //dd($lguProfile);


        return view('CityMunicipalStaff/MellpiProForLNFP/LGUprofile.MellpiProForLNFPEdit', compact('row', 'provinces', 'cities_municipalities', 'barangays', 'years', 'action'));
        
    }
    public function mellpiProLNFP_LGUcreate()
    {
        //
        $action = 'create';
        $location = new LocationController;
        $regCode = auth()->user()->Region;
        $provCode = auth()->user()->Province;
        $citymunCode = auth()->user()->city_municipal;
        $provinces = $location->getProvinces(['reg_code' => $regCode]);
        $cities_municipalities = $location->getCitiesAndMunicipalities(['prov_code' => $provCode]);
        $barangays = $location->getBarangays(['citymun_code' => $citymunCode]);

        $years = range(date("Y"), 1900);

        return view('CityMunicipalStaff/MellpiProForLNFP/LGUprofile.MellpiProForLNFPCreate', compact('provinces', 'cities_municipalities', 'barangays', 'years', 'action'));

        // return view('CityMunicipalStaff/MellpiProForLNFP/LGUprofile.MellpiProForLNFPCreate');
    }

    public function viewLNFP_lguprofile(Request $request)
    {
        //
        $action = 'edit';
        $location = new LocationController;
        $regCode = auth()->user()->Region;
        $provCode = auth()->user()->Province;
        $citymunCode = auth()->user()->city_municipal;
        $provinces = $location->getProvinces(['reg_code' => $regCode]);
        $cities_municipalities = $location->getCitiesAndMunicipalities(['prov_code' => $provCode]);
        $barangays = $location->getBarangays(['citymun_code' => $citymunCode]);

        $years = range(date("Y"), 1900);
        $row = DB::table('lnfp_lguprofile')->where('id', $request->id)->first();
        return view('CityMunicipalStaff/MellpiProForLNFP/LGUprofile.MellpiProForLNFPView', compact('row','provinces', 'cities_municipalities', 'barangays', 'years', 'action'));

        // return view('CityMunicipalStaff/MellpiProForLNFP/LGUprofile.MellpiProForLNFPCreate');
    }

    public function storeSubmit(Request $request)
    {
        $action = $request->input('action');
        // dd($action);
        if ($action == 'submit') {
            $rules = [
                'dateMonitoring' => 'required',
                'periodCovereda' => 'required',
                'numOfMun' => 'required',
                'totalPopulation' => 'required',
                'householdWater' => 'required',
                'householdToilets' => 'required',
                'dayCareCenter' => 'required',
                'elementary' => 'required',
                'secondarySchool' => 'required',
                'healthStations' => 'required',
                'retailOutlets' => 'required',
                'bakeries' => 'required',
                'markets' => 'required',
                'transportTerminals' => 'required',
                'breastfeeding' => 'required',
                'hazards' => 'required',
                'affectedLGU' => 'required',
                'noHousehold' => 'required',
                'noPuroks' => 'required',
                'populationA' => 'required',
                'populationB' => 'required',
                'populationC' => 'required',
                'populationD' => 'required',
                'populationE' => 'required',
                'populationF' => 'required',
                'actualA' => 'required',
                'actualB' => 'required',
                'actualC' => 'required',
                'actualD' => 'required',
                'actualE' => 'required',
                'actualF' => 'required',
                'psnormalAAA' => 'required',
                'psunderweightAAA' => 'required',
                'pssevereUnderweightAAA' => 'required',
                'psoverweightAAA' => 'required',
                'psnormalBAA' => 'required',
                'psunderweightBAA' => 'required',
                'pssevereUnderweightBAA' => 'required',
                'psoverweightBAA' => 'required',
                'psnormalCAA' => 'required',
                'psunderweightCAA' => 'required',
                'pssevereUnderweightCAA' => 'required',
                'psoverweightCAA' => 'required',
                'psnormalABA' => 'required',
                'pswastedABA' => 'required',
                'psseverelyWastedABA' => 'required',
                'psoverweightABA' => 'required',
                'psobeseABA' => 'required',
                'psnormalBBA' => 'required',
                'pswastedBBA' => 'required',
                'psseverelyWastedBBA' => 'required',
                'psoverweightBBA' => 'required',
                'psobeseBBA' => 'required',
                'psnormalCCA' => 'required',
                'pswastedCCA' => 'required',
                'psseverelyWastedCCA' => 'required',
                'psoverweightCCA' => 'required',
                'psobeseCCA' => 'required',
                'psnormalAAB' => 'required',
                'psstuntedAAB' => 'required',
                'pssevereStuntedAAB' => 'required',
                'pstallAAB' => 'required',
                'psnormalBBB' => 'required',
                'psstuntedBBB' => 'required',
                'pssevereStuntedBBB' => 'required',
                'pstallBBB' => 'required',
                'psnormalCCC' => 'required',
                'psstuntedCCC' => 'required',
                'pssevereStuntedCCC' => 'required',
                'pstallCCC' => 'required',
                'scnormalABA' => 'required',
                'scwastedABA' => 'required',
                'scseverelyWastedABA' => 'required',
                'scoverweightABA' => 'required',
                'scobeseABA' => 'required',
                'scnormalBBA' => 'required',
                'scwastedBBA' => 'required',
                'scseverelyWastedBBA' => 'required',
                'scoverweightBBA' => 'required',
                'scobeseBBA' => 'required',
                'scnormalCCA' => 'required',
                'scwastedCCA' => 'required',
                'scseverelyWastedCCA' => 'required',
                'scoverweightCCA' => 'required',
                'scobeseCCA' => 'required',
                'pwnormalAAA' => 'required',
                'pwnutritionllyatriskAAA' => 'required',
                'pwoverweightAAA' => 'required',
                'pwobeseAAA' => 'required',
                'pwnormalBAA' => 'required',
                'pwnutritionllyatriskBAA' => 'required',
                'pwoverweightBAA' => 'required',
                'pwobeseBAA' => 'required',
                'pwnormalCAA' => 'required',
                'pwnutritionllyatriskCAA' => 'required',
                'pwoverweightCAA' => 'required',
                'pwobeseCAA' => 'required',
                'newNutritionScholar' => 'required',
                'oldNutritionScholar' => 'required',
                'landAreaResidential' => 'required',
                'remarksResidential' => 'required',
                'landAreaCommercial' => 'required',
                'remarksCommercial' => 'required',
                'landAreaIndustrial' => 'required',
                'remarksIndustrial' => 'required',
                'landAreaAgricultural' => 'required',
                'remarksAgricultural' => 'required',
                'landAreaFLMLNP' => 'required',
                'remarksFLMLNP' => 'required',
                'submitStatus' => 'required',
                'barangay_id' => 'required',
                'municipal_id' => 'required',
                'province_id' => 'required',
                'region_id' => 'required',
                'user_id' => 'required',

            ];


            $message = [
                'required' => 'The field is required.',
                'integer' => 'The field must be a integer.',
                'string' => 'The field must be a string.',
                'date' => 'The field must be a valid date.',
                'max' => 'The field may not be greater than :max characters.',
            ];

            // $validator = Validator::make($request->all(), $rules, $message);

            $input = $request->all();
            // $input = array_map('trim', $input);

            $validator = Validator::make($input, $rules, $message);

            if ($validator->fails()) {
                Log::error($validator->errors());
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput()
                    ->with('error', 'Something went wrong! Please try again.');
            } else {
                // $lnfpProfile = DB::table('users')
                //     ->join('lnfp_lguprofile', 'users.id', '=', 'lnfp_lguprofile.user_id')
                //     ->where('user_id', auth()->user()->id)->orderBy('id', 'DESC')
                //     ->select('users.Firstname as firstname', 'users.Middlename as middlename', 'users.Lastname as lastname', 'lnfp_lguprofile.*')
                //     ->first();

                $user = DB::table('users')
                ->where('id', auth()->user()->id)
                ->first();

                // dd($user);

                if ($user) {
                    # code...
                    $fullname = $user->Firstname . ' ' . $user->Middlename . ' ' . $user->Lastname;

                    $LNFPProfileBarangay = lnfp_lguprofile::create([
                        'lnfp_officer' => $fullname,
                        'dateMonitoring' => $request->dateMonitoring,
                        'periodCovereda' => $request->periodCovereda,
                        'numOfMuni' => $request->numOfMun,
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

                        $LNFPForm5arr = lnfp_form5a_rr::create([
                            'lnfp_lgu_id' => $LNFPProfileBarangay->id,
                            'lnfp_officer' => $LNFPProfileBarangay->lnfp_officer,
                            'forThePeriod' => $LNFPProfileBarangay->periodCovereda,
                            'dateMonitoring' => $LNFPProfileBarangay->dateMonitoring,
                            'status' => 2
                        ]);
                    }



                    return redirect()->route('BSLGUprofileLNFPIndex.index')->with('success', 'Data stored successfully!');
                }
            }
        } elseif ($action == 'draft') {
            // $lnfpProfile = DB::table('users')
            //     ->join('lnfp_lguprofile', 'users.id', '=', 'lnfp_lguprofile.user_id')
            //     ->where('user_id', auth()->user()->id)->orderBy('id', 'DESC')
            //     ->select('users.Firstname as firstname', 'users.Middlename as middlename', 'users.Lastname as lastname', 'lnfp_lguprofile.*')
            //     ->first();

                $user = DB::table('users')
                ->where('id', auth()->user()->id)
                ->first();

                // dd($user);

            if ($user) {
                # code...
                $fullname = $user->Firstname . ' ' . $user->Middlename . ' ' . $user->Lastname;

                $LNFPProfileBarangay = lnfp_lguprofile::create([
                    'lnfp_officer' => $fullname,
                    'dateMonitoring' => $request->dateMonitoring,
                    'periodCovereda' => $request->periodCovereda,
                    'numOfMuni' => $request->numOfMun,
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

                // if ($LNFPProfileBarangay) {
                //     # code...
                //     lnfp_lguprofiletracking::create([
                //         'lnfp_lguprofile_id' => $LNFPProfileBarangay->id,
                //         'status' => $request->submitStatus,
                //         'barangay_id' => auth()->user()->barangay,
                //         'municipal_id' => auth()->user()->city_municipal,
                //         'user_id' => auth()->user()->id,
                //     ]);
                // }

                return redirect()->route('BSLGUprofileLNFPIndex.index')->with('success', 'Data stored as Draft!');
            }
        }
    }

    public function storeUpdate(Request $request)
    {
        $action = $request->input('action');
        // dd($action);
        if ($action == 'submit') {
            # code...
            try {
                //code...
                $rules = [
                    'dateMonitoring' => 'required',
                    'periodCovereda' => 'required',
                    'numOfMun' => 'required',
                    'totalPopulation' => 'required',
                    'householdWater' => 'required',
                    'householdToilets' => 'required',
                    'dayCareCenter' => 'required',
                    'elementary' => 'required',
                    'secondarySchool' => 'required',
                    'healthStations' => 'required',
                    'retailOutlets' => 'required',
                    'bakeries' => 'required',
                    'markets' => 'required',
                    'transportTerminals' => 'required',
                    'breastfeeding' => 'required',
                    'hazards' => 'required',
                    'affectedLGU' => 'required',
                    'noHousehold' => 'required',
                    'noPuroks' => 'required',
                    'populationA' => 'required',
                    'populationB' => 'required',
                    'populationC' => 'required',
                    'populationD' => 'required',
                    'populationE' => 'required',
                    'populationF' => 'required',
                    'actualA' => 'required',
                    'actualB' => 'required',
                    'actualC' => 'required',
                    'actualD' => 'required',
                    'actualE' => 'required',
                    'actualF' => 'required',
                    'psnormalAAA' => 'required',
                    'psunderweightAAA' => 'required',
                    'pssevereUnderweightAAA' => 'required',
                    'psoverweightAAA' => 'required',
                    'psnormalBAA' => 'required',
                    'psunderweightBAA' => 'required',
                    'pssevereUnderweightBAA' => 'required',
                    'psoverweightBAA' => 'required',
                    'psnormalCAA' => 'required',
                    'psunderweightCAA' => 'required',
                    'pssevereUnderweightCAA' => 'required',
                    'psoverweightCAA' => 'required',
                    'psnormalABA' => 'required',
                    'pswastedABA' => 'required',
                    'psseverelyWastedABA' => 'required',
                    'psoverweightABA' => 'required',
                    'psobeseABA' => 'required',
                    'psnormalBBA' => 'required',
                    'pswastedBBA' => 'required',
                    'psseverelyWastedBBA' => 'required',
                    'psoverweightBBA' => 'required',
                    'psobeseBBA' => 'required',
                    'psnormalCCA' => 'required',
                    'pswastedCCA' => 'required',
                    'psseverelyWastedCCA' => 'required',
                    'psoverweightCCA' => 'required',
                    'psobeseCCA' => 'required',
                    'psnormalAAB' => 'required',
                    'psstuntedAAB' => 'required',
                    'pssevereStuntedAAB' => 'required',
                    'pstallAAB' => 'required',
                    'psnormalBBB' => 'required',
                    'psstuntedBBB' => 'required',
                    'pssevereStuntedBBB' => 'required',
                    'pstallBBB' => 'required',
                    'psnormalCCC' => 'required',
                    'psstuntedCCC' => 'required',
                    'pssevereStuntedCCC' => 'required',
                    'pstallCCC' => 'required',
                    'scnormalABA' => 'required',
                    'scwastedABA' => 'required',
                    'scseverelyWastedABA' => 'required',
                    'scoverweightABA' => 'required',
                    'scobeseABA' => 'required',
                    'scnormalBBA' => 'required',
                    'scwastedBBA' => 'required',
                    'scseverelyWastedBBA' => 'required',
                    'scoverweightBBA' => 'required',
                    'scobeseBBA' => 'required',
                    'scnormalCCA' => 'required',
                    'scwastedCCA' => 'required',
                    'scseverelyWastedCCA' => 'required',
                    'scoverweightCCA' => 'required',
                    'scobeseCCA' => 'required',
                    'pwnormalAAA' => 'required',
                    'pwnutritionllyatriskAAA' => 'required',
                    'pwoverweightAAA' => 'required',
                    'pwobeseAAA' => 'required',
                    'pwnormalBAA' => 'required',
                    'pwnutritionllyatriskBAA' => 'required',
                    'pwoverweightBAA' => 'required',
                    'pwobeseBAA' => 'required',
                    'pwnormalCAA' => 'required',
                    'pwnutritionllyatriskCAA' => 'required',
                    'pwoverweightCAA' => 'required',
                    'pwobeseCAA' => 'required',
                    'newNutritionScholar' => 'required',
                    'oldNutritionScholar' => 'required',
                    'landAreaResidential' => 'required',
                    'remarksResidential' => 'required',
                    'landAreaCommercial' => 'required',
                    'remarksCommercial' => 'required',
                    'landAreaIndustrial' => 'required',
                    'remarksIndustrial' => 'required',
                    'landAreaAgricultural' => 'required',
                    'remarksAgricultural' => 'required',
                    'landAreaFLMLNP' => 'required',
                    'remarksFLMLNP' => 'required',

                ];


                $message = [
                    'required' => 'The field is required.',
                    'integer' => 'The field must be a integer.',
                    'string' => 'The field must be a string.',
                    'date' => 'The field must be a valid date.',
                    'max' => 'The field may not be greater than :max characters.',
                ];

                $input = $request->all();
                // $input = array_map('trim', $input);

                $validator = Validator::make($input, $rules, $message);

                if ($validator->fails()) {
                    Log::error($validator->errors());
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput()
                        ->with('error', 'Something went wrong! Please try again.');
                } else {
                    $updateResponse = lnfp_lguprofile::where('id', $request->id)
                        ->update([
                            'dateMonitoring' => $request->dateMonitoring,
                            'periodCovereda' => $request->periodCovereda,
                            'numOfMuni' => $request->numOfMun,
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
                        ]);

                        if ($updateResponse) {
                            # code...
                            lnfp_lguprofiletracking::create([
                                'lnfp_lguprofile_id' => $request->id,
                                'status' => $request->submitStatus,
                                'barangay_id' => auth()->user()->barangay,
                                'municipal_id' => auth()->user()->city_municipal,
                                'user_id' => auth()->user()->id,
                            ]);
                        }

                    // $LNFPForm5arr = lnfp_form5a_rr::create([
                    //     'lnfp_lgu_id' => $request->id,
                    //     'lnfp_officer' => $request->user_name,
                    //     'forThePeriod' => $request->periodCovereda,
                    //     'dateMonitoring' => $request->dateMonitoring,
                    //     'status' => 2
                    // ]);

                    return redirect()->route('BSLGUprofileLNFPIndex.index')->with('success', 'Data stored successfully!');
                }
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
                        'numOfMuni' => $request->numOfMun,
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

                return redirect()->route('BSLGUprofileLNFPIndex.index')->with('success', 'Data stored as Draft!');
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