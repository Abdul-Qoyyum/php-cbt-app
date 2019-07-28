<?php


use Illuminate\Database\Eloquent\Model as Eloquent;

class Subject extends Eloquent 
{
	private $data;
    protected $guarded = [];

	protected $table = 'subjects';

	public $primaryKey = 'id';

    public static $subject_rules = [
        'subject' => [
            'required' => true,
            'min' => 2,
            'max' => 30,
            'unique' => 'Subject'
        ]
    ];

    public function blocked()
    {
        return ($this->blocked_on != NULL) ? true : false;
    }

    public function questions()
    {
        return $this->hasMany('Question');
    }

}