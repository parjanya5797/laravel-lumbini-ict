<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminRegisterController extends Controller
{
    public function registerForm()
    {
        return view('custom-auth.register');
    }

    public function saveUser(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8'
        ]);
        $users = new User();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $users->save();
        Session::flash('message','Registration Successful Please Login to Continue.');
        return redirect()->route('admin-login');

    }
}
