<?php

namespace App\Http\Controllers\Admin\CityMunicipalOfficer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Termwind\Components\Raw;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\LocationController;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;


class CMOMellpiLGUProfileBarangayGovernanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function report()
     {
         $location = new LocationController;
         $regCode = auth()->user()->Region;
         $provCode = auth()->user()->Province;
         $citymunCode = auth()->user()->city_municipal;
         $provinces = $location->getProvinces(['reg_code' => $regCode]);
         $cities_municipalities = $location->getCitiesAndMunicipalities(['prov_code' => $provCode]);
         $barangays = $location->getBarangays(['citymun_code' => $citymunCode]);
 
         $barangay = auth()->user()->barangay;
         $lguProfile = DB::table('mplgubrgygovernance')->where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->get();
 
         // get Municipal id and user id 
        
         $data  = DB::table('municipals')
             ->join('mplgubrgygovernance', 'municipals.id', '=', 'mplgubrgygovernance.municipal_id')
             ->where('mplgubrgygovernance.status', 1) 
             ->get();
 
         return view('CityMunicipalStaff.VMReport', ['data' => $data]);
    }

    public function fetchReport() {
        $location = new LocationController;
        $regCode = auth()->user()->Region;
        $provCode = auth()->user()->Province;
        $citymunCode = auth()->user()->city_municipal;
        $provinces = $location->getProvinces(['reg_code' => $regCode]);
        $cities_municipalities = $location->getCitiesAndMunicipalities(['prov_code' => $provCode]);
        $barangays = $location->getBarangays(['citymun_code' => $citymunCode]);

 
            $data  = DB::table('vmbarangayreport')
            ->join('visionmissions', 'vmbarangayreport.lguprofilebarangay_id', '=', 'visionmissions.id') //lgu
            ->join('barangays', 'vmbarangayreport.barangay_id', '=', 'barangays.id')
            ->where('vmbarangayreport.status', 1) 
            ->select('vmbarangayreport.*','vmbarangayreport.status as LGUReportStatus',
                    'visionmissions.*','visionmissions.status as LGUprofileBarangayStatus',
                    'barangays.barangay as barangay')
            ->get();


            return response()->json(['data' => $data]);

    }

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
        $lguProfile = DB::table('mplgubrgygovernance')->where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->get();

        $data  = DB::table('municipals')
        ->join('mplgubrgygovernance', 'municipals.id', '=', 'mplgubrgygovernance.municipal_id')
        ->where('mplgubrgygovernance.status', 1) 
        ->get();

        return view('CityMunicipalOfficer.MellpiLGUBarangayGovernance.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        $action = 'edit'; 
        $location = new LocationController;
        $regCode = auth()->user()->Region;
        $provCode = auth()->user()->Province;
        $citymunCode = auth()->user()->city_municipal;
        $provinces = $location->getProvinces(['reg_code' => $regCode]);
        $cities_municipalities = $location->getCitiesAndMunicipalities(['prov_code' => $provCode]);
        $barangays = $location->getBarangays(['citymun_code' => $citymunCode]);

        $years = range(date("Y"), 1900); 

        $row = DB::table('mplgubrgygovernance')->where('id', $id)->first();

        return view('CityMunicipalOfficer.MellpiLGUBarangayGovernance.show',compact('row','provinces', 'cities_municipalities', 'barangays', 'years', 'action'));
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