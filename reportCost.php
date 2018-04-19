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
                            <strong>รายงานสรุปการเงิน <?php
                                if (isset($_GET['date'])) {
                                    echo "ประจำวันที่ " . $_GET['date'];
//                                $op2 = new func2();
//                                $data2 = $op2->date($_GET['date']);
//                                echo $data2;
                                }
                                ?></strong>

                        </div>
                        <div class="panel-body">
                            <form class="" action="reportCost.php" method="get" enctype="multipart/form-data"
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

                            if (isset($_GET['date']) && $_GET['date'] != "") {
                                include "php/connect.php";
                                $op2 = new func2();
                                $data2 = $op2->date($_GET['date']);
                                $date = "" . $data2 . "%";

                                $sql_tc = "SELECT SUM(bills_net) FROM bills WHERE bills_datetime LIKE :datecheck AND bills_status = 'E' AND bills_ptype = 'TC'";
                                $pay_tc = $conn->prepare($sql_tc);
                                $pay_tc->execute(array(':datecheck' => $date));

                                $sql_to = "SELECT SUM(bills_net) FROM bills WHERE bills_datetime LIKE :datecheck AND bills_status = 'E' AND bills_ptype = 'TO'";
                                $pay_to = $conn->prepare($sql_to);
                                $pay_to->execute(array(':datecheck' => $date));

                                $sql_tl = "SELECT SUM(bills_net) FROM bills WHERE bills_datetime LIKE :datecheck AND bills_status = 'E' AND bills_ptype = 'TL'";
                                $pay_tl = $conn->prepare($sql_tl);
                                $pay_tl->execute(array(':datecheck' => $date));

                                $sql_ch = "SELECT SUM(bills_cash) FROM bills WHERE bills_datetime LIKE :datecheck AND bills_status = 'E'";
                                $pay_ch = $conn->prepare($sql_ch);
                                $pay_ch->execute(array(':datecheck' => $date));

                                $result_tc_cop = "";
                                while ($result_tc = $pay_tc->fetch(PDO::FETCH_ASSOC)) {
                                    $result_tc_cop = $result_tc['SUM(bills_net)'];
                                    //echo $result_tc['SUM(bills_net)'];
                                }

                                $result_ch_cop = "";
                                while ($result_ch = $pay_ch->fetch(PDO::FETCH_ASSOC)) {
                                    $result_ch_cop = $result_ch['SUM(bills_cash)'];
                                    //echo $result_ch['SUM(bills_cash)'];
                                }

                                $result_to_cop = "";
                                while ($result_to = $pay_to->fetch(PDO::FETCH_ASSOC)) {
                                    $result_to_cop = $result_to['SUM(bills_net)'];
                                    //echo $result_to['SUM(bills_net)'];
                                }

                                $result_tl_cop = "";
                                while ($result_tl = $pay_tl->fetch(PDO::FETCH_ASSOC)) {
                                    $result_tl_cop = $result_tl['SUM(bills_net)'];
                                    //echo $result_tl['SUM(bills_net)'];
                                }

                                $sql_bk = "SELECT * FROM bank WHERE bak_status = :status ORDER BY bak_no ASC";
                                $stmt_bk = $conn->prepare($sql_bk);
                                $stmt_bk->execute(array(':status' => "E"));
                                $sum_credit = 0;
                                $test = [];
                                $test2 = [];
                                while ($result_bk = $stmt_bk->fetch(PDO::FETCH_ASSOC)) {
                                    $test[] =$result_bk['bak_id'];
                                    //echo "<span class=\"margin-left-10\">+ " . $result_bk['bak_id'] . "</span>";
                                    $st = " bills_" . strtolower($result_bk['bak_id']);
                                    $sql_sbk = "SELECT SUM(" . $st . ") FROM bills WHERE bills_datetime LIKE :datecheck AND bills_status = 'E'";
                                    $stmt_sbk = $conn->prepare($sql_sbk);
                                    $stmt_sbk->execute(array(':datecheck' => $date));
                                    while ($result_sbk = $stmt_sbk->fetch(PDO::FETCH_ASSOC)) {
                                        $test2[] = $result_sbk['SUM(' . $st . ')'];
                                        $sum_credit = $sum_credit + $result_sbk['SUM(' . $st . ')'];
                                        //echo "<span class=\"pull-right margin-right-20\">" . $result_sbk['SUM(' . $st . ')'] . "</span><br>";
                                    }
                                }













                                if ($result_tc_cop == 0 && $result_ch_cop == 0 && $result_to_cop == 0 && $result_to_cop == 0 && $sum_credit == 0) {
                                    ?>
                                    <h3 style="color: #bf6464;" class="text-center">"ไม่พบข้อมูล"</h3>
                                    <?php

                                } else {
                                    ?>
                                    <div class="table-responsive">
                                        <table class="table table-bordered nomargin">

                                            <tbody>
                                            <tr>
                                                <td width="33%">เงินโอนที่ clinic<span
                                                            class="pull-right margin-right-20">
                                            <?php
                                                echo number_format($result_tc_cop,2);
                                            ?>
                                            </span></td>
                                                <td width="33%">เงินสด <span class="pull-right margin-right-20">
                                            <?php
                                                echo number_format($result_ch_cop,2);
                                            ?>
                                            </span></td>
                                                <td>credit</td>
                                            </tr>
                                            <tr>
                                                <td>เงินโอนที่นอก clinic <span class="pull-right margin-right-20">
                                            <?php
                                                echo number_format($result_to_cop,2);
                                            ?>
                                            </span></td>
                                                <td></td>
                                                <td rowspan="2">
                                                    <?php
                                                    foreach ($test as $key => $item){
                                                        echo "<span class=\"margin-left-10\">+ " . $item . "</span><span class=\"pull-right margin-right-20\">" . number_format($test2[$key],2) . "</span><br>";
                                                    }
                                                    ?>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>เงินโอน Line@ <span class="pull-right margin-right-20">
                                            <?php
                                                echo number_format($result_to_cop,2);
                                            ?>
                                            </span></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>รวม <span class="pull-right margin-right-20">
                                                <?php
                                                $sum = number_format($result_tc_cop,2) + number_format($result_to_cop,2) + number_format($result_tl_cop,2);
                                                echo number_format($sum,2);
                                                ?>
                                            </span></td>
                                                <td><span class="pull-right margin-right-20">
                                                <?php
                                                echo number_format($result_ch_cop,2);
                                                ?>
                                            </span></td>
                                                <td><span class="pull-right margin-right-20">
                                                <?php
                                                echo number_format($sum_credit,2);
                                                ?>
                                            </span></td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-3 pull-left margin-top-20">
                                            <?php

                                            $result_all = number_format($sum,2) + number_format($result_ch_cop,2) + number_format($sum_credit,2);
                                            echo "<span>รวมรายได้วันที่ " . $_GET['date'] . " ทั้งสิน " . number_format($result_all,2) . " บาท</span>"
                                            ?>
                                        </div>
                                        <div class="col-md-2 col-sm-2 pull-right margin-top-20">
                                            <a href="php/pdf/cost.php?date=<?= $_GET['date'] ?>"
                                               class="btn btn-3d btn-teal btn-ms btn-block" id="print">
                                                <i class="fa fa-download"></i>ปริ้น
                                            </a>
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