<?php
    require_once 'includes/header.php';
?>
    <!-- About-Area -->
    <section class="section-padding" id="about_page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-10 col-md-offset-1">
                    <div class="page-title text-center">
                        <img height="40" width="40" src="<?=$this->domain()?>/<?=$site->logo?>" alt="About Logo">
                        <div class="space-20"></div>
                        <h5 class="title">About Us</h5>
                        <div class="space-20"></div>
                        <p><?=$site->about?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About-Area-End -->
    <!-- Feature-Area -->
    <section class="feature-area section-padding-top" id="features_page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                    <div class="page-title text-center">
                        <h5 class="title">Features</h5>
                        <div class="space-60"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="service-box wow fadeInUp" data-wow-delay="0.2s">
                        <div class="box-icon">
                            <i class="lnr lnr-rocket"></i>
                        </div>
                        <h4><?=$site->feature1_title?></h4>
                        <p><?=$site->feature1_description?></p>
                    </div>
                    <div class="space-60"></div>
                </div>
                <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
                    <div class="service-box wow fadeInUp" data-wow-delay="0.6s">
                        <div class="box-icon">
                            <i class="lnr lnr-cloud-download"></i>
                        </div>
                        <h4><?=$site->feature2_title?></h4>
                        <p><?=$site->feature2_description?></p>
                    </div>
                    <div class="space-60"></div>
                </div>
            <div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="service-box wow fadeInUp" data-wow-delay="0.2s">
                        <div class="box-icon">
                            <i class="lnr lnr-clock"></i>
                        </div>
                        <h4><?=$site->feature3_title?></h4>
                        <p><?=$site->feature3_description?></p>
                    </div>
                    <div class="space-60"></div>
                </div>
                <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
                    <div class="service-box wow fadeInUp" data-wow-delay="0.6s">
                        <div class="box-icon">
                            <i class="lnr lnr-cog"></i>
                        </div>
                        <h4><?=$site->feature4_title?></h4>
                        <p><?=$site->feature4_description?></p>
                    </div>
                    <div class="space-60"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- Feature-Area-End -->
    <!-- Testimonial-Area -->
    <section class="testimonial-area" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title text-center">
                        <h5 class="title">Blog</h5>
                        <h3 class="dark-color">Latest News</h3>
                        <div class="space-60"></div>
                    </div>
                </div>
            </div>
            <?php
                $blog_posts = Blog::all()->sortByDesc('id');
                $admin = Admin::find(1);
            ?>
            <div class="row">
                <div class="col-xs-12">
                    <div class="team-slide">
                        <?php
                            $control = 0;
                            foreach($blog_posts as $blog_post){
                                if($control > 5){
                                    break;
                                }?>
                                <div class="team-box">
                                <a href="<?=$this->domain()?>/home/blog"><img style="width: 500px; height: 200px;" class="img-responsive" src="<?=$this->domain()?>/<?=$blog_post->image?>" alt=""></a>
                                    <a href="<?=$this->domain()?>/home/blog"><h4><?=$blog_post->title?></h4></a>
                                    <h6 class="position"><?=$admin->name?></h6>
                                    <p><?=substr($blog_post->description, 0, 100)?></p>
                                </div><?php
                            }
                        
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial-Area-End -->
   <?php
        require_once 'includes/footer.php';
   ?>