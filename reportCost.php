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
                            <strong>รายงานสรุปการเงิน</strong>

                        </div>
                        <div class="panel-body">
                            <form class="" action="reportCost.php" method="get" enctype="multipart/form-data" data-success="Sent! Thank you!" data-toastr-position="top-right">
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
                                    <?php
                                        if(isset($_GET['date']) && $_GET['date'] != ""){
                                            include "php/connect.php";
                                            $date = "".$_GET["date"]."%";

                                            $sql_tc = "SELECT SUM(bills_net) FROM bills WHERE bills_datetime LIKE :datecheck AND bills_status = 'E' AND bills_ptype = 'TC'";
                                            $pay_tc = $conn->prepare($sql_tc);
                                            $pay_tc->execute(array(':datecheck'=>$date));

                                            $sql_to = "SELECT SUM(bills_net) FROM bills WHERE bills_datetime LIKE :datecheck AND bills_status = 'E' AND bills_ptype = 'TO'";
                                            $pay_to = $conn->prepare($sql_to);
                                            $pay_to->execute(array(':datecheck'=>$date));

                                            $sql_tl = "SELECT SUM(bills_net) FROM bills WHERE bills_datetime LIKE :datecheck AND bills_status = 'E' AND bills_ptype = 'TL'";
                                            $pay_tl = $conn->prepare($sql_tl);
                                            $pay_tl->execute(array(':datecheck'=>$date));

                                            $sql_ch = "SELECT SUM(bills_cash) FROM bills WHERE bills_datetime LIKE :datecheck AND bills_status = 'E' AND bills_ptype = 'CH'";
                                            $pay_ch = $conn->prepare($sql_ch);
                                            $pay_ch->execute(array(':datecheck'=>$date));

                                    ?>
                                    <tbody>
                                    <tr>
                                        <td width="33%">เงินโอนที่ clinic<span class="pull-right margin-right-20">
                                            <?php
                                            $result_tc_cop = "";
                                                while($result_tc = $pay_tc->fetch( PDO::FETCH_ASSOC )) {
                                                    $result_tc_cop = $result_tc['SUM(bills_net)'];
                                                    echo $result_tc['SUM(bills_net)'];
                                                }
                                            ?>
                                            </span> </td>
                                        <td width="33%">เงินสด <span class="pull-right margin-right-20">
                                            <?php
                                            $result_ch_cop = "";
                                                while($result_ch = $pay_ch->fetch( PDO::FETCH_ASSOC )) {
                                                    $result_ch_cop = $result_ch['SUM(bills_cash)'];
                                                    echo $result_ch['SUM(bills_cash)'];
                                                }
                                            ?>
                                            </span></td>
                                        <td>credit</td>
                                    </tr>
                                    <tr>
                                        <td>เงินโอนที่นอก clinic <span class="pull-right margin-right-20">
                                            <?php
                                            $result_to_cop = "";
                                            while($result_to = $pay_to->fetch( PDO::FETCH_ASSOC )) {
                                                $result_to_cop = $result_to['SUM(bills_net)'];
                                                echo $result_to['SUM(bills_net)'];
                                            }
                                            ?>
                                            </span></td>
                                        <td></td>
                                        <td rowspan="2">
                                            <?php
                                                $sql_bk = "SELECT * FROM bank WHERE bak_status = :status ORDER BY bak_no ASC";
                                                $stmt_bk = $conn->prepare($sql_bk);
                                                $stmt_bk->execute(array(':status'=>"E"));
                                                $sum_credit = 0;
                                                while($result_bk = $stmt_bk->fetch( PDO::FETCH_ASSOC )){
                                                    echo "<span class=\"margin-left-10\">+ ".$result_bk['bak_id']."</span>";
                                                    $st = " bills_".strtolower($result_bk['bak_id']);
                                                    $sql_sbk = "SELECT SUM(".$st.") FROM bills WHERE bills_datetime LIKE :datecheck AND bills_status = 'E'";
                                                    $stmt_sbk = $conn->prepare($sql_sbk);
                                                    $stmt_sbk->execute(array(':datecheck'=>$date));
                                                    while($result_sbk = $stmt_sbk->fetch( PDO::FETCH_ASSOC )){
                                                        $sum_credit = $sum_credit + $result_sbk['SUM('.$st.')'];
                                                        echo "<span class=\"pull-right margin-right-20\">".$result_sbk['SUM('.$st.')']."</span><br>";
                                                    }
                                                }
                                            ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>เงินโอน Line@ <span class="pull-right margin-right-20">
                                            <?php
                                            $result_tl_cop = "";
                                                while($result_tl = $pay_tl->fetch( PDO::FETCH_ASSOC )) {
                                                    $result_tl_cop = $result_tl['SUM(bills_net)'];
                                                    echo $result_tl['SUM(bills_net)'];
                                                }
                                            ?>
                                            </span></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>รวม <span class="pull-right margin-right-20">
                                                <?php
                                                    $sum = $result_tc_cop + $result_to_cop + $result_tl_cop;
                                                    echo $sum;
                                                ?>
                                            </span></td>
                                        <td><span class="pull-right margin-right-20">
                                                <?php
                                                    echo $result_ch_cop;
                                                ?>
                                            </span></td>
                                        <td><span class="pull-right margin-right-20">
                                                <?php
                                                    echo $sum_credit;
                                                ?>
                                            </span></td>
                                    </tr>

                                    </tbody>
                                    <?php
                                        }
                                        ?>
                                </table>
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