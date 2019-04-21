<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    public function replies()
    {
        return $this->belongsToMany(reply::class);
    }
}
