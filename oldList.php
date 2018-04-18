<?php
    include "php/connect.php";
    $sql = "SELECT * FROM customer ORDER BY cus_cdate DESC LIMIT 20";
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

        <div id="content" class="padding-20 na-pd-b-0">
            <div id="panel-1" class="panel panel-default">
                <div class="panel-heading">
                    <div class="row padding-10">
                        <form id="search_person" style="width: 100%">
                            <div class="form-group col-md-4">
                                <label>ค้นหาชื่อ</label>
                                <input type="text" class="form-control" placeholder="ชื่อ-นามสกุล" name="name">
                            </div>
                            <div class="form-group col-md-4">
                                <label>ค้นหาเลข OPD</label>
                                <input type="text" class="form-control" placeholder="รหัส OPD" name="opd">
                            </div>
                            <div class="form-group col-md-4">
                                <label>ค้นหาเบอร์โทร</label>
                                <input type="text" class="form-control masked" data-format="9999999999" data-placeholder="X" placeholder="เบอร์โทรศัพท์" name="phone" >
                            </div>
                            <div class="col-md-2 col-md-offset-5">
                                <div id="help-box" class="err-text hide">กรุณากรอกข้อมูลอย่างน้อย 1 ช่อง</div>
                                <button type="submit" class="btn btn-info na-btn-wbtn btn-lg">ค้นหา</button>
                            </div>
                        </form>
                    </div>
                </div>

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
                                <th class="col-md-4">ชื่อคนไข้</th>
                                <th class="col-md-3">เลข OPD</th>
                                <th class="col-md-4">เบอร์โทรศัพท์</th>
                                <th></th>

                            </tr>
                            </thead>
                            <tbody id="customer">
                            <?php
                            $count = 1;
                                while ($row = $result->fetch()) {
                                    ?>
                                    <tr class="na-tr-select" onclick="window.location.href='billList.php?opd=<?= $row['cus_opd'] ?>'">
                                        <td><?= $count ?></td>
                                        <td><?= $row['cus_name'] ?> <?= $row['cus_sname'] ?></td>
                                        <td><?= $row['cus_opd'] ?></td>
                                        <td><?= $row['cus_tel'] ?></td>
                                        <td><i class="fa fa-edit test"></i></td>
                                    </tr>
                                    <?php
                                    $count++;
                                }
                            ?>
                            </tbody>
                        </table>
                        <div id="notFound"></div>
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
<script src="assets/js/oldlist.js"></script>
<script src="assets/js/narisa-01.js"></script>
</body>
</html>