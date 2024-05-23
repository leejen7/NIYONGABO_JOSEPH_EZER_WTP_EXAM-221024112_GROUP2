<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Header Example</title>
  <!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="img/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
  <style>
    /* Reset some default styles */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .header {
      background: linear-gradient(45deg, #ff00ff, #800080); /* Gradient background for the entire header */
      color: #fff;
      padding: 20px 0;
    }

    .logo img {
      max-width: 100px; /* Adjust the width of the logo image */
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
      transition: background-color 0.3s, font-size 0.3s; /* Added transition for font-size */
      font-size: 16px; /* Increased font size */
    }

    .menu ul li a:hover,
    .menu ul li button:hover {
      background-color: #555;
      font-size: 19px; /* Increase font size on hover */
    }
  </style>
</head>
<body>

<header class="header">
  <div class="container">
    <div class="logo"><img src="img/logo.png" alt="Your Logo"></div> <!-- Replaced text logo with an image logo -->
    <nav class="menu">
      <ul>
        <li><a href="adminpage.php">Dashboard</a></li>
        <li><a href="addevent.php">Add Event</a></li>
        <li><a href="eventdetails.php">Event Details</a></li>
        <li><a href="userdetails.php">Users Details</a></li>
        <li>
          <form id="logoutForm" method="post" action="logout.php">
            <button type="submit">Logout</button>
          </form>
        </li>
      </ul>
    </nav>
  </div>
</header>

<script>
    // Optional: Add JavaScript to prevent the user from going back after logout
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

</body>
</html>
