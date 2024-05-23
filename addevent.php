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
<?php include_once('adminheader.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Event</title>
  <style>
    /* Reset some default styles */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
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

    .form-container {
      margin-top: 0px;
    }

    .login100-form {
      width: 100%;
      background-color: #f9f9f9;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      padding: 10px;
    }

    .login100-form-title {
      font-size: 24px;
      text-align: center;
      margin-bottom: 40px;
    }

    .wrap-input100 {
      position: relative;
      margin-bottom: 20px;
    }

    .wrap-input100 input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .wrap-input100 .focus-input100 {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 2px;
      background-color: #333;
      transition: all 0.4s;
    }

    .wrap-input100 input:focus + .focus-input100 {
      height: 3px;
    }

    .container-login100-form-btn {
      text-align: center;
    }

    .login100-form-btn {
      display: inline-block;
      background-color: #333;
      color: #fff;
      padding: 10px 30px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .login100-form-btn:hover {
      background-color: #555;
    }
  </style>
</head>
<body>
<div class="container">
  <div class="form-container">
    <form class="login100-form validate-form" action="addeventprocess.php" method="post" enctype="multipart/form-data">
      <span class="login100-form-title">
        Add Event
      </span>

      <div class="wrap-input100 validate-input" data-validate="Event title is required">
        <input class="input100" type="text" name="eventtitle" placeholder="Event Title">
        <span class="focus-input100"></span>
      </div>

      <div class="wrap-input100 validate-input" data-validate="Event date is required">
        <input class="input100" type="date" name="eventdate">
        <span class="focus-input100"></span>
      </div>

      <div class="wrap-input100 validate-input" data-validate="Event hour is required">
        <input class="input100" type="time" name="eventhour">
        <span class="focus-input100"></span>
      </div>

      <div class="wrap-input100 validate-input" data-validate="Event place is required">
        <input class="input100" type="text" name="eventowner" placeholder="Event Owner">
        <span class="focus-input100"></span>
      </div>

      <div class="wrap-input100 validate-input" data-validate="Event image is required">
        <input class="input100" type="file" name="eventimage">
        <span class="focus-input100"></span>
      </div>

      <div class="wrap-input100 validate-input" data-validate="Event owner is required">
        <input class="input100" type="text" name="eventplace" placeholder="Event Place">  
        <span class="focus-input100"></span>
      </div>

      <div class="wrap-input100 validate-input" data-validate="Event owner is required">
        <input class="input100" type="numbers" name="eventamount" placeholder="Event Amount">  
        <span class="focus-input100"></span>
      </div>

      <div class="container-login100-form-btn">
        <button class="login100-form-btn" type="submit" name="addevent">
          Add Event
        </button>
      </div>
    </form>
  </div>
</div>

<script>
  function logout() {
    // Redirect to login page
    window.location.href = "login.php";
  }
</script>

</body>
</html>
