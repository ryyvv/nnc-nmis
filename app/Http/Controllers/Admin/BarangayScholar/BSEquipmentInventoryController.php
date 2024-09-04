<?php

namespace App\Http\Controllers\Admin\BarangayScholar;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LocationController;
use App\Models\EquipmentInventoryModel;
use App\Models\PsgcEquipmentInventory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BSEquipmentInventoryController extends Controller
{
    // protected $locationController;
    
    public function __construct()
    {
        $this->middleware('auth');
        // $this->locationController = new LocationController();
    }
    
    // public function getRegions(Request $request)
    // {
    //     return $this->locationController->getRegions($request);
    // }

    // public function getProvinces(Request $request)
    // {
    //     return $this->locationController->getProvinces($request);
    // }

    // public function getCities(Request $request)
    // {
    //     return $this->locationController->getCities($request);
    // }

    // public function getHighlyUrbanizedCities(Request $request)
    // {
    //     return $this->locationController->getHighlyUrbanizedCities($request);
    // }

    // public function getIndependentComponentCities(Request $request)
    // {
    //     return $this->locationController->getIndependentComponentCities($request);
    // }

    // public function getComponentCities(Request $request)
    // {
    //     return $this->locationController->getComponentCities($request);
    // }

    // public function getMunicipalities(Request $request)
    // {
    //     return $this->locationController->getMunicipalities($request);
    // }

    // public function getSubMunicipalities(Request $request)
    // {
    //     return $this->locationController->getSubMunicipalities($request);
    // }

    // public function getBarangays(Request $request)
    // {
    //     return $this->locationController->getBarangays($request);
    // }

    // public function getCitiesAndMunicipalities(Request $request)
    // {
    //     return $this->locationController->getCitiesAndMunicipalities($request);
    // }

    public function index()
    {
        return view('equipment_inventory.index');
    }

    public function create()
    {
        return view('equipment_inventory.create'); 
    }

    public function store(Request $request) 
    {   
        $rules = [
            'inputtotalBarangay' => 'required|integer',
            'inputWHB' => 'required|integer',
            'inputNonWHB' => 'required|integer',
            'inputHBNonF' => 'required|integer',
            'inputTotalHB' => 'required|integer',
            'inputHBpercent' => 'required|numeric',
            'inputSteelRules' => 'required|integer',
            'inputMicrotoise' => 'required|integer',
            'inputInfantometer' => 'required|integer',
            'inputHBRemarks' => 'nullable|string',
            'inputWSHanging' => 'required|integer',
            'inputWSNonF' => 'required|integer',
            'inputTotalWS' => 'required|integer',
            'inputWSpercent' => 'required|numeric',
            'inputInfantScale' => 'required|integer',
            'inputBeamBalance' => 'required|integer',
            'inputWSRemarks' => 'nullable|string',
            'inputMChild' => 'required|integer',
            'inputMNonFChild' => 'required|integer',
            'inputTotalChild' => 'required|integer',
            'inputChildpercent' => 'required|numeric',
            'inputMAdult' => 'required|integer',
            'inputMNonFAdult' => 'required|integer',
            'inputTotalAdult' => 'required|integer',
            'inputAdultpercent' => 'required|numeric',
            'inputMRemarks' => 'nullable|string',
            'inputPSGC' => 'required|string',
            'inputRegion' => 'required|string',
            'inputProvince' => 'required|string',
            'inputCM' => 'required|string',
        ];
        
        $message = [
            'inputtotalBarangay.required' => 'Total Barangay is required.',
            'inputWHB.required' => 'Wooden HB is required.',
            'inputNonWHB.required' => 'Non-Wooden HB is required.',
            'inputHBNonF.required' => 'Defective HB is required.',
            'inputTotalHB.required' => 'Total HB is required.',
            'inputHBpercent.required' => 'HB Availability percentage is required.',
            'inputSteelRules.required' => 'Steel Rules count is required.',
            'inputMicrotoise.required' => 'Microtoise count is required.',
            'inputInfantometer.required' => 'Infantometer count is required.',
            'inputWSHanging.required' => 'Hanging Type is required.',
            'inputWSNonF.required' => 'Defective WS is required.',
            'inputTotalWS.required' => 'Total WS is required.',
            'inputWSpercent.required' => 'WS Availability percentage is required.',
            'inputInfantScale.required' => 'Infant Scale count is required.',
            'inputBeamBalance.required' => 'Beam Balance count is required.',
            'inputMChild.required' => 'Child MUAC count is required.',
            'inputMNonFChild.required' => 'Defective MUAC Child count is required.',
            'inputTotalChild.required' => 'Total MUAC Child count is required.',
            'inputChildpercent.required' => 'MUAC Child Availability percentage is required.',
            'inputMAdult.required' => 'Adult MUAC count is required.',
            'inputMNonFAdult.required' => 'Defective MUAC Adult count is required.',
            'inputTotalAdult.required' => 'Total MUAC Adult count is required.',
            'inputAdultpercent.required' => 'MUAC Adult Availability percentage is required.',
            'inputPSGC.required' => 'PSGC Code is required.',
            'inputRegion.required' => 'Region ID is required.',
            'inputProvince.required' => 'Province ID is required.',
            'inputCM.required' => 'Municipal ID is required.',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()->with('error', 'Something went wrong! Please try again.');
        }
        
        $validatedData = $validator->validated();

        // PsgcEquipmentInventory::create([
        //     'totalBarangay' => $validatedData['inputtotalBarangay'],
        //     'woodenHB' => $validatedData['inputWHB'],
        //     'nonWoodenHB' => $validatedData['inputNonWHB'],
        //     'defectiveHB' => $validatedData['inputHBNonF'],
        //     'totalHB' => $validatedData['inputTotalHB'],
        //     'availabilityHB' => $validatedData['inputHBpercent'],
        //     'steelRules' => $validatedData['inputSteelRules'],
        //     'microtoise' => $validatedData['inputMicrotoise'],
        //     'infantometer' => $validatedData['inputInfantometer'],
        //     'remarksHB' => $validatedData['inputHBRemarks'],
        //     'hangingType' => $validatedData['inputWSHanging'],
        //     'defectiveWS' => $validatedData['inputWSNonF'],
        //     'totalWS' => $validatedData['inputTotalWS'],
        //     'availabilityWS' => $validatedData['inputWSpercent'],
        //     'infatScale' => $validatedData['inputInfantScale'],
        //     'beamBalance' => $validatedData['inputBeamBalance'],
        //     'remarksWS' => $validatedData['inputWSRemarks'],
        //     'child' => $validatedData['inputMChild'],
        //     'defectiveMUAC_child' => $validatedData['inputMNonFChild'],
        //     'totalMUAC_Child' => $validatedData['inputTotalChild'],
        //     'availabilityMUAC_child' => $validatedData['inputChildpercent'],
        //     'adults' => $validatedData['inputMAdult'],
        //     'defectiveMUAC_adults' => $validatedData['inputMNonFAdult'],
        //     'totalMUAC_adults' => $validatedData['inputTotalAdult'],
        //     'availabilityMUAC_adults' => $validatedData['inputAdultpercent'],
        //     'remarksMUAC' => $validatedData['inputMRemarks'],
        //     'psgccode_id' => $validatedData['inputPSGC'],
        //     'region_id' => $validatedData['inputRegion'],
        //     'province_id' => $validatedData['inputProvince'],
        //     'municipal_id' => $validatedData['inputCM'],
        // ]);

        PsgcEquipmentInventory::create([
            'psgc_code' => $validatedData['inputPSGC'],
            'name' => $validatedData['inputCM'],
            'correspondence_code' => '',
            'reg_code' => $validatedData['inputRegion'],
            'prov_code' => $validatedData['inputProvince'],
            'citymun_code' => $validatedData['inputCM'],
            'total_barangay' => $validatedData['inputtotalBarangay'],
            'wooden_hb' => $validatedData['inputWHB'],
            'non_wooden_hb' => $validatedData['inputNonWHB'],
            'defective_hb' => $validatedData['inputHBNonF'],
            'total_hb' => $validatedData['inputTotalHB'],
            'availability_hb' => $validatedData['inputHBpercent'],
            'steel_rules' => $validatedData['inputSteelRules'],
            'microtoise' => $validatedData['inputMicrotoise'],
            'infantometer' => $validatedData['inputInfantometer'],
            'remarks_hb' => $validatedData['inputHBRemarks'],
            'hanging_type' => $validatedData['inputWSHanging'],
            'defective_ws' => $validatedData['inputWSNonF'],
            'total_ws' => $validatedData['inputTotalWS'],
            'availability_ws' => $validatedData['inputWSpercent'],
            'infat_scale' => $validatedData['inputInfantScale'],
            'beam_balance' => $validatedData['inputBeamBalance'],
            'remarks_ws' => $validatedData['inputWSRemarks'],
            'child' => $validatedData['inputMChild'],
            'defective_muac_child' => $validatedData['inputMNonFChild'],
            'total_muac_child' => $validatedData['inputTotalChild'],
            'availability_muac_child' => $validatedData['inputChildpercent'],
            'adults' => $validatedData['inputMAdult'],
            'defective_muac_adults' => $validatedData['inputMNonFAdult'],
            'total_muac_adults' => $validatedData['inputTotalAdult'],
            'availability_muac_adults' => $validatedData['inputAdultpercent'],
            'remarks_muac' => $validatedData['inputMRemarks'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        

        return redirect()->back()->with('success', 'Equipment Inventory added successfully.');
    }
}