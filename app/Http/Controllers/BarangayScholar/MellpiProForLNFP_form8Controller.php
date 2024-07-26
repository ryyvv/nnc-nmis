<?php

namespace App\Http\Controllers\BarangayScholar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MellpiProForLNFP_form8Controller extends Controller
{
    //
    public function ActionSheetForm8()
    {
        return view('BarangayScholar/MellpiProForLNFP/MellpiProActionSheet/ActionSheetForm8Index');
    }
    public function ActionSheetForm8Create()
    {
        return view('BarangayScholar/MellpiProForLNFP/MellpiProActionSheet/ActionSheetForm8Create');
    }
}
