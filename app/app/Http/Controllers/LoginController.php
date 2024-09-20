<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.login', ['phone' => config('top.phone'), 'menu' => config('top.menu')]);
    }

    public function post(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:32'
        ]);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            return redirect()->route('main');
        }
        return back()->withErrors([
            'email' => 'Email of password incorrect.'
        ])->onlyInput('email');
    }

    public function forgotPassword(Request $request) {
        return redirect()->route('changepassword');
    }
}
