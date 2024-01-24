<!DOCTYPE html>
<?php
    include "navbar.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job History</title>
    <link rel="stylesheet" href="jobhistory.css">
</head>
<body>
    <main class="table">
        <div class="table_header">
            <h1>Your Job Requests</h1>
        </div>
        <div class="table_body">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Job Type</th>
                        <th>Schedule</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Skilled Professional</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Payment Method</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    try {
                        require_once "includes/dbh.inc.php";

                        $userid = $_SESSION["userid"];

                        $query = "SELECT jr.*, js.service, js.service_dt, js.skilled_professional, js.description, js.price FROM jobrequests jr, jobschedules js WHERE jr.users_id = :userid AND jr.jobschedules_id = js.id;";
                        $stmt = $pdo->prepare($query);

                        $stmt->bindParam(":userid", $userid);

                        $stmt->execute();
                        $count = $stmt->rowCount();
                        $results = $stmt->fetchAll();
                        if($count<1) {
                            echo "No existing job requests.";
                        } else {
                            foreach($results as $row) {
                                $status = $row["status"];
                                $statusClass;

                                if ($status == "Completed") {
                                    $statusClass = "<td><p class='status completed'>" .$status . "</p></td>";
                                } else if ($status == "Cancelled") {
                                    $statusClass = "<td><p class='status cancelled'>" .$status . "</p></td>";
                                } else if ($status == "Open") {
                                    $statusClass = "<td><p class='status open'>" .$status . "</p></td>";
                                } else if ($status == "In Progress") {
                                    $statusClass = "<td class='no-wrap-column'><p class='status inprogress'>" .$status . "</p></td>";
                                }



                                echo "<tr>
                                    <td>" . $row["id"] . "</td>
                                    <td>" . $row["service"] . "</td>
                                    <td>" . $row["service_dt"] . "</td>
                                    <td>" . $row["address"] . "</td>
                                    <td>" . $row["city"] . "</td>
                                    <td>" . $row["skilled_professional"] . "</td>
                                    <td>" . $row["description"] . "</td>
                                    <td>" . $row["price"] . "</td>
                                    <td>" . $row["payment_method"] . "</td>".
                                    $statusClass.
                                "</tr>";
                            }
                        }

                    } catch (PDOException $e) {
                        die("Query failed: " . $e->getMessage());
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>