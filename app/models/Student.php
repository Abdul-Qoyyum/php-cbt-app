<?php


    use Illuminate\Database\Eloquent\Model as Eloquent;

    class Student extends Eloquent 
    {
                            
        protected $guarded = [];

        protected $table = 'students';

        public $primaryKey = 'id';

        public static $student_rules = [

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
                'unique' => 'Student'
            ]

        ];

        public function login($email, $password, $remember)
    {
        $student = self::where('email', $email)->first();
        if($student){
            $this->data = $student;
            if($this->data()->verified == NULL){
                
                Redirect::to('/student-manager/not-verified');
            }
            if(password_verify($password, $this->data()->password)){
                Session::put(Config::get('session/student'), $this->data()->id);

                if($remember){
                    $hash = Hash::unique();
                    $hashExists = StudentsSession::where('student_id', $this->data()->id)->first();
                    if($hashExists){
                        $hash = $hashExists->hash;
                    }else{
                        StudentsSession::create(
                            [
                                'student_id' => $this->data()->id,
                                'hash' => $hash
                            ]
                        );
                    }

                    Cookie::put(Config::get('remember/student'), $hash, Config::get('remember/expiry'));
                } 
                return true;  
            }
        }
        return false;
    }
    

    public function data()
    {
        return $this->data;
    }


    public function students_session()
    {
        return $this->hasOne('StudentsSession');
    }

        public function blocked()
        {
            return ($this->blocked_on != NULL) ? true : false;
        }

    }


?>
