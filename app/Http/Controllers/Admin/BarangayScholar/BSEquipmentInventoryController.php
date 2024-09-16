<?php

namespace App\Http\Controllers\Admin\BarangayScholar;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LocationController;
use App\Models\EquipmentInventoryModel;
use App\Models\PsgcBarangay;
use App\Models\PsgcCity;
use App\Models\PsgcEquipmentInventory;
use App\Models\PsgcMunicipality;
use App\Models\PsgcProvince;
use App\Models\PsgcRegion;
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
    }
    
    public function index()
    {
        return view('equipment_inventory.index');
    }

    public function create()
    {
        return view('equipment_inventory.create'); 
    }

    public function edit() 
    {    
        return view('equipment_inventory.edit'); 
    }

    public function update(Request $request) 
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
            'inputRegion' => 'required|string',
            'inputProvince' => 'required|string',
            'inputCM' => 'required|string',
        ];
        
        if ($request->input('inputRegion') === '13') {
            $rules['inputProvince'] = 'nullable|string';
        }
        
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
            'inputRegion.required' => 'Region is required.',
            'inputProvince.required' => 'Province is required.',
            'inputCM.required' => 'City/Municipal is required.',
        ];

        $request->merge([
            'inputProvince' => !empty($request->input('inputProvince')) ? $request->input('inputProvince') : substr($request->input('inputCM'), 0, 5),
        ]);

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()->with('error', 'Something went wrong! Please try again.');
        }
        
        $validatedData = $validator->validated();

        $equipmentInventory = PsgcEquipmentInventory::where('citymun_code', $validatedData['inputCM']);

        if (!$equipmentInventory) {
            return redirect()->back()->with('error', 'Record not found.');
        }

        $equipmentInventory->update([
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
        ]);
        
        if (!$equipmentInventory) {
            return redirect()->back()->with('error', 'Failed to update Equipment Inventory. Please try again.');
        }

        return redirect()->route('BSequipmentInventory.index')->with('success', 'Equipment Inventory added successfully.');
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
            'inputRegion' => 'required|string',
            'inputProvince' => 'required|string',
            'inputCM' => 'required|string',
        ];
        
        if ($request->input('inputRegion') === '13') {
            $rules['inputProvince'] = 'nullable|string';
        }
        
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
            'inputRegion.required' => 'Region required.',
            'inputProvince.required' => 'Province required.',
            'inputCM.required' => 'City/Municipal required.',
        ];

        $request->merge([
            'inputProvince' => !empty($request->input('inputProvince')) ? $request->input('inputProvince') : substr($request->input('inputCM'), 0, 5),
        ]);
        
        $validator = Validator::make($request->all(), $rules, $message);
        
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()->with('error', 'Something went wrong! Please try again.');
        }
        
        $validatedData = $validator->validated();

        $citymun = PsgcCity::where('citymun_code', $validatedData['inputCM'])->first()
        ?? PsgcMunicipality::where('citymun_code', $validatedData['inputCM'])->first();
        
        if (!$citymun) {
            return redirect()->back()->with('error', 'City or municipality not found.');
        }
        
        $equipmentInventory = PsgcEquipmentInventory::where('psgc_code', $citymun->psgc_code)->first();
        
        if ($equipmentInventory) {
            return redirect()->back()->with('error', 'Records already exist.');
        }
        
        $equipmentInventory = PsgcEquipmentInventory::create([
            'psgc_code' => $citymun->psgc_code,
            'name' => $citymun->name,
            'correspondence_code' => $citymun->correspondence_code,
            'reg_code' =>  $citymun->reg_code,
            'prov_code' => $citymun->prov_code,
            'citymun_code' => $citymun->citymun_code,
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

        if (!$equipmentInventory) {
            return redirect()->back()->with('error', 'Failed to add Equipment Inventory. Please try again.');
        }
        
        return redirect()->route('BSequipmentInventory.index')->with('success', 'Equipment Inventory added successfully.');
    }

    public function getCitiesAndMunicipalitiesInventory(Request $request)
    {
        $EquipmentInventoryQuery = PsgcEquipmentInventory::query();
        $subTotalsQuery = PsgcEquipmentInventory::query();

        if ($request->has('psgc_code')) {
            $EquipmentInventoryQuery->where('psgc_code', $request->input('psgc_code'));
            $subTotalsQuery->where('psgc_code', $request->input('psgc_code'));
        }

        if ($request->has('name')) {
            $EquipmentInventoryQuery->where('name', 'like', '%' . $request->input('name') . '%');
            $subTotalsQuery->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->has('correspondence_code')) {
            $EquipmentInventoryQuery->where('correspondence_code', $request->input('correspondence_code'));
            $subTotalsQuery->where('correspondence_code', $request->input('correspondence_code'));
        }

        if ($request->has('reg_code')) {
            $EquipmentInventoryQuery->where('reg_code', $request->input('reg_code'));
            $subTotalsQuery->where('reg_code', $request->input('reg_code'));
        }

        if ($request->has('prov_code')) {
            $EquipmentInventoryQuery->where('prov_code', $request->input('prov_code'));
            $subTotalsQuery->where('prov_code', $request->input('prov_code'));
        }

        if ($request->has('citymun_code')) {
            $EquipmentInventoryQuery->where('citymun_code', $request->input('citymun_code'));
            $subTotalsQuery->where('citymun_code', $request->input('citymun_code'));
        }

        $citiesAndMunicipalities = $EquipmentInventoryQuery->get();

        $subTotals = $subTotalsQuery->selectRaw('
            SUM(total_barangay) as total_barangays,
            SUM(wooden_hb) as wooden_hb,
            SUM(non_wooden_hb) as non_wooden_hb,
            SUM(defective_hb) as defective_hb,
            SUM(total_hb) as total_hb,
            SUM(availability_hb) as availability_hb,
            SUM(steel_rules) as steel_rules,
            SUM(microtoise) as microtoise,
            SUM(infantometer) as infantometer,
            SUM(hanging_type) as hanging_type,
            SUM(defective_ws) as defective_ws,
            SUM(total_ws) as total_ws,
            SUM(availability_ws) as availability_ws,
            SUM(infat_scale) as infat_scale,
            SUM(beam_balance) as beam_balance,
            SUM(child) as child,
            SUM(defective_muac_child) as defective_muac_child,
            SUM(total_muac_child) as total_muac_child,
            SUM(availability_muac_child) as availability_muac_child,
            SUM(adults) as adults,
            SUM(defective_muac_adults) as defective_muac_adults,
            SUM(total_muac_adults) as total_muac_adults,
            SUM(availability_muac_adults) as availability_muac_adults
        ')
        ->first();

        $grandTotals =  PsgcEquipmentInventory::selectRaw('
            SUM(total_barangay) as total_barangays,
            SUM(wooden_hb) as wooden_hb,
            SUM(non_wooden_hb) as non_wooden_hb,
            SUM(defective_hb) as defective_hb,
            SUM(total_hb) as total_hb,
            SUM(availability_hb) as availability_hb,
            SUM(steel_rules) as steel_rules,
            SUM(microtoise) as microtoise,
            SUM(infantometer) as infantometer,
            SUM(hanging_type) as hanging_type,
            SUM(defective_ws) as defective_ws,
            SUM(total_ws) as total_ws,
            SUM(availability_ws) as availability_ws,
            SUM(infat_scale) as infat_scale,
            SUM(beam_balance) as beam_balance,
            SUM(child) as child,
            SUM(defective_muac_child) as defective_muac_child,
            SUM(total_muac_child) as total_muac_child,
            SUM(availability_muac_child) as availability_muac_child,
            SUM(adults) as adults,
            SUM(defective_muac_adults) as defective_muac_adults,
            SUM(total_muac_adults) as total_muac_adults,
            SUM(availability_muac_adults) as availability_muac_adults
        ')
        ->first();
        
        return response()->json([
            'citiesAndMunicipalities' => $citiesAndMunicipalities,
            'totals' => [
                $subTotals,
                $grandTotals,
            ]
        ]);
    }

    public function destroy(Request $request)
    {
        $rules = [
            'inputRegion' => 'required|string',
            'inputProvince' => 'required|string',
            'inputCM' => 'required|string',
        ];
        
        if ($request->input('inputRegion') === '13') {
            $rules['inputProvince'] = 'nullable|string';
        }
        
        $message = [
            'inputRegion.required' => 'Region required.',
            'inputProvince.required' => 'Province required.',
            'inputCM.required' => 'City/Municipal required.',
        ];

        $request->merge([
            'inputProvince' => !empty($request->input('inputProvince')) ? $request->input('inputProvince') : substr($request->input('inputCM'), 0, 5),
        ]);
        
        $validator = Validator::make($request->all(), $rules, $message);
        
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()->with('error', 'Something went wrong! Please try again.');
        }
        
        $validatedData = $validator->validated();
        
        $equipmentInventory = PsgcEquipmentInventory::where('citymun_code', $validatedData['inputCM'])->first();

        if (!$equipmentInventory) {
            return redirect()->back()->with('error', 'Record not found.');
        }

        $equipmentInventory->delete();
        
        return redirect()->route('BSequipmentInventory.index')->with('success', 'Equipment Inventory deleted successfully.');
    }
}