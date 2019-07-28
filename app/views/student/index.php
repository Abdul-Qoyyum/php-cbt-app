<?php 
            $title = Config::get('default/project_title');
            $sub_title = 'Dashboard';
            $subjects = Subject::where('blocked_on', NULL)->get();
            $levels = Level::where('blocked_on', NULL)->get();
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
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-header text-center">
                                <?=$site->title?>
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <img class="img-responsive" style="width: 50px; height: 50px;" src="<?=$this->domain()?>/<?=$site->logo?>">
                                </div>
                                <p class="text-center"><strong>Read the Instructions carefully before proceeding with the exam</strong></p><hr>
                                <h4 class="text-center"><strong>INSTRUCTIONS</strong></h4><hr>
                                <li>Only select three subjects and a level to proceed with your test.</li>
                                <li>Each question has four options, carefully pick the right option and click on the next button to submit and proceed to the next question or previous to go back to a previous question.</li>
                                <li>Questions can be navigated using the questions tab at the top left corner.</li>
                                <li>Questions answers are displayed on the answers tab at the bottom of the screen.</li>
                                <li>There's a designated time for the exam. Only click submit if you have attempted all questions.</li>
                            </div>
                        </div>
                    </div>
                    <div class="offset-lg-1 col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h4>Select Subjects and Level</h4>
                            </div>
                            <div class="card-body">
                                <form action="<?=$this->domain()?>/student-manager/check-subjects" method="post">
                                    <h5>Select Subjects</h5><br>
                                    <div class="row">
                                        <?php
                                            foreach($subjects as $subject)
                                            {?>
                                            <div class="col-lg-4">
                                                <div class="custom-control custom-checkbox">
                                                    <label><?=$subject->subject?></label>
                                                    <input width="30" height="30" style="float: left;" type="checkbox" id="rad" name="<?=$subject->id?>">
                                                </div>
                                            </div><?php
                                            }
                                        ?>
                                    </div><hr>
                                    <h5>Select Level</h5><br>
                                    <div class="form">
                                        <select class="form-control" id="level" name="level">
                                            <?php
                                                foreach($levels as $level)
                                                {?>
                                                    <option value="<?=$level->id?>"><?=$level->level?></option>
                                                <?php
                                                }
                                            ?>
                                        </select>
                                    </div><br>
                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary" type="submit"> Select </button>
                                    </div>
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
        