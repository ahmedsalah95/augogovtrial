<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    public function MFP()
    {
        return $this->hasMany('App\Module_Form_priviliage');
    }
}
