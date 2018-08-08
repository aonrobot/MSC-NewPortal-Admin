<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

	public $timestamps = ['created_at', 'updated_at'];

	protected $table = 'post';

	protected $fillable = ['pid', 'tid', 'emid', 'post_name', 'post_title', 'post_detail', 'post_slug', 'post_status', 'post_type', 'created_at', 'updated_at'];

	protected $primaryKey = 'pid';

	protected function getDateFormat() {
		return 'Y-m-d H:i:s';
	}

}
