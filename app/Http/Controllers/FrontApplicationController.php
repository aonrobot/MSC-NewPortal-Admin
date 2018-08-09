<?php

namespace App\Http\Controllers;

use DB;

class FrontApplicationController extends Controller {
	public function index() {
		$app = DB::select('SELECT * FROM application');
		$group = DB::select('SELECT * FROM application_group');
		$app_group = DB::select('SELECT * FROM application as a LEFT OUTER JOIN app_group as ag ON a.app_id = ag.app_id LEFT OUTER JOIN application_group as g ON ag.group_id = g.group_id');
		return view('pages.application', ['app' => $app, 'group' => $group, 'app_group' => $app_group]);
	}
}
