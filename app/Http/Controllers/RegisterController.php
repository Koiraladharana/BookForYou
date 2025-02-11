<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // Check if user typed correctly
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:10|unique:user,phone',
            'address' => 'required|string|max:255',
            'college' => 'required|string|max:255',
            'faculty' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        @dd($validator);

        // If there is an error, send the user back
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // ✅ Step 2: Save user in the database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'college' => $request->collage,
            'faculty' => $request->faculty,
            'password' => Hash::make($request->password), // This locks the password 🔒
            'role' => 'user',
        ]);

        // ✅ Step 3: Send user to login page
        return redirect()->route('login')->with('success', 'Registration successful! Please login.');
    }
}
