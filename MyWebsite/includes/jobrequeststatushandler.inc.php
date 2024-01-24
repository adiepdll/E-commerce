<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $updatedstatus = $_POST["status"];
    $requestid = $_POST["jobrequestid"];
    
    try {
        require_once "dbh.inc.php";
        $query = "UPDATE jobrequests SET status = :updatedstatus WHERE id =:requestid;";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":updatedstatus", $updatedstatus);
        $stmt->bindParam(":requestid", $requestid);

        $stmt->execute();

        $pdo = null;
        $stmt = null;

        header("Location: ../admin/adminjobrequests.php");
     

        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}else{
    header("Location: ../index.php");
}