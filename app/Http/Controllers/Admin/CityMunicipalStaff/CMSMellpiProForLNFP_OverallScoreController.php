<?php

namespace App\Http\Controllers\Admin\CityMunicipalStaff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\lnfp_formOverall;
use App\Models\lnfp_form5a_rr;

class CMSMellpiProForLNFP_OverallScoreController extends Controller
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
        return view('CityMunicipalStaff/MellpiProForLNFP/MellpiProOverallScore/OverallScoreFormPNAOIndex', ['overallScore' => $overallScore]);
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
            'lnfp_form5a_rr.*',
            'lnfp_interview_form.subtotalAScore as intSubtotal',
            'lnfp_form8.*'
        )
        ->where('lnfp_overall_score_form.id', $request->id)
        ->first();
        // dd($overallScore);

        return view('CityMunicipalStaff/MellpiProForLNFP/MellpiProOverallScore/OverallScoreFormPNAOEdit', ['overallScore' => $overallScore]);
    }
    public function OverallScoreFormLNFPCreate()
    {
        return view('CityMunicipalStaff/MellpiProForLNFP/MellpiProOverallScore/OverallScoreFormPNAOCreate');
    }
}
