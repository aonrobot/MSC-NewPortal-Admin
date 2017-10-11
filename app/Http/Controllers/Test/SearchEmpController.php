<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use App\MainEmployee;
use Illuminate\Http\Request;

class SearchEmpController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
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
