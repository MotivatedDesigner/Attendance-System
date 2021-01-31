<?php

$host = "localhost";
$database = "attendance";
$dbUserName = "root";
$dbUserPass = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $dbUserName, $dbUserPass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
    // $msg[] = "Sorry we can't connect to the database right now";
    $msg = "Sorry we can't connect to the database right now";
    exit();
}

    require_once "crud.php";
    $crud = new crud($conn)

?>