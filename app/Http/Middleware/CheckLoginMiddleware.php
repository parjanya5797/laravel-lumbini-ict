<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class CheckLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!$request->session()->has('UserLoggedIn'))
        {
            Session::flash('message','Please Login to Proceed further');
            return redirect()->route('admin-login');
        }
        return $next($request);
    }
}
