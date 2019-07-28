<?php
   $site = SiteSettings::find(1);
?>
<!doctype html>
<html class="no-js" lang="zxx">


<!-- Mirrored from colorlib.com/preview/theme/appy/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Apr 2019 18:58:27 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta name="description" content="<?=$site->description?>">
    <meta name="keywords" content="cbt, cbt application, test application, test app, cbt app, quiz app, quiz application">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title><?=$site->title?></title>
    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" href="<?=$this->domain()?>/<?=$site->logo?>">
    <link rel="shortcut icon" type="image/ico" href="<?=$this->domain()?>/<?=$site->logo?>" />
    <!-- Plugin-CSS -->
    <link rel="stylesheet" href="<?=$assets?>/home/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=$assets?>/home/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=$assets?>/home/css/linearicons.css">
    <link rel="stylesheet" href="<?=$assets?>/home/css/magnific-popup.css">
    <link rel="stylesheet" href="<?=$assets?>/home/css/animate.css">
    <!-- Main-Stylesheets -->
    <link rel="stylesheet" href="<?=$assets?>/home/css/normalize.css">
    <link rel="stylesheet" href="<?=$assets?>/home/style.css">
    <link rel="stylesheet" href="<?=$assets?>/home/css/responsive.css">
    <script src="<?=$assets?>/home/js/vendor/modernizr-2.8.3.min.js" type="b086eea523802b44f76d302e-text/javascript"></script>
    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body data-spy="scroll" data-target=".mainmenu-area">
    
    <!-- MainMenu-Area -->
    <nav class="mainmenu-area" data-spy="affix" data-offset-top="200">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#primary_menu">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href=""><img style="height: 30px; width: 30px;" src="<?=$this->domain()?>/<?=$site->logo?>" alt="Logo"></a>
            </div>
            <div class="collapse navbar-collapse" id="primary_menu">
                <ul class="nav navbar-nav mainmenu">
                    <li class="active"><a href="#home_page">Home</a></li>
                    <li><a href="#about_page">About</a></li>
                    <li><a href="<?=$this->domain()?>/student/dashboard">Test</a></li>
                    <li><a href="#blog">Blog</a></li>
                    <li><a href="#contact_page">Contact</a></li>
                </ul>
                <div class="right-button hidden-xs">
                    <a href="<?=$this->domain()?>/register">Sign Up</a>
                    <a href="<?=$this->domain()?>/login">Login</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- MainMenu-Area-End -->
    <!-- Home-Area -->
    <header style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('<?=$this->domain()?>/<?=$site->background?>') no-repeat scroll center bottom / cover;" class="home-area" id="home_page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-7">
                    <div class="space-80 hidden-xs"></div>
                    <h1 class="wow fadeInUp" data-wow-delay="0.4s"><?=$site->title?></h1>
                    <div class="space-20"></div>
                    <div class="desc wow fadeInUp" data-wow-delay="0.6s">
                        <p><?=$site->home?></p>
                    </div>
                    <div class="space-20"></div>
                    <a href="<?=$this->domain()?>/student" class="bttn-white wow fadeInUp" data-wow-delay="0.8s" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInUp;"><i class="lnr lnr-download"></i>Get Started</a>
                </div>
            </div>
        </div>
    </header>
    <!-- Home-Area-End -->