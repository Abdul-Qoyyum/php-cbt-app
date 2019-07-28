<?php


use Illuminate\Database\Eloquent\Model as Eloquent;

class Admin extends Eloquent 
{
	private $data;
    protected $guarded = [];

	protected $table = 'admins';

	public $primaryKey = 'id';

    public static $bank_rules = [
        'account_name' => [
            'required' => true,
            'min' => 5,
            'max' => 30
        ],
        'account_no' => [
            'required' => true,
            'min' => 10,
            'max' => 10
        ],
        'bank' => [
            'required' => true,
            'min' => 3,
            'max' => 30
        ]
    ];

    public function login($username, $password, $remember)
    {
        $admin = self::where('username', $username)->first();
        if($admin){
            $this->data = $admin;
            if(password_verify($password, $this->data()->password)){
                Session::put(Config::get('session/admin'), $this->data()->id);

                if($remember){
                    $hash = Hash::unique();
                    $hashExists = AdminSession::where('admin_id', $this->data()->id)->first();
                    if($hashExists){
                        $hash = $hashExists->hash;
                    }else{
                        AdminSession::create(
                            [
                                'admin_id' => $this->data()->id,
                                'hash' => $hash
                            ]
                        );
                    }

                    Cookie::put(Config::get('remember/admin'), $hash, Config::get('remember/expiry'));
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


    public function admin_sessions()
    {
        return $this->hasOne('AdminSession');
    }

}


?>
