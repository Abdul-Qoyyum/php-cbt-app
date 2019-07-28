<?php

    class AdminController extends Controller
    {
        public function __construct()
        {
            $cookie_exist = Cookie::exists(Config::get('remember/admin'));
            if($cookie_exist){
                $value_of_cookie = Cookie::get(Config::get('remember/admin'));
                $admin_id = AdminSession::where('hash', $value_of_cookie)->first()->admin_id;
                Session::put(Config::get('session/admin'), $admin_id);
            }
           return ($this->admin() || Cookie::exists(Config::get('remember/admin'))) ? true : Redirect::to('/login/admin_url');
        }

        public function index()
        {
            $this->view('admin/index');
        }

        public function dashboard()
        {
            $this->view('admin/index');
        }

        public function students()
        {
            $this->view('admin/students');
        }

        public function edit_student($id = '')
        {
            if($id != ''){
                $student_exist = Student::find($id);
                if(!$student_exist){
                    Redirect::to('/admin/students');
                }
            }else{
                Redirect::to('/admin/students');
            }
            $this->view('admin/edit-student', ['id' => $id]);
        }

        public function levels()
        {
            $this->view('admin/levels');
        }

        public function edit_level($id = '')
        {
            if($id != ''){
                $level_exist = Level::find($id);
                if(!$level_exist){
                    Redirect::to('/admin/levels');
                }
            }else{
                Redirect::to('/admin/levels');
            }
            $this->view('admin/edit-level', ['id' => $id]);
        }

        public function subjects()
        {
            $this->view('admin/subjects');
        }

        public function edit_subject($id = '')
        {
            if($id != ''){
                $subject_exist = Subject::find($id);
                if(!$subject_exist){
                    Redirect::to('/admin/subjects');
                }
            }else{
                Redirect::to('/admin/subjects');
            }
            $this->view('admin/edit-subject', ['id' => $id]);
        }

        public function questions()
        {
            $this->view('admin/questions');
        }

        public function add_questions()
        {
            if(!Session::exists('subject') || !Session::exists('level')){
                Redirect::back();
            }
            $this->view('admin/add-questions');
        }

        public function edit_question($id = '')
        {
            if($id != ''){
                $question_exist = Question::find($id);
                if(!$question_exist){
                    Redirect::to('/admin/questions');
                }
            }else{
                Redirect::to('/admin/questions');
            }

            $this->view('admin/edit-question', ['id' => $id]);
        }

        public function home_page()
        {
            $this->view('admin/home-page');
        }

        public function blog()
        {
            $this->view('admin/blog');
        }

        public function edit_blog_post($id = '')
        {
            if($id != ''){
                $post = Blog::find($id);
                if(!$post){
                    Redirect::to('/admin/blog');
                }
            }else{
                Redirect::to('/admin/blog');
            }
            $this->view('admin/edit-blog-post', ['id' => $id]);
        }

        public function profile()
        {
            $this->view('admin/profile');
        }

        public function timer()
        {
            $this->view('admin/timer');
        }
        
        public function logout()
        {
            Session::put('flash', $this->notifications('success', 'Logout Successful'));
            Session::delete(Config::get('session/admin'));
            Session::delete(Config::get('session/school'));
            Cookie::delete(Config::get('remember/admin'));
            Redirect::to('/login/admin_url');
        }
    }