<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Donation</title>
	<style type="text/css">
	    body, html {
			margin: 0;
			padding: 0;
		}
		body {
			padding-top: 60px; /* Adjust based on the navbar height */
		}
		*{
			text-decoration: none;
		}
		.navbar{
			position: fixed; top: 0; width: 98%; z-index: 1000; background: #32353c; font-family: calibri; padding-right: 15px;padding-left: 15px;margin-top: 0px;
		}
		.navdiv{
			display: flex; align-items: center; justify-content: space-between;
		}
		.logo a{
			font-size: 35px; font-weight: 600; color: white;
		}
		li{
			list-style: none; display: inline-block;
		}
		li a{
			color: white; font-size: 18px; font-weight: bold; margin-right: 25px;
		}
		button{
			background-color: #bdf1ed91; margin-left: 10px; border-radius: 10px; padding: 10px; width: 90px;
		}
		button a{
			color: white; font-weight: bold; font-size: 15px;
		}
        .search-bar {
            display: flex; align-items: center;
        }
        .search-bar input {
            padding: 8px 10px; font-size: 16px; border: none; border-radius: 5px 0 0 5px; outline: none;
        }
        .search-bar button {
            background-color: rgb(54, 154, 221); color: white; border: none; padding: 8px 15px; font-size: 16px; font-weight: bold; border-radius: 0 5px 5px 0; cursor: pointer;
        }
        .dropdown {
			position: relative;
			display: inline-block;
		}
		.dropdown-content {
			display: none;
			position: absolute;
			background-color: white;
			min-width: 100px;
			box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
			z-index: 1;
			border-radius: 5px;
		}
		.dropdown-content a {
			color: black;
			padding: 8px 12px;
			text-decoration: none;
			display: block;
			font-weight: normal;
		}
		.dropdown-content a:hover {
			background-color: rgba(37, 37, 231, 0.911);
			color: white;
		}
		.dropdown:hover .dropdown-content {
			display: block;
			padding: 8px 12px;
		}
	</style>
</head>
<body>
	<nav class="navbar">
		<div class="navdiv">
			<div class="logo"><a href="/">BookForYou</a> </div>
			<ul>
				<li><a href="/">Home</a></li>
				<li><a href="/selling">Selling</a></li>
                <li><a href="/exchange">Exchange</a></li>
				<li class="dropdown">
					<button>Account</button>
					<div class="dropdown-content">
						<a href="/login">Login</a>
						<a href="/register">Register</a>
					</div>
				</li>
		</div>
	</nav>
</body>
</html>
<h1>this is Donation</h1>