<?php
    $site = SiteSettings::find(1);
?>
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/simulor/horizontal/tables-advanced.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Apr 2019 06:07:49 GMT -->
<head>
        <meta charset="utf-8" />
        <title><?=$title?> - <?=$sub_title?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="<?=Config::get('ddefault/description')?>" name="description" />
        <meta content="Coderthemes" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="<?=$this->domain()?>/<?=Config::get('default/logo')?>">

        <!-- third party css -->
        <link href="<?=$assets?>/css/vendor/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="<?=$assets?>/css/vendor/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="<?=$assets?>/css/vendor/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="<?=$assets?>/css/vendor/select.bootstrap4.css" rel="stylesheet" type="text/css" />
        <!-- third party css end -->

        <!-- App css -->
        <link href="<?=$assets?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=$assets?>/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=$assets?>/css/app.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" type="text/css">

    </head>

    <?php
        $admin = Admin::find(1);
    ?>
    <body>

        <!-- Navigation Bar-->
        <header id="topnav">
            <nav class="navbar-custom">

                <div class="container-fluid">
                    <ul class="list-unstyled topbar-right-menu float-right mb-0">

                        <li class="dropdown notification-list">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle nav-link">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </li><?=Session::flash('flash')?>

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="<?=$this->domain()?>/<?=$admin->profile_pix?>" alt="user-image" class="rounded-circle">
                                <small class="pro-user-name ml-1">
                                   <?=$admin->name?>
                                </small>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <!-- item-->
                                <a href="<?=$this->domain()?>/admin/profile" class="dropdown-item notify-item">
                                    <i class="fe-user"></i>
                                    <span>My Account</span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <!-- item-->
                                <a href="<?=$this->domain()?>/admin/logout" class="dropdown-item notify-item">
                                    <i class="fe-log-out"></i>
                                    <span>Logout</span>
                                </a>

                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <a href="index.html" class="logo">
                                <span class="logo-lg">
                                    <img src="<?=$this->domain()?>/<?=$site->logo?>" alt="" height="18">
                                </span>
                                <span class="logo-sm">
                                    <img src="<?=$this->domain()?>/<?=$site->logo?>" alt="" height="28">
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>

            </nav>
            <!-- end topbar-main -->

            <div class="topbar-menu">
                <div class="container-fluid">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">

                            <li class="has-submenu">
                                <a href="<?=$this->domain()?>/admin/dashboard">
                                    <i class="fe-airplay"></i>Dashboard</a>
                            </li>

                            <li class="has-submenu">
                                <a href="<?=$this->domain()?>/admin/students">
                                    <i class="fe-users"></i>Students</a>
                            </li>

                            <li class="has-submenu">
                                <a href="#"> <i class="fe-layers"></i>Structure</a>
                                <ul class="submenu">
                                    <li>
                                        <a href="<?=$this->domain()?>/admin/levels">Levels</a>
                                    </li>
                                    <li>
                                        <a href="<?=$this->domain()?>/admin/subjects">Subjects</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="<?=$this->domain()?>/admin/questions"> <i class="fe-grid"></i>Questions</a>
                            </li>

                            <li class="has-submenu">
                                <a href="<?=$this->domain()?>/admin/home-page"> <i class="fe-cpu"></i>Home Page</a>
                            </li>

                            <li class="has-submenu">
                                <a href="<?=$this->domain()?>/admin/blog"> <i class="fe-package"></i>Blog</a>
                            </li>

                            <li class="has-submenu">
                                <a href="<?=$this->domain()?>/admin/timer"> <i class="dripicons-hourglass"></i>Timer</a>
                            </li>

                        </ul>
                        <!-- End navigation menu -->

                        <div class="clearfix"></div>
                    </div>
                    <!-- end #navigation -->
                </div>
                <!-- end container -->
            </div>
            <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->