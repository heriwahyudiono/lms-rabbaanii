<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|string',
            ]);

            $credentials = $request->only('email', 'password');

            $user = User::where('email', $credentials['email'])->first();

            if (!$user) {
                return back()->withErrors([
                    'email' => 'Email tidak terdaftar',
                ]);
            }

            if (!Hash::check($credentials['password'], $user->password)) {
                return back()->withErrors([
                    'password' => 'Password yang Anda masukkan salah',
                ]);
            }

            Auth::login($user);

            return redirect('home');
        }

        return view('auth/login');
    }

    public function register(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:6',
                'role' => 'required|string',
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'password' => Hash::make($request->password),
            ]);

            Auth::login($user);

            return redirect()->route('home');
        }

        return view('auth/register');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}