<?php include_once('header.php');?>
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
  <title>Event Cards</title>
  <style>
    /* Reset some default styles */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background-image: url('img/bodyimg.jpg');
        background-size: cover; /* This ensures the background image covers the entire body */
        background-repeat: no-repeat; /* Prevent the background image from repeating */
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
    }

    .header {
      background-color: #333;
      color: #fff;
      padding: 20px 0;
    }

    .logo {
      font-size: 24px;
    }

    .menu ul {
      list-style-type: none;
    }

    .menu ul li {
      display: inline-block;
      margin-left: 20px;
    }

    .menu ul li a,
    .menu ul li button {
      color: #fff;
      text-decoration: none;
      padding: 10px 15px;
      border: none;
      background-color: transparent;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .menu ul li a:hover,
    .menu ul li button:hover {
      background-color: #555;
    }

    .section {
      margin-top: 30px;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }

    .card {
      width: calc(25% - 20px); /* Adjust width to fit four cards per row with some margin */
      margin-bottom: 20px;
      background-color: #f9f9f9;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      padding: 20px;
    }

    .card img {
      width: 100%;
      border-radius: 5px;
    }

    .card h2 {
      margin-top: 10px;
      font-size: 18px;
    }

    .card p {
      margin-top: 5px;
      color: #666;
    }

    /* Buy Ticket Button Styles */
    .buy-ticket-btn {
      background: linear-gradient(45deg, #ff00ff, #800080); /* Purple and pink gradient */
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .buy-ticket-btn:hover {
      background-color: #333; /* Black hover */
    }

    /* Modal Styles */
    .modal {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 1; /* Sit on top */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content Styles */
    .modal-content {
      background-color: #fefefe;
      margin: 15% auto; /* 15% from the top and centered */
      padding: 20px;
      border: 1px solid #888;
      width: 80%; /* Could be more or less, depending on screen size */
    }

    /* Close Button Styles */
    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
    }
  </style>
</head>
<body>
<div class="container">
  <section class="section">
    <?php
    // Include the database connection file
    include 'connectiondb.php';

    // Fetch events from the database
    $sql = "SELECT * FROM events";
    $result = mysqli_query($conn, $sql);

    // Check if there are any events
    if (mysqli_num_rows($result) > 0) {
        // Output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            ?>
            <!-- Card -->
            <div class="card">
              <img src="<?php echo $row['event_image']; ?>" alt="<?php echo $row['event_title']; ?>">
              <h2><?php echo $row['event_title']; ?></h2>
              <p>Date: <?php echo $row['event_date']; ?></p>
              <p>Time: <?php echo $row['event_hour']; ?></p>
              <p>Amount: <?php echo $row['event_amount']; ?></p>
              <p><button class="buy-ticket-btn" onclick="buyTicket(<?php echo $row['event_id']; ?>, <?php echo $user_id; ?>)">BUY TICKET</button></p>
            </div>
            <?php
        }
    } else {
        echo "No events available.";
    }

    // Close database connection
    mysqli_close($conn);
    ?>
  </section>
</div>

<!-- Modal HTML -->
<div id="ticketModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Event Details</h2>
    <div id="eventDetails"></div>
    <form id="ticketForm" action="book_ticket.php">
      <label for="ticketQty">Number of Tickets:</label>
      <input type="number" id="ticketQty" name="ticketQty" min="1" required>
      <button type="submit">Confirm</button>
    </form>
  </div>
</div>

<script>
  // Get the modal
  var modal = document.getElementById("ticketModal");

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks the button, open the modal 
  function buyTicket(eventId, userId) {
    // Fetch event details using AJAX
    fetch('get_event_details.php?eventId=' + eventId)
      .then(response => response.json())
      .then(data => {
        // Display event details in modal
        document.getElementById('eventDetails').innerHTML = `
          <p>Title: ${data.event_title}</p>
          <p>Date: ${data.event_date}</p>
          <p>Time: ${data.event_hour}</p>
          <p>Amount: ${data.event_amount}</p>
        `;
        // Show the modal
        modal.style.display = "block";
      })
      .catch(error => {
        console.error('Error:', error);
        alert("Failed to fetch event details.");
      });
  }

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }

  // Handle form submission
  document.getElementById('ticketForm').addEventListener('submit', function(event) {
    event.preventDefault();
    var formData = new FormData(this);
    fetch('book_ticket.php', {
      method: 'POST',
      body: formData
    })
    .then(response => {
      if (response.ok) {
        alert("Ticket purchased successfully!");
        modal.style.display = "none"; // Close modal after successful purchase
      } else {
        throw new Error('Failed to purchase ticket');
      }
    })
    .catch(error => {
      console.error('Error:', error);
      alert("Failed to purchase ticket. Please try again later.");
    });
  });
</script>

</body>
</html>
