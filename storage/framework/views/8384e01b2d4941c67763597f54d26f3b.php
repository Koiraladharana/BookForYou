<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Modern font */
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            box-sizing: border-box;
            background-color: #f4f6f9; /* Light background */
            color: #333;
        }

        /* Navbar */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            background: #343a40; /* Darker, professional navbar */
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-sizing: border-box;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }

        .navbar a {
            color: #fff;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px; /* Slightly rounded */
            transition: background-color 0.2s ease;
        }

        .navbar a:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .logout-btn {
            background-color: #dc3545; /* Bootstrap danger color */
            border: none;
            color: white;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.2s ease;
        }

        .logout-btn:hover {
            background-color: #c82333;
        }

        /* Sidebar */
        .sidebar {
            width: 260px; /* Slightly wider sidebar */
            top: 56px;
            background-color: #283645; /* Darker sidebar */
            height: 100vh;
            position: fixed;
            color: #fff;
            padding: 20px;
            box-sizing: border-box;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }

        .sidebar a {
            display: block;
            padding: 15px 20px; /* More padding */
            text-decoration: none;
            color: #ddd; /* Lighter text */
            margin-bottom: 8px;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.2s ease;
        }

        .sidebar a:hover {
            background-color: #384d61; /* Slightly lighter on hover */
        }

        .sidebar .user-info {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 30px;
        }

        .sidebar .user-info i { /* Using Font Awesome for user icon */
            font-size: 40px;
            color: #fff;
            margin-bottom: 10px;
        }

        .sidebar .user-info span {
            font-weight: bold;
            font-size: 18px;
            color: #fff;
        }

        /* Main Content */
        .main-content {
            margin-left: 280px; /* Adjusted margin */
            padding: 30px; /* Adjusted padding */
            flex-grow: 1;
            background-color: #fff; /* White main content background */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05); /* Subtle shadow */
            border-radius: 8px; /* Rounded corners for main content */
            margin-top: 70px; /* Adjust top margin for fixed navbar */
            margin-bottom: 20px; /* Add some bottom margin */
        }

        /* Table Styling (if you use tables in your content) */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            overflow: hidden;
            background-color: #fff;
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            background-color: #f8f9fa; /* Light gray header */
            font-weight: bold;
            color: #555;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.2s ease;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .status-box {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 5px;
            font-weight: bold;
            color: white;
            font-size: 14px;
            text-align: center;
        }

        .status-box.available {
            background-color: #28a745; /* Bootstrap success color */
        }

        .status-box.not-available {
            background-color: #dc3545; /* Bootstrap danger color */
        }

        /* Profile Image (if used in admin panel) */
        img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            transition: transform 0.3s ease;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        img:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body>

    <div class="navbar">
        <h2><a href="/admin" style="color: #fff; font-weight: bold; font-size: 22px;">Admin Panel</a></h2>
        <div>
            <a href="<?php echo e(route('home')); ?>"><i class="fas fa-home me-2"></i>Home</a>
            <form action="<?php echo e(route('logout')); ?>" method="POST" style="display:inline;">
                <?php echo csrf_field(); ?>
                <button type="submit" class="logout-btn"><i class="fas fa-sign-out-alt me-2"></i>Logout</button>
            </form>
        </div>
    </div>

    <div class="sidebar">
        <div class="user-info">
            <i class="fas fa-user-circle"></i>
            <span><?php echo e(Auth::user()->name); ?></span>
        </div>
        <a href="<?php echo e(route('admindas')); ?>"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
        <a href="<?php echo e(route('showBooks')); ?>"><i class="fas fa-book me-2"></i>Show Books</a>
        <a href="<?php echo e(route('showUsers')); ?>"><i class="fas fa-users me-2"></i>Show Users</a>
        <a href="<?php echo e(route('showFraudReports')); ?>"><i class="fas fa-exclamation-triangle me-2"></i>Show User Reports</a>
    </div>

    <div class="main-content">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html><?php /**PATH C:\xampp\htdocs\BookForYou\resources\views/admin_homepage/admin_layout.blade.php ENDPATH**/ ?>