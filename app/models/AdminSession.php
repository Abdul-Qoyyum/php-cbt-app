<?php


use Illuminate\Database\Eloquent\Model as Eloquent;

class AdminSession extends Eloquent 
{   
    protected $guarded = [];

	protected $table = 'admin_sessions';

    public $primaryKey = 'id';
    
    public function admin()
    {
        return $this->hasOne('Admin');
    }
}