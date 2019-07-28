<?php

    class StudentsManagerController extends Controller
    {
        public function __construct()
        {

        }

        public function authenticate()
        {
            if(Input::exists()){
                $validate = new Validate();
                $validation = $validate->check($_POST, array(
                    'email' => [
                        'required' => true
                    ],
                    'password' => [
                        'required' => true
                    ]
                ));
                if($validation->passed()){
                    $student = new Student();

                    $remember = (Input::get('remember') === 'on') ? true : false;
                    $login = $student->login(Input::get('email'), Input::get('password'), $remember);
                    if($login){ // If authentication is passed
                        Session::put('flash', $this->notifications('success', 'Welcome!'));
                        Redirect::to('/student/dashboard');
                    }else{ // If authentication was not passed
                        Session::put('flash', $this->notifications('danger', 'Invalid Credentials'));
                        Redirect::back();
                    }
                }
            }
            Redirect::back();
        }

        
        public function update_profile()
        {
            if(Input::exists()){
                $validate = new Validate();
                $validation = $validate->check($_POST, [
                    'lastname' => [
                        'required' => true,
                        'min' => 2,
                        'max' => 100
                    ],
                    'firstname' => [
                        'required' => true,
                        'min' => 2,
                        'max' => 100
                    ],
                    'middlename' => [
                        'required' => true,
                        'min' => 2,
                        'max' => 100
                    ],
                    'email' => [
                        'required' => true,
                        'min' => 10,
                        'max' => 100,
                        'uniquEdit' => 'Student.' . $this->student()->id
                    ]
                ]);
                if($validation->passed()){
                    $this->student()->update([
                        'lastname' => Input::get('lastname'),
                        'firstname' => Input::get('firstname'),
                        'middlename' => Input::get('middlename'),
                        'email' => Input::get('email')
                    ]);
                    Session::put('flash', $this->notifications('success', 'Profile was updated successfully'));
                }
            }
            Redirect::back();
        }

        public function change_password()
        {
            if(Input::exists()){
                $pass_hashed = Hash::make(Input::get('new_password'));
                if(password_verify(Input::get('old_password'), $this->admin()->password)){
                    //echo 'good'; die();
                    $validate = new Validate();
                    $validation = $validate->check($_POST, [
                        'new_password' => [
                            'required' => true,
                            'min' => 6,
                            'max' => 30
                        ],
                        'new_password_again' => [
                            'required' => true,
                            'matches' => 'new_password'
                        ]
                    ]);
                    if($validation->passed()){
                        //echo 'good'; die();
                        $this->student()->update([
                            'password' => $pass_hashed
                        ]);
                        Session::put('flash', $this->notifications('success', 'Password changed successfully'));
                        Redirect::back();
                    }
                }else{
                    $validate = new Validate();
                    $validate->addError("old_password", "Password is invalid.");
                    Redirect::back();
                }
            }
            Redirect::back();
        }

        public function update_student_profile_pix()
        {
            $directory 	= 'uploads/images/profile_pictures';
            $handle  = new Upload($_FILES['profile_pix']);
            if($handle->uploaded){
                $handle->process($directory);

                if($handle->processed){
                    $handle->clean();
                    $file_name  = $directory.'/'.$handle->file_dst_name;
                    $this->student()->update([
                        'profile_pix' => $file_name
                    ]);
                    Session::put('flash', $this->notifications('success', 'Profile Picture was updated successfully'));
                }
            }
            Redirect::back();
        }

        public function check_subjects()
        {
           // print_r($_POST); die();
           $level = Input::get('level');
           //echo $level; die();
            $keys = array_keys($_POST); 
            array_pop($keys);
            //print_r($keys); die();
            if(count($keys) != 3){
                Session::put('flash', $this->notifications('danger', 'Select exactly three subjects to proceed with your test'));
                Redirect::back();
            }
            $checker = 1; //checker to control current subject session
            foreach($keys as $key => $val){
                if($checker == 1){
                    Session::put('current_subject', $val);
                }
               // echo $val . '<br>';
               $q_count = Question::where('level_id', $level)->where('subject_id', $val)->get()->count();
               if($q_count < 1){
                    Session::put('flash', $this->notifications('danger', 'Questions have not been uploaded. Try again later'));
                    Redirect::back();
               } 
               $checker++;
            }
            Session::put('level', $level); // Session to hold selected level
            Session::put('subjects', $keys); // Session to hold selected subjects

            Session::put('selected_answers_first', array()); // Session to hold first subject selected answers
            Session::put('selected_answers_second', array()); // Session to hold second subject selected answers
            Session::put('selected_answers_third', array());    // Session to hold third subject selected answers
            //print_r(Session::get('subjects')); die();
            Redirect::to('/student/selected-subjects');
        }

        public function swipe_subjects($id = '')
        {
            //$index = array_search($id, Session::get('subjects'));
            //echo $index; die();
            if(in_array($id, Session::get('subjects'))){
                Session::put('current_subject', $id);

                $index_of_subject = array_search(Session::get('current_subject'), Session::get('subjects'));
                //echo $index_of_subject; die();
                if($index_of_subject == 0){ //First Subject selected
                    Session::put('answers-tab', Session::get('selected_answers_first'));
                }else if($index_of_subject == 1){ // Second subject selected
                    Session::put('answers-tab', Session::get('selected_answers_second'));
                }else if($index_of_subject == 2){ // Third subject selected
                    Session::put('answers-tab', Session::get('selected_answers_third'));
                }
            }
            //echo Session::get('current_subject'); die();
            Redirect::to('/student/start-exam');
        }

        public function verify_answer($id = '')
        {   
            $sel = Question::where('level_id', Session::get('level'))->where('subject_id', Session::get('current_subject'))->where('no', (int) $id)->first();
           // print_r($sel); die();
            if(!$sel) {
                //echo 'john'; die();
               Redirect::to('/student/start-exam/' . Session::get('prev_qno'));
            }
            //array_key_exists($correct);

            //print_r($sel); die();
            if(Input::exists()){
                //echo Input::get('option'); die();
                //print_r(Input::get('option')); die();
                //echo 'yeah'; die();
                $index_of_subject = array_search(Session::get('current_subject'), Session::get('subjects'));
                if($index_of_subject == 0){ //First Subject selected
                    $_SESSION['selected_answers_first'][$id] = Input::get('option');
                    Session::put('answers-tab', Session::get('selected_answers_first'));
                }else if($index_of_subject == 1){ // Second subject selected
                    $_SESSION['selected_answers_second'][$id] = Input::get('option');
                    Session::put('answers-tab', Session::get('selected_answers_second'));
                }else if($index_of_subject == 2){ // Third subject selected
                    $_SESSION['selected_answers_third'][$id] = Input::get('option');
                    Session::put('answers-tab', Session::get('selected_answers_third'));
                }
                //print_r(Session::get('selected_answers_third')); die();
                
            }
            $next = (int) $id+1;
            Redirect::to('/student/start-exam/' . $next);
        }
        
        public function next_subject($id = '')
        {
            //echo key($id, Session::get('subjects')); die();
            if(in_array($id, Session::get('subjects'))){
                Session::put('current_subject', $id);

                $index_of_subject = array_search(Session::get('current_subject'), Session::get('subjects'));
                //echo $index_of_subject; die();
                if($index_of_subject == 0){ //First Subject selected
                    Session::put('answers-tab', Session::get('selected_answers_first'));
                }else if($index_of_subject == 1){ // Second subject selected
                    Session::put('answers-tab', Session::get('selected_answers_second'));
                }else if($index_of_subject == 2){ // Third subject selected
                    Session::put('answers-tab', Session::get('selected_answers_third'));
                }
                
                Redirect::to('/student/start-exam');
            }
            Redirect::back();
        }

        public function prev_subject($id = '')
        {
            //echo key($id, Session::get('subjects')); die();
            if(in_array($id, Session::get('subjects'))){
                Session::put('current_subject', $id);
                Redirect::to('/student/start-exam');
            }
            Redirect::back();
        }

        public function countdown()
        {
            $_SESSION['exm_dur'] = $_SESSION['exm_dur'] - 1;
            $duration = $_SESSION['exm_dur'];

            if(3600 < $duration){
                $hr = floor($duration / 3600);
            }else{
                $hr = '0';
            }

            $sec_rem = $duration % 3600;
            $mins = floor($sec_rem / 60);
            $sec = $sec_rem % 60;

            if($sec > 9){
                $sec = $sec;
            }else{
                $sec = 0 . $sec;
            }

            if($mins > 9){
                $mins = $mins;
            }else{
                $mins = 0 . $mins;
            }

            if($hr > 9){
                $hr = $hr;
            }else{
                $hr = 0 . $hr;
            }

            $countdown = $hr . ':' . $mins . ':' . $sec;
            echo $countdown;
        }

        public function submit_exam()
        {
            $first_correct_scores = Session::get('correct_answers_first');
            $second_correct_scores = Session::get('correct_answers_second');
            $third_correct_scores = Session::get('correct_answers_third');

            $first_selected_choices = Session::get('selected_answers_first');
            $second_selected_choices = Session::get('selected_answers_second');
            $third_selected_choices = Session::get('selected_answers_third');

            echo '<pre>';
            print_r($first_correct_scores);
            print_r($second_correct_scores);
            print_r($third_correct_scores);

            print_r($first_selected_choices);
            print_r($second_selected_choices);
            print_r($third_selected_choices);

            Redirect::to('/student/complete-submit');
            
        }

        public function swipe_subjects_results($id = '')
        {
            print_r(Session::get('subjects')); die();
            $first_correct_scores = Session::get('correct_answers_first');
            $second_correct_scores = Session::get('correct_answers_second');
            $third_correct_scores = Session::get('correct_answers_third');

            $first_selected_choices = Session::get('selected_answers_first');
            $second_selected_choices = Session::get('selected_answers_second');
            $third_selected_choices = Session::get('selected_answers_third');

            echo '<pre>';
            print_r($first_correct_scores);
            print_r($second_correct_scores);
            print_r($third_correct_scores);

            print_r($first_selected_choices);
            print_r($second_selected_choices);
            print_r($third_selected_choices);
        }

        public function create_student()
        {
            if(Input::exists()){
                //echo '<pre>';
                //print_r($_POST); die();
                $validate = new Validate();
                $validation = $validate->check($_POST, array(
                    'lastname' => [
                        'required' => true,
                        'min' => 2,
                        'max' => 50
                    ],
                    'firstname' => [
                        'required' => true,
                        'min' => 2,
                        'max' => 50
                    ],
                    'middlename' => [
                        'required' => true,
                        'min' => 2,
                        'max' => 50
                    ],
                    'email' => [
                        'required' => true,
                        'unique' => 'Student'
                    ],
                    'password' => [
                        'required' => true
                    ]
                ));
                $str = 'qwertyuiopasdfghjklzxcvbnmPOIUYTREWQASDFGHJNBVCXZMKL1234567890';
                $str = str_shuffle($str);
                $token = substr($str, 0, 15);
                if($validation->passed()){
                    require_once 'vendor/autoload.php';
                    // Create the Transport
                    $transport = (new Swift_SmtpTransport('devugo.com', 25))
                    ->setUsername('mailer@devugo.com')
                    ->setPassword('Tubelum1234')
                    ;

                    // Create the Mailer using your created Transport
                    $mailer = new Swift_Mailer($transport);

                    // Create a message
                    $message = (new Swift_Message('Welcome Message'))
                    ->setFrom(['info@devugo.com' => 'CBT APP'])
                    ->setTo([Input::get('email') => Input::get('firstname')])
                    ->setBody('
                        Thanks for signing up!<br>
                    Your account has been created, you can login with the following credentials after you have activated your account by clicking on the url below or copy and paste on a new browser window.<br><br>

                    ------------------------<br>
                    email: ' . Input::get('email') . '<br>
                    Password: ' . Input::get('password') . '<br>
                    ------------------------<br><br>

                    Please click this link to activate your account:<br>
                    ' . $this->domain() . '/student-manager/verify-email/' . Input::get('email') . '/' . $token . '
                        ', 'text/html')
                    ;

                    // Send the message
                    $result = $mailer->send($message);

                    if($result == true){
                        Student::create([
                            'firstname' => Input::get('firstname'),
                            'lastname' => Input::get('lastname'),
                            'middlename' => Input::get('middlename'),
                            'email' => Input::get('email'),
                            'password' => Hash::make(Input::get('password')),
                            'token' => $token
                        ]);
                        
                        Session::put('flash', $this->notifications('success', 'You have been registered! Please verify your email!'));
                    }
                }
            }
            Redirect::back();
        }

        public function verify_email($email, $token)
        {
            $verify = Student::where('email', $email)->where('token', $token)->first();
            if($verify){
                Student::where('email', $email)->first()->update([
                    'verified' => date("Y-m-d H:i:s")
                ]);
                Session::put('flash', $this->notifications('success', 'Your account was verified successfully'));
                
            }else{
                Session::put('flash', $this->notifications('danger', 'Sorry, Could not verify your account'));
            }
            Redirect::to('/student/login');
        }

        public function not_verified()
        {
            Session::put('flash', $this->notifications('danger', 'Your account is not verified! Please, login to your email account to verify'));
            Redirect::to('/student/login');
        }

        public function send_password_reset_link()
        {
            if(Input::exists()){
                $validate = new Validate();
                $validation = $validate->check($_POST, array(
                    'email' => [
                        'required' => true
                    ]
                ));
                if($validation->passed()){
                    $token = 'qwertyuiopasdfghjklzxcvbnmPOIUYTREWQASDFGHJNBVCXZMKL1234567890';
                    $token = str_shuffle($token);
                    $token = substr($token, 0, 15);
                    $email_exists = Student::where('email', Input::get('email'))->first();
                    if(!$email_exists){
                        Session::put('flash', $this->notifications('danger', 'Invalid Email Address'));
                        Redirect::back();
                    }
                    require_once 'vendor/autoload.php';
                    // Create the Transport
                    $transport = (new Swift_SmtpTransport('devugo.com', 25))
                    ->setUsername('mailer@devugo.com')
                    ->setPassword('Tubelum1234')
                    ;

                    // Create the Mailer using your created Transport
                    $mailer = new Swift_Mailer($transport);

                    // Create a message
                    $message = (new Swift_Message('Password Reset'))
                    ->setFrom(['info@devugo.com' => 'CBT APP PASSWORD RESET'])
                    ->setTo([Input::get('email') => ''])
                    ->setBody('
                        Please click on the link below to reset your password or copy ans paste on a browser: <br><br>
                    ' . $this->domain() . '/forgot-password/create-new-password/' . Input::get('email') . '/' . $token . '
                        ', 'text/html')
                    ;

                    // Send the message
                    $result = $mailer->send($message);
                    if($result == true){
                        $exists = ResetPassword::where('email', Input::get('email'))->first();
                        if($exists){
                            $exists->update([
                                'token' => $token
                            ]);
                        }else{
                            ResetPassword::create([
                                'email' => Input::get('email'),
                                'token' => $token
                            ]);
                        }
                        Session::put('flash', $this->notifications('success', 'Password Reset link has been sent to your email'));
                    }else{
                        Session::put('flash', $this->notifications('danger', 'There was an error sending link. Try again Later!'));
                    }
                    
                }
            
            }
            Redirect::back();
        }

        public function reset_password()
        {
            //print_r($_POST); die();
            if(Input::exists()){
                $validate = new Validate();
                $validation = $validate->check($_POST, array(
                    'password' => [
                        'required' => true,
                        'min' => 6,
                        'max' => 25
                    ],
                    'password_again' => [
                        'required' => true,
                        'matches' => 'password'
                    ]
                ));

                if($validation->passed()){
                    $exists = ResetPassword::where('token', Input::get('hidden_token'))->where('email', Input::get('hidden_email'))->first();
                    if(!$exists){
                        Session::put('flash', $this->notifications('danger', 'Invalid Token'));
                        Redirect::back();
                    }

                    Student::where('email', Input::get('hidden_email'))->first()->update([
                        'password' => Hash::make(Input::get('password'))
                    ]);
                    Session::put('flash', $this->notifications('success', 'Password has been changed successfully'));
                    Redirect::to('/student/login');
                }
            }
            Redirect::back();
        }
        
        public function test()
        {
            require_once 'vendor/autoload.php';
            // Create the Transport
            $transport = (new Swift_SmtpTransport('devugo.com', 25))
            ->setUsername('mailer@devugo.com')
            ->setPassword('Tubelum1234')
            ;

            // Create the Mailer using your created Transport
            $mailer = new Swift_Mailer($transport);

            // Create a message
            $message = (new Swift_Message('Please subscribe my channel'))
            ->setFrom(['info@devugo.com' => 'Ugo Eze'])
            ->setTo(['ugonnaezenwankwo@gmail.com' => 'Devugo Designs'])
            ->setBody('
                Thanks for signing up!<br>
            Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.<br><br><br>

            ------------------------<br>
            Username: hugo<br>
            Password: Tubelum1234<br>
            ------------------------<br><br>

            Please click this link to activate your account:<br>
            http://www.devugo.com/verify.php?email=ugoezenwankwo@gmail.com&hash=ldlo4oewol
                ', 'text/html')
            ;

            // Send the message
            $result = $mailer->send($message);
            echo Hash::make('admin1234');
        }
    }
?>