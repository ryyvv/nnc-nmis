<?php

namespace App\Http\Controllers\BarangayScholar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\Models\MellpiproNutritionService;
use App\Models\MellpiproNutritionServiceTracking;
use App\Http\Controllers\LocationController;

class NutritionServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangay = auth()->user()->barangay;
        $nserlocation = DB::table('mplgubrgynutritionservice')->where('barangay_id', $barangay)->get();
        return view('BarangayScholar.NutritionService.index', ['nserlocation' => $nserlocation]);
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

        return view('BarangayScholar.NutritionService.create', compact('prov', 'mun', 'city', 'brgy','years'));
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
            'dateMonitoring' => 'required|date|max:255',
            'periodCovereda' => 'required|string |max:255',
            'periodCoveredb' => 'required|string|max:255',

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

            'remarks5aa' => 'required|string|max: 255',
            'remarks5ab' => 'required|string|max: 255',
            'remarks5ac' => 'required|string|max: 255',
            'remarks5b'  => 'required|string|max: 255',
            'remarks5ca' => 'required|string|max: 255',
            'remarks5cb' => 'required|string|max: 255',
            'remarks5cc' => 'required|string|max: 255',
            'remarks5cd' => 'required|string|max: 255',
            'remarks5da' => 'required|string|max: 255',
            'remarks5db' => 'required|string|max: 255',
            'remarks5ea' => 'required|string|max: 255',
            'remarks5eb' => 'required|string|max: 255',
            'remarks5ec' => 'required|string|max: 255',
            'remarks5ed' => 'required|string|max: 255',
            'remarks5ee' => 'required|string|max: 255',
            'remarks5ef' => 'required|string|max: 255',
            'remarks5fa' => 'required|string|max: 255',
            'remarks5fb' => 'required|string|max: 255',
            'remarks5fc' => 'required|string|max: 255',
            'remarks5ga' => 'required|string|max: 255',
            'remarks5ha' => 'required|string|max: 255',
            'remarks5hb' => 'required|string|max: 255',
            'remarks5ia' => 'required|string|max: 255',
            'remarks5ib' => 'required|string|max: 255',
            'remarks5ic' => 'required|string|max: 255',
            'remarks5id' => 'required|string|max: 255',
            'remarks5ie' => 'required|string|max: 255',
            'remarks5if' => 'required|string|max: 255',
            'remarks5ig' => 'required|string|max: 255',
            'remarks5ih' => 'required|string|max: 255',

            'status' => 'required|string|max:255',
            'dateCreated' => 'required|date ',
            'dateUpdates' => 'required|date ',
            'user_id' => 'required|integer',

        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        } else {

            $nserBarangay = MellpiproNutritionService::create([
                'barangay_id' =>  $request->barangay_id,
                'municipal_id' =>  $request->municipal_id,
                'province_id' =>  $request->province_id,
                'region_id' =>  $request->region_id,
                'dateMonitoring' =>  $request->dateMonitoring,
                'periodCovereda' =>  $request->periodCovereda,
                'periodCoveredb' =>  $request->periodCoveredb,

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
                'dateCreated' =>  $request->dateCreated,
                'dateUpdates' =>  $request->dateUpdates,
            ]);
            MellpiproNutritionServiceTracking::create([
                'mplgubrgynutritionservice_id' => $nserBarangay->id,
                'status' => $request->status,
                'barangay_id' => auth()->user()->barangay,
                'municipal_id' => auth()->user()->city_municipal,
                'user_id' => auth()->user()->id,
            ]);
        }
        return redirect('BarangayScholar/nutritionservice');
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
    public function edit(Request $request ,string $id)
    {
        $nserbarangay = DB::table('mplgubrgynutritionservice')->where('id', $request->id)->first();
        return view('BarangayScholar.NutritionService.edit', ['nserbarangay' => $nserbarangay ]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'barangay_id' => 'required|integer',
            'municipal_id' => 'required|integer',
            'province_id' => 'required|integer',
            'region_id' => 'required|integer',
            'dateMonitoring' => 'required|date|max:255',
            'periodCovereda' => 'required|string |max:255',
            'periodCoveredb' => 'required|string|max:255',

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

            'remarks5aa' => 'required|string|max: 255',
            'remarks5ab' => 'required|string|max: 255',
            'remarks5ac' => 'required|string|max: 255',
            'remarks5b'  => 'required|string|max: 255',
            'remarks5ca' => 'required|string|max: 255',
            'remarks5cb' => 'required|string|max: 255',
            'remarks5cc' => 'required|string|max: 255',
            'remarks5cd' => 'required|string|max: 255',
            'remarks5da' => 'required|string|max: 255',
            'remarks5db' => 'required|string|max: 255',
            'remarks5ea' => 'required|string|max: 255',
            'remarks5eb' => 'required|string|max: 255',
            'remarks5ec' => 'required|string|max: 255',
            'remarks5ed' => 'required|string|max: 255',
            'remarks5ee' => 'required|string|max: 255',
            'remarks5ef' => 'required|string|max: 255',
            'remarks5fa' => 'required|string|max: 255',
            'remarks5fb' => 'required|string|max: 255',
            'remarks5fc' => 'required|string|max: 255',
            'remarks5ga' => 'required|string|max: 255',
            'remarks5ha' => 'required|string|max: 255',
            'remarks5hb' => 'required|string|max: 255',
            'remarks5ia' => 'required|string|max: 255',
            'remarks5ib' => 'required|string|max: 255',
            'remarks5ic' => 'required|string|max: 255',
            'remarks5id' => 'required|string|max: 255',
            'remarks5ie' => 'required|string|max: 255',
            'remarks5if' => 'required|string|max: 255',
            'remarks5ig' => 'required|string|max: 255',
            'remarks5ih' => 'required|string|max: 255',

            'status' => 'required|string|max:255',
            'dateCreated' => 'required|date ',
            'dateUpdates' => 'required|date ',
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
                'periodCoveredb' =>  $request->periodCoveredb,

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
                'dateCreated' =>  $request->dateCreated,
                'dateUpdates' =>  $request->dateUpdates,
            ]);
 
        }
        return redirect()->route('nutritionservice.index')->with('success', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('mplgubrgynutritionservicetracking')->where('mplgubrgynutritionservice_id', $id)->delete();
        $lguprofile = MellpiproNutritionService::find($id); 
        $lguprofile->delete();
        return redirect()->route('nutritionservice.index')->with('success', 'Deleted successfully!');
    }
}
