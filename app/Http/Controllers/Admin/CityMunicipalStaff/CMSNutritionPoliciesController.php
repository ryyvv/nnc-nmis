<?php

namespace App\Http\Controllers\Admin\CityMunicipalStaff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\MellpiproNutritionService;
use App\Models\MellpiproNutritionServiceTracking;
use App\Http\Controllers\LocationController;
use Termwind\Components\Raw;
use Barryvdh\DomPDF\Facade\Pdf;

class CMSNutritionPoliciesController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $barangay = auth()->user()->barangay;
        // $nserlocation = DB::table('mplgubrgynutritionservice')->where('barangay_id', $barangay)->get();
        // return view('BarangayScholar.NutritionService.index', ['nserlocation' => $nserlocation]);


        $location = new LocationController;
        $regCode = auth()->user()->Region;
        $provCode = auth()->user()->Province;
        $citymunCode = auth()->user()->city_municipal;
        $provinces = $location->getProvinces(['reg_code' => $regCode]);
        $cities_municipalities = $location->getCitiesAndMunicipalities(['prov_code' => $provCode]);
        $barangays = $location->getBarangays(['citymun_code' => $citymunCode]);

        $barangay = auth()->user()->barangay;
        //$lguprofile = DB::table('lguprofilebarangay')->where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->get();

        $nserlocation = DB::table('users')
            ->join('mplgubrgynutritionservice', 'users.id', '=', 'mplgubrgynutritionservice.user_id')
            ->where('user_id', auth()->user()->id)->orderBy('id', 'DESC')
            ->select('users.Firstname as firstname', 'users.Middlename as middlename', 'users.Lastname as lastname', 'mplgubrgynutritionservice.*')
            ->get();

            // dd($nserlocation);
        return view('CityMunicipalStaff.NutritionService.index', compact('nserlocation', 'provinces', 'cities_municipalities', 'barangays'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $action = "create";
        $location = new LocationController;
        $regCode = auth()->user()->Region;
        $provCode = auth()->user()->Province;
        $citymunCode = auth()->user()->city_municipal;
        $provinces = $location->getProvinces(['reg_code' => $regCode]);
        $cities_municipalities = $location->getCitiesAndMunicipalities(['prov_code' => $provCode]);
        $barangays = $location->getBarangays(['citymun_code' => $citymunCode]);
        
        $years = range(date("Y"), 1900);

        return view('CityMunicipalStaff.NutritionService.create', compact('provinces', 'cities_municipalities', 'barangays','years','action'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataExists = DB::table('lgubarangayreport')
        ->where('dateMonitoring', $request->dateMonitoring)
        ->where( 'periodCovereda', $request->periodCovereda,)
        // ->where( 'barangay_id' , $request->barangay_id,) 
        ->exists();

        if ($dataExists) {
        return redirect()->back()->withInput()->with('error', 'A record with the same data already exists.');
        }   


        if ($request->formrequest == 'draft') {
            $nserBarangay = MellpiproNutritionService::create([
                'barangay_id' =>  $request->barangay_id,
                'municipal_id' =>  $request->municipal_id,
                'province_id' =>  $request->province_id,
                'region_id' =>  $request->region_id,
                'dateMonitoring' =>  $request->dateMonitoring,
                'periodCovereda' =>  $request->periodCovereda, 

                'rating5aa' => $request->rating5aa,
                'rating5ab' => $request->rating5ab,
                'rating5ac' => $request->rating5ac,
                'rating5b' => $request->rating5b,
                'rating5ca' => $request->rating5ca,
                'rating5cb' => $request->rating5cb,
                'rating5cc' => $request->rating5cc,
                'rating5cd' => $request->rating5cd,
                'rating5da' => $request->rating5da,
                'rating5db' => $request->rating5db,
                'rating5ea' => $request->rating5ea,
                'rating5eb' => $request->rating5eb,
                'rating5ec' => $request->rating5ec,
                'rating5ed' => $request->rating5ed,
                'rating5ee' => $request->rating5ee,
                'rating5ef' => $request->rating5ef,
                'rating5fa' => $request->rating5fa,
                'rating5fb' => $request->rating5fb,
                'rating5fc' => $request->rating5fc,
                'rating5ga' => $request->rating5ga,
                'rating5ha' => $request->rating5ha,
                'rating5hb' => $request->rating5hb,
                'rating5ia' => $request->rating5ia,
                'rating5ib' => $request->rating5ib,
                'rating5ic' => $request->rating5ic,
                'rating5id' => $request->rating5id,
                'rating5ie' => $request->rating5ie,
                'rating5if' => $request->rating5if,
                'rating5ig' => $request->rating5ig,
                'rating5ih' => $request->rating5ih,

                'remarks5aa' => $request->remarks5aa,
                'remarks5ab' => $request->remarks5ab,
                'remarks5ac' => $request->remarks5ac,
                'remarks5b' => $request->remarks5b,
                'remarks5ca' => $request->remarks5ca,
                'remarks5cb' => $request->remarks5cb,
                'remarks5cc' => $request->remarks5cc,
                'remarks5cd' => $request->remarks5cd,
                'remarks5da' => $request->remarks5da,
                'remarks5db' => $request->remarks5db,
                'remarks5ea' => $request->remarks5ea,
                'remarks5eb' => $request->remarks5eb,
                'remarks5ec' => $request->remarks5ec,
                'remarks5ed' => $request->remarks5ed,
                'remarks5ee' => $request->remarks5ee,
                'remarks5ef' => $request->remarks5ef,
                'remarks5fa' => $request->remarks5fa,
                'remarks5fb' => $request->remarks5fb,
                'remarks5fc' => $request->remarks5fc,
                'remarks5ga' => $request->remarks5ga,
                'remarks5ha' => $request->remarks5ha,
                'remarks5hb' => $request->remarks5hb,
                'remarks5ia' => $request->remarks5ia,
                'remarks5ib' => $request->remarks5ib,
                'remarks5ic' => $request->remarks5ic,
                'remarks5id' => $request->remarks5id,
                'remarks5ie' => $request->remarks5ie,
                'remarks5if' => $request->remarks5if,
                'remarks5ig' => $request->remarks5ig,
                'remarks5ih' => $request->remarks5ih,

                'status' =>  $request->status,
                'user_id' =>  $request->user_id, 
            ]);
            MellpiproNutritionServiceTracking::create([
                'mplgubrgynutritionservice_id' => $nserBarangay->id,
                'status' => $request->status,
                'barangay_id' => auth()->user()->barangay,
                'municipal_id' => auth()->user()->city_municipal,
                'user_id' => auth()->user()->id,
            ]);

            return redirect('CityMunicipalStaff/nutritionservice')->with('success', 'Data stored as Draft!'); 

        }else{
            $rules = [
                'barangay_id' => 'required|integer',
                'municipal_id' => 'required|integer',
                'province_id' => 'required|integer',
                'region_id' => 'required|integer',
                'dateMonitoring' => 'required|date|max:255',
                'periodCovereda' => 'required|string |max:255', 
    
                'rating5aa' => 'required|integer',
                'rating5ab' => 'required|integer',
                'rating5ac' => 'required|integer',

                'rating5b'  => 'required|integer',
                
                'rating5ca' => 'required|integer',
                'rating5cb' => 'required|integer',
                'rating5cc' => 'required|integer',
                'rating5cd' => 'required|integer',

                'rating5da' => 'required|integer',
                'rating5db' => 'required|integer',

                'rating5ea' => 'required|integer',
                'rating5eb' => 'required|integer',
                'rating5ec' => 'required|integer',
                'rating5ed' => 'required|integer',
                'rating5ee' => 'required|integer',
                'rating5ef' => 'required|integer',

                'rating5fa' => 'required|integer',
                'rating5fb' => 'required|integer',
                'rating5fc' => 'required|integer',

                'rating5ga' => 'required|integer',

                'rating5ha' => 'required|integer',
                'rating5hb' => 'required|integer',

                'rating5ia' => 'required|integer',
                'rating5ib' => 'required|integer',
                'rating5ic' => 'required|integer',
                'rating5id' => 'required|integer',
                'rating5ie' => 'required|integer',
                'rating5if' => 'required|integer',
                'rating5ig' => 'required|integer',
                'rating5ih' => 'required|integer',
    
                'remarks5aa' => 'nullable|string|max: 255',
                'remarks5ab' => 'nullable|string|max: 255',
                'remarks5ac' => 'nullable|string|max: 255',
                'remarks5b'  => 'nullable|string|max: 255',
                'remarks5ca' => 'nullable|string|max: 255',
                'remarks5cb' => 'nullable|string|max: 255',
                'remarks5cc' => 'nullable|string|max: 255',
                'remarks5cd' => 'nullable|string|max: 255',
                'remarks5da' => 'nullable|string|max: 255',
                'remarks5db' => 'nullable|string|max: 255',
                'remarks5ea' => 'nullable|string|max: 255',
                'remarks5eb' => 'nullable|string|max: 255',
                'remarks5ec' => 'nullable|string|max: 255',
                'remarks5ed' => 'nullable|string|max: 255',
                'remarks5ee' => 'nullable|string|max: 255',
                'remarks5ef' => 'nullable|string|max: 255',
                'remarks5fa' => 'nullable|string|max: 255',
                'remarks5fb' => 'nullable|string|max: 255',
                'remarks5fc' => 'nullable|string|max: 255',
                'remarks5ga' => 'nullable|string|max: 255',
                'remarks5ha' => 'nullable|string|max: 255',
                'remarks5hb' => 'nullable|string|max: 255',
                'remarks5ia' => 'nullable|string|max: 255',
                'remarks5ib' => 'nullable|string|max: 255',
                'remarks5ic' => 'nullable|string|max: 255',
                'remarks5id' => 'nullable|string|max: 255',
                'remarks5ie' => 'nullable|string|max: 255',
                'remarks5if' => 'nullable|string|max: 255',
                'remarks5ig' => 'nullable|string|max: 255',
                'remarks5ih' => 'nullable|string|max: 255',
    
                'status' => 'required|string|max:255',
                'user_id' => 'required|integer',
    
            ];
    
            $validator = Validator::make($request->all(), $rules);
    
                if ($validator->fails()) {
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput()->with('error', 'Something went wrong! Please try again.');
                }else {
    
                $nserBarangay = MellpiproNutritionService::create([
                    'barangay_id' =>  $request->barangay_id,
                    'municipal_id' =>  $request->municipal_id,
                    'province_id' =>  $request->province_id,
                    'region_id' =>  $request->region_id,
                    'dateMonitoring' =>  $request->dateMonitoring,
                    'periodCovereda' =>  $request->periodCovereda, 
                    'rating5aa' => $request->rating5aa,
                    'rating5ab' => $request->rating5ab,
                    'rating5ac' => $request->rating5ac,
                    'rating5b' => $request->rating5b,
                    'rating5ca' => $request->rating5ca,
                    'rating5cb' => $request->rating5cb,
                    'rating5cc' => $request->rating5cc,
                    'rating5cd' => $request->rating5cd,
                    'rating5da' => $request->rating5da,
                    'rating5db' => $request->rating5db,
                    'rating5ea' => $request->rating5ea,
                    'rating5eb' => $request->rating5eb,
                    'rating5ec' => $request->rating5ec,
                    'rating5ed' => $request->rating5ed,
                    'rating5ee' => $request->rating5ee,
                    'rating5ef' => $request->rating5ef,
                    'rating5fa' => $request->rating5fa,
                    'rating5fb' => $request->rating5fb,
                    'rating5fc' => $request->rating5fc,
                    'rating5ga' => $request->rating5ga,
                    'rating5ha' => $request->rating5ha,
                    'rating5hb' => $request->rating5hb,
                    'rating5ia' => $request->rating5ia,
                    'rating5ib' => $request->rating5ib,
                    'rating5ic' => $request->rating5ic,
                    'rating5id' => $request->rating5id,
                    'rating5ie' => $request->rating5ie,
                    'rating5if' => $request->rating5if,
                    'rating5ig' => $request->rating5ig,
                    'rating5ih' => $request->rating5ih,
    
                    'remarks5aa' => $request->remarks5aa,
                    'remarks5ab' => $request->remarks5ab,
                    'remarks5ac' => $request->remarks5ac,
                    'remarks5b' => $request->remarks5b,
                    'remarks5ca' => $request->remarks5ca,
                    'remarks5cb' => $request->remarks5cb,
                    'remarks5cc' => $request->remarks5cc,
                    'remarks5cd' => $request->remarks5cd,
                    'remarks5da' => $request->remarks5da,
                    'remarks5db' => $request->remarks5db,
                    'remarks5ea' => $request->remarks5ea,
                    'remarks5eb' => $request->remarks5eb,
                    'remarks5ec' => $request->remarks5ec,
                    'remarks5ed' => $request->remarks5ed,
                    'remarks5ee' => $request->remarks5ee,
                    'remarks5ef' => $request->remarks5ef,
                    'remarks5fa' => $request->remarks5fa,
                    'remarks5fb' => $request->remarks5fb,
                    'remarks5fc' => $request->remarks5fc,
                    'remarks5ga' => $request->remarks5ga,
                    'remarks5ha' => $request->remarks5ha,
                    'remarks5hb' => $request->remarks5hb,
                    'remarks5ia' => $request->remarks5ia,
                    'remarks5ib' => $request->remarks5ib,
                    'remarks5ic' => $request->remarks5ic,
                    'remarks5id' => $request->remarks5id,
                    'remarks5ie' => $request->remarks5ie,
                    'remarks5if' => $request->remarks5if,
                    'remarks5ig' => $request->remarks5ig,
                    'remarks5ih' => $request->remarks5ih,
    
                    'status' =>  $request->status,
                    'user_id' =>  $request->user_id, 
                ]);
                MellpiproNutritionServiceTracking::create([
                    'mplgubrgynutritionservice_id' => $nserBarangay->id,
                    'status' => $request->status,
                    'barangay_id' => auth()->user()->barangay,
                    'municipal_id' => auth()->user()->city_municipal,
                    'user_id' => auth()->user()->id,
                ]);

                DB::table('lgubarangayreport')->insert([
                    'mplgubrgynutritionservice_id' => $nserBarangay->id, 
                    'barangay_id' => $request->barangay_id,
                    'municipal_id' => $request->municipal_id,   
                    'dateMonitoring' => $request->dateMonitoring,
                    'periodCovereda' => $request->periodCovereda,
                    'status' => $request->status,
                    'user_id' => $request->user_id,
                    'count' =>  1,
                    'created_at' => now(), // Optional
                    'updated_at' => now(), // Optional
                ]);
        
            }
            return redirect('CityMunicipalStaff/nutritionservice')->with('success', 'Data stored successfully!');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $action = 'show';
        $location = new LocationController;
        $regCode = auth()->user()->Region;
        $provCode = auth()->user()->Province;
        $citymunCode = auth()->user()->city_municipal;
        $provinces = $location->getProvinces(['reg_code' => $regCode]);
        $cities_municipalities = $location->getCitiesAndMunicipalities(['prov_code' => $provCode]);
        $barangays = $location->getBarangays(['citymun_code' => $citymunCode]);

        $years = range(date("Y"), 1900);

        $row = DB::table('mplgubrgynutritionservice')->where('id', $id)->first();
     
        return view('CityMunicipalStaff.NutritionService.show', compact('row', 'provinces', 'cities_municipalities', 'barangays', 'years', 'action'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request ,string $id)
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

        $row = DB::table('mplgubrgynutritionservice')->where('id', $id)->first();
     
        return view('CityMunicipalStaff.NutritionService.edit', compact('row', 'provinces', 'cities_municipalities', 'barangays', 'years', 'action'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        if ($request->formrequest == 'draft') {
            $nserBarangay =  MellpiproNutritionService::find($id);
    
            $nserBarangay->update([
                'barangay_id' =>  $request->barangay_id,
                'municipal_id' =>  $request->municipal_id,
                'province_id' =>  $request->province_id,
                'region_id' =>  $request->region_id,
                'dateMonitoring' =>  $request->dateMonitoring,
                'periodCovereda' =>  $request->periodCovereda, 

                'rating5aa' => $request->rating5aa,
                'rating5ab' => $request->rating5ab,
                'rating5ac' => $request->rating5ac,
                'rating5b' => $request->rating5b,
                'rating5ca' => $request->rating5ca,
                'rating5cb' => $request->rating5cb,
                'rating5cc' => $request->rating5cc,
                'rating5cd' => $request->rating5cd,
                'rating5da' => $request->rating5da,
                'rating5db' => $request->rating5db,
                'rating5ea' => $request->rating5ea,
                'rating5eb' => $request->rating5eb,
                'rating5ec' => $request->rating5ec,
                'rating5ed' => $request->rating5ed,
                'rating5ee' => $request->rating5ee,
                'rating5ef' => $request->rating5ef,
                'rating5fa' => $request->rating5fa,
                'rating5fb' => $request->rating5fb,
                'rating5fc' => $request->rating5fc,
                'rating5ga' => $request->rating5ga,
                'rating5ha' => $request->rating5ha,
                'rating5hb' => $request->rating5hb,
                'rating5ia' => $request->rating5ia,
                'rating5ib' => $request->rating5ib,
                'rating5ic' => $request->rating5ic,
                'rating5id' => $request->rating5id,
                'rating5ie' => $request->rating5ie,
                'rating5if' => $request->rating5if,
                'rating5ig' => $request->rating5ig,
                'rating5ih' => $request->rating5ih,

                'remarks5aa' => $request->remarks5aa,
                'remarks5ab' => $request->remarks5ab,
                'remarks5ac' => $request->remarks5ac,
                'remarks5b' => $request->remarks5b,
                'remarks5ca' => $request->remarks5ca,
                'remarks5cb' => $request->remarks5cb,
                'remarks5cc' => $request->remarks5cc,
                'remarks5cd' => $request->remarks5cd,
                'remarks5da' => $request->remarks5da,
                'remarks5db' => $request->remarks5db,
                'remarks5ea' => $request->remarks5ea,
                'remarks5eb' => $request->remarks5eb,
                'remarks5ec' => $request->remarks5ec,
                'remarks5ed' => $request->remarks5ed,
                'remarks5ee' => $request->remarks5ee,
                'remarks5ef' => $request->remarks5ef,
                'remarks5fa' => $request->remarks5fa,
                'remarks5fb' => $request->remarks5fb,
                'remarks5fc' => $request->remarks5fc,
                'remarks5ga' => $request->remarks5ga,
                'remarks5ha' => $request->remarks5ha,
                'remarks5hb' => $request->remarks5hb,
                'remarks5ia' => $request->remarks5ia,
                'remarks5ib' => $request->remarks5ib,
                'remarks5ic' => $request->remarks5ic,
                'remarks5id' => $request->remarks5id,
                'remarks5ie' => $request->remarks5ie,
                'remarks5if' => $request->remarks5if,
                'remarks5ig' => $request->remarks5ig,
                'remarks5ih' => $request->remarks5ih,

                'status' =>  $request->status,
                'user_id' =>  $request->user_id, 
            ]);

            return redirect('CityMunicipalStaff/nutritionservice')->with('success', 'Data stored as Draft!'); 

        }else {

            $rules = [
                'barangay_id' => 'required|integer',
                'municipal_id' => 'required|integer',
                'province_id' => 'required|integer',
                'region_id' => 'required|integer',
                'dateMonitoring' => 'required|date|max:255',
                'periodCovereda' => 'required|string |max:255', 
    
                'rating5aa' => 'required|integer',
                'rating5ab' => 'required|integer',
                'rating5ac' => 'required|integer',
                'rating5b'  => 'required|integer',
                'rating5ca' => 'required|integer',
                'rating5cb' => 'required|integer',
                'rating5cc' => 'required|integer',
                'rating5cd' => 'required|integer',
                'rating5da' => 'required|integer',
                'rating5db' => 'required|integer',
                'rating5ea' => 'required|integer',
                'rating5eb' => 'required|integer',
                'rating5ec' => 'required|integer',
                'rating5ed' => 'required|integer',
                'rating5ee' => 'required|integer',
                'rating5ef' => 'required|integer',
                'rating5fa' => 'required|integer',
                'rating5fb' => 'required|integer',
                'rating5fc' => 'required|integer',
                'rating5ga' => 'required|integer',
                'rating5ha' => 'required|integer',
                'rating5hb' => 'required|integer',
                'rating5ia' => 'required|integer',
                'rating5ib' => 'required|integer',
                'rating5ic' => 'required|integer',
                'rating5id' => 'required|integer',
                'rating5ie' => 'required|integer',
                'rating5if' => 'required|integer',
                'rating5ig' => 'required|integer',
                'rating5ih' => 'required|integer',
    
                'remarks5aa' => 'nullable|string|max: 255',
                'remarks5ab' => 'nullable|string|max: 255',
                'remarks5ac' => 'nullable|string|max: 255',
                'remarks5b'  => 'nullable|string|max: 255',
                'remarks5ca' => 'nullable|string|max: 255',
                'remarks5cb' => 'nullable|string|max: 255',
                'remarks5cc' => 'nullable|string|max: 255',
                'remarks5cd' => 'nullable|string|max: 255',
                'remarks5da' => 'nullable|string|max: 255',
                'remarks5db' => 'nullable|string|max: 255',
                'remarks5ea' => 'nullable|string|max: 255',
                'remarks5eb' => 'nullable|string|max: 255',
                'remarks5ec' => 'nullable|string|max: 255',
                'remarks5ed' => 'nullable|string|max: 255',
                'remarks5ee' => 'nullable|string|max: 255',
                'remarks5ef' => 'nullable|string|max: 255',
                'remarks5fa' => 'nullable|string|max: 255',
                'remarks5fb' => 'nullable|string|max: 255',
                'remarks5fc' => 'nullable|string|max: 255',
                'remarks5ga' => 'nullable|string|max: 255',
                'remarks5ha' => 'nullable|string|max: 255',
                'remarks5hb' => 'nullable|string|max: 255',
                'remarks5ia' => 'nullable|string|max: 255',
                'remarks5ib' => 'nullable|string|max: 255',
                'remarks5ic' => 'nullable|string|max: 255',
                'remarks5id' => 'nullable|string|max: 255',
                'remarks5ie' => 'nullable|string|max: 255',
                'remarks5if' => 'nullable|string|max: 255',
                'remarks5ig' => 'nullable|string|max: 255',
                'remarks5ih' => 'nullable|string|max: 255',
    
                'status' => 'required|string|max:255', 
                'user_id' => 'required|integer',
    
            ];
    
            $validator = Validator::make($request->all(), $rules);
    
            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors()
                ], 422);
            } else {
    
                $nserBarangay =  MellpiproNutritionService::find($id);
    
                $nserBarangay->update([
                    'barangay_id' =>  $request->barangay_id,
                    'municipal_id' =>  $request->municipal_id,
                    'province_id' =>  $request->province_id,
                    'region_id' =>  $request->region_id,
                    'dateMonitoring' =>  $request->dateMonitoring,
                    'periodCovereda' =>  $request->periodCovereda, 
    
                    'rating5aa' => $request->rating5aa,
                    'rating5ab' => $request->rating5ab,
                    'rating5ac' => $request->rating5ac,
                    'rating5b' => $request->rating5b,
                    'rating5ca' => $request->rating5ca,
                    'rating5cb' => $request->rating5cb,
                    'rating5cc' => $request->rating5cc,
                    'rating5cd' => $request->rating5cd,
                    'rating5da' => $request->rating5da,
                    'rating5db' => $request->rating5db,
                    'rating5ea' => $request->rating5ea,
                    'rating5eb' => $request->rating5eb,
                    'rating5ec' => $request->rating5ec,
                    'rating5ed' => $request->rating5ed,
                    'rating5ee' => $request->rating5ee,
                    'rating5ef' => $request->rating5ef,
                    'rating5fa' => $request->rating5fa,
                    'rating5fb' => $request->rating5fb,
                    'rating5fc' => $request->rating5fc,
                    'rating5ga' => $request->rating5ga,
                    'rating5ha' => $request->rating5ha,
                    'rating5hb' => $request->rating5hb,
                    'rating5ia' => $request->rating5ia,
                    'rating5ib' => $request->rating5ib,
                    'rating5ic' => $request->rating5ic,
                    'rating5id' => $request->rating5id,
                    'rating5ie' => $request->rating5ie,
                    'rating5if' => $request->rating5if,
                    'rating5ig' => $request->rating5ig,
                    'rating5ih' => $request->rating5ih,
    
                    'remarks5aa' => $request->remarks5aa,
                    'remarks5ab' => $request->remarks5ab,
                    'remarks5ac' => $request->remarks5ac,
                    'remarks5b' => $request->remarks5b,
                    'remarks5ca' => $request->remarks5ca,
                    'remarks5cb' => $request->remarks5cb,
                    'remarks5cc' => $request->remarks5cc,
                    'remarks5cd' => $request->remarks5cd,
                    'remarks5da' => $request->remarks5da,
                    'remarks5db' => $request->remarks5db,
                    'remarks5ea' => $request->remarks5ea,
                    'remarks5eb' => $request->remarks5eb,
                    'remarks5ec' => $request->remarks5ec,
                    'remarks5ed' => $request->remarks5ed,
                    'remarks5ee' => $request->remarks5ee,
                    'remarks5ef' => $request->remarks5ef,
                    'remarks5fa' => $request->remarks5fa,
                    'remarks5fb' => $request->remarks5fb,
                    'remarks5fc' => $request->remarks5fc,
                    'remarks5ga' => $request->remarks5ga,
                    'remarks5ha' => $request->remarks5ha,
                    'remarks5hb' => $request->remarks5hb,
                    'remarks5ia' => $request->remarks5ia,
                    'remarks5ib' => $request->remarks5ib,
                    'remarks5ic' => $request->remarks5ic,
                    'remarks5id' => $request->remarks5id,
                    'remarks5ie' => $request->remarks5ie,
                    'remarks5if' => $request->remarks5if,
                    'remarks5ig' => $request->remarks5ig,
                    'remarks5ih' => $request->remarks5ih,
    
                    'status' =>  $request->status,
                    'user_id' =>  $request->user_id, 
                ]);
     
            }
            return redirect('CityMunicipalStaff/nutritionservice')->with('success', 'Data Updated Successfully!');
        }
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        DB::table('mplgubrgynutritionservicetracking')->where('mplgubrgynutritionservice_id', $request->id)->delete();
        $lguprofile = MellpiproNutritionService::find($request->id); 
        $lguprofile->delete();
        return redirect()->route('CMSnutritionservice.index')->with('success', 'Deleted successfully!');
    }
}