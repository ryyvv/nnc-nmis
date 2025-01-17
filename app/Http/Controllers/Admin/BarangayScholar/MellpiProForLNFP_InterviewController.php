<?php

namespace App\Http\Controllers\Admin\BarangayScholar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\lnfp_formInterview;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\lnfp_formOverall;
use App\Models\lnfp_lguInterviewtracking;
use App\Http\Controllers\LocationController;

class MellpiProForLNFP_InterviewController extends Controller
{
    //
    public function InterviewFormLNFP()
    {
     
        $InterviewForm = DB::table('lnfp_interview_form')
        ->leftJoin('lnfp_form5a_rr', 'lnfp_form5a_rr.id', '=', 'lnfp_interview_form.form5_id')
        ->select('lnfp_interview_form.*',
                 'lnfp_form5a_rr.nameofPnao as nameofPnao', 
                 'lnfp_form5a_rr.address as periodCovereda',
                 'lnfp_form5a_rr.id as form5_id')
        ->where('lnfp_interview_form.user_id', auth()->user()->id)
        ->get();

        return view('BarangayScholar/MellpiProForLNFP/MellpiProInterview/InterviewFormPNAOIndex', ['InterviewForm' => $InterviewForm]);
    }

    public function InterviewFormLNFPView(Request $request)
    {
        $action = 'edit';

        $row = DB::table('lnfp_interview_form')
                ->leftjoin('lnfp_overall_score_form', 'lnfp_overall_score_form.formInterview_id', '=', 'lnfp_interview_form.id')
                ->leftJoin('lnfp_form5a_rr', 'lnfp_form5a_rr.id', '=', 'lnfp_interview_form.form5_id')
                ->select('lnfp_interview_form.*',
                         'lnfp_form5a_rr.nameofPnao as nameofPnao', 
                         'lnfp_form5a_rr.address as address', 
                         'lnfp_form5a_rr.id as form5_id',
                         'lnfp_overall_score_form.id as overall_id',
                         'lnfp_overall_score_form.status as overall_status')
                ->where('lnfp_interview_form.id', $request->id)
                ->first();

        return view('BarangayScholar/MellpiProForLNFP/MellpiProInterview/View', compact('row'));
    }

