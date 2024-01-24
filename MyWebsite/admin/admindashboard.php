<?php
    session_start();
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Schedules</title>
    <link rel="stylesheet" href="admindashboard.css">
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
                <h1>Dashboard</h1>
            </div>
            <div class="card-container">
                <?php
                    try {
                        require_once "../includes/dbh.inc.php";

                        $userid = $_SESSION["userid"];

                        $query = "SELECT COUNT(*) as statusCount, status FROM jobrequests GROUP BY status;";
                        $stmt = $pdo->prepare($query);

                        $stmt->execute();
                        $results = $stmt->fetchAll();
                        
                        foreach($results as $row) {
                            if ($row['status'] == "Open"){
                                $openjob = $row['statusCount'];
                            }else if($row['status'] == "In Progress"){
                                $inprogressjob = $row['statusCount'];
                            }else if($row['status'] == "Completed"){
                                $completedjob = $row['statusCount'];
                            }
                        }

                    }catch (PDOException $e) {
                        die("Query failed: " . $e->getMessage());
                    }
                ?>
                <div class="card">
                    <div class="card-image"><p style="padding-top: 25px;"><?php echo $openjob;?></p></div>
                    <div class="card-title">Open</div>
                    <div class="card-text">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id repudiandae dolore veritatis nisi eos delectus
                    </div>
                </div>
                <div class="card">
                <div class="card-image"><p style="padding-top: 25px;"><?php echo $inprogressjob;?></p></div>
                    <div class="card-title">In Progress</div>
                    <div class="card-text">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id repudiandae dolore veritatis nisi eos delectus
                    </div>
                </div>
                <div class="card">
                <div class="card-image"><p style="padding-top: 25px;"><?php echo $completedjob;?></p></div>
                    <div class="card-title">Completed</div>
                    <div class="card-text">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id repudiandae dolore veritatis nisi eos delectus
                </div>
            </div>
        </main>
    </div>
</body>
</html>