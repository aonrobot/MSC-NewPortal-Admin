<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Role;

use App\Permission_role;
use App\employee;
use App\role_user;
use DB;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $owner = new Role();
        $owner->name         = 'owner';
        $owner->display_name = 'Project Owner'; // optional
        $owner->description  = 'User is the owner of a given project'; // optional
        $owner->save();

        $admin = new Role();
        $admin->name         = 'admin';
        $admin->display_name = 'User Administrator'; // optional
        $admin->description  = 'User is allowed to manage and edit other users'; // optional
        $admin->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $Role_name = $request->input('Role_Name');	
	$Display = $request->input('Display_Name');	
	$Description = $request->input('Description');	
	   
   	    $roleDB = new Role();
		$roleDB->name = $Role_name;
		$roleDB->display_name =$Display ;
		$roleDB->description = $Description;
		$roleDB->save();
		
		return redirect('/admin/role/setting');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        	   $show_role =DB::select('select*from roles ');
			 
			   
		return view('admin.pages.role.role', ['role' => $show_role]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		 $permission =DB::select('select*from permissions');
	     $role_per =DB::select('select*from permissions p join permission_role pr on pr.permission_id = p.id where role_id='.$id);
		 $employee = employee::all();
		 
		 $role_user = role_user ::join('employee','employee.emid','=','role_user.employee_id')
		 ->where('role_id','=',$id)
		 ->get();
		 $rolename = Role::where('id','=',$id)
		 ->first();
            	
      
	return view('admin.pages.role.role_edit', ['select_per' => $permission,'show_per_role' => $role_per,'role_id'=>$id,'employer_list'=>$employee,'role_user'=>$role_user,'rolename'=>$rolename]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    $perid = $request->input('perid');	
	$roleid = $request->input('idrole');	
	
	
	$i1=count($perid);
		  for($i=0;$i<$i1;$i++)
		  {
        $permissionDB = new permission_role;
		$permissionDB->permission_id = $perid[$i];
	    $permissionDB->role_id = $roleid;
	    $permissionDB->save();
		  }
		  
		  
		  return  redirect('/admin/role/showedit/'.$roleid);
    }
	
	 public function updatrole(Request $request)
    {
   
	$roleid = $request->input('idrole');	
	$emp_id = $request->input('emp_id');

	$i1=count($emp_id);
		  for($i=0;$i<$i1;$i++)
		  {	  
                $roleUser = new role_user;
                $roleUser->employee_id = $emp_id[$i];
                $roleUser->role_id = $roleid;
                $roleUser->save();
                //role_user::insert(['employee_id', , 'role_id' => $roleid]);
		  }
		  
		  
		  return  redirect('/admin/role/showedit/'.$roleid);
    }
	
	
	public function del(Request $request){
	  $rela_id = $request->input('rela_id');	
	  $roleid = $request->input('idrole');	
	  $emp_check = $request->input('empcheck');
	  $i1=count($rela_id);
		  for($i=0;$i<$i1;$i++)
		  {
          permission_role::where('role_id',$roleid)
		  ->where('permission_id',$rela_id[$i])
		  ->delete();
		  }
		  
	  $i2=count($emp_check);
		  for($i=0;$i<$i2;$i++)
		  {
            role_user::where('employee_id', $emp_check[$i])->where('role_id', $roleid)->delete();
		  }
		  
      	return redirect('/admin/role/showedit/'.$roleid);
	}
	
	
	
	

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
