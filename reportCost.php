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
        <header id="page-header">
            <h1>CounterNarisa</h1>
            <ol class="breadcrumb">
                <li><a href="#">Tables</a></li>
                <li class="active">Bootstrap Tables</li>
            </ol>
        </header>
        <!-- /page title -->
        <div id="content" class="padding-20">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading panel-heading-transparent">
                            <strong>รายงานสรุปการเงิน</strong>

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
                                    <tbody>
                                    <tr>
                                        <td width="33%">เงินโอนที่ clinic<span class="pull-right margin-right-20">2000</span> </td>
                                        <td width="33%">เงินสด <span class="pull-right margin-right-20">2000</span></td>
                                        <td>credit</td>
                                    </tr>
                                    <tr>
                                        <td>เงินโอนที่นอก clinic <span class="pull-right margin-right-20">2000</span></td>
                                        <td></td>
                                        <td><span class="margin-left-10">+ SCB</span> <span class="pull-right margin-right-20">2000</span></td>
                                    </tr>
                                    <tr>
                                        <td>เงินโอน Line@ <span class="pull-right margin-right-20">2000</span></td>
                                        <td></td>
                                        <td><span class="margin-left-10">+ KTC</span> <span class="pull-right margin-right-20">2000</span></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td><span class="margin-left-10">+ KBANK</span>  <span class="pull-right margin-right-20">2000</span></td>
                                    </tr>
                                    <tr>
                                        <td>รวม <span class="pull-right margin-right-20">6000</span></td>
                                        <td><span class="pull-right margin-right-20">2000</span></td>
                                        <td><span class="pull-right margin-right-20">6000</span></td>
                                    </tr>

                                    </tbody>
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