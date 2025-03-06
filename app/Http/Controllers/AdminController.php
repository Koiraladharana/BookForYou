<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\FraudReport;
use App\Models\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Get the total count of books, users, and admins
        $totalBooks = Book::count();
        $totalUsers = User::where('role', 'user')->count(); // assuming 'user' role
        $totalAdmins = User::where('role', 'admin')->count(); // assuming 'admin' role
        $totalFrauds = FraudReport::count();

        // Pass data to the view
        return view('admin_homepage.header', compact('totalBooks', 'totalUsers', 'totalAdmins','totalFrauds'));
    }

    public function showBooks()
{
    // Fetch all books
    $books = Book::all();
    return view('admin_homepage.show_book', compact('books'));
}


public function showUsers()
{
    // Fetch all users with book count
    $users = User::withCount('books')->get();

    return view('admin_homepage.show_user', compact('users'));
}


    public function showFraudReports()
    {
        $fraudReports = FraudReport::all();  // Fetch all fraud reports
        return view('admin_homepage.show_fraud_reports', compact('fraudReports'));
    }

    public function deleteBook($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('showBooks')->with('success', 'Book deleted successfully');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('showUsers')->with('success', 'User deleted successfully');
    }

    public function deleteFraudReport($id)
    {
        $report = FraudReport::findOrFail($id);
        $report->delete();
        return redirect()->route('showFraudReports')->with('success', 'Fraud report deleted successfully');
    }

}
