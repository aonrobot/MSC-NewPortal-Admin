<?php

namespace App\Http\Controllers;
use App\category;
use App\cp_slide;
use App\employee;
use App\menu;
use App\menu_item;
use App\menu_rela;
use App\request1;
use App\setting;
use App\trop;
use App\trop_rela;
use DB;
use Illuminate\Http\Request;
use Session;

class DashboardController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

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
		$trops = $request->input('trop');
		$trop_title = $request->input('trop_title');

		$tropDB = new trop;
		$tropDB->trop_name = $trops;
		$tropDB->trop_title = $trop_title;
		$tropDB->trop_type = 'trop';
		$tropDB->trop_status = "0";

		if ($tropDB->save()) {
			$id = $tropDB->id;}

		$tropDB = new request1;
		$tropDB->emid = Session::get('emid');
		$tropDB->request_detail = 'create_Trop';
		$tropDB->request_type = 'trop';
		$tropDB->request_object = 'trop';
		$tropDB->request_status = "0";
		$tropDB->object_id = $id;
		//	$tropDB->created_at = "0";
		//  $tropDB->update_at = "0";
		$tropDB->save();

		$tropDB = new trop_rela;
		$tropDB->emid = Session::get('emid');
		$tropDB->tid = $id;
		$tropDB->user_level = 3;
		$tropDB->save();

		$settingDB = new setting;
		$settingDB->set_type = "trop";
		$settingDB->set_type_id = $id;
		$settingDB->set_name = '';
		$settingDB->set_value = '';
		$settingDB->save();

		//$tropDB = new menu_rela;
		//	$tropDB->mid = '1';
		//	$tropDB->mtid = $id;
		//	$tropDB->save();

		return redirect('/admin/trop/create');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show() {
		$emid = Session::get('emid');
		//  $user=DB::select('select employee_id,ru.role_id,name from role_user ru join roles r on ru.role_id = r.id where employee_id='.$emid);
		$user = employee::where('emid', '=', $emid)->first();
		if ($user->hasRole(['admin', 'owner'])) {
			$trops = trop::join('request', 'trop.tid', '=', 'request.object_id')
				->orderBy('trop_status', 'ASC')
				->get();
			$tropadmin = 0;
		}
		if ($user->hasRole(['trop_admin', 'trop_assistant'])) {
			$trops = trop::join('request', 'trop.tid', '=', 'request.object_id')
				->join('trop_rela', 'trop.tid', '=', 'trop_rela.tid')
				->where('trop_rela.emid', '=', $emid)
				->orderBy('trop_status', 'ASC')
				->get();
			$tropadmin = "";
		}

		//If user login
		if (!isset($trops)) {
			abort('404');
		}

		return view('admin.pages.dashboard', ['trops' => $trops, 'tropadmin' => $tropadmin]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */

	public function edit(Request $request) //update
	{
		$trops = $request->input('idtrop');
		$trops1 = $request->input('trop1');
		$title = $request->input('title1');
		$type = $request->input('type1');
		$slide = $request->input('Slide1');
		$empid = $request->input('empid');

		trop::where('tid', $trops)
			->update(['Trop_Name' => $trops1, 'Trop_type' => $type, 'trop_title' => $title]);

		setting::where('set_type_id', '=', $trops)
			->update(['set_name' => 'cp_slide', 'set_key' => 'slide_id', 'set_value' => $slide]);

		if ($empid) {
			$sum = "";
			$i1 = count($empid);
			for ($i = 0; $i < $i1; $i++) {
				$tropDB = new trop_rela;
				$tropDB->emid = $empid[$i];
				$tropDB->tid = $trops;
				$tropDB->user_level = 6;
				$tropDB->save();
			}
		}

		return redirect('/admin/trop/edit/' . $trops);

	}

	public function detailset($id) //edit
	{
		$emid = Session::get('emid');

		$menu1 = menu::where('menu_type', '=', 'Trop')
			->select('mid', 'menu_name', 'menu_type', 'is_tem')
			->get();

		$trop_rela = trop_rela::join('employee', 'employee.emid', '=', 'trop_rela.emid')
			->where('tid', '=', $id)
			->select('trop_rela_id', 'trop_rela.emid', 'EmpCode', 'user_level')
			->get();

		$detail1 = trop::where('tid', '=', $id)->get();

		$setting = setting::where('set_type_id', '=', $id)
			->select('set_value')
			->get();
		error_reporting(E_ALL ^ E_NOTICE);
		$slide_select = cp_slide::where('slide_id', '=', $setting[0]->set_value)
			->select('slide_id', 'slide_name')
			->get();

		$employee = employee::all();

		/*$cp_slide = cp_slide::where('slide_type', '=', 'Trop')
			->get();*/

		$setting_slide = setting::where('set_key', '=', 'slide_id')
			->get(); //check set_key ....set_value

		$cp_slide = DB::select("select * from (select * FROM setting WHERE set_key = 'slide_id') STT RIGHT JOIN cp_slide S ON S.slide_id = STT.set_value where STT.set_value IS NULL");

		//return $cp_slide;

		return view('admin.pages.trop.tropedit', ['detail1' => $detail1, 'troprela' => $trop_rela, 'setting' => $setting, 'employee' => $employee, 'slide_select' => $slide_select, 'slide' => $cp_slide]);
	}

	public function detail($id) {
		$detail1 = trop::where('tid', '=', $id)->get();
		return view('tropsetting', ['detail1' => $detail1]);
		//
	}
	public function cat() {
		return view('category');
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
	}
	public function Del($id) {
		error_reporting(E_ALL ^ E_NOTICE);
		$mid = menu::where('tid', '=', $id)
			->first()->mid;

		$menurela = menu_rela::where('mtid', '=', $mid)
			->select('mrid', 'mid', 'mtid')
			->get();
		foreach ($menurela as $menurela) {
			menu_item::where('mtid', $menurela->mtid)->delete();
		}

		menu_rela::where('mid', $mid)->delete();
		menu::where('tid', $id)->delete();
		category::where('tid', $id)->delete();
		trop_rela::where('tid', $id)->delete();
		trop::where('tid', $id)->delete();
		request1::where('object_id', $id)->delete();
		menu::where('tid', $id)->delete();
		setting::where('set_type_id', $id)->delete();

		return redirect('/admin/trop/create');
	}
	public function deladmin($id) {
		$detail1 = trop_rela::where('trop_rela_id', '=', $id)->get();

		trop_rela::where('trop_rela_id', $id)->delete();
		return redirect('/admin/trop/edit/' . $detail1[0]->tid);
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}
}
