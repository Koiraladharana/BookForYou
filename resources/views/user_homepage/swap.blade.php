<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Swap Book</title>
	<link rel="stylesheet" href="{{asset('css/index.css') }}">
</head>
<body>
	<nav class="navbar">
		<div class="navdiv">
			<div class="logo"><a href="/user">BookForYou</a> </div>
			<ul>
				<li><a href="/user">Home</a></li>
				<li><a href="/donate">Donation</a></li>
				<li><a href="/sell">Selling</a></li>
				<form action="{{ route('logout') }}" method="POST" style="display:inline;">
					@csrf
					<button type="submit" class="logout-btn">Logout</button>
				</form>
			</ul>
		</div>
	</nav>
	<div class="main">
		<div class="carousel">
			<div class="carousel-track">
				<div class="carousel-item">
					<img src="{{ asset('images/slide5.jpeg') }}" alt="carousel pic">
				</div>
				<div class="carousel-item">
					<img src="{{ asset('images/slide4.jpeg') }}" alt="carousel pic">
				</div>
			</div>
		</div>
		<div class="book-container">
			@foreach($books as $book)
			<div class="book-card">
				<img src="{{ asset('storage/' . $book->photo) }}" alt="Book Image">
				<p><strong>Book name:</strong> {{ $book->name }}</p>
				<p><strong>Author:</strong> {{ $book->author ?? 'Unknown' }}</p>
				<p><strong>Category:</strong> {{ $book->category }}</p>
				<p><strong>Location:</strong> {{ $book->location }}</p>
				<p><strong>Price:</strong> ${{ $book->price }}</p>
				<p><strong>Status:</strong> {{ $book->status }}</p>
				<p><strong>Email:</strong> {{ $book->email }}</p>
				@if($book->phone)
				<p><strong>Phone:</strong> {{ $book->phone }}</p>
			@endif
			</div>
			@endforeach
		</div>

	</div>
		<script src="{{ asset('js/index.js') }}"></script>
</body>
</html>