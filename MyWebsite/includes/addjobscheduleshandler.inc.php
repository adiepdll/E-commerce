<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jobtype = $_POST["jobtype"];
    $schedule = $_POST["schedule"];
    $city = $_POST["city"];
    $skilledprofessional = $_POST["skilledprofessional"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $status = $_POST["status"];

    try {
        require_once "dbh.inc.php";
        $query = "INSERT INTO jobschedules (service, service_dt, city, skilled_professional, description, price, status) VALUES
        (?, ?, ?, ?, ?, ?, ?);";

        $stmt = $pdo->prepare($query);

        $stmt->execute([$jobtype, $schedule, $city, $skilledprofessional, $description, $price, $status]);

        $pdo = null;
        $stmt = null;

        header("Location: ../admin/adminjobschedules.php");

        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}else{
    header("Location: ../index.php");
}