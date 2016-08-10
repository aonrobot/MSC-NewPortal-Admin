<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

use DB;

use App\Employee;
use App\MainEmployee;

use Session;

class BasicAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //Auth::logout();
        // $login_name = Auth::user()->id;
        //if($login_name == "auttawir")
        //return  $next($request);
        //return $next($request);
        //$user
        if(Auth::Basic('Login') ){


            $user = $_SERVER['PHP_AUTH_USER'];
            $count = Employee::where('Login', '=' , $user )->count();
            $em = MainEmployee::where('Login', '=' , $user )->get();


            //Check Working Status If == 0 -> abort(404)
            if($em[0]->WorkingStatus == 0){
                abort(404,"Can't Find");
            }

            //Check Have data in Employee database
            if(!$count){
                Employee::create( ['emid' => $em[0]->EmpCode, 'Login' => $user, 'org_code' => $em[0]->OrgUnitCode, 'status' => $em[0]->WorkingStatus] );
            }else{
                $emp = Employee::find($em[0]->EmpCode);
                $emp->Login = $user;
                $emp->org_code = $em[0]->OrgUnitCode;
                $emp->status = $em[0]->WorkingStatus;
                $emp->save();
            }

            //Check don'y have Session
            if (!Session::has('emid')) {
                Session::put('emid', $em[0]->EmpCode);// a string
            }

            return $next($request);
        }
    }
}
