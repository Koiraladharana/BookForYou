<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\Book;

class BookController extends Controller
{
    // Show books before login
    public function index()
    {
        $books = Book::where('status', 'Available')->get();
        return view('welcome', compact('books'));
    }

    public function showDonations()
    {
        $books = Book::where('category', 'donation')->get();
        return view('homepage.donation', compact('books'));
    }

    public function showSelling()
    {
        $books = Book::where('category', 'selling')->get();
        return view('homepage.selling', compact('books'));
    }

    public function showExchange()
    {
        $books = Book::where('category', 'exchange')->get();
        return view('homepage.exchange', compact('books'));
    }

    // Show books after login (full details)
    public function user_index(Book $books)
    {
        $books = Book::where('status', 'Available')->get();
        return view('user_homepage.user', compact('books'));
    }

    public function userDonations()
    {
        $books = Book::where('category', 'donation')->get();
        return view('user_homepage.donate', compact('books'));
    }

    public function userSelling()
    {
        $books = Book::where('category', 'selling')->get();
        return view('user_homepage.sell', compact('books'));
    }

    public function userExchange()
    {
        $books = Book::where('category', 'exchange')->get();
        return view('user_homepage.swap', compact('books'));
    }

    // Show form to add a book
    public function create()
    {
        return view('user_homepage.add_book');
    }

    public function viewbooks(Book $books)
    {
        // Get books added by the logged-in user
        $books = Book::where('user_id', Auth::id())->get();
        return view('user_homepage.view_books', compact('books'));
    }

    public function show(Book $book)
    {
        return view('user_homepage.show_books', compact('book'));
    }

    // Store a new book in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'category' => 'required|in:donation,selling,exchange',
            'location' => 'required',
            'price' => 'nullable|numeric',
            'want_book' => 'nullable|string',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg'
        ]);

        try {
            $photoPath = 'default.png'; // Default image if none uploaded

            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('book_photos', 'public');
            }

            // Store book in database
            Book::create([
                'name' => $request->name,
                'author' => $request->author,
                'category' => $request->category,
                'photo' => $photoPath,
                'location' => $request->location,
                'price' => ($request->category === 'donation' || $request->category === 'exchange') ? 0 : $request->price,
                'email' => $request->email,
                'phone' => $request->phone,
                'have_book' => $request->have_book ?? null,
                'want_book' => $request->want_book ?? null,
                'status' => 'Available',
                'user_id' => Auth::id()
            ]);

            return redirect()->route('userdas')->with('success', 'Book added successfully!');
        } catch (\Exception $e) {
            Log::error('Book upload error: ' . $e->getMessage());
            return redirect()->route('userdas')->with('error', 'An error occurred while adding the book.');
        }
    }

    // Show edit form
    public function edit(Book $book)
    {
        return view('user_homepage.edit_form', compact('book'));
    }

    public function editbooks(Book $books)
    {
        // Get books added by the logged-in user
        $books = Book::where('user_id', Auth::id())->get();
        return view('user_homepage.show_books_edit', compact('books'));
    }

    public function update(Request $request, Book $book)
    {
        if ($book->user_id != Auth::id()) {
            return redirect()->route('userdas')->with('error', 'Unauthorized!');
        }

        $request->validate([
            'name' => 'required',
            'category' => 'required|in:donation,selling,exchange',
            'location' => 'required',
            'price' => 'nullable|numeric',
            'phone' => 'nullable|digits:10',
            'email' => 'required|email',
        ]);

        $book->update([
            'name' => $request->name,
            'category' => $request->category,
            'location' => $request->location,
            'price' => ($request->category === 'donation' || $request->category === 'exchange') ? 0 : $request->price,
            'phone' => $request->phone,
            'email' => $request->email
        ]);

        return redirect()->route('userdas')->with('success', 'Book updated successfully!');
    }

    // Delete a book
    public function destroy(Book $book)
    {
        if ($book->user_id != Auth::id()) {
            return redirect()->route('userdas')->with('error', 'Unauthorized!');
        }

        if ($book->photo && $book->photo !== 'default.png') {
            Storage::disk('public')->delete($book->photo);
        }

        $book->delete();
        return redirect()->route('userdas')->with('success', 'Book deleted successfully!');
    }

    // Toggle book availability
    public function toggleStatus(Book $book)
    {
        if ($book->user_id != Auth::id()) {
            return redirect()->route('userdas')->with('error', 'Unauthorized!');
        }

        $book->status = $book->status === 'Available' ? 'Not Available' : 'Available';
        $book->save();

        return redirect()->route('userdas')->with('success', 'Book status updated!');
    }
}
