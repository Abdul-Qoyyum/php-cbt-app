<?php 
            $title = Config::get('default/project_title');
            $sub_title = 'Home Page';
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

                <script src="<?=$assets?>/ckeditor/ckeditor/ckeditor.js"></script>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-3">Edit Home Page Content</h4>
                                <form action="<?=$this->domain()?>/admin-manager/update-home-page" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
                                    <div class="form-group mb-3">
                                        <label for="validationCustom01">Title</label>
                                        <input value="<?=$site->title?>" type="text" id="title" class="form-control" name="title" id="validationCustom01" placeholder="Title...." required>
                                        <div class="invalid-feedback">
                                            Please provide a valid title.
                                        </div>
                                        <?=$this->InputError('title')?>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="validationCustom01">Website Logo</label>
                                        <input type="file" id="logo" class="form-control" name="logo" id="validationCustom01">
                                        <?=$this->InputError('background')?>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="validationCustom01">Description</label>
                                        <textarea id="description" class="form-control" name="description" id="validationCustom01" placeholder="Description...." required><?=$site->description?></textarea>
                                        <div class="invalid-feedback">
                                            Please provide a valid description.
                                        </div>
                                        <?=$this->InputError('description')?>
                                        <script> CKEDITOR.replace('description');</script>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="validationCustom01">Home</label>
                                        <textarea id="home" class="form-control" name="home" id="validationCustom01" placeholder="Home...." required><?=$site->home?></textarea>
                                        <div class="invalid-feedback">
                                            Please provide a valid home content.
                                        </div>
                                        <?=$this->InputError('home')?>
                                        <script> CKEDITOR.replace('home');</script>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="validationCustom01">Home Background Image</label>
                                        <input type="file" id="background" class="form-control" name="background" id="validationCustom01">
                                        <?=$this->InputError('background')?>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="validationCustom01">About</label>
                                        <textarea id="about" class="form-control" name="about" id="validationCustom01" placeholder="About...." required><?=$site->about?></textarea>
                                        <div class="invalid-feedback">
                                            Please provide a valid About content.
                                        </div>
                                        <?=$this->InputError('about')?>
                                        <script> CKEDITOR.replace('about');</script>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="validationCustom01">Feature 1</label>
                                        <input value="<?=$site->feature1_title?>" type="text" class="form-control" id="validationCustom01" name="feature1_title" placeholder="Title" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid Feature Title.
                                        </div>
                                        <?=$this->InputError('feature1_title')?>
                                        <input value="<?=$site->feature1_description?>" type="text" class="form-control" name="feature1_description" id="validationCustom01" placeholder="Description..." required>
                                        <div class="invalid-feedback">
                                            Please provide a valid Feature Description.
                                        </div>
                                        <?=$this->InputError('feature1_descripiton')?>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="validationCustom01">Feature 2</label>
                                        <input value="<?=$site->feature2_title?>" type="text" class="form-control" id="validationCustom01" name="feature2_title" placeholder="Title" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid Feature Title.
                                        </div>
                                        <?=$this->InputError('feature2_title')?>
                                        <input value="<?=$site->feature2_description?>" type="text" class="form-control" name="feature2_description" id="validationCustom01" placeholder="Description..." required>
                                        <div class="invalid-feedback">
                                            Please provide a valid Feature Description.
                                        </div>
                                        <?=$this->InputError('feature2_description')?>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="validationCustom01">Feature 3</label>
                                        <input value="<?=$site->feature3_title?>" type="text" class="form-control" id="validationCustom01" name="feature3_title" placeholder="Title" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid Feature Title.
                                        </div>
                                        <?=$this->InputError('feature3_title')?>
                                        <input value="<?=$site->feature3_description?>" type="text" class="form-control" name="feature3_description" id="validationCustom01" placeholder="Description..." required>
                                        <div class="invalid-feedback">
                                            Please provide a valid Feature Description.
                                        </div>
                                        <?=$this->InputError('feature3_description')?>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="validationCustom01">Feature 4</label>
                                        <input value="<?=$site->feature4_title?>" type="text" class="form-control" id="validationCustom01" name="feature4_title" placeholder="Title" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid Feature Title.
                                        </div>
                                        <?=$this->InputError('feature2_title')?>
                                        <input value="<?=$site->feature4_description?>" type="text" class="form-control" name="feature4_description" id="validationCustom01" placeholder="Description..." required>
                                        <div class="invalid-feedback">
                                            Please provide a valid Feature Description.
                                        </div>
                                        <?=$this->InputError('feature4_description')?>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="validationCustom01">Contact Address</label>
                                        <input value="<?=$site->address?>" type="text" class="form-control" name="address" id="validationCustom01" placeholder="Address...." required>
                                        <div class="invalid-feedback">
                                            Please provide a valid Address.
                                        </div>
                                        <?=$this->InputError('address')?>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="validationCustom01">Contact Phone</label>
                                        <input value="<?=$site->phone?>" type="text" class="form-control" name="phone" id="validationCustom01" placeholder="Phone...." required>
                                        <div class="invalid-feedback">
                                            Please provide a valid Phone.
                                        </div>
                                        <?=$this->InputError('phone')?>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="validationCustom01">Contact Email</label>
                                        <input value="<?=$site->email?>" type="email" class="form-control" name="email" id="validationCustom01" placeholder="Email...." required>
                                        <div class="invalid-feedback">
                                            Please provide a valid Email.
                                        </div>
                                        <?=$this->InputError('address')?>
                                    </div>
                                    
                                    <?=Token::csrf()?>
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </form>

                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                    <div class="col-lg-4">
                        Page Preview
                        <iframe style="width: 100%; height: 100%;" src="<?=$this->domain()?>/home"></iframe>
                    </div> <!-- end col -->
                </div>
                <!-- end row-->
                
            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->

        <?php
            require_once 'includes/footer.php'; 
        ?>