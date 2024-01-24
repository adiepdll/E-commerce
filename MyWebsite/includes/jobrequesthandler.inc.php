<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $userid = $_SESSION["userid"];
    $jobscheduleid = $_POST["jobscheduleid"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $phone = $_POST["phone"];
    $specialrequest = $_POST["specialrequest"];
    $paymentmethod = $_POST["paymentmethod"];
    $status = "Open";

    try {
        require_once "dbh.inc.php";
        $query = "INSERT INTO jobrequests (users_id, jobschedules_id, address, city, phone_number, special_request, payment_method, status) VALUES
        (?, ?, ?, ?, ?, ?, ?, ?);";

        $stmt = $pdo->prepare($query);

        $stmt->execute([$userid, $jobscheduleid, $address, $city, $phone, $specialrequest, $paymentmethod, $status]);

        $pdo = null;
        $stmt = null;

        header("Location: ../confirmationform.php?id=$jobscheduleid");

        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}else{
    header("Location: ../index.php");
}