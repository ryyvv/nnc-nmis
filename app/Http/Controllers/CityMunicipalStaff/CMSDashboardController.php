<?php

namespace App\Http\Controllers\CityMunicipalStaff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CMSDashboardController extends Controller
{
     public function index (){
        return view('BarangayScholar.dashboard');
     }
}
