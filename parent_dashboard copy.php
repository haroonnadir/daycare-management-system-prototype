<?php
session_start();
if ($_SESSION['role'] != 'parent') {
    header("Location: index.php");
    exit();
}
echo "<h2>Welcome Parent!</h2>";
?>
