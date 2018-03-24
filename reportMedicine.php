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
                            <form class="validate" action="php/contact.php" method="post" enctype="multipart/form-data" data-success="Sent! Thank you!" data-toastr-position="top-right">
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-3">
                                            <input type="text" placeholder="วันที่ค้นหา" name="contact[opd]" value="" class="form-control required">
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
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>9859843584385094385</td>
                                            <td>พารา</td>
                                            <td>500</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>9859843584385094385</td>
                                            <td>พารา</td>
                                            <td>500</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>9859843584385094385</td>
                                            <td>พารา</td>
                                            <td>500</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>9859843584385094385</td>
                                            <td>พารา</td>
                                            <td>500</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>9859843584385094385</td>
                                            <td>พารา</td>
                                            <td>500</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="row margin-top-20">
                                <div class="col-md-5 col-sm-5">
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <button type="submit" class="btn btn-3d btn-teal btn-ms btn-block">
                                        <i class="fa fa-download"></i>PRINT
                                    </button>
                                </div>
                                <div class="col-md-5 col-sm-5">
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