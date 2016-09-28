<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category_rela extends Model
{
    
   	public $timestamps = false;
	
    protected $table = 'category_rela';
	
    protected $fillable = [ 'cat_rela_id','pid','catid','sort' ];
}