    public function InterviewFormLNFPEdit(Request $request)
    {
        $action = 'edit';
        
        $row = DB::table('lnfp_interview_form')
                ->leftJoin('lnfp_form5a_rr', 'lnfp_form5a_rr.id', '=', 'lnfp_interview_form.form5_id')
                ->select('lnfp_interview_form.*',
                         'lnfp_form5a_rr.nameofPnao as nameofPnao', 
                         'lnfp_form5a_rr.address as address', 
                         'lnfp_form5a_rr.id as form5_id')
                ->where('lnfp_interview_form.id', $request->id)
                ->first();

        return view('BarangayScholar/MellpiProForLNFP/MellpiProInterview/InterviewFormPNAOEdit', compact('row'));
    }
    public function InterviewFormLNFPCreate()
    {
        $action = 'create';
        $location = new LocationController;
        $prov = $location->getLocationDataProvince(auth()->user()->Region);
        $mun = $location->getLocationDataMuni(auth()->user()->Province);
        $city = $location->getLocationDataCity(auth()->user()->Region);
        $brgy = $location->getLocationDataBrgy(auth()->user()->city_municipal);

        $years = range(date("Y"), 1900);

        return view('BarangayScholar/MellpiProForLNFP/MellpiProInterview/InterviewFormPNAOCreate', compact('prov', 'mun', 'city', 'brgy', 'years', 'action'));
    }
    public function storeInterviewForm(Request $request)
    {
        $action = $request->input('action');
        // dd($action);
        if ($action == 'submit') {
            # code...
            try {
                //code...
                $rules = [
                    'nameOf' => 'required',
                    'areaAssign' => 'required',
                    'dateInterview' => 'required',
                    'question1' => 'required',
                    'question2' => 'required',
                    'question3' => 'required',
                    'actualScore1' => 'required',
                    'actualScore2' => 'required',
                    'actualScore3' => 'required',
                    'q1Remarks' => 'required',
                    'q2Remarks' => 'required',
                    'q3Remarks' => 'required',
                    'subASTot' => 'required',
                ];

                $message = [
                    'required' => 'The field is required.',
                    'integer' => 'The field must be a integer.',
                    'string' => 'The field must be a string.',
                    'date' => 'The field must be a valid date.',
                    'max' => 'The field may not be greater than :max characters.',
                ];

                $input = $request->all();

                $validator = Validator::make($input, $rules, $message);


                if ($validator->fails()) {
                    Log::error($validator->errors());
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput()
                        ->with('error', 'Something went wrong! Please try again.');
                } else {
                    $lnfpInterviewForm = lnfp_formInterview::create([
                        'nameOf' => $request->input('nameOf'),
                        'areaAssign' => $request->input('areaAssign'),
                        'dateOfInterview' => $request->input('dateInterview'),
                        'question1' => $request->input('question1'),
                        'question2' => $request->input('question2'),
                        'question3' => $request->input('question3'),
                        'question4' => $request->input('question4'),
                        'q1AScore' => $request->input('actualScore1'),
                        'q2AScore' => $request->input('actualScore2'),
                        'q3AScore' => $request->input('actualScore3'),
                        'q4AScore' => $request->input('actualScore4'),
                        'q1Remarks' => $request->input('q1Remarks'),
                        'q2Remarks' => $request->input('q2Remarks'),
                        'q3Remarks' => $request->input('q3Remarks'),
                        'q4Remarks' => $request->input('q4Remarks'),
                        'subtotalAScore' => $request->input('subASTot'),
                        'status' => $request->input('submitStatus'),
                    ]);
                    // dd($lnfpInterviewForm);

                    if ($lnfpInterviewForm) {
                        # code...
                        lnfp_lguInterviewtracking::create([
                            'lnfp_overallScore_id' => $lnfpInterviewForm->id,
                            'status' => $request->input('submitStatus'),
                            'barangay_id' => auth()->user()->barangay,
                            'municipal_id' => auth()->user()->city_municipal,
                            'user_id' => auth()->user()->id,
                        ]);
                    }

                    return redirect()->route('lnfpFormInterviewIndex')->with('alert', 'Data Submitted Successfully!');
                }
            } catch (\Throwable $th) {
                //throw $th;
                return "An error occured: " . $th->getMessage();
            }
        } elseif ($action == 'draft') {
            # code...
            try {
                //code...
                $lnfpInterviewForm = lnfp_formInterview::create([
                    'nameOf' => $request->input('nameOf'),
                    'areaAssign' => $request->input('areaAssign'),
                    'dateOfInterview' => $request->input('dateInterview'),
                    'question1' => $request->input('question1'),
                    'question2' => $request->input('question2'),
                    'question3' => $request->input('question3'),
                    'question4' => $request->input('question4'),
                    'q1AScore' => $request->input('actualScore1'),
                    'q2AScore' => $request->input('actualScore2'),
                    'q3AScore' => $request->input('actualScore3'),
                    'q4AScore' => $request->input('actualScore4'),
                    'q1Remarks' => $request->input('q1Remarks'),
                    'q2Remarks' => $request->input('q2Remarks'),
                    'q3Remarks' => $request->input('q3Remarks'),
                    'q4Remarks' => $request->input('q4Remarks'),
                    'subtotalAScore' => $request->input('subASTot'),
                    'status' => $request->input('DraftStatus'),
                ]);

                return redirect()->route('lnfpFormInterviewIndex')->with('alert', 'Data Save as Draft Successfully!');
            } catch (\Throwable $th) {
                //throw $th;
                return "An error occured: " . $th->getMessage();
            }
        }
    }

