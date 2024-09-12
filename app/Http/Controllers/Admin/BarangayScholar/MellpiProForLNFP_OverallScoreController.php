<?php

namespace App\Http\Controllers\Admin\BarangayScholar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\lnfp_formOverall;
use App\Models\lnfp_form5a_rr;
use App\Models\lnfp_form7;
use App\Models\lnfp_form8;
use App\Models\lnfp_formInterview;
use App\Models\lnfp_lguprofile;
use App\Services\StatusUpdateService;
use App\Http\Controllers\Admin\BarangayScholar\MellpiProForLNFP_InterviewController;


class MellpiProForLNFP_OverallScoreController extends Controller
{
    protected $statusUpdateService;

    public function __construct(StatusUpdateService $statusUpdateService)
    {
        
        $this->statusUpdateService = $statusUpdateService;
    }
    //
    public function OverallScoreFormLNFP()
    {
        $overallScore = DB::table('lnfp_overall_score_form')
        ->join('lnfp_form5a_rr', 'lnfp_overall_score_form.form5_id', '=', 'lnfp_form5a_rr.id')
        ->join('lnfp_interview_form', 'lnfp_overall_score_form.formInterview_id', '=', 'lnfp_interview_form.id')
        ->join('lnfp_form8', 'lnfp_overall_score_form.form8_id', '=', 'lnfp_form8.id')
        ->select(
            'lnfp_overall_score_form.id as overallId',
            'lnfp_overall_score_form.status as status',
            'lnfp_overall_score_form.date as dateOver',
            'lnfp_form5a_rr.nameofPnao as pnaoName',
            'lnfp_interview_form.header as interview_header'
        )
        ->where('lnfp_overall_score_form.user_id', auth()->user()->id )
        ->get();
        return view('BarangayScholar/MellpiProForLNFP/MellpiProOverallScore/OverallScoreFormPNAOIndex', ['overallScore' => $overallScore]);
    }

    public function OverallScoreFormLNFPView(Request $request)
    {

        $header = new MellpiProForLNFP_InterviewController;
        $availableForms = $header->access_header();
        $overallScore = DB::table('lnfp_overall_score_form')
        ->join('lnfp_form5a_rr', 'lnfp_overall_score_form.form5_id', '=', 'lnfp_form5a_rr.id')
        ->join('lnfp_interview_form', 'lnfp_overall_score_form.formInterview_id', '=', 'lnfp_interview_form.id')
        ->join('lnfp_form8', 'lnfp_overall_score_form.form8_id', '=', 'lnfp_form8.id')
        ->select(
            'lnfp_overall_score_form.id as overallId',
            'lnfp_overall_score_form.date as dateOver',
            'lnfp_form5a_rr.nameofPnao as pnaoName',
            'lnfp_form5a_rr.address as pnaoAddress',
            'lnfp_form5a_rr.ratingA as ratingA' ,
            'lnfp_form5a_rr.ratingB as ratingB' ,
            'lnfp_form5a_rr.ratingB as ratingBB' ,
            'lnfp_form5a_rr.ratingC as ratingC' ,
            'lnfp_form5a_rr.ratingD as ratingD' ,
            'lnfp_form5a_rr.ratingE as ratingE' ,
            'lnfp_form5a_rr.ratingF as ratingF' ,
            'lnfp_form5a_rr.ratingG as ratingG' ,
            'lnfp_form5a_rr.ratingG as ratingGG' ,
            'lnfp_form5a_rr.ratingH as ratingH' ,
            'lnfp_interview_form.id as interview_id',
            'lnfp_interview_form.header as interview_header',
            'lnfp_interview_form.subtotalAScore as intSubtotal',
            'lnfp_form8.*'
        )
        ->where('lnfp_overall_score_form.id', $request->id)
        ->first();
        // dd($overallScore);

        return view('BarangayScholar/MellpiProForLNFP/MellpiProOverallScore/View', ['overallScore' => $overallScore, 'availableForms' => $availableForms]);
    }


