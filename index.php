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

    <!--
        ASIDE
        Keep it outside of #wrapper (responsive purpose)
    -->
    <aside id="aside">
        <!--
            Always open:
            <li class="active alays-open">

            LABELS:
                <span class="label label-danger pull-right">1</span>
                <span class="label label-default pull-right">1</span>
                <span class="label label-warning pull-right">1</span>
                <span class="label label-success pull-right">1</span>
                <span class="label label-info pull-right">1</span>
        -->
        <nav id="sideNav"><!-- MAIN MENU -->
            <ul class="nav nav-list">
                <li><!-- dashboard -->
                    <a class="dashboard" href="index.html"><!-- warning - url used by default by ajax (if eneabled) -->
                        <i class="main-icon fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-menu-arrow pull-right"></i>
                        <i class="main-icon fa fa-bar-chart-o"></i> <span>Graphs</span>
                    </a>
                    <ul><!-- submenus -->
                        <li><a href="graphs-flot.html">Flot Charts</a></li>
                        <li><a href="graphs-morris.html">Morris Charts</a></li>
                        <li><a href="graphs-inline.html">Inline Charts</a></li>
                        <li><a href="graphs-chartjs.html">Chart.js</a></li>
                    </ul>
                </li>
                <li class="active">
                    <a href="#">
                        <i class="fa fa-menu-arrow pull-right"></i>
                        <i class="main-icon fa fa-table"></i> <span>Tables</span>
                    </a>
                    <ul><!-- submenus -->
                        <li class="active"><a href="tables-bootstrap.html">Bootstrap Tables</a></li>
                        <li><a href="tables-jqgrid.html">jQuery Grid</a></li>
                        <li><a href="tables-footable.html">jQuery Footable</a></li>
                        <li>
                            <a href="#">
                                <i class="fa fa-menu-arrow pull-right"></i>
                                Datatables
                            </a>
                            <ul>
                                <li><a href="tables-datatable-managed.html">Managed Datatables</a></li>
                                <li><a href="tables-datatable-editable.html">Editable Datatables</a></li>
                                <li><a href="tables-datatable-advanced.html">Advanced Datatables</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-menu-arrow pull-right"></i>
                        <i class="main-icon fa fa-pencil-square-o"></i> <span>Forms</span>
                    </a>
                    <ul><!-- submenus -->
                        <li><a href="form-elements.html">Smarty Elements</a></li>
                        <li><a href="form-masked-inputs.html">Masked Inputs</a></li>
                        <li><a href="form-pickers.html">Pickers</a></li>
                        <li><a href="form-ui-sliders.html">UI Sliders</a></li>
                        <li><a href="form-validation.html">Validation Form</a></li>
                        <li><a href="form-html-editors.html">Html Editors</a></li>
                        <li><a href="form-autosuggest.html">Autosuggest</a></li>
                        <li><a href="form-x-editable.html">Form X-Editable</a></li>
                        <li><a href="form-dropzone.html">Dropzone File Upload</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-menu-arrow pull-right"></i>
                        <i class="main-icon fa fa-gears"></i> <span>UI Features</span>
                    </a>
                    <ul><!-- submenus -->
                        <li><a href="ui-portlets.html">Portlets</a></li>
                        <li><a href="ui-buttons.html">Buttons</a></li>
                        <li>
                            <a href="#">
                                <i class="fa fa-menu-arrow pull-right"></i>
                                Icons
                            </a>
                            <ul>
                                <li><a href="ui-icons-fontawsome.html">Fontawsome</a></li>
                                <li><a href="ui-icons-etline.html">Et-Line Icons</a></li>
                                <li><a href="ui-icons-glyphicons.html">Glyph Icons</a></li>
                                <li><a href="ui-icons-flags.html">Flags</a></li>
                            </ul>
                        </li>
                        <li><a href="ui-alerts-dialogs.html">Alerts &amp; Dialogs</a></li>
                        <li><a href="ui-tabs-acordion-navs.html">Tabs, Acordion &amp; Navs</a></li>
                        <li><a href="ui-knob.html">Knob Circles</a></li>
                        <li><a href="ui-nestable.html">Nestable List</a></li>
                        <li><a href="ui-toastr.html">Toastr Notifications</a></li>
                        <li><a href="ui-modals.html">Modals</a></li>
                        <li><a href="ui-grid.html">Grid</a></li>
                        <li><a href="ui-google-maps.html">Google Maps</a></li>
                        <li><a href="ui-vector-maps.html">Vector Maps</a></li>
                        <li><a href="ui-essentials.html">Essentials</a></li>
                        <li>
                            <a href="#">
                                <i class="fa fa-menu-arrow pull-right"></i>
                                <i class="fa fa-folder-open"></i>
                                Deep Navigation
                            </a>
                            <!-- 3rd Level -->
                            <ul>
                                <li>
                                    <a href="#">
                                        3rd Level
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-menu-arrow pull-right"></i>
                                        <i class="fa fa-folder-open"></i>
                                        4rd Level
                                    </a>
                                    <!-- 4th Level -->
                                    <ul>
                                        <li>
                                            <a href="#">
                                                4th Level
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-menu-arrow pull-right"></i>
                                                <i class="fa fa-folder-open"></i>
                                                5th Level
                                            </a>
                                            <!-- 5th Level -->
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        5th level
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-menu-arrow pull-right"></i>
                                                        <i class="fa fa-folder-open"></i>
                                                        6th level
                                                    </a>
                                                    <!-- 6th Level -->
                                                    <ul>
                                                        <li>
                                                            <a href="#">
                                                                6th level
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                6th level
                                                            </a>
                                                        </li>
                                                    </ul><!-- /6th Level -->
                                                </li>
                                            </ul><!-- /5th Level -->
                                        </li>
                                    </ul><!-- /4th Level -->
                                </li>
                            </ul><!-- /3rd Level -->
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-menu-arrow pull-right"></i>
                        <i class="main-icon fa fa-book"></i> <span>Pages</span>
                    </a>
                    <ul><!-- submenus -->
                        <li><a href="page-invoice.html">Invoice</a></li>
                        <li><a href="page-login.html">Login</a></li>
                        <li><a href="page-register.html">Register</a></li>
                        <li><a href="page-lock.html">Lock Screen</a></li>
                        <li><a href="page-forum.html">Forum</a></li>
                        <li><a href="page-404.html">Error 404</a></li>
                        <li><a href="page-500.html">Error 500</a></li>
                        <li><a href="page-pricing.html">Pricing Table</a></li>
                        <li><a href="page-search.html">Search Result</a></li>
                        <li><a href="page-sidebar.html">Sidebar Page</a></li>
                        <li><a href="page-user-profile.html">User Profile</a></li>
                        <li><a href="page-blank-1.html">Blank Page</a></li>
                    </ul>
                </li>
                <li>
                    <a href="calendar.html">
                        <i class="main-icon fa fa-calendar"></i>
                        <span class="label label-warning pull-right">2</span> <span>Calendar</span>
                    </a>
                </li>
            </ul>

            <!-- SECOND MAIN LIST -->
            <h3>MORE</h3>
            <ul class="nav nav-list">
                <li>
                    <a href="calendar.html">
                        <i class="main-icon fa fa-calendar"></i>
                        <span class="label label-warning pull-right">2</span> <span>Calendar</span>
                    </a>
                </li>
                <li>
                    <a href="../../HTML_BS4/start.html">
                        <i class="main-icon fa fa-link"></i>
                        <span class="label label-danger pull-right">PRO</span> <span>Frontend</span>
                    </a>
                </li>
            </ul>

        </nav>

        <span id="asidebg"><!-- aside fixed background --></span>
    </aside>
    <!-- /ASIDE -->


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


    <!--
        MIDDLE
    -->
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

            <!--
                PANEL CLASSES:
                    panel-default
                    panel-danger
                    panel-warning
                    panel-info
                    panel-success

                INFO: 	panel collapse - stored on user localStorage (handled by app.js _panels() function).
                        All pannels should have an unique ID or the panel collapse status will not be stored!
            -->
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

                    <!-- pre code -->
                    <div class="text-left">
                        <a class="btn btn-xs btn-info" href="javascript:;" onclick="jQuery('#pre-0').slideToggle();">Show Code</a>
                    </div>
                    <pre id="pre-0" class="text-left noradius text-danger softhide margin-top-10">
