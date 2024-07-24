<?php

namespace App\Http\Controllers\BarangayScholar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\MellpiproBarangayDiscussionQuestion;
use App\Models\MellpiproBarangayDiscussionQuestionTracking;
use App\Http\Controllers\LocationController;

class DiscussionQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangay = auth()->user()->barangay;
        $dqlocation = DB::table('mplgubrgydiscussionquestion')->where('barangay_id', $barangay)->get();
        return view('BarangayScholar.DiscussionQuestion.index', ['dqlocation' => $dqlocation]);
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

        return view('BarangayScholar.DiscussionQuestion.create', compact('prov', 'mun', 'city', 'brgy','years'));
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
                'periodCovered' => 'required|numeric', 

                'practice7aa' => 'required|string| max:255',
                'practice7ab' => 'required|string| max:255',
                'practice7ac' => 'required|string| max:255',
                'practice7ad' => 'required|string| max:255',
                
                'practice7ba' => 'required|string| max:255',
                'practice7bb' => 'required|string| max:255',
                'practice7bc' => 'required|string| max:255',
                'practice7bd' => 'required|string| max:255',
                
                'practice7ca' => 'required|string| max:255',
                'practice7cb' => 'required|string| max:255',
                'practice7cc' => 'required|string| max:255',
                'practice7cd' => 'required|string| max:255', 
        
                'practice7da' => 'required|string| max:255',
                'practice7db' => 'required|string| max:255',
                'practice7dc' => 'required|string| max:255',
                'practice7dd' => 'required|string| max:255', 
        
                'practice7ea' => 'required|string| max:255',
                'practice7eb' => 'required|string| max:255',
                'practice7ec' => 'required|string| max:255',
                'practice7ed' => 'required|string| max:255', 
        
                'practice7fa' => 'required|string| max:255',
                'practice7fb' => 'required|string| max:255',
                'practice7fc' => 'required|string| max:255',
                'practice7fd' => 'required|string| max:255', 
    
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
    
                $DQBarangay = MellpiproBarangayDiscussionQuestion::create([
                    'barangay_id' =>  $request->barangay_id,
                    'municipal_id' =>  $request->municipal_id,
                    'province_id' =>  $request->province_id,
                    'region_id' =>  $request->region_id,
                    'dateMonitoring' =>  $request->dateMonitoring,
                    'periodCovered' =>  $request->periodCovered, 
    
                    'practice7aa' => $request->practice7aa,
                    'practice7ab' => $request->practice7ab,
                    'practice7ac' => $request->practice7ac,
                    'practice7ad' => $request->practice7ad,
                    'practice7ba' => $request->practice7ba,
                    'practice7bb' => $request->practice7bb,
                    'practice7bc' => $request->practice7bc,
                    'practice7bd' => $request->practice7bd,
                    'practice7ca' => $request->practice7ca,
                    'practice7cb' => $request->practice7cb,
                    'practice7cc' => $request->practice7cc,
                    'practice7cd' => $request->practice7cd,
                    'practice7da' => $request->practice7da,
                    'practice7db' => $request->practice7db,
                    'practice7dc' => $request->practice7dc,
                    'practice7dd' => $request->practice7dd,
                    'practice7ea' => $request->practice7ea,
                    'practice7eb' => $request->practice7eb,
                    'practice7ec' => $request->practice7ec,
                    'practice7ed' => $request->practice7ed,
                    'practice7fa' => $request->practice7fa,
                    'practice7fb' => $request->practice7fb,
                    'practice7fc' => $request->practice7fc,
                    'practice7fd' => $request->practice7fd,
                     
    
                    'status' =>  $request->status,
                    'user_id' =>  $request->user_id,
                    'dateCreated' =>  $request->dateCreated,
                    'dateUpdates' =>  $request->dateUpdates,
                ]);
                MellpiproBarangayDiscussionQuestionTracking::create([
                    'mplgubrgydiscussionquestion_id' => $DQBarangay->id,
                    'status' => $request->status,
                    'barangay_id' => auth()->user()->barangay,
                    'municipal_id' => auth()->user()->city_municipal,
                    'user_id' => auth()->user()->id,
                ]);
            }
            return redirect('BarangayScholar/discussionquestion');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id ) {  
        $action = 'create'; 
        $location = new LocationController;
        $prov = $location->getLocationDataProvince(auth()->user()->Region);
        $mun = $location->getLocationDataMuni(auth()->user()->Province);
        $city = $location->getLocationDataCity(auth()->user()->Region);
        $brgy = $location->getLocationDataBrgy(auth()->user()->city_municipal);

        $years = range(date("Y"), 1900); 

        //dd($request->id);
        $dqlocation = DB::table('lguprofilebarangay')->where('id', $id)->first();
        //dd($lguProfile);

 
        return view('BarangayScholar.DiscussionQuestion.show',compact('dqlocation','prov', 'mun', 'city', 'brgy', 'years', 'action'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        $dqlocation = DB::table('mplgubrgydiscussionquestion')->where('id', $request->id)->first();
        return view('BarangayScholar.DiscussionQuestion.edit', ['dqlocation' => $dqlocation ])->with('success', 'Created successfully!');
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
            'dateMonitoring' => 'required|date|max:255',
            'periodCovered' => 'required|numeric', 

            'practice7aa' => 'required|string| max:255',
            'practice7ab' => 'required|string| max:255',
            'practice7ac' => 'required|string| max:255',
            'practice7ad' => 'required|string| max:255',
            
            'practice7ba' => 'required|string| max:255',
            'practice7bb' => 'required|string| max:255',
            'practice7bc' => 'required|string| max:255',
            'practice7bd' => 'required|string| max:255',
            
            'practice7ca' => 'required|string| max:255',
            'practice7cb' => 'required|string| max:255',
            'practice7cc' => 'required|string| max:255',
            'practice7cd' => 'required|string| max:255', 
    
            'practice7da' => 'required|string| max:255',
            'practice7db' => 'required|string| max:255',
            'practice7dc' => 'required|string| max:255',
            'practice7dd' => 'required|string| max:255', 
    
            'practice7ea' => 'required|string| max:255',
            'practice7eb' => 'required|string| max:255',
            'practice7ec' => 'required|string| max:255',
            'practice7ed' => 'required|string| max:255', 
    
            'practice7fa' => 'required|string| max:255',
            'practice7fb' => 'required|string| max:255',
            'practice7fc' => 'required|string| max:255',
            'practice7fd' => 'required|string| max:255', 

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
            $DQBarangay = MellpiproBarangayDiscussionQuestion::find($request->id);

            $DQBarangay->update([
                'barangay_id' =>  $request->barangay_id,
                'municipal_id' =>  $request->municipal_id,
                'province_id' =>  $request->province_id,
                'region_id' =>  $request->region_id,
                'dateMonitoring' =>  $request->dateMonitoring,
                'periodCovered' =>  $request->periodCovered, 
                
                'practice7aa' => $request->practice7aa,
                'practice7ab' => $request->practice7ab,
                'practice7ac' => $request->practice7ac,
                'practice7ad' => $request->practice7ad,
                'practice7ba' => $request->practice7ba,
                'practice7bb' => $request->practice7bb,
                'practice7bc' => $request->practice7bc,
                'practice7bd' => $request->practice7bd,
                'practice7ca' => $request->practice7ca,
                'practice7cb' => $request->practice7cb,
                'practice7cc' => $request->practice7cc,
                'practice7cd' => $request->practice7cd,
                'practice7da' => $request->practice7da,
                'practice7db' => $request->practice7db,
                'practice7dc' => $request->practice7dc,
                'practice7dd' => $request->practice7dd,
                'practice7ea' => $request->practice7ea,
                'practice7eb' => $request->practice7eb,
                'practice7ec' => $request->practice7ec,
                'practice7ed' => $request->practice7ed,
                'practice7fa' => $request->practice7fa,
                'practice7fb' => $request->practice7fb,
                'practice7fc' => $request->practice7fc,
                'practice7fd' => $request->practice7fd,
                 

                'status' =>  $request->status,
                'user_id' =>  $request->user_id,
                'dateCreated' =>  $request->dateCreated,
                'dateUpdates' =>  $request->dateUpdates,
            ]);
 
        }
        return redirect('BarangayScholar/discussionquestion');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('mplgubrgydiscussionquestiontracking')->where('mplgubrgydiscussionquestion_id', $id)->delete();
        $discussion = MellpiproBarangayDiscussionQuestion::find($id); 
        $discussion->delete();
        return redirect()->route('discussionquestion.index')->with('success', 'Deleted successfully!');
    }
}
