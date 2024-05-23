<?php
session_start();

// Check if user is logged in
if(isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    // You can now use $user_id to perform actions specific to the logged-in user
} else {
    // Redirect to the login page if user is not logged in
    header("Location: login.php");
    exit;
}
?>
<?php
// Include the database connection file
include 'connectiondb.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are filled
    if(isset($_POST['ticketQty']) && !empty($_POST['ticketQty']) && isset($_POST['eventId']) && !empty($_POST['eventId']) && isset($_POST['userId']) && !empty($_POST['userId'])) {
        // Sanitize inputs to prevent SQL injection
        $eventId = mysqli_real_escape_string($conn, $_POST['eventId']);
        $userId = mysqli_real_escape_string($conn, $_POST['userId']);
        $ticketQty = mysqli_real_escape_string($conn, $_POST['ticketQty']);
        
        // Get the current date and time
        $bookingDate = date('Y-m-d H:i:s');
        
        // Insert booking data into the 'booked' table
        $sql = "INSERT INTO booked (event_id, user_id, tickets_taken, booking_date) VALUES ('$eventId', '$userId', '$ticketQty', '$bookingDate')";
        if(mysqli_query($conn, $sql)) {
            // Booking successful
            http_response_code(200);
            echo json_encode(array("message" => "Ticket purchased successfully!"));
        } else {
            // Booking failed
            http_response_code(500);
            echo json_encode(array("message" => "Failed to purchase ticket."));
        }
    } else {
        // Missing required fields
        http_response_code(400);
        echo json_encode(array("message" => "All fields are required."));
    }
} else {
    // Invalid request method
    http_response_code(405);
    echo json_encode(array("message" => "Invalid request method."));
}

// Close database connection
mysqli_close($conn);
?>
