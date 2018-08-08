<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
	public $timestamps = true;

	protected $table = "file";

	protected $fillable = ['id', 'emid','used' ,'session' , 'file_location', 'file_file_name', 'file_file_size', 'file_content_type', 'updated_at', 'created_at'];

	protected $primaryKey  = 'id';
}
