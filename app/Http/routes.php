<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */
/*Route::get('admin', ['middleware' => 'auth.ad', function() {
    // Only authenticated users may enter...
    return view('admin.admin_template');	

}]);*/

Route::get('/admin', function() {
    return view('admin.admin_template');
});

//Index
Route::get('/admin/employee/create', 'EmployeeController@index');
Route::get('/admin/post/create', 'PostController@index');

Route::get('/admin/employee/create/store', 'EmployeeController@store');

Route::get('/admin/employee/addTest', 'EmployeeController@addTest');
Route::get('/admin/role/create', 'RoleController@create');
