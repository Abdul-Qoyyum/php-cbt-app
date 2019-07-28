<?php


use Illuminate\Database\Eloquent\Model as Eloquent;

class Question extends Eloquent 
{
	private $data;
    protected $guarded = [];

	protected $table = 'questions';

	public $primaryKey = 'id';

    public static $question_rules = [
        'text' => [
            'required' => true,
            'min' => 2,
            'max' => 2000
        ],
        'no' => [
            'required' => true,
            'min' => 1,
            'max' => 3
        ],
        'a' => [
            'required' => true,
            'min' => 1,
            'max' => 200
        ],
        'b' => [
            'required' => true,
            'min' => 1,
            'max' => 200
        ],
        'c' => [
            'required' => true,
            'min' => 1,
            'max' => 200
        ],
        'd' => [
            'required' => true,
            'min' => 1,
            'max' => 200
        ],
        'correct_answer' => [
            'required' => true,
            'min' => 1,
            'max' => 1
        ]

    ];

    public function blocked()
    {
        return ($this->blocked_on != NULL) ? true : false;
    }

    public function level()
    {
        return $this->hasOne('Level');
    }

    public function subject()
    {
        return $this->hasOne('subject');
    }

}