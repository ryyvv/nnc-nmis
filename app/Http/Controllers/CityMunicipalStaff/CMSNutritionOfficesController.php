<?php

namespace App\Http\Controllers\CityMunicipalStaff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Province;
use App\Models\Municipal;
use App\Models\Barangay;
use App\Models\NutritionOfficesModel;
use PhpParser\Node\Stmt\TryCatch;

class CMSNutritionOfficesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function nutriOfficeIndex()
    {
        return view('nutrition_offices/nutri_officeIndex');
    }
     
    public function index()
    {
        $nutritionOffices = NutritionOfficesModel::leftJoin('psgcs', 'psgccode_id', '=', 'psgcs.id')
        ->leftJoin('regions', 'region_id', '=', 'regions.id')
        ->leftJoin('provinces', 'province_id', '=', 'provinces.id')
        ->select('nutrition_offices.*', 'psgcs.psgccode as psgcs_code', 'regions.region as regions_name', 'provinces.province as province_name')
        ->get();
        return view('nutrition_offices.nutritionOfficesIndex', ['NutriOffice' => $nutritionOffices]);
    }

    public function create()
    {
        $Regs = Region::get();       
        $Prov = Province::get();
        $Mun = Municipal::get();
        $Brgy = Barangay::get();

        return view('nutrition_offices.nutritionOffices', ['Regs' => $Regs, 'Prov' => $Prov, 'Mun' => $Mun, 'Brgy' => $Brgy]);
    }

    public function store(Request $request)
    {
        try {
            $addNutritionOffices = new NutritionOfficesModel;

            $addNutritionOffices->geoLevel = $request->input('inputGeoLevel');
            $addNutritionOffices->income_class = $request->input('inputIncomeClass');
            $addNutritionOffices->nutritionOffice = $request->input('InputNutriOfice');
            $addNutritionOffices->separateNutritionBudget = $request->input('InputSeparateBudget');
            if ($request->input('InputSeparateBudget')=='yes') {
                # code...
                $addNutritionOffices->separateNutritionBudgetAmount = $request->input('InputSeparateBudgetAmount');
            } else {
                $addNutritionOffices->separateNutritionBudgetAmount = 0;
            }
            
            $addNutritionOffices->underWhatOffice = $request->input('InputOffice');
            if ($request->input('InputOffice')=='others') {
                $addNutritionOffices->underWhatOfficeOther = $request->input('InputOtherOffice');
            } else {
                $addNutritionOffices->underWhatOfficeOther = 'n/a';
            }
            
            $addNutritionOffices->pcnao_position = $request->input('InputPC_MNAO_Position');
            $addNutritionOffices->pcnao_jobTitle = $request->input('InputPC_MNAO_JobTitle');
            $addNutritionOffices->pcnao_emplStat = $request->input('InputPC_MNAO_EmpStat');
            if ($request->input('InputPC_MNAO_EmpStat')=='others') {
                # code...
                $addNutritionOffices->pcnao_othersEmpStat = $request->input('InputPC_OtherEmpStat');
            } else {
                $addNutritionOffices->pcnao_othersEmpStat = 'n/a';
            }
            
            $addNutritionOffices->pcnao_salaryGrade = $request->input('InputPC_MNAO_SalaryGrade');
            $addNutritionOffices->pcnao_moreThanOne = $request->input('InputMorePC_MNAO');
            if ($request->input('InputMorePC_MNAO')=='yes') {
                # code...
                $addNutritionOffices->pcnao_moreThanOneNumber = $request->input('InputMoreYesPC_MNAO');
            } else {
                $addNutritionOffices->pcnao_moreThanOneNumber = 0;
            }
            
            $addNutritionOffices->dcnpc_position = $request->input('InputDCNPC_Position');
            $addNutritionOffices->dcnpc_jobTitle = $request->input('InputDCNPC_JobTitle');
            $addNutritionOffices->dcnpc_emplStat = $request->input('InputD_CNPC_EmpStat');
            if ($request->input('InputD_CNPC_EmpStat')=='others') {
                # code...
                $addNutritionOffices->dcnpc_othersEmpStat = $request->input('InputDCNPC_OtherEmpStat');
            } else {
                $addNutritionOffices->dcnpc_othersEmpStat = 'n/a';
            }
            
            $addNutritionOffices->dcnpc_salaryGrade = $request->input('InputDCNPC_SalaryGrade');
            $addNutritionOffices->dcnpc_moreThanOne = $request->input('InputMoreDCNPC_MNAO');
            if ($request->input('InputMoreDCNPC_MNAO')=='yes') {
                # code...
                $addNutritionOffices->dcnpc_moreThanOneNumber = $request->input('InputMoreYesDCNPC_MNAO');
            } else {
                $addNutritionOffices->dcnpc_moreThanOneNumber = 0;
            }
            
            $addNutritionOffices->numTechSupp = $request->input('InputDCNPC_NumOfTech');
            $addNutritionOffices->numAdminSupp = $request->input('InputMoreYesDCNPC_NumOfAdmin');

            $addNutritionOffices->psgccode_id = $request->input('inputPSGC');
            $addNutritionOffices->psgccode_id = $request->input('inputPSGC');

            $addNutritionOffices->region_id = $request->input('inputRegion');
            $addNutritionOffices->region_id = $request->input('inputRegion');

            $addNutritionOffices->province_id = $request->input('inputProvince');
            $addNutritionOffices->province_id = $request->input('inputProvince');

            $addNutritionOffices->municipal_id = $request->input('inputCM');
            $addNutritionOffices->municipal_id = $request->input('inputCM');

            $addNutritionOffices->save();

            return redirect()->route('nutritionOffices');
        } catch (\Throwable $th) {
            //throw $th;
            return "An error occurred: " . $th->getMessage();
        }
    }
}
