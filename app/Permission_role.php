<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission_role extends Model
{
	
    public $timestamps = false;
	
    protected $table = 'Permission_role';
	
    protected $fillable = [ 'permission_id', 'role_id'];



}
