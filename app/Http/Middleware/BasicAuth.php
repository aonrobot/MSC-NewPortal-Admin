<?php

namespace App\Http\Middleware;

use App\Employee;
use App\MainEmployee;
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
		//Auth::logout();
		// $login_name = Auth::user()->id;
		//if($login_name == "auttawir")
		//return  $next($request);
		//return $next($request);
		//$user
		if (Auth::Basic('Login')) {

			$user = $_SERVER['PHP_AUTH_USER'];
			$em = MainEmployee::where('Login', '=', $user)->get();

			if (!isset($em[0])) {
				abort(404, "[Auth] Fail Login Name (คุณไม่มีรหัสผู้ใช้อยู่ในระบบ) | Please Contact Auttawut(Aon) call 78451");
			}
			//Check Working Status If == 0 -> abort(404)
			if ($em[0]->WorkingStatus == 0) {
				abort(404, "[Auth] Sorry, You not work in Metro Systems Cop.");
			}

			$count = Employee::where('EmpCode', '=', $em[0]->EmpCode)->count();

			//Check Have data in Employee database
			if (!$count) {
				try {
					Employee::create(['emid' => intval($em[0]->EmpCode), 'EmpCode' => $em[0]->EmpCode, 'Login' => $user, 'org_code' => $em[0]->OrgUnitCode, 'status' => $em[0]->WorkingStatus]);

					DB::table('role_user')->insert(['employee_id' => intval($em[0]->EmpCode), 'role_id' => Config::get('newportal.role.user.id')]);

				} catch (Illuminate\Database\QueryException $e) {
					$errorCode = $e->errorInfo[1];
					abort(409, "(Auth) Insert Employee Error | Please Contact Auttawut(Aon) call 78451");

				}

			} else {
				$emp = Employee::find($em[0]->EmpCode);
				$emp->emid = intval($em[0]->EmpCode);
				$emp->EmpCode = $em[0]->EmpCode;
				$emp->Login = $user;
				$emp->org_code = $em[0]->OrgUnitCode;
				$emp->status = $em[0]->WorkingStatus;
				$emp->save();
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
