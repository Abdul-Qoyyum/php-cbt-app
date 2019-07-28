<?php


    use Illuminate\Database\Eloquent\Model as Eloquent;

    class SiteSettings extends Eloquent 
    {
                            
        protected $guarded = [];

        protected $table = 'site_settings';
        
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
