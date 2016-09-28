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

Route::group(['middleware' => ['auth.ad']], function () {

	////////////////////////////////////////// FrontEnd Zone //////////////////////////////////////////////////////////

	Route::get('/', 'FrontHomeController@index');
	Route::get('/trop/{id?}', 'FrontTropController@index');
	Route::get('/post/{id?}', 'FrontPostController@index');
	Route::get('/category/{id?}', 'FrontCategoryController@index');
	Route::get('/category/news/{id?}', 'FrontCategoryController@news');

	Route::get('/application', 'FrontApplicationController@index');
	//Add Favorite Application
	Route::get('/favorite/add_application/{id?}', 'FrontFavoriteController@add_application');
	Route::get('/favorite/remove_application/{id?}', 'FrontFavoriteController@remove_application');

	Route::get('/phonebook', 'FrontPhoneBookController@index');

	Route::get('/test', 'FrontFavoriteController@fetch_fav_app');

	////////////////////////////////////////// Ajax //////////////////////////////////////////////////////////////////

	//Component Orgchart
	Route::get('/component/orgchart/{id?}', 'ComponentController@orgChart');

	//Fetch New App
	Route::get('/favorite/ajax_fav_app', 'FrontFavoriteController@ajax_fav_app');

	////////////////////////////////////////// Ajax Backend //////////////////////////////////////////////////////////////////

	//Component Fetch Info
	Route::get('/admin/component/fetch/{component?}/{id?}', 'ComponentController@fetch');

	////////////////////////////////////////// BackEnd Zone //////////////////////////////////////////////////////////

	Route::get('/admin', 'DashboardController@show');

	//File
	Route::get('/admin/file', 'FileController@index');

	//Upload
	//Route::post('/admin/upload/image', 'UploadController@upload_image');
	/*Route::post('/admin/upload/delete', 'UploadController@delete');*/
	/*Route::post('/admin/upload/update_db', 'UploadController@update_db');*/
	Route::post('/admin/upload/slide/{slideId?}', 'UploadController@slide');
	Route::post('/admin/upload/{component?}/{trop?}/{post?}', 'UploadController@index');
	Route::post('/admin/upload/thumbnail/{object?}/{tropId?}/{objectId?}', 'UploadController@thumbnail');

	//role
	Route::get('/admin/role/setting', 'RoleController@show');
	Route::get('/admin/role/showedit/{id?}', 'RoleController@edit');
	Route::get('/admin/role/edit', 'RoleController@update');
	Route::get('/admin/role/delPermissions', 'RoleController@del');
	//Component
	Route::post('/admin/component/create', 'ComponentController@create');
	Route::post('/admin/component/update', 'ComponentController@update');
	Route::post('/admin/component/delete', 'ComponentController@delete');

	//Post
	Route::get('/admin/post', 'PostController@index');
	Route::post('/admin/post/create', 'PostController@create');
	Route::get('/admin/post/edit/{id?}', 'PostController@edit');
	Route::post('/admin/post/update/{id?}', 'PostController@update');
	Route::post('/admin/post/update/sort/{id?}', 'PostController@update_sort');
	Route::get('/admin/post/destroy/{id?}', 'PostController@destroy');

	//Index
	Route::get('/admin/employee/create', 'EmployeeController@index');
	Route::get('/admin/employee/list', 'EmployeeController@show');
	Route::get('/admin/employee/setting/{id?}', 'EmployeeController@editdetail');   
	Route::get('/admin/employee/create/store', 'EmployeeController@store');
	Route::get('/admin/employee/update', 'EmployeeController@update');

	Route::get('/admin/employee/addTest', 'EmployeeController@addTest');
	Route::get('/admin/role/create', 'RoleController@create');
	//trop
	Route::get('/admin/trop/detail/{id?}', 'tropController@index');
	Route::get('/admin/trop/create', 'tropController@show');
	Route::get('/admin/trop/insert', 'tropController@store');
	Route::get('/admin/trop/del/{id?}', 'tropController@Del');
	Route::get('/admin/trop/deladmin/{id?}', 'tropController@deladmin');
	Route::get('/admin/trop/edit/{id?}', 'tropController@detailset');
	Route::get('/admin/trop/editupdate', 'tropController@edit');
	Route::get('/admin/trop/setting/{id?}', 'tropController@edit1');
	Route::get('/admin/trop/logout', 'tropController@tropout');
	//request
	Route::get('/admin/request', 'requestController@show');
	Route::get('/admin/request/reject', 'requestController@reject');
	Route::get('/admin/request/add/{id?}', 'requestController@edit1');
	Route::get('/admin/request/del/{id?}', 'requestController@Del');
	//category
	Route::get('/admin/category/show', 'CategoryController@show');
	Route::get('/admin/category/insert', 'CategoryController@store');
	Route::get('/admin/category/del/{id?}', 'CategoryController@del');
	Route::get('/admin/category/showedit/{id?}', 'CategoryController@editdetail');
	Route::get('/admin/category/delpost1/{id?}', 'CategoryController@delpost1');
	Route::get('/admin/category/edit', 'CategoryController@edit');
	Route::get('/admin/category/delpost', 'CategoryController@delpost');
	//menu
	Route::get('/admin/menu/create', 'MenuController@show');
	Route::get('/admin/menu/insert', 'MenuController@store');
	Route::get('/admin/menu/edit/{id?}', 'MenuController@edit1'); //show edit
	Route::post('/admin/menu/update', 'MenuController@edit2'); //update edit
	Route::get('/admin/menu/default/{id?}', 'MenuController@update'); //Template
	Route::get('/admin/menu/del/{id?}', 'MenuController@Del');
	Route::get('/admin/menu/delitem/{id?}', 'MenuController@delitem');
	Route::get('/admin/menu/listitemdel/{id?}', 'MenuController@listedit'); //link_del
	//slide
	Route::get('/admin/slide/create', 'SlideController@show');
	Route::get('/admin/slide/insert', 'SlideController@store');
	Route::get('/admin/slide/edit/{id?}', 'SlideController@edit1'); //show
	Route::post('/admin/slide/update', 'SlideController@edit2'); //update
	Route::get('/admin/slide/del/{id?}', 'SlideController@Del');
	Route::get('/admin/slide/delitem/{id?}', 'SlideController@delitem');

});
