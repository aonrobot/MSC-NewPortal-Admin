<?php

namespace App\Http\Controllers;

use App\Favorite;
use DB;
use Session;

class FrontFavoriteController extends Controller {
	//Fetch to head view(header.blade.php)
	public function fetch_fav_app() {

		$emid = intval(Session::get('em_info')->EmpCode);

		$count = Favorite::where('emid', $emid)->count();

		if ($count > 0) {
			$favorite = Favorite::where('emid', $emid)->first();
		} else {
			$fav = new Favorite;
			$fav->emid = $emid;
			$fav->fav_name = 'Favorite application';
			$fav->fav_title = 'Favorite application ';
			$fav->fav_type = 'favorite_app';
			$fav->fav_status = 1;
			$fav->save();
			$fid = $fav->fid;

			$favorite = Favorite::where('emid', $emid)->first();
		}

		$fav_app = DB::select('SELECT * FROM application a INNER JOIN favorite_app fa ON a.app_id = fa.app_id and fa.fid = ?', [$favorite->fid]);

		return $fav_app;
	}
	public function ajax_fav_app() {
		
		echo '55';
	}
	public function add_application($id) {

		$emid = intval(Session::get('em_info')->EmpCode);

		$count = Favorite::where('emid', $emid)->count();

		if ($count > 0) {
			$fid = Favorite::where('emid', $emid)->first()->fid;
		} else {

			$fav = new Favorite;
			$fav->emid = $emid;
			$fav->fav_name = 'Favorite application';
			$fav->fav_title = 'Favorite application ';
			$fav->fav_type = 'favorite_app';
			$fav->fav_status = 1;
			$fav->save();
			$fid = $fav->fid;
		}

		$count_app = DB::table('favorite_app')->where('fid', $fid)->where('app_id', $id)->count();

		if($count_app <= 0){

			DB::insert('INSERT INTO favorite_app(fid, app_id) VALUES(?, ?)', [$fid, $id]);
		}

	}

	public function remove_application($id) {

		$emid = intval(Session::get('em_info')->EmpCode);

		$fid = Favorite::where('emid', $emid)->first()->fid;

		DB::delete('DELETE favorite_app where app_id = ? and fid = ?', [$id, $fid]);

	}
}
