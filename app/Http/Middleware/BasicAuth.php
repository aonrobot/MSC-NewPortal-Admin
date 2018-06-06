<?php

namespace App\Http\Middleware;

use App\Employee;
use App\MainEmployee;
use App\MainEmployeeAdd;
use Auth;
use Closure;
use Config;
use DB;
use Session;

class BasicAuth {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {

		if (Auth::Basic('Login')) {

			$user = $_SERVER['LOGON_USER'];

			$user = str_replace("METROSYSTEMS\\", "", $user);

			$user = str_replace("metrosystems\\", "", $user);

			$user = str_replace("@metrosystems.co.th", "", $user);

			$hostname = str_replace('.METROSYSTEMS.CO.TH', '', gethostbyaddr($_SERVER['REMOTE_ADDR']));

			$em = MainEmployee::where('Login', '=', $user)->get();

			
			if (!isset($em[0])) {
				return response()->view('errors.NotEmp');
			} else {

				$emp = new Employee();
				$emp->emid = intval($em[0]->EmpCode);
				$emp->EmpCode = $em[0]->EmpCode;
				$emp->Login = $user;
				$emp->org_code = $em[0]->OrgUnitCode;
				$emp->status = $em[0]->WorkingStatus;
				$emp->hostname = $hostname;
				$emp->save();

				$count = DB::table('role_user')->where('employee_id', intval($em[0]->EmpCode))->where('role_id', Config::get('newportal.role.user.id'))->count();
				if($count <= 0){
					DB::table('role_user')->insert(['employee_id' => intval($em[0]->EmpCode), 'role_id' => Config::get('newportal.role.user.id')]);
				}

			}

			//Check don't have Session
			if (!Session::has('emid') or !Session::has('em_info') or !Session::has('user')) {

				Session::put('emid', $em[0]->EmpCode); // This is String
				Session::put('em_info', $em[0]);
				Session::put('user', Employee::where('EmpCode', '=', $em[0]->EmpCode)->first());
			}

			return $next($request);
		}
	}
}
