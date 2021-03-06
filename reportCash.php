<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Narisa Clinic</title>
    <?php include "components/template_css.php"; ?>
</head>
<body class="min">
<!-- WRAPPER -->
<div id="wrapper">
    <aside id="aside">
        <?php
        session_start();
        if (isset($_SESSION['usr_level'])) {
            if ($_SESSION['usr_level'] == "M") {
                include "components/menu_admin.php";
                include "php/func.php";
            } else {
                header("location: /narisaclinic/login.php");
            }
        } else {
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
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading panel-heading-transparent">
                            <strong>รายงานการชำระเงินสด <?php
                                if (isset($_GET['date'])) {
                                    echo "ประจำวันที่ " . $_GET['date'];
//                                $op2 = new func2();
//                                $data2 = $op2->date($_GET['date']);
//                                echo $data2;
                                }
                                ?></strong>

                        </div>
                        <div class="panel-body">
                            <form class="" action="reportCash.php" method="get" enctype="multipart/form-data"
                                  data-success="Sent! Thank you!" data-toastr-position="top-right">
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-2 col-sm-2">
                                            <input id="inputdatepicker" class="datepicker form-control" name="date"
                                                   data-date-format="dd-mm-yyyy">
                                        </div>
                                        <div class="col-md-2 col-sm-2">
                                            <button type="submit" class="btn btn-3d btn-teal btn-ms btn-block">
                                                <i class="fa fa-search"></i>ค้นหา
                                            </button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                            <?php
                            $result_row = 1;
                            if (isset($_GET['date']) && $_GET['date'] != "") {
                                include "php/connect.php";
                                $op = new func();
                                $op2 = new func2();
                                $data2 = $op2->date($_GET['date']);
                                $date = "" . $data2 . "%";
                                $sql = "SELECT * FROM bills WHERE bills_datetime LIKE :datecheck AND bills_ptype = 'CH'";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute(array(':datecheck' => $date));
                                if ($stmt->rowCount() == 0) {
                                    ?>
                                    <h3 style="color: #bf6464;" class="text-center">"ไม่พบข้อมูล"</h3>
                                    <?php

                                } else {

                                    ?>
                                    <div class="table-responsive">
                                        <table class="table table-bordered nomargin">
                                            <thead>
                                            <tr>
                                                <th>ลำดับ</th>
                                                <th>ชื่อ นามสกุล</th>
                                                <th>วันที่/เวลา โอน</th>
                                                <th>ยอดชำระ</th>
                                                <th>ส่วนลด</th>
                                                <th>ราคาสุทธิ</th>
                                                <th>ค้างชำระ</th>
                                                <th width="10%"></th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <?php
                                            $i = 1;
                                            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                <tr>
                                                    <td><?= $i ?></td>
                                                    <td><?php

                                                        $sql_opd = "SELECT * FROM customer WHERE cus_opd = :opd";
                                                        $stmt_opd = $conn->prepare($sql_opd);
                                                        $stmt_opd->execute(array(':opd' => $result['cus_opd']));
                                                        while ($result_opd = $stmt_opd->fetch(PDO::FETCH_ASSOC)) {
                                                            echo $result_opd['cus_name'] . " " . $result_opd['cus_sname'];
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?php
                                                        $data = $op->date($result['bills_datetime']);
                                                        echo $data;
                                                        ?></td>
                                                    <td><?= $result['bills_pay'] ?></td>
                                                    <td><?= $result['bills_discount'] ?></td>
                                                    <td><?= $result['bills_net'] ?></td>
                                                    <td><?= $result['bills_ost'] ?></td>
                                                    <td><?php
                                                        if ($result['bills_status'] == "D") {
                                                            echo "<span style='color: #bf6464;'>รายการที่ถูกยกเลิก</span>";
                                                        } else {
                                                            echo "<button type=\"button\" class=\"btn btn-danger btn-sm get_id\" data='" . $result['bills_id'] . "' data-toggle=\"modal\" data-target=\"#exampleModal\">
                            <i class=\"glyphicon glyphicon-trash\"></i>ยกเลิกรายการ
                        </button>";
                                                        }
                                                        ?></td>
                                                </tr>
                                                <?php
                                                $result_row++;
                                                $i++;
                                            }
                                            ?>
                                            <tr>
                                                <td colspan="3" class="text-center"><b>รวม</b></td>
                                                <?php
                                                $sql_pay = "SELECT SUM(bills_pay),SUM(bills_discount),SUM(bills_ost),SUM(bills_net) FROM bills WHERE bills_datetime LIKE :datecheck AND bills_status = 'E' AND bills_ptype = 'CH'";
                                                $pay = $conn->prepare($sql_pay);
                                                $pay->execute(array(':datecheck' => $date));
                                                while ($result = $pay->fetch(PDO::FETCH_ASSOC)) {
                                                    echo "<td>" . number_format($result['SUM(bills_pay)'],2) . "</td><td>" . number_format($result['SUM(bills_discount)'],2) . "</td><td>" . number_format($result['SUM(bills_net)'],2) . "</td><td>" . number_format($result['SUM(bills_ost)'],2) . "</td><td></td>";
                                                }
                                                ?>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 col-sm-2 pull-right margin-top-20">
                                            <?php
                                            if (isset($_GET['date']) && $_GET['date'] != "" && $result_row != 1) {
                                                ?>
                                                <a href="php/pdf/cash.php?date=<?= $_GET['date'] ?>"
                                                   class="btn btn-3d btn-teal btn-ms btn-block" id="print">
                                                    <i class="fa fa-download"></i>ปริ้น
                                                </a>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                <?php }
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /MIDDLE -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">กรุณาใส่ PassCode</h4>
                </div>
                <div class="modal-body">
                    <input type="text" id="passcode" name="passcode" class="form-control" placeholder="รหัส PassCode">
                    <input type="hidden" id="bills_id" value="">
                    <input type="hidden" id="location" value="reportCash">
                    <input type="hidden" id="date" value="<?= $_GET['date'] ?>">
                    <div id="passcode-text" style="color: red" class="hide">
                        รหัส Passcode ไม่ถูกต้อง
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="get_pass" data-delete="">ยืนยันการลบ</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>

</div>
<?php include "components/template_js.php"; ?>
<script src="assets/template/plugins/jquery/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="assets/js/narisa-01.js"></script>
<script src="dist/js/bootstrap-datepicker-custom.js"></script>
<script src="dist/locales/bootstrap-datepicker.th.min.js" charset="UTF-8"></script>
<script>
    $(document).ready(function () {
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            todayBtn: true,
            language: 'th',             //เปลี่ยน label ต่างของ ปฏิทิน ให้เป็น ภาษาไทย   (ต้องใช้ไฟล์ bootstrap-datepicker.th.min.js นี้ด้วย)
            thaiyear: true              //Set เป็นปี พ.ศ.
        }).datepicker("setDate", "0");  //กำหนดเป็นวันปัจุบัน
    });
</script>
</body>
</html>