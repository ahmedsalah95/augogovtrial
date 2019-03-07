<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address_structure extends Model
{
    public function Address_item()
    {
        return $this->belongsTo('App\Address_item');
    }

    public function Instance_Request()
    {
        return $this->hasMany('App\Instance_Request','structure_id','id');
    }
}
