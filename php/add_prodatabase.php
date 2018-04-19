<?php

session_start();
include "connect.php";
$date = new DateTime;
$date->setTimezone(new DateTimeZone("Asia/Bangkok"));
$year = date('Y')+543;
$time_temp = $date->format('m-d H:i:s');
$timestamp = $date->format('Y-m-d H:i:s');
$time_str = $year."-".$time_temp;
$time = $time_str;
$time_id_temp = $date->format('dm');
$time_id = $time_id_temp.$year;

//SET $bills_id
$bills_no = null;
$sql = "SELECT MAX(bills_no) FROM bills ";
$row_billsNo = $conn->query($sql);
$bills_no_row = $row_billsNo->fetch();
if (isset($bills_no_row)) {
    $bills_no = $bills_no_row[0] + 1;
} else {
    $bills_no = 1;
}
$bills_id = $time_id . "-" . $bills_no;
//Get bills_ptype
$bills_ptype = $_POST['bills_ptype'];

//Get type pay
$type_pay = $_POST['type_pay'];

//Get Value
$cus_opd = $_POST['cus_opd'];
if ($_POST['bills_ost'] == '') {
    $bills_pay = 0;
} else {
    $bills_pay = $_POST['bills_ost'];
}


//Get Items
$items = $_POST['items'];
$sum_discount = 0;
$sum_money = 0;
$items_array = [];

foreach ($items as $key => $value) {
    $pro_id = null;
    $pro_name = null;
    $pro_price = null;
    $pro_amount = null;
    $discount_pre = null;
    $discount = null;
    $final_dicount = 0;
    foreach ($value as $key2 => $value2) {
        if ($key2 == 'pro_id') {
            $pro_id = $value2;
        } elseif ($key2 == 'pro_name') {
            $pro_name = $value2;
        } elseif ($key2 == 'pro_price') {
            $pro_price = $value2;
        } elseif ($key2 == 'pro_amount') {
            $pro_amount = $value2;
        } elseif ($key2 == 'discount_pre') {
            $discount_pre = $value2;
        } elseif ($key2 == 'discount') {
            $discount = $value2;
        }
    }
    if ($discount_pre != '' && $discount_pre != '0') {
        $final_dicount = ($pro_price * $pro_amount) * ($discount_pre / 100);
    } elseif ($discount != '' && $discount != '0') {
        $final_dicount = $discount;
    }
    $sum_money += ($pro_price * $pro_amount) - ($final_dicount);
    $sum_discount += $final_dicount;
    $billDetail = [
        'bills_id' => $bills_id,
        'pro_id' => $pro_id,
        'bild_value' => $pro_amount,
        'bild_price' => $pro_price,
        'bild_discount' => $final_dicount,
        'bild_tcost' => ($pro_price * $pro_amount) - $final_dicount,
        'bild_status' => 'E',
        'bild_passcode' => '',
        'usr_uname' => $_SESSION['usr_name'],
        'bild_timestamp' => $timestamp,
    ];
    array_push($items_array, $billDetail);
}
$billMater = [
    'bills_id' => $bills_id,
    'cus_opd' => $cus_opd,
    'bills_datetime' => $time,
    'bills_pay' => $sum_money,
    'bills_discount' => $sum_discount,
    'bills_ost' => $bills_pay,
    'bills_net' => $sum_money - $bills_pay,
    'bills_ptype' => $bills_ptype,
    'bills_cash' => $type_pay['bills_cash'],
    'bills_scb' => $type_pay['bills_scb'],
    'bills_ktc' => $type_pay['bills_ktc'],
    'bills_kbank' => $type_pay['bills_kbank'],
    'bills_bbl' => $type_pay['bills_bbl'],
    'bills_tmb' => $type_pay['bills_tmb'],
    'bills_bay' => $type_pay['bills_bay'],
    'bills_status' => 'E',
    'usr_uname' => $_SESSION['usr_name'],
    'bills_timestamp' => $timestamp
];
try {
// Insert Bill Mater To Database
    $stmt = $conn->prepare("INSERT INTO `bills`(`bills_no`, `bills_id`, `cus_opd`, `bills_datetime`, `bills_pay`, `bills_discount`, `bills_ost`, `bills_net`, `bills_ptype`, `bills_cash`, `bills_scb`, `bills_ktc`, `bills_kbank`, `bills_bbl`, `bills_tmb`, `bills_bay`, `bills_status`, `bills_passcode`, `usr_uname`, `bills_timestamp`) VALUES (null,:bills_id,:cus_opd,:bills_datetime,:bills_pay,:bills_discount,:bills_ost,:bills_net,:bills_ptype,:bills_cash,:bills_scb,:bills_ktc,:bills_kbank,:bills_bbl,:bills_tmb,:bills_bay,'E','',:usr_uname,:bills_timestamp)");
    $stmt->bindParam(':bills_id', $billMater['bills_id']);
    $stmt->bindParam(':cus_opd', $billMater['cus_opd']);
    $stmt->bindParam(':bills_datetime', $billMater['bills_datetime']);
    $stmt->bindParam(':bills_pay', $billMater['bills_pay']);
    $stmt->bindParam(':bills_discount', $billMater['bills_discount']);
    $stmt->bindParam(':bills_ost', $billMater['bills_ost']);
    $stmt->bindParam(':bills_net', $billMater['bills_net']);
    $stmt->bindParam(':bills_ptype', $billMater['bills_ptype']);
    $stmt->bindParam(':bills_cash', $billMater['bills_cash']);
    $stmt->bindParam(':bills_scb', $billMater['bills_scb']);
    $stmt->bindParam(':bills_ktc', $billMater['bills_ktc']);
    $stmt->bindParam(':bills_kbank', $billMater['bills_kbank']);
    $stmt->bindParam(':bills_bbl', $billMater['bills_bbl']);
    $stmt->bindParam(':bills_tmb', $billMater['bills_tmb']);
    $stmt->bindParam(':bills_bay', $billMater['bills_bay']);
    $stmt->bindParam(':usr_uname', $billMater['usr_uname']);
    $stmt->bindParam(':bills_timestamp', $billMater['bills_timestamp']);
    $stmt->execute();

//Insert Bill Detail To Database
    $stmt2 = $conn->prepare("INSERT INTO `billsdetail`(`bild_no`, `bills_id`, `pro_id`, `bild_value`, `bild_price`, `bild_discount`, `bild_tcost`, `bild_status`, `bild_passcode`, `usr_uname`, `bild_timestamp`) VALUES (null,:bills_id,:pro_id,:bild_value,:bild_price,:bild_discount,:bild_tcost,:bild_status,:bild_passcode,:usr_uname,:bild_timestamp)");
    foreach ($items_array as $value) {
        $stmt2->bindParam(':bills_id', $value['bills_id']);
        $stmt2->bindParam(':pro_id', $value['pro_id']);
        $stmt2->bindParam(':bild_value', $value['bild_value']);
        $stmt2->bindParam(':bild_price', $value['bild_price']);
        $stmt2->bindParam(':bild_discount', $value['bild_discount']);
        $stmt2->bindParam(':bild_tcost', $value['bild_tcost']);
        $stmt2->bindParam(':bild_status', $value['bild_status']);
        $stmt2->bindParam(':bild_passcode', $value['bild_passcode']);
        $stmt2->bindParam(':usr_uname', $value['usr_uname']);
        $stmt2->bindParam(':bild_timestamp', $value['bild_timestamp']);
        $stmt2->execute();
    }
    echo "pass";
    unset($_SESSION['count_pro']);
} catch (Exception $e) {
    echo $e->getMessage();
}
