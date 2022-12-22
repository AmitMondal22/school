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

            if(!Auth::guard('orgSadmin')->check()){
                return route('orglogin');
            }
            // if(!Auth::guard('student')->check()){
            //     return route('adminlogin');
            // }
            if (! $request->expectsJson()) {
                return route('login');
            }
        // }
    }
}
