<?php
include_once('connectiondb.php');
// Check if form is submitted
if(isset($_POST['registrationbn'])) {
    // Collect form data
    $username = $_POST['u_name'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $status = $_POST['role'];
    
    // Insert data into the users table
    $sql = "INSERT INTO users (username, password, name, phone, email, status) VALUES ('$username', '$password', '$name', '$phone', '$email', '$status')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('New record created successfully')</script>";
        header('Location:login.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
