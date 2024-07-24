<?php

namespace App\Http\Controllers\BarangayScholar;

use App\Http\Controllers\Controller;
use App\Models\lnfp_form5a;
use Illuminate\Http\Request;
use App\Models\lnfp_form5a_rr;
use Illuminate\Support\Facades\DB;

class MellpiProForLNFP_form6Controller extends Controller
{
    //
    //Form 6 Radial Diagram
    public function radialForm6()
    {
        $form6 = lnfp_form5a_rr::where('status', 1)->get();

        return view('BarangayScholar/MellpiProForLNFP/MellpiProRadialDiagram.RadialForm6Index', ['form6' => $form6]);
    }
    public function radialForm6Create(Request $request)
    {
        $form6 = DB::table('lnfp_form5a_rr')
        ->join('lnfp_form7', 'lnfp_form5a_rr.id', '=', 'lnfp_form7.form5_id')
        ->where('lnfp_form5a_rr.id', $request->id)
        ->first();

        return view('BarangayScholar/MellpiProForLNFP/MellpiProRadialDiagram.RadialForm6Create', ['form6' => $form6]);
    }
}
