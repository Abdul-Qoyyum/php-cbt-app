<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/simulor/horizontal/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Apr 2019 06:08:06 GMT -->
    <head>
        <meta charset="utf-8" />
        <title><?=Config::get('default/project_title')?> - Student Login</title>
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
                                    <p class="text-muted mb-4 mt-3">Enter your email and password to access test.</p>
                                </div>

                                <form action="<?=$this->domain()?>/student-manager/authenticate" method="post">

                                    <div class="form-group mb-3">
                                        <label for="email">Email</label>
                                        <input class="form-control" type="email" id="email" name="email" required="" placeholder="Enter your email">
                                        <?=$this->InputError('email')?>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" name="password" required="" id="password" placeholder="Enter your password">
                                        <?=$this->InputError('password')?>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="remember" id="checkbox-signin">
                                            <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                                <span style="float: right;"><a href="<?=$this->domain()?>/forgot-password">Forgot password?</a></span>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> Log In </button>
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
        
    </body>

<!-- Mirrored from coderthemes.com/simulor/horizontal/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Apr 2019 06:08:06 GMT -->
</html>