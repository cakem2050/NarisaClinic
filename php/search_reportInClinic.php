<?php
/**
 * Created by PhpStorm.
 * User: alexr
 * Date: 22/3/2561
 * Time: 20:52
 */
?>


<?php
    include "connect.php";
    $date = $_POST["date"];
    header("location: /narisaclinic/reportInClinic.php?date=".$date);
    exit;
    $sql = "SELECT * FROM bills WHERE bills_datetime LIKE :datecheck";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(':datecheck'=>$date));



?>