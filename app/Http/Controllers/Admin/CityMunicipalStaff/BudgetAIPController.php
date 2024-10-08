<?php

namespace App\Http\Controllers\Admin\CityMunicipalStaff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\LocationController;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator; 

class BudgetAIPController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $location = new LocationController;
        $regCode = auth()->user()->Region;
        $provCode = auth()->user()->Province;
        $citymunCode = auth()->user()->city_municipal;
        $provinces = $location->getProvinces(['reg_code' => $regCode]);
        $cities_municipalities = $location->getCitiesAndMunicipalities(['prov_code' => $provCode]);
        $barangays = $location->getBarangays(['citymun_code' => $citymunCode]);

        $barangay = auth()->user()->barangay;

        $cnlocation = DB::table('users')
        ->join('mplgubrgychangeNS', 'users.id', '=', 'mplgubrgychangeNS.user_id')
        ->where('user_id', auth()->user()->id)->orderBy('id', 'DESC')
        ->select('users.Firstname as firstname', 'users.Middlename as middlename', 'users.Lastname as lastname', 'mplgubrgychangeNS.*')
        ->get();


        return view('BarangayScholar.BudgetAIP.index', compact('cnlocation', 'provinces', 'cities_municipalities', 'barangays')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('BarangayScholar.BudgetAIP.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}