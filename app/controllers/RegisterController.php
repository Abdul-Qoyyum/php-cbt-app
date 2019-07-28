<?php

    class RegisterController extends Controller
    {
        public function index($name = '')
        {
            $this->view('student/register');
        }
    }