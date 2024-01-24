<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Schedules</title>
    <link rel="stylesheet" href="admincustomers.css">
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
                <h1>Customers List</h1>
            </div>
            <div class="table_body">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Signup Date</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        try {
                            require_once "../includes/dbh.inc.php";

                            $query = "SELECT * FROM users WHERE user_type = 'Customer'";
                            $stmt = $pdo->prepare($query);

                            $stmt->execute();
                            $count = $stmt->rowCount();
                            $results = $stmt->fetchAll();
                            if($count<1) {
                                echo "No records found";
                            } else {
                                foreach($results as $row) {
                                    $status = $row["id"];
                                    $statusClass;

                                    echo "<tr>
                                        <td>" . $row["id"] . "</td>
                                        <td>" . $row["firstname"] . "</td>
                                        <td>" . $row["lastname"] . "</td>
                                        <td>" . $row["email"] . "</td>
                                        <td>" . $row["sign_up_dt"] . "</td>
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