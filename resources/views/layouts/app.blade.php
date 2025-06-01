<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Panel</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* Navbar */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            background: #32353c;
            font-family: calibri;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
        }

        .navbar a:hover {
            background-color: #575757;
        }

        .logout-btn {
            background-color: red;
            border: none;
            color: white;
            padding: 8px 15px;
            cursor: pointer;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            top: 56px;
            background-color: #2c3e50;
            height: 100vh;
            position: fixed;
            color: white;
            padding: 20px 1px;
            box-sizing: border-box;
        }

        .sidebar a {
            display: block;
            padding: 12px 20px;
            text-decoration: none;
            color: white;
            margin-bottom: 10px;
            font-size: 16px;
            border-radius: 4px;
            position: relative; /* To position the notification badge */
        }

        .sidebar a:hover {
            background-color: #2980b9;
        }

        .sidebar .user-info {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 30px;
        }

        .sidebar .user-info h3 {
            font-size: 2em; /* Larger user icon */
            margin-bottom: 10px;
        }

        .sidebar .user-info span {
            font-weight: bold;
            font-size: 18px;
        }

        /* Main Content */
        .main-content {
            margin-left: 270px;
            padding: 75px 20px; /* Added some horizontal padding */
            box-sizing: border-box; /* Ensure padding doesn't add to width */
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .book-container {
                flex-direction: column;
                align-items: center;
            }

            .main-content {
                margin-left: 0;
                padding-top: 110px; /* Adjust padding for fixed navbar */
            }

            .sidebar {
                width: 100%;
                position: static;
                height: auto;
                padding: 15px;
                text-align: center;
            }

            .sidebar .user-info {
                margin-bottom: 15px;
            }

            .sidebar a {
                display: inline-block;
                margin: 5px 10px;
                padding: 10px 15px;
            }
        }

        /* Notification Badge */
        .notification-badge {
            position: absolute;
            top: 8px;
            right: 8px;
            background-color: #f39c12; /* Example color */
            color: white;
            border-radius: 50%;
            padding: 5px 8px;
            font-size: 12px;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <h2><a href="/">User Dashboard</a></h2>
        <div>
            <a href="{{ route('books.donation') }}">Donation</a>
            <a href="{{ route('books.selling') }}">Selling</a>
            <a href="{{ route('books.exchange') }}">Exchange</a>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </div>

    <div class="sidebar">
        <div class="user-info">
            <h3>👤</h3>
            <span>{{ Auth::user()->name }} ({{ Auth::user()->id }})</span>
        </div>

        <a href="{{ route('userdas') }}">📖 View Book</a>
        <a href="{{ route('books.create') }}">➕ Add New Book</a>
        <a href="{{ route('books.showedit') }}">📖 Edit Book</a>
        <a href="{{ url('/report-fraud') }}">🚨 Report Fraud</a>
        <a href="{{ route('messages.create') }}">✉️ Send Message </a>
        <a href="{{ route('messages.index') }}">✉️ Received Message
            @if(auth()->user()->unreadMessages()->count() > 0)
                <span class="notification-badge">{{ auth()->user()->unreadMessages()->count() }}</span>
            @endif
        </a>
        
    </div>

    <div class="main-content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>