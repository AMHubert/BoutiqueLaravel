<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function logout() {
        Auth::logout();
        return redirect()->route('index');
    }

    public function changeinfo(Request $request)
    {
        $user = Auth::user();
        $user->email = $request->email;
        if(Hash::check($request->pass, $user->pass)){
            $user->pass = Hash::make($request->newpass);
        }
        $user->save();

        return redirect()->route('home.account');
    }
}
