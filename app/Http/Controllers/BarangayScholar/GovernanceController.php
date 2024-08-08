<?php

namespace App\Http\Controllers\BarangayScholar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\MellpiprobarangayGovernance;
use App\Models\MellpiprobarangayGovernanceTracker;
use App\Models\Province;
use App\Models\Barangay;
use App\Models\Municipal;
use App\Models\City;
use App\Http\Controllers\LocationController;


class GovernanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
       
        $location = new LocationController;
        $prov = $location->getLocationDataProvince(auth()->user()->Region);
        $mun = $location->getLocationDataMuni(auth()->user()->Province);
        $city = $location->getLocationDataCity(auth()->user()->Region);
        $brgy = $location->getLocationDataBrgy(auth()->user()->city_municipal);

        $barangay = auth()->user()->barangay;

        $govlocation = DB::table('users')
        ->join('mplgubrgygovernance', 'users.id', '=', 'mplgubrgygovernance.user_id')
        ->where('user_id', auth()->user()->id)->orderBy('id', 'DESC')
        ->select('users.Firstname as firstname', 'users.Middlename as middlename', 'users.Lastname as lastname', 'mplgubrgygovernance.*')
        ->get();


        return view('BarangayScholar.Governance.index', compact('govlocation', 'prov', 'mun', 'city', 'brgy'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $action = 'create';
        $location = new LocationController;
        $prov = $location->getLocationDataProvince(auth()->user()->Region);
        $mun = $location->getLocationDataMuni(auth()->user()->Province);
        $city = $location->getLocationDataCity(auth()->user()->Region);
        $brgy = $location->getLocationDataBrgy(auth()->user()->city_municipal);
        
        $years = range(date("Y"), 1900);

   
        return view('BarangayScholar.Governance.create', compact('prov', 'mun', 'city', 'brgy','years', 'action'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     
        if ($request->formrequest == 'draft') { 
             $govbarangay = MellpiprobarangayGovernance::create([
                'barangay_id' =>  $request->barangay_id,
                'municipal_id' =>  $request->municipal_id,
                'province_id' =>  $request->province_id,
                'region_id' =>  $request->region_id,
                'dateMonitoring' =>  $request->dateMonitoring,
                'periodCovereda' =>  $request->periodCovereda,
                'rating3a' =>  $request->rating3a,
                'rating3b' =>  $request->rating3b,
                'rating3c' =>  $request->rating3c, 
                'remarks3a' =>  $request->remarks3a,
                'remarks3b' =>  $request->remarks3b,
                'remarks3c' =>  $request->remarks3c, 
                'status' =>  $request->status,
                'user_id' =>  $request->user_id,
            ]); 

            MellpiprobarangayGovernanceTracker::create([
                'mplgubrgygovernance_id' => $govbarangay->id,
                'status' => $request->status,
                'barangay_id' => auth()->user()->barangay,
                'municipal_id' => auth()->user()->city_municipal,
                'user_id' => auth()->user()->id,
            ]);

            return redirect('BarangayScholar/governance')->with('success', 'Data stored as Draft!'); 

        }else {
            $rules = [
                'barangay_id' => 'required|integer',
                'municipal_id' => 'required|integer',
                'province_id' => 'required|integer',
                'region_id' => 'required|integer',
                'dateMonitoring' => 'required|date',
                'periodCovereda' => 'required|string ',
                'rating3a' => 'required|integer',
                'rating3b' => 'required|integer',
                'rating3c' => 'required|integer',
                'remarks3a' => 'required|string|max:255',
                'remarks3b' => 'required|string|max:255',
                'remarks3c' => 'required|string|max:255', 
                'status' => 'required|string|max:255',
                'user_id' => 'required|integer',
        
            ]; 
    
            $validator = Validator::make($request->all() , $rules);
    
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput()->with('error', 'Something went wrong! Please try again.');
            }
                
    
                $govbarangay = MellpiprobarangayGovernance::create([
                   
                    'dateMonitoring' =>  $request->dateMonitoring,
                    'periodCovereda' =>  $request->periodCovereda,
                    'rating3a' =>  $request->rating3a,
                    'rating3b' =>  $request->rating3b,
                    'rating3c' =>  $request->rating3c, 
                    'remarks3a' =>  $request->remarks3a,
                    'remarks3b' =>  $request->remarks3b,
                    'remarks3c' =>  $request->remarks3c, 

                    'status' =>  $request->status,
                    'barangay_id' =>  $request->barangay_id,
                    'municipal_id' =>  $request->municipal_id,
                    'province_id' =>  $request->province_id,
                    'region_id' =>  $request->region_id,
                    'user_id' =>  $request->user_id,
                ]); 
    
                MellpiprobarangayGovernanceTracker::create([
                    'mplgubrgygovernance_id' => $govbarangay->id,
                    'status' => $request->status,
                    'barangay_id' => auth()->user()->barangay,
                    'municipal_id' => auth()->user()->city_municipal,
                    'user_id' => auth()->user()->id,
                ]);
                
    
            return redirect('BarangayScholar/governance')->with('success', 'Data stored successfully!');
        }

     
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request ,string $id)
    {
        $action = 'edit';
        $location = new LocationController;
        $prov = $location->getLocationDataProvince(auth()->user()->Region);
        $mun = $location->getLocationDataMuni(auth()->user()->Province);
        $city = $location->getLocationDataCity(auth()->user()->Region);
        $brgy = $location->getLocationDataBrgy(auth()->user()->city_municipal);
        
        $years = range(date("Y"), 1900);

        $row = DB::table('mplgubrgygovernance')->where('id', $request->id)->first();
        return view('BarangayScholar.Governance.show',compact('row','prov', 'mun', 'city', 'brgy','years', 'action'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request ,string $id)
    {
        $action = 'edit';
        $location = new LocationController;
        $prov = $location->getLocationDataProvince(auth()->user()->Region);
        $mun = $location->getLocationDataMuni(auth()->user()->Province);
        $city = $location->getLocationDataCity(auth()->user()->Region);
        $brgy = $location->getLocationDataBrgy(auth()->user()->city_municipal);
        
        $years = range(date("Y"), 1900);

        $row = DB::table('mplgubrgygovernance')->where('id', $request->id)->first();
        return view('BarangayScholar.Governance.edit',compact('row','prov', 'mun', 'city', 'brgy','years', 'action'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->formrequest == 'draft') { 

            $npbarangay =  MellpiprobarangayGovernance::find($request->id);
    
                $npbarangay->update([
                    'barangay_id' =>  $request->barangay_id,
                    'municipal_id' =>  $request->municipal_id,
                    'province_id' =>  $request->province_id,
                    'region_id' =>  $request->region_id,
                    'dateMonitoring' =>  $request->dateMonitoring,
                    'periodCovereda' =>  $request->periodCovereda,
                    'rating3a' =>  $request->rating3a,
                    'rating3b' =>  $request->rating3b,
                    'rating3c' =>  $request->rating3c, 
                    'remarks3a' =>  $request->remarks3a,
                    'remarks3b' =>  $request->remarks3b,
                    'remarks3c' =>  $request->remarks3c, 
                    'status' =>  $request->status,
                    'user_id' =>  $request->user_id,
                ]); 

            return redirect()->route('governance.index')->with('success', 'Data stored as Draft!'); 
        }else {
            $rules = [
                'barangay_id' => 'required|integer',
                'municipal_id' => 'required|integer',
                'province_id' => 'required|integer',
                'region_id' => 'required|integer',
                'dateMonitoring' => 'required|date',
                'periodCovereda' => 'required|string ',
                'rating3a' => 'required|integer',
                'rating3b' => 'required|integer',
                'rating3c' => 'required|integer',
                'remarks3a' => 'required|string|max:255',
                'remarks3b' => 'required|string|max:255',
                'remarks3c' => 'required|string|max:255', 
                'status' => 'required|string|max:255',
                'user_id' => 'required|integer',
        
            ]; 
    
            $validator = Validator::make($request->all() , $rules);
    
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput()->with('error', 'Something went wrong! Please try again.');
            }else  {
                $npbarangay =  MellpiprobarangayGovernance::find($request->id);
    
                $npbarangay->update([
                    'barangay_id' =>  $request->barangay_id,
                    'municipal_id' =>  $request->municipal_id,
                    'province_id' =>  $request->province_id,
                    'region_id' =>  $request->region_id,
                    'dateMonitoring' =>  $request->dateMonitoring,
                    'periodCovereda' =>  $request->periodCovereda,
                    'rating3a' =>  $request->rating3a,
                    'rating3b' =>  $request->rating3b,
                    'rating3c' =>  $request->rating3c, 
                    'remarks3a' =>  $request->remarks3a,
                    'remarks3b' =>  $request->remarks3b,
                    'remarks3c' =>  $request->remarks3c, 
                    'status' =>  $request->status,
                    'user_id' =>  $request->user_id,
                ]); 
    
            }
    
            return redirect()->route('governance.index')->with('success', 'Updated successfully!');
        }
     
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
         //dd($id);
         DB::table('mplgubrgygovernancetracking')->where('mplgubrgygovernance_id', $request->id)->delete();
         $govbarangay = MellpiprobarangayGovernance::find($request->id); 
         $govbarangay->delete();
         return redirect()->route('nutritionpolicies.index')->with('success', 'Deleted successfully!');
    }
}
