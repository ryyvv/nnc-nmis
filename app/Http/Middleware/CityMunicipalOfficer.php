<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class CityMunicipalOfficer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $roles = DB::table('roles')->where('id',Auth::user()->role)->first();
        if (Auth::check() && $roles->name ==  'City-Municipal Officer') {
            return $next($request);
        }

        return redirect('home');
    }
}
 