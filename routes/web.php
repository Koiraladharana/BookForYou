<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/donation', function () {
    return view('homepage.donation');
});

Route::get('/selling', function () {
    return view('homepage.selling');
});

Route::get('/exchange', function () {
    return view('homepage.exchange');
});

//Login route
Route::get('/login', function () {
    return view('log_reg.login');
})->name('login');

Route::post('/login', [LoginController::class, 'login']);
 
//Register route
Route::get('/register', function () {
    return view('log_reg.register');
})->name('reguser');

Route::post('register', [RegisterController::class, 'register']);

// Logout Route
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');

//Admin panel
Route::middleware(['auth', 'admin'])->group(function () {
Route::get('/admin', [AdminController::class, 'index'])->name('admindas');
});

//User panel
Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('userdas');

    Route::get('/donate', function () {
        return view('user_homepage.donate');
    });
    Route::get('/sell', function () {
        return view('user_homepage.sell');
    });
    Route::get('/swap', function () {
        return view('user_homepage.swap');
    });
    
  
});





