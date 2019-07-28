<?php

    class StudentsController extends Controller
    {
        public function __construct()
        {
            $cookie_exist = Cookie::exists(Config::get('remember/student'));
            if($cookie_exist){
                $value_of_cookie = Cookie::get(Config::get('remember/student'));
                $student_id = StudentSession::where('hash', $value_of_cookie)->first()->student_id;
                Session::put(Config::get('session/student'), $student_id);
            }
           return ($this->student() || Cookie::exists(Config::get('remember/student'))) ? true : Redirect::to('/login');
        }

        public function index()
        {
            if(Session::exists('exam-started')){
                Redirect::to('/student/start-exam');
            }
            //Delete Sessions on time out
            Session::delete('level');
            Session::delete('subjects');
            Session::delete('selected_answers_first');
            Session::delete('selected_answers_second');
            Session::delete('selected_answers_third'); 

            Session::delete('correct_answers_first');
            Session::delete('correct_answers_second');
            Session::delete('correct_answers_third');
            Session::delete('current_subject');
            Session::delete('answers-tab');

            Session::delete('exm_dur');
            Session::delete('prev_qno');
            $this->view('student/index');
        }

        public function dashboard()
        {
            if(Session::exists('exam-started')){
                Redirect::to('/student/start-exam');
            }
            //Delete Sessions on time out
            Session::delete('level');
            Session::delete('subjects');
            Session::delete('selected_answers_first');
            Session::delete('selected_answers_second');
            Session::delete('selected_answers_third'); 

            Session::delete('correct_answers_first');
            Session::delete('correct_answers_second');
            Session::delete('correct_answers_third');
            Session::delete('current_subject');
            Session::delete('answers-tab');

            Session::delete('exm_dur');
            Session::delete('prev_qno');
            $this->view('student/index');
        }

        public function profile()
        {
            if(Session::exists('exam-started')){
                Redirect::to('/student/start-exam');
            }
            $this->view('student/profile');
        }

        public function selected_subjects()
        {
            if(Session::exists('exam-started')){
                Redirect::to('/student/start-exam');
            }
            Session::delete('complete');
            $this->view('student/selected-subjects');
        }

        public function start_exam($no = '')
        {
            if(Session::exists('complete')){
                Redirect::to('/student/check-results');
            }
            if(!Session::exists('exam-started')){
                Session::put('exam-started', true);
            }
            
            if($no != ''){
                $sel = Question::where('level_id', Session::get('level'))->where('subject_id', Session::get('current_subject'))->where('no', (int) $no)->first();
                if(!$sel){
                    $this->view('student/start-exam', ['no' => Session::get('prev_qno')]);
                }
            }
            $this->view('student/start-exam', ['no' => $no]);
        }

        public function complete_submit()
        {
            Session::put('complete', true);
            Session::delete('exam-started');
            $this->view('student/complete-submit');
        }

        public function complete_time_up()
        {
            Session::delete('exam-started');
            Session::put('complete', true);
            $this->view('student/complete-time-up');
        }

        public function check_results($id = '')
        {
            //print_r(Session::get('subjects')); die();
            if($id != ''){
                if(!in_array($id, Session::get('subjects'))){
                    Redirect::to('/student/check-results');
                }
            }
            if($id == ''){
                Session::put('current_subject', (Session::get('subjects'))[0]);
            }else{
                Session::put('current_subject', $id);
            }
            
            $this->view('student/check-results', ['id' => $id]);
        }
        
        public function logout()
        {
            session_destroy();
            Session::put('flash', $this->notifications('success', 'Logout Successful'));
            //Session::delete(Config::get('session/student'));
            Cookie::delete(Config::get('remember/student'));
            Redirect::to('/login');
        }
    }