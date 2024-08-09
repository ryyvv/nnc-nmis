<?php

namespace App\Http\Controllers\BarangayScholar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\MellpiproBarangayDiscussionQuestion;
use App\Models\MellpiproBarangayDiscussionQuestionTracking;
use App\Http\Controllers\LocationController;
use Barryvdh\DomPDF\Facade\Pdf;

class DiscussionQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $barangay = auth()->user()->barangay;
        // $dqlocation = DB::table('mplgubrgydiscussionquestion')->where('barangay_id', $barangay)->get();
        // return view('BarangayScholar.DiscussionQuestion.index', ['dqlocation' => $dqlocation]);

        $location = new LocationController;
        $prov = $location->getLocationDataProvince(auth()->user()->Region);
        $mun = $location->getLocationDataMuni(auth()->user()->Province);
        $city = $location->getLocationDataCity(auth()->user()->Region);
        $brgy = $location->getLocationDataBrgy(auth()->user()->city_municipal);

        $barangay = auth()->user()->barangay;
        
        $dqlocation = DB::table('users')
            ->join('mplgubrgydiscussionquestion', 'users.id', '=', 'mplgubrgydiscussionquestion.user_id')
            ->where('user_id', auth()->user()->id)->orderBy('id', 'DESC')
            ->select('users.Firstname as firstname', 'users.Middlename as middlename', 'users.Lastname as lastname', 'mplgubrgydiscussionquestion.*')
            ->get();
 
        return view('BarangayScholar.DiscussionQuestion.index', compact('dqlocation', 'prov', 'mun', 'city', 'brgy'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $action = 'create';
        $location = new LocationController;
        $prov = $location->getLocationDataProvince(auth()->user()->Region);
        $mun = $location->getLocationDataMuni(auth()->user()->Province);
        $city = $location->getLocationDataCity(auth()->user()->Region);
        $brgy = $location->getLocationDataBrgy(auth()->user()->city_municipal);
        
        $years = range(date('Y'), 1900);

        return view('BarangayScholar.DiscussionQuestion.create', compact('prov', 'mun', 'city', 'brgy', 'years', 'action' ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
   
        if ($request->formrequest == 'draft') { 
            $DQBarangay = MellpiproBarangayDiscussionQuestion::create([
                'barangay_id' =>  $request->barangay_id,
                'municipal_id' =>  $request->municipal_id,
                'province_id' =>  $request->province_id,
                'region_id' =>  $request->region_id,
                'dateMonitoring' =>  $request->dateMonitoring,
                'periodCovereda' =>  $request->periodCovereda, 

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
            ]);
            MellpiproBarangayDiscussionQuestionTracking::create([
                'mplgubrgydiscussionquestion_id' => $DQBarangay->id,
                'status' => $request->status,
                'barangay_id' => auth()->user()->barangay,
                'municipal_id' => auth()->user()->city_municipal,
                'user_id' => auth()->user()->id,
            ]); 
            return redirect('BarangayScholar/discussionquestion')->with('success', 'Data stored as Draft!'); 
        }else {

            $rules = [
                'barangay_id' => 'required|integer',
                'municipal_id' => 'required|integer',
                'province_id' => 'required|integer',
                'region_id' => 'required|integer',
                'dateMonitoring' => 'required|date|max:255',
                'periodCovereda' => 'required|numeric', 

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
                'user_id' => 'required|integer',
    
            ];
    
            $validator = Validator::make($request->all(), $rules);
    
            if($validator->fails()){
                return redirect()->back()
                ->withErrors($validator)
                ->withInput()->with('error', 'Something went wrong! Please try again.');
            } else {
    
                $DQBarangay = MellpiproBarangayDiscussionQuestion::create([
                    'barangay_id' =>  $request->barangay_id,
                    'municipal_id' =>  $request->municipal_id,
                    'province_id' =>  $request->province_id,
                    'region_id' =>  $request->region_id,
                    'dateMonitoring' =>  $request->dateMonitoring,
                    'periodCovereda' =>  $request->periodCovereda, 
    
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
                ]);
                MellpiproBarangayDiscussionQuestionTracking::create([
                    'mplgubrgydiscussionquestion_id' => $DQBarangay->id,
                    'status' => $request->status,
                    'barangay_id' => auth()->user()->barangay,
                    'municipal_id' => auth()->user()->city_municipal,
                    'user_id' => auth()->user()->id,
                ]);
            }
            return redirect('BarangayScholar/discussionquestion')->with('success', 'Data created successfully!');
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id ) {  

        $action = 'edit';
        $location = new LocationController;
        $prov = $location->getLocationDataProvince(auth()->user()->Region);
        $mun = $location->getLocationDataMuni(auth()->user()->Province);
        $city = $location->getLocationDataCity(auth()->user()->Region);
        $brgy = $location->getLocationDataBrgy(auth()->user()->city_municipal);
        
        $years = range(date('Y'), 1900);


        $row = DB::table('mplgubrgydiscussionquestion')->where('id', $request->id)->first();
        return view('BarangayScholar.DiscussionQuestion.show', compact('prov', 'mun', 'city', 'brgy', 'years', 'action', 'row'));

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

        $years = range(date("Y"), 1900);

        //dd($request->id);
        $row = DB::table('mplgubrgydiscussionquestion')->where('user_id', auth()->user()->id)->first();
        //dd($lguProfile);


        return view('BarangayScholar.DiscussionQuestion.edit', compact('row', 'prov', 'mun', 'city', 'brgy', 'years', 'action'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->formrequest == 'draft') {
            $DQBarangay = MellpiproBarangayDiscussionQuestion::find($request->id);
    
            $DQBarangay->update([
                'barangay_id' =>  $request->barangay_id,
                'municipal_id' =>  $request->municipal_id,
                'province_id' =>  $request->province_id,
                'region_id' =>  $request->region_id,
                'dateMonitoring' =>  $request->dateMonitoring,
                'periodCovereda' =>  $request->periodCovereda, 
                
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
            ]);

            return redirect('BarangayScholar/discussionquestion')->with('success', 'Data stored as Draft!');
        }else {

            $rules = [
                'barangay_id' => 'required|integer',
                'municipal_id' => 'required|integer',
                'province_id' => 'required|integer',
                'region_id' => 'required|integer',
                'dateMonitoring' => 'required|date|max:255',
                'periodCovereda' => 'required|numeric', 
    
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
                'user_id' => 'required|integer',
    
            ];
    
            $validator = Validator::make($request->all(), $rules);
    
            if($validator->fails()){
                return redirect()->back()
                ->withErrors($validator)
                ->withInput()->with('error', 'Something went wrong! Please try again.');
            } else {
                $DQBarangay = MellpiproBarangayDiscussionQuestion::find($request->id);
    
                $DQBarangay->update([
                    'barangay_id' =>  $request->barangay_id,
                    'municipal_id' =>  $request->municipal_id,
                    'province_id' =>  $request->province_id,
                    'region_id' =>  $request->region_id,
                    'dateMonitoring' =>  $request->dateMonitoring,
                    'periodCovereda' =>  $request->periodCovereda, 
                    
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
                ]);
     
            }
            return redirect('BarangayScholar/discussionquestion')->with('success', 'Updated successfully!');
        }
      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        DB::table('mplgubrgydiscussionquestiontracking')->where('mplgubrgydiscussionquestion_id', $request->id)->delete();
        $discussion = MellpiproBarangayDiscussionQuestion::find($request->id); 
        $discussion->delete();
        return redirect()->route('discussionquestion.index')->with('success', 'Deleted successfully!');
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
