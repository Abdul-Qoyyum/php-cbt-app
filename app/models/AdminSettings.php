<?php


    use Illuminate\Database\Eloquent\Model as Eloquent;

    class AdminSettings extends Eloquent 
    {
                            
        protected $guarded = [];

        protected $table = 'admin_settings';
        
        /**
         * The attributes that should be mutated to dates.
         *
         * @var array
         */
        protected $dates = [
            'created_at',
            'updated_at',
            'deleted_at'
        ];

        public $primaryKey = 'id';


    }


?>
