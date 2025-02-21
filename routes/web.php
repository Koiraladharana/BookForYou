<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
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

Route::get('/', [BookController::class, 'index'])->name('home');
Route::get('/donation', [BookController::class, 'showDonations'])->name('books.donation');
Route::get('/selling', [BookController::class, 'showSelling'])->name('books.selling');
Route::get('/exchange', [BookController::class, 'showExchange'])->name('books.exchange');

//show login form
Route::get('/login', function () {
    return view('log_reg.login');
})->name('login');

//take to database
Route::post('/login', [LoginController::class, 'login']);

//show registration
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

// Authenticated User Pages (Full Book Details & CRUD)
Route::get('/user', [BookController::class, 'user_index'])->middleware('auth')->name('userdas');
Route::get('/donate',[BookController::class, 'userDonations'])->middleware('auth')->name('userdonate');
Route::get('/sell', [BookController::class, 'userSelling'])->middleware('auth')->name('usersell');
Route::get('/swap', [BookController::class, 'userExchange'])->middleware('auth')->name('userswap');


Route::get('/user/books/view', [BookController::class, 'viewbooks'])->middleware('auth')->name('books.view');
Route::get('/user/books/{book}/showbook', [BookController::class, 'show'])->middleware('auth')->name('books.show');
Route::get('/user/books/create', [BookController::class, 'create'])->middleware('auth')->name('books.create');
Route::post('/user/books', [BookController::class, 'store'])->middleware('auth')->name('books.store');
Route::get('/user/books/show_edit', [BookController::class, 'editbooks'])->middleware('auth')->name('books.showedit'); //get books
Route::get('/user/books/{book}/edit', [BookController::class, 'edit'])->middleware('auth')->name('books.edit'); //form
Route::put('/user/books/{book}', [BookController::class, 'update'])->middleware('auth')->name('books.update');
Route::delete('/user/books/{book}/destroy', [BookController::class, 'destroy'])->middleware('auth')->name('books.destroy');
Route::post('/user/books/{book}/toggle-status', [BookController::class, 'toggleStatus'])->middleware('auth')->name('books.toggleStatus');

