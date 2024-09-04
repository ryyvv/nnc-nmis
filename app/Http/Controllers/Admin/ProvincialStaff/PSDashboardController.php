<?php

namespace App\Http\Controllers\ProvincialStaff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PSDashboardController extends Controller
{
     public function index (){
        return view('ProvincialStaff.dashboard');
     }
}
