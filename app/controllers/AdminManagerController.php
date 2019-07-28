<?php

    class AdminManagerController extends Controller
    {
        public function __construct()
        {

        }

        public function authenticate()
        {
            if(Input::exists()){
                $validate = new Validate();
                $validation = $validate->check($_POST, array(
                    'username' => [
                        'required' => true
                    ],
                    'password' => [
                        'required' => true
                    ]
                ));
                if($validation->passed()){
                    $admin = new Admin();

                    $remember = (Input::get('remember') === 'on') ? true : false;
                    $login = $admin->login(Input::get('username'), Input::get('password'), $remember);
                    if($login){ // If authentication is passed
                        Session::put('flash', $this->notifications('success', 'Welcome Admin'));
                        Redirect::to('/admin/dashboard');
                    }else{ // If authentication was not passed
                        Session::put('flash', $this->notifications('danger', 'Invalid Credentials'));
                        Redirect::back();
                    }
                }
            }
            Redirect::back();
        }

        public function create_student()
        {
            if(Input::exists()){
                if(Token::check(Input::get('token'))){
                    $validate = new Validate();
                    $validation = $validate->check($_POST, Student::$student_rules);
                    if($validation->passed()){
                        Student::create([
                            'firstname' => Input::get('firstname'),
                            'middlename' => Input::get('middlename'),
                            'lastname' => Input::get('lastname'),
                            'email' => Input::get('email'),
                            'password' => Hash::make(Config::get('default/password'))
                        ]);

                        $directory 	= 'uploads/images/profile_pictures';
                        $handle  = new Upload($_FILES['profile_pix']);
                        if($handle->uploaded){
                            $handle->process($directory);

                            if($handle->processed){
                                $handle->clean();
                                $file_name  = $directory.'/'.$handle->file_dst_name;
                                Student::where('email', Input::get('email'))->update([
                                    'profile_pix' => $file_name
                                ]);
                            }
                        }
                        Session::put('flash', $this->notifications('success', 'Student created successfullly'));
                    }
                }
            }
            Redirect::back();
        }

        public function activate_student($id = '')
        {
            if($id != ''){
                $student_exist = Student::find($id);
                if(!$student_exist){
                    Redirect::to('/admin/students');
                }
            }else{
                Redirect::to('/admin/students');
            }

            Student::find($id)->update([
                'blocked_on' => NULL
            ]);
            Session::put('flash', $this->notifications('success', 'Student Activated Successfully'));
            Redirect::back();
        }

        public function block_student($id = '')
        {
            if($id != ''){
                $student_exist = Student::find($id);
                if(!$student_exist){
                    Redirect::to('/admin/students');
                }
            }else{
                Redirect::to('/admin/students');
            }

            Student::find($id)->update([
                'blocked_on' => date("Y-m-d H:i:s")
            ]);
            Session::put('flash', $this->notifications('success', 'Student Blocked Successfully'));
            Redirect::back();
        }

        public function reset_student_password($id = '')
        {
            if($id != ''){
                $student_exist = Student::find($id);
                if(!$student_exist){
                    Redirect::to('/admin/students');
                }
            }else{
                Redirect::to('/admin/students');
            }

            Student::find($id)->update([
                'password' => Hash::make(Config::get('default/password'))
            ]);

            Session::put('flash', $this->notifications('success', 'Password Reset Successful'));
            Redirect::back();
        }

        public function update_student($id = '')
        {
            if($id != ''){
                $student_exist = Student::find($id);
                if(!$student_exist){
                    Redirect::to('/admin/students');
                }
            }else{
                Redirect::to('/admin/students');
            }

            if(Input::exists()){
                if(Token::check(Input::get('token'))){
                    $validate = new Validate();
                    $validation = $validate->check($_POST, [
                        'firstname'=> [
                            'required' => true,
                            'min' => 3,
                            'max' =>20
                        ],
                        'middlename'=> [
                            'required' => true,
                            'min' => 3,
                            'max' =>20
                        ],
                        'lastname'=> [
                            'required' => true,
                            'min' => 3,
                            'max' =>20
                        ],
                        'email' => [
                            'required' => true,
                            'min' => 3,
                            'uniquEdit' => 'Student.' . $id
                        ]
                    ]);
                    if($validation->passed()){
                        Student::find($id)->update([
                            'firstname' => Input::get('firstname'),
                            'lastname' => Input::get('lastname'),
                            'middlename' => Input::get('middlename'),
                            'email' => Input::get('email')
                        ]);

                        Session::put('flash', $this->notifications('success', 'Student Information Updated Successfully'));
                        
                    }
                }
            }
            Redirect::back();
        }

        public function delete_student($id = '')
        {
            if($id != ''){
                $student_exist = Student::find($id);
                if(!$student_exist){
                    Redirect::to('/admin/students');
                }
            }else{
                Redirect::to('/admin/students');
            }

            Student::destroy($id);
            Session::put('flash', $this->notifications('success', 'Student Deleted Successfully'));
            Redirect::back();
        }

        public function update_student_profile_pix($id = '')
        {
            if($id != ''){
                $student_exist = Student::find($id);
                if(!$student_exist){
                    Redirect::to('/admin/students');
                }
            }else{
                Redirect::to('/admin/students');
            }

            $directory 	= 'uploads/images/profile_pictures';
            $handle  = new Upload($_FILES['profile_pix']);
            if($handle->uploaded){
                $handle->process($directory);

                if($handle->processed){
                    $handle->clean();
                    $file_name  = $directory.'/'.$handle->file_dst_name;
                    Student::find($id)->update([
                        'profile_pix' => $file_name
                    ]);

                    Session::put('flash', $this->notifications('success', 'Profile Updated Successfully'));
                    Redirect::back();
                }
            }
            

        }

        public function create_level()
        {
            if(Input::exists()){
                if(Token::check(Input::get('token'))){
                    $validate = new Validate();
                    $validation = $validate->check($_POST, Level::$level_rules);
                    if($validation->passed()){
                        Level::create([
                            'level' => Input::get('level')
                        ]);

                        Session::put('flash', $this->notifications('success', 'Level was added successfully'));
                    }

                }
            }
            Redirect::back();
        }

        public function update_level($id = '')
        {
            if($id != ''){
               $level_exist = Level::find($id);
                if(!$level_exist){
                    Redirect::to('/admin/levels');
                }
            }else{
                Redirect::to('/admin/levels');
            }

            if(Input::exists()){
                if(Token::check(Input::get('token'))){
                    $validate = new Validate();
                    $validation = $validate->check($_POST, [
                        'level' => [
                            'required' => true,
                            'min' => 2,
                            'max' => 30,
                            'uniquEdit' => 'Level.' . $id
                        ]
                    ]);
                    if($validation->passed()){
                        Level::find($id)->update([
                            'level' => Input::get('level')
                        ]);

                        Session::put('flash', $this->notifications('success', 'Level was updated successfully'));
                    }
                }
            }
            Redirect::back();
        }

        public function block_level($id = '')
        {
            if($id != ''){
                $level_exist = Level::find($id);
                if(!$level_exist){
                    Redirect::to('/admin/levels');
                }
            }else{
                Redirect::to('/admin/levels');
            }

            Level::find($id)->update([
                'blocked_on' => date("Y-m-d H:i:s")
            ]);
            Session::put('flash', $this->notifications('success', 'Level blocked successfully'));
            Redirect::back();
        }

        public function activate_level($id = '')
        {
            if($id != ''){
                $level_exist = Level::find($id);
                if(!$level_exist){
                    Redirect::to('/admin/levels');
                }
            }else{
                Redirect::to('/admin/levels');
            }

            Level::find($id)->update([
                'blocked_on' => NULL
            ]);
            Session::put('flash', $this->notifications('success', 'Level Activated Successfully'));
            Redirect::back();
        }

        public function delete_level($id = '')
        {
            if($id != ''){
                $level_exist = Level::find($id);
                if(!$level_exist){
                    Redirect::to('/admin/levels');
                }
            }else{
                Redirect::to('/admin/levels');
            }

            Level::destroy($id);
            Session::put('flash', $this->notifications('success', 'Level Deleted Successfully'));
            Redirect::back();
        }

        public function create_subject()
        {
            if(Input::exists()){
                if(Token::check(Input::get('token'))){
                    $validate = new Validate();
                    $validation = $validate->check($_POST, Subject::$subject_rules);
                    if($validation->passed()){
                        Subject::create([
                            'subject' => Input::get('subject')
                        ]);

                        Session::put('flash', $this->notifications('success', 'Subject was added successfully'));
                    }

                }
            }
            Redirect::back();
        }

        public function update_subject($id = '')
        {
            if($id != ''){
               $subject_exist = Subject::find($id);
                if(!$subject_exist){
                    Redirect::to('/admin/subjects');
                }
            }else{
                Redirect::to('/admin/subjects');
            }

            if(Input::exists()){
                if(Token::check(Input::get('token'))){
                    $validate = new Validate();
                    $validation = $validate->check($_POST, [
                        'subject' => [
                            'required' => true,
                            'min' => 2,
                            'max' => 30,
                            'uniquEdit' => 'Subject.' . $id
                        ]
                    ]);
                    if($validation->passed()){
                        Subject::find($id)->update([
                            'subject' => Input::get('subject')
                        ]);

                        Session::put('flash', $this->notifications('success', 'Subject was updated successfully'));
                    }
                }
            }
            Redirect::back();
        }

        public function block_subject($id = '')
        {
            if($id != ''){
                $subject_exist = Subject::find($id);
                if(!$subject_exist){
                    Redirect::to('/admin/subjects');
                }
            }else{
                Redirect::to('/admin/subjects');
            }

            Subject::find($id)->update([
                'blocked_on' => date("Y-m-d H:i:s")
            ]);
            Session::put('flash', $this->notifications('success', 'Subject blocked successfully'));
            Redirect::back();
        }

        public function activate_subject($id = '')
        {
            if($id != ''){
                $subject_exist = Subject::find($id);
                if(!$subject_exist){
                    Redirect::to('/admin/subjects');
                }
            }else{
                Redirect::to('/admin/subjects');
            }

            Subject::find($id)->update([
                'blocked_on' => NULL
            ]);
            Session::put('flash', $this->notifications('success', 'Subject Activated Successfully'));
            Redirect::back();
        }

        public function delete_subject($id = '')
        {
            if($id != ''){
                $subject_exist = Subject::find($id);
                if(!$subject_exist){
                    Redirect::to('/admin/subjects');
                }
            }else{
                Redirect::to('/admin/subjects');
            }

            Subject::destroy($id);
            Session::put('flash', $this->notifications('success', 'Subject Deleted Successfully'));
            Redirect::back();
        }

        public function upload_logo()
        {
            $directory 	= 'uploads/images/logos';
            $handle  = new Upload($_FILES['logo']);
            if($handle->uploaded){
                $handle->process($directory);

                if($handle->processed){
                    $handle->clean();
                    $file_name  = $directory.'/'.$handle->file_dst_name;
                    $this->admin()->update([
                        'logo' => $file_name
                    ]);
                    Session::put('flash', $this->notifications('success', 'Logo Updated'));
                }
            }
            
            Redirect::back();
        }

        public function update_home_page()
        {
            if(Input::exists()){
                if(Token::check(Input::get('token'))){
                    $validate = new Validate();
                    $validation = $validate->check($_POST, [
                        'home' => [
                            'required' => true,
                            'min' => 10
                        ],
                        'about' => [
                            'required' => true,
                            'min' => 10
                        ],
                        'feature1_title' => [
                            'required' => true,
                            'min' => 3
                        ],
                        'feature2_title' => [
                            'required' => true,
                            'min' => 3
                        ],
                        'feature3_title' => [
                            'required' => true,
                            'min' => 3
                        ],
                        'feature4_title' => [
                            'required' => true,
                            'min' => 3
                        ],
                        'feature1_description' => [
                            'required' => true,
                            'min' => 3
                        ],
                        'feature2_description' => [
                            'required' => true,
                            'min' => 3
                        ],
                        'feature3_description' => [
                            'required' => true,
                            'min' => 3
                        ],
                        'feature4_description' => [
                            'required' => true,
                            'min' => 3
                        ],
                        'phone' => [
                            'required' => true,
                            'min' => 11
                        ],
                        'address' => [
                            'required' => true,
                            'min' => 7
                        ],
                        'email' => [
                            'required' => true,
                            'min' => 7
                        ],
                        'title' => [
                            'required' => true,
                            'min' => 3
                        ],
                        'description' => [
                            'required' => true,
                            'min' => 5
                        ]
                    ]);
                    if($validation->passed()){
                        SiteSettings::find(1)->update([
                            'title' => Input::get('title'),
                            'description' => Input::get('description'),
                            'home' => Input::get('home'),
                            'about' => Input::get('about'),
                            'feature1_title' => Input::get('feature1_title'),
                            'feature2_title' => Input::get('feature2_title'),
                            'feature3_title' => Input::get('feature3_title'),
                            'feature4_title' => Input::get('feature4_title'),
                            'feature1_description' => Input::get('feature1_description'),
                            'feature2_description' => Input::get('feature2_description'),
                            'feature3_description' => Input::get('feature3_description'),
                            'feature4_description' => Input::get('feature4_description'),
                            'phone' => Input::get('phone'),
                            'email' => Input::get('email'),
                            'address' => Input::get('address')
                        ]);
                        if(!empty($_FILES['logo'])){
                            $directory 	= 'uploads/images/logos';
                            $handle  = new Upload($_FILES['logo']);
                            if($handle->uploaded){
                                $handle->process($directory);

                                if($handle->processed){
                                    $handle->clean();
                                    $file_name  = $directory.'/'.$handle->file_dst_name;
                                    SiteSettings::find(1)->update([
                                        'logo' => $file_name
                                    ]);
                                }
                            }
                        }
                        if(!empty($_FILES['background'])){
                            $directory 	= 'uploads/images/background';
                            $handle  = new Upload($_FILES['background']);
                            if($handle->uploaded){
                                $handle->process($directory);

                                if($handle->processed){
                                    $handle->clean();
                                    $file_name  = $directory.'/'.$handle->file_dst_name;
                                    SiteSettings::find(1)->update([
                                        'background' => $file_name
                                    ]);
                                }
                            }
                        }
                        Session::put('flash', $this->notifications('success', 'Website updated successfully'));
                    }
                }
            }
            Redirect::back();
        }

        public function add_blog_post()
        {
            if(Input::exists()){
                if(Token::check(Input::get('token'))){
                    $validate = new Validate();
                    $validation = $validate->check($_POST, Blog::$blog_rules);
                    if($validation->passed()){
                        Blog::create([
                            'title' => Input::get('title'),
                            'description' => Input::get('description')
                        ]);

                        $directory 	= 'uploads/images/blog';
                        $handle  = new Upload($_FILES['image']);
                        if($handle->uploaded){
                            $handle->process($directory);

                            if($handle->processed){
                                $handle->clean();
                                $file_name  = $directory.'/'.$handle->file_dst_name;
                                Blog::where('title', Input::get('title'))->update([
                                    'image' => $file_name
                                ]);
                            }
                        }
                        
                        Session::put('flash', $this->notifications('success', 'Blog Post added successfully'));
                    }
                }
            }
            Redirect::back();
        }
        
        public function block_blog_post($id = '')
        {
            if($id != ''){
                $post = Blog::find($id);
                if(!$post){
                    Redirect::to('/admin/blog');
                }
            }else{
                Redirect::to('/admin/blog');
            }

            Blog::find($id)->update([
                'blocked_on' => date("Y-m-d H:i:s")
            ]);
            Session::put('flash', $this->notifications('success', 'Blog Post deactivated successfully'));
            Redirect::back();
        }

        public function activate_blog_post($id = '')
        {
            if($id != ''){
                $post = Blog::find($id);
                if(!$post){
                    Redirect::to('/admin/blog');
                }
            }else{
                Redirect::to('/admin/blog');
            }

            Blog::find($id)->update([
                'blocked_on' => NULL
            ]);
            Session::put('flash', $this->notifications('success', 'Blog Post Activated Successfully'));
            Redirect::back();
        }

        public function delete_blog_post($id = '')
        {
            if($id != ''){
                $post = Blog::find($id);
                if(!$post){
                    Redirect::to('/admin/blog');
                }
            }else{
                Redirect::to('/admin/blog');
            }

            Blog::destroy($id);
            Session::put('flash', $this->notifications('success', 'Blog Post Deleted Successfully'));
            Redirect::back();
        }

        public function update_blog_post($id = '')
        {
            if(Input::exists()){
                if(Token::check(Input::get('token'))){
                    $validate = new Validate();
                    $validation = $validate->check($_POST, [
                        'title' => [
                            'required' => true,
                            'min' => 3
                        ],
                        'description' => [
                            'required' => true,
                            'min' => 5
                        ]
                    ]);
                    if($validation->passed()){
                        Blog::find($id)->update([
                            'title' => Input::get('title'),
                            'description' => Input::get('description')
                        ]);
                        if(!empty($_FILES['image'])){
                            $directory 	= 'uploads/images/blog';
                            $handle  = new Upload($_FILES['image']);
                            if($handle->uploaded){
                                $handle->process($directory);

                                if($handle->processed){
                                    $handle->clean();
                                    $file_name  = $directory.'/'.$handle->file_dst_name;
                                    Blog::find($id)->update([
                                        'image' => $file_name
                                    ]);
                                }
                            }
                        }
                        Session::put('flash', $this->notifications('success', 'Blog Post was updated successfully'));
                    }
                }
            }
            Redirect::back();
        }

        public function select_level_subject()
        {
            Session::put('level', Input::get('level'));
            Session::put('subject', Input::get('subject'));

            Redirect::to('/admin/add-questions');
        }

        public function upload_questions()
        {
            if(Input::exists()){
                $fileName = $_FILES['question']['name'];
                $fileTmpName = $_FILES['question']['tmp_name'];

                //lets find the extension of file
                $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
                
                //define your allowed extension
				$allowedType = array('csv');
                if(!in_array($fileExtension, $allowedType)){
                    Session::put('flash', $this->notifications('danger', 'Invalid File Extension. Please upload a csv file'));
                }else{
                    $handle = fopen($fileTmpName, 'r'); //read mode 'r'
                    $checker = 0;
                    $errors = 0;
                    $invalid_questions = 'The Questions with numbers given already exist: ';

                    while(($myData = fgetcsv($handle, 1000, ',')) !== FALSE){ 
                        if($checker == 0){
                            $checker++;
                            continue;
                        }
                        $qNo = $myData[0];
                        $qText = $myData[1];
                        $a = $myData[2];
                        $b = $myData[3];
                        $c = $myData[4];
                        $d = $myData[5];
                        $correct_answer = $myData[6];

                        $question_exists = Question::where('subject_id', Session::get('subject'))->where('level_id', Session::get('level'))->where('no', $qNo)->first();
                        if(!$question_exists){
                            Question::create([
                                'level_id' => Session::get('level'),
                                'subject_id' => Session::get('subject'),
                                'no' => $qNo,
                                'text' => $qText,
                                'a' => $a,
                                'b' => $b,
                                'c' => $c,
                                'd' => $d,
                                'correct_answer' => $correct_answer
                            ]);
                        }else{
                            $invalid_questions .= $qNo . ', ';
                            $errors++;
                        }
                    }
                    ($errors > 0) ? Session::put('flash', $this->notifications('danger', $invalid_questions)) : Session::put('flash', $this->notifications('success', 'Questions were uploaded successfully'));
                }
            }
            Redirect::back();
        }

        public function create_questions()
        {
            //$question = Question::where('level_id', Session::get('level'))->where('subject_id', Session::get('subject'))->where('no', 2);
            //echo '<pre>';
            //print_r($question); die();
            if(Input::exists()){
                if(Token::check(Input::get('token'))){
                    $validate = new Validate();
                    $validation = $validate->check($_POST, [
                        'no' => [
                            'required' => true,
                            'min' => 1,
                            'numeric' => true,
                            'unique' => Question::where('level_id', Session::get('level'))->where('subject_id', Session::get('subject'))
                        ],
                        'question_text' => [
                            'required' => true,
                            'min' => 3
                        ],
                        'a' => [
                            'required' => true,
                            'min' => 1
                        ],
                        'b' => [
                            'required' => true,
                            'min' => 1
                        ],
                        'c' => [
                            'required' => true,
                            'min' => 1
                        ],
                        'd' => [
                            'required' => true,
                            'min' => 1
                        ],
                        'correct_answer' => [
                            'required' => true,
                            'min' => 1,
                            'max' => 1
                        ],
                    ]);
                    if($validation->passed()){
                        Question::create([
                            'level_id' => Session::get('level'),
                            'subject_id' => Session::get('subject'),
                            'no' => Input::get('no'),
                            'text' => Input::get('question_text'),
                            'a' => Input::get('a'),
                            'b' => Input::get('b'),
                            'c' => Input::get('c'),
                            'd' => Input::get('d'),
                            'correct_answer' => Input::get('correct_answer')
                        ]);

                        $directory 	= 'uploads/images/questions';
                        $handle  = new Upload($_FILES['image']);
                        if($handle->uploaded){
                            $handle->process($directory);

                            if($handle->processed){
                                $handle->clean();
                                $file_name  = $directory.'/'.$handle->file_dst_name;
                                $question = Question::where('level_id', Session::get('level'))->where('subject_id', Session::get('subject'))->where('no', Input::get('no'));
                                $question->update([
                                    'image' => $file_name
                                ]);
                            }
                        }
                        Session::put('flash', $this->notifications('success', 'Question was added successfully'));
                    }
                }
            }
            Redirect::back();
        }

        public function upload_question_image($id = '')
        {
            echo '<pre>';
            print_r($_FILES); die();
            if($id != ''){
                $question = Question::find($id);
                if(!$post){
                    Redirect::to('/admin/questions');
                }
            }else{
                Redirect::to('/admin/questions');
            }

            $directory 	= 'uploads/images/questions';
            $handle  = new Upload($_FILES['question_image']);
            if($handle->uploaded){
                $handle->process($directory);

                if($handle->processed){
                    $handle->clean();
                    $file_name  = $directory.'/'.$handle->file_dst_name;
                    Question::find($id)->update([
                        'image' => $file_name
                    ]);

                    Session::put('flash', $this->notifications('success', 'Question image was uploaded succesfully'));
                }
            }
            Redirect::back();
        }

        public function update_questions($id = '')
        {
            //echo 'nah'; die();
           // echo '<pre>';
            //print_r($_FILES); die();
            if($id != ''){
                $question = Question::find($id);
                if(!$question){
                    Redirect::to('/admin/questions');
                }
            }else{
                Redirect::to('/admin/questions');
            }

            if(!empty($_FILES['question_image']['name'])){
                //echo 'nah'; die();
                $directory 	= 'uploads/images/questions';
                $handle  = new Upload($_FILES['question_image']);
                if($handle->uploaded){
                    $handle->process($directory);

                    if($handle->processed){
                        $handle->clean();
                        $file_name  = $directory.'/'.$handle->file_dst_name;
                        Question::find($id)->update([
                            'image' => $file_name
                        ]);

                        Session::put('flash', $this->notifications('success', 'Question image was updated succesfully'));
                    }
                }
                Redirect::back();
            }else{
                //echo 'checked'; die();
                if(Input::exists()){
                    if(Token::check(Input::get('token'))){
                        $validate = new Validate();
                        $validation = $validate->check($_POST, [
                            'no' => [
                                'required' => true,
                                'min' => 1,
                                'numeric' => true,
                                'unique' => Question::where('level_id', Session::get('level'))->where('subject_id', Session::get('subject'))->where('id', '!=', $id)
                            ],
                            'question_text' => [
                                'required' => true,
                                'min' => 3
                            ],
                            'a' => [
                                'required' => true,
                                'min' => 1
                            ],
                            'b' => [
                                'required' => true,
                                'min' => 1
                            ],
                            'c' => [
                                'required' => true,
                                'min' => 1
                            ],
                            'd' => [
                                'required' => true,
                                'min' => 1
                            ],
                            'correct_answer' => [
                                'required' => true,
                                'min' => 1,
                                'max' => 1
                            ],
                        ]);
                        if($validation->passed()){
                            Question::find($id)->update([
                                'level_id' => Session::get('level'),
                                'subject_id' => Session::get('subject'),
                                'no' => Input::get('no'),
                                'text' => Input::get('question_text'),
                                'a' => Input::get('a'),
                                'b' => Input::get('b'),
                                'c' => Input::get('c'),
                                'd' => Input::get('d'),
                                'correct_answer' => Input::get('correct_answer')
                            ]);
                            Session::put('flash', $this->notifications('success', 'Question was updated successfully'));
                        }
                    }
                }
                Redirect::back();
            }
        }

        public function delete_question($id = '')
        {
            if($id != ''){
                $question = Question::find($id);
                if(!$question){
                    Redirect::to('/admin/questions');
                }
            }else{
                Redirect::to('/admin/questions');
            }

            Question::destroy($id);
            Session::put('flash', $this->notifications('success', 'Question was deleted successfully'));
            Redirect::back();
        }

        public function update_profile()
        {
            if(Input::exists()){
                $validate = new Validate();
                $validation = $validate->check($_POST, [
                    'name' => [
                        'required' => true,
                        'min' => 2,
                        'max' => 100
                    ],
                    'email' => [
                        'required' => true,
                        'min' => 10,
                        'max' => 100
                    ]
                ]);
                if($validation->passed()){
                    Admin::find(1)->update([
                        'name' => Input::get('name'),
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
                        $this->admin()->update([
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

        public function update_admin_profile_pix()
        {
            $directory 	= 'uploads/images/profile_pictures';
            $handle  = new Upload($_FILES['profile_pix']);
            if($handle->uploaded){
                $handle->process($directory);

                if($handle->processed){
                    $handle->clean();
                    $file_name  = $directory.'/'.$handle->file_dst_name;
                    Admin::find(1)->update([
                        'profile_pix' => $file_name
                    ]);
                    Session::put('flash', $this->notifications('success', 'Profile Picture was updated successfully'));
                }
            }
            Redirect::back();
        }

        public function update_timer()
        {
            if(Input::exists()){
                if(Token::check(Input::get('token'))){
                    $validate = new Validate();
                    $validation = $validate->check($_POST, [
                        'timer' => [
                            'required' => true,
                            'numeric' =>true
                        ]
                    ]);
                    if($validation->passed()){
                        SiteSettings::find(1)->update([
                            'timer' => Input::get('timer')
                        ]);
                        Session::put('flash', $this->notifications('success', 'Timer updated successfully'));

                    }
                }
            }
            Redirect::back();
        }

        public function change_blog_background()
        {
            $directory 	= 'uploads/images/background';
            $handle  = new Upload($_FILES['upload']);
            if($handle->uploaded){
                $handle->process($directory);

                if($handle->processed){
                    $handle->clean();
                    $file_name  = $directory.'/'.$handle->file_dst_name;
                    SiteSettings::find(1)->update([
                        'blog_background' => $file_name
                    ]);
                    Session::put('flash', $this->notifications('success', 'Blog background image was updated successfully'));
                }
            }
            Redirect::back();
        }

        public function test()
        {
            echo Hash::make('admin1234');
        }
        
    }
?>