&lt;div class="table-responsive"&gt;
	&lt;table class="table table-bordered nomargin"&gt;
		&lt;thead&gt;
			&lt;tr&gt;
				&lt;th&gt;Column name&lt;/th&gt;
				&lt;th&gt;Column name&lt;/th&gt;
				&lt;th&gt;Column name&lt;/th&gt;
			&lt;/tr&gt;
		&lt;/thead&gt;
		&lt;tbody&gt;
			&lt;tr&gt;
				&lt;td&gt;Value 1&lt;/td&gt;
				&lt;td&gt;Value 2&lt;/td&gt;
				&lt;td&gt;&lt;span class="label label-success"&gt;Approved &lt;/span&gt;&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr&gt;
				&lt;td&gt;Value 1&lt;/td&gt;
				&lt;td&gt;Value 2&lt;/td&gt;
				&lt;td&gt;&lt;span class="label label-info"&gt;Pending &lt;/span&gt;&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr&gt;
				&lt;td&gt;Value 1&lt;/td&gt;
				&lt;td&gt;Value 2&lt;/td&gt;
				&lt;td&gt;&lt;span class="label label-warning"&gt;Suspended &lt;/span&gt;&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr&gt;
				&lt;td&gt;Value 1&lt;/td&gt;
				&lt;td&gt;Value 2&lt;/td&gt;
				&lt;td&gt;&lt;span class="label label-danger"&gt;Blocked &lt;/span&gt;&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr&gt;
				&lt;td&gt;Value 1&lt;/td&gt;
				&lt;td&gt;Value 2&lt;/td&gt;
				&lt;td&gt;&lt;span class="label label-primary"&gt;N/A &lt;/span&gt;&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr&gt;
				&lt;td&gt;Value 1&lt;/td&gt;
				&lt;td&gt;Value 2&lt;/td&gt;
				&lt;td&gt;
					&lt;a href="#" class="btn btn-default btn-xs"&gt;&lt;i class="fa fa-edit white"&gt;&lt;/i&gt; Edit &lt;/a&gt;
					&lt;a href="#" class="btn btn-default btn-xs"&gt;&lt;i class="fa fa-times white"&gt;&lt;/i&gt; Delete &lt;/a&gt;
				&lt;/td&gt;
			&lt;/tr&gt;
		&lt;/tbody&gt;
	&lt;/table&gt;
