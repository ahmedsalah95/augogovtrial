<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class App_Report extends Model
{
    public function Request()
    {
        return $this->hasOne('App\Request');
    }
}
