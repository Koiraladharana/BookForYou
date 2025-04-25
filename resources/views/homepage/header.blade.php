<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Navigation Bar</title>
	
	<link rel="stylesheet" href="{{asset('css/index.css') }}">
</head>
<body>
	<nav class="navbar">
		<div class="navdiv">
			<div class="logo"><a href="/">BookForYou</a> </div>

			<form action="{{ route('search.results') }}" method="GET" class="search-form">
                <input type="text" id="search" name="query" placeholder="Search books...">
                <button type="submit">Search</button>
            </form>
			
			<ul>
				<li><a href="/donation">Donation</a></li>
				<li><a href="/selling">Selling</a></li>
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
					<img src="{{ asset('images/slide2.jpeg') }}" alt="carousel pic">
				</div>
				<div class="carousel-item">
					<img src="{{ asset('images/slide3.jpeg') }}" alt="carousel pic">
				</div>
				<div class="carousel-item">
					<img src="{{ asset('images/slide4.jpeg') }}" alt="carousel pic">
				</div>
				<div class="carousel-item">
					<img src="{{ asset('images/slide6.png') }}" alt="carousel pic">
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
			<p><strong>Book name:</strong> {{ $book->name }}</p>
			@if(strtolower($book->category) === 'exchange')
            <p><strong>Book I Want:</strong> {{ $book->want_book ?? 'Not specified' }}</p>
			
                 @endif
			<!-- Always Green "Available" Status -->
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
		
		
	
	