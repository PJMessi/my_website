<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PitemSec extends Model
{
    public function testmonial(){
        return $this->hasOne('App\TitemSec', 'project_id');
    }

    protected $casts = [
        'images' => 'array',
        'category' => 'array',
        'date' => 'array'
    ];

}
