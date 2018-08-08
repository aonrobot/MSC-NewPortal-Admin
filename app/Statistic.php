<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model {
	public $timestamps = ['created_at', 'updated_at'];

	protected $table = 'statistic';

	protected $fillable = ['stid', 'emid', 'ip_address', 'event', 'object_id', 'stat_type', 'stat_comment', 'stat_count', 'current_url', 'destination_url', 'duration', 'created_at', 'updated_at'];

	protected $primaryKey = 'stid';

	protected function getDateFormat() {
		return 'Y-m-d H:i:s';
	}
}
