<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request_Step extends Model
{
    public function Request()
    {
        return $this->belongsTo('App\Request');
    }
}
