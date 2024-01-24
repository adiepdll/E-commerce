<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $serviceid = $_POST["jobscheduleid"];

    try {
    
        require_once "dbh.inc.php";
        $query = "DELETE FROM jobschedules WHERE id =:serviceid;";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":serviceid", $serviceid);

        $stmt->execute();

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