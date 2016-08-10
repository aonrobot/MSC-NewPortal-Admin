<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trop extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /*protected $fillable = [
        'name', 'email', 'password',
    ];*/
	
	protected $table = 'trop';
	
	protected $fillable = [
        'tid', 'trop_name', 'trop_status','trop_slug','trop_type','created_at','updated_at',
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
