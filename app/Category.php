<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /*protected $fillable = [
        'name', 'email', 'password',
    ];*/
	
	public $timestamps = true;
	
	protected $table = 'category';
	
	protected $fillable = [
        'catid','tid','cat_sul','created_at','updated_at','cat_name', 'cat_type',
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
