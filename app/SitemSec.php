<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SitemSec extends Model
{
    protected $casts = [
        'items_1' => 'array',
        'items_2' => 'array'
    ];
}
