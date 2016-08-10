<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class menu_item extends Model
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
	
	protected $table = 'menu_item';
	
	protected $fillable = [
        'mtid', 'item_parent_id', 'item_sort', 'item_icon','item_name','item_link','item_style','item_type',
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
