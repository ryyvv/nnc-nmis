<?php

namespace App\Http\Controllers\BarangayScholar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MellpiProForLNFP_OverallScoreController extends Controller
{
    //
    public function OverallScoreFormLNFP()
    {
        return view('BarangayScholar/MellpiProForLNFP/MellpiProOverallScore/OverallScoreFormPNAOIndex');
    }
    public function OverallScoreFormLNFPCreate()
    {
        return view('BarangayScholar/MellpiProForLNFP/MellpiProOverallScore/OverallScoreFormPNAOCreate');
    }
}
