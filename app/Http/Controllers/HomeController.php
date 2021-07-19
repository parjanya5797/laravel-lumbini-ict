<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function sendMail(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        Mail::to($request->email)->send(new SendMail());
        $message = "Mail Sent to ".$request->email."Successfully";
        Session::flash('message',$message);
        return redirect()->back();
    }
}
