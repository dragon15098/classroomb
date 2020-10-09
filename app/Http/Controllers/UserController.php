<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mockery\Undefined;

class UserController extends BaseController
{
    function authenticate(Request $request)
    {
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            $currentUser = Auth::user();
            session(['userId' =>  $currentUser->id]);
            session(['name' =>  $currentUser->name]);
            session(['type' =>  $currentUser->type]);
            return redirect('user');
        } else {
            return redirect('login');
        }
    }

    function createNewUser(Request $request)
    {
        if ($request->get('password') === $request->get('verifyPassword')) {
            $user = new User;
            $user->username = $request->get('username');
            $user->phoneNumber = $request->get('phoneNumber');
            $user->email = $request->get('email');
            $user->password = Hash::make($request->get('password'));
            $user->name = $request->get('name');
            $user->type = $request->get('type');
            $user->save();
            return redirect('user');
        }
        return redirect('/create_user');
    }

    function updateInfo(Request $request)
    {
        $user = User::find($request->get('userId'));
        if ($user !== null) {
            $user->username = $request->get('username');
            $user->phoneNumber = $request->get('phoneNumber');
            $user->email = $request->get('email');
            $user->name = $request->get('name');
            $user->save();
        }
        return redirect('/user');
    }

    function updatePassword(Request $request)
    {
        if ($request->get('password') === $request->get('verifyPassword')) {
            $user = User::find($request->get('userId'));
            $user->password = Hash::make($request->get('password'));
            $user->save();
            return redirect('/user');
        }
        return redirect('/user');
    }

    function deleteUser(Request $request, $id)
    {
        $user = User::find($id);
        if ($user !== null) {
            User::destroy($id);
        }
        return redirect('/user');
    }
}
