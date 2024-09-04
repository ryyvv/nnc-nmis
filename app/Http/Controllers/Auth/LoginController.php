<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    //protected $redirectTo = 'CentralOfficer/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
 
    protected function authenticated(Request $request, $user)
    {

         $roles = DB::table('roles')->where('id',Auth()->user()->role)->first();
        // dd(Auth()->user(), $roles->name);
        //$users  = Auth()->user()->role;
        //dd($roles->name);


        
        if ($roles->name == 'Admin' ) {
            return redirect()->route('dashboard.index');
        } elseif ($roles->name == 'Public Users') {
            return redirect()->route('publicuser.index');
        }elseif ($roles->name == 'User Under Review') {
            return redirect()->route('UURdashboard.index');
        }

        return redirect()->route('home');
    }
}
