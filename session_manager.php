<?php
session_start();

// Check if the user is not logged in and attempting to access a restricted page
if (!isset($_SESSION['user_id']) && !in_array(basename($_SERVER['PHP_SELF']), ['login.php', 'register.php'])) {
    header("Location: login.php"); // Redirect to the login page
    exit();
}

// Function to set the user ID in the session
function setUserID($user_id) {
    $_SESSION['user_id'] = $user_id;
}

// Function to get the user ID from the session
function getUserID() {
    return isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
}

// Function to destroy the session and log out the user
function logout() {
    session_unset();
    session_destroy();
    header("Location: login.php"); // Redirect to the login page after logging out
    exit();
}
?>
