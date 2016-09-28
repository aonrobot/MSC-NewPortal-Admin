<?php

namespace App\Http\Controllers;

use App\Menu;

class FrontMenuController extends Controller {
	public function index() {
		$menus = Menu::where('menu_type', 'menubar')->first();
		return $menus->menu_item;
	}
}
