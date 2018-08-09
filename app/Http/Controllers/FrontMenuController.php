<?php

namespace App\Http\Controllers;

use App\Menu;
use Config;

class FrontMenuController extends Controller {
	public function index() {
		$menu_depart = Menu::where('menu_type', 'menubar')->where('mid', Config::get('newportal.menubar.department.id'))->first();

		$menu_acct = Menu::where('menu_type', 'menubar')->where('mid', Config::get('newportal.menubar.AccountingKM.id'))->first();
		
		$menu_meeting = Menu::where('menu_type', 'menubar')->where('mid', Config::get('newportal.menubar.meetingdocument.id'))->first();
		
	
		$meeting_menus = $menu_meeting->menu_item()->orderby('item_sort')->get();

		$main_list = [];
		$main_array = [];
		foreach ($meeting_menus as $menu) {
			$cat_name = $menu->item_description;
			$explode_cat = explode('~', $cat_name);
			$main_cat_name = (strpos($cat_name, '~') > -1) ? $explode_cat[0] : $cat_name;
			
			if (!in_array($main_cat_name, $main_list)) {
				array_push($main_list, $main_cat_name);
				$main_array[$main_cat_name] = [];
			}
			$i = 0;
			foreach($main_array as $key => $value){
				$child_cat = isset($explode_cat[1]) ? $explode_cat[1] : $cat_name;
				if($key === $explode_cat[0]){
					array_push($main_array[$key], ['mtid' => $menu->mtid, 'item_link' => $menu->item_link , 'item_name' => $menu->item_name ]);
				}
				$i++;
			}
		}
		
		
		$acct_menus = $menu_acct->menu_item()->orderby('item_sort')->get();	

		$main_list1 = [];
		$main_array1 = [];
		foreach ($acct_menus as $menu) {
			$cat_name = $menu->item_description;
			$explode_cat = explode('~', $cat_name);
			$main_cat_name = (strpos($cat_name, '~') > -1) ? $explode_cat[0] : $cat_name;
			
			if (!in_array($main_cat_name, $main_list)) {
				array_push($main_list1, $main_cat_name);
				$main_array1[$main_cat_name] = [];
			}
			$i = 0;
			foreach($main_array1 as $key => $value){
				$child_cat = isset($explode_cat[1]) ? $explode_cat[1] : $cat_name;
				if($key === $explode_cat[0]){
					array_push($main_array1[$key], ['mtid' => $menu->mtid, 'item_link' => $menu->item_link , 'item_name' => $menu->item_name ]); 
				}
				$i++;
			}
		} 

		// foreach($main_document_menu as $key => $value){
		// 	foreach($meeting_menus as $mm){
		// 		if(strpos($mm->item_description, $key) > -1){
		// 			array_push($main_document_menu[$key], ['mtid' => $mm->mtid, 'item_link' => $mm->item_link , 'item_name' => $mm->item_name ]);
		// 		}
		// 	}
		// }

		// return 0;

		return ["menus" => $menu_depart->menu_item, 'main_document_menu' => $main_array,'main_document_menu1' => $main_array1];
	}
}
