<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        
        
        if (!$request->user() || !$request->user()->hasRole($role)) {
            // Optionally, you could use abort(403) or a redirect
            abort(403, 'Unauthorized action.');
        }

        if (Auth::check()) {
            // Get the authenticated user
            $user = Auth::user();

            // Check if the user's account status is 'for review'
            if ($user->status === 'pending') {
                // Redirect to the empty dashboard or a specific page
                return redirect()->route('DashboardApproval');
            }
        }
 
        return $next($request);




        
    }
}
