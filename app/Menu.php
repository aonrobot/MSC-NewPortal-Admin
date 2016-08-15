<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
	
    public $timestamps = false;
	
    protected $table = 'menu';
	
    protected $fillable = [ 'mid', 'tpid', 'menu_name', 'manu_type' ,'is_tem','menu_title'];

    protected $primaryKey  = 'mid';

    public function Menu_item(){

        return $this->belongsToMany('App\Menu_item', 'menu_rela', 'mid', 'mtid','menu_title');
    }
}
