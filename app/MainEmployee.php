<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class MainEmployee extends Model implements AuthenticatableContract
{

    use Authenticatable;

    protected $connection = 'MSCMain';

    protected $table = 'EmployeeNew';


}