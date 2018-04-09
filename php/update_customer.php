<?php

include "connect.php";

$opd = $_POST["opd"];
$name = $_POST["name"];
$sname = $_POST["sname"];
$add = $_POST["add"];
$tel = $_POST["tel"];
$detail = $_POST["detail"];

$sql ="UPDATE customer SET cus_name='".$name."',cus_sname='".$sname."',cus_add='".$add."',cus_tel='".$tel."',cus_detail='".$detail."' WHERE cus_opd = '".$opd."'";
try{
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    echo "pass";
}catch (Exception $e){
    echo $e->getMessage();
}
