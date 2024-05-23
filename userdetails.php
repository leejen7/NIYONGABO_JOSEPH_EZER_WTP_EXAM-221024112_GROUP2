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
<title>User List</title>
<style>
    /* Add your CSS styles here */
    body {
        font-family: Arial, sans-serif;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
    }
    th {
        background-color: #333;
        color: #fff;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    tr:hover {
        background-color: #ddd;
    }
</style>
</head>
<body>

<?php
// Include the database connection file
include 'connectiondb.php';

// Fetch users from the database
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

// Check if there are any users
if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>Username</th><th>Name</th><th>Phone</th><th>Email</th><th>Status</th></tr>"; // Updated table header
    // Output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row["username"]."</td>";
        echo "<td>".$row["name"]."</td>";
        echo "<td>".$row["phone"]."</td>";
        echo "<td>".$row["email"]."</td>";
        echo "<td>".$row["status"]."</td>"; // Updated column name to "status"
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Close database connection
mysqli_close($conn);
?>

</body>
</html>
