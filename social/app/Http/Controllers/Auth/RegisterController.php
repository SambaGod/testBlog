<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){

       // Validation
        $this->validate($request,[
            'name' => 'required | max:255',
            'username' => 'required | max:255',
            'email' => 'required | email',
            'password' => 'required | confirmed',
            'password_confirmation' => 'required',
        ]);

       // Store User
       User::create([
           'name' => $request->name,
           'username' => $request->username,
           'email' => $request->email,
           'password' => Hash::make($request->password),
       ]);

       // Sign User In
        auth()->attempt($request->only('email','password'));

       // Redirect
       return redirect()->route('dashboard');
    }
}
