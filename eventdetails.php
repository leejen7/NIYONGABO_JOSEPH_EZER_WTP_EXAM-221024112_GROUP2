<?php include_once('adminheader.php');?>
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
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Event List</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
    /* Add your CSS styles here */
    body {
        font-family: Arial, sans-serif;
    }
    .table-container {
        margin-top: 20px;
        width: 100%;
    }
    .table-header {
        text-align: center;
        font-size: 24px;
        margin-bottom: 20px;
    }
    .table-container table {
        width: 100%;
        margin-bottom: 20px;
    }
    .table-container th,
    .table-container td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    .table-container th {
        background-color: #f2f2f2;
    }
    .table-container tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    .table-container tbody tr:hover {
        background-color: #ddd;
    }
</style>
<script>
    function confirmDelete(eventId) {
        if (confirm("Are you sure you want to delete this event?")) {
            window.location.href = "delete_event.php?event_id=" + eventId;
        }
    }

    function showUpdateForm(eventId, eventTitle, eventDate, eventHour, eventPlace, eventOwner) {
        document.getElementById("updateEventForm").style.display = "block";
        document.getElementById("updateEventId").value = eventId;
        document.getElementById("updateEventTitle").value = eventTitle;
        document.getElementById("updateEventDate").value = eventDate;
        document.getElementById("updateEventHour").value = eventHour;
        document.getElementById("updateEventPlace").value = eventPlace;
        document.getElementById("updateEventOwner").value = eventOwner;
    }

    function hideUpdateForm() {
        document.getElementById("updateEventForm").style.display = "none";
    }
</script>
</head>
<body>

<div class="container">
    <h2 class="table-header">Event Details</h2>
    <div class="table-container">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Event Title</th>
                    <th>Date</th>
                    <th>Hour</th>
                    <th>Place</th>
                    <th>Image</th>
                    <th>Owner</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Include the database connection file
                include 'connectiondb.php';

                // Fetch events from the database
                $sql = "SELECT * FROM events";
                $result = mysqli_query($conn, $sql);

                // Check if there are any events
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>".$row["event_title"]."</td>";
                        echo "<td>".$row["event_date"]."</td>";
                        echo "<td>".$row["event_hour"]."</td>";
                        echo "<td>".$row["event_place"]."</td>";
                        echo "<td><img src='uploads/".$row["event_image"]."' width='100' height='100'></td>";
                        echo "<td>".$row["event_owner"]."</td>";
                        echo "<td>";
                        echo "<button class='btn btn-primary btn-update' onclick=\"showUpdateForm('".$row["event_id"]."', '".$row["event_title"]."', '".$row["event_date"]."', '".$row["event_hour"]."', '".$row["event_place"]."', '".$row["event_owner"]."')\">Update</button>";
                        echo "<button class='btn btn-danger btn-delete' onclick=\"confirmDelete('".$row["event_id"]."')\">Delete</button>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>0 results</td></tr>";
                }

                // Close database connection
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Update Event Form -->
<div id="updateEventForm" class="modal" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Event</h4>
                <button type="button" class="close" data-dismiss="modal" onclick="hideUpdateForm()">&times;</button>
            </div>
            <div class="modal-body">
                <form action="update_event.php" method="post">
                    <input type="hidden" id="updateEventId" name="updateEventId">
                    <div class="form-group">
                        <label for="updateEventTitle">Title:</label>
                        <input type="text" class="form-control" id="updateEventTitle" name="updateEventTitle">
                    </div>
                    <div class="form-group">
                        <label for="updateEventDate">Date:</label>
                        <input type="date" class="form-control" id="updateEventDate" name="updateEventDate">
                    </div>
                    <div class="form-group">
                        <label for="updateEventHour">Hour:</label>
                        <input type="time" class="form-control" id="updateEventHour" name="updateEventHour">
                    </div>
                    <div class="form-group">
                        <label for="updateEventPlace">Place:</label>
                        <input type="text" class="form-control" id="updateEventPlace" name="updateEventPlace">
                    </div>
                    <div class="form-group">
                        <label for="updateEventOwner">Owner:</label>
                        <input type="text" class="form-control" id="updateEventOwner" name="updateEventOwner">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" onclick="hideUpdateForm()">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript to show confirmation before deletion -->
<script>
    function confirmDelete(eventId) {
        if (confirm("Are you sure you want to delete this event?")) {
            window.location.href = "delete_event.php?event_id=" + eventId;
        }
    }
</script>

</body>
</html>
