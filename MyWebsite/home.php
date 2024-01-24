<?php
    include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<section class="home" id="home">
    <div class="content">
    <div style="padding: 0; margin-top: 60px;">
        <p style="font-weight: normal; font-size: 30px;">Welcome <?php echo $_SESSION["firstname"]; ?>!</p>
    </div>
        <h3>Experience the best Home Services.</h3>
        <span>Reliable, Trusted and Easy. </span>
        <p>We are providing best home services. Your one-stop destination for your household needs. </p>
        <a href="#ourservices" class="btn">Book a Service</a>
    </div>
</section>

<section class="services" id="services">

    <h1 class="heading" id="ourservices"> Our <span> Services </span></h1>

    <div class="box-container">

        <div class="box">
            <div class="image">
                <img src="images/cooking1.png" alt="">
            </div>
            <div class="content">
                <?php
                    echo "<a href='jobschedules.php?i=Cook' class='btn'>Cook</a>";
                ?>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/plumbing1.png" alt="">
            </div>
            <div class="content">
                <?php
                    echo "<a href='jobschedules.php?i=Plumber' class='btn'>Plumber</a>";
                ?>
                </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/cleaning1.png" alt="">
            </div>
            <div class="content">
                <?php
                    echo "<a href='jobschedules.php?i=Home Cleaning' class='btn'>Home Cleaning</a>";
                ?>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/electricalrepair.png" alt="">
            </div>
            <div class="content">
                <?php
                    echo "<a href='jobschedules.php?i=Electrical Repair' class='btn'>Electrical Repair</a>";
                ?>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/driver.png" alt="">
            </div>
            <div class="content">
                <?php
                    echo "<a href='jobschedules.php?i=Driver' class='btn'>Driver</a>";
                ?>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/movers.png" alt="">
            </div>
            <div class="content">
                <?php
                    echo "<a href='jobschedules.php?i=Movers' class='btn'>Movers</a>";
                ?>
            </div>
        </div>

    </div>
</section>

<section>
    <h1 class="heading" id="aboutus"> <span> About </span> Us</h1>
    <div class="responsive-container-block bigContainer">
        <div class="responsive-container-block Container">
            <img class="mainImg" src="images/cleaning.jpg">
            <div class="allText aboveText">
      <p class="text-blk headingText">
        Why Choose Us?
      </p>
      <p class="text-blk subHeadingText">
        Ditch the DIY stress, reclaim your time, and enjoy a worry-free home with OneStop.
      </p>
      <p class="text-blk description">
        We're not just another home services provider. We're your trusted partner, dedicated to making your life easier and your home a haven of comfort and convenience.
      </p>
    </div>
  </div>
</section>

<section>
<h1 class="heading" id="howitworks"> How It <span> Works </span></h1>
  <div class="responsive-container-block Container bottomContainer">
    <img class="mainImg" src="images/pic.jpg">
    <div class="allText bottomText">
      <p class="text-blk headingText">
        1. Select your service. <br>
        2. Choose a date and time. <br>
        3. Provide your details. <br>
        4. Choose your payment method. <br>
        5. Sit back and relax! <br>
      </p>
    </div>
  </div>
</div>
</section>

<!--<section class="about" id="about">
    <h1 class="heading" id="aboutus"> <span> About </span> Us </h1>
      <div class="row">
            <div class="video-container">
                <video src="images/video.mp4" loop autoplay muted></video>
                <h3>Best Home Services</h3>

                <div class="content">
                    <h2>Why Choose Us?</h2>
                    <p>Ditch the DIY stress, reclaim your time, and enjoy a worry-free home with OneStop.</p>
                    <p>We're not just another home services provider. We're your trusted partner, dedicated to making your life easier and your home a haven of comfort and convenience.</p>
                </div>
            </div>
      </div>

</section>-->

</body>
</html>