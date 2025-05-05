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
        $totalBooks = Book::count();
        $totalUsers = User::where('role', 'user')->count();
        $totalAdmins = User::where('role', 'admin')->count();

        
        $totalFrauds = FraudReport::count();

        // Pass data to the view
        return view('admin_homepage.header', compact('totalBooks', 'totalUsers', 'totalAdmins','totalFrauds'));
    }

    public function showUsers()
    {
        // Fetch all users with book count
        $users = User::withCount('books')->get();
        return view('admin_homepage.show_user', compact('users'));
    }

    public function showFraudReports()
    {
        $fraudReports = FraudReport::all();   // Fetch all fraud reports
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

    public function showBooks(Request $request)
    {
        $filter = strtolower($request->input('filter', 'all')); // Convert filter to lowercase

        $books = Book::query();

        if ($filter !== 'all') {
            $books->whereRaw('LOWER(category) = ?', [$filter]); // Compare lowercase values
        }

        $books = $books->latest()->paginate(10); // You might want to adjust the pagination number

        // Calculate book counts
        $bookCounts['all'] = Book::count();
        $bookCounts['donation'] = Book::where('category', 'donation')->count();
        $bookCounts['selling'] = Book::where('category', 'selling')->count();
        $bookCounts['exchange'] = Book::where('category', 'exchange')->count();

        return view('admin_homepage.show_book', compact('books', 'bookCounts'));
    }
}