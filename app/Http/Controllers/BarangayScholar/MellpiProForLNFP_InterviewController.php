<?php

namespace App\Http\Controllers\BarangayScholar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\lnfp_formInterview;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class MellpiProForLNFP_InterviewController extends Controller
{
    //
    public function InterviewFormLNFP()
    {
        $InterviewForm = lnfp_formInterview::get();
        return view('BarangayScholar/MellpiProForLNFP/MellpiProInterview/InterviewFormPNAOIndex', ['InterviewForm' => $InterviewForm]);
    }
    public function InterviewFormLNFPEdit(Request $request)
    {
        $InterviewForm = DB::table('lnfp_interview_form')->where('id', $request->id)->first();

        return view('BarangayScholar/MellpiProForLNFP/MellpiProInterview/InterviewFormPNAOEdit', ['InterviewForm' => $InterviewForm]);
    }
    public function InterviewFormLNFPCreate()
    {
        return view('BarangayScholar/MellpiProForLNFP/MellpiProInterview/InterviewFormPNAOCreate');
    }
    public function storeInterviewForm(Request $request)
    {
        $action = $request->input('action');
        // dd($action);
        if ($action == 'submit') {
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
                    'status' => $request->input('submitStatus'),
                ]);

                return redirect()->route('lnfpFormInterviewIndex')->with('alert', 'Data Submitted Successfully!');
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
    public function deleteIntForm($id)
    {
        $lnfp_interview = lnfp_formInterview::find($id);
        $lnfp_interview->delete();

        return redirect()->route('lnfpForm8Index')->with('alert', 'Deleted Successfully!');
    }
}
