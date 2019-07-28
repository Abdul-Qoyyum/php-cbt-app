        <?php 
            $title = Config::get('default/project_title');
            $sub_title = 'Profile';
        
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
                                    <li class="breadcrumb-item active">Profile</li>
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
                            <div class="card-body">
                                <center class="m-t-30"> <img src="<?=$this->domain()?>/<?=$admin->profile_pix?>" class="img-circle" width="150" height="150">
                                    <h4 class="card-title m-t-10"><?=$admin->name?></h4>
                                    <form action="<?=$this->domain()?>/admin-manager/update-admin-profile-pix" method="post" enctype="multipart/form-data">
                                        <input onchange="form.submit()" style="display: none;" type="file" class="form-control" name="profile_pix" id="profile_pix" placeholder="School Logo">
                                    </form>
                                    <button style="color: white; cursor: pointer;" onclick="document.getElementById('profile_pix').click();" class="form-control btn-info">Update Profile picture</button>
                                </center>
                            </div>
                            <div>
                                <hr> </div>
                            <div class="card-body"> <small class="text-muted">Email address </small>
                                <h6><?=$admin->email?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-3">Update profile</h4>
                                <form action="<?=$this->domain()?>/admin-manager/update-profile" method="post" class="needs-validation" novalidate>
                                    <div class="form-group mb-3">
                                        <label for="validationCustom01">Name</label>
                                        <input type="text" class="form-control" value="<?=$admin->name?>" name="name" id="validationCustom01" placeholder="Name" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid Name.
                                        </div>
                                        <?=$this->InputError('name')?>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="validationCustom01">Email</label>
                                        <input type="email" class="form-control" value="<?=$admin->email?>" name="email" id="validationCustom01" placeholder="Email" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid email.
                                        </div>
                                        <?=$this->InputError('email')?>
                                    </div>
                                    <?=Token::csrf()?>
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </form>
                                <hr>
                                <form action="<?=$this->domain()?>/admin-manager/change-password" method="post" class="needs-validation" novalidate>
                                    <h4 class="header-title mb-3">Change Password</h4>
                                    <div class="form-group mb-3">
                                        <label for="validationCustom01">Old Password</label>
                                        <input type="password" class="form-control" name="old_password" id="validationCustom01" placeholder="Old Password" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid Old Password.
                                        </div>
                                        <?=$this->InputError('old_password')?>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="validationCustom01">New Password</label>
                                        <input type="password" class="form-control" name="new_password" id="validationCustom01" placeholder="New Password" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid New Password.
                                        </div>
                                        <?=$this->InputError('new_password')?>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="validationCustom01">New Password Again</label>
                                        <input type="password" class="form-control" name="new_password_again" id="validationCustom01" placeholder="New Password Again" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid New Password Again.
                                        </div>
                                        <?=$this->InputError('new_password_again')?>
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