<!DOCTYPE html>
<?php
    include "navbar.php";
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Confirmation Form</title>
    <link rel="stylesheet" href="confirmationform.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
    
    <div class="container">
    <div class="content">
        <form action="includes/jobrequesthandler.inc.php" method="post">
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
                            echo "<div class='title'>There was a problem submitting your request.</div><br>
                                    <p>
                                        <font size='2' face='arial'>Please try again later. We're sorry for the inconvenience.</font>
                                    </p>";
                        } else {
                            foreach($results as $row) {
                                //format date
                                $timestamp = strtotime($row["service_dt"]);
                                $formattedDate = date('d M Y', $timestamp);

                                echo "<div class='title'>You job request is confirmed!</div><br>
                                        <p>
                                            <font size='2' face='arial'>Thank you for trusting our service.</font>
                                        </p>
                                        <p>
                                            <font size='2' face='arial'>Our skilled professional will be in touch with you on the day of your job request.</font>
                                        </p>".
                                        "<br><p>
                                            <i></id><font size='2' face='arial'>Service: " . $row["service"] . "</font></i>
                                        </p>".
                                        "<p>
                                            <i><font size='2' face='arial'>Schedule: "  . $formattedDate . "</font></i>
                                        </p>".
                                        "<p>
                                            <i><font size='2' face='arial'>Skilled Professional: "  . $row["skilled_professional"] . "</font></i>
                                        </p>";
                            }
                        }

                } catch (PDOException $e) {
                    die("Query failed: " . $e->getMessage());
                }
            ?>
        </form>
    </div>

</body>
</html>