<?php
session_start();
include 'db_connect.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // Fetch user data from the database
    $sql = "SELECT id, name, password, role FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row["password"])) {
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["user_name"] = $row["name"];
            $_SESSION["role"] = $row["role"];

            // Redirect based on role
            if ($row["role"] === "admin") {
                header("Location: admin_dashboard.php");
                exit();
            } elseif ($row["role"] === "staff") {
                header("Location: staff_dashboard.php");
                exit();
            } else { // Default is parent
                header("Location: parent_dashboard.php");
                exit();
            }
        } else {
            echo "Invalid password. <a href='index.php'>Try again</a>";
        }
    } else {
        echo "No user found with this email. <a href='index.php'>Try again</a>";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
