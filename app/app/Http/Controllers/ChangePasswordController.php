<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChangePasswordController extends Controller
{
    public function index()
    {
        return view('changepassword.changepassword', ['phone' => config('top.phone'), 'menu' => config('top.menu')]);
    }

    public function post(Request $request)
    {
        $validator = Validator::make($request->json()->all(), [
            'email' => 'required|email',
            'password1' => 'required|min:5|max:32',
            'password2' => 'required|min:5|max:32'
        ]);        

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        echo 'Sending email';
    }

    public function forgotPassword(Request $request) {
        
    }
}
