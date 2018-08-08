<?php

namespace App\Http\Controllers;

use App\Role;
use App\Permission;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\trop;
use App\trop_rela;
use App\category;
use App\role_user;
use App\Library\Services;
use DB;

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
	public function show()
     {
        $employee_detail = employee::all();
		
		$tel = Services::getPhoneQuery();
		
        return view('admin.pages.employee.employee_list', ['employee' => $employee_detail,'tel' => $tel]);
     }
	 
    public function editdetail($id){
	    
		$employee = employee::where('emid', '=', $id)->get();	

		$emid = $employee[0]->emid;
		 
		$trop_list = trop_rela::join('trop','trop_rela.tid', '=', 'trop.tid')
			  ->where('trop_rela.emid','=',$id)
              ->select('emid','trop.tid','trop_name','trop_title','trop_type','trop_status')
        	  ->get();
			  
		$roles = DB::select('select * from role_user ru join roles r on ru.role_id = r.id where ru.employee_id = ' . $emid);

		$roles_can_select = DB::select('SELECT * FROM roles r WHERE NOT EXISTS (SELECT * FROM role_user ru WHERE employee_id = ? and r.id = ru.role_id)',[$emid]);

		/*$roles_can_select = DB::table('roles')->whereNotExists(function($query){

			$query->select(DB::raw(1))->from('role_user')->whereRaw('employee_id = '.$emid.' and roles.id = role_user.role_id');

		})->get();*/
		
      	return view('admin.pages.employee.employee_setting', ['employee' => $employee[0],'trop_em' => $trop_list, 'roles'=>$roles, 'roles_can_select'=>$roles_can_select]);
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
	public function update(Request $request) {
		//
		$role = $request->input('role_setting');
		$id = $request->input('eid');
		role_user::where('employee_id','=',$id)
			->update(['role_id' => $role]);
	return redirect('/admin/employee/setting/'.$id);
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

	public function addRole(Request $request){

		$input = $request->all();

		DB::table('role_user')->insert(['employee_id' => $input['emid'], 'role_id' => $input['role_id']]);

		return redirect('/admin/employee/setting/'.$input['emid']);
	}

	public function deleteRole($id, $role_id){

		DB::table('role_user')->where('employee_id', $id)->where('role_id', $role_id)->delete();

		return redirect('/admin/employee/setting/'. $id);
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
