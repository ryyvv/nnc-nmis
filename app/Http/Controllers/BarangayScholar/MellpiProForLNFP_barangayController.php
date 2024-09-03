<?php

namespace App\Http\Controllers\BarangayScholar;

use App\Models\MellpiProForLNFP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\lnfp_form5a;
use App\Models\lnfp_form5a_rr;
use App\Models\sampleUpdateForm5a;
use Illuminate\Support\Facades\DB;
use illuminate\Database\QueryException;
use PhpParser\Node\Stmt\TryCatch;
use App\Models\lnfp_lguprofile;
use App\Models\lnfp_form7;
use App\Models\lnfp_form8;
use App\Models\lnfp_formInterview;
use App\Models\lnfp_formOverall;
use App\Models\lnfp_lguform5atracking;
use App\Http\Controllers\LocationController;
use App\Models\form5PNAObarangay;

class MellpiProForLNFP_barangayController extends Controller
{
    public function createdata()
    {
        $lnfp = lnfp_lguprofile::get();

        return view('BarangayScholar/MellpiProForLNFP/MellpiProMonitoring.MonitoringForm5CreateData', ['lnfp' => $lnfp]);
    }
    public function addForm(Request $request)
    {
        $form5a = form5PNAObarangay::get();

        // $form5a = DB::table('lnfp_form5a_rr')
        // ->join('form5_fields_content_PNAO', )

        $lnfp = DB::table('lnfp_lguprofile')->where('id', $request->id)->first();

        return view('BarangayScholar/MellpiProForLNFP/MellpiProMonitoring.MonitoringForm5Create', ['lnfp' => $lnfp, 'form5a' => $form5a]);
    }
    /**
     * Display a listing of the resource.
     */


    //form 5 Monitoring
    public function monitoringForm5()
    {
        //
        // $form5a_rr = lnfp_form5a_rr::get();

        $form5a_rr = DB::table('lnfp_form5a_rr')
                ->leftJoin('lnfp_form7', 'lnfp_form5a_rr.id', '=', 'lnfp_form7.form5_id')
                ->select('lnfp_form5a_rr.*', 'lnfp_form7.id as form7_id')
                ->get();


        return view('BarangayScholar/MellpiProForLNFP/MellpiProMonitoring.MonitoringForm5Index', ['form5a_rr' => $form5a_rr]);
    }

    public function monitoringForm5view(Request $request)
    {
        $form5a = form5PNAObarangay::get();

        $row = DB::table('lnfp_form5a_rr')
                   ->leftjoin('lnfp_form7','lnfp_form7.form5_id', '=', 'lnfp_form5a_rr.id')
                   ->select('lnfp_form5a_rr.*','lnfp_form7.id as form7_id','lnfp_form7.status as form7_status')
                   ->where('lnfp_form5a_rr.id', $request->id)->first();
        $years = range(date("Y"), 1900);

        $action = 'edit';
        return view('BarangayScholar/MellpiProForLNFP/MellpiProMonitoring.Form5View', compact('form5a', 'row','years'));
    }


