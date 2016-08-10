<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Zizaco\Entrust\Traits\EntrustUserTrait;

use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;


class Employee extends Model implements StaplerableInterface{
	
	use EntrustUserTrait;

	use EloquentTrait;

	public $timestamps = false;

	protected $table = "employee";

	protected $fillable = ['emid', 'Login', 'org_code', 'status', 'avatar'];

	protected $primaryKey  = 'emid';

	public function getAuthIdentifier()
	{
		return $this->emid; //should be changed to
		return $this->Login;
	}

	/**
	 * The "booting" method of the model.
	 */
	public static function boot()
	{
	    parent::boot();

	    static::bootStapler();
	}

	public function __construct(array $attributes = array()) {
		$this->hasAttachedFile('avatar', [
			'styles' => [
				'medium' => '300x300',
				'thumb' => '100x100'
			],
			'url' => '/system/:attachment/:id_partition/:style/:filename',
		]);
		parent::__construct($attributes);
	}

}
