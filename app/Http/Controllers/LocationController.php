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

    public function getRegions(array $request)
    {
        $query = PsgcRegion::query();
    
        if (isset($request['psgc_code'])) {
            $query->where('psgc_code', $request['psgc_code']);
        }
    
        if (isset($request['name'])) {
            $query->where('name', 'like', '%' . $request['name'] . '%');
        }
    
        if (isset($request['correspondence_code'])) {
            $query->where('correspondence_code', $request['correspondence_code']);
        }
    
        if (isset($request['reg_code'])) {
            $query->where('reg_code', $request['reg_code']);
        }
    
        $regions = $query->get();
    
        return $regions;
    }
    
    public function getProvinces(array $request)
    {
        $query = PsgcProvince::query();
    
        if (isset($request['psgc_code'])) {
            $query->where('psgc_code', $request['psgc_code']);
        }
    
        if (isset($request['name'])) {
            $query->where('name', 'like', '%' . $request['name'] . '%');
        }
    
        if (isset($request['correspondence_code'])) {
            $query->where('correspondence_code', $request['correspondence_code']);
        }
    
        if (isset($request['reg_code'])) {
            $query->where('reg_code', $request['reg_code']);
        }
    
        if (isset($request['prov_code'])) {
            $query->where('prov_code', $request['prov_code']);
        }
    
        $provinces = $query->get();
    
        return $provinces;
    }
    
    public function getCities(array $request)
    {
        $query = PsgcCity::query();
    
        if (isset($request['psgc_code'])) {
            $query->where('psgc_code', $request['psgc_code']);
        }
    
        if (isset($request['name'])) {
            $query->where('name', 'like', '%' . $request['name'] . '%');
        }
    
        if (isset($request['correspondence_code'])) {
            $query->where('correspondence_code', $request['correspondence_code']);
        }
    
        if (isset($request['reg_code'])) {
            $query->where('reg_code', $request['reg_code']);
        }
    
        if (isset($request['prov_code'])) {
            $query->where('prov_code', $request['prov_code']);
        }
    
        if (isset($request['citymun_code'])) {
            $query->where('citymun_code', $request['citymun_code']);
        }
    
        $cities = $query->get();
    
        return $cities;
    }
    
    public function getHighlyUrbanizedCities(array $request)
    {
        $query = PsgcHighlyUrbanizedCity::query();
    
        if (isset($request['psgc_code'])) {
            $query->where('psgc_code', $request['psgc_code']);
        }
    
        if (isset($request['name'])) {
            $query->where('name', 'like', '%' . $request['name'] . '%');
        }
    
        if (isset($request['correspondence_code'])) {
            $query->where('correspondence_code', $request['correspondence_code']);
        }
    
        if (isset($request['reg_code'])) {
            $query->where('reg_code', $request['reg_code']);
        }
    
        if (isset($request['prov_code'])) {
            $query->where('prov_code', $request['prov_code']);
        }
    
        if (isset($request['citymun_code'])) {
            $query->where('citymun_code', $request['citymun_code']);
        }
    
        $highlyUrbanizedCities = $query->get();
    
        return $highlyUrbanizedCities;
    }
    
    public function getIndependentComponentCities(array $request)
    {
        $query = PsgcIndependentComponentCity::query();
    
        if (isset($request['psgc_code'])) {
            $query->where('psgc_code', $request['psgc_code']);
        }
    
        if (isset($request['name'])) {
            $query->where('name', 'like', '%' . $request['name'] . '%');
        }
    
        if (isset($request['correspondence_code'])) {
            $query->where('correspondence_code', $request['correspondence_code']);
        }
    
        if (isset($request['reg_code'])) {
            $query->where('reg_code', $request['reg_code']);
        }
    
        if (isset($request['prov_code'])) {
            $query->where('prov_code', $request['prov_code']);
        }
    
        if (isset($request['citymun_code'])) {
            $query->where('citymun_code', $request['citymun_code']);
        }
    
        $independentComponentCities = $query->get();
    
        return $independentComponentCities;
    }
    
    public function getComponentCities(array $request)
    {
        $query = PsgcComponentCity::query();
    
        if (isset($request['psgc_code'])) {
            $query->where('psgc_code', $request['psgc_code']);
        }
    
        if (isset($request['name'])) {
            $query->where('name', 'like', '%' . $request['name'] . '%');
        }
    
        if (isset($request['correspondence_code'])) {
            $query->where('correspondence_code', $request['correspondence_code']);
        }
    
        if (isset($request['reg_code'])) {
            $query->where('reg_code', $request['reg_code']);
        }
    
        if (isset($request['prov_code'])) {
            $query->where('prov_code', $request['prov_code']);
        }
    
        if (isset($request['citymun_code'])) {
            $query->where('citymun_code', $request['citymun_code']);
        }
    
        $componentCities = $query->get();
    
        return $componentCities;
    }
    
    public function getMunicipalities(array $request)
    {
        $query = PsgcMunicipality::query();
    
        if (isset($request['psgc_code'])) {
            $query->where('psgc_code', $request['psgc_code']);
        }
    
        if (isset($request['name'])) {
            $query->where('name', 'like', '%' . $request['name'] . '%');
        }
    
        if (isset($request['correspondence_code'])) {
            $query->where('correspondence_code', $request['correspondence_code']);
        }
    
        if (isset($request['reg_code'])) {
            $query->where('reg_code', $request['reg_code']);
        }
    
        if (isset($request['prov_code'])) {
            $query->where('prov_code', $request['prov_code']);
        }
    
        if (isset($request['citymun_code'])) {
            $query->where('citymun_code', $request['citymun_code']);
        }
    
        $municipalities = $query->get();
    
        return $municipalities;
    }
    
    public function getSubMunicipalities(array $request)
    {
        $query = PsgcSubMunicipality::query();
    
        if (isset($request['psgc_code'])) {
            $query->where('psgc_code', $request['psgc_code']);
        }
    
        if (isset($request['name'])) {
            $query->where('name', 'like', '%' . $request['name'] . '%');
        }
    
        if (isset($request['correspondence_code'])) {
            $query->where('correspondence_code', $request['correspondence_code']);
        }
    
        if (isset($request['reg_code'])) {
            $query->where('reg_code', $request['reg_code']);
        }
    
        if (isset($request['prov_code'])) {
            $query->where('prov_code', $request['prov_code']);
        }
    
        if (isset($request['citymun_code'])) {
            $query->where('citymun_code', $request['citymun_code']);
        }
    
        $subMunicipalities = $query->get();
    
        return $subMunicipalities;
    }
    
    public function getBarangays(array $request)
    {
        $query = PsgcBarangay::query();
        $cityOfManilaCode = '1380600';
    
        if (isset($request['psgc_code'])) {
            $query->where('psgc_code', $request['psgc_code']);
        }
    
        if (isset($request['name'])) {
            $query->where('name', 'like', '%' . $request['name'] . '%');
        }
    
        if (isset($request['correspondence_code'])) {
            $query->where('correspondence_code', $request['correspondence_code']);
        }
    
        if (isset($request['reg_code'])) {
            $query->where('reg_code', $request['reg_code']);
        }
    
        if (isset($request['prov_code'])) {
            $query->where('prov_code', $request['prov_code']);
        }
    
        if (isset($request['citymun_code'])) {
            $citymunCode = $request['citymun_code'];
            if ($citymunCode === $cityOfManilaCode) {
                $query->where('citymun_code', 'like', '13806%');
            } else {
                $query->where('citymun_code', $request['citymun_code']);
            }
        }
    
        $barangays = $query->get();
    
        return $barangays;
    }
    
    public function getCitiesAndMunicipalities(array $request)
    {
        $citiesQuery = PsgcCity::query();
        $municipalitiesQuery = PsgcMunicipality::query();
        $excludeProvincialAreas = isset($request['excludeProvincialAreas']) && filter_var($request['excludeProvincialAreas'], FILTER_VALIDATE_BOOLEAN);
        
        if (isset($request['psgc_code'])) {
            $psgcCode = $request['psgc_code'];
            $citiesQuery->where('psgc_code', $psgcCode);
            $municipalitiesQuery->where('psgc_code', $psgcCode);
        }
    
        if (isset($request['name'])) {
            $name = $request['name'];
            $citiesQuery->where('name', 'like', '%' . $name . '%');
            $municipalitiesQuery->where('name', 'like', '%' . $name . '%');
        }
    
        if (isset($request['correspondence_code'])) {
            $correspondenceCode = $request['correspondence_code'];
            $citiesQuery->where('correspondence_code', $correspondenceCode);
            $municipalitiesQuery->where('correspondence_code', $correspondenceCode);
        }
    
        if (isset($request['reg_code'])) {
            $regCode = $request['reg_code'];
            $citiesQuery->where('reg_code', $regCode);
            $municipalitiesQuery->where('reg_code', $regCode);
        }
    
        if (isset($request['prov_code'])) {
            $provCode = $request['prov_code'];
            $citiesQuery->where('prov_code', $provCode);
            $municipalitiesQuery->where('prov_code', $provCode);
        }
    
        if (isset($request['citymun_code'])) {
            $citymunCode = $request['citymun_code'];
            $citiesQuery->where('citymun_code', $citymunCode);
            $municipalitiesQuery->where('citymun_code', $citymunCode);
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
    
        return $combinedData;
    }
}