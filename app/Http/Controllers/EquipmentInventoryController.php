<?php

namespace App\Http\Controllers;

use App\Models\EquipmentInventoryModel;
use App\Models\PsgcBarangay;
use App\Models\PsgcCity;
use App\Models\PsgcComponentCity;
use App\Models\PsgcEquipmentInventory;
use App\Models\PsgcHighlyUrbanizedCity;
use App\Models\PsgcIndependentComponentCity;
use App\Models\PsgcMunicipality;
use App\Models\PsgcProvince;
use App\Models\PsgcRegion;
use App\Models\PsgcSubMunicipality;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EquipmentInventoryController extends Controller
{
    public function getRegions(Request $request)
    {
        $query = PsgcRegion::query();

        if ($request->has('psgc_code')) {
            $query->where('psgc_code', $request->input('psgc_code'));
        }

        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->has('correspondence_code')) {
            $query->where('correspondence_code', $request->input('correspondence_code'));
        }

        if ($request->has('reg_code')) {
            $query->where('reg_code', $request->input('reg_code'));
        }

        $regions = $query->get();

        return response()->json($regions);
    }

    public function getProvinces(Request $request)
    {
        $query = PsgcProvince::query();

        if ($request->has('psgc_code')) {
            $query->where('psgc_code', $request->input('psgc_code'));
        }

        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->has('correspondence_code')) {
            $query->where('correspondence_code', $request->input('correspondence_code'));
        }

        if ($request->has('reg_code')) {
            $query->where('reg_code', $request->input('reg_code'));
        }

        if ($request->has('prov_code')) {
            $query->where('prov_code', $request->input('prov_code'));
        }

        $provinces = $query->get();

        return response()->json($provinces);
    }

    public function getCities(Request $request)
    {
        $query = PsgcCity::query();

        if ($request->has('psgc_code')) {
            $query->where('psgc_code', $request->input('psgc_code'));
        }

        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->has('correspondence_code')) {
            $query->where('correspondence_code', $request->input('correspondence_code'));
        }

        if ($request->has('reg_code')) {
            $query->where('reg_code', $request->input('reg_code'));
        }

        if ($request->has('prov_code')) {
            $query->where('prov_code', $request->input('prov_code'));
        }

        if ($request->has('citymun_code')) {
            $query->where('citymun_code', $request->input('citymun_code'));
        }

        $cities = $query->get();

        return response()->json($cities);
    }

    public function getHighlyUrbanizedCities(Request $request)
    {
        $query = PsgcHighlyUrbanizedCity::query();

        if ($request->has('psgc_code')) {
            $query->where('psgc_code', $request->input('psgc_code'));
        }

        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->has('correspondence_code')) {
            $query->where('correspondence_code', $request->input('correspondence_code'));
        }

        if ($request->has('reg_code')) {
            $query->where('reg_code', $request->input('reg_code'));
        }

        if ($request->has('prov_code')) {
            $query->where('prov_code', $request->input('prov_code'));
        }

        if ($request->has('citymun_code')) {
            $query->where('citymun_code', $request->input('citymun_code'));
        }

        $highlyUrbanizedCities = $query->get();

        return response()->json($highlyUrbanizedCities);
    }

    public function getIndependentComponentCities(Request $request)
    {
        $query = PsgcIndependentComponentCity::query();

        if ($request->has('psgc_code')) {
            $query->where('psgc_code', $request->input('psgc_code'));
        }

        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->has('correspondence_code')) {
            $query->where('correspondence_code', $request->input('correspondence_code'));
        }

        if ($request->has('reg_code')) {
            $query->where('reg_code', $request->input('reg_code'));
        }

        if ($request->has('prov_code')) {
            $query->where('prov_code', $request->input('prov_code'));
        }

        if ($request->has('citymun_code')) {
            $query->where('citymun_code', $request->input('citymun_code'));
        }

        $independentComponentCities = $query->get();

        return response()->json($independentComponentCities);
    }

    public function getComponentCities(Request $request)
    {
        $query = PsgcComponentCity::query();

        if ($request->has('psgc_code')) {
            $query->where('psgc_code', $request->input('psgc_code'));
        }

        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->has('correspondence_code')) {
            $query->where('correspondence_code', $request->input('correspondence_code'));
        }

        if ($request->has('reg_code')) {
            $query->where('reg_code', $request->input('reg_code'));
        }

        if ($request->has('prov_code')) {
            $query->where('prov_code', $request->input('prov_code'));
        }

        if ($request->has('citymun_code')) {
            $query->where('citymun_code', $request->input('citymun_code'));
        }

        $componentCities = $query->get();

        return response()->json($componentCities);
    }

    public function getMunicipalities(Request $request)
    {
        $query = PsgcMunicipality::query();

        if ($request->has('psgc_code')) {
            $query->where('psgc_code', $request->input('psgc_code'));
        }

        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->has('correspondence_code')) {
            $query->where('correspondence_code', $request->input('correspondence_code'));
        }

        if ($request->has('reg_code')) {
            $query->where('reg_code', $request->input('reg_code'));
        }

        if ($request->has('prov_code')) {
            $query->where('prov_code', $request->input('prov_code'));
        }

        if ($request->has('citymun_code')) {
            $query->where('citymun_code', $request->input('citymun_code'));
        }

        $municipalities = $query->get();

        return response()->json($municipalities);
    }

    public function getSubMunicipalities(Request $request)
    {
        $query = PsgcSubMunicipality::query();

        if ($request->has('psgc_code')) {
            $query->where('psgc_code', $request->input('psgc_code'));
        }

        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->has('correspondence_code')) {
            $query->where('correspondence_code', $request->input('correspondence_code'));
        }

        if ($request->has('reg_code')) {
            $query->where('reg_code', $request->input('reg_code'));
        }

        if ($request->has('prov_code')) {
            $query->where('prov_code', $request->input('prov_code'));
        }

        if ($request->has('citymun_code')) {
            $query->where('citymun_code', $request->input('citymun_code'));
        }

        $subMunicipalities = $query->get();

        return response()->json($subMunicipalities);
    }

    public function getBarangays(Request $request)
    {
        $query = PsgcBarangay::query();
        $cityOfManilaCode = '1380600';
        $count = $request->has('count') && $request->input('count') == 'true';

        if ($request->has('psgc_code')) {
            $query->where('psgc_code', $request->input('psgc_code'));
        }

        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->has('correspondence_code')) {
            $query->where('correspondence_code', $request->input('correspondence_code'));
        }

        if ($request->has('reg_code')) {
            $query->where('reg_code', $request->input('reg_code'));
        }

        if ($request->has('prov_code')) {
            $query->where('prov_code', $request->input('prov_code'));
        }

        if ($request->has('citymun_code')) {
            $citymunCode = $request->input('citymun_code');
            if( $citymunCode === $cityOfManilaCode) {
                $query->where( 'citymun_code', 'like', '13806%');
            } else {
                $query->where('citymun_code', $request->input('citymun_code'));
            }
        }

        if ($count) {
            $count = $query->count();
            return response()->json($count);
        }

        $barangays = $query->get();

        return response()->json($barangays);
    }
    
    public function getCitiesAndMunicipalities(Request $request)
    {
        $citiesQuery = PsgcCity::query();
        $municipalitiesQuery = PsgcMunicipality::query();
        $excludeProvincialAreas = $request->has('excludeProvincialAreas') && $request->boolean('excludeProvincialAreas');
        
        if ($request->has('psgc_code')) {
            $citiesQuery->where('psgc_code', $request->input('psgc_code'));
            $municipalitiesQuery->where('psgc_code', $request->input('psgc_code'));
        }
    
        if ($request->has('name')) {
            $citiesQuery->where('name', 'like', '%' . $request->input('name') . '%');
            $municipalitiesQuery->where('name', 'like', '%' . $request->input('name') . '%');
        }
    
        if ($request->has('correspondence_code')) {
            $citiesQuery->where('correspondence_code', $request->input('correspondence_code'));
            $municipalitiesQuery->where('correspondence_code', $request->input('correspondence_code'));
        }
    
        if ($request->has('reg_code')) {
            $citiesQuery->where('reg_code', $request->input('reg_code'));
            $municipalitiesQuery->where('reg_code', $request->input('reg_code'));
        }
    
        if ($request->has('prov_code')) {
            $citiesQuery->where('prov_code', $request->input('prov_code'));
            $municipalitiesQuery->where('prov_code', $request->input('prov_code'));
        }
    
        if ($request->has('citymun_code')) {
            $citiesQuery->where('citymun_code', $request->input('citymun_code'));
            $municipalitiesQuery->where('citymun_code', $request->input('citymun_code'));
        }
        
        if ($excludeProvincialAreas) {
            $citiesQuery->whereNotIn('prov_code', function ($query) {
                $query->select('prov_code')
                      ->from('psgc_provinces');
            });
    
            $municipalitiesQuery->whereNotIn('prov_code', function ($query) {
                $query->select('prov_code')
                      ->from('psgc_provinces');
            });
        }
    
        $cities = $citiesQuery->get();
        $municipalities = $municipalitiesQuery->get();
    
        $combinedData = $cities->concat($municipalities);
    
        return response()->json($combinedData);
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
    public function getCitiesAndMunicipalitiesInventoryCreate(Request $request)
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
            $cities = PsgcCity::where('reg_code', $request->input('reg_code'))->get();
            $municipalities = PsgcMunicipality::where('reg_code', $request->input('reg_code'))->get();
            $combined = $cities->concat($municipalities);
            
            // Ensure inventory data exists for all locations in the region
            foreach ($combined as $location) {
                $cityOfManilaCode = '1380600';

                if ($location->citymun_code == $cityOfManilaCode) {
                    $totalBarangays = PsgcBarangay::where(function ($query) {
                        $query->where('citymun_code', 'like', '13806%');
                    })->count();
                } else {
                    $totalBarangays = PsgcBarangay::where('citymun_code', $location->citymun_code)->count();
                }
            
                PsgcEquipmentInventory::where('psgc_code', $location->psgc_code)->update([
                    'total_barangay' => $totalBarangays,
                ]);

                $inventory = PsgcEquipmentInventory::where('psgc_code', $location->psgc_code)->first();
                
                if (!$inventory) {
                    PsgcEquipmentInventory::create([
                        'psgc_code' => $location->psgc_code,
                        'name' => $location->name,
                        'correspondence_code' => $location->correspondence_code,
                        'reg_code' => $location->reg_code,
                        'prov_code' => $location->prov_code,
                        'citymun_code' => $location->citymun_code,
                        'total_barangay' => $totalBarangays,
                        'wooden_hb' => 0,
                        'non_wooden_hb' => 0,
                        'defective_hb' => 0,
                        'total_hb' => 0,
                        'availability_hb' => 0.00,
                        'steel_rules' => 0,
                        'microtoise' => 0,
                        'infantometer' => 0,
                        'remarks_hb' => '',
                        'hanging_type' => 0,
                        'defective_ws' => 0,
                        'total_ws' => 0,
                        'availability_ws' => 0.00,
                        'infat_scale' => 0,
                        'beam_balance' => 0,
                        'remarks_ws' => '',
                        'child' => 0,
                        'defective_muac_child' => 0,
                        'total_muac_child' => 0,
                        'availability_muac_child' => 0.00,
                        'adults' => 0,
                        'defective_muac_adults' => 0,
                        'total_muac_adults' => 0,
                        'availability_muac_adults' => 0.00,
                        'remarks_muac' => '',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

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
    public function test() 
    {
        // Get the list of province codes that exist in psgc_provinces
        $existingProvinceCodes = PsgcProvince::pluck('prov_code');
    
        // Initialize total counts
        $totalCitiesCount = 0;
        $totalMunicipalitiesCount = 0;
        $totalBarangaysCount = 0;
    
        // Step 1: Process regions, provinces, cities, and municipalities
        $regions = PsgcRegion::get();
        foreach ($regions as $region) 
        {
            // Process provinces under the current region
            $provinces = PsgcProvince::where('reg_code', $region->reg_code)->get();
    
            foreach ($provinces as $province) 
            {
                // Process cities under the current province
                $cities = PsgcCity::where('prov_code', $province->prov_code)->get();
                $totalCitiesCount += $cities->count();
    
                foreach ($cities as $city) 
                {
                    $cityOfManilaCode = '1380600';

                    if ($city->citymun_code == $cityOfManilaCode) {
                        $totalBarangaysCount += PsgcBarangay::where(function ($query) {
                            $query->where('citymun_code', 'like', '13806%');
                        })->count();
                    } else {
                        $totalBarangaysCount += PsgcBarangay::where('citymun_code', $city->citymun_code)->count();
                    }
                }
    
                // Process municipalities under the current province
                $municipalities = PsgcMunicipality::where('prov_code', $province->prov_code)->get();
                $totalMunicipalitiesCount += $municipalities->count();
    
                foreach ($municipalities as $municipality) 
                {
                    $totalBarangaysCount += PsgcBarangay::where('citymun_code', $municipality->citymun_code)->count();
                }
            }
        }
    
        // Step 2: Count cities and municipalities not present in psgc_provinces
        $citiesNotInProvinces = PsgcCity::whereNotIn('prov_code', $existingProvinceCodes)->get();
    
        foreach ($citiesNotInProvinces as $city) 
        {
            $totalCitiesCount++;
            if ($city->citymun_code == $cityOfManilaCode) {
                $totalBarangaysCount += PsgcBarangay::where(function ($query) {
                    $query->where('citymun_code', 'like', '13806%');
                })->count();
            } else {
                $totalBarangaysCount += PsgcBarangay::where('citymun_code', $city->citymun_code)->count();
            }
        }
    
        $municipalitiesNotInProvinces = PsgcMunicipality::whereNotIn('prov_code', $existingProvinceCodes)->get();
    
        foreach ($municipalitiesNotInProvinces as $municipality) 
        {
            $totalMunicipalitiesCount++;
            $totalBarangaysCount += PsgcBarangay::where('citymun_code', $municipality->citymun_code)->count();
        }
       
        return response()->json([
            'totalCities' => $totalCitiesCount,
            'totalMunicipalities' => $totalMunicipalitiesCount,
            'totalBarangays' => $totalBarangaysCount,
        ]);
    }

    public function index()
    {
        return view('equipment_inventory.index');
    }
    
}