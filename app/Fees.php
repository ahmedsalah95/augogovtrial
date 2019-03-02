<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fees extends Model
{
    public function Requests()
    {
        return $this->belongsToMany(
            'App\Request',
            'Request_Fees',
            'fees_id',
            'request_id');
    }
}
