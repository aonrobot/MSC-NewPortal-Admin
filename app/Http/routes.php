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

Route::get('/', 'FrontHomeController@index');
Route::get('/trop/{id?}', 'FrontTropController@index');

Route::group(['middleware' => ['auth.ad']], function () {

	Route::get('/admin/post/create', 'PostController@index');

	Route::get('/admin', function() {
	    return view('admin.pages.dashboard');
	});	
});

//Upload
Route::post('/admin/upload/image','UploadController@upload_image');
Route::get('/admin/upload/delete','UploadController@delete');

//Index
Route::get('/admin/employee/create', 'EmployeeController@index');


Route::get('/admin/employee/create/store', 'EmployeeController@store');

Route::get('/admin/employee/addTest', 'EmployeeController@addTest');
Route::get('/admin/role/create', 'RoleController@create');

Route::get('/admin/trop/create', 'tropController@show');
Route::get('/admin/trop/insert', 'tropController@store');
Route::get('/admin/trop/del/{id?}', 'tropController@Del');
Route::get('/admin/trop/edit/{id?}', 'tropController@detailset');
Route::get('/admin/trop/setting/{id?}', 'tropController@edit1');

Route::get('/admin/request', 'requestController@show');
Route::get('/admin/request/add/{id?}', 'requestController@edit1');

Route::get('/admin/category/show', 'CategoryController@show');
Route::get('/admin/category/insert', 'CategoryController@store');
Route::get('/admin/category/del/{id?}', 'CategoryController@del');



Route::get('/admin/menu/create', 'MenuController@show');
Route::get('/admin/menu/insert', 'MenuController@store');
Route::get('/admin/menu/edit/{id?}', 'MenuController@edit1'); //show หน้า edit
Route::get('/admin/menu/update', 'MenuController@edit2');  //update edit
Route::get('/admin/menu/default/{id?}', 'MenuController@update');//Template
Route::get('/admin/menu/del/{id?}', 'MenuController@Del');
Route::get('/admin/menu/delitem/{id?}', 'MenuController@delitem');

