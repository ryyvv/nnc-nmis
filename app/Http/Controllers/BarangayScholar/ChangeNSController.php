<?php

namespace App\Http\Controllers\BarangayScholar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\Models\MellpiproChangeNS;
use App\Models\MellpiproChangeNSTracking;
use App\Models\Province;
use App\Models\Barangay;
use App\Models\Municipal;
use App\Models\City;
use App\Http\Controllers\LocationController;
use Barryvdh\DomPDF\Facade\Pdf;

class ChangeNSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangay = auth()->user()->barangay;
        $cnlocation = DB::table('mplgubrgychangeNS')->where('barangay_id', $barangay)->get();
        return view('BarangayScholar.ChangeinNS.index', ['cnlocation' => $cnlocation]);
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
        return view('BarangayScholar.ChangeinNS.create', compact('prov', 'mun', 'city', 'brgy','years','action'));
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

            'rating6a' => 'required|integer',
            'rating6b' => 'required|integer',
            'rating6c' => 'required|integer',
            'rating6d' => 'required|integer',
            'rating6e' => 'required|integer',
            'rating6f' => 'required|integer',
            'rating6g' => 'required|integer',
            'rating6h' => 'required|integer', 
            
            'remarks6a' => 'required|string|max: 255',
            'remarks6b' => 'required|string|max: 255',
            'remarks6c' => 'required|string|max: 255',
            'remarks6d' => 'required|string|max: 255',
            'remarks6e' => 'required|string|max: 255',
            'remarks6f' => 'required|string|max: 255',
            'remarks6g' => 'required|string|max: 255',
            'remarks6h' => 'required|string|max: 255', 

            'status' => 'required|string|max:255',
            'user_id' => 'required|integer',

        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        } else {

            $changeNSBarangay = MellpiproChangeNS::create([
                'barangay_id' =>  $request->barangay_id,
                'municipal_id' =>  $request->municipal_id,
                'province_id' =>  $request->province_id,
                'region_id' =>  $request->region_id,
                'dateMonitoring' =>  $request->dateMonitoring,
                'periodCovereda' =>  $request->periodCovereda,

                'rating6a' => $request->rating6a,
                'rating6b' => $request->rating6b,
                'rating6c' => $request->rating6c,
                'rating6d' => $request->rating6d,
                'rating6e' => $request->rating6e,
                'rating6f' => $request->rating6f,
                'rating6g' => $request->rating6g,
                'rating6h' => $request->rating6h,

                'remarks6a' => $request->remarks6a,
                'remarks6b' => $request->remarks6b,
                'remarks6c' => $request->remarks6c,
                'remarks6d' => $request->remarks6d,
                'remarks6e' => $request->remarks6e,
                'remarks6f' => $request->remarks6f,
                'remarks6g' => $request->remarks6g,
                'remarks6h' => $request->remarks6h,
                 

                'status' =>  $request->status,
                'user_id' =>  $request->user_id,
            ]);
            MellpiproChangeNSTracking::create([
                'mplgubrgychangeNS_id' => $changeNSBarangay->id,
                'status' => $request->status,
                'barangay_id' => auth()->user()->barangay,
                'municipal_id' => auth()->user()->city_municipal,
                'user_id' => auth()->user()->id,
            ]);
        }
        return redirect('BarangayScholar/changeNS');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $action = 'edit';
        $location = new LocationController;
        $prov = $location->getLocationDataProvince(auth()->user()->Region);
        $mun = $location->getLocationDataMuni(auth()->user()->Province);
        $city = $location->getLocationDataCity(auth()->user()->Region);
        $brgy = $location->getLocationDataBrgy(auth()->user()->city_municipal);
        
        $years = range(date('Y'), 1900);


        $row = DB::table('mplgubrgychangeNS')->where('id', $request->id)->first();
        return view('BarangayScholar.VisionMission.show', compact('prov', 'mun', 'city', 'brgy', 'years', 'action', 'row'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request ,string $id)
    {   
        $cnlocation = DB::table('mplgubrgychangeNS')->where('id', $request->id)->first();
        return view('BarangayScholar.ChangeinNS.edit', ['cnlocation' => $cnlocation ])->with('success', 'Created successfully!');
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
            'periodCovereda' => 'required|string |max:255',

            'rating6a' => 'required|integer',
            'rating6b' => 'required|integer',
            'rating6c' => 'required|integer',
            'rating6d' => 'required|integer',
            'rating6e' => 'required|integer',
            'rating6f' => 'required|integer',
            'rating6g' => 'required|integer',
            'rating6h' => 'required|integer', 
            

            'remarks6a' => 'required|string|max: 255',
            'remarks6b' => 'required|string|max: 255',
            'remarks6c' => 'required|string|max: 255',
            'remarks6d' => 'required|string|max: 255',
            'remarks6e' => 'required|string|max: 255',
            'remarks6f' => 'required|string|max: 255',
            'remarks6g' => 'required|string|max: 255',
            'remarks6h' => 'required|string|max: 255', 

            'status' => 'required|string|max:255',
            'user_id' => 'required|integer',

        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        } else {
            $changeNSBarangay  = MellpiproChangeNS::find($request->id);

            $changeNSBarangay = MellpiproChangeNS::create([
                'barangay_id' =>  $request->barangay_id,
                'municipal_id' =>  $request->municipal_id,
                'province_id' =>  $request->province_id,
                'region_id' =>  $request->region_id,
                'dateMonitoring' =>  $request->dateMonitoring,
                'periodCovereda' =>  $request->periodCovereda,

                'rating6a' => $request->rating6a,
                'rating6b' => $request->rating6b,
                'rating6c' => $request->rating6c,
                'rating6d' => $request->rating6d,
                'rating6e' => $request->rating6e,
                'rating6f' => $request->rating6f,
                'rating6g' => $request->rating6g,
                'rating6h' => $request->rating6h,

                'remarks6a' => $request->remarks6a,
                'remarks6b' => $request->remarks6b,
                'remarks6c' => $request->remarks6c,
                'remarks6d' => $request->remarks6d,
                'remarks6e' => $request->remarks6e,
                'remarks6f' => $request->remarks6f,
                'remarks6g' => $request->remarks6g,
                'remarks6h' => $request->remarks6h,
                 

                'status' =>  $request->status,
                'user_id' =>  $request->user_id,
            ]);
        
        }
        return redirect('BarangayScholar/changeNS');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('mplgubrgychangeNStracking')->where('mplgubrgychangeNS_id', $id)->delete();
        $lguprofile = MellpiproChangeNS::find($id); 
        $lguprofile->delete();
        return redirect()->route('changeNS.index')->with('success', 'Deleted successfully!');
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
