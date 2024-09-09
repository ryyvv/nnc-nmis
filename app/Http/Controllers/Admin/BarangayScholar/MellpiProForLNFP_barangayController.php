<?php

namespace App\Http\Controllers\Admin\BarangayScholar;

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
        $lnfp = lnfp_lguprofile::where('user_id', auth()->user()->id)->get();

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
                ->where('lnfp_form5a_rr.user_id',auth()->user()->id )
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
        $availableForms = $this->access_header();
        $action = 'edit';
        return view('BarangayScholar/MellpiProForLNFP/MellpiProMonitoring.Form5View', compact('form5a', 'row','years','availableForms'));
    }


    public function monitoringForm5edit(Request $request)
    {
        $form5a = form5PNAObarangay::get();

        $row = DB::table('lnfp_form5a_rr')->where('id', $request->id)->first();

        $availableForms = $this->access_header();

        $years = range(date("Y"), 1900);

        return view('BarangayScholar/MellpiProForLNFP/MellpiProMonitoring.MonitoringForm5Edit', compact('form5a', 'row', 'years','availableForms'));
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
        $fields = $this->access_fields($request);
        $lnfp_form5a_rr = lnfp_form5a_rr::find($request->id);

        if( $request->formrequest == 'draft' ){

            $lnfp_form5a_rr->update( $fields + [ 'status' => 2,  ]);

            return redirect()->route('MellpiProMonitoringIndex.index')->with('success', 'Data stored successfully!');

        }else{
            

            $rules = $this->access_rules();

            $message = [
                'required' => 'The field is required.',
                'integer' => 'The field must be a whole number.',
                'string' => 'The field must be a string.',
                'date' => 'The field must be a valid date.',
                'max' => 'The field may not be greater than :max.',
                'min' => 'The field may not be greater than :min.',
            ];

            // $validator = Validator::make($request->all(), $rules, $message);

            $input = $request->all();
            // $input = array_map('trim', $input);

            $validator = Validator::make($input, $rules, $message);

            if ($validator->fails()) {
                Log::error($validator->errors());
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput()
                    ->with('error', 'Something went wrong! Please try again.');
            }else{
  
                        $lnfp_form5a_rr->update( $fields + [ 'status' => 1,  ]);

                        // $lnfp_form7 = lnfp_form7::where('form5_id', $request->id)->first();

                        // if( $lnfp_form7 == null ){
                            // Add new data to Form7
                            $lnfp_form7 = lnfp_form7::create([
                                'form5_id' => $request->id,
                                'lnfp_lgu_id' => $request->lnfp_lgu_id,
                                'status'      => 2,
                                'user_id'     => auth()->user()->id,
                            ]);
                        // }

                        return redirect()->route('lguLnfpEditForm6', $lnfp_form7->id)->with('success', 'Data stored successfully! You can now create Form 6 and 7');
                }
            }
        

       

    }
    public function deleteForm5arr(Request $request, $id){

        DB::table('lnfp_lguform5atracking')->where('lnfp_lguform5_id', $request->id)->delete();
        
        $form5a = lnfp_form5a_rr::find($id);
        $form5a->delete();

        return redirect()->back()->with('alert', 'Deleted Successfully!');
    }

    public static function access_rules(){


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

        return $rules;
    }

   public static function access_fields($request){

    $updateData = [
        'periodCovereda' => $request->periodCovereda,
            'dateMonitoring' => $request->dateMonitoring,
            'nameofPnao' => $request->nameOf,
            'address' => $request->address,
            'provDeploy' => $request->provDev,
            'numYearPnao' => $request->numYr,
            'fulltime' => $request->fulltime,
            'profAct' => $request->profAct,
            'bdate' => $request->bday,
            'sex' => $request->sex,
            'dateDesignation' => $request->dateDesig,
            'secondedOffice' => $request->seconded,
            'devActnum1' => $request->num1,
            'devActnum2' => $request->num2,
            'devActnum3' => $request->num3,
            'ratingA' => $request->ratingA,
            'ratingB' => $request->ratingB,
            'ratingBB' => $request->ratingBB,
            'ratingC' => $request->ratingC,
            'ratingD' => $request->ratingD,
            'ratingE' => $request->ratingE,
            'ratingF' => $request->ratingF,
            'ratingG' => $request->ratingG,
            'ratingGG' => $request->ratingGG,
            'ratingH' => $request->ratingH,
            'remarksA' => $request->remarksA,
            'remarksB' => $request->remarksB,
            'remarksBB' => $request->remarksBB,
            'remarksC' => $request->remarksC,
            'remarksD' => $request->remarksD,
            'remarksE' => $request->remarksE,
            'remarksF' => $request->remarksF,
            'remarksG' => $request->remarksG,
            'remarksGG' => $request->remarksGG,
            'remarksH' => $request->remarksH,
            'header'   => $request->header,
            'assign_task'   => $request->assign_task,
            'brgy_service'   => $request->brgy_service,
            'cont_education' => $request->cont_education,
            'education' => $request->education,
            'dateappointment' =>$request->dateAppoint,
            // 'status'   => $request->status'),
            // 'barangay_id' => $request->barangay_id,
            // 'municipal_id' => $request->municipal_id,
            // 'province_id' => $request->province_id,
            // 'region_id' => $request->region_id,
            'user_id' => auth()->user()->id,
    ];

        return $updateData;
   }

   public static function access_header(){



    $userLevel = auth()->user()->otherrole;

    switch ($userLevel) {
        case 9:
            $availableForms = [
                'NAO' => 'MELLPI PRO FORM 5b: CITY/MUNICIPAL NUTRITION ACTION OFFICER MONITORING',
                'CMNPC' => 'MELLPI PRO FORM 5c.2: CITY/MUNICIPAL NUTRITION PROGRAM COORDINATOR MONITORING',
                'BNS' => 'MELLPI PRO FORM 5d: BARANGAY NUTRITION SCHOLAR MONITORING',
            ];
            break;

        case 10:
            $availableForms = [
                'BNS' => 'MELLPI PRO FORM 5d: BARANGAY NUTRITION SCHOLAR MONITORING',
            ];
            break;

        case 7:
            $availableForms = [
                'PNAO' => 'MELLPI PRO FORM 5a: PROVINCIAL NUTRITION ACTION OFFICER MONITORING',
                'DNPC' => 'MELLPI PRO FORM 5c.1: DISTRICT NUTRITION PROGRAM COORDINATOR MONITORING',
                'NAO' => 'MELLPI PRO FORM 5b: CITY/MUNICIPAL NUTRITION ACTION OFFICER MONITORING',
                'CMNPC' => 'MELLPI PRO FORM 5c.2: CITY/MUNICIPAL NUTRITION PROGRAM COORDINATOR MONITORING',
                'BNS' => 'MELLPI PRO FORM 5d: BARANGAY NUTRITION SCHOLAR MONITORING',
            ];
            break;

        default:
            $availableForms = [];
            break;
    }

    return $availableForms;


   }
}
