<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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
});

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


