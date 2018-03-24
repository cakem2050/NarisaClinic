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
        if(isset($_SESSION['usr_level'])){
            if($_SESSION['usr_level'] == "M"){
                include "components/menu_admin.php";
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
    <section id="middle"  style="margin-left: 0px;">
        <!-- /page title -->
        <div id="content" class="padding-20">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading panel-heading-transparent">
                            <strong>รายงานการชำระ credit</strong>

                        </div>
                        <div class="panel-body">
                            <form class="" action="reportCashCredit.php" method="get" enctype="multipart/form-data" data-success="Sent! Thank you!" data-toastr-position="top-right">
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-3">
                                            <input type="date" placeholder="วันที่ค้นหา" name="date" value="" class="form-control">
                                        </div>
                                        <div class="col-md-2 col-sm-2">
                                            <button type="submit" class="btn btn-3d btn-teal btn-ms btn-block">
                                                <i class="fa fa-search"></i>ค้นหา
                                            </button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
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
                                    </tr>
                                    </thead>
                                    <?php
                                    $result_row = 1;
                                        if(isset($_GET['date']) && $_GET['date'] != ""){
                                        include "php/connect.php";
                                        include "php/func.php";
                                        $op = new func();
                                        $date = "".$_GET["date"]."%";
                                        $sql = "SELECT * FROM bills WHERE bills_datetime LIKE :datecheck AND bills_status = 'E' AND bills_ptype = 'CC'";
                                        $stmt = $conn->prepare($sql);
                                        $stmt->execute(array(':datecheck'=>$date));
                                        $i = 1;
                                        while($result = $stmt->fetch( PDO::FETCH_ASSOC )){
                                    ?>
                                    <tbody>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td>
                                            <?php

                                            $sql_opd = "SELECT * FROM customer WHERE cus_opd = :opd";
                                            $stmt_opd = $conn->prepare($sql_opd);
                                            $stmt_opd->execute(array(':opd'=>$result['cus_opd']));
                                            $usr_level ="F";
                                            while($result_opd = $stmt_opd->fetch( PDO::FETCH_ASSOC )){
                                                echo $result_opd['cus_name']." ".$result_opd['cus_sname'];
                                            }
                                            ?>
                                            <p>เงินสด <?=$result['bills_cash']?></p>
                                        </td>
                                        <td><?php
                                            $data = $op->date($result['bills_datetime']);
                                            echo $data;
                                            ?>
                                            <?php

                                            $sql_bk = "SELECT * FROM bank WHERE bak_status = :status ORDER BY bak_no ASC";
                                            $stmt_bk = $conn->prepare($sql_bk);
                                            $stmt_bk->execute(array(':status'=>"E"));
                                            $usr_level ="F";
                                            while($result_bk = $stmt_bk->fetch( PDO::FETCH_ASSOC )){
                                                echo "<p class=\"nomargin\">".$result_bk['bak_id']." ";
                                                $st = " bills_".strtolower($result_bk['bak_id']);
                                                $sql_sbk = "SELECT SUM(".$st.") FROM bills WHERE bills_datetime LIKE :datecheck AND bills_status = 'E' AND bills_ptype = 'CC' AND bills_no = :no";
                                                $stmt_sbk = $conn->prepare($sql_sbk);
                                                $stmt_sbk->execute(array(':datecheck'=>$date,':no'=>$result['bills_no']));
                                                while($result_sbk = $stmt_sbk->fetch( PDO::FETCH_ASSOC )){
                                                    echo $result_sbk['SUM('.$st.')']."</p>";
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td><?=$result['bills_pay']?></td>
                                        <td><?=$result['bills_discount']?></td>
                                        <td><?=$result['bills_net']?></td>
                                        <td><?=$result['bills_ost']?></td>
                                    </tr>
                                    <?php
                                    $result_row++;
                                    $i++;
                                    }
                                    ?>
                                    <tr>
                                        <td class="text-center"><b>รวม</b></td>
                                        <td colspan="6">
                                            <p class="margin-top-0 margin-bottom-10">เงินสด
                                                <?php
                                                    $sql_cash = "SELECT SUM(bills_cash) FROM bills WHERE bills_datetime LIKE :datecheck AND bills_status = 'E' AND bills_ptype = 'CC'";
                                                    $cash = $conn->prepare($sql_cash);
                                                    $cash->execute(array(':datecheck'=>$date));
                                                    while($result_cash = $cash->fetch( PDO::FETCH_ASSOC )){
                                                        echo $result_cash['SUM(bills_cash)'];
                                                    }
                                                ?>
                                            </p>
                                            <div class="margin-left-20">
                                                <?php

                                                $sql_bk = "SELECT * FROM bank WHERE bak_status = :status ORDER BY bak_no ASC";
                                                $stmt_bk = $conn->prepare($sql_bk);
                                                $stmt_bk->execute(array(':status'=>"E"));
                                                while($result_bk = $stmt_bk->fetch( PDO::FETCH_ASSOC )){
                                                    echo "<p class=\"nomargin\">".$result_bk['bak_id']." ";
                                                    $st = " bills_".strtolower($result_bk['bak_id']);
                                                    $sql_sbk = "SELECT SUM(".$st.") FROM bills WHERE bills_datetime LIKE :datecheck AND bills_status = 'E' AND bills_ptype = 'CC'";
                                                    $stmt_sbk = $conn->prepare($sql_sbk);
                                                    $stmt_sbk->execute(array(':datecheck'=>$date));
                                                    while($result_sbk = $stmt_sbk->fetch( PDO::FETCH_ASSOC )){
                                                        echo $result_sbk['SUM('.$st.')']."</p>";
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-2 col-sm-2 pull-right margin-top-20">
                                    <?php
                                    if(isset($_GET['date']) && $_GET['date'] != "" && $result_row != 1) {
                                        ?>
                                        <a href="php/pdf/cashCredit.php?date=<?=$_GET['date']?>" class="btn btn-3d btn-teal btn-ms btn-block" id="print">
                                            <i class="fa fa-download"></i>ปริ้น
                                        </a>
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
    </section>
    <!-- /MIDDLE -->

</div>
<?php include "components/template_js.php"; ?>
</body>
</html>