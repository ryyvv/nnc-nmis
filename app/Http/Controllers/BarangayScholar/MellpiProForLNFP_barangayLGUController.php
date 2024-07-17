<?php

namespace App\Http\Controllers\BarangayScholar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\lnfp_lguprofile;

class MellpiProForLNFP_barangayLGUController extends Controller
{
    //
    //LGU Profile (LNFP)
    public function index()
    {
        //
        $form5a_rr = lnfp_lguprofile::get();

        return view('BarangayScholar/MellpiProForLNFP/LGUprofile.MellpiProForLNFPIndex', ['form5a_rr' => $form5a_rr]);
        // return view('BarangayScholar/MellpiProForLNFP/LGUprofile.MellpiProForLNFPIndex');
    }
    public function mellpiProLNFP_LGUcreate()
    {
        //
        return view('BarangayScholar/MellpiProForLNFP/LGUprofile.MellpiProForLNFPCreate');
    }
}