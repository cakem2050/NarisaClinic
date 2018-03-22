<?php

include "connect.php";

$name = $_POST['name'];
$opd = $_POST['opd'];
$phone = $_POST['phone'];

$conn->exec("set names utf8");

$sql = "SELECT * FROM customer WHERE cus_opd LIKE LOWER('".$opd."')";
$result = $conn->query($sql);


if ($result) {
    // output data of each row
    $count = 1;
    while($row = $result->fetch()) {
        echo "<tr class=\"na-tr-select\" onclick=\"window.location.href='billList.php?opd=".$row['cus_opd']."'\">
                                <td>".$count."</td>
                                <td>".$row['cus_name']." ".$row['cus_sname']."</td>
                                <td>".$row['cus_opd']."</td>
                                <td>".$row['cus_tel']."</td>
                            </tr>";
        $count++;
    }
}

?>