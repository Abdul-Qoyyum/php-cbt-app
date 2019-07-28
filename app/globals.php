<?php

    session_start();

    $GLOBALS['config'] = array(
        'mysql' => array(
            'host' => '127.0.0.1',
            'username' => 'root',
            'password' => '',
            'db' => 'fees_management'
        ),
        'remember' => array(
            'guardian' => 'guardian_cooki',
            'student' => 'student_cooki',
            'admin' => 'admin_cooki',
            'expiry' => 604800
        ),
        'session' => array(
            'guardian' => 'guardian_sess',
            'student' => 'student_sess',
            'admin' => 'admin_sess',
            'token_name' => 'token',
            'error' => 'errors'
        ),
        'default' => array(
            'project_title' => SiteSettings::find(1)->title,
            'project_description' => SiteSettings::find(1)->descriptiton,
            'domain' => 'http://' . $_SERVER['SERVER_NAME'],
            'profile_image' => 'profile.png',
            'logo' => SiteSettings::find(1)->logo,
            'currency' => 'NGN',
            'page' => 'index.php',
            'password' => 123456,
            'username' => 'devugo'
        )
    );


    $GLOBALS['route'] = array(
        'register' => 'RegisterController',
        'login' => 'LoginController',
        'forgot-password' => 'ForgotPasswordController',
        'home' => 'HomeController',
        'admin' => 'AdminController',
        'school' => 'SchoolsController',
        'guardian' => 'GuardiansController',
        'school-manager' => 'SchoolsManagerController',
        'admin-manager' => 'AdminManagerController',
        'guardian-manager' => 'GuardiansManagerController',
        'student' => 'StudentsController',
        'student-manager' => 'StudentsManagerController'
    );