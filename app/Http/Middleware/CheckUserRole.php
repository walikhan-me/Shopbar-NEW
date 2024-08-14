<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $userrole = Session::get('userrole');

       
        if (!$userrole && !$request->routeIs('login')) {
            return redirect()->route('login');
        }
        if ($userrole === 'admin' && $request->routeIs('User.User_dashboard')) {
            return redirect()->route('Admin.Admin_dashboard');
        } elseif ($userrole === 'user' && $request->routeIs('Admin.Admin_dashboard')) {
            return redirect()->route('User.User_dashboard');
        }

        return $next($request);
        
    }
}
