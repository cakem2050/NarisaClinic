<?php

include "connect.php";
session_start();

if (isset($_POST['barcode'])) {
    $barcode = $_POST['barcode'];
    $sql = "SELECT * FROM product WHERE pro_id = '" . $barcode . "'";
    $result = $conn->query($sql);
    $row = $result->fetch();
    //Set count
    if (isset($_SESSION['count_pro'])) {
        $count = $_SESSION['count_pro'];
    } else {
        $_SESSION['count_pro'] = 1;
        $count = 1;
    }
    if ($row) {
        echo "<tr name='".$row['pro_id']."-".$count."'>
                    <td>" . $count . "</td>
                    <td><input  name='pro_id' type=\"text\" class=\"form-control\" value='" . $row['pro_id'] . "' disabled></td>
                    <td name='pro_name'>" . $row['pro_name'] . "</td>
                    <td name='td-price'><div class=\"input-group\">
                    <input class='form-control price' type='number' name='price' value='" . $row['pro_price'] . "'>
                    </div></td>
                    <td name='td-amount'><input name='i-amount' type=\"number\" class=\"form-control\" value='1' ></td>
                    <td name='td-discount-pre'><input type=\"number\" name='i-discount-pre' class=\"form-control\"></td>
                    <td name='td-discount'><input type=\"number\" name='i-discount' class=\"form-control\" ></td>
                    <td name='td-allprice'><span name='allprice'>" . $row['pro_price'] . "</span></td>
                    <td>
                        <button type='button' class=\"btn btn-danger btn-sm\" data-deletepro='".$row['pro_id']."-".$count."' name='btn-delete'>
                            <i class=\"glyphicon glyphicon-trash\"></i>ยกเลิกรายการ
                        </button>
                    </td>
              </tr>";
        $count++;
        $_SESSION['count_pro'] = $count;
    } else {

    }
} else {
    echo false;
}