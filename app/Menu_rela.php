<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class menu_rela extends Model
{
    
	public $timestamps = false;
	
	protected $table = 'menu_rela';
	
	protected $fillable = [
        'mrid', 'mid', 'mtid',
    ];

    
}
