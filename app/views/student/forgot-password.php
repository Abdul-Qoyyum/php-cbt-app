<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/simulor/horizontal/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Apr 2019 06:08:06 GMT -->
    <head>
        <meta charset="utf-8" />
        <title><?=Config::get('default/project_title')?> - Forgot Password</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="<?=Config::get('default/description')?>" name="description" />
        <meta content="devugo" name="developer" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?=$this->domain()?>/<?=SiteSettings::find(1)->logo?>">

        <!-- App css -->
        <link href="<?=$assets?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=$assets?>/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=$assets?>/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg"><?=Session::flash('flash')?>

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card">

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <a href="index.html">
                                        <span><img src="<?=$this->domain()?>/<?=SiteSettings::find(1)->logo?>" alt="" height="22"></span>
                                    </a>
                                    <p class="text-muted mb-4 mt-3">Enter your registered email and a password reset link will be mailed to you</p>
                                </div>

                                <form action="<?=$this->domain()?>/student-manager/send-password-reset-link" method="post">

                                    <div class="form-group mb-3">
                                        <label for="email">Email</label>
                                        <input class="form-control" type="email" id="email" name="email" required="" placeholder="Enter your email">
                                        <?=$this->InputError('email')?>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> Send </button>
                                    </div>

                                </form>
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        <!-- App js -->
        <script src="<?=$assets?>/js/vendor.min.js"></script>
        <script src="<?=$assets?>/js/app.min.js"></script>
        <script src="<?=$assets?>/js/devugo_notification.js"></script>
        
    </body><?php Session::delete('inputs-errors');?>

<!-- Mirrored from coderthemes.com/simulor/horizontal/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Apr 2019 06:08:06 GMT -->
</html>