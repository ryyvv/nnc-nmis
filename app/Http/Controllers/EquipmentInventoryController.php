<?php

namespace App\Http\Controllers;

use App\Models\EquipmentInventoryModel;
use App\Models\PsgcCity;
use App\Models\PsgcEquipmentInventory;
use App\Models\PsgcMunicipality;
use App\Models\PsgcProvince;
use App\Models\PsgcRegion;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EquipmentInventoryController extends Controller
{
    public function getRegions()
    {
        $regions = PsgcRegion::all();
        return response()->json($regions);
    }

    public function getProvinces($region_code)
    {
        $provinces = PsgcProvince::where('reg_code', $region_code)->get();
        return response()->json($provinces);
    }

    public function getCities($province_code) {
        $cities = PsgcCity::where('prov_code', $province_code)->get();
        return response()->json($cities);
    }

    public function getCitiesAndMunicipalitiesWithEquipmentInventory($province_code)
    {
        $region_code = 14;
        $provinces = PsgcProvince::where('reg_code', $region_code)->get();
        
        $cities = PsgcCity::where('prov_code', $province_code)->get();
        $municipalities = PsgcMunicipality::where('prov_code', $province_code)->get();
        $inventory = PsgcEquipmentInventory::where('prov_code', $province_code)->first();
        
    
        $combined = $cities->merge($municipalities);
        
        foreach ($combined as $location) {

            if (!$inventory) {
                PsgcEquipmentInventory::create([
                    'psgc_code' => $location->psgc_code,
                    'name' => $location->name,
                    'correspondence_code' => $location->correspondence_code,
                    'reg_code' => $location->reg_code,
                    'prov_code' => $location->prov_code,
                    'citymun_code' => $location->citymun_code,
                    'total_barangay' => 0,
                    'wooden_hb' => 0,
                    'non_wooden_hb' => 0,
                    'defective_hb' => 0.00,
                    'total_hb' => 0.00,
                    'availability_hb' => 0.00,
                    'steel_rules' => 0,
                    'microtoise' => 0,
                    'infantometer' => 0,
                    'remarks_hb' => '',
                    'hanging_type' => 0,
                    'defective_ws' => 0,
                    'total_ws' => 0.00,
                    'availability_ws' => 0.00,
                    'infat_scale' => 0,
                    'beam_balance' => 0,
                    'remarks_ws' => '',
                    'child' => 0,
                    'defective_muac_child' => 0,
                    'total_muac_child' => 0.00,
                    'availability_muac_child' => 0.00,
                    'adults' => 0,
                    'defective_muac_adults' => 0,
                    'total_muac_adults' => 0.00,
                    'availability_muac_adults' => 0.00,
                    'remarks_muac' => '',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        $citiesWithInventory = PsgcEquipmentInventory::where('prov_code', $province_code)->get();

        return response()->json($citiesWithInventory);
    }

    public function getCitiesWithEquipmentInventory($province_code)
    {
        $cities = PsgcCity::where('prov_code', $province_code)->get();
        $inventory = PsgcEquipmentInventory::where('prov_code', $province_code)->first();
        
        foreach ($cities as $city) {
            if (!$inventory) {
                PsgcEquipmentInventory::create([
                    'psgc_code' => $city->psgc_code,
                    'name' => $city->name,
                    'correspondence_code' => $city->correspondence_code,
                    'reg_code' => $city->reg_code,
                    'prov_code' => $city->prov_code,
                    'citymun_code' => $city->citymun_code,
                    'total_barangay' => 0,
                    'wooden_hb' => 0,
                    'non_wooden_hb' => 0,
                    'defective_hb' => 0.00,
                    'total_hb' => 0.00,
                    'availability_hb' => 0.00,
                    'steel_rules' => 0,
                    'microtoise' => 0,
                    'infantometer' => 0,
                    'remarks_hb' => '',
                    'hanging_type' => 0,
                    'defective_ws' => 0,
                    'total_ws' => 0.00,
                    'availability_ws' => 0.00,
                    'infat_scale' => 0,
                    'beam_balance' => 0,
                    'remarks_ws' => '',
                    'child' => 0,
                    'defective_muac_child' => 0,
                    'total_muac_child' => 0.00,
                    'availability_muac_child' => 0.00,
                    'adults' => 0,
                    'defective_muac_adults' => 0,
                    'total_muac_adults' => 0.00,
                    'availability_muac_adults' => 0.00,
                    'remarks_muac' => '',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        $citiesWithInventory = PsgcEquipmentInventory::where('prov_code', $province_code)->get();

        return response()->json($citiesWithInventory);
    }
    
    public function getCityWithEquipmentInventory($psgc_code)
    {
        $city = PsgcCity::where('psgc_code', $psgc_code)->first();
        $inventory = PsgcEquipmentInventory::where('psgc_code', $psgc_code)->first();
        
        if (!$inventory) {
            PsgcEquipmentInventory::create([
                'psgc_code' => $city->psgc_code,
                'name' => $city->name,
                'correspondence_code' => $city->correspondence_code,
                'reg_code' => $city->reg_code,
                'prov_code' => $city->prov_code,
                'citymun_code' => $city->citymun_code,
                'total_barangay' => 0,
                'wooden_hb' => 0,
                'non_wooden_hb' => 0,
                'defective_hb' => 0.00,
                'total_hb' => 0.00,
                'availability_hb' => 0.00,
                'steel_rules' => 0,
                'microtoise' => 0,
                'infantometer' => 0,
                'remarks_hb' => '',
                'hanging_type' => 0,
                'defective_ws' => 0,
                'total_ws' => 0.00,
                'availability_ws' => 0.00,
                'infat_scale' => 0,
                'beam_balance' => 0,
                'remarks_ws' => '',
                'child' => 0,
                'defective_muac_child' => 0,
                'total_muac_child' => 0.00,
                'availability_muac_child' => 0.00,
                'adults' => 0,
                'defective_muac_adults' => 0,
                'total_muac_adults' => 0.00,
                'availability_muac_adults' => 0.00,
                'remarks_muac' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $cityWithInventory = PsgcEquipmentInventory::where('psgc_code', $psgc_code)->first();

        return response()->json($cityWithInventory);
    }

    public function getMunicipalities($province_code)
    {
        $municipalities = PsgcMunicipality::where('prov_code', $province_code)->get();
        return response()->json($municipalities);
    }
    
    public function getCitiesAndMunicipalities($province_code)
    {
        $cities = PsgcCity::where('prov_code', $province_code)->get();
        $municipalities = PsgcMunicipality::where('prov_code', $province_code)->get();
    
        // Merge cities and municipalities
        $combined = $cities->merge($municipalities);
    
        return response()->json($combined);
    }

    public function getCitiesInNCR($region_code)
    {
        $cities = PsgcCity::where('reg_code', $region_code)->get();
        return response()->json($cities);
    }

    public function getMunicipalitiesInNCR($region_code)
    {
        $municipalities = PsgcMunicipality::where('reg_code', $region_code)->get();
        return response()->json($municipalities);
    }

    public function getCitiesAndMunicipalitiesInNCR($region_code)
    {
        $cities = PsgcCity::where('reg_code', $region_code)->get();
        $municipalities = PsgcMunicipality::where('reg_code', $region_code)->get();
    
        // Merge cities and municipalities
        $combined = $cities->merge($municipalities);
    
        return response()->json($combined);
    }
    
    public function index()
    {
        $EquipmentInventory = EquipmentInventoryModel::with(['psgc','municipal', 'psgc_cities'])->get();
        
        $grandTotal = [
            'totalBarangay' => EquipmentInventoryModel::sum('totalBarangay'),
            'woodenHB' => EquipmentInventoryModel::sum('woodenHB'),
            'nonWoodenHB' => EquipmentInventoryModel::sum('nonWoodenHB'),
            'defectiveHB' => EquipmentInventoryModel::sum('defectiveHB'),
            'totalHB' => EquipmentInventoryModel::sum('totalHB'),
            'availabilityHB' => EquipmentInventoryModel::sum('availabilityHB'),
            'steelRules' => EquipmentInventoryModel::sum('steelRules'),
            'microtoise' => EquipmentInventoryModel::sum('microtoise'),
            'infantometer' => EquipmentInventoryModel::sum('infantometer'),
            'hangingType' => EquipmentInventoryModel::sum('hangingType'),
            'defectiveWS' => EquipmentInventoryModel::sum('defectiveWS'),
            'totalWS' => EquipmentInventoryModel::sum('totalWS'),
            'availabilityWS' => EquipmentInventoryModel::sum('availabilityWS'),
            'infatScale' => EquipmentInventoryModel::sum('infatScale'),
            'beamBalance' => EquipmentInventoryModel::sum('beamBalance'),
            'child' => EquipmentInventoryModel::sum('child'),
            'defectiveMUAC_child' => EquipmentInventoryModel::sum('defectiveMUAC_child'),
            'totalMUAC_Child' => EquipmentInventoryModel::sum('totalMUAC_Child'),
            'availabilityMUAC_child' => EquipmentInventoryModel::sum('availabilityMUAC_child'),
            'adults' => EquipmentInventoryModel::sum('adults'),
            'defectiveMUAC_adults' => EquipmentInventoryModel::sum('defectiveMUAC_adults'),
            'totalMUAC_adults' => EquipmentInventoryModel::sum('totalMUAC_adults'),
            'availabilityMUAC_adults' => EquipmentInventoryModel::sum('availabilityMUAC_adults'),
        ];

        // use compact for multiple data passing
        return view('equipment_inventory.index', compact('EquipmentInventory','grandTotal'));
    }
    
}