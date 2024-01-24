<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $updatedskilledprofessional = $_POST["skilledprofessional"];
    $updateddescription = $_POST["description"];
    $updatedprice = $_POST["price"];
    $updatedstatus = $_POST["status"];
    $serviceid = $_POST["jobscheduleid"];
    
    try {
        require_once "dbh.inc.php";
        $query = "UPDATE jobschedules SET skilled_professional = :updatedskilledprofessional, description = :updateddescription, price = :updatedprice, status = :updatedstatus WHERE id =:serviceid;";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":updatedskilledprofessional", $updatedskilledprofessional);
        $stmt->bindParam(":updateddescription", $updateddescription);
        $stmt->bindParam(":updatedprice", $updatedprice);
        $stmt->bindParam(":updatedstatus", $updatedstatus);
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