<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TitemSec extends Model
{
    public function portfolio() {
        return $this->belongsTo('App\PitemSec', 'project_id');
    }
}
