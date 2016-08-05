<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model {

	public $timestamps = false;

	protected $table = 'employee';

	protected $fillable = ['emid', 'org_code', 'status', 'avatar'];
}
