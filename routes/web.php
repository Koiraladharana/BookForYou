<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FraudReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;

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
//Routs for before login user
Route::get('/', [BookController::class, 'index'])->name('home');
Route::get('/donation', [BookController::class, 'showDonations'])->name('books.donation');
Route::get('/selling', [BookController::class, 'showSelling'])->name('books.selling');
Route::get('/exchange', [BookController::class, 'showExchange'])->name('books.exchange');

//show login form
Route::get('/login', function () {
    return view('log_reg.login');
})->name('login');

//take data to database
Route::post('/login', [LoginController::class, 'login']);

//show registration form 
Route::get('/register', function () {
    return view('log_reg.register');
})->name('reguser');

//take register data to database
Route::post('/register', [RegisterController::class, 'register']);

// Logout Route
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');

//Search Route
Route::get('/search/autocomplete', [BookController::class, 'autocomplete'])->name('search.autocomplete');
Route::get('/search', [BookController::class, 'search'])->name('search.results');


//Admin panel
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admindas');
    Route::get('/admin/books', [AdminController::class, 'showBooks'])->name('showBooks');
    Route::get('/admin/users', [AdminController::class, 'showUsers'])->name('showUsers');
    Route::get('/admin/fraud-reports', [AdminController::class, 'showFraudReports'])->name('showFraudReports');
    Route::delete('/admin/books/{id}', [AdminController::class, 'deleteBook'])->name('deleteBook');
    Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])->name('deleteUser');
    Route::delete('/admin/fraud-reports/{id}', [AdminController::class, 'deleteFraudReport'])->name('deleteFraudReport');
});


//Displays all books added by the logged-in user.
Route::middleware(['auth','user'])->group(function () {
    Route::get('/user', [BookController::class, 'viewbooks'])->name('userdas');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/report-fraud', [FraudReportController::class, 'create']);
    Route::post('/report-fraud', [FraudReportController::class, 'store']);
});

//Display full details of book with feedback option
Route::get('/user/books/{book}/fullbook', [BookController::class, 'usersee'])->middleware('auth')->name('usersee');
//Shows details of a single book.
Route::get('/user/books/{book}/showbook', [BookController::class, 'show'])->middleware(['auth', 'can:show,book'])->name('books.show');
//Shows the book creation form.
Route::get('/user/books/create', [BookController::class, 'create'])->middleware('auth')->name('books.create');
//Saves the book in the database.
Route::post('/user/books', [BookController::class, 'store'])->middleware('auth')->name('books.store');
//show user books for edit 
Route::get('/user/books/show_edit', [BookController::class, 'editbooks'])->middleware('auth')->name('books.showedit');
//show edit form for one particular selected book
Route::get('/user/books/{book}/edit', [BookController::class, 'edit'])->middleware(['auth', 'can:edit,book'])->name('books.edit');
// Updates the book information after editing in DB
Route::put('/user/books/{book}', [BookController::class, 'update'])->middleware('auth')->name('books.update');
//delete books from DB
Route::delete('/user/books/{book}/destroy', [BookController::class, 'destroy'])->middleware('auth')->name('books.destroy');
//change book status
Route::post('/user/books/{book}/toggle-status', [BookController::class, 'toggleStatus'])->middleware('auth')->name('books.toggleStatus');

//Message Route
Route::get('/messages/create/{recipient_id?}', [MessageController::class, 'create'])->name('messages.create');
Route::post('/messages/send', [MessageController::class, 'send'])->name('messages.send');
Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
Route::get('/messages/sent', [MessageController::class, 'sent'])->name('messages.sent');
Route::get('/messages/{message}', [MessageController::class, 'show'])->name('messages.show');