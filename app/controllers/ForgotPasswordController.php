<?php

    class ForgotPasswordController extends Controller
    {
        public function __construct()
        {

        }

        public function index()
        {
            $this->view('student/forgot-password');
        }

        public function create_new_password($email = '', $token = '')
        {
            if($token == '' || $email == ''){
                Redirect::to('/home');
            }
            $this->view('student/create-new-password', ['email' => $email, 'token' => $token]);
        }
    }

?>