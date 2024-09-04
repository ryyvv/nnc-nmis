<?php

namespace App\Http\Controllers\ProvincialOfficer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PODashboardController extends Controller
{
     public function index (){
        return view('ProvincialOfficer.dashboard');
     }
}
