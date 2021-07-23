<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CookieController extends Controller
{
    public function set()
    {
        // return response('Hello World')->WithCookie(cookie('test-cookie','This is a test Cookie',1))->cookie(cookie()->forever('name','Virat'));
        return response(['PHP','Laravel','Wordpress'])->header('Content-Type','text/html');
    }
    
    public function get(Request $request)
    {
        $value = $request->cookie('test-cookie');
        $value2 = $request->cookie('name');
        // dd($value,$value2);
    }
}
