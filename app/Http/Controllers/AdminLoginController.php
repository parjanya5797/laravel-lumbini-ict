<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class AdminLoginController extends Controller
{
    public function loginForm()
    {
        if(request()->session()->has('UserLoggedIn'))
        {
            return redirect()->route('dashboard');
        }
        return view('custom-auth.login');
    }
    
    public function checkCredentials(Request $request)
    {
        $this->validate($request,
        [
            'email' => 'required',
            'password' => 'required|min:8',
        ]);
        $user = User::where('email',$request->email)->get()->first();
        if($user != null)
        {
            if(Hash::check($request->password, $user->password))
            {
                $request->session()->put('UserLoggedIn', $user);
                return redirect()->route('dashboard');
            }
            else
            {
                Session::flash('message','Email or Password does not match');
                return redirect()->back();
            }
        }
        else
        {
            Session::flash('message','These Credentials do not match our records.');
            return redirect()->back();
        }        
    }
    
    public function logoutUser()
    {
        Session::flush();
        Session::flash('message','Logged Out Successfuly Bye Bye !!!!!!!.');
        return redirect()->route('admin-login');
    }
}
