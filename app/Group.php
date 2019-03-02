<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function Users()
    {
        return $this->belongsToMany('App\User','App\Group_user','group_id',
            'user_id');
    }
    public function Module_Form_Priviliage()
    {
        return $this->hasMany('App\Module_Form_priviliage');
    }
}
