<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module_Form_priviliage extends Model
{
    public function Group()
    {
        return $this->belongsTo('App\Group','group_id','id');
    }
    public function Form()
    {
        return $this->belongsTo('App\Form','form_id','id');
    }
    public function Module()
    {
        return $this->belongsTo('App\Module','module_id','id');
    }
}
