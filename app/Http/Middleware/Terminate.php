<?php

namespace App\Http\Middleware;

use Closure;

class Terminate
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
        echo "IN Handle Middleware</br>";
        if($role == 'admin' && $age > 18)
        {
            return $next($request);
        }
        dd("In Error Page");
        // echo "Before Contrlller </br>";
        // echo "In Middleware";
        // return $response;
        //error handle
        // throw to error page
        // echo ("In Handle Method Of Terminate Middleware </br>");
    }

    public function terminate($request,$response)
    {
        echo "IN Terminate Middleware<br>";
        // echo ("In terminate Middleware Terminate Method </br>");
    }
}
