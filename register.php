<?php
include 'db_connect.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize & Fetch User Inputs
    $name = trim($_POST["name"]);
    $cnic = trim($_POST["cnic"]);
    $email = trim($_POST["email"]);
    $password = password_hash(trim($_POST["password"]), PASSWORD_DEFAULT);
    $phone = trim($_POST["phone"]);
    $address = trim($_POST["address"]);
    $town = trim($_POST["town"]);
    $region = trim($_POST["region"]);
    $postcode = trim($_POST["postcode"]);
    $country = trim($_POST["country"]);

    // Secure SQL Query (Prevent SQL Injection)
    $sql = "INSERT INTO users (name, cnic, email, password, phone, address, town, region, postcode, country) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssssss", $name, $cnic, $email, $password, $phone, $address, $town, $region, $postcode, $country);

    if (mysqli_stmt_execute($stmt)) {
        echo "Registration successful. <a href='index.php'>Login here</a>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close Statement & Connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>


<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Daycare Management System</title>
    <style>
/* General Styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f8f9fa;
    color: #333;
}

/* Header */
header {
    background-color: #0056b3;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 50px;
}

header h1 {
    margin: 0;
    font-size: 24px;
}

nav ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
}

nav ul li {
    margin-left: 20px;
}

nav ul li a {
    color: white;
    text-decoration: none;
    font-size: 16px;
}

nav ul li a:hover {
    text-decoration: underline;
}

/* Registration Form */
.register-container {
    width: 40%;
    background: white;
    margin: 50px auto;
    padding: 30px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

.register-container h2 {
    text-align: center;
    margin-bottom: 20px;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    display: block;
    text-align: left;
    font-weight: bold;
    margin: 5px 0;
}

input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 10px;
    font-size: 16px;
}

/* Input Focus Effect */
input:focus {
    border: 2px solid #0056b3;
    outline: none;
}

/* Password Visibility Toggle */
.password-container {
    position: relative;
}

.password-container input {
    padding-right: 40px;
}

.password-toggle {
    position: absolute;
    right: 10px;
    top: 35%;
    cursor: pointer;
    font-size: 16px;
}

/* Button Styling */
button {
    background-color: #0056b3;
    color: white;
    padding: 10px;
    margin-top: 20px;
    border: none;
    cursor: pointer;
    font-size: 16px;
    border-radius: 5px;
    transition: 0.3s;
}

button:hover {
    background-color: #003d82;
}

/* Footer Styles */
footer {
    background: #343a40;
    color: white;
    padding: 20px 0;
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
}

/* Responsive Design */
@media (max-width: 768px) {
    .register-container {
        width: 80%;
    }

    header {
        flex-direction: column;
        text-align: center;
    }

    nav ul {
        margin-top: 10px;
        flex-direction: column;
    }

    nav ul li {
        margin: 5px 0;
    }

    .footer-container {
        flex-direction: column;
        text-align: center;
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

    <section class="register-container">
        <h2>Create an Account</h2>
        <form action="register.php" method="POST">
            <label for="name">Full Name:</label>
            <input type="text" name="name" required>

            <label for="cnic">CNIC:</label>
            <input type="text" name="cnic" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" name="confirm_password" required>

            <label for="phone">Phone Number:</label>
            <input type="text" name="phone" required>

            <label for="address">Address:</label>
            <input type="text" name="address" required>

            <label for="town">Town:</label>
            <input type="text" name="town">

            <label for="region">Region:</label>
            <input type="text" name="region">

            <label for="postcode">Postcode:</label>
            <input type="text" name="postcode">

            <label for="country">Country:</label>
            <input type="text" name="country">

            <button type="submit">Register</button>
        </form>

        <p>Already have an account? <a href="index.php">Login here</a></p>
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