    public function OverallScoreFormLNFPEdit(Request $request)
    {
        $header = new MellpiProForLNFP_InterviewController;
        $availableForms = $header->access_header();
        $overallScore = DB::table('lnfp_overall_score_form')
        ->join('lnfp_form5a_rr', 'lnfp_overall_score_form.form5_id', '=', 'lnfp_form5a_rr.id')
        ->join('lnfp_interview_form', 'lnfp_overall_score_form.formInterview_id', '=', 'lnfp_interview_form.id')
        ->join('lnfp_form8', 'lnfp_overall_score_form.form8_id', '=', 'lnfp_form8.id')
        ->select(
            'lnfp_overall_score_form.id as overallId',
            'lnfp_overall_score_form.date as dateOver',
            'lnfp_form5a_rr.nameofPnao as pnaoName',
            'lnfp_form5a_rr.address as pnaoAddress',
            'lnfp_form5a_rr.ratingA as ratingA' ,
            'lnfp_form5a_rr.ratingB as ratingB' ,
            'lnfp_form5a_rr.ratingB as ratingBB' ,
            'lnfp_form5a_rr.ratingC as ratingC' ,
            'lnfp_form5a_rr.ratingD as ratingD' ,
            'lnfp_form5a_rr.ratingE as ratingE' ,
            'lnfp_form5a_rr.ratingF as ratingF' ,
            'lnfp_form5a_rr.ratingG as ratingG' ,
            'lnfp_form5a_rr.ratingG as ratingGG' ,
            'lnfp_form5a_rr.ratingH as ratingH' ,
            'lnfp_interview_form.header as interview_header',
            'lnfp_interview_form.subtotalAScore as intSubtotal',
            'lnfp_form8.*'
        )
        ->where('lnfp_overall_score_form.id', $request->id)
        ->first();
        // dd($overallScore);

        return view('BarangayScholar/MellpiProForLNFP/MellpiProOverallScore/OverallScoreFormPNAOEdit', ['overallScore' => $overallScore, 'availableForms' => $availableForms]);
    }

    public function update(Request $request)
    {
        $fields = $this->access_fields($request);

        if( $request->formrequest == 'submit' ){
        try {
           
            $rules = $this->access_rules();

            $message = [
                'required' => 'The field is required.',
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
                
                lnfp_formOverall::where('id', $request->id)->update( $fields + [ 'status' => 1 ]);

               // Call the service to update statuses
               $this->statusUpdateService->updateStatuses($request->lnfp_lgu_id);
            
                return redirect()->route('lnfpFormOverallScoreIndex')->with('success', 'Data Submitted successfully!');
            
            }   

        }catch (\Throwable $th) {
            //throw $th;
            return "An error occured: " . $th->getMessage();
        }
        
    
        }else{

            lnfp_formOverall::where('id', $request->id)->update( $fields + [ 'status' => 2 ]);


            return redirect()->back()->with('success', 'Data Updated Successfully!');

        }
    
    }

    public static function access_rules(){
        $rules = [
            'dateOS' => 'required',
        ];

        return $rules;
    }

    public static function access_fields($request){
            $updateData = [
                'name' => $request->nameOf,
                'areaOfAssign' => $request->areaAssign,
                'date'  => $request->dateOS,
                'pointsP1AS' => $request->pointsP1AS,
                'pointsP2AS' => $request->pointsP2AS,
                'scoreP1AS' => $request->scoreP1AS,
                'scoreP2AS' => $request->scoreP2AS,
                'totalScoreAS' => $request->totalScoreAS,
                'nameTM1' => $request->nameTM1,
                'nameTM2' => $request->nameTM2,
                'nameTM3' => $request->nameTM3,
                'desigOffice1' => $request->desigOffice1,
                'desigOffice2' => $request->desigOffice2,
                'desigOffice3' => $request->desigOffice3,
                'receivedBy' => $request->receivedBy,
                'whatDate' => $request->whatDate,
                'user_id' => auth()->user()->id,
            ];

            return $updateData;
    }
}
