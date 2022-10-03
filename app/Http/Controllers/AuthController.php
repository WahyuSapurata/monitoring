<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function autenticating(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dasboard');
        }

        Session::flash('status', 'failed');
        Session::flash('message', 'Login Wrong');

        return redirect('/');
    }

    public function signUp()
    {
        return view('auth.signup');
    }

    public function createAccount(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib di isi!',
            'regex' => ':attribute harus perbaduan angka dan huruf!',
            'min' => ':attribute harus di isi :min karakter!'
        ];
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required|regex:/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/|unique:users',
            'password' => 'required|min:5'
        ], $messages);
        $request['password'] = Hash::make($request->password);
        User::create($request->all());
        return redirect('/');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
