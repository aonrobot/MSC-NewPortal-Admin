<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class trop_rela extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /*protected $fillable = [
        'name', 'email', 'password',
    ];*/
	
	
	protected $table = 'trop_rela';

          public $timestamps = false;
	
	protected $fillable = [
        'trop_rela_id', 'emid', 'tid','ririd'
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
