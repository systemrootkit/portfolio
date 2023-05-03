<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserAuthController extends Controller
{
    public function sign_in(){

        return view('login');
    }

    public function AuthenticateUser(Request $request){
        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials))

        {

            if(Auth::user()->role_as == 1)
            {

                return redirect('dashboard');
            }
            else
            {

                return redirect('/')->with('not an authenticated user');
            }
        }
        else
        {

            return redirect('/')->with('register first');
        }
    }
    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect()->route('user.sign_in');
    }
}
