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
        <?php include "components/menu_admin.php" ?>
    </aside>
    <!-- HEADER -->
    <?php include "components/header.php" ?>
    <!-- /HEADER -->
    <section id="middle" style="margin-left: 0px;">
        <!-- page title -->
        <header id="page-header">
            <h1>Counter Narisa</h1>
            <ol class="breadcrumb">
                <li><a href="#">หน้าแรก</a></li>
                <li class="active">ทำรายการ</li>
            </ol>
        </header>

        <div class="row margin-top-20">
            <div class="col-md-3 col-md-offset-3">
                <a href="#" class="btn btn-info btn-lg na-btn-edit">คนไข้เก่า</a>
            </div>
            <div class="col-md-3">
                <a href="#"  class="btn btn-default btn-lg na-btn-edit">คนไข้ใหม่</a>
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
                                <th class="col-md-2">ชื่อคนไข้</th>
                                <th class="col-md-2">วันที่/เวลา</th>
                                <th class="col-md-1">ยอดชำระ</th>
                                <th class="col-md-1">ส่วนลด</th>
                                <th class="col-md-1">ยอดสุทธิ</th>
                                <th class="col-md-1">วิธีชำระ</th>
                                <th class="col-md-1">คงค้าง</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>มานะ พบกิจ</td>
                                <td>12/03/61 17.30</td>
                                <td>700</td>
                                <td>200</td>
                                <td>500</td>
                                <td>โอน clinic</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>สุชาดา นิจทาพัน</td>
                                <td>12/03/61 17.00</td>
                                <td>1000</td>
                                <td>10%</td>
                                <td>900</td>
                                <td>เงินสด+credit</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>ธาดา ชาวิชา</td>
                                <td>12/03/61 16.45</td>
                                <td>1200</td>
                                <td>200</td>
                                <td>900</td>
                                <td>โอน Line@</td>
                                <td>100</td>
                            </tr>
                            </tbody>
                        </table>
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
</body>
</html>