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
                            <strong>รายงานการชำระ credit</strong>

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
                                        <th>ลำดับ</th>
                                        <th>ชื่อ นามสกุล</th>
                                        <th>วันที่/เวลา โอน</th>
                                        <th>ยอดชำระ</th>
                                        <th>ส่วนลด</th>
                                        <th>ราคาสุทธิ</th>
                                        <th>ค้างชำระ</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            มาดี มาน่ะ
                                            <p>เงินสด 200</p>
                                        </td>
                                        <td>25/03/2561 14:30
                                            <p class="margin-bottom-0">credit</p>
                                            <p class="nomargin">SCB 200</p>
                                            <p class="nomargin">KBANK 300</p>
                                            <p class="nomargin">KTC 400</p>
                                        </td>
                                        <td>1200</td>
                                        <td>200</td>
                                        <td>1000</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>
                                            มาดี มาน่ะ
                                            <p>เงินสด 200</p>
                                        </td>
                                        <td>25/03/2561 14:30
                                            <p class="margin-bottom-0">credit</p>
                                            <p class="nomargin">SCB 200</p>
                                            <p class="nomargin">KBANK 300</p>
                                            <p class="nomargin">KTC 400</p>
                                        </td>
                                        <td>1200</td>
                                        <td>200</td>
                                        <td>1000</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>
                                            มาดี มาน่ะ
                                            <p>เงินสด 200</p>
                                        </td>
                                        <td>25/03/2561 14:30
                                            <p class="margin-bottom-0">credit</p>
                                            <p class="nomargin">SCB 200</p>
                                            <p class="nomargin">KBANK 300</p>
                                            <p class="nomargin">KTC 400</p>
                                        </td>
                                        <td>1200</td>
                                        <td>200</td>
                                        <td>1000</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td><b>รวม</b></td>
                                        <td colspan="6">
                                            <p class="margin-top-0 margin-bottom-10">เงินสด 200</p>
                                            <div class="margin-left-20">
                                                <p class="nomargin">SCB 200</p>
                                                <p class="nomargin">KBANK 300</p>
                                                <p class="nomargin">KTC 400</p>
                                            </div>
                                        </td>
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