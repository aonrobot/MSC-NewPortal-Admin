<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class MainEmployee extends Model implements AuthenticatableContract {

	use Authenticatable, SearchableTrait;

	protected $connection = 'MSCMain';

	protected $table = 'EmployeeNew';

	// protected $searchable = [
	// 	'columns' => [
	// 		'EmpCode' => 2,
	// 		'FirstName' => 10,
	// 		'LastName' => 7,
	// 		'NickName' => 10,
	// 		'OrgUnitName' => 7,
	// 	],

	// 	'table_columns' => ['EmpCode', 'FirstName', 'LastName', 'NickName', 'OrgUnitName'],
	// ];

}