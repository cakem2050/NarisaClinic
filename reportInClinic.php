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
        <!-- /page title -->
        <div id="content" class="padding-20">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading panel-heading-transparent">
                            <strong>รายงานการโอนที่ ที่ clinic</strong>

                        </div>
                        <div class="panel-body">
                            <form action="php/search_reportInClinic.php" method="post" enctype="multipart/form-data" data-success="Sent! Thank you!" data-toastr-position="top-right">
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
                            <?php

                            ?>
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
                                    <?php
                                        if(isset($_GET['date']) && $_GET['date'] != ""){
                                            include "php/connect.php";
                                            $date = "".$_GET["date"]."%";
                                            $sql = "SELECT * FROM bills WHERE bills_datetime LIKE :datecheck AND bills_status = 'E' AND bills_ptype = 'TC'";
                                            $stmt = $conn->prepare($sql);
                                            $stmt->execute(array(':datecheck'=>$date));
                                            $i = 1;
                                            while($result = $stmt->fetch( PDO::FETCH_ASSOC )){
                                        ?>
                                            <tbody>
                                                <tr>
                                                    <td><?=$i?></td>
                                                    <td><?=$result['cus_opd']?></td>
                                                    <td><?=$result['bills_datetime']?></td>
                                                    <td><?=$result['bills_pay']?></td>
                                                    <td><?=$result['bills_discount']?></td>
                                                    <td><?=$result['bills_ost']?></td>
                                                    <td><?=$result['bills_net']?></td>
                                                </tr>
                                            <?php
                                                $i++;
                                            }
                                            ?>
                                                <tr>
                                                    <td colspan="3"><b class="pull-right">รวม</b></td>
                                                    <?php
                                                        $sql_pay = "SELECT SUM(bills_pay),SUM(bills_discount),SUM(bills_ost),SUM(bills_net) FROM bills WHERE bills_datetime LIKE :datecheck AND bills_status = 'E' AND bills_ptype = 'TC'";
                                                        $pay = $conn->prepare($sql_pay);
                                                        $pay->execute(array(':datecheck'=>$date));
                                                        while($result = $pay->fetch( PDO::FETCH_ASSOC )){
                                                            echo "<td>".$result['SUM(bills_pay)']."</td><td>".$result['SUM(bills_discount)']."</td><td>".$result['SUM(bills_ost)']."</td><td>".$result['SUM(bills_net)']."</td>";
                                                        }
                                                        ?>
                                                </tr>
                                            </tbody>
                                    <?php
                                        }
                                    ?>
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