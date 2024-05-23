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
<title>Event Booking Status</title>
<style>
    /* Add your CSS styles here */
    body {
        background-image: url('img/bodyimg.jpg');
        background-size: cover; /* This ensures the background image covers the entire body */
        background-repeat: no-repeat; /* Prevent the background image from repeating */
    }
    .ball-chart {
        display: flex;
        justify-content: center;
        margin-top: 50px;
    }
    .ball-container {
        text-align: center;
    }
    .ball {
        width: 300px;
        height: 300px;
        border-radius: 50%;
        background-color: #ccc;
        margin: 0 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 18px;
    }
    .booked {
        background-color: #ff7f0e;
    }
    .available {
        background-color: #2ca02c;
    }
    .sold-out {
        background-color: #d62728;
    }
    .label {
        margin-top: 5px;
    }
</style>
</head>
<body>

<div class="ball-chart">
    <div class="ball-container">
        <div class="ball booked">10</div>
        <div class="label">Booked</div>
    </div>
    <div class="ball-container">
        <div class="ball available">20</div>
        <div class="label">Available</div>
    </div>
    <div class="ball-container">
        <div class="ball sold-out">5</div>
        <div class="label">Sold Out</div>
    </div>
</div>

<script>
    // Add your JavaScript logic here (if any)
</script>

</body>
</html>
