<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutSec extends Model
{
    protected $casts = [
        'button' => 'array'
    ];
}
