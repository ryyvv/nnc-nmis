<?php

namespace App\Http\Controllers\Admin\BarangayScholar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MellpiProForLNFP_SummaryController extends Controller
{
    /**
     * 
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {

        $lnfpProfile = DB::table('users')
            ->join('lnfp_lguprofile', 'users.id', '=', 'lnfp_lguprofile.user_id')
            ->join('lnfp_form5a_rr', 'lnfp_form5a_rr.lnfp_lgu_id', '=', 'lnfp_lguprofile.id' )
            ->where('lnfp_lguprofile.user_id', auth()->user()->id)->orderBy('id', 'DESC')
            ->where('lnfp_lguprofile.status', 1)
            ->select('users.Firstname as firstname', 
                     'users.Middlename as middlename', 
                     'users.Lastname as lastname',
                     'lnfp_form5a_rr.nameofPnao as nameof', 
                     'lnfp_lguprofile.*')
            ->get();

        return view('BarangayScholar.MellpiProForLNFP.MellpiProLNFPSummary.LNFPSummaryView', [
            'activePage' => 'mellpi_pro_summary', 
            'lnfpProfiles' => $lnfpProfile
        ]);
    }
}
