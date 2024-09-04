<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Province;
use App\Models\Barangay;
use App\Models\Municipal;
use App\Models\City;
use App\Models\PsgcBarangay;
use App\Models\PsgcCity;
use App\Models\PsgcComponentCity;
use App\Models\PsgcHighlyUrbanizedCity;
use App\Models\PsgcIndependentComponentCity;
use App\Models\PsgcMunicipality;
use App\Models\PsgcProvince;
use App\Models\PsgcRegion;
use App\Models\PsgcSubMunicipality;

class LocationController extends Controller
{

    public function getLocationDataProvince($region_id)
    {
        $data = Province::where('region_id', $region_id)->get();

        return $data;
    }

    public function getLocationDataBrgy($mun_id)
    {
        $data = Barangay::where('municipal_id', $mun_id )->get();

        return $data;
    }

    public function getLocationDataMuni($prov_id)
    {
        $data = Municipal::where('province_id', $prov_id)->get();

        return $data;
    }

    public function getLocationDataCity($region_id)
    {
        $data = City::where('region_id', $region_id)->get();

        return $data;
    }

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

        $barangays = $query->get();

        return response()->json($barangays);
    }
    
    public function getCitiesAndMunicipalities(Request $request)
    {

        $citiesQuery = PsgcCity::query();
        $municipalitiesQuery = PsgcMunicipality::query();

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

        $cities = $citiesQuery->get();
        $municipalities = $municipalitiesQuery->get();

        
        $combinedData = $cities->concat($municipalities);

        return response()->json($combinedData);
    }
}