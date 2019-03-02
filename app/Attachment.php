<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    public function Instance_Attachment()
    {
        return $this->hasMany('App\Instance_Attachment','attachment_id','id');
    }
}
