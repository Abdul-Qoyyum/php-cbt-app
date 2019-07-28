<?php
    $site = SiteSettings::find(1);
    $post = Blog::find($data['id']);
    $admin = Admin::find(1);
?>
<!doctype html>
<html class="no-js" lang="zxx">


<!-- Mirrored from colorlib.com/preview/theme/appy/single.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Apr 2019 18:58:49 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta name="developer" content="Devugo">
    <meta name="description" content="<?=$site->description?>">
    <meta name="keywords" content="cbt, cbt application, test application, test app, cbt app, quiz app, quiz application">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title><?=Config::get('default/project_title')?> - Single Blog Post</title>
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
    <script src="<?=$assets?>/home/js/vendor/modernizr-2.8.3.min.js" type="bae4f99115d7026c31af56f2-text/javascript"></script>
    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="single-post" data-spy="scroll" data-target=".mainmenu-area">
    <!-- MainMenu-Area -->
    <nav class="mainmenu-area" data-spy="affix" data-offset-top="200">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#primary_menu">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href=""><img style="width: 30px; height: 30px;" src="<?=$this->domain()?>/<?=$site->logo?>" alt="Logo"></a>
            </div> 
            <div class="collapse navbar-collapse" id="primary_menu">
                <ul class="nav navbar-nav mainmenu">
                    <li><a href="<?=$this->domain()?>/home#home_page">Home</a></li>
                    <li><a href="<?=$this->domain()?>/home#about_page">About</a></li>
                    <li><a href="<?=$this->domain()?>/student/dashboard">Test</a></li>
                    <li class="active"><a href="<?=$this->domain()?>/home#blog">Blog</a></li>
                    <li><a href="<?=$this->domain()?>/home#contact_page">Contacts</a></li>
                </ul>
                <div class="right-button hidden-xs">
                    <a href="<?=$this->domain()?>/register">Sign Up</a>
                    <a href="<?=$this->domain()?>/login">Login</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- MainMenu-Area-End -->

    <header class="site-header" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('<?=$this->domain()?>/<?=$site->blog_background?>') no-repeat scroll center bottom / cover; background-size: cover;  background-attachment: fixed; background-position: center; background-repeat: no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h1 class="white-color">Single Blog</h1>
                    <ul class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li>Blog</li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <article class="post-single">
                        <figure class="post-media">
                            <img src="<?=$this->domain()?>/<?=$post->image?>" alt="">
                        </figure>
                        <div class="post-body">
                            <ul class="breadcrumb">
                                <li><a><?=$admin->name?></a></li>
                                <li><?=$post->updated_at->toFormattedDateString()?></li>
                            </ul>
                            <h2 class="dark-color"><?=$post->title?></h2>
                            <div class="space-20"></div>
                            <?=$post->description?>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer-Area -->
    <footer class="footer-area" id="contact_page">
        <div class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="page-title text-center">
                            <h5 class="title">Contact US</h5>
                            <h3 class="dark-color">Find us with the below details</h3>
                            <div class="space-60"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-4">
                        <div class="footer-box">
                            <div class="box-icon">
                                <span class="lnr lnr-map-marker"></span>
                            </div>
                            <p><?=$site->address?></p>
                        </div>
                        <div class="space-30 hidden visible-xs"></div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="footer-box">
                            <div class="box-icon">
                                <span class="lnr lnr-phone-handset"></span>
                            </div>
                            <p><?=$site->phone?></p>
                        </div>
                        <div class="space-30 hidden visible-xs"></div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="footer-box">
                            <div class="box-icon">
                                <span class="lnr lnr-envelope"></span>
                            </div>
                            <p><?=$site->email?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-Bootom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-5">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            <span>Copyright &copy;<script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script type="bae4f99115d7026c31af56f2-text/javascript">document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="lnr lnr-heart" aria-hidden="true"></i> by <a href="https://colorlib.com/" target="_blank">Colorlib</a></span>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <div class="space-30 hidden visible-xs"></div>
                    </div>
                    <div class="col-xs-12 col-md-7">
                        <div class="footer-menu">
                            <ul>
                                <li><a href="<?=$this->domain()?>/home#home_page">Home</a></li>
                                <li><a href="<?=$this->domain()?>/home#about_page">About</a></li>
                                <li><a href="<?=$this->domain()?>/student/dashboard">Test</a></li>
                                <li><a href="<?=$this->domain()?>/home#blog">Blog</a></li>
                                <li><a href="#contact_page">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-Bootom-End -->
    </footer>
    <!-- Footer-Area-End -->
    <!--Vendor-JS-->
    <script src="<?=$assets?>/home/js/vendor/jquery-1.12.4.min.js" type="bae4f99115d7026c31af56f2-text/javascript"></script>
    <script src="<?=$assets?>/home/js/vendor/jquery-ui.js" type="bae4f99115d7026c31af56f2-text/javascript"></script>
    <script src="<?=$assets?>/home/js/vendor/bootstrap.min.js" type="bae4f99115d7026c31af56f2-text/javascript"></script>
    <!--Plugin-JS-->
    <script src="<?=$assets?>/home/js/owl.carousel.min.js" type="bae4f99115d7026c31af56f2-text/javascript"></script>
    <script src="<?=$assets?>/home/js/contact-form.js" type="bae4f99115d7026c31af56f2-text/javascript"></script>
    <script src="<?=$assets?>/home/js/ajaxchimp.js" type="bae4f99115d7026c31af56f2-text/javascript"></script>
    <script src="<?=$assets?>/home/js/scrollUp.min.js" type="bae4f99115d7026c31af56f2-text/javascript"></script>
    <script src="<?=$assets?>/home/js/magnific-popup.min.js" type="bae4f99115d7026c31af56f2-text/javascript"></script>
    <script src="<?=$assets?>/home/js/wow.min.js" type="bae4f99115d7026c31af56f2-text/javascript"></script>
    <!--Main-active-JS-->
    <script src="<?=$assets?>/home/js/main.js" type="bae4f99115d7026c31af56f2-text/javascript"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="bae4f99115d7026c31af56f2-text/javascript"></script>
<script type="bae4f99115d7026c31af56f2-text/javascript">
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/a2bd7673/cloudflare-static/rocket-loader.min.js" data-cf-settings="bae4f99115d7026c31af56f2-|49" defer=""></script></body>


<!-- Mirrored from colorlib.com/preview/theme/appy/single.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Apr 2019 18:58:49 GMT -->
</html>
