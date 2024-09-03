<?php

namespace App\Http\Controllers\BarangayScholar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\lnfp_lguprofile;
use App\Models\barangaytracking;
use App\Models\lnfp_form5a_rr;
use App\Models\lnfp_formOverall;
use App\Models\lnfp_form7;
use App\Models\lnfp_form8;
use App\Models\lnfp_formInterview;
use App\Models\lnfp_lguprofiletracking;
use App\Models\lnfp_lguform5atracking;
use App\Models\lnfp_lguform8tracking;
use App\Models\lnfp_lguInterviewtracking;
use App\Models\lnfp_lguOveralltracking;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\LocationController;


class MellpiProForLNFP_barangayLGUController extends Controller
{
    //
    //LGU Profile (LNFP)
    public function index()
    {
        $location = new LocationController;
        $prov = $location->getLocationDataProvince(auth()->user()->Region);
        $mun = $location->getLocationDataMuni(auth()->user()->Province);
        $city = $location->getLocationDataCity(auth()->user()->Region);
        $brgy = $location->getLocationDataBrgy(auth()->user()->city_municipal);

        $barangay = auth()->user()->barangay;

        $lnfpProfile = DB::table('users')
            ->join('lnfp_lguprofile', 'users.id', '=', 'lnfp_lguprofile.user_id')
            ->where('user_id', auth()->user()->id)->orderBy('id', 'DESC')
            ->select('users.Firstname as firstname', 'users.Middlename as middlename', 'users.Lastname as lastname', 'lnfp_lguprofile.*')
            ->get();

        return view('BarangayScholar/MellpiProForLNFP/LGUprofile.MellpiProForLNFPIndex', compact('lnfpProfile', 'prov', 'mun', 'city', 'brgy'));
        // return view('BarangayScholar/MellpiProForLNFP/LGUprofile.MellpiProForLNFPIndex');
    }
    public function mellpiProLNFP_LGUedit(Request $request, $id)
    {
        $action = 'edit';
        $location = new LocationController;
        $prov = $location->getLocationDataProvince(auth()->user()->Region);
        $mun = $location->getLocationDataMuni(auth()->user()->Province);
        $city = $location->getLocationDataCity(auth()->user()->Region);
        $brgy = $location->getLocationDataBrgy(auth()->user()->city_municipal);

        $years = range(date("Y"), 1900);

        //dd($request->id);
        // $row = DB::table('lguprofilebarangay')->where('user_id', auth()->user()->id)->first();
        $row = DB::table('lnfp_lguprofile')->where('id', $request->id)->first();
        //dd($lguProfile);


        return view('BarangayScholar/MellpiProForLNFP/LGUprofile.MellpiProForLNFPEdit', compact('row', 'prov', 'mun', 'city', 'brgy', 'years', 'action'));
        
    }
    public function mellpiProLNFP_LGUcreate()
    {
        //
        $action = 'create';
        $location = new LocationController;
        $prov = $location->getLocationDataProvince(auth()->user()->Region);
        $mun = $location->getLocationDataMuni(auth()->user()->Province);
        $city = $location->getLocationDataCity(auth()->user()->Region);
        $brgy = $location->getLocationDataBrgy(auth()->user()->city_municipal);

        $years = range(date("Y"), 1900);

        return view('BarangayScholar/MellpiProForLNFP/LGUprofile.MellpiProForLNFPCreate', compact('prov', 'mun', 'city', 'brgy', 'years', 'action'));

        // return view('BarangayScholar/MellpiProForLNFP/LGUprofile.MellpiProForLNFPCreate');
    }

    public function viewLNFP_lguprofile(Request $request)
    {
        //
        $action = 'edit';
        $location = new LocationController;
        $prov = $location->getLocationDataProvince(auth()->user()->Region);
        $mun = $location->getLocationDataMuni(auth()->user()->Province);
        $city = $location->getLocationDataCity(auth()->user()->Region);
        $brgy = $location->getLocationDataBrgy(auth()->user()->city_municipal);

        $years = range(date("Y"), 1900);
        $row = DB::table('lnfp_lguprofile')
                ->leftjoin('lnfp_form5a_rr', 'lnfp_form5a_rr.lnfp_lgu_id','=','lnfp_lguprofile.id' )
                ->select('lnfp_lguprofile.*','lnfp_form5a_rr.id as form5_id', 'lnfp_form5a_rr.status as form5_status')
                ->where('lnfp_lguprofile.id', $request->id)->first();
        return view('BarangayScholar/MellpiProForLNFP/LGUprofile.MellpiProForLNFPView', compact('row','prov', 'mun', 'city', 'brgy', 'years', 'action'));

        // return view('BarangayScholar/MellpiProForLNFP/LGUprofile.MellpiProForLNFPCreate');
    }

