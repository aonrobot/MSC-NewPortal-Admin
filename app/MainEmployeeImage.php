<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainEmployeeImage extends Model
{
    protected $connection = 'MSCMain';

    protected $table = 'EmployeeImage';
}
