<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Narisa Clinic</title>
    <?php include "components/template_css.php"; ?>
    <link rel="stylesheet" href="assets/css/narisa-01.css">
    <link rel="stylesheet" href="assets/template/plugins/smartwizard-master/css/smart_wizard_theme_circles.css">
</head>
<body class="min">
<!-- WRAPPER -->
<div id="wrapper">
    <aside id="aside">
        <?php include "components/menu_admin.php" ?>
    </aside>
    <!-- HEADER -->
    <?php include "components/header.php" ?>
    <!-- /HEADER -->
    <section id="middle" style="margin-left: 0px;">
        <!-- page title -->
        <header id="page-header">
            <h1>Counter Narisa</h1>
            <ol class="breadcrumb">
                <li><a href="#">หน้าแรก</a></li>
                <li class="active">ทำรายการ</li>
            </ol>
        </header>

        <div id="content" class="padding-20 na-pd-b-0">
            <div id="panel-1" class="panel panel-default">
                <div class="panel-heading">
                    <div class="row padding-10">
                            <div class="col-md-4">
                                <b>ชื่อ : </b><span>มานะ พบกิจ</span>
                            </div>
                            <div class="col-md-4">
                                <b>เลข OPD : </b><span>85965</span>
                            </div>
                            <div class="col-md-4">
                                <b>เบอร์โทรศัพท์ : </b><span>086362965</span>
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
                            <div id="smartwizard" class="sw-main sw-theme-circles">
                                <ul class="circle-topic row">
                                    <li class="col-md-6 col-xs-6"><a href="#step-1" class="pull-right">Step 1
                                            <small>ทำรายการซื้อสินค้า</small>
                                        </a></li>
                                    <li class="col-md-5 col-xs-6"><a href="#step-2">Step 2<br/>
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
                                            <div class="col-md-12" style="overflow: scroll;overflow-y:auto;overflow-x:auto">
                                                <table class="table">
                                                    <tr>
                                                        <th class="col-md-1">ลำดับ</th>
                                                        <th class="col-md-2">รหัสสินค้าและบริการ</th>
                                                        <th class="col-md-3">ชื่อรายการสินค้า</th>
                                                        <th class="col-md-1">ราคา/ชิ้น</th>
                                                        <th class="col-md-1">จำนวน</th>
                                                        <th class="col-md-1">ส่วนลด%</th>
                                                        <th class="col-md-1">ส่วนลด(บาท)</th>
                                                        <th class="col-md-2">ราคาสุทธิ</th>
                                                    </tr>
                                                    <tr>
                                                        <td>1.</td>
                                                        <td><input type="text" class="form-control" placeholder="รหัสสินค้าและบริการ"></td>
                                                        <td>ชื่อรายการสินค้า</td>
                                                        <td>ราคา/ชิ้น</td>
                                                        <td><input type="number" class="form-control" placeholder="จำนวน"></td>
                                                        <td><input type="number" class="form-control" placeholder="ส่วนลด%"></td>
                                                        <td><input type="number" class="form-control" placeholder="ส่วนลด(บาท)"></td>
                                                        <td>ราคาสุทธิ</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2.</td>
                                                        <td><input type="text" class="form-control" placeholder="รหัสสินค้าและบริการ"></td>
                                                        <td>ชื่อรายการสินค้า</td>
                                                        <td>ราคา/ชิ้น</td>
                                                        <td><input type="number" class="form-control" placeholder="จำนวน"></td>
                                                        <td><input type="number" class="form-control" placeholder="ส่วนลด%"></td>
                                                        <td><input type="number" class="form-control" placeholder="ส่วนลด(บาท)"></td>
                                                        <td>ราคาสุทธิ</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3.</td>
                                                        <td><input type="text" class="form-control" placeholder="รหัสสินค้าและบริการ"></td>
                                                        <td>ชื่อรายการสินค้า</td>
                                                        <td>ราคา/ชิ้น</td>
                                                        <td><input type="number" class="form-control" placeholder="จำนวน"></td>
                                                        <td><input type="number" class="form-control" placeholder="ส่วนลด%"></td>
                                                        <td><input type="number" class="form-control" placeholder="ส่วนลด(บาท)"></td>
                                                        <td>ราคาสุทธิ</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-md-3 col-md-offset-9 na-result" style="padding: 20px">
                                                <div>
                                                    <b>ยอดชำระ : </b><span class="pull-right">xx,xxx บาท</span>
                                                </div>
                                                <div class="form-inline na-input-price">
                                                    <b>ค้างชำระ : </b><span class="pull-right"><input type="number" class="form-control" placeholder="จำนวน"></span>
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
</body>
</html>