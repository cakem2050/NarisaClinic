<?php
//    $conn = new mysqli("localhost", "root", "", "narisaclinic");
//
//    // Check connection
//    if ($conn->connect_error) {
//        die("Connection failed: " . $conn->connect_error);
//    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "narisaclinic";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>