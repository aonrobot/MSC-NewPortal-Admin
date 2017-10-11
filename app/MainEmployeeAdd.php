<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainEmployeeAdd extends Model
{
    protected $connection = 'MSCMain';

	protected $table = 'EmployeeNewAdd';
}
