<!DOCTYPE html>
<?php
    include "navbar.php";
?>
<html lang="en" dir="ltr">
    <head>
      <meta charset="UTF-8">
      <title>Job Request</title>
      <link rel="stylesheet" href="jobrequest.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
<body>
    <div class="container">
      <br><br><br>
      <div class="title">Job Request</div>
      <?php
          try {
              require_once "includes/dbh.inc.php";

                  if(isset($_GET['id'])) {
                      $serviceid = $_GET['id'];
                  }

                  $query = "SELECT * FROM jobschedules WHERE id = :serviceid;";
                  $stmt = $pdo->prepare($query);

                  $stmt->bindParam(":serviceid", $serviceid);

                  $stmt->execute();
                  $count = $stmt->rowCount();
                  $results = $stmt->fetchAll();

                  if($count<1) {
                      echo "No available service schedule.";
                  } else {
                      foreach($results as $row) {
                          echo "<font size='2'><i><br> Service: " . $row["service"] . 
                              "<br> Schedule: "  . $row["service_dt"] . 
                              "<br> Skilled Professional: "  . $row["skilled_professional"] . "</i></font>";
                      }
                  }

          } catch (PDOException $e) {
              die("Query failed: " . $e->getMessage());
          }
      ?>
      <div class="content">
        <form action="includes/jobrequesthandler.inc.php" method="post">
          <?php
              if(isset($_GET['id'])) {
                  $jobscheduleid = $_GET['id'];
                  echo "<input type='hidden' name='jobscheduleid' value='". $jobscheduleid . "'>";
              }
          ?>
          
          <div class="user-details">
            <div class="input-box">
              <span class="details">Address</span>
              <input type="text" name="address" required>
            </div>
            <div class="input-box">
              <span class="details">City</span>
              <input type="text" name="city" required>
            </div>
            <div class="input-box">
              <span class="details">Phone Number</span>
              <input type="text" name="phone" required>
            </div>
            <div class="input-box">
              <span class="details">Special Request (optional) </span>
              <input type="text" name="specialrequest">
            </div>
          </div>
          <div class="payment-details">
            <input type="radio" name="paymentmethod" id="dot-1" value="Cash">
            <input type="radio" name="paymentmethod" id="dot-2" value="Gcash">
            <input type="radio" name="paymentmethod" id="dot-3" value="Maya">
            <span class="payment-title">Payment Method</span>
            <div class="category">
              <label for="dot-1">
                <span class="dot one"></span>
                <span><font size="3">Cash</font></span>
              </label>
              <label for="dot-2">
                <span class="dot two"></span>
                <span><font size="3">Gcash</font></span>
              </label>
              <label for="dot-3">
                <span class="dot three"></span>
                <span><font size="3">Maya</font></span>
              </label>
            </div>
          </div>
          <div class="button">
            <input type="submit" value="Submit">
          </div>
        </form>
      </div>
    </div>

</body>
</html>