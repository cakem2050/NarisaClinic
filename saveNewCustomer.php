<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Narisa Clinic</title>
    <?php include "components/template_css.php"; ?>
    <link href="//<?= $_SERVER['SERVER_NAME']?>/narisaclinic/assets/css/narisa-02.css" rel="stylesheet" type="text/css" />
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
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading panel-heading-transparent">
                            <strong>คนไข้ใหม่</strong>
                        </div>
                        <div class="panel-body">
                            <form class="" action="../narisaclinic/php/insertCustomer.php" method="post">
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-3">
                                            <input type="text" placeholder="เลข OPD" name="opd" id="opd" value="" class="form-control required">
                                            <div id="opdc" style="color: #bf6464;display: none;">รหัส opd นี้ถูกใช้งานแล้ว !</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-3">
                                            <input type="text" placeholder="ชื่อคนไข้" id="name" name="name" value="" class="form-control required">
                                        </div>
                                        <div class="col-md-3 col-sm-3">
                                            <input type="text" placeholder="นามสกุล" id="sname" name="sname" value="" class="form-control required">
                                        </div>
                                        <div class="col-md-3 col-sm-3">
                                            <input type="text" placeholder="เบอร์โทร" id="tel" name="tel" value="" class="form-control required">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <textarea name="add" id="add" placeholder="ที่อยู่" rows="4" class="form-control required"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <textarea name="detail" id="detail" placeholder="รายละเอียดอื่นๆ" rows="4" class="form-control required"></textarea>
                                        </div>
                                    </div>
                                </fieldset>

                                <div class="row">
                                    <div class="col-md-5 col-sm-5">
                                    </div>
                                    <div class="col-md-2 col-sm-2">
                                        <button type="submit" id="saveCustomer" class="btn btn-3d btn-teal btn-ms btn-block margin-top-30" >
                                            บันทึก
                                        </button>
                                    </div>
                                    <div class="col-md-5 col-sm-5">
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /MIDDLE -->

</div>
<?php include "components/template_js.php"; ?>
<script type="text/javascript" src="assets/js/narisa-01.js"></script>
</body>
</html>