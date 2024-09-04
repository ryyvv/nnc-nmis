<?php

namespace App\Http\Controllers\RegionalStaff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RSDashboardController extends Controller
{
     public function index (){
        return view('RegionalStaff.dashboard');
     }
}
