<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="deletejobschedules.css">
</head>
<body>
    <div class="sidenav">
        <?php
            include "adminpage.php";
        ?>
    </div>

<div class="main">
    <br><br><br>
    <h2>Delete Job Schedule</h2>
    <?php
        try {
            require_once "../includes/dbh.inc.php";

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
                    echo "<font color='red'> Error: Record not found. </font> <br><br>";
                } else {
                    foreach($results as $row) {
                        $jobtype = $row["service"];
                        $schedule = $row["service_dt"];
                        $city = $row["city"];
                        $skilledprofessional = $row["skilled_professional"];
                        $status = $row["status"];
                    }
                }

        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    ?>
    
    <div class="container">
        
        <form action="../includes/deletejobschedulehandler.inc.php" method="post" >
            <?php
                if(isset($_GET['id'])) {
                    $jobscheduleid = $_GET['id'];
                    echo "<input type='hidden' name='jobscheduleid' value='". $jobscheduleid . "'>";
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
                    <label for="status">Status</label>
                </div>
                <div class="col-75">
                    <input type="text" readonly style="background-color: lightgray;" id="status" name="status" value="<?php echo $status; ?>">
                </div>
            </div>
            <br>
            <div class="row">
                <button class='button-19'>Delete</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>