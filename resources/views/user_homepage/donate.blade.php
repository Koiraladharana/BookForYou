<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Donation</title>
	<link rel="stylesheet" href="{{asset('css/index.css') }}">
</head>
<body>
	<nav class="navbar">
		<div class="navdiv">
			<div class="logo"><a href="/user">BookForYou</a> </div>
			<ul>
				<li><a href="/user">Home</a></li>
				<li><a href="/sell">Selling</a></li>
                <li><a href="/swap">Exchange</a></li>
				<form action="{{ route('logout') }}" method="POST" style="display:inline;">
					@csrf
					<button type="submit" class="logout-btn">Logout</button>
				</form>
		</div>
	</nav>
	<div class="main">
		<div class="carousel">
			<div class="carousel-track">
				<div class="carousel-item">
					<img src="{{ asset('images/slide5.jpeg') }}" alt="carousel pic">
				</div>
				<div class="carousel-item">
					<img src="{{ asset('images/slide2.jpeg') }}" alt="carousel pic">
				</div>
			</div>
		</div>
		<h1>this is Donation</h1>
		</div>
		<script src="{{ asset('js/index.js') }}"></script>
		
	
</body>
</html>