<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="updatejobrequests.css">
</head>
<body>
    <div class="sidenav">
        <?php
            include "adminpage.php";
        ?>
    </div>

<div class="main">
    <br>
    <h2>Update Job Requests</h2>
    <?php
        try {
            require_once "../includes/dbh.inc.php";

                if(isset($_GET['id'])) {
                    $jobrequestid = $_GET['id'];
                }

                $query = "SELECT jr.*, js.service, js.service_dt, js.skilled_professional, js.description, js.price FROM jobrequests jr, jobschedules js WHERE jr.jobschedules_id = js.id AND jr.id = :jobrequestid;";
                $stmt = $pdo->prepare($query);

                $stmt->bindParam(":jobrequestid", $jobrequestid);

                $stmt->execute();
                $count = $stmt->rowCount();
                $results = $stmt->fetchAll();

                if($count<1) {
                    echo "<font color='red'> Error: Record not found. </font> <br><br>";
                } else {
                    foreach($results as $row) {
                        $jobtype = $row["service"];
                        $schedule = $row["service_dt"];
                        $address = $row["address"];
                        $city = $row["city"];
                        $skilledprofessional = $row["skilled_professional"];
                        $description = $row["description"];
                        $price = $row["price"];
                        $paymentmethod = $row["payment_method"];
                        $status = $row["status"];
                        
                    }
                }

        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    ?>
    
    <div class="container">
        
        <form action="../includes/jobrequeststatushandler.inc.php" method="post" >
            <?php
                if(isset($_GET['id'])) {
                    $jobrequestid = $_GET['id'];
                    echo "<input type='hidden' name='jobrequestid' value='". $jobrequestid . "'>";
                }
            ?>
            <div class="row">
                <div class="col-25">
                    <label for="jobtype">Job Type</label>
                </div>
                <div class="col-75">
                    <input type="text" readonly style="background-color: lightgray;" id="jobtype" name="jobtype" value="<?php echo $jobtype; ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="schedule">Schedule</label>
                </div>
                <div class="col-75">
                    <input type="text" readonly style="background-color: lightgray;" id="schedule" name="schedule" value="<?php echo $schedule; ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="jobtype">Address</label>
                </div>
                <div class="col-75">
                    <input type="text" readonly style="background-color: lightgray;" id="address" name="address" value="<?php echo $address; ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="city">City</label>
                </div>
                <div class="col-75">
                    <input type="text" readonly style="background-color: lightgray;" id="city" name="city" value="<?php echo $city; ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="skilledprofessional">Skilled Professional</label>
                </div>
                <div class="col-75">
                    <input type="text" readonly style="background-color: lightgray;" id="skilledprofessional" name="skilledprofessional" value="<?php echo $skilledprofessional; ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="description">Description</label>
                </div>
                <div class="col-75">
                    <textarea readonly style="background-color: lightgray;" id="description" name="description" rows="3" cols="50"><?php echo $description; ?></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="price">Price</label>
                </div>
                <div class="col-75">
                    <input type="text" readonly style="background-color: lightgray;" id="price" name="price" value="<?php echo $price; ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="price">Payment Method</label>
                </div>
                <div class="col-75">
                    <input type="text" readonly style="background-color: lightgray;" id="paymentmethod" name="paymentmethod" value="<?php echo $paymentmethod; ?>">
                </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="status">Status</label>
            </div>
            <div class="col-75">
                <select id="status" name="status" value="<?php echo $status; ?>">
                <option value="Open">Open</option>
                <option value="In Progress">In Progress</option>
                <option value="Completed">Completed</option>
                <option value="Cancelled">Cancelled</option>
                </select>
            </div>
            </div>
            <br>
            <div class="row">
                <button class='button-18'>Save</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>