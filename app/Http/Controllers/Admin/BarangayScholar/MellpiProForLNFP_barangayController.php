<?php

namespace App\Http\Controllers\Admin\BarangayScholar;

use App\Models\MellpiProForLNFP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Form5RatingModel;
use App\Models\Form5RemarksModel;
use App\Models\lnfp_form5a_rr;
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
        $lnfp = lnfp_lguprofile::where('user_id', auth()->user()->id)->orderBy('id','DESC')->get();

        return view('BarangayScholar/MellpiProForLNFP/MellpiProMonitoring.MonitoringForm5CreateData', ['lnfp' => $lnfp]);
    }
    public function addForm(Request $request)
    {
        if( auth()->user()->otherrole == 10)
        $form5a = form5PNAObarangay::where('id', 1)->orderBy('id', 'ASC')->get();
        elseif( auth()->user()->otherrole == 9)
        $form5a = form5PNAObarangay::where('id', 2)->orderBy('id', 'ASC')->get();
        
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
                ->orderBy('updated_at','DESC')
                ->get();


        return view('BarangayScholar/MellpiProForLNFP/MellpiProMonitoring.MonitoringForm5Index', ['form5a_rr' => $form5a_rr]);
    }

    public function monitoringForm5view(Request $request)
    {
        // $form5a = form5PNAObarangay::getByUserRole(auth()->user()->otherrole);

        $location = new LocationController;
        $regCode = auth()->user()->Region;
        $provCode = auth()->user()->Province;
        $provinces = $location->getProvinces(['reg_code' => $regCode]);
        $cities_municipalities = $location->getCitiesAndMunicipalities(['prov_code' => $provCode]);

        $row = DB::table('lnfp_form5a_rr')
                   ->leftjoin('lnfp_form7','lnfp_form7.form5_id', '=', 'lnfp_form5a_rr.id')
                   ->select('lnfp_form5a_rr.*',
                            'lnfp_form7.id as form7_id',
                            'lnfp_form7.status as form7_status',)
                   ->where('lnfp_form5a_rr.id', $request->id)->first();

        $form5a = DB::table('form5_fields_content_PNAO')
                       ->leftJoin('lnfp_form5_rating','lnfp_form5_rating.form_content_id', '=', 'form5_fields_content_PNAO.id') 
                       ->orWhere('lnfp_form5_rating.form5_id', '=', $request->id)
                       ->select('form5_fields_content_PNAO.*','lnfp_form5_rating.rating as form5_rating', 'lnfp_form5_rating.remarks as form5_remarks' )
                       ->get();
        
        $years = range(date("Y"), 1900);
        
        $availableForms = $this->access_header();
        $action = 'edit';
        return view('BarangayScholar/MellpiProForLNFP/MellpiProMonitoring.Form5View', compact('form5a', 'row','years','availableForms','cities_municipalities'));
    }


    public function monitoringForm5edit(Request $request)
    {
        // $form5a = form5PNAObarangay::getByUserRole(auth()->user()->otherrole);
        $row = DB::table('lnfp_form5a_rr')
                    ->leftjoin('lnfp_form5_rating', 'lnfp_form5_rating.form5_id', '=', 'lnfp_form5a_rr.id')
                    ->select('lnfp_form5a_rr.*', 'lnfp_form5_rating.rating as rating', 'lnfp_form5_rating.remarks as remarks')
                    ->where('lnfp_form5a_rr.id', $request->id)->first();

        $availableForms = $this->access_header();

        $checkForm = Form5RatingModel::where('form5_id',$request->id)->count();

        $form5a  = !empty($checkForm)
                    ? DB::table('lnfp_form5_rating')
                            ->leftJoin('form5_fields_content_PNAO','lnfp_form5_rating.form_content_id','=','form5_fields_content_PNAO.id')
                            ->select('form5_fields_content_PNAO.*',
                                     'lnfp_form5_rating.rating as rate', 
                                     'lnfp_form5_rating.remarks as form_remarks', 
                                     'lnfp_form5_rating.form5_id as form_id'   )
                            ->where('lnfp_form5_rating.form5_id',$request->id)
                            ->orderBy('form5_fields_content_PNAO.id', 'ASC')->get()
                    : form5PNAObarangay::orderBy('id', 'ASC')->get();
        

        $location = new LocationController;
        $regCode = auth()->user()->Region;
        $provCode = auth()->user()->Province;
        $provinces = $location->getProvinces(['reg_code' => $regCode]);
        $cities_municipalities = $location->getCitiesAndMunicipalities(['prov_code' => $provCode]);
        $years = range(date("Y"), 1900);

        return view('BarangayScholar/MellpiProForLNFP/MellpiProMonitoring.MonitoringForm5Edit', compact('form5a', 'row', 'years','availableForms','cities_municipalities', 'form5a'));
    }




    public function monitoringForm5create()
    {
        $form5a = form5PNAObarangay::getByUserRole(auth()->user()->otherrole);
        $action = 'create';
        $location = new LocationController;
        $regCode = auth()->user()->Region;
        $provCode = auth()->user()->Province;
        $citymunCode = auth()->user()->city_municipal;
        $provinces = $location->getProvinces(['reg_code' => $regCode]);
        $cities_municipalities = $location->getCitiesAndMunicipalities(['prov_code' => $provCode]);
        $barangays = $location->getBarangays(['citymun_code' => $citymunCode]);

        $years = range(date("Y"), 1900);

        return view('BarangayScholar/MellpiProForLNFP/MellpiProMonitoring.MonitoringForm5Create', compact('form5a', 'provinces', 'cities_municipalities', 'barangays', 'years', 'action'));
    }

    public function editForm5a(Request $request, $id)
    {
        //dd($request);

        //$lnfp_form5a_rr->update($updateData);
        $fields = $this->access_fields($request);
        $lnfp_form5a_rr = lnfp_form5a_rr::find($request->id);

        if( $request->formrequest == 'draft' ){

            $lnfp_form5a_rr->update( $fields + [ 'status' => 2,  ]);

            foreach ($request->ratings as $key => $rating) {
                $updateRating = [
                    'form5_id' => $lnfp_form5a_rr->id,
                    'user_id' => auth()->id(),
                    'name' => $request->ratingname[$key] ?? null,
                    'rating' => $rating,
                    'remarks' => $request->remarks[$key] ?? null,
                    'form_content_id' => $request->content_id[$key]
                ];
        
                // Create or update the rating
                Form5RatingModel::updateOrCreate(
                    ['form5_id' => $lnfp_form5a_rr->id, 'form_content_id' => $request->content_id[$key]], 
                    $updateRating
                );
            }

            return redirect()->route('MellpiProMonitoringIndex.index')->with('success', 'Data stored successfully!');

        }else{
            

            $rules = $this->access_rules($request);

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
                        
                        // add ratings and remarks
                        foreach ($request->ratings as $key => $rating) {
                            
                            $updateRating = [
                                'form5_id' => $lnfp_form5a_rr->id,
                                'user_id' => auth()->user()->id,
                                'name'=> $request->ratingname[$key] ?? null,
                                'rating' => $rating,
                                'remarks' => $request->remarks[$key] ?? null,
                                'form_content_id' => $request->content_id[$key] 
                            ];
                           
                            // Create or update the rating
                            Form5RatingModel::updateOrCreate(
                                ['form5_id' => $lnfp_form5a_rr->id, 'form_content_id' => $request->content_id[$key]], 
                                $updateRating
                            );
                        }

                        
                            $lnfp_form7 = lnfp_form7::create([
                                'form5_id' => $request->id,
                                'lnfp_lgu_id' => $request->lnfp_lgu_id,
                                'status'      => 2,
                                'user_id'     => auth()->user()->id,
                            ]);
                        

                        return redirect()->route('lguLnfpEditForm6', $lnfp_form7->id)->with('success', 'Data stored successfully! You can now create Form 6 and 7');
                }
            }
        

       

    }

    public function fetchFormData(Request $request){
        
        dd($request->query('filter'));
        // Fetch the form data based on the switch value
        $formData = form5PNAObarangay::getByUserRole($request->query('filter'));

        // Return the data as a JSON response
        return response()->json([
            'form_fields' => $formData
        ]);

    }

    public function deleteForm5arr(Request $request, $id){

        DB::table('lnfp_lguform5atracking')->where('lnfp_lguform5_id', $request->id)->delete();
        
        $form5a = lnfp_form5a_rr::find($id);
        $form5a->delete();

        return redirect()->back()->with('alert', 'Deleted Successfully!');
    }

    public static function access_rules($request){


        $rules = [
            'periodCovereda' => 'required',
            'dateMonitoring' => 'required',
            'nameOf' => 'required',
            'numYr' => 'required|integer|min:1|max:1000000',
            'fulltime' => 'required',
            'bday' => 'required',
            'sex' => 'required',
            'header'   => 'required',
        ];

        if( $request->header != 'NAO' ){

            $rules += [
                
                'dateAppoint' => 'required',

            ];

        }

        if( $request->header == 'NAO' ){

            $rules += [
                'profAct' => 'required',
                'dateDesig' => 'required',

            ];

        }

        if( $request->header == 'DNPC' ){

            $rules += [
                'assign_task' => 'required',

            ];

        }

        if( auth()->user()->otherrole == 10 ){

            $rules += [
                'education' => 'required',
                'brgy_service' => 'required',
            ];
        }

        if( auth()->user()->otherrole == 9 ){

            $rules += [
                'address' => 'required',
            ];
        }

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
            'header'   => $request->header,
            'assign_task'   => $request->assign_task,
            'brgy_service'   => $request->brgy_service,
            'cont_education' => $request->cont_education,
            'education' => $request->education,
            'dateappointment' =>$request->dateAppoint,
            'user_id' => auth()->user()->id,
    ];

        return $updateData;
   }

   public static function access_header(){

    $userLevel = auth()->user()->otherrole;

    switch ($userLevel) {
        case 9:
            $availableForms = [
                '' => 'Select',
                'NAO' => 'MELLPI PRO FORM 5b: CITY/MUNICIPAL NUTRITION ACTION OFFICER MONITORING',
                'CMNPC' => 'MELLPI PRO FORM 5c.2: CITY/MUNICIPAL NUTRITION PROGRAM COORDINATOR MONITORING',
                'BNS' => 'MELLPI PRO FORM 5d: BARANGAY NUTRITION SCHOLAR MONITORING',
            ];
            break;

        case 10:
            $availableForms = [
                '' => 'Select',
                'BNS' => 'MELLPI PRO FORM 5d: BARANGAY NUTRITION SCHOLAR MONITORING',
            ];
            break;

        case 7:
            $availableForms = [
                '' => 'Select',
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