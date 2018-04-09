<?php

include "connect.php";

$name = $_POST['name'];
$opd = $_POST['opd'];
$phone = $_POST['phone'];

$conn->exec("set names utf8");
if($_POST['name'] != ''){
    $f_name = explode(" ",$name);
    if(isset($f_name[1])){
        $sql = "SELECT * FROM customer WHERE cus_opd LIKE LOWER('".$opd."') OR cus_name LIKE '%".$f_name[0]."%' OR cus_sname LIKE '%".$f_name[1]."%' OR cus_tel = '".$phone."'";
    }else{
        $sql = "SELECT * FROM customer WHERE cus_opd LIKE LOWER('".$opd."') OR cus_name LIKE '%".$f_name[0]."%' OR cus_tel = '".$phone."'";
    }
}else{
    $sql = "SELECT * FROM customer WHERE cus_opd LIKE LOWER('".$opd."')  OR cus_tel = '".$phone."'";
}
$result = $conn->query($sql);


if ($result) {
    // output data of each row
    $count = 1;
    while($row = $result->fetch()) {
        echo "<tr class=\"na-tr-select\">
                                    <td onclick=\"window.location.href='billList.php?opd=". $row['cus_opd'] ."'\">". $count ."</td>
                                    <td onclick=\"window.location.href='billList.php?opd=". $row['cus_opd'] ."'\">". $row['cus_name'] ." ". $row['cus_sname'] ."</td>
                                    <td onclick=\"window.location.href='billList.php?opd=". $row['cus_opd'] ."'\">". $row['cus_opd'] ."</td>
                                    <td onclick=\"window.location.href='billList.php?opd=". $row['cus_opd'] ."'\">". $row['cus_tel'] ."</td>
                                    <td data-id=\"". $row['cus_opd'] ."\" data-toggle=\"modal\" data-target=\"#ModalEdit\"><a href=\"#\"><i class=\"glyphicon glyphicon-edit\"></i></a></td>
                                </tr>";
        $count++;
    }
}

?>