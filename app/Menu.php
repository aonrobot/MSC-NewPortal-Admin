<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /*protected $fillable = [
        'name', 'email', 'password',
    ];*/
	
	public $timestamps = false;
	
	protected $table = 'menu';
	
	protected $fillable = [
        'mid', 'tpid', 'menu_name', 'manu_type' ,'is_tem',
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
