<?php 
            $title = Config::get('default/project_title');
            $sub_title = 'Subjects';
        
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
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-3">Add Subject</h4>
                                <form action="<?=$this->domain()?>/admin-manager/create-subject" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
                                    <div class="form-group mb-3">
                                        <label for="validationCustom01">Subject</label>
                                        <input type="text" class="form-control" name="subject" id="validationCustom01" placeholder="Subject" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid subject.
                                        </div>
                                        <?=$this->InputError('subject')?>
                                    </div>
                                    <?=Token::csrf()?>
                                    <button class="btn btn-primary" type="submit">Add</button>
                                </form>

                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="header-title"><?=$sub_title?></h4>
                                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Subject</th>
                                            <th>Date Created</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $subjects = Subject::all()->sortByDesc('id');
                                            $sn = 1;
                                            foreach($subjects as $subject){?>
                                                <tr>
                                                    <td><?=$sn?></td>
                                                    <td><?=$subject->subject?></td>
                                                    <td><?=$subject->created_at->toFormattedDateString()?></td>
                                                    <td><?=($subject->blocked()) ? '<span style="color: brown;">Blocked</span>' : '<span style="color: green;">Active</span>' ?></td>
                                                    <td>
                                                        <div class="btn-group dropdown">
                                                            <a href="javascript: void(0);" class="dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="<?=$this->domain()?>/admin/edit-subject/<?=$subject->id?>"><i style="color: dodgerblue; cursor pointer;" class="mdi mdi-pencil mr-1 text-muted"></i>Edit</a>
                                                                <a style="cursor: pointer;" class="dropdown-item" onclick="deleteSubject(<?=$subject->id?>)"><i class="mdi mdi-delete mr-1 text-muted"></i>Remove</a>
                                                                <?=(!$subject->blocked()) ? '<a style="cursor: pointer;" class="dropdown-item" onclick="blockSubject(' . $subject->id . ')"><i class="fe-slash mr-1 text-muted"></i>Deactivate</a>' : '<a style="cursor: pointer;" class="dropdown-item" onclick="activateSubject(' . $subject->id . ')"><i class="mdi mdi-library-plus mr-1 text-muted"></i>Activate</a>'?>
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
                <!-- end row-->
                
            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->

        <script language="javascript">
            function blockSubject(id)
            {
                if(confirm("Are you sure you want to block subject?")){
                    window.location.href='<?=$this->domain()?>' + '/admin-manager/block-subject/' + id;
                    return true;
                }
            }

            function activateSubject(id)
            {
                if(confirm("Are you sure you want to activate subject?")){
                    window.location.href='<?=$this->domain()?>' + '/admin-manager/activate-subject/' + id;
                    return true;
                }
            }

            function deleteSubject(id)
            {
                if(confirm("This action can't be reverted. Deleting a subject would delete every information associated with the subject including questions added already. Are you sure you want to delete?")){
                    window.location.href='<?=$this->domain()?>' + '/admin-manager/delete-subject/' + id;
                    return true;
                }
            }
        </script>

        <?php
            require_once 'includes/footer.php'; 
        ?>