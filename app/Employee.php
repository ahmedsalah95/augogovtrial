<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function Citizen()
    {
        return $this->belongsTo('App\Citizen');
    }
}
