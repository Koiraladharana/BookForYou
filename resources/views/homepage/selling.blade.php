<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Second Hand Selling</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body>
    <nav class="navbar">
        <div class="navdiv">
            <div class="logo"><a href="/">BookForYou</a></div>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/donation">Donation</a></li>
                <li><a href="/exchange">Exchange</a></li>

                @auth
                <li class="dropdown">
                    <a href="/user" class="dropbtn">👤{{ Auth::user()->name }}</a>
                    <div class="dropdown-content">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="logout-btn">Logout</button>
                        </form>
                    </div>
                </li>
                @else
                <button><a href="{{ route('login') }}">Login</a></button>
                <button><a href="{{ route('reguser') }}">Register</a></button>
                @endauth
            </ul>
        </div>
    </nav>

    <div class="main">
        <div class="carousel">
            <div class="carousel-track">
                <div class="carousel-item">
                    <img src="{{ asset('images/slide1.jpeg') }}" alt="carousel pic">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/slide3.jpeg') }}" alt="carousel pic">
                </div>
            </div>
        </div>

        <div class="book-container">
            @foreach($books as $book)
            <div class="book-card">
                <a href="{{ Auth::check() ? route('usersee', $book->id) : route('login', ['redirect' => route('usersee', $book->id)]) }}">
                    <img src="{{ asset('storage/' . $book->photo) }}" alt="Book Image">
					<p><strong>User ID:</strong> {{ $book->user_id }}</p>
                    <h3>{{ $book->book_name }}</h3>
                    <p><strong>Book Name:</strong> {{ $book->name }}</p>
                <p><strong>Price:</strong> R.S.{{ $book->price ?? 'Not specified' }}</p>
                <p><strong>Category:</strong> {{ $book->category }}</p>
                <p><strong>Status:</strong> 
                    <span class="status-box">Available</span>
                </p>

                @guest
                <div class="hover-message">Login to see more details</div>
                @endguest
				</a>
            </div>
            @endforeach
		
        </div>
    </div>

    <script src="{{ asset('js/index.js') }}"></script>
</body>
</html>
