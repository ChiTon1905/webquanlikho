<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('login.login');
    }
    public function CheckLogin(Request $request)
    {
        if(Auth::attempt(['email' => $request->email,'password' => $request->password])){
            if(Auth::user()->userType === 1)
                return redirect()->route('index');
            else
                return redirect()->route('index');
        }
       
        return redirect()->route('login')->with('error','Thông tin đăng nhập sai!');
    }

    public function LogOut()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
