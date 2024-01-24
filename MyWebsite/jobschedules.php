<!DOCTYPE html>
<?php
    include "navbar.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Schedules</title>
    <link rel="stylesheet" href="jobschedules.css">
</head>
<body>
    <style>
        body {
            <?php
                $item = $_GET['i'];
                if ($item == "Cook") {
                    $background_image_url ='./images/cook-background.png';
                    
                } else if ($item == "Plumber") {
                    $background_image_url ='./images/plumbing-background.png';
                } else if ($item == "Home Cleaning") {
                    $background_image_url ='./images/houseclean-background.png';
                } else if ($item == "Electrical Repair") {
                    $background_image_url ='./images/electrical-background.png';
                } else if ($item == "Driver") {
                    $background_image_url ='./images/driver-background.png';
                } else if ($item == "Movers") {
                    $background_image_url ='./images/movers-background.png';
                }
                echo "background-image: url('$background_image_url'); 
                            background-size: cover; background-repeat: no-repeat;";
            ?>
        }
    </style>
    <div class="gradient"></div>
    <br><br><br>
    <h1>Available Job Schedules</h1>
    <br>
    <div class='container'>
        <?php
            try {
                require_once "includes/dbh.inc.php";

                if(isset($_GET['i'])) {
                    $item = $_GET['i'];
                }

                $query = "SELECT * FROM jobschedules WHERE service = :servicename ORDER BY service_dt;";
                $stmt = $pdo->prepare($query);

                $stmt->bindParam(":servicename", $item);

                $stmt->execute();
                $count = $stmt->rowCount();
                $results = $stmt->fetchAll();
                if($count<1) {
                    echo "No available service schedule.";
                } else {
                    //peso sign
                    $pesoSign = '&#8369';
                    foreach($results as $row) {
                        //format date
                        $timestamp = strtotime($row["service_dt"]);
                        $formattedDate = date('d M Y', $timestamp);

                        //format description
                        $convertedText = nl2br($row["description"]);

                        echo "<div class='course'>
                            <div class='preview'>
                                <h6>" . $row["service"] . "</h6>
                                <h2>" . $formattedDate . "</h2>
                                <a>" . $row["skilled_professional"] . "</a>
                            </div>
                            <div class='info'>
                                <h2>". $pesoSign . " " . $row["price"] . "</h2>
                                <p>" . $convertedText . "</p>
                                <h6>" . $row["city"] . "</h6>
                                <a href='jobcheckout.php?id=$row[id]' class='btn'>Book</a>
                            </div>
                        </div>";
                    }
                }

            } catch (PDOException $e) {
                die("Query failed: " . $e->getMessage());
            }

        ?>
    </div>
</body>
</html>