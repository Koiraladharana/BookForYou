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
		<h1>this is Exchange</h1>
	</div>
		<script src="{{ asset('js/index.js') }}"></script>
</body>
</html>