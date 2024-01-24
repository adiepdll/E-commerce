<?php
$dsn = "mysql:host=localhost:4306;dbname=homeservicedatabase";
$dbusername = "root";
$dbpassword = "";

try{
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOExpectation $e) {
    echo "Connection failed: " . $e->getMessage();
}