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
                    <td name='td-price'><div class=\"input-group\">
                    <input class='form-control price' type='number' name='price' value='" . $items['bild_value'] . "'>
                    <div class=\"input-group-addon\">/" . $items['pro_unit'] . "</div></div></td>
                    <td name='td-amount'><input type=\"number\" name='i-amount' class=\"form-control\" value='".$items['bild_value']."' ></td>
                    <td name='td-discount-pre'><input type=\"number\" name='i-discount-pre' class=\"form-control\" value='".$discount_pre."' ></td>
                    <td name='td-discount'><input type=\"number\" name='i-discount' class=\"form-control\" value='".$discount."' ></td>
                    <td name='td-allprice'><span name='allprice'>".$items['total']."</span></td>
                    <td>
                        <button type='button' class=\"btn btn-danger btn-sm\" name='btn-delete'>
                            <i class=\"glyphicon glyphicon-trash\"></i>ยกเลิกรายการ
                        </button>
                    </td>
              </tr>";
        $_SESSION['count_pro'] = $count+1;
    }
}
