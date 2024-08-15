<?php

namespace App\Http\Controllers\UserUnderReview;

use App\Http\Controllers\Controller; 

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserReviewController extends Controller
{
    //list all users fuction
    public function index() {
        return view('DashboardApproval');
    }

     //delete users function

   

    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    // public function index(User $model)
    // {
    //     return view('users.index', ['users' => $model->paginate(15)]);
    // }
}
