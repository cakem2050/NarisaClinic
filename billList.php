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

    $sql_bank = "SELECT * FROM bank WHERE bak_status = 'E' ORDER BY bak_no";
    $result_bank = $conn->query($sql_bank);
    $result_bank2 = $conn->query($sql_bank);
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
    <link rel="stylesheet" href="assets/jquery-ui/jquery-ui.css">
</head>
<body class="min">
<!-- WRAPPER -->
<div id="wrapper">
    <aside id="aside">
        <?php
        session_start();
        if(isset($_SESSION['usr_level'])){
            if($_SESSION['usr_level'] == "C"){
                include "components/menu_staff.php";
            }else{
                header("location: /narisaclinic/login.php");
            }
        }else{
            header("location: /narisaclinic/login.php");
        }
        ?>
    </aside>
    <!-- HEADER -->
    <?php include "components/header.php" ?>
    <!-- /HEADER -->
    <section id="middle" style="margin-left: 0px;">

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
                                    <li class="nav-item"><a href="#step-2" class="edit-active">Step 2<br/>
                                            <small>วิธีชำระเงิน</small>
                                        </a></li>
                                    <li class="pull-right content-user">
                                        <span class="content-user-main"><b>ชื่อ : </b><span><?= $row['cus_name'] ?> <?= $row['cus_sname'] ?></span></span><br>
                                        <b>เลข OPD : </b><span id="cusid"><?= $row['cus_opd'] ?></span><br>
                                        <b>เบอร์โทรศัพท์ : </b><span><?= $row['cus_tel'] ?></span><br>
                                    </li>
                                </ul>
                                <div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h3>
                                                <b>บันทึกรายการ</b>
                                            </h3>
                                        </div>
                                        <div class="col-md-4 pull-right amount-result">
                                            <span class="pull-right"><b>ยอดชำระ : </b><span
                                                        class="pull-right margin-left-20"><span
                                                            id="result-allprice">0</span> บาท</span></span>
                                        </div>
                                    </div>
                                    <!-- Page 1 -->
                                    <div id="step-1" class="" style="display: none">
                                        <div class="row">
                                            <div class="col-md-12"
                                                 style="overflow: scroll;overflow-y:auto;overflow-x:auto">

                                                <form id="bill-detail">
                                                    <table class="table">
                                                        <thead class="bill-th">
                                                        <tr>
                                                            <th class="col-md-1">ลำดับ</th>
                                                            <th class="col-md-2">รหัสสินค้าและบริการ</th>
                                                            <th class="col-md-2">ชื่อรายการสินค้า</th>
                                                            <th class="col-md-2">ราคา/ชิ้น</th>
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
                                                            <td id="price">
                                                                <div class="input-group">
                                                                    <input type="number" class="form-control"
                                                                           placeholder="ราคา" name="add-pro-price" disabled>
                                                                    <div class="input-group-addon">/ชิ้น</div>
                                                                </div>
                                                            </td>
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
                                        </div>
                                    </div>
                                    <!-- Page 2 -->
                                    <div id="step-2" class="" style="display: none">
                                        <div class="row">
                                            <div class="btn-group" data-toggle="buttons">
                                                <div class="col-md-4">
                                                    <label class="btn btn-default active">
                                                        <input type="radio" name="option" class="select1" value="TC"
                                                               autocomplete="off" style="" checked>โอนเงินใน Clinic
                                                    </label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="btn btn-default">
                                                        <input type="radio" name="option" class="select1" value="TO"
                                                               autocomplete="off" style="">โอนเงินนอก Clinic
                                                    </label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="btn btn-default">
                                                        <input type="radio" name="option" class="select1" value="TL"
                                                               autocomplete="off" style="">โอนเงิน Line @
                                                    </label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="btn btn-default">
                                                        <input type="radio" name="option" class="select1" value="CH"
                                                               autocomplete="off" style="">เงินสด
                                                    </label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="btn btn-default">
                                                        <input type="radio" name="option" class="select2" value="CC"
                                                               autocomplete="off" style="">เงินสด + Credit
                                                    </label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="btn btn-default">
                                                        <input type="radio" name="option" class="select3" value="CD"
                                                               autocomplete="off" style="">Credit
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div id="content-pay" class="col-md-8">
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane form-inline active" id="select1">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-inline">
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon">จำนวนเงิน :</div>
                                                                        <input type="number" class="form-control"
                                                                               placeholder="จำนวนเงิน" name="money-pay">
                                                                        <div class="input-group-addon">บาท</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div role="tabpanel" class="tab-pane" id="select2">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-inline">
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon">จำนวนเงินสด :
                                                                        </div>
                                                                        <input type="number" class="form-control"
                                                                               placeholder="จำนวนเงิน" id="money">
                                                                        <div class="input-group-addon">บาท</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-inline">
                                                                <div class="form-group">
                                                                    <?php
                                                                    while ($bank = $result_bank->fetch()){
                                                                    ?>
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon">ธนาคาร : <?= $bank['bak_id'] ?> </div>
                                                                        <input type="number" class="form-control"
                                                                               placeholder="จำนวนเงิน" id="bank-<?= $bank['bak_id'] ?>">
                                                                        <div class="input-group-addon">บาท</div>
                                                                    </div>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div role="tabpanel" class="tab-pane" id="select3">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-inline">
                                                                <div class="form-group">
                                                                    <?php
                                                                    while ($bank = $result_bank2->fetch()){
                                                                        ?>
                                                                        <div class="input-group">
                                                                            <div class="input-group-addon">ธนาคาร : <?= $bank['bak_id'] ?> </div>
                                                                            <input type="number" class="form-control"
                                                                                   placeholder="จำนวนเงิน" id="bank-<?= $bank['bak_id'] ?>">
                                                                            <div class="input-group-addon">บาท</div>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="summary" class="col-md-4 na-result">
                                            <div class="form-inline na-input-price">
                                                <b>ค้างชำระ : </b><span class="pull-right">
                                                    <input type="number" id="stale-money" class="form-control"
                                                           placeholder="จำนวน"></span>
                                            </div>
                                            <div>
                                                <b>ราคาสุทธิ : </b><span class="pull-right"><span id="final_price">0</span> บาท</span>
                                            </div>
                                        </div>
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
                    <!-- Modal -->
                    <div class="modal fade" id="modelDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">กรุณาใส่ PassCode</h4>
                                </div>
                                <div class="modal-body">
                                    <input type="text" name="passcode" class="form-control" placeholder="รหัส PassCode">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="confirm_delete" data-delete="">ยืนยันการลบ</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="modelError" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">เกิดข้อผิดพลาด</h4>
                                </div>
                                <div class="modal-body" align="center">
                                    <h2>จำนวนเงินที่ชำระไม่ถูกต้อง</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="modelAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">เกิดข้อผิดพลาด</h4>
                                </div>
                                <div class="modal-body" align="center">
                                    <h2>กรุณาทำรายการ</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="modelSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">แจ้งเตือน</h4>
                                </div>
                                <div class="modal-body" align="center">
                                    <h2>ทำรายการสำเร็จ</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Modal -->
    <!-- /MIDDLE -->

</div>
<?php include "components/template_js.php"; ?>
<script src="assets/template/plugins/smartwizard-master/js/jquery.smartWizard.js"></script>
<script src="assets/jquery-ui/jquery-ui.js"></script>
<script src="assets/js/config-stepwizard.js"></script>
<script src="assets/select2/js/select2.min.js"></script>
<script src="assets/js/billlist.js"></script>
</body>
</html>