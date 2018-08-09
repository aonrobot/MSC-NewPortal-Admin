<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public $timestamps = true;
	
    protected $table = 'category';
	
    protected $fillable = [ 'catid','tid','cat_sul','created_at','updated_at','cat_name', 'cat_type' ];

}
