<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class PermissionController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//
		$lists = DB::table('permissions')->get();
		return view('admin.pages.permission.index', ['lists' => $lists]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//
		$date_now = Carbon::now();

		$input = $request->all();

		$action = $input['action'];
		$object_name = $input['object'];

		$obj_id = explode(":", $input['object_id']); // It will have a string id:menu_name of object (ex. 258:CSB Main Menu)

		$object_id = $obj_id[0];
		$object_item_id = '';

		if (isset($input['object_item_id'])) {

			$obj_item_id = explode(":", $input['object_item_id']); // It will have a string id:menu_item_name of object item (ex. 258:CSB Policy)
			$object_item_id = $obj_item_id[0];
			$permission_str = $action . '-' . $object_name . '-' . $object_item_id;

		} else {

			if ($object_id == '') {
				$permission_str = $action . '-' . $object_name;
			} else {
				$permission_str = $action . '-' . $object_name . '-' . $object_id;
			}

		}

		if ($object_id != '') {
			$display_name = 'Can ' . $action . ' ' . $object_name . ' ' . (isset($input['object_item_id']) ? $obj_item_id[1] : $obj_id[1]);
		} else {
			$display_name = 'Can ' . $action . ' ' . $object_name;
		}

		$description = 'Can ' . $action . '.';

		DB::table('permissions')->insert([
			'name' => $permission_str,
			'display_name' => $display_name,
			'description' => $description,
			'created_at' => $date_now,
			'updated_at' => $date_now,
		]);

		return redirect('/admin/permission/index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show() {

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request) {

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
		DB::table('permission_role')->where('permission_id', '=', $id)->delete();
		DB::table('permissions')->where('id', '=', $id)->delete();

		return redirect('/admin/permission/index');
	}
}
