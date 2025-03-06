<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Panel</title>
    
    <!-- Bootstrap CSS -->
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

        /* Main Content */
        .main-content {
            margin-left: 270px;
            padding: 75px;
        }

        /* Book Cards Layout */
.book-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center; /* Center the cards */
    gap: 20px;
    padding: 20px;
}

/* Individual Book Card */
.book-card {
    width: 250px;
    background: white;
    border-radius: 8px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    padding: 15px;
    text-align: center;
    transition: transform 0.3s ease-in-out;
}

.book-card:hover {
    transform: scale(1.05); /* Slight zoom effect on hover */
}

/* Book Image */
.book-card img {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-radius: 5px;
}

/* Book Text */
.book-card h3 {
    font-size: 18px;
    margin: 10px 0;
    color: #32353c;
}

.book-card p {
    font-size: 14px;
    color: #555;
    margin: 5px 0;
}

/* Responsive Design */
@media (max-width: 768px) {
    .book-container {
        flex-direction: column;
        align-items: center;
    }
}
/* index.css */
.container {
    padding: 20px;
    text-align: center;
}

.stats {
    display: flex;
    justify-content: space-around;
    margin-top: 20px;
}

.stat-box {
    border: 1px solid #ccc;
    padding: 20px;
    width: 20%;
    background-color: snow !important;
    border-radius: 8px;
}

.stat-box h3 {
    font-size: 18px;
    color: #333;
}

.stat-box p {
    font-size: 24px;
    font-weight: bold;
    color: #007BFF;
}
/* Add to your CSS */
table {
    width: 100%;
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #88d113 !important;
}

.btn-danger {
    background-color: red;
    color: white;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
}

.btn-danger:hover {
    background-color: darkred;
}
.status-box.available {
    background-color: #4CAF50; /* Green color */
}

.status-box.not-available {
    background-color: #f44336; /* Red color */
}

/* Table Cell Styling */
table td {
    text-align: center; /* Center the content in table cells */
    vertical-align: middle; /* Align content vertically in the middle */
}
.status-box {
    display: inline-block;
    padding: 5px 10px;
    border-radius: 5px;
    font-weight: bold;
    color: white;
    font-size: 14px; /* Adjust font size as needed */
    text-align: center; /* Center the text */
}
th {
    text-align: center; 
}
/* Profile Image */
img {
            width: 150px;
            height: 100px;
            border-radius: 0%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        img:hover {
            transform: scale(1.1);
        }


    </style>
</head>

<body>

    <!-- Top Navigation -->
    <div class="navbar">
        <h2><a href="/admin">Admin Panel</a></h2>
        <div>
            <a href="{{ route('home') }}">Home</a>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="user-info">
            <h3>👤</h3>
            <span>{{ Auth::user()->name }}</span>
        </div>
        <a href="{{ route('admindas') }}">🏠Home</a>
         <a href="{{ route('showBooks') }}">📚Show Books</a>
        <a href="{{ route('showUsers') }}">👤Show Users</a>
        <a href="{{ route('showFraudReports') }}">⚠️ Show User Reports</a>

        
    </div>

    <!-- Main Content -->
    <div class="main-content">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
