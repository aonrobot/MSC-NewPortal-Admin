<?php

namespace App\Http\Controllers;
use DB;

class FrontPhoneBookController extends Controller {
	public function index() {

		$phonebook = DB::connection('MSCMain')->select("select Emp.*,isnull([LOCATE],'') [LOCATE] ,isnull(EXTNO,'') EXTNO,isnull(REMARK,'') REMARK from EmployeeNew Emp left outer join EmpPhonebook Phone on Emp.EmpCode = Phone.EMPNO and Emp.OrgCode = Phone.COMCOD WHERE Emp.WorkingStatus = 1 and (Emp.OrgCode  = 'MSC'  or  Emp.OrgCode = 'MID' or  Emp.OrgCode  = 'MCC' or  Emp.OrgCode  = 'MIT' or  Emp.OrgCode  = 'HIS')");

		return view('pages.phonebook', ['phonebook' => $phonebook]);
	}

}
