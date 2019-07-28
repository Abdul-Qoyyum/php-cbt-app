<?php 
            $title = Config::get('default/project_title');
            $sub_title = 'Start Exam';

            $current_subject = Session::get('current_subject');
            $current_level = Session::get('level');

            //Session::delete('exm_dur');
            if(!Session::exists('exm_dur')){
                Session::put('exm_dur', SiteSettings::find(1)->timer * 60);
            }
            //echo $subject; echo $level;
           // echo $subject . '<br>';
            //echo $level;
            
            $questions = Question::where('level_id', (int) $current_level)->where('subject_id', (int) $current_subject)->get()->sortBy('no');
            $last_question_no = ($questions[count($questions) - 1])->no;
            if($data['no']){
                $qno = $data['no']; //question number
            }else{
                $qno = $questions[0]->no; //first question no available
            }
            Session::put('prev_qno', $qno); //Keeps track of previous question number
            
            function current_sub($id){
                if($id == Session::get('current_subject')){
                    return 'background-color: dodgerblue; color: white !important;';
                }
                return false;
            }

            //  Get current subject's key
            function get_curr_subject($val, $arr)
            {
                return array_search($val, $arr);
            }

            require_once 'includes/header.php'; 
        
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
                <!-- end page title --> 
                <div class="modal fade" id="centermodal" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myCenterModalLabel">Submit Exam</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <h5>Are you sure you want to submit?</h5>
                                <p><a class="btn btn-success" href="<?=$this->domain()?>/student-manager/submit-exam">Yes</a>  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">No</button></p>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                
                <div class="row">
                    <div class="offset-lg-1 col-lg-10 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <ul style="font-size: 20px;">
                                    <?php
                                        foreach(Session::get('subjects') as $subject => $value){
                                            echo '<a class="btn btn-primary" href="' . $this->domain() . '/student-manager/swipe-subjects/' . $value . '"><li class="text-center" style="width: 200px; height: 30px; line-height: 30px; float: left; margin: 5px; list-style: none;' . current_sub($value) . '">' . Subject::find($value)->subject . '</li></a>';
                                        } 
                                    ?>
                                    <button style="float: right;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#centermodal">Submit</button>
                                </ul>
                            </div>
                            <div class="card-body" id="question-body">
                                <div class="qno-tab">
                                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Questions <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <?php
                                            
                                            foreach($questions as $question){?>
                                                <li><a href="<?=$this->domain()?>/student/start-exam/<?=$question->no?>"><?=$question->no?></a></li><?php
                                                $index_of_subject = array_search($current_subject, Session::get('subjects'));
                                                if($index_of_subject == 0){
                                                    $correct_answers_first[$question->no] = $question->correct_answer;
                                                    Session::put('correct_answers_first', $correct_answers_first);
                                                }else if($index_of_subject == 1){
                                                    $correct_answers_second[$question->no] = $question->correct_answer;
                                                    Session::put('correct_answers_second', $correct_answers_second);
                                                }else if($index_of_subject == 2){
                                                    $correct_answers_third[$question->no] = $question->correct_answer;
                                                    Session::put('correct_answers_third', $correct_answers_third);
                                                }                                                //push the correct option for each question into the correct options array
                                                //$correct_options[$fetchQN['Qnumber']] = $fetchQN['CorrectOption'];
                                            }
                                            //$_SESSION['correct_options'] = $correct_options;
                                            
                                        ?>
                                    </ul>
                                   
                                </div>
                                <div id="timer"></div>
                                <script type="text/javascript">
                                    function timeIt() {
                                        var xmlhttp=new XMLHttpRequest();
                                        xmlhttp.open("GET", "<?=$this->domain()?>/student-manager/countdown", false);
                                        xmlhttp.send(null);
                                        rex = xmlhttp.responseText;
                                        if(rex == '00:10:00'){
                                            document.getElementById("timer").style.color = "red";
                                            //clearInterval(interval);
                                            //window.location='check.php';
                                        }
                                        if(rex == '00:00:00'){
                                            window.location='<?=$this->domain()?>/student/complete-time-up';
                                        }
                                        document.getElementById("timer").innerHTML=xmlhttp.responseText;
                                    }
                                    var interval = setInterval(timeIt, 1000);
                                </script>
                                <div class="text-center">Question <?=$qno?> of <?=$last_question_no?></div><br><br>
                                <div class="question-text-body">
                                    <?php
                                        $question = Question::where('subject_id', (int) $current_subject)->where('level_id', (int) $current_level)->where('no', $qno)->first();
                                        //print_r($correct_answers_first);
                                    ?>
                                    <div class="row">
                                        <?php
                                            if($question->image == NULL){?>
                                                <div class="col-lg-8">
                                                    <?=$question->text?>
                                                </div><?php
                                            }else{?>
                                                <div class="col-lg-4">
                                                    <img style="width: 100%; height: 100%;" class="img-responsive" src="<?=$this->domain()?>/<?=$question->image?>">
                                                </div>
                                                <div class="col-lg-4">
                                                    <?=$question->text?>
                                                </div><?php
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="question-options">
                                    <form id="form" role="form" action="<?=$this->domain()?>/student-manager/verify-answer/<?=$qno?>" method="post">
                                        <div>
                                            <label><input type="radio" name="option" value="A"> (A) <?=$question->a?></label>
                                        </div>
                                        <div>
                                            <label><input type="radio" name="option" value="B"> (B) <?=$question->b?></label>
                                        </div>
                                        <div>
                                            <label><input type="radio" name="option" value="C"> (C) <?=$question->c?></label>
                                        </div>
                                        <div>
                                            <label><input type="radio" name="option" value="D"> (D) <?=$question->d?></label>
                                        </div>
                                    </form>
                                </div>
                                <div class="selected-answers">
                                    <?php
                                        if(Session::exists('answers-tab')){
                                            $answers_tab = Session::get('answers-tab');
                                        // $answers_tab = sort($answers_tab);
                                            //print_r($answers_tab);
                                            foreach($answers_tab as $number => $option){?>
                                                <label id="answer-tab"><?php echo $number . ' ' . $option ?></label><?php
                                            }
                                            
                                        }
                                    ?>
                                </div>
                            </div> <!-- end card-body-->
                            <div class="card-footer" id="question-buttons">
                                <div class="row">
                                    <div class="col-lg-2 col-md-12">
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
                                        <a href="<?=$this->domain()?>/student-manager/next-subject/<?=$_SESSION['subjects'][$prev_sub_index]?>"><i class="mdi mdi-rewind"></i> Prev Subject</a>
                                    </div>
                                    <div class="col-lg-2 col-md-12">
                                        <a href="<?=$this->domain()?>/student/start-exam/<?=$qno - 1?>"><i class="mdi mdi-arrow-left-thick"></i> Previous</a>
                                    </div>
                                    <div class="col-lg-2 offset-lg-4 col-md-12">
                                        <a style="" onclick="document.getElementById('form').submit()"><i class="mdi mdi-arrow-right-thick"></i> Next</a>
                                    </div>
                                    <div class="col-lg-2 col-md-12">
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
                                        <a href="<?=$this->domain()?>/student-manager/next-subject/<?=$_SESSION['subjects'][$next_sub_index]?>"><i class="mdi mdi-fast-forward"></i> Next Subject</a>
                                    </div>
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
        