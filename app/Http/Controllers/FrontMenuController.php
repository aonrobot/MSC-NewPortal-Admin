<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Menu;

class FrontMenuController extends Controller
{
    public function index(){
    	$menus = Menu::where('menu_type','normal')->first();
    	return $menus->menu_item;
    }
}
