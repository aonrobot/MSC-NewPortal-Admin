<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cp_slide_item extends Model
{
	
    public $timestamps = false;
	
    protected $table = 'cp_slide_item';
	
    protected $fillable = [ 'slide_item_id','slide_id', 'slide_item_name', 'slide_item_img_url', 'slide_item_img_link' ,'slide_item_title'
	,'slide_item_subtitle','slide_item_content','slide_item_content_link','slide_item_sort'];

    protected $primaryKey  = 'slide_item_id';

}
