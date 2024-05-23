<?php
// Include the database connection file
include 'connectiondb.php';

// Check if the event ID is provided in the request
if(isset($_GET['eventId'])) {
    // Sanitize the input to prevent SQL injection
    $eventId = mysqli_real_escape_string($conn, $_GET['eventId']);
    
    // Fetch event details from the database based on the event ID
    $sql = "SELECT * FROM events WHERE event_id = '$eventId'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1) {
        // Fetch the event details as an associative array
        $eventDetails = mysqli_fetch_assoc($result);
        
        // Return the event details as JSON response
        header('Content-Type: application/json');
        echo json_encode($eventDetails);
    } else {
        // Event with the provided ID not found
        http_response_code(404);
        echo json_encode(array("message" => "Event not found."));
    }
} else {
    // Event ID not provided in the request
    http_response_code(400);
    echo json_encode(array("message" => "Event ID is required."));
}

// Close database connection
mysqli_close($conn);
?>
