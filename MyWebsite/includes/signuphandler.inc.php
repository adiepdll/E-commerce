<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];

    try {
        require_once "dbh.inc.php";
        $query = "INSERT INTO users (username, pwd, email, firstname, lastname) VALUES
        (?, ?, ?, ?, ?);";

        $stmt = $pdo->prepare($query);

        $stmt->execute([$email, $pwd, $email, $firstname, $lastname]);

        $pdo = null;
        $stmt = null;

        header("Location: ../index.php");

        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}else{
    header("Location: ../index.php");
}