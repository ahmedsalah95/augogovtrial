<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instance_Request extends Model
{
    public function Address_Structure()
    {
        return $this->belongsTo('Address_structure');
    }
}
