<?php

namespace App\Http\Controllers\Admin\BarangayScholar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\MellpiproLNCManagement;
use App\Models\MellpiproLNCManagementTracking;
use App\Models\Province;
use App\Models\Barangay;
use App\Models\Municipal;
use App\Models\City;
use App\Http\Controllers\LocationController;

class LNCManagementBarangayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $barangay = auth()->user()->barangay; 
        // $lnclocation = DB::table('mplgubrgylncmanagement')->where('user_id', auth()->user()->id)->get();
        // return view('BarangayScholar.LNCManagement.index', ['lnclocation' => $lnclocation ]);

        $location = new LocationController;
        $regCode = auth()->user()->Region;
        $provCode = auth()->user()->Province;
        $citymunCode = auth()->user()->city_municipal;
        $provinces = $location->getProvinces(['reg_code' => $regCode]);
        $cities_municipalities = $location->getCitiesAndMunicipalities(['prov_code' => $provCode]);
        $barangays = $location->getBarangays(['citymun_code' => $citymunCode]);

        $barangay = auth()->user()->barangay;

        $lnclocation = DB::table('users')
        ->join('mplgubrgylncmanagement', 'users.id', '=', 'mplgubrgylncmanagement.user_id')
        ->where('user_id', auth()->user()->id)->orderBy('id', 'DESC')
        ->select('users.Firstname as firstname', 'users.Middlename as middlename', 'users.Lastname as lastname', 'mplgubrgylncmanagement.*')
        ->get();


        return view('BarangayScholar.LNCManagement.index', compact('lnclocation', 'provinces', 'cities_municipalities', 'barangays'));
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

        return view('BarangayScholar.LNCManagement.create', compact('provinces', 'cities_municipalities', 'barangays','years', 'action'));
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

            $govbarangay = MellpiproLNCManagement::create([
                'barangay_id' =>  $request->barangay_id,
                'municipal_id' =>  $request->municipal_id,
                'province_id' =>  $request->province_id,
                'region_id' =>  $request->region_id,
                'dateMonitoring' =>  $request->dateMonitoring,
                'periodCovereda' =>  $request->periodCovereda,
                'rating4a' =>  $request->rating4a,
                'rating4b' =>  $request->rating4b,
                'rating4c' =>  $request->rating4c,
                'rating4c2' =>  $request->rating4c2,
                'rating4d' =>  $request->rating4d,
                'rating4e' =>  $request->rating4e,
                'rating4f' =>  $request->rating4f,
                'rating4g' =>  $request->rating4g,

                'remarks4a' =>  $request->remarks4a,
                'remarks4b' =>  $request->remarks4b,
                'remarks4c' =>  $request->remarks4c,
                'remarks4c2' =>  $request->remarks4c2,
                'remarks4d' =>  $request->remarks4d,
                'remarks4e' =>  $request->remarks4e,
                'remarks4f' =>  $request->remarks4f,
                'remarks4g' =>  $request->remarks4g, 
                'status' =>  $request->status,
                'user_id' =>  $request->user_id,
            ]); 

            MellpiproLNCManagementTracking::create([
                'mplgubrgylncmanagement_id' => $govbarangay->id,
                'status' => $request->status,
                'barangay_id' => auth()->user()->barangay,
                'municipal_id' => auth()->user()->city_municipal,
                'user_id' => auth()->user()->id,
            ]);

            return redirect('BarangayScholar/lncmanagement')->with('success', 'Data stored as Draft!'); 

        }else {

            $rules = [
                'barangay_id' => 'required|integer',
                'municipal_id' => 'required|integer',
                'province_id' => 'required|integer',
                'region_id' => 'required|integer',
                'dateMonitoring' => 'required|date|max:255',
                'periodCovereda' => 'required|string |max:255',
                'rating4a' => 'required|integer',
                'rating4b' => 'required|integer',
                'rating4c' => 'required|integer',
                'rating4c2' => 'required|integer',
                'rating4d' => 'required|integer',
                'rating4e' => 'required|integer',
                'rating4f' => 'required|integer',
                'rating4g' => 'required|integer',
                
                'remarks4a' => 'required|string|max:255',
                'remarks4b' => 'required|string|max:255',
                'remarks4c' => 'required|string|max:255',
                'remarks4c2' => 'required|string|max:255',
                'remarks4d' => 'required|string|max:255',
                'remarks4e' => 'required|string|max:255',
                'remarks4f' => 'required|string|max:255',
                'remarks4g' => 'required|string|max:255',
    
    
                'status' => 'required|string|max:255',
                'user_id' => 'required|integer',
        
            ]; 
    
            $validator = Validator::make($request->all() , $rules);
    
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput()->with('error', 'Something went wrong! Please try again.');
            }
    
                $lncbarangay = MellpiproLNCManagement::create([
                    'barangay_id' =>  $request->barangay_id,
                    'municipal_id' =>  $request->municipal_id,
                    'province_id' =>  $request->province_id,
                    'region_id' =>  $request->region_id,
                    'dateMonitoring' =>  $request->dateMonitoring,
                    'periodCovereda' =>  $request->periodCovereda,
                    'rating4a' =>  $request->rating4a,
                    'rating4b' =>  $request->rating4b,
                    'rating4c' =>  $request->rating4c,
                    'rating4c2' =>  $request->rating4c2,
                    'rating4d' =>  $request->rating4d,
                    'rating4e' =>  $request->rating4e,
                    'rating4f' =>  $request->rating4f,
                    'rating4g' =>  $request->rating4g,
    
                    'remarks4a' =>  $request->remarks4a,
                    'remarks4b' =>  $request->remarks4b,
                    'remarks4c' =>  $request->remarks4c,
                    'remarks4c2' =>  $request->remarks4c2,
                    'remarks4d' =>  $request->remarks4d,
                    'remarks4e' =>  $request->remarks4e,
                    'remarks4f' =>  $request->remarks4f,
                    'remarks4g' =>  $request->remarks4g, 
                    'status' =>  $request->status,
                    'user_id' =>  $request->user_id,
                ]); 
    
                MellpiproLNCManagementTracking::create([
                    'mplgubrgylncmanagement_id' => $lncbarangay->id,
                    'status' => $request->status,
                    'barangay_id' => auth()->user()->barangay,
                    'municipal_id' => auth()->user()->city_municipal,
                    'user_id' => auth()->user()->id,
                ]);

                DB::table('lgubarangayreport')->insert([
                    'mplgubrgylncmanagement_id' => $lncbarangay->id, 
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
               
                return redirect('BarangayScholar/lncmanagement')->with('success', 'Data stored successfully!');
        } 
      
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $action = "show";
        $location = new LocationController;
        $regCode = auth()->user()->Region;
        $provCode = auth()->user()->Province;
        $citymunCode = auth()->user()->city_municipal;
        $provinces = $location->getProvinces(['reg_code' => $regCode]);
        $cities_municipalities = $location->getCitiesAndMunicipalities(['prov_code' => $provCode]);
        $barangays = $location->getBarangays(['citymun_code' => $citymunCode]);
        
        $years = range(date("Y"), 1900);
        $row = DB::table('mplgubrgylncmanagement')->where('id', $request->id)->first();
        return view('BarangayScholar.LNCManagement.show', compact('row','provinces', 'cities_municipalities', 'barangays','years', 'action'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request ,string $id)
    {
        $action = "edit";
        $location = new LocationController;
        $regCode = auth()->user()->Region;
        $provCode = auth()->user()->Province;
        $citymunCode = auth()->user()->city_municipal;
        $provinces = $location->getProvinces(['reg_code' => $regCode]);
        $cities_municipalities = $location->getCitiesAndMunicipalities(['prov_code' => $provCode]);
        $barangays = $location->getBarangays(['citymun_code' => $citymunCode]);
        
        $years = range(date("Y"), 1900);
        $row = DB::table('mplgubrgylncmanagement')->where('id', $request->id)->first();
        return view('BarangayScholar.LNCManagement.edit', compact('row','provinces', 'cities_municipalities', 'barangays','years', 'action'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    { 
        if ($request->formrequest == 'draft') {
            $govbarangay = MellpiproLNCManagement::find($request->id);

            $govbarangay->update([
                'barangay_id' =>  $request->barangay_id,
                'municipal_id' =>  $request->municipal_id,
                'province_id' =>  $request->province_id,
                'region_id' =>  $request->region_id,
                'dateMonitoring' =>  $request->dateMonitoring,
                'periodCovereda' =>  $request->periodCovereda,
                'rating4a' =>  $request->rating4a,
                'rating4b' =>  $request->rating4b,
                'rating4c' =>  $request->rating4c,
                'rating4c2' =>  $request->rating4c2,
                'rating4d' =>  $request->rating4d,
                'rating4e' =>  $request->rating4e,
                'rating4f' =>  $request->rating4f,
                'rating4g' =>  $request->rating4g,

                'remarks4a' =>  $request->remarks4a,
                'remarks4b' =>  $request->remarks4b,
                'remarks4c' =>  $request->remarks4c,
                'remarks4c2' =>  $request->remarks4c2,
                'remarks4d' =>  $request->remarks4d,
                'remarks4e' =>  $request->remarks4e,
                'remarks4f' =>  $request->remarks4f,
                'remarks4g' =>  $request->remarks4g, 
                'status' =>  $request->status,
                'user_id' =>  $request->user_id,
            ]); 

            return redirect()->route('lncmanagement.index')->with('success', 'Data stored as Draft!'); 
        }else {
            $rules = [
                'barangay_id' => 'required|integer',
                'municipal_id' => 'required|integer',
                'province_id' => 'required|integer',
                'region_id' => 'required|integer',
                'dateMonitoring' => 'required|date|max:255',
                'periodCovereda' => 'required|string |max:255',
                'rating4a' => 'required|integer',
                'rating4b' => 'required|integer',
                'rating4c' => 'required|integer',
                'rating4c2' => 'required|integer',
                'rating4d' => 'required|integer',
                'rating4e' => 'required|integer',
                'rating4f' => 'required|integer',
                'rating4g' => 'required|integer',
                
                'remarks4a' => 'required|string|max:255',
                'remarks4b' => 'required|string|max:255',
                'remarks4c' => 'required|string|max:255',
                'remarks4c2' => 'required|string|max:255',
                'remarks4d' => 'required|string|max:255',
                'remarks4e' => 'required|string|max:255',
                'remarks4f' => 'required|string|max:255',
                'remarks4g' => 'required|string|max:255',
    
    
                'status' => 'required|string|max:255',
                'user_id' => 'required|integer',
        
            ]; 
    
            $validator = Validator::make($request->all() , $rules);
    
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput()->with('error', 'Something went wrong! Please try again.');
            }else {
                $govbarangay = MellpiproLNCManagement::find($request->id);

                $govbarangay->update([
                    'barangay_id' =>  $request->barangay_id,
                    'municipal_id' =>  $request->municipal_id,
                    'province_id' =>  $request->province_id,
                    'region_id' =>  $request->region_id,
                    'dateMonitoring' =>  $request->dateMonitoring,
                    'periodCovereda' =>  $request->periodCovereda,
                    'rating4a' =>  $request->rating4a,
                    'rating4b' =>  $request->rating4b,
                    'rating4c' =>  $request->rating4c,
                    'rating4c2' =>  $request->rating4c2,
                    'rating4d' =>  $request->rating4d,
                    'rating4e' =>  $request->rating4e,
                    'rating4f' =>  $request->rating4f,
                    'rating4g' =>  $request->rating4g,
    
                    'remarks4a' =>  $request->remarks4a,
                    'remarks4b' =>  $request->remarks4b,
                    'remarks4c' =>  $request->remarks4c,
                    'remarks4c2' =>  $request->remarks4c2,
                    'remarks4d' =>  $request->remarks4d,
                    'remarks4e' =>  $request->remarks4e,
                    'remarks4f' =>  $request->remarks4f,
                    'remarks4g' =>  $request->remarks4g, 
                    'status' =>  $request->status,
                    'user_id' =>  $request->user_id,
                ]); 
    
            }
            return redirect()->route('lncmanagement.index')->with('success', 'Updated successfully!');
        }
  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
         //dd($id);
         DB::table('mplgubrgylncmanagementtracking')->where('mplgubrgylncmanagement_id', $request->id)->delete();
         $lncbarangay = MellpiproLNCManagement::find($request->id); 
         $lncbarangay->delete();
         return redirect()->route('nutritionpolicies.index')->with('success', 'Deleted successfully!');
    }
}