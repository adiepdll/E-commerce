<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OneStop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header>

        <input type="checkbox" name="" id="toggler">
        <label for="toggler" class="fas fa-bars"></label>

        <a href="#" class="logo">OneStop<span></span></a>

        <nav class="navbar">
            <?php 
                if(isset($_SESSION["firstname"])) { 
                    echo "<a href='home.php'>Home</a>";
                    echo "<a href='home.php#ourservices'>Services</a>";
                    echo "<a href='home.php#aboutus'>About Us</a>";
                    echo "<a href='home.php#howitworks'>How It Works</a>";
                    echo "<a href='jobhistory.php'>Job History</a>";
                } else {
                    echo "<a href='index.php'>Home</a>";
                    echo "<a href='index.php'>Services</a>";
                    echo "<a href='index.php#aboutus'>About Us</a>";
                    echo "<a href='index.php#howitworks'>How It Works</a>";
                }
            ?>
        </nav>

        <div class="icons">
            <?php 
                if(isset($_SESSION["firstname"])) { 
                    echo "<a href='includes/logouthandler.inc.php'><i class='fa fa-sign-out' aria-hidden='true' style='font-size: 16px;'></i><font size='3'> Logout</font></a>";
                } /*else {
                    echo "<a href='#' class='fas fa-user' id='login-btn'></a>";-->
                }*/
            ?>
        </div>

    </header>
</body>
</html>