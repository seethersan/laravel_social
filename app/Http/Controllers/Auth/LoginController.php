<?php

namespace ucsp\Http\Controllers\Auth;

use ucsp\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    public function showLoginForm(){
        return redirect()->route('persona.create');
    }

    public function login(){
        $credentials = $this->validate(request(), [
            'email' => 'email|required|string',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($credentials)){
            return redirect()->route('persona.index');
        }
        else{
            return back()->withErrors(['email' => trans('auth.failed')])->withInput(request(['email']));
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('persona.create');
    }
}
