        <?php 
            $title = Config::get('default/project_title');
            $sub_title = 'Selected Subjects';
        
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
                                    <li class="breadcrumb-item"><a href="<?=$this->domain()?>/admin/dashboard">Home</a></li>
                                    <li class="breadcrumb-item active"><?=$sub_title?></li>
                                </ol>
                            </div>
                            <h4 class="page-title"><?=$sub_title?></h4>
                        </div>
                    </div>
                </div>     
                <!-- end page title --> 
                <div class="row">
                    <div class="offset-lg-3 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Selected Subjects</h4>
                            </div>
                            <div class="card-body">
                                <h5>You have selected and will be examined on the following subjects</h5>
                                <ul style="font-size: 20px;">
                                <?php
                                   foreach(Session::get('subjects') as $subject => $value){
                                        echo '<li>' . Subject::find($value)->subject . '</li>';
                                   } 
                                ?>
                                </ul>
                                <div class="form-group mb-0 text-center">
                                    <a href="<?=$this->domain()?>/student/dashboard" class="btn btn-primary">Change Subjects</a>
                                    <a href="<?=$this->domain()?>/student/start-exam" class="btn btn-success">Start Exam</a>
                                    <a href="<?=$this->domain()?>/home" class="btn btn-danger">Exit</a>
                                </div>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div>
                <!-- end row-->
                
            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->

        <?php
            require_once 'includes/footer.php'; 
        ?>
        