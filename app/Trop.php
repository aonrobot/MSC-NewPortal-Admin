<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trop extends Model
{
	
    protected $table = 'trop';
	
    protected $fillable = [ 'tid', 'trop_name', 'trop_status','trop_slug','trop_type','created_at','updated_at','trop_subtitle'];

    protected function getDateFormat()
    {
        return 'Y-m-d H:i:s';
    }

}
