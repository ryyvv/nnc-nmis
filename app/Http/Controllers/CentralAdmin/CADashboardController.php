<?php

namespace App\Http\Controllers\CentralAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CADashboardController extends Controller
{
     public function index (){
        return view('CentralAdmin.dashboard');
     }
}
