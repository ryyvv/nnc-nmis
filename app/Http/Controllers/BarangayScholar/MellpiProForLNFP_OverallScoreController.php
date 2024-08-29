<?php

namespace App\Http\Controllers\BarangayScholar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\lnfp_formOverall;
use App\Models\lnfp_form5a_rr;

class MellpiProForLNFP_OverallScoreController extends Controller
{
    //
    public function OverallScoreFormLNFP()
    {
        $overallScore = lnfp_formOverall::join('lnfp_lguprofile', 'lnfp_overall_score_form.lnfp_lgu_id', '=', 'lnfp_lguprofile.id')
        ->whereIn('lnfp_overall_score_form.status', [1, 2, 0])
        ->whereNotNull('lnfp_overall_score_form.form8_id')
        ->whereNotNull('lnfp_overall_score_form.formInterview_id')
        ->select(
            'lnfp_overall_score_form.lnfp_officer as os_officer',
            'lnfp_overall_score_form.status as status',
            'lnfp_overall_score_form.id as os_id',

            'lnfp_lguprofile.periodCovereda as lgu_periodCovered'
        )
        ->get();
        return view('BarangayScholar/MellpiProForLNFP/MellpiProOverallScore/OverallScoreFormPNAOIndex', ['overallScore' => $overallScore]);
    }
    public function OverallScoreFormLNFPEdit(Request $request)
    {
        $overallScore = DB::table('lnfp_overall_score_form')
        ->join('lnfp_form5a_rr', 'lnfp_overall_score_form.form5_id', '=', 'lnfp_form5a_rr.id')
        ->join('lnfp_interview_form', 'lnfp_overall_score_form.formInterview_id', '=', 'lnfp_interview_form.id')
        ->join('lnfp_form8', 'lnfp_overall_score_form.form8_id', '=', 'lnfp_form8.id')
        ->select(
            'lnfp_overall_score_form.id as overallId',
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

        return view('BarangayScholar/MellpiProForLNFP/MellpiProOverallScore/OverallScoreFormPNAOEdit', ['overallScore' => $overallScore]);
    }
    public function OverallScoreFormLNFPCreate(Request $request)
    {

        if( $request->formrequest == 'submit' ){
        try {
            $rules = [
                'dateOS' => 'required',
            ];

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
                
                lnfp_formOverall::where('id', $request->id)->update([
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
                    'status' => 1,

                ]);
                
            }

        }catch (\Throwable $th) {
            //throw $th;
            return "An error occured: " . $th->getMessage();
        }

     
        return view('BarangayScholar/MellpiProForLNFP/MellpiProOverallScore/OverallScoreFormPNAOCreate');
        
    
        }else{

        }
    
    }
}
