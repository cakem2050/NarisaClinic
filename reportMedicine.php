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
                            <strong>รายงานสรุปการขายยา ประจำวัน</strong>

                        </div>
                        <div class="panel-body">
                            <form class="" action="reportMedicine.php" method="get" enctype="multipart/form-data" data-success="Sent! Thank you!" data-toastr-position="top-right">
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
                                        <th width="5%">ลำดับ</th>
                                        <th width="20%">รหัส barcode</th>
                                        <th>ชื่อยา</th>
                                        <th width="10%">จำนวน</th>
                                    </tr>
                                    </thead>
                                    <?php
                                        $result_row = 1;
                                    if(isset($_GET['date']) && $_GET['date'] != ""){
                                        include "php/connect.php";
                                        include "php/func.php";
                                        $op = new func();
                                        $date = "".$_GET["date"]."%";
                                        $sql_pro = "SELECT * FROM product WHERE pro_status ='E'";
                                        $stmt_pro = $conn->prepare($sql_pro);
                                        $stmt_pro->execute(array(':datecheck'=>$date));
                                        $i = 1;
                                        while($result = $stmt_pro->fetch( PDO::FETCH_ASSOC )){
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?=$i?></td>
                                            <td><?=$result['pro_id']?></td>
                                            <td><?=$result['pro_name']?></td>
                                            <?php
                                                $sql_prc = "SELECT SUM(bild_value) FROM billsdetail WHERE bild_timestamp LIKE :datecheck AND bild_status = 'E' AND pro_id = :pro_id";
                                                $stmt_prc = $conn->prepare($sql_prc);
                                                $stmt_prc->execute(array(':datecheck'=>$date,'pro_id'=>$result['pro_id']));
                                                while($result_prc = $stmt_prc->fetch( PDO::FETCH_ASSOC )){
                                                    echo "<td>".$result_prc['SUM(bild_value)']."</td>";
                                                }
                                            ?>
                                        </tr>
                                        <?php
                                            $result_row++;
                                            $i++;
                                            }
                                        ?>
                                    </tbody>
                                    <?php
                                        }
                                    ?>
                                </table>

                            </div>
                            <div class="row">
                                <div class="col-md-2 col-sm-2 pull-right margin-top-20">
                                    <?php
                                    if(isset($_GET['date']) && $_GET['date'] != "" && $result_row != 1) {
                                        ?>
                                        <a href="php/pdf/medicine.php?date=<?=$_GET['date']?>" class="btn btn-3d btn-teal btn-ms btn-block" id="print">
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