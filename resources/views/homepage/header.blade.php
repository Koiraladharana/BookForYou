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
			<ul>
				<li><a href="/donation">Donation</a></li>
				<li><a href="/selling">Selling</a></li>
                <li><a href="/exchange">Exchange</a></li>
				<button><a href="/login">login</a></button>
				<button><a href="/register">Register</a></button>
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
		<h1>Welcome to BookForYou</h1>
	</div>
	
	