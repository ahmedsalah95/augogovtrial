<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address_item_instance extends Model
{
    public function Address_item()
    {
        return $this->belongsTo('App\Address_structure');
    }
    public function Address_structure()
    {
        return $this->hasMany('App\Address_structure','instance_id','id');
    }
}
