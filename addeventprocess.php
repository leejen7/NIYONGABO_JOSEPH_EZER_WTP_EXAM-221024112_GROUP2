<?php
// Check if the form is submitted
if(isset($_POST['addevent'])) {
    // Include the database connection file
    include 'connectiondb.php';

    // Retrieve form data
    $eventTitle = $_POST['eventtitle'];
    $eventDate = $_POST['eventdate'];
    $eventHour = $_POST['eventhour'];
    $eventPlace = $_POST['eventplace'];
    $eventOwner = $_POST['eventowner'];
    $eventAmount = $_POST['eventamount'];

    // File upload handling
    $targetDir = "uploads/";
    $fileName = basename($_FILES["eventimage"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["eventimage"]["tmp_name"]);
    if($check !== false) {
        // Allow certain file formats
        $allowTypes = array('jpg','jpeg','png','gif');
        if(in_array($fileType, $allowTypes)){
            // Upload file to server
            if(move_uploaded_file($_FILES["eventimage"]["tmp_name"], $targetFilePath)){
                // Insert event data into database
                $sql = "INSERT INTO events (event_title, event_date, event_hour, event_place, event_image, event_owner, event_amount) 
                        VALUES ('$eventTitle', '$eventDate', '$eventHour', '$eventPlace', '$fileName', '$eventOwner', '$eventAmount')";
                if(mysqli_query($conn, $sql)){
                    echo "<script>alert('Event added successfully')</script>"; // Corrected script tag
                    echo "<script>window.location.href = 'eventdetails.php';</script>";
                    exit(); // Added exit to stop further execution
                } else{
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            } else{
                echo "Sorry, there was an error uploading your file.";
            }
        } else{
            echo "Sorry, only JPG, JPEG, PNG, GIF files are allowed.";
        }
    } else{
        echo "File is not an image.";
    }

    // Close database connection
    mysqli_close($conn);
}
?>
