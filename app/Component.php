<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Component extends Model {
	protected $table = 'component';

	protected $fillable = ['comid', 'pid', 'ref_table_name', 'ref_id', 'sort'];

	protected $primaryKey = 'comid';
}
