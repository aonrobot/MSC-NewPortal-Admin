<?php

namespace App\Http\Controllers;

use App\Menu;
use Config;

class FrontMenuController extends Controller {
	public function index() {
		$menu_depart = Menu::where('menu_type', 'menubar')->where('mid', Config::get('newportal.menubar.department.id'))->first();
		$menu_meeting = Menu::where('menu_type', 'menubar')->where('mid', Config::get('newportal.menubar.meetingdocument.id'))->first();
		return ["menus" => $menu_depart->menu_item, "meeting_menus" => $menu_meeting->menu_item];
	}
}
