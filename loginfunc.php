<?php
include_once('connectiondb.php');
session_start(); // Start the session

// Check if form is submitted
if(isset($_POST['login'])) {
    // Collect form data
    $username = $_POST['uname'];
    $password = $_POST['pwd'];
    
    // Check if user exists with the given credentials
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Fetch user data
        $row = $result->fetch_assoc();
        
        // Set session variables
        $_SESSION['user_id'] = $row['user_id']; // Store user ID in session
        $_SESSION['username'] = $row['username']; // Store username in session
        
        // Check user status
        if ($row['status'] == 'user') {
            // User is a regular user, redirect to home page
            header('Location: home.php');
            exit(); // Ensure script stops executing after redirection
        } elseif ($row['status'] == 'admin') {
            // User is an admin, redirect to admin page
            header('Location: adminpage.php');
            exit(); // Ensure script stops executing after redirection
        }
    } else {
        // Display alert message if user does not exist
        echo "<script>alert('Incorrect username or password. Please try again.');</script>";
        echo "<script>window.location.href = 'login.php';</script>";
        exit(); // Ensure script stops executing after redirection
    }
}

// Close connection
$conn->close();

// If login was not successful, display login form
?>
