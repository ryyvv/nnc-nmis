<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\LocationController;
use App\Models\LncFunctionality;

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

    public function lnc() {
        $location = new LocationController;
        $regCode = auth()->user()->Region;
        $provCode = auth()->user()->Province;
        $citymunCode = auth()->user()->city_municipal;

        $lncTotals = [
            'totalCityCount' => 0,
            'totalCityFullyFunctional' => 0,
            'totalCitySubstantiallyFunctional' => 0,
            'totalCityPartiallyFunctional' => 0,
            'totalCityNonFunctional' => 0,
            'totalMunicipalityCount' => 0,
            'totalMunicipalityFullyFunctional' => 0,
            'totalMunicipalitySubstantiallyFunctional' => 0,
            'totalMunicipalityPartiallyFunctional' => 0,
            'totalMunicipalityNonFunctional' => 0,
            // Separate totals for HUC, CC, ICC functionalities
            'totalHUCCount' => 0,
            'totalHUCFullyFunctional' => 0,
            'totalHUCSubstantiallyFunctional' => 0,
            'totalHUCPartiallyFunctional' => 0,
            'totalHUCNonFunctional' => 0,
            'totalCCCount' => 0,
            'totalCCFullyFunctional' => 0,
            'totalCCSubstantiallyFunctional' => 0,
            'totalCCPartiallyFunctional' => 0,
            'totalCCNonFunctional' => 0,
            'totalICCCount' => 0,
            'totalICCFullyFunctional' => 0,
            'totalICCSubstantiallyFunctional' => 0,
            'totalICCPartiallyFunctional' => 0,
            'totalICCNonFunctional' => 0, 
            //Indicators
            // HUC AND ICC
            'totalHUCCDCount' => 0,
            'totalHUCPP1ACount' => 0,
            'totalHUCPP1BCount' => 0,
            'totalHUCPP2ACount' => 0,
            'totalHUCPP2BCount' => 0,
            'totalHUCPP3ACount' => 0,
            'totalHUCPP3BCount' => 0,
            'totalHUCPP4ACount' => 0,
            'totalHUCNSDCount' => 0,
            'totalHUCME1Count' => 0,
            'totalHUCME2Count' => 0,
            'totalHUCME3Count' => 0,
            // HUC AND ICC
            'totalICCCDCount' => 0,
            'totalICCPP1ACount' => 0,
            'totalICCPP1BCount' => 0,
            'totalICCPP2ACount' => 0,
            'totalICCPP2BCount' => 0,
            'totalICCPP3ACount' => 0,
            'totalICCPP3BCount' => 0,
            'totalICCPP4ACount' => 0,
            'totalICCNSDCount' => 0,
            'totalICCME1Count' => 0,
            'totalICCME2Count' => 0,
            'totalICCME3Count' => 0,
            // CC
            'totalCCCDCount' => 0,
            'totalCCPP1ACount' => 0,
            'totalCCPP1BCount' => 0,
            'totalCCPP2ACount' => 0,
            'totalCCPP2BCount' => 0,
            'totalCCPP3ACount' => 0,
            'totalCCPP3BCount' => 0,
            'totalCCPP4ACount' => 0,
            'totalCCNSDCount' => 0,
            'totalCCME1Count' => 0,
            'totalCCME2Count' => 0,
            'totalCCME3Count' => 0,
            // Municipality
            'totalMunicipalityCDCount' => 0,
            'totalMunicipalityPP1ACount' => 0,
            'totalMunicipalityPP1BCount' => 0,
            'totalMunicipalityPP2ACount' => 0,
            'totalMunicipalityPP2BCount' => 0,
            'totalMunicipalityPP3ACount' => 0,
            'totalMunicipalityPP3BCount' => 0,
            'totalMunicipalityPP4ACount' => 0,
            'totalMunicipalityNSDCount' => 0,
            'totalMunicipalityME1Count' => 0,
            'totalMunicipalityME2Count' => 0,
            'totalMunicipalityME3Count' => 0,
        ];

        $results = LncFunctionality::selectRaw("
                reg_code,
                geographic_level,
                COUNT(*) as total_count,
                SUM(CASE WHEN functionality = 'Fully Functional' THEN 1 ELSE 0 END) as fully_functional,
                SUM(CASE WHEN functionality = 'Substantially Functional' THEN 1 ELSE 0 END) as substantially_functional,
                SUM(CASE WHEN functionality = 'Partially Functional' THEN 1 ELSE 0 END) as partially_functional,
                SUM(CASE WHEN functionality = 'Non-Functional' THEN 1 ELSE 0 END) as non_functional,
                SUM(cd) as cd_count,
                SUM(pp1a) as pp1a_count,
                SUM(pp1b) as pp1b_count,
                SUM(pp2a) as pp2a_count,
                SUM(pp2b) as pp2b_count,
                SUM(pp3a) as pp3a_count,
                SUM(pp3b) as pp3b_count,
                SUM(pp4a) as pp4a_count,
                SUM(nsd) as nsd_count,
                SUM(me1) as me1_count,
                SUM(me2) as me2_count,
                SUM(me3) as me3_count
            ")
            ->where('reg_code', $regCode)
            // ->where('prov_code', $provCode)
            // ->where('citymun_code', $citymunCode)
            ->whereIn('geographic_level', ['CC', 'HUC', 'ICC', 'Mun'])
            ->groupBy('reg_code', 'geographic_level')
            ->get();

        foreach ($results as $result) {
            switch ($result->geographic_level) {
                case 'CC':
                    $lncTotals['totalCityCount'] += $result->total_count;
                    $lncTotals['totalCityFullyFunctional'] += $result->fully_functional;
                    $lncTotals['totalCitySubstantiallyFunctional'] += $result->substantially_functional;
                    $lncTotals['totalCityPartiallyFunctional'] += $result->partially_functional;
                    $lncTotals['totalCityNonFunctional'] += $result->non_functional;

                    $lncTotals['totalCCCount'] += $result->total_count;
                    $lncTotals['totalCCFullyFunctional'] += $result->fully_functional;
                    $lncTotals['totalCCSubstantiallyFunctional'] += $result->substantially_functional;
                    $lncTotals['totalCCPartiallyFunctional'] += $result->partially_functional;
                    $lncTotals['totalCCNonFunctional'] += $result->non_functional;

                    $lncTotals['totalCCCDCount'] += $result->cd_count;
                    $lncTotals['totalCCPP1ACount'] += $result->pp1a_count;
                    $lncTotals['totalCCPP1BCount'] += $result->pp1b_count;
                    $lncTotals['totalCCPP2ACount'] += $result->pp2a_count;
                    $lncTotals['totalCCPP2BCount'] += $result->pp2b_count;
                    $lncTotals['totalCCPP3ACount'] += $result->pp3a_count;
                    $lncTotals['totalCCPP3BCount'] += $result->pp3b_count;
                    $lncTotals['totalCCPP4ACount'] += $result->pp4a_count;
                    $lncTotals['totalCCNSDCount'] += $result->nsd_count;
                    $lncTotals['totalCCME1Count'] += $result->me1_count;
                    $lncTotals['totalCCME2Count'] += $result->me2_count;
                    $lncTotals['totalCCME3Count'] += $result->me3_count;
                    break;
                case 'HUC':
                    $lncTotals['totalCityCount'] += $result->total_count;
                    $lncTotals['totalCityFullyFunctional'] += $result->fully_functional;
                    $lncTotals['totalCitySubstantiallyFunctional'] += $result->substantially_functional;
                    $lncTotals['totalCityPartiallyFunctional'] += $result->partially_functional;
                    $lncTotals['totalCityNonFunctional'] += $result->non_functional;

                    $lncTotals['totalHUCCount'] += $result->total_count;
                    $lncTotals['totalHUCFullyFunctional'] += $result->fully_functional;
                    $lncTotals['totalHUCSubstantiallyFunctional'] += $result->substantially_functional;
                    $lncTotals['totalHUCPartiallyFunctional'] += $result->partially_functional;
                    $lncTotals['totalHUCNonFunctional'] += $result->non_functional;

                    $lncTotals['totalHUCCDCount'] += $result->cd_count;
                    $lncTotals['totalHUCPP1ACount'] += $result->pp1a_count;
                    $lncTotals['totalHUCPP1BCount'] += $result->pp1b_count;
                    $lncTotals['totalHUCPP2ACount'] += $result->pp2a_count;
                    $lncTotals['totalHUCPP2BCount'] += $result->pp2b_count;
                    $lncTotals['totalHUCPP3ACount'] += $result->pp3a_count;
                    $lncTotals['totalHUCPP3BCount'] += $result->pp3b_count;
                    $lncTotals['totalHUCPP4ACount'] += $result->pp4a_count;
                    $lncTotals['totalHUCNSDCount'] += $result->nsd_count;
                    $lncTotals['totalHUCME1Count'] += $result->me1_count;
                    $lncTotals['totalHUCME2Count'] += $result->me2_count;
                    $lncTotals['totalHUCME3Count'] += $result->me3_count;
                    break;
                case 'ICC':
                    $lncTotals['totalCityCount'] += $result->total_count;
                    $lncTotals['totalCityFullyFunctional'] += $result->fully_functional;
                    $lncTotals['totalCitySubstantiallyFunctional'] += $result->substantially_functional;
                    $lncTotals['totalCityPartiallyFunctional'] += $result->partially_functional;
                    $lncTotals['totalCityNonFunctional'] += $result->non_functional;

                    $lncTotals['totalICCCount'] += $result->total_count;
                    $lncTotals['totalICCFullyFunctional'] += $result->fully_functional;
                    $lncTotals['totalICCSubstantiallyFunctional'] += $result->substantially_functional;
                    $lncTotals['totalICCPartiallyFunctional'] += $result->partially_functional;
                    $lncTotals['totalICCNonFunctional'] += $result->non_functional;

                    $lncTotals['totalICCCDCount'] += $result->cd_count;
                    $lncTotals['totalICCPP1ACount'] += $result->pp1a_count;
                    $lncTotals['totalICCPP1BCount'] += $result->pp1b_count;
                    $lncTotals['totalICCPP2ACount'] += $result->pp2a_count;
                    $lncTotals['totalICCPP2BCount'] += $result->pp2b_count;
                    $lncTotals['totalICCPP3ACount'] += $result->pp3a_count;
                    $lncTotals['totalICCPP3BCount'] += $result->pp3b_count;
                    $lncTotals['totalICCPP4ACount'] += $result->pp4a_count;
                    $lncTotals['totalICCNSDCount'] += $result->nsd_count;
                    $lncTotals['totalICCME1Count'] += $result->me1_count;
                    $lncTotals['totalICCME2Count'] += $result->me2_count;
                    $lncTotals['totalICCME3Count'] += $result->me3_count;
                    break;
                case 'Mun':
                    $lncTotals['totalMunicipalityCount'] += $result->total_count;
                    $lncTotals['totalMunicipalityFullyFunctional'] += $result->fully_functional;
                    $lncTotals['totalMunicipalitySubstantiallyFunctional'] += $result->substantially_functional;
                    $lncTotals['totalMunicipalityPartiallyFunctional'] += $result->partially_functional;
                    $lncTotals['totalMunicipalityNonFunctional'] += $result->non_functional;

                    $lncTotals['totalMunicipalityCDCount'] += $result->cd_count;
                    $lncTotals['totalMunicipalityPP1ACount'] += $result->pp1a_count;
                    $lncTotals['totalMunicipalityPP1BCount'] += $result->pp1b_count;
                    $lncTotals['totalMunicipalityPP2ACount'] += $result->pp2a_count;
                    $lncTotals['totalMunicipalityPP2BCount'] += $result->pp2b_count;
                    $lncTotals['totalMunicipalityPP3ACount'] += $result->pp3a_count;
                    $lncTotals['totalMunicipalityPP3BCount'] += $result->pp3b_count;
                    $lncTotals['totalMunicipalityPP4ACount'] += $result->pp4a_count;
                    $lncTotals['totalMunicipalityNSDCount'] += $result->nsd_count;
                    $lncTotals['totalMunicipalityME1Count'] += $result->me1_count;
                    $lncTotals['totalMunicipalityME2Count'] += $result->me2_count;
                    $lncTotals['totalMunicipalityME3Count'] += $result->me3_count;
                    break;
            }
        }

        $lncTotals['grandTotal'] = $lncTotals['totalCityCount'] + $lncTotals['totalMunicipalityCount'];
        $lncTotals['grandTotalFullyFunctional'] = $lncTotals['totalCityFullyFunctional'] + $lncTotals['totalMunicipalityFullyFunctional'];
        $lncTotals['grandTotalSubstantiallyFunctional'] = $lncTotals['totalCitySubstantiallyFunctional'] + $lncTotals['totalMunicipalitySubstantiallyFunctional'];
        $lncTotals['grandTotalPartiallyFunctional'] = $lncTotals['totalCityPartiallyFunctional'] + $lncTotals['totalMunicipalityPartiallyFunctional'];
        $lncTotals['grandTotalNonFunctional'] = $lncTotals['totalCityNonFunctional'] + $lncTotals['totalMunicipalityNonFunctional'];

        return response()->json($lncTotals);
            

    }
}