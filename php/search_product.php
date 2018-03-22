<?php

include "connect.php";
$conn->exec("set names utf8");

    $product_id = $_GET['product_id'];

    $sql = "SELECT * FROM product";
    $result = $conn->query($sql);


    if ($result) {
        $json_allproduct = [];
        while ($row = $result->fetch()) {
            $json_product = [
                'id' => $row['pro_id'],
                'pro_name' => $row['pro_name'],
                'pro_price' => $row['pro_price'],
                'pro_unit' => $row['pro_unit']
            ];
            array_push($json_allproduct, $json_product);
        }
        $json_item = ['resultajax' => $json_allproduct];
        echo json_encode($json_item, JSON_UNESCAPED_UNICODE);
    }

?>