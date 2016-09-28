<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cp_slide extends Model
{
	
    public $timestamps = false;
	
    protected $table = 'cp_slide';
	
    protected $fillable = [ 'slide_id', 'slide_name', 'slide_speed','slide_type', 'slide_delay','slide_tid' ,'created_at','updated_at'];

    protected $primaryKey  = 'slide_id';

}
