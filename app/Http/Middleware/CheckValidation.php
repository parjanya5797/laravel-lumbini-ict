<?php

namespace App\Http\Middleware;

use Closure;

class CheckValidation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role,$age)
    {
        dd($role,$age);
        if(1)
        {
            dd("Here In Middleware");
        }
        return $next($request);
    }
}
