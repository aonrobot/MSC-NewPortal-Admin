<?php

namespace App\Http\Middleware;
use Illuminate\Http\Response;

use App\Employee;
use App\MainEmployee;
use App\MainEmployeeAdd;
use Auth;
use Closure;
use Config;
use DB;
use Session;
use Log;

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

			$value = $request->header('Authorization');
			$value = str_replace('Basic ', '', $value);
			Log::info(base64_decode($value));

			if(env('APP_ENV') == "production" || env('APP_ENV') == "test"){
				$user = $_SERVER['LOGON_USER'];
			} else {
				$user = env('APP_FAKE_USER');
			}

			$user = str_replace("METROSYSTEMS\\", "", $user);

			$user = str_replace("metrosystems\\", "", $user);

			$user = str_replace("@metrosystems.co.th", "", $user);

			$hostname = str_replace('.METROSYSTEMS.CO.TH', '', gethostbyaddr($_SERVER['REMOTE_ADDR']));

			$em = MainEmployee::where('Login', '=', $user)->get();
			

			$count_outsource_user = Employee::where('Login', '=', $user)->count();
			//Check OutSource have user in AD but not have in EmployeeNew
			if (!isset($em[0])) {
			/*	abort(404, "[Auth] Fail Login Name (คุณไม่มีรหัสผู้ใช้อยู่ในระบบ) | Please Contact Auttawut(Aon) call 78451"); */
				$out_id = time();
				if (!$count_outsource_user) {
					try {
						Employee::create([
							'emid' => $out_id,
							'EmpCode' => $out_id,
							'Login' => $user,
							'org_code' => 0,
							'status' => 'outsource',
							'hostname' => $hostname,
						]);
					} catch (Illuminate\Database\QueryException $e) {
						$errorCode = $e->errorInfo[1];
						abort(409, "(Auth) Insert Employee Error | Please Contact Auttawut(Aon) call 78451");
					}
				} else {
					$emp = Employee::where('Login', $user)->first();
					$emp->org_code = 0;
					$emp->status = 'outsource';
					$emp->hostname = $hostname;
					$emp->save();
				}

				Session::forget('user');
				Session::forget('emid');
				Session::put('emid', $emp->emid); // This is String
				Session::put('user', Employee::where('Login', $user)->first());
				
				
				$url = $request->url();
				return (strpos($url, 'newportal/api/') !== FALSE || strpos($url, 'newportal/phonebook') !== FALSE) ? $next($request) : redirect('phonebook');

			}

			$count_normal_user = Employee::where('EmpCode', '=', $em[0]->EmpCode)->count();
			//Check Have data in Employee database
			if (!$count_normal_user) {
				try {
					$emp_outsource = Employee::where('Login', '=', $user)->where('status', '=', 'outsource');
					if ($emp_outsource->count() > 0) {
						$emp_outsource->delete();
					}
					Employee::create([
						'emid' => intval($em[0]->EmpCode),
						'EmpCode' => $em[0]->EmpCode,
						'Login' => $user,
						'org_code' => $em[0]->OrgUnitCode,
						'status' => $em[0]->WorkingStatus,
						'hostname' => $hostname,
					]);
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
				$emp->hostname = $hostname;
				$emp->save();
			}

			Session::forget('user');
			Session::forget('emid');
			Session::forget('em_info');
			Session::put('emid', $em[0]->EmpCode); // This is String
			Session::put('em_info', $em[0]);
			Session::put('user', Employee::where('EmpCode', '=', $em[0]->EmpCode)->first());
			
			return $next($request);
		
		}
	}
}
