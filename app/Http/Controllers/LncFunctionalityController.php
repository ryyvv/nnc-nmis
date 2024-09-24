<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LncFunctionalityController extends Controller
{
    public function index()
    {
        return view('checklist_func_provincial.index');
    }

    public function create()
    {
        return view('checklist_func_provincial.create');
    }
}