<?php
// Include the database connection file
include 'connectiondb.php';

// Check if the event ID is set and if the user confirmed deletion
if(isset($_GET['event_id']) && isset($_GET['confirm']) && $_GET['confirm'] === 'yes') {
    // Retrieve the event ID
    $eventId = $_GET['event_id'];

    // Delete the event from the database
    $sql = "DELETE FROM `events` WHERE `events`.`event_id` = $eventId";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Event deleted successfully')</script>";
    } else{
        echo "Error deleting event: " . mysqli_error($conn);
    }

    // Close database connection
    mysqli_close($conn);
} elseif (isset($_GET['event_id'])) {
    // If the user didn't confirm deletion, redirect back to the event list
    header("Location: eventdetails.php");
    exit();
}
?>

