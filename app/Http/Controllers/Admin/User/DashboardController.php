<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\LocationController;

class DashboardController extends Controller
{
    public function index() {
        $location = new LocationController;
        $regCode = auth()->user()->Region;
        $provCode = auth()->user()->Province;
        $citymunCode = auth()->user()->city_municipal;
        $provinces = $location->getProvinces(['reg_code' => $regCode]);
        $cities_municipalities = $location->getCitiesAndMunicipalities(['prov_code' => $provCode]);
        $barangays = $location->getBarangays(['citymun_code' => $citymunCode]);

        $barangay = auth()->user()->barangay;
        $lguProfile = DB::table('lguprofilebarangay')->where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->get();
        
        $datas = DB::table('lnfp_lguprofile')
            ->leftJoin('lnfp_form5a_rr', 'lnfp_form5a_rr.lnfp_lgu_id', '=', 'lnfp_lguprofile.id')
            ->leftJoin('lnfp_form7', 'lnfp_form7.lnfp_lgu_id', '=', 'lnfp_lguprofile.id')
            ->leftJoin('lnfp_form8', 'lnfp_form8.lnfp_lgu_id', '=', 'lnfp_lguprofile.id')
            ->leftJoin('lnfp_interview_form','lnfp_interview_form.lnfp_lgu_id', '=' , 'lnfp_lguprofile.id' )
            ->leftJoin('lnfp_overall_score_form','lnfp_overall_score_form.lnfp_lgu_id', '=' , 'lnfp_lguprofile.id' )
            ->select('lnfp_lguprofile.*')
            ->where('lnfp_lguprofile.user_id', auth()->user()->id)
            ->get();
 
        return view('users.dashboard', ['datas' => $datas]);
        
    }

    public function rep() {

        $data = DB::table('lnfp_lguprofile')
        ->leftJoin('lnfp_form5a_rr', 'lnfp_form5a_rr.lnfp_lgu_id', '=', 'lnfp_lguprofile.id')
        ->leftJoin('lnfp_form7', 'lnfp_form7.lnfp_lgu_id', '=', 'lnfp_lguprofile.id')
        ->leftJoin('lnfp_form8', 'lnfp_form8.lnfp_lgu_id', '=', 'lnfp_lguprofile.id')
        ->leftJoin('lnfp_interview_form','lnfp_interview_form.lnfp_lgu_id', '=' , 'lnfp_lguprofile.id' )
        ->leftJoin('lnfp_overall_score_form','lnfp_overall_score_form.lnfp_lgu_id', '=' , 'lnfp_lguprofile.id' )
        ->select('lnfp_lguprofile.*',
                 'lnfp_form5a_rr.nameofPnao as evaluating',
                 'lnfp_form5a_rr.updated_at as update_form5',
                 'lnfp_form5a_rr.status as form5_status',
                 'lnfp_form7.updated_at as update_form7',
                 'lnfp_form7.status as form7_status',
                 'lnfp_form8.updated_at as update_form8',
                 'lnfp_form8.status as form8_status',
                 'lnfp_interview_form.updated_at as update_formInt',
                 'lnfp_interview_form.status as formInt_status',
                 'lnfp_overall_score_form.updated_at as update_formScore',
                 'lnfp_overall_score_form.status as formScore_status',
                 )
        ->where('lnfp_lguprofile.user_id', auth()->user()->id)
        ->orderBy('lnfp_lguprofile.updated_at','DESC')
        ->get();

        // $data = [
        //     ['id' => 1, 'lnfp_officer' => 'John Doe', 'email' => 'john@example.com', 'created_at' => '2024-09-21'],
        //     ['id' => 2, 'lnfp_officer' => 'Jane Smith', 'email' => 'jane@example.com', 'created_at' => '2024-09-20']
        // ];

                //dd($data); 
        return response()->json(['data' => $data]);
            

    }

  

}
