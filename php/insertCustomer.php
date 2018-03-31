<?php
/**
 * Created by PhpStorm.
 * User: alexr
 * Date: 19/3/2561
 * Time: 1:35
 */
    include "connect.php";
?>
<?php
    date_default_timezone_set("Asia/Bangkok");
    $opd = $_POST["opd"];
    $name = $_POST["name"];
    $sname = $_POST["sname"];
    $add = $_POST["add"];
    $tel = $_POST["tel"];
    $detail = $_POST["detail"];
    $year = date("Y")+543;
    $cdate = date($year."-m-d H:i:s");
    //echo $opd." ".$name." ".$sname." ".$add." ".$tel." ".$detail;
    //header("Location: http://www.example.com/");
    //exit;
//    $stmt = $conn->prepare("INSERT INTO customer (cus_opd, cus_name, cus_sname, cus_add, cus_tel ,cus_detail) VALUES ( ?, ?, ?, ?, ?, ?)");
//    $stmt->bind_param($opd, $name, $sname, $add, $tel, $detail);
    $stmt = $conn->prepare("INSERT INTO customer (cus_opd, cus_name, cus_sname, cus_add, cus_tel ,cus_detail, cus_cdate) VALUES (:cus_opd, :cus_name, :cus_sname, :cus_add, :cus_tel, :cus_detail, :cus_cdate)");
    $stmt->bindParam(':cus_opd', $opd);
    $stmt->bindParam(':cus_name', $name);
    $stmt->bindParam(':cus_sname', $sname);
    $stmt->bindParam(':cus_add', $add);
    $stmt->bindParam(':cus_tel', $tel);
    $stmt->bindParam(':cus_detail', $detail);
    $stmt->bindParam(':cus_cdate', $cdate);
    $stmt->execute();
//    if(()){
//        echo "success";
//    }

//    $stmt->close();
//    $conn->close();
    echo "success";
?>

