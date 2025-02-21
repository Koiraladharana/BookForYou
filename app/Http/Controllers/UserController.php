<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user_index()
    {
        return view('user_homepage.user'); // User dashboard view
    }
}
