<?php

namespace App\Http\Controllers\RegionalOfficer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RODashboardController extends Controller
{
     public function index (){
        return view('RegionalOfficer.dashboard');
     }
}
