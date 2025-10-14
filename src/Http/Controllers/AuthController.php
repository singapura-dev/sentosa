<?php

namespace Sentosa\Http\Controllers;

class AuthController
{
    public function login()
    {
        return panel()->blank()->children(view('sentosa::auth.login'))->render();
    }

    public function postLogin()
    {
        $credentials = request()->only(['email', 'password']);
        if (panel()->auth()->attempt($credentials)) {
            return redirect()->intended(panel()->getHomeUrl());
        }
        return redirect()->back()->withErrors([
            'email' => 'Invalid credentials',
        ]);
    }
}
