<?php

namespace App\Http\Controllers\CityMunicipalOfficer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CMODashboardController extends Controller
{
    public function index()  {
        return view('CityMunicipalOfficer.dashboard');
    }
};