    public function storeInterviewFormUpdate(Request $request, $id)
    {
        $action = $request->formrequest;
<<<<<<< HEAD
=======
        $fields = $this->access_fields($request);
>>>>>>> eddd7cd (123)
        if ($action == 'submit') {
            # code...
            try {
               
                $rules = $this->access_rules();

                $message = [
                    'required' => 'The field is required.',
                    'integer' => 'The field must be a integer.',
                    'string' => 'The field must be a string.',
                    'date' => 'The field must be a valid date.',
                    'max' => 'The field may not be greater than :max characters.',
                ];

                $input = $request->all();

                $validator = Validator::make($input, $rules, $message);


                if ($validator->fails()) {
                    Log::error($validator->errors());
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput()
                        ->with('error', 'Something went wrong! Please try again.');
                } else {
                    //code...
                    lnfp_formInterview::where('id', $request->id)
<<<<<<< HEAD
                        ->update([
                            'dateOfInterview' => $request->input('dateInterview'),
                            'question1' => $request->input('question1'),
                            'question2' => $request->input('question2'),
                            'question3' => $request->input('question3'),
                            'q1AScore' => $request->input('actualScore1'),
                            'q2AScore' => $request->input('actualScore2'),
                            'q3AScore' => $request->input('actualScore3'),
                            'q1Remarks' => $request->input('q1Remarks'),
                            'q2Remarks' => $request->input('q2Remarks'),
                            'q3Remarks' => $request->input('q3Remarks'),
                            'subtotalAScore' => $request->input('subASTot'),
                            'header'    => $request->header,
                            'status' => 1,
                            'user_id' => auth()->user()->id,
                        ]);
=======
                        ->update( $fields + [ 'status' => 1 ]);
>>>>>>> eddd7cd (123)


                        $lnfp_formOverall = lnfp_formOverall::create([
                            'lnfp_lgu_id'       => $request->lnfp_lgu_id,
                            'form5_id'          => $request->form5_id,
                            'form8_id'          => $request->form8_id,
                            'formInterview_id'  => $request->id,
                            'status'            => 1,
                            'user_id' => auth()->user()->id,
                        ]);

                    return redirect()->route('editOSForm', $lnfp_formOverall->id )->with('success', 'Data stored successfully! You can now create Overall Score Form');

                
                
                }
            } catch (\Throwable $th) {
                //throw $th;
                return "An error occured: " . $th->getMessage();
            }
        } elseif ($action == 'draft') {
            # code...
            try {
                //code...
                lnfp_formInterview::where('id', $request->id)
<<<<<<< HEAD
                    ->update([
                        'dateOfInterview' => $request->input('dateInterview'),
                        'question1' => $request->input('question1'),
                        'question2' => $request->input('question2'),
                        'question3' => $request->input('question3'),
                        'q1AScore' => $request->input('actualScore1'),
                        'q2AScore' => $request->input('actualScore2'),
                        'q3AScore' => $request->input('actualScore3'),
                        'q1Remarks' => $request->input('q1Remarks'),
                        'q2Remarks' => $request->input('q2Remarks'),
                        'q3Remarks' => $request->input('q3Remarks'),
                        'subtotalAScore' => $request->input('subASTot'),
                        'header'    => $request->header,
                        'status' => 2,
                        'user_id' => auth()->user()->id,
                    ]);
=======
                    ->update( $fields + [ 'status' => 2 ]);
>>>>>>> eddd7cd (123)

                return redirect()->route('lnfpFormInterviewIndex')->with('alert', 'Data Save as Draft Successfully!');
            } catch (\Throwable $th) {
                //throw $th;
                return "An error occured: " . $th->getMessage();
            }
        }
    }
    public function deleteIntForm($id)
    {
        $lnfp_interview = lnfp_formInterview::find($id);
        $lnfp_interview->delete();

        return redirect()->route('lnfpForm8Index')->with('alert', 'Deleted Successfully!');
    }


    public static function access_rules(){

        $rules = [
            'dateInterview' => 'nullable',
            'question2' => 'required',
            'question3' => 'required',
            'actualScore1' => 'required',
            'actualScore2' => 'required',
            'actualScore3' => 'required',
            'q1Remarks' => 'nullable',
            'q2Remarks' => 'nullable',
            'q3Remarks' => 'nullable',
            'subASTot' => 'required',
            'header'   => 'required'
        ];

        return $rules;

    }

    public static function access_fields( $request ){

        $updateData = [
            'dateOfInterview' => $request->input('dateInterview'),
            'question1' => $request->input('question1'),
            'question2' => $request->input('question2'),
            'question3' => $request->input('question3'),
            'q1AScore' => $request->input('actualScore1'),
            'q2AScore' => $request->input('actualScore2'),
            'q3AScore' => $request->input('actualScore3'),
            'q1Remarks' => $request->input('q1Remarks'),
            'q2Remarks' => $request->input('q2Remarks'),
            'q3Remarks' => $request->input('q3Remarks'),
            'subtotalAScore' => $request->input('subASTot'),
            'header'    => $request->header,
            'status' => 1,
            'user_id' => auth()->user()->id,
        ];

        return $updateData;

    }

