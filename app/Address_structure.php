<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address_structure extends Model
{
    public function Address_item()
    {
        return $this->belongsTo('App\Adress_item');
    }
}
