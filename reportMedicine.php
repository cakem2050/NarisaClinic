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
                            <strong>รายงานสรุปการขายยา ประจำวัน <?php
                                if (isset($_GET['date'])) {
                                    echo "ประจำวันที่ " . $_GET['date'];
//                                $op2 = new func2();
//                                $data2 = $op2->date($_GET['date']);
//                                echo $data2;
                                }
                                ?></strong>

                        </div>
                        <div class="panel-body">
                            <form class="" action="reportMedicine.php" method="get" enctype="multipart/form-data"
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
                                $op3 = new func3();
                                $data2 = $op3->date($_GET['date']);
                                $date = "" . $data2 . "%";
                                $sql_pro = "SELECT * FROM product WHERE pro_status ='E'";
                                $stmt_pro = $conn->prepare($sql_pro);
                                $stmt_pro->execute(array(':datecheck' => $date));

                                $pro_id = [];
                                $pro_name = [];
                                $sum_pro = [];
                                $sum_check = 0;
                                while ($result = $stmt_pro->fetch(PDO::FETCH_ASSOC)) {
                                    $pro_id[] = $result['pro_id'];
                                    $pro_name[] = $result['pro_name'];
                                    $sql_prc = "SELECT SUM(bild_value) FROM billsdetail WHERE bild_timestamp LIKE :datecheck AND bild_status = 'E' AND pro_id = :pro_id";
                                    $stmt_prc = $conn->prepare($sql_prc);
                                    $stmt_prc->execute(array(':datecheck' => $date, 'pro_id' => $result['pro_id']));

                                    while ($result_prc = $stmt_prc->fetch(PDO::FETCH_ASSOC)) {
                                        $sum_check = $sum_check + $result_prc['SUM(bild_value)'];
                                        $sum_pro[] = $result_prc['SUM(bild_value)'];
                                        //echo "<td>" . $result_prc['SUM(bild_value)']."</td>";
                                    }
                                }

                                if ($sum_check == 0) {
                                    ?>
                                    <h3 style="color: #bf6464;" class="text-center">"ไม่พบข้อมูล"</h3>
                                    <?php

                                } else {

                                    ?>
                                    <div class="table-responsive">
                                        <table class="table table-bordered nomargin">
                                            <thead>
                                            <tr>
                                                <th width="5%">ลำดับ</th>
                                                <th width="20%">รหัส barcode</th>
                                                <th>ชื่อยา</th>
                                                <th width="10%">จำนวน</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <?php
                                            $j = 1;

                                            foreach ($sum_pro as $key => $item) {
                                                if ($item != 0) {
                                                    echo "<tr><td>" . $j . "</td><td>" . $pro_id[$key] . "</td><td>" . $pro_name[$key] . "</td><td>" . $item . "</td></tr>";
                                                    $j++;
                                                }
                                            }
                                            ?>
                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 col-sm-2 pull-right margin-top-20">
                                            <?php
                                            if (isset($_GET['date']) && $_GET['date'] != "" && $sum_check != 0) {
                                                ?>
                                                <a href="php/pdf/medicine.php?date=<?= $_GET['date'] ?>"
                                                   class="btn btn-3d btn-teal btn-ms btn-block" id="print">
                                                    <i class="fa fa-download"></i>ปริ้น
                                                </a>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /MIDDLE -->

</div>
<?php include "components/template_js.php"; ?>
<script src="assets/template/plugins/jquery/jquery-2.1.4.min.js"></script>
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