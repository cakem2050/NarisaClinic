<?php
/**
 * Created by PhpStorm.
 * User: alexr
 * Date: 19/3/2561
 * Time: 17:32
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Narisa Clinic</title>
    <?php include "components/template_css.php"; ?>
</head>
<body>
<!-- WRAPPER -->
<div id="wrapper">
    <aside id="aside">
        <?php include "components/menu_admin.php"?>
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
    <section id="middle">
        <!-- page title -->

        <!-- /page title -->
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                </div>
                <div class="col-md-4 col-sm-4">
                    <form action="php/validatePHP/login.php" method="post" class="sky-form boxed">
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
                                        echo "<span style='color:#bf6464'>".$_GET["error"]."</span>";
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
