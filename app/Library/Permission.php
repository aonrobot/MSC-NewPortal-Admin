<?php
namespace App\Library;
	
use DB;
use Session;


class Permission {
		
	static public function can($str) {
	$user = Session::get('em_info');
	$check=0;
	   $set_role =DB::select('select name from roles r join role_user ru on ru.role_id = r.id where employee_id='.$user->EmpCardNo);
	   for($i=0;$i<count($str);$i++)
          { if($set_role[0]->name==$str[$i])
	         {$check=1;}
          }	return $check;	
	                                  }
									  
	static public function canrole($str) {
	$user = Session::get('em_info');
	$trop = Session::get('trop_id');
	$check=0;
	 if($trop!=0)
	 {
		$trop_level= DB::select('select * from trop_rela where emid='.$user->EmpCardNo.'and tid='.$trop);
		if($trop_level[0]->user_level){
		$role= DB::select('select * from roles where id='.$trop_level[0]->user_level);
	    $role_per =DB::select('select*from permissions p join permission_role pr on pr.permission_id = p.id where role_id='.$role[0]->id);
	    for($i=0;$i<count($str);$i++)
          {  
	       foreach($role_per as $per){
	        if($per->name==$str[$i])
		       {$check=1;}
	                                 }
          }	
		}
		  return $check;	
	 
		
	 } 
                                       }
}
