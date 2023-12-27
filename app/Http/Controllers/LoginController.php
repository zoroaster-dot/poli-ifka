<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with('loginError', 'login gagal!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function signup()
    {
        return view('register.index');
    }

    public function signupStore(Request $request)
    {
        $request->validate([
            'nama_lengkap' => ['required'],
            'alamat' => ['required'],
            'no_hp' => ['required'],
            'no_ktp' => ['required'],
            'role' => ['required'],
            'username' => ['required', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'no_ktp' => $request->no_ktp,
            'role' => $request->role,
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect('/');
    }
}