&lt;/div&gt;
</pre>
                    <!-- /pre code -->

                </div>
                <!-- /panel footer -->

            </div>
            <!-- /PANEL -->

            <!--
                PANEL CLASSES:
                    panel-default
                    panel-danger
                    panel-warning
                    panel-info
                    panel-success

                INFO: 	panel collapse - stored on user localStorage (handled by app.js _panels() function).
                        All pannels should have an unique ID or the panel collapse status will not be stored!
            -->
            <div id="panel-2" class="panel panel-default">
                <div class="panel-heading">
							<span class="title elipsis">
								<strong>HOVER TABLE</strong> <!-- panel title -->
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
                        <table class="table table-hover table-vertical-middle nomargin">
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

                    <!-- pre code -->
                    <div class="text-left">
                        <a class="btn btn-xs btn-info" href="javascript:;" onclick="jQuery('#pre-1').slideToggle();">Show Code</a>
                    </div>
                    <pre id="pre-1" class="text-left noradius text-danger softhide margin-top-10">
&lt;div class="table-responsive"&gt;
	&lt;table class="table table-hover nomargin"&gt;
		&lt;thead&gt;
			&lt;tr&gt;
				&lt;th&gt;Column name&lt;/th&gt;
				&lt;th&gt;Column name&lt;/th&gt;
				&lt;th&gt;Column name&lt;/th&gt;
			&lt;/tr&gt;
		&lt;/thead&gt;
		&lt;tbody&gt;
			&lt;tr&gt;
				&lt;td&gt;Value 1&lt;/td&gt;
				&lt;td&gt;Value 2&lt;/td&gt;
				&lt;td&gt;Value 3&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr&gt;
				&lt;td&gt;Value 1&lt;/td&gt;
				&lt;td&gt;Value 2&lt;/td&gt;
				&lt;td&gt;Value 3&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr&gt;
				&lt;td&gt;Value 1&lt;/td&gt;
				&lt;td&gt;Value 2&lt;/td&gt;
				&lt;td&gt;Value 3&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr&gt;
				&lt;td&gt;Value 1&lt;/td&gt;
				&lt;td&gt;Value 2&lt;/td&gt;
				&lt;td&gt;Value 3&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr&gt;
				&lt;td&gt;Value 1&lt;/td&gt;
				&lt;td&gt;Value 2&lt;/td&gt;
				&lt;td&gt;Value 3&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr&gt;
				&lt;td&gt;Value 1&lt;/td&gt;
				&lt;td&gt;Value 2&lt;/td&gt;
				&lt;td&gt;Value 3&lt;/td&gt;
			&lt;/tr&gt;
		&lt;/tbody&gt;
	&lt;/table&gt;
