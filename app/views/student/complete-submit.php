<?php 
            $title = Config::get('default/project_title');
            $sub_title = 'Dashboard';
            $subjects = Subject::where('blocked_on', NULL)->get();
            $levels = Level::where('blocked_on', NULL)->get();
        
            //require_once 'includes/header.php'; 
        
        ?>
        <!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/simulor/horizontal/tables-advanced.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Apr 2019 06:07:49 GMT -->
<head>
        <meta charset="utf-8" />
        <title><?=$title?> - <?=$sub_title?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="<?=Config::get('default/description')?>" name="description" />
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
        <link href="<?=$assets?>/css/vendor/devugostyling.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" type="text/css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    </head>

    <?php
        $student = $this->student();
    ?>
    <body id="complete-submit-body">

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
                                <img src="<?=$this->domain()?>/<?=$student->profile_pix?>" alt="user-image" class="rounded-circle">
                                <small class="pro-user-name ml-1">
                                   <?=$student->name?>
                                </small>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <!-- item-->
                                <a class="dropdown-item notify-item" inactive>
                                    <i class="fe-user"></i>
                                    <span>My Account</span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <!-- item-->
                                <a class="dropdown-item notify-item">
                                    <i class="fe-log-out"></i>
                                    <span>Logout</span>
                                </a>

                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <a class="logo">
                                <span class="logo-lg">
                                    <img src="<?=$this->domain()?>/<?=Config::get('default/logo')?>" alt="" height="18">
                                </span>
                                <span class="logo-sm">
                                    <img src="<?=$this->domain()?>/<?=Config::get('default/logo')?>" alt="" height="28">
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
                                <a>
                                    <i class="fe-airplay"></i>Home</a>
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

        <div class="wrapper" id="complete-main">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a>Home</a></li>
                                    <li class="breadcrumb-item active"><?=$sub_title?></li>
                                </ol>
                            </div>
                            <h4 class="page-title"><?=$sub_title?></h4>
                        </div>
                    </div>
                </div>     
                <!-- end page title --> 

                <div id="complete-notification" class="text-center">
                    <h4>You have successfully completed the examination</h4>
                    <a class="btn btn-success" href="<?=$this->domain()?>/student/check-results">CHECK RESULTS</a>
                    <a class="btn btn-danger" href="<?=$this->domain()?>/student/logout">LOGOUT</a>
                    <a class="btn btn-info" href="<?=$this->domain()?>/student/dashboard">START NEW EXAM</a>
                </div>
                <!-- end row-->
                
            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->

     
        <!-- Footer Start -->
        <footer class="footer" id="footer-complete">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <?=Config::get('default/project_title')?> &copy; <?=date("Y")?> - Developed By Devugo
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-right footer-links d-none d-sm-block">
                            <a>About Us</a>
                            <a>Help</a>
                            <a>Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->


        <!-- App js -->
        <script src="<?=$assets?>/js/vendor.min.js"></script>
        <script src="<?=$assets?>/js/app.min.js"></script>

        

        <!-- third party js -->
        <script src="<?=$assets?>/js/vendor/jquery.dataTables.js"></script>
        <script src="<?=$assets?>/js/vendor/dataTables.bootstrap4.js"></script>
        <script src="<?=$assets?>/js/vendor/dataTables.responsive.min.js"></script>
        <script src="<?=$assets?>/js/vendor/responsive.bootstrap4.min.js"></script>
        <script src="<?=$assets?>/js/vendor/dataTables.buttons.min.js"></script>
        <script src="<?=$assets?>/js/vendor/buttons.bootstrap4.min.js"></script>
        <script src="<?=$assets?>/js/vendor/buttons.html5.min.js"></script>
        <script src="<?=$assets?>/js/vendor/buttons.flash.min.js"></script>
        <script src="<?=$assets?>/js/vendor/buttons.print.min.js"></script>
        <script src="<?=$assets?>/js/vendor/dataTables.keyTable.min.js"></script>
        <script src="<?=$assets?>/js/vendor/dataTables.select.min.js"></script>
        <!-- third party js ends -->

        
        <script src="<?=$assets?>/js/devugo_notification.js"></script>

        <!-- demo app -->
        <script src="<?=$assets?>/js/pages/datatables.init.js"></script>
        <!-- end demo js-->

    </body>
    <?php Session::delete('inputs-errors');?>

<!-- Mirrored from coderthemes.com/simulor/horizontal/tables-advanced.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Apr 2019 06:07:59 GMT -->
</html>

        