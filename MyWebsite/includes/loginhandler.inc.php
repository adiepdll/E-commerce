<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $pwd = $_POST["loginpwd"];
    $email = $_POST["loginemail"];

    try {
        require_once "dbh.inc.php";
        $query = "SELECT * FROM users WHERE username = :email AND pwd = :pwd;";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":pwd", $pwd);

        $stmt->execute();

        $results = $stmt->fetchAll();

        if($results){
            foreach($results as $row) {
                $_SESSION["firstname"] = $row["firstname"];
                $_SESSION["userid"] = $row["id"];
                $_SESSION["usertype"] = $row["user_type"];

                $usertype = $row["user_type"];

                if ($usertype == "Admin"){
                    header("Location: ../admin/admindashboard.php");
                } else if ($usertype == "Customer"){
                    header("Location: ../home.php");
                }
            }
        }else{
            header("Location: ../form.php");
        }

        $pdo = null;
        $stmt = null;

        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}else{
    header("Location: ../index.php");
}