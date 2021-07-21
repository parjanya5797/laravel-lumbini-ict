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
            'file' => 'required|mimes:jpg,png,gif,pdf,xlsx,docx,pptx',
        ]);
        $file = $request->file;
        $file_name = time().'.'.$file->getClientOriginalName();
        $destination = 'public/mail_docs/';   
        $file->move($destination,$file_name);
        $mail_contents = [
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'file' => $destination.'/'.$file_name,
        ];
        Mail::to($request->email)->send(new SendMail($mail_contents));
        $message = "Mail Sent to ".$request->email."Successfully";
        Session::flash('message',$message);
        return redirect()->back();
    }
}
