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
            <h1>Bootstrap Tables</h1>
            <ol class="breadcrumb">
                <li><a href="#">Tables</a></li>
                <li class="active">Bootstrap Tables</li>
            </ol>
        </header>
        <!-- /page title -->
        <div id="content" class="padding-20">
            <div id="panel-1" class="panel panel-default">
                <div class="panel-heading">
							<span class="title elipsis">
								<strong>CLEAN TABLE</strong> <!-- panel title -->
							</span>

                    <!-- right options -->
                    <ul class="options pull-right list-inline">
                        <li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse" data-placement="bottom"></a></li>
                        <li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
                        <li><a href="#" class="opt panel_close" data-confirm-title="Confirm" data-confirm-message="Are you sure you want to remove this panel?" data-toggle="tooltip" title="Close" data-placement="bottom"><i class="fa fa-times"></i></a></li>
                    </ul>
                    <!-- /right options -->

                </div>

                <!-- panel content -->
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class="table table-bordered table-vertical-middle nomargin">
                            <thead>
                            <tr>
                                <th class="width-30">Img</th>
                                <th>Column name</th>
                                <th>Ratings</th>
                                <th>Progress</th>
                                <th>Share</th>
                                <th>Column name</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-center"><img src="assets/images/male.png" alt="" width="20"></td>
                                <td>Value 1</td>
                                <td><div class="rating rating-0 size-13 width-100"><!-- rating-0 ... rating-5 --></div></td>
                                <td>
                                    <div class="progress progress-xxs margin-bottom-0">
                                        <div class="progress-bar progress-bar-default" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%; min-width: 2em;">
                                            <span class="sr-only">80% Complete</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <ul class="list-inline nomargin size-12">
                                        <li><a href="#" class="icon-facebook margin-top-6" data-toggle="tooltip" data-placement="top" title="Facebook"></a></li>
                                        <li><a href="#" class="icon-twitter margin-top-6" data-toggle="tooltip" data-placement="top" title="Twitter"></a></li>
                                        <li><a href="#" class="icon-gplus margin-top-6" data-toggle="tooltip" data-placement="top" title="Google Plus"></a></li>
                                        <li><a href="#" class="icon-linkedin margin-top-6" data-toggle="tooltip" data-placement="top" title="Linkedin"></a></li>
                                        <li><a href="#" class="icon-pinterest margin-top-6" data-toggle="tooltip" data-placement="top" title="Pinterest"></a></li>
                                    </ul>
                                </td>
                                <td><span class="label label-success">Approved </span></td>
                            </tr>
                            <tr>
                                <td class="text-center"><img src="assets/images/female.png" alt="" width="20"></td>
                                <td>Value 2</td>
                                <td><div class="rating rating-1 size-13 width-100"><!-- rating-0 ... rating-5 --></div></td>
                                <td>
                                    <div class="progress progress-xxs margin-bottom-0">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%; min-width: 2em;">
                                            <span class="sr-only">80% Complete</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <ul class="list-inline nomargin size-12">
                                        <li><a href="#" class="icon-facebook margin-top-6" data-toggle="tooltip" data-placement="top" title="Facebook"></a></li>
                                        <li><a href="#" class="icon-twitter margin-top-6" data-toggle="tooltip" data-placement="top" title="Twitter"></a></li>
                                        <li><a href="#" class="icon-gplus margin-top-6" data-toggle="tooltip" data-placement="top" title="Google Plus"></a></li>
                                        <li><a href="#" class="icon-linkedin margin-top-6" data-toggle="tooltip" data-placement="top" title="Linkedin"></a></li>
                                        <li><a href="#" class="icon-pinterest margin-top-6" data-toggle="tooltip" data-placement="top" title="Pinterest"></a></li>
                                    </ul>
                                </td>
                                <td><span class="label label-info">Pending </span></td>
                            </tr>
                            <tr>
                                <td class="text-center"><img src="assets/images/female.png" alt="" width="20"></td>
                                <td>Value 3</td>
                                <td><div class="rating rating-2 size-13 width-100"><!-- rating-0 ... rating-5 --></div></td>
                                <td>
                                    <div class="progress progress-xxs margin-bottom-0">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%; min-width: 2em;">
                                            <span class="sr-only">80% Complete</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <ul class="list-inline nomargin size-12">
                                        <li><a href="#" class="icon-facebook margin-top-6" data-toggle="tooltip" data-placement="top" title="Facebook"></a></li>
                                        <li><a href="#" class="icon-twitter margin-top-6" data-toggle="tooltip" data-placement="top" title="Twitter"></a></li>
                                        <li><a href="#" class="icon-gplus margin-top-6" data-toggle="tooltip" data-placement="top" title="Google Plus"></a></li>
                                        <li><a href="#" class="icon-linkedin margin-top-6" data-toggle="tooltip" data-placement="top" title="Linkedin"></a></li>
                                        <li><a href="#" class="icon-pinterest margin-top-6" data-toggle="tooltip" data-placement="top" title="Pinterest"></a></li>
                                    </ul>
                                </td>
                                <td><span class="label label-warning">Suspended </span></td>
                            </tr>
                            <tr>
                                <td class="text-center"><img src="assets/images/male.png" alt="" width="20"></td>
                                <td>Value 4</td>
                                <td><div class="rating rating-3 size-13 width-100"><!-- rating-0 ... rating-5 --></div></td>
                                <td>
                                    <div class="progress progress-xxs margin-bottom-0">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%; min-width: 2em;">
                                            <span class="sr-only">80% Complete</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <ul class="list-inline nomargin size-12">
                                        <li><a href="#" class="icon-facebook margin-top-6" data-toggle="tooltip" data-placement="top" title="Facebook"></a></li>
                                        <li><a href="#" class="icon-twitter margin-top-6" data-toggle="tooltip" data-placement="top" title="Twitter"></a></li>
                                        <li><a href="#" class="icon-gplus margin-top-6" data-toggle="tooltip" data-placement="top" title="Google Plus"></a></li>
                                        <li><a href="#" class="icon-linkedin margin-top-6" data-toggle="tooltip" data-placement="top" title="Linkedin"></a></li>
                                        <li><a href="#" class="icon-pinterest margin-top-6" data-toggle="tooltip" data-placement="top" title="Pinterest"></a></li>
                                    </ul>
                                </td>
                                <td><span class="label label-danger">Blocked </span></td>
                            </tr>
                            <tr>
                                <td class="text-center"><img src="assets/images/male.png" alt="" width="20"></td>
                                <td>Value 5</td>
                                <td><div class="rating rating-4 size-13 width-100"><!-- rating-0 ... rating-5 --></div></td>
                                <td>
                                    <div class="progress progress-xxs margin-bottom-0">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%; min-width: 2em;">
                                            <span class="sr-only">80% Complete</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <ul class="list-inline nomargin size-12">
                                        <li><a href="#" class="icon-facebook margin-top-6" data-toggle="tooltip" data-placement="top" title="Facebook"></a></li>
                                        <li><a href="#" class="icon-twitter margin-top-6" data-toggle="tooltip" data-placement="top" title="Twitter"></a></li>
                                        <li><a href="#" class="icon-gplus margin-top-6" data-toggle="tooltip" data-placement="top" title="Google Plus"></a></li>
                                        <li><a href="#" class="icon-linkedin margin-top-6" data-toggle="tooltip" data-placement="top" title="Linkedin"></a></li>
                                        <li><a href="#" class="icon-pinterest margin-top-6" data-toggle="tooltip" data-placement="top" title="Pinterest"></a></li>
                                    </ul>
                                </td>
                                <td><span class="label label-primary">N/A </span></td>
                            </tr>
                            <tr>
                                <td class="text-center"><img src="assets/images/female.png" alt="" width="20"></td>
                                <td>Value 6</td>
                                <td><div class="rating rating-5 size-13 width-100"><!-- rating-0 ... rating-5 --></div></td>
                                <td>
                                    <div class="progress progress-xxs margin-bottom-0">
                                        <div class="progress-bar progress-bar-default" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%; min-width: 2em;">
                                            <span class="sr-only">80% Complete</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <ul class="list-inline nomargin size-12">
                                        <li><a href="#" class="icon-facebook margin-top-6" data-toggle="tooltip" data-placement="top" title="Facebook"></a></li>
                                        <li><a href="#" class="icon-twitter margin-top-6" data-toggle="tooltip" data-placement="top" title="Twitter"></a></li>
                                        <li><a href="#" class="icon-gplus margin-top-6" data-toggle="tooltip" data-placement="top" title="Google Plus"></a></li>
                                        <li><a href="#" class="icon-linkedin margin-top-6" data-toggle="tooltip" data-placement="top" title="Linkedin"></a></li>
                                        <li><a href="#" class="icon-pinterest margin-top-6" data-toggle="tooltip" data-placement="top" title="Pinterest"></a></li>
                                    </ul>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-default btn-xs"><i class="fa fa-edit white"></i> Edit </a>
                                    <a href="#" class="btn btn-default btn-xs"><i class="fa fa-times white"></i> Delete </a>
                                </td>
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