    public function monitoringForm5edit(Request $request)
    {
        $form5a = form5PNAObarangay::get();

        $row = DB::table('lnfp_form5a_rr')->where('id', $request->id)->first();


        $years = range(date("Y"), 1900);

        return view('BarangayScholar/MellpiProForLNFP/MellpiProMonitoring.MonitoringForm5Edit', compact('form5a', 'row', 'years'));
    }
    public function monitoringForm5create()
    {
        //
        $form5a = form5PNAObarangay::get();
        $action = 'create';
        $location = new LocationController;
        $prov = $location->getLocationDataProvince(auth()->user()->Region);
        $mun = $location->getLocationDataMuni(auth()->user()->Province);
        $city = $location->getLocationDataCity(auth()->user()->Region);
        $brgy = $location->getLocationDataBrgy(auth()->user()->city_municipal);

        $years = range(date("Y"), 1900);

        return view('BarangayScholar/MellpiProForLNFP/MellpiProMonitoring.MonitoringForm5Create', compact('form5a', 'prov', 'mun', 'city', 'brgy', 'years', 'action'));
    }
    public function editForm5a(Request $request, $id)
    {
        //dd($request);

        //$lnfp_form5a_rr->update($updateData);

        if( $request->formrequest == 'draft' ){
            $lnfp_form5a_rr = lnfp_form5a_rr::find($request->id);

            $updateData = [
                'periodCovereda' => $request->input('periodCovereda'),
                    'dateMonitoring' => $request->input('dateMonitoring'),
                    'nameofPnao' => $request->input('nameOf'),
                    'address' => $request->input('address'),
                    'provDeploy' => $request->input('provDev'),
                    'numYearPnao' => $request->input('numYr'),
                    'fulltime' => $request->input('fulltime'),
                    'profAct' => $request->input('profAct'),
                    'bdate' => $request->input('bday'),
                    'sex' => $request->input('sex'),
                    'dateDesignation' => $request->input('dateDesig'),
                    'secondedOffice' => $request->input('seconded'),
                    'devActnum1' => $request->input('num1'),
                    'devActnum2' => $request->input('num2'),
                    'devActnum3' => $request->input('num3'),
                    'ratingA' => $request->input('ratingA'),
                    'ratingB' => $request->input('ratingB'),
                    'ratingBB' => $request->input('ratingBB'),
                    'ratingC' => $request->input('ratingC'),
                    'ratingD' => $request->input('ratingD'),
                    'ratingE' => $request->input('ratingE'),
                    'ratingF' => $request->input('ratingF'),
                    'ratingG' => $request->input('ratingG'),
                    'ratingGG' => $request->input('ratingGG'),
                    'ratingH' => $request->input('ratingH'),
                    'remarksA' => $request->input('remarksA'),
                    'remarksB' => $request->input('remarksB'),
                    'remarksBB' => $request->input('remarksBB'),
                    'remarksC' => $request->input('remarksC'),
                    'remarksD' => $request->input('remarksD'),
                    'remarksE' => $request->input('remarksE'),
                    'remarksF' => $request->input('remarksF'),
                    'remarksG' => $request->input('remarksG'),
                    'remarksGG' => $request->input('remarksGG'),
                    'remarksH' => $request->input('remarksH'),
                    'header'   => $request->input('header'),
                    // 'status'   => $request->input('status'),
                    // 'barangay_id' => $request->barangay_id,
                    // 'municipal_id' => $request->municipal_id,
                    // 'province_id' => $request->province_id,
                    // 'region_id' => $request->region_id,
                    'user_id' => auth()->user()->id,
            ];
            $lnfp_form5a_rr->update( $updateData + [ 'status' => 2,  ]);

            return redirect()->route('MellpiProMonitoringIndex.index')->with('success', 'Data stored successfully!');

        }else{

            $rules = [
                'periodCovereda' => 'required',
                'dateMonitoring' => 'required',
                'nameOf' => 'required',
                'address' => 'required',
                'numYr' => 'required|integer|min:1|max:1000000',
                'fulltime' => 'required',
                'profAct' => 'required',
                'bday' => 'required',
                'sex' => 'required',
                'dateDesig' => 'required',
                'seconded' => 'required',
                'num1' => 'required',
                'num2' => 'required',
                'num3' => 'required',
                'ratingA' => 'required',
                'ratingB' => 'required',
                'ratingBB' => 'required',
                'ratingC' => 'required',
                'ratingD' => 'required',
                'ratingE' => 'required',
                'ratingF' => 'required',
                'ratingG' => 'required',
                'ratingGG' => 'required',
                'ratingH' => 'required',
            ];
    
            $message = [ 
                'required' => 'The field is required.',
                'integer' => 'The field is number.',
                'string' => 'The field must be a string.',
                'date' => 'The field must be a valid date.',
                'max' => 'The field may not be greater than :max.',
                'min' => 'The field may not be greater than :min.',
            ]; 
    
            $validator = Validator::make($request->all() , $rules,$message);
    
            if($validator->fails()){
                return redirect()->back()
                ->withErrors($validator)
                ->withInput()->with('error', 'Something went wrong! Please try again.');
            }

            $lnfp_form5a_rr = lnfp_form5a_rr::find($request->id);

            $updateData = [
                'periodCovereda' => $request->input('periodCovereda'),
                    'dateMonitoring' => $request->input('dateMonitoring'),
                    'nameofPnao' => $request->input('nameOf'),
                    'address' => $request->input('address'),
                    'provDeploy' => $request->input('provDev'),
                    'numYearPnao' => $request->input('numYr'),
                    'fulltime' => $request->input('fulltime'),
                    'profAct' => $request->input('profAct'),
                    'bdate' => $request->input('bday'),
                    'sex' => $request->input('sex'),
                    'dateDesignation' => $request->input('dateDesig'),
                    'secondedOffice' => $request->input('seconded'),
                    'devActnum1' => $request->input('num1'),
                    'devActnum2' => $request->input('num2'),
                    'devActnum3' => $request->input('num3'),
                    'ratingA' => $request->input('ratingA'),
                    'ratingB' => $request->input('ratingB'),
                    'ratingBB' => $request->input('ratingBB'),
                    'ratingC' => $request->input('ratingC'),
                    'ratingD' => $request->input('ratingD'),
                    'ratingE' => $request->input('ratingE'),
                    'ratingF' => $request->input('ratingF'),
                    'ratingG' => $request->input('ratingG'),
                    'ratingGG' => $request->input('ratingGG'),
                    'ratingH' => $request->input('ratingH'),
                    'remarksA' => $request->input('remarksA'),
                    'remarksB' => $request->input('remarksB'),
                    'remarksBB' => $request->input('remarksBB'),
                    'remarksC' => $request->input('remarksC'),
                    'remarksD' => $request->input('remarksD'),
                    'remarksE' => $request->input('remarksE'),
                    'remarksF' => $request->input('remarksF'),
                    'remarksG' => $request->input('remarksG'),
                    'remarksGG' => $request->input('remarksGG'),
                    'remarksH' => $request->input('remarksH'),
                    'header'   => $request->input('header'),
                    // 'status'   => $request->input('status'),
                    // 'barangay_id' => $request->barangay_id,
                    // 'municipal_id' => $request->municipal_id,
                    // 'province_id' => $request->province_id,
                    // 'region_id' => $request->region_id,
                    'user_id' => auth()->user()->id,
            ];

            $lnfp_form5a_rr->update( $updateData + [ 'status' => 1,  ]);

            // $lnfp_form7 = lnfp_form7::where('form5_id', $request->id)->first();

            // if( $lnfp_form7 == null ){
                // Add new data to Form7
                $lnfp_form7 = lnfp_form7::create([
                    'form5_id' => $request->id,
                    'lnfp_lgu_id' => $request->lnfp_lgu_id,
                    'status'      => 2,
                ]);
            // }

            return redirect()->route('lguLnfpEditForm6', $lnfp_form7->id)->with('success', 'Data stored successfully! You can now create Form 6 and 7');
        }
        

       

    }
    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //

    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(MellpiProForLNFP $mellpiProForLNFP)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(MellpiProForLNFP $mellpiProForLNFP)
    // {
    //     //
    // }
    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, MellpiProForLNFP $mellpiProForLNFP)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteForm5arr(Request $request, $id)
    {

        DB::table('lnfp_lguform5atracking')->where('lnfp_lguform5_id', $request->id)->delete();
        
        $form5a = lnfp_form5a_rr::find($id);
        $form5a->delete();

        return redirect()->back()->with('alert', 'Deleted Successfully!');
    }

    // public function deleteForm5arr($id)
    // {
    //     //
    //     // $deleted = DB::table('lnfp_form5a_rr')->where('id', $request->id)->delete();
    //     // $deleted = lnfp_form5a_rr::where('id', $request->id)->delete();
    //     $deleted = lnfp_form5a_rr::find($id);
    //     // dd($deleted);

    //     if ($deleted) {
    //         $deleted->delete();
    //         // Redirect back with success message if record was deleted
    //         return redirect()->back()->with('alert', 'Deleted Successfully!');
    //     } else {
    //         // Redirect back with error message if record not found
    //         return redirect()->back()->with('alert', 'Record not found!');
    //     }
    // }
}
