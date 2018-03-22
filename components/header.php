<header id="header">

    <!-- Mobile Button -->
    <button id="mobileMenuBtn"></button>

    <!-- Logo -->
    <span class="logo pull-left">
        <img src="assets/images/logo_light.png" alt="admin panel" height="35" class="na-logo"/>
    </span>



    <nav>

        <!-- OPTIONS LIST -->
        <ul class="nav pull-right">

            <!-- USER OPTIONS -->
            <li class="dropdown pull-left">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <img class="user-avatar" alt="" src="assets/images/noavatar.jpg" height="34" />
                    <span class="user-name">
									<span class="hidden-xs">
										<?php
                                        if(isset($_SESSION['usr_name'])){
                                            echo $_SESSION['usr_name'];
                                        }else{
                                            header("location: /narisaclinic/login.php");
                                        }
                                        ?>
										  <i class="fa fa-angle-down"></i>
									</span>
								</span>
                </a>
                <ul class="dropdown-menu hold-on-click">
                    <li><!-- logout -->
                        <a href="php/validatePHP/logout.php"><i class="fa fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
            </li>
            <!-- /USER OPTIONS -->

        </ul>
        <!-- /OPTIONS LIST -->

    </nav>

</header>