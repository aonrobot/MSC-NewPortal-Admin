<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model {

	public $timestamps = false;

	protected $table = "favorite";

	protected $fillable = ['fid', 'emid', 'fav_icon', 'fav_name', 'fav_title', 'fav_type', 'fav_status', 'fav_link'];

	protected $primaryKey = 'fid';
}
