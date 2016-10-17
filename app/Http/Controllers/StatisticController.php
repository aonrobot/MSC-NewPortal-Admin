<?php

namespace App\Http\Controllers;

use App\Library\Statistic_lib;
use DB;
use Illuminate\Http\Request;

class StatisticController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//
		return view('admin.pages.statistic.index');
	}

	public function countLoginToday() {

		$date_today = date("Y-m-d");

		$login_today = DB::table('statistic')->where('event', '=', 'First Of Day')->whereRaw("CAST(created_at AS DATE) = '" . $date_today . "'")->get();

		return count($login_today);
	}

	public function linkclick(Request $request) {

		$para = $request->all();

		Statistic_lib::LinkClick($para['name'], $para['where'], $para['current'], $para['destination'], $para['duration']);

	}

}
