<?php

include "connect.php";
$conn->exec("set names utf8");

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'searchProduct'){
        $id = $_POST['id'];
        $sql = "SELECT * FROM product WHERE pro_id = '".$id."'";
        $result = $conn->query($sql);
        if ($result) {
            $json_allproduct = [];
            while ($row = $result->fetch()) {
                echo "<input id='id-sub' name='id-sub' type='hidden' value='".$row['pro_id']."'>";
                echo "<input id='pro_name-sub' name='pro_name' type='hidden' value='".$row['pro_name']."'>";
                echo "<input id='pro_price-sub' name='pro_price-sub' type='hidden' value='".$row['pro_price']."'>";
                echo "<input id='pro_unit-sub' name='pro_unit-sub' type='hidden' value='".$row['pro_unit']."'>";
            }
        }
    }
}else{
    echo "false";
}