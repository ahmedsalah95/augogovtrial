<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reply extends Model
{
    public function complains()
    {
        return $this->belongsToMany(Complain::class);
    }
}
