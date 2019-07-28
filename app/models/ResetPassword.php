<?php


    use Illuminate\Database\Eloquent\Model as Eloquent;

    class ResetPassword extends Eloquent 
    {
                            
        protected $guarded = [];

        protected $table = 'password_resets';
        
        /**
         * The attributes that should be mutated to dates.
         *
         * @var array
         */
        protected $dates = [
            'created_at',
            'updated_at'
        ];

        public $primaryKey = 'id';


    }


?>
