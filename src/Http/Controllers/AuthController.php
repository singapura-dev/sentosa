<?php

namespace Sentosa\Http\Controllers;

class AuthController
{
    public function login()
    {
        return view('sentosa::auth.login');
    }

    public function postLogin()
    {
        $credentials = request()->only(['email', 'password']);
        if (panel()->auth()->attempt($credentials)) {
            return redirect()->intended('/');
        }
        return redirect()->back()->withErrors([
            'email' => 'Invalid credentials'
        ]);
    }
}
