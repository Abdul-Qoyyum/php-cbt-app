<?php

    class LoginController extends Controller
    {
        public function __construct()
        {

        }

        public function index()
        {
            if(Session::exists(Config::get('session/student')) || Cookie::exists(Config::get('remember/student'))){
                Redirect::to('/student/dashboard');
            }
            $this->view('student/login');
        }

        public function admin_url()
        {
            if(Session::exists(Config::get('session/admin')) || Cookie::exists(Config::get('remember/admin'))){
                Redirect::to('/admin/dashboard');
            }
            $this->view('admin/login');
        }
    }

?>