&lt;/div&gt;
</pre>
                    <!-- /pre code -->

                </div>
                <!-- /panel footer -->

            </div>
            <!-- /PANEL -->

            <!--
                PANEL CLASSES:
                    panel-default
                    panel-danger
                    panel-warning
                    panel-info
                    panel-success

                INFO: 	panel collapse - stored on user localStorage (handled by app.js _panels() function).
                        All pannels should have an unique ID or the panel collapse status will not be stored!
            -->
            <div id="panel-3" class="panel panel-default">
                <div class="panel-heading">
							<span class="title elipsis">
								<strong>STRIPPED TABLE</strong> <!-- panel title -->
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

                    <div class="table-responsive nomargin">
                        <table class="table table-bordered table-striped table-vertical-middle">
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

                    <!-- pre code -->
                    <div class="text-left">
                        <a class="btn btn-xs btn-info" href="javascript:;" onclick="jQuery('#pre-2').slideToggle();">Show Code</a>
                    </div>
                    <pre id="pre-2" class="text-left noradius text-danger softhide">
&lt;div class="table-responsive nomargin"&gt;
	&lt;table class="table table-bordered table-striped"&gt;
		&lt;thead&gt;
			&lt;tr&gt;
				&lt;th&gt;&lt;i class="fa fa-building pull-right hidden-xs"&gt;&lt;/i&gt; Column name&lt;/th&gt;
				&lt;th&gt;&lt;i class="fa fa-calendar pull-right hidden-xs"&gt;&lt;/i&gt; Column name&lt;/th&gt;
				&lt;th&gt;&lt;i class="glyphicon glyphicon-send pull-right hidden-xs"&gt;&lt;/i&gt; Column name&lt;/th&gt;
			&lt;/tr&gt;
		&lt;/thead&gt;
		&lt;tbody&gt;
			&lt;tr&gt;
				&lt;td&gt;Value 1&lt;/td&gt;
				&lt;td&gt;Value 2&lt;/td&gt;
				&lt;td&gt;Value 3&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr&gt;
				&lt;td&gt;Value 1&lt;/td&gt;
				&lt;td&gt;Value 2&lt;/td&gt;
				&lt;td&gt;Value 3&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr&gt;
				&lt;td&gt;Value 1&lt;/td&gt;
				&lt;td&gt;Value 2&lt;/td&gt;
				&lt;td&gt;Value 3&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr&gt;
				&lt;td&gt;Value 1&lt;/td&gt;
				&lt;td&gt;Value 2&lt;/td&gt;
				&lt;td&gt;Value 3&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr&gt;
				&lt;td&gt;Value 1&lt;/td&gt;
				&lt;td&gt;Value 2&lt;/td&gt;
				&lt;td&gt;Value 3&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr&gt;
				&lt;td&gt;Value 1&lt;/td&gt;
				&lt;td&gt;Value 2&lt;/td&gt;
				&lt;td&gt;Value 3&lt;/td&gt;
			&lt;/tr&gt;
		&lt;/tbody&gt;
	&lt;/table&gt;
&lt;/div&gt;
</pre>
                    <!-- /pre code -->

                </div>
                <!-- /panel footer -->

            </div>
            <!-- /PANEL -->

            <!--
                PANEL CLASSES:
                    panel-default
                    panel-danger
                    panel-warning
                    panel-info
                    panel-success

                INFO: 	panel collapse - stored on user localStorage (handled by app.js _panels() function).
                        All pannels should have an unique ID or the panel collapse status will not be stored!
            -->
            <div id="panel-4" class="panel panel-default">
                <div class="panel-heading">
							<span class="title elipsis">
								<strong>COLOR TABLE</strong> <!-- panel title -->
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
                        <table class="table table-vertical-middle nomargin">
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
                            <tr class="success">
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
                            <tr class="warning">
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
                            <tr class="danger">
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
                            <tr class="info">
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
                            <tr class="active">
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

                    <!-- pre code -->
                    <div class="text-left">
                        <a class="btn btn-xs btn-info" href="javascript:;" onclick="jQuery('#pre-3').slideToggle();">Show Code</a>
                    </div>
                    <pre id="pre-3" class="text-left noradius text-danger softhide">
