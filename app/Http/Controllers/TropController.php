<?php

namespace App\Http\Controllers;
use App\category;
use App\category_rela;
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

class tropController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index($id) {

		Session::put('trop_id', $id);

		if ($id) {
			$trops = trop::join('request', 'trop.tid', '=', 'request.object_id')
				->where('tid', '=', $id)
				->orderBy('trop_status', 'ASC')
				->get();

			Session::put('name_trop', $trops[0]->trop_name);
		} else {

			Session::put('name_trop', 'Newportal');
		}
		$trop = Trop::where('tid', '=', $id)->first();

		$setting = Setting::where('set_type', '=', 'trop')->where('set_type_id', '=', $id)->get();

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
		$menu1 = Setting::
			where('set_type', '=', 'trop')->
			where('set_type_id', '=', $id)->
			where('set_name', '=', 'menu')->first();
		$menu = [];
		if ($menu1 != null) {
			$menu = Menu::where('mid', '=', $menu1->set_value)->first();
		}

		return view('admin.pages.trop.tropdetail', ['trop' => $trop, 'slide_setting' => $slide_setting, 'slide_items' => $slide_items, 'menu' => $menu]);
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
		$trop_subtitle = $request->input('trop_subtitle');

		$tropDB = new trop;
		$tropDB->trop_name = $trops;
		$tropDB->trop_title = $trop_title;
		$tropDB->trop_subtitle = $trop_subtitle;
		$tropDB->trop_type = 'trop';
		$tropDB->trop_status = "0";

		if ($tropDB->save()) {
			$id = $tropDB->id;
			Storage::disk('uploads')->makeDirectory('trop/' . $id . '/file');
		}

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
		$settingDB->set_name = 'cp_slide';
		$settingDB->set_value = '';
		$settingDB->set_key = 'slide_id';
		$settingDB->save();

		$settingDB = new setting;
		$settingDB->set_type = "trop";
		$settingDB->set_type_id = $id;
		$settingDB->set_name = 'menu';
		$settingDB->set_value = '';
		$settingDB->set_key = 'menu_id';
		$settingDB->save();

		Session::forget('trop_id');
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
		}
		if ($user->hasRole(['trop_admin', 'trop_assistant'])) {
			$trops = trop::join('request', 'trop.tid', '=', 'request.object_id')
				->join('trop_rela', 'trop.tid', '=', 'trop_rela.tid')
				->where('trop_rela.emid', '=', $emid)
				->orderBy('trop_status', 'ASC')
				->get();
		}

		return view('admin.pages.trop.trop', ['trops' => $trops]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */

	public function edit(Request $request) //update
	{
		$trop_id = Session::get('trop_id');
		$trops = $request->input('idtrop');
		$trops1 = $request->input('trop1');
		$title = $request->input('title1');
		$type = $request->input('type1');
		$slide = $request->input('Slide1');
		$slidehome = $request->input('Slide_Home');
		$empid = $request->input('empid');
		$menu = $request->input('Menu1');
		$status = $request->input('status');
		$subtitle = $request->input('subtitle');

		trop::where('tid', $trops)
			->update(['Trop_Name' => $trops1, 'Trop_type' => $type, 'trop_title' => $title, 'trop_subtitle' => $subtitle, 'trop_status' => $status]);
		request1::where('object_id', $trops)
			->update(['request_status' => $status]);
		setting::where('set_type_id', '=', $trops)
			->where('set_key', '=', 'slide_id')
			->update(['set_value' => $slide]);

		setting::where('set_type_id', '=', $trops)
			->where('set_key', '=', 'menu_id')
			->update(['set_value' => $menu]);

		setting::where('set_type_id', '=', $trops)
			->where('set_subtype', '=', 'slide')
			->update(['set_value' => $slidehome]);

		if ($empid) {
			$sum = "";
			$i1 = count($empid);
			for ($i = 0; $i < $i1; $i++) {
				$tropDB = new trop_rela;
				$tropDB->emid = $empid[$i];
				$tropDB->tid = $trop_id;
				$tropDB->user_level = 6;
				$tropDB->save();
			}
		}

		return redirect('/admin/trop/edit/' . $trops);

	}

	public function detailset($id) //edit
	{

		Session::put('trop_id', $id);
		$emid = Session::get('emid');
		$trop_id = Session::get('trop_id');
		error_reporting(E_ALL ^ E_NOTICE);
		$menu1 = menu::where('tid', '=', $trop_id)
			->select('mid', 'menu_name', 'menu_type', 'is_tem')
			->get();
		$menuportal = menu::where('tid', '=', $trop_id)
			->where('menu_type', '=', 'trop')
			->select('mid', 'menu_name', 'menu_type', 'is_tem')
			->get();

		$trop_rela = trop_rela::join('employee', 'employee.emid', '=', 'trop_rela.emid')
			->where('tid', '=', $id)
			->select('trop_rela_id', 'trop_rela.emid', 'EmpCode', 'user_level')
			->get();

		$detail1 = trop::where('tid', '=', $id)->get();
		Session::put('name_trop', $detail1[0]->trop_name);
		if($id==0)
		{
			Session::put('name_trop', 'Newportal');
		}
		
		$setting = setting::where('set_type_id', '=', $id)
			->select('set_value')
			->get();

		error_reporting(E_ALL ^ E_NOTICE);
		$slide_select = cp_slide::where('slide_id', '=', $setting[0]->set_value)
			->select('slide_id', 'slide_name')
			->get();
		$cp_slide = cp_slide::where('slide_tid', '=', $trop_id)
			->select('slide_id', 'slide_name')
			->get();

		$employee = employee::all();

		/*$cp_slide = cp_slide::where('slide_type', '=', 'Trop')
			->get();*/

		$setting_slide = setting::where('set_key', '=', 'slide_id')
			->get(); //check set_key ....set_value

		//$cp_slide = DB::select("select * from (select * FROM setting WHERE set_key = 'slide_id') STT RIGHT JOIN cp_slide S ON S.slide_id = STT.set_value where STT.set_value IS NULL");

		//return $cp_slide;

		return view('admin.pages.trop.tropedit', ['detail1' => $detail1, 'troprela' => $trop_rela, 'setting' => $setting, 'employee' => $employee, 'slide_select' => $slide_select, 'slide' => $cp_slide
			, 'menu' => $menu1, 'menuportal' => $menuportal]);
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
		$menudel = menu::where('tid', '=', $id)
			->select('mid', 'tid')
			->get();
		foreach ($menudel as $menudel1) {
			$menurela = menu_rela::where('mid', '=', $menudel1->mid)
				->select('mrid', 'mid', 'mtid')
				->get();

			foreach ($menurela as $menurela1) {
				menu_rela::where('mrid', $menurela1->mrid)->delete();
			}

			foreach ($menurela as $menurela1) {
				menu_item::where('mtid', $menurela1->mtid)->delete();
			}
		}
		menu::where('tid', $id)->delete();
		$category1 = category::where('tid', '=', $id)
			->select('catid')
			->get();
		category_rela::where('catid', $category1[0]->catid);
		category::where('tid', $id)->delete();
		trop_rela::where('tid', $id)->delete();
		trop::where('tid', $id)->delete();
		request1::where('object_id', $id)->delete();
		menu::where('tid', $id)->delete();
		setting::where('set_type_id', $id)->delete();
		cp_slide::where('slide_tid', $id)->delete();
		Session::forget('trop_id');
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
	public function tropout() {

		Session::forget('trop_id');
		return redirect('/admin');

	}
}
