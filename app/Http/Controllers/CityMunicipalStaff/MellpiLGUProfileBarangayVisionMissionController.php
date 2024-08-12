<?php

namespace App\Http\Controllers\CityMunicipalStaff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Termwind\Components\Raw;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\LocationController;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class MellpiLGUProfileBarangayVisionMissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function report()
    {
        $location = new LocationController;
        $prov = $location->getLocationDataProvince(auth()->user()->Region);
        $mun = $location->getLocationDataMuni(auth()->user()->Province);
        $city = $location->getLocationDataCity(auth()->user()->Region);
        $brgy = $location->getLocationDataBrgy(auth()->user()->city_municipal);

        $barangay = auth()->user()->barangay;
        $lguProfile = DB::table('visionmissions')->where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->get();

        // get Municipal id and user id 
       
        $data  = DB::table('municipals')
            ->join('visionmissions', 'municipals.id', '=', 'visionmissions.municipal_id')
            ->where('visionmissions.status', 1) 
            ->get();

        return view('CityMunicipalStaff.VMReport', ['data' => $data]);
    }

    public function fetchReport() {
        $location = new LocationController;
        $prov = $location->getLocationDataProvince(auth()->user()->Region);
        $mun = $location->getLocationDataMuni(auth()->user()->Province);
        $city = $location->getLocationDataCity(auth()->user()->Region);
        $brgy = $location->getLocationDataBrgy(auth()->user()->city_municipal);

 
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


    public function index() {
        $location = new LocationController;
        $prov = $location->getLocationDataProvince(auth()->user()->Region);
        $mun = $location->getLocationDataMuni(auth()->user()->Province);
        $city = $location->getLocationDataCity(auth()->user()->Region);
        $brgy = $location->getLocationDataBrgy(auth()->user()->city_municipal);

        $barangay = auth()->user()->barangay;
        $lguProfile = DB::table('lguprofilebarangay')->where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->get();

        // get Municipal id and user id 
       
     
        $data  = DB::table('vmbarangayreport')
        ->join('visionmissions', 'vmbarangayreport.lguprofilebarangay_id', '=', 'visionmissions.id') //lgu
        ->join('barangays', 'vmbarangayreport.barangay_id', '=', 'barangays.id')
        ->where('vmbarangayreport.status', 1) 
        ->select('vmbarangayreport.*','vmbarangayreport.status as LGUReportStatus',
                'visionmissions.*','visionmissions.status as LGUprofileBarangayStatus',
                'barangays.barangay as barangay')
        ->get();

        return view('CityMunicipalStaff.MellpiLGUProfileBarangay.index', ['data' => $data]);
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
