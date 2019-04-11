<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainSec extends Model
{
    protected $casts = [
        'button' => 'array'
    ];
}
