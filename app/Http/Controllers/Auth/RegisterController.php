<?php

namespace App\Http\Controllers\Auth;

//joboy
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

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

    public function getBarangays($city)
    {
        try {
            $barangays = DB::connection('nnc_db')->table('barangays')->where('city', $city)->get(['id', 'barangay']);
            return response()->json($barangays);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch barangays data. Please try again later.'], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
 

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // edit route 
    protected function redirectTo()
    {   
        // after reg. session submitted
        return route('UURdashboard.index');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'Firstname' => 'required|string|max:255',
            'Middlename' => 'required|string|max:255',
            'Lastname' => 'required|string|max:255',
            'Region' => 'required|string|max:255',
            'Province' => 'required|string|max:255',
            'city_municipal' => 'required|string|max:255',
            'barangay' => 'string|max:255',
            // 'barangay' => 'required|string|max:255',
            'agency_office_lgu' => 'required|string|max:255',
            'Division_unit' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'status' => 'required|string|max:255',
          
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {   
        return User::create([ 
            'Firstname' => $data['Firstname'],
            'Middlename' => $data['Middlename'],
            'Lastname' => $data['Lastname'],
            'Region' => $data['Region'],
            'Province' => $data['Province'],
            'city_municipal' => $data['city_municipal'],
            'barangay' => $data['barangay'],
            'agency_office_lgu' => $data['agency_office_lgu'],
            'Division_unit' => $data['Division_unit'],
            'role' => $data['role'],
            'email' => $data['email'], 
            'status' =>$data['status'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
