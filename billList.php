<?php

include "php/connect.php";
$conn->exec("set names utf8");
if (!isset($_GET['opd'])) {
    header('Location:oldList.php');
} else {
    $opd = $_GET['opd'];
    $sql = "SELECT * FROM customer WHERE cus_opd LIKE LOWER ('" . $opd . "')";
    $result = $conn->query($sql);
    $row = $result->fetch();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Narisa Clinic</title>
    <?php include "components/template_css.php"; ?>
    <link rel="stylesheet" href="assets/css/narisa-01.css">
    <link rel="stylesheet" href="assets/template/plugins/smartwizard-master/css/smart_wizard_theme_arrows.css">
    <link href="assets/select2/css/select2.min.css" rel="stylesheet"/>
</head>
<body class="min">
<!-- WRAPPER -->
<div id="wrapper">
    <aside id="aside">
        <?php include "components/menu_staff.php" ?>
    </aside>
    <!-- HEADER -->
    <?php include "components/header.php" ?>
    <!-- /HEADER -->
    <section id="middle" style="margin-left: 0px;">
        <div id="content" class="padding-20 na-pd-b-0">
            <div id="panel-1" class="panel panel-default">
                <div class="panel-heading">
                    <div class="row padding-10">
                        <div class="col-md-4">
                            <b>ชื่อ : </b><span><?= $row['cus_name'] ?> <?= $row['cus_sname'] ?></span>
                        </div>
                        <div class="col-md-4">
                            <b>เลข OPD : </b><span><?= $row['cus_opd'] ?></span>
                        </div>
                        <div class="col-md-4">
                            <b>เบอร์โทรศัพท์ : </b><span><?= $row['cus_tel'] ?></span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- /page title -->
        <div id="content" class="padding-20">
            <div id="panel-1" class="panel panel-default">

                <!-- panel content -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- SmartWizard html -->
                            <div id="smartwizard" class="sw-main sw-theme-arrows">
                                <ul class="nav nav-tabs step-anchor na-edit-nav">
                                    <li class="nav-item active"><a href="#step-1" class="edit-active">Step 1<br/>
                                            <small>ทำรายการซื้อสินค้า</small>
                                        </a></li>
                                    <li class="nav-item"><a href="#step-2">Step 2<br/>
                                            <small>วิธีชำระเงิน</small>
                                        </a></li>
                                </ul>
                                <div>
                                    <!-- Page 1 -->
                                    <div id="step-1" class="" style="display: none">
                                        <h3>
                                            <b>บันทึกรายการ</b>
                                        </h3>
                                        <div class="row">
                                            <div class="col-md-12"
                                                 style="overflow: scroll;overflow-y:auto;overflow-x:auto">

                                                <form id="bill-detail">
                                                    <table class="table">
                                                        <thead class="bill-th">
                                                        <tr>
                                                            <th class="col-md-1">ลำดับ</th>
                                                            <th class="col-md-2">รหัสสินค้าและบริการ</th>
                                                            <th class="col-md-3">ชื่อรายการสินค้า</th>
                                                            <th class="col-md-1">ราคา/ชิ้น</th>
                                                            <th class="col-md-1">จำนวน</th>
                                                            <th class="col-md-1">ส่วนลด%</th>
                                                            <th class="col-md-1">ส่วนลด(บาท)</th>
                                                            <th class="col-md-1">ราคาสุทธิ</th>
                                                            <th class="col-md-1"></th>
                                                        </tr>
                                                        <tr>
                                                            <input type="hidden" name="action" value="additem">
                                                            <input type="hidden" id="pro-id" name="pro-id">
                                                            <input type="hidden" id="pro-price" name="pro-price">
                                                            <td>#
                                                                <div id="tempInput"></div>
                                                            </td>
                                                            <td><select class="form-control" id="search">
                                                                    <option value="ค้นหาสินค้า">ค้นหาสินค้า</option>
                                                                </select></td>
                                                            <td id="name">ชื่อรายการสินค้า</td>
                                                            <td id="price">ราคา/ชิ้น</td>
                                                            <td>
                                                                <input type="number" id="amount" name="amount"
                                                                       class="form-control"
                                                                       placeholder="จำนวน" min="0" disabled="disabled">
                                                            </td>
                                                            <td>
                                                                <input type="number" id="discount-pre"
                                                                       name="discount-pre"
                                                                       class="form-control" placeholder="ส่วนลด%"
                                                                       min="0" max="100" disabled="disabled">
                                                            </td>
                                                            <td>
                                                                <input type="number" id="discount" name="discount"
                                                                       class="form-control"
                                                                       placeholder="ส่วนลด(บาท)" min="0"
                                                                       disabled="disabled">
                                                            </td>
                                                            <td>
                                                                <button id="submit" class="btn btn-info btn-sm">
                                                                    เพิ่มรายการ
                                                                </button>
                                                            </td>
                                                            <td></td>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="tbody"></tbody>
                                                    </table>
                                                </form>
                                            </div>
                                            <div class="col-md-4 col-md-offset-8 na-result" style="padding: 20px">
                                                <div>
                                                    <b>ยอดชำระ : </b><span class="pull-right"><span id="result-allprice">0</span> บาท</span>
                                                </div>
                                                <div class="form-inline na-input-price">
                                                    <b>ค้างชำระ : </b><span class="pull-right"><input type="number"
                                                                                                      class="form-control"
                                                                                                      placeholder="จำนวน"></span>
                                                </div>
                                                <div>
                                                    <b>ราคาสุทธิ : </b><span class="pull-right">xx,xxx บาท</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page 2 -->
                                    <div id="step-2" class="" style="display: none">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pull-right">
                        <button class="btn btn-default btn-sm" id="prev-btn" type="button">ย้อนกลับ</button>
                        <button class="btn btn-default btn-sm next-btn" id="next-btn" type="button">ถัดไป</button>
                        <button class="btn btn-info btn-sm" id="success-btn" type="button">ยืนยันรายการ</button>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- /MIDDLE -->

</div>
<?php include "components/template_js.php"; ?>
<script src="assets/template/plugins/smartwizard-master/js/jquery.smartWizard.js"></script>
<script src="assets/js/config-stepwizard.js"></script>
<script src="assets/select2/js/select2.min.js"></script>
<script src="assets/js/billlist.js"></script>
</body>
</html>