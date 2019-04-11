<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Miscellaneous extends Model
{
    protected $casts = [
        'trButton' => 'array'
    ];
}
