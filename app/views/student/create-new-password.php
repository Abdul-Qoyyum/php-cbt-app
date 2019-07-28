<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/simulor/horizontal/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Apr 2019 06:08:06 GMT -->
    <head>
        <meta charset="utf-8" />
        <title><?=Config::get('default/project_title')?> - Create New Password</title>
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
                                    <p class="text-muted mb-4 mt-3">Enter your new password</p>
                                </div>

                                <form action="<?=$this->domain()?>/student-manager/reset-password" method="post">

                                    <div class="form-group mb-3">
                                        <label for="password">New Password</label>
                                        <input class="form-control" type="password" id="password" name="password" required="" placeholder="Enter your new password">
                                        <?=$this->InputError('password')?>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password_again">New Password Again</label>
                                        <input class="form-control" type="password" id="password_again" name="password_again" required="" placeholder="Enter your New Password Again">
                                        <?=$this->InputError('password_again')?>
                                    </div>

                                    <input type="text" style="display: none;" value="<?=$data['token']?>" name="hidden_token">
                                    <input type="text" style="display: none;" value="<?=$data['email']?>" name="hidden_email">

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> Reset </button>
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