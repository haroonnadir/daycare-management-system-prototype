<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daycare Management System</title>
    <!-- <link rel="stylesheet" href="css/styles.css"> -->
    <style>
/* General Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    background-color: #f4f4f4;
    color: #333;
    text-align: center;
}

/* Header Styling */
header {
    background: #007bff;
    color: white;
    padding: 15px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* Title (h1) */
header h1 {
    font-size: 24px;
    margin: 0;
}

/* Navigation Menu */
nav ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
}

nav ul li {
    margin: 0 15px;
}

nav ul li a {
    color: white;
    text-decoration: none;
    font-size: 16px;
    font-weight: bold;
}

nav ul li a:hover {
    text-decoration: underline;
}
/* Main Content */
.main-content {
    max-width: 600px;
    margin: 40px auto;
    background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}

.main-content h2 {
    font-size: 24px;
    margin-bottom: 10px;
}

.main-content p {
    font-size: 16px;
    margin-bottom: 20px;
}

/* Search Bar */
.search-form {
    margin-bottom: 20px;
}

.search-form input {
    width: 80%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 15px;
}

.search-form button {
    padding: 10px 15px;
    background: #28a745;
    width: 80%;
    color: white;
    border: none;
    border-radius: 35px;
    cursor: pointer;
}

.search-form button:hover {
    background: #218838;
}

/* Login Box */
.login-box {
    background: #ffffff;
    padding: 20px;
    width: 100%;
    max-width: 350px;
    margin: 20px auto;
    border-radius: 8px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}

.login-box h3 {
    font-size: 20px;
    margin-bottom: 15px;
}

.login-box label {
    display: block;
    text-align: left;
    font-weight: bold;
    margin: 5px 0;
}

.login-box input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 10px;
}

/* Buttons */
button {
    width: 100%;
    padding: 10px;
    background: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background: #0056b3;
}

/* Registration Link */
.login-box p {
    margin-top: 10px;
}

.login-box a {
    color: #007bff;
    text-decoration: none;
}

.login-box a:hover {
    text-decoration: underline;
}



/* Footer Styles */
footer {
    background: #343a40;
    color: white;
    padding-top: 20px 0;
    text-align: center;
    margin-top: 40px;
}

.footer-container {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    padding: 20px;
    max-width: 1000px;
    margin: auto;
}

.footer-section {
    flex: 1;
    min-width: 250px;
    margin-bottom: 20px;
}

.footer-section h3 {
    margin-bottom: 10px;
    font-size: 18px;
    color: #f8f9fa;
}

.footer-section p {
    font-size: 14px;
    color: #ccc;
}

.footer-section ul {
    list-style: none;
    padding: 0;
}

.footer-section ul li {
    margin: 5px 0;
}

.footer-section ul li a {
    color: #bbb;
    text-decoration: none;
    font-size: 14px;
}

.footer-section ul li a:hover {
    color: #fff;
    text-decoration: underline;
}

/* Social Icons */
.social-icons a {
    margin: 0 5px;
    display: inline-block;
}

.social-icons img {
    width: 30px;
    height: 30px;
}

/* Footer Bottom */
.footer-bottom {
    background: #23272b;
    padding-top: 10px;
    font-size: 14px;
    position: relative;
}

/* Responsive Design */
@media (max-width: 600px) {
    .main-content {
        width: 90%;
        padding: 20px;
    }

    .login-box {
        width: 90%;
    }
}
    </style>
</head>
<body>

    <header>
        <h1>Daycare Management System</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Our Services</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </nav>
    </header>

    <section class="main-content">
        <h2>Welcome to Our Daycare Management System</h2>
        <p>We provide the best care for your children with trusted staff and a safe environment.</p>

        <!-- Search Bar -->
        <form class="search-form">
            <input type="text" placeholder="Search your query..." name="search">
            <button type="submit">Search</button>
        </form>

        <!-- Login Form -->
        <div class="login-box">
            <h3>Login</h3>
            <form action="login.php" method="POST">
                <label for="email">Email:</label>
                <input type="email" name="email" required>

                <label for="password">Password:</label>
                <input type="password" name="password" required>

                <button type="submit">Login</button>
            </form>
            <p>New user? <a href="register.php">Register here</a></p>
        </div>
    </section>

    <footer>
    <div class="footer-container">
        <div class="footer-section">
            <h3>About Us</h3>
            <p>We provide top-quality daycare services with trusted staff and a safe environment.</p>
        </div>

        <div class="footer-section">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Our Services</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="register.php">Register</a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h3>Follow Us</h3>
            <div class="social-icons">
                <a href="#"><img src="images/facebook.png" alt="Facebook"></a>
                <a href="#"><img src="images/twitter.png" alt="Twitter"></a>
                <a href="#"><img src="images/instagram.png" alt="Instagram"></a>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <p>&copy; <?php echo date("Y"); ?> Daycare Management System. All rights reserved.</p>
    </div>
</footer>

</body>
</html>
