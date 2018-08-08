<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role_user extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /*protected $fillable = [
        'name', 'email', 'password',
    ];*/
	
	
	protected $table = 'role_user';

          public $timestamps = false;
	
	protected $fillable = [
        'employee_id', 'role_id'
		];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    /*protected $hidden = [
        'password', 'remember_token',
    ];*/
}
