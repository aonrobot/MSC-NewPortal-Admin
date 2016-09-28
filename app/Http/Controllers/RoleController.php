<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Role;

use App\Permission_role;

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
        //
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
      
			 return view('admin.pages.role.role_edit', ['select_per' => $permission,'show_per_role' => $role_per,'role_id'=>$id]);
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
	public function del(Request $request){
	  $rela_id = $request->input('rela_id');	
	  $roleid = $request->input('idrole');	
	  
	  $i1=count($rela_id);
		  for($i=0;$i<$i1;$i++)
		  {
          permission_role::where('role_id',$roleid)
		  ->where('permission_id',$rela_id[$i])
		  ->delete();
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
