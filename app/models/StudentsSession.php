<?php


use Illuminate\Database\Eloquent\Model as Eloquent;

class StudentsSession extends Eloquent 
{   
    protected $guarded = [];

	protected $table = 'students_sessions';

    public $primaryKey = 'id';
    
    public function student()
    {
        return $this->hasOne('Student');
    }
}