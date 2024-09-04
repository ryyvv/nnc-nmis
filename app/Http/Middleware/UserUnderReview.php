<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserUnderReview
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $roles = DB::table('roles')->where('id',Auth::user()->role)->first();
        if (Auth::check() && Auth::user()->role == '3' ||  Auth::user()->name == 'User Under Review' ) {
            return $next($request);
        }

        return redirect('/dashboard');
        
    }
}
