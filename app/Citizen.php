<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Citizen extends Model
{
    public function Customer()
    {
        return $this->hasOne('App\Customer', 'citizen_national_id', 'id');
    }
    public function Users()
    {
        return $this->hasMany('App\User', 'citizen_national_id', 'id');
    }
    public function Employees()
    {
        return $this->hasMany('App\Employee', 'citizen_national_id', 'id');
    }
}
