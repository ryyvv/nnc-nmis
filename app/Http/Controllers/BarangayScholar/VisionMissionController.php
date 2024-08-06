<?php

namespace App\Http\Controllers\BarangayScholar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\MellpiproLGUBarangayVisionMission;
use App\Models\MellpiproLGUBarangayVisionMissionTracker;
use App\Http\Controllers\LocationController;
use Barryvdh\DomPDF\Facade\Pdf;

class VisionMissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangay = auth()->user()->barangay; 
        $vmlocations = DB::table('mplgubrgyvisionmissions')->where('user_id', auth()->user()->id)->get();
        
        return view('BarangayScholar.VisionMission.index', ['vmlocations' => $vmlocations]);
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
        
        $years = range(date('Y'), 1900);


        return view('BarangayScholar.VisionMission.create', compact('prov', 'mun', 'city', 'brgy', 'years', 'action'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $rules = [
            'barangay_id' => 'required|integer',
            'municipal_id' => 'required|integer',
            'province_id' => 'required|integer',
            'region_id' => 'required|integer',
            'dateMonitoring' => 'required|date|max:255',
            'periodCovereda' => 'required|string |max:255',
            'rating1a' => 'required|string|max:255',
            'rating1b' => 'required|string|max:255',
            'rating1c' => 'required|string|max:255',
            'remarks1a' => 'required|string|max:255',
            'remarks1b' => 'required|string|max:255',
            'remarks1c' => 'required|string|max:255', 
            'status' => 'required|string|max:255',
            'user_id' => 'required|integer',
    
        ]; 

        $message = [ 
            'required' => 'The field is required.',
            'integer' => 'The field is number.',
            'string' => 'The field must be a string.',
            'date' => 'The field must be a valid date.',
            'max' => 'The field may not be greater than :max characters.',
        ]; 

        $validator = Validator::make($request->all() , $rules, $message );

        if($validator->fails()){
            return redirect()->back()
            ->withErrors($validator)
            ->withInput()->with('error', 'Something went wrong! Please try again.');
        }else {

            $vmBarangay = MellpiproLGUBarangayVisionMission::create([
                'barangay_id' =>  $request->barangay_id,
                'municipal_id' =>  $request->municipal_id,
                'province_id' =>  $request->province_id,
                'region_id' =>  $request->region_id,
                'dateMonitoring' =>  $request->dateMonitoring,
                'periodCovereda' =>  $request->periodCovereda,
                'rating1a' =>  $request->rating1a,
                'rating1b' =>  $request->rating1b,
                'rating1c' =>  $request->rating1c,
                'remarks1a' =>  $request->remarks1a,
                'remarks1b' =>  $request->remarks1b,
                'remarks1c' =>  $request->remarks1c,
                'status' =>  $request->status,
                'user_id' =>  $request->user_id,
            ]);

            MellpiproLGUBarangayVisionMissionTracker::create([
                'mplgubrgyvisionmissions_id' => $vmBarangay->id,
                'status' => $request->status,
                'barangay_id' => auth()->user()->barangay,
                'municipal_id' => auth()->user()->city_municipal,
                'user_id' => auth()->user()->id,
            ]);
        }

        return redirect('BarangayScholar/visionmission')->with('success', 'Data created successfullySuccessfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
       
        $action = 'edit';
        $location = new LocationController;
        $prov = $location->getLocationDataProvince(auth()->user()->Region);
        $mun = $location->getLocationDataMuni(auth()->user()->Province);
        $city = $location->getLocationDataCity(auth()->user()->Region);
        $brgy = $location->getLocationDataBrgy(auth()->user()->city_municipal);
        
        $years = range(date('Y'), 1900);


        $row = DB::table('mplgubrgyvisionmissions')->where('id', $request->id)->first();
        return view('BarangayScholar.VisionMission.show', compact('prov', 'mun', 'city', 'brgy', 'years', 'action', 'row'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $action = 'edit';
        $location = new LocationController;
        $prov = $location->getLocationDataProvince(auth()->user()->Region);
        $mun = $location->getLocationDataMuni(auth()->user()->Province);
        $city = $location->getLocationDataCity(auth()->user()->Region);
        $brgy = $location->getLocationDataBrgy(auth()->user()->city_municipal);
        
        $years = range(date('Y'), 1900);


        $row = DB::table('mplgubrgyvisionmissions')->where('id', $request->id)->first();
        return view('BarangayScholar.VisionMission.edit', compact('prov', 'mun', 'city', 'brgy', 'years', 'action', 'row'));
 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         //dd($request);
         $rules = [
            'barangay_id' => 'required|integer',
            'municipal_id' => 'required|integer',
            'province_id' => 'required|integer',
            'region_id' => 'required|integer',
            'dateMonitoring' => 'required|date|max:255',
            'periodCovereda' => 'required|string |max:255',
            'rating1a' => 'required|string|max:255',
            'rating1b' => 'required|string|max:255',
            'rating1c' => 'required|string|max:255',
            'remarks1a' => 'required|string|max:255',
            'remarks1b' => 'required|string|max:255',
            'remarks1c' => 'required|string|max:255', 
            'status' => 'required|string|max:255',
            'user_id' => 'required|integer',
    
        ]; 

        $message = [ 
            'required' => 'The field is required.',
            'integer' => 'The field is number.',
            'string' => 'The field must be a string.',
            'date' => 'The field must be a valid date.',
            'max' => 'The field may not be greater than :max characters.',
        ]; 


        $validator = Validator::make($request->all() , $rules, $message);

        if($validator->fails()){
            return redirect()->back()
            ->withErrors($validator)
            ->withInput()->with('error', 'Something went wrong! Please try again.');
        }else {
            $vmbarangay = MellpiproLGUBarangayVisionMission::find($id);
            
            //dd($vmbarangay);
            $vmbarangay->update([
                'barangay_id' =>  $request->barangay_id,
                'municipal_id' =>  $request->municipal_id,
                'province_id' =>  $request->province_id,
                'region_id' =>  $request->region_id,
                'dateMonitoring' =>  $request->dateMonitoring,
                'periodCovereda' =>  $request->periodCovereda,
                'rating1a' =>  $request->rating1a,
                'rating1b' =>  $request->rating1b,
                'rating1c' =>  $request->rating1c,
                'remarks1a' =>  $request->remarks1a,
                'remarks1b' =>  $request->remarks1b,
                'remarks1c' =>  $request->remarks1c,
                'status' =>  $request->status,
                // 'user_id' =>  $request->user_id,
            ]); 
        }

        return redirect()->route('visionmission.index')->with('success', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {   
        //dd($id);
        DB::table('mplgubrgyvisionmissionstracking')->where('mplgubrgyvisionmissions_id', $request->id)->delete();
        $lguprofile = MellpiproLGUBarangayVisionMission::find($request->id); 
        $lguprofile->delete();
        return redirect()->route('visionmission.index')->with('success', 'Data Deleted successfully!'); 
    }

    public function downloads(Request $request ) { 
        
        $htmlContent = $request->input('htmlContent');
        //dd($htmlContent);
        // Generate PDF from HTML content
        $htmlheader = '<html><body>';
            
        $htmlfooter = '</body></html>';
        $concat = $htmlheader . $htmlContent . $htmlfooter;
    
        $pdf = Pdf::loadHTML($concat);
        $pdfContent = $pdf->output();
        return response($pdfContent, 200)
        ->header('Content-Type', 'application/pdf')
        ->header('Content-Disposition', 'attachment; filename="document.pdf"');
    }
}
