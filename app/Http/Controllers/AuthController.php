<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use App\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    public function login()
    {
        # code...
        return view('login');
    }

    public function act_login(Request $request)
    {
        # code...
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            return redirect('/');
        } else {
            return 'gagal';
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
