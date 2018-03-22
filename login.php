<?php
/**
 * Created by PhpStorm.
 * User: alexr
 * Date: 19/3/2561
 * Time: 17:32
 */
?>
<?php
    session_start();
    if(isset($_SESSION['usr_level'])){
        if($_SESSION['usr_level'] == "C" || $_SESSION['usr_level'] == "M") {
            header("location: /narisaclinic/home.php");
        }
    }
?>
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
    </aside>
    <!-- HEADER -->
    <header id="header">
        <!-- Mobile Button -->
        <button id="mobileMenuBtn"></button>
        <!-- Logo -->
        <span class="logo pull-left">
            <img src="assets/images/logo_light.png" alt="admin panel" height="35" />
        </span>
    </header>
    <!-- /HEADER -->
    <section id="middle" style="margin-left: 0px;">
        <!-- page title -->

        <!-- /page title -->
        <div class="panel">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                </div>
                <div class="col-md-4 col-sm-4">
                    <form action="php/validatePHP/login.php" method="post" class="sky-form boxed margin-top-40"  style="background: white;">
                        <header><i class="fa fa-users"></i> เข้าสู้ระบบ</header>
                        <fieldset>

                            <section>
                                <label class="label">ชื่อผู้ใช้งาน</label>
                                <label class="input">
                                    <i class="icon-append fa fa-user"></i>
                                    <input type="text" name="username">
                                    <span class="tooltip tooltip-top-right">Username</span>
                                </label>
                            </section>

                            <section>
                                <label class="label">รหัสผ่าน</label>
                                <label class="input">
                                    <i class="icon-append fa fa-lock"></i>
                                    <input type="password" name="password">
                                    <b class="tooltip tooltip-top-right">Password</b>
                                </label>
                                <?php
                                    if(isset($_GET["error"])){
                                        if(isset($_GET["error"]) == "1"){
                                            echo "<span style='color:#bf6464'>ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง !</span>";
                                        }

                                    }
                                ?>
                            </section>

                        </fieldset>
                        <section>
                            <button type="submit" class="btn btn-primary margin-top-0">เข้าสู้ระบบ</button>
                        </section>
                    </form>
                </div>
                <div class="col-md-4 col-sm-4">
                </div>
            </div>
        </div>
    </section>
    <!-- /MIDDLE -->

</div>
<?php include "components/template_js.php"; ?>
</body>
</html>
