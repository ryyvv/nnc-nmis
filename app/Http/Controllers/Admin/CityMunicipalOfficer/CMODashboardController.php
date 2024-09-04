<?php

namespace App\Http\Controllers\Admin\CityMunicipalOfficer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CMODashboardController extends Controller
{
    public function index()  {
        return view('CityMunicipalOfficer.dashboard');
    }
};
