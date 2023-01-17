<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // if (! $request->expectsJson()) {
            // ======================orgSadmin=========================
            if(!Auth::guard('orgSadmin')->check()&&$request->is('org/*')){
                return route('orglogin');
            }
            if(!Auth::guard('orgSadmin')->check()&&$request->is('org')){
                return route('orglogin');
            }
            // ======================End orgSadmin=========================


            // ======================wc_admin=========================
            if(!Auth::guard('wc_admin')->check()&&$request->is('wrongcode/*')){
                return route('wc_login');
            }
            if(!Auth::guard('wc_admin')->check()&&$request->is('wrongcode')){
                return route('wc_login');
            }
            // =========================End wc_admin====================
            // if(!Auth::guard('student')->check()){
            //     return route('adminlogin');
            // }
            if (! $request->expectsJson()) {
                return route('login');
            }
        // }
    }
}
