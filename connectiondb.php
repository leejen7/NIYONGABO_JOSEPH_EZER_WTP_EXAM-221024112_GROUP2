<?php

// Database connection parameters
$servername = "localhost"; 
$username = "root";
$password = ""; 
$database = "bitevents"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Example query to retrieve user data
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "";
    }
} else {
    echo "";
}

?>
