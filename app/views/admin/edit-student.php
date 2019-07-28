        <?php 
            $title = Config::get('default/project_title');
            $sub_title = 'Edit Students';
        
            require_once 'includes/header.php'; 

            $student = Student::find($data['id']);
        
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
                                    <li class="breadcrumb-item"><a href="<?=$this->domain()?>/admin/students">Students</a></li>
                                    <li class="breadcrumb-item active"><?=$sub_title?></li>
                                </ol>
                            </div>
                            <h4 class="page-title"><?=$sub_title?></h4>
                        </div>
                    </div>
                </div>     
                <!-- end page title --> 

                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <h4 class="header-title mb-3"><?=($student->blocked()) ? '<a class="btn btn-success" href="' . $this->domain() . '/admin-manager/activate-student/' . $data['id'] . '">Activate</a>' : '<a class="btn btn-danger" href="' . $this->domain() . '/admin-manager/block-student/' . $data['id'] . '">Block</a>' ;?></h4>
                                <img style="border-radius: 50%;" width="200" height="200" src="<?=$this->domain()?>/<?=$student->profile_pix?>">
                                <h5><?=$student->lastname?> <?=$student->firstname?> <?=$student->middlename?></h5>
                                <?=($student->blocked()) ? '<i style="color: red;" class="fa fa-circle">Blocked</i>' : '<i style="color: green;" class="fa fa-circle">Active</i>' ?>
                                <form action="<?=$this->domain()?>/admin-manager/update-student-profile-pix/<?=$data['id']?>" method="post" enctype="multipart/form-data">
                                    <input onchange="form.submit()" style="display: none;" type="file" class="form-control" name="profile_pix" id="profile_pix" placeholder="Student Profile">
                                </form>
                                <button style="color: white; cursor: pointer;" onclick="document.getElementById('profile_pix').click();" class="form-control btn-info">Update Profile Picture</button>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-3">Edit Student</h4>
                                <small>Default Password: 123456</small>
                                <form action="<?=$this->domain()?>/admin-manager/update-student/<?=$data['id']?>" method="post" class="needs-validation" novalidate>
                                    <div class="form-group mb-3">
                                        <label for="validationCustom01">First name</label>
                                        <input type="text" class="form-control" value="<?=$student->firstname?>" name="firstname" id="validationCustom01" placeholder="First name" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid firstname.
                                        </div>
                                        <?=$this->InputError('firstname')?>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="validationCustom01">Middle name</label>
                                        <input type="text" class="form-control" value="<?=$student->middlename?>" name="middlename" id="validationCustom01" placeholder="Middle name" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid middlename.
                                        </div>
                                        <?=$this->InputError('middlename')?>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="validationCustom02">Last name</label>
                                        <input type="text" class="form-control" value="<?=$student->lastname?>" name="lastname" id="validationCustom02" placeholder="Last name" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid lastname.
                                        </div>
                                        <?=$this->InputError('lastname')?>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="validationCustom02">Email</label>
                                        <input type="email" class="form-control" value="<?=$student->email?>" name="email" id="validationCustom02" placeholder="Email" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid email.
                                        </div>
                                        <?=$this->InputError('email')?>
                                    </div>
                                    <?=Token::csrf()?>
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </form><br>
                                <a href="<?=$this->domain()?>/admin-manager/reset-student-password/<?=$data['id']?>" class="btn btn-info">Reset Password</a>
                                

                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div>
                <!-- end row-->

                <div class="row">
                    
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="header-title">Students</h4>
                                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Date Joined</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $students = Student::all()->sortByDesc('id');
                                            $sn = 1;
                                            foreach($students as $student){?>
                                                <tr>
                                                    <td><?=$sn?></td>
                                                    <td><img width="30" height="30" style="border-radius: 50%;" src="<?=$this->domain()?>/<?=$student->profile_pix?>"> <?=$student->lastname?> <?=$student->firstname?> <?=$student->middlename?></td>
                                                    <td><?=$student->email?></td>
                                                    <td><span class="label label-primary"><?=$student->created_at->toFormattedDateString()?></span></td>
                                                    <td>
                                                        <div class="btn-group dropdown">
                                                            <a href="javascript: void(0);" class="dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="<?=$this->domain()?>/admin/edit-student/<?=$student->id?>"><i style="color: dodgerblue; cursor pointer;" class="mdi mdi-pencil mr-1 text-muted"></i>Edit</a>
                                                                <a style="cursor: pointer;" class="dropdown-item" onclick="deleteStudent(<?=$student->id?>)"><i class="mdi mdi-delete mr-1 text-muted"></i>Remove</a>
                                                                <?=(!$student->blocked()) ? '<a style="cursor: pointer;" class="dropdown-item" onclick="blockStudent(' . $student->id . ')"><i class="fe-slash mr-1 text-muted"></i>Block</a>' : '<a style="cursor: pointer;" class="dropdown-item" onclick="activateStudnet(' . $student->id . ')"><i class="mdi mdi-library-plus mr-1 text-muted"></i>Activate</a>'?>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr><?php
                                                $sn++;
                                            }
                                        ?>
                                </table>
                                
                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->
                </div>
                
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