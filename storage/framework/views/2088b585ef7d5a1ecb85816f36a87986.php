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
            padding: 20px 15px;
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
    </style>
</head>

<body>

    <!-- Top Navigation -->
    <div class="navbar">
        <h2><a href="<?php echo e(route('userdas')); ?>">User Dashboard</a></h2>
        <div>
            <a href="<?php echo e(route('userdonate')); ?>">Donation</a>
            <a href="<?php echo e(route('usersell')); ?>">Selling</a>
            <a href="<?php echo e(route('userswap')); ?>">Exchange</a>
            <form action="<?php echo e(route('logout')); ?>" method="POST" style="display:inline;">
                <?php echo csrf_field(); ?>
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="user-info">
            <h3>👤</h3>
            <span><?php echo e(Auth::user()->name); ?></span>
        </div>
        <a href="<?php echo e(route('books.view')); ?>">📖 View My Books</a>
        <a href="<?php echo e(route('books.create')); ?>">➕ Add New Book</a>
        
        <a href="<?php echo e(route('books.showedit')); ?>">📖 Edit Book</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h2>Welcome to Your User Panel</h2>
        <p>Manage your books and browse books from other users.</p>
        <h3> <span><?php echo e(Auth::user()->name); ?></span> Welcome</h3>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\BookForYou\resources\views/user_homepage/user.blade.php ENDPATH**/ ?>