<?php

namespace App\Http\Controllers\BarangayScholar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\MellpiprobarangayGovernance;
use App\Models\MellpiprobarangayGovernanceTracker;


class GovernanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd('request');
        $barangay = auth()->user()->barangay; 
        $govlocation = DB::table('mplgubrgygovernance')->where('barangay_id', $barangay)->get();
        return view('BarangayScholar.Governance.index', ['govlocation' => $govlocation]);
        //return view('BarangayScholar.Governance.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

   
        return view('BarangayScholar.Governance.create');
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
            'rating3a' => 'required|integer',
            'rating3b' => 'required|integer',
            'rating3c' => 'required|integer',
            'remarks3a' => 'required|string|max:255',
            'remarks3b' => 'required|string|max:255',
            'remarks3c' => 'required|string|max:255', 
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
            

            $govbarangay = MellpiprobarangayGovernance::create([
                'barangay_id' =>  $request->barangay_id,
                'municipal_id' =>  $request->municipal_id,
                'province_id' =>  $request->province_id,
                'region_id' =>  $request->region_id,
                'dateMonitoring' =>  $request->dateMonitoring,
                'periodCovereda' =>  $request->periodCovereda,
                'periodCoveredb' =>  $request->periodCoveredb,
                'rating3a' =>  $request->rating3a,
                'rating3b' =>  $request->rating3b,
                'rating3c' =>  $request->rating3c, 
                'remarks3a' =>  $request->remarks3a,
                'remarks3b' =>  $request->remarks3b,
                'remarks3c' =>  $request->remarks3c, 
                'status' =>  $request->status,
                'user_id' =>  $request->user_id,
                'dateCreated' =>  $request->dateCreated,
                'dateUpdates' =>  $request->dateUpdates,
            ]); 

            MellpiprobarangayGovernanceTracker::create([
                'mplgubrgygovernance_id' => $govbarangay->id,
                'status' => $request->status,
                'barangay_id' => auth()->user()->barangay,
                'municipal_id' => auth()->user()->city_municipal,
                'user_id' => auth()->user()->id,
            ]);
            

        return redirect('BarangayScholar/governance');
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
        $govbarangay = DB::table('mplgubrgygovernance')->where('id', $request->id)->first();
        return view('BarangayScholar.Governance.edit', ['govbarangay' => $govbarangay ])->with('success', 'Created successfully!');
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
            'rating3a' => 'required|integer',
            'rating3b' => 'required|integer',
            'rating3c' => 'required|integer',
            'remarks3a' => 'required|string|max:255',
            'remarks3b' => 'required|string|max:255',
            'remarks3c' => 'required|string|max:255', 
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
            $npbarangay =  MellpiprobarangayGovernance::find($request->id);

            $npbarangay->update([
                'barangay_id' =>  $request->barangay_id,
                'municipal_id' =>  $request->municipal_id,
                'province_id' =>  $request->province_id,
                'region_id' =>  $request->region_id,
                'dateMonitoring' =>  $request->dateMonitoring,
                'periodCovereda' =>  $request->periodCovereda,
                'periodCoveredb' =>  $request->periodCoveredb,
                'rating3a' =>  $request->rating3a,
                'rating3b' =>  $request->rating3b,
                'rating3c' =>  $request->rating3c, 
                'remarks3a' =>  $request->remarks3a,
                'remarks3b' =>  $request->remarks3b,
                'remarks3c' =>  $request->remarks3c, 
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
         DB::table('mplgubrgygovernancetracking')->where('mplgubrgygovernance_id', $id)->delete();
         $govbarangay = MellpiprobarangayGovernance::find($id); 
         $govbarangay->delete();
         return redirect()->route('nutritionpolicies.index')->with('success', 'Deleted successfully!');
    }
}
