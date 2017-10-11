<?php

namespace App\Http\Controllers\Event_Valentine;

use App\Http\Controllers\Controller;
use App\MainEmployee;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Session;

class ValentineController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	public function find(Request $request) {
		$find = $request->q;

		$match = MainEmployee::where(function ($q) use ($find) {
			$q->where('NickName', 'like', '%' . str_replace(' ', '', $find) . '%')
				->orWhere('FirstName', 'like', '%' . str_replace(' ', '', $find) . '%')
				->orWhere('LastName', 'like', '%' . str_replace(' ', '', $find) . '%')
				->orWhere('FirstNameEng', 'like', '%' . str_replace(' ', '', $find) . '%')
				->orWhere('LastNameEng', 'like', '%' . str_replace(' ', '', $find) . '%');
		})->get();

		$match = collect($match)->toArray();

		echo json_encode($match);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		$status = ['type' => '1', 'message' => 'ok'];

		$id = $request->sendToId;

		$id = explode('–', $id)[0];

		$count = DB::table('eventValentine')->where('empCodeSend', intval(Session::get('emid')))->where('empCodeReceive', intval($id))->count();

		$count_emp = MainEmployee::where('EmpCode', $id)->count();

		if (!$count && $count_emp) {
			DB::table('eventValentine')->insert([
				'empCodeSend' => intval(Session::get('emid')),
				'empCodeReceive' => intval($id),
				'sended_at' => Carbon::now(),
			]);
			$status['type'] = 1;

		} else {
			$status['type'] = 0;

			if (!$count_emp) {
				$status['message'] = "ไม่พบชื่อของคนที่คุณกำลังจะส่งหัวใจให้ กรุณาค้นหาใหม่อีกครั้งนะคะ";
			} else if ($count) {
				$status['message'] = "คุณได้เคยส่งหัวใจให้คนนี้แล้วนะคะ";
			}

		}

		return json_encode($status);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
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
