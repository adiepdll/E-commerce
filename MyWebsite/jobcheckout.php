<?php
    include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="jobcheckout.css">
</head>
<body>
    <div class="main">
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
                        $pesoSign = '&#8369';
                        foreach($results as $row) {
                            //format date
                            $timestamp = strtotime($row["service_dt"]);
                            $formattedDate = date('d M Y', $timestamp);
                            $jobDetails = "Service: " . $row["service"] . 
                            "<br> Schedule: "  . $formattedDate . 
                            "<br> Skilled Professional: "  . $row["skilled_professional"].
                            "<br><br>".$row["description"]."<br><br>".$pesoSign." ".$row["price"];

                            $item = $row["service"];
                            if ($item == "Cook") {
                                $jobicon ='./images/cooking1.png';
                            } else if ($item == "Plumber") {
                                $jobicon ='./images/plumbing1.png';
                            } else if ($item == "Home Cleaning") {
                                $jobicon ='./images/cleaning1.png';
                            } else if ($item == "Electrical Repair") {
                                $jobicon ='./images/electricalrepair.png';
                            } else if ($item == "Driver") {
                                $jobicon ='./images/driver.png';
                            } else if ($item == "Movers") {
                                $jobicon ='./images/movers.png';
                            }
                        }
                    }

            } catch (PDOException $e) {
                die("Query failed: " . $e->getMessage());
            }
        ?>
        <div class="card">
            <div class="leftside">
                <div><img src="<?php echo $jobicon;?>" alt="" class="pic"></div>
                <div><?php echo $jobDetails?></div>
            </div>
            <div class="rightside">
                <form action="includes/jobrequesthandler.inc.php" method="post">
                    <?php
                        if(isset($_GET['id'])) {
                            $jobscheduleid = $_GET['id'];
                            echo "<input type='hidden' name='jobscheduleid' value='". $jobscheduleid . "'>";
                        }
                    ?>
                    <h1>Job Booking</h1>
                    <h2>Payment Information</h2>
                    <p>Address</p>
                    <input type="text" class="inputbox" name="address" required>

                    <p>City</p>
                    <input type="text" class="inputbox" name="city" required>

                    <p>Phone Number</p>
                    <input type="text" class="inputbox" name="phone" required>

                    <p>Special Request (optional)</p>
                    <input type="text" class="inputbox" name="specialrequest">

                    <p>Payment Method</p>
                    <select name="paymentmethod" id="" class="inputbox">
                        <option value="">Select a payment method.</option>
                        <option value="Cash">Cash</option>
                        <option value="Gcash">Gcash</option>
                        <option value="Maya">Maya</option>
                    </select>
                    <button type="submit" class="button">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>