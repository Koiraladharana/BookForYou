<!DOCTYPE html>
<html>

<head>
    <title>User Panel</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* Navbar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333;
            padding: 10px;
            color: white;
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
            background-color: #2c3e50;
            /* Soft Dark Blue */
            height: 100vh;
            position: fixed;
            color: white;
            padding: 20px 10px;
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
        }

        .sidebar a:hover {
            background-color: #2980b9;
            /* Light Blue for hover effect */
        }

        .sidebar .user-info {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 30px;
        }

        .sidebar .user-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .sidebar .user-info span {
            font-weight: bold;
            font-size: 18px;
        }

        .sidebar .dropdown {
            position: relative;
            display: inline-block;
        }

        .sidebar .dropdown-content {
            display: none;
            position: absolute;
            background-color: #34495e;
            /* Darker blue for dropdown */
            min-width: 200px;
            z-index: 1;
        }

        .sidebar .dropdown:hover .dropdown-content {
            display: block;
        }

        .sidebar .dropdown-content a {
            padding: 12px 20px;
            text-decoration: none;
            color: white;
            display: block;
            border-radius: 4px;
        }

        .sidebar .dropdown-content a:hover {
            background-color: #2980b9;
            /* Light Blue for hover effect in dropdown */
        }


        /* Main Content */
        .main-content {
            margin-left: 270px;
            padding: 25px;
        }
    </style>
</head>

<body>

    <!-- Top Navigation -->
    <div class="navbar">
        <div class="user-name">
            <h2><a href="/user">User Dashboard</a></h2>
        </div>
        <div>
            <a href="/donate">Donation</a>
            <a href="/sell">Selling</a>
            <a href="/swap">Exchange</a>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="user-info">
            <h3> 👤</h3><span>{{ Auth::user()->name }}</span>
        </div>
        <a href="#">📚 My Books</a>
        <a href="{{ route('books.create') }}">➕ Add New Book</a>
        <a href="{{ route('books.index') }}">📖 View All Books</a>
        <a href="{{ route('books.index') }}">🎁 Donate Book</a>
        <a href="{{ route('books.index') }}">🔄 Exchange Book</a>
    </div>


    <!-- Main Content -->
    <div class="main-content">
        <h2>Welcome to Your User Panel</h2>
        <p>Manage your books and browse books from other users.</p>
        <h3>Dharana Welcome</h3>
    </div>

</body>

</html>
