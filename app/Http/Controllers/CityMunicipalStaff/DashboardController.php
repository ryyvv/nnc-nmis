<?php

namespace App\Http\Controllers\CityMunicipalStaff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()  {
        return view('CityMunicipalStaff.dashboard');
    }
};
