<?php

function connection(){

    $host = "localhost";
    $database = "oo";
    $dbUserName = "root";
    $dbUserPass = "olloommoLM";

    try 
    {
        $con = new PDO("mysql:host=$host;dbname=$database", $dbUserName, $dbUserPass);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $con;
    } 
    catch (PDOException $error) {
        // $msg[] = "Sorry we can't connect to the database right now";
        $msg = "Sorry we can't connect to the database right now";
        exit();
    }
}

?>