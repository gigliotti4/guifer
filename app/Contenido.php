<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{
    protected $fillable = [
        'section',
        'data'
    ];

    protected $casts = [
        'section' => 'string',
        'data' => 'array'
    ];
}
