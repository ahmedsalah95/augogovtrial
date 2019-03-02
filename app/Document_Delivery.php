<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document_Delivery extends Model
{
    public function Instance_request()
    {
        return $this->hasOne('App\Instance_Request','structure_id','id');
    }
}
