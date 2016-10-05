<?php

namespace App\Http\Controllers;

use App\Library\Statistic_lib;
use Illuminate\Http\Request;

class StatisticController extends Controller {

	public function linkclick(Request $request) {

		$para = $request->all();

		Statistic_lib::LinkClick($para['name'], $para['where'], $para['current'], $para['destination'], $para['duration']);

	}
}
