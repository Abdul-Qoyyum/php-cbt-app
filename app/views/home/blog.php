<?php
    $site = SiteSettings::find(1);
    $posts = Blog::where('blocked_on', NULL)->get()->sortByDesc('id');
    $admin = Admin::find(1);
    $per_page = 15;
    if(isset($_GET['page'])){
        $current_page = $_GET['page'];
    }else{
        $current_page = 1;
    }

    $start_blog = ($per_page * $current_page) - $per_page;
    //echo $start_blog;
?>
<!doctype html>
<html class="no-js" lang="zxx">


<!-- Mirrored from colorlib.com/preview/theme/appy/blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Apr 2019 18:58:46 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta name="developer" content="Devugo">
    <meta name="description" content="<?=$site->description?>">
    <meta name="keywords" content="cbt, cbt application, test application, test app, cbt app, quiz app, quiz application">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title><?=$site->title?> - Blog</title>
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
    <script src="<?=$assets?>/home/js/vendor/modernizr-2.8.3.min.js" type="90fb09db7f004b944ce7e49d-text/javascript"></script>
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
                <a class="navbar-brand" href=""><img style="width: 30px; height: 30px;" src="<?=$this->domain()?>/<?=$site->logo?>" alt="Logo"></a>
            </div>
            <div class="collapse navbar-collapse" id="primary_menu">
                <ul class="nav navbar-nav mainmenu">
                    <li><a href="<?=$this->domain()?>/home#home_page">Home</a></li>
                    <li><a href="<?=$this->domain()?>/home#about_page">About</a></li>
                    <li><a href="<?=$this->domain()?>/student/dashboard">Test</a></li>
                    <li class="active"><a href="<?=$this->domain()?>/home#blog">Blog</a></li>
                    <li><a href="<?=$this->domain()?>/home#contact_page">Contact</a></li>
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
                    <h1 class="white-color">Our Latest Blog</h1>
                    <ul class="breadcrumb">
                        <li><a href="<?=$this->domain()?>">Home</a></li>
                        <li>Blog</li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <div class="section-padding">
        <div class="container">
            <?php
                $control = 0;
                foreach($posts as $post){
                    if($control > 0){
                        break;
                    }else{?>
                        <div class="row">
                            <div class="col-xs-12">
                                <article class="post-single sticky">
                                    <figure class="post-media">
                                        <img src="<?=$this->domain()?>/<?=$post->image?>" alt="">
                                    </figure>
                                    <div class="post-body">
                                        <div class="post-meta">
                                            <div class="post-tags"><a href="#"><?=$admin->name?></a></div>
                                            <div class="post-date"><?=$post->updated_at->toFormattedDateString()?></div>
                                        </div>
                                        <h4 class="dark-color"><a href="single.html"><?=$post->title?></a></h4>
                                        <p><?=substr($post->description, 0, 200)?></p>
                                        <a href="<?=$this->domain()?>/home/view-blog-post/<?=$post->id?>" class="read-more">View Article</a>
                                    </div>
                                </article>
                                <div class="space-100"></div>
                            </div>
                        </div><?php
                        $control++;
                    }
                }
            ?>
            
            <div id="focus" class="row">
                <?php
                    $control = 0;
                    $page_controller = $per_page;
                    foreach($posts as $post){
                        if($page_controller == 0){
                            break;
                        }else if($control >= $start_blog){?>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <article class="post-single">
                                    <figure class="post-media">
                                        <img style="width: 500px; height: 200px;" src="<?=$this->domain()?>/<?=$post->image?>" alt="">
                                    </figure>
                                    <div class="post-body">
                                        <div class="post-meta">
                                            <div class="post-tags"><a><?=$admin->name?></a></div>
                                            <div class="post-date"><?=$post->updated_at->toFormattedDateString()?></div>
                                        </div>
                                        <h4 class="dark-color"><a href="<?=$this->domain()?>/home/view-blog-post/<?=$post->id?>"><?=$post->title?></a></h4>
                                        <a href="<?=$this->domain()?>/home/view-blog-post/<?=$post->id?>" class="read-more">View Article</a>
                                    </div>
                                </article>
                            </div><?php
                            $page_controller--;
                        }
                        $control++;
                    }
                ?>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="pagination">
                        <div class="nav-links">
                            <?=$this->pagination_links($posts, $per_page)?>
                            <!--<a href="#" class="prev page-numbers"><i class="lnr lnr-chevron-left"></i></a>
                            <a href="#" class="page-numbers">1</a>
                            <a href="#" class="page-numbers">2</a>
                            <a href="#" class="page-numbers current">3</a>
                            <a href="#" class="page-numbers">4</a>
                            <a href="#" class="page-numbers">5</a>
                            <a href="#" class="page-numbers">6</a>
                            <a href="#" class="next page-numbers"><i class="lnr lnr-chevron-right"></i></a>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
        require_once 'includes/footer.php';
    ?>