&lt;div class="table-responsive"&gt;
	&lt;table class="table nomargin"&gt;
		&lt;thead&gt;
			&lt;tr&gt;
				&lt;th&gt;&lt;i class="fa fa-building"&gt;&lt;/i&gt; Column name&lt;/th&gt;
				&lt;th&gt;&lt;i class="fa fa-calendar"&gt;&lt;/i&gt; Column name&lt;/th&gt;
				&lt;th&gt;&lt;i class="glyphicon glyphicon-send"&gt;&lt;/i&gt; Column name&lt;/th&gt;
			&lt;/tr&gt;
		&lt;/thead&gt;
		&lt;tbody&gt;
			&lt;tr class="success"&gt;
				&lt;td&gt;Value 1&lt;/td&gt;
				&lt;td&gt;Value 2&lt;/td&gt;
				&lt;td&gt;Value 3&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr class="warning"&gt;
				&lt;td&gt;Value 1&lt;/td&gt;
				&lt;td&gt;Value 2&lt;/td&gt;
				&lt;td&gt;Value 3&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr class="danger"&gt;
				&lt;td&gt;Value 1&lt;/td&gt;
				&lt;td&gt;Value 2&lt;/td&gt;
				&lt;td&gt;Value 3&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr class="info"&gt;
				&lt;td&gt;Value 1&lt;/td&gt;
				&lt;td&gt;Value 2&lt;/td&gt;
				&lt;td&gt;Value 3&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr class="active"&gt;
				&lt;td&gt;Value 1&lt;/td&gt;
				&lt;td&gt;Value 2&lt;/td&gt;
				&lt;td&gt;Value 3&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr&gt;
				&lt;td&gt;Value 1&lt;/td&gt;
				&lt;td&gt;Value 2&lt;/td&gt;
				&lt;td&gt;Value 3&lt;/td&gt;
			&lt;/tr&gt;
		&lt;/tbody&gt;
	&lt;/table&gt;
&lt;/div&gt;
</pre>
                    <!-- /pre code -->

                </div>
                <!-- /panel footer -->

            </div>
            <!-- /PANEL -->

            <!--
                PANEL CLASSES:
                    panel-default
                    panel-danger
                    panel-warning
                    panel-info
                    panel-success

                INFO: 	panel collapse - stored on user localStorage (handled by app.js _panels() function).
                        All pannels should have an unique ID or the panel collapse status will not be stored!
            -->
            <div id="panel-5" class="panel panel-default">
                <div class="panel-heading">
							<span class="title elipsis">
								<strong>CONDENSED TABLE</strong> <!-- panel title -->
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
                        <table class="table table-condensed table-vertical-middle nomargin">
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

                    <!-- pre code -->
                    <div class="text-left">
                        <a class="btn btn-xs btn-info" href="javascript:;" onclick="jQuery('#pre-4').slideToggle();">Show Code</a>
                    </div>
                    <pre id="pre-4" class="text-left noradius text-danger softhide">
&lt;div class="table-responsive"&gt;
	&lt;table class="table table-condensed nomargin"&gt;
		&lt;thead&gt;
			&lt;tr&gt;
				&lt;th&gt;Column name&lt;/th&gt;
				&lt;th&gt;Column name&lt;/th&gt;
				&lt;th&gt;Column name&lt;/th&gt;
			&lt;/tr&gt;
		&lt;/thead&gt;
		&lt;tbody&gt;
			&lt;tr&gt;
				&lt;td&gt;Value 1&lt;/td&gt;
				&lt;td&gt;Value 2&lt;/td&gt;
				&lt;td&gt;Value 3&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr&gt;
				&lt;td&gt;Value 1&lt;/td&gt;
				&lt;td&gt;Value 2&lt;/td&gt;
				&lt;td&gt;Value 3&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr&gt;
				&lt;td&gt;Value 1&lt;/td&gt;
				&lt;td&gt;Value 2&lt;/td&gt;
				&lt;td&gt;Value 3&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr&gt;
				&lt;td&gt;Value 1&lt;/td&gt;
				&lt;td&gt;Value 2&lt;/td&gt;
				&lt;td&gt;Value 3&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr&gt;
				&lt;td&gt;Value 1&lt;/td&gt;
				&lt;td&gt;Value 2&lt;/td&gt;
				&lt;td&gt;Value 3&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr&gt;
				&lt;td&gt;Value 1&lt;/td&gt;
				&lt;td&gt;Value 2&lt;/td&gt;
				&lt;td&gt;Value 3&lt;/td&gt;
			&lt;/tr&gt;
		&lt;/tbody&gt;
	&lt;/table&gt;
&lt;/div&gt;
</pre>
                    <!-- /pre code -->

                </div>
                <!-- /panel footer -->

            </div>
            <!-- /PANEL -->

        </div>
    </section>
    <!-- /MIDDLE -->

</div>



<?php include "components/template_js.php"; ?>
</body>
</html>