<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address_item extends Model
{
    public function Address_item_instance()
    {
        return $this->hasMany('App\Address_item_instance','item_id','id');
    }

}
