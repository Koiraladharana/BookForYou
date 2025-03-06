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

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Check if the user is an admin
            if (strtolower(Auth::user()->role) === 'admin') {
                return redirect()->route('admindas'); // Redirect admin to admin dashboard
            }

            // If there is a redirect parameter (e.g., user clicked a book)
            if ($request->has('redirect')) {
                return redirect()->to($request->input('redirect'));
            }

            // Default user dashboard redirection
            return redirect()->route('userdas'); 
        }

        return back()->withErrors(['email' => 'Invalid email or password'])->withInput();
    }
}
