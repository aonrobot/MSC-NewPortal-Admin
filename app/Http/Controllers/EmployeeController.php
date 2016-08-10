<?php

namespace App\Http\Controllers;

use App\Role;
use App\Permission;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view('admin.pages.employee.employee_create');
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
		$emid = $request->input('emid');
		$org_code = $request->input('org_code');
		$status = $request->input('status');

		$emDB = new Employee;
		$emDB->emid = $emid;
		$emDB->org_code = '1';
		$emDB->status = $status;
		$emDB->save();

		return redirect('admin#/employee/create');
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

	public function addTest(){

		/*$em = Employee::where('emid', '=', '43216')->first();

		$admin = Role::where('name', '=', 'admin')->first();

		$owner = Role::where('name', '=', 'owner')->first();*/

		/*$owner = new Role();
        $owner->name         = 'owner';
        $owner->display_name = 'Project Owner'; // optional
        $owner->description  = 'User is the owner of a given project'; // optional
        $owner->save();

        $admin = new Role();
        $admin->name         = 'admin';
        $admin->display_name = 'User Administrator'; // optional
        $admin->description  = 'User is allowed to manage and edit other users'; // optional
        $admin->save();*/

        //$em->attachRole($admin);

        /*$createPost = new Permission();
		$createPost->name         = 'create-post';
		$createPost->display_name = 'Create Posts'; // optional
		// Allow a user to...
		$createPost->description  = 'create new blog posts'; // optional
		$createPost->save();

		$editUser = new Permission();
		$editUser->name         = 'edit-user';
		$editUser->display_name = 'Edit Users'; // optional
		// Allow a user to...
		$editUser->description  = 'edit existing users'; // optional
		$editUser->save();*/

		/*$admin->attachPermission(1);

		$owner->attachPermissions(array(1, 2));*/

		


		//return $em->hasRole('admin') ? 'True' : 'False';
		$avatar = new Employee();
		$avatar->emid = 78945;
		$avatar->org_code = 'test_upload1';
		$avatar->status = 'active';
		$avatar->avatar = "https://upload.wikimedia.org/wikipedia/commons/5/58/KolkataMetro3000siries.JPG";
		$avatar->save();
		return $avatar->all();		
	}
}
