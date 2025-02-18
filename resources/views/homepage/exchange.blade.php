<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Swap Book</title>
    <style type="text/css">
        body,
        html {
            margin: 0;
            padding: 0;
        }

        body {
            padding-top: 60px;
            /* Adjust based on the navbar height */
        }

        .main {
            height: 100vh;
            padding: 20px;
        }

        * {
            text-decoration: none;
        }

        .navbar {
            position: fixed;
            top: 0;
            width: 98%;
            z-index: 1000;
            background: #32353c;
            font-family: calibri;
            padding-right: 15px;
            padding-left: 15px;
            margin-top: 0px;
        }

        .navdiv {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo a {
            font-size: 35px;
            font-weight: 600;
            color: white;
        }

        li {
            list-style: none;
            display: inline-block;
        }

        li a {
            color: white;
            font-size: 18px;
            font-weight: bold;
            margin-right: 25px;
        }

        button {
            background-color: #bdf1ed91;
            margin-left: 10px;
            border-radius: 10px;
            padding: 10px;
            width: 90px;
        }

        button a {
            color: white;
            font-weight: bold;
            font-size: 15px;
        }

        .search-bar {
            display: flex;
            align-items: center;
        }

        .search-bar input {
            padding: 8px 10px;
            font-size: 16px;
            border: none;
            border-radius: 5px 0 0 5px;
            outline: none;
        }

        .search-bar button {
            background-color: rgb(54, 154, 221);
            color: white;
            border: none;
            padding: 8px 15px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
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
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
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
		/* Carousel Container */
.carousel {
    width: 100%;
    height: 400px;
    padding: 0px; /* Adjust padding if necessary */
    overflow: hidden;
    position: relative;
    background: linear-gradient(to bottom, #6a1b9a, #d500f9);
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    font-family: Arial, sans-serif;
    text-align: center;
    box-sizing: border-box; /* Ensures padding and border are included in height/width */
}

/* Carousel Track */
.carousel-track {
    display: flex;
    transition: transform 0.5s ease-in-out;
}

/* Carousel Items */
.carousel-item {
    min-width: 100%;
    height: 100%;
}

.carousel-item img {
    object-fit: cover;
    width: 100%;
    height: 100%;
   /* Ensures images fit properly */
    border-radius: 10px;
}

/* Optional: Add Dots for Navigation */
.carousel-dots {
    text-align: center;
    margin-top: 10px;
}

.carousel-dots span {
    display: inline-block;
    width: 12px;
    height: 12px;
    margin: 5px;
    background-color: white;
    border-radius: 50%;
    cursor: pointer;
}

.carousel-dots span.active {
    background-color: #d500f9;
}
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="navdiv">
            <div class="logo"><a href="/">BookForYou</a> </div>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/donation">Donation</a></li>
                <li><a href="/selling">Selling</a></li>
                <li class="dropdown">
                    <button>Account</button>
                    <div class="dropdown-content">
                        <a href="/login">Login</a>
                        <a href="/register">Register</a>
                    </div>
                </li>
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
					<img src="{{ asset('images/slide4.jpeg') }}" alt="carousel pic">
				</div>
			</div>
		</div>
		</div>
		<script src="{{ asset('js/index.js') }}"></script>
</body>

</html>
<h1>this is exchange</h1>