    public static function access_header(){

        $userLevel = auth()->user()->otherrole;

        switch ($userLevel) {
<<<<<<< HEAD
            case 9:
                $availableForms = [
                    'NAO' => 'MELLPI PRO FORM 6b: RADIAL DIAGRAM FOR CITY/MUNICIPAL NUTRITION ACTION OFFICER MONITORING',
                    'CMNPC' => 'MELLPI PRO FORM 6c.2: RADIAL DIAGRAM FOR CITY/MUNICIPAL NUTRITION PROGRAM COORDINATOR MONITORING',
                    'BNS' => 'MELLPI PRO FORM 6d: RADIAL DIAGRAM FOR BARANGAY NUTRITION SCHOLAR MONITORING',
                ];
                break;
    
            case 10:
                $availableForms = [
                    'BNS' => 'MELLPI PRO FORM 6d: RADIAL DIAGRAM FOR BARANGAY NUTRITION SCHOLAR MONITORING',
                ];
                break;
    
            case 7:
                $availableForms = [
                    'PNAO' => 'MELLPI PRO FORM 6a: RADIAL DIAGRAM FOR PROVINCIAL NUTRITION ACTION OFFICER MONITORING',
                    'DNPC' => 'MELLPI PRO FORM 6c.1: RADIAL DIAGRAM FOR DISTRICT NUTRITION PROGRAM COORDINATOR MONITORING',
                    'NAO' => 'MELLPI PRO FORM 6b: RADIAL DIAGRAM FOR CITY/MUNICIPAL NUTRITION ACTION OFFICER MONITORING',
                    'CMNPC' => 'MELLPI PRO FORM 6c.2: RADIAL DIAGRAM FOR CITY/MUNICIPAL NUTRITION PROGRAM COORDINATOR MONITORING',
                    'BNS' => 'MELLPI PRO FORM 6d: RADIAL DIAGRAM FOR BARANGAY NUTRITION SCHOLAR MONITORING',
=======
            // Municipal Level
            case 9:
                $availableForms = [
                    'NOCMNAO' => 'NATIONAL OUTSTANDING CITY/MUNICIPALITY NUTRITION ACTION OFFICER',
                    'ROCMNAO' => 'REGIONAL OUTSTANDING CITY/MUNICIPALITY NUTRITION ACTION OFFICER',
                    'POCMNAO' => 'PROVINCIAL OUTSTANDING CITY/MUNICIPALITY NUTRITION ACTION OFFICER',
                    'NOCMNPC' => 'NATIONAL OUTSTANDING CITY/MUNICIPALITY NUTRITION PROGRAM COORDINATOR',
                    'ROCMNPC' => 'REGIONAL OUTSTANDING CITY/MUNICIPALITY NUTRITION PROGRAM COORDINATOR',
                    'POCMNPC' => 'REGIONAL OUTSTANDING CITY/MUNICIPALITY NUTRITION PROGRAM COORDINATOR',
                ];
                break;
            // Barangay Level
            case 10:
                $availableForms = [
                    'NOBNS' => 'NATIONAL OUTSTANDING BARANGAY NUTRITION SCHOLAR',
                    'ROBNS' => 'REGIONAL OUTSTANDING BARANGAY NUTRITION SCHOLAR',
                    'POBNS' => 'PROVINCIAL/CITY OUTSTANDING BARANGAY NUTRITION SCHOLAR',
                ];
                break;
            // Provincial Level
            case 7:
                $availableForms = [
                    'NOPNCO' => 'NATIONAL OUTSTANDING PROVINCIAL NUTRITION ACTION OFFICER',
                    'ROPNAO' => 'REGIONAL OUTSTANDING PROVINCIAL NUTRITION ACTION OFFICER',
                    'NODNPC' => 'NATIONAL OUTSTANDING DISTRICT NUTRITION PROGRAM COORDINATOR',
                    'RODNPC' => 'REGIONAL OUTSTANDING DISTRICT NUTRITION PROGRAM COORDINATOR',
                    'NOCMNAO' => 'NATIONAL OUTSTANDING CITY/MUNICIPALITY NUTRITION ACTION OFFICER',
                    'ROCMNAO' => 'REGIONAL OUTSTANDING CITY/MUNICIPALITY NUTRITION ACTION OFFICER',
                    'POCMNAO' => 'PROVINCIAL OUTSTANDING CITY/MUNICIPALITY NUTRITION ACTION OFFICER',
                    'NOCMNPC' => 'NATIONAL OUTSTANDING CITY/MUNICIPALITY NUTRITION PROGRAM COORDINATOR',
                    'ROCMNPC' => 'REGIONAL OUTSTANDING CITY/MUNICIPALITY NUTRITION PROGRAM COORDINATOR',
                    'POCMNPC' => 'REGIONAL OUTSTANDING CITY/MUNICIPALITY NUTRITION PROGRAM COORDINATOR',
                    'NOBNS' => 'NATIONAL OUTSTANDING BARANGAY NUTRITION SCHOLAR',
                    'ROBNS' => 'REGIONAL OUTSTANDING BARANGAY NUTRITION SCHOLAR',
                    'POBNS' => 'PROVINCIAL/CITY OUTSTANDING BARANGAY NUTRITION SCHOLAR',
>>>>>>> eddd7cd (123)
                ];
                break;
    
            default:
                $availableForms = [];
                break;
        }

        return $availableForms;

    }
}
