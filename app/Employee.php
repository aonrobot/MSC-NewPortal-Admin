<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Zizaco\Entrust\Traits\EntrustUserTrait;


class Employee extends Model{
	
	use EntrustUserTrait;

	public $timestamps = false;

	protected $fillable = ['emid', 'org_code', 'status', 'avatar'];

	protected $primaryKey  = 'emid';

	

}
