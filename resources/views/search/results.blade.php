<!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>
    <link rel="stylesheet" href="{{asset('css/index.css') }}">
    <style>
        /* Specific styles for the search results page */
        .book-container-search {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); /* Default grid for multiple items */
            gap: 25px;
            margin-top: 30px;
            padding: 20px;
            justify-content: center; /* Center items horizontally */
        }

        /* Style for when there's only one book */
        .book-container-search.single-result {
            grid-template-columns: 1fr; /* Take full width but allow centering */
        }

        .book-container-search.single-result .book-card-search {
            max-width: 400px; /* Limit the width of the single card */
            margin: 0 auto; /* Center the single card */
        }

        .book-card-search {
            background: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            overflow: hidden;
        }

        .book-card-search:hover {
            transform: scale(1.03);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .book-card-search a {
            display: block;
            padding: 15px;
            text-decoration: none;
            color: #333;
        }

        .book-card-search img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            margin-bottom: 10px;
        }

        .book-card-search h3 {
            margin-top: 0;
            margin-bottom: 8px;
            font-size: 1.1em;
            color: #2c3e50;
        }

        .book-card-search p {
            margin-bottom: 6px;
            font-size: 0.9em;
            color: #555;
        }

        .book-card-search .status-box {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 8px;
            font-weight: bold;
            font-size: 0.85em;
            background-color: #27ae60; /* Green */
            color: white;
            margin-top: 8px;
        }

        .book-card-search .exchange-info {
            color: #777;
            font-style: italic;
        }

        .back-to-home-link {
            display: inline-block;
            margin-top: 30px;
            padding: 10px 20px;
            background-color: #3498db; /* Blue */
            color: white;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .back-to-home-link:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Search Results for "{{ $query }}"</h1>

        <div class="book-container-search {{ $books->count() === 1 ? 'single-result' : '' }}">
            @if ($books->count() > 0)
                @foreach ($books as $book)
                    <div class="book-card-search">
                        <a href="{{ Auth::check() ? route('usersee', $book->id) : route('login', ['redirect' => route('usersee', $book->id)]) }}">
                            <img src="{{ asset('storage/' . $book->photo) }}" alt="Book Image">
                            <h3>{{ $book->name }}</h3>
                            <p><strong>Author:</strong> {{ $book->author }}</p>
                            <p><strong>ISBN:</strong> {{ $book->isbn }}</p>
                            @if(strtolower($book->category) === 'exchange')
                                <p class="exchange-info"><strong>Want:</strong> {{ $book->want_book ?? 'Not specified' }}</p>
                            @endif
                            <p><strong>Status:</strong> <span class="status-box">{{ $book->status }}</span></p>
                        </a>
                    </div>
                @endforeach
            @else
                <p>No books found matching your search criteria.</p>
            @endif
        </div>

        <div class="mt-4">
            {{ $books->links() }} {{-- Display pagination links --}}
        </div>

        <div class="mt-4">
            <a href="{{ route('home') }}" class="back-to-home-link">Back to HOME</a>
        </div>
    </div>
</body>
</html>