<?php

include "connect.php";
$conn->exec("set names utf8");
session_start();

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'additem') {
        //Set seesion allitem
        if (isset($_SESSION['allitems'])) {
            $allItems = $_SESSION['allitems'];
        } else {
            $allItems = [];
        }
        //Set discount
        if (isset($_POST['discount']) && isset($_POST['discount-pre'])) {
            if ($_POST['discount-pre'] == '' || $_POST['discount'] == ''){
                $discount = 0;
            }else{
                $discount = 0;
            }
        }else if (isset($_POST['discount'])){
            $discount = $_POST['discount'];
        }else if(isset($_POST['discount-pre'])){
            $discount = ($_POST['pro_price-sub'] * $_POST['amount']) * ($_POST['discount-pre'] / 100);
        }
        $items = [
            'pro_id' => $_POST['pro-id'],
            'pro_name' => $_POST['pro_name'],
            'pro_unit' => $_POST['pro_unit-sub'],
            'bild_value' => $_POST['amount'],
            'bild_price' => $_POST['pro-price'],
            'bild_discount' => $discount,
            'total'=> ($_POST['amount']*$_POST['pro-price'])-$discount,
        ];
        if (isset($_POST['discount'])) {
            $discount = $_POST['discount'];
        }else{
            $discount = 0;
        }
        if (isset($_POST['discount-pre'])) {
            $discount_pre = $_POST['discount-pre'];
        }else{
            $discount_pre = 0;
        }
        //Set count
        if(isset($_SESSION['count_pro'])){
            $count=$_SESSION['count_pro'];
        }else{
            $_SESSION['count_pro'] = 1;
            $count=1;
        }
        //($items['bild_value']*$items['bild_price'])
        print_r($items);
        echo "<tr>
                    <td>".$count."</td>
                    <td><input type=\"text\" class=\"form-control\" value='".$items['pro_id']."' disabled></td>
                    <td>".$items['pro_name']."</td>
                    <td>".$items['bild_price']."/".$items['pro_unit']."</td>
                    <td><input type=\"number\" class=\"form-control\" value='".$items['bild_value']."' disabled></td>
                    <td><input type=\"number\" class=\"form-control\" value='".$discount_pre."' disabled></td>
                    <td><input type=\"number\" class=\"form-control\" value='".$discount."' disabled></td>
                    <td><span name='allprice'>".$items['total']."</span></td>
                    <td>
                        <button class=\"btn btn-danger btn-sm\">
                            <i class=\"glyphicon glyphicon-trash\"></i>ยกเลิกรายการ
                        </button>
                    </td>
              </tr>";
        $_SESSION['count_pro'] = $count+1;
    }
}
