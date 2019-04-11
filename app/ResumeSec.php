<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResumeSec extends Model
{
    protected $casts = [
        'button' => 'array'
    ];
}
