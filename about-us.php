<?php include_once('header.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <style>
        body{
            background-image: url('img/bodyimg.jpg');
        background-size: cover; /* This ensures the background image covers the entire body */
        background-repeat: no-repeat; /* Prevent the background image from repeating */
        }
        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
        }

        .left {
            width: 50%;
        }

        .left h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .left p {
            font-size: 16px;
            line-height: 1.5;
            text-align: justify;
        }

        .right {
            width: 50%;
            text-align: center;
        }

        .right img {
            max-width: 80%;
            height: auto;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="left">
        <h2>About Us</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <div class="right">
        <img src="img/meru.jpg" alt="Meru">
    </div>
</div>

</body>
</html>

