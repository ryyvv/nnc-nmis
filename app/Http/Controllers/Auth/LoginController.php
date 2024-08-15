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
        if ($roles->name == 'Central Admin' ) {
            return redirect()->route('CAdashboard.index');
        } elseif ($roles->name == 'Central Officer') {
            return redirect()->route('COdashboard.index');
        }
        elseif ($roles->name == 'Central Staff') {
            return redirect()->route('CSdashboard.index');
        }
        elseif ($roles->name == 'Regional Officer') {
            return redirect()->route('ROdashboard.index');
        }
        elseif ($roles->name == 'Regional Staff') {
            return redirect()->route('RSdashboard.index');
        }
        elseif ($roles->name == 'Provincial Officer') {
            return redirect()->route('POdashboard.index');
        }
        elseif ($roles->name == 'Provincial Staff') {
            return redirect()->route('PSdashboard.index');
        }
        elseif ($roles->name == 'CityMunicipal Officer') {
            return redirect()->route('CMOdashboard.index');
        }
        elseif ($roles->name == 'CityMunicipal Staff') {
            return redirect()->route('CMSdashboard.index');
        }
        elseif ($roles->name == 'Barangay Scholar') {
            return redirect()->route('BSdashboard.index');
        }
        elseif ($roles->name == 'User Under Review') {
            return redirect()->route('UURdashboard.index');
        }


        return redirect()->route('home');
    }
}