    public function storeSubmit(Request $request)
    {
        $action = $request->formrequest;
        //dd($request);
        if ($action == 'submit') {
            $rules = [
                'dateMonitoring' => 'required',
                'periodCovereda' => 'required',
                'numOfMun' => 'required|integer|min:1|max:1000000',
                'totalPopulation' => 'required|integer|min:1|max:1000000',
                'householdWater' => 'required|integer|min:1|max:1000000',
                'householdToilets' => 'required|integer|min:1|max:1000000',
                'dayCareCenter' => 'required|integer|min:1|max:1000000',
                'elementary' => 'required|integer|min:1|max:1000000',
                'secondarySchool' => 'required|integer|min:1|max:1000000',
                'healthStations' => 'required|integer|min:1|max:1000000',
                'retailOutlets' => 'required|integer|min:1|max:1000000',
                'bakeries' => 'required|integer|min:1|max:1000000',
                'markets' => 'required|integer|min:1|max:1000000',
                'transportTerminals' => 'required|integer|min:1|max:1000000',
                'breastfeeding' => 'required|integer|min:1|max:1000000',
                'hazards' => 'required',
                'affectedLGU' => 'required',
                'noHousehold' => 'required|integer|min:1|max:1000000',
                'noPuroks' => 'required|integer|min:1|max:1000000',
                'populationA' => 'required|integer|min:1|max:1000000',
                'populationB' => 'required|integer|min:1|max:1000000',
                'populationC' => 'required|integer|min:1|max:1000000',
                'populationD' => 'required|integer|min:1|max:1000000',
                'populationE' => 'required|integer|min:1|max:1000000',
                'populationF' => 'required|integer|min:1|max:1000000',
                'actualA' => 'required|integer|min:1|max:1000000',
                'actualB' => 'required|integer|min:1|max:1000000',
                'actualC' => 'required|integer|min:1|max:1000000',
                'actualD' => 'required|integer|min:1|max:1000000',
                'actualE' => 'required|integer|min:1|max:1000000',
                'actualF' => 'required|integer|min:1|max:1000000',
                'psnormalAAA' => 'required|integer|min:1|max:1000000',
                'psunderweightAAA' => 'required|integer|min:1|max:1000000',
                'pssevereUnderweightAAA' => 'required|integer|min:1|max:1000000',
                'psoverweightAAA' => 'required|integer|min:1|max:1000000',
                'psnormalBAA' => 'required|integer|min:1|max:1000000',
                'psunderweightBAA' => 'required|integer|min:1|max:1000000',
                'pssevereUnderweightBAA' => 'required|integer|min:1|max:1000000',
                'psoverweightBAA' => 'required|integer|min:1|max:1000000',
                'psnormalCAA' => 'required|integer|min:1|max:1000000',
                'psunderweightCAA' => 'required|integer|min:1|max:1000000',
                'pssevereUnderweightCAA' => 'required|integer|min:1|max:1000000',
                'psoverweightCAA' => 'required|integer|min:1|max:1000000',
                'psnormalABA' => 'required|integer|min:1|max:1000000',
                'pswastedABA' => 'required|integer|min:1|max:1000000',
                'psseverelyWastedABA' => 'required|integer|min:1|max:1000000',
                'psoverweightABA' => 'required|integer|min:1|max:1000000',
                'psobeseABA' => 'required|integer|min:1|max:1000000',
                'psnormalBBA' => 'required|integer|min:1|max:1000000',
                'pswastedBBA' => 'required|integer|min:1|max:1000000',
                'psseverelyWastedBBA' => 'required|integer|min:1|max:1000000',
                'psoverweightBBA' => 'required|integer|min:1|max:1000000',
                'psobeseBBA' => 'required|integer|min:1|max:1000000',
                'psnormalCCA' => 'required|integer|min:1|max:1000000',
                'pswastedCCA' => 'required|integer|min:1|max:1000000',
                'psseverelyWastedCCA' => 'required|integer|min:1|max:1000000',
                'psoverweightCCA' => 'required|integer|min:1|max:1000000',
                'psobeseCCA' => 'required|integer|min:1|max:1000000',
                'psnormalAAB' => 'required|integer|min:1|max:1000000',
                'psstuntedAAB' => 'required|integer|min:1|max:1000000',
                'pssevereStuntedAAB' => 'required|integer|min:1|max:1000000',
                'pstallAAB' => 'required|integer|min:1|max:1000000',
                'psnormalBBB' => 'required|integer|min:1|max:1000000',
                'psstuntedBBB' => 'required|integer|min:1|max:1000000',
                'pssevereStuntedBBB' => 'required|integer|min:1|max:1000000',
                'pstallBBB' => 'required|integer|min:1|max:1000000',
                'psnormalCCC' => 'required|integer|min:1|max:1000000',
                'psstuntedCCC' => 'required|integer|min:1|max:1000000',
                'pssevereStuntedCCC' => 'required|integer|min:1|max:1000000',
                'pstallCCC' => 'required|integer|min:1|max:1000000',
                'scnormalABA' => 'required|integer|min:1|max:1000000',
                'scwastedABA' => 'required|integer|min:1|max:1000000',
                'scseverelyWastedABA' => 'required|integer|min:1|max:1000000',
                'scoverweightABA' => 'required|integer|min:1|max:1000000',
                'scobeseABA' => 'required|integer|min:1|max:1000000',
                'scnormalBBA' => 'required|integer|min:1|max:1000000',
                'scwastedBBA' => 'required|integer|min:1|max:1000000',
                'scseverelyWastedBBA' => 'required|integer|min:1|max:1000000',
                'scoverweightBBA' => 'required|integer|min:1|max:1000000',
                'scobeseBBA' => 'required|integer|min:1|max:1000000',
                'scnormalCCA' => 'required|integer|min:1|max:1000000',
                'scwastedCCA' => 'required|integer|min:1|max:1000000',
                'scseverelyWastedCCA' => 'required|integer|min:1|max:1000000',
                'scoverweightCCA' => 'required|integer|min:1|max:1000000',
                'scobeseCCA' => 'required|integer|min:1|max:1000000',
                'pwnormalAAA' => 'required|integer|min:1|max:1000000',
                'pwnutritionllyatriskAAA' => 'required|integer|min:1|max:1000000',
                'pwoverweightAAA' => 'required|integer|min:1|max:1000000',
                'pwobeseAAA' => 'required|integer|min:1|max:1000000',
                'pwnormalBAA' => 'required|integer|min:1|max:1000000',
                'pwnutritionllyatriskBAA' => 'required|integer|min:1|max:1000000',
                'pwoverweightBAA' => 'required|integer|min:1|max:1000000',
                'pwobeseBAA' => 'required|integer|min:1|max:1000000',
                'pwnormalCAA' => 'required|integer|min:1|max:1000000',
                'pwnutritionllyatriskCAA' => 'required|integer|min:1|max:1000000',
                'pwoverweightCAA' => 'required|integer|min:1|max:1000000',
                'pwobeseCAA' => 'required|integer|min:1|max:1000000',
                'newNutritionScholar' => 'required|integer|min:1|max:1000000',
                'oldNutritionScholar' => 'required|integer|min:1|max:1000000',
                'landAreaResidential' => 'required|integer|min:1|max:1000000',
                'remarksResidential' => 'required',
                'landAreaCommercial' => 'required|integer|min:1|max:1000000',
                'remarksCommercial' => 'required',
                'landAreaIndustrial' => 'required|integer|min:1|max:1000000',
                'remarksIndustrial' => 'required',
                'landAreaAgricultural' => 'required|integer|min:1|max:1000000',
                'remarksAgricultural' => 'required',
                'landAreaFLMLNP' => 'required|integer|min:1|max:1000000',
                'remarksFLMLNP' => 'required',

            ];



            $message = [
                'required' => 'The field is required.',
                'integer' => 'The field must be a whole number.',
                'string' => 'The field must be a string.',
                'date' => 'The field must be a valid date.',
                'max' => 'The field may not be greater than :max.',
                'min' => 'The field may not be greater than :min.',
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
            }else{
                
                $lnfp_lguprofile = lnfp_lguprofile::create([
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


                                    'status' => 1,

                                    'barangay_id' => $request->barangay_id,
                                    'municipal_id' => $request->municipal_id,
                                    'province_id' => $request->province_id,
                                    'region_id' => $request->region_id,
                                    'user_id' => auth()->user()->id,
                                    'lnfp_officer' => auth()->user()->Firstname.' '. auth()->user()->Middlename  .' '.auth()->user()->Lastname 
                        ]);

                        lnfp_lguprofiletracking::create([
                            'lnfp_lguprofile_id' => $lnfp_lguprofile->id,
                            'status' => 1,
                            'barangay_id' => auth()->user()->barangay,
                            'municipal_id' => auth()->user()->city_municipal,
                            'user_id' => auth()->user()->id,
                        ]);
                   

                        $lnfp_form5a_rr = lnfp_form5a_rr::create([
                                'lnfp_lgu_id' => $lnfp_lguprofile->id,
                                'lnfp_officer' => $request->lnfp_officer,
                                'forThePeriod' => $request->periodCovereda,
                                'dateMonitoring' => $request->dateMonitoring,
                                'status' => 2
                            ]);

                        return redirect()->route('lguLnfpEditForm5',$lnfp_form5a_rr->id )->with('success', 'Data stored successfully! You can now create Form 5');


            }


        }else{

            // Draft
                        $lnfp_lguprofile = lnfp_lguprofile::create([
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


                            'status' => 2,

                            'barangay_id' => $request->barangay_id,
                            'municipal_id' => $request->municipal_id,
                            'province_id' => $request->province_id,
                            'region_id' => $request->region_id,
                            'user_id' => auth()->user()->id,
                            'lnfp_officer' => auth()->user()->Firstname.' '. auth()->user()->Middlename  .' '.auth()->user()->Lastname 
                        ]);

                            lnfp_lguprofiletracking::create([
                                'lnfp_lguprofile_id' => $lnfp_lguprofile->id,
                                'status' => 2,
                                'barangay_id' => auth()->user()->barangay,
                                'municipal_id' => auth()->user()->city_municipal,
                                'user_id' => auth()->user()->id,
                            ]);

        return redirect()->route('BSLGUprofileLNFPIndex.index')->with('success', 'Data stored as Draft!');

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
                    'numOfMun' => 'required|integer|min:1|max:1000000',
                    'totalPopulation' => 'required|integer|min:1|max:1000000',
                    'householdWater' => 'required|integer|min:1|max:1000000',
                    'householdToilets' => 'required|integer|min:1|max:1000000',
                    'dayCareCenter' => 'required|integer|min:1|max:1000000',
                    'elementary' => 'required|integer|min:1|max:1000000',
                    'secondarySchool' => 'required|integer|min:1|max:1000000',
                    'healthStations' => 'required|integer|min:1|max:1000000',
                    'retailOutlets' => 'required|integer|min:1|max:1000000',
                    'bakeries' => 'required|integer|min:1|max:1000000',
                    'markets' => 'required|integer|min:1|max:1000000',
                    'transportTerminals' => 'required|integer|min:1|max:1000000',
                    'breastfeeding' => 'required|integer|min:1|max:1000000',
                    'hazards' => 'required',
                    'affectedLGU' => 'required',
                    'noHousehold' => 'required|integer|min:1|max:1000000',
                    'noPuroks' => 'required|integer|min:1|max:1000000',
                    'populationA' => 'required|integer|min:1|max:1000000',
                    'populationB' => 'required|integer|min:1|max:1000000',
                    'populationC' => 'required|integer|min:1|max:1000000',
                    'populationD' => 'required|integer|min:1|max:1000000',
                    'populationE' => 'required|integer|min:1|max:1000000',
                    'populationF' => 'required|integer|min:1|max:1000000',
                    'actualA' => 'required|integer|min:1|max:1000000',
                    'actualB' => 'required|integer|min:1|max:1000000',
                    'actualC' => 'required|integer|min:1|max:1000000',
                    'actualD' => 'required|integer|min:1|max:1000000',
                    'actualE' => 'required|integer|min:1|max:1000000',
                    'actualF' => 'required|integer|min:1|max:1000000',
                    'psnormalAAA' => 'required|integer|min:1|max:1000000',
                    'psunderweightAAA' => 'required|integer|min:1|max:1000000',
                    'pssevereUnderweightAAA' => 'required|integer|min:1|max:1000000',
                    'psoverweightAAA' => 'required|integer|min:1|max:1000000',
                    'psnormalBAA' => 'required|integer|min:1|max:1000000',
                    'psunderweightBAA' => 'required|integer|min:1|max:1000000',
                    'pssevereUnderweightBAA' => 'required|integer|min:1|max:1000000',
                    'psoverweightBAA' => 'required|integer|min:1|max:1000000',
                    'psnormalCAA' => 'required|integer|min:1|max:1000000',
                    'psunderweightCAA' => 'required|integer|min:1|max:1000000',
                    'pssevereUnderweightCAA' => 'required|integer|min:1|max:1000000',
                    'psoverweightCAA' => 'required|integer|min:1|max:1000000',
                    'psnormalABA' => 'required|integer|min:1|max:1000000',
                    'pswastedABA' => 'required|integer|min:1|max:1000000',
                    'psseverelyWastedABA' => 'required|integer|min:1|max:1000000',
                    'psoverweightABA' => 'required|integer|min:1|max:1000000',
                    'psobeseABA' => 'required|integer|min:1|max:1000000',
                    'psnormalBBA' => 'required|integer|min:1|max:1000000',
                    'pswastedBBA' => 'required|integer|min:1|max:1000000',
                    'psseverelyWastedBBA' => 'required|integer|min:1|max:1000000',
                    'psoverweightBBA' => 'required|integer|min:1|max:1000000',
                    'psobeseBBA' => 'required|integer|min:1|max:1000000',
                    'psnormalCCA' => 'required|integer|min:1|max:1000000',
                    'pswastedCCA' => 'required|integer|min:1|max:1000000',
                    'psseverelyWastedCCA' => 'required|integer|min:1|max:1000000',
                    'psoverweightCCA' => 'required|integer|min:1|max:1000000',
                    'psobeseCCA' => 'required|integer|min:1|max:1000000',
                    'psnormalAAB' => 'required|integer|min:1|max:1000000',
                    'psstuntedAAB' => 'required|integer|min:1|max:1000000',
                    'pssevereStuntedAAB' => 'required|integer|min:1|max:1000000',
                    'pstallAAB' => 'required|integer|min:1|max:1000000',
                    'psnormalBBB' => 'required|integer|min:1|max:1000000',
                    'psstuntedBBB' => 'required|integer|min:1|max:1000000',
                    'pssevereStuntedBBB' => 'required|integer|min:1|max:1000000',
                    'pstallBBB' => 'required|integer|min:1|max:1000000',
                    'psnormalCCC' => 'required|integer|min:1|max:1000000',
                    'psstuntedCCC' => 'required|integer|min:1|max:1000000',
                    'pssevereStuntedCCC' => 'required|integer|min:1|max:1000000',
                    'pstallCCC' => 'required|integer|min:1|max:1000000',
                    'scnormalABA' => 'required|integer|min:1|max:1000000',
                    'scwastedABA' => 'required|integer|min:1|max:1000000',
                    'scseverelyWastedABA' => 'required|integer|min:1|max:1000000',
                    'scoverweightABA' => 'required|integer|min:1|max:1000000',
                    'scobeseABA' => 'required|integer|min:1|max:1000000',
                    'scnormalBBA' => 'required|integer|min:1|max:1000000',
                    'scwastedBBA' => 'required|integer|min:1|max:1000000',
                    'scseverelyWastedBBA' => 'required|integer|min:1|max:1000000',
                    'scoverweightBBA' => 'required|integer|min:1|max:1000000',
                    'scobeseBBA' => 'required|integer|min:1|max:1000000',
                    'scnormalCCA' => 'required|integer|min:1|max:1000000',
                    'scwastedCCA' => 'required|integer|min:1|max:1000000',
                    'scseverelyWastedCCA' => 'required|integer|min:1|max:1000000',
                    'scoverweightCCA' => 'required|integer|min:1|max:1000000',
                    'scobeseCCA' => 'required|integer|min:1|max:1000000',
                    'pwnormalAAA' => 'required|integer|min:1|max:1000000',
                    'pwnutritionllyatriskAAA' => 'required|integer|min:1|max:1000000',
                    'pwoverweightAAA' => 'required|integer|min:1|max:1000000',
                    'pwobeseAAA' => 'required|integer|min:1|max:1000000',
                    'pwnormalBAA' => 'required|integer|min:1|max:1000000',
                    'pwnutritionllyatriskBAA' => 'required|integer|min:1|max:1000000',
                    'pwoverweightBAA' => 'required|integer|min:1|max:1000000',
                    'pwobeseBAA' => 'required|integer|min:1|max:1000000',
                    'pwnormalCAA' => 'required|integer|min:1|max:1000000',
                    'pwnutritionllyatriskCAA' => 'required|integer|min:1|max:1000000',
                    'pwoverweightCAA' => 'required|integer|min:1|max:1000000',
                    'pwobeseCAA' => 'required|integer|min:1|max:1000000',
                    'newNutritionScholar' => 'required|integer|min:1|max:1000000',
                    'oldNutritionScholar' => 'required|integer|min:1|max:1000000',
                    'landAreaResidential' => 'required|integer|min:1|max:1000000',
                    'remarksResidential' => 'required',
                    'landAreaCommercial' => 'required|integer|min:1|max:1000000',
                    'remarksCommercial' => 'required',
                    'landAreaIndustrial' => 'required|integer|min:1|max:1000000',
                    'remarksIndustrial' => 'required',
                    'landAreaAgricultural' => 'required|integer|min:1|max:1000000',
                    'remarksAgricultural' => 'required',
                    'landAreaFLMLNP' => 'required|integer|min:1|max:1000000',
                    'remarksFLMLNP' => 'required',

                ];


                $message = [
                    'required' => 'The field is required.',
                    'integer|min:1|max:1000000' => 'The field must be a whole number.',
                    'string' => 'The field must be a string.',
                    'date' => 'The field must be a valid date.',
                    'max' => 'The field may not be greater than :max',
                    'min' => 'The field may not be greater than :min',
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

                        $lnfp_form5a_rr = lnfp_form5a_rr::create([
                            'lnfp_lgu_id' => $request->id,
                            'lnfp_officer' => $request->lnfp_officer,
                            'forThePeriod' => $request->periodCovereda,
                            'dateMonitoring' => $request->dateMonitoring,
                            'status' => 1
                        ]);

                    return redirect()->route('lguLnfpEditForm5',$lnfp_form5a_rr->id )->with('success', 'Data stored successfully! You can now create Form 5');
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


    public function deleteLNFP_lguprofile(Request $request)
    {
     

        DB::table('lnfp_lguprofiletracking')->where('lnfp_lguprofile_id', $request->id)->delete();
        
        // $lnfp_form_5a = lnfp_form5a_rr::where('lnfp_lgu_id', $request->id)->first();
        // // DB::table('lnfp_lguform5atracking')->where('lnfp_lguform5_id', $lnfp_form_5a->id)->delete();

        // $lnfp_form_8 = lnfp_form8::where('lnfp_lgu_id', $request->id)->first();
        // DB::table('lnfp_lguform8tracking')->where('lnfp_lguform8_id', $lnfp_form_8->id)->delete();
       
        // $lnfp_form_interview = lnfp_form8::where('lnfp_lgu_id', $request->id)->first();
        // DB::table('lnfp_lguinterviewtracking')->where('lnfp_int_id', $lnfp_form_interview->id)->delete();
        
        // $lnfp_overall_stracking = lnfp_form8::where('lnfp_lgu_id', $request->id)->first();
        // DB::table('lnfp_overall_stracking')->where('lnfp_overallScore_id', $lnfp_overall_stracking->id)->delete();
       
        
        $lnfp_lguprofile = lnfp_lguprofile::find($request->id);
        $lnfp_lguprofile->delete();
        // $lnfp_form_5a->delete();
        // $lnfp_form_8->delete();
        // $lnfp_form_interview->delete();
        // $lnfp_overall_stracking->delete();


        return redirect()->route('BSLGUprofileLNFPIndex.index')->with('alert', 'Deleted Successfully!');
    }
}
