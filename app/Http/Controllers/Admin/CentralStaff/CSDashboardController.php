<?php

namespace App\Http\Controllers\Admin\CentralStaff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CSDashboardController extends Controller
{
     public function index (){
        return view('CentralStaff.dashboard');
     }
}
