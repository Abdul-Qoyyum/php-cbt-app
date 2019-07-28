<?php 
            $title = Config::get('default/project_title');
            $sub_title = 'Blog Page';
            $blogs = Blog::all()->sortBy('id');
        
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
                                <h4 class="header-title mb-3">Add Blog Post</h4>
                                <form action="<?=$this->domain()?>/admin-manager/add-blog-post" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
                                    <div class="form-group mb-3">
                                        <label for="validationCustom01">Title</label>
                                        <input type="text" id="title" class="form-control" name="title" id="validationCustom01" placeholder="Title...." required>
                                        <div class="invalid-feedback">
                                            Please provide a valid title.
                                        </div>
                                        <?=$this->InputError('title')?>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="validationCustom01">Description</label>
                                        <textarea id="description" class="form-control" name="description" id="validationCustom01" placeholder="Description...." required></textarea>
                                        <div class="invalid-feedback">
                                            Please provide a valid description.
                                        </div>
                                        <?=$this->InputError('description')?>
                                        <script> CKEDITOR.replace('description');</script>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="validationCustom01">Image</label>
                                        <input type="file" id="background" class="form-control" name="image" id="validationCustom01" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid image.
                                        </div>
                                        <?=$this->InputError('image')?>
                                    </div>
                                    
                                    <?=Token::csrf()?>
                                    <button class="btn btn-primary" type="submit">Post</button>
                                </form>

                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                    <div class="col-lg-4">
                        <div style="float: left; font-weight: bold;">
                            Page Preview
                        </div>
                        <form action="<?=$this->domain()?>/admin-manager/change-blog-background" method="post" enctype="multipart/form-data" >
                            <input id="upload" onchange="form.submit()" style="display: none;" type="file" name="upload">
                        </form>
                        <button onclick="document.getElementById('upload').click()" style="float: right; margin: 5px;" class="btn btn-primary">Change Background</button>
                        <iframe style="width: 100%; height: 100%;" src="<?=$this->domain()?>/home/blog"></iframe>
                    </div> <!-- end col -->
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Blog Posts</h4>
                                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Date Created</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sn = 1;
                                            foreach($blogs as $blog){?>
                                                <tr>
                                                    <td><?=$sn?></td>
                                                    <td><img style="border-radius: 50%;" width="30" height="30" src="<?=$this->domain()?>/<?=$blog->image?>"> <?=$blog->title?></td>
                                                    <td><?=substr($blog->description, 0, 10) . '...'?></td>
                                                    <td><?=($blog->blocked()) ? '<span style="color: red;">Not Active</span>' : '<span style="color: green;">Active</span>' ?></td>
                                                    <td><?=$blog->created_at->toFormattedDateString()?></td>
                                                    <td>
                                                        <div class="btn-group dropdown">
                                                            <a href="javascript: void(0);" class="dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="<?=$this->domain()?>/admin/edit-blog-post/<?=$blog->id?>"><i style="color: dodgerblue; cursor pointer;" class="mdi mdi-pencil mr-1 text-muted"></i>Edit</a>
                                                                <a style="cursor: pointer;" class="dropdown-item" onclick="deletePost(<?=$blog->id?>)"><i class="mdi mdi-delete mr-1 text-muted"></i>Remove</a>
                                                                <?=(!$blog->blocked()) ? '<a style="cursor: pointer;" class="dropdown-item" onclick="blockPost(' . $blog->id . ')"><i class="fe-slash mr-1 text-muted"></i>Deactivate</a>' : '<a style="cursor: pointer;" class="dropdown-item" onclick="activatePost(' . $blog->id . ')"><i class="mdi mdi-library-plus mr-1 text-muted"></i>Activate</a>'?>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr><?php
                                                $sn++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                                
                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->
                </div>
                <!-- end row-->
                
            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->
        
        <script language="javascript">
            function blockPost(id)
            {
                if(confirm("Are you sure you want to deactivate post?")){
                    window.location.href='<?=$this->domain()?>' + '/admin-manager/block-blog-post/' + id;
                    return true;
                }
            }

            function activatePost(id)
            {
                if(confirm("Are you sure you want to activate blog post?")){
                    window.location.href='<?=$this->domain()?>' + '/admin-manager/activate-blog-post/' + id;
                    return true;
                }
            }

            function deletePost(id)
            {
                if(confirm("This action can't be reverted.  Are you sure you want to delete blog post?")){
                    window.location.href='<?=$this->domain()?>' + '/admin-manager/delete-blog-post/' + id;
                    return true;
                }
            }
        </script>

        <?php
            require_once 'includes/footer.php'; 
        ?>