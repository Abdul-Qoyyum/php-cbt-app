        <?php 
            $title = Config::get('default/project_title');
            $sub_title = 'Check Results';
            require_once 'includes/header.php'; 

            //  Function to get the currently selected subject
            function current_sub($id)
            {
                if($id == Session::get('current_subject')){
                    return 'background-color: dodgerblue; color: white !important;';
                }
                return false;
            }

            //  Function o get the correct choice from DB
            function get_correct_choice($db, $pc)
            {
                if($db == $pc){
                    return 'style="color: green;"';
                }
                return false;
            }

            //  Variable to store the subject id from the subject selected to view the resultss
            if($data['id']){
                $subject_id = $data['id'];
            }else{
                $subject_id = (Session::get('subjects'))[0];
            }
            $level = Session::get('level');
            $no_of_questions = Question::where('level_id', $level)->where('subject_id', $subject_id)->get()->count();

            //  Variable to get the index of subject form the subjects array session
            $index_of_subject = array_search(Session::get('current_subject'), Session::get('subjects'));

            //  Variable to store the selected answers and correct answers from DB
            if($index_of_subject == 0){ //First Subject selected
                $selected_answers = Session::get('selected_answers_first');
                $correct_scores = Session::get('correct_answers_first');
            }else if($index_of_subject == 1){ // Second subject selected
                $selected_answers = Session::get('selected_answers_second');
                $correct_scores = Session::get('correct_answers_second');
            }else if($index_of_subject == 2){ // Third subject selected
                $selected_answers = Session::get('selected_answers_third');
                $correct_scores = Session::get('correct_answers_third');
            }


            function selected_answers($val, $arr)
            {
                if(key_exists($val, $arr)){
                    return $arr[$val];
                }
            }

            //  Function to check for the right answer
            function answer_is_right($option, $correct, $selected)
            {
                if($option == $selected){
                    if($correct != $selected){
                        return 'style="color: red;"';
                    }
                }
            }

            //  Score for each subject
            $score = 0;
            $total = $no_of_questions;
            foreach($selected_answers as $selected_answer => $option){
                if($correct_scores[$selected_answer] == $option){
                    $score++;
                }
            }

            //  Get current subject's key
            function get_curr_subject($val, $arr)
            {
                return array_search($val, $arr);
            }
        
        ?>

        <div class="wrapper">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box" id="start-exam-menu">
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
                
                <div class="row">
                    <div class="offset-lg-1 col-lg-10 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <ul style="font-size: 20px;">
                                    <?php
                                        foreach(Session::get('subjects') as $subject => $value){
                                            echo '<a class="btn btn-primary" href="' . $this->domain() . '/student/check-results/' . $value . '"><li class="text-center" style="width: 200px; height: 30px; line-height: 30px; float: left; margin: 5px; list-style: none;' . current_sub($value) . '">' . Subject::find($value)->subject . '</li></a>';
                                        } 
                                    ?>
                                    <a href="<?=$this->domain()?>/student/dashboard" class="btn btn-success">Start New Exam</a>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <h3>
                                        You scored <?=$score?> out of <?=$total?>
                                    </h3>
                                </div>
                                <?php
                                    $questions = Question::where('level_id', $level)->where('subject_id', $subject_id)->get();
                                    foreach($questions as $question){
                                        if($question->image == NULL){?>
                                            <div class="col-lg-8">
                                                <h4><?=$question->no?>. <?=$question->text?></h4>
                                            
                                                <h5 <?=answer_is_right('A', $question->correct_answer, selected_answers($question->no, $selected_answers))?> <?=get_correct_choice('A', $question->correct_answer)?>>A) <?=$question->a?></h5>
                                                <h5 <?=answer_is_right('B', $question->correct_answer, selected_answers($question->no, $selected_answers))?> <?=get_correct_choice('B', $question->correct_answer)?>>B) <?=$question->b?></h5>
                                                <h5 <?=answer_is_right('C', $question->correct_answer, selected_answers($question->no, $selected_answers))?> <?=get_correct_choice('C', $question->correct_answer)?>>C) <?=$question->c?></h5>
                                                <h5 <?=answer_is_right('D', $question->correct_answer, selected_answers($question->no, $selected_answers))?> <?=get_correct_choice('D', $question->correct_answer)?>>D) <?=$question->d?></h5>
                                            </div><br><?php
                                        }else{?>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <h4><?=$question->no?>.</h4>
                                                    <img style="width: 100%; height: 100%;" src="<?=$this->domain()?>/<?=$question->image?>" class="img-responsive">
                                                </div>
                                                <div class="col-lg-8">
                                                    <h4><?=$question->text?></h4>
                                                </div>
                                            </div><br><br>
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <h5 <?=answer_is_right('A', $question->correct_answer, selected_answers($question->no, $selected_answers))?> <?=get_correct_choice('A', $question->correct_answer)?>>A) <?=$question->a?></h5>
                                                    <h5 <?=answer_is_right('B', $question->correct_answer, selected_answers($question->no, $selected_answers))?> <?=get_correct_choice('B', $question->correct_answer)?>>B) <?=$question->b?></h5>
                                                    <h5 <?=answer_is_right('C', $question->correct_answer, selected_answers($question->no, $selected_answers))?> <?=get_correct_choice('C', $question->correct_answer)?>>C) <?=$question->c?></h5>
                                                    <h5 <?=answer_is_right('D', $question->correct_answer, selected_answers($question->no, $selected_answers))?> <?=get_correct_choice('D', $question->correct_answer)?>>D) <?=$question->d?></h5>
                                                </div>
                                            </div><?php
                                            
                                        }
                                    }
                                ?>
                            </div> <!-- end card-body-->
                            <div class="card-footer">
                                <div style="float: left;">
                                    <?php
                                        $curr_sub_index = get_curr_subject(Session::get('current_subject'), Session::get('subjects'));
                                        //echo $curr_sub_index . '<br>';
                                        //echo count(Session::get('subjects'))-1;
                                        if($curr_sub_index == 0){
                                            $prev_sub_index = $curr_sub_index;
                                        }else{
                                            $prev_sub_index = $curr_sub_index - 1;
                                        }
                                    ?>
                                    <a class="btn btn-info" href="<?=$this->domain()?>/student/check-results/<?=$_SESSION['subjects'][$prev_sub_index]?>"><i class="mdi mdi-rewind"></i> Prev Subject</a>
                                </div>
                                <div style="float: right;">
                                    <?php
                                        $curr_sub_index = get_curr_subject(Session::get('current_subject'), Session::get('subjects'));
                                        //echo $curr_sub_index . '<br>';
                                        //echo count(Session::get('subjects'))-1;
                                        if($curr_sub_index == (count(Session::get('subjects'))) - 1){
                                            $next_sub_index = $curr_sub_index;
                                        }else{
                                            $next_sub_index = $curr_sub_index + 1;
                                        }
                                    ?>
                                    <a class="btn btn-info" href="<?=$this->domain()?>/student/check-results/<?=$_SESSION['subjects'][$next_sub_index]?>"><i class="mdi mdi-fast-forward"></i> Next Subject</a>
                                </div>
                            </div>
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
        