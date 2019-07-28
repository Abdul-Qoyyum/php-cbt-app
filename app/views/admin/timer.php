<?php 
            $title = Config::get('default/project_title');
            $sub_title = 'Timer';
            $site = SiteSettings::find(1);
        
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
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-3">Set Timer</h4>
                                <form action="<?=$this->domain()?>/admin-manager/update-timer" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
                                    <div class="form-group mb-3">
                                        <label for="validationCustom01">Exam Duration (minutes)</label>
                                        <input value="<?=$site->timer?>" type="timer" id="timer" class="form-control" name="timer" id="validationCustom01" placeholder="Tmer...." required>
                                        <div class="invalid-feedback">
                                            Please provide a valid timer.
                                        </div>
                                        <?=$this->InputError('timer')?>
                                    </div>
                                    <?=Token::csrf()?>
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </form>

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