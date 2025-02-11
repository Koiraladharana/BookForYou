<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Try to log in the user
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // Redirect users based on role
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admindas'); // Admin Dashboard
        } else {
            return redirect()->route('home'); // User Dashboard
        }
    }

    return back()->withErrors(['email' => 'Invalid email or password'])->withInput();
}
}
