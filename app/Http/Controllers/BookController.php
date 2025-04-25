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
        $books = Book::where('status', 'Available')->latest()->get();
        return view('welcome', compact('books'));
    }

    public function showDonations()
    {
        $books = Book::where('category', 'donation')->where('status', 'Available')->latest()->get();
        return view('homepage.donation', compact('books'));
    }

    public function showSelling()
    {
        $books = Book::where('category', 'selling')->where('status', 'Available')->latest()->get();
        return view('homepage.selling', compact('books'));
    }

    public function showExchange()
    {
        $books = Book::where('category', 'exchange')->where('status', 'Available')->latest()->get();
        return view('homepage.exchange', compact('books'));
    }

    // Show form to add a book
    public function create()
    {
        return view('user_homepage.add_book');
    }

    public function viewbooks(Book $books)
    {
        // Get books added by the logged-in user
        $books = Book::where('user_id', Auth::id())->latest()->get();
        return view('user_homepage.view_books', compact('books'));
    }

    public function userSee(Book $book){
        $books = Book::where('user_id', Auth::id())->get();
        return view('user_homepage.user_showbook', compact('book'));
    }

    public function show(Book $book)
{
    $this->authorize('show', $book);
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
            'photo' => 'nullable|image|mimes:jpeg,png,jpg',
            'isbn' => 'required',
            'publication' => 'required'

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
                'isbn' => $request->isbn,
                'publication' => $request->publication,
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
        $this->authorize('edit', $book);
        return view('user_homepage.edit_form', compact('book'));
    }

    public function editbooks(Book $books)
    {
        // Get books added by the logged-in user
        $books = Book::where('user_id', Auth::id())->latest()->get();
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
        'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
    ]);

    $data = $request->only(['name', 'category', 'location', 'price', 'phone', 'email']);

    if ($request->hasFile('photo')) {
        // Delete old image if it exists
        if ($book->photo && $book->photo !== 'default.png') {
            Storage::disk('public')->delete($book->photo);
        }

        // Store new image
        $data['photo'] = $request->file('photo')->store('book_photos', 'public');
    }

    $book->update($data);

    return redirect()->route('books.showedit')->with('success', 'Book updated successfully!');
}


    // Delete a book
    public function destroy(Book $book)
    {
        if ($book->user_id != Auth::id()) {
            return redirect()->route('books.showedit')->with('error', 'Unauthorized!');
        }

        if ($book->photo && $book->photo !== 'default.png') {
            Storage::disk('public')->delete($book->photo);
        }

        $book->delete();
        return redirect()->route('books.showedit')->with('success', 'Book deleted successfully!');
    }

    // Toggle book availability
    public function toggleStatus(Book $book)
    {
        if ($book->user_id != Auth::id()) {
            return redirect()->route('books.showedit')->with('error', 'Unauthorized!');
        }

        $book->status = $book->status === 'Available' ? 'Not Available' : 'Available';
        $book->save();

        return redirect()->route('books.showedit')->with('success', 'Book status updated!');
    }

    public function autocomplete(Request $request)
    {
        $query = $request->get('query');
        $books = Book::where('name', 'like', '%' . $query . '%')
                     ->orWhere('author', 'like', '%' . $query . '%')
                     ->orWhere('isbn', 'like', '%' . $query . '%')
                     ->where('status', 'Available') // Only search available books
                     ->limit(10) // Limit the number of suggestions
                     ->get();

        $results = [];
        foreach ($books as $book) {
            $results[] = [
                'value' => $book->name, // Display title in the suggestion list (you used 'name' here)
                'data' => $book->id,    // Optionally pass the book ID
            ];
        }

        return response()->json($results);
    }

    public function search(Request $request)
    {
        $query = $request->get('query');

        $books = Book::where('name', 'like', '%' . $query . '%')
                     ->orWhere('author', 'like', '%' . $query . '%')
                     ->orWhere('isbn', 'like', '%' . $query . '%')
                     ->where('status', 'Available') // Only search available books
                     ->paginate(15); // Paginate the search results

        return view('search.results', compact('books', 'query'));
    }
}



