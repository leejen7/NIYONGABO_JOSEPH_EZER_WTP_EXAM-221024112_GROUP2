<?php
// Include the database connection file
include 'connectiondb.php';

// Check if the form is submitted for update
if(isset($_POST['updateEventId'])) {
    // Retrieve form data
    $eventId = $_POST['updateEventId'];
    $eventTitle = $_POST['updateEventTitle'];
    $eventDate = $_POST['updateEventDate'];
    $eventHour = $_POST['updateEventHour'];
    $eventPlace = $_POST['updateEventPlace'];
    $eventOwner = $_POST['updateEventOwner'];

    // Update event data in the database
    $sql = "UPDATE events SET 
                event_title = '$eventTitle', 
                event_date = '$eventDate', 
                event_hour = '$eventHour', 
                event_place = '$eventPlace', 
                event_owner = '$eventOwner' 
            WHERE event_id = $eventId";

    if(mysqli_query($conn, $sql)){
        echo "Event updated successfully.";
    } else{
        echo "Error updating event: " . mysqli_error($conn);
    }

    // Close database connection
    mysqli_close($conn);
}
?>
