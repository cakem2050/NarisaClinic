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
        <?php include "components/menu_staff.php"?>
    </aside>
    <!-- HEADER -->
    <header id="header">

        <!-- Mobile Button -->
        <button id="mobileMenuBtn"></button>

        <!-- Logo -->
        <span class="logo pull-left">
					<img src="assets/images/logo_light.png" alt="admin panel" height="35" />
				</span>

        <form method="get" action="page-search.html" class="search pull-left hidden-xs">
            <input type="text" class="form-control" name="k" placeholder="Search for something..." />
        </form>

        <nav>

            <!-- OPTIONS LIST -->
            <ul class="nav pull-right">

                <!-- USER OPTIONS -->
                <li class="dropdown pull-left">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <img class="user-avatar" alt="" src="assets/images/noavatar.jpg" height="34" />
                        <span class="user-name">
									<span class="hidden-xs">
										John Doe <i class="fa fa-angle-down"></i>
									</span>
								</span>
                    </a>
                    <ul class="dropdown-menu hold-on-click">
                        <li><!-- my calendar -->
                            <a href="calendar.html"><i class="fa fa-calendar"></i> Calendar</a>
                        </li>
                        <li><!-- my inbox -->
                            <a href="#"><i class="fa fa-envelope"></i> Inbox
                                <span class="pull-right label label-default">0</span>
                            </a>
                        </li>
                        <li><!-- settings -->
                            <a href="page-user-profile.html"><i class="fa fa-cogs"></i> Settings</a>
                        </li>

                        <li class="divider"></li>

                        <li><!-- lockscreen -->
                            <a href="page-lock.html"><i class="fa fa-lock"></i> Lock Screen</a>
                        </li>
                        <li><!-- logout -->
                            <a href="page-login.html"><i class="fa fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
                <!-- /USER OPTIONS -->

            </ul>
            <!-- /OPTIONS LIST -->

        </nav>

    </header>
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