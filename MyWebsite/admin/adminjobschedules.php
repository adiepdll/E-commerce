<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Schedules</title>
    <link rel="stylesheet" href="adminjobschedules.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="sidenav">
    <?php
        include "adminpage.php";
    ?>
    </div>
    <div class="rightside">
        <main class="table">
            <div class="table_header">
                <h1>Manage Job Schedules</h1>
            </div>
            <div class="header_button">
                <a class='button-18' href='addjobschedules.php'><i class='fa fa-plus'></i>New Job Schedule</a>
            </div>
            <div class="table_body">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Job Type</th>
                            <th>Schedule</th>
                            <th>City</th>
                            <th>Skilled Professionals</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th style="text-align:center">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        try {
                            require_once "../includes/dbh.inc.php";

                            $query = "SELECT * FROM jobschedules";
                            $stmt = $pdo->prepare($query);

                            $stmt->execute();
                            $count = $stmt->rowCount();
                            $results = $stmt->fetchAll();
                            if($count<1) {
                                echo "No available service schedule.";
                            } else {
                                foreach($results as $row) {
                                    $status = $row["status"];
                                    $statusClass;

                                    if ($status == "open") {
                                        $statusClass = "<td><p class='status open'>" .$status . "</p></td>";
                                    } else if ($status == "closed") {
                                        $statusClass = "<td><p class='status closed'>" .$status . "</p></td>";
                                    }
                                    echo "<tr>
                                        <td>" . $row["id"] . "</td>
                                        <td>" . $row["service"] . "</td>
                                        <td>" . $row["service_dt"] . "</td>
                                        <td>" . $row["city"] . "</td>
                                        <td>" . $row["skilled_professional"] . "</td>
                                        <td>" . $row["description"] . "</td>
                                        <td>" . $row["price"] . "</td>".
                                        $statusClass.
                                        "<td style='text-align:center' class='no-wrap-column'>
                                            <a class='button-18' href='updatejobschedules.php?id=$row[id]'><i class='fa fa-edit'></i></a>
                                            <a class='button-19' href='deletejobschedules.php?id=$row[id]'><i class='fa fa-trash'></i></a>
                                        </td>
                                    </tr>";
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
    </div>
</body>
</html>