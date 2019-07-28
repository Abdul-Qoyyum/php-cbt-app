        <?php 
            $title = Config::get('default/project_title');
            $sub_title = 'Edit Questions';
        
            require_once 'includes/header.php'; 
            $subjects = Subject::all();
            $levels = Level::all();

            $question = Question::find($data['id']);
        
        ?>
        
        <style>
            #cont {
                position: relative;
                text-align: center;
            }

            .img-center {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }

            #question_image:hover {
                opacity: 0.8;
            }
        </style>

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
                                    <li class="breadcrumb-item active">Update Question</li>
                                </ol>
                            </div>
                            <h4 class="page-title"><?=$sub_title?></h4>
                        </div>
                    </div>
                </div>     
                <!-- end page title --> 
                
                <script src="<?=$assets?>/ckeditor/ckeditor/ckeditor.js"></script>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="<?=$this->domain()?>/admin-manager/update-questions/<?=$data['id']?>" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
                                    <div class="form-group mb-3">
                                        <label for="validationCustom01">Question No</label>
                                        <input type="number" value="<?=$question->no?>" class="form-control" min="1" max="200" name="no" id="validationCustom01" placeholder="Question Number" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid quesion no.
                                        </div>
                                        <?=$this->InputError('no')?>
                                    </div>
                                    <div class="row" id="cont">
                                        <div class="col-lg-8">
                                            <div class="form-group mb-3">
                                                <label for="validationCustom01">Question Text</label>
                                                <textarea id="text" class="form-control" name="question_text" id="validationCustom01" placeholder="Question text" required><?=$question->text?></textarea>
                                                <div class="invalid-feedback">
                                                    Please provide a Question text.
                                                </div>
                                                <script> CKEDITOR.replace('text');</script>
                                                <?=$this->InputError('question_text')?>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label for="validationCustom01">Question Image</label>
                                                <div class="img-center">
                                                    <input onchange="form.submit()" type="file" id="question_image" name="question_image" style="display: none;">
                                                    <i onclick="document.getElementById('question_image').click()" style="color: green; cursor: pointer;" class="fa fa-plus-circle fa-2x"></i>
                                                </div>
                                                <img onclick="document.getElementById('question_image').click()" class="img-responsive" id="question_image" style="width: 100%; height: 100%; cursor: pointer;" src="<?=$this->domain()?>/<?=$question->image?>">
                                                <?=$this->InputError('image')?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="validationCustom01">Option A</label>
                                        <input type="text" class="form-control" name="a" value="<?=$question->a?>" id="validationCustom01" placeholder="Option A" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid option A.
                                        </div>
                                        <?=$this->InputError('a')?>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="validationCustom01">Option B</label>
                                        <input type="text" class="form-control" value="<?=$question->b?>" name="b" id="validationCustom01" placeholder="Option B" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid option B.
                                        </div>
                                        <?=$this->InputError('b')?>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="validationCustom01">Option C</label>
                                        <input type="text" class="form-control" value="<?=$question->c?>" name="c" id="validationCustom01" placeholder="Option C" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid option C.
                                        </div>
                                        <?=$this->InputError('b')?>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="validationCustom01">Option D</label>
                                        <input type="text" class="form-control" value="<?=$question->c?>" name="d" id="validationCustom01" placeholder="Option D" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid option D.
                                        </div>
                                        <?=$this->InputError('d')?>
                                    </div>
                                    <?php
                                        function select($val, $rule)
                                        {
                                            if($val == $rule){
                                                return 'selected';
                                            }
                                            return false;
                                        }
                                    ?>
                                    <div class="form-group mb-3">
                                        <label for="validationCustom01">Correct Answer</label>
                                        <select class="form-control" name="correct_answer" id="validationCustom01" placeholder="Option D" required>
                                            <option value="A" <?=select('A', $question->correct_answer)?>>A</option>
                                            <option value="B" <?=select('B', $question->correct_answer)?>>B</option>
                                            <option value="C" <?=select('C', $question->correct_answer)?>>C</option>
                                            <option value="D" <?=select('D', $question->correct_answer)?>>D</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please provide a valid option D.
                                        </div>
                                        <?=$this->InputError('d')?>
                                    </div>
                                    <?=Token::csrf()?>
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </form>

                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div>
                <!-- end row-->

                <div class="row">
                    
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="header-title">Questions for <?=Subject::find(Session::get('subject'))->subject?> (<?=Level::find(Session::get('level'))->level?>)</h4>
                                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>QN</th>
                                            <th>Question Text</th>
                                            <th>Option A</th>
                                            <th>Option B</th>
                                            <th>Option C</th>
                                            <th>Option D</th>
                                            <th>CA</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $questions = Question::where('level_id', Session::get('level'))->where('subject_id', Session::get('subject'))->get();
                                            foreach($questions as $question){?>
                                                <tr>
                                                    <td><?=$question->no?></td>
                                                    <td><?=$question->text?></td>
                                                    <td><?=$question->a?></td>
                                                    <td><?=$question->b?></td>
                                                    <td><?=$question->c?></td>
                                                    <td><?=$question->d?></td>
                                                    <td><?=$question->correct_answer?></td>
                                                    <td>
                                                        <div class="btn-group dropdown">
                                                            <a href="javascript: void(0);" class="dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="<?=$this->domain()?>/admin/edit-question/<?=$question->id?>"><i style="color: dodgerblue; cursor pointer;" class="mdi mdi-pencil mr-1 text-muted"></i>Edit</a>
                                                                <a style="cursor: pointer;" class="dropdown-item" onclick="deleteQuestion(<?=$question->id?>)"><i class="mdi mdi-delete mr-1 text-muted"></i>Remove</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr><?php
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

            function deleteQuestion(id)
            {
                if(confirm("This action can't be reverted. Are you sure you want to delete question?")){
                    window.location.href='<?=$this->domain()?>' + '/admin-manager/delete-question/' + id;
                    return true;
                }
            }
        </script>

        <?php
            require_once 'includes/footer.php'; 
        ?>