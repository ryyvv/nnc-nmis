<?php

namespace App\Http\Controllers\Admin\MellpiPro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\LguProfile;
use App\Models\LguDemographicsModel;
use App\Models\ChangesNSModel;
use App\Models\DiscussionQuestionModel;
use App\Models\NutritionServicesModel;
use App\Models\VisionMission;
use App\Models\Governances;
use App\Models\NationalPoliciesModel;
use App\Models\LncManagementFunctionModel;
use App\Models\PSGC;
use App\Models\Region;
use App\Models\Province;
use App\Models\Municipal;
use App\Models\Barangay;
use App\Models\Barangay as ModelsBarangay;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

// added namespacing
use League\Csv\Reader;

use function PHPSTORM_META\map;

class MellpiProController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function getRegions()
     {
         $regions = DB::connection('nnc_db')->table('regions')->get(['id', 'region']);
         return response()->json($regions);
     }
     
     public function getProvinces($regionId)
     {
         $provinces = DB::connection('nnc_db')->table('provinces')->where('region_id', $regionId)->get(['provcode', 'province']);
         return response()->json($provinces);
     }
     
     public function getCities($provcode)
     {
         $cities = DB::connection('nnc_db')->table('cities')->where('provcode', $provcode)->get(['citymuncode', 'cityname']);
         return response()->json($cities);
     }
     
    //  public function getBarangays($citymuncode)
    //  {
    //      $barangays = DB::connection('nnc_db')->table('brgy')->where('citymuncode', $citymuncode)->get(['id', 'brgyname']);
    //      return response()->json($barangays);
    //  }

    public function getBarangays($citymuncode)
{
    try {
        $barangays = DB::connection('nnc_db')
                        ->table('brgy')
                        ->where('citymuncode', $citymuncode)
                        ->get(['id', 'brgyname']);

        return response()->json($barangays);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Failed to fetch barangays data. Please try again later.'], 500);
    }
}

    
    public function index()
    {
       $Regs = Region::get();       
       $Prov = DB::table('provinces')->get();
       $Mun = DB::table('municipals')->get();
       $Brgy = DB::table('barangays')->get();


        // use compact for multiple data passing
        return view('mellpi_pro.create', ['Regs' => $Regs, 'Prov' => $Prov, 'Mun' => $Mun, 'Brgy' => $Brgy]);
    }

    public function create()
    {


    }


    public function summary1b()
    {

        $row = NutritionServicesModel::select('*')->first();
        $rowVM = VisionMission::select('*')->first();
        $rowNP = NationalPoliciesModel::select('*')->first();
        $rowGv = Governances::select('*')->first();
        $rowLMF = LncManagementFunctionModel::select('*')->first();


        // Vision Mission rating Ave
        $VM_Ave = (
            ($rowVM->rating1a / 5) * 100 +
            ($rowVM->rating1b / 5) * 100 +
            ($rowVM->rating1c / 5) * 100
        ) / 3;

        // Nutrition Policies Average Rating
        $NP_Ave = (
            ($rowNP->rating2a / 5) * 100 +
            ($rowNP->rating2b / 5) * 100 +
            ($rowNP->rating2c / 5) * 100 +
            ($rowNP->rating2d / 5) * 100 +
            ($rowNP->rating2e / 5) * 100 +
            ($rowNP->rating2f / 5) * 100 +
            ($rowNP->rating2g / 5) * 100 +
            ($rowNP->rating2h / 5) * 100 +
            ($rowNP->rating2i / 5) * 100 +
            ($rowNP->rating2j / 5) * 100 +
            ($rowNP->rating2k / 5) * 100 +
            ($rowNP->rating2l / 5) * 100 +
            ($rowNP->rating2m / 5) * 100
        ) / 13;

        // Governance rating Ave
        $Gv_Ave = (
            ($rowGv->rating3a / 5) * 100 +
            ($rowGv->rating3b / 5) * 100 +
            ($rowGv->rating3c / 5) * 100
        ) / 3;

        // Local Nutrition Committee Management
        $LMF_Ave = (
            ($rowLMF->rating4a / 5) * 100 +
            ($rowLMF->rating4b / 5) * 100 +
            ($rowLMF->rating4c / 5) * 100 +
            ($rowLMF->rating4d / 5) * 100 +
            ($rowLMF->rating4e / 5) * 100 +
            ($rowLMF->rating4f / 5) * 100
        ) / 6;

        // Nutrition Interventions/Services


        return view('mellpi_pro.summary_1b', ['row' => $row, 'rowVM' => $rowVM, 'rowNP' => $rowNP, 'rowGv' => $rowGv, 'rowLMF' => $rowLMF, 'VM_Ave' => $VM_Ave, 'NP_Ave' => $NP_Ave, 'Gv_Ave' => $Gv_Ave, 'LMF_Ave' => $LMF_Ave]);

      
    }

    public function summary2b()
    {

        $row = ChangesNSModel::select('*')->first();

        return view('mellpi_pro.summary_2b', compact('row'));

      
    }



    public function store(Request $request)
    {
         
        $validator = Validator::make($request->all(), [
                                'income_class' => 'required',
                                'date_monitoring' => 'required|date',
                                'period_covered' => 'required',
                                'population' => 'required|numeric',
                                'nutritional_status' => 'required',
                                'land_use_classification' => 'required',
                                'total_land_remarks' => 'required',
                                'source_and_remarks' => 'required',
                                'received' => 'required',
                                'date_received' => 'required|date',
                                'no_pax' => 'required|numeric',
                                'remarks' => 'required',
                                'total_population' => 'required|numeric',
                                'no_households' => 'required|numeric',
                                'no_sitios' => 'required|numeric',
                                'households_safe_water' => 'required',
                                'households_sanitary_toilet' => 'required',
                                'day_care_center' => 'required',
                                'public_elem_secondary_schools' => 'required',
                                'brgy_health_stations' => 'required',
                                'retails_outlets_stores' => 'required',
                                'markets_transport_terminal' => 'required',
                                'monthers_breastfeeding' => 'required',
                                'terrain' => 'required',
                                'hazards' => 'required',
                                'young_child_feeding_rating1' => 'required|numeric',
                                'young_child_feeding_remarks1' => 'required',
                                'young_child_feeding_rating2' => 'required|numeric',
                                'young_child_feeding_remarks2' => 'required',
                                'young_child_feeding_rating3' => 'required|numeric',
                                'young_child_feeding_remarks3' => 'required',
                                'acute_malnutrition_rating4' => 'required|numeric',
                                'acute_malnutrition_remarks4' => 'required',
                                'national_dietary_rating5' => 'required|numeric',
                                'national_dietary_remarks5' => 'required',
                                'national_dietary_rating6' => 'required|numeric',
                                'national_dietary_remarks6' => 'required',
                                'national_dietary_rating7' => 'required|numeric',
                                'national_dietary_remarks7' => 'required',
                                'national_dietary_rating8' => 'required|numeric',
                                'national_dietary_remarks8' => 'required',
                                'behavioral_change_rating9' => 'required|numeric',
                                'behavioral_change_remarks9' => 'required',
                                'behavioral_change_rating10' => 'required|numeric',
                                'behavioral_change_remarks10' => 'required',
                                'micro_supplement_rating11' => 'required|numeric',
                                'micro_supplement_remark11' => 'required',
                                'micro_supplement_rating12' => 'required|numeric',
                                'micro_supplement_remark12' => 'required',
                                'micro_supplement_rating13' => 'required|numeric',
                                'micro_supplement_remark13' => 'required',
                                'micro_supplement_rating14' => 'required|numeric',
                                'micro_supplement_remark14' => 'required',
                                'micro_supplement_rating15' => 'required|numeric',
                                'micro_supplement_remark15' => 'required',
                                'micro_supplement_rating16' => 'required|numeric',
                                'micro_supplement_remark16' => 'required',
                                'mandatory_food_rating17' => 'required|numeric',
                                'mandatory_food_remarks17' => 'required',
                                'mandatory_food_rating18' => 'required|numeric',
                                'mandatory_food_remarks18' => 'required',
                                'mandatory_food_rating19' => 'required|numeric',
                                'mandatory_food_remarks19' => 'required',
                                'emergencies_program_rating20' => 'required|numeric',
                                'emergencies_program_remarks20' => 'required',
                                'prevention_program_rating21' => 'required|numeric',
                                'prevention_program_remarks21' => 'required',
                                'prevention_program_rating22' => 'required|numeric',
                                'prevention_program_remarks22' => 'required',
                                'nutri_sensitive_rating23' => 'required|numeric',
                                'nutri_sensitive_remarks23' => 'required',
                                'nutri_sensitive_rating24' => 'required|numeric',
                                'nutri_sensitive_remarks24' => 'required',
                                'nutri_sensitive_rating25' => 'required|numeric',
                                'nutri_sensitive_remarks25' => 'required',
                                'nutri_sensitive_rating26' => 'required|numeric',
                                'nutri_sensitive_remarks26' => 'required',
                                'nutri_sensitive_rating27' => 'required|numeric',
                                'nutri_sensitive_remarks27' => 'required',
                                'nutri_sensitive_rating28' => 'required|numeric',
                                'nutri_sensitive_remarks28' => 'required',
                                'nutri_sensitive_rating29' => 'required|numeric',
                                'nutri_sensitive_remarks29' => 'required',
                                'nutri_sensitive_rating30' => 'required|numeric',
                                'nutri_sensitive_remarks30' => 'required',
                                'underweight_child_remarks' => 'required',
                                'stundent_child_rating' => 'required|numeric',
                                'stundent_child_remarks' => 'required',
                                'wasted_child_rating' => 'required|numeric',
                                'wasted_child_remarks' => 'required',
                                'obese_child_rating' => 'required|numeric',
                                'obese_child_remarks' => 'required',
                                'wasted_school_rating' => 'required|numeric',
                                'wasted_school_remarks' => 'required',
                                'obese_school_rating' => 'required|numeric',
                                'obese_school_remarks' => 'required',
                                'risk_pregnant_rating' => 'required|numeric',
                                'risk_pregnant_remarks' => 'required',
                                'timbang_plus_rating' => 'required|numeric',
                                'timbang_plus_remarks' => 'required',
                                'vision_good_practices_remarks' => 'required',
                                'vision_issues_problems_remarks' => 'required',
                                'vision_local_initiatives_remarks' => 'required',
                                'vision_immediate_actions_remarks' => 'required',
                                'policies_good_practices_remarks' => 'required',
                                'policies_issues_problems_remarks' => 'required',
                                'policies_local_initiatives_remarks' => 'required',
                                'policies_immediate_actions_remarks' => 'required',
                                'governance_good_practices_remarks' => 'required',
                                'governance_issues_problems_remarks' => 'required',
                                'governance_local_initiatives_remarks' => 'required',
                                'governance_immediate_actions_remarks' => 'required',
                                'nutri_good_practices_remarks' => 'required',
                                'nutri_issues_problems_remarks' => 'required',
                                'nuti_local_initiatives_remarks' => 'required',
                                'nutri_immediate_actions_remarks' => 'required',
                                'services_good_practices_remarks' => 'required',
                                'services_issues_problems_remarks' => 'required',
                                'services_local_initiatives_remarks' => 'required',
                                'services_immediate_actions_remarks' => 'required',
                                'changes_good_practices_remarks' => 'required',
                                'changes_issues_problems_remarks' => 'required',
                                'changes_local_initiatives_remarks' => 'required',
                                'changes_immediate_actions_remarks' => 'required',
                               
             ]);


         if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

        $lguProfile = LguProfile::create([
            'incomeclass' => $request->income_class,
            'dateMonitoring' => $request->date_monitoring,
            'periodCovered' => $request->period_covered,
            'population' => $request->population,
            'nutritionalStatus' => $request->nutritional_status,
            'landuseClassification' => $request->land_use_classification,
            'totallandRemarks' => $request->total_land_remarks,
            'sourceRemarks' => $request->source_and_remarks,
            'received' => $request->received,
            'dateReceived' => $request->date_received,
            'noPax' => $request->no_pax,
            'remarks' => $request->remarks,
        ]);

        LguDemographicsModel::create([
            'lguprofile_id' => $lguProfile->id,
            'totalPopulation' => $request->input('total_population'),
            'noHouseholds' => $request->input('no_households'),
            'noSitios' => $request->input('no_sitios'),
            'householdssafeWater' => $request->input('households_safe_water'),
            'householdssanitaryToilet' => $request->input('households_sanitary_toilet'),
            'daycareCenter' => $request->input('day_care_center'),
            'publicelemsecondarySchools' => $request->input('public_elem_secondary_schools'),
            'brgyhealthStations' => $request->input('brgy_health_stations'),
            'retailsoutletsStores' => $request->input('retails_outlets_stores'),
            'marketstransportterminal' => $request->input('markets_transport_terminal'),
            'monthersBreastfeeding' => $request->input('monthers_breastfeeding'),
            'terrain' => $request->input('terrain'),
            'hazards' => $request->input('hazards'),
        ]);

        VisionMission::create([
            'lguprofile_id' => $lguProfile->id,
            'rating1a' => $request->input('vision_rating1'),
            'rating1b' => $request->input('vision_rating2'),
            'rating1c' => $request->input('vision_rating3'),
            'remarks1a' => $request->input('vision_remarks1'),
            'remarks1b' => $request->input('vision_remarks2'),
            'remarks1c' => $request->input('vision_remarks3'),

            'region_id' => $request->input('region'),
            'province_id' => $request->input('province'),
            'municipal_id' => $request->input('municipality'),
            'barangay_id' => $request->input('barangay'),
        ]);
        Governances::create([
            'lguprofile_id' => $lguProfile->id,
            'rating3a' => $request->input('governance_rating1'),
            'rating3b' => $request->input('governance_rating2'),
            'rating3c' => $request->input('governance_rating3'),
            'remarks3a' => $request->input('governance_remarks1'),
            'remarks3b' => $request->input('governance_remarks2'),
            'remarks3c' => $request->input('governance_remarks3'),

            'region_id' => $request->input('region'),
            'province_id' => $request->input('province'),
            'municipal_id' => $request->input('municipality'),
            'barangay_id' => $request->input('barangay'),
        ]);
        NationalPoliciesModel::create([
            'lguprofile_id' => $lguProfile->id,
            'rating2a' => $request->input('policies_rating1'),
            'rating2b' => $request->input('policies_rating2'),
            'rating2c' => $request->input('policies_rating3'),
            'rating2d' => $request->input('policies_rating4'),
            'rating2e' => $request->input('policies_rating5'),
            'rating2f' => $request->input('policies_rating6'),
            'rating2g' => $request->input('policies_rating7'),
            'rating2h' => $request->input('policies_rating8'),
            'rating2i' => $request->input('policies_rating9'),
            'rating2j' => $request->input('policies_rating10'),
            'rating2k' => $request->input('policies_rating11'),
            'rating2l' => $request->input('policies_rating12'),
            'rating2m' => $request->input('policies_rating13'),

            'remarks2a' => $request->input('policies_remarks1'),
            'remarks2b' => $request->input('policies_remarks2'),
            'remarks2c' => $request->input('policies_remarks3'),
            'remarks2d' => $request->input('policies_remarks4'),
            'remarks2e' => $request->input('policies_remarks5'),
            'remarks2f' => $request->input('policies_remarks6'),
            'remarks2g' => $request->input('policies_remarks7'),
            'remarks2h' => $request->input('policies_remarks8'),
            'remarks2i' => $request->input('policies_remarks9'),
            'remarks2j' => $request->input('policies_remarks10'),
            'remarks2k' => $request->input('policies_remarks11'),
            'remarks2l' => $request->input('policies_remarks12'),
            'remarks2m' => $request->input('policies_remarks13'),

            'region_id' => $request->input('region'),
            'province_id' => $request->input('province'),
            'municipal_id' => $request->input('municipality'),
            'barangay_id' => $request->input('barangay'),
        ]);
        LncManagementFunctionModel::create([
            'lguprofile_id' => $lguProfile->id,
            'rating4a' => $request->input('local_nutrition_rating1'),
            'rating4b' => $request->input('local_nutrition_rating2'),
            'rating4c' => $request->input('local_nutrition_rating3'),
            'rating4d' => $request->input('local_nutrition_rating4'),
            'rating4e' => $request->input('local_nutrition_rating5'),
            'rating4f' => $request->input('local_nutrition_rating6'),
            'rating4g' => $request->input('local_nutrition_rating7'),

            'remarks4a' => $request->input('local_nutrition_remarks1'),
            'remarks4b' => $request->input('local_nutrition_remarks2'),
            'remarks4c' => $request->input('local_nutrition_remarks3'),
            'remarks4d' => $request->input('local_nutrition_remarks4'),
            'remarks4e' => $request->input('local_nutrition_remarks5'),
            'remarks4f' => $request->input('local_nutrition_remarks6'),
            'remarks4g' => $request->input('local_nutrition_remarks7'),

            'region_id' => $request->input('region'),
            'province_id' => $request->input('province'),
            'municipal_id' => $request->input('municipality'),
            'barangay_id' => $request->input('barangay'),
        ]);
        
        NutritionServicesModel::create([
            'lgu_profile_id' => $lguProfile->id,
            'young_child_feeding_rating1' => $request->input('young_child_feeding_rating1'),
            'young_child_feeding_remarks1' => $request->input('young_child_feeding_remarks1'),
            'young_child_feeding_rating2' => $request->input('young_child_feeding_rating2'),
            'young_child_feeding_remarks2' => $request->input('young_child_feeding_remarks2'),
            'young_child_feeding_rating3' => $request->input('young_child_feeding_rating3'),
            'young_child_feeding_remarks3' => $request->input('young_child_feeding_remarks3'),
            'acute_malnutrition_rating4' => $request->input('acute_malnutrition_rating4'),
            'acute_malnutrition_remarks4' => $request->input('acute_malnutrition_remarks4'),
            'national_dietary_rating5' => $request->input('national_dietary_rating5'),
            'national_dietary_remarks5' => $request->input('national_dietary_remarks5'),
            'national_dietary_rating6' => $request->input('national_dietary_rating6'),
            'national_dietary_remarks6' => $request->input('national_dietary_remarks6'),
            'national_dietary_rating7' => $request->input('national_dietary_rating7'),
            'national_dietary_remarks7' => $request->input('national_dietary_remarks7'),
            'national_dietary_rating8' => $request->input('national_dietary_rating8'),
            'national_dietary_remarks8' => $request->input('national_dietary_remarks8'),
            'behavioral_change_rating9' => $request->input('behavioral_change_rating9'),
            'behavioral_change_remarks9' => $request->input('behavioral_change_remarks9'),
            'behavioral_change_rating10' => $request->input('behavioral_change_rating10'),
            'behavioral_change_remarks10' => $request->input('behavioral_change_remarks10'),
            'micro_supplement_rating11' => $request->input('micro_supplement_rating11'),
            'micro_supplement_remark11' => $request->input('micro_supplement_remark11'),
            'micro_supplement_rating12' => $request->input('micro_supplement_rating12'),
            'micro_supplement_remark12' => $request->input('micro_supplement_remark12'),
            'micro_supplement_rating13' => $request->input('micro_supplement_rating13'),
            'micro_supplement_remark13' => $request->input('micro_supplement_remark13'),
            'micro_supplement_rating14' => $request->input('micro_supplement_rating14'),
            'micro_supplement_remark14' => $request->input('micro_supplement_remark14'),
            'micro_supplement_rating15' => $request->input('micro_supplement_rating15'),
            'micro_supplement_remark15' => $request->input('micro_supplement_remark15'),
            'micro_supplement_rating16' => $request->input('micro_supplement_rating16'),
            'micro_supplement_remark16' => $request->input('micro_supplement_remark16'),
            'mandatory_food_rating17' => $request->input('mandatory_food_rating17'),
            'mandatory_food_remarks17' => $request->input('mandatory_food_remarks17'),
            'mandatory_food_rating18' => $request->input('mandatory_food_rating18'),
            'mandatory_food_remarks18' => $request->input('mandatory_food_remarks18'),
            'mandatory_food_rating19' => $request->input('mandatory_food_rating19'),
            'mandatory_food_remarks19' => $request->input('mandatory_food_remarks19'),
            'emergencies_program_rating20' => $request->input('emergencies_program_rating20'),
            'emergencies_program_remarks20' => $request->input('emergencies_program_remarks20'),
            'prevention_program_rating21' => $request->input('prevention_program_rating21'),
            'prevention_program_remarks21' => $request->input('prevention_program_remarks21'),
            'prevention_program_rating22' => $request->input('prevention_program_rating22'),
            'prevention_program_remarks22' => $request->input('prevention_program_remarks22'),
            'nutri_sensitive_rating23' => $request->input('nutri_sensitive_rating23'),
            'nutri_sensitive_remarks23' => $request->input('nutri_sensitive_remarks23'),
            'nutri_sensitive_rating24' => $request->input('nutri_sensitive_rating24'),
            'nutri_sensitive_remarks24' => $request->input('nutri_sensitive_remarks24'),
            'nutri_sensitive_rating25' => $request->input('nutri_sensitive_rating25'),
            'nutri_sensitive_remarks25' => $request->input('nutri_sensitive_remarks25'),
            'nutri_sensitive_rating26' => $request->input('nutri_sensitive_rating26'),
            'nutri_sensitive_remarks26' => $request->input('nutri_sensitive_remarks26'),
            'nutri_sensitive_rating27' => $request->input('nutri_sensitive_rating27'),
            'nutri_sensitive_remarks27' => $request->input('nutri_sensitive_remarks27'),
            'nutri_sensitive_rating28' => $request->input('nutri_sensitive_rating28'),
            'nutri_sensitive_remarks28' => $request->input('nutri_sensitive_remarks28'),
            'nutri_sensitive_rating29' => $request->input('nutri_sensitive_rating29'),
            'nutri_sensitive_remarks29' => $request->input('nutri_sensitive_remarks29'),
            'nutri_sensitive_rating30' => $request->input('nutri_sensitive_rating30'),
            'nutri_sensitive_remarks30' => $request->input('nutri_sensitive_remarks30'),
            'young_child_feeding_average' => $request->input('young_child_feeding_average'),
            'acute_malnutrition_average' => $request->input('acute_malnutrition_average'),
            'national_dietary_average' => $request->input('national_dietary_average'),
            'nutri_sensitive_average' => $request->input('nutri_sensitive_average'),
            'behavioral_change_average' => $request->input('behavioral_change_average'),
            'micro_supplement_average' => $request->input('micro_supplement_average'),
            'mandatory_food_average' => $request->input('mandatory_food_average'),
            'emergencies_program_average' => $request->input('emergencies_program_average'),
            'prevention_program_average' => $request->input('prevention_program_average'),

        ]);

        ChangesNSModel::create([
            'lgu_profile_id' => $lguProfile->id,
            'underweight_child_rating' => $request->input('underweight_child_rating'),
            'underweight_child_remarks' => $request->input('underweight_child_remarks'),
            'stundent_child_rating' => $request->input('stundent_child_rating'),
            'stundent_child_remarks' => $request->input('stundent_child_remarks'),
            'wasted_child_rating' => $request->input('wasted_child_rating'),
            'wasted_child_remarks' => $request->input('wasted_child_remarks'),
            'obese_child_rating' => $request->input('obese_child_rating'),
            'obese_child_remarks' => $request->input('obese_child_remarks'),
            'wasted_school_rating' => $request->input('wasted_school_rating'),
            'wasted_school_remarks' => $request->input('wasted_school_remarks'),
            'obese_school_rating' => $request->input('obese_school_rating'),
            'obese_school_remarks' => $request->input('obese_school_remarks'),
            'risk_pregnant_rating' => $request->input('risk_pregnant_rating'),
            'risk_pregnant_remarks' => $request->input('risk_pregnant_remarks'),
            'timbang_plus_rating' => $request->input('timbang_plus_rating'),
            'timbang_plus_remarks' => $request->input('timbang_plus_remarks'),
        ]);


       DiscussionQuestionModel::create([
        'lgu_profile_id' => $lguProfile->id,
        'vision_good_practices_remarks' => $request->input('vision_good_practices_remarks'),
        'vision_issues_problems_remarks' => $request->input('vision_issues_problems_remarks'),
        'vision_local_initiatives_remarks' => $request->input('vision_local_initiatives_remarks'),
        'vision_immediate_actions_remarks' => $request->input('vision_immediate_actions_remarks'),
        'policies_good_practices_remarks' => $request->input('policies_good_practices_remarks'),
        'policies_issues_problems_remarks' => $request->input('policies_issues_problems_remarks'),
        'policies_local_initiatives_remarks' => $request->input('policies_local_initiatives_remarks'),
        'policies_immediate_actions_remarks' => $request->input('policies_immediate_actions_remarks'),
        'governance_good_practices_remarks' => $request->input('governance_good_practices_remarks'),
        'governance_issues_problems_remarks' => $request->input('governance_issues_problems_remarks'),
        'governance_local_initiatives_remarks' => $request->input('governance_local_initiatives_remarks'),
        'governance_immediate_actions_remarks' => $request->input('governance_immediate_actions_remarks'),
        'nutri_good_practices_remarks' => $request->input('nutri_good_practices_remarks'),
        'nutri_issues_problems_remarks' => $request->input('nutri_issues_problems_remarks'),
        'nuti_local_initiatives_remarks' => $request->input('nuti_local_initiatives_remarks'),
        'nutri_immediate_actions_remarks' => $request->input('nutri_immediate_actions_remarks'),
        'services_good_practices_remarks' => $request->input('services_good_practices_remarks'),
        'services_issues_problems_remarks' => $request->input('services_issues_problems_remarks'),
        'services_local_initiatives_remarks' => $request->input('services_local_initiatives_remarks'),
        'services_immediate_actions_remarks' => $request->input('services_immediate_actions_remarks'),
        'changes_good_practices_remarks' => $request->input('changes_good_practices_remarks'),
        'changes_issues_problems_remarks' => $request->input('changes_issues_problems_remarks'),
        'changes_local_initiatives_remarks' => $request->input('changes_local_initiatives_remarks'),
        'changes_immediate_actions_remarks' => $request->input('changes_immediate_actions_remarks'),

       ]);

       
        // return view('mellpi_pro.create')->with('success', 'Data Successfully Added.');
        return redirect()->route('mellpi_pro.view');
      
    }

}