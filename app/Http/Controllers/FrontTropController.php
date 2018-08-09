<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Setting;
use App\Trop;
use DB;

class FrontTropController extends Controller {
	public function index($id) {

		//$id = trop id
		$trop = Trop::where('tid', '=', $id)->first();

		if (empty($trop)) {
			abort(404, 'This trop is not found');
		}

		//return $trop;

		//Fetch All Setting Of This Trop
		$setting = Setting::where('set_type', '=', 'trop')->where('set_type_id', '=', $id)->get();

		$setting_menu = Setting::where('set_type', '=', 'trop')->where('set_type_id', '=', $id)->where('set_name', '=', "menu")->first();

		//Fetch Slide Item
		$slide = Setting::
			where('set_type', '=', 'trop')->
			where('set_type_id', '=', $id)->
			where('set_name', '=', 'cp_slide')->first();

		$slide_items = [];
		$slide_setting = [];
		if ($slide != null) {
			$slide_items = DB::select('select * from cp_slide_item where slide_id = ?', [$slide->set_value]);
			$slide_setting = DB::select('select * from cp_slide where slide_id = ?', [$slide->set_value]);
		}
		//Fetch Menu Item
		if (empty($setting_menu->set_value)) {
			return view('pages.init', ['error' => '[FrontTrop:41] Please set menu to this trop !!']);
		}
		$menu = Menu::where('mid', '=', $setting_menu->set_value)->first();

		if ($menu == null) {
			$menu = [];
		}

		return view('pages.trop', ['trop' => $trop, 'slide_setting' => $slide_setting, 'slide_items' => $slide_items, 'menu' => $menu]);
	}
}
