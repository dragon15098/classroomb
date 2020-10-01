<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends BaseController
{
    function login(Request $request ){
        return view('welcome');
    }

    function authenticate(Request $request ){
        $credentials = $request->only('username', 'password');
        
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }
        else{
            return view('login');
        }
       
    }


    function createNewUser(Request $request ){
        $user = new User;
        $user->username = "student";
        $user->phoneNumber = "123456789";
        $user->email = "email";
        $user->password = Hash::make('abc');
        $user->save();
        return view('dashboard');
    }

}
