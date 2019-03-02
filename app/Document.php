<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public function Request()
    {
        return $this->belongsToMany
        (
            'App\Request',
            'Request_Document',
            'document_id',
            'request_id'

        );
    }
}
