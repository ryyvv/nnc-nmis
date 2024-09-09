<?php

namespace App\Http\Controllers\Admin\BarangayScholar;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
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
        ->where('lnfp_form7.user_id', auth()->user()->id)
        ->get();

        return view('BarangayScholar/MellpiProForLNFP/MellpiProRadialDiagram.RadialForm6Index', ['form6' => $form6]);
    }

    public function radialForm6View(Request $request)
    {

        $availableForms = $this->access_header();
        $form6 = DB::table('lnfp_form7')
        ->leftjoin('lnfp_form5a_rr', 'lnfp_form5a_rr.id', '=', 'lnfp_form7.form5_id')
        ->leftjoin('lnfp_form8', 'lnfp_form8.form7_id', '=', 'lnfp_form7.id')
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
                 'lnfp_form5a_rr.id as form5_id',
                 'lnfp_form8.id as form8_id',
                 'lnfp_form8.status as form8_status')
        ->where('lnfp_form7.id', $request->id)
        ->first();

        return view('BarangayScholar/MellpiProForLNFP/MellpiProRadialDiagram.Form6View', ['form6' => $form6, 'availableForms' => $availableForms ]);
    }

    public function radialForm6Create(Request $request)
    {

        $availableForms = $this->access_header();

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

        return view('BarangayScholar/MellpiProForLNFP/MellpiProRadialDiagram.RadialForm6Create', ['form6' => $form6, 'availableForms' => $availableForms]);
    }

    
    public function storeform7(Request $request, $id)
    {
        //dd($request);

        $fields = $this->access_fields($request);

        if( $request->formrequest == 'draft' ){
            lnfp_form7::where('id', $id)->update( $fields + [
                    'status' => 2,
            ]);

            return redirect()->back()->with('success', 'Data Added Successfully!');

        }else{
            // dd($request);
            $rules = $this->access_rules();


            $messages = [
                'required' => 'The :attribute field is required.',
                'integer' => 'The :attribute field must be an integer.',
                'string' => 'The :attribute field must be a string.',
                'date' => 'The :attribute field must be a valid date.',
                'max' => 'The :attribute field may not be greater than :max characters.',
                'mimes' => 'The :attribute field must be a file of type: :values.',
                'file' => 'The :attribute field must be a valid file.',
            ];
    
            $input = $request->all();
    
            $validator = Validator::make($input, $rules, $messages);
    
            if ($validator->fails()) {
                Log::error($validator->errors());
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput()
                    ->with('error', 'Something went wrong! Please try again.');
            }else{

            lnfp_form7::where('id', $id)->update( $fields + [ 'status' => 1, ]);

            $lnfp_form8 = lnfp_form8::create([
                'form7_id' => $id,
                'status'   => 2,
                'lnfp_lgu_id' => $request->lnfp_lgu_id,
                'user_id'   => auth()->user()->id,
            ]);


                return redirect()->route('editForm8',  $lnfp_form8->id)->with('success', 'Data stored successfully! You can now create Form 8');

                }
        }

       
    }

    public function access_rules(){

        $rules = [
            'header' => 'required'
        ];


        return $rules;

    }


    public static function access_fields($request){

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
            'header6'  => $request->header,
            'user_id' => auth()->user()->id,
        ];

        return $updateData;

    }

    public static function access_header(){
        $userLevel = auth()->user()->otherrole;

        switch ($userLevel) {
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
                ];
                break;
    
            default:
                $availableForms = [];
                break;
        }

        return $availableForms;

    }

}
