<?php
session_start();

// Redirect if not logged in or not an Staff
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'staff') {
    header("Location: index.php");
    exit();
}

// Highlight active link
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Staff Dashboard</title>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .navbar {
            background-color: #0078ff;
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #333;
            position: fixed;
            left: 0;
            top: 0;
            padding-top: 60px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #444;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            display: block;
        }

        .sidebar ul li a.active {
            background-color: #0078ff;
            font-weight: bold;
        }

        .sidebar ul li a:hover {
            background-color: #0078ff;
            transition: 0.3s;
        }

        .content {
            margin-left: 260px;
            padding: 20px;
            flex: 1;
        }

        .welcome {
            font-size: 18px;
            color: #555;
            margin-bottom: 20px;
        }

        .logout-btn {
            display: block;
            background-color: #ff4d4d;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            text-align: center;
            margin: 20px auto;
            width: 80%;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background-color: #e03e3e;
        }

        footer {
            width: 100%;
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            left: 0;
        }
    </style>
</head>
<body>

    <div class="navbar">
        Staff Dashboard
    </div>

    <div class="sidebar">
        <ul>
            <li><a href="#" class="<?= $current_page == 'manage_user.php' ? 'active' : '' ?>">Manage Users</a></li> 
            <li><a href="#" class="<?= $current_page == 'manage_doctor.php' ? 'active' : '' ?>">Manage Doctors</a></li> 
            <li><a href="#" class="<?= $current_page == 'view_all_activity.php' ? 'active' : '' ?>">View All Activity</a></li> 
        </ul>
        <a href="logout.php" class="logout-btn">🚪 Logout</a>
    </div>
    
    <div class="content">
        <h2> Staff Dashboard</h2>
        <p class="welcome">
            Welcome, <?= isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Staff'; ?>!
        </p>
    </div>

    <footer>
        <p>&copy; <?= date("Y"); ?> Daycare Management System. All Rights Reserved.</p>
    </footer>

</body>
</html>
