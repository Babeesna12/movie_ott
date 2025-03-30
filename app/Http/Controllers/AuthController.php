<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show Registration Form
    public function showRegister() {
        return view('auth.register');
    }

    // Store User
    public function register(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        // Save User
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registration successful! Please login.');
    }

    // Show Login Form
    public function showLogin() {
        return view('auth.login');
    }

    // Login User
    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('movies.search');
        }

        return back()->with('error', 'Invalid Credentials');
    }

    // Logout
    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
