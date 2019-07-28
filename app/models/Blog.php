<?php


use Illuminate\Database\Eloquent\Model as Eloquent;

class Blog extends Eloquent 
{
	private $data;
    protected $guarded = [];

	protected $table = 'blogs';

	public $primaryKey = 'id';

    public static $blog_rules = [
        'title' => [
            'required' => true,
            'min' => 2,
            'max' => 300,
            'unique' => 'Blog'
        ],
        'description' => [
            'required' => true,
            'min' => 20
        ]
    ];

    public function blocked()
    {
        return ($this->blocked_on != NULL) ? true : false;
    }
}