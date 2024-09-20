<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('login.registration', ['phone' => config('top.phone'), 'menu' => config('top.menu')]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password1' => 'required|min:5|max:32',
            'password2' => 'required|min:5|max:32'
            
        ]);

        if ($validated['password1'] !== $validated['password2']) {
            return back()->withErrors([
                'password1' => 'Password is not confirmed',
                'password2' => 'Password is not confirmed'
            ])->onlyInput('email');
        }

        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = $validated['password1'];
        $user->save();

        return redirect()->route('login')->with('status', 'User created');
    }
}
