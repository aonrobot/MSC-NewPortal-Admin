<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class menu_rela extends Model
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
	
	protected $table = 'menu_rela';
	
	protected $fillable = [
        'mrid', 'mid', 'mtid',
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
