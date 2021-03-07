<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // Show the form
    public function index(){
        return view('auth.login');
    }

    // Signin
    public function signin(Request $request){
        // Validation
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required',
        ]);
        // Sign User In
        if(!auth()->attempt($request->only('username','password'))){
            return back()->with('status','Invalid Credentials');
        }
        return redirect()->route('dashboard');
    }
}
