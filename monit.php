<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../"); // Redirect to login page
    exit();
}

// Display user's dashboard content
echo "Welcome, " . $_SESSION['username'] . "! This is your dashboard.";
header("Location: ../");
exit();
?>
