<?php

namespace App\Http\Controllers\Admin\CityMunicipalStaff;

use App\Http\Controllers\Controller;

use App\Models\EquipmentInventoryModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CMSEquipmentInventoryController extends Controller
{

    public function getProvinces()
    {
        try {
            $provinces = DB::connection('nnc_db')->table('provinces')->get(['id', 'province']);
            return response()->json($provinces);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch provinces data. Please try again later.'], 500);
        }
    }

    public function getProvincesByRegion($regionId)
    {
        try {
            $provinces = DB::connection('nnc_db')->table('provinces')->where('region_id', $regionId)->get(['provcode', 'province']);
            return response()->json($provinces);
        } catch (\Exception $e) { 
            return response()->json(['error' => 'Failed to fetch provinces data. Please try again later.'], 500);
        }
    }

    public function getCitiesByProvince($provcode)
    {
        try {
            $cities = DB::connection('nnc_db')->table('cities')->where('provcode', $provcode)->get(['provcode', 'cityname']);
            return response()->json($cities);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch cities data. Please try again later.'], 500);
        }
    }    

    public function getRegions()
    {
        try {
            $regions = DB::connection('nnc_db')->table('regions')->get(['id', 'region']);
            return response()->json($regions);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch regions data. Please try again later.'], 500);
        }
    }

    //
    public function __construct()
    {
        $this->middleware('auth');
    }
     
    public function index()
    {
        $equipmentInventory = EquipmentInventoryModel::get();
        // get the total of each column in Equipment inventory
        // $grandTotalBarangay = DB::table('equipment_inventory')->sum('equipment_inventory.totalBarangay');
        $granTotal = DB::table('equipment_inventory')
            ->select(
                DB::raw('SUM("totalBarangay") as totalBarangay'), 
                DB::raw('SUM("woodenHB") as woodenHB'),
                DB::raw('SUM("nonWoodenHB") as nonWoodenHB'),
                DB::raw('SUM("defectiveHB") as defectiveHB'),
                DB::raw('SUM("totalHB") as totalHB'),
                // DB::raw('SUM("availabilityHB") as availabilityHB'),
                DB::raw('SUM("steelRules") as steelRules'),
                DB::raw('SUM("microtoise") as microtoise'),
                DB::raw('SUM("infantometer") as infantometer'),
                DB::raw('SUM("hangingType") as hangingType'),
                DB::raw('SUM("defectiveWS") as defectiveWS'),
                DB::raw('SUM("totalWS") as totalWS'),
                // DB::raw('SUM("availabilityWS") as availabilityWS'),
                DB::raw('SUM("infatScale") as infatScale'),
                DB::raw('SUM("beamBalance") as beamBalance'),
                DB::raw('SUM("child") as child'),
                DB::raw('SUM("defectiveMUAC_child") as defectiveMUAC_child'),
                DB::raw('SUM("totalMUAC_Child") as totalMUAC_Child'),
                // DB::raw('SUM("availabilityMUAC_child") as availabilityMUAC_child'),
                DB::raw('SUM("adults") as adults'),
                DB::raw('SUM("defectiveMUAC_adults") as defectiveMUAC_adults'),
                DB::raw('SUM("totalMUAC_adults") as totalMUAC_adults'),
                // DB::raw('SUM("availabilityMUAC_adults") as availabilityMUAC_adults'),
                )->first();
            $availabilityHB = ($granTotal->totalhb / $granTotal->totalbarangay) * 100;
            $availabilityWS = ($granTotal->totalws / $granTotal->totalbarangay) * 100;
            $availabilityMUAC_child = ($granTotal->totalmuac_child / $granTotal->totalbarangay) * 100;
            $availabilityMUAC_adults = ($granTotal->totalmuac_adults / $granTotal->totalbarangay) * 100;

        return view('equipment_inventory/create.equipmentInventoryIndex', [
            'EquipmentInventory' => $equipmentInventory,
            'totalBarangay' => $granTotal->totalbarangay,
            'woodenHB' => $granTotal->woodenhb,
            'nonWoodenHB' => $granTotal->nonwoodenhb,
            'defectiveHB' => $granTotal->defectivehb,
            'totalHB' => $granTotal->totalhb,
            'availabilityHB' => $availabilityHB,
            'steelRules' => $granTotal->steelrules,
            'microtoise' => $granTotal->microtoise,
            'infantometer' => $granTotal->infantometer,
            'hangingType' => $granTotal->hangingtype,
            'defectiveWS' => $granTotal->defectivews,
            'totalWS' => $granTotal->totalws,
            'availabilityWS' => $availabilityWS,
            'infatScale' => $granTotal->infatscale,
            'beamBalance' => $granTotal->beambalance,
            'child' => $granTotal->child,
            'defectiveMUAC_child' => $granTotal->defectivemuac_child,
            'totalMUAC_Child' => $granTotal->totalmuac_child,
            'availabilityMUAC_child' => $availabilityMUAC_child,
            'adults' => $granTotal->adults,
            'defectiveMUAC_adults' => $granTotal->defectivemuac_adults,
            'totalMUAC_adults' => $granTotal->totalmuac_adults,
            'availabilityMUAC_adults' => $availabilityMUAC_adults

        ]);
    }

    public function create()
    {
        return view('equipment_inventory/create.equipmentInventory'); 
    }

    public function store(Request $request) {

        try {
          
            $addEquipmentInventory = new EquipmentInventoryModel;

            $addEquipmentInventory->totalBarangay  =   $request->input('inputtotalBarangay');
            $addEquipmentInventory->woodenHB  =        $request->input('inputWHB');
            $addEquipmentInventory->nonWoodenHB  =     $request->input('inputNonWHB');
            $addEquipmentInventory->defectiveHB  =     $request->input('inputHBNonF');
            $addEquipmentInventory->totalHB  =         $request->input('inputTotalHB');
            $addEquipmentInventory->availabilityHB  =  $request->input('inputHBpercent');
            $addEquipmentInventory->steelRules  =      $request->input('inputSteelRules');
            $addEquipmentInventory->microtoise  =       $request->input('inputMicrotoise');
            $addEquipmentInventory->infantometer  =      $request->input('inputInfantometer');
            $addEquipmentInventory->remarksHB  =        $request->input('inputHBRemarks');
            $addEquipmentInventory->hangingType  =   $request->input('inputWSHanging');
            $addEquipmentInventory->defectiveWS  =   $request->input('inputWSNonF');
            $addEquipmentInventory->totalWS  =   $request->input('inputTotalWS');
            $addEquipmentInventory->availabilityWS  =   $request->input('inputWSpercent');
            $addEquipmentInventory->infatScale  =   $request->input('inputInfantScale');
            $addEquipmentInventory->beamBalance  =   $request->input('inputBeamBalance');
            $addEquipmentInventory->remarksWS  =   $request->input('inputWSRemarks');
            $addEquipmentInventory->child  =       $request->input('inputMChild');
            $addEquipmentInventory->defectiveMUAC_child  =   $request->input('inputMNonFChild');
            $addEquipmentInventory->totalMUAC_Child  =   $request->input('inputTotalChild');
            $addEquipmentInventory->availabilityMUAC_child  =   $request->input('inputChildpercent');
            $addEquipmentInventory->adults  =   $request->input('inputMAdult');
            $addEquipmentInventory->defectiveMUAC_adults  =   $request->input('inputMNonFAdult');
            $addEquipmentInventory->totalMUAC_adults  =   $request->input('inputTotalAdult');
            $addEquipmentInventory->availabilityMUAC_adults  =   $request->input('inputAdultpercent');
            $addEquipmentInventory->remarksMUAC  =   $request->input('inputMRemarks');

            $addEquipmentInventory->psgccode_id  =   $request->input('inputPSGC');
            $addEquipmentInventory->psgccode_id  =   $request->input('inputPSGC');

            $addEquipmentInventory->region_id  =   $request->input('inputRegion');
            $addEquipmentInventory->region_id  =   $request->input('inputRegion');

            $addEquipmentInventory->province_id  =   $request->input('inputProvince');
            $addEquipmentInventory->province_id  =   $request->input('inputProvince');

            $addEquipmentInventory->municipal_id  =   $request->input('inputCM');
            $addEquipmentInventory->municipal_id  =   $request->input('inputCM');

            $addEquipmentInventory->save();
            return redirect()->back()->with('success', 'Equipment Inventory added successfully.');
        } catch (\Throwable $th) {
            //throw $th;
            return "An error occurred: " . $th->getMessage();
        }
    }
}