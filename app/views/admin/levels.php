<?php 
            $title = Config::get('default/project_title');
            $sub_title = 'Levels';
        
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
                                <h4 class="header-title mb-3">Add Level</h4>
                                <form action="<?=$this->domain()?>/admin-manager/create-level" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
                                    <div class="form-group mb-3">
                                        <label for="validationCustom01">Level</label>
                                        <input type="text" class="form-control" name="level" id="validationCustom01" placeholder="Level" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid level.
                                        </div>
                                        <?=$this->InputError('level')?>
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
                                            <th>Level</th>
                                            <th>Date Created</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $levels = Level::all()->sortByDesc('id');
                                            $sn = 1;
                                            foreach($levels as $level){?>
                                                <tr>
                                                    <td><?=$sn?></td>
                                                    <td><?=$level->level?></td>
                                                    <td><?=$level->created_at->toFormattedDateString()?></td>
                                                    <td><?=($level->blocked()) ? '<span style="color: brown;">Blocked</span>' : '<span style="color: green;">Active</span>' ?></td>
                                                    <td>
                                                        <div class="btn-group dropdown">
                                                            <a href="javascript: void(0);" class="dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="<?=$this->domain()?>/admin/edit-level/<?=$level->id?>"><i style="color: dodgerblue; cursor pointer;" class="mdi mdi-pencil mr-1 text-muted"></i>Edit</a>
                                                                <a style="cursor: pointer;" class="dropdown-item" onclick="deleteLevel(<?=$level->id?>)"><i class="mdi mdi-delete mr-1 text-muted"></i>Remove</a>
                                                                <?=(!$level->blocked()) ? '<a style="cursor: pointer;" class="dropdown-item" onclick="blockLevel(' . $level->id . ')"><i class="fe-slash mr-1 text-muted"></i>Deactivate</a>' : '<a style="cursor: pointer;" class="dropdown-item" onclick="activateLevel(' . $level->id . ')"><i class="mdi mdi-library-plus mr-1 text-muted"></i>Activate</a>'?>
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
            function blockLevel(id)
            {
                if(confirm("Are you sure you want to block level?")){
                    window.location.href='<?=$this->domain()?>' + '/admin-manager/block-level/' + id;
                    return true;
                }
            }

            function activateLevel(id)
            {
                if(confirm("Are you sure you want to activate level?")){
                    window.location.href='<?=$this->domain()?>' + '/admin-manager/activate-level/' + id;
                    return true;
                }
            }

            function deleteLevel(id)
            {
                if(confirm("This action can't be reverted. Deleting a level would delete every information associated with the level including questions added already. Are you sure you want to delete?")){
                    window.location.href='<?=$this->domain()?>' + '/admin-manager/delete-level/' + id;
                    return true;
                }
            }
        </script>

        <?php
            require_once 'includes/footer.php'; 
        ?>