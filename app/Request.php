<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    public function Steps()
    {
        return $this->hasMany('App\Request_Step', 'request_id', 'id');
    }

    public function Fees()
    {
        return $this->belongsToMany(
            'App\Fees',
            'Request_Fees',
            'fees_id',
            'request_id');
    }

    public function Document()
    {
        return $this->belongsToMany
        (
            'App\Document',
            'App\Request_Document',
            'request_id',
            'document_id'
        );
    }
}
