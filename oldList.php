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

        <div id="content" class="padding-20 na-pd-b-0">
            <div id="panel-1" class="panel panel-default">
                <div class="panel-heading">
                    <div class="row padding-10">
                        <form style="width: 100%">
                            <div class="form-group col-md-4">
                                <label>ค้นหาชื่อ</label>
                                <input type="text" class="form-control" placeholder="ชื่อ-นามสกุล">
                            </div>
                            <div class="form-group col-md-4">
                                <label>ค้นหาเลข OPD</label>
                                <input type="text" class="form-control" placeholder="รหัส OPD">
                            </div>
                            <div class="form-group col-md-4">
                                <label>ค้นหาเบอร์โทร</label>
                                <input type="text" class="form-control masked" data-format="9999999999" data-placeholder="X" placeholder="เบอร์โทรศัพท์">
                            </div>
                            <div class="col-md-2 col-md-offset-5">
                                <button type="submit" class="btn btn-info na-btn-wbtn btn-lg">ค้นหา</button>
                            </div>
                        </form>
                    </div>
                </div>

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
                                <th class="col-md-4">ชื่อคนไข้</th>
                                <th class="col-md-3">เลข OPD</th>
                                <th class="col-md-4">เบอร์โทรศัพท์</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr class="na-tr-select" onclick="window.location.href='index.php'">
                                <td>1</td>
                                <td>มานะ พบกิจ</td>
                                <td>12/03/61 17.30</td>
                                <td>700</td>
                            </tr>
                            <tr class="na-tr-select" onclick="window.location.href='index.php'">
                                <td>2</td>
                                <td>สุชาดา นิจทาพัน</td>
                                <td>12/03/61 17.00</td>
                                <td>1000</td>
                            </tr>
                            <tr class="na-tr-select" onclick="window.location.href='index.php'">
                                <td>3</td>
                                <td>ธาดา ชาวิชา</td>
                                <td>12/03/61 16.45</td>
                                <td>1200</td>
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