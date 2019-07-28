<?php


use Illuminate\Database\Eloquent\Model as Eloquent;

class Level extends Eloquent 
{
	private $data;
    protected $guarded = [];

	protected $table = 'levels';

	public $primaryKey = 'id';

    public static $level_rules = [
        'level' => [
            'required' => true,
            'min' => 2,
            'max' => 30,
            'unique' => 'Level'
        ]
    ];

    public function blocked()
    {
        return ($this->blocked_on != NULL) ? true : false;
    }

    public function levels()
    {
        return $this->hasmany('Level');
    }
}