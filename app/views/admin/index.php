        <?php 
            $title = Config::get('default/project_title');
            $sub_title = 'Dashboard';
        
            require_once 'includes/header.php'; 
        
        ?>

        <div class="wrapper">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a>Admin</a></li>
                                    <li class="breadcrumb-item active"><?=$sub_title?></li>
                                </ol>
                            </div>
                            <h4 class="page-title"><?=$sub_title?></h4>
                        </div>
                    </div>
                </div>     
                <!-- end page title --> 

                <div class="row">
                    <div class="col-xl-3 col-lg-6">
                        <div class="card widget-flat">
                            <div class="card-body p-0">
                                <div class="p-3 pb-0">
                                    <div class="float-right">
                                        <i class="fe-users text-primary widget-icon"></i>
                                    </div>
                                    <h5 class="text-muted font-weight-normal mt-0">Students</h5>
                                    <h3 class="mt-2"><?=Student::all()->count()?></h3>
                                </div>
                                <div id="sparkline1"></div>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-xl-3 col-lg-6">
                        <div class="card widget-flat">
                            <div class="card-body p-0">
                                <div class="p-3 pb-0">
                                    <div class="float-right">
                                        <i class=" mdi mdi-camera-iris text-danger widget-icon"></i>
                                    </div>
                                    <h5 class="text-muted font-weight-normal mt-0">Subjects</h5>
                                    <h3 class="mt-2"><?=Subject::all()->count()?></h3>
                                </div>
                                <div id="sparkline2"></div>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-xl-3 col-lg-6">
                        <div class="card widget-flat">
                            <div class="card-body p-0">
                                <div class="p-3 pb-0">
                                    <div class="float-right">
                                        <i class="mdi mdi-call-merge text-primary widget-icon"></i>
                                    </div>
                                    <h5 class="text-muted font-weight-normal mt-0">Levels</h5>
                                    <h3 class="mt-2"><?=Level::all()->count()?></h3>
                                </div>
                                <div id="sparkline3"></div>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-xl-3 col-lg-6">
                        <div class="card widget-flat">
                            <div class="card-body p-0">
                                <div class="p-3 pb-0">
                                    <div class="float-right">
                                        <i class="mdi mdi-eye-outline text-danger widget-icon"></i>
                                    </div>
                                    <h5 class="text-muted font-weight-normal mt-0">Blog Posts</h5>
                                    <h3 class="mt-2"><?=Blog::all()->count()?></h3>
                                </div>
                                <div id="sparkline4"></div>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Recent Students</h4>
                                <?php
                                    $students = Student::all()->sortByDesc('id');
                                ?>
                                <div class="table-responsive mt-3">
                                    <table class="table table-hover table-centered mb-0">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Full Name</th>
                                                <th>Email</th>
                                                <th>Joined</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sn = 1;
                                            $check = 0;
                                                foreach($students as $student){
                                                    if($check > 9){
                                                        break;
                                                    }?>
                                                    <tr>
                                                        <td><?=$sn?></td>
                                                        <td><img style="width:30px; height:30px; border-radius:50%;" src="<?=$this->domain()?>/<?=$student->profile_pix?>"> <?=$student->lastname?> <?=$student->firstname?> <?=$student->middlename?></td>
                                                        <td><?=$student->email?></td>
                                                        <td><?=$student->created_at->toFormattedDateString()?></td>
                                                    </tr><?php
                                                    $sn++;
                                                    $check++;
                                                }
                                            ?>
                                        </tbody>
                                    </table>
    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                
            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->

        <?php
            require_once 'includes/footer.php'; 
        ?>


       