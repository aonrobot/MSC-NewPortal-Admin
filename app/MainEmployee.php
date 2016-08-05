<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainEmployee extends Model
{
    //
    protected $connection = 'MSCMain';

    protected $table = 'EmployeeNew';

    protected $primaryKey  = 'Login';
}
