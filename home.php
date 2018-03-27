<?php
include "php/connect.php";
$sql = "SELECT * FROM bills ORDER BY bills_datetime LIMIT 20";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Narisa Clinic</title>
    <?php include "components/template_css.php"; ?>
    <link rel="stylesheet" href="assets/css/narisa-01.css">
</head>
<body class="min">
<!-- WRAPPER -->
<div id="wrapper">
    <aside id="aside">
        <?php
        session_start();
        if (isset($_SESSION['usr_level'])) {
            if ($_SESSION['usr_level'] == "C") {
                include "components/menu_staff.php";
            } elseif ($_SESSION['usr_level'] == "M") {
                include "components/menu_admin.php";
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
        <div class="row margin-top-20">
            <div class="col-md-3 col-md-offset-3">
                <a href="oldList.php" class="btn btn-info btn-lg na-btn-edit">คนไข้เก่า</a>
            </div>
            <div class="col-md-3">
                <a href="saveNewCustomer.php" class="btn btn-default btn-lg na-btn-edit">คนไข้ใหม่</a>
            </div>
        </div>
        <!-- /page title -->
        <div id="content" class="padding-20">
            <div id="panel-1" class="panel panel-default">
                <div class="panel-heading">
							<span class="title elipsis">
								<strong>รายการคนไข้</strong> <!-- panel title -->
							</span>

                    <!-- right options -->
                    <ul class="options pull-right list-inline">
                        <li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse"
                               data-placement="bottom"></a></li>
                        <li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip"
                               title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
                    </ul>
                    <!-- /right options -->

                </div>

                <!-- panel content -->
                <div class="panel-body">
                    <div class="table-responsive nomargin">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th class="col-md-1">ลำดับ</th>
                                <th class="col-md-2">ชื่อคนไข้</th>
                                <th class="col-md-2">วันที่/เวลา</th>
                                <th class="col-md-1">ยอดชำระ</th>
                                <th class="col-md-1">ส่วนลด</th>
                                <th class="col-md-1">ยอดสุทธิ</th>
                                <th class="col-md-1">วิธีชำระ</th>
                                <th class="col-md-1">คงค้าง</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $count = 1;
                            while ($row = $result->fetch()) {
                                $sql_cus = "SELECT * FROM customer WHERE cus_opd = '" . $row['cus_opd'] . "'";
                                $result_cus = $conn->query($sql_cus);
                                $row_cus = $result_cus->fetch();
                                ?>
                                <tr>
                                    <td><?= $count ?></td>
                                    <td><?= $row_cus['cus_name'] ?> <?= $row_cus['cus_sname'] ?></td>
                                    <td><?= $row['bills_datetime'] ?></td>
                                    <td><?= $row['bills_pay'] ?></td>
                                    <td><?= $row['bills_discount'] ?></td>
                                    <td><?= $row['bills_net'] ?></td>
                                    <td>
                                        <?php
                                        if ($row['bills_ptype'] == 'TC') {
                                            echo "โอนที่ clinic";
                                        } elseif ($row['bills_ptype'] == 'TO') {
                                            echo "โอนนอก clinic";
                                        } elseif ($row['bills_ptype'] == 'TL') {
                                            echo "โอนLine@";
                                        } elseif ($row['bills_ptype'] == 'CH') {
                                            echo "เงินสด";
                                        } elseif ($row['bills_ptype'] == 'CC') {
                                            echo "เงินสด+credit";
                                        } elseif ($row['bills_ptype'] == 'CD') {
                                            echo "credit";
                                        }
                                        ?>
                                    </td>
                                    <td><?= $row['bills_ost'] ?></td>
                                </tr>
                                <?php
                                $count++;
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /panel content -->

                <!-- panel footer -->
                <div class="panel-footer">
                    <!-- /pre code -->

                </div>
                <!-- /panel footer -->

            </div>
        </div>
    </section>
    <!-- /MIDDLE -->

</div>
<?php include "components/template_js.php"; ?>
</body>
</html>