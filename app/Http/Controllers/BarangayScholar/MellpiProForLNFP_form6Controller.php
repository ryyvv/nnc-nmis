<?php

namespace App\Http\Controllers\BarangayScholar;

use App\Http\Controllers\Controller;
use App\Models\lnfp_form5a;
use Illuminate\Http\Request;
use App\Models\lnfp_form5a_rr;
use Illuminate\Support\Facades\DB;
use App\Models\lnfp_form7;
use App\Models\lnfp_form8;

class MellpiProForLNFP_form6Controller extends Controller
{
    //
    //Form 6 Radial Diagram
    public function radialForm6()
    {
        $form6 = DB::table('lnfp_form7')
        ->join('lnfp_form5a_rr', 'lnfp_form5a_rr.id', '=', 'lnfp_form7.form5_id')
        ->select('lnfp_form7.*', 
                 'lnfp_form5a_rr.periodCovereda as periodCovereda',
                 'lnfp_form5a_rr.nameofPnao as nameofPnao',
                 'lnfp_form5a_rr.dateMonitoring as dateMonitoring',
                 'lnfp_form5a_rr.id as form5_id')
        ->get();

        return view('BarangayScholar/MellpiProForLNFP/MellpiProRadialDiagram.RadialForm6Index', ['form6' => $form6]);
    }
    public function radialForm6Create(Request $request)
    {
        $form6 = DB::table('lnfp_form7')
        ->join('lnfp_form5a_rr', 'lnfp_form5a_rr.id', '=', 'lnfp_form7.form5_id')
        ->select('lnfp_form7.*', 
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
                 'lnfp_form5a_rr.periodCovereda as periodCovereda',
                 'lnfp_form5a_rr.nameofPnao as nameofPnao',
                 'lnfp_form5a_rr.address as address',
                 'lnfp_form5a_rr.dateMonitoring as dateMonitoring',
                 'lnfp_form5a_rr.id as form5_id')
        ->where('lnfp_form7.id', $request->id)
        ->first();

        return view('BarangayScholar/MellpiProForLNFP/MellpiProRadialDiagram.RadialForm6Create', ['form6' => $form6]);
    }
    public function storeform7(Request $request, $id)
    {
        //dd($request);

        $updateData = [
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
        ];

        if( $request->formrequest == 'draft' ){
            lnfp_form7::where('id', $id)->update( $updateData + [
                    'status' => 2,
            ]);

        }else{

            lnfp_form7::where('id', $id)->update( $updateData + [
                'status' => 1,
        ]);

        $lnfp_form8 = lnfp_form8::where('form7_id', $id)->first();

        if( $lnfp_form8 == null ){
            $lnfp_form8 = lnfp_form8::create([
                'form7_id' => $id,
                'status'   => 2,
                'lnfp_lgu_id' => $request->lnfp_lgu_id,
            ]);

        }

        return redirect()->route('editForm8',  $lnfp_form8->id)->with('success', 'Data created successfully!');


        }

        return redirect()->back()->with('success', 'Data Added Successfully!');
    }
}
