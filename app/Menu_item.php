<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu_item extends Model
{
	
    public $timestamps = false;
	
    protected $table = 'menu_item';
	
    protected $fillable = ['mtid', 'item_parent_id', 'item_sort', 'item_icon','item_name','item_link','item_style','item_type','item_template_id'];

    protected $primaryKey  = 'mtid';

    public function Menu(){

        return $this->belongsToMany('App\Menu', 'menu_rela', 'mtid', 'mid');
    }
}
