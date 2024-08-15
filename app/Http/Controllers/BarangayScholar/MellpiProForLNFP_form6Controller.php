<?php

namespace App\Http\Controllers\BarangayScholar;

use App\Http\Controllers\Controller;
use App\Models\lnfp_form5a;
use Illuminate\Http\Request;
use App\Models\lnfp_form5a_rr;
use Illuminate\Support\Facades\DB;
use App\Models\lnfp_form7;

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
    public function storeform7(Request $request, $id)
    {
        $LNFPform7 = lnfp_form7::where('form5_id', $id)->update([
            'accomplishmentA' => $request->input('AccomplishA'),
            'accomplishmentB' => $request->input('AccomplishB'),
            'accomplishmentC' => $request->input('AccomplishC'),
            'accomplishmentD' => $request->input('AccomplishD'),
            'accomplishmentE' => $request->input('AccomplishE'),
            'accomplishmentF' => $request->input('AccomplishF'),
            'accomplishmentG' => $request->input('AccomplishG'),
            'accomplishmentH' => $request->input('AccomplishH'),
            'accomplishmentI' => $request->input('AccomplishI'),
            'goodPracA' => $request->input('GoodPracA'),
            'goodPracB' => $request->input('GoodPracB'),
            'goodPracC' => $request->input('GoodPracC'),
            'goodPracD' => $request->input('GoodPracD'),
            'goodPracE' => $request->input('GoodPracE'),
            'goodPracF' => $request->input('GoodPracF'),
            'goodPracG' => $request->input('GoodPracG'),
            'goodPracH' => $request->input('GoodPracH'),
            'goodPracI' => $request->input('GoodPracI'),
            'issuesA' => $request->input('IssuesA'),
            'issuesB' => $request->input('IssuesB'),
            'issuesC' => $request->input('IssuesC'),
            'issuesD' => $request->input('IssuesD'),
            'issuesE' => $request->input('IssuesE'),
            'issuesF' => $request->input('IssuesF'),
            'issuesG' => $request->input('IssuesG'),
            'issuesH' => $request->input('IssuesH'),
            'issuesI' => $request->input('IssuesI'),
            'actionsA' => $request->input('ActionsA'),
            'actionsB' => $request->input('ActionsB'),
            'actionsC' => $request->input('ActionsC'),
            'actionsD' => $request->input('ActionsD'),
            'actionsE' => $request->input('ActionsE'),
            'actionsF' => $request->input('ActionsF'),
            'actionsG' => $request->input('ActionsG'),
            'actionsH' => $request->input('ActionsH'),
            'actionsI' => $request->input('ActionsI'),
        ]);

        return redirect()->back()->with('success', 'Data Added Successfully!');
    }
}
