<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function Citizen()
    {
        return $this->belongsTo('App\Citizen');
    }
}
