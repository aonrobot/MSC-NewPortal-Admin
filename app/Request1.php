<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class request1 extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /*protected $fillable = [
        'name', 'email', 'password',
    ];*/
	

	
	protected $table = 'request';
	
	protected $fillable = [
        'request_id', 'emid', 'request_detail','request_type','request_object','object_id','request_status','created_at','updated_at',
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
