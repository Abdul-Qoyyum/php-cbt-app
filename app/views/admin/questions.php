<?php 
            $title = Config::get('default/project_title');
            $sub_title = 'Questions';
        
            require_once 'includes/header.php'; 
            $subjects = Subject::all();
            $levels = Level::all();

            function select($val, $check)
            {
                return ($val == $check) ? 'selected' : '' ;
            }
        
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
                                    <li class="breadcrumb-item"><a href="<?=$this->domain()?>/admin/students">Questions</a></li>
                                    <li class="breadcrumb-item active">Add Question</li>
                                </ol>
                            </div>
                            <h4 class="page-title"><?=$sub_title?></h4>
                        </div>
                    </div>
                </div>     
                <!-- end page title --> 
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body text-center">
                                <h4 class="header-title mb-3">Select Subject and Level</h4>
                                <form id="form" action="<?=$this->domain()?>/admin-manager/select-level-subject" method="post">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group mb-3">
                                                <select name="subject" data-plugin="customselect">
                                                    <?php
                                                        foreach($subjects as $subject){?>
                                                            <option value="<?=$subject->id?>"><?=$subject->subject?></option><?php
                                                        }
                                                    ?>
                                                </select>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group mb-3">
                                                <select name="level" data-plugin="customselect">
                                                    <?php
                                                        foreach($levels as $level){?> 
                                                            <option value="<?=$level->id?>"><?=$level->level?></option><?php
                                                        }
                                                    ?>
                                                </select>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group mb-3">
                                                <button style="color: white;" class="btn btn-primary">Select</button>
                                            </div>
                                        </div>
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

        <script language="javascript">
            function blockStudent(id)
            {
                if(confirm("Are you sure you want to block student?")){
                    window.location.href='<?=$this->domain()?>' + '/admin-manager/block-student/' + id;
                    return true;
                }
            }

            function activateStudent(id)
            {
                if(confirm("Are you sure you want to activate student?")){
                    window.location.href='<?=$this->domain()?>' + '/admin-manager/activate-student/' + id;
                    return true;
                }
            }

            function deleteStudent(id)
            {
                if(confirm("This action can't be reverted. Deleting a student would delete every information associated with the student. Are you sure you want to delete?")){
                    window.location.href='<?=$this->domain()?>' + '/admin-manager/delete-student/' + id;
                    return true;
                }
            }
        </script>

        <?php
            require_once 'includes/footer.php'; 
        ?>