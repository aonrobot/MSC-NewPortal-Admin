<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = "setting";

    protected $fillable = [ 'setid', 'set_type', 'set_type_id', 'set_name', 'set_key', 'set_value', 'created_at', 'updated_at' ];

    protected function getDateFormat()
    {
        return 'Y-m-d H:i:s+';
    }
}
