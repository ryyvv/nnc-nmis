<?php

namespace App\Http\Controllers\BarangayScholar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\MellpiprobarangayNationalpolicies;
use App\Models\mpbrgynationalPoliciestracking;
use App\Http\Controllers\LocationController;

class NutritionPoliciesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangay = auth()->user()->barangay; 
        $nplocation = DB::table('mellpiprobarangaynationalpolicies')->where('barangay_id', $barangay)->get();

        return view('BarangayScholar.NutritionPolicies.index', ['nplocation' => $nplocation]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $location = new LocationController;
        $prov = $location->getLocationDataProvince(auth()->user()->Region);
        $mun = $location->getLocationDataMuni(auth()->user()->Province);
        $city = $location->getLocationDataCity(auth()->user()->Region);
        $brgy = $location->getLocationDataBrgy(auth()->user()->city_municipal);
        
        $years = range(date("Y"), 1900);
        return view('BarangayScholar.NutritionPolicies.create', compact('prov', 'mun', 'city', 'brgy','years'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        $rules = [
            'barangay_id' => 'required|integer',
            'municipal_id' => 'required|integer',
            'province_id' => 'required|integer',
            'region_id' => 'required|integer',
            'dateMonitoring' => 'required|date',
            'periodCovereda' => 'required|string ',
            'periodCoveredb' => 'required|string',
            'rating2a' => 'required|integer',
            'rating2b' => 'required|integer',
            'rating2c' => 'required|integer',
            'rating2d' => 'required|integer',
            'rating2e' => 'required|integer',
            'rating2f' => 'required|integer',
            'rating2g' => 'required|integer',
            'rating2h' => 'required|integer',
            'rating2i' => 'required|integer',
            'rating2j' => 'required|integer',
            'rating2k' => 'required|integer',
            'rating2l' => 'required|integer',
            'remarks2a' => 'required|string|max:255',
            'remarks2b' => 'required|string|max:255',
            'remarks2c' => 'required|string|max:255',
            'remarks2d' => 'required|string|max:255', 
            'remarks2e' => 'required|string|max:255', 
            'remarks2f' => 'required|string|max:255', 
            'remarks2g' => 'required|string|max:255', 
            'remarks2h' => 'required|string|max:255', 
            'remarks2i' => 'required|string|max:255', 
            'remarks2j' => 'required|string|max:255', 
            'remarks2k' => 'required|string|max:255', 
            'remarks2l' => 'required|string|max:255', 
            'status' => 'required|string|max:255',
            'dateCreated' => 'required|date ',
            'dateUpdates' => 'required|date ',
            'user_id' => 'required|integer',
    
        ]; 

        $validator = Validator::make($request->all() , $rules);

        if($validator->fails()){
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $npbarangay = MellpiprobarangayNationalpolicies::create([
            'barangay_id' =>  $request->barangay_id,
            'municipal_id' =>  $request->municipal_id,
            'province_id' =>  $request->province_id,
            'region_id' =>  $request->region_id,
            'dateMonitoring' =>  $request->dateMonitoring,
            'periodCovereda' =>  $request->periodCovereda,
            'periodCoveredb' =>  $request->periodCoveredb,
            'rating2a' =>  $request->rating2a,
            'rating2b' =>  $request->rating2b,
            'rating2c' =>  $request->rating2c,
            'rating2d' =>  $request->rating2d,
            'rating2e' =>  $request->rating2e,
            'rating2f' =>  $request->rating2f,
            'rating2g' =>  $request->rating2g,
            'rating2h' =>  $request->rating2h,
            'rating2i' =>  $request->rating2i,
            'rating2j' =>  $request->rating2j,
            'rating2k' =>  $request->rating2k,
            'rating2l' =>  $request->rating2l,
            'remarks2a' =>  $request->remarks2a,
            'remarks2b' =>  $request->remarks2b,
            'remarks2c' =>  $request->remarks2c,
            'remarks2d' =>  $request->remarks2d,
            'remarks2e' =>  $request->remarks2e,
            'remarks2f' =>  $request->remarks2f,
            'remarks2g' =>  $request->remarks2g,
            'remarks2h' =>  $request->remarks2h,
            'remarks2i' =>  $request->remarks2i,
            'remarks2j' =>  $request->remarks2j,
            'remarks2k' =>  $request->remarks2k,
            'remarks2l' =>  $request->remarks2l,
            'status' =>  $request->status,
            'user_id' =>  $request->user_id,
            'dateCreated' =>  $request->dateCreated,
            'dateUpdates' =>  $request->dateUpdates,
        ]); 

        mpbrgynationalPoliciestracking::create([
            'mellpiprobarangaynationalpolicies_id' => $npbarangay->id,
            'status' => $request->status,
            'barangay_id' => auth()->user()->barangay,
            'municipal_id' => auth()->user()->city_municipal,
            'user_id' => auth()->user()->id,
        ]);

        return redirect('BarangayScholar/nutritionpolicies');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $npbarangay = DB::table('mellpiprobarangaynationalpolicies')->where('id', $request->id)->first();
        return view('BarangayScholar.NutritionPolicies.edit', ['npbarangay' => $npbarangay ])->with('success', 'Created successfully!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          //dd($request);
          $rules = [
            'barangay_id' => 'required|integer',
            'municipal_id' => 'required|integer',
            'province_id' => 'required|integer',
            'region_id' => 'required|integer',
            'dateMonitoring' => 'required|date',
            'periodCovereda' => 'required|string ',
            'periodCoveredb' => 'required|string',
            'rating2a' => 'required|integer',
            'rating2b' => 'required|integer',
            'rating2c' => 'required|integer',
            'rating2d' => 'required|integer',
            'rating2e' => 'required|integer',
            'rating2f' => 'required|integer',
            'rating2g' => 'required|integer',
            'rating2h' => 'required|integer',
            'rating2i' => 'required|integer',
            'rating2j' => 'required|integer',
            'rating2k' => 'required|integer',
            'rating2l' => 'required|integer',
            'remarks2a' => 'required|string|max:255',
            'remarks2b' => 'required|string|max:255',
            'remarks2c' => 'required|string|max:255',
            'remarks2d' => 'required|string|max:255', 
            'remarks2e' => 'required|string|max:255', 
            'remarks2f' => 'required|string|max:255', 
            'remarks2g' => 'required|string|max:255', 
            'remarks2h' => 'required|string|max:255', 
            'remarks2i' => 'required|string|max:255', 
            'remarks2j' => 'required|string|max:255', 
            'remarks2k' => 'required|string|max:255', 
            'remarks2l' => 'required|string|max:255', 
            'status' => 'required|string|max:255',
            'dateCreated' => 'required|date ',
            'dateUpdates' => 'required|date ',
            'user_id' => 'required|integer',
    
        ]; 

        $validator = Validator::make($request->all() , $rules);

        if($validator->fails()){
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }else  {
            $npbarangay =  MellpiprobarangayNationalpolicies::find($request->id);

            $npbarangay->update([
                'barangay_id' =>  $request->barangay_id,
                'municipal_id' =>  $request->municipal_id,
                'province_id' =>  $request->province_id,
                'region_id' =>  $request->region_id,
                'dateMonitoring' =>  $request->dateMonitoring,
                'periodCovereda' =>  $request->periodCovereda,
                'periodCoveredb' =>  $request->periodCoveredb,
                'rating2a' =>  $request->rating2a,
                'rating2b' =>  $request->rating2b,
                'rating2c' =>  $request->rating2c,
                'rating2d' =>  $request->rating2d,
                'rating2e' =>  $request->rating2e,
                'rating2f' =>  $request->rating2f,
                'rating2g' =>  $request->rating2g,
                'rating2h' =>  $request->rating2h,
                'rating2i' =>  $request->rating2i,
                'rating2j' =>  $request->rating2j,
                'rating2k' =>  $request->rating2k,
                'rating2l' =>  $request->rating2l,
                'remarks2a' =>  $request->remarks2a,
                'remarks2b' =>  $request->remarks2b,
                'remarks2c' =>  $request->remarks2c,
                'remarks2d' =>  $request->remarks2d,
                'remarks2e' =>  $request->remarks2e,
                'remarks2f' =>  $request->remarks2f,
                'remarks2g' =>  $request->remarks2g,
                'remarks2h' =>  $request->remarks2h,
                'remarks2i' =>  $request->remarks2i,
                'remarks2j' =>  $request->remarks2j,
                'remarks2k' =>  $request->remarks2k,
                'remarks2l' =>  $request->remarks2l,
                'status' =>  $request->status,
                'user_id' =>  $request->user_id,
                'dateCreated' =>  $request->dateCreated,
                'dateUpdates' =>  $request->dateUpdates,
            ]); 
        }

        return redirect()->route('nutritionpolicies.index')->with('success', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         //dd($id);
         DB::table('mpbrgynationalPoliciestracking')->where('mellpiprobarangaynationalpolicies_id', $id)->delete();
         $npbarangay = MellpiprobarangayNationalpolicies::find($id); 
         $npbarangay->delete();
         return redirect()->route('nutritionpolicies.index')->with('success', 'Deleted successfully!');
    }
}
