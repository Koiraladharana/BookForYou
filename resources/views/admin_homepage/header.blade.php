<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AdminPanel</title>
	
	<link rel="stylesheet" href="{{asset('css/index.css') }}">
</head>
<body>
	<nav class="navbar">
		<div class="navdiv">
			<div class="logo"><a href="/">AdminPanel</a> </div>
			<ul>
				<li><a href="/donation">Donation</a></li>
				<li><a href="/selling">Selling</a></li>
                <li><a href="/exchange">Exchange</a></li>
				<form action="{{ route('logout') }}" method="POST" style="display:inline;">
					@csrf
					<button type="submit" class="btn btn-danger">Logout</button>
				</form>
			</ul>
		</div>
	</nav>
	@include('admin_homepage.footer')
