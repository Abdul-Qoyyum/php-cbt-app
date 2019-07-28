<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/simulor/horizontal/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Apr 2019 06:08:06 GMT -->
    <head>
        <meta charset="utf-8" />
        <title><?=Config::get('default/project_title')?> - Student Register</title>
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
                                    <p class="text-muted mb-4 mt-3">Don't have an account? Create free account</p>
                                </div>

                                <form action="<?=$this->domain()?>/student-manager/create-student" method="post">
                                    <div class="form-group mb-3">
                                        <label for="lastname">Lastname</label>
                                        <input class="form-control" type="text" id="lastname" name="lastname" placeholder="Enter your Lastname" required>
                                        <?=$this->InputError('lastname')?>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="firstname">Firstname</label>
                                        <input class="form-control" type="text" id="firstname" name="firstname" placeholder="Enter your Firstname" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="middlename">Middlename</label>
                                        <input class="form-control" type="text" id="middlename" name="middlename" placeholder="Enter your Middlename" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="email">Email address</label>
                                        <input class="form-control" type="email" id="email" name="email" required placeholder="Enter your email">
                                        <?=$this->InputError('email')?>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <input class="form-control" name="password" type="password" required id="password" placeholder="Enter your password">
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> Sign Up </button>
                                    </div>

                                </form>
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted">Already have account? <a href="pages-login.html" class="text-dark ml-1"><b>Log In</b></a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        <!-- App js -->
        <script src="js/vendor.min.js"></script>
        <script src="js/app.min.js"></script>
        
    </body>
    <?php Session::delete('inputs-errors');?>
<!-- Mirrored from coderthemes.com/simulor/horizontal/pages-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Apr 2019 06:08:06 GMT -->
</html>