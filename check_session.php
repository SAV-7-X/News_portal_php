<?php
session_start();

// Check if session ID and username are set
if (!isset($_SESSION['user_id']) || !isset($_SESSION['username'])) {
    header('Location: login_admin.php'); // Redirect to login page
    exit();
}